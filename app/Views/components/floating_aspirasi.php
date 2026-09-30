<!-- Floating Widget Pesan & Aspirasi Masuk dari Warga (Pojok Kanan Bawah) -->
<style>
/* Floating Trigger Button */
.floating-aspirasi-btn {
    position: fixed;
    bottom: 24px;
    right: 24px;
    z-index: 9990;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 54px;
    height: 54px;
    padding: 0;
    background: linear-gradient(135deg, #0b6045 0%, #059669 100%);
    color: #ffffff;
    border: 1.5px solid rgba(255, 255, 255, 0.25);
    border-radius: 50%;
    box-shadow: 0 8px 24px rgba(11, 96, 69, 0.4), 0 2px 6px rgba(0, 0, 0, 0.15);
    cursor: pointer;
    transition: all 0.28s cubic-bezier(0.16, 1, 0.3, 1);
    text-decoration: none;
    user-select: none;
}
.floating-aspirasi-btn:hover {
    transform: translateY(-3px) scale(1.06);
    box-shadow: 0 12px 28px rgba(11, 96, 69, 0.5), 0 4px 10px rgba(0, 0, 0, 0.2);
    background: linear-gradient(135deg, #047857 0%, #10b981 100%);
    color: #ffffff;
}
.floating-aspirasi-btn .pulse-dot {
    position: absolute;
    top: 5px;
    right: 5px;
    width: 10px;
    height: 10px;
    border-radius: 50%;
    background: #34d399;
    border: 2px solid #064e3b;
    box-shadow: 0 0 0 0 rgba(52, 211, 153, 0.7);
    animation: aspirasiPulse 2s infinite;
}
@keyframes aspirasiPulse {
    0% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(52, 211, 153, 0.7); }
    70% { transform: scale(1); box-shadow: 0 0 0 8px rgba(52, 211, 153, 0); }
    100% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(52, 211, 153, 0); }
}

/* Floating Popup Container */
.floating-aspirasi-card {
    position: fixed;
    bottom: 84px;
    right: 24px;
    width: 380px;
    max-width: calc(100vw - 32px);
    background: #ffffff;
    border-radius: 18px;
    border: 1px solid #e2e8f0;
    box-shadow: 0 20px 40px -10px rgba(15, 23, 42, 0.25), 0 0 0 1px rgba(0, 0, 0, 0.04);
    z-index: 9995;
    overflow: hidden;
    display: none;
    flex-direction: column;
    animation: aspirasiPop 0.25s cubic-bezier(0.16, 1, 0.3, 1);
}
.floating-aspirasi-card.open {
    display: flex;
}
@keyframes aspirasiPop {
    from { opacity: 0; transform: translateY(12px) scale(0.96); }
    to { opacity: 1; transform: translateY(0) scale(1); }
}

.aspirasi-card-header {
    background: linear-gradient(135deg, #0b6045 0%, #064e3b 100%);
    color: #ffffff;
    padding: 1.15rem 1.25rem;
    position: relative;
}
.aspirasi-card-header .badge-pill {
    display: inline-block;
    font-size: 0.68rem;
    font-weight: 800;
    letter-spacing: 0.06em;
    text-transform: uppercase;
    background: rgba(255, 255, 255, 0.2);
    color: #a7f3d0;
    padding: 0.2rem 0.55rem;
    border-radius: 9999px;
    margin-bottom: 0.35rem;
}
.aspirasi-card-header h3 {
    font-size: 1.1rem;
    font-weight: 800;
    margin: 0;
    line-height: 1.2;
}
.aspirasi-card-header p {
    font-size: 0.78rem;
    color: #d1fae5;
    margin: 0.3rem 0 0;
    line-height: 1.4;
}
.aspirasi-close-btn {
    position: absolute;
    top: 1rem;
    right: 1rem;
    background: rgba(255, 255, 255, 0.15);
    border: none;
    color: #ffffff;
    width: 28px;
    height: 28px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    font-size: 1.1rem;
    line-height: 1;
    transition: background 0.2s;
}
.aspirasi-close-btn:hover {
    background: rgba(255, 255, 255, 0.3);
}

.aspirasi-card-body {
    padding: 1.25rem;
    max-height: 480px;
    overflow-y: auto;
}
.aspirasi-form-group {
    margin-bottom: 0.85rem;
}
.aspirasi-form-group label {
    display: block;
    font-size: 0.78rem;
    font-weight: 700;
    color: #334155;
    margin-bottom: 0.3rem;
}
.aspirasi-form-group input,
.aspirasi-form-group select,
.aspirasi-form-group textarea {
    width: 100%;
    padding: 0.55rem 0.75rem;
    font-size: 0.825rem;
    border-radius: 8px;
    border: 1px solid #cbd5e1;
    outline: none;
    transition: border-color 0.2s, box-shadow 0.2s;
    box-sizing: border-box;
    font-family: inherit;
    background: #ffffff;
}
.aspirasi-form-group input:focus,
.aspirasi-form-group select:focus,
.aspirasi-form-group textarea:focus {
    border-color: #10b981;
    box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.15);
}
.aspirasi-submit-btn {
    width: 100%;
    padding: 0.7rem 1rem;
    background: #0b6045;
    color: #ffffff;
    border: none;
    border-radius: 10px;
    font-size: 0.88rem;
    font-weight: 800;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    transition: background 0.2s, transform 0.15s;
    box-shadow: 0 4px 12px rgba(11, 96, 69, 0.25);
}
.aspirasi-submit-btn:hover {
    background: #059669;
    transform: translateY(-1px);
}
.aspirasi-submit-btn:disabled {
    opacity: 0.65;
    cursor: not-allowed;
    transform: none;
}

