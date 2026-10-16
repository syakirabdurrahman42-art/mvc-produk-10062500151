<?php

class ProdukController
{
    public function __construct(private Produk $model) {}

    public function index(): void
    {
        $produk = $this->model->getAll();
        $flash  = $this->pullFlash();
        require __DIR__ . '/../views/produk/index.php';
    }

    public function create(): void
    {
        $old   = ['kode_produk' => '', 'nama_produk' => '', 'kategori' => '', 'harga' => '', 'stok' => ''];
        $error = null;
        require __DIR__ . '/../views/produk/create.php';
    }

    public function store(): void
    {
        $data  = $this->sanitizeInput($_POST);
        $error = $this->validateInput($data);

        if ($error === null) {
            try {
                $this->model->insert($data);
                $this->flash('success', 'Produk berhasil ditambahkan.');
                $this->redirect();
            } catch (PDOException $e) {
                $error = $this->databaseErrorMessage($e);
            }
        }

        // Validasi/penyimpanan gagal: tampilkan form lagi beserta isian lama.
        $old = $data;
        require __DIR__ . '/../views/produk/create.php';
    }

    public function edit(): void
    {
        $id     = (int) ($_GET['id'] ?? 0);
        $produk = $this->model->findById($id);

        if (!$produk) {
            http_response_code(404);
            exit('Data produk tidak ditemukan.');
        }

        $error = null;
        require __DIR__ . '/../views/produk/edit.php';
    }

    public function update(): void
    {
        $id = (int) ($_POST['id'] ?? 0);

        if (!$this->model->findById($id)) {
            http_response_code(404);
            exit('Data produk tidak ditemukan.');
        }

        $data  = $this->sanitizeInput($_POST);
        $error = $this->validateInput($data);

        if ($error === null) {
            try {
                $this->model->update($id, $data);
                $this->flash('success', 'Produk berhasil diperbarui.');
                $this->redirect();
            } catch (PDOException $e) {
                $error = $this->databaseErrorMessage($e);
            }
        }

        // Gagal: tampilkan form edit lagi beserta isian terakhir.
        $produk = array_merge(['id' => $id], $data);
        require __DIR__ . '/../views/produk/edit.php';
    }

    public function delete(): void
    {
        $id = (int) ($_POST['id'] ?? 0);

        try {
            $this->model->delete($id);
            $this->flash('success', 'Produk berhasil dihapus.');
        } catch (PDOException $e) {
            $this->flash('error', 'Gagal menghapus produk.');
        }

        $this->redirect();
    }

    private function sanitizeInput(array $input): array
    {
        return [
            'kode_produk' => trim($input['kode_produk'] ?? ''),
            'nama_produk' => trim($input['nama_produk'] ?? ''),
            'kategori'    => trim($input['kategori'] ?? ''),
            'harga'       => trim($input['harga'] ?? ''),
            'stok'        => trim($input['stok'] ?? '')
        ];
    }

    private function validateInput(array $data): ?string
    {
        foreach ($data as $nilai) {
            if ($nilai === '') {
                return 'Semua field wajib diisi.';
            }
        }

        if (!is_numeric($data['harga']) || (float) $data['harga'] < 0) {
            return 'Harga harus berupa angka dan tidak boleh negatif.';
        }

        if (filter_var($data['stok'], FILTER_VALIDATE_INT, ['options' => ['min_range' => 0]]) === false) {
            return 'Stok harus berupa bilangan bulat dan tidak boleh negatif.';
        }

        return null;
    }

    private function databaseErrorMessage(PDOException $e): string
    {
        // SQLSTATE 23000 = pelanggaran constraint (misalnya kode_produk UNIQUE).
        if ($e->getCode() === '23000') {
            return 'Kode produk sudah digunakan. Gunakan kode yang lain.';
        }
        return 'Terjadi kesalahan pada database. Data gagal disimpan.';
    }

    private function flash(string $type, string $message): void
    {
        $_SESSION['flash'] = ['type' => $type, 'message' => $message];
    }

    private function pullFlash(): ?array
    {
        $flash = $_SESSION['flash'] ?? null;
        unset($_SESSION['flash']);
        return $flash;
    }

    private function redirect(): never
    {
        header('Location: index.php?page=produk');
        exit;
    }
}