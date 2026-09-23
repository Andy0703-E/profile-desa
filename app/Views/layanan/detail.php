<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<style>
    .page-header {
        background: linear-gradient(135deg, #f0fdf4 0%, #ffffff 100%);
        padding: 2.5rem 0 1.5rem;
        border-bottom: 1px solid var(--border-subtle);
        margin-bottom: 2rem;
    }
    .back-nav {
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        color: #15803d;
        font-weight: 600;
        font-size: 0.85rem;
        margin-bottom: 0.75rem;
    }
    .layout-detail-grid {
        display: grid;
        grid-template-columns: 1.1fr 1.3fr;
        gap: 2rem;
        align-items: start;
    }
    .card-box {
        background: #ffffff;
        border-radius: var(--radius-xl);
        border: 1px solid var(--border-subtle);
        box-shadow: var(--shadow-card);
        padding: 2rem;
    }
    .persyaratan-list {
        list-style: none;
        margin: 1.25rem 0;
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
    }
    .persyaratan-item {
        display: flex;
        align-items: flex-start;
        gap: 0.75rem;
        font-size: 0.9rem;
        color: #334155;
    }
    .check-bullet {
        width: 22px;
        height: 22px;
        border-radius: 50%;
        background: #dcfce7;
        color: #15803d;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        margin-top: 2px;
    }
    .form-group {
        margin-bottom: 1.25rem;
    }
    .form-label {
        display: block;
        font-size: 0.85rem;
        font-weight: 600;
        color: #334155;
        margin-bottom: 0.35rem;
    }
    .form-input {
        width: 100%;
        padding: 0.75rem 1rem;
        border-radius: var(--radius-md);
        border: 1.5px solid var(--border-subtle);
        font-size: 0.9rem;
        outline: none;
    }
    .form-input:focus {
        border-color: #15803d;
        box-shadow: 0 0 0 3px rgba(21, 128, 61, 0.12);
    }
    .btn-submit-apply {
        width: 100%;
        background: #15803d;
        color: #ffffff;
        border: none;
        padding: 0.85rem;
        border-radius: var(--radius-pill);
        font-size: 1rem;
        font-weight: 700;
        cursor: pointer;
        transition: background 0.2s;
        margin-top: 0.5rem;
    }
    .btn-submit-apply:hover {
        background: #166534;
    }
    .form-grid-2 {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
    }
    @media (max-width: 860px) {
        .layout-detail-grid {
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }
        .card-box {
            padding: 1.5rem 1.25rem;
        }
    }
    @media (max-width: 640px) {
        .page-header h1 {
            font-size: 1.5rem !important;
        }
        .card-box {
            padding: 1.25rem 1rem;
            border-radius: var(--radius-lg);
        }
        .form-grid-2 {
            grid-template-columns: 1fr;
            gap: 0;
        }
    }
</style>

<div class="page-header">
    <div class="container">
        <a href="<?= base_url('layanan') ?>" class="back-nav">
            <i data-lucide="arrow-left" style="width: 16px; height: 16px;"></i>
            <span>Kembali ke Daftar Layanan</span>
        </a>
        <h1 style="font-size: 2rem; font-weight: 800; color: #14532d;"><?= esc($layanan['nama_layanan']) ?></h1>
    </div>
</div>

<div class="container">
    <div class="layout-detail-grid">
        <!-- Left: Requirements & Info -->
        <div class="card-box">
            <h2 style="font-size: 1.25rem; font-weight: 700; color: #14532d; margin-bottom: 0.5rem;">Informasi &amp; Persyaratan</h2>
            <p style="font-size: 0.9rem; color: #64748b; line-height: 1.6;"><?= esc($layanan['deskripsi']) ?></p>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 0.75rem; margin-top: 1.25rem; background: #f8fafc; padding: 1rem; border-radius: var(--radius-md);">
                <div>
                    <span style="font-size: 0.75rem; color: #64748b; text-transform: uppercase;">Biaya:</span>
                    <div style="font-size: 1rem; font-weight: 700; color: #15803d;"><?= esc($layanan['biaya']) ?></div>
                </div>
                <div>
                    <span style="font-size: 0.75rem; color: #64748b; text-transform: uppercase;">Waktu Proses:</span>
                    <div style="font-size: 1rem; font-weight: 700; color: #1e293b;"><?= esc($layanan['estimasi_waktu']) ?></div>
                </div>
            </div>

            <h3 style="font-size: 1rem; font-weight: 700; color: #1e293b; margin-top: 1.5rem;">Berkas Persyaratan yang Diperlukan:</h3>
            <ul class="persyaratan-list">
                <?php if (! empty($persyaratanList)) : ?>
                    <?php foreach ($persyaratanList as $p) : ?>
                        <li class="persyaratan-item">
                            <span class="check-bullet"><i data-lucide="check" style="width: 14px; height: 14px;"></i></span>
                            <div>
                                <strong><?= esc($p['nama_persyaratan']) ?></strong>
                                <?php if (! empty($p['keterangan'])) : ?>
                                    <div style="font-size: 0.8rem; color: #64748b;"><?= esc($p['keterangan']) ?></div>
                                <?php endif; ?>
                            </div>
                        </li>
                    <?php endforeach; ?>
                <?php else : ?>
                    <li style="color: #64748b; font-size: 0.875rem;">Persyaratan umum: KTP dan KK asli / fotokopi.</li>
                <?php endif; ?>
            </ul>
        </div>

        <!-- Right: Application Form -->
        <div class="card-box">
            <h2 style="font-size: 1.25rem; font-weight: 700; color: #14532d; margin-bottom: 0.35rem;">Formulir Pengajuan Online</h2>
            <p style="font-size: 0.85rem; color: #64748b; margin-bottom: 1.25rem;">Isi formulir dengan data yang sah untuk diverifikasi oleh perangkat desa.</p>

            <form action="<?= base_url('layanan/ajukan/' . esc($layanan['slug'])) ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>

                <div class="form-group">
                    <label class="form-label" for="nama_pemohon">Nama Lengkap Sesuai KTP <span style="color: #ef4444;">*</span></label>
                    <input type="text" name="nama_pemohon" id="nama_pemohon" class="form-input" value="<?= esc(old('nama_pemohon')) ?>" required placeholder="Contoh: Muhammad Rusli">
                </div>

                <div class="form-group">
                    <label class="form-label" for="nik">Nomor Induk Kependudukan (NIK 16 Digit) <span style="color: #ef4444;">*</span></label>
                    <input type="text" name="nik" id="nik" class="form-input" maxlength="16" pattern="\d{16}" value="<?= esc(old('nik')) ?>" required placeholder="Contoh: 730101xxxxxxxxxx">
                </div>

                <div class="form-grid-2">
                    <div class="form-group">
                        <label class="form-label" for="no_hp">Nomor HP / WhatsApp <span style="color: #ef4444;">*</span></label>
                        <input type="text" name="no_hp" id="no_hp" class="form-input" value="<?= esc(old('no_hp')) ?>" required placeholder="08xxxxxxxxxx">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email">Email (Opsional)</label>
                        <input type="email" name="email" id="email" class="form-input" value="<?= esc(old('email')) ?>" placeholder="nama@email.com">
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label" for="alamat">Alamat Domisili di Desa Batu Bingkung <span style="color: #ef4444;">*</span></label>
                    <textarea name="alamat" id="alamat" class="form-input" rows="2" required placeholder="Contoh: Dusun Pesisir RT 01 / RW 01"><?= esc(old('alamat')) ?></textarea>
                </div>

                <div class="form-group">
                    <label class="form-label" for="catatan">Keperluan / Keterangan Tambahan</label>
                    <textarea name="catatan" id="catatan" class="form-input" rows="2" placeholder="Tuliskan tujuan permohonan surat ini..."><?= esc(old('catatan')) ?></textarea>
                </div>

                <div class="form-group">
                    <label class="form-label" for="berkas">Lampiran Dokumen Pendukung (KTP/KK - Format PDF/JPG/PNG, Max 5MB)</label>
                    <input type="file" name="berkas" id="berkas" class="form-input" accept=".pdf,.jpg,.jpeg,.png">
                </div>

                <button type="submit" class="btn-submit-apply">
                    Kirim Pengajuan Layanan
                </button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
