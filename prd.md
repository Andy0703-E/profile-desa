# MASTER PRD
# WEBSITE PROFIL DESA BATU BINGKUNG

Version: 1.0.0
Status: Development Specification
Project Type: Website Profil Desa + CMS Administrasi
Framework: CodeIgniter 4
Database: MySQL
Primary Language: Bahasa Indonesia

---

# 1. INFORMASI PROYEK

## 1.1 Nama Proyek

Website Profil Desa Batu Bingkung

## 1.2 Entitas

Desa Batu Bingkung

Kecamatan Pasimarannu
Kabupaten Kepulauan Selayar
Provinsi Sulawesi Selatan

## 1.3 Tujuan Utama

Membangun website resmi Desa Batu Bingkung yang berfungsi sebagai:

1. Media informasi resmi desa.
2. Media publikasi kegiatan desa.
3. Media informasi pemerintahan desa.
4. Media publikasi data dan potensi desa.
5. Media informasi layanan publik desa.
6. Media dokumentasi kegiatan desa.
7. Media komunikasi antara pemerintah desa dan masyarakat.
8. CMS yang memungkinkan admin mengelola konten tanpa mengubah kode program.

Website harus memiliki tampilan modern, bersih, profesional, responsif, dan mencerminkan identitas desa pesisir Kepulauan Selayar.

---

# 2. REFERENSI DESAIN

Desain utama menggunakan gambar referensi yang diberikan oleh pemilik proyek.

Karakter visual yang harus dipertahankan:

- Modern
- Natural
- Bersih
- Profesional
- Ramah masyarakat
- Dominan hijau
- Aksen kuning
- Background putih/cream
- Rounded card
- Soft shadow
- Foto desa dan lingkungan sebagai elemen visual utama
- Layout dashboard-style modern
- Tidak terlihat seperti template pemerintahan lama

Referensi visual bukan untuk disalin secara pixel-perfect.

Yang digunakan sebagai referensi:

- Struktur layout
- Komposisi
- Warna
- Hierarki visual
- Bentuk card
- Hero section
- Navbar
- Sidebar informasi
- Quick access
- Berita
- Galeri
- Footer

Jangan menggunakan gambar referensi sebagai foto asli website.

---

# 3. TUJUAN PENGGUNA

## 3.1 Masyarakat Desa

Masyarakat dapat:

- Melihat profil desa.
- Melihat informasi pemerintahan.
- Melihat berita.
- Melihat pengumuman.
- Melihat data desa.
- Melihat potensi desa.
- Melihat layanan publik.
- Melihat persyaratan layanan.
- Mengajukan layanan jika fitur pengajuan diaktifkan.
- Melihat galeri.
- Melihat lokasi desa.
- Menghubungi pemerintah desa.

## 3.2 Pengunjung Umum

Pengunjung dapat:

- Mengenal Desa Batu Bingkung.
- Melihat informasi wilayah.
- Melihat potensi desa.
- Melihat berita dan kegiatan.
- Melihat dokumentasi.
- Mendapatkan informasi kontak.

## 3.3 Admin Desa

Admin dapat:

- Login.
- Mengelola profil desa.
- Mengelola informasi pemerintahan.
- Mengelola perangkat desa.
- Mengelola berita.
- Mengelola kategori berita.
- Mengelola galeri.
- Mengelola kategori galeri.
- Mengelola potensi desa.
- Mengelola layanan.
- Mengelola persyaratan layanan.
- Mengelola pengajuan layanan.
- Mengelola data statistik.
- Mengelola informasi kontak.
- Mengelola pengaturan website.
- Mengelola user admin.

---

# 4. SCOPE SISTEM

Sistem terdiri dari dua bagian utama:

## PUBLIC WEBSITE

Website yang dapat diakses masyarakat.

## ADMIN PANEL

Panel backend untuk mengelola seluruh konten website.

---

# 5. STRUKTUR PUBLIC WEBSITE

## 5.1 Beranda

URL:

/

Isi:

