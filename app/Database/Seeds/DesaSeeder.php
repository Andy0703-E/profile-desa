<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DesaSeeder extends Seeder
{
    public function run()
    {
        $now = date('Y-m-d H:i:s');

        // 1. Users
        $this->db->table('users')->insert([
            'name'          => 'Administrator Desa',
            'username'      => 'admin',
            'email'         => 'admin@batubingkung.desa.id',
            'password_hash' => password_hash('admin123', PASSWORD_BCRYPT),
            'role'          => 'superadmin',
            'status'        => 'active',
            'created_at'    => $now,
            'updated_at'    => $now,
        ]);
        $adminId = $this->db->insertID();

        // 2. Desa
        $this->db->table('desa')->insert([
            'nama_desa'       => 'Desa Batu Bingkung',
            'kecamatan'       => 'Kecamatan Pasimarannu',
            'kabupaten'       => 'Kabupaten Kepulauan Selayar',
            'provinsi'        => 'Sulawesi Selatan',
            'kode_pos'        => '92861',
            'slogan'          => 'Bersama membangun desa yang maju, mandiri dan sejahtera untuk masa depan yang lebih baik.',
            'motto'           => 'Bersatu, Maju, Sejahtera',
            'deskripsi'       => 'Desa Batu Bingkung adalah salah satu desa yang terletak di Kecamatan Pasimarannu, Kabupaten Kepulauan Selayar. Dengan potensi sumber daya alam, hasil laut, dan kearifan lokal yang dimiliki, desa ini terus berupaya meningkatkan kesejahteraan masyarakat melalui pembangunan yang berkelanjutan.',
            'luas_wilayah'    => '12,5 km²',
            'jumlah_penduduk' => 2348,
            'jumlah_kk'       => 712,
            'email'           => 'kantor@batubingkung.desa.id',
            'telepon'         => '082194882000',
            'whatsapp'        => '6282194882000',
            'alamat'          => 'Jl. Poros Batu Bingkung No. 1, Desa Batu Bingkung, Kec. Pasimarannu, Kab. Kepulauan Selayar, Sulawesi Selatan 92861',
            'jam_pelayanan'   => 'Senin - Jumat: 08.00 - 15.00 WITA',
            'koordinat_lat'   => '-7.368384',
            'koordinat_lng'   => '121.126077',
            'logo'            => 'images/logo.webp',
            'hero_image'      => 'uploads/desa/kantor-desa.webp',
            'created_at'      => $now,
            'updated_at'      => $now,
        ]);

        // 3. Profil Desa
        $this->db->table('profil_desa')->insert([
            'sejarah'       => 'Desa Batu Bingkung berakar dari pemukiman maritim tradisional di wilayah kepulauan Pasimarannu, Kepulauan Selayar. Dinamakan Batu Bingkung merujuk pada formasi bebatuan karang alam yang melengkung (bingkung) di pesisir pantai desa yang sejak zaman dahulu menjadi penanda navigasi para pelaut dan nelayan tradisional.',
            'visi'          => 'Terwujudnya Desa Batu Bingkung yang Mandiri, Sejahtera, Berkarakter Maritim, dan Berdaya Saing Berbasis Pelayanan Masyarakat yang Transparan dan Partisipatif.',
            'misi'          => "1. Menyelenggarakan tata kelola pemerintahan desa yang bersih, transparan, dan berorientasi pada pelayanan masyarakat.\n2. Mengembangkan potensi sumber daya kelautan, perikanan, dan pertanian demi peningkatan ekonomi warga.\n3. Meningkatkan kualitas infrastruktur dasar pedesaan, sarana transportasi pesisir, dan aksesibilitas air bersih serta listrik.\n4. Memperkuat kapasitas sumber daya manusia melalui penguatan pendidikan, kesehatan posyandu, dan pemberdayaan perempuan serta pemuda.\n5. Menjaga dan melestarikan lingkungan hidup, kawasan pesisir laut, serta nilai-nilai budaya dan kearifan lokal.",
            'geografis'     => 'Desa Batu Bingkung berada di bentang Kepulauan Pasimarannu, Kabupaten Kepulauan Selayar, didominasi wilayah pesisir berbukit landai, vegetasi kelapa, dan kekayaan terumbu karang kepulauan.',
            'demografis'    => 'Mayoritas penduduk bekerja pada sektor kelautan dan perikanan tangkap, budidaya rumput laut, perkebunan kelapa dan jambu mete, serta sektor perdagangan UMKM lokal.',
            'batas_utara'   => 'Laut Flores',
            'batas_selatan' => 'Laut Flores',
            'batas_timur'   => 'Desa Komba-Komba',
            'batas_barat'   => 'Desa Lambego',
            'created_at'    => $now,
            'updated_at'    => $now,
        ]);

        // 4. Pemerintahan
        $aparatur = [
            ['nama' => 'Kepala Desa', 'jabatan' => 'Kepala Desa Batu Bingkung', 'nip' => '-', 'urutan' => 1, 'foto' => null, 'deskripsi' => 'Penanggung jawab eksekutif tertinggi penyelenggaraan pemerintahan dan kemasyarakatan desa.'],
            ['nama' => 'Sekretaris Desa', 'jabatan' => 'Sekretaris Desa', 'nip' => '19850101 201001 1 001', 'urutan' => 2, 'foto' => null, 'deskripsi' => 'Koordinator administrasi, keuangan, dan pelayanan teknis perangkat desa.'],
            ['nama' => 'Kaur Keuangan', 'jabatan' => 'Kepala Urusan Keuangan', 'nip' => '-', 'urutan' => 3, 'foto' => null, 'deskripsi' => 'Pengelola administrasi keuangan dan penatausahaan APBDes.'],
            ['nama' => 'Kaur Perencanaan', 'jabatan' => 'Kepala Urusan Perencanaan', 'nip' => '-', 'urutan' => 4, 'foto' => null, 'deskripsi' => 'Penyusun dokumen rencana pembangunan desa dan data desa.'],
            ['nama' => 'Kasi Pelayanan & Kesra', 'jabatan' => 'Kasi Pelayanan & Kesejahteraan', 'nip' => '-', 'urutan' => 5, 'foto' => null, 'deskripsi' => 'Pelaksana layanan publik kependudukan dan kegiatan kesejahteraan sosial.'],
            ['nama' => 'Kasi Pemerintahan', 'jabatan' => 'Kepala Seksi Pemerintahan', 'nip' => '-', 'urutan' => 6, 'foto' => null, 'deskripsi' => 'Pembina ketertiban umum, administrasi kependudukan, dan kelembagaan desa.'],
            ['nama' => 'Kepala Dusun I', 'jabatan' => 'Kepala Dusun Pesisir', 'nip' => '-', 'urutan' => 7, 'foto' => null, 'deskripsi' => 'Pelaksana tugas kewilayahan Dusun Pesisir.'],
            ['nama' => 'Kepala Dusun II', 'jabatan' => 'Kepala Dusun Darat', 'nip' => '-', 'urutan' => 8, 'foto' => null, 'deskripsi' => 'Pelaksana tugas kewilayahan Dusun Darat.'],
        ];
        foreach ($aparatur as $item) {
            $item['status'] = 'aktif';
            $item['created_at'] = $now;
            $item['updated_at'] = $now;
            $this->db->table('pemerintahan')->insert($item);
        }

        // 5. Berita Categories
        $categories = [
            ['name' => 'Kegiatan Desa', 'slug' => 'kegiatan-desa'],
            ['name' => 'Pembangunan', 'slug' => 'pembangunan'],
            ['name' => 'Kesehatan', 'slug' => 'kesehatan'],
            ['name' => 'Pemerintahan', 'slug' => 'pemerintahan'],
            ['name' => 'Pengumuman', 'slug' => 'pengumuman'],
        ];
        foreach ($categories as $cat) {
            $cat['created_at'] = $now;
            $cat['updated_at'] = $now;
            $this->db->table('berita_categories')->insert($cat);
        }

        // 6. Berita
        $beritaList = [
            [
                'category_id'  => 1,
                'author_id'    => $adminId,
                'title'        => 'Pemerintah Desa Batu Bingkung Gelar Musyawarah Desa',
                'slug'         => 'pemerintah-desa-batu-bingkung-gelar-musyawarah-desa',
                'excerpt'      => 'Musyawarah desa dihadiri oleh seluruh elemen masyarakat, BPD, tokoh adat, dan pemuda guna menyusun arah RKPDes tahun anggaran berikutnya.',
                'content'      => '<p>Pemerintah Desa Batu Bingkung, Kecamatan Pasimarannu, menggelar Musyawarah Desa (Musdes) dalam rangka penyusunan Rencana Kerja Pemerintah Desa (RKPDes). Musyawarah ini berlangsung khidmat di balai pertemuan kantor desa dengan dihadiri oleh BPD, tokoh masyarakat, kelompok nelayan, dan perwakilan perempuan.</p><p>Musdes menjadi wadah partisipasi terbuka warga untuk menyampaikan aspirasi seputar kebutuhan infrastruktur nelayan, fasilitas posyandu balita dan lansia, serta bantuan peralatan tangkap ramah lingkungan.</p>',
                'thumbnail'    => 'uploads/desa/kantor-desa.webp',
                'status'       => 'published',
                'views'        => 142,
                'published_at' => '2025-09-12 09:00:00',
                'created_at'   => $now,
                'updated_at'   => $now,
            ],
            [
                'category_id'  => 2,
                'author_id'    => $adminId,
                'title'        => 'Peningkatan Infrastruktur Jalan Desa Menuju Dermaga',
                'slug'         => 'peningkatan-infrastruktur-jalan-desa-menuju-dermaga',
                'excerpt'      => 'Rehabilitasi akses jalan desa menuju dermaga nelayan terus dipacu guna memperlancar distribusi hasil tangkapan laut warga.',
                'content'      => '<p>Pemerintah Desa Batu Bingkung merealisasikan program peningkatan dan perkerasan ruas jalan akses utama yang menghubungkan pemukiman warga menuju titik dermaga tambatan perahu nelayan.</p><p>Dengan perbaikan akses jalan ini, diharapkan waktu mobilisasi pengangkutan hasil laut segar maupun hasil perkebunan kelapa dapat berlangsung lebih efisien dan aman bagi seluruh warga pengguna jalan.</p>',
                'thumbnail'    => 'uploads/desa/kantor-desa.webp',
                'status'       => 'published',
                'views'        => 98,
                'published_at' => '2025-09-08 14:30:00',
                'created_at'   => $now,
                'updated_at'   => $now,
            ],
            [
                'category_id'  => 3,
                'author_id'    => $adminId,
                'title'        => 'Kegiatan Posyandu Rutin di Posko Desa Batu Bingkung',
                'slug'         => 'kegiatan-posyandu-rutin-di-posko-desa-batu-bingkung',
                'excerpt'      => 'Pelayanan kesehatan ibu hamil, penimbangan balita, dan pencegahan stunting diselenggarakan terpadu bersama UPTD Puskesmas Pasimarannu.',
                'content'      => '<p>Bekerja sama dengan UPTD Puskesmas Pasimarannu, kader kesehatan Posyandu Desa Batu Bingkung melaksanakan kegiatan pos pelayanan terpadu bulanan. Kegiatan ini meliputi penimbangan berat badan balita, imunisasi dasar, pemeriksaan berkala ibu hamil, serta penyuluhan asupan gizi seimbang untuk pencegahan stunting anak kepulauan.</p>',
                'thumbnail'    => 'uploads/desa/kantor-desa.webp',
                'status'       => 'published',
                'views'        => 176,
                'published_at' => '2025-09-03 08:30:00',
                'created_at'   => $now,
                'updated_at'   => $now,
            ],
        ];
        foreach ($beritaList as $b) {
            $this->db->table('berita')->insert($b);
        }

        // 7. Pengumuman
        $pengumuman = [
            [
                'judul'         => 'Jadwal Layanan Administrasi Kependudukan Terpadu',
                'isi'           => 'Diberitahukan kepada seluruh warga Desa Batu Bingkung bahwa pengurusan berkas administrasi dan surat keterangan desa dibuka setiap hari kerja pukul 08.00 - 15.00 WITA.',
                'file_lampiran' => null,
                'prioritas'     => 'biasa',
                'status'        => 'aktif',
                'tanggal'       => '2025-09-01',
                'created_at'    => $now,
                'updated_at'    => $now,
            ],
            [
                'judul'         => 'Himbauan Kewaspadaan Cuaca Ekstrem Nelayan Pesisir',
                'isi'           => 'Mengingat peralihan musim angin timur di perairan Pasimarannu, seluruh nelayan diharapkan selalu memperhatikan prakiraan cuaca BMKG maritim dan melengkapi alat keselamatan sebelum melaut.',
                'file_lampiran' => null,
                'prioritas'     => 'penting',
                'status'        => 'aktif',
                'tanggal'       => '2025-09-10',
                'created_at'    => $now,
                'updated_at'    => $now,
            ],
        ];
        foreach ($pengumuman as $p) {
            $this->db->table('pengumuman')->insert($p);
        }

        // 8. Galeri Categories
        $galCats = [
            ['name' => 'Pemerintahan', 'slug' => 'pemerintahan'],
            ['name' => 'Kegiatan Desa', 'slug' => 'kegiatan-desa'],
            ['name' => 'Masyarakat', 'slug' => 'masyarakat'],
            ['name' => 'Infrastruktur', 'slug' => 'infrastruktur'],
            ['name' => 'Pariwisata & Alam', 'slug' => 'pariwisata-alam'],
        ];
        foreach ($galCats as $gc) {
            $gc['created_at'] = $now;
            $gc['updated_at'] = $now;
            $this->db->table('galeri_categories')->insert($gc);
        }

        // 9. Galeri items
        $galeri = [
            ['category_id' => 1, 'title' => 'Kantor Desa Batu Bingkung', 'description' => 'Pusat pelayanan masyarakat Desa Batu Bingkung Kec. Pasimarannu.', 'image' => 'uploads/desa/kantor-desa.webp'],
            ['category_id' => 5, 'title' => 'Pesisir Pantai Kepulauan', 'description' => 'Garis pantai jernih nan asri di pesisir Pasimarannu Kepulauan Selayar.', 'image' => 'uploads/desa/kantor-desa.webp'],
            ['category_id' => 5, 'title' => 'Teluk dan Terumbu Karang', 'description' => 'Kawasan perairan kaya terumbu karang dan keanekaragaman hayati.', 'image' => 'uploads/desa/kantor-desa.webp'],
            ['category_id' => 3, 'title' => 'Musyawarah Warga Desa', 'description' => 'Kebersamaan warga bergotong royong dan berembuk membangun desa.', 'image' => 'uploads/desa/kantor-desa.webp'],
            ['category_id' => 5, 'title' => 'Panorama Senja Pasimarannu', 'description' => 'Matahari terbenam di horizon perairan kepulauan Selayar.', 'image' => 'uploads/desa/kantor-desa.webp'],
            ['category_id' => 4, 'title' => 'Akses Jalan Poros Desa', 'description' => 'Jalan utama poros desa yang menghubungkan wilayah pemukiman.', 'image' => 'uploads/desa/kantor-desa.webp'],
        ];
        foreach ($galeri as $g) {
            $g['status'] = 'published';
            $g['created_at'] = $now;
            $g['updated_at'] = $now;
            $this->db->table('galeri')->insert($g);
        }

        // 10. Potensi Desa
        $potensi = [
            [
                'judul'      => 'Potensi Utama: Perikanan & Kelautan',
                'slug'       => 'potensi-perikanan-dan-kelautan',
                'kategori'   => 'Kelautan',
                'deskripsi'  => 'Perairan Pasimarannu merupakan lumbung ikan pelagis, kerapu karang, cumi, dan budidaya rumput laut yang menjadi andalan roda perekonomian keluarga nelayan.',
                'image'      => 'uploads/desa/kantor-desa.webp',
                'status'     => 'published',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'judul'      => 'Mata Pencaharian: Nelayan, Pertanian, UMKM',
                'slug'       => 'mata-pencaharian-warga',
                'kategori'   => 'Ekonomi',
                'deskripsi'  => 'Warga memadukan profesi melaut dengan kebun kelapa kopyor, budidaya mete, serta usaha pengolahan ikan asin dan kerupuk ikan tradisional.',
                'image'      => 'uploads/desa/kantor-desa.webp',
                'status'     => 'published',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'judul'      => 'Kearifan Lokal: Budaya & Tradisi Bahari',
                'slug'       => 'kearifan-lokal-budaya-tradisi',
                'kategori'   => 'Budaya',
                'deskripsi'  => 'Budaya gotong royong dalam penarikan perahu, adat pemeliharaan terumbu karang tradisional, serta perayaan pesta panen laut warga.',
                'image'      => 'uploads/desa/kantor-desa.webp',
                'status'     => 'published',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];
        foreach ($potensi as $pot) {
            $this->db->table('potensi_desa')->insert($pot);
        }

        // 11. Data Penduduk
        $penduduk = [
            ['kategori' => 'Jenis Kelamin', 'label' => 'Laki-laki', 'jumlah' => 1195, 'urutan' => 1],
            ['kategori' => 'Jenis Kelamin', 'label' => 'Perempuan', 'jumlah' => 1153, 'urutan' => 2],
            ['kategori' => 'Pekerjaan', 'label' => 'Nelayan & Pembudidaya', 'jumlah' => 780, 'urutan' => 3],
            ['kategori' => 'Pekerjaan', 'label' => 'Petani / Perkebunan', 'jumlah' => 450, 'urutan' => 4],
            ['kategori' => 'Pekerjaan', 'label' => 'Pedagang / UMKM', 'jumlah' => 190, 'urutan' => 5],
            ['kategori' => 'Pekerjaan', 'label' => 'PNS / TNI / Polri / Guru', 'jumlah' => 45, 'urutan' => 6],
            ['kategori' => 'Pekerjaan', 'label' => 'Lainnya / Pelajar / Ibu RT', 'jumlah' => 883, 'urutan' => 7],
        ];
        foreach ($penduduk as $pend) {
            $pend['created_at'] = $now;
            $pend['updated_at'] = $now;
            $this->db->table('data_penduduk')->insert($pend);
        }

        // 12. Data Statistik
        $statistik = [
            ['key_name' => 'luas_wilayah', 'label' => 'Luas Wilayah', 'value' => '12,5', 'satuan' => 'km²', 'icon' => 'map', 'urutan' => 1],
            ['key_name' => 'jumlah_penduduk', 'label' => 'Jumlah Penduduk', 'value' => '2.348', 'satuan' => 'Jiwa', 'icon' => 'users', 'urutan' => 2],
            ['key_name' => 'jumlah_kk', 'label' => 'Jumlah KK', 'value' => '712', 'satuan' => 'KK', 'icon' => 'home', 'urutan' => 3],
            ['key_name' => 'jumlah_dusun', 'label' => 'Jumlah Dusun', 'value' => '2', 'satuan' => 'Dusun', 'icon' => 'map-pin', 'urutan' => 4],
        ];
        foreach ($statistik as $st) {
            $st['created_at'] = $now;
            $st['updated_at'] = $now;
            $this->db->table('data_statistik')->insert($st);
        }

        // 13. Layanan
        $layanan = [
            [
                'nama_layanan'    => 'Surat Keterangan Domisili',
                'slug'            => 'surat-keterangan-domisili',
                'deskripsi'       => 'Surat keterangan resmi yang menerangkan bahwa warga berdomisili sah di wilayah Desa Batu Bingkung.',
                'persyaratan'     => "- Fotokopi KTP\n- Fotokopi Kartu Keluarga\n- Surat Pengantar RT/RW setempat",
                'estimasi_waktu'  => '1 Hari Kerja',
                'biaya'           => 'Gratis',
                'penanggung_jawab'=> 'Kasi Pemerintahan',
                'icon'            => 'file-text',
                'urutan'          => 1,
            ],
            [
                'nama_layanan'    => 'Surat Keterangan Usaha',
                'slug'            => 'surat-keterangan-usaha',
                'deskripsi'       => 'Surat keterangan kepemilikan usaha atau kegiatan perikanan/dagang di wilayah desa guna pengajuan permodalan atau legalitas.',
                'persyaratan'     => "- Fotokopi KTP Pemohon\n- Fotokopi KK\n- Foto dokumentasi usaha atau perahu\n- Surat Pengantar RT/RW",
                'estimasi_waktu'  => '1 Hari Kerja',
                'biaya'           => 'Gratis',
                'penanggung_jawab'=> 'Kasi Kesejahteraan & Pelayanan',
                'icon'            => 'briefcase',
                'urutan'          => 2,
            ],
            [
                'nama_layanan'    => 'Surat Pengantar KTP',
                'slug'            => 'surat-pengantar-ktp',
                'deskripsi'       => 'Surat pengantar desa untuk penerbitan KTP elektronik baru, pergantian KTP rusak/hilang ke kantor Disdukcapil/Kecamatan.',
                'persyaratan'     => "- Fotokopi Kartu Keluarga terbaru\n- Pas foto formal 3x4 (2 lembar)\n- KTP lama jika rusak / Surat kehilangan polisi jika hilang",
                'estimasi_waktu'  => '1 Hari Kerja',
                'biaya'           => 'Gratis',
                'penanggung_jawab'=> 'Kasi Pelayanan',
                'icon'            => 'credit-card',
                'urutan'          => 3,
            ],
            [
                'nama_layanan'    => 'Surat Keterangan Tidak Mampu',
                'slug'            => 'surat-keterangan-tidak-mampu',
                'deskripsi'       => 'Surat keterangan ekonomi tidak mampu untuk keperluan beasiswa pendidikan, keringanan biaya berobat, atau bansos.',
                'persyaratan'     => "- Fotokopi KTP dan KK\n- Surat pengantar RT/RW yang menerangkan kondisi riil keluarga\n- Keterangan peruntukan (sekolah/rumah sakit)",
                'estimasi_waktu'  => '1 Hari Kerja',
                'biaya'           => 'Gratis',
                'penanggung_jawab'=> 'Kasi Kesejahteraan & Pelayanan',
                'icon'            => 'heart-handshake',
                'urutan'          => 4,
            ],
            [
                'nama_layanan'    => 'Surat Keterangan Kelahiran',
                'slug'            => 'surat-keterangan-kelahiran',
                'deskripsi'       => 'Surat keterangan kelahiran untuk keperluan pembuatan akta kelahiran anak di Disdukcapil.',
                'persyaratan'     => "- Surat keterangan lahir dari bidan/puskesmas\n- Fotokopi KTP kedua orang tua\n- Fotokopi KK\n- Fotokopi Buku Nikah orang tua",
                'estimasi_waktu'  => '1 Hari Kerja',
                'biaya'           => 'Gratis',
                'penanggung_jawab'=> 'Kasi Pelayanan',
                'icon'            => 'baby',
                'urutan'          => 5,
            ],
            [
                'nama_layanan'    => 'Surat Pengantar SKCK',
                'slug'            => 'surat-pengantar-skck',
                'deskripsi'       => 'Surat pengantar desa untuk pengurusan Surat Keterangan Catatan Kepolisian di Polsek Pasimarannu.',
                'persyaratan'     => "- Fotokopi KTP dan KK\n- Pas foto 4x6 latar merah (3 lembar)\n- Surat rekomendasi RT/RW",
                'estimasi_waktu'  => '1 Hari Kerja',
                'biaya'           => 'Gratis',
                'penanggung_jawab'=> 'Kasi Pemerintahan',
                'icon'            => 'shield-check',
                'urutan'          => 6,
            ],
        ];

        foreach ($layanan as $l) {
            $l['status'] = 'aktif';
            $l['created_at'] = $now;
            $l['updated_at'] = $now;
            $this->db->table('layanan')->insert($l);
            $layananId = $this->db->insertID();

            // Persyaratan itemized
            $this->db->table('persyaratan_layanan')->insert([
                'layanan_id'       => $layananId,
                'nama_persyaratan' => 'Fotokopi Kartu Tanda Penduduk (KTP)',
                'keterangan'       => 'KTP yang masih berlaku',
                'wajib'            => 1,
                'created_at'       => $now,
                'updated_at'       => $now,
            ]);
            $this->db->table('persyaratan_layanan')->insert([
                'layanan_id'       => $layananId,
                'nama_persyaratan' => 'Fotokopi Kartu Keluarga (KK)',
                'keterangan'       => 'KK tercatat di Desa Batu Bingkung',
                'wajib'            => 1,
                'created_at'       => $now,
                'updated_at'       => $now,
            ]);
        }

        // 17. Pengaturan
        $settings = [
            ['key_name' => 'site_title', 'val' => 'Website Profil Desa Batu Bingkung'],
            ['key_name' => 'meta_description', 'val' => 'Website Resmi Desa Batu Bingkung, Kecamatan Pasimarannu, Kabupaten Kepulauan Selayar, Sulawesi Selatan.'],
            ['key_name' => 'facebook_url', 'val' => 'https://facebook.com'],
            ['key_name' => 'instagram_url', 'val' => 'https://instagram.com'],
            ['key_name' => 'youtube_url', 'val' => 'https://youtube.com'],
        ];
        foreach ($settings as $s) {
            $s['created_at'] = $now;
            $s['updated_at'] = $now;
            $this->db->table('pengaturan')->insert($s);
        }
    }
}
