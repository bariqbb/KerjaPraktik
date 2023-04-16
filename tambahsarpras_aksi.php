<?php
// koneksi database
include 'koneksi.php';

// menangkap data yang di kirim dari form
$nama = $_POST['nama_barang'];
$keterangan = $_POST['keterangan'];
$jenis = $_POST['jenis'];
$jumlah = $_POST['jumlah'];


// menginput data ke database
mysqli_query($koneksi, "insert into sarpras values('','$nama','$keterangan','$jenis','$jumlah','Tersedia')");

// mengalihkan halaman kembali ke index.php
header("location:tampil_sarpras_admin.php");