<?php
// koneksi database
include 'koneksi.php';

// menangkap data yang di kirim dari form
$id = $_POST['id_barang'];
$nama = $_POST['nama_barang'];
$keterangan = $_POST['keterangan'];
$jenis = $_POST['jenis'];
$jumlah = $_POST['jumlah'];
$status = $_POST['status'];


// update data ke database
$data = mysqli_query($koneksi, "select * from sarpras where id_barang='$id'");
$d = mysqli_fetch_array($data);
if ($jumlah < 1) {
  mysqli_query($koneksi, "update sarpras set nama_barang='$nama', keterangan='$keterangan', jenis='$jenis', jumlah='$jumlah', status='Tidak Tersedia' where id_barang='$id'");
} else {
  mysqli_query($koneksi, "update sarpras set nama_barang='$nama', keterangan='$keterangan', jenis='$jenis', jumlah='$jumlah', status='$status' where id_barang='$id'");
}
// mengalihkan halaman kembali ke index.php
header("location:tampil_sarpras_admin.php"); ?>