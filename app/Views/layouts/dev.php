<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<section style="background: linear-gradient(135deg, #062b1e 0%, #031710 100%); min-height: 80vh; display: flex; align-items: center; justify-content: center; padding: 4rem 1rem; color: #ffffff;">
    <div style="max-width: 520px; width: 100%; background: rgba(8, 52, 37, 0.7); backdrop-filter: blur(16px); border: 1px solid rgba(52, 211, 153, 0.25); border-radius: 24px; padding: 2.5rem 2rem; text-align: center; box-shadow: 0 20px 40px rgba(0,0,0,0.4); position: relative; overflow: hidden;">
        
        <!-- Glowing Ambient Background Blob -->
        <div style="position: absolute; top: -50px; left: 50%; transform: translateX(-50%); width: 160px; height: 160px; background: #10b981; filter: blur(70px); opacity: 0.25; pointer-events: none; border-radius: 50%;"></div>

        <!-- Secret Badge -->
        <div style="display: inline-flex; align-items: center; background: rgba(16, 185, 129, 0.15); border: 1px solid rgba(52, 211, 153, 0.35); color: #6ee7b7; padding: 0.35rem 0.85rem; border-radius: 999px; font-size: 0.78rem; font-weight: 700; letter-spacing: 0.05em; text-transform: uppercase; margin-bottom: 1.5rem;">
            <span>Easter Egg Found!</span>
        </div>

        <!-- Developer Photo -->
        <div style="position: relative; width: 170px; height: 170px; margin: 0 auto 1.5rem;">
            <div style="position: absolute; inset: -4px; border-radius: 50%; background: linear-gradient(45deg, #10b981, #059669, #34d399); animation: spin 8s linear infinite; opacity: 0.8;"></div>
            <img src="<?= base_url('images/developer.jpg') ?>" alt="Developer" style="position: relative; width: 100%; height: 100%; object-fit: cover; border-radius: 50%; border: 4px solid #083425; box-shadow: 0 8px 24px rgba(0,0,0,0.3);">
        </div>

        <h2 style="font-size: 1.6rem; font-weight: 800; color: #ffffff; margin-bottom: 0.35rem; letter-spacing: -0.02em;">Developer &amp; Creator</h2>
        <p style="color: #6ee7b7; font-size: 0.9rem; font-weight: 600; margin-bottom: 1.25rem;">Software Engineer &bull; Desa Batu Bingkung Portal</p>
        
        <p style="color: #cbd5e1; font-size: 0.9rem; line-height: 1.6; margin-bottom: 2rem; background: rgba(0,0,0,0.2); padding: 1rem; border-radius: 12px; border: 1px solid rgba(255,255,255,0.06);">
            &ldquo;Membangun digitalisasi desa yang modern, transparan, dan inklusif untuk kemajuan masyarakat Kepulauan Selayar.&rdquo;
        </p>

        <!-- Tech Badges -->
        <div style="display: flex; justify-content: center; gap: 0.5rem; flex-wrap: wrap; margin-bottom: 2rem;">
            <span style="background: rgba(255,255,255,0.08); color: #e2e8f0; font-size: 0.75rem; padding: 0.3rem 0.7rem; border-radius: 6px; font-weight: 600;">CodeIgniter 4</span>
            <span style="background: rgba(255,255,255,0.08); color: #e2e8f0; font-size: 0.75rem; padding: 0.3rem 0.7rem; border-radius: 6px; font-weight: 600;">PHP 8</span>
            <span style="background: rgba(255,255,255,0.08); color: #e2e8f0; font-size: 0.75rem; padding: 0.3rem 0.7rem; border-radius: 6px; font-weight: 600;">MariaDB</span>
            <span style="background: rgba(255,255,255,0.08); color: #e2e8f0; font-size: 0.75rem; padding: 0.3rem 0.7rem; border-radius: 6px; font-weight: 600;">Leaflet JS</span>
        </div>

        <a href="<?= base_url() ?>" style="display: inline-flex; align-items: center; gap: 0.5rem; background: #10b981; color: #ffffff; font-weight: 700; font-size: 0.88rem; padding: 0.65rem 1.4rem; border-radius: 999px; text-decoration: none; transition: transform 0.2s, background 0.2s; box-shadow: 0 4px 14px rgba(16, 185, 129, 0.4);" onmouseover="this.style.background='#059669'; this.style.transform='translateY(-2px)'" onmouseout="this.style.background='#10b981'; this.style.transform='translateY(0)'">
            <i data-lucide="arrow-left" style="width: 16px; height: 16px;"></i>
            <span>Kembali ke Beranda</span>
        </a>

    </div>
</section>

<?= $this->endSection() ?>
