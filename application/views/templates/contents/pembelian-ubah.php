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
                            <div class="col-md-6">
                                <form role="form" action="<?= base_url('pembelian/save'); ?>" id="form" method="post">
                                    <input type="hidden" name="id" value="<?= $dataID['id_pembelian']; ?>">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="tanggal">Nama Barang</label>
                                                <select name="barang" id="" class="form-control">
                                                    <?php foreach ($barang as $b) : ?>
                                                        <?php if ($b['kode_barang'] == $dataID['kode_barang']) : ?>
                                                            <option selected value="<?= $b['kode_barang']; ?>"><?= $b['nama']; ?></option>
                                                        <?php else : ?>
                                                            <option value="<?= $b['kode_barang']; ?>"><?= $b['nama']; ?></option>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Jumlah</label>
                                                <input type="number" value="<?= $dataID['jumlah']; ?>" name="jumlah" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="tanggal">Keterangan Pinjam</label>
                                                <textarea type="text" id="keterangan" class="form-control" name="keterangan" required="required"><?= $dataID['keterangan']; ?>
                                        </textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-default btn-border">Simpan</button>
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