<?php
// koneksi database
include 'koneksi.php';

// menangkap data yang di kirim dari form
$nama = $_POST['nama_user'];
$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role'];

// menginput data ke database
mysqli_query($koneksi, "insert into user values('','$username','$password','$nama','$role')");

// mengalihkan halaman kembali ke index.php
header("location:tampil_data.php?role=$role");
