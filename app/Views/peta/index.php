<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<section style="background: linear-gradient(135deg, #0b4632 0%, #062b1e 100%); padding: 3rem 0 3.5rem; color: #ffffff;">
    <div class="container">
        <div style="display: flex; align-items: center; gap: 0.5rem; font-size: 0.85rem; color: #a7f3d0; margin-bottom: 0.75rem;">
            <a href="<?= base_url() ?>" style="color: inherit; text-decoration: none;">Beranda</a>
            <i data-lucide="chevron-right" style="width: 14px; height: 14px;"></i>
            <span style="color: #ffffff; font-weight: 600;">Peta Desa</span>
        </div>
        <h1 style="font-size: 2.2rem; font-weight: 800; margin-bottom: 0.5rem; letter-spacing: -0.02em;">Peta Geospasial & Titik Wilayah</h1>
        <p style="color: #d1fae5; max-width: 650px; font-size: 0.95rem; line-height: 1.6;">
            Informasi spasial interaktif sebaran fasilitas publik, kantor desa, sarana pendidikan, tempat ibadah, objek wisata, dan titik proyek pembangunan di <?= esc($desa['nama_desa']) ?>.
        </p>

        <!-- Filter Kategori Kancing -->
        <div style="margin-top: 1.5rem; display: flex; gap: 0.5rem; flex-wrap: wrap;">
            <a href="<?= base_url('peta?kategori=semua') ?>" 
               style="padding: 0.45rem 1.1rem; border-radius: 9999px; font-weight: 600; font-size: 0.82rem; text-decoration: none; transition: 0.2s; <?= $currentCat === 'semua' ? 'background: #10b981; color: #fff;' : 'background: rgba(255,255,255,0.15); color: #fff;' ?>">
                Semua Objek
            </a>
            <?php foreach ($kategoriList as $k): ?>
                <a href="<?= base_url('peta?kategori=' . urlencode($k['kategori'])) ?>" 
                   style="padding: 0.45rem 1.1rem; border-radius: 9999px; font-weight: 600; font-size: 0.82rem; text-decoration: none; transition: 0.2s; <?= $currentCat === $k['kategori'] ? 'background: #10b981; color: #fff;' : 'background: rgba(255,255,255,0.15); color: #fff;' ?>">
                    <?= ucfirst(esc($k['kategori'])) ?>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<div class="container" style="padding-top: 2rem; padding-bottom: 4rem;">
    <!-- Container Peta Leaflet -->
    <div style="background: #ffffff; border-radius: 16px; border: 1px solid #e2e8f0; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.06); margin-bottom: 2.5rem;">
        <div id="map" style="width: 100%; height: 500px;"></div>
    </div>

    <!-- Grid Card Titik Lokasi -->
    <h2 style="font-size: 1.35rem; font-weight: 800; color: #0f172a; margin-bottom: 1.25rem;">
        Daftar Titik Objek (<?= count($titikList) ?> Lokasi Terdata)
    </h2>

    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 1.25rem;">
        <?php foreach ($titikList as $pt): ?>
            <div style="background: #ffffff; border-radius: 14px; border: 1px solid #e2e8f0; padding: 1.25rem; box-shadow: 0 2px 10px rgba(0,0,0,0.03); display: flex; flex-direction: column;">
                <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 0.75rem;">
                    <span style="font-size: 0.75rem; font-weight: 700; text-transform: uppercase; padding: 0.25rem 0.6rem; border-radius: 6px; background: #ecfdf5; color: #059669;">
                        <?= esc($pt['kategori']) ?>
                    </span>
                    <button type="button" onclick="focusMarker(<?= $pt['lat'] ?>, <?= $pt['lng'] ?>)" style="background: none; border: none; cursor: pointer; color: #0b6045; font-size: 0.78rem; font-weight: 700; display: inline-flex; align-items: center; gap: 0.25rem;">
                        <i data-lucide="map-pin" style="width: 14px; height: 14px;"></i> Lihat Peta
                    </button>
                </div>
                <h3 style="font-size: 1.05rem; font-weight: 700; color: #1e293b; margin-bottom: 0.4rem;">
                    <?= esc($pt['nama']) ?>
                </h3>
                <p style="font-size: 0.85rem; color: #64748b; line-height: 1.5; margin-bottom: 0.75rem; flex-grow: 1;">
                    <?= esc($pt['deskripsi']) ?>
                </p>
                <div style="font-size: 0.78rem; color: #94a3b8; border-top: 1px solid #f1f5f9; padding-top: 0.6rem;">
                    <i data-lucide="navigation" style="width: 13px; height: 13px; display: inline; vertical-align: middle;"></i>
                    <?= esc($pt['alamat']) ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const centerLat = <?= !empty($desa['koordinat_lat']) ? (float)$desa['koordinat_lat'] : -7.3683708 ?>;
        const centerLng = <?= !empty($desa['koordinat_lng']) ? (float)$desa['koordinat_lng'] : 121.1260432 ?>;

        // Base Layer 1: Google Hybrid (Satelit + Label Jalan & Wilayah)
        const googleHybrid = L.tileLayer('https://mt1.google.com/vt/lyrs=y&x={x}&y={y}&z={z}', {
            maxZoom: 20,
            subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
            attribution: '&copy; Google Maps'
        });

        // Base Layer 2: Esri World Imagery Satelit
        const esriSatellite = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
            maxZoom: 19,
            attribution: 'Tiles &copy; Esri &mdash; Source: Esri, i-cubed, USDA, USGS'
        });

        // Base Layer 3: OpenStreetMap Jalan
        const osmStreet = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; OpenStreetMap contributors'
        });

        // Init Map with Google Hybrid as default
        window.desaMap = L.map('map', {
            center: [centerLat, centerLng],
            zoom: 14,
            layers: [googleHybrid]
        });

        // Layer Switcher
        const baseMaps = {
            "Citra Satelit": googleHybrid,
            "Satelit Esri": esriSatellite,
            "Peta Jalan (OSM)": osmStreet
        };
        L.control.layers(baseMaps, null, { position: 'topright' }).addTo(window.desaMap);

        const markers = <?= json_encode($titikList) ?>;
        const bounds = [];

        markers.forEach(pt => {
            if (pt.lat && pt.lng) {
                const lat = parseFloat(pt.lat);
                const lng = parseFloat(pt.lng);
                bounds.push([lat, lng]);

                let popupHtml = '<div style="font-family: inherit; font-size: 0.88rem; min-width: 220px; padding: 4px;">' +
                    '<span style="display:inline-block; font-size: 0.72rem; font-weight: bold; color: #059669; text-transform: uppercase; background: #ecfdf5; padding: 2px 8px; border-radius: 4px; margin-bottom: 6px;">' + (pt.kategori || '') + '</span>' +
                    '<h4 style="font-weight: 800; color: #0f172a; margin: 2px 0 6px; font-size: 1rem;">' + (pt.nama || '') + '</h4>' +
                    '<p style="color: #475569; font-size: 0.84rem; margin: 0 0 8px; line-height: 1.4;">' + (pt.deskripsi || '') + '</p>' +
                    '<div style="color: #64748b; font-size: 0.78rem; border-top: 1px solid #f1f5f9; padding-top: 6px; display: flex; align-items: center; gap: 4px;">' +
                    '<span>📍 ' + (pt.alamat || '') + '</span>' +
                    '</div>' +
                '</div>';

                L.marker([lat, lng]).addTo(window.desaMap).bindPopup(popupHtml);
            }
        });

        if (bounds.length > 0) {
            window.desaMap.fitBounds(bounds, { padding: [40, 40] });
        }
    });

    function focusMarker(lat, lng) {
        if (window.desaMap) {
            window.desaMap.setView([lat, lng], 17, { animate: true });
            window.scrollTo({ top: document.getElementById('map').offsetTop - 90, behavior: 'smooth' });
        }
    }
</script>

<?= $this->endSection() ?>
