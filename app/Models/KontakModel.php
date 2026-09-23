<?php

namespace App\Models;

use CodeIgniter\Model;

class KontakModel extends Model
{
    protected $table            = 'kontak';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nama', 'email', 'no_hp', 'subjek', 'pesan', 'status'
    ];
    protected $useTimestamps    = true;
}
