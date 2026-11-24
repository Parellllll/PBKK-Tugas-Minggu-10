<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'ShopEase Fresh — CodeIgniter 4') ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --se-primary: #6d28d9;
            --se-primary-dark: #5b21b6;
            --se-accent: #10b981;
            --se-dark: #0f172a;
        }
        body {
            font-family: 'Plus Jakarta Sans', system-ui, sans-serif;
            background-color: #f8fafc;
            color: #0f172a;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        main { flex: 1; }
        .route-ribbon {
            background: var(--se-dark);
            color: #e2e8f0;
            font-size: 12px;
        }
        .route-ribbon code {
            background: rgba(167, 139, 250, 0.18);
            color: #c4b5fd;
            padding: 2px 7px;
            border-radius: 6px;
        }
        .navbar-se {
            background: rgba(255,255,255,.94);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid #e2e8f0;
        }
        .brand-logo {
            width: 38px; height: 38px;
            border-radius: 10px;
            background: linear-gradient(135deg, #7c3aed, #4f46e5);
            color: #fff;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
        }
        .nav-link.active-se {
            background: #f5f3ff;
            color: var(--se-primary) !important;
            border-radius: 8px;
            font-weight: 700;
        }
        .hero-se {
            background: linear-gradient(135deg, #2e1065 0%, #5b21b6 50%, #4f46e5 100%);
            color: #fff;
            border-radius: 24px;
        }
        .btn-se {
            background: var(--se-primary);
            color: #fff;
            border: none;
            font-weight: 600;
        }
        .btn-se:hover { background: var(--se-primary-dark); color: #fff; }
        .card-se {
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            box-shadow: 0 2px 10px rgba(15, 23, 42, .04);
            transition: transform .15s ease, box-shadow .15s ease;
        }
        .card-se:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 24px rgba(15, 23, 42, .08);
        }
        .product-visual {
            height: 120px;
            border-radius: 15px 15px 0 0;
            padding: 18px;
            color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        footer.footer-se {
            background: #0f172a;
            color: #94a3b8;
        }
    </style>
</head>
<body>
    <?php if (isset($routeMeta)): ?>
    <div class="route-ribbon py-2">
        <div class="container d-flex flex-wrap justify-content-between align-items-center gap-2">
            <div>
                <strong class="text-white">CodeIgniter 4.7.6</strong> · ShopEase Fresh (PBKK Minggu 10 · Farrel Prastita Ramadhan / 5025241219)
            </div>
            <div class="d-flex flex-wrap gap-2 align-items-center">
                <span>Named Route: <code><?= esc($routeMeta['name']) ?></code></span>
                <span>Rule: <code><?= esc($routeMeta['pattern']) ?></code></span>
                <span>Handler: <code><?= esc($routeMeta['controller']) ?></code></span>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <?= $this->include('layouts/navbar') ?>

    <main class="py-4 py-md-5">
        <div class="container">
            <?= $this->renderSection('content') ?>
        </div>
    </main>

    <?= $this->include('layouts/footer') ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

