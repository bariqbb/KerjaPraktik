<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "header.php";
    include "koneksi.php";
    session_start();
    if ($_SESSION['role'] != "admin") {
        header("location:tampil_data.php?pesan=belum_login");
    } ?>

</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php include "sidebar_admin.php"; ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <?php include "topbar_admin.php";
                $id = $_GET['id_pinjam'];
                $query = mysqli_query($koneksi, "select * from peminjaman where id_pinjam='$id'");
                $data = mysqli_fetch_array($query);
                
                ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DATA PEMINJAMAN </h6>
                        </div>
                        <div class="card-body">

                            <!-- Main content -->
                            <form class="form-horizontal style-form" style="margin-top: 10px;"
                                action="editpinjam_aksi.php" method="post" enctype="multipart/form-data" name="form1"
                                id="form1">
                                <div class="row">
                                <div class="col-sm-6">
                                <div class="col-sm-8">
                                    <input name="id_pinjam" type="hidden" id="id_user" class="form-control"
                                        value="<?php echo $data['id_pinjam']; ?>" />
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-12 col-sm-2 control-label">Tanggal Pinjam</label>
                                    <div class="col-sm-12">
                                        <input name="tglpinjam" type="date" class="form-control"
                                            value="<?php echo $data['tanggal_pinjam'] ?>" disabled required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-12 col-sm-4 control-label">Tanggal Balik</label>
                                    <div class="col-sm-12">
                                        <input name="tglbalik" class="form-control" type="date"
                                            value="<?php echo $data['tanggal_balik'] ?>" disabled required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-12 col-sm-4 control-label">Penanggung Jawab</label>
                                    <div class="col-sm-12">
                                        <input name="pj" class="form-control" type="text"
                                            placeholder="Masukkan Nama Lengkap" value="<?php echo $data['pj'] ?>"
                                            disabled required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-12 col-sm-4 control-label">No Telepon</label>
                                    <div class="col-sm-12">
                                        <input name="notelp" class="form-control" type="number"
                                            value="<?php echo $data['no_telp'] ?>" disabled required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-12 col-sm-4 control-label">Status</label>
                                    <div class="col-sm-12">
                                        <select class="form-control" name="status"
                                            placeholder="<?php echo $data['status']; ?>" required>
                                            <option value="Menunggu Konfirmasi" <?= $data['status'] == 'Menunggu Konfirmasi' ? 'selected' : '' ?>>Menunggu Konfirmasi</option>
                                            <option value="Diterima" <?= $data['status'] == 'Diterima' ? 'selected' : '' ?>>Diterima</option>
                                            <option value="Ditolak" <?= $data['status'] == 'Ditolak' ? 'selected' : '' ?>>
                                                Ditolak</option>
                                            <option value="Masa Pinjam" <?= $data['status'] == 'Masa Pinjam' ? 'selected' : '' ?>>Masa Pinjam</option>
                                            <option value="Selesai" <?= $data['status'] == 'Selesai' ? 'selected' : '' ?>>
                                                Selesai</option>
                                        </select>
                                    </div>
                                </div>
                                </div>
                                <div class='table-responsive col-sm-6'>
                                <label class="col-sm-12 col-sm-4 control-label">Sarana/Prasarana yang dipinjam</label>
                                    <table class="table table-bordered col-sm-6" id="dataTable" width="50%"
                                        cellspacing="0">
                                        <?php 
                                        $p = mysqli_query($koneksi, "select * from barangpinjam where id_pinjam='$id'");
                                        $d = mysqli_fetch_array($p);
                                        $sarpras = count($d);
                                        $barang = mysqli_query($koneksi, "select * from barangpinjam where id_pinjam='$id'");
                                        $no=0;
                                        ?>
                                        <tr>
                                            <th>NO</th>
                                            <th>Nama Sarpras</th>
                                            <th>Jumlah</th>
                                        </tr>
                                        <?php
                                        while ($d = mysqli_fetch_array($barang)) {
                                            $no++;
                                        ?>
                                            <tr>
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $d['nama_barang']; ?></td>
                                                <td><?php echo $d['jumlah']; ?></td>
                                            </tr>
                                        <?php } ?>
                                    </table>
                                </div>
                                </div>
                                <div class="form-group" style="margin-bottom: 20px;">
                                    <label class="col-sm-2 col-sm-4 control-label"></label>
                                    <div class="col-sm-6">
                                        <input type="submit" value="Simpan" class="btn btn-sm btn-primary" />
                                    </div>
                                </div>
                                <div style="margin-top: 20px;"></div>
                            </form>
                        </div>
                    </div>
                    <div class='col-sm-6'>

                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
            <?php include "footer.php"; ?>
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
    <script>
        $(document).ready(function () {
            $('#js-example-basic-multiple').select2();
        });
    </script>
</body>

</html>