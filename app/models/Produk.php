<?php

class Produk
{
    public function __construct(private PDO $db) {}

    public function getAll(): array
    {
        $stmt = $this->db->query(
            'SELECT id, kode_produk, nama_produk, kategori, harga, stok
             FROM produk ORDER BY nama_produk'
        );
        return $stmt->fetchAll();
    }

    public function findById(int $id): array|false
    {
        $stmt = $this->db->prepare(
            'SELECT id, kode_produk, nama_produk, kategori, harga, stok
             FROM produk WHERE id = :id'
        );
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }

    public function insert(array $data): bool
    {
        $sql = 'INSERT INTO produk (kode_produk, nama_produk, kategori, harga, stok)
                VALUES (:kode_produk, :nama_produk, :kategori, :harga, :stok)';
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':kode_produk' => $data['kode_produk'],
            ':nama_produk' => $data['nama_produk'],
            ':kategori'    => $data['kategori'],
            ':harga'       => $data['harga'],
            ':stok'        => $data['stok']
        ]);
    }

    public function update(int $id, array $data): bool
    {
        $sql = 'UPDATE produk
                SET kode_produk = :kode_produk, nama_produk = :nama_produk,
                    kategori = :kategori, harga = :harga, stok = :stok
                WHERE id = :id';
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':id'          => $id,
            ':kode_produk' => $data['kode_produk'],
            ':nama_produk' => $data['nama_produk'],
            ':kategori'    => $data['kategori'],
            ':harga'       => $data['harga'],
            ':stok'        => $data['stok']
        ]);
    }

    public function delete(int $id): bool
    {
        $stmt = $this->db->prepare('DELETE FROM produk WHERE id = :id');
        return $stmt->execute([':id' => $id]);
    }
}