<?php

namespace App\Controllers;

use CodeIgniter\Exceptions\PageNotFoundException;

class CatalogController extends BaseController
{
    public static function getCategories(): array
    {
        return [
            'buah-lokal'  => ['name' => 'Buah Lokal Nusantara', 'desc' => 'Panen segar langsung dari petani Probolinggo, Batu, dan Ciwidey.', 'badge' => 'emerald'],
            'buah-impor'  => ['name' => 'Buah Impor Premium', 'desc' => 'Pilihan buah grade A dengan standar rantai dingin terjaga.', 'badge' => 'indigo'],
            'paket-sehat' => ['name' => 'Paket & Hampers', 'desc' => 'Parcel buah siap kirim untuk keluarga dan kebutuhan korporasi.', 'badge' => 'amber'],
        ];
    }

    public static function getProducts(): array
    {
        return [
            101 => [
                'id'       => 101,
                'slug'     => 'mangga-harum-manis',
                'category' => 'buah-lokal',
                'name'     => 'Mangga Harum Manis Probolinggo',
                'price'    => 38000,
                'unit'     => 'kg',
                'stock'    => 42,
                'origin'   => 'Probolinggo, Jatim',
                'accent'   => '#f59e0b',
                'summary'  => 'Daging tebal, aroma harum khas, matang pohon alami tanpa karbit.',
            ],
            102 => [
                'id'       => 102,
                'slug'     => 'apel-manalagi-batu',
                'category' => 'buah-lokal',
                'name'     => 'Apel Manalagi Kota Batu',
                'price'    => 32000,
                'unit'     => 'kg',
                'stock'    => 58,
                'origin'   => 'Kota Batu, Jatim',
                'accent'   => '#16a34a',
                'summary'  => 'Renyah, manis seimbang, cocok untuk camilan harian dan olahan salad.',
            ],
            103 => [
                'id'       => 103,
                'slug'     => 'alpukat-mentega-jumbo',
                'category' => 'buah-lokal',
                'name'     => 'Alpukat Mentega Jumbo',
                'price'    => 44000,
                'unit'     => 'kg',
                'stock'    => 27,
                'origin'   => 'Kendal, Jateng',
                'accent'   => '#15803d',
                'summary'  => 'Tekstur pulen creamy kuning mentega dengan biji kecil.',
            ],
            104 => [
                'id'       => 104,
                'slug'     => 'anggur-shine-muscat',
                'category' => 'buah-impor',
                'name'     => 'Anggur Hijau Shine Muscat',
                'price'    => 89000,
                'unit'     => '500g',
                'stock'    => 19,
                'origin'   => 'Impor Grade A',
                'accent'   => '#65a30d',
                'summary'  => 'Tanpa biji, kulit tipis renyah, rasa manis beraroma floral.',
            ],
            105 => [
                'id'       => 105,
                'slug'     => 'kiwi-gold-zespri',
                'category' => 'buah-impor',
                'name'     => 'Kiwi Gold SunGold',
                'price'    => 74000,
                'unit'     => 'pack 4 pcs',
                'stock'    => 25,
                'origin'   => 'Selandia Baru',
                'accent'   => '#ca8a04',
                'summary'  => 'Kaya vitamin C dengan rasa manis tropis yang lembut.',
            ],
            106 => [
                'id'       => 106,
                'slug'     => 'hampers-segar-shopease',
                'category' => 'paket-sehat',
                'name'     => 'Hampers Buah Premium ShopEase',
                'price'    => 185000,
                'unit'     => 'box 3kg',
                'stock'    => 14,
                'origin'   => 'Kurasi ShopEase',
                'accent'   => '#7c3aed',
                'summary'  => 'Berisi apel, jeruk, anggur muscat, pir, dan kartu ucapan eksklusif.',
            ],
        ];
    }

    public function index(): string
    {
        return view('catalog/index', [
            'title'          => 'Katalog Buah & Produk — ShopEase Fresh (CI 4)',
            'activeMenu'     => 'catalog',
            'activeCategory' => null,
            'categories'     => self::getCategories(),
            'products'       => self::getProducts(),
            'routeMeta'      => [
                'name'       => 'catalog.index',
                'pattern'    => 'GET /katalog (Route Group)',
                'controller' => 'App\Controllers\CatalogController::index',
            ],
        ]);
    }

    public function category(string $slug): string
    {
        $categories = self::getCategories();
        if (!isset($categories[$slug])) {
            throw PageNotFoundException::forPageNotFound('Kategori tidak ditemukan: ' . $slug);
        }

        $filtered = array_filter(
            self::getProducts(),
            static fn (array $item): bool => $item['category'] === $slug
        );

        return view('catalog/index', [
            'title'          => $categories[$slug]['name'] . ' — Katalog ShopEase Fresh',
            'activeMenu'     => 'catalog',
            'activeCategory' => $slug,
            'categories'     => $categories,
            'products'       => $filtered,
            'routeMeta'      => [
                'name'       => 'catalog.category',
                'pattern'    => 'GET /katalog/(:segment)',
                'controller' => "App\\Controllers\\CatalogController::category('{$slug}')",
            ],
        ]);
    }

    public function detail(int $id, string $slug): string
    {
        $products = self::getProducts();
        if (!isset($products[$id]) || $products[$id]['slug'] !== $slug) {
            throw PageNotFoundException::forPageNotFound("Produk #{$id}/{$slug} tidak ditemukan.");
        }

        $product = $products[$id];
        $categories = self::getCategories();

        return view('catalog/detail', [
            'title'        => $product['name'] . ' — ShopEase Fresh (CI 4)',
            'activeMenu'   => 'catalog',
            'product'      => $product,
            'categoryInfo' => $categories[$product['category']],
            'related'      => array_filter($products, static fn (array $p): bool => $p['id'] !== $id),
            'routeMeta'    => [
                'name'       => 'catalog.detail',
                'pattern'    => 'GET /katalog/produk/(:num)/(:segment)',
                'controller' => "App\\Controllers\\CatalogController::detail({$id}, '{$slug}')",
            ],
        ]);
    }
}

