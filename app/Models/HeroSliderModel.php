<?php

namespace App\Models;

use CodeIgniter\Model;

class HeroSliderModel extends Model
{
    protected $table            = 'hero_sliders';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = [
        'tag',
        'title',
        'subtitle',
        'image',
        'cta_text',
        'cta_link',
        'urutan',
        'status',
    ];
    protected $useTimestamps    = true;
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';

    public function getActiveSliders()
    {
        return $this->where('status', 'aktif')
                    ->orderBy('urutan', 'ASC')
                    ->findAll();
    }
}
