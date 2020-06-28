<section id="content">
    <div class="page page-tables-datatables">

        <div class="pageheader">

            <div class="page-bar">

                <ul class="page-breadcrumb">
                    <li>
                        <a href="<?= base_url() ?>"><i class="fa fa-home"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="#">gudang</a>
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
                            <div class="col-md-5">
                                <form action="<?= base_url('gudang/save'); ?>" method="post">
                                    <input type="hidden" value="<?= $dataID['id_gudang']; ?>" name="id">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="tanggal">Nama gudang</label>
                                                <input value="<?= $dataID['nama']; ?>" type="text" id="nama" class="form-control" name="nama" required="required" />
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-default btn-border">Simpan</button>
                                </form>
                            </div>
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
                <h3 class="modal-title custom-font" id="myModalLabel">Form gudang</h3>
            </div>
            <form role="form" action="<?= base_url('gudang/save'); ?>" id="form" method="post">
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