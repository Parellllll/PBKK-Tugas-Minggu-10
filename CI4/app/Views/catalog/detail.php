<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<nav aria-label="breadcrumb" class="mb-3">
    <ol class="breadcrumb small">
        <li class="breadcrumb-item"><a href="<?= route_to('home') ?>">Beranda</a></li>
        <li class="breadcrumb-item"><a href="<?= route_to('catalog.index') ?>">Katalog</a></li>
        <li class="breadcrumb-item"><a href="<?= route_to('catalog.category', $product['category']) ?>"><?= esc($categoryInfo['name']) ?></a></li>
        <li class="breadcrumb-item active"><?= esc($product['name']) ?></li>
    </ol>
</nav>

<div class="card card-se overflow-hidden mb-5">
    <div class="row g-0">
        <div class="col-md-5 p-4 p-lg-5 text-white d-flex flex-column justify-content-between" style="background:linear-gradient(135deg, <?= esc($product['accent']) ?>, #1e1b4b); min-height:260px;">
            <div>
                <span class="badge bg-white bg-opacity-25 text-white mb-2"><?= esc($categoryInfo['name']) ?></span>
                <div class="small opacity-75">ID Produk: #<?= (int) $product['id'] ?></div>
            </div>
            <div>
                <div class="small opacity-75">Asal Panen</div>
                <div class="h5 fw-bold mb-0"><?= esc($product['origin']) ?></div>
            </div>
        </div>
        <div class="col-md-7 p-4 p-lg-5">
            <h1 class="h3 fw-bold mb-2"><?= esc($product['name']) ?></h1>
            <div class="h3 fw-bold mb-3" style="color:#6d28d9;">
                Rp <?= number_format($product['price'], 0, ',', '.') ?>
                <span class="fs-6 text-muted fw-normal">/ <?= esc($product['unit']) ?></span>
            </div>
            <p class="text-secondary mb-3"><?= esc($product['summary']) ?></p>
            <div class="d-flex gap-3 mb-4 small">
                <span class="badge bg-success-subtle text-success px-3 py-2">Stok Tersedia: <?= (int) $product['stock'] ?></span>
                <span class="badge bg-light text-dark border px-3 py-2">Slug: <?= esc($product['slug']) ?></span>
            </div>
            <div class="p-3 rounded-3 bg-light border small mb-4">
                <strong>Named Route &amp; Multi-Placeholder:</strong><br>
                <code>$routes->get('produk/(:num)/(:segment)', 'CatalogController::detail/$1/$2', ['as' => 'catalog.detail']);</code><br>
                Argumen diterima: <code>$id = <?= (int) $product['id'] ?></code>, <code>$slug = '<?= esc($product['slug']) ?>'</code>
            </div>
            <a href="<?= route_to('catalog.index') ?>" class="btn btn-outline-secondary rounded-3">&larr; Kembali ke Katalog</a>
        </div>
    </div>
</div>

<h2 class="h5 fw-bold mb-3">Produk Lainnya</h2>
<div class="row g-3">
    <?php foreach (array_slice($related, 0, 3) as $r): ?>
        <div class="col-md-4">
            <div class="card card-se p-3 h-100">
                <div class="fw-bold mb-1"><?= esc($r['name']) ?></div>
                <div class="fw-bold mb-2" style="color:#6d28d9;">Rp <?= number_format($r['price'], 0, ',', '.') ?></div>
                <a href="<?= route_to('catalog.detail', $r['id'], $r['slug']) ?>" class="small text-decoration-none fw-semibold">Lihat Detail &rarr;</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<?= $this->endSection() ?>

