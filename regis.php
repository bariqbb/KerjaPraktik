<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistem Peminjaman Sarana Prasarana</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="icon" href="img/logo smada.png">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->

        <br>
        <br>
        <br>
        <br>
        <div class="row justify-content-center">

            <div class="col-xl-7 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-0 d-none d-lg-block"></div>
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Selamat Datang!</h1>
                                    </div>
                                    <form class="user" method="post" action="regis_aksi.php">
                                        <div class="form-group">
                                            <label class="col-sm-4 col-sm-4 control-label">Nama User</label>
                                            <div class="col-sm-12">
                                                <input name="nama_user" type="text" class="form-control"  required />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                        <label class="col-sm-2 col-sm-4 control-label">Username</label>
                                            <div class="col-sm-12">
                                                <input name="username" class="form-control" type="text"  required />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                        <label class="col-sm-2 col-sm-4 control-label">Password</label>
                                            <div class="col-sm-12">
                                                <input name="password" class="form-control" type="text"  required />
                                            </div>
                                        </div>
                                        <input type="submit" value="LOGIN" class="btn btn-primary btn-user btn-block">
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="login.php">Sudah punya akun? Login Sekarang</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>