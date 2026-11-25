# Toko Buku — Tugas Akhir

Aplikasi web manajemen **Kategori** dan **Artikel** dengan panel admin, dibangun menggunakan **Laravel 11** dan template **AdminLTE 3**. Autentikasi (login, register, reset password) menggunakan **Laravel Fortify**.

**Pembuat:** Steven Andrian Pranata Wicaksono

---

## Fitur

| Modul | Fungsi |
| --- | --- |
| Autentikasi | Register, login, logout, reset password |
| Dashboard | Halaman utama setelah login |
| Kategori | Lihat daftar, tambah, ubah, hapus |
| Artikel | Lihat daftar, tambah, ubah, hapus, upload gambar |

Detail tambahan:
- Tabel data memakai **DataTables** (pencarian, urutan, dan pagination otomatis).
- Konfirmasi hapus artikel memakai **SweetAlert2**.
- Upload gambar artikel: format **JPG/JPEG/PNG**, maksimal **5 MB**.
- Saat artikel dihapus atau gambarnya diganti, file gambar lama ikut dihapus dari penyimpanan.

## Teknologi

- PHP 8.2 atau lebih baru
- Laravel 11
- MySQL / MariaDB
- AdminLTE 3, Bootstrap 4, jQuery, DataTables, SweetAlert2
- Laravel Fortify dan Laravel Sanctum

---

## Kebutuhan Sistem

Pastikan sudah terpasang di komputer:

