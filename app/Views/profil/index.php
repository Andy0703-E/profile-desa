<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<section style="background: linear-gradient(135deg, #0b4632 0%, #062b1e 100%); padding: 3rem 0 3.5rem; color: #ffffff;">
    <div class="container">
        <div style="display: flex; align-items: center; gap: 0.5rem; font-size: 0.85rem; color: #a7f3d0; margin-bottom: 0.75rem;">
            <a href="<?= base_url() ?>" style="color: inherit; text-decoration: none;">Beranda</a>
            <i data-lucide="chevron-right" style="width: 14px; height: 14px;"></i>
            <span style="color: #ffffff; font-weight: 600;">Profil Desa</span>
        </div>
        <h1 style="font-size: 2.2rem; font-weight: 800; margin-bottom: 0.5rem; letter-spacing: -0.02em;">Profil Lengkap <?= esc($desa['nama_desa']) ?></h1>
        <p style="color: #d1fae5; max-width: 650px; font-size: 0.95rem; line-height: 1.6;">
            Sejarah berdirinya desa, visi & misi pemerintahan, batas dan letak geografis wilayah, serta struktur aparatur desa.
        </p>

        <!-- Quick Nav Sub Menu (Interactive Active Pills) -->
        <div id="profilQuickNav" style="margin-top: 1.5rem; display: flex; gap: 0.5rem; flex-wrap: wrap;">
            <a href="#sejarah" class="profil-nav-pill active">Sejarah</a>
            <a href="#visi-misi" class="profil-nav-pill">Visi &amp; Misi</a>
            <a href="#struktur-desa" class="profil-nav-pill">Struktur Organisasi</a>
            <a href="#kades" class="profil-nav-pill">Kepala Desa</a>
            <a href="#geografis" class="profil-nav-pill">Geografis &amp; Wilayah</a>
            <a href="#dusun" class="profil-nav-pill">Data Dusun</a>
        </div>
    </div>
</section>

<style>
    .profil-nav-pill {
        padding: 0.45rem 1.15rem;
        border-radius: 9999px;
        background: rgba(255, 255, 255, 0.15);
        color: #ffffff;
        font-size: 0.84rem;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.2s ease;
        display: inline-block;
    }
    .profil-nav-pill:hover {
        background: rgba(255, 255, 255, 0.28);
        color: #ffffff;
    }
    .profil-nav-pill.active {
        background: #10b981 !important;
        color: #ffffff !important;
        font-weight: 700 !important;
        box-shadow: 0 4px 12px rgba(16, 185, 129, 0.35);
    }

    /* Professional Organogram Styles */
    .organogram-wrap {
        width: 100%;
        max-width: 860px;
        margin: 0 auto;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .organogram-top-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 2rem;
        width: 100%;
        max-width: 680px;
        position: relative;
    }
    .organogram-bpd-card {
        background: #ffffff;
        border: 2px solid #3b82f6;
        border-radius: 14px;
        padding: 1.25rem;
        text-align: center;
        box-shadow: 0 4px 14px rgba(59, 130, 246, 0.08);
        position: relative;
    }
    .organogram-kades-card {
        background: linear-gradient(135deg, #0b4632 0%, #062b1e 100%);
        color: #ffffff;
        border: 2px solid #10b981;
        border-radius: 14px;
        padding: 1.25rem;
        text-align: center;
        box-shadow: 0 8px 20px rgba(11, 70, 50, 0.25);
        position: relative;
    }
    .connector-dashed-h {
        position: absolute;
        top: 50%;
        left: calc(50% - 1.25rem);
        width: 2.5rem;
        border-top: 2px dashed #94a3b8;
        transform: translateY(-50%);
        z-index: 2;
    }
    .stem-down-center {
        width: 2px;
        height: 32px;
        background: #0b6045;
        margin: 0 auto;
    }
    .organogram-sekdes-card {
        background: #ffffff;
        border: 2px solid #059669;
        border-radius: 14px;
        padding: 1.15rem 2rem;
        text-align: center;
        width: 100%;
        max-width: 360px;
        box-shadow: 0 4px 14px rgba(5, 150, 105, 0.1);
    }
    .stem-down-split {
        width: 2px;
        height: 24px;
        background: #cbd5e1;
        margin: 0 auto;
    }
    .crossbar-h {
        width: 100%;
        max-width: 740px;
        height: 2px;
        background: #cbd5e1;
        margin: 0 auto;
    }
    .organogram-mid-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 2rem;
        width: 100%;
        max-width: 760px;
        margin-top: 1.5rem;
    }
    .group-box-card {
        background: #ffffff;
        border-radius: 14px;
        border: 1px solid #cbd5e1;
        padding: 1.25rem;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.02);
    }
    .item-pill-row {
        background: #f8fafc;
        padding: 0.75rem 1rem;
        border-radius: 10px;
        border: 1px solid #f1f5f9;
        display: flex;
        align-items: center;
        gap: 0.75rem;
        margin-bottom: 0.6rem;
    }
    .item-pill-row:last-child {
        margin-bottom: 0;
    }
