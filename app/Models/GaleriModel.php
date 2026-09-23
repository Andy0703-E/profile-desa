<?php

namespace App\Models;

use CodeIgniter\Model;

class GaleriModel extends Model
{
    protected $table            = 'galeri';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = [
        'category_id', 'title', 'description', 'image', 'status'
    ];
    protected $useTimestamps    = true;

    public function getPublishedWithCategory(int $limit = 12, ?int $categoryId = null)
    {
        $builder = $this->select('galeri.*, galeri_categories.name as category_name, galeri_categories.slug as category_slug')
                        ->join('galeri_categories', 'galeri_categories.id = galeri.category_id', 'left')
                        ->where('galeri.status', 'published');

        if ($categoryId) {
            $builder->where('galeri.category_id', $categoryId);
        }

        return $builder->orderBy('galeri.id', 'DESC')
                       ->findAll($limit);
    }
}
