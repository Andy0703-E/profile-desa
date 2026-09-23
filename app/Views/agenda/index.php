<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<section style="background: linear-gradient(135deg, #0b4632 0%, #062b1e 100%); padding: 3rem 0 3.5rem; color: #ffffff;">
    <div class="container">
        <div style="display: flex; align-items: center; gap: 0.5rem; font-size: 0.85rem; color: #a7f3d0; margin-bottom: 0.75rem;">
            <a href="<?= base_url() ?>" style="color: inherit; text-decoration: none;">Beranda</a>
            <i data-lucide="chevron-right" style="width: 14px; height: 14px;"></i>
            <span style="color: #ffffff; font-weight: 600;">Agenda Desa</span>
        </div>
        <h1 style="font-size: 2.2rem; font-weight: 800; margin-bottom: 0.5rem; letter-spacing: -0.02em;">Agenda & Jadwal Kegiatan Desa</h1>
        <p style="color: #d1fae5; max-width: 650px; font-size: 0.95rem; line-height: 1.6;">
            Informasi jadwal musyawarah desa, posyandu, gotong royong warga, pelatihan, dan kegiatan pelayanan publik di wilayah <?= esc($desa['nama_desa']) ?>.
        </p>

        <!-- Filter Kategori -->
        <div style="margin-top: 1.5rem; display: flex; gap: 0.5rem; flex-wrap: wrap;">
            <a href="<?= base_url('agenda?kategori=semua') ?>" 
               style="padding: 0.45rem 1.1rem; border-radius: 9999px; font-weight: 600; font-size: 0.82rem; text-decoration: none; transition: 0.2s; <?= $currentCat === 'semua' ? 'background: #10b981; color: #fff;' : 'background: rgba(255,255,255,0.15); color: #fff;' ?>">
                Semua Agenda
            </a>
            <?php foreach ($kategoriList as $k): ?>
                <a href="<?= base_url('agenda?kategori=' . urlencode($k['kategori'])) ?>" 
                   style="padding: 0.45rem 1.1rem; border-radius: 9999px; font-weight: 600; font-size: 0.82rem; text-decoration: none; transition: 0.2s; <?= $currentCat === $k['kategori'] ? 'background: #10b981; color: #fff;' : 'background: rgba(255,255,255,0.15); color: #fff;' ?>">
                    <?= esc($k['kategori']) ?>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<div class="container" style="padding-top: 2rem; padding-bottom: 4rem;">
    <div style="display: flex; flex-direction: column; gap: 1.25rem;">
        <?php if (empty($agendaList)): ?>
            <div style="background: #ffffff; border-radius: 16px; border: 1px solid #e2e8f0; padding: 3rem; text-align: center; color: #64748b;">
                <i data-lucide="calendar-x" style="width: 48px; height: 48px; margin-bottom: 1rem; color: #94a3b8;"></i>
                <h3 style="font-size: 1.15rem; font-weight: 700; color: #1e293b;">Belum ada agenda kegiatan</h3>
                <p>Belum ada jadwal kegiatan terdaftar pada kategori yang dipilih.</p>
            </div>
        <?php else: ?>
            <?php foreach ($agendaList as $ag): ?>
                <div style="background: #ffffff; border-radius: 16px; border: 1px solid #e2e8f0; padding: 1.5rem; box-shadow: 0 4px 15px rgba(0,0,0,0.02); display: flex; gap: 1.75rem; align-items: flex-start; flex-wrap: wrap;">
                    <!-- Badge Tanggal Kalender -->
                    <div style="min-width: 90px; text-align: center; background: #ecfdf5; border: 1px solid #a7f3d0; border-radius: 12px; padding: 0.75rem 0.5rem;">
                        <span style="display: block; font-size: 0.75rem; font-weight: 700; color: #059669; text-transform: uppercase;">
                            <?= date('M Y', strtotime($ag['tanggal_mulai'])) ?>
                        </span>
                        <strong style="display: block; font-size: 2rem; font-weight: 800; color: #064e3b; line-height: 1;">
                            <?= date('d', strtotime($ag['tanggal_mulai'])) ?>
                        </strong>
                        <span style="display: block; font-size: 0.7rem; color: #047857; margin-top: 0.2rem;">
                            <?= date('D', strtotime($ag['tanggal_mulai'])) ?>
                        </span>
                    </div>

                    <!-- Informasi Detail -->
                    <div style="flex: 1; min-width: 260px;">
                        <div style="display: flex; gap: 0.5rem; align-items: center; margin-bottom: 0.4rem;">
                            <span style="font-size: 0.75rem; font-weight: 700; text-transform: uppercase; padding: 0.2rem 0.5rem; border-radius: 4px; background: #f1f5f9; color: #475569;">
                                <?= esc($ag['kategori']) ?>
                            </span>
                            <span style="font-size: 0.75rem; font-weight: 700; padding: 0.2rem 0.5rem; border-radius: 4px; background: #e0f2fe; color: #0284c7;">
                                <?= str_replace('_', ' ', ucfirst($ag['status'])) ?>
                            </span>
                        </div>

                        <h3 style="font-size: 1.2rem; font-weight: 800; color: #0f172a; margin-bottom: 0.5rem;">
                            <?= esc($ag['judul']) ?>
                        </h3>

                        <div style="display: flex; flex-wrap: wrap; gap: 1.25rem; font-size: 0.85rem; color: #64748b; margin-bottom: 0.75rem;">
                            <div style="display: flex; align-items: center; gap: 0.35rem;">
                                <i data-lucide="clock" style="width: 15px; height: 15px; color: #0b6045;"></i>
                                <span><?= esc($ag['jam_mulai']) ?> - <?= esc($ag['jam_selesai']) ?></span>
                            </div>
                            <div style="display: flex; align-items: center; gap: 0.35rem;">
                                <i data-lucide="map-pin" style="width: 15px; height: 15px; color: #0b6045;"></i>
                                <span><?= esc($ag['lokasi']) ?></span>
                            </div>
                            <div style="display: flex; align-items: center; gap: 0.35rem;">
                                <i data-lucide="users" style="width: 15px; height: 15px; color: #0b6045;"></i>
                                <span><?= esc($ag['penyelenggara']) ?></span>
                            </div>
                        </div>

                        <p style="font-size: 0.88rem; color: #334155; line-height: 1.6;">
                            <?= nl2br(esc($ag['deskripsi'])) ?>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

<?= $this->endSection() ?>
