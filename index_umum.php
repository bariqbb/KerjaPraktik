<!DOCTYPE html>
<html lang="en">
<?php include "header.php"; ?>
<?php
session_start();
if ($_SESSION['status'] != "login") {
    header("location:tampil_data.php?pesan=belum_login");
}
include "koneksi.php";
?>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php include "sidebar_umum.php"; ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <?php include "topbar_admin.php"; ?>
                <br>
                <center><img src="img/logo smada.png" alt="smadalogo" width="100px"> </center>
                <br>
                <h4>
                    <center><b>SISTEM INFORMASI PEMINJAMAN SARANA PRASARANA </b> </center>
                </h4>
                <h4>
                    <center><b>SMA NEGERI 2 PURWOKERTO</b> </center>
                </h4>
                <div class='container mr-4 ml-2 mt-4'>
                <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                      Urutan Peminjaman
                    </h6>
                  </div>
                  <div class="card-body">
                    1. Memastikan sarana/prasarana tersedia<br> 
                    2. Mengisi tata peminjaman pada halaman Ajukan Peminjaman<br>
                    3. Menunggu peminjaman diterima<br>
                    4. Jika peminjaman diterma, print template surat yang sudah disediakan<br>
                    5. Serahkan surat yang sudah diprint ke pihak sekolah dan ambil sarana/prasarana yang akan dipinjam<br>
                    6. Kembalikan sarana/prasarana sesuai waktu yang ditentukan
                  </div>
                </div>

            </div>
            <!-- End of Main Content -->
            <?php include "footer.php"; ?>
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
</body>

</html>