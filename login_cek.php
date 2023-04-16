<?php
// mengaktifkan session php
session_start();

// menghubungkan dengan koneksi
include 'koneksi.php';

// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = $_POST['password'];



// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($koneksi, "select * from user where username='$username' and password='$password'");

// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);

if ($cek > 0) {
    $cekrole = mysqli_fetch_array($data);
    $role = $cekrole['role'];
    $nama = $cekrole['nama'];
    $id = $cekrole['id_user'];
    if($role=='admin'){
        $_SESSION['status'] = "login";
        $_SESSION['nama'] = $nama;
        $_SESSION['id'] = $id;
        $_SESSION['role'] = $role;
        header("location:index.php");
    }elseif($role == 'siswa'){
        $_SESSION['status'] = "login";
        $_SESSION['nama'] = $nama;
        $_SESSION['id'] = $id;
        $_SESSION['role'] = $role;
        header("location:dashboard.php");
    }elseif($role =='umum'){
        $_SESSION['status'] = "login";
        $_SESSION['nama'] = $nama;
        $_SESSION['id'] = $id;
        $_SESSION['role'] = $role;
        header("location:input_pinjam.php");
    }else {
        header("location:login.php?pesan=gagal");
    }
    
} else {
    header("location:login.php?pesan=gagal");
}
?>