<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<section class="hero-se p-4 p-lg-5 mb-5">
    <div class="row align-items-center g-4">
        <div class="col-lg-7">
            <span class="badge rounded-pill bg-white bg-opacity-25 px-3 py-2 mb-3">ShopEase · CodeIgniter 4.7.6 · MVC &amp; Routing</span>
            <h1 class="display-6 fw-extrabold mb-3" style="font-weight:800;">Landing Page Toko Buah &amp; E-Commerce ShopEase Fresh</h1>
            <p class="lead fs-6 opacity-90 mb-4">
                Implementasi Routing eksplisit, Controller modular, View Layout CI 4, Route Group (<code>/katalog</code> &amp; <code>/info</code>), Placeholder (<code>(:num)</code> &amp; <code>(:segment)</code>), serta Named Route (<code>route_to()</code>) sesuai materi PBKK-2-2 dan PRD ShopEase.
            </p>
            <div class="d-flex flex-wrap gap-2">
                <a href="<?= route_to('catalog.index') ?>" class="btn btn-light text-primary fw-bold px-4 py-2 rounded-3">Jelajahi Katalog &rarr;</a>
                <a href="<?= route_to('page.about') ?>" class="btn btn-outline-light fw-semibold px-4 py-2 rounded-3">Tentang Arsitektur</a>
                <a href="<?= route_to('page.faqs') ?>" class="btn btn-outline-light fw-semibold px-4 py-2 rounded-3">Lihat FAQs</a>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="p-4 rounded-4" style="background:rgba(15,23,42,.38); border:1px solid rgba(255,255,255,.18);">
                <div class="text-uppercase small fw-bold mb-2" style="color:#c4b5fd;">Konfigurasi Routing CI 4</div>
                <pre class="mb-0 small text-warning" style="white-space:pre-wrap;">$routes->setAutoRoute(false);
$routes->get('/', 'Home::index', ['as' => 'home']);
$routes->get('about', 'Page::about', ['as' => 'page.about']);
$routes->group('katalog', static function ($r) {
    $r->get('(:segment)', 'CatalogController::category/$1');
    $r->get('produk/(:num)/(:segment)', 'CatalogController::detail/$1/$2');
});</pre>
            </div>
        </div>
    </div>
</section>

<section class="mb-5">
    <div class="d-flex justify-content-between align-items-end mb-3 flex-wrap gap-2">
        <div>
            <h2 class="h4 fw-bold mb-1">Kategori Belanja (Placeholder <code>(:segment)</code>)</h2>
            <p class="text-muted small mb-0">Setiap kartu diarahkan ke Named Route <code>route_to('catalog.category', $slug)</code></p>
        </div>
        <a href="<?= route_to('catalog.index') ?>" class="text-decoration-none fw-semibold" style="color:#6d28d9;">Lihat Semua &rarr;</a>
    </div>
    <div class="row g-3">
        <?php foreach ($categories as $slug => $cat): ?>
            <div class="col-md-4">
                <a href="<?= route_to('catalog.category', $slug) ?>" class="text-decoration-none text-dark">
                    <div class="card card-se h-100 p-4">
                        <span class="badge bg-primary-subtle text-primary align-self-start mb-2">/katalog/<?= esc($slug) ?></span>
                        <h3 class="h5 fw-bold mb-2"><?= esc($cat['name']) ?></h3>
                        <p class="text-muted small mb-0"><?= esc($cat['desc']) ?></p>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<section>
    <div class="d-flex justify-content-between align-items-end mb-3 flex-wrap gap-2">
        <div>
            <h2 class="h4 fw-bold mb-1">Produk Pilihan Hari Ini</h2>
            <p class="text-muted small mb-0">Detail produk memakai placeholder ganda <code>/katalog/produk/(:num)/(:segment)</code></p>
        </div>
        <span class="badge text-bg-light border text-dark px-3 py-2"><?= count($featured) ?> Produk Aktif</span>
    </div>
    <div class="row g-4">
        <?php foreach ($featured as $item): ?>
            <div class="col-md-6 col-lg-4">
                <div class="card card-se h-100">
                    <div class="product-visual" style="background:linear-gradient(135deg, <?= esc($item['accent']) ?>, #1e1b4b);">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="badge bg-white bg-opacity-25 text-white"><?= esc($categories[$item['category']]['name']) ?></span>
                            <span class="small fw-bold opacity-75">ID #<?= (int) $item['id'] ?></span>
                        </div>
                        <div class="small opacity-90"><?= esc($item['origin']) ?></div>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h3 class="h6 fw-bold mb-1"><?= esc($item['name']) ?></h3>
                        <div class="fs-5 fw-bold mb-2" style="color:#6d28d9;">
                            Rp <?= number_format($item['price'], 0, ',', '.') ?>
                            <span class="small text-muted fw-normal">/ <?= esc($item['unit']) ?></span>
                        </div>
                        <p class="text-muted small mb-3 flex-grow-1"><?= esc($item['summary']) ?></p>
                        <a href="<?= route_to('catalog.detail', $item['id'], $item['slug']) ?>" class="btn btn-se w-100 rounded-3">
                            Detail Produk
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>
<?= $this->endSection() ?>

