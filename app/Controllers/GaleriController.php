<?php

namespace App\Controllers;

use App\Models\DesaModel;
use App\Models\GaleriModel;
use App\Models\GaleriCategoryModel;
use App\Models\GaleriVideoModel;

class GaleriController extends BaseController
{
    public function index()
    {
        $desaModel = new DesaModel();
        $galeriModel = new GaleriModel();
        $catModel = new GaleriCategoryModel();
        $videoModel = new GaleriVideoModel();

        $kategoriSlug = $this->request->getGet('kategori');
        $tab = $this->request->getGet('tab') ?? 'foto';

        $builder = $galeriModel->select('galeri.*, galeri_categories.name as category_name, galeri_categories.slug as category_slug')
                               ->join('galeri_categories', 'galeri_categories.id = galeri.category_id', 'left')
                               ->where('galeri.status', 'published')
                               ->orderBy('galeri.id', 'DESC');

        if ($kategoriSlug && $kategoriSlug !== 'semua') {
            $builder->where('galeri_categories.slug', $kategoriSlug);
        }

        $fotos = $builder->findAll();
        $categories = $catModel->findAll();
        $videos = $videoModel->orderBy('id', 'DESC')->findAll();

        $data = [
            'title'       => 'Galeri Foto & Video Desa',
            'desa'        => $desaModel->getInfo(),
            'fotos'       => $fotos,
            'videos'      => $videos,
            'categories'  => $categories,
            'currentCat'  => $kategoriSlug ?? 'semua',
            'activeTab'   => $tab,
        ];

        return view('galeri/index', $data);
    }
}