1. **PHP 8.2+** dengan ekstensi: BCMath, Ctype, JSON, Mbstring, OpenSSL, PDO (pdo_mysql), Tokenizer, XML, Fileinfo
2. **Composer** (https://getcomposer.org)
3. **MySQL atau MariaDB**
4. **Git**

> **Cara paling mudah:** pasang **XAMPP** atau **Laragon**. Keduanya sudah menyertakan PHP, MySQL, dan phpMyAdmin. Pastikan versi PHP-nya 8.2 atau lebih baru.

---

## Instalasi

### 1. Clone repository

```bash
git clone https://github.com/USERNAME/NAMA-REPO.git
cd NAMA-REPO
```

> Ganti `USERNAME/NAMA-REPO` dengan alamat repository ini.

### 2. Pasang dependency

```bash
composer install
```

Folder `vendor/` tidak disertakan di repository, jadi langkah ini wajib.

### 3. Siapkan file `.env`

Salin file contoh:

```bash
# Windows (CMD / Git Bash)
copy .env.example .env      # CMD
cp .env.example .env        # Git Bash / Linux / macOS
```

Buka file `.env`, lalu ubah bagian database:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tokobuku
DB_USERNAME=root
DB_PASSWORD=
```

> **Penting:** di `.env.example`, nilai bawaan `DB_DATABASE` adalah `laradminlte`. Ganti menjadi **`tokobuku`**. Sesuaikan `DB_USERNAME` dan `DB_PASSWORD` dengan MySQL di komputer Anda (di XAMPP/Laragon biasanya `root` tanpa password).

### 4. Buat application key

```bash
php artisan key:generate
```

### 5. Buat dan impor database

1. Jalankan MySQL (lewat XAMPP/Laragon).
2. Buka **phpMyAdmin** di `http://localhost/phpmyadmin`.
3. Klik **New / Baru**, buat database bernama **`tokobuku`**, pilih collation `utf8mb4_unicode_ci`, lalu klik **Create**.
4. Pilih database `tokobuku`, buka tab **Import**.
5. Klik **Choose File**, pilih file **`tokobuku.sql`** (ada di folder utama project ini), lalu klik **Import / Go**.

Atau lewat terminal:

```bash
mysql -u root -e "CREATE DATABASE tokobuku CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
mysql -u root tokobuku < tokobuku.sql
```

File SQL berisi struktur tabel beserta data contoh: **10 kategori**, **5 artikel**, dan **1 akun user**.

> **Jangan jalankan `php artisan migrate`** setelah mengimpor `tokobuku.sql`. Tabelnya sudah ada, dan kolom `userType` pada tabel `users` hanya tersedia lewat file SQL ini.

### 6. Hubungkan folder penyimpanan gambar

```bash
php artisan storage:link
```

Langkah ini membuat tautan `public/storage` agar gambar artikel bisa tampil. Tanpa langkah ini, gambar akan muncul rusak (broken image).

Gambar contoh sudah tersedia di `storage/app/public/artikels/`.

### 7. Jalankan aplikasi

```bash
php artisan serve
```

Buka browser dan akses:

```
http://127.0.0.1:8000
```

Untuk berhenti, tekan `Ctrl + C` di terminal.

---

## Cara Menggunakan Aplikasi

### 1. Masuk ke aplikasi

Buka `http://127.0.0.1:8000/login`.

- **Sudah punya akun:** masukkan email dan password, lalu klik tombol login.
- **Belum punya akun:** buka `http://127.0.0.1:8000/register`, isi nama, email, dan password, lalu daftar. Setelah itu login.

> Database contoh sudah berisi satu akun (`wasawho@gmail.com`), tetapi password-nya tidak tercatat di dokumentasi ini. Cara termudah adalah **mendaftar akun baru** lewat halaman register.

Setelah berhasil login, Anda masuk ke halaman **Dashboard**. Login dibutuhkan untuk memakai menu Kategori dan Artikel, jadi masuk dulu sebelum membuka menu lain.

### 2. Navigasi

Menu ada di **sidebar kiri**. Di dalamnya terdapat dua menu utama:

- **Kategori**
- **Artikel**

Tombol **Logout** ada di bagian atas halaman.

### 3. Mengelola Kategori

| Aksi | Cara |
| --- | --- |
| Melihat daftar | Klik menu **Kategori** (`/kategori`) |
| Menambah | Klik tombol tambah, isi **Nama Kategori** dan **Deskripsi**, lalu simpan |
| Mengubah | Klik tombol **Edit** pada baris kategori, ubah data, lalu simpan |
| Menghapus | Klik tombol **Hapus** pada baris kategori |

### 4. Mengelola Artikel

| Aksi | Cara |
| --- | --- |
| Melihat daftar | Klik menu **Artikel** (`/artikel`) |
| Menambah | Klik tombol tambah, lalu isi form (lihat tabel validasi di bawah) |
| Mengubah | Klik tombol **Edit**; gambar boleh dikosongkan jika tidak ingin diganti |
| Menghapus | Klik tombol **Hapus**, lalu konfirmasi **"Ya, Hapus!"** pada pop-up |

**Aturan pengisian form artikel:**

| Kolom | Aturan |
| --- | --- |
| Kategori | Wajib dipilih dari daftar kategori yang ada |
| Gambar | Wajib saat tambah; JPG/JPEG/PNG; maksimal 5 MB |
| Judul | Wajib, minimal 5 karakter |
| Deskripsi | Wajib, minimal 10 karakter |

> Tambahkan **kategori terlebih dahulu** sebelum membuat artikel, karena artikel harus terhubung ke sebuah kategori.

### 5. Daftar halaman (URL)

| URL | Keterangan |
| --- | --- |
| `/login` | Halaman login |
| `/register` | Halaman pendaftaran |
| `/home` | Dashboard |
| `/kategori` | Daftar kategori |
| `/kategori/create` | Form tambah kategori |
| `/kategori/{id}/edit` | Form ubah kategori |
| `/artikel` | Daftar artikel |
| `/artikel/create` | Form tambah artikel |
| `/artikel/{id}/edit` | Form ubah artikel |

---

## Struktur Folder Penting

```
├── app/
│   ├── Http/Controllers/     # ArtikelController, KategoriController, HomeController
│   └── Models/               # Artikel, Kategori, User
├── database/migrations/      # Struktur tabel
├── public/                   # Aset AdminLTE, CSS, dan JS
├── resources/views/          # Tampilan Blade (artikel, kategori, auth, layout)
├── routes/web.php            # Daftar route
├── storage/app/public/artikels/   # Gambar artikel yang diunggah
├── tokobuku.sql              # Dump database (struktur + data contoh)
└── .env.example              # Contoh konfigurasi
```

---

## Pemecahan Masalah

| Masalah | Solusi |
| --- | --- |
| `Class not found` / folder `vendor` tidak ada | Jalankan `composer install` |
| `No application encryption key has been specified` | Jalankan `php artisan key:generate` |
| `SQLSTATE[HY000] [1049] Unknown database 'tokobuku'` | Database belum dibuat; ulangi langkah 5 |
| `SQLSTATE[HY000] [1045] Access denied` | `DB_USERNAME` / `DB_PASSWORD` di `.env` salah |
| `SQLSTATE[HY000] [2002]` connection refused | MySQL belum dijalankan di XAMPP/Laragon |
| `Table 'tokobuku.xxx' already exists` saat migrate | Jangan jalankan `migrate`; cukup impor `tokobuku.sql` |
| Gambar artikel tidak tampil | Jalankan `php artisan storage:link`; jika masih gagal, hapus folder `public/storage` lalu jalankan ulang |
| Perubahan `.env` tidak terbaca | Jalankan `php artisan config:clear` |
| Port 8000 sudah dipakai | Jalankan `php artisan serve --port=8080` |

---

## Catatan

- File `.env` tidak ikut di repository karena berisi konfigurasi pribadi. Setiap pengguna perlu membuatnya sendiri dari `.env.example`.
- Mode `APP_DEBUG=true` hanya cocok untuk pengembangan lokal. Ubah menjadi `false` jika aplikasi di-deploy ke server.
- Proyek ini dibangun dari template [Laravel AdminLTE 3 + Fortify](https://github.com/AaEzha/Laravel---AdminLTE-3---Fortify).

## Lisensi

Dirilis di bawah lisensi MIT.
