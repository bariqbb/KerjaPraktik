<?php
// koneksi database
include 'koneksi.php';

// menangkap data yang di kirim dari form
$id = $_POST['id_user'];
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role'];


// update data ke database
mysqli_query($koneksi, "update user set username='$username', password='$password', nama='$nama' where id_user='$id'");

// mengalihkan halaman kembali ke index.php
header("location:tampil_data.php?role=$role");?>
