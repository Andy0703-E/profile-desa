<?php

namespace App\Models;

use CodeIgniter\Model;

class PotensiDesaModel extends Model
{
    protected $table            = 'potensi_desa';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = [
        'judul', 'slug', 'kategori', 'deskripsi', 'image', 'status'
    ];
    protected $useTimestamps    = true;

    public function getPublished()
    {
        return $this->where('status', 'published')
                    ->orderBy('id', 'ASC')
                    ->findAll();
    }
}
