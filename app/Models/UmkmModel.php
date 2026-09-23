<?php

namespace App\Models;

use CodeIgniter\Model;

class UmkmModel extends Model
{
    protected $table            = 'umkm';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nama_usaha', 'nama_pemilik', 'kategori', 'deskripsi', 'harga',
        'whatsapp', 'alamat', 'dusun', 'foto', 'is_unggulan', 'is_bumdes', 'status'
    ];
    protected $useTimestamps    = true;

    public function getActive()
    {
        return $this->where('status', 'aktif')
                    ->orderBy('is_unggulan', 'DESC')
                    ->orderBy('is_bumdes', 'DESC')
                    ->findAll();
    }
}
