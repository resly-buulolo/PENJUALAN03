<?php
session_start();

// Proteksi halaman
if (!isset($_SESSION['email'])) {
    header("Location: index.php");
    exit;
}
?>

<h2>My Profile</h2>

<div style="
    background:#ffffff;
    padding:20px;
    border-radius:8px;
    max-width:400px;
    box-shadow:0 2px 6px rgba(0,0,0,0.1);
">
    <p><strong>Nama :</strong> <?= $_SESSION['name']; ?></p>
    <p><strong>Email :</strong> <?= $_SESSION['email']; ?></p>
    <p><strong>Role :</strong> <?= $_SESSION['role']; ?></p>
</div>
