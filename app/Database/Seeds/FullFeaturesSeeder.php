<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class FullFeaturesSeeder extends Seeder
{
    public function run()
    {
        $now = date('Y-m-d H:i:s');
        $this->db->query('SET FOREIGN_KEY_CHECKS = 0');

        // 1. Dusun
        $dusunList = [
            [
                'nama_dusun'    => 'Dusun Pesisir',
                'kepala_dusun'  => 'Baharuddin',
                'jumlah_rt'     => 2,
                'jumlah_rw'     => 1,
                'jumlah_kk'     => 185,
                'jumlah_jiwa'   => 620,
                'batas_wilayah' => 'Sebelah Utara: Laut Flores, Selatan: Dusun Darat Makmur, Timur: Dusun Bone Tanjung, Barat: Teluk Pesisir',
                'deskripsi'     => 'Dusun dengan mayoritas penduduk berprofesi sebagai nelayan tangkap dan pengolah hasil laut.',
                'created_at'    => $now,
                'updated_at'    => $now,
            ],
            [
                'nama_dusun'    => 'Dusun Darat Makmur',
                'kepala_dusun'  => 'Samsul Alam',
                'jumlah_rt'     => 2,
                'jumlah_rw'     => 1,
                'jumlah_kk'     => 192,
                'jumlah_jiwa'   => 645,
                'batas_wilayah' => 'Sebelah Utara: Dusun Pesisir, Selatan: Perbukitan Pasimarannu, Timur: Dusun Karangan Timur, Barat: Desa Lambego',
                'deskripsi'     => 'Kawasan perkebunan kelapa, jambu mete, dan pusat peternakan kambing/sapi warga.',
                'created_at'    => $now,
                'updated_at'    => $now,
            ],
            [
                'nama_dusun'    => 'Dusun Karangan Timur',
                'kepala_dusun'  => 'Syarifuddin',
                'jumlah_rt'     => 2,
                'jumlah_rw'     => 1,
                'jumlah_kk'     => 175,
                'jumlah_jiwa'   => 580,
                'batas_wilayah' => 'Sebelah Utara: Pantai Karang, Selatan: Kebun Warga, Timur: Desa Komba-Komba, Barat: Dusun Darat',
                'deskripsi'     => 'Sentra pengrajin anyaman dan budidaya rumput laut dengan pesisir pantai berbatu karang.',
                'created_at'    => $now,
                'updated_at'    => $now,
            ],
            [
                'nama_dusun'    => 'Dusun Bone Tanjung',
                'kepala_dusun'  => 'Muh. Idris',
                'jumlah_rt'     => 2,
                'jumlah_rw'     => 1,
                'jumlah_kk'     => 160,
                'jumlah_jiwa'   => 503,
                'batas_wilayah' => 'Sebelah Utara: Laut Flores, Selatan: Perbukitan, Timur: Tanjung Timur, Barat: Dusun Pesisir',
                'deskripsi'     => 'Kawasan wisata pantai dan permukiman maritim dengan keasrian pemandangan laut.',
                'created_at'    => $now,
                'updated_at'    => $now,
            ],
        ];
        $this->db->table('dusun')->truncate();
        $this->db->table('dusun')->insertBatch($dusunList);

        // 2. Program Unggulan
        $programList = [
            [
                'judul'     => 'Digitalisasi Pelayanan Desa (Smart Pesisir)',
                'ringkasan' => 'Aplikasi persuratan online, keterbukaan informasi publik, dan tracking permohonan mandiri tanpa harus antre lama di kantor.',
                'deskripsi' => 'Memberikan kemudahan warga mengajukan permohonan surat administrasi dari rumah dan memantau transparansi APBDes secara real-time.',
                'icon'      => 'laptop',
                'foto'      => 'images/berita-peta.webp',
                'status'    => 'aktif',
                'urutan'    => 1,
                'created_at'=> $now,
                'updated_at'=> $now,
            ],
            [
                'judul'     => 'Hilirisasi Hasil Laut & Perkebunan Kelapa',
                'ringkasan' => 'Pengembangan produk turunan kopra putih berkualitas dan ikan cakalang asap oleh BUMDes Bina Marannu.',
                'deskripsi' => 'Meningkatkan nilai tambah komoditas unggulan desa agar memiliki daya tawar dan pasar langsung ke luar kabupaten.',
                'icon'      => 'anchor',
                'foto'      => 'images/berita-tani.webp',
                'status'    => 'aktif',
                'urutan'    => 2,
                'created_at'=> $now,
                'updated_at'=> $now,
            ],
            [
                'judul'     => 'Peningkatan Infrastruktur Dasar & Air Bersih',
                'ringkasan' => 'Pembangunan jalan rabat beton antar dusun, sumur bor terpadu, dan penerangan jalan tenaga surya (PJU-TS).',
                'deskripsi' => 'Memastikan aksesibilitas logistik perikanan dan ketersediaan air bersih higienis bagi seluruh keluarga.',
                'icon'      => 'tool',
                'foto'      => 'images/hero_kantor_desa.jpg',
                'status'    => 'aktif',
                'urutan'    => 3,
                'created_at'=> $now,
                'updated_at'=> $now,
            ],
            [
                'judul'     => 'Kesehatan Prima & Penurunan Stunting 0%',
                'ringkasan' => 'Penguatan Posyandu Integrasi Layanan Primer (ILP), PMT balita berbasis ikan segar, dan pendampingan ibu hamil.',
                'deskripsi' => 'Program terpadu bersama bidan desa dan kader PKK untuk menjamin tumbuh kembang generasi penerus desa.',
                'icon'      => 'heart',
                'foto'      => 'images/berita-meeting.webp',
                'status'    => 'aktif',
                'urutan'    => 4,
                'created_at'=> $now,
                'updated_at'=> $now,
            ],
        ];
        $this->db->table('program_unggulan')->truncate();
        $this->db->table('program_unggulan')->insertBatch($programList);

        // 3. APBDes & APBDes Rincian
        $this->db->table('apbdes_rincian')->truncate();
        $this->db->table('apbdes')->truncate();

        $this->db->table('apbdes')->insert([
            'tahun'                => 2026,
            'judul'                => 'APBDes Murni Tahun Anggaran 2026',
            'jenis'                => 'murni',
            'total_pendapatan'     => 1485650000,
            'realisasi_pendapatan' => 1150000000,
            'total_belanja'        => 1492000000,
            'realisasi_belanja'    => 1118500000,
            'total_pembiayaan'     => 6350000,
            'realisasi_pembiayaan' => 6350000,
            'file_pdf'             => 'uploads/dokumen/apbdes-2026.pdf',
            'status'               => 'final',
            'keterangan'           => 'Anggaran Pendapatan dan Belanja Desa Batu Bingkung TA 2026 berfokus pada pemulihan ekonomi, infrastruktur dasar pesisir, dan digitalisasi layanan.',
            'created_at'           => $now,
            'updated_at'           => $now,
        ]);
        $apbdesId = $this->db->insertID();

        $rincianList = [
            // Pendapatan
            ['apbdes_id' => $apbdesId, 'tipe' => 'pendapatan', 'kode_rekening' => '4.1', 'uraian' => 'Pendapatan Asli Desa (PADes)', 'anggaran' => 35000000, 'realisasi' => 32000000, 'persentase' => 91.43, 'created_at' => $now, 'updated_at' => $now],
            ['apbdes_id' => $apbdesId, 'tipe' => 'pendapatan', 'kode_rekening' => '4.2.1', 'uraian' => 'Dana Desa (DDS) APBN', 'anggaran' => 882400000, 'realisasi' => 705920000, 'persentase' => 80.00, 'created_at' => $now, 'updated_at' => $now],
            ['apbdes_id' => $apbdesId, 'tipe' => 'pendapatan', 'kode_rekening' => '4.2.2', 'uraian' => 'Alokasi Dana Desa (ADD) APBD Kab', 'anggaran' => 520000000, 'realisasi' => 364000000, 'persentase' => 70.00, 'created_at' => $now, 'updated_at' => $now],
            ['apbdes_id' => $apbdesId, 'tipe' => 'pendapatan', 'kode_rekening' => '4.2.3', 'uraian' => 'Bagi Hasil Pajak dan Retribusi Daerah', 'anggaran' => 48250000, 'realisasi' => 48080000, 'persentase' => 99.65, 'created_at' => $now, 'updated_at' => $now],
            // Belanja
            ['apbdes_id' => $apbdesId, 'tipe' => 'belanja', 'kode_rekening' => '5.1', 'uraian' => 'Bidang Penyelenggaraan Pemerintahan Desa', 'anggaran' => 495000000, 'realisasi' => 395000000, 'persentase' => 79.80, 'created_at' => $now, 'updated_at' => $now],
            ['apbdes_id' => $apbdesId, 'tipe' => 'belanja', 'kode_rekening' => '5.2', 'uraian' => 'Bidang Pelaksanaan Pembangunan Desa', 'anggaran' => 650000000, 'realisasi' => 487500000, 'persentase' => 75.00, 'created_at' => $now, 'updated_at' => $now],
            ['apbdes_id' => $apbdesId, 'tipe' => 'belanja', 'kode_rekening' => '5.3', 'uraian' => 'Bidang Pembinaan Kemasyarakatan Desa', 'anggaran' => 142000000, 'realisasi' => 110000000, 'persentase' => 77.46, 'created_at' => $now, 'updated_at' => $now],
            ['apbdes_id' => $apbdesId, 'tipe' => 'belanja', 'kode_rekening' => '5.4', 'uraian' => 'Bidang Pemberdayaan Masyarakat Desa', 'anggaran' => 155000000, 'realisasi' => 96000000, 'persentase' => 61.94, 'created_at' => $now, 'updated_at' => $now],
            ['apbdes_id' => $apbdesId, 'tipe' => 'belanja', 'kode_rekening' => '5.5', 'uraian' => 'Bidang Penanggulangan Bencana, Darurat, & Mendesak', 'anggaran' => 50000000, 'realisasi' => 30000000, 'persentase' => 60.00, 'created_at' => $now, 'updated_at' => $now],
            // Pembiayaan
            ['apbdes_id' => $apbdesId, 'tipe' => 'pembiayaan', 'kode_rekening' => '6.1', 'uraian' => 'Sisa Lebih Perhitungan Anggaran (SiLPA) Tahun Lalu', 'anggaran' => 6350000, 'realisasi' => 6350000, 'persentase' => 100.00, 'created_at' => $now, 'updated_at' => $now],
        ];
        $this->db->table('apbdes_rincian')->insertBatch($rincianList);

        // 4. Peta Titik (Geospatial)
        $titikPeta = [
            [
                'nama'      => 'Kantor Desa Batu Bingkung',
                'kategori'  => 'kantor',
                'lat'       => -7.3683708,
                'lng'       => 121.1260432,
                'alamat'    => 'Jl. Poros Batu Bingkung No. 1, Kec. Pasimarannu',
                'deskripsi' => 'Pusat pelayanan administrasi dan kantor pemerintahan Desa Batu Bingkung.',
                'foto'      => 'images/hero_kantor_desa.jpg',
                'kontak'    => '082194882000',
                'created_at'=> $now,
                'updated_at'=> $now,
            ],
            [
                'nama'      => 'SD Inpres Batu Bingkung No. 107',
                'kategori'  => 'sekolah',
                'lat'       => -7.3682414,
                'lng'       => 121.1263564,
                'alamat'    => 'Jl. Poros Batu Bingkung, Dusun Pesisir',
                'deskripsi' => 'Lembaga pendidikan dasar formal di Desa Batu Bingkung.',
                'foto'      => 'images/berita-peta.webp',
                'kontak'    => '085242000107',
                'created_at'=> $now,
                'updated_at'=> $now,
            ],
            [
                'nama'      => 'Masjid Babussalam Batu Bingkung',
                'kategori'  => 'masjid',
                'lat'       => -7.3689000,
                'lng'       => 121.1258000,
                'alamat'    => 'Dusun Darat Makmur, Desa Batu Bingkung',
                'deskripsi' => 'Masjid utama desa sebagai pusat peribadatan dan kegiatan keagamaan warga.',
                'foto'      => 'images/galeri-rumah.webp',
                'kontak'    => '-',
                'created_at'=> $now,
                'updated_at'=> $now,
            ],
            [
                'nama'      => 'Posyandu Melati Indah & Polindes',
                'kategori'  => 'posyandu',
                'lat'       => -7.3681000,
                'lng'       => 121.1255000,
                'alamat'    => 'Dusun Pesisir, Desa Batu Bingkung',
                'deskripsi' => 'Pusat pelayanan kesehatan ibu dan anak, imunisasi, dan penimbangan balita.',
                'foto'      => 'images/berita-meeting.webp',
                'kontak'    => '082194882010',
                'created_at'=> $now,
                'updated_at'=> $now,
            ],
            [
                'nama'      => 'Dermaga Tambatan Perahu Pesisir',
                'kategori'  => 'infrastruktur',
                'lat'       => -7.3675000,
                'lng'       => 121.1248000,
                'alamat'    => 'Pantai Pesisir, Desa Batu Bingkung',
                'deskripsi' => 'Dermaga sandar perahu nelayan tradisional dan bongkar muat hasil laut.',
                'foto'      => 'images/galeri-laut.webp',
                'kontak'    => '-',
                'created_at'=> $now,
                'updated_at'=> $now,
            ],
            [
                'nama'      => 'Sentra BUMDes Kopra Putih & Minyak Kelapa',
                'kategori'  => 'umkm',
                'lat'       => -7.3695000,
                'lng'       => 121.1272000,
                'alamat'    => 'Dusun Darat Makmur, Desa Batu Bingkung',
                'deskripsi' => 'Pabrik pengolahan kelapa, oven kopra putih, dan produksi minyak kelapa murni.',
                'foto'      => 'images/berita-tani.webp',
                'kontak'    => '082194882001',
                'created_at'=> $now,
                'updated_at'=> $now,
            ],
            [
                'nama'      => 'Pantai Tebing Karang Batu Bingkung',
                'kategori'  => 'wisata',
                'lat'       => -7.3668000,
                'lng'       => 121.1235000,
                'alamat'    => 'Ujung Pesisir Barat Batu Bingkung',
                'deskripsi' => 'Objek wisata pantai dengan formasi batu karang melengkung alami dan panorama laut lepas.',
                'foto'      => 'images/galeri-karang.webp',
                'kontak'    => '082194882005',
                'created_at'=> $now,
                'updated_at'=> $now,
            ],
            [
                'nama'      => 'Titik Proyek: Rabat Beton Jalan Lingkungan Dusun Pesisir',
                'kategori'  => 'pembangunan',
                'lat'       => -7.3678000,
                'lng'       => 121.1252000,
                'alamat'    => 'Jalan Lingkungan RT 01 / RW 01 Dusun Pesisir',
                'deskripsi' => 'Pembangunan jalan rabat beton volume 450 meter dengan dana desa 2026. Progres 85%.',
                'foto'      => 'images/galeri-aerial.webp',
                'kontak'    => 'TPK Desa',
                'created_at'=> $now,
                'updated_at'=> $now,
            ],
        ];
        $this->db->table('peta_titik')->truncate();
        $this->db->table('peta_titik')->insertBatch($titikPeta);

        // 5. UMKM
        $umkmList = [
            [
                'nama_usaha'   => 'BUMDes Bina Marannu (Kopra Putih Super)',
                'nama_pemilik' => 'Pengurus BUMDes Bina Marannu',
                'kategori'     => 'Perkebunan',
                'deskripsi'    => 'Kopra putih oven berkualitas tinggi dengan kadar air rendah di bawah 6%, siap kirim antar pulau dan pabrik industri.',
                'harga'        => 'Rp 14.500 / kg',
                'whatsapp'     => '6282194882000',
                'alamat'       => 'Sentra BUMDes, Dusun Darat Makmur',
                'dusun'        => 'Dusun Darat Makmur',
                'foto'         => 'images/berita-tani.webp',
                'is_unggulan'  => 1,
                'is_bumdes'    => 1,
                'status'       => 'aktif',
                'created_at'   => $now,
                'updated_at'   => $now,
            ],
            [
                'nama_usaha'   => 'Minyak Kelapa Murni (VCO) Pasimarannu',
                'nama_pemilik' => 'Kelompok Wanita Tani Melati',
                'kategori'     => 'Hasil Olahan',
                'deskripsi'    => 'Virgin Coconut Oil murni tanpa pemanasan, diolah higienis untuk kesehatan jantung, imun tubuh, dan perawatan kulit.',
                'harga'        => 'Rp 45.000 / botol (250 ml)',
                'whatsapp'     => '6282194882001',
                'alamat'       => 'Dusun Karangan Timur No. 12',
                'dusun'        => 'Dusun Karangan Timur',
                'foto'         => 'images/berita-meeting.webp',
                'is_unggulan'  => 1,
                'is_bumdes'    => 0,
                'status'       => 'aktif',
                'created_at'   => $now,
                'updated_at'   => $now,
            ],
            [
                'nama_usaha'   => 'Cakalang & Tenggiri Asap Kering Selayar',
                'nama_pemilik' => 'Pak Daeng Bau (Kelompok Nelayan Pesisir)',
                'kategori'     => 'Hasil Laut',
                'deskripsi'    => 'Ikan cakalang segar tangkapan perahu nelayan lokal, diasap menggunakan sabut kelapa tua dengan aroma khas tahan lama.',
                'harga'        => 'Rp 65.000 / bungkus',
                'whatsapp'     => '6282194882002',
                'alamat'       => 'Kawasan Tambatan Perahu Dusun Pesisir',
                'dusun'        => 'Dusun Pesisir',
                'foto'         => 'images/galeri-laut.webp',
                'is_unggulan'  => 1,
                'is_bumdes'    => 0,
                'status'       => 'aktif',
                'created_at'   => $now,
                'updated_at'   => $now,
            ],
            [
                'nama_usaha'   => 'Keripik Pisang & Singkong Gula Kelapa',
                'nama_pemilik' => 'Ibu Rahmawati',
                'kategori'     => 'Kuliner',
                'deskripsi'    => 'Camilan renyah gurih manis dengan balutan karamel gula merah kelapa murni tanpa bahan pengawet.',
                'harga'        => 'Rp 18.000 / kemasan 200gr',
                'whatsapp'     => '6282194882003',
                'alamat'       => 'Dusun Darat Makmur',
                'dusun'        => 'Dusun Darat Makmur',
                'foto'         => 'images/galeri-rumah.webp',
                'is_unggulan'  => 0,
                'is_bumdes'    => 0,
                'status'       => 'aktif',
                'created_at'   => $now,
                'updated_at'   => $now,
            ],
            [
                'nama_usaha'   => 'Anyaman Kerajinan Tikar & Tas Daun Lontar',
                'nama_pemilik' => 'Kelompok Pengrajin Tradisional Bone Tanjung',
                'kategori'     => 'Kerajinan',
                'deskripsi'    => 'Produk ramah lingkungan hasil keterampilan tangan ibu-ibu desa, cocok untuk oleh-oleh dan hiasan etnik.',
                'harga'        => 'Rp 75.000 - Rp 150.000',
                'whatsapp'     => '6282194882004',
                'alamat'       => 'Dusun Bone Tanjung',
                'dusun'        => 'Dusun Bone Tanjung',
                'foto'         => 'images/pantai-ngapalohe.webp',
                'is_unggulan'  => 0,
                'is_bumdes'    => 0,
                'status'       => 'aktif',
                'created_at'   => $now,
                'updated_at'   => $now,
            ],
        ];
        $this->db->table('umkm')->truncate();
        $this->db->table('umkm')->insertBatch($umkmList);

        // 6. Wisata
        $wisataList = [
            [
                'nama'             => 'Pantai Tebing Karang Batu Bingkung',
                'slug'             => 'pantai-tebing-karang-batu-bingkung',
                'kategori'         => 'Wisata Bahari',
                'deskripsi'        => 'Destinasi ikonik dengan dinding karang alami melengkung yang megah berhadapan langsung dengan Laut Flores. Sangat cocok untuk fotografi dan menikmati angin laut segar.',
                'daya_tarik'       => 'Formasi tebing karang melengkung (bingkung), pemandangan laut biru toska jernih, dan deburan ombak alami.',
                'harga_tiket'      => 'Gratis (Donasi Kebersihan Rp 5.000)',
                'jam_buka'         => 'Setiap Hari: 06.00 - 18.30 WITA',
                'fasilitas'        => 'Gazebo santai, bangku kayu pesisir, area parkir, warung kelapa muda warga, toilet umum.',
                'kontak_pengelola' => 'Pokdarwis Bingkung: 082194882005',
                'lokasi'           => 'Pesisir Barat, Dusun Pesisir, Desa Batu Bingkung',
                'lat'              => -7.3668000,
                'lng'              => 121.1235000,
                'maps_url'         => 'https://maps.google.com/?q=-7.3668,121.1235',
                'foto'             => 'images/galeri-karang.webp',
                'status'           => 'aktif',
                'created_at'       => $now,
                'updated_at'       => $now,
            ],
            [
                'nama'             => 'Spot Snorkeling & Coral Teluk Bingkung',
                'slug'             => 'spot-snorkeling-teluk-bingkung',
                'kategori'         => 'Wisata Bawah Laut',
                'deskripsi'        => 'Taman terumbu karang yang masih sangat alami dengan keanekaragaman hayati laut yang kaya, ikan karang berwarna-warni, serta air yang begitu jernih.',
                'daya_tarik'       => 'Terumbu karang karang meja (Acropora), kima raksasa, penyu laut pesisir, dan visibility air hingga kedalaman 15 meter.',
                'harga_tiket'      => 'Sewa Perahu & Alat Snorkeling: Rp 75.000 - Rp 150.000',
                'jam_buka'         => 'Pagi - Sore: 07.30 - 16.30 WITA',
                'fasilitas'        => 'Perahu katir nelayan lokal, sewa pelampung, pemandu lokal, kamar bilas air tawar.',
                'kontak_pengelola' => 'Daeng Amir (Kelompok Nelayan): 082194882006',
                'lokasi'           => 'Teluk Bone Tanjung, Desa Batu Bingkung',
                'lat'              => -7.3655000,
                'lng'              => 121.1242000,
                'maps_url'         => 'https://maps.google.com/?q=-7.3655,121.1242',
                'foto'             => 'images/galeri-laut.webp',
                'status'           => 'aktif',
                'created_at'       => $now,
                'updated_at'       => $now,
            ],
            [
                'nama'             => 'Puncak Bukit Sunset Tanjung Pasimarannu',
                'slug'             => 'puncak-bukit-sunset-tanjung',
                'kategori'         => 'Wisata Alam',
                'deskripsi'        => 'Titik tertinggi di bibir pantai desa yang menyajikan pemandangan lanskap matahari terbenam (sunset) paling menawan di Kepulauan Pasimarannu.',
                'daya_tarik'       => 'Pemandangan golden sunset 360 derajat, siluet perahu nelayan saat senja, dan spot camping tepi laut.',
                'harga_tiket'      => 'Gratis',
                'jam_buka'         => 'Buka 24 Jam (Waktu terbaik 16.30 - 18.30 WITA)',
                'fasilitas'        => 'Spot foto gardu pandang kayu, jalur setapak bertangga, tempat sampah.',
                'kontak_pengelola' => 'Karang Taruna Desa: 082194882007',
                'lokasi'           => 'Bukit Dusun Bone Tanjung, Desa Batu Bingkung',
                'lat'              => -7.3698000,
                'lng'              => 121.1290000,
                'maps_url'         => 'https://maps.google.com/?q=-7.3698,121.1290',
                'foto'             => 'images/pantai-ngapalohe.webp',
                'status'           => 'aktif',
                'created_at'       => $now,
                'updated_at'       => $now,
            ],
        ];
        $this->db->table('wisata')->truncate();
        $this->db->table('wisata')->insertBatch($wisataList);

        // 7. Pembangunan
        $pembangunanList = [
            [
                'nama_kegiatan' => 'Pembangunan Jalan Rabat Beton Lingkungan Dusun Pesisir',
                'slug'          => 'rabat-beton-dusun-pesisir',
                'bidang'        => 'Bidang Pelaksanaan Pembangunan Desa',
                'lokasi'        => 'RT 01 / RW 01 Dusun Pesisir',
                'dusun'         => 'Dusun Pesisir',
                'anggaran'      => 185000000,
                'sumber_dana'   => 'Dana Desa (DDS) TA 2026',
                'tahun'         => 2026,
                'status'        => 'berjalan',
                'progres'       => 85,
                'foto_sebelum'  => 'images/galeri-aerial.webp',
                'foto_sesudah'  => 'images/galeri-pantai.webp',
                'lat'           => -7.3678000,
                'lng'           => 121.1252000,
                'pelaksana'     => 'Tim Pelaksana Kegiatan (TPK) Desa',
                'volume'        => 'Panjang 450 m x Lebar 2,5 m',
                'manfaat'       => 'Memperlancar arus transportasi hasil tangkapan nelayan dan akses anak sekolah.',
                'created_at'    => $now,
                'updated_at'    => $now,
            ],
            [
                'nama_kegiatan' => 'Pembangunan Sumur Bor & Jaringan Pipa Air Bersih',
                'slug'          => 'sumur-bor-air-bersih',
                'bidang'        => 'Bidang Pelaksanaan Pembangunan Desa',
                'lokasi'        => 'Dusun Darat Makmur',
                'dusun'         => 'Dusun Darat Makmur',
                'anggaran'      => 140000000,
                'sumber_dana'   => 'Dana Desa (DDS) TA 2025',
                'tahun'         => 2025,
                'status'        => 'selesai',
                'progres'       => 100,
                'foto_sebelum'  => 'images/berita-peta.webp',
                'foto_sesudah'  => 'images/galeri-rumah.webp',
                'lat'           => -7.3691000,
                'lng'           => 121.1280000,
                'pelaksana'     => 'KSM Tirta Marannu & TPK',
                'volume'        => 'Kedalaman 65 meter + Bak Kapasitas 12.000 Liter',
                'manfaat'       => 'Menyalurkan air bersih layak konsumsi ke 145 kepala keluarga.',
                'created_at'    => $now,
                'updated_at'    => $now,
            ],
            [
                'nama_kegiatan' => 'Pembangunan Talud Pengaman Abrasi Pantai & Tambatan Perahu',
                'slug'          => 'talud-pantai-tambatan-perahu',
                'bidang'        => 'Bidang Pelaksanaan Pembangunan Desa',
                'lokasi'        => 'Pesisir Dusun Bone Tanjung',
                'dusun'         => 'Dusun Bone Tanjung',
                'anggaran'      => 220000000,
                'sumber_dana'   => 'Bantuan Keuangan Khusus Kab. Selayar & DDS',
                'tahun'         => 2026,
                'status'        => 'berjalan',
                'progres'       => 60,
                'foto_sebelum'  => 'images/galeri-karang.webp',
                'foto_sesudah'  => 'images/galeri-laut.webp',
                'lat'           => -7.3672000,
                'lng'           => 121.1245000,
                'pelaksana'     => 'TPK Desa & Gotong Royong Nelayan',
                'volume'        => 'Panjang 180 meter',
                'manfaat'       => 'Mencegah abrasi jalan pesisir dan melindungi perahu nelayan saat cuaca gelombang tinggi.',
                'created_at'    => $now,
                'updated_at'    => $now,
            ],
            [
                'nama_kegiatan' => 'Rehabilitasi Gedung Posyandu Melati Indah',
                'slug'          => 'rehabilitasi-posyandu-melati',
                'bidang'        => 'Bidang Pembinaan Kemasyarakatan',
                'lokasi'        => 'Dusun Pesisir',
                'dusun'         => 'Dusun Pesisir',
                'anggaran'      => 45000000,
                'sumber_dana'   => 'Alokasi Dana Desa (ADD) TA 2025',
                'tahun'         => 2025,
                'status'        => 'selesai',
                'progres'       => 100,
                'foto_sebelum'  => 'images/berita-meeting.webp',
                'foto_sesudah'  => 'images/hero_kantor_desa.jpg',
                'lat'           => -7.3681000,
                'lng'           => 121.1255000,
                'pelaksana'     => 'TPK Desa',
                'volume'        => '1 Unit Gedung 6m x 8m',
                'manfaat'       => 'Ruang pelayanan balita, ibu hamil, dan pemeriksaan lansia yang nyaman dan ber-AC.',
                'created_at'    => $now,
                'updated_at'    => $now,
            ],
        ];
        $this->db->table('pembangunan')->truncate();
        $this->db->table('pembangunan')->insertBatch($pembangunanList);

        // 8. Dokumen Publik
        $dokumenList = [
            [
                'judul'          => 'Peraturan Desa No. 01 Tahun 2026 tentang APBDes TA 2026',
                'nomor_dokumen'  => 'PERDES/01/2026',
                'kategori'       => 'perdes',
                'tahun'          => 2026,
                'deskripsi'      => 'Dokumen resmi penetapan Anggaran Pendapatan dan Belanja Desa Batu Bingkung Tahun Anggaran 2026.',
                'file_url'       => 'uploads/dokumen/perdes-apbdes-2026.pdf',
                'ukuran_file'    => '1.8 MB',
                'total_download' => 142,
                'created_at'     => $now,
                'updated_at'     => $now,
            ],
            [
                'judul'          => 'Peraturan Desa No. 03 Tahun 2025 tentang RKPDes Tahun 2026',
                'nomor_dokumen'  => 'PERDES/03/2025',
                'kategori'       => 'rkpdes',
                'tahun'          => 2025,
                'deskripsi'      => 'Rencana Kerja Pemerintah Desa Batu Bingkung sebagai pedoman pelaksanaan pembangunan satu tahun anggaran.',
                'file_url'       => 'uploads/dokumen/rkpdes-2026.pdf',
                'ukuran_file'    => '2.4 MB',
                'total_download' => 98,
                'created_at'     => $now,
                'updated_at'     => $now,
            ],
            [
                'judul'          => 'Rencana Pembangunan Jangka Menengah Desa (RPJMDes) 2022 - 2028',
                'nomor_dokumen'  => 'PERDES/02/2022',
                'kategori'       => 'rpjmdes',
                'tahun'          => 2022,
                'deskripsi'      => 'Arah kebijakan strategis pembangunan dan visi misi Desa Batu Bingkung selama enam tahun masa jabatan.',
                'file_url'       => 'uploads/dokumen/rpjmdes-2022-2028.pdf',
                'ukuran_file'    => '4.1 MB',
                'total_download' => 215,
                'created_at'     => $now,
                'updated_at'     => $now,
            ],
            [
                'judul'          => 'Laporan Pertanggungjawaban (LPJ) Realisasi APBDes TA 2025',
                'nomor_dokumen'  => 'LPJ/12/2025',
                'kategori'       => 'lpj',
                'tahun'          => 2025,
                'deskripsi'      => 'Laporan akuntabilitas keuangan dan serapan fisik kegiatan pembangunan tahun anggaran 2025.',
                'file_url'       => 'uploads/dokumen/lpj-apbdes-2025.pdf',
                'ukuran_file'    => '3.2 MB',
                'total_download' => 176,
                'created_at'     => $now,
                'updated_at'     => $now,
            ],
            [
                'judul'          => 'SK Kepala Desa tentang Pembentukan Tim Pengelola BUMDes',
                'nomor_dokumen'  => 'SK/KADES/04/2025',
                'kategori'       => 'sk_kades',
                'tahun'          => 2025,
                'deskripsi'      => 'Surat Keputusan Kepala Desa terkait pengangkatan pengurus operasional BUMDes Bina Marannu.',
                'file_url'       => 'uploads/dokumen/sk-bumdes-2025.pdf',
                'ukuran_file'    => '890 KB',
                'total_download' => 64,
                'created_at'     => $now,
                'updated_at'     => $now,
            ],
        ];
        $this->db->table('dokumen_publik')->truncate();
        $this->db->table('dokumen_publik')->insertBatch($dokumenList);

        // 9. Agenda Desa
        $agendaList = [
            [
                'judul'           => 'Musyawarah Desa Penetapan Perubahan RKPDes TA 2026',
                'slug'            => 'musdes-rkpdes-2026',
                'kategori'        => 'Musyawarah Desa',
                'tanggal_mulai'   => date('Y-m-d', strtotime('+3 days')),
                'tanggal_selesai' => date('Y-m-d', strtotime('+3 days')),
                'jam_mulai'       => '09.00',
                'jam_selesai'     => '12.30 WITA',
                'lokasi'          => 'Aula Pertemuan Kantor Desa Batu Bingkung',
                'penyelenggara'   => 'BPD & Pemerintah Desa',
                'deskripsi'       => 'Membahas prioritas usulan pembangunan dusun dan penyesuaian pagu anggaran APBDes perubahan.',
                'status'          => 'akan_datang',
                'created_at'      => $now,
                'updated_at'      => $now,
            ],
            [
                'judul'           => 'Pelayanan Posyandu Integrasi Layanan Primer (ILP)',
                'slug'            => 'posyandu-ilp-pesisir',
                'kategori'        => 'Kesehatan',
                'tanggal_mulai'   => date('Y-m-d', strtotime('+7 days')),
                'tanggal_selesai' => date('Y-m-d', strtotime('+7 days')),
                'jam_mulai'       => '08.30',
                'jam_selesai'     => '12.00 WITA',
                'lokasi'          => 'Gedung Posyandu Melati Indah Dusun Pesisir',
                'penyelenggara'   => 'Bidan Desa & Kader PKK',
                'deskripsi'       => 'Pemeriksaan rutin bayi balita, imunisasi dasar lengkap, serta skrining gula darah & tensi bagi lansia.',
                'status'          => 'akan_datang',
                'created_at'      => $now,
                'updated_at'      => $now,
            ],
            [
                'judul'           => 'Gotong Royong "Jumat Bersih" Pantai & Lingkungan',
                'slug'            => 'jumat-bersih-pantai',
                'kategori'        => 'Kemasyarakatan',
                'tanggal_mulai'   => date('Y-m-d', strtotime('+5 days')),
                'tanggal_selesai' => date('Y-m-d', strtotime('+5 days')),
                'jam_mulai'       => '07.00',
                'jam_selesai'     => '10.00 WITA',
                'lokasi'          => 'Kawasan Wisata Tebing Batu Bingkung & Dermaga',
                'penyelenggara'   => 'Kepala Dusun Pesisir & Karang Taruna',
                'deskripsi'       => 'Aksi bersih sampah plastik laut dan perapian jalur pejalan kaki bersama seluruh elemen masyarakat.',
                'status'          => 'akan_datang',
                'created_at'      => $now,
                'updated_at'      => $now,
            ],
            [
                'judul'           => 'Pelatihan Packaging & Pemasaran Digital Produk UMKM Warga',
                'slug'            => 'pelatihan-umkm-digital',
                'kategori'        => 'Pemberdayaan',
                'tanggal_mulai'   => date('Y-m-d', strtotime('+12 days')),
                'tanggal_selesai' => date('Y-m-d', strtotime('+13 days')),
                'jam_mulai'       => '08.00',
                'jam_selesai'     => '15.00 WITA',
                'lokasi'          => 'Balai Pelatihan BUMDes Batu Bingkung',
                'penyelenggara'   => 'Kasi Kesejahteraan & Pengurus BUMDes',
                'deskripsi'       => 'Bimbingan teknik foto produk, pendaftaran sertifikasi halal gratis, dan pemasaran via WhatsApp & marketplace.',
                'status'          => 'akan_datang',
                'created_at'      => $now,
                'updated_at'      => $now,
            ],
        ];
        $this->db->table('agenda')->truncate();
        $this->db->table('agenda')->insertBatch($agendaList);

        // 10. Pengaduan Warga
        $pengaduanList = [
            [
                'kode_tiket'        => 'ADU-202609-001',
                'nama_pelapor'      => 'Ahmad Syahrir',
                'nik'               => '7301041205900001',
                'no_hp'             => '082194883311',
                'dusun'             => 'Dusun Pesisir',
                'judul'             => 'Lampu Penerangan Jalan Tenaga Surya di Dekat Dermaga Padam',
                'kategori'          => 'Infrastruktur',
                'isi_aduan'         => 'Mohon bantuan perbaikan tiang lampu tenaga surya di ujung dermaga perahu nelayan, sudah 3 malam padam sehingga menyulitkan nelayan yang merapat saat subuh.',
                'foto_bukti'        => 'images/galeri-aerial.webp',
                'status'            => 'selesai',
                'tanggapan'         => 'Terima kasih atas laporannya. Tim teknis desa bersama operator PJU telah mengganti modul baterai lithium pada tanggal 22 September 2026. Lampu sudah kembali berfungsi normal.',
                'tanggal_tanggapan' => date('Y-m-d H:i:s', strtotime('-1 day')),
                'created_at'        => date('Y-m-d H:i:s', strtotime('-3 days')),
                'updated_at'        => date('Y-m-d H:i:s', strtotime('-1 day')),
            ],
            [
                'kode_tiket'        => 'ADU-202609-002',
                'nama_pelapor'      => 'Hj. Sitti Fatimah',
                'nik'               => '7301044408750002',
                'no_hp'             => '085299441122',
                'dusun'             => 'Dusun Darat Makmur',
                'judul'             => 'Pembersihan Saluran Drainase Menjelang Musim Penghujan',
                'kategori'          => 'Lingkungan',
                'isi_aduan'         => 'Drainase di batas jalan RT 02 Dusun Darat tersumbat tanah dan dedaunan lebat dari kebun kelapa. Khawatir saat hujan deras air meluap ke halaman rumah.',
                'foto_bukti'        => null,
                'status'            => 'diproses',
                'tanggapan'         => 'Laporan telah diteruskan ke Kepala Dusun Darat Makmur dan dijadwalkan kerja bakti normalisasi saluran drainase pada Jumat pekan ini.',
                'tanggal_tanggapan' => date('Y-m-d H:i:s'),
                'created_at'        => date('Y-m-d H:i:s', strtotime('-1 day')),
                'updated_at'        => date('Y-m-d H:i:s'),
            ],
        ];
        $this->db->table('pengaduan')->truncate();
        $this->db->table('pengaduan')->insertBatch($pengaduanList);

        // 11. Galeri Video
        $videoList = [
            [
                'judul'      => 'Profil Resmi Desa Batu Bingkung - Eksotisme Pesisir Pasimarannu Selayar',
                'embed_url'  => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                'durasi'     => '05:42 Menit',
                'tanggal'    => date('Y-m-d'),
                'keterangan' => 'Video dokumenter profil potensi kelautan, kearifan maritim, dan pembangunan Desa Batu Bingkung.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'judul'      => 'Dokumentasi Penyaluran Bantuan Langsung Tunai (BLT-DD) dan Sosialisasi Stunting',
                'embed_url'  => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                'durasi'     => '03:15 Menit',
                'tanggal'    => date('Y-m-d', strtotime('-15 days')),
                'keterangan' => 'Liputan kegiatan musyawarah desa bersama warga penerima manfaat di Kantor Desa Batu Bingkung.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];
        $this->db->table('galeri_video')->truncate();
        $this->db->table('galeri_video')->insertBatch($videoList);

        // 12. Update Data Statistik (Umur, Agama, Pendidikan, Pekerjaan, Perkawinan, Dusun)
        $this->db->table('data_penduduk')->truncate();
        $dataStatistikPenduduk = [
            // Jenis Kelamin
            ['kategori' => 'Jenis Kelamin', 'label' => 'Laki-laki', 'jumlah' => 1184, 'keterangan' => '50.43% dari total penduduk', 'urutan' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['kategori' => 'Jenis Kelamin', 'label' => 'Perempuan', 'jumlah' => 1164, 'keterangan' => '49.57% dari total penduduk', 'urutan' => 2, 'created_at' => $now, 'updated_at' => $now],
            
            // Berdasarkan Umur
            ['kategori' => 'Umur', 'label' => '0 - 4 Tahun (Balita)', 'jumlah' => 195, 'keterangan' => 'Balita', 'urutan' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['kategori' => 'Umur', 'label' => '5 - 14 Tahun (Anak-anak)', 'jumlah' => 430, 'keterangan' => 'Usia sekolah dasar', 'urutan' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['kategori' => 'Umur', 'label' => '15 - 24 Tahun (Remaja)', 'jumlah' => 385, 'keterangan' => 'Usia remaja', 'urutan' => 3, 'created_at' => $now, 'updated_at' => $now],
            ['kategori' => 'Umur', 'label' => '25 - 54 Tahun (Usia Produktif)', 'jumlah' => 988, 'keterangan' => 'Tenaga kerja produktif', 'urutan' => 4, 'created_at' => $now, 'updated_at' => $now],
            ['kategori' => 'Umur', 'label' => '55+ Tahun (Lansia)', 'jumlah' => 350, 'keterangan' => 'Lanjut usia', 'urutan' => 5, 'created_at' => $now, 'updated_at' => $now],

            // Pendidikan
            ['kategori' => 'Pendidikan', 'label' => 'Tidak / Belum Sekolah', 'jumlah' => 240, 'keterangan' => 'Termasuk balita', 'urutan' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['kategori' => 'Pendidikan', 'label' => 'Tamat SD / Sederajat', 'jumlah' => 760, 'keterangan' => 'Lulusan SD', 'urutan' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['kategori' => 'Pendidikan', 'label' => 'Tamat SMP / Sederajat', 'jumlah' => 540, 'keterangan' => 'Lulusan SMP', 'urutan' => 3, 'created_at' => $now, 'updated_at' => $now],
            ['kategori' => 'Pendidikan', 'label' => 'Tamat SMA / SMK / Sederajat', 'jumlah' => 610, 'keterangan' => 'Lulusan SMA', 'urutan' => 4, 'created_at' => $now, 'updated_at' => $now],
            ['kategori' => 'Pendidikan', 'label' => 'Diploma (D1 - D3)', 'jumlah' => 68, 'keterangan' => 'Ahli Madya', 'urutan' => 5, 'created_at' => $now, 'updated_at' => $now],
            ['kategori' => 'Pendidikan', 'label' => 'Sarjana (S1 / S2)', 'jumlah' => 130, 'keterangan' => 'Sarjana & Magister', 'urutan' => 6, 'created_at' => $now, 'updated_at' => $now],

            // Pekerjaan
            ['kategori' => 'Pekerjaan', 'label' => 'Nelayan & Pembudidaya Laut', 'jumlah' => 680, 'keterangan' => 'Sektor kelautan utama', 'urutan' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['kategori' => 'Pekerjaan', 'label' => 'Petani & Pekebun Kelapa', 'jumlah' => 420, 'keterangan' => 'Sektor perkebunan', 'urutan' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['kategori' => 'Pekerjaan', 'label' => 'Pedagang / Wiraswasta / UMKM', 'jumlah' => 185, 'keterangan' => 'Sektor perdagangan lokal', 'urutan' => 3, 'created_at' => $now, 'updated_at' => $now],
            ['kategori' => 'Pekerjaan', 'label' => 'Pegawai Negeri / ASN / Guru', 'jumlah' => 45, 'keterangan' => 'Aparatur negara & pengajar', 'urutan' => 4, 'created_at' => $now, 'updated_at' => $now],
            ['kategori' => 'Pekerjaan', 'label' => 'Tukang / Jasa / Pertukangan', 'jumlah' => 95, 'keterangan' => 'Jasa konstruksi & bengkel', 'urutan' => 5, 'created_at' => $now, 'updated_at' => $now],
            ['kategori' => 'Pekerjaan', 'label' => 'Pelajar / Mahasiswa', 'jumlah' => 395, 'keterangan' => 'Sedang menempuh pendidikan', 'urutan' => 6, 'created_at' => $now, 'updated_at' => $now],
            ['kategori' => 'Pekerjaan', 'label' => 'Ibu Rumah Tangga / Lainnya', 'jumlah' => 528, 'keterangan' => 'Domestik & lainnya', 'urutan' => 7, 'created_at' => $now, 'updated_at' => $now],

            // Agama
            ['kategori' => 'Agama', 'label' => 'Islam', 'jumlah' => 2348, 'keterangan' => '100% penduduk beragama Islam', 'urutan' => 1, 'created_at' => $now, 'updated_at' => $now],

            // Perkawinan
            ['kategori' => 'Perkawinan', 'label' => 'Belum Kawin', 'jumlah' => 940, 'keterangan' => 'Belum menikah', 'urutan' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['kategori' => 'Perkawinan', 'label' => 'Kawin', 'jumlah' => 1250, 'keterangan' => 'Menikah sah', 'urutan' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['kategori' => 'Perkawinan', 'label' => 'Cerai Hidup', 'jumlah' => 48, 'keterangan' => 'Duda / Janda', 'urutan' => 3, 'created_at' => $now, 'updated_at' => $now],
            ['kategori' => 'Perkawinan', 'label' => 'Cerai Mati', 'jumlah' => 110, 'keterangan' => 'Duda / Janda', 'urutan' => 4, 'created_at' => $now, 'updated_at' => $now],

            // Wilayah Dusun
            ['kategori' => 'Dusun', 'label' => 'Dusun Pesisir', 'jumlah' => 620, 'keterangan' => '185 Kepala Keluarga', 'urutan' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['kategori' => 'Dusun', 'label' => 'Dusun Darat Makmur', 'jumlah' => 645, 'keterangan' => '192 Kepala Keluarga', 'urutan' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['kategori' => 'Dusun', 'label' => 'Dusun Karangan Timur', 'jumlah' => 580, 'keterangan' => '175 Kepala Keluarga', 'urutan' => 3, 'created_at' => $now, 'updated_at' => $now],
            ['kategori' => 'Dusun', 'label' => 'Dusun Bone Tanjung', 'jumlah' => 503, 'keterangan' => '160 Kepala Keluarga', 'urutan' => 4, 'created_at' => $now, 'updated_at' => $now],
        ];
        $this->db->table('data_penduduk')->insertBatch($dataStatistikPenduduk);

        // Pastikan tabel desa memiliki info logo dan hero yang tepat
        $this->db->table('desa')->where('id', 1)->update([
            'logo'       => 'images/logo_selayar.png',
            'hero_image' => 'images/hero_kantor_desa.jpg',
            'jumlah_penduduk' => 2348,
            'jumlah_kk'       => 712,
            'luas_wilayah'    => '14,8 km²',
            'koordinat_lat'   => '-7.3683708',
            'koordinat_lng'   => '121.1260432',
        ]);

        $this->db->query('SET FOREIGN_KEY_CHECKS = 1');
    }
}
