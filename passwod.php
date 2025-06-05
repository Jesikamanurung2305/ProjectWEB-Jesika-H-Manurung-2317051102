<?php
$password = "user123"; // password asli yang ingin di-hash

// Meng-hash password menggunakan algoritma bcrypt
$hash = password_hash($password, PASSWORD_DEFAULT);

// Menampilkan hasil hash
echo "Password asli: " . $password . "<br>";
echo "Password hash: " . $hash;
?>