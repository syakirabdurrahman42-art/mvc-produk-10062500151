<?php

session_start();

require __DIR__ . '/../config/database.php';
require __DIR__ . '/../app/models/Produk.php';
require __DIR__ . '/../app/controllers/ProdukController.php';

function notFound(string $pesan): never
{
    http_response_code(404);
    exit($pesan);
}

try {
    $db = (new Database())->connect();
} catch (PDOException $e) {
    http_response_code(500);
    exit('Koneksi database gagal. Periksa config/database.php dan pastikan MySQL sudah berjalan.');
}

$model      = new Produk($db);
$controller = new ProdukController($model);

$page   = $_GET['page'] ?? 'produk';
$action = $_GET['action'] ?? 'index';

if ($page !== 'produk') {
    notFound('Halaman tidak ditemukan.');
}

// Aksi yang mengubah data hanya boleh lewat metode POST.
if (in_array($action, ['store', 'update', 'delete'], true)
    && $_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit('Metode tidak diizinkan. Gunakan form (POST).');
}

match ($action) {
    'index'  => $controller->index(),
    'create' => $controller->create(),
    'store'  => $controller->store(),
    'edit'   => $controller->edit(),
    'update' => $controller->update(),
    'delete' => $controller->delete(),
    default  => notFound('Action tidak ditemukan.'),
};