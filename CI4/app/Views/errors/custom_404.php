<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="card card-se mx-auto text-center p-5" style="max-width:640px;">
    <div class="display-3 fw-bold text-danger">404</div>
    <h1 class="h4 fw-bold mt-2 mb-2">Halaman Tidak Ditemukan</h1>
    <p class="text-muted small mb-4">
        URL <code><?= esc($missingPath ?? current_url()) ?></code> tidak cocok dengan route eksplisit di <code>app/Config/Routes.php</code>.
        Karena <code>$routes->setAutoRoute(false)</code> aktif, CodeIgniter 4 menolak akses langsung ke segmen controller/method tanpa definisi route.
    </p>
    <div>
        <a href="<?= route_to('home') ?>" class="btn btn-se px-4 py-2 rounded-3">Kembali ke Beranda</a>
    </div>
</div>
<?= $this->endSection() ?>

