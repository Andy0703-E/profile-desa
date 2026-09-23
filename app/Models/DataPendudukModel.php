<?php

namespace App\Models;

use CodeIgniter\Model;

class DataPendudukModel extends Model
{
    protected $table            = 'data_penduduk';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = [
        'kategori', 'label', 'jumlah', 'keterangan', 'urutan'
    ];
    protected $useTimestamps    = true;
}
