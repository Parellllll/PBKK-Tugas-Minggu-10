<div class="grid-2">
    <div class="card">
        <div class="card-body" style="padding:28px;">
            <span style="display:inline-block; background:#fef3c7; color:#92400e; font-weight:700; font-size:12px; padding:4px 12px; border-radius:999px; margin-bottom:12px;">Halaman Contact · Page::contact()</span>
            <h1 style="font-size:28px; font-weight:800; margin-bottom:10px;">Hubungi Toko Buah Segar</h1>
            <p class="muted" style="margin-bottom:20px;">Kirim pertanyaan seputar stok buah segar, pemesanan parsel, atau pengiriman area Surabaya dan sekitarnya.</p>

            <?php if ($submitted): ?>
                <div class="alert-success">
                    <strong>Pesan berhasil diterima oleh <code>Page::contact()</code>!</strong><br>
                    Terima kasih, <strong><?= htmlspecialchars($form_data['nama'], ENT_QUOTES, 'UTF-8') ?></strong> (<?= htmlspecialchars($form_data['email'], ENT_QUOTES, 'UTF-8') ?>). Pesan Anda: "<em><?= htmlspecialchars($form_data['pesan'], ENT_QUOTES, 'UTF-8') ?></em>" telah dicatat.
                </div>
            <?php endif; ?>

            <form method="post" action="<?= base_url('contact') ?>">
                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input class="form-control" id="nama" name="nama" type="text" required placeholder="Contoh: Farrel Prastita Ramadhan" value="<?= htmlspecialchars($form_data['nama'], ENT_QUOTES, 'UTF-8') ?>">
                </div>
                <div class="form-group">
                    <label for="email">Alamat Email</label>
                    <input class="form-control" id="email" name="email" type="email" required placeholder="nama@email.com" value="<?= htmlspecialchars($form_data['email'], ENT_QUOTES, 'UTF-8') ?>">
                </div>
                <div class="form-group">
                    <label for="pesan">Pesan / Permintaan</label>
                    <textarea class="form-control" id="pesan" name="pesan" rows="4" required placeholder="Tulis pesan Anda di sini..."><?= htmlspecialchars($form_data['pesan'], ENT_QUOTES, 'UTF-8') ?></textarea>
                </div>
                <button class="btn btn-green" type="submit">Kirim Pesan (POST /contact)</button>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-body" style="padding:28px;">
            <h3 style="font-size:19px; font-weight:800; margin-bottom:14px;">Informasi Gerai</h3>
            <table class="table">
                <tr><th>Alamat</th><td>Jl. Teknik Kimia No. 10, Sukolilo, Surabaya</td></tr>
                <tr><th>Jam Operasional</th><td>Setiap hari, 07.00 – 21.00 WIB</td></tr>
                <tr><th>WhatsApp / Telp</th><td>(031) 599-1037 / 0812-3456-7890</td></tr>
                <tr><th>Email</th><td>halo@tokobuah-ci3.local</td></tr>
                <tr><th>Route Aktif</th><td><code>$route['contact'] = 'page/contact';</code></td></tr>
            </table>
            <div style="margin-top:20px; background:#f0fdf4; border:1px solid #bbf7d0; border-radius:12px; padding:16px;">
                <strong style="color:#166534;">Catatan Praktikum CI 3:</strong>
                <p class="muted" style="margin-top:6px;">Pada CI 3, satu route <code>$route['contact'] = 'page/contact';</code> melayani method GET sekaligus POST. Controller membedakannya lewat <code>$this->input->method()</code>.</p>
            </div>
        </div>
    </div>
</div>

