<?php
// koneksi database
include 'koneksi.php';

// menangkap data id yang di kirim dari url
$id = $_GET['id_user'];
$role = $_GET['role'];

// menghapus data dari database
$query = mysqli_query($koneksi, "delete from user where id_user='$id'");
if ($query) {
    echo "<script>alert('Data Berhasil Dihapus!'); window.location = 'tampil_data.php?role=$role'</script>";
} else {
    echo "<script>alert('Data Gagal Dihapus!'); window.location = 'tampil_data.php?role=$role'</script>";
}
