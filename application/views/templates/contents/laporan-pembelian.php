<section id="content">
    <div class="page page-tables-datatables">


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
                            <div class="col-md-12">
                                <form class="form-inline" method="GET">
                                    <label class="" for="inlineFormInputName2">Start Date</label>
                                    <input type="date" name="start_date" class="form-control date mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Date Start">

                                    <label class="" for="inlineFormInputGroupUsername2">End Date</label>
                                    <div class="input-group mb-2 mr-sm-2">
                                        <input type="date" name="end_date" class="form-control date" id="inlineFormInputGroupUsername2" placeholder="Date End">
                                    </div>
                                    <button type="submit" class="btn btn-primary mb-2">Cari</button>
                                </form>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-md-12">

                                <form class="form-inline" method="get">
                                    <label class="my-1 mr-2" for="select">Filter :</label>
                                    <select class="custom-select my-1 mr-sm-2" name="filter" id="select">
                                        <option selected>==Pilih==</option>
                                        <option value="accepted">Accepted</option>
                                        <option value="rejected">Rejected</option>
                                        <option value="pending">Pending</option>
                                        <option value="today">Today</option>
                                        <option value="last-week">Last Week</option>
                                        <option value="last-month">Last Month</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary mb-2">Filter</button>

                            </div>
                        </div>
                        <br>
                        <?php if (!empty($this->input->get('filter'))) : ?>
                            <a style="float: right;" href="<?= base_url('laporan-pembelian/cetak?filter=') . $this->input->get('filter') ?>" class="btn btn-danger">Export Pdf</a>
                        <?php elseif (!empty($this->input->get('start_date')) != '' && !empty($this->input->get('end_date')) != '') : ?>
                            <a style="float: right;" href="<?= base_url('laporan-pembelian/cetak?start_date=' . $this->input->get('start_date') . '&end_date=' . $this->input->get('end_date')) ?>" class="btn btn-danger">Export Pdf</a>
                        <?php else : ?>
                            <a style="float: right;" href="<?= base_url('laporan-pembelian/cetak') ?>" class="btn btn-danger">Export Pdf</a>
                        <?php endif; ?>
                        <style type="text/css">
                            table .thead-dark th {
                                color: #fff;
                                background-color: #343a40;
                                border-color: #454d55;
                                vertical-align: middle !important;
                            }
                        </style>
                        <table class="table table-custom" style="margin-top: 4rem!important;" id="advanced-usage">
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
<!-- Splash Modal -->