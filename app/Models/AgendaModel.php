<?php

namespace App\Models;

use CodeIgniter\Model;

class AgendaModel extends Model
{
    protected $table            = 'agenda';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = [
        'judul', 'slug', 'kategori', 'tanggal_mulai', 'tanggal_selesai',
        'jam_mulai', 'jam_selesai', 'lokasi', 'penyelenggara', 'deskripsi', 'status'
    ];
    protected $useTimestamps    = true;

    public function getUpcoming($limit = null)
    {
        $builder = $this->orderBy('tanggal_mulai', 'ASC');
        if ($limit) {
            $builder->limit($limit);
        }
        return $builder->findAll();
    }
}
