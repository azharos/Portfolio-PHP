<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="{{ asset('assets/css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('app') }}">
                <div class="sidebar-brand-icon rotate-n-0">
                    <i class="fas fa-archway"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Antrian Online</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="{{ url('app') }}">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            
            @if (session('level') == 'admin')
    
                <!-- Nav Item -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('app/profile') }}">
                        <i class="fas fa-fw fa-user-alt"></i>
                        <span>Profile</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('loket') }}">
                        <i class="fas fa-fw fa-inbox"></i>
                        <span>Detail Loket</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('laporan') }}">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Laporan</span></a>
                </li>
            @else
                <!-- Nav Item -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('app/profile') }}">
                        <i class="fas fa-fw fa-user-alt"></i>
                        <span>Profile</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('loket') }}">
                        <i class="fas fa-fw fa-inbox"></i>
                        <span>Loket</span></a>
                </li>
            @endif

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="{{ url('logout') }}">
                    <i class="fas fa-sign-out-alt"></i>        
                    <span>Logout</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column" style="background-color: #F3F5F9">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <div class="d-none d-sm-inline-block my-auto user-select-none">
                        <i class="fas fa-calendar-alt"></i>
                        <span id="hari"></span>,&nbsp;<span id="tgl"></span>&nbsp;<span id="bulan"></span>&nbsp;<span id="thn"></span>
                    </div>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a href="{{ url('logout') }}" class="text-dark" style="text-decoration: none">
                                LogOut
                                <i class="fas fa-sign-out-alt"></i>
                            </a>
                        </li>
                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    @yield('content')

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Antrian Online <?= date('Y') ?></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.j') }}s"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('assets/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('assets/vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    {{-- <script src="{{ asset('assets/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('assets/js/demo/chart-pie-demo.js') }}"></script> --}}
    <script>
        $(function() {
            /** add active class and stay opened when selected */
            var url = window.location;

            // for sidebar menu entirely but not cover treeview
            $('.nav-item a').filter(function() {
                return this.href == url;
            }).parent().addClass('active');
        });

        // Hari
        const day = new Date().getDay();
        const hr = ['Minggu','Senin','Selasa','Rabu','Kamis',"Jum'at",'Sabtu'];
        // console.log(hari[day]);

        // Tanggal
        const date = new Date().getDate();
        // console.log(date);

        // Bulan
        const m = new Date().getMonth();
        const bln = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
        // console.log(bln[m]);

        // Tahun
        const y = new Date().getFullYear();
        // console.log(y);

        document.getElementById('hari').innerHTML = hr[day];
        document.getElementById('tgl').innerHTML = date;
        document.getElementById('bulan').innerHTML = bln[m];
        document.getElementById('thn').innerHTML = y;

    </script>

</body>

</html>