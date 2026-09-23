<?php

namespace App\Models;

use CodeIgniter\Model;

class BeritaModel extends Model
{
    protected $table            = 'berita';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = [
        'category_id', 'author_id', 'title', 'slug', 'excerpt',
        'content', 'thumbnail', 'status', 'views', 'published_at'
    ];
    protected $useTimestamps    = true;

    public function getPublishedWithCategory(int $limit = 10, int $offset = 0, ?int $categoryId = null, ?string $search = null)
    {
        $builder = $this->select('berita.*, berita_categories.name as category_name, berita_categories.slug as category_slug, users.name as author_name')
                        ->join('berita_categories', 'berita_categories.id = berita.category_id', 'left')
                        ->join('users', 'users.id = berita.author_id', 'left')
                        ->where('berita.status', 'published');

        if ($categoryId) {
            $builder->where('berita.category_id', $categoryId);
        }

        if ($search) {
            $builder->groupStart()
                    ->like('berita.title', $search)
                    ->orLike('berita.excerpt', $search)
                    ->orLike('berita.content', $search)
                    ->groupEnd();
        }

        return $builder->orderBy('berita.published_at', 'DESC')
                       ->findAll($limit, $offset);
    }

    public function getLatest(int $limit = 3)
    {
        return $this->select('berita.*, berita_categories.name as category_name, berita_categories.slug as category_slug')
                    ->join('berita_categories', 'berita_categories.id = berita.category_id', 'left')
                    ->where('berita.status', 'published')
                    ->orderBy('berita.published_at', 'DESC')
                    ->findAll($limit);
    }

    public function getBySlug(string $slug)
    {
        return $this->select('berita.*, berita_categories.name as category_name, berita_categories.slug as category_slug, users.name as author_name')
                    ->join('berita_categories', 'berita_categories.id = berita.category_id', 'left')
                    ->join('users', 'users.id = berita.author_id', 'left')
                    ->where('berita.slug', $slug)
                    ->first();
    }
}
