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
                <br>
                <br>
                <br>
                <center><img src="img/logo smada.png" alt="smadalogo" width="150px"> </center>
                <br>
                <h2>
                    <center><b>SISTEM INFORMASI PEMINJAMAN SARANA PRASARANA </b> </center>
                </h2>
                <h2>
                    <center><b>SMA NEGERI 2 PURWOKERTO</b> </center>
                </h2>
                <h2>
                    <center><a href="../index.php"><button class="btn btn-primary" type="button" href="../index.php">Lihat Web</button></a></center>
                </h2>

            </div>
            <!-- End of Main Content -->
            <?php include "footer.php"; ?>
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
</body>

</html>