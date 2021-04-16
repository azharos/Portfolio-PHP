<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?= $data["title"]; ?></h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-5">
                    <?= Session::flash(); ?>
                </div>
            </div>

            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?= $data["jml_siswa"]; ?></h3>

                            <p>Jumlah Siswa</p>
                        </div>
                        <div class="icon">
                            <i class="nav-icon far fa-id-card"></i>
                        </div>
                        <a href="<?= base_url ?>siswa" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?= $data["jml_tbg"]; ?></h3>

                            <p>Jumlah Tabungan</p>
                        </div>
                        <div class="icon">
                            <i class="nav-icon fas fa fa-book"></i>
                        </div>
                        <a href="<?= base_url ?>dana" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?= $data["jml_saldo"]['jsaldo']; ?></h3>

                            <p>Jumlah Saldo</p>
                        </div>
                        <div class="icon">
                            <i class="nav-icon fas fa-money-bill-wave-alt"></i>
                        </div>
                        <a href="<?= base_url ?>dana" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->