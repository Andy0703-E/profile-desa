<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RealLocationSeeder extends Seeder
{
    public function run()
    {
        $now = date('Y-m-d H:i:s');
        $this->db->query('SET FOREIGN_KEY_CHECKS = 0');

        // Titik Peta Geospasial Real Koordinat Google Maps / Lapangan
        $titikPeta = [
            [
                'nama'      => 'Kantor Desa Batu Bingkung',
                'kategori'  => 'kantor',
                'lat'       => -7.3683829,
                'lng'       => 121.1118377,
                'alamat'    => 'Jl. Poros Batu Bingkung No. 1, Kec. Pasimarannu',
                'deskripsi' => 'Pusat tata kelola pemerintahan, layanan administrasi kependudukan, dan balai musyawarah warga.',
                'foto'      => 'images/hero_kantor_desa.jpg',
                'kontak'    => '082194882000',
                'created_at'=> $now,
                'updated_at'=> $now,
            ],
            [
                'nama'      => 'SD Inpres Batu Bingkung',
                'kategori'  => 'sekolah',
                'lat'       => -7.3681381,
                'lng'       => 121.1258407,
                'alamat'    => 'Dusun Pesisir, Desa Batu Bingkung',
                'deskripsi' => 'Gedung sekolah dasar negeri formal pembinaan generasi muda desa.',
                'foto'      => 'images/berita-peta.webp',
                'kontak'    => '085242000107',
                'created_at'=> $now,
                'updated_at'=> $now,
            ],
            [
                'nama'      => 'UPT SDI 133 Kepulauan Selayar',
                'kategori'  => 'sekolah',
                'lat'       => -7.361337,
                'lng'       => 121.0975253,
                'alamat'    => 'Kawasan Pendidikan UPT SDI 133 Selayar, Batu Bingkung',
                'deskripsi' => 'Unit Pelaksana Teknis Sekolah Dasar Inpres 133 Kepulauan Selayar.',
                'foto'      => 'images/berita-peta.webp',
                'kontak'    => '-',
                'created_at'=> $now,
                'updated_at'=> $now,
            ],
            [
                'nama'      => 'TK / PAUD Desa Batu Bingkung',
                'kategori'  => 'sekolah',
                'lat'       => -7.369877,
                'lng'       => 121.127128,
                'alamat'    => 'Dusun Darat Makmur, Desa Batu Bingkung',
                'deskripsi' => 'Lembaga Pendidikan Anak Usia Dini dan Taman Kanak-Kanak desa.',
                'foto'      => 'images/berita-peta.webp',
                'kontak'    => '-',
                'created_at'=> $now,
                'updated_at'=> $now,
            ],
            [
                'nama'      => 'Pustu (Puskesmas Pembantu) Batu Bingkung',
                'kategori'  => 'posyandu',
                'lat'       => -7.369466,
                'lng'       => 121.128629,
                'alamat'    => 'Jl. Poros Pustu, Desa Batu Bingkung',
                'deskripsi' => 'Fasilitas kesehatan tingkat pertama untuk pengobatan warga, rawat jalan ringan, dan rujukan Puskesmas.',
                'foto'      => 'images/berita-meeting.webp',
                'kontak'    => '082194882010',
                'created_at'=> $now,
                'updated_at'=> $now,
            ],
            [
                'nama'      => 'Posyandu Desa Batu Bingkung',
                'kategori'  => 'posyandu',
                'lat'       => -7.369050,
                'lng'       => 121.129336,
                'alamat'    => 'Dusun Pesisir - Bone Tanjung',
                'deskripsi' => 'Posyandu Terintegrasi ILP untuk penimbangan balita, pemantauan gizi, imunisasi, dan skrining lansia.',
                'foto'      => 'images/hero_kantor_desa.jpg',
                'kontak'    => 'Kader Posyandu',
                'created_at'=> $now,
                'updated_at'=> $now,
            ],
            [
                'nama'      => 'Masjid Nurul Muttaqin',
                'kategori'  => 'masjid',
                'lat'       => -7.3613656,
                'lng'       => 121.1006883,
                'alamat'    => 'Batu Bingkung Barat, Kec. Pasimarannu',
                'deskripsi' => 'Masjid jami pusat ibadah shalat berjamaah, pengajian rutin, dan kegiatan keagamaan masyarakat.',
                'foto'      => 'images/galeri-rumah.webp',
                'kontak'    => 'Pengurus Masjid',
                'created_at'=> $now,
                'updated_at'=> $now,
            ],
            [
                'nama'      => 'Mesjid Nurul Djihad',
                'kategori'  => 'masjid',
                'lat'       => -7.3706386,
                'lng'       => 121.125656,
                'alamat'    => 'Dusun Darat Makmur, Desa Batu Bingkung',
                'deskripsi' => 'Masjid warga Dusun Darat Makmur dan pusat pembinaan TPA anak-anak.',
                'foto'      => 'images/galeri-rumah.webp',
                'kontak'    => 'Pengurus Masjid',
                'created_at'=> $now,
                'updated_at'=> $now,
            ],
            [
                'nama'      => 'Pantai Larafu',
                'kategori'  => 'wisata',
                'lat'       => -7.3375464,
                'lng'       => 121.1098863,
                'alamat'    => 'Pesisir Pantai Larafu, Kepulauan Pasimarannu',
                'deskripsi' => 'Kawasan wisata pantai berpasir putih alami, panorama air laut toska jernih, dan spot rekreasi keluarga yang eksotis.',
                'foto'      => 'images/pantai-ngapalohe.webp',
                'kontak'    => 'Pokdarwis Desa',
                'created_at'=> $now,
                'updated_at'=> $now,
            ],
            [
                'nama'      => 'Pantai Tebing Karang Batu Bingkung',
                'kategori'  => 'wisata',
                'lat'       => -7.3668000,
                'lng'       => 121.1235000,
                'alamat'    => 'Ujung Pesisir Barat Batu Bingkung',
                'deskripsi' => 'Objek wisata pantai dengan formasi batu karang melengkung alami (bingkung) ikonik berlatar Laut Flores.',
                'foto'      => 'images/galeri-karang.webp',
                'kontak'    => '082194882005',
                'created_at'=> $now,
                'updated_at'=> $now,
            ],
            [
                'nama'      => 'Sentra BUMDes Kopra Putih & Hasil Laut',
                'kategori'  => 'umkm',
                'lat'       => -7.3695000,
                'lng'       => 121.1272000,
                'alamat'    => 'Sentra BUMDes Bina Marannu',
                'deskripsi' => 'Pabrik pengolahan kelapa kopra putih oven, VCO murni, dan pengasapan cakalang kering nelayan.',
                'foto'      => 'images/berita-tani.webp',
                'kontak'    => '082194882001',
                'created_at'=> $now,
                'updated_at'=> $now,
            ],
            [
                'nama'      => 'Proyek Pembangunan: Rabat Beton Dusun Pesisir',
                'kategori'  => 'pembangunan',
                'lat'       => -7.3678000,
                'lng'       => 121.1252000,
                'alamat'    => 'Jalan Lingkungan Dusun Pesisir',
                'deskripsi' => 'Pembangunan jalan rabat beton volume 450 m dengan Dana Desa (DDS) TA 2026. Progres 85%.',
                'foto'      => 'images/galeri-aerial.webp',
                'kontak'    => 'TPK Desa',
                'created_at'=> $now,
                'updated_at'=> $now,
            ]
        ];

        $this->db->table('peta_titik')->truncate();
        $this->db->table('peta_titik')->insertBatch($titikPeta);

        // Update Wisata Pantai Larafu ke tabel wisata
        $larafuExists = $this->db->table('wisata')->where('slug', 'pantai-larafu')->countAllResults();
        if ($larafuExists === 0) {
            $this->db->table('wisata')->insert([
                'nama'             => 'Pantai Larafu',
                'slug'             => 'pantai-larafu',
                'kategori'         => 'Wisata Bahari',
                'deskripsi'        => 'Pantai eksotis dengan hamparan pasir putih bersih dan gradasi laut biru kehijauan yang memukau di pesisir kepulauan. Suasana yang tenang dan asri menjadikannya salah satu destinasi bahari favorit di Pasimarannu.',
                'daya_tarik'       => 'Pasir putih halus, ombak tenang, pohon kelapa rindang, dan panorama gugusan pulau-pulau kecil di sekitarnya.',
                'harga_tiket'      => 'Gratis',
                'jam_buka'         => 'Setiap Hari 24 Jam',
                'fasilitas'        => 'Area santai tepi pantai, tempat parkir alami, gazebo kayu, spot foto senja.',
                'kontak_pengelola' => 'Pokdarwis Desa: 082194882005',
                'lokasi'           => 'Pesisir Utara, Desa Batu Bingkung',
                'lat'              => -7.3375464,
                'lng'              => 121.1098863,
                'maps_url'         => 'https://maps.google.com/?q=-7.3375464,121.1098863',
                'foto'             => 'images/pantai-ngapalohe.webp',
                'status'           => 'aktif',
                'created_at'       => $now,
                'updated_at'       => $now,
            ]);
        }

        // Update koordinat Kantor Desa pada tabel desa
        $this->db->table('desa')->where('id', 1)->update([
            'koordinat_lat' => '-7.3683829',
            'koordinat_lng' => '121.1118377',
        ]);

        $this->db->query('SET FOREIGN_KEY_CHECKS = 1');
    }
}
