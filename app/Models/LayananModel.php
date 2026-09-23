<?php

namespace App\Models;

use CodeIgniter\Model;

class LayananModel extends Model
{
    protected $table            = 'layanan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nama_layanan', 'slug', 'deskripsi', 'persyaratan',
        'estimasi_waktu', 'biaya', 'penanggung_jawab', 'icon', 'status', 'urutan'
    ];
    protected $useTimestamps    = true;

    public function getActive()
    {
        return $this->where('status', 'aktif')
                    ->orderBy('urutan', 'ASC')
                    ->findAll();
    }
}
