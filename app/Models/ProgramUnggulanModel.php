<?php

namespace App\Models;

use CodeIgniter\Model;

class ProgramUnggulanModel extends Model
{
    protected $table            = 'program_unggulan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = [
        'judul', 'ringkasan', 'deskripsi', 'icon', 'foto', 'status', 'urutan'
    ];
    protected $useTimestamps    = true;

    public function getActive()
    {
        return $this->where('status', 'aktif')->orderBy('urutan', 'ASC')->findAll();
    }
}
