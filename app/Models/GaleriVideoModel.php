<?php

namespace App\Models;

use CodeIgniter\Model;

class GaleriVideoModel extends Model
{
    protected $table            = 'galeri_video';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = [
        'judul', 'embed_url', 'durasi', 'tanggal', 'keterangan'
    ];
    protected $useTimestamps    = true;
}
