<?php

namespace App\Models;

use CodeIgniter\Model;

class ApbdesModel extends Model
{
    protected $table            = 'apbdes';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = [
        'tahun', 'judul', 'jenis', 'total_pendapatan', 'realisasi_pendapatan',
        'total_belanja', 'realisasi_belanja', 'total_pembiayaan', 'realisasi_pembiayaan',
        'file_pdf', 'status', 'keterangan'
    ];
    protected $useTimestamps    = true;

    public function getLatest()
    {
        return $this->orderBy('tahun', 'DESC')
                    ->orderBy('id', 'DESC')
                    ->first();
    }
}
