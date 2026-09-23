<?php

namespace App\Models;

use CodeIgniter\Model;

class PengaduanModel extends Model
{
    protected $table            = 'pengaduan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = [
        'kode_tiket', 'nama_pelapor', 'nik', 'no_hp', 'dusun', 'judul',
        'kategori', 'isi_aduan', 'foto_bukti', 'status', 'tanggapan', 'tanggal_tanggapan'
    ];
    protected $useTimestamps    = true;

    public function generateKodeTiket()
    {
        $prefix = 'ADU-' . date('Ym') . '-';
        $last = $this->like('kode_tiket', $prefix, 'after')
                     ->orderBy('id', 'DESC')
                     ->first();
        if ($last) {
            $num = (int) substr($last['kode_tiket'], -3) + 1;
        } else {
            $num = 1;
        }
        return $prefix . str_pad($num, 3, '0', STR_PAD_LEFT);
    }
}
