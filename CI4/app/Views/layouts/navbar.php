<nav class="navbar navbar-expand-lg navbar-se sticky-top py-3">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center gap-2 fw-bold text-dark" href="<?= route_to('home') ?>">
            <span class="brand-logo">SE</span>
            <span>
                ShopEase Fresh
                <small class="d-block text-muted fw-semibold" style="font-size:11px; line-height:1;">Toko Buah &amp; Online Store · CI 4</small>
            </span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav ms-auto gap-1 align-items-lg-center">
                <li class="nav-item">
                    <a class="nav-link px-3 <?= ($activeMenu ?? '') === 'home' ? 'active-se' : '' ?>" href="<?= route_to('home') ?>">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3 <?= ($activeMenu ?? '') === 'catalog' ? 'active-se' : '' ?>" href="<?= route_to('catalog.index') ?>">Katalog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3 <?= ($activeMenu ?? '') === 'about' ? 'active-se' : '' ?>" href="<?= route_to('page.about') ?>">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3 <?= ($activeMenu ?? '') === 'contact' ? 'active-se' : '' ?>" href="<?= route_to('page.contact') ?>">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3 <?= ($activeMenu ?? '') === 'faqs' ? 'active-se' : '' ?>" href="<?= route_to('page.faqs') ?>">FAQs</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle px-3 <?= ($activeMenu ?? '') === 'info' ? 'active-se' : '' ?>" href="#" role="button" data-bs-toggle="dropdown">Info (Group)</a>
                    <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0">
                        <li><a class="dropdown-item" href="<?= route_to('info.shipping') ?>">Pengiriman (/info/pengiriman)</a></li>
                        <li><a class="dropdown-item" href="<?= route_to('info.warranty') ?>">Garansi (/info/garansi)</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="<?= route_to('page.tos') ?>">Syarat &amp; Ketentuan (/tos)</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

