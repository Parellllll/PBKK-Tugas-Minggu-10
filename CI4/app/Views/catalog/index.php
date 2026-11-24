<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
    <div>
        <span class="badge bg-primary-subtle text-primary mb-2">
            <?= $activeCategory ? 'Filter Placeholder (:segment): ' . esc($activeCategory) : 'Route Group: /katalog' ?>
        </span>
        <h1 class="h2 fw-bold mb-1">
            <?= $activeCategory ? esc($categories[$activeCategory]['name']) : 'Semua Produk Katalog' ?>
        </h1>
        <p class="text-muted small mb-0">Menampilkan <?= count($products) ?> produk menggunakan route group <code>/katalog</code>.</p>
    </div>
    <div class="d-flex flex-wrap gap-2">
        <a href="<?= route_to('catalog.index') ?>" class="btn btn-sm rounded-pill <?= $activeCategory === null ? 'btn-se' : 'btn-outline-secondary' ?>">Semua</a>
        <?php foreach ($categories as $slug => $cat): ?>
            <a href="<?= route_to('catalog.category', $slug) ?>" class="btn btn-sm rounded-pill <?= $activeCategory === $slug ? 'btn-se' : 'btn-outline-secondary' ?>">
                <?= esc($cat['name']) ?>
            </a>
        <?php endforeach; ?>
    </div>
</div>

<div class="row g-4">
    <?php foreach ($products as $item): ?>
        <div class="col-md-6 col-lg-4">
            <div class="card card-se h-100">
                <div class="product-visual" style="background:linear-gradient(135deg, <?= esc($item['accent']) ?>, #1e1b4b);">
                    <div class="d-flex justify-content-between">
                        <span class="badge bg-white bg-opacity-25 text-white"><?= esc($categories[$item['category']]['name']) ?></span>
                        <span class="small opacity-75">Stok <?= (int) $item['stock'] ?></span>
                    </div>
                    <div class="small"><?= esc($item['origin']) ?></div>
                </div>
                <div class="card-body d-flex flex-column">
                    <h2 class="h6 fw-bold mb-1"><?= esc($item['name']) ?></h2>
                    <div class="fs-5 fw-bold mb-2" style="color:#6d28d9;">
                        Rp <?= number_format($item['price'], 0, ',', '.') ?>
                        <span class="small text-muted fw-normal">/ <?= esc($item['unit']) ?></span>
                    </div>
                    <p class="text-muted small flex-grow-1 mb-3"><?= esc($item['summary']) ?></p>
                    <a href="<?= route_to('catalog.detail', $item['id'], $item['slug']) ?>" class="btn btn-se w-100 rounded-3">
                        Lihat Detail (/katalog/produk/<?= (int) $item['id'] ?>/<?= esc($item['slug']) ?>)
                    </a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<?= $this->endSection() ?>

