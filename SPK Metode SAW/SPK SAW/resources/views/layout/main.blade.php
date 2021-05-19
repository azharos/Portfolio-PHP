<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Aplikasi SPK Metode SAW</title>
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="bg-light border-right" id="sidebar-wrapper">
                <div class="sidebar-heading">
                    APLIKASI SPK
                    <br>METODE SAW
                </div>
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action bg-light" href="/">Dashboard</a>
                    <a class="list-group-item list-group-item-action bg-light" href="/kandidat">Kandidat</a>
                    <a class="list-group-item list-group-item-action bg-light" href="/kriteria">Kriteria</a>
                    <a class="list-group-item list-group-item-action bg-light" href="/hasil">Hasil</a>
                </div>
            </div>
            <!-- Page Content-->
            <div id="page-content-wrapper">
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <button class="btn btn-primary btn-sm" id="menu-toggle"><i class="fas fa-bars"></i></button>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                            <li class="nav-item"><a class="nav-link" href="/logout">Logout</a></li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid mb-3">
                    @yield('container')
                </div>

                {{-- <footer class="fixed-bottom" style="bottom: 20px">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; SPK Metode SAW <?= date('Y') ?></span>
                        </div>
                    </div>
                </footer> --}}

                <footer class="sticky-footer">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; SPK Metode SAW <?= date('Y') ?></span>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('js/scripts.js') }}"></script>
    </body>
</html>
