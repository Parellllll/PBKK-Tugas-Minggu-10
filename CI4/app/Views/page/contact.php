<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="row g-4">
    <div class="col-lg-7">
        <div class="card card-se p-4 p-lg-5">
            <span class="badge bg-primary-subtle text-primary align-self-start mb-2">GET &amp; POST /contact · Page::contact() / sendContact()</span>
            <h1 class="h3 fw-bold mb-2">Hubungi Tim ShopEase Fresh</h1>
            <p class="text-muted small mb-4">Form ini memisahkan penanganan route <code>GET /contact</code> dan <code>POST /contact</code> dengan validasi server-side CodeIgniter 4 serta perlindungan CSRF.</p>

            <?php if (!empty($submitted)): ?>
                <div class="alert alert-success rounded-3">
                    <strong>Pesan terkirim melalui <code>Page::sendContact()</code>!</strong><br>
                    Halo <strong><?= esc($formData['nama']) ?></strong> (<?= esc($formData['email']) ?>), pesan Anda dengan topik <em><?= esc($formData['topik']) ?></em> sudah kami terima.
                </div>
            <?php endif; ?>

            <?php if (!empty($errors)): ?>
                <div class="alert alert-danger rounded-3">
                    <ul class="mb-0 small">
                        <?php foreach ($errors as $err): ?>
                            <li><?= esc($err) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form method="post" action="<?= route_to('page.contact.send') ?>">
                <?= csrf_field() ?>
                <div class="mb-3">
                    <label class="form-label fw-semibold small" for="nama">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= esc($formData['nama'] ?? '') ?>" placeholder="Farrel Prastita Ramadhan" required>
                </div>
                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold small" for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= esc($formData['email'] ?? '') ?>" placeholder="farrel@shopease.local" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold small" for="topik">Topik</label>
                        <select class="form-select" id="topik" name="topik">
                            <?php foreach (['Pertanyaan Produk', 'Pemesanan Hampers', 'Pengiriman & Garansi', 'Kerja Sama Kebun'] as $opt): ?>
                                <option value="<?= esc($opt) ?>" <?= ($formData['topik'] ?? '') === $opt ? 'selected' : '' ?>><?= esc($opt) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold small" for="pesan">Pesan</label>
                    <textarea class="form-control" id="pesan" name="pesan" rows="4" required placeholder="Tuliskan pertanyaan Anda..."><?= esc($formData['pesan'] ?? '') ?></textarea>
                </div>
                <button type="submit" class="btn btn-se px-4 py-2 rounded-3">Kirim Pesan</button>
            </form>
        </div>
    </div>

    <div class="col-lg-5">
        <div class="card card-se p-4 h-100">
            <h2 class="h5 fw-bold mb-3">Saluran Layanan Pelanggan</h2>
            <ul class="list-group list-group-flush small mb-4">
                <li class="list-group-item px-0"><strong>Alamat Gudang Segar:</strong><br>Jl. Teknik Informatika No. 12, Sukolilo, Surabaya</li>
                <li class="list-group-item px-0"><strong>Jam Layanan:</strong><br>Senin – Minggu, 07.00 – 21.00 WIB</li>
                <li class="list-group-item px-0"><strong>Email:</strong><br>support@shopease-fresh.local</li>
                <li class="list-group-item px-0"><strong>Hotline:</strong><br>(031) 599-1219</li>
            </ul>
            <div class="p-3 rounded-3 bg-light border small">
                <strong>Route Group Terkait:</strong>
                <div class="mt-2 d-flex flex-column gap-1">
                    <a href="<?= route_to('info.shipping') ?>" class="text-decoration-none fw-semibold">&rarr; Informasi Pengiriman (/info/pengiriman)</a>
                    <a href="<?= route_to('info.warranty') ?>" class="text-decoration-none fw-semibold">&rarr; Garansi Kesegaran (/info/garansi)</a>
                    <a href="<?= route_to('page.faqs') ?>" class="text-decoration-none fw-semibold">&rarr; Pertanyaan Umum (/faqs)</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

