<footer class="main-footer text-center">
    <strong>Copyright &copy; <?= date("Y") ?>. </strong>
    All rights reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url ?>vendor/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url ?>vendor/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url ?>vendor/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url ?>vendor/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url ?>vendor/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?= base_url ?>vendor/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= base_url ?>vendor/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url ?>vendor/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url ?>vendor/plugins/moment/moment.min.js"></script>
<script src="<?= base_url ?>vendor/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url ?>vendor/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url ?>vendor/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url ?>vendor/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url ?>vendor/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url ?>vendor/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url ?>vendor/dist/js/demo.js"></script>
<script>
    const url = window.location;
    const navlinks = document.querySelectorAll('#link');

    [...navlinks].filter(function(val) {
        return val.href == url;
    }).forEach(val => {
        val.classList.add("active");
    })

    $(function() {
        $('.modal .modal-body .tr').on('click', function() {
            const id = $(this).data('id');
            const nama = $(this).data('nama');
            const kelas = $(this).data('kelas');

            // console.log(id + '-' + nama + '-' + kelas);
            $('#nama').val(nama);
            $('#kelas').val(kelas);
            $('#id').val(id);
            $('.modal').modal('hide');
        })

        $('#tmbhsetoran .siswa-select').on('click', function() {

            const id = $(this).data('id');

            $.ajax({
                url: '<?= base_url ?>dana/ceksaldo',
                method: 'post',
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(data) {
                    $('#saldoskrng').html("Saldo Sekarang : " + data.saldo);
                }
            })

        })

        $('.table .penarikan').on('click', function() {
            $('#nama_penarikan').val($(this).data('nama'));
            $('#saldo_penarikan').val($(this).data('saldo'));
            $('#id_penarikan').val($(this).data('id'));
        })
    })
</script>
</body>

</html>