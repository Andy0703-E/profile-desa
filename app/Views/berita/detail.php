<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<style>
    .article-header {
        padding: 2.5rem 0 1.5rem;
    }
    .back-nav {
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        color: #15803d;
        font-weight: 600;
        font-size: 0.85rem;
        margin-bottom: 1rem;
    }
    .article-title {
        font-size: 2.25rem;
        font-weight: 800;
        color: #0f172a;
        line-height: 1.25;
        margin-bottom: 1rem;
    }
    .article-meta {
        display: flex;
        align-items: center;
        gap: 1.25rem;
        font-size: 0.85rem;
        color: #64748b;
        margin-bottom: 2rem;
        flex-wrap: wrap;
    }
    .article-layout {
        display: grid;
        grid-template-columns: 2.2fr 1fr;
        gap: 2.5rem;
        align-items: start;
    }
    .article-main-card {
        background: #ffffff;
        border-radius: var(--radius-xl);
        border: 1px solid var(--border-subtle);
        box-shadow: var(--shadow-card);
        padding: 2.5rem;
        overflow: hidden;
    }
    .article-img-lead {
        width: 100%;
        max-height: 440px;
        object-fit: cover;
        border-radius: var(--radius-lg);
        margin-bottom: 2rem;
    }
    .article-content {
        font-size: 1.05rem;
        color: #334155;
        line-height: 1.85;
    }
    .article-content p {
        margin-bottom: 1.25rem;
    }
    .sidebar-card {
        background: #ffffff;
        border-radius: var(--radius-xl);
        border: 1px solid var(--border-subtle);
        box-shadow: var(--shadow-card);
        padding: 1.75rem;
        margin-bottom: 1.5rem;
    }
    @media (max-width: 991px) {
        .article-layout {
            grid-template-columns: 1fr;
        }
        .article-main-card {
            padding: 1.5rem;
        }
    }
</style>

<div class="container article-header">
    <a href="<?= base_url('berita') ?>" class="back-nav">
        <i data-lucide="arrow-left" style="width: 16px; height: 16px;"></i>
        <span>Kembali ke Berita</span>
    </a>
    <h1 class="article-title"><?= esc($berita['title']) ?></h1>
    <div class="article-meta">
        <span><i data-lucide="calendar" style="width: 15px; height: 15px; vertical-align: -2px;"></i> <?= date('d F Y', strtotime($berita['published_at'] ?? $berita['created_at'])) ?></span>
        <?php if (! empty($berita['category_name'])) : ?>
            <span><i data-lucide="tag" style="width: 15px; height: 15px; vertical-align: -2px;"></i> <?= esc($berita['category_name']) ?></span>
        <?php endif; ?>
        <span><i data-lucide="user" style="width: 15px; height: 15px; vertical-align: -2px;"></i> <?= esc($berita['author_name'] ?? 'Admin Desa') ?></span>
        <span><i data-lucide="eye" style="width: 15px; height: 15px; vertical-align: -2px;"></i> <?= number_format((int)$berita['views'], 0, ',', '.') ?> pembaca</span>
    </div>
</div>

<div class="container" style="margin-bottom: 4rem;">
    <div class="article-layout">
        <div class="article-main-card">
            <?php if (! empty($berita['thumbnail'])) : ?>
                <img src="<?= base_url(esc($berita['thumbnail'])) ?>" alt="<?= esc($berita['title']) ?>" class="article-img-lead">
            <?php endif; ?>

            <div class="article-content">
                <?= $berita['content'] ?>
            </div>
        </div>

        <!-- Sidebar: Berita Terkini -->
        <div>
            <div class="sidebar-card">
                <h2 style="font-size: 1.15rem; font-weight: 700; color: #14532d; margin-bottom: 1rem; border-bottom: 1.5px solid #dcfce7; padding-bottom: 0.5rem;">
                    Berita Terkini Lainnya
                </h2>

                <div style="display: flex; flex-direction: column; gap: 1rem;">
                    <?php if (! empty($latestBerita)) : ?>
                        <?php foreach ($latestBerita as $lb) : ?>
                            <?php if ($lb['id'] !== $berita['id']) : ?>
                                <a href="<?= base_url('berita/' . esc($lb['slug'])) ?>" style="text-decoration: none; display: flex; gap: 0.75rem; align-items: center;">
                                    <img src="<?= base_url(esc($lb['thumbnail'] ?? 'uploads/desa/kantor-desa.webp')) ?>" alt="<?= esc($lb['title']) ?>" style="width: 60px; height: 50px; border-radius: 8px; object-fit: cover; flex-shrink: 0;">
                                    <div>
                                        <div style="font-size: 0.75rem; color: #94a3b8;"><?= date('d M Y', strtotime($lb['published_at'] ?? $lb['created_at'])) ?></div>
                                        <div style="font-size: 0.85rem; font-weight: 600; color: #1e293b; line-height: 1.3; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;"><?= esc($lb['title']) ?></div>
                                    </div>
                                </a>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
