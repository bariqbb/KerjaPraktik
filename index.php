<!DOCTYPE html>
<html lang="en">
<?php include "header.php"; ?>
<?php
session_start();
if ($_SESSION['role'] != "admin") {
  header("location:tampil_data.php?pesan=belum_login");
}
include "koneksi.php";
?>

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <?php include "sidebar_admin.php"; ?>
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
        <?php include "topbar_admin.php"; ?>
        <div class='row mb-5 ml-4 mr-3'>
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                      Menunggu Konfirmasi
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                      <?php $data = mysqli_query($koneksi, "select * from peminjaman where status='Menunggu Konfirmasi'");
                      $d = mysqli_num_rows($data);
                      echo $d;
                      ?>
                    </div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                      Menunggu Pengambilan
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                      <?php $data = mysqli_query($koneksi, "select * from peminjaman where status='Diterima'");
                      $d = mysqli_num_rows($data);
                      echo $d;
                      ?>
                    </div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-clock fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                      Masa Peminjaman
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                      <?php $data = mysqli_query($koneksi, "select * from peminjaman where status='Masa Peminjaman'");
                      $d = mysqli_num_rows($data);
                      echo $d;
                      ?>
                    </div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                      Sarpras Tidak Tersedia
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                      <?php $data = mysqli_query($koneksi, "select * from sarpras where status='Tidak Tersedia'");
                      $d = mysqli_num_rows($data);
                      echo $d;
                      ?>
                    </div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-bell fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <center><img src="img/logo smada.png" alt="smadalogo" width="150px"> </center>
        <br>
        <h2>
          <center><b>SISTEM INFORMASI PEMINJAMAN SARANA PRASARANA </b> </center>
        </h2>
        <h2>
          <center><b>SMA NEGERI 2 PURWOKERTO</b> </center>
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