1. Navbar
2. Hero section
3. Informasi singkat desa
4. Quick access
5. Berita terbaru
6. Pengumuman
7. Tentang desa
8. Potensi desa
9. Galeri
10. Layanan cepat
11. CTA
12. Footer

---

# 6. NAVBAR

Navbar harus berisi:

- Logo desa
- Nama Desa Batu Bingkung
- Kecamatan Pasimarannu
- Kabupaten Kepulauan Selayar

Menu:

- Beranda
- Profil Desa
- Pemerintahan
- Layanan
- Data Desa
- Berita
- Galeri
- Kontak

Action:

- Search
- Login / Masuk

Navbar:

- Sticky
- Responsive
- Desktop navigation
- Mobile hamburger navigation

Pada mobile jangan memaksakan semua menu horizontal.

---

# 7. HERO SECTION

Hero harus menjadi bagian paling dominan pada halaman beranda.

Konten:

Heading:

"Selamat Datang di"

Judul:

"Desa Batu Bingkung"

Deskripsi:

"Bersama membangun desa yang maju, mandiri dan sejahtera untuk masa depan yang lebih baik."

CTA:

"Profil Desa"

"Jelajahi Desa"

Hero image menggunakan foto asli Desa Batu Bingkung jika tersedia.

Hero harus memiliki:

- Rounded corners
- Soft overlay jika diperlukan
- Responsive image
- Gradient/background natural
- Decorative green/yellow shapes
- Tidak berlebihan

---

# 8. INFORMASI DESA

Card informasi desa ditampilkan di area hero atau tepat setelah hero.

Informasi:

- Nama desa
- Kecamatan
- Kabupaten
- Luas wilayah
- Jumlah penduduk
- Jumlah KK

Data harus berasal dari database.

Jangan hard-code angka statistik yang seharusnya dinamis.

---

# 9. QUICK ACCESS

Beranda menyediakan akses cepat:

1. Profil Desa
2. Pemerintahan
3. Layanan Publik
4. Data Desa
5. Berita & Pengumuman
6. Galeri

Setiap item menggunakan icon.

Card:

- Rounded
- Border halus
- Shadow ringan
- Hover animation
- Icon green
- CTA arrow

---

# 10. PROFIL DESA

URL:

/profil

Submenu:

/profil/sejarah
/profil/visi-misi
/profil/geografis
/profil/demografis
/profil/potensi

Informasi:

- Sejarah desa
- Visi
- Misi
- Kondisi geografis
- Luas wilayah
- Batas wilayah
- Kondisi demografis
- Potensi desa

---

# 11. PEMERINTAHAN

URL:

/pemerintahan

Informasi:

- Kepala Desa
- Sekretaris Desa
- Perangkat Desa
- Kepala Dusun
- BPD

Setiap perangkat dapat memiliki:

- Foto
- Nama
- Jabatan
- Deskripsi singkat

Jangan membuat nama pejabat fiktif sebagai data produksi.

Gunakan placeholder hanya selama development.

---

# 12. DATA DESA

URL:

/data-desa

Data dapat mencakup:

- Jumlah penduduk
- Jumlah KK
- Jenis kelamin
- Kelompok umur
- Pendidikan
- Pekerjaan
- Data wilayah
- Statistik lainnya

Gunakan visualisasi sederhana jika diperlukan:

- Card statistik
- Bar chart
- Pie/donut chart

Data harus mudah diperbarui dari admin.

---

# 13. POTENSI DESA

URL:

/potensi

Kategori:

- Perikanan
- Kelautan
- Pertanian
- UMKM
- Pariwisata
- Budaya
- Kerajinan
- Potensi lainnya

Setiap potensi:

- Judul
- Slug
- Foto
- Deskripsi
- Kategori
- Status publikasi

---

# 14. LAYANAN PUBLIK

URL:

/layanan

Contoh layanan:

- Surat Keterangan Domisili
- Surat Keterangan Usaha
- Surat Pengantar KTP
- Surat Keterangan Tidak Mampu
- Surat Keterangan lainnya

Setiap layanan mempunyai:

