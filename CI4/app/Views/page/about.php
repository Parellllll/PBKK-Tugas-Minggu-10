<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="card card-se p-4 p-lg-5 mb-4">
    <span class="badge bg-primary-subtle text-primary align-self-start mb-2">Page::about() · Named Route: page.about</span>
    <h1 class="h2 fw-bold mb-3">Tentang ShopEase Fresh &amp; Implementasi Routing CodeIgniter 4</h1>
    <p class="text-secondary mb-0">
        Proyek ini merupakan implementasi latihan <strong>PBKK-2-2 (Fungsi Router dan Controller)</strong> serta landasan <strong>Landing Page ShopEase</strong> menggunakan CodeIgniter 4.7.6. Seluruh halaman berbagi template utama <code>app/Views/layouts/main.php</code> melalui fitur View Layout CI 4 (<code>extend</code>, <code>section</code>, dan <code>include</code>).
    </p>
</div>

<div class="row g-4 mb-4">
    <div class="col-lg-6">
        <div class="card card-se h-100 p-4">
            <h2 class="h5 fw-bold mb-3">Perbandingan CI 3 vs CI 4</h2>
            <div class="table-responsive">
                <table class="table table-sm align-middle mb-0">
                    <thead class="table-light">
                        <tr><th>Aspek</th><th>CI 3.1.13</th><th>CI 4.7.6</th></tr>
                    </thead>
                    <tbody>
                        <tr><td>File Route</td><td><code>application/config/routes.php</code></td><td><code>app/Config/Routes.php</code></td></tr>
                        <tr><td>Definisi</td><td><code>$route['about'] = 'page/about';</code></td><td><code>$routes->get('about', 'Page::about');</code></td></tr>
                        <tr><td>Auto Routing</td><td>Aktif default</td><td>Nonaktif default (<code>$autoRoute = false</code>)</td></tr>
                        <tr><td>View Layout</td><td>Load header/body/footer manual</td><td><code>extend()</code> &amp; <code>renderSection()</code></td></tr>
                        <tr><td>CLI Inspeksi</td><td>Tidak ada</td><td><code>php spark routes</code></td></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card card-se h-100 p-4">
            <h2 class="h5 fw-bold mb-3">Identitas Mahasiswa</h2>
            <table class="table table-sm mb-3">
                <tr><th width="38%">Nama</th><td>Farrel Prastita Ramadhan</td></tr>
                <tr><th>NRP</th><td>5025241219</td></tr>
                <tr><th>Program Studi</th><td>Teknik Informatika, ITS</td></tr>
                <tr><th>Mata Kuliah</th><td>Pemrograman Berbasis Kerangka Kerja (PBKK)</td></tr>
                <tr><th>Framework</th><td>CodeIgniter <?= \CodeIgniter\CodeIgniter::CI_VERSION ?> (PHP <?= PHP_VERSION ?>)</td></tr>
            </table>
            <div class="alert alert-light border small mb-0">
                <strong>Catatan Auto Routing:</strong> Karena <code>$routes->setAutoRoute(false)</code>, mengakses <code>/page/about</code> atau <code>/page/getTos</code> langsung akan ditolak dengan HTTP 404 demi mencegah eksposur method tak terduga.
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

