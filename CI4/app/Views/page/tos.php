<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="card card-se p-4 p-lg-5">
    <span class="badge bg-primary-subtle text-primary align-self-start mb-2">Page::tos() → getTos() · Konvensi Auto Routing Improved CI 4</span>
    <h1 class="h2 fw-bold mb-3">Syarat &amp; Ketentuan Layanan</h1>
    <p class="text-secondary">Halaman ini dapat diakses melalui route eksplisit <code>GET /tos</code> yang memanggil <code>Page::tos()</code> dan meneruskannya ke <code>getTos()</code>. Pada CodeIgniter 4, ketika fitur <em>Auto Routing (Improved)</em> diaktifkan, nama method wajib diawali HTTP verb (misalnya <code>getTos()</code>) agar router hanya mengeksekusi method sesuai verb HTTP yang diizinkan.</p>
    <ol class="text-secondary small">
        <li class="mb-2">Harga buah segar dapat berubah mengikuti musim panen dan ditampilkan transparan dalam mata uang Rupiah (IDR).</li>
        <li class="mb-2">Pengiriman same-day berlaku untuk pesanan yang masuk sebelum pukul 15.00 WIB.</li>
        <li class="mb-2">Klaim garansi kesegaran dapat diajukan maksimal 24 jam setelah paket diterima dengan bukti foto.</li>
    </ol>
</div>
<?= $this->endSection() ?>