- Nama layanan
- Deskripsi
- Persyaratan
- Estimasi proses
- Informasi tambahan
- Status aktif/nonaktif

---

# 15. PENGAJUAN LAYANAN

Jika modul pengajuan diaktifkan:

Flow:

Masyarakat
↓
Pilih layanan
↓
Melihat persyaratan
↓
Mengisi formulir
↓
Mengirim pengajuan
↓
Admin menerima
↓
Admin memeriksa
↓
Diproses
↓
Disetujui / Ditolak
↓
Selesai

Status resmi sistem:

- diajukan
- diperiksa
- diproses
- disetujui
- ditolak
- selesai

Jangan menggunakan istilah status lain tanpa alasan teknis.

---

# 16. BERITA

URL:

/berita

Fitur:

- Daftar berita
- Detail berita
- Kategori
- Pencarian
- Pagination
- Berita terbaru
- Berita populer jika diperlukan

Field:

- id
- category_id
- title
- slug
- excerpt
- content
- thumbnail
- author_id
- status
- published_at
- created_at
- updated_at

Status:

- draft
- published
- archived

---

# 17. PENGUMUMAN

Pengumuman dapat digunakan untuk informasi penting pemerintah desa.

Field:

- judul
- isi
- tanggal
- status
- prioritas
- created_at
- updated_at

---

# 18. GALERI

URL:

/galeri

Kategori:

- Pemerintahan
- Kegiatan Desa
- Masyarakat
- Pembangunan
- Budaya
- Alam
- Lainnya

Field:

- id
- category_id
- title
- description
- image
- status
- created_at

Galeri harus menggunakan:

- Grid
- Lazy loading
- Lightbox
- Responsive image

---

# 19. KONTAK

URL:

/kontak

Informasi:

- Alamat kantor desa
- Kecamatan
- Kabupaten
- Nomor telepon
- Email
- WhatsApp
- Jam pelayanan
- Social media

Tambahkan peta lokasi menggunakan Leaflet jika koordinat tersedia.

Jangan mengarang koordinat.

---

# 20. SEARCH

Website harus menyediakan pencarian.

Search dapat mencari:

- Berita
- Pengumuman
- Layanan
- Potensi
- Informasi desa

Search harus:

- Responsive
- Cepat
- Menampilkan hasil relevan
- Menampilkan empty state jika tidak ditemukan

---

# 21. ADMIN PANEL

URL:

/admin

Dashboard:

- Statistik berita
- Statistik galeri
- Statistik layanan
- Pengajuan terbaru
- Konten terbaru
- Quick action

---

# 22. MENU ADMIN

## Dashboard

/admin

## Profil Desa

/admin/profil

## Pemerintahan

/admin/pemerintahan

## Berita

/admin/berita

/admin/berita/create

/admin/berita/edit/{id}

## Kategori Berita

/admin/berita/categories

## Pengumuman

/admin/pengumuman

## Galeri

/admin/galeri

## Kategori Galeri

/admin/galeri/categories

## Potensi Desa

/admin/potensi

## Data Desa

/admin/data-desa

## Layanan

/admin/layanan

## Pengajuan

/admin/pengajuan

## Kontak

/admin/kontak

## Pengaturan

/admin/pengaturan

## User

/admin/users

---

# 23. AUTENTIKASI

Admin wajib login.

Gunakan:

- Session authentication
- Password hashing
- CSRF protection
- Input validation
- Authorization
- Session regeneration setelah login

Password tidak boleh disimpan plaintext.

---

# 24. ROLE

Minimal:

ADMIN

Jika diperlukan:

SUPERADMIN

ADMIN_DESA

Jangan menambahkan role lain jika belum diperlukan.

---

# 25. DATABASE

Minimal tabel:

users
desa
profil_desa
pemerintahan
berita_categories
berita
pengumuman
galeri_categories
galeri
potensi_desa
data_penduduk
data_statistik
layanan
persyaratan_layanan
pengajuan_layanan
kontak
pengaturan

---

# 26. DATABASE RULE

Semua tabel harus mempunyai:

- Primary Key
- created_at
- updated_at jika relevan

