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
                    <div class="tile-body" style="overflow: auto;padding:10px;">
                        <div class="row">
                            <div class="col-md-6">
                                <form class="form-inline my-2 my-lg-0" method="post">
                                    <input class="form-control mr-sm-2" type="text" name="key" placeholder="Cari Barang" aria-label="Cari Barang">
                                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                                </form>
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
                                            <td><?= $d['tanggal']; ?></td>
                                            <td>
                                                <div class="text-center">
                                                    <a href="<?= base_url('permintaan/ubah/') . $d['id_permintaan'] ?>" class="btn btn-sm btn-primary btn-ef btn-ef-5 btn-ef-5b edit-button"><i class="fa fa-edit"></i> <span>Ubah</span></a>
                                                    <a href="<?= base_url('permintaan/hapus/') . $d['id_permintaan'] ?>" class="btn btn-sm btn-danger btn-ef btn-ef-5 btn-ef-5b delete-button" value="'+data+'"><i class="fa fa-trash"></i> <span>Hapus</span></a>
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
                <h3 class="modal-title custom-font" id="myModalLabel">Form Permintaan</h3>
            </div>
            <form role="form" action="<?= base_url('permintaan/save'); ?>" id="form" method="post">
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