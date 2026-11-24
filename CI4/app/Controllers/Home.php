<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $featured = CatalogController::getProducts();

        return view('home', [
            'title'      => 'ShopEase Fresh — Toko Buah & Online Store (CI 4)',
            'activeMenu' => 'home',
            'routeMeta'  => [
                'name'       => 'home',
                'pattern'    => 'GET /',
                'controller' => 'App\Controllers\Home::index',
            ],
            'categories' => CatalogController::getCategories(),
            'featured'   => array_slice($featured, 0, 6),
        ]);
    }
}
