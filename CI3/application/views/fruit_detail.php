<div style="margin-bottom:18px;">
    <a href="<?= base_url() ?>" style="color:#16a34a; font-weight:700; text-decoration:none;">&larr; Kembali ke Beranda</a>
</div>

<div class="card" style="margin-bottom:28px;">
    <div class="fruit-banner" style="height:160px; background: linear-gradient(135deg, <?= $fruit['color'] ?>, #0f172a);">
        <div>
            <span class="pill"><?= htmlspecialchars($fruit['tag'], ENT_QUOTES, 'UTF-8') ?></span>
            <h1 style="font-size:30px; margin-top:10px; font-weight:800;"><?= htmlspecialchars($fruit['name'], ENT_QUOTES, 'UTF-8') ?></h1>
            <div style="opacity:.9; font-size:14px;">Asal: <?= htmlspecialchars($fruit['origin'], ENT_QUOTES, 'UTF-8') ?></div>
        </div>
        <div style="text-align:right;">
            <div style="font-size:12px; opacity:.85;">Harga Satuan</div>
            <div style="font-size:28px; font-weight:800;">Rp <?= number_format($fruit['price'], 0, ',', '.') ?></div>
            <div style="font-size:12px; opacity:.85;">per <?= htmlspecialchars($fruit['unit'], ENT_QUOTES, 'UTF-8') ?></div>
        </div>
    </div>
    <div class="card-body" style="padding:28px;">
        <div class="grid-2">
            <div>
                <h3 style="font-size:18px; font-weight:700; margin-bottom:8px;">Deskripsi Produk</h3>
                <p style="color:#334155; margin-bottom:16px;"><?= htmlspecialchars($fruit['desc'], ENT_QUOTES, 'UTF-8') ?></p>
                <p><strong>Stok tersedia:</strong> <?= (int) $fruit['stock'] ?> <?= htmlspecialchars($fruit['unit'], ENT_QUOTES, 'UTF-8') ?></p>
            </div>
            <div style="background:#f8fafc; border:1px solid #e2e8f0; border-radius:12px; padding:18px;">
                <h4 style="font-size:14px; font-weight:700; margin-bottom:8px;">Parameter Wildcard Route CI 3</h4>
                <p class="muted">Parameter <code>$slug</code> dikirim otomatis ke method <code>Page::buah($slug)</code> melalui aturan:</p>
                <code style="display:block; margin-top:8px; background:#0f172a; color:#86efac; padding:10px; border-radius:8px; font-size:12px;">$route['buah/(:any)'] = 'page/buah/$1';<br>// Nilai $slug = "<?= htmlspecialchars($fruit['slug'], ENT_QUOTES, 'UTF-8') ?>"</code>
            </div>
        </div>
    </div>
</div>

<h3 style="font-size:18px; font-weight:800; margin-bottom:14px;">Buah Segar Lainnya</h3>
<div class="grid-3">
    <?php foreach (array_slice($others, 0, 3, true) as $s => $o): ?>
        <div class="card">
            <div class="card-body">
                <strong><?= htmlspecialchars($o['name'], ENT_QUOTES, 'UTF-8') ?></strong>
                <div class="price" style="font-size:16px;">Rp <?= number_format($o['price'], 0, ',', '.') ?></div>
                <a href="<?= base_url('buah/' . $s) ?>" style="color:#16a34a; font-weight:700; font-size:13px; text-decoration:none;">Buka /buah/<?= htmlspecialchars($s, ENT_QUOTES, 'UTF-8') ?> &rarr;</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>

