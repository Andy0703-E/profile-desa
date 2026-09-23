<?php

namespace App\Models;

use CodeIgniter\Model;

class PersyaratanLayananModel extends Model
{
    protected $table            = 'persyaratan_layanan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = [
        'layanan_id', 'nama_persyaratan', 'keterangan', 'wajib'
    ];
    protected $useTimestamps    = true;

    public function getByLayanan(int $layananId)
    {
        return $this->where('layanan_id', $layananId)->findAll();
    }
}
