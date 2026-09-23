<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<style>
    .page-header {
        background: linear-gradient(135deg, #f0fdf4 0%, #ffffff 100%);
        padding: 3rem 0 2rem;
        border-bottom: 1px solid var(--border-subtle);
        margin-bottom: 2.5rem;
    }
    .kontak-grid {
        display: grid;
        grid-template-columns: 1fr 1.3fr;
        gap: 2.5rem;
        align-items: start;
    }
    .kontak-info-card {
        background: #ffffff;
        border-radius: var(--radius-xl);
        border: 1px solid var(--border-subtle);
        box-shadow: var(--shadow-card);
        padding: 2rem;
    }
    .kontak-row {
        display: flex;
        gap: 1rem;
        margin-bottom: 1.5rem;
    }
    .kontak-icon-wrap {
        width: 44px;
        height: 44px;
        border-radius: 12px;
        background: #dcfce7;
        color: #15803d;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }
    .kontak-form-card {
        background: #ffffff;
        border-radius: var(--radius-xl);
        border: 1px solid var(--border-subtle);
        box-shadow: var(--shadow-card);
        padding: 2.25rem;
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
    .form-control-input {
        width: 100%;
        padding: 0.75rem 1rem;
        border-radius: var(--radius-md);
        border: 1.5px solid var(--border-subtle);
        font-size: 0.9rem;
        outline: none;
    }
    .form-control-input:focus {
        border-color: #15803d;
    }
    .btn-send-message {
        background: #15803d;
        color: #ffffff;
        border: none;
        padding: 0.85rem 2rem;
        border-radius: var(--radius-pill);
        font-size: 0.95rem;
        font-weight: 700;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: background 0.2s;
    }
    .btn-send-message:hover {
        background: #166534;
    }
    .form-row-2 {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
    }
    @media (max-width: 860px) {
        .kontak-grid {
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }
        .kontak-info-card, .kontak-form-card {
            padding: 1.5rem 1.25rem;
        }
    }
    @media (max-width: 640px) {
        .page-header {
            padding: 2rem 0 1.25rem;
            margin-bottom: 1.5rem;
        }
        .page-header h1 {
            font-size: 1.65rem !important;
        }
        .kontak-info-card, .kontak-form-card {
            padding: 1.25rem 1rem;
            border-radius: var(--radius-lg);
        }
        .form-row-2 {
            grid-template-columns: 1fr;
            gap: 0;
        }
        .btn-send-message {
            width: 100%;
            justify-content: center;
        }
        .kontak-row {
            word-break: break-word;
        }
    }
</style>

<div class="page-header">
    <div class="container">
        <h1 style="font-size: 2.25rem; font-weight: 800; color: #14532d;">Kontak &amp; Informasi Layanan</h1>
        <p style="font-size: 1rem; color: #64748b; margin-top: 0.5rem;">Sampaikan pertanyaan, kritik, maupun saran membangun untuk Pemerintah Desa</p>
    </div>
</div>

<div class="container" style="margin-bottom: 4rem;">
    <div class="kontak-grid">
        <!-- Info Column -->
        <div class="kontak-info-card">
            <h2 style="font-size: 1.25rem; font-weight: 800; color: #14532d; margin-bottom: 1.5rem;">Kantor Desa Batu Bingkung</h2>

            <div class="kontak-row">
                <div class="kontak-icon-wrap">
                    <i data-lucide="map-pin" style="width: 22px; height: 22px;"></i>
                </div>
                <div>
                    <strong style="display: block; font-size: 0.9rem; color: #1e293b;">Alamat Kantor</strong>
                    <span style="font-size: 0.875rem; color: #64748b;"><?= esc($desa['alamat']) ?></span>
                </div>
            </div>

            <div class="kontak-row">
                <div class="kontak-icon-wrap">
                    <i data-lucide="clock" style="width: 22px; height: 22px;"></i>
                </div>
                <div>
                    <strong style="display: block; font-size: 0.9rem; color: #1e293b;">Jam Pelayanan</strong>
                    <span style="font-size: 0.875rem; color: #64748b;"><?= esc($desa['jam_pelayanan']) ?></span>
                </div>
            </div>

            <div class="kontak-row">
                <div class="kontak-icon-wrap">
                    <i data-lucide="mail" style="width: 22px; height: 22px;"></i>
                </div>
                <div>
                    <strong style="display: block; font-size: 0.9rem; color: #1e293b;">Email Resmi</strong>
                    <span style="font-size: 0.875rem; color: #64748b;"><?= esc($desa['email']) ?></span>
                </div>
            </div>

            <div class="kontak-row">
                <div class="kontak-icon-wrap">
                    <i data-lucide="phone" style="width: 22px; height: 22px;"></i>
                </div>
                <div>
                    <strong style="display: block; font-size: 0.9rem; color: #1e293b;">Telepon / WhatsApp</strong>
                    <span style="font-size: 0.875rem; color: #64748b;"><?= esc($desa['telepon']) ?></span>
                </div>
            </div>
        </div>

        <!-- Form Column -->
        <div class="kontak-form-card">
            <h2 style="font-size: 1.25rem; font-weight: 800; color: #14532d; margin-bottom: 0.4rem;">Kirim Pesan atau Aspirasi</h2>
            <p style="font-size: 0.85rem; color: #64748b; margin-bottom: 1.5rem;">Pemerintah Desa Batu Bingkung terbuka terhadap aspirasi warga masyarakat.</p>

            <form action="<?= base_url('kontak/kirim') ?>" method="post">
                <?= csrf_field() ?>

                <div class="form-row-2">
                    <div class="form-group">
                        <label class="form-label" for="nama">Nama Lengkap <span style="color: #ef4444;">*</span></label>
                        <input type="text" name="nama" id="nama" class="form-control-input" value="<?= esc(old('nama')) ?>" required placeholder="Nama Anda">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email">Alamat Email <span style="color: #ef4444;">*</span></label>
                        <input type="email" name="email" id="email" class="form-control-input" value="<?= esc(old('email')) ?>" required placeholder="nama@email.com">
                    </div>
                </div>

                <div class="form-row-2">
                    <div class="form-group">
                        <label class="form-label" for="no_hp">Nomor Telepon / WhatsApp</label>
                        <input type="text" name="no_hp" id="no_hp" class="form-control-input" value="<?= esc(old('no_hp')) ?>" placeholder="08xxxxxxxxxx">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="subjek">Subjek Pesan <span style="color: #ef4444;">*</span></label>
                        <input type="text" name="subjek" id="subjek" class="form-control-input" value="<?= esc(old('subjek')) ?>" required placeholder="Topik atau judul pesan">
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label" for="pesan">Isi Pesan / Saran <span style="color: #ef4444;">*</span></label>
                    <textarea name="pesan" id="pesan" class="form-control-input" rows="4" required placeholder="Tuliskan pesan Anda secara lengkap..."><?= esc(old('pesan')) ?></textarea>
                </div>

                <button type="submit" class="btn-send-message">
                    <i data-lucide="send" style="width: 16px; height: 16px;"></i>
                    <span>Kirim Pesan Sekarang</span>
                </button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
