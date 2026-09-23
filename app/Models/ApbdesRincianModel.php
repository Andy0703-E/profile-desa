<?php

namespace App\Models;

use CodeIgniter\Model;

class ApbdesRincianModel extends Model
{
    protected $table            = 'apbdes_rincian';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = [
        'apbdes_id', 'tipe', 'kode_rekening', 'uraian', 'anggaran', 'realisasi', 'persentase'
    ];
    protected $useTimestamps    = true;

    public function getByApbdes($apbdesId)
    {
        return $this->where('apbdes_id', $apbdesId)
                    ->orderBy('kode_rekening', 'ASC')
                    ->findAll();
    }
}
