<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<style>
    .page-header {
        background: linear-gradient(135deg, #f0fdf4 0%, #ffffff 100%);
        padding: 3rem 0 2rem;
        border-bottom: 1px solid var(--border-subtle);
        margin-bottom: 2.5rem;
    }
    .filter-bar {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 1rem;
        margin-bottom: 2rem;
    }
    .cat-pills {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
    }
    .cat-pill {
        padding: 0.4rem 1rem;
        border-radius: var(--radius-pill);
        background: #ffffff;
        border: 1px solid var(--border-subtle);
        font-size: 0.85rem;
        font-weight: 600;
        color: #475569;
        text-decoration: none;
        transition: all 0.2s;
    }
    .cat-pill:hover, .cat-pill.active {
        background: #15803d;
        color: #ffffff;
        border-color: #15803d;
    }
    .news-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1.5rem;
    }
    .news-card {
        background: #ffffff;
        border-radius: var(--radius-xl);
        border: 1px solid var(--border-subtle);
        box-shadow: var(--shadow-card);
        overflow: hidden;
        display: flex;
        flex-direction: column;
        transition: all 0.25s ease;
    }
    .news-card:hover {
        transform: translateY(-4px);
        box-shadow: var(--shadow-hover);
    }
    .news-card-img {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }
    .news-card-body {
        padding: 1.5rem;
        display: flex;
        flex-direction: column;
        flex: 1;
        justify-content: space-between;
    }
    .news-badge-cat {
        display: inline-block;
        font-size: 0.75rem;
        font-weight: 700;
        color: #15803d;
        background: #dcfce7;
        padding: 0.2rem 0.6rem;
        border-radius: 9999px;
        width: fit-content;
        margin-bottom: 0.5rem;
    }
    .news-title-link {
        font-size: 1.1rem;
        font-weight: 700;
        color: #0f172a;
        line-height: 1.35;
        margin-bottom: 0.5rem;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .news-title-link:hover {
        color: #15803d;
    }
    .news-excerpt {
        font-size: 0.85rem;
        color: #64748b;
        line-height: 1.5;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        margin-bottom: 1rem;
    }
    .news-meta-bottom {
        display: flex;
        align-items: center;
        justify-content: space-between;
        font-size: 0.775rem;
        color: #94a3b8;
        border-top: 1px solid #f1f5f9;
        padding-top: 0.75rem;
    }
    @media (max-width: 991px) {
        .news-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }
    @media (max-width: 640px) {
        .news-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="page-header">
    <div class="container">
        <h1 style="font-size: 2.25rem; font-weight: 800; color: #14532d;">Kabar &amp; Berita Desa</h1>
        <p style="font-size: 1rem; color: #64748b; margin-top: 0.5rem;">Informasi kegiatan, pengumuman pemerintahan, dan kabar terkini Desa Batu Bingkung</p>
    </div>
</div>

<div class="container">
    <!-- Filter & Categories -->
    <div class="filter-bar">
        <div class="cat-pills">
            <a href="<?= base_url('berita') ?>" class="cat-pill <?= empty($activeCategory) ? 'active' : '' ?>">Semua Kategori</a>
            <?php foreach ($categories as $cat) : ?>
                <a href="<?= base_url('berita?kategori=' . esc($cat['slug'])) ?>" class="cat-pill <?= (! empty($activeCategory) && $activeCategory['slug'] === $cat['slug']) ? 'active' : '' ?>">
                    <?= esc($cat['name']) ?>
                </a>
            <?php endforeach; ?>
        </div>

        <form action="<?= base_url('berita') ?>" method="get" style="display: flex; gap: 0.5rem;">
            <input type="text" name="q" value="<?= esc($searchQuery ?? '') ?>" placeholder="Cari judul berita..."
                   style="padding: 0.45rem 0.9rem; border-radius: var(--radius-pill); border: 1px solid var(--border-subtle); outline: none; font-size: 0.85rem;">
            <button type="submit" style="background: #15803d; color: #fff; border: none; padding: 0.45rem 1rem; border-radius: var(--radius-pill); font-size: 0.85rem; font-weight: 600; cursor: pointer;">
                Cari
            </button>
        </form>
    </div>

    <!-- Grid Berita -->
    <div class="news-grid">
        <?php if (! empty($beritaList)) : ?>
            <?php foreach ($beritaList as $b) : ?>
                <div class="news-card">
                    <img src="<?= base_url(esc($b['thumbnail'] ?? 'uploads/desa/kantor-desa.webp')) ?>" alt="<?= esc($b['title']) ?>" class="news-card-img" loading="lazy">
                    <div class="news-card-body">
                        <div>
                            <?php if (! empty($b['category_name'])) : ?>
                                <span class="news-badge-cat"><?= esc($b['category_name']) ?></span>
                            <?php endif; ?>
                            <a href="<?= base_url('berita/' . esc($b['slug'])) ?>" class="news-title-link">
                                <?= esc($b['title']) ?>
                            </a>
                            <p class="news-excerpt"><?= esc($b['excerpt']) ?></p>
                        </div>

                        <div class="news-meta-bottom">
                            <span><i data-lucide="calendar" style="width: 13px; height: 13px; vertical-align: -1px;"></i> <?= date('d M Y', strtotime($b['published_at'] ?? $b['created_at'])) ?></span>
                            <span><i data-lucide="eye" style="width: 13px; height: 13px; vertical-align: -1px;"></i> <?= number_format((int)$b['views'], 0, ',', '.') ?> dilihat</span>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <div style="grid-column: span 3; text-align: center; padding: 4rem 1rem; color: #64748b;">
                <i data-lucide="newspaper" style="width: 48px; height: 48px; margin-bottom: 0.5rem; opacity: 0.4;"></i>
                <p>Belum ada berita yang dipublikasikan.</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<?= $this->endSection() ?>
