<?php
session_start();

// Proteksi login
if (!isset($_SESSION['email'])) {
    header("Location: index.php");
    exit;
}

// Inisialisasi produk manual (kalau belum ada)
if (!isset($_SESSION['produk'])) {
    $_SESSION['produk'] = [
        ["P001", "Pulpen", 3000],
        ["P002", "Buku Tulis", 7000],
        ["P003", "Penghapus", 2000]
    ];
}

// Simpan transaksi
if (isset($_POST['simpan'])) {
    $kode  = $_POST['kode'];
    $nama  = $_POST['nama'];
    $harga = $_POST['harga'];
    $qty   = $_POST['qty'];
    $total = $harga * $qty;

    $_SESSION['transaksi'][] = [
        "kode" => $kode,
        "nama" => $nama,
        "harga" => $harga,
        "qty" => $qty,
        "total" => $total
    ];
}
?>

<h2>Transaksi Penjualan</h2>

<form method="post">
    <label>Pilih Produk</label><br>
    <select name="index" onchange="this.form.submit()">
        <option value="">-- Pilih Produk --</option>
        <?php foreach ($_SESSION['produk'] as $i => $p): ?>
            <option value="<?= $i ?>" <?= isset($_POST['index']) && $_POST['index']==$i ? 'selected' : '' ?>>
                <?= $p[1] ?> - Rp <?= number_format($p[2]) ?>
            </option>
        <?php endforeach; ?>
    </select>
</form>

<?php
if (isset($_POST['index'])):
$p = $_SESSION['produk'][$_POST['index']];
?>

<form method="post">
    <input type="hidden" name="kode" value="<?= $p[0] ?>">
    <input type="hidden" name="nama" value="<?= $p[1] ?>">
    <input type="hidden" name="harga" value="<?= $p[2] ?>">

    <p>Nama Produk : <b><?= $p[1] ?></b></p>
    <p>Harga : Rp <?= number_format($p[2]) ?></p>

    <label>Jumlah</label><br>
    <input type="number" name="qty" required><br><br>

    <button name="simpan">Simpan Transaksi</button>
</form>
<?php endif; ?>
