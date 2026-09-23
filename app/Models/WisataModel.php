<?php

namespace App\Models;

use CodeIgniter\Model;

class WisataModel extends Model
{
    protected $table            = 'wisata';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nama', 'slug', 'kategori', 'deskripsi', 'daya_tarik', 'harga_tiket',
        'jam_buka', 'fasilitas', 'kontak_pengelola', 'lokasi', 'lat', 'lng',
        'maps_url', 'foto', 'status'
    ];
    protected $useTimestamps    = true;

    public function getActive()
    {
        return $this->where('status', 'aktif')->findAll();
    }
}
