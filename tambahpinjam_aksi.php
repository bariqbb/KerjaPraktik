<?php
// koneksi database
include 'koneksi.php';

// menangkap data yang di kirim dari form
$iduser = $_POST['id_user'];
$tglpinjam = $_POST['tglpinjam'];
$tglbalik = $_POST['tglbalik'];
$pj = $_POST['pj'];
$notelp = $_POST['notelp'];
$sarpras = $_POST['sarpras'];
$jumlah = $_POST['jumlah'];


// menginput data ke database
$insert = mysqli_query($koneksi, "insert into peminjaman values('','$iduser','$tglpinjam','$tglbalik','$pj','$notelp','Menunggu Konfirmasi')");
if ($insert) {
  $idpinjam = mysqli_insert_id($koneksi);
  for ($i=0; $i < count($sarpras); $i++) { 
    $sarpras2 = $_POST['sarpras'][$i];
    $jumlah2 = $_POST['jumlah'][$i];
    mysqli_query($koneksi,"insert into barangpinjam values('$idpinjam','$sarpras2','$jumlah2')");
  }
}





// mengalihkan halaman kembali ke index.php

echo "<script>alert('Peminjaman Berhasil Diajukan!'); window.location = 'pinjam_umum.php'</script>";

?>