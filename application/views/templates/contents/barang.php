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
                                <div id="tableTools"></div>
                            </div>
                            <div class="col-md-6">
                                <?php if ($this->session->userdata('id_level') != 3) : ?>
                                    <button id="clickTambah" style="float: right;" class="btn btn-ef btn-ef-5 btn-ef-5b btn-success mb-10" data-toggle="modal" data-target="#splash" data-options="splash-2 splash-ef-14"><i class="fa fa-plus"></i> <span>Tambah</span></button>
                                <?php else : ?>
                                <?php endif; ?>
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
                                        <th>Kode Barang</th>
                                        <th>ID Rak</th>
                                        <th>Nama</th>
                                        <th>Keterangan</th>
                                        <th>Gambar</th>
                                        <th>Stok Minimal</th>
                                        <th>Stok</th>
                                        <th>Tanggal</th>
                                        <th style="text-align: right;">Pilihan &nbsp;&nbsp;</th>
                                    </tr>
                                </thead>
                                <?php foreach ($data as $d) : ?>
                                    <tbody>
                                        <tr>
                                            <td><?= $d['kode_barang']; ?></td>
                                            <td><?= $d['id_rak']; ?></td>
                                            <td><?= $d['nama']; ?></td>
                                            <td><?= $d['keterangan']; ?></td>
                                            <td><?= $d['gambar']; ?></td>
                                            <td><?= $d['stok_min']; ?></td>
                                            <td><?= $d['stok']; ?></td>
                                            <td><?= $d['tanggal']; ?></td>
                                            <td>
                                                <?php if ($this->session->userdata('id_level') != 3) : ?>
                                                    <div class="pull-right">
                                                        <a href="<?= base_url('barang/ubah/') . $d['kode_barang'] ?>" class="btn btn-sm btn-primary btn-ef btn-ef-5 btn-ef-5b edit-button"><i class="fa fa-edit"></i> <span>Ubah</span></a>
                                                        <a href="<?= base_url('barang/hapus/') . $d['kode_barang'] ?>" class="btn btn-sm btn-danger btn-ef btn-ef-5 btn-ef-5b delete-button" value="'+data+'"><i class="fa fa-trash"></i> <span>Hapus</span></a>
                                                        <button data-options="splash-2 splash-ef-14" data-toggle="modal" data-target="#modal-barang" class="btn btn-sm btn-success btn-ef btn-ef-5 btn-ef-5b popup-gambar" data-kode="<?= $d['kode_barang']; ?>"><i class="fa fa-eye"></i> <span>Detail</span></button>
                                                    </div>
                                                <?php else : ?>
                                                    <button data-options="splash-2 splash-ef-14" data-toggle="modal" data-target="#modal-barang" class="btn btn-sm btn-success btn-ef btn-ef-5 btn-ef-5b popup-gambar" data-kode="<?= $d['kode_barang']; ?>"><i class="fa fa-eye"></i> <span>Detail</span></button>
                                                <?php endif; ?>
                                            </td>

                                        </tr>
                                    </tbody>

                                <?php endforeach; ?>
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
                <h3 class="modal-title custom-font" id="myModalLabel">Form barang</h3>
            </div>
            <form role="form" action="<?= base_url('barang/save'); ?>" id="form" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" name="id">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group"><label for="">Rak</label>
                                <select name="id_rak" id="" class="form-control">
                                    <?php foreach ($rak as $r) : ?>
                                        <option value="<?= $r['id_rak']; ?>"><?= $r['nama']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nama Barang</label>
                                <input type="text" name="nama" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Keterangan</label>
                                <textarea required name="keterangan" id="" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Gambar</label>
                                <input type="file" required class="form-control" name="gambar" id="">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Stok Minimal</label>
                                <input type="number" class="form-control" required name="stok_min">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Stok</label>
                                <input type="number" class="form-control" required name="stok">
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
<div class="modal splash fade" id="modal-barang" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title custom-font" id="myModalLabel">Form Permintaan</h3>
            </div>
            <div class="modal-body">
            </div>
            <hr>
            <div class="modal-footer">
                <button type="submit" class="btn btn-simpan btn-default btn-border">Simpan</button>
                <button class="btn btn-close btn-default btn-border" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function(event) {
        $('.popup-gambar').on('click', function() {
            kode = $(this).data('kode');
            $.ajax({
                url: '<?= base_url() ?>barang/detail/' + kode,
                dataType: 'JSON',
                type: 'GET',
                success(data) {
                    $('#modal-barang .modal-title').text('Gambar Barang')
                    $('#modal-barang .modal-body').html(`
                   <img style="width:100%;" src="<?= base_url('gambar/') ?>${data.gambar}" alt="">
                    `)
                    $('.btn-simpan').hide()
                    $('.btn-close').text('Close')
                }
            })
        })
    });
</script>