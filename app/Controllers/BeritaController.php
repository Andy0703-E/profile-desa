<?php

namespace App\Controllers;

use App\Models\DesaModel;
use App\Models\BeritaModel;
use App\Models\BeritaCategoryModel;
use App\Models\PengumumanModel;

class BeritaController extends BaseController
{
    protected $desaModel;
    protected $beritaModel;
    protected $categoryModel;
    protected $pengumumanModel;

    public function __construct()
    {
        $this->desaModel = new DesaModel();
        $this->beritaModel = new BeritaModel();
        $this->categoryModel = new BeritaCategoryModel();
        $this->pengumumanModel = new PengumumanModel();
    }

    public function index()
    {
        $search = $this->request->getGet('q');
        $categorySlug = $this->request->getGet('kategori');

        $categoryId = null;
        $activeCategory = null;

        if ($categorySlug) {
            $activeCategory = $this->categoryModel->where('slug', $categorySlug)->first();
            if ($activeCategory) {
                $categoryId = (int) $activeCategory['id'];
            }
        }

        $beritaList = $this->beritaModel->getPublishedWithCategory(12, 0, $categoryId, $search);

        $data = [
            'title'          => 'Berita & Informasi Desa',
            'desa'           => $this->desaModel->getInfo(),
            'beritaList'     => $beritaList,
            'categories'     => $this->categoryModel->findAll(),
            'pengumumanList' => $this->pengumumanModel->getActive(5),
            'searchQuery'    => $search,
            'activeCategory' => $activeCategory,
        ];

        return view('berita/index', $data);
    }

    public function detail(string $slug)
    {
        $berita = $this->beritaModel->getBySlug($slug);

        if (! $berita) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Berita tidak ditemukan.');
        }

        // Increment views safely
        $this->beritaModel->update($berita['id'], [
            'views' => (int) $berita['views'] + 1,
        ]);

        $latestBerita = $this->beritaModel->getLatest(4);

        $data = [
            'title'        => $berita['title'],
            'desa'         => $this->desaModel->getInfo(),
            'berita'       => $berita,
            'latestBerita' => $latestBerita,
            'categories'   => $this->categoryModel->findAll(),
        ];

        return view('berita/detail', $data);
    }
}
