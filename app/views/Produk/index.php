<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Produk</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Daftar Produk</h2>

    <?php if (!empty($flash)): ?>
        <div class="alert alert-<?= $flash['type'] === 'success' ? 'success' : 'error' ?>">
            <?= htmlspecialchars($flash['message']) ?>
        </div>
    <?php endif; ?>

    <a class="btn" href="index.php?page=produk&action=create">Tambah Data</a>

    <table>
        <tr>
            <th>Kode</th>
            <th>Nama Produk</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
        <?php if (empty($produk)): ?>
            <tr><td colspan="6">Belum ada data produk.</td></tr>
        <?php endif; ?>
        <?php foreach ($produk as $p): ?>
        <tr>
            <td><?= htmlspecialchars($p['kode_produk']) ?></td>
            <td><?= htmlspecialchars($p['nama_produk']) ?></td>
            <td><?= htmlspecialchars($p['kategori']) ?></td>
            <td class="angka">Rp <?= number_format((float) $p['harga'], 0, ',', '.') ?></td>
            <td class="angka"><?= (int) $p['stok'] ?></td>
            <td>
                <a href="index.php?page=produk&action=edit&id=<?= (int) $p['id'] ?>">Edit</a>
                <form class="inline" method="post"
                      action="index.php?page=produk&action=delete"
                      onsubmit="return confirm('Hapus produk ini?')">
                    <input type="hidden" name="id" value="<?= (int) $p['id'] ?>">
                    <button class="btn btn-danger" type="submit">Hapus</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>