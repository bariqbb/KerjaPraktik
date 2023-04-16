<?php
// koneksi database
include 'koneksi.php';

// menangkap data id yang di kirim dari url
$id = $_GET['id_barang'];


// menghapus data dari database
$query = mysqli_query($koneksi, "delete from sarpras where id_barang='$id'");
if ($query) {
    echo "<script>alert('Data Berhasil Dihapus!'); window.location = 'tampil_sarpras_admin.php'</script>";
} else {
    echo "<script>alert('Data Gagal Dihapus!'); window.location = 'tampil_sarpras_admin.php'</script>";
}
