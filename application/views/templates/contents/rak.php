<section id="content">
    <div class="page page-tables-datatables">

        <div class="pageheader">

            <div class="page-bar">

                <ul class="page-breadcrumb">
                    <li>
                        <a href="<?= base_url() ?>"><i class="fa fa-home"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="#">Rak</a>
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
                        <h1 class="custom-font">Data <strong><?= $title ?></strong></h1>

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
                        <style type="text/css">
                            table .thead-dark th {
                                color: #fff;
                                background-color: #343a40;
                                border-color: #454d55;
                                vertical-align: middle !important;
                            }
                        </style>
                        <div class="table-responsive">
                            <table class="table table-custom" id="advanced-usage">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Tanggal</th>
                                        <th style="text-align: right;">Pilihan &nbsp;&nbsp;</th>
                                    </tr>
                                </thead>
                                <?php $no = 1;
                                foreach ($data as $d) : ?>
                                    <tbody>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $d['nama']; ?></td>
                                            <td><?= $d['tanggal']; ?></td>
                                            <td>
                                                <div class="pull-right">
                                                    <a href="<?= base_url('rak/ubah/') . $d['id_rak'] ?>" class="btn btn-sm btn-primary btn-ef btn-ef-5 btn-ef-5b edit-button"><i class="fa fa-edit"></i> <span>Ubah</span></a>
                                                    <a href="<?= base_url('rak/hapus/') . $d['id_rak'] ?>" class="btn btn-sm btn-danger btn-ef btn-ef-5 btn-ef-5b"><i class="fa fa-trash"></i> <span>Hapus</span></a>
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
                <h3 class="modal-title custom-font" id="myModalLabel">Form rak</h3>
            </div>
            <form role="form" action="<?= base_url('rak/save'); ?>" id="form" method="post">
                <div class="modal-body">
                    <input type="hidden" name="id">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="tanggal">Nama</label>
                                <input type="text" id="nama" class="form-control" name="nama" required="required" />
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