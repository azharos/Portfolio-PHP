<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $data["title"]; ?></h1>
    </div>

    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Id_Brg</th>
                <th>Nama</th>
                <th>Kode Pembayaran</th>
                <th>Tanggal Pesan</th>
                <th class="text-center" colspan="2">Aksi</th>
            </tr>
        </thead>
        <tbody>

            <?php $no = 1;
            foreach ($data["invoice"] as $inv) : ?>
                <tr>
                    <th scope="row"><?= $no++; ?></th>
                    <td><?= $inv["id_brg"]; ?></td>
                    <td><?= $inv["nama"]; ?></td>
                    <td><?= $inv["kode_pembayaran"]; ?></td>
                    <td><?= $inv["tgl_pesan"]; ?></td>
                    <td class="text-center">
                        <a class="btn btn-sm btn-success" href="<?= base_url ?>invoice/detail/<?= $inv["id"] ?>"><i class="fas fa-search-plus"></i></a>
                    </td>
                    <td class="text-center">
                        <a class="btn btn-sm btn-danger" href="<?= base_url ?>invoice/hapus/<?= $inv["id"] ?>"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

    <?php if (empty($data["invoice"])) : ?>
        <h3>Belum Ada Pesanan</h3>
    <?php endif ?>
</div>