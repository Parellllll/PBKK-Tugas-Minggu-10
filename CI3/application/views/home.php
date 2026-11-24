<section class="hero">
    <div>
        <span class="pill" style="margin-bottom:12px;">PBKK-2-2 · CodeIgniter 3.1.13</span>
        <h1>Buah Segar Pilihan Langsung dari Petani Nusantara</h1>
        <p>Aplikasi latihan Router dan Controller pada CodeIgniter 3 bertema Toko Buah (<code>localhost/tokobuah</code>). Menampilkan pemetaan default controller, custom route <code>/about</code> &amp; <code>/contact</code>, wildcard <code>/buah/(:any)</code>, serta auto-segment URI bawaan CI3.</p>
        <div style="display:flex; gap:12px; flex-wrap:wrap;">
            <a class="btn btn-white" href="<?= base_url('about') ?>">Pelajari Routing &rarr;</a>
            <a class="btn btn-outline-white" href="<?= base_url('contact') ?>">Hubungi Toko</a>
        </div>
    </div>
    <div class="route-card">
        <h4>Informasi Eksekusi Route Aktif</h4>
        <div>URL: <code><?= htmlspecialchars($route_info['url'], ENT_QUOTES, 'UTF-8') ?></code></div>
        <div style="margin-top:8px;">Aturan di <code>routes.php</code>:<code><?= htmlspecialchars($route_info['route_rule'], ENT_QUOTES, 'UTF-8') ?></code></div>
        <div style="margin-top:8px;">Dieksekusi oleh:<code><?= htmlspecialchars($route_info['controller'], ENT_QUOTES, 'UTF-8') ?></code></div>
    </div>
</section>

<div style="display:flex; justify-content:space-between; align-items:end; margin-bottom:20px; flex-wrap:wrap; gap:12px;">
    <div>
        <h2 style="font-size:24px; font-weight:800;">Katalog Buah Segar Hari Ini</h2>
        <p class="muted">Klik salah satu produk untuk menguji wildcard route <code>$route['buah/(:any)'] = 'page/buah/$1';</code></p>
    </div>
    <span style="font-size:13px; color:#15803d; font-weight:700;"><?= count($fruits) ?> Produk Tersedia</span>
</div>

<div class="grid-3">
    <?php foreach ($fruits as $slug => $item): ?>
        <article class="card">
            <div class="fruit-banner" style="background: linear-gradient(135deg, <?= $item['color'] ?>, #0f172a);">
                <div>
                    <span class="pill"><?= htmlspecialchars($item['tag'], ENT_QUOTES, 'UTF-8') ?></span>
                    <div style="font-size:12px; opacity:.88; margin-top:8px;"><?= htmlspecialchars($item['origin'], ENT_QUOTES, 'UTF-8') ?></div>
                </div>
                <div style="font-size:32px; font-weight:800; opacity:.28;">#<?= strtoupper(substr($slug, 0, 2)) ?></div>
            </div>
            <div class="card-body">
                <h3 style="font-size:17px; font-weight:700;"><?= htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8') ?></h3>
                <div class="price">Rp <?= number_format($item['price'], 0, ',', '.') ?> <span class="muted">/ <?= htmlspecialchars($item['unit'], ENT_QUOTES, 'UTF-8') ?></span></div>
                <p class="muted" style="margin-bottom:16px;"><?= htmlspecialchars($item['desc'], ENT_QUOTES, 'UTF-8') ?></p>
                <a class="btn btn-green" style="width:100%; text-align:center;" href="<?= base_url('buah/' . $slug) ?>">Lihat Detail (/buah/<?= htmlspecialchars($slug, ENT_QUOTES, 'UTF-8') ?>)</a>
            </div>
        </article>
    <?php endforeach; ?>
</div>

