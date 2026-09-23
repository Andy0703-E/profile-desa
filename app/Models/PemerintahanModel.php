<?php

namespace App\Models;

use CodeIgniter\Model;

class PemerintahanModel extends Model
{
    protected $table            = 'pemerintahan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nama', 'jabatan', 'nip', 'urutan', 'foto', 'deskripsi', 'status'
    ];
    protected $useTimestamps    = true;

    public function getActive()
    {
        return $this->where('status', 'aktif')
                    ->orderBy('urutan', 'ASC')
                    ->findAll();
    }
}
