<section id="content">
    <div class="page page-tables-datatables">


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
                                    <p class="card-text"><?= $brg['keterangan']; ?></p>
                                    <a href="<?= base_url('permintaan/detail/') . $brg['kode_barang'] ?>" class="btn btn-success">Detail</a>
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