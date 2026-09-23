<?php

namespace App\Models;

use CodeIgniter\Model;

class PetaTitikModel extends Model
{
    protected $table            = 'peta_titik';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nama', 'kategori', 'lat', 'lng', 'alamat', 'deskripsi', 'foto', 'kontak'
    ];
    protected $useTimestamps    = true;

    public function getByCategory($kategori = null)
    {
        if ($kategori && $kategori !== 'semua') {
            return $this->where('kategori', $kategori)->findAll();
        }
        return $this->findAll();
    }
}
