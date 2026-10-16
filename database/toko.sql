CREATE DATABASE IF NOT EXISTS toko
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE toko;

CREATE TABLE IF NOT EXISTS produk (
    id INT AUTO_INCREMENT PRIMARY KEY,
    kode_produk VARCHAR(20) NOT NULL UNIQUE,
    nama_produk VARCHAR(100) NOT NULL,
    kategori VARCHAR(50) NOT NULL,
    harga DECIMAL(12,2) NOT NULL,
    stok INT NOT NULL DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO produk (kode_produk, nama_produk, kategori, harga, stok) VALUES
('PRD001', 'Keyboard Mechanical', 'Aksesoris', 450000, 25),
('PRD002', 'Mouse Wireless', 'Aksesoris', 150000, 40),
('PRD003', 'Monitor 24 Inch', 'Elektronik', 1800000, 10);