</style>

<div class="container" style="padding-top: 2.5rem; padding-bottom: 4rem;">
    <!-- 1. Kepala Desa Card & Sambutan -->
    <div id="kades" style="background: #ffffff; border-radius: 16px; border: 1px solid #e2e8f0; padding: 2rem; margin-bottom: 2.5rem; display: flex; gap: 2rem; align-items: center; flex-wrap: wrap;">
        <div style="width: 140px; height: 170px; border-radius: 12px; background: #f1f5f9; overflow: hidden; flex-shrink: 0; border: 2px solid #e2e8f0;">
            <img src="<?= base_url('images/avatar-pejabat.svg') ?>" alt="Kepala Desa" style="width: 100%; height: 100%; object-fit: cover;">
        </div>
        <div style="flex: 1; min-width: 280px;">
            <span style="font-size: 0.8rem; font-weight: 700; color: #059669; text-transform: uppercase; letter-spacing: 0.05em;">Kepala Desa Batu Bingkung</span>
            <h2 style="font-size: 1.5rem; font-weight: 800; color: #0f172a; margin: 0.2rem 0 0.5rem;"><?= esc($kades['nama'] ?? 'Kepala Desa Batu Bingkung') ?></h2>
            <p style="font-size: 0.92rem; color: #475569; line-height: 1.6; font-style: italic; margin-bottom: 0.75rem;">
                "Selamat datang di portal informasi resmi Desa Batu Bingkung. Komitmen kami adalah menghadirkan keterbukaan informasi, pelayanan administrasi cepat, dan pembangunan desa yang partisipatif demi kemaslahatan seluruh masyarakat pesisir."
            </p>
            <div style="font-size: 0.8rem; color: #64748b;">
                Masa Jabatan: 2022 - 2028 &bull; Periode Berjalan
            </div>
        </div>
    </div>

    <!-- 2. Sejarah Desa -->
    <div id="sejarah" style="background: #ffffff; border-radius: 16px; border: 1px solid #e2e8f0; padding: 2rem; margin-bottom: 2.5rem;">
        <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 1rem;">
            <i data-lucide="book-open" style="width: 22px; height: 22px; color: #0b6045;"></i>
            <h2 style="font-size: 1.35rem; font-weight: 800; color: #0f172a;">Sejarah Desa</h2>
        </div>
        <p style="font-size: 0.95rem; color: #334155; line-height: 1.8;">
            <?= nl2br(esc($profil['sejarah'] ?? 'Desa Batu Bingkung berakar dari pemukiman maritim tradisional di wilayah kepulauan Pasimarannu, Kepulauan Selayar.')) ?>
        </p>
    </div>

    <!-- 3. Visi & Misi -->
    <div id="visi-misi" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 2rem; margin-bottom: 2.5rem;">
        <div style="background: #ffffff; border-radius: 16px; border: 1px solid #e2e8f0; padding: 2rem; box-shadow: 0 4px 15px rgba(0,0,0,0.02);">
            <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 1rem;">
                <i data-lucide="target" style="width: 22px; height: 22px; color: #0b6045;"></i>
                <h2 style="font-size: 1.3rem; font-weight: 800; color: #0f172a;">Visi Pembangunan</h2>
            </div>
            <div style="background: #ecfdf5; border-left: 4px solid #10b981; padding: 1.25rem; border-radius: 8px;">
                <p style="font-size: 0.95rem; font-weight: 600; color: #065f46; line-height: 1.7;">
                    "<?= esc($profil['visi'] ?? 'Terwujudnya Desa Batu Bingkung yang Mandiri, Sejahtera, Berkarakter Maritim, dan Berdaya Saing.') ?>"
                </p>
            </div>
        </div>

        <div style="background: #ffffff; border-radius: 16px; border: 1px solid #e2e8f0; padding: 2rem; box-shadow: 0 4px 15px rgba(0,0,0,0.02);">
            <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 1rem;">
                <i data-lucide="compass" style="width: 22px; height: 22px; color: #0b6045;"></i>
                <h2 style="font-size: 1.3rem; font-weight: 800; color: #0f172a;">Misi Pemerintahan</h2>
            </div>
            <div style="font-size: 0.92rem; color: #334155; line-height: 1.7;">
                <?= nl2br(esc($profil['misi'] ?? '')) ?>
            </div>
        </div>
    </div>

    <!-- 4. Struktur Organisasi Pemerintahan Desa (Sesuai Permendagri No. 84/2015) -->
    <div id="struktur-desa" style="margin-bottom: 3.5rem;">
        <?= $this->include('components/sotk_diagram') ?>

        <!-- Daftar Profil Kartu Perangkat Lengkap dengan Tugas & Jabatan -->
        <div style="background: #ffffff; border-radius: 16px; border: 1px solid #e2e8f0; padding: 2rem; margin-top: 2rem; box-shadow: 0 4px 15px rgba(0,0,0,0.02);">
            <h3 style="font-size: 1.25rem; font-weight: 800; color: #0f172a; margin-bottom: 1.25rem;">
                Tugas &amp; Tanggung Jawab Aparatur Desa
            </h3>

            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 1.5rem;">
                <?php foreach ($perangkat as $p): ?>
                    <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 14px; padding: 1.25rem; display: flex; gap: 1rem; align-items: flex-start; box-shadow: 0 2px 8px rgba(0,0,0,0.02);">
                        <div style="width: 58px; height: 68px; border-radius: 8px; background: #e2e8f0; overflow: hidden; flex-shrink: 0;">
                            <img src="<?= base_url('images/avatar-pejabat.svg') ?>" alt="<?= esc($p['nama']) ?>" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <div style="flex: 1;">
                            <span style="display: inline-block; font-size: 0.72rem; font-weight: 700; color: #059669; text-transform: uppercase;">
                                <?= esc($p['jabatan']) ?>
                            </span>
                            <h4 style="font-size: 1rem; font-weight: 800; color: #0f172a; margin: 0.15rem 0 0.35rem;">
                                <?= esc($p['nama']) ?>
                            </h4>
                            <?php if (!empty($p['nip']) && $p['nip'] !== '-'): ?>
                                <small style="display: block; font-size: 0.75rem; color: #64748b; font-family: monospace; margin-bottom: 0.4rem;">
                                    NIP: <?= esc($p['nip']) ?>
                                </small>
                            <?php endif; ?>
                            <p style="font-size: 0.82rem; color: #475569; line-height: 1.5;">
                                <?= esc($p['deskripsi']) ?>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <!-- 4. Geografis & Batas Wilayah -->
    <div id="geografis" style="background: #ffffff; border-radius: 16px; border: 1px solid #e2e8f0; padding: 2rem; margin-bottom: 2.5rem;">
        <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 1.25rem;">
            <i data-lucide="map" style="width: 22px; height: 22px; color: #0b6045;"></i>
            <h2 style="font-size: 1.35rem; font-weight: 800; color: #0f172a;">Kondisi Geografis & Batas Wilayah</h2>
        </div>

        <p style="font-size: 0.95rem; color: #334155; line-height: 1.7; margin-bottom: 1.5rem;">
            <?= nl2br(esc($profil['geografis'] ?? '')) ?>
        </p>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 1rem;">
            <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 10px; padding: 1rem;">
                <span style="font-size: 0.75rem; font-weight: 700; color: #059669; text-transform: uppercase;">Sebelah Utara</span>
                <div style="font-size: 0.95rem; font-weight: 700; color: #1e293b; margin-top: 0.2rem;"><?= esc($profil['batas_utara'] ?? 'Laut Flores') ?></div>
            </div>
            <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 10px; padding: 1rem;">
                <span style="font-size: 0.75rem; font-weight: 700; color: #059669; text-transform: uppercase;">Sebelah Selatan</span>
                <div style="font-size: 0.95rem; font-weight: 700; color: #1e293b; margin-top: 0.2rem;"><?= esc($profil['batas_selatan'] ?? 'Laut Flores') ?></div>
            </div>
            <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 10px; padding: 1rem;">
                <span style="font-size: 0.75rem; font-weight: 700; color: #059669; text-transform: uppercase;">Sebelah Timur</span>
                <div style="font-size: 0.95rem; font-weight: 700; color: #1e293b; margin-top: 0.2rem;"><?= esc($profil['batas_timur'] ?? 'Desa Komba-Komba') ?></div>
            </div>
            <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 10px; padding: 1rem;">
                <span style="font-size: 0.75rem; font-weight: 700; color: #059669; text-transform: uppercase;">Sebelah Barat</span>
                <div style="font-size: 0.95rem; font-weight: 700; color: #1e293b; margin-top: 0.2rem;"><?= esc($profil['batas_barat'] ?? 'Desa Lambego') ?></div>
            </div>
        </div>
    </div>

    <!-- 5. Data Kewilayahan Dusun -->
    <div id="dusun" style="background: #ffffff; border-radius: 16px; border: 1px solid #e2e8f0; padding: 2rem;">
        <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 1.25rem;">
            <i data-lucide="layers" style="width: 22px; height: 22px; color: #0b6045;"></i>
            <h2 style="font-size: 1.35rem; font-weight: 800; color: #0f172a;">Data Kewilayahan Dusun</h2>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 1.25rem;">
            <?php foreach ($dusunList as $d): ?>
                <div style="border: 1px solid #e2e8f0; border-radius: 12px; padding: 1.25rem; background: #f8fafc;">
                    <h3 style="font-size: 1.1rem; font-weight: 800; color: #0b6045; margin-bottom: 0.25rem;"><?= esc($d['nama_dusun']) ?></h3>
                    <div style="font-size: 0.82rem; color: #64748b; margin-bottom: 0.75rem;">
                        Kepala Dusun: <strong style="color: #1e293b;"><?= esc($d['kepala_dusun']) ?></strong>
                    </div>
                    <div style="display: flex; gap: 1rem; font-size: 0.85rem; margin-bottom: 0.5rem;">
                        <div>KK: <strong><?= esc($d['jumlah_kk']) ?></strong></div>
                        <div>Jiwa: <strong><?= esc($d['jumlah_jiwa']) ?></strong></div>
                    </div>
                    <p style="font-size: 0.8rem; color: #64748b; line-height: 1.4;">
                        <?= esc($d['deskripsi']) ?>
                    </p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const pills = document.querySelectorAll('#profilQuickNav .profil-nav-pill');
        const sections = [];

        pills.forEach(pill => {
            const hash = pill.getAttribute('href');
            if (hash && hash.startsWith('#')) {
                const target = document.querySelector(hash);
                if (target) {
                    sections.push({ pill, target, hash });
                }
            }

            pill.addEventListener('click', function(e) {
                pills.forEach(p => p.classList.remove('active'));
                this.classList.add('active');
            });
        });

        // IntersectionObserver to auto-update active pill when scrolling
        if ('IntersectionObserver' in window && sections.length > 0) {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const id = '#' + entry.target.id;
                        sections.forEach(s => {
                            if (s.hash === id) {
                                pills.forEach(p => p.classList.remove('active'));
                                s.pill.classList.add('active');
                            }
                        });
                    }
                });
            }, { rootMargin: '-20% 0px -60% 0px' });

            sections.forEach(s => observer.observe(s.target));
        }
    });
</script>

<?= $this->endSection() ?>
