<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Tabungan</title>
    <style>
        tr td {
            text-align: center;
        }

        .ttd {
            float: right;
        }
    </style>
</head>

<body>
    <h1 style="text-align: center;">Data Tabungan</h1>
    <table border=1 cellspacing=0 cellpadding=5 style="width: 100%;">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Saldo</th>
            <th>Update Date</th>
        </tr>
        <?php $no = 1;
        foreach ($data['tabungan'] as $tbg) : ?>
            <tr>
                <th><?= $no++; ?></th>
                <td><?= $tbg['nama_siswa'] ?></td>
                <td><?= $tbg['kelas'] ?></td>
                <td>Rp <?= number_format($tbg['saldo'], 0, ',', '.') ?></td>
                <td><?= $tbg['tanggal'] ?></td>
            </tr>
        <?php endforeach ?>
    </table>

    <div class="ttd">
        <h3 style="text-align: center;">Admin Penyetor</h3>
        <br><br><br>
        <h3 style="text-align: center;">..........................</h3>
    </div>

    <script>
        window.print();
    </script>
</body>

</html>