<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class StrukturPemerintahanSeeder extends Seeder
{
    public function run()
    {
        $now = date('Y-m-d H:i:s');
        $this->db->query('SET FOREIGN_KEY_CHECKS = 0');

        $aparaturLengkap = [
            [
                'nama'      => 'Ahmad Nur, S.Sos.',
                'jabatan'   => 'Kepala Desa Batu Bingkung',
                'nip'       => '-',
                'urutan'    => 1,
                'foto'      => 'images/avatar-pejabat.svg',
                'deskripsi' => 'Penanggung jawab eksekutif tertinggi penyelenggaraan pemerintahan, pembangunan, pembinaan kemasyarakatan, dan pemberdayaan desa.',
                'status'    => 'aktif',
                'created_at'=> $now,
                'updated_at'=> $now,
            ],
            [
                'nama'      => 'H. Muhammad Rusli',
                'jabatan'   => 'Ketua BPD (Badan Permusyawaratan Desa)',
                'nip'       => '-',
                'urutan'    => 2,
                'foto'      => 'images/avatar-pejabat.svg',
                'deskripsi' => 'Mitra kerja pemerintah desa dalam membahas dan menyepakati rancangan Peraturan Desa serta menampung dan menyalurkan aspirasi masyarakat.',
                'status'    => 'aktif',
                'created_at'=> $now,
                'updated_at'=> $now,
            ],
            [
                'nama'      => 'Kaharuddin, S.Pd.',
                'jabatan'   => 'Sekretaris Desa',
                'nip'       => '19850312 201101 1 002',
                'urutan'    => 3,
                'foto'      => 'images/avatar-pejabat.svg',
                'deskripsi' => 'Koordinator staf administrasi, keuangan APBDes, inventarisasi aset desa, dan penyelenggara ketatausahaan umum.',
                'status'    => 'aktif',
                'created_at'=> $now,
                'updated_at'=> $now,
            ],
            [
                'nama'      => 'Syamsir, S.E.',
                'jabatan'   => 'Kepala Seksi Pemerintahan',
                'nip'       => '-',
                'urutan'    => 4,
                'foto'      => 'images/avatar-pejabat.svg',
                'deskripsi' => 'Pelaksana manajemen tata praja kependudukan, pertanahan desa, penegakan trantib, dan kelembagaan RT/RW.',
                'status'    => 'aktif',
                'created_at'=> $now,
                'updated_at'=> $now,
            ],
            [
                'nama'      => 'Rosmini, A.Md.Keb.',
                'jabatan'   => 'Kepala Seksi Kesejahteraan (Kesra)',
                'nip'       => '-',
                'urutan'    => 5,
                'foto'      => 'images/avatar-pejabat.svg',
                'deskripsi' => 'Koordinator program posyandu, pencegahan stunting, bansos warga, pembinaan keagamaan, dan pemberdayaan perempuan.',
                'status'    => 'aktif',
                'created_at'=> $now,
                'updated_at'=> $now,
            ],
            [
                'nama'      => 'Hasbullah',
                'jabatan'   => 'Kepala Seksi Pelayanan',
                'nip'       => '-',
                'urutan'    => 6,
                'foto'      => 'images/avatar-pejabat.svg',
                'deskripsi' => 'Penanggung jawab loket pelayanan administrasi persuratan warga (Domisili, SKU, SKTM, pengantar nikah/kelahiran).',
                'status'    => 'aktif',
                'created_at'=> $now,
                'updated_at'=> $now,
            ],
            [
                'nama'      => 'Fitriani, S.Ak.',
                'jabatan'   => 'Kepala Urusan Keuangan (Bendahara Desa)',
                'nip'       => '-',
                'urutan'    => 7,
                'foto'      => 'images/avatar-pejabat.svg',
                'deskripsi' => 'Pengelola buku kas umum, penatausahaan rekening bank desa, pencairan SPP, dan pelaporan SPJ APBDes.',
                'status'    => 'aktif',
                'created_at'=> $now,
                'updated_at'=> $now,
            ],
            [
                'nama'      => 'Andi Arman',
                'jabatan'   => 'Kepala Urusan Perencanaan',
                'nip'       => '-',
                'urutan'    => 8,
                'foto'      => 'images/avatar-pejabat.svg',
                'deskripsi' => 'Penyusun dokumen rencana pembangunan tahunan (RKPDes), RPJMDes, data profil desa, dan pendataan SDG\'s desa.',
                'status'    => 'aktif',
                'created_at'=> $now,
                'updated_at'=> $now,
            ],
            [
                'nama'      => 'Nurhayati',
                'jabatan'   => 'Kepala Urusan Tata Usaha & Umum',
                'nip'       => '-',
                'urutan'    => 9,
                'foto'      => 'images/avatar-pejabat.svg',
                'deskripsi' => 'Pengadministrasi surat masuk dan keluar, pengarsipan berkas dinas, pengelolaan aset dan perlengkapan kantor.',
                'status'    => 'aktif',
                'created_at'=> $now,
                'updated_at'=> $now,
            ],
            [
                'nama'      => 'Baharuddin',
                'jabatan'   => 'Kepala Dusun Pesisir',
                'nip'       => '-',
                'urutan'    => 10,
                'foto'      => 'images/avatar-pejabat.svg',
                'deskripsi' => 'Pelaksana kewilayahan Dusun Pesisir (RT 01 & RT 02), pembina nelayan, dan penggerak gotong royong warga pesisir.',
                'status'    => 'aktif',
                'created_at'=> $now,
                'updated_at'=> $now,
            ],
            [
                'nama'      => 'Samsul Alam',
                'jabatan'   => 'Kepala Dusun Darat Makmur',
                'nip'       => '-',
                'urutan'    => 11,
                'foto'      => 'images/avatar-pejabat.svg',
                'deskripsi' => 'Pelaksana kewilayahan Dusun Darat Makmur (RT 01 & RT 02), pembina petani pekebun kelapa dan peternak.',
                'status'    => 'aktif',
                'created_at'=> $now,
                'updated_at'=> $now,
            ],
            [
                'nama'      => 'Syarifuddin',
                'jabatan'   => 'Kepala Dusun Karangan Timur',
                'nip'       => '-',
                'urutan'    => 12,
                'foto'      => 'images/avatar-pejabat.svg',
                'deskripsi' => 'Pelaksana kewilayahan Dusun Karangan Timur (RT 01 & RT 02), pembina kelompok pembudidaya rumput laut.',
                'status'    => 'aktif',
                'created_at'=> $now,
                'updated_at'=> $now,
            ],
            [
                'nama'      => 'Muh. Idris',
                'jabatan'   => 'Kepala Dusun Bone Tanjung',
                'nip'       => '-',
                'urutan'    => 13,
                'foto'      => 'images/avatar-pejabat.svg',
                'deskripsi' => 'Pelaksana kewilayahan Dusun Bone Tanjung (RT 01 & RT 02), pembina potensi wisata bahari dan kelompok pengrajin.',
                'status'    => 'aktif',
                'created_at'=> $now,
                'updated_at'=> $now,
            ],
        ];

        $this->db->table('pemerintahan')->truncate();
        $this->db->table('pemerintahan')->insertBatch($aparaturLengkap);

        $this->db->query('SET FOREIGN_KEY_CHECKS = 1');
    }
}
