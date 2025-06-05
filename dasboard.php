<?php
require_once "auth.php";
$username = $_SESSION['username'];
$role = $_SESSION['role'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - <?= ucfirst($role) ?></title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="container">
    <h1>Dashboard <?= ucfirst($role) ?></h1>
    <p>Selamat datang, <strong><?= htmlspecialchars($username) ?></strong>!</p>
    <a href="logout.php" class="btn-logout">Logout</a>
    <hr>

    <?php if ($role == 'admin'): ?>
        <div class="card"><a href="produk/">Kelola Produk</a></div>
        <div class="card"><a href="kategori/">Kelola Kategori</a></div>
    <?php elseif ($role == 'user'): ?>
        <div class="card"><a href="useprod/">Lihat Produk</a></div>
    <?php endif; ?>
</div>
</body>
</html>
