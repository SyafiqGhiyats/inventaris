<section id="content">
    <div class="page page-tables-datatables">

        <div class="pageheader">

            <div class="page-bar">

                <ul class="page-breadcrumb">
                    <li>
                        <a href="<?= base_url() ?>"><i class="fa fa-home"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="#">Permintaan</a>
                    </li>
                </ul>

            </div>

        </div>

        <!-- row -->
        <div class="row">
            <!-- col -->
            <div class="col-md-12">



                <!-- tile -->
                <section class="tile">

                    <!-- tile header -->
                    <div class="tile-header dvd dvd-btm">
                        <h1 class="custom-font">Data <strong class="text-capitalize"><?= str_replace('-', ' ', $title) ?></strong></h1>

                    </div>
                    <!-- /tile header -->

                    <!-- tile body -->
                    <div class="tile-body" style="overflow: auto;padding:10px;">
                        <div class="row">
                            <div class="col-md-6">
                                <div id="tableTools"></div>
                            </div>
                        </div>
                        <br>
                        <style type="text/css">
                            table .thead-dark th {
                                color: #fff;
                                background-color: #343a40;
                                border-color: #454d55;
                                vertical-align: middle !important;
                            }
                        </style>
                        <table class="table table-custom" id="advanced-usage">
                            <thead class="thead-dark">
                                <tr>
                                    <th>NIP</th>
                                    <th>Kode Barang</th>
                                    <th>Keterangan</th>
                                    <th>Status</th>
                                    <th>Jumlah</th>
                                    <th>Kep.Gudang</th>
                                    <th>Kep.Gudang Status</th>
                                    <th>Manajer</th>
                                    <th>Manajer Status</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <?php $no = 1;
                            foreach ($data as $d) : ?>
                                <tbody>
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
                                </tbody>

                            <?php $no++;
                            endforeach; ?>
                        </table>
                    </div>
                    <!-- /tile body -->

                </section>
                <!-- /tile -->

            </div>
            <!-- /col -->
        </div>
        <!-- /row -->

    </div>

</section>