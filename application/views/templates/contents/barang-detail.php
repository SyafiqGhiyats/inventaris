<section id="content">
    <div class="page page-tables-datatables">

        <!-- row -->
        <div class="row">
            <!-- col -->
            <div class="col-md-6">



                <!-- tile -->
                <section class="tile">

                    <!-- tile header -->
                    <div class="tile-header dvd dvd-btm">
                        <h1 class="custom-font"><strong class="text-capitalize"><?= str_replace('-', ' ', $title) ?></strong></h1>
                         
                    </div>
                    <!-- /tile header -->

                    <!-- tile body -->
                    <div class="tile-body">
                        <img src="<?= base_url('gambar/') . $barang['gambar'] ?>" style="width: 30%;" alt="">
                        <h1>
                            <?= $barang['nama']; ?> <small>(Stok:<?= $barang['stok']; ?>)</small>
                        </h1>
                        <h4><?= $barang['keterangan']; ?></h4>
                        <p class="text-right"><?= $barang['tanggal']; ?></p>
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