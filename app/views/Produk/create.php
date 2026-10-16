<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Produk</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Tambah Produk</h2>

    <?php if (!empty($error)): ?>
        <div class="alert alert-error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="post" action="index.php?page=produk&action=store">
        <label>Kode Produk</label>
        <input type="text" name="kode_produk" value="<?= htmlspecialchars($old['kode_produk']) ?>" required>

        <label>Nama Produk</label>
        <input type="text" name="nama_produk" value="<?= htmlspecialchars($old['nama_produk']) ?>" required>

        <label>Kategori</label>
        <input type="text" name="kategori" value="<?= htmlspecialchars($old['kategori']) ?>" required>

        <label>Harga (Rp)</label>
        <input type="number" name="harga" min="0" step="any" value="<?= htmlspecialchars($old['harga']) ?>" required>

        <label>Stok</label>
        <input type="number" name="stok" min="0" step="1" value="<?= htmlspecialchars($old['stok']) ?>" required>

        <div class="aksi">
            <button class="btn" type="submit">Simpan</button>
            <a href="index.php?page=produk">Kembali</a>
        </div>
    </form>
</body>
</html>