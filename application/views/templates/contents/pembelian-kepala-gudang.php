<section id="content">
    <div class="page page-tables-datatables">

        <div class="pageheader">

            <div class="page-bar">

                <ul class="page-breadcrumb">
                    <li>
                        <a href="<?= base_url() ?>"><i class="fa fa-home"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="#">Pembelian</a>
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
                        <ul class="controls">
                            <li class="dropdown">

                                <a role="button" tabindex="0" class="dropdown-toggle settings" data-toggle="dropdown">
                                    <i class="fa fa-cog"></i>
                                    <i class="fa fa-spinner fa-spin"></i>
                                </a>

                                <ul class="dropdown-menu pull-right with-arrow animated littleFadeInUp">
                                    <li>
                                        <a role="button" tabindex="0" class="tile-toggle">
                                            <span class="minimize"><i class="fa fa-angle-down"></i>&nbsp;&nbsp;&nbsp;Minimize</span>
                                            <span class="expand"><i class="fa fa-angle-up"></i>&nbsp;&nbsp;&nbsp;Expand</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- /tile header -->

                    <!-- tile body -->
                    <div class="tile-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div id="tableTools"></div>
                            </div>
                            <div class="col-md-6">
                                <button id="clickTambah" style="float: right;" class="btn btn-ef btn-ef-5 btn-ef-5b btn-success mb-10" data-toggle="modal" data-target="#splash" data-options="splash-2 splash-ef-14"><i class="fa fa-plus"></i> <span>Tambah</span></button>
                            </div>
                        </div>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-custom" id="advanced-usage">
                                <thead>
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
                                        <th>Kep.Gudang2</th>
                                        <th>Kep.Gudang2 Status</th>
                                        <th>Tanggal</th>
                                        <th style="text-align: right;">Pilihan &nbsp;&nbsp;</th>
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
                                            <td><?= $d['kepala_gudang2'] == '' ? 'Belum Dikonfirmasi' : $d['kepala_gudang2'] ?></td>
                                            <td><?= $d['kepala_gudang2_status']; ?></td>
                                            <td><?= $d['tanggal']; ?></td>
                                            <td>
                                                <div class="text-center">
                                                    <a href="<?= base_url('pembelian/accept_gudang/') . $d['id_pembelian'] ?>" class="btn btn-sm btn-primary btn-ef btn-ef-5 btn-ef-5b edit-button"><i class="fa fa-check"></i> <span>Accept</span></a>
                                                    <a href="<?= base_url('pembelian/reject_gudang/') . $d['id_pembelian'] ?>" class="btn btn-sm btn-danger btn-ef btn-ef-5 btn-ef-5b delete-button"><i class="fa fa-ban"></i> <span>Reject</span></a>
                                                </div>
                                            </td>

                                        </tr>
                                    </tbody>

                                <?php $no++;
                                endforeach; ?>
                            </table>
                        </div>
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
<div class="modal splash fade" id="splash" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title custom-font" id="myModalLabel">Form pembelian</h3>
            </div>
            <form role="form" action="<?= base_url('pembelian/save'); ?>" id="form" method="post">
                <div class="modal-body">
                    <input type="hidden" name="id">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tanggal">Nama Barang</label>
                                <select name="barang" id="" class="form-control">
                                    <?php foreach ($barang as $b) : ?>
                                        <option value="<?= $b['kode_barang']; ?>"><?= $b['nama']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Jumlah</label>
                                <input type="number" name="jumlah" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="tanggal">Keterangan Pinjam</label>
                                <textarea type="text" id="keterangan" class="form-control" name="keterangan" required="required">
                                        </textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default btn-border">Simpan</button>
                    <button class="btn btn-default btn-border" data-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>