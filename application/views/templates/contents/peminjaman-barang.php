<section id="content">
    <div class="page page-tables-datatables">

        <div class="pageheader">

            <div class="page-bar">

                <ul class="page-breadcrumb">
                    <li>
                        <a href="<?= base_url() ?>"><i class="fa fa-home"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="#">Peminjaman</a>
                    </li>
                </ul>

            </div>

        </div>

        <!-- row -->
        <div class="row">
            <!-- col -->
            <?php foreach ($barang as $brg) : ?>

                <div class="col-md-4">
                    <section class="tile">

                        <!-- tile header -->
                        <div class="tile-header dvd dvd-btm">
                            <h1 class="custom-font"><strong class="text-capitalize"><?= $brg['nama']; ?></strong></h1>
                        </div>
                        <!-- /tile header -->

                        <!-- tile body -->
                        <div class="tile-body">
                            <div class="card">
                                <div class="text-center">
                                    <img src="<?= base_url('gambar/') . $brg['gambar'] ?>" style="width:70%;height:110px" class="card-img-top" alt="...">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Rp. <?= number_format($brg['harga'], 0, ",", "."); ?>
                                    </h5>
                                    <p class="card-text"><?= $brg['keterangan']; ?></p>
                                    <a href="<?= base_url('peminjaman/detail/') . $brg['kode_barang'] ?>" class="btn btn-success">Detail</a>
                                </div>
                            </div>
                        </div>
                        <!-- /tile body -->

                    </section>
                </div>
            <?php endforeach; ?>
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
                <h3 class="modal-title custom-font" id="myModalLabel">Form Peminjaman</h3>
            </div>
            <form role="form" action="<?= base_url('peminjaman/save'); ?>" id="form" method="post">
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