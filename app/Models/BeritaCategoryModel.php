<?php

namespace App\Models;

use CodeIgniter\Model;

class BeritaCategoryModel extends Model
{
    protected $table            = 'berita_categories';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = ['name', 'slug'];
    protected $useTimestamps    = true;
}
