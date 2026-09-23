<?php

namespace App\Models;

use CodeIgniter\Model;

class GaleriCategoryModel extends Model
{
    protected $table            = 'galeri_categories';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = ['name', 'slug'];
    protected $useTimestamps    = true;
}
