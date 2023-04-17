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

while ($d = mysqli_fetch_array($query)) {
  $nama = str_replace('_', ' ', $d['nama_barang']);
  $jumlah = $d['jumlah'];
  $data = mysqli_query($koneksi, "select * from sarpras where nama_barang='$nama'");
  $a = mysqli_fetch_array($data);
  $b = $a['jumlah'];
  switch ($status) {
    case 'Masa Pinjam':
      if ($info['status'] == 'Diterima') {
        $kurang = $b - $jumlah;
        switch ($kurang) {
          case '0':
            mysqli_query($koneksi, "update sarpras set status='Tidak Tersedia' where nama_barang='$nama'");
            break;
        
          default:
            mysqli_query($koneksi, "update sarpras set status='Tersedia' where nama_barang='$nama'");
            break;
        }
        mysqli_query($koneksi, "update sarpras set jumlah='$kurang' where nama_barang='$nama'");
      }
      mysqli_query($koneksi, "update peminjaman set status='$status' where id_pinjam='$id'");
      break;
    case 'Selesai':
      if ($info['status'] == 'Masa Pinjam') {
        $tambah = $b + $jumlah;
        switch ($tambah) {
          case '0':
            mysqli_query($koneksi, "update sarpras set status='Tidak Tersedia' where nama_barang='$nama'");
            break;
        
          default:
            mysqli_query($koneksi, "update sarpras set status='Tersedia' where nama_barang='$nama'");
            break;
        }
        mysqli_query($koneksi, "update sarpras set jumlah='$tambah' where nama_barang='$nama'");
      }
      mysqli_query($koneksi, "update peminjaman set status='$status' where id_pinjam='$id'");
      break;
    default:
      mysqli_query($koneksi, "update peminjaman set status='$status' where id_pinjam='$id'");
      break;
  }
  
}

// mengalihkan halaman kembali ke index.php
header("location:pinjam_admin.php"); ?>