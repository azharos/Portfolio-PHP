<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url ?>" class="brand-link">
        <img src="<?= base_url ?>vendor/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Tabungan Sekolah</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="<?= base_url ?>admin" class="nav-link" id="link">
                        <i class="nav-icon far fa-calendar-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url ?>kelas" class="nav-link" id="link">
                        <i class="nav-icon fas fa-graduation-cap"></i>
                        <p>
                            Kelas
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url ?>siswa" class="nav-link" id="link">
                        <i class="nav-icon far fa-id-card"></i>
                        <p>
                            Siswa
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url ?>dana" class="nav-link" id="link">
                        <i class="nav-icon fas fa fa-book"></i>
                        <p>
                            Tabungan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url ?>auth/logout" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt fa"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>