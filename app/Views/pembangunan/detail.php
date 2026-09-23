<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<section style="background: linear-gradient(135deg, #0b4632 0%, #062b1e 100%); padding: 3rem 0 3.5rem; color: #ffffff;">
    <div class="container">
        <div style="display: flex; align-items: center; gap: 0.5rem; font-size: 0.85rem; color: #a7f3d0; margin-bottom: 0.75rem;">
            <a href="<?= base_url() ?>" style="color: inherit; text-decoration: none;">Beranda</a>
            <i data-lucide="chevron-right" style="width: 14px; height: 14px;"></i>
            <a href="<?= base_url('pembangunan') ?>" style="color: inherit; text-decoration: none;">Pembangunan</a>
            <i data-lucide="chevron-right" style="width: 14px; height: 14px;"></i>
            <span style="color: #ffffff; font-weight: 600;">Detail</span>
        </div>
        <span style="display: inline-block; padding: 0.25rem 0.75rem; border-radius: 9999px; background: rgba(255,255,255,0.2); font-size: 0.8rem; font-weight: 700; margin-bottom: 0.5rem;">
            <?= esc($item['bidang']) ?> &bull; TA <?= esc($item['tahun']) ?>
        </span>
        <h1 style="font-size: 2.2rem; font-weight: 800; margin-bottom: 0.5rem; letter-spacing: -0.02em;"><?= esc($item['nama_kegiatan']) ?></h1>
        <p style="color: #d1fae5; font-size: 0.95rem;">
            <i data-lucide="map-pin" style="width: 15px; height: 15px; display: inline; vertical-align: middle;"></i> Lokasi: <?= esc($item['lokasi']) ?>, <?= esc($item['dusun']) ?>
        </p>
    </div>
</section>

<div class="container" style="padding-top: 2rem; padding-bottom: 4rem;">
    <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 2rem;">
        <!-- Kolom Kiri: Foto Sebelum / Sesudah & Deskripsi -->
        <div>
            <!-- Grid Foto Before / After -->
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 2rem;">
                <div style="background: #ffffff; border-radius: 12px; border: 1px solid #e2e8f0; overflow: hidden;">
                    <div style="padding: 0.5rem 1rem; background: #f8fafc; font-size: 0.8rem; font-weight: 700; color: #64748b; border-bottom: 1px solid #e2e8f0;">
                        Kondisi Sebelum Pembangunan
                    </div>
                    <div style="height: 220px; background: #f1f5f9;">
                        <?php if (!empty($item['foto_sebelum'])): ?>
                            <img src="<?= base_url($item['foto_sebelum']) ?>" style="width: 100%; height: 100%; object-fit: cover;">
                        <?php else: ?>
                            <div style="height: 100%; display: flex; align-items: center; justify-content: center; color: #94a3b8; font-size: 0.85rem;">Foto tidak tersedia</div>
                        <?php endif; ?>
                    </div>
                </div>

                <div style="background: #ffffff; border-radius: 12px; border: 1px solid #e2e8f0; overflow: hidden;">
                    <div style="padding: 0.5rem 1rem; background: #ecfdf5; font-size: 0.8rem; font-weight: 700; color: #059669; border-bottom: 1px solid #d1fae5;">
                        Kondisi Realisasi / Terkini
                    </div>
                    <div style="height: 220px; background: #f1f5f9;">
                        <?php if (!empty($item['foto_sesudah'])): ?>
                            <img src="<?= base_url($item['foto_sesudah']) ?>" style="width: 100%; height: 100%; object-fit: cover;">
                        <?php else: ?>
                            <div style="height: 100%; display: flex; align-items: center; justify-content: center; color: #94a3b8; font-size: 0.85rem;">Foto tidak tersedia</div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Manfaat & Keterangan Proyek -->
            <div style="background: #ffffff; border-radius: 16px; border: 1px solid #e2e8f0; padding: 1.5rem; margin-bottom: 2rem;">
                <h3 style="font-size: 1.15rem; font-weight: 700; color: #0f172a; margin-bottom: 0.75rem;">Manfaat Bagi Masyarakat</h3>
                <p style="font-size: 0.95rem; color: #334155; line-height: 1.7;">
                    <?= nl2br(esc($item['manfaat'])) ?>
                </p>
            </div>
        </div>

        <!-- Kolom Kanan: Rincian Teknis & Progres -->
        <div>
            <div style="background: #ffffff; border-radius: 16px; border: 1px solid #e2e8f0; padding: 1.5rem; box-shadow: 0 4px 15px rgba(0,0,0,0.03);">
                <h3 style="font-size: 1.1rem; font-weight: 700; color: #0f172a; margin-bottom: 1.25rem;">Rincian Anggaran & Fisik</h3>
                
                <div style="margin-bottom: 1.5rem;">
                    <span style="font-size: 0.8rem; color: #64748b;">Status Progres Fisik</span>
                    <div style="display: flex; justify-content: space-between; align-items: center; margin: 0.25rem 0 0.5rem;">
                        <span style="font-size: 1.5rem; font-weight: 800; color: <?= $item['progres'] >= 100 ? '#059669' : '#d97706' ?>;"><?= $item['progres'] ?>%</span>
                        <span style="padding: 0.25rem 0.6rem; border-radius: 9999px; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; <?= $item['status'] === 'selesai' ? 'background: #ecfdf5; color: #059669;' : 'background: #fef3c7; color: #d97706;' ?>">
                            <?= ucfirst($item['status']) ?>
                        </span>
                    </div>
                    <div style="width: 100%; height: 8px; background: #e2e8f0; border-radius: 4px; overflow: hidden;">
                        <div style="width: <?= min(100, $item['progres']) ?>%; height: 100%; background: <?= $item['progres'] >= 100 ? '#10b981' : '#f59e0b' ?>;"></div>
                    </div>
                </div>

                <div style="border-top: 1px solid #f1f5f9; padding-top: 1rem; display: flex; flex-direction: column; gap: 0.75rem; font-size: 0.85rem;">
                    <div>
                        <div style="color: #64748b;">Pagu Anggaran</div>
                        <div style="font-size: 1.1rem; font-weight: 800; color: #059669;">Rp <?= number_format($item['anggaran'], 0, ',', '.') ?></div>
                    </div>
                    <div>
                        <div style="color: #64748b;">Sumber Dana</div>
                        <strong style="color: #1e293b;"><?= esc($item['sumber_dana']) ?></strong>
                    </div>
                    <div>
                        <div style="color: #64748b;">Volume Kegiatan</div>
                        <strong style="color: #1e293b;"><?= esc($item['volume']) ?></strong>
                    </div>
                    <div>
                        <div style="color: #64748b;">Pelaksana Kegiatan</div>
                        <strong style="color: #1e293b;"><?= esc($item['pelaksana']) ?></strong>
                    </div>
                    <div>
                        <div style="color: #64748b;">Tahun Anggaran</div>
                        <strong style="color: #1e293b;">TA <?= esc($item['tahun']) ?></strong>
                    </div>
                </div>

                <div style="margin-top: 1.5rem;">
                    <a href="<?= base_url('pembangunan') ?>" style="display: block; text-align: center; padding: 0.65rem; border-radius: 8px; background: #f1f5f9; color: #475569; font-weight: 600; font-size: 0.85rem; text-decoration: none;">
                        &larr; Kembali ke Daftar Pembangunan
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
