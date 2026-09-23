<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Login Admin') ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        :root {
            --primary: #15803d;
            --primary-hover: #166534;
            --primary-light: #f0fdf4;
            --accent: #ca8a04;
            --bg-page: #f8fafc;
            --text-main: #0f172a;
            --text-muted: #64748b;
            --border: #e2e8f0;
            --card-bg: #ffffff;
            --radius-lg: 20px;
            --radius-md: 12px;
            --shadow-soft: 0 10px 30px -5px rgba(21, 128, 61, 0.08), 0 4px 12px -2px rgba(0, 0, 0, 0.05);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, sans-serif;
        }

        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #f0fdf4 0%, #ffffff 50%, #ecfdf5 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
            color: var(--text-main);
        }

        .login-card {
            background: var(--card-bg);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-soft);
            border: 1px solid var(--border);
            width: 100%;
            max-width: 440px;
            padding: 2.5rem 2rem;
            position: relative;
            overflow: hidden;
        }

        .login-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 6px;
            background: linear-gradient(90deg, #15803d, #84cc16, #eab308);
        }

        .brand-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .brand-logo-badge {
            width: 68px;
            height: 68px;
            margin: 0 auto 1rem;
            background: #dcfce7;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            box-shadow: 0 4px 12px rgba(21, 128, 61, 0.15);
        }

        .brand-title {
            font-size: 1.35rem;
            font-weight: 700;
            color: var(--primary-hover);
            line-height: 1.25;
        }

        .brand-sub {
            font-size: 0.875rem;
            color: var(--text-muted);
            margin-top: 0.35rem;
        }

        .alert {
            padding: 0.85rem 1rem;
            border-radius: var(--radius-md);
            margin-bottom: 1.25rem;
            font-size: 0.875rem;
            display: flex;
            align-items: flex-start;
            gap: 0.65rem;
        }

        .alert-error {
            background-color: #fef2f2;
            color: #991b1b;
            border: 1px solid #fecaca;
        }

        .alert-success {
            background-color: #f0fdf4;
            color: #166534;
            border: 1px solid #bbf7d0;
        }

        .form-group {
            margin-bottom: 1.25rem;
        }

        .form-label {
            display: block;
            font-size: 0.85rem;
            font-weight: 600;
            color: #334155;
            margin-bottom: 0.4rem;
        }

        .input-group {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-icon {
            position: absolute;
            left: 14px;
            color: #94a3b8;
            pointer-events: none;
            display: flex;
        }

        .form-control {
            width: 100%;
            padding: 0.8rem 1rem 0.8rem 2.75rem;
            border-radius: var(--radius-md);
            border: 1.5px solid var(--border);
            font-size: 0.95rem;
            color: var(--text-main);
            transition: all 0.2s ease;
            outline: none;
            background: #fff;
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(21, 128, 61, 0.12);
        }

        .form-control.is-invalid {
            border-color: #ef4444;
        }

        .invalid-feedback {
            font-size: 0.8rem;
            color: #ef4444;
            margin-top: 0.35rem;
        }

        .btn-submit {
            width: 100%;
            background: linear-gradient(135deg, #15803d 0%, #166534 100%);
            color: #ffffff;
            font-weight: 600;
            font-size: 1rem;
            padding: 0.85rem;
            border-radius: 9999px;
            border: none;
            cursor: pointer;
            transition: all 0.2s ease;
            box-shadow: 0 4px 12px rgba(21, 128, 61, 0.25);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            margin-top: 0.75rem;
        }

        .btn-submit:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 16px rgba(21, 128, 61, 0.35);
            background: linear-gradient(135deg, #166534 0%, #14532d 100%);
        }

        .btn-submit:active {
            transform: translateY(0);
        }

        .footer-nav {
            margin-top: 1.75rem;
            text-align: center;
            border-top: 1px solid var(--border);
            padding-top: 1.25rem;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            color: var(--text-muted);
            text-decoration: none;
            font-size: 0.875rem;
            font-weight: 500;
            transition: color 0.15s ease;
        }

        .back-link:hover {
            color: var(--primary);
        }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="brand-header">
            <div class="brand-logo-badge" style="padding: 6px; background: #ffffff; border: 2px solid #e2e8f0;">
                <img src="<?= base_url('images/logo.webp') ?>" alt="Logo Desa" style="width: 100%; height: 100%; object-fit: contain;">
            </div>
            <h1 class="brand-title">Panel Administrasi Desa</h1>
            <p class="brand-sub">Desa Batu Bingkung, Kec. Pasimarannu</p>
        </div>

        <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-error" role="alert">
                <i data-lucide="alert-circle" style="width: 18px; height: 18px; flex-shrink: 0; margin-top: 2px;"></i>
                <div><?= esc(session()->getFlashdata('error')) ?></div>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success" role="alert">
                <i data-lucide="check-circle-2" style="width: 18px; height: 18px; flex-shrink: 0; margin-top: 2px;"></i>
                <div><?= esc(session()->getFlashdata('success')) ?></div>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('auth/attempt') ?>" method="post" autocomplete="off">
            <?= csrf_field() ?>

            <div class="form-group">
                <label for="username" class="form-label">Username atau Email</label>
                <div class="input-group">
                    <span class="input-icon"><i data-lucide="user" style="width: 18px; height: 18px;"></i></span>
                    <input type="text"
                           class="form-control <?= session('errors.username') ? 'is-invalid' : '' ?>"
                           id="username"
                           name="username"
                           value="<?= esc(old('username')) ?>"
                           placeholder="Masukkan username/email"
                           required
                           autofocus>
                </div>
                <?php if (session('errors.username')) : ?>
                    <div class="invalid-feedback"><?= esc(session('errors.username')) ?></div>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Kata Sandi</label>
                <div class="input-group">
                    <span class="input-icon"><i data-lucide="lock" style="width: 18px; height: 18px;"></i></span>
                    <input type="password"
                           class="form-control <?= session('errors.password') ? 'is-invalid' : '' ?>"
                           id="password"
                           name="password"
                           placeholder="Masukkan kata sandi"
                           required>
                </div>
                <?php if (session('errors.password')) : ?>
                    <div class="invalid-feedback"><?= esc(session('errors.password')) ?></div>
                <?php endif; ?>
            </div>

            <button type="submit" class="btn-submit">
                <i data-lucide="log-in" style="width: 18px; height: 18px;"></i>
                <span>Masuk ke Panel</span>
            </button>
        </form>

        <div class="footer-nav">
            <a href="<?= base_url() ?>" class="back-link">
                <i data-lucide="arrow-left" style="width: 16px; height: 16px;"></i>
                <span>Kembali ke Halaman Utama</span>
            </a>
        </div>
    </div>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>
