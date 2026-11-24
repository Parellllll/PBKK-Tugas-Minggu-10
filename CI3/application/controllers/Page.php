<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controller Page - Toko Buah Segar (CodeIgniter 3.1.13)
 * Tugas Minggu 10 PBKK: Fungsi Router dan Controller
 * Mahasiswa: Farrel Prastita Ramadhan (5025241219)
 */
#[AllowDynamicProperties]
class Page extends CI_Controller
{
    private $fruits = array(
        'mangga-harum-manis' => array(
            'slug'     => 'mangga-harum-manis',
            'name'     => 'Mangga Harum Manis Probolinggo',
            'price'    => 38000,
            'unit'     => 'kg',
            'origin'   => 'Probolinggo, Jawa Timur',
            'stock'    => 45,
            'tag'      => 'Terlaris',
            'color'    => '#f59e0b',
            'desc'     => 'Mangga matang pohon dengan daging buah tebal, serat halus, dan tingkat kemanisan tinggi.',
        ),
        'apel-malang-manalagi' => array(
            'slug'     => 'apel-malang-manalagi',
            'name'     => 'Apel Manalagi Batu',
            'price'    => 32000,
            'unit'     => 'kg',
            'origin'   => 'Kota Batu, Jawa Timur',
            'stock'    => 60,
            'tag'      => 'Panen Baru',
            'color'    => '#16a34a',
            'desc'     => 'Apel lokal renyah beraroma segar langsung dari perkebunan dataran tinggi Kota Batu.',
        ),
        'jeruk-siam-madu' => array(
            'slug'     => 'jeruk-siam-madu',
            'name'     => 'Jeruk Siam Madu',
            'price'    => 28000,
            'unit'     => 'kg',
            'origin'   => 'Karo, Sumatera Utara',
            'stock'    => 52,
            'tag'      => 'Vitamin C',
            'color'    => '#ea580c',
            'desc'     => 'Jeruk berkulit tipis mudah dikupas dengan bulir penuh air dan rasa manis segar.',
        ),
        'alpukat-mentega' => array(
            'slug'     => 'alpukat-mentega',
            'name'     => 'Alpukat Mentega Jumbo',
            'price'    => 42000,
            'unit'     => 'kg',
            'origin'   => 'Kendal, Jawa Tengah',
            'stock'    => 30,
            'tag'      => 'Organik',
            'color'    => '#15803d',
            'desc'     => 'Tekstur lembut creamy berwarna kuning mentega, cocok untuk jus maupun santapan sehat.',
        ),
        'stroberi-ciwidey' => array(
            'slug'     => 'stroberi-ciwidey',
            'name'     => 'Stroberi Segar Ciwidey',
            'price'    => 26000,
            'unit'     => 'pack 250g',
            'origin'   => 'Ciwidey, Jawa Barat',
            'stock'    => 24,
            'tag'      => 'Segar',
            'color'    => '#dc2626',
            'desc'     => 'Dipetik pagi hari dengan kesegaran terjaga dalam kemasan food-grade berpendingin.',
        ),
        'anggur-muscat' => array(
            'slug'     => 'anggur-muscat',
            'name'     => 'Anggur Hijau Shine Muscat',
            'price'    => 89000,
            'unit'     => 'pack 500g',
            'origin'   => 'Impor Premium',
            'stock'    => 18,
            'tag'      => 'Premium',
            'color'    => '#65a30d',
            'desc'     => 'Anggur hijau tanpa biji yang renyah dengan aroma floral lembut dan rasa manis alami.',
        ),
    );

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function index()
    {
        $data = array(
            'title'       => 'Beranda — Toko Buah Segar (CI 3)',
            'active_menu' => 'home',
            'route_info'  => array(
                'url'        => current_url(),
                'route_rule' => "\$route['default_controller'] = 'page';",
                'controller' => 'Page::index()',
            ),
            'fruits'      => $this->fruits,
        );

        $this->load->view('layouts/header', $data);
        $this->load->view('home', $data);
        $this->load->view('layouts/footer', $data);
    }

    public function about()
    {
        $data = array(
            'title'       => 'Tentang Kami — Toko Buah Segar (CI 3)',
            'active_menu' => 'about',
            'route_info'  => array(
                'url'        => current_url(),
                'route_rule' => "\$route['about'] = 'page/about';",
                'controller' => 'Page::about()',
            ),
            'routes_map'  => array(
                array('url' => '/', 'target' => 'page/index', 'type' => 'Default Controller'),
                array('url' => '/about', 'target' => 'page/about', 'type' => 'Custom Route'),
                array('url' => '/contact', 'target' => 'page/contact', 'type' => 'Custom Route'),
                array('url' => '/buah/(:any)', 'target' => 'page/buah/$1', 'type' => 'Wildcard Parameter'),
                array('url' => '/page/about', 'target' => 'page/about', 'type' => 'Auto Segment URI CI3'),
                array('url' => '/welcome', 'target' => 'welcome/index', 'type' => 'Controller Bawaan'),
            ),
        );

        $this->load->view('layouts/header', $data);
        $this->load->view('about', $data);
        $this->load->view('layouts/footer', $data);
    }

    public function contact()
    {
        $submitted = FALSE;
        $form_data = array('nama' => '', 'email' => '', 'pesan' => '');

        if ($this->input->method() === 'post') {
            $form_data = array(
                'nama'  => trim((string) $this->input->post('nama', TRUE)),
                'email' => trim((string) $this->input->post('email', TRUE)),
                'pesan' => trim((string) $this->input->post('pesan', TRUE)),
            );
            if ($form_data['nama'] !== '' && $form_data['email'] !== '' && $form_data['pesan'] !== '') {
                $submitted = TRUE;
            }
        }

        $data = array(
            'title'       => 'Hubungi Kami — Toko Buah Segar (CI 3)',
            'active_menu' => 'contact',
            'route_info'  => array(
                'url'        => current_url(),
                'route_rule' => "\$route['contact'] = 'page/contact';",
                'controller' => 'Page::contact()',
            ),
            'submitted'   => $submitted,
            'form_data'   => $form_data,
        );

        $this->load->view('layouts/header', $data);
        $this->load->view('contact', $data);
        $this->load->view('layouts/footer', $data);
    }

    public function buah($slug = '')
    {
        if (!isset($this->fruits[$slug])) {
            return $this->not_found($slug);
        }

        $fruit = $this->fruits[$slug];
        $data = array(
            'title'       => $fruit['name'] . ' — Toko Buah Segar (CI 3)',
            'active_menu' => 'home',
            'route_info'  => array(
                'url'        => current_url(),
                'route_rule' => "\$route['buah/(:any)'] = 'page/buah/\$1';",
                'controller' => 'Page::buah(\'' . $slug . '\')',
            ),
            'fruit'       => $fruit,
            'others'      => array_diff_key($this->fruits, array($slug => true)),
        );

        $this->load->view('layouts/header', $data);
        $this->load->view('fruit_detail', $data);
        $this->load->view('layouts/footer', $data);
    }

    public function not_found($segment = '')
    {
        $this->output->set_status_header(404);
        $data = array(
            'title'       => '404 Halaman Tidak Ditemukan — Toko Buah Segar (CI 3)',
            'active_menu' => '',
            'route_info'  => array(
                'url'        => current_url(),
                'route_rule' => "\$route['404_override'] = 'page/not_found';",
                'controller' => 'Page::not_found()',
            ),
            'missing_path' => uri_string() !== '' ? uri_string() : $segment,
        );

        $this->load->view('layouts/header', $data);
        $this->load->view('not_found', $data);
        $this->load->view('layouts/footer', $data);
    }
}

