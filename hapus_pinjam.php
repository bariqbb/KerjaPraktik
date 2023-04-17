<?php
// koneksi database
include 'koneksi.php';

// menangkap data id yang di kirim dari url
$id = $_GET['id_pinjam'];


// menghapus data dari database
$query = mysqli_query($koneksi, "delete from barangpinjam where id_pinjam='$id'");

if ($query) {
    $a = mysqli_query($koneksi, "delete from peminjaman where id_pinjam='$id'");
    echo "<script>alert('Data Berhasil Dihapus!'); window.location = 'pinjam_admin.php'</script>";
} else {
    echo "<script>alert('Data Gagal Dihapus!'); window.location = 'pinjam_admin.php'</script>";
}