/* Success View */
.aspirasi-success-box {
    display: none;
    text-align: center;
    padding: 1.5rem 0.5rem;
}
.aspirasi-success-box.show {
    display: block;
}
.aspirasi-success-icon {
    width: 52px;
    height: 52px;
    background: #ecfdf5;
    color: #059669;
    border-radius: 50%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 0.85rem;
    box-shadow: 0 0 0 6px #d1fae5;
}

@media (max-width: 768px) {
    .floating-aspirasi-btn {
        bottom: 76px;
        right: 16px;
        width: 48px;
        height: 48px;
    }
    .floating-aspirasi-card {
        bottom: 136px;
        right: 16px;
    }
}
</style>

<!-- Floating Trigger Button -->
<button type="button" class="floating-aspirasi-btn" id="floatingAspirasiTrigger" aria-label="Buka Pesan & Aspirasi Warga" title="Pesan &amp; Aspirasi Warga">
    <span class="pulse-dot"></span>
    <i data-lucide="message-square-plus" style="width: 24px; height: 24px;"></i>
</button>

<!-- Floating Card Popup Form -->
<div class="floating-aspirasi-card" id="floatingAspirasiCard" role="dialog" aria-labelledby="aspirasiHeading">
    <div class="aspirasi-card-header">
        <span class="badge-pill">Layanan Aspirasi Langsung</span>
        <h3 id="aspirasiHeading">Pesan &amp; Aspirasi Warga</h3>
        <p>Sampaikan pesan, masukan, maupun aspirasi untuk Pemerintah Desa Batu Bingkung.</p>
        <button type="button" class="aspirasi-close-btn" id="floatingAspirasiClose" aria-label="Tutup Popup">&times;</button>
    </div>

    <div class="aspirasi-card-body">
        <!-- Error Alert -->
        <div id="aspirasiAlertError" style="display: none; background: #fef2f2; border: 1px solid #fecaca; color: #991b1b; padding: 0.65rem 0.85rem; border-radius: 8px; font-size: 0.78rem; margin-bottom: 0.85rem; line-height: 1.4;"></div>

        <!-- Form Input Aspirasi -->
        <form id="floatingAspirasiForm">
            <?= csrf_field() ?>

            <div class="aspirasi-form-group">
                <label>Nama Lengkap Warga <span style="color: #ef4444;">*</span></label>
                <input type="text" name="nama" id="asp_nama" placeholder="Contoh: Ahmad Fadil" required>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 0.6rem;">
                <div class="aspirasi-form-group">
                    <label>WhatsApp / No. HP</label>
                    <input type="tel" name="no_hp" id="asp_no_hp" placeholder="08xxxxxxxxxx">
                </div>
                <div class="aspirasi-form-group">
                    <label>Alamat Email</label>
                    <input type="email" name="email" id="asp_email" placeholder="nama@email.com">
                </div>
            </div>

            <div class="aspirasi-form-group">
                <label>Topik / Kategori Aspirasi <span style="color: #ef4444;">*</span></label>
                <select name="subjek" id="asp_subjek" required>
                    <option value="">-- Pilih Topik Aspirasi --</option>
                    <option value="Pelayanan Administrasi &amp; Surat">Pelayanan Administrasi &amp; Surat</option>
                    <option value="Pembangunan Fisik &amp; Sarana Desa">Pembangunan Fisik &amp; Sarana Desa</option>
                    <option value="Bantuan Sosial &amp; Pemberdayaan">Bantuan Sosial &amp; Pemberdayaan</option>
                    <option value="Kebersihan &amp; Lingkungan Wilayah">Kebersihan &amp; Lingkungan Wilayah</option>
                    <option value="Potensi Nelayan, Pertanian &amp; UMKM">Potensi Nelayan, Pertanian &amp; UMKM</option>
                    <option value="Saran &amp; Masukan Umum">Saran &amp; Masukan Umum</option>
                </select>
            </div>

            <div class="aspirasi-form-group">
                <label>Isi Pesan / Aspirasi Warga <span style="color: #ef4444;">*</span></label>
                <textarea name="pesan" id="asp_pesan" rows="3" placeholder="Tuliskan saran, kritik membangun, atau kebutuhan warga..." required></textarea>
            </div>

            <button type="submit" class="aspirasi-submit-btn" id="asp_btn_submit">
                <i data-lucide="send" style="width: 15px; height: 15px;"></i>
                <span>Kirimkan Aspirasi</span>
            </button>
        </form>

        <!-- Success Message -->
        <div class="aspirasi-success-box" id="aspirasiSuccessBox">
            <div class="aspirasi-success-icon">
                <i data-lucide="check" style="width: 26px; height: 26px;"></i>
            </div>
            <h4 style="font-size: 1.05rem; font-weight: 800; color: #065f46; margin: 0 0 0.35rem;">
                Aspirasi Terkirim!
            </h4>
            <p style="font-size: 0.8rem; color: #475569; line-height: 1.5; margin: 0 0 1.25rem;">
                Terima kasih atas partisipasi Anda. Pesan &amp; aspirasi Anda telah masuk ke sistem pengelola Desa Batu Bingkung dan langsung tampil di halaman admin.
            </p>
            <button type="button" class="aspirasi-submit-btn" id="btnKirimLainnya" style="background: #ffffff; color: #0b6045; border: 1.5px solid #0b6045; box-shadow: none;">
                <i data-lucide="rotate-ccw" style="width: 14px; height: 14px;"></i>
                <span>Kirim Pesan Lainnya</span>
            </button>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const triggerBtn = document.getElementById('floatingAspirasiTrigger');
    const card = document.getElementById('floatingAspirasiCard');
    const closeBtn = document.getElementById('floatingAspirasiClose');
    const form = document.getElementById('floatingAspirasiForm');
    const submitBtn = document.getElementById('asp_btn_submit');
    const errorAlert = document.getElementById('aspirasiAlertError');
    const successBox = document.getElementById('aspirasiSuccessBox');
    const btnLainnya = document.getElementById('btnKirimLainnya');

    if (!triggerBtn || !card) return;

    function openAspirasi(e) {
        if (e) {
            e.stopPropagation();
            e.preventDefault();
        }
        card.classList.add('open');
        triggerBtn.style.display = 'none';
        if (typeof lucide !== 'undefined' && lucide.createIcons) {
            lucide.createIcons();
        }
    }

    function closeAspirasi(e) {
        if (e) {
            e.stopPropagation();
        }
        card.classList.remove('open');
        triggerBtn.style.display = 'inline-flex';
    }

    triggerBtn.addEventListener('click', openAspirasi);
    if (closeBtn) closeBtn.addEventListener('click', closeAspirasi);
    card.addEventListener('click', function(e) {
        e.stopPropagation();
    });

    if (btnLainnya) {
        btnLainnya.addEventListener('click', function() {
            form.reset();
            form.style.display = 'block';
            successBox.classList.remove('show');
            errorAlert.style.display = 'none';
        });
    }

    // Close on outside click
    document.addEventListener('click', function(e) {
        if (card.classList.contains('open') && !card.contains(e.target) && !triggerBtn.contains(e.target)) {
            closeAspirasi();
        }
    });

    // Handle AJAX Form Submit
    if (form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            errorAlert.style.display = 'none';
            errorAlert.innerText = '';

            const formData = new FormData(form);

            submitBtn.disabled = true;
            submitBtn.innerHTML = `
                <svg style="animation: spin 1s linear infinite; width: 16px; height: 16px; display: inline-block;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="10" stroke-opacity="0.25"></circle>
                    <path d="M12 2a10 10 0 0 1 10 10" stroke-linecap="round"></path>
                </svg>
                <span>Mengirimkan...</span>
            `;

            fetch('<?= base_url('kontak/kirim') ?>', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(res => res.json())
            .then(data => {
                submitBtn.disabled = false;
                submitBtn.innerHTML = `
                    <i data-lucide="send" style="width: 15px; height: 15px;"></i>
                    <span>Kirimkan Aspirasi</span>
                `;

                if (data.status === 'success') {
                    form.style.display = 'none';
                    successBox.classList.add('show');
                    if (typeof lucide !== 'undefined' && lucide.createIcons) {
                        lucide.createIcons();
                    }
                } else if (data.errors) {
                    let errMsg = Object.values(data.errors).join('<br>');
                    errorAlert.innerHTML = errMsg;
                    errorAlert.style.display = 'block';
                } else {
                    errorAlert.innerText = data.message || 'Terjadi kesalahan. Silakan coba lagi.';
                    errorAlert.style.display = 'block';
                }
            })
            .catch(err => {
                submitBtn.disabled = false;
                submitBtn.innerHTML = `
                    <i data-lucide="send" style="width: 15px; height: 15px;"></i>
                    <span>Kirimkan Aspirasi</span>
                `;
                errorAlert.innerText = 'Gagal menghubungi server. Mohon periksa koneksi Anda.';
                errorAlert.style.display = 'block';
            });
        });
    }

    if (typeof lucide !== 'undefined' && lucide.createIcons) {
        lucide.createIcons();
    }
});
</script>
<style>
@keyframes spin {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}
</style>
