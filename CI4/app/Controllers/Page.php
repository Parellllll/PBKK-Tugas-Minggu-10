<?php

namespace App\Controllers;

class Page extends BaseController
{
    public function about(): string
    {
        return view('page/about', [
            'title'      => 'Tentang Kami — ShopEase Fresh (CI 4)',
            'activeMenu' => 'about',
            'routeMeta'  => [
                'name'       => 'page.about',
                'pattern'    => 'GET /about',
                'controller' => 'App\Controllers\Page::about',
            ],
        ]);
    }

    public function contact(): string
    {
        return view('page/contact', [
            'title'      => 'Hubungi Kami — ShopEase Fresh (CI 4)',
            'activeMenu' => 'contact',
            'routeMeta'  => [
                'name'       => 'page.contact',
                'pattern'    => 'GET /contact',
                'controller' => 'App\Controllers\Page::contact',
            ],
            'submitted'  => false,
            'formData'   => ['nama' => '', 'email' => '', 'topik' => 'Pertanyaan Produk', 'pesan' => ''],
            'errors'     => [],
        ]);
    }

    public function sendContact(): string
    {
        $rules = [
            'nama'  => 'required|min_length[3]',
            'email' => 'required|valid_email',
            'pesan' => 'required|min_length[5]',
        ];

        $formData = [
            'nama'  => trim((string) $this->request->getPost('nama')),
            'email' => trim((string) $this->request->getPost('email')),
            'topik' => trim((string) $this->request->getPost('topik')),
            'pesan' => trim((string) $this->request->getPost('pesan')),
        ];

        $valid = $this->validate($rules);

        return view('page/contact', [
            'title'      => 'Hubungi Kami — ShopEase Fresh (CI 4)',
            'activeMenu' => 'contact',
            'routeMeta'  => [
                'name'       => 'page.contact.send',
                'pattern'    => 'POST /contact',
                'controller' => 'App\Controllers\Page::sendContact',
            ],
            'submitted'  => $valid,
            'formData'   => $formData,
            'errors'     => $valid ? [] : $this->validator->getErrors(),
        ]);
    }

    public function faqs(): string
    {
        $faqItems = [
            [
                'q' => 'Apa perbedaan routing pada CodeIgniter 3 dan CodeIgniter 4?',
                'a' => 'CI 3 menggunakan array $route di application/config/routes.php dengan auto-segment URI aktif secara bawaan, sedangkan CI 4 menggunakan objek $routes (RouteCollection) di app/Config/Routes.php berbasis HTTP verb eksplisit ($routes->get, post, group) dengan auto-routing dimatikan secara default demi keamanan.',
            ],
            [
                'q' => 'Apa fungsi Named Route seperti url_to("page.about") di CI 4?',
                'a' => 'Named Route memberi alias pada rute (["as" => "page.about"]) sehingga link di view maupun redirect di controller cukup memanggil route_to("page.about"). Jika pola URL diubah di Routes.php, seluruh tautan otomatis menyesuaikan.',
            ],
            [
                'q' => 'Bagaimana cara kerja placeholder (:num) dan (:segment)?',
                'a' => 'Placeholder (:num) hanya mencocokkan digit angka (misal ID produk), sedangkan (:segment) mencocokkan karakter selain slash (misal slug kategori/produk). Nilai yang tertangkap dikirim ke parameter method controller melalui $1, $2.',
            ],
            [
                'q' => 'Mengapa Auto Routing Improved di CI 4 mewajibkan awalan HTTP verb seperti getTos()?',
                'a' => 'Jika auto-routing diaktifkan pada CI 4, framework mewajibkan awalan verb (get*, post*) untuk mencegah method internal controller terekspose secara tidak sengaja lewat URL sembarang.',
            ],
            [
                'q' => 'Bagaimana jaminan kesegaran buah pada ShopEase Fresh?',
                'a' => 'Semua buah disortir setiap pagi dari mitra kebun lokal, dikemas menggunakan kotak berventilasi food-grade, dan dikirim melalui layanan same-day delivery Surabaya.',
            ],
        ];

        return view('page/faqs', [
            'title'      => 'FAQ — ShopEase Fresh (CI 4)',
            'activeMenu' => 'faqs',
            'routeMeta'  => [
                'name'       => 'page.faqs',
                'pattern'    => 'GET /faqs',
                'controller' => 'App\Controllers\Page::faqs',
            ],
            'faqs'       => $faqItems,
        ]);
    }

    /**
     * Method eksplisit /tos sekaligus contoh konvensi Auto Routing Improved CI 4 (getTos).
     */
    public function tos(): string
    {
        return $this->getTos();
    }

    public function getTos(): string
    {
        return view('page/tos', [
            'title'      => 'Syarat & Ketentuan — ShopEase Fresh (CI 4)',
            'activeMenu' => 'tos',
            'routeMeta'  => [
                'name'       => 'page.tos',
                'pattern'    => 'GET /tos',
                'controller' => 'App\Controllers\Page::tos() -> getTos()',
            ],
        ]);
    }
}

