<?php

namespace App\Models;

use CodeIgniter\Model;

class DesaModel extends Model
{
    protected $table            = 'desa';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nama_desa', 'kecamatan', 'kabupaten', 'provinsi', 'kode_pos',
        'slogan', 'motto', 'deskripsi', 'luas_wilayah', 'jumlah_penduduk',
        'jumlah_kk', 'email', 'telepon', 'whatsapp', 'alamat',
        'jam_pelayanan', 'koordinat_lat', 'koordinat_lng', 'logo', 'hero_image'
    ];
    protected $useTimestamps    = true;

    public function getInfo()
    {
        return $this->first();
    }
}
