<?php

namespace App\Models;

use CodeIgniter\Model;

class PengaturanModel extends Model
{
    protected $table            = 'pengaturan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = ['key_name', 'val'];
    protected $useTimestamps    = true;

    public function getMap()
    {
        $rows = $this->findAll();
        $map = [];
        foreach ($rows as $row) {
            $map[$row['key_name']] = $row['val'];
        }
        return $map;
    }
}
