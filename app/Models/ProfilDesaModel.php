<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfilDesaModel extends Model
{
    protected $table            = 'profil_desa';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = [
        'sejarah', 'visi', 'misi', 'geografis', 'demografis',
        'batas_utara', 'batas_selatan', 'batas_timur', 'batas_barat'
    ];
    protected $useTimestamps    = true;

    public function getProfil()
    {
        return $this->first();
    }
}
