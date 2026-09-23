<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
    <h2 style="font-size: 1.25rem; font-weight: 700; color: #0f172a;">Pengaturan Website &amp; Integrasi Sosial Media</h2>
</div>

<div class="card" style="max-width: 800px;">
    <form action="<?= base_url('admin/pengaturan/update') ?>" method="post">
        <?= csrf_field() ?>

        <div class="form-group">
            <label class="form-label">Judul Situs Web (Title Tag)</label>
            <input type="text" name="settings[site_title]" class="form-control" value="<?= esc($settings['site_title'] ?? 'Website Profil Desa Batu Bingkung') ?>" required>
        </div>

        <div class="form-group">
            <label class="form-label">Deskripsi Meta (SEO Description)</label>
            <textarea name="settings[meta_description]" class="form-control" rows="3"><?= esc($settings['meta_description'] ?? '') ?></textarea>
        </div>

        <h3 class="card-title" style="font-size: 1rem; margin: 1.5rem 0 1rem; padding-top: 1rem; border-top: 1px solid var(--border);">Tautan Media Sosial Resmi</h3>

        <div class="form-group">
            <label class="form-label">Facebook Page URL</label>
            <input type="url" name="settings[facebook_url]" class="form-control" value="<?= esc($settings['facebook_url'] ?? 'https://facebook.com') ?>" placeholder="https://facebook.com/namahalaman">
        </div>

        <div class="form-group">
            <label class="form-label">Instagram Profil URL</label>
            <input type="url" name="settings[instagram_url]" class="form-control" value="<?= esc($settings['instagram_url'] ?? 'https://instagram.com') ?>" placeholder="https://instagram.com/akunresmi">
        </div>

        <div class="form-group">
            <label class="form-label">Kanal YouTube Desa</label>
            <input type="url" name="settings[youtube_url]" class="form-control" value="<?= esc($settings['youtube_url'] ?? 'https://youtube.com') ?>" placeholder="https://youtube.com/@namachannel">
        </div>

        <div style="text-align: right; margin-top: 1.5rem;">
            <button type="submit" class="btn-primary-admin" style="padding: 0.75rem 2rem;">
                <i data-lucide="save" style="width: 18px; height: 18px;"></i>
                <span>Simpan Pengaturan</span>
            </button>
        </div>
    </form>
</div>

<?= $this->endSection() ?>
