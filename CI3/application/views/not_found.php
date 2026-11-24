<div class="card" style="max-width:640px; margin:32px auto; text-align:center;">
    <div class="card-body" style="padding:44px 32px;">
        <div style="font-size:56px; font-weight:800; color:#dc2626; line-height:1;">404</div>
        <h1 style="font-size:24px; font-weight:800; margin:12px 0 8px;">Halaman Tidak Ditemukan</h1>
        <p class="muted" style="margin-bottom:20px;">
            Path <code>/<?= htmlspecialchars($missing_path, ENT_QUOTES, 'UTF-8') ?></code> tidak cocok dengan route atau controller mana pun.
            Halaman ini ditangani oleh <code>$route['404_override'] = 'page/not_found';</code> dengan HTTP Status <strong>404 Not Found</strong>.
        </p>
        <a class="btn btn-green" href="<?= base_url() ?>">Kembali ke Beranda</a>
    </div>
</div>

