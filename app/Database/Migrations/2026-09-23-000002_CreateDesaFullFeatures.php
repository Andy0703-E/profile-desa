<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDesaFullFeatures extends Migration
{
    public function up()
    {
        // 1. apbdes
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'tahun' => ['type' => 'INT', 'constraint' => 4],
            'judul' => ['type' => 'VARCHAR', 'constraint' => 255],
            'jenis' => ['type' => 'ENUM', 'constraint' => ['murni', 'perubahan'], 'default' => 'murni'],
            'total_pendapatan' => ['type' => 'BIGINT', 'default' => 0],
            'realisasi_pendapatan' => ['type' => 'BIGINT', 'default' => 0],
            'total_belanja' => ['type' => 'BIGINT', 'default' => 0],
            'realisasi_belanja' => ['type' => 'BIGINT', 'default' => 0],
            'total_pembiayaan' => ['type' => 'BIGINT', 'default' => 0],
            'realisasi_pembiayaan' => ['type' => 'BIGINT', 'default' => 0],
            'file_pdf' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'status' => ['type' => 'ENUM', 'constraint' => ['draft', 'final'], 'default' => 'final'],
            'keterangan' => ['type' => 'TEXT', 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('apbdes', true);

        // 2. apbdes_rincian
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'apbdes_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'tipe' => ['type' => 'ENUM', 'constraint' => ['pendapatan', 'belanja', 'pembiayaan']],
            'kode_rekening' => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true],
            'uraian' => ['type' => 'VARCHAR', 'constraint' => 255],
            'anggaran' => ['type' => 'BIGINT', 'default' => 0],
            'realisasi' => ['type' => 'BIGINT', 'default' => 0],
            'persentase' => ['type' => 'DECIMAL', 'constraint' => '5,2', 'default' => 0.00],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('apbdes_id', 'apbdes', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('apbdes_rincian', true);

        // 3. peta_titik
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'nama' => ['type' => 'VARCHAR', 'constraint' => 255],
            'kategori' => ['type' => 'VARCHAR', 'constraint' => 100],
            'lat' => ['type' => 'DECIMAL', 'constraint' => '11,7'],
            'lng' => ['type' => 'DECIMAL', 'constraint' => '11,7'],
            'alamat' => ['type' => 'TEXT', 'null' => true],
            'deskripsi' => ['type' => 'TEXT', 'null' => true],
            'foto' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'kontak' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('peta_titik', true);

        // 4. umkm
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'nama_usaha' => ['type' => 'VARCHAR', 'constraint' => 255],
            'nama_pemilik' => ['type' => 'VARCHAR', 'constraint' => 150],
            'kategori' => ['type' => 'VARCHAR', 'constraint' => 100],
            'deskripsi' => ['type' => 'TEXT', 'null' => true],
            'harga' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'whatsapp' => ['type' => 'VARCHAR', 'constraint' => 50],
            'alamat' => ['type' => 'TEXT', 'null' => true],
            'dusun' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'foto' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'is_unggulan' => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 0],
            'is_bumdes' => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 0],
            'status' => ['type' => 'ENUM', 'constraint' => ['aktif', 'nonaktif'], 'default' => 'aktif'],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('umkm', true);

        // 5. wisata
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'nama' => ['type' => 'VARCHAR', 'constraint' => 255],
            'slug' => ['type' => 'VARCHAR', 'constraint' => 255, 'unique' => true],
            'kategori' => ['type' => 'VARCHAR', 'constraint' => 100],
            'deskripsi' => ['type' => 'TEXT', 'null' => true],
            'daya_tarik' => ['type' => 'TEXT', 'null' => true],
            'harga_tiket' => ['type' => 'VARCHAR', 'constraint' => 100, 'default' => 'Gratis'],
            'jam_buka' => ['type' => 'VARCHAR', 'constraint' => 100, 'default' => '06.00 - 18.00 WITA'],
            'fasilitas' => ['type' => 'TEXT', 'null' => true],
            'kontak_pengelola' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'lokasi' => ['type' => 'TEXT', 'null' => true],
            'lat' => ['type' => 'DECIMAL', 'constraint' => '11,7', 'null' => true],
            'lng' => ['type' => 'DECIMAL', 'constraint' => '11,7', 'null' => true],
            'maps_url' => ['type' => 'TEXT', 'null' => true],
            'foto' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'status' => ['type' => 'ENUM', 'constraint' => ['aktif', 'nonaktif'], 'default' => 'aktif'],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('wisata', true);

        // 6. pembangunan
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'nama_kegiatan' => ['type' => 'VARCHAR', 'constraint' => 255],
            'slug' => ['type' => 'VARCHAR', 'constraint' => 255, 'unique' => true],
            'bidang' => ['type' => 'VARCHAR', 'constraint' => 150],
            'lokasi' => ['type' => 'VARCHAR', 'constraint' => 255],
            'dusun' => ['type' => 'VARCHAR', 'constraint' => 100],
            'anggaran' => ['type' => 'BIGINT', 'default' => 0],
            'sumber_dana' => ['type' => 'VARCHAR', 'constraint' => 100, 'default' => 'Dana Desa (DDS)'],
            'tahun' => ['type' => 'INT', 'constraint' => 4],
            'status' => ['type' => 'ENUM', 'constraint' => ['direncanakan', 'berjalan', 'selesai'], 'default' => 'berjalan'],
            'progres' => ['type' => 'INT', 'constraint' => 3, 'default' => 0],
            'foto_sebelum' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'foto_sesudah' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'lat' => ['type' => 'DECIMAL', 'constraint' => '11,7', 'null' => true],
            'lng' => ['type' => 'DECIMAL', 'constraint' => '11,7', 'null' => true],
            'pelaksana' => ['type' => 'VARCHAR', 'constraint' => 150, 'null' => true],
            'volume' => ['type' => 'VARCHAR', 'constraint' => 150, 'null' => true],
            'manfaat' => ['type' => 'TEXT', 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('pembangunan', true);

        // 7. dokumen_publik
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'judul' => ['type' => 'VARCHAR', 'constraint' => 255],
            'nomor_dokumen' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'kategori' => ['type' => 'VARCHAR', 'constraint' => 100],
            'tahun' => ['type' => 'INT', 'constraint' => 4],
            'deskripsi' => ['type' => 'TEXT', 'null' => true],
            'file_url' => ['type' => 'VARCHAR', 'constraint' => 255],
            'ukuran_file' => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true],
            'total_download' => ['type' => 'INT', 'constraint' => 11, 'default' => 0],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('dokumen_publik', true);

        // 8. pengaduan
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'kode_tiket' => ['type' => 'VARCHAR', 'constraint' => 50, 'unique' => true],
            'nama_pelapor' => ['type' => 'VARCHAR', 'constraint' => 150],
            'nik' => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true],
            'no_hp' => ['type' => 'VARCHAR', 'constraint' => 50],
            'dusun' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'judul' => ['type' => 'VARCHAR', 'constraint' => 255],
            'kategori' => ['type' => 'VARCHAR', 'constraint' => 100],
            'isi_aduan' => ['type' => 'TEXT'],
            'foto_bukti' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'status' => ['type' => 'ENUM', 'constraint' => ['diajukan', 'diverifikasi', 'diproses', 'selesai', 'ditolak'], 'default' => 'diajukan'],
            'tanggapan' => ['type' => 'TEXT', 'null' => true],
            'tanggal_tanggapan' => ['type' => 'DATETIME', 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('pengaduan', true);

        // 9. agenda
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'judul' => ['type' => 'VARCHAR', 'constraint' => 255],
            'slug' => ['type' => 'VARCHAR', 'constraint' => 255, 'unique' => true],
            'kategori' => ['type' => 'VARCHAR', 'constraint' => 100],
            'tanggal_mulai' => ['type' => 'DATE'],
            'tanggal_selesai' => ['type' => 'DATE', 'null' => true],
            'jam_mulai' => ['type' => 'VARCHAR', 'constraint' => 20, 'null' => true],
            'jam_selesai' => ['type' => 'VARCHAR', 'constraint' => 20, 'null' => true],
            'lokasi' => ['type' => 'VARCHAR', 'constraint' => 255],
            'penyelenggara' => ['type' => 'VARCHAR', 'constraint' => 150],
            'deskripsi' => ['type' => 'TEXT', 'null' => true],
            'status' => ['type' => 'ENUM', 'constraint' => ['akan_datang', 'berlangsung', 'selesai', 'dibatalkan'], 'default' => 'akan_datang'],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('agenda', true);

        // 10. dusun
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'nama_dusun' => ['type' => 'VARCHAR', 'constraint' => 150],
            'kepala_dusun' => ['type' => 'VARCHAR', 'constraint' => 150],
            'jumlah_rt' => ['type' => 'INT', 'constraint' => 11, 'default' => 0],
            'jumlah_rw' => ['type' => 'INT', 'constraint' => 11, 'default' => 0],
            'jumlah_kk' => ['type' => 'INT', 'constraint' => 11, 'default' => 0],
            'jumlah_jiwa' => ['type' => 'INT', 'constraint' => 11, 'default' => 0],
            'batas_wilayah' => ['type' => 'TEXT', 'null' => true],
            'deskripsi' => ['type' => 'TEXT', 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('dusun', true);

        // 11. program_unggulan
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'judul' => ['type' => 'VARCHAR', 'constraint' => 255],
            'ringkasan' => ['type' => 'TEXT'],
            'deskripsi' => ['type' => 'TEXT', 'null' => true],
            'icon' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'foto' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'status' => ['type' => 'ENUM', 'constraint' => ['aktif', 'nonaktif'], 'default' => 'aktif'],
            'urutan' => ['type' => 'INT', 'constraint' => 11, 'default' => 0],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('program_unggulan', true);

        // 12. galeri_video
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'judul' => ['type' => 'VARCHAR', 'constraint' => 255],
            'embed_url' => ['type' => 'VARCHAR', 'constraint' => 255],
            'durasi' => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true],
            'tanggal' => ['type' => 'DATE', 'null' => true],
            'keterangan' => ['type' => 'TEXT', 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('galeri_video', true);
    }

    public function down()
    {
        $this->forge->dropTable('galeri_video', true);
        $this->forge->dropTable('program_unggulan', true);
        $this->forge->dropTable('dusun', true);
        $this->forge->dropTable('agenda', true);
        $this->forge->dropTable('pengaduan', true);
        $this->forge->dropTable('dokumen_publik', true);
        $this->forge->dropTable('pembangunan', true);
        $this->forge->dropTable('wisata', true);
        $this->forge->dropTable('umkm', true);
        $this->forge->dropTable('peta_titik', true);
        $this->forge->dropTable('apbdes_rincian', true);
        $this->forge->dropTable('apbdes', true);
    }
}