Gunakan foreign key jika relasi diperlukan.

Gunakan index untuk:

- slug
- status
- foreign key
- published_at

Slug harus unique.

---

# 27. FILE UPLOAD

Upload digunakan untuk:

- Logo
- Foto perangkat desa
- Thumbnail berita
- Foto galeri
- Foto potensi
- Dokumen layanan

Aturan:

- Validasi MIME type
- Validasi extension
- Validasi ukuran
- Rename file
- Jangan menggunakan nama file asli sebagai nama penyimpanan
- Jangan memperbolehkan executable upload
- Simpan file pada directory yang sesuai
- Hapus file lama saat penggantian jika aman dilakukan

---

# 28. UI DESIGN SYSTEM

## Primary

Hijau.

## Secondary

Hijau muda.

## Accent

Kuning.

## Background

Putih / cream / green tint.

## Text

Hijau tua / charcoal.

## Card

Putih dengan shadow lembut.

## Border Radius

Gunakan radius modern:

12px - 24px.

Hero dapat menggunakan radius lebih besar.

---

# 29. TYPOGRAPHY

Gunakan font modern seperti:

Poppins

atau

Inter

Hierarchy:

H1:
48-64px desktop

H2:
32-40px

H3:
22-28px

Body:
14-16px

Mobile harus menggunakan ukuran yang lebih kecil dan proporsional.

---

# 30. RESPONSIVE

Breakpoints minimal:

Mobile:
< 576px

Tablet:
576px - 991px

Desktop:
>= 992px

Website harus nyaman digunakan:

- Smartphone
- Tablet
- Laptop
- Desktop

Tidak boleh ada horizontal overflow.

---

# 31. ACCESSIBILITY

Minimal:

- alt image
- semantic HTML
- keyboard navigation
- readable contrast
- focus state
- button memiliki label jelas
- form mempunyai label
- error message jelas

---

# 32. SEO

Setiap halaman penting memiliki:

- title
- meta description
- canonical URL jika diperlukan
- Open Graph metadata
- semantic heading
- slug SEO-friendly

Contoh:

/berita/pemerintah-desa-gelar-musdes

bukan:

/berita?id=123

---

# 33. PERFORMANCE

Website harus:

- menggunakan image optimization
- lazy loading
- pagination
- query database efisien
- tidak melakukan SELECT * jika tidak diperlukan
- menggunakan caching jika diperlukan
- menghindari query N+1
- asset CSS/JS tidak berlebihan

---

# 34. SECURITY

Wajib:

- CSRF
- XSS protection
- SQL injection protection
- validation
- authorization
- secure session
- password hashing
- upload validation
- rate limiting pada area sensitif jika diperlukan

Jangan menaruh:

- password
- API key
- secret
- database credential

ke repository.

Gunakan environment configuration.

---

# 35. CODEIGNITER 4 RULE

Gunakan pola:

Controller
→ Service jika business logic kompleks
→ Model
→ Database

View hanya menangani presentation.

Jangan menaruh query database langsung di view.

Jangan menaruh business logic besar di view.

Controller jangan terlalu gemuk.

Gunakan:

- Routes
- Controllers
- Models
- Entities jika diperlukan
- Filters
- Validation
- Migrations
- Seeders

---

# 36. URL RULE

Gunakan URL lowercase dan kebab-case.

Contoh:

/profil-desa
/pemerintahan
/data-desa
/layanan
/berita
/galeri
/potensi
/kontak

Jangan:

/ProfilDesa
/DataDesa
/GetBeritaData

---

# 37. KONSISTENSI ISTILAH

Gunakan istilah resmi berikut.

Website:

"Website Profil Desa"

Bukan:

"Portal Desa" kecuali konteks memang membutuhkan.

Status berita:

draft
published
archived

Status pengajuan:

diajukan
diperiksa
diproses
disetujui
ditolak
selesai

Admin:

Admin Desa

Masyarakat:

Masyarakat

Perangkat:

Perangkat Desa

---

# 38. EMPTY STATE

Jika data belum tersedia, jangan tampilkan error.

