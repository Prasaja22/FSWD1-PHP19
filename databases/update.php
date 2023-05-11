<?php
include 'koneksi.php';
    $id = $_POST['id'];
    $email = strip_tags($_POST['email']);
    $nama = strip_tags($_POST['nama']);
    $role = strip_tags($_POST['role']);
    $phone = strip_tags($_POST['phone']);
    $address = strip_tags($_POST['address']);
    $password = strip_tags($_POST['password']);


  $gambar_user = $_FILES['avatar']['name'];
  if($gambar_user != "") {
    $ekstensi_diperbolehkan = array('png','jpg');  
    $x = explode('.', $gambar_user); 
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['avatar']['tmp_name'];   
    $angka_acak     = rand(1,999);
    $nama_gambar_baru = $angka_acak.'-'.$gambar_user; 
    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {
                  move_uploaded_file($file_tmp, '../upload/'.$nama_gambar_baru);
                      
                  $query  = "UPDATE users SET email = '$email', name = '$nama', role = '$role', avatar = '$nama_gambar_baru', phone = '$phone', address = '$address', password = '$password'";
                  $query .= "WHERE id = '$id'";
                    $result = mysqli_query($conn, $query);
                    if(!$result){
                        die ("Query gagal dijalankan: ".mysqli_errno($conn).
                             " - ".mysqli_error($conn));
                    } else {
                      echo "<script>alert('Data berhasil diubah.');window.location='../index.php';</script>";
                    }
              } else {     
                  echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='../index.php';</script>";
              }
    } else {
        $query  = "UPDATE users SET email = '$email', name = '$nama', role = '$role', avatar = '$nama_gambar_baru', phone = '$phone', address = '$address', password = '$password'";
        $query .= "WHERE id = '$id'";
      $result = mysqli_query($conn, $query);
      if(!$result){
            die ("Query gagal dijalankan: ".mysqli_errno($conn).
                             " - ".mysqli_error($conn));
      } else {
          echo "<script>alert('Data berhasil diubah.');window.location='../index.php';</script>";
      }
    }
