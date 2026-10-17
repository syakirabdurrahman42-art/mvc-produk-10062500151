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
4. Buka `localhost/mvc-produk-109062500151/public/index.php`.
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

## Histori Git

Hasil `git log --oneline`:

```
ca32d9e docs: add installation and MVC documentation
63d7331 feat: add front controller and routing
137e2d8 feat: add front controller and routing
fd5196e fix: rename views folder to lowercase
9c1041c feat: add complete product CRUD views
20a09f9 feat: add complete product CRUD controller
467be63 feat: add complete product CRUD model
0295c01 feat: add PDO database connection
328cd3c feat: add product database schema and seed data
f356374 chore: initialize mvc php native project
```
