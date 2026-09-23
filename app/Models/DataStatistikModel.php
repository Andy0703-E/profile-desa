<?php

namespace App\Models;

use CodeIgniter\Model;

class DataStatistikModel extends Model
{
    protected $table            = 'data_statistik';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = [
        'key_name', 'label', 'value', 'satuan', 'icon', 'urutan'
    ];
    protected $useTimestamps    = true;
}
