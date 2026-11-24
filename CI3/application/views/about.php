<div class="card" style="margin-bottom:24px;">
    <div class="card-body" style="padding:32px;">
        <span style="display:inline-block; background:#dcfce7; color:#166534; font-weight:700; font-size:12px; padding:4px 12px; border-radius:999px; margin-bottom:12px;">Halaman About · Page::about()</span>
        <h1 style="font-size:30px; font-weight:800; margin-bottom:10px;">Tentang Toko Buah Segar &amp; Arsitektur MVC CI 3</h1>
        <p style="color:#475569; max-width:760px;">
            Halaman ini dipetakan dari URL <code>/about</code> menuju controller <code>Page</code> dan method <code>about()</code> melalui konfigurasi <code>application/config/routes.php</code>. Selain itu, karena CodeIgniter 3 mengaktifkan pola segmen URI otomatis secara default, halaman yang sama juga dapat diakses melalui <code>/page/about</code>.
        </p>
    </div>
</div>

<div class="grid-2" style="margin-bottom:24px;">
    <div class="card">
        <div class="card-body">
            <h3 style="font-size:18px; font-weight:800; margin-bottom:12px;">Alur Request pada CodeIgniter 3</h3>
            <p class="muted" style="margin-bottom:12px;">Setiap permintaan HTTP masuk ke Front Controller <code>index.php</code>, lalu diteruskan ke Router untuk dicocokkan dengan aturan di <code>routes.php</code>:</p>
            <pre style="background:#0f172a; color:#86efac; padding:14px; border-radius:10px; font-size:12px; overflow-x:auto;">Browser (/about)
  └──▶ index.php (Front Controller)
         └──▶ CI_Router (application/config/routes.php)
                └──▶ Page::about() (CI_Controller)
                       └──▶ $this->load->view('about')
                              └──▶ HTML Response (HTTP 200)</pre>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h3 style="font-size:18px; font-weight:800; margin-bottom:12px;">Profil Pengembang Tugas</h3>
            <table class="table">
                <tr><th>Nama</th><td>Farrel Prastita Ramadhan</td></tr>
                <tr><th>NRP</th><td>5025241219</td></tr>
                <tr><th>Mata Kuliah</th><td>Pemrograman Berbasis Kerangka Kerja (PBKK)</td></tr>
                <tr><th>Framework</th><td>CodeIgniter 3.1.13 (PHP <?= PHP_VERSION ?>)</td></tr>
            </table>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <h3 style="font-size:18px; font-weight:800; margin-bottom:14px;">Daftar Route Aktif (<code>application/config/routes.php</code>)</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Pola URL</th>
                    <th>Controller / Method</th>
                    <th>Jenis Pemetaan</th>
                    <th>Uji Langsung</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($routes_map as $r): ?>
                    <tr>
                        <td><code><?= htmlspecialchars($r['url'], ENT_QUOTES, 'UTF-8') ?></code></td>
                        <td><code><?= htmlspecialchars($r['target'], ENT_QUOTES, 'UTF-8') ?></code></td>
                        <td><?= htmlspecialchars($r['type'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td>
                            <?php $href = $r['url'] === '/buah/(:any)' ? base_url('buah/mangga-harum-manis') : base_url(ltrim($r['url'], '/')); ?>
                            <a href="<?= $href ?>" style="color:#16a34a; font-weight:700; text-decoration:none;">Buka &rarr;</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

