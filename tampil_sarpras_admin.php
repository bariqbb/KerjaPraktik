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
                            <h6 class="m-0 font-weight-bold text-primary">Data Sarana dan Prasarana SMA Negeri 2 Purwokerto</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>Nama Sarpras</th>
                                            <th>Keterangan</th>
                                            <th>Jenis</th>
                                            <th>Jumlah</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no=0;
                                        $data = mysqli_query($koneksi, "select * from sarpras");
                                        while ($d = mysqli_fetch_array($data)) {
                                            $no++;
                                        ?>
                                            <tr>
                                                <td><?php echo $no ?></td>
                                                <td><?php echo str_replace('_', ' ', $d['nama_barang']); ?></td>
                                                <td><?php echo $d['keterangan']; ?></td>
                                                <td><?php echo $d['jenis']; ?></td>
                                                <td><?php echo $d['jumlah']; ?></td>
                                                <td><?php echo $d['status']; ?></td>
                                                <td>
                                                    <a href="edit_sarpras.php?id_barang=<?php echo $d['id_barang']; ?>" class="btn-sm btn-primary"><span class="fas fa-edit"></a>
                                                    <a href="hapus_sarpras.php?id_barang=<?php echo $d['id_barang']; ?>" class="btn-sm btn-danger"><span class="fas fa-trash"></a>
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