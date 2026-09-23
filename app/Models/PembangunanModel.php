<?php

namespace App\Models;

use CodeIgniter\Model;

class PembangunanModel extends Model
{
    protected $table            = 'pembangunan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nama_kegiatan', 'slug', 'bidang', 'lokasi', 'dusun', 'anggaran',
        'sumber_dana', 'tahun', 'status', 'progres', 'foto_sebelum', 'foto_sesudah',
        'lat', 'lng', 'pelaksana', 'volume', 'manfaat'
    ];
    protected $useTimestamps    = true;

    public function getByYear($tahun = null)
    {
        if ($tahun) {
            $this->where('tahun', $tahun);
        }
        return $this->orderBy('tahun', 'DESC')
                    ->orderBy('id', 'DESC')
                    ->findAll();
    }
}
