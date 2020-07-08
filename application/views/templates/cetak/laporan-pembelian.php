<!DOCTYPE html>
<html><head>
    <title>Data PEMBELIAN</title>
</head><body>
    <style type="text/css">
        table {
            border-collapse: collapse;
        }
    </style>
    <h3>DATA PEMBELIAN</h3>
    <table border="1" cellpadding="5">
        <thead>
            <tr>
                <th>NIP</th>
                <th>Kode Barang</th>
                <th>Keterangan</th>
                <th>Status</th>
                <th>Jumlah</th>
                <th>Kepala Gudang</th>
                <th>Kepala Gudang Status</th>
                <th>Manajer</th>
                <th>Manajer Status</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            foreach ($records as $d) : ?>
                <tr>
                    <td><?= $d['nip']; ?></td>
                    <td><?= $d['kode_barang']; ?></td>
                    <td><?= $d['keterangan']; ?></td>
                    <td><?= $d['status']; ?></td>
                    <td><?= $d['jumlah']; ?></td>
                    <td><?= $d['kepala_gudang'] == '' ? 'Belum Dikonfirmasi' : $d['kepala_gudang'] ?></td>
                    <td><?= $d['kepala_gudang_status']; ?></td>
                    <td><?= $d['manajer'] == '' ? 'Belum Dikonfirmasi' : $d['manajer'] ?></td>
                    <td><?= $d['manajer_status']; ?></td>
                    <td><?= $d['tanggal']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body></html>