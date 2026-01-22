<?php
if (!isset($_SESSION['email'])) {
    header("Location: index.php");
    exit;
}

// DATA PRODUK MANUAL
$produk = [
    [
        "kode" => "KO1",
        "nama" => "Pulpen",
        "harga" => 3000,
        "stok" => 5,
        "satuan" => "pcs"
    ],
    [
        "kode" => "KO2",
        "nama" => "Buku Tulis",
        "harga" => 7000,
        "stok" => 10,
        "satuan" => "pcs"
    ],
    [
        "kode" => "KO3",
        "nama" => "Penghapus",
        "harga" => 2000,
        "stok" => 8,
        "satuan" => "pcs"
    ]
];
?>

<h2>List Produk</h2>

<table border="1" cellpadding="10" cellspacing="0" width="100%" style="border-collapse:collapse;">
    <thead>
        <tr style="background:#f2f2f2;">
            <th>No</th>
            <th>Kode</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Satuan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; foreach ($produk as $p): ?>
        <tr align="center">
            <td><?= $no++; ?></td>
            <td><?= $p['kode']; ?></td>
            <td><?= $p['nama']; ?></td>
            <td>Rp <?= number_format($p['harga'],0,',','.'); ?></td>
            <td><?= $p['stok']; ?></td>
            <td><?= $p['satuan']; ?></td>
            <td>
                <a href="#" style="color:#3498db; font-weight:bold; text-decoration:none;">Edit</a>
                |
                <a href="#" style="color:#e74c3c; font-weight:bold; text-decoration:none;"
                   onclick="return confirm('Yakin mau hapus data ini?')">
                   Hapus
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
