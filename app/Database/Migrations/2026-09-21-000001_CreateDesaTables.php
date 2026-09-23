<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDesaTables extends Migration
{
    public function up()
    {
        // 1. users
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'name' => ['type' => 'VARCHAR', 'constraint' => 100],
            'username' => ['type' => 'VARCHAR', 'constraint' => 50, 'unique' => true],
            'email' => ['type' => 'VARCHAR', 'constraint' => 100, 'unique' => true],
            'password_hash' => ['type' => 'VARCHAR', 'constraint' => 255],
            'role' => ['type' => 'ENUM', 'constraint' => ['superadmin', 'admin'], 'default' => 'admin'],
            'status' => ['type' => 'ENUM', 'constraint' => ['active', 'inactive'], 'default' => 'active'],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('users', true);

        // 2. desa
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'nama_desa' => ['type' => 'VARCHAR', 'constraint' => 150, 'default' => 'Desa Batu Bingkung'],
            'kecamatan' => ['type' => 'VARCHAR', 'constraint' => 150, 'default' => 'Kecamatan Pasimarannu'],
            'kabupaten' => ['type' => 'VARCHAR', 'constraint' => 150, 'default' => 'Kabupaten Kepulauan Selayar'],
            'provinsi' => ['type' => 'VARCHAR', 'constraint' => 150, 'default' => 'Sulawesi Selatan'],
            'kode_pos' => ['type' => 'VARCHAR', 'constraint' => 10, 'default' => '92861'],
            'slogan' => ['type' => 'VARCHAR', 'constraint' => 255, 'default' => 'Bersama membangun desa yang maju, mandiri dan sejahtera untuk masa depan yang lebih baik.'],
            'motto' => ['type' => 'VARCHAR', 'constraint' => 255, 'default' => 'Bersatu, Maju, Sejahtera'],
            'deskripsi' => ['type' => 'TEXT', 'null' => true],
            'luas_wilayah' => ['type' => 'VARCHAR', 'constraint' => 50, 'default' => '12,5 km²'],
            'jumlah_penduduk' => ['type' => 'INT', 'constraint' => 11, 'default' => 2348],
            'jumlah_kk' => ['type' => 'INT', 'constraint' => 11, 'default' => 712],
            'email' => ['type' => 'VARCHAR', 'constraint' => 100, 'default' => 'desa.batubingkung@selayarkab.go.id'],
            'telepon' => ['type' => 'VARCHAR', 'constraint' => 50, 'default' => '0821-xxxx-xxxx'],
            'whatsapp' => ['type' => 'VARCHAR', 'constraint' => 50, 'default' => '0821-xxxx-xxxx'],
            'alamat' => ['type' => 'TEXT', 'null' => true],
            'jam_pelayanan' => ['type' => 'VARCHAR', 'constraint' => 150, 'default' => 'Senin - Jumat: 08.00 - 15.00 WITA'],
            'koordinat_lat' => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true],
            'koordinat_lng' => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true],
            'logo' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'hero_image' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('desa', true);

        // 3. profil_desa
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'sejarah' => ['type' => 'TEXT', 'null' => true],
            'visi' => ['type' => 'TEXT', 'null' => true],
            'misi' => ['type' => 'TEXT', 'null' => true],
            'geografis' => ['type' => 'TEXT', 'null' => true],
            'demografis' => ['type' => 'TEXT', 'null' => true],
            'batas_utara' => ['type' => 'VARCHAR', 'constraint' => 150, 'null' => true],
            'batas_selatan' => ['type' => 'VARCHAR', 'constraint' => 150, 'null' => true],
            'batas_timur' => ['type' => 'VARCHAR', 'constraint' => 150, 'null' => true],
            'batas_barat' => ['type' => 'VARCHAR', 'constraint' => 150, 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('profil_desa', true);

        // 4. pemerintahan
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'nama' => ['type' => 'VARCHAR', 'constraint' => 150],
            'jabatan' => ['type' => 'VARCHAR', 'constraint' => 150],
            'nip' => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true],
            'urutan' => ['type' => 'INT', 'constraint' => 11, 'default' => 0],
            'foto' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'deskripsi' => ['type' => 'TEXT', 'null' => true],
            'status' => ['type' => 'ENUM', 'constraint' => ['aktif', 'tidak_aktif'], 'default' => 'aktif'],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('pemerintahan', true);

        // 5. berita_categories
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'name' => ['type' => 'VARCHAR', 'constraint' => 100],
            'slug' => ['type' => 'VARCHAR', 'constraint' => 120, 'unique' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('berita_categories', true);

        // 6. berita
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'category_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'author_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'title' => ['type' => 'VARCHAR', 'constraint' => 255],
            'slug' => ['type' => 'VARCHAR', 'constraint' => 255, 'unique' => true],
            'excerpt' => ['type' => 'TEXT', 'null' => true],
            'content' => ['type' => 'LONGTEXT'],
            'thumbnail' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'status' => ['type' => 'ENUM', 'constraint' => ['draft', 'published', 'archived'], 'default' => 'published'],
            'views' => ['type' => 'INT', 'constraint' => 11, 'default' => 0],
            'published_at' => ['type' => 'DATETIME', 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey('status');
        $this->forge->addKey('category_id');
        $this->forge->addForeignKey('category_id', 'berita_categories', 'id', 'CASCADE', 'RESTRICT');
        $this->forge->addForeignKey('author_id', 'users', 'id', 'CASCADE', 'RESTRICT');
        $this->forge->createTable('berita', true);

        // 7. pengumuman
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'judul' => ['type' => 'VARCHAR', 'constraint' => 255],
            'isi' => ['type' => 'TEXT'],
            'file_lampiran' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'prioritas' => ['type' => 'ENUM', 'constraint' => ['biasa', 'penting', 'mendesak'], 'default' => 'biasa'],
            'status' => ['type' => 'ENUM', 'constraint' => ['aktif', 'nonaktif'], 'default' => 'aktif'],
            'tanggal' => ['type' => 'DATE'],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('pengumuman', true);

        // 8. galeri_categories
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'name' => ['type' => 'VARCHAR', 'constraint' => 100],
            'slug' => ['type' => 'VARCHAR', 'constraint' => 120, 'unique' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('galeri_categories', true);

        // 9. galeri
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'category_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'title' => ['type' => 'VARCHAR', 'constraint' => 255],
            'description' => ['type' => 'TEXT', 'null' => true],
            'image' => ['type' => 'VARCHAR', 'constraint' => 255],
            'status' => ['type' => 'ENUM', 'constraint' => ['published', 'draft'], 'default' => 'published'],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey('category_id');
        $this->forge->addForeignKey('category_id', 'galeri_categories', 'id', 'CASCADE', 'RESTRICT');
        $this->forge->createTable('galeri', true);

        // 10. potensi_desa
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'judul' => ['type' => 'VARCHAR', 'constraint' => 255],
            'slug' => ['type' => 'VARCHAR', 'constraint' => 255, 'unique' => true],
            'kategori' => ['type' => 'VARCHAR', 'constraint' => 100],
            'deskripsi' => ['type' => 'TEXT'],
            'image' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'status' => ['type' => 'ENUM', 'constraint' => ['published', 'draft'], 'default' => 'published'],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('potensi_desa', true);

        // 11. data_penduduk
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'kategori' => ['type' => 'VARCHAR', 'constraint' => 100],
            'label' => ['type' => 'VARCHAR', 'constraint' => 150],
            'jumlah' => ['type' => 'INT', 'constraint' => 11, 'default' => 0],
            'keterangan' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'urutan' => ['type' => 'INT', 'constraint' => 11, 'default' => 0],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('data_penduduk', true);

        // 12. data_statistik
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'key_name' => ['type' => 'VARCHAR', 'constraint' => 100, 'unique' => true],
            'label' => ['type' => 'VARCHAR', 'constraint' => 150],
            'value' => ['type' => 'VARCHAR', 'constraint' => 100],
            'satuan' => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true],
            'icon' => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true],
            'urutan' => ['type' => 'INT', 'constraint' => 11, 'default' => 0],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('data_statistik', true);

        // 13. layanan
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'nama_layanan' => ['type' => 'VARCHAR', 'constraint' => 255],
            'slug' => ['type' => 'VARCHAR', 'constraint' => 255, 'unique' => true],
            'deskripsi' => ['type' => 'TEXT', 'null' => true],
            'persyaratan' => ['type' => 'TEXT', 'null' => true],
            'estimasi_waktu' => ['type' => 'VARCHAR', 'constraint' => 100, 'default' => '1 - 2 Hari Kerja'],
            'biaya' => ['type' => 'VARCHAR', 'constraint' => 100, 'default' => 'Gratis'],
            'penanggung_jawab' => ['type' => 'VARCHAR', 'constraint' => 150, 'default' => 'Kasi Pelayanan'],
            'icon' => ['type' => 'VARCHAR', 'constraint' => 50, 'default' => 'file-text'],
            'status' => ['type' => 'ENUM', 'constraint' => ['aktif', 'nonaktif'], 'default' => 'aktif'],
            'urutan' => ['type' => 'INT', 'constraint' => 11, 'default' => 0],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('layanan', true);

        // 14. persyaratan_layanan
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'layanan_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'nama_persyaratan' => ['type' => 'VARCHAR', 'constraint' => 255],
            'keterangan' => ['type' => 'TEXT', 'null' => true],
            'wajib' => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 1],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('layanan_id', 'layanan', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('persyaratan_layanan', true);

        // 15. pengajuan_layanan
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'nomor_tiket' => ['type' => 'VARCHAR', 'constraint' => 50, 'unique' => true],
            'layanan_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'nama_pemohon' => ['type' => 'VARCHAR', 'constraint' => 150],
            'nik' => ['type' => 'VARCHAR', 'constraint' => 50],
            'no_hp' => ['type' => 'VARCHAR', 'constraint' => 50],
            'email' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'alamat' => ['type' => 'TEXT'],
            'catatan' => ['type' => 'TEXT', 'null' => true],
            'berkas' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'status' => ['type' => 'ENUM', 'constraint' => ['diajukan', 'diperiksa', 'diproses', 'disetujui', 'ditolak', 'selesai'], 'default' => 'diajukan'],
            'tanggapan_admin' => ['type' => 'TEXT', 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey('status');
        $this->forge->addForeignKey('layanan_id', 'layanan', 'id', 'CASCADE', 'RESTRICT');
        $this->forge->createTable('pengajuan_layanan', true);

        // 16. kontak
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'nama' => ['type' => 'VARCHAR', 'constraint' => 150],
            'email' => ['type' => 'VARCHAR', 'constraint' => 100],
            'no_hp' => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true],
            'subjek' => ['type' => 'VARCHAR', 'constraint' => 255],
            'pesan' => ['type' => 'TEXT'],
            'status' => ['type' => 'ENUM', 'constraint' => ['belum_dibaca', 'dibaca', 'dibalas'], 'default' => 'belum_dibaca'],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('kontak', true);

        // 17. pengaturan
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'key_name' => ['type' => 'VARCHAR', 'constraint' => 100, 'unique' => true],
            'val' => ['type' => 'TEXT', 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('pengaturan', true);
    }

    public function down()
    {
        $this->forge->dropTable('pengaturan', true);
        $this->forge->dropTable('kontak', true);
        $this->forge->dropTable('pengajuan_layanan', true);
        $this->forge->dropTable('persyaratan_layanan', true);
        $this->forge->dropTable('layanan', true);
        $this->forge->dropTable('data_statistik', true);
        $this->forge->dropTable('data_penduduk', true);
        $this->forge->dropTable('potensi_desa', true);
        $this->forge->dropTable('galeri', true);
        $this->forge->dropTable('galeri_categories', true);
        $this->forge->dropTable('pengumuman', true);
        $this->forge->dropTable('berita', true);
        $this->forge->dropTable('berita_categories', true);
        $this->forge->dropTable('pemerintahan', true);
        $this->forge->dropTable('profil_desa', true);
        $this->forge->dropTable('desa', true);
        $this->forge->dropTable('users', true);
    }
}
