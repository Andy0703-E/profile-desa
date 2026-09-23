<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<section style="background: linear-gradient(135deg, #0b4632 0%, #062b1e 100%); padding: 3rem 0 3.5rem; color: #ffffff;">
    <div class="container">
        <div style="display: flex; align-items: center; gap: 0.5rem; font-size: 0.85rem; color: #a7f3d0; margin-bottom: 0.75rem;">
            <a href="<?= base_url() ?>" style="color: inherit; text-decoration: none;">Beranda</a>
            <i data-lucide="chevron-right" style="width: 14px; height: 14px;"></i>
            <span style="color: #ffffff; font-weight: 600;">Pengaduan Warga</span>
        </div>
        <h1 style="font-size: 2.2rem; font-weight: 800; margin-bottom: 0.5rem; letter-spacing: -0.02em;">Layanan Pengaduan & Aspirasi Warga</h1>
        <p style="color: #d1fae5; max-width: 650px; font-size: 0.95rem; line-height: 1.6;">
            Sampaikan laporan, keluhan pelayanan, maupun aspirasi pembangunan desa secara langsung dan transparan kepada Pemerintah <?= esc($desa['nama_desa']) ?>.
        </p>
    </div>
</section>

<div class="container" style="padding-top: 2rem; padding-bottom: 4rem;">
    <!-- Notifikasi Flash -->
    <?php if (session()->getFlashdata('success')): ?>
        <div style="background: #ecfdf5; border-left: 4px solid #10b981; padding: 1rem 1.25rem; border-radius: 8px; margin-bottom: 2rem; color: #065f46; font-size: 0.9rem;">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('errors')): ?>
        <div style="background: #fef2f2; border-left: 4px solid #ef4444; padding: 1rem 1.25rem; border-radius: 8px; margin-bottom: 2rem; color: #991b1b; font-size: 0.9rem;">
            <ul style="margin-left: 1.25rem;">
                <?php foreach (session()->getFlashdata('errors') as $err): ?>
                    <li><?= esc($err) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <div class="mobile-stack-1col" style="display: grid; grid-template-columns: 3fr 2fr; gap: 2.5rem;">
        <!-- Kolom Kiri: Form Buat Laporan -->
        <div style="background: #ffffff; border-radius: 16px; border: 1px solid #e2e8f0; padding: clamp(1rem, 3vw, 2rem); box-shadow: 0 4px 20px rgba(0,0,0,0.03);">
            <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 1.5rem; border-bottom: 1px solid #f1f5f9; padding-bottom: 1rem;">
                <div style="width: 40px; height: 40px; border-radius: 10px; background: #ecfdf5; color: #059669; display: flex; align-items: center; justify-content: center;">
                    <i data-lucide="message-square-plus" style="width: 22px; height: 22px;"></i>
                </div>
                <div>
                    <h2 style="font-size: 1.25rem; font-weight: 800; color: #0f172a;">Formulir Pengaduan Warga</h2>
                    <p style="font-size: 0.82rem; color: #64748b;">Isi data pelapor dan uraian masalah dengan jelas</p>
                </div>
            </div>

            <form method="post" action="<?= base_url('pengaduan/kirim') ?>" enctype="multipart/form-data">
                <?= csrf_field() ?>

                <div class="mobile-form-1col" style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1rem;">
                    <div>
                        <label style="display: block; font-size: 0.82rem; font-weight: 700; color: #334155; margin-bottom: 0.35rem;">Nama Lengkap Pelapor *</label>
                        <input type="text" name="nama_pelapor" value="<?= old('nama_pelapor') ?>" required 
                               style="width: 100%; padding: 0.65rem 0.85rem; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 0.88rem; outline: none;">
                    </div>
                    <div>
                        <label style="display: block; font-size: 0.82rem; font-weight: 700; color: #334155; margin-bottom: 0.35rem;">No. WhatsApp / HP Aktif *</label>
                        <input type="text" name="no_hp" value="<?= old('no_hp') ?>" required placeholder="Contoh: 082194xxxx"
                               style="width: 100%; padding: 0.65rem 0.85rem; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 0.88rem; outline: none;">
                    </div>
                </div>

                <div class="mobile-form-1col" style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1rem;">
                    <div>
                        <label style="display: block; font-size: 0.82rem; font-weight: 700; color: #334155; margin-bottom: 0.35rem;">NIK (Opsional)</label>
                        <input type="text" name="nik" value="<?= old('nik') ?>" placeholder="16 digit NIK"
                               style="width: 100%; padding: 0.65rem 0.85rem; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 0.88rem; outline: none;">
                    </div>
                    <div>
                        <label style="display: block; font-size: 0.82rem; font-weight: 700; color: #334155; margin-bottom: 0.35rem;">Dusun Domisili *</label>
                        <select name="dusun" required style="width: 100%; padding: 0.65rem 0.85rem; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 0.88rem; background: #fff; outline: none;">
                            <option value="">Pilih Dusun...</option>
                            <option value="Dusun Pesisir" <?= old('dusun') === 'Dusun Pesisir' ? 'selected' : '' ?>>Dusun Pesisir</option>
                            <option value="Dusun Darat Makmur" <?= old('dusun') === 'Dusun Darat Makmur' ? 'selected' : '' ?>>Dusun Darat Makmur</option>
                            <option value="Dusun Karangan Timur" <?= old('dusun') === 'Dusun Karangan Timur' ? 'selected' : '' ?>>Dusun Karangan Timur</option>
                            <option value="Dusun Bone Tanjung" <?= old('dusun') === 'Dusun Bone Tanjung' ? 'selected' : '' ?>>Dusun Bone Tanjung</option>
                        </select>
                    </div>
                </div>

                <div class="mobile-form-1col" style="display: grid; grid-template-columns: 2fr 1fr; gap: 1rem; margin-bottom: 1rem;">
                    <div>
                        <label style="display: block; font-size: 0.82rem; font-weight: 700; color: #334155; margin-bottom: 0.35rem;">Judul / Pokok Pengaduan *</label>
                        <input type="text" name="judul" value="<?= old('judul') ?>" required placeholder="Contoh: Lampu jalan rusak, antrean bansos..."
                               style="width: 100%; padding: 0.65rem 0.85rem; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 0.88rem; outline: none;">
                    </div>
                    <div>
                        <label style="display: block; font-size: 0.82rem; font-weight: 700; color: #334155; margin-bottom: 0.35rem;">Kategori *</label>
                        <select name="kategori" required style="width: 100%; padding: 0.65rem 0.85rem; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 0.88rem; background: #fff; outline: none;">
                            <option value="Infrastruktur">Infrastruktur</option>
                            <option value="Pelayanan Publik">Pelayanan Publik</option>
                            <option value="Bansos & Kesejahteraan">Bansos & Kesejahteraan</option>
                            <option value="Lingkungan">Lingkungan</option>
                            <option value="Keamanan">Keamanan & Ketertiban</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>
                </div>

                <div style="margin-bottom: 1rem;">
                    <label style="display: block; font-size: 0.82rem; font-weight: 700; color: #334155; margin-bottom: 0.35rem;">Uraian Pengaduan Lengkap *</label>
                    <textarea name="isi_aduan" rows="4" required placeholder="Jelaskan kronologi, lokasi spesifik, dan harapan warga..."
                              style="width: 100%; padding: 0.65rem 0.85rem; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 0.88rem; outline: none; resize: vertical;"><?= old('isi_aduan') ?></textarea>
                </div>

                <div style="margin-bottom: 1.5rem;">
                    <label style="display: block; font-size: 0.82rem; font-weight: 700; color: #334155; margin-bottom: 0.35rem;">Lampiran Foto Bukti (Opsional)</label>
                    <input type="file" name="foto_bukti" accept="image/*" 
                           style="width: 100%; padding: 0.5rem; border-radius: 8px; border: 1px dashed #cbd5e1; font-size: 0.82rem;">
                    <small style="color: #94a3b8; font-size: 0.75rem;">Format: JPG, PNG, WEBP (Maksimal 2 MB)</small>
                </div>

                <button type="submit" style="width: 100%; padding: 0.75rem; border-radius: 8px; background: #0b6045; color: #ffffff; font-weight: 700; font-size: 0.95rem; border: none; cursor: pointer; display: flex; align-items: center; justify-content: center; gap: 0.5rem;">
                    <i data-lucide="send" style="width: 18px; height: 18px;"></i> Kirim Pengaduan Sekarang
                </button>
            </form>
        </div>

        <!-- Kolom Kanan: Cek Status Pengaduan -->
        <div>
            <div style="background: #ffffff; border-radius: 16px; border: 1px solid #e2e8f0; padding: 1.75rem; box-shadow: 0 4px 20px rgba(0,0,0,0.03); margin-bottom: 2rem;">
                <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 1.25rem;">
                    <div style="width: 38px; height: 38px; border-radius: 8px; background: #eff6ff; color: #2563eb; display: flex; align-items: center; justify-content: center;">
                        <i data-lucide="search" style="width: 20px; height: 20px;"></i>
                    </div>
                    <div>
                        <h3 style="font-size: 1.15rem; font-weight: 700; color: #0f172a;">Lacak Pengaduan Anda</h3>
                        <p style="font-size: 0.8rem; color: #64748b;">Masukkan nomor tiket laporan</p>
                    </div>
                </div>

                <form method="get" action="<?= base_url('pengaduan/status') ?>">
                    <div style="margin-bottom: 1rem;">
                        <input type="text" name="tiket" required placeholder="Contoh: ADU-202609-001"
                               style="width: 100%; padding: 0.7rem 0.85rem; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 0.9rem; text-transform: uppercase; font-family: monospace; outline: none;">
                    </div>
                    <button type="submit" style="width: 100%; padding: 0.65rem; border-radius: 8px; background: #1e293b; color: #ffffff; font-weight: 700; font-size: 0.88rem; border: none; cursor: pointer;">
                        Cek Status Laporan
                    </button>
                </form>
            </div>

            <!-- Alur Penanganan -->
            <div style="background: #f8fafc; border-radius: 16px; border: 1px solid #e2e8f0; padding: 1.5rem;">
                <h4 style="font-size: 0.95rem; font-weight: 700; color: #0f172a; margin-bottom: 1rem;">Alur Penanganan Aduan</h4>
                <ol style="padding-left: 1.25rem; font-size: 0.82rem; color: #475569; display: flex; flex-direction: column; gap: 0.6rem;">
                    <li><strong>Kirim Laporan:</strong> Warga mengirimkan formulir dan menerima Nomor Tiket unik.</li>
                    <li><strong>Verifikasi:</strong> Operator desa memeriksa keabsahan laporan dalam 1x24 jam.</li>
                    <li><strong>Tindak Lanjut:</strong> Perangkat desa/Kasi terkait menindaklanjuti ke lapangan.</li>
                    <li><strong>Selesai:</strong> Hasil penanganan dan tanggapan resmi ditampilkan pada portal.</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
