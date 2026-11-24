<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8') ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --green-700: #15803d;
            --green-600: #16a34a;
            --green-50: #f0fdf4;
            --amber-500: #f59e0b;
            --slate-900: #0f172a;
            --slate-700: #334155;
            --slate-500: #64748b;
            --slate-200: #e2e8f0;
            --slate-50: #f8fafc;
        }
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
            background: var(--slate-50);
            color: var(--slate-900);
            line-height: 1.6;
        }
        .topbar {
            background: #0f172a;
            color: #e2e8f0;
            font-size: 12px;
            padding: 8px 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 8px;
        }
        .topbar code {
            background: rgba(255,255,255,0.12);
            color: #86efac;
            padding: 2px 8px;
            border-radius: 6px;
            font-family: ui-monospace, Consolas, monospace;
        }
        header.navbar {
            background: #ffffff;
            border-bottom: 1px solid var(--slate-200);
            position: sticky;
            top: 0;
            z-index: 20;
        }
        .nav-inner {
            max-width: 1120px;
            margin: 0 auto;
            padding: 16px 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }
        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            color: var(--slate-900);
            font-weight: 800;
            font-size: 20px;
        }
        .brand-badge {
            width: 38px; height: 38px;
            border-radius: 10px;
            background: linear-gradient(135deg, #16a34a, #15803d);
            color: #fff;
            display: grid; place-items: center;
            font-size: 18px;
        }
        .brand small {
            display: block;
            font-size: 11px;
            font-weight: 600;
            color: var(--green-700);
        }
        nav.nav-links {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }
        nav.nav-links a {
            text-decoration: none;
            color: var(--slate-700);
            font-weight: 600;
            font-size: 14px;
            padding: 8px 14px;
            border-radius: 8px;
            transition: .15s;
        }
        nav.nav-links a:hover { background: var(--green-50); color: var(--green-700); }
        nav.nav-links a.active { background: var(--green-600); color: #fff; }
        .container { max-width: 1120px; margin: 0 auto; padding: 32px 24px 56px; }
        .hero {
            background: linear-gradient(135deg, #14532d 0%, #16a34a 55%, #22c55e 100%);
            color: #fff;
            border-radius: 20px;
            padding: 40px 36px;
            margin-bottom: 32px;
            display: grid;
            grid-template-columns: 1.5fr 1fr;
            gap: 28px;
            align-items: center;
        }
        .hero h1 { font-size: 34px; line-height: 1.2; margin-bottom: 12px; font-weight: 800; }
        .hero p { opacity: .92; font-size: 15px; margin-bottom: 22px; }
        .btn {
            display: inline-block;
            padding: 11px 20px;
            border-radius: 10px;
            font-weight: 700;
            font-size: 14px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: .15s;
        }
        .btn-white { background: #fff; color: var(--green-700); }
        .btn-white:hover { background: var(--green-50); }
        .btn-outline-white { background: rgba(255,255,255,.15); color: #fff; border: 1px solid rgba(255,255,255,.4); }
        .btn-green { background: var(--green-600); color: #fff; }
        .btn-green:hover { background: var(--green-700); }
        .route-card {
            background: rgba(15,23,42,.38);
            border: 1px solid rgba(255,255,255,.22);
            border-radius: 14px;
            padding: 18px;
            font-size: 13px;
        }
        .route-card h4 { font-size: 12px; text-transform: uppercase; letter-spacing: .06em; color: #bbf7d0; margin-bottom: 10px; }
        .route-card code { display: block; background: rgba(0,0,0,.35); padding: 8px 10px; border-radius: 8px; margin-top: 6px; color: #fde68a; font-size: 12px; overflow-x: auto; }
        .grid-3 { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; }
        .grid-2 { display: grid; grid-template-columns: repeat(2, 1fr); gap: 24px; }
        .card {
            background: #fff;
            border: 1px solid var(--slate-200);
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(15,23,42,.04);
        }
        .card-body { padding: 20px; }
        .fruit-banner {
            height: 110px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 18px 20px;
            color: #fff;
        }
        .pill {
            display: inline-block;
            font-size: 11px;
            font-weight: 700;
            padding: 4px 10px;
            border-radius: 999px;
            background: rgba(255,255,255,.22);
            color: #fff;
        }
        .price { font-size: 20px; font-weight: 800; color: var(--green-700); margin: 10px 0 6px; }
        .muted { color: var(--slate-500); font-size: 13px; }
        .table { width: 100%; border-collapse: collapse; font-size: 14px; }
        .table th, .table td { text-align: left; padding: 12px 14px; border-bottom: 1px solid var(--slate-200); }
        .table th { background: var(--slate-50); font-weight: 700; color: var(--slate-700); }
        .form-group { margin-bottom: 16px; }
        .form-group label { display: block; font-size: 13px; font-weight: 700; margin-bottom: 6px; color: var(--slate-700); }
        .form-control {
            width: 100%;
            padding: 11px 14px;
            border: 1px solid #cbd5e1;
            border-radius: 10px;
            font-family: inherit;
            font-size: 14px;
        }
        .alert-success {
            background: #dcfce7;
            border: 1px solid #86efac;
            color: #166534;
            padding: 14px 18px;
            border-radius: 12px;
            margin-bottom: 20px;
        }
        footer {
            background: #0f172a;
            color: #94a3b8;
            padding: 28px 24px;
            font-size: 13px;
        }
        .footer-inner {
            max-width: 1120px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 12px;
        }
        @media (max-width: 820px) {
            .hero, .grid-3, .grid-2 { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>
    <div class="topbar">
        <div>
            <strong>CodeIgniter 3.1.13</strong> · Toko Buah Segar · Tugas Minggu 10 PBKK (Farrel Prastita Ramadhan — 5025241219)
        </div>
        <div>
            Controller: <code><?= htmlspecialchars($route_info['controller'], ENT_QUOTES, 'UTF-8') ?></code>
            &nbsp;|&nbsp;
            Route: <code><?= htmlspecialchars($route_info['route_rule'], ENT_QUOTES, 'UTF-8') ?></code>
        </div>
    </div>
    <header class="navbar">
        <div class="nav-inner">
            <a class="brand" href="<?= base_url() ?>">
                <span class="brand-badge">TB</span>
                <span>TokoBuah<small>Segar Langsung Kebun · CI 3</small></span>
            </a>
            <nav class="nav-links">
                <a href="<?= base_url() ?>" class="<?= $active_menu === 'home' ? 'active' : '' ?>">Beranda</a>
                <a href="<?= base_url('about') ?>" class="<?= $active_menu === 'about' ? 'active' : '' ?>">About</a>
                <a href="<?= base_url('contact') ?>" class="<?= $active_menu === 'contact' ? 'active' : '' ?>">Contact</a>
                <a href="<?= base_url('page/about') ?>">Auto URI (/page/about)</a>
                <a href="<?= base_url('welcome') ?>">Welcome CI3</a>
            </nav>
        </div>
    </header>
    <main class="container">

