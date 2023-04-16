<!DOCTYPE html>
<html lang="en">
<?php include "header.php";
session_start();
if ($_SESSION['role'] != "admin") {
    header("location:tampil_data.php?pesan=belum_login");
} ?>

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
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Edit Data Sarpras</h1>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">

                        <div class="card-body">

                            <?php
                            include 'koneksi.php';
                            $id = $_GET['id_barang'];
                            $query = mysqli_query($koneksi, "select * from sarpras where id_barang='$id'");
                            $data = mysqli_fetch_array($query);
                            ?>

                            <!-- </div> -->
                            <div class="panel-body">
                                <form class="form-horizontal style-form" style="margin-top: 20px;"
                                    action="editsarpras_aksi.php" method="post" enctype="multipart/form-data"
                                    name="form1" id="form1">
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">ID Sarpras</label>
                                        <div class="col-sm-6">
                                            <input name="id_barang" type="text" id="id_user" class="form-control"
                                                value="<?php echo $data['id_barang']; ?>" readonly />
                                            <!--<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Nama Sarpras</label>
                                        <div class="col-sm-6">
                                            <input name="nama_barang" type="text" id="nama" class="form-control"
                                                value="<?php echo $data['nama_barang']; ?>" required />
                                        </div>
                                    </div>
                                    <label class="col-sm-2 col-sm-4 control-label">Keterangan</label>
                                    <div class="col-sm-6">
                                        <select name="keterangan" class="form-control" required
                                            value="<?php echo $data['keterangan']; ?>">
                                            <option value="Terbatas" <?= $data['keterangan'] == 'Terbatas' ? 'selected' : '' ?>>Terbatas</option>
                                            <option value="Bebas" <?= $data['keterangan'] == 'Bebas' ? 'selected' : '' ?>>
                                                Bebas</option>
                                        </select>
                                    </div>
                                    <label class="col-sm-2 col-sm-4 control-label">Jenis</label>
                                    <div class="col-sm-6">
                                        <select name="jenis" class="form-control" required
                                            placeholder="<?php echo $data['jenis']; ?>">
                                            <option value="Ruangan" <?= $data['jenis'] == 'Ruangan' ? 'selected' : '' ?>>
                                                Ruangan</option>
                                            <option value="Barang" <?= $data['jenis'] == 'Barang' ? 'selected' : '' ?>>
                                                Barang</option>
                                        </select>
                                    </div>
                                    <label class="col-sm-2 col-sm-2 control-label">Jumlah</label>
                                    <div class="col-sm-6">
                                        <input name="jumlah" type="number" id="jumlah" class="form-control"
                                            value="<?php echo $data['jumlah']; ?>" required />
                                    </div>
                                    <label class="col-sm-2 col-sm-4 control-label">Status</label>
                                    <div class="col-sm-6">
                                        <select name="status" class="form-control" required
                                            placeholder="<?php echo $data['status']; ?>">
                                            <option value="Tersedia" <?= $data['status'] == 'Tersedia' ? 'selected' : '' ?>>Tersedia</option>
                                            <option value="Tidak Tersedia" <?= $data['status'] == 'Tidak Tersedia' ? 'selected' : '' ?>>Tidak Tersedia</option>
                                        </select>
                                    </div>
                                    <div class="form-group" style="margin-bottom: 20px;">
                                        <label class="col-sm-2 col-sm-2 control-label"></label>
                                        <div class="col-sm-8">
                                            <input type="submit" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
                                        </div>
                                    </div>
                                    <div style="margin-top: 20px;"></div>
                                </form>
                            </div>

                        </div>
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
</body>

</html>