<?php
session_start();

// Proteksi halaman (harus login)
if (!isset($_SESSION['email'])) {
    header("Location: index.php");
    exit;
}
?>

<h2>Data Customer</h2>

<table style="
    width:100%;
    border-collapse:collapse;
    background:#fff;
    border-radius:8px;
    overflow:hidden;
    box-shadow:0 2px 6px rgba(0,0,0,0.1);
">
    <thead style="background:#2ecc71;color:white;">
        <tr>
            <th style="padding:10px;">No</th>
            <th>Kode Customer</th>
            <th>Nama Customer</th>
            <th>Alamat</th>
            <th>No. Telepon</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Data customer (contoh / statis)
        $customers = [
            ["C001", "Andi", "Medan", "081234567890"],
            ["C002", "Budi", "Binjai", "082233445566"],
            ["C003", "Siti", "Lubuk Pakam", "081298765432"],
            ["C004", "Rina", "Tebing Tinggi", "085266778899"]
        ];

        $no = 1;
        foreach ($customers as $c) {
            echo "<tr style='text-align:center;'>
                <td>{$no}</td>
                <td>{$c[0]}</td>
                <td>{$c[1]}</td>
                <td>{$c[2]}</td>
                <td>{$c[3]}</td>
            </tr>";
            $no++;
        }
        ?>
    </tbody>
</table>
