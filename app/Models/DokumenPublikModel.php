<?php

namespace App\Models;

use CodeIgniter\Model;

class DokumenPublikModel extends Model
{
    protected $table            = 'dokumen_publik';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = [
        'judul', 'nomor_dokumen', 'kategori', 'tahun', 'deskripsi',
        'file_url', 'ukuran_file', 'total_download'
    ];
    protected $useTimestamps    = true;

    public function getFiltered($kategori = null, $keyword = null)
    {
        $builder = $this->orderBy('tahun', 'DESC')->orderBy('id', 'DESC');
        if ($kategori && $kategori !== 'semua') {
            $builder->where('kategori', $kategori);
        }
        if ($keyword) {
            $builder->groupStart()
                    ->like('judul', $keyword)
                    ->orLike('nomor_dokumen', $keyword)
                    ->orLike('deskripsi', $keyword)
                    ->groupEnd();
        }
        return $builder->findAll();
    }
}
