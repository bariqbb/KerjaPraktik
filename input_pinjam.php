<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "header.php";
    include "koneksi.php";
    session_start();
    if ($_SESSION['status'] != "login") {
        header("location:tampil_data.php?pesan=belum_login");
    } ?>

</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php include "sidebar_umum.php"; ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <?php include "topbar_admin.php"; ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Ajukan Peminjaman</h1>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-danger">PASTIKAN JUMLAH SARPRAS YANG DIPINJAM TIDAK MELEBIHI SARPRAS YANG ADA !
                            </h6>
                        </div>
                        <div class="card-body">

                            <!-- Main content -->
                            <form class="form-horizontal style-form" style="margin-top: 10px;"
                                action="tambahpinjam_aksi.php" method="post" enctype="multipart/form-data" name="form1"
                                id="form1">
                                <div class="col-sm-8">
                                    <input name="id_user" type="hidden" class="form-control"
                                        value="<?php echo $_SESSION['id']; ?>" />
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Tanggal Pinjam</label>
                                    <div class="col-sm-6">
                                        <input name="tglpinjam" type="date" class="form-control" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-4 control-label">Tanggal Balik</label>
                                    <div class="col-sm-6">
                                        <input name="tglbalik" class="form-control" type="date" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-4 control-label">Penanggung Jawab</label>
                                    <div class="col-sm-6">
                                        <input name="pj" class="form-control" type="text"
                                            placeholder="Masukkan Nama Lengkap" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-4 control-label">No Telepon</label>
                                    <div class="col-sm-6">
                                        <input name="notelp" class="form-control" type="number" required />
                                    </div>
                                </div>
                                <div class="add-row">
                                    <label class="col-sm-2 col-sm-4 control-label">Sarana Prasarana</label>
                                    <div class="form-group select-space">
                                        <div class="row">
                                            <div class="col-sm-5">
                                                <Select name="sarpras[]" class="form-control"
                                                    id='js-example-basic-single' required>
                                                    <?php
                                                    if ($_SESSION['role'] == 'siswa' || $_SESSION['role'] == 'admin') {
                                                        $data = mysqli_query($koneksi, "select * from sarpras where status='Tersedia'");
                                                        while ($d = mysqli_fetch_array($data)) {
                                                            ?>
                                                            <option value=<?php echo $d['nama_barang'] ?>>
                                                                <?php echo $d['nama_barang']; ?></option>
                                                        <?php }
                                                    } elseif ($_SESSION['role'] == 'umum') {
                                                        $data = mysqli_query($koneksi, "select * from sarpras where status='Tersedia' and keterangan='Bebas'");
                                                        while ($d = mysqli_fetch_array($data)) { ?>
                                                            <option value=<?php echo $d['nama_barang'] ?>>
                                                                <?php echo $d['nama_barang'] ?></option>
                                                        <?php }
                                                    } ?>
                                                </Select>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-2">
                                                    <input type="number" name="jumlah[]" placeholder="Jumlah" min='0' >
                                                </div>
                                            </div>
                                            <div class="col-sm-2 col-sm-4">
                                                <button
                                                    class="btn btn-sm btn-primary col-sm-3 btn-add-row">Tambah</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group" style="margin-bottom: 20px;">
                                    <label class="col-sm-2 col-sm-4 control-label"></label>
                                    <div class="col-sm-8">
                                        <input type="submit" value="Simpan" class="btn btn-sm btn-primary" />
                                    </div>
                                </div>
                                <div style="margin-top: 20px;"></div>
                            </form>

                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
            </div>
            <div class="options-values" data-optionsvalues='
                {
                    "data": [
                        <?php
                        if ($_SESSION['role'] == 'siswa' || $_SESSION['role'] == 'admin') {
                            $data = mysqli_query($koneksi, "select * from sarpras where status='Tersedia'");
                            while ($d = mysqli_fetch_array($data)) {
                        ?>
                                "<?= $d["nama_barang"] ?>",
                        <?php
                            }
                        } elseif ($_SESSION['role'] == 'umum') {
                            $data = mysqli_query($koneksi, "select nama_barang from sarpras where status='Tersedia' and keterangan='Bebas'");
                            while ($d = mysqli_fetch_array($data)) { 
                        ?>
                               "<?= $d["nama_barang"] ?>", 
                        <?php
                            }
                        } ?>
                        "_"
                    ]

                }
            '></div>
            <!-- End of Main Content -->
            <?php include "footer.php"; ?>
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
    <script>
        $(document).ready(function () {
            const optionsValuesDiv = document.querySelector(".options-values")
            const optionsValues = (JSON.parse(optionsValuesDiv.dataset.optionsvalues)).data
            
            optionsValues.pop()

            // console.log(optionsValues)

            let options = ``

            optionsValues.forEach((optionsValue, index) => {
                options += `
                <option value=${optionsValue}>
                    ${optionsValue}
                </option>
                `
            })

            const printSelect = (rowCount) => `
            <div class="row" id="row-count-${rowCount}">
                <div class="col-sm-5">
                    <Select name="sarpras[]" class="form-control"
                        id='js-example-basic-single' required>
                        ${options}
                    </Select>
                </div>
                <div class="form-group">
                    <div class="col-sm-2">
                        <input type="number" name="jumlah[]" placeholder="Jumlah" min='0'>
                    </div>
                </div>
                <div class="col-sm-2 col-sm-4">
                    <button class="btn btn-sm btn-danger col-sm-3 btn-row-remove" data-remove="row-count-${rowCount}">
                        X
                    </button>
                </div>
            </div>
            `
            
            $('#js-example-basic-single').select2();
            
            // console.log(`options : ${options}`)

            let rowCount = 1
            $(".btn-add-row").click(function (e) {
                e.preventDefault();
                $(".add-row .select-space").append(printSelect(rowCount))
                rowCount++
            });

            const selectSpace = document.querySelector(".add-row .select-space")
            selectSpace.addEventListener('click', (e) => {
                e.preventDefault()
                if (e.target.classList.contains("btn-row-remove")) {
                    // console.log(e.target.classList.contains("btn-row-remove"), e.target.dataset.remove)
                    document.getElementById(e.target.dataset.remove).remove()
                    // console.log(row)
                }
            })
        });
    </script>
</body>

</html>