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
                        <h1 class="custom-font">Data <strong><?= $title ?></strong></h1>

                    </div>
                    <!-- /tile header -->

                    <!-- tile body -->
                    <div class="tile-body">
                        <div class="row">
                            <div class="col-md-8">
                                <form role="form" action="<?= base_url('barang/save'); ?>" id="form" method="post" enctype="multipart/form-data">
                                    <input value="<?= $dataID['kode_barang']; ?>" type="hidden" name="id">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group"><label for="">Rak</label>
                                                <select name="id_rak" id="" class="form-control">
                                                    <?php foreach ($rak as $r) : ?>
                                                        <?php if ($r['id_rak'] == $dataID['id_rak']) : ?>
                                                            <option selected value="<?= $r['id_rak']; ?>"><?= $r['nama']; ?></option>
                                                        <?php else : ?>
                                                            <option value="<?= $r['id_rak']; ?>"><?= $r['nama']; ?></option>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Nama Barang</label>
                                                <input type="text" value="<?= $dataID['nama']; ?>" name="nama" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Keterangan</label>
                                                <textarea required name="keterangan" id="" class="form-control"><?= $dataID['keterangan']; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Gambar</label>
                                                <input type="file" class="form-control" name="gambar" id="">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Stok Minimal</label>
                                                <input type="number" value="<?= $dataID['stok_min']; ?>" class="form-control" required name="stok_min">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Stok</label>
                                                <input type="number" value="<?= $dataID['stok']; ?>" class="form-control" required name="stok">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-default btn-border">Ubah</button>
                                    </div>
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
                <h3 class="modal-title custom-font" id="myModalLabel">Form Level</h3>
            </div>
            <form role="form" action="<?= base_url('level/save'); ?>" id="form" method="post">
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