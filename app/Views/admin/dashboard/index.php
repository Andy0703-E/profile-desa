<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<style>
    /* Modern Dashboard Styling */
    .dash-hero {
        background: linear-gradient(135deg, #064e3b 0%, #047857 50%, #0d9488 100%);
        border-radius: 20px;
        padding: 2rem 2.25rem;
        color: #ffffff;
        position: relative;
        overflow: hidden;
        margin-bottom: 2rem;
        box-shadow: 0 10px 30px -10px rgba(6, 78, 59, 0.4);
    }
    .dash-hero::before {
        content: '';
        position: absolute;
        width: 320px;
        height: 320px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(255,255,255,0.15) 0%, rgba(255,255,255,0) 70%);
        top: -100px;
        right: -80px;
        pointer-events: none;
    }
    .dash-hero::after {
        content: '';
        position: absolute;
        width: 220px;
        height: 220px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(52, 211, 153, 0.25) 0%, rgba(52, 211, 153, 0) 70%);
        bottom: -80px;
        left: 20%;
        pointer-events: none;
    }
    .dash-hero-content {
        position: relative;
        z-index: 2;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 1.5rem;
    }
    .dash-hero-title {
        font-size: 1.75rem;
        font-weight: 800;
        letter-spacing: -0.02em;
        margin-bottom: 0.35rem;
        line-height: 1.2;
    }
    .dash-hero-sub {
        font-size: 0.9rem;
        color: #a7f3d0;
        max-width: 600px;
        line-height: 1.5;
    }
    .dash-hero-actions {
        display: flex;
        gap: 0.75rem;
        flex-wrap: wrap;
    }
    .dash-btn-white {
        background: #ffffff;
        color: #064e3b;
        font-weight: 700;
        font-size: 0.85rem;
        padding: 0.65rem 1.2rem;
        border-radius: 10px;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.45rem;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        transition: transform 0.15s, box-shadow 0.15s;
    }
    .dash-btn-white:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 18px rgba(0,0,0,0.15);
    }
    .dash-btn-ghost {
        background: rgba(255, 255, 255, 0.15);
        color: #ffffff;
        border: 1px solid rgba(255, 255, 255, 0.25);
        backdrop-filter: blur(8px);
        font-weight: 600;
        font-size: 0.85rem;
        padding: 0.65rem 1.2rem;
        border-radius: 10px;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.45rem;
        transition: background 0.15s;
    }
    .dash-btn-ghost:hover {
        background: rgba(255, 255, 255, 0.25);
    }

    /* Stat Cards Grid */
    .stat-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        gap: 1.25rem;
        margin-bottom: 2rem;
    }
    .stat-card-modern {
        background: #ffffff;
        border-radius: 16px;
        padding: 1.35rem 1.5rem;
        border: 1px solid #e2e8f0;
        box-shadow: 0 4px 20px -4px rgba(15, 23, 42, 0.04);
        display: flex;
        align-items: center;
        justify-content: space-between;
        position: relative;
        overflow: hidden;
        transition: transform 0.2s, box-shadow 0.2s, border-color 0.2s;
    }
    .stat-card-modern:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px -5px rgba(15, 23, 42, 0.08);
        border-color: #cbd5e1;
    }
    .stat-card-modern::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        width: 4px;
        background: var(--accent-bar, #10b981);
    }
    .stat-meta {
        display: flex;
        flex-direction: column;
    }
    .stat-label-modern {
        font-size: 0.78rem;
        font-weight: 700;
        color: #64748b;
        text-transform: uppercase;
        letter-spacing: 0.04em;
        margin-bottom: 0.35rem;
    }
    .stat-val-modern {
        font-size: 1.85rem;
        font-weight: 800;
        color: #0f172a;
        line-height: 1;
        letter-spacing: -0.02em;
    }
    .stat-sub-text {
        font-size: 0.75rem;
        color: #94a3b8;
        margin-top: 0.4rem;
    }
    .stat-icon-wrap {
        width: 52px;
        height: 52px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    /* Main Section Grids */
    .dash-main-grid {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 1.5rem;
        margin-bottom: 2rem;
    }
    @media (max-width: 1024px) {
        .dash-main-grid {
            grid-template-columns: 1fr;
        }
    }

    .modern-card {
        background: #ffffff;
        border-radius: 18px;
        border: 1px solid #e2e8f0;
        box-shadow: 0 4px 20px -4px rgba(15, 23, 42, 0.04);
        overflow: hidden;
    }
    .modern-card-header {
        padding: 1.25rem 1.5rem;
        border-bottom: 1px solid #f1f5f9;
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: #ffffff;
    }
    .modern-card-title {
        font-size: 1.05rem;
        font-weight: 800;
        color: #0f172a;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    .modern-card-link {
        font-size: 0.8rem;
        font-weight: 700;
        color: #059669;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.25rem;
        transition: color 0.15s;
    }
    .modern-card-link:hover {
        color: #047857;
    }

    /* Quick Shortcuts Grid */
    .quick-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(130px, 1fr));
        gap: 0.85rem;
        padding: 1.25rem;
    }
    .quick-item {
        background: #f8fafc;
        border: 1px solid #f1f5f9;
        border-radius: 12px;
        padding: 1rem 0.75rem;
        text-align: center;
        text-decoration: none;
        color: #1e293b;
        transition: all 0.15s ease;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 0.5rem;
    }
    .quick-item:hover {
        background: #ecfdf5;
        border-color: #a7f3d0;
        color: #065f46;
        transform: translateY(-2px);
    }
    .quick-item i {
        width: 24px;
        height: 24px;
        color: #059669;
    }
    .quick-item span {
        font-size: 0.78rem;
        font-weight: 700;
    }

    /* Aduan Status Mini Bar */
    .aduan-stat-bar {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 0.75rem;
        padding: 1rem 1.5rem;
        background: #f8fafc;
        border-bottom: 1px solid #f1f5f9;
    }
    .aduan-stat-pill {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 10px;
        padding: 0.6rem 0.85rem;
        text-align: center;
    }
    .aduan-stat-pill .num {
        font-size: 1.15rem;
        font-weight: 800;
        color: #0f172a;
    }
    .aduan-stat-pill .lbl {
        font-size: 0.7rem;
        font-weight: 700;
        color: #64748b;
        text-transform: uppercase;
    }

    /* Table styling */
    .table-modern {
        width: 100%;
        border-collapse: collapse;
        font-size: 0.86rem;
        text-align: left;
    }
    .table-modern th {
        padding: 0.85rem 1.5rem;
        color: #64748b;
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.04em;
        background: #fafafa;
        border-bottom: 1px solid #f1f5f9;
    }
    .table-modern td {
        padding: 1rem 1.5rem;
        border-bottom: 1px solid #f8fafc;
        color: #334155;
    }
    .table-modern tr:hover td {
        background: #fcfcfd;
    }

    /* Status Badges */
    .badge-modern {
        display: inline-flex;
        align-items: center;
        gap: 0.3rem;
        padding: 0.25rem 0.65rem;
        border-radius: 9999px;
        font-size: 0.72rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.03em;
    }
    .badge-selesai { background: #ecfdf5; color: #059669; }
    .badge-diproses { background: #eff6ff; color: #2563eb; }
    .badge-diajukan { background: #fef3c7; color: #d97706; }
    .badge-ditolak  { background: #fee2e2; color: #dc2626; }
</style>

<!-- 1. Banner Sambutan Modern -->
<div class="dash-hero">
    <div class="dash-hero-content">
        <div>
            <div style="display: inline-flex; align-items: center; gap: 0.4rem; padding: 0.25rem 0.75rem; border-radius: 9999px; background: rgba(255,255,255,0.2); font-size: 0.75rem; font-weight: 700; margin-bottom: 0.6rem; letter-spacing: 0.05em; text-transform: uppercase;">
                <i data-lucide="shield-check" style="width: 14px; height: 14px;"></i> Pusat Kontrol Desa Digital
            </div>
            <h1 class="dash-hero-title">Halo, Administrator!</h1>
            <p class="dash-hero-sub">Kelola portal informasi publik, aspirasi warga, peta geospasial, dan pergerakan ekonomi Desa Batu Bingkung dalam satu dasbor terpadu.</p>
        </div>
        <div class="dash-hero-actions">
            <a href="<?= base_url('admin/berita/create') ?>" class="dash-btn-white">
                <i data-lucide="plus-circle" style="width: 16px; height: 16px;"></i> Tulis Berita
            </a>
            <a href="<?= base_url() ?>" target="_blank" class="dash-btn-ghost">
                <i data-lucide="external-link" style="width: 16px; height: 16px;"></i> Lihat Portal Web
            </a>
        </div>
    </div>
</div>

<!-- 2. Grid Statistik Utama (4 Card) -->
<div class="stat-grid">
    <!-- Stat 1: Aduan Warga -->
    <div class="stat-card-modern" style="--accent-bar: #10b981;">
        <div class="stat-meta">
            <span class="stat-label-modern">Aspirasi &amp; Aduan</span>
            <span class="stat-val-modern"><?= number_format($countPengaduan) ?></span>
            <span class="stat-sub-text"><strong style="color: #d97706;"><?= $countPendingAduan ?> belum ditanggapi</strong></span>
        </div>
        <div class="stat-icon-wrap" style="background: #ecfdf5; color: #059669;">
            <i data-lucide="message-square-plus" style="width: 26px; height: 26px;"></i>
        </div>
    </div>

    <!-- Stat 2: Berita & Artikel -->
    <div class="stat-card-modern" style="--accent-bar: #3b82f6;">
        <div class="stat-meta">
            <span class="stat-label-modern">Kabar Berita</span>
            <span class="stat-val-modern"><?= number_format($countBerita) ?></span>
            <span class="stat-sub-text">Publikasi artikel desa</span>
        </div>
        <div class="stat-icon-wrap" style="background: #eff6ff; color: #2563eb;">
            <i data-lucide="newspaper" style="width: 26px; height: 26px;"></i>
        </div>
    </div>

    <!-- Stat 3: UMKM & Potensi -->
    <div class="stat-card-modern" style="--accent-bar: #f59e0b;">
        <div class="stat-meta">
            <span class="stat-label-modern">Lapak UMKM</span>
            <span class="stat-val-modern"><?= number_format($countUmkm) ?></span>
            <span class="stat-sub-text">Usaha warga terdaftar</span>
        </div>
        <div class="stat-icon-wrap" style="background: #fef3c7; color: #d97706;">
            <i data-lucide="shopping-bag" style="width: 26px; height: 26px;"></i>
        </div>
    </div>

    <!-- Stat 4: Kegiatan Pembangunan -->
    <div class="stat-card-modern" style="--accent-bar: #ec4899;">
        <div class="stat-meta">
            <span class="stat-label-modern">Pembangunan</span>
            <span class="stat-val-modern"><?= number_format($countPembangunan) ?></span>
            <span class="stat-sub-text">Proyek fisik desa</span>
        </div>
        <div class="stat-icon-wrap" style="background: #fdf2f8; color: #db2777;">
            <i data-lucide="hard-hat" style="width: 26px; height: 26px;"></i>
        </div>
    </div>
</div>

<!-- 3. Grid Tambahan Ringkas (Wisata, Titik Peta, Agenda, Aparatur) -->
<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem; margin-bottom: 2rem;">
    <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 1rem 1.25rem; display: flex; align-items: center; gap: 0.85rem;">
        <div style="width: 40px; height: 40px; border-radius: 10px; background: #f0fdf4; color: #16a34a; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
            <i data-lucide="palmtree" style="width: 20px; height: 20px;"></i>
        </div>
        <div>
            <div style="font-size: 1.25rem; font-weight: 800; color: #0f172a; line-height: 1;"><?= $countWisata ?></div>
            <div style="font-size: 0.74rem; color: #64748b; font-weight: 600; margin-top: 2px;">Destinasi Wisata</div>
        </div>
    </div>

    <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 1rem 1.25rem; display: flex; align-items: center; gap: 0.85rem;">
        <div style="width: 40px; height: 40px; border-radius: 10px; background: #ecfeff; color: #0891b2; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
            <i data-lucide="map-pin" style="width: 20px; height: 20px;"></i>
        </div>
        <div>
            <div style="font-size: 1.25rem; font-weight: 800; color: #0f172a; line-height: 1;"><?= $countPeta ?></div>
            <div style="font-size: 0.74rem; color: #64748b; font-weight: 600; margin-top: 2px;">Titik Spasial Peta</div>
        </div>
    </div>

    <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 1rem 1.25rem; display: flex; align-items: center; gap: 0.85rem;">
        <div style="width: 40px; height: 40px; border-radius: 10px; background: #faf5ff; color: #9333ea; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
            <i data-lucide="calendar" style="width: 20px; height: 20px;"></i>
        </div>
        <div>
            <div style="font-size: 1.25rem; font-weight: 800; color: #0f172a; line-height: 1;"><?= $countAgenda ?></div>
            <div style="font-size: 0.74rem; color: #64748b; font-weight: 600; margin-top: 2px;">Agenda Kegiatan</div>
        </div>
    </div>

    <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 1rem 1.25rem; display: flex; align-items: center; gap: 0.85rem;">
        <div style="width: 40px; height: 40px; border-radius: 10px; background: #fff7ed; color: #ea580c; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
            <i data-lucide="users" style="width: 20px; height: 20px;"></i>
        </div>
        <div>
            <div style="font-size: 1.25rem; font-weight: 800; color: #0f172a; line-height: 1;"><?= $countAparatur ?></div>
            <div style="font-size: 0.74rem; color: #64748b; font-weight: 600; margin-top: 2px;">Aparatur Desa</div>
        </div>
    </div>

    <a href="<?= base_url('admin/kontak') ?>" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 1rem 1.25rem; display: flex; align-items: center; gap: 0.85rem; text-decoration: none; transition: transform 0.2s;">
        <div style="width: 40px; height: 40px; border-radius: 10px; background: #ecfdf5; color: #059669; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
            <i data-lucide="mail" style="width: 20px; height: 20px;"></i>
        </div>
        <div>
            <div style="font-size: 1.25rem; font-weight: 800; color: #0f172a; line-height: 1;"><?= $countPesan ?></div>
            <div style="font-size: 0.74rem; color: #64748b; font-weight: 600; margin-top: 2px;">Pesan &amp; Aspirasi Warga</div>
        </div>
    </a>
</div>

<!-- 4. Area Konten Utama (2 Kolom: Laporan & Berita/Pintasan) -->
<div class="dash-main-grid">
    <!-- Kolom Kiri: Pengaduan Warga Terbaru -->
    <div class="modern-card">
        <div class="modern-card-header">
            <div class="modern-card-title">
                <i data-lucide="inbox" style="width: 20px; height: 20px; color: #059669;"></i>
                <span>Aspirasi &amp; Aduan Warga Terbaru</span>
            </div>
            <a href="<?= base_url('admin/pengaduan') ?>" class="modern-card-link">
                Kelola Semua &rarr;
            </a>
        </div>

        <!-- Breakdown status pengaduan -->
        <div class="aduan-stat-bar">
            <div class="aduan-stat-pill">
                <div class="num" style="color: #d97706;"><?= $countPendingAduan ?></div>
                <div class="lbl">Menunggu</div>
            </div>
            <div class="aduan-stat-pill">
                <div class="num" style="color: #2563eb;"><?= $countProsesAduan ?></div>
                <div class="lbl">Diproses</div>
            </div>
            <div class="aduan-stat-pill">
                <div class="num" style="color: #059669;"><?= $countSelesaiAduan ?></div>
                <div class="lbl">Selesai</div>
            </div>
        </div>

        <div style="overflow-x: auto;">
            <table class="table-modern">
                <thead>
                    <tr>
                        <th>Pelapor</th>
                        <th>Perihal Aduan</th>
                        <th>Status</th>
                        <th>Waktu Masuk</th>
                        <th style="text-align: right;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($latestAduan)): ?>
                        <tr>
                            <td colspan="5" style="padding: 2.5rem; text-align: center; color: #94a3b8;">
                                <i data-lucide="check-circle" style="width: 32px; height: 32px; margin-bottom: 0.5rem; opacity: 0.5;"></i>
                                <div>Belum ada laporan pengaduan baru dari warga.</div>
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($latestAduan as $row): ?>
                            <tr>
                                <td>
                                    <div style="font-weight: 700; color: #0f172a;"><?= esc($row['nama_pelapor']) ?></div>
                                    <div style="font-size: 0.76rem; color: #64748b;"><?= esc($row['dusun'] ?? '-') ?></div>
                                </td>
                                <td>
                                    <a href="<?= base_url('admin/pengaduan/detail/' . $row['id']) ?>" style="color: #0f172a; text-decoration: none; font-weight: 600; display: block; line-height: 1.35;">
                                        <?= esc($row['judul']) ?>
                                    </a>
                                    <span style="font-size: 0.72rem; color: #94a3b8;">Tiket: <?= esc($row['kode_tiket'] ?? '-') ?></span>
                                </td>
                                <td>
                                    <?php 
                                        $badgeClass = 'badge-diajukan';
                                        if ($row['status'] === 'selesai') $badgeClass = 'badge-selesai';
                                        elseif ($row['status'] === 'diproses') $badgeClass = 'badge-diproses';
                                        elseif ($row['status'] === 'ditolak') $badgeClass = 'badge-ditolak';
                                    ?>
                                    <span class="badge-modern <?= $badgeClass ?>">
                                        <?= esc($row['status']) ?>
                                    </span>
                                </td>
                                <td style="color: #64748b; font-size: 0.78rem; white-space: nowrap;">
                                    <?= date('d M Y, H:i', strtotime($row['created_at'])) ?>
                                </td>
                                <td style="text-align: right;">
                                    <a href="<?= base_url('admin/pengaduan/detail/' . $row['id']) ?>" 
                                        style="padding: 0.35rem 0.75rem; border-radius: 6px; background: #ecfdf5; color: #065f46; font-size: 0.75rem; font-weight: 700; text-decoration: none; display: inline-block;">
                                        Tanggapi
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Pesan & Aspirasi Warga Terbaru dari Floating Widget Beranda -->
        <div style="border-top: 1px solid var(--border); padding-top: 1.25rem; margin-top: 1rem;">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.85rem;">
                <div style="display: flex; align-items: center; gap: 0.5rem; font-weight: 800; font-size: 0.95rem; color: #0f172a;">
                    <i data-lucide="mail" style="width: 17px; height: 17px; color: #059669;"></i>
                    <span>Pesan &amp; Aspirasi Masuk dari Warga (Beranda)</span>
                </div>
                <a href="<?= base_url('admin/kontak') ?>" class="modern-card-link" style="font-size: 0.75rem;">
                    Buka Kotak Masuk &rarr;
                </a>
            </div>

            <?php if (empty($latestPesan)): ?>
                <div style="text-align: center; color: #94a3b8; padding: 1.25rem; font-size: 0.85rem;">
                    Belum ada pesan atau aspirasi baru dari warga.
                </div>
            <?php else: ?>
                <div style="display: flex; flex-direction: column; gap: 0.65rem;">
                    <?php foreach ($latestPesan as $p): ?>
                        <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 10px; padding: 0.75rem 1rem; display: flex; justify-content: space-between; align-items: flex-start; gap: 1rem;">
                            <div style="flex: 1; min-width: 0;">
                                <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 0.2rem;">
                                    <strong style="color: #0f172a; font-size: 0.88rem;"><?= esc($p['nama']) ?></strong>
                                    <span style="font-size: 0.72rem; color: #059669; background: #ecfdf5; padding: 0.15rem 0.5rem; border-radius: 9999px; font-weight: 700;">
                                        <?= esc($p['subjek']) ?>
                                    </span>
                                </div>
                                <p style="font-size: 0.8rem; color: #475569; margin: 0; line-height: 1.4;">
                                    <?= character_limiter(esc($p['pesan']), 90) ?>
                                </p>
                            </div>
                            <div style="text-align: right; flex-shrink: 0;">
                                <div style="font-size: 0.7rem; color: #94a3b8; margin-bottom: 0.25rem;">
                                    <?= date('d M, H:i', strtotime($p['created_at'])) ?>
                                </div>
                                <a href="<?= base_url('admin/kontak') ?>" style="font-size: 0.75rem; color: #0b6045; font-weight: 700; text-decoration: none;">
                                    Rincian &rarr;
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Kolom Kanan: Pintasan Cepat & Berita Terkini -->
    <div style="display: flex; flex-direction: column; gap: 1.5rem;">
        <!-- Card Menu Pintasan Cepat -->
        <div class="modern-card">
            <div class="modern-card-header">
                <div class="modern-card-title">
                    <i data-lucide="zap" style="width: 18px; height: 18px; color: #eab308;"></i>
                    <span>Aksi Cepat Admin</span>
                </div>
            </div>
            <div class="quick-grid">
                <a href="<?= base_url('admin/berita/create') ?>" class="quick-item">
                    <i data-lucide="file-plus"></i>
                    <span>Tambah Berita</span>
                </a>
                <a href="<?= base_url('admin/agenda/create') ?>" class="quick-item">
                    <i data-lucide="calendar-plus"></i>
                    <span>Tambah Agenda</span>
                </a>
                <a href="<?= base_url('admin/umkm/create') ?>" class="quick-item">
                    <i data-lucide="store"></i>
                    <span>Tambah UMKM</span>
                </a>
                <a href="<?= base_url('admin/peta/create') ?>" class="quick-item">
                    <i data-lucide="map-pin"></i>
                    <span>Titik Peta</span>
                </a>
                <a href="<?= base_url('admin/pembangunan/create') ?>" class="quick-item">
                    <i data-lucide="hammer"></i>
                    <span>Proyek Fisik</span>
                </a>
                <a href="<?= base_url('admin/galeri/create') ?>" class="quick-item">
                    <i data-lucide="image-plus"></i>
                    <span>Upload Foto</span>
                </a>
            </div>
        </div>

        <!-- Card Berita Terpublikasi Terakhir -->
        <div class="modern-card">
            <div class="modern-card-header">
                <div class="modern-card-title">
                    <i data-lucide="newspaper" style="width: 18px; height: 18px; color: #3b82f6;"></i>
                    <span>Kabar Berita Terkini</span>
                </div>
                <a href="<?= base_url('admin/berita') ?>" class="modern-card-link">Semua &rarr;</a>
            </div>
            <div style="padding: 1.25rem; display: flex; flex-direction: column; gap: 1rem;">
                <?php if (empty($latestBerita)): ?>
                    <div style="text-align: center; color: #94a3b8; padding: 1rem 0;">Belum ada berita yang dipublikasikan.</div>
                <?php else: ?>
                    <?php foreach ($latestBerita as $b): ?>
                        <div style="display: flex; gap: 0.85rem; align-items: flex-start; border-bottom: 1px solid #f8fafc; padding-bottom: 0.85rem;">
                            <div style="width: 54px; height: 54px; border-radius: 10px; background: #f1f5f9; overflow: hidden; flex-shrink: 0;">
                                <?php $thumb = !empty($b['thumbnail']) ? $b['thumbnail'] : 'images/berita-meeting.webp'; ?>
                                <img src="<?= base_url($thumb) ?>" alt="<?= esc($b['title']) ?>" style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                            <div style="flex: 1; min-width: 0;">
                                <h4 style="font-size: 0.88rem; font-weight: 700; color: #0f172a; line-height: 1.35; margin-bottom: 0.25rem;">
                                    <a href="<?= base_url('berita/' . $b['slug']) ?>" target="_blank" style="color: inherit; text-decoration: none;">
                                        <?= character_limiter(esc($b['title']), 45) ?>
                                    </a>
                                </h4>
                                <div style="font-size: 0.72rem; color: #94a3b8; display: flex; align-items: center; gap: 0.5rem;">
                                    <span><?= date('d M Y', strtotime($b['created_at'])) ?></span>
                                    <span>&bull;</span>
                                    <span style="color: #059669; font-weight: 700; text-transform: uppercase;"><?= esc($b['status']) ?></span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
