<?php

namespace App\Controllers;

use App\Models\BeritaModel;
use App\Models\DokumenPublikModel;
use App\Models\UmkmModel;
use App\Models\WisataModel;
use App\Models\AgendaModel;
use App\Models\PembangunanModel;
use App\Models\DesaModel;

class SearchController extends BaseController
{
    public function index()
    {
        $q = trim($this->request->getGet('q') ?? '');
        $desaModel = new DesaModel();
        
        $results = [
            'berita'      => [],
            'umkm'        => [],
            'wisata'      => [],
            'agenda'      => [],
            'pembangunan' => [],
        ];
        $totalFound = 0;

        if (!empty($q)) {
            $beritaModel = new BeritaModel();
            $results['berita'] = $beritaModel->like('title', $q)
                                             ->orLike('content', $q)
                                             ->where('status', 'published')
                                             ->limit(5)->find();

            $umkmModel = new UmkmModel();
            $results['umkm'] = $umkmModel->like('nama_usaha', $q)
                                         ->orLike('deskripsi', $q)
                                         ->where('status', 'aktif')
                                         ->limit(5)->find();

            $wisataModel = new WisataModel();
            $results['wisata'] = $wisataModel->like('nama', $q)
                                             ->orLike('deskripsi', $q)
                                             ->where('status', 'aktif')
                                             ->limit(5)->find();

            $agendaModel = new AgendaModel();
            $results['agenda'] = $agendaModel->like('judul', $q)
                                             ->orLike('deskripsi', $q)
                                             ->limit(5)->find();

            $pembangunanModel = new PembangunanModel();
            $results['pembangunan'] = $pembangunanModel->like('nama_kegiatan', $q)
                                                       ->orLike('lokasi', $q)
                                                       ->limit(5)->find();

            foreach ($results as $k => $arr) {
                $totalFound += count($arr);
            }
        }

        $data = [
            'title'      => 'Pencarian Global: ' . ($q ? '"' . esc($q) . '"' : ''),
            'desa'       => $desaModel->getInfo(),
            'query'      => $q,
            'results'    => $results,
            'totalFound' => $totalFound,
        ];

        return view('search/index', $data);
    }
}
