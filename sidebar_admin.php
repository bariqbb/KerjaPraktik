<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon ">
            <img class="rounded-circle" src="img/logo smada.png" width="45px" height="45px" alt="...">
        </div>
        <div class="sidebar-brand-text mx-3">SIPRANA</div>

    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">


    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePage"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Sarana & Prasarana</span>
                </a>
                <div id="collapsePage" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="tampil_sarpras_admin.php">Data Sarpras</a>
                        <a class="collapse-item" href="tambah_sarpras.php">Tambah Data Sarpras</a>                                                                      
                    </div>
                </div>
            </li>

    <li class="nav-item">
        <a class="nav-link" href="pinjam_admin.php">
            <i class="fas fa-fw fa-user-friends"></i>
            <span>Pengajuan Peminjaman</span></a>
    </li>
    <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-user-friends"></i>
                    <span>User</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="tampil_data.php?role=<?php echo 'admin'; ?>">Data akun admin</a>
                        <a class="collapse-item" href="tampil_data.php?role=<?php echo 'siswa'; ?>">Data akun siswa</a>                                                                      
                        <a class="collapse-item" href="tampil_data.php?role=<?php echo 'umum'; ?>">Data akun umum</a>
                        <a class="collapse-item" href="tambah_user.php">Tambah user</a>
                    </div>
                </div>
            </li>
    <!-- Divider -->
    <hr class="sidebar-divider">


    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
<!-- End of Sidebar -->