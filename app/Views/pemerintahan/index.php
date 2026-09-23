<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<style>
    .page-header {
        background: linear-gradient(135deg, #f0fdf4 0%, #ffffff 100%);
        padding: 3rem 0 2rem;
        border-bottom: 1px solid var(--border-subtle);
        margin-bottom: 2.5rem;
    }
    .page-title {
        font-size: 2.25rem;
        font-weight: 800;
        color: #14532d;
        line-height: 1.2;
    }
    .page-sub {
        font-size: 1rem;
        color: var(--text-muted);
        margin-top: 0.5rem;
    }
    .aparatur-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 1.5rem;
    }
    .aparatur-card {
        background: #ffffff;
        border-radius: var(--radius-xl);
        border: 1px solid var(--border-subtle);
        box-shadow: var(--shadow-card);
        padding: 1.75rem 1.25rem;
        text-align: center;
        transition: all 0.25s ease;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .aparatur-card:hover {
        transform: translateY(-4px);
        box-shadow: var(--shadow-hover);
        border-color: #86efac;
    }
    .aparatur-avatar-wrap {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        background: #f1f5f9;
        border: 3px solid #bbf7d0;
        overflow: hidden;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #15803d;
    }
    .aparatur-avatar-wrap img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .aparatur-name {
        font-size: 1.05rem;
        font-weight: 700;
        color: #0f172a;
        margin-bottom: 0.25rem;
    }
    .aparatur-role {
        font-size: 0.85rem;
        font-weight: 600;
        color: #15803d;
        margin-bottom: 0.5rem;
    }
    .aparatur-nip {
        font-size: 0.75rem;
        color: #64748b;
        background: #f8fafc;
        padding: 0.2rem 0.6rem;
        border-radius: 9999px;
        border: 1px solid #e2e8f0;
        margin-bottom: 0.75rem;
    }
    .aparatur-desc {
        font-size: 0.8rem;
        color: #475569;
        line-height: 1.4;
    }
    @media (max-width: 1024px) {
        .aparatur-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }
    @media (max-width: 768px) {
        .aparatur-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }
    @media (max-width: 480px) {
        .aparatur-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="page-header">
    <div class="container">
        <h1 class="page-title">Struktur Pemerintahan Desa</h1>
        <p class="page-sub">Bagan struktur organisasi dan jajaran aparatur Pemerintah Desa Batu Bingkung</p>
    </div>
</div>

<div class="container" style="margin-bottom: 3.5rem;">
    <!-- SOTK Diagram Sesuai Permendagri No. 84/2015 -->
    <?= $this->include('components/sotk_diagram') ?>
</div>

<div class="container" style="margin-bottom: 4rem;">
    <h3 style="font-size: 1.35rem; font-weight: 800; color: #0f172a; margin-bottom: 1.5rem;">
        Jajaran Aparatur &amp; Perangkat Desa
    </h3>
    <?php if (! empty($aparaturList)) : ?>
        <div class="aparatur-grid">
            <?php foreach ($aparaturList as $item) : ?>
                <div class="aparatur-card">
                    <div class="aparatur-avatar-wrap">
                        <?php if (! empty($item['foto'])) : ?>
                            <img src="<?= base_url(esc($item['foto'])) ?>" alt="<?= esc($item['nama']) ?>">
                        <?php else : ?>
                            <i data-lucide="user" style="width: 48px; height: 48px;"></i>
                        <?php endif; ?>
                    </div>
                    <h2 class="aparatur-name"><?= esc($item['nama']) ?></h2>
                    <div class="aparatur-role"><?= esc($item['jabatan']) ?></div>
                    <?php if (! empty($item['nip']) && $item['nip'] !== '-') : ?>
                        <div class="aparatur-nip">NIP: <?= esc($item['nip']) ?></div>
                    <?php endif; ?>
                    <p class="aparatur-desc"><?= esc($item['deskripsi'] ?? '') ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else : ?>
        <div style="text-align: center; padding: 4rem 1rem; color: #64748b;">
            <i data-lucide="users" style="width: 48px; height: 48px; margin-bottom: 0.5rem; opacity: 0.5;"></i>
            <p>Belum ada data aparatur pemerintahan desa.</p>
        </div>
    <?php endif; ?>
</div>

<?= $this->endSection() ?>
