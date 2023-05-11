<?php
$hostname = "localhost";
$database = "arkatama_store";
$username = "root";
$password = "";
$conn = mysqli_connect($hostname, $username, $password, $database);
// script cek koneksi
if (!$conn) {
    die("Koneksi Tidak Berhasil: " . mysqli_connect_error());
}
?> 