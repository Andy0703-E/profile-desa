<?php

namespace App\Models;

use CodeIgniter\Model;

class DusunModel extends Model
{
    protected $table            = 'dusun';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nama_dusun', 'kepala_dusun', 'jumlah_rt', 'jumlah_rw', 'jumlah_kk',
        'jumlah_jiwa', 'batas_wilayah', 'deskripsi'
    ];
    protected $useTimestamps    = true;
}
