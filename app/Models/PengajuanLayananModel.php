<?php

namespace App\Models;

use CodeIgniter\Model;

class PengajuanLayananModel extends Model
{
    protected $table            = 'pengajuan_layanan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nomor_tiket', 'layanan_id', 'nama_pemohon', 'nik', 'no_hp',
        'email', 'alamat', 'catatan', 'berkas', 'status', 'tanggapan_admin'
    ];
    protected $useTimestamps    = true;

    public function getAllWithLayanan(int $limit = 20, int $offset = 0, ?string $status = null)
    {
        $builder = $this->select('pengajuan_layanan.*, layanan.nama_layanan')
                        ->join('layanan', 'layanan.id = pengajuan_layanan.layanan_id', 'left');

        if ($status) {
            $builder->where('pengajuan_layanan.status', $status);
        }

        return $builder->orderBy('pengajuan_layanan.id', 'DESC')
                       ->findAll($limit, $offset);
    }

    public function findByTiket(string $tiket)
    {
        return $this->select('pengajuan_layanan.*, layanan.nama_layanan')
                    ->join('layanan', 'layanan.id = pengajuan_layanan.layanan_id', 'left')
                    ->where('pengajuan_layanan.nomor_tiket', $tiket)
                    ->first();
    }
}
