# MVC PHP Native - Data Produk

Aplikasi CRUD sederhana untuk mempelajari pola Model-View-Controller pada PHP Native.
Data yang dikelola: produk (kode, nama, kategori, harga, stok).

## Kebutuhan

- PHP 8.1 atau lebih baru
- MySQL/MariaDB
- Web server lokal seperti XAMPP atau Laragon
- Git

## Instalasi

1. Clone atau salin project ke folder web server (`htdocs` untuk XAMPP, `www` untuk Laragon).
2. Import `database/toko.sql` melalui phpMyAdmin atau terminal:
   `mysql -u root -p < database/toko.sql`
3. Sesuaikan koneksi pada `config/database.php` (host, user, password).
4. Buka `http://localhost/mvc-produk-109062500151/public/index.php`.

## Struktur MVC

- `app/models/` : akses dan operasi data (`Produk.php`).
- `app/controllers/` : alur request dan pemanggilan Model/View (`ProdukController.php`).
- `app/views/produk/` : tampilan HTML (`index.php`, `create.php`, `edit.php`).
- `config/` : konfigurasi koneksi database (PDO).
- `database/` : skema dan data awal SQL (`toko.sql`).
- `public/` : entry point aplikasi (`index.php`) dan `style.css`.

## Fitur

- Menampilkan data produk
- Menambah data produk
- Mengubah data produk
- Menghapus data produk
- Validasi input dan pesan berhasil/gagal

## Histori Git

Hasil `git log --oneline` :
add installation and MVC documentation
add front controller and routing
add front controller and routing
rename views folder to lowercase
add complete product CRUD views
add complete product CRUD controller
add complete product CRUD model
add PDO database connection
add product database schema and seed data
initialize mvc php native project