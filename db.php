<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "crudapp"; // Pastikan kamu sudah buat database ini di phpMyAdmin

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
