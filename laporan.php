<?php
session_start();

// Proteksi login
if (!isset($_SESSION['email'])) {
    header("Location: index.php");
    exit;
}

$transaksi = $_SESSION['transaksi'] ?? [];
?>

<h2>Laporan Penjualan</h2>

<table border="1" cellpadding="10" cellspacing="0">
    <tr style="background:#3498db;color:white;">
        <th>No</th>
        <th>Kode</th>
        <th>Nama Produk</th>
        <th>Harga</th>
        <th>Qty</th>
        <th>Total</th>
    </tr>

    <?php
    $no = 1;
    $grandTotal = 0;

    foreach ($transaksi as $t):
        $grandTotal += $t['total'];
    ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $t['kode'] ?></td>
        <td><?= $t['nama'] ?></td>
        <td>Rp <?= number_format($t['harga']) ?></td>
        <td><?= $t['qty'] ?></td>
        <td>Rp <?= number_format($t['total']) ?></td>
    </tr>
    <?php endforeach; ?>

    <tr>
        <td colspan="5"><b>Total Penjualan</b></td>
        <td><b>Rp <?= number_format($grandTotal) ?></b></td>
    </tr>
</table>
