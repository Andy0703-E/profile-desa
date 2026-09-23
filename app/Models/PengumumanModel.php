<?php

namespace App\Models;

use CodeIgniter\Model;

class PengumumanModel extends Model
{
    protected $table            = 'pengumuman';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = [
        'judul', 'isi', 'file_lampiran', 'prioritas', 'status', 'tanggal'
    ];
    protected $useTimestamps    = true;

    public function getActive(int $limit = 5)
    {
        return $this->where('status', 'aktif')
                    ->orderBy('tanggal', 'DESC')
                    ->findAll($limit);
    }
}
