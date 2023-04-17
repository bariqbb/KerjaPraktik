<?php
// koneksi database
include 'koneksi.php';

// menangkap data yang di kirim dari form
$id = $_POST['id_pinjam'];
$status = $_POST['status'];

// update data ke database
$pinjam = mysqli_query($koneksi, "select * from peminjaman where id_pinjam='$id'");
$info = mysqli_fetch_array($pinjam);
$query = mysqli_query($koneksi, "select * from barangpinjam where id_pinjam='$id'");
$d = mysqli_fetch_array($query);

for ($i = 0; $i < count($d['id_pinjam']); $i++) {
//foreach ($d as $key ) {
  $nama = str_replace('_', ' ', $d['nama_barang']);//[$i]);
  $jumlah = $d['jumlah'];//[$i];
  $data = mysqli_query($koneksi, "select * from sarpras where nama_barang='$nama'");
  $a = mysqli_fetch_array($data);
  $b = $a['jumlah'];
  switch ($status) {
    case 'Masa Pinjam':
      if ($info['status'] = 'Diterima') {
        $kurang = $b - $jumlah;
        mysqli_query($koneksi, "update sarpras set jumlah='$kurang' where nama_barang='$nama'");
      }
      mysqli_query($koneksi, "update peminjaman set status='$status' where id_pinjam='$id'");
      break;
    case 'Selesai':
      if ($info['status'] = 'Masa Pinjam') {
        $tambah = $b + $jumlah;
        mysqli_query($koneksi, "update sarpras set jumlah='$tambah' where nama_barang='$nama'");
      }
      mysqli_query($koneksi, "update peminjaman set status='$status' where id_pinjam='$id'");
      break;
    default:
      mysqli_query($koneksi, "update peminjaman set status='$status' where id_pinjam='$id'");
      break;
  }
  if ($b > 1) {
    mysqli_query($koneksi, "update sarpras set status='Tidak Tersedia' where nama_barang='$nama'");
  } else {
    mysqli_query($koneksi, "update sarpras set status='Tersedia' where nama_barang='$nama'");
  }  
}

// mengalihkan halaman kembali ke index.php
header("location:pinjam_admin.php"); ?>