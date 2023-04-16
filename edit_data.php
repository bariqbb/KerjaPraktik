<!DOCTYPE html>
<html lang="en">
<?php include "header.php"; 
session_start();
if ($_SESSION['role'] != "admin") {
    header("location:tampil_data.php?pesan=belum_login");
}?>

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
                        <h1 class="h3 mb-0 text-gray-800">Edit Data Akun</h1>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Edit Data</h6>
                        </div>
                        <div class="card-body">

                            <?php
                            include 'koneksi.php';
                            $id = $_GET['id_user'];
                            $query = mysqli_query($koneksi, "select * from user where id_user='$id'");
                            $data  = mysqli_fetch_array($query);
                            ?>

                            <!-- </div> -->
                            <div class="panel-body">
                                <form class="form-horizontal style-form" style="margin-top: 20px;" action="edituser_aksi.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">ID User</label>
                                        <div class="col-sm-8">
                                            <input name="id_user" type="text" id="id_user" class="form-control" value="<?php echo $data['id_user']; ?>" readonly />
                                            <!--<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Nama User</label>
                                        <div class="col-sm-8">
                                            <input name="nama" type="text" id="nama" class="form-control" value="<?php echo $data['nama']; ?>" required />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Username</label>
                                        <div class="col-sm-8">
                                            <input name="username" class="form-control" id="alamat" type="text" value="<?php echo $data['username']; ?>" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Password</label>
                                        <div class="col-sm-8">
                                            <input name="password" class="form-control" id="deskripsi" type="text" value="<?php echo $data['password']; ?>" required />
                                        </div>
                                    </div>
                                    <input type="hidden" name="role" value="<?= $data['role'] ?>">
                                    <div class="form-group">
                                    <label class="col-sm-2 col-sm-4 control-label">Role</label>
                                        <div class="col-sm-6">
                                            <select class="form-control" required disabled>
                                                <option value="admin" <?= $data['role'] == 'admin' ? 'selected' : '' ?>>Admin</option>
                                                <option value="siswa" <?= $data['role'] == 'siswa' ? 'selected' : '' ?>>Siswa</option>
                                                <option value="umum" <?= $data['role'] == 'umum' ? 'selected' : '' ?>>Umum</option>
                                            </select>
                                        </div>
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