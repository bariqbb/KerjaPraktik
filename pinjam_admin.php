<?php
session_start();
if ($_SESSION['role'] != "admin") {
    header("location:login.php?pesan=belum_login");
}
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<?php include "header.php"; ?>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php include "sidebar_admin.php"; ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <?php include "topbar_admin.php"; ?>


                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Admin Sistem Informasi Peminjaman Sarana
                                Prasarana</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>Nama</th>
                                            <th>Tanggal Pinjam</th>
                                            <th>Tanggal Balik</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $no = 0;
                                        $data = mysqli_query($koneksi, "SELECT peminjaman.id_pinjam, user.nama, peminjaman.tanggal_pinjam, 
                                        peminjaman.tanggal_balik, peminjaman.no_telp, peminjaman.status
                                        FROM peminjaman INNER JOIN user on peminjaman.id_user=user.id_user");
                                        while ($d = mysqli_fetch_array($data)) {
                                            $no++;
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php echo $no ?>
                                                </td>
                                                <td>
                                                    <?php echo $d['nama']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $d['tanggal_pinjam']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $d['tanggal_balik']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $d['status']; ?>
                                                </td>
                                                <td>
                                                    <a href="edit_pinjam.php?id_pinjam=<?php echo $d['id_pinjam']; ?>"
                                                        class="btn-sm btn-primary"><span class="fas fa-edit"></a>
                                                    <a href="printsurat.php?id_pinjam=<?php echo $d['id_pinjam']; ?>"
                                                        class="btn-sm btn-success"><span class="fas fa-file-pdf"></a>
                                                </td>
                                            </tr>
                                </div>
                                <?php
                                        }
                                        ?>
                            </tbody>
                            </table>

                        </div>
                    </div>

                </div>

            </div>
        </div>

        <?php include "footer.php"; ?>

    </div>
    <!-- End of Page Wrapper -->