Contoh:

"Belum ada berita yang dipublikasikan."

"Belum ada dokumentasi galeri."

"Data belum tersedia."

Jangan menggunakan:

"NULL"

"undefined"

"NaN"

atau error database kepada pengguna.

---

# 39. ERROR HANDLING

User-facing error harus menggunakan bahasa Indonesia yang jelas.

Contoh:

"Data tidak ditemukan."

"Terjadi kesalahan saat menyimpan data."

"File yang diunggah tidak didukung."

"Anda tidak memiliki akses untuk melakukan tindakan ini."

---

# 40. ADMIN UX

Admin harus mendapatkan:

- Flash message
- Validation error
- Confirmation sebelum delete
- Loading state
- Empty state
- Pagination
- Search
- Filter jika diperlukan

Delete data harus meminta konfirmasi.

---

# 41. DASHBOARD ADMIN

Dashboard minimal menampilkan:

- Jumlah berita
- Jumlah galeri
- Jumlah layanan
- Jumlah pengajuan
- Pengajuan terbaru
- Berita terbaru

Tidak perlu membuat dashboard penuh chart jika datanya belum tersedia.

---

# 42. SEED DATA

Seeder development boleh membuat data contoh:

- Admin
- Profil desa
- Berita
- Galeri
- Pemerintahan
- Layanan
- Potensi

Tetapi semua data dummy harus jelas dan mudah diganti.

Jangan memasukkan data penduduk asli sebagai seed.

---

# 43. DATA SENSITIF

Jangan memasukkan data pribadi masyarakat asli ke repository.

Contoh data yang tidak boleh dibuat sebagai dummy realistis:

- NIK asli
- nomor KK asli
- nomor telepon pribadi
- alamat pribadi
- dokumen identitas

---

# 44. ACCEPTANCE CRITERIA

Website dianggap memenuhi PRD jika:

1. Public website dapat dibuka.
2. Homepage mengikuti desain referensi.
3. Website responsive.
4. Admin dapat login.
5. Admin dapat CRUD berita.
6. Admin dapat CRUD galeri.
7. Admin dapat CRUD pemerintahan.
8. Admin dapat CRUD layanan.
9. Admin dapat mengubah profil desa.
10. Data public berasal dari database.
11. Upload gambar tervalidasi.
12. Authentication aman.
13. Form tervalidasi.
14. Tidak terdapat broken link.
15. Tidak terdapat horizontal overflow.
16. Tidak terdapat error PHP pada production.
17. Migration dapat dijalankan dari database kosong.
18. Seeder development dapat digunakan.
19. Delete memiliki confirmation.
20. Empty state tersedia.

---

# 45. PRIORITAS DEVELOPMENT

## PHASE 1

Foundation:

- CodeIgniter 4
- Environment
- Database
- Migration
- Seeder
- Base layout
- Navbar
- Footer
- Authentication

## PHASE 2

Public website:

- Homepage
- Profil
- Pemerintahan
- Berita
- Galeri
- Potensi
- Data Desa
- Kontak

## PHASE 3

Admin CMS:

- Dashboard
- CRUD Profil
- CRUD Pemerintahan
- CRUD Berita
- CRUD Galeri
- CRUD Potensi
- CRUD Layanan

## PHASE 4

Layanan publik:

- Layanan
- Persyaratan
- Pengajuan
- Status pengajuan

## PHASE 5

Polishing:

- Responsive
- Accessibility
- SEO
- Performance
- Security
- Error handling

---

# 46. DEFINITION OF DONE

Sebuah fitur dianggap selesai jika:

- Backend selesai.
- Database selesai.
- Migration tersedia.
- Validation tersedia.
- Authorization tersedia.
- UI selesai.
- Responsive.
- Empty state tersedia.
- Error state tersedia.
- CRUD berjalan.
- Tidak ada error console yang kritis.
- Tidak ada error PHP.
- Tidak merusak fitur lain.
- Sudah diuji dengan data kosong.
- Sudah diuji dengan data banyak.
- Sudah diuji mobile dan desktop.
