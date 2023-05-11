<?php
include 'koneksi.php';
// menyimpan data id kedalam variabel
$id   = $_GET['id'];
// query SQL untuk insert data
$query="DELETE from users where id='$id'";
mysqli_query($conn, $query);
// mengalihkan ke halaman index.php

header("location:../index.php");



?>