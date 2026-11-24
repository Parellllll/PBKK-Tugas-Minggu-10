<?php

namespace App\Controllers;

class InfoController extends BaseController
{
    public function shipping(): string
    {
        return view('info/page', [
            'title'      => 'Informasi Pengiriman — ShopEase Fresh (CI 4)',
            'activeMenu' => 'info',
            'heading'    => 'Layanan Pengiriman Same-Day & Cold Chain',
            'badge'      => 'Route Group: /info/pengiriman',
            'lead'       => 'Pesanan buah segar yang dikonfirmasi sebelum pukul 15.00 WIB dikirim pada hari yang sama menggunakan kurir berpendingin.',
            'points'     => [
                ['title' => 'Pengiriman Instan (2–3 Jam)', 'desc' => 'Tersedia untuk wilayah Surabaya, Sidoarjo, dan Gresik dengan kemasan kotak termal.'],
                ['title' => 'Pengiriman Reguler Berpendingin', 'desc' => 'Antar kota Jawa Timur dengan garansi tiba maksimal 24 jam sejak panen/sortir.'],
                ['title' => 'Gratis Ongkir', 'desc' => 'Berlaku untuk pembelian minimal Rp 150.000 melalui halaman katalog ShopEase.'],
            ],
            'routeMeta'  => [
                'name'       => 'info.shipping',
                'pattern'    => 'GET /info/pengiriman (Route Group)',
                'controller' => 'App\Controllers\InfoController::shipping',
            ],
        ]);
    }

    public function warranty(): string
    {
        return view('info/page', [
            'title'      => 'Garansi Kesegaran — ShopEase Fresh (CI 4)',
            'activeMenu' => 'info',
            'heading'    => 'Garansi 100% Buah Segar atau Ganti Baru',
            'badge'      => 'Route Group: /info/garansi',
            'lead'       => 'Komitmen ShopEase Fresh memastikan setiap buah tiba dalam kondisi terbaik sesuai standar mutu kebun.',
            'points'     => [
                ['title' => 'Klaim Mudah 1×24 Jam', 'desc' => 'Lampirkan foto produk saat unboxing melalui halaman Contact untuk penggantian cepat.'],
                ['title' => 'Kontrol Mutu Tiga Tahap', 'desc' => 'Sortir panen di kebun, pemeriksaan gudang dingin, dan pengecekan ulang sebelum kirim.'],
                ['title' => 'Transparansi Asal Kebun', 'desc' => 'Setiap produk mencantumkan daerah asal panen dan kategori mutu yang jelas.'],
            ],
            'routeMeta'  => [
                'name'       => 'info.warranty',
                'pattern'    => 'GET /info/garansi (Route Group)',
                'controller' => 'App\Controllers\InfoController::warranty',
            ],
        ]);
    }
}

