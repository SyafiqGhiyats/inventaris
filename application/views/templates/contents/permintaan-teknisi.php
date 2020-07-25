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

                    </div>
                    <!-- /tile header -->

                    <!-- tile body -->
                    <div class="tile-body">
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
                        <style type="text/css">
                            table .thead-dark th {
                                color: #fff;
                                background-color: #343a40;
                                border-color: #454d55;
                                vertical-align: middle !important;
                            }
                        </style>
                        <div class="table-responsive">
                            <div style="overflow: auto;padding:10px;">
                                <table class="table table-custom" id="advanced-usage">
                                    <thead class="thead-dark">
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
                                                <td class="tb-td"><?= $d['nip']; ?></td>
                                                <td>
                                                    <?= $d['kode_barang']; ?>
                                                </td>
                                                <td class="tb-td"><?= $d['keterangan']; ?></td>
                                                <td class="tb-td"><?= $d['status']; ?></td>
                                                <td class="tb-td"><?= $d['jumlah']; ?></td>
                                                <td class="tb-td"><?= $d['kepala_gudang'] == '' ? 'Belum Dikonfirmasi' : $d['kepala_gudang'] ?></td>
                                                <td class="tb-td"><?= $d['kepala_gudang_status']; ?></td>
                                                <td class="tb-td"><?= $d['manajer'] == '' ? 'Belum Dikonfirmasi' : $d['manajer'] ?></td>
                                                <td class="tb-td"><?= $d['manajer_status']; ?></td>
                                                <td class="tb-td"><?= $d['tanggal']; ?></td>
                                                <td class="tb-td">
                                                    <?php if ($d['kepala_gudang'] == '' or $d['manajer'] == '') : ?>
                                                        <div class="text-center">
                                                            <a href="<?= base_url('permintaan/ubah/') . $d['id_permintaan'] ?>" class="btn btn-sm btn-primary btn-ef btn-ef-5 btn-ef-5b edit-button"><i class="fa fa-edit"></i> <span>Ubah</span></a>
                                                            <a href="<?= base_url('permintaan/hapus/') . $d['id_permintaan'] ?>" class="btn btn-sm btn-danger btn-ef btn-ef-5 btn-ef-5b delete-button"><i class="fa fa-trash"></i> <span>Hapus</span></a>
                                                            <button data-options="splash-2 splash-ef-14" data-toggle="modal" data-target="#modal-barang" class="btn btn-sm btn-success btn-ef btn-ef-5 btn-ef-5b popup-gambar" data-kode="<?= $d['kode_barang']; ?>"><i class="fa fa-eye"></i> <span>Detail</span></button>
                                                        </div>
                                                    <?php else : ?>
                                                        <div class="text-center">
                                                            <button data-options="splash-2 splash-ef-14" data-toggle="modal" data-target="#modal-barang" class="btn btn-sm btn-success btn-ef btn-ef-5 btn-ef-5b popup-gambar" data-kode="<?= $d['kode_barang']; ?>"><i class="fa fa-eye"></i> <span>Detail</span></button>
                                                        </div>
                                                    <?php endif; ?>
                                                </td>

                                            </tr>
                                        </tbody>

                                    <?php $no++;
                                    endforeach; ?>
                                </table>
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
    <div class="modal-dialog" style="float: right;margin-top: -10px;">
        <div class="modal-content">
            <form role="form" action="<?= base_url('permintaan/save'); ?>" id="form" method="post">
                <div class="modal-header">
                    <h3 style="text-align: left;" class="modal-title custom-font" id="myModalLabel">Form Permintaan</h3>
                    <div style="float: right; margin-top: -30px;">
                        <button type="submit" class="btn btn-default btn-border">Simpan</button>
                        <button class="btn btn-default btn-border" data-dismiss="modal">Batal</button>
                    </div>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tanggal">Nama Barang</label>
                                <select required name="barang" id="barang" class="form-control">
                                    <option selected value="">====Pilih Barang====</option>
                                    <?php foreach ($barang as $b) : ?>
                                        <option value="<?= $b['kode_barang']; ?>"><?= $b['nama']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Jumlah</label>
                                <input type="number" name="jumlah" class="form-control" required="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 align-middle stok-awal gaada">
                            <div class="form-group">
                                <label for="stokawal">Stok Awal</label>
                                <input type="text" name="stok" id="stokawal" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-md-3 gaada align-middle">
                            <div class="form-group">
                                <label for="kodebarang">Kode Barang</label>
                                <input type="text" name="stok" id="kodebarang" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-md-6 align-middle text-center gambar-barang gaada">
                            <img style="height:100px;" src="" alt="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="tanggal">Problem Pinjam</label>
                                <textarea type="text" id="keterangan" class="form-control" name="keterangan" required="required"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
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
        $('.gaada').hide();
        $('#barang').on('change', function() {
            id = $(this).val()
            $.ajax({
                url: '<?= base_url() ?>barang/detail/' + id,
                dataType: 'JSON',
                type: 'GET',
                success(data) {
                    $('#stokawal').val(data.stok);
                    $('#kodebarang').val(data.kode_barang);
                    $('.gambar-barang img').attr('src', `<?= base_url('gambar/') ?>${data.gambar}`);
                    $('.gaada').show();
                }
            })
        });
        $('.popup-gambar').on('click', function() {
            kode = $(this).data('kode');
            $.ajax({
                url: '<?= base_url() ?>barang/detail/' + kode,
                dataType: 'JSON',
                type: 'GET',
                success(data) {
                    harga = parseInt(data.harga).toLocaleString();
                    $('#modal-barang .modal-title').text('Detail Barang')
                    $('#modal-barang .modal-body').html(`
                    <h2 class="text-uppercase text-center mt-0">${data.nama}</h2>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <img style="width: 300px;" src="<?= base_url('gambar/'); ?>${data.gambar}" alt="">
                            </div>
                        </div>
                            <h4><p>Stok : ${data.stok}</p></h4>
                            <h3 class="text-center">Keterangan</h3>
                            <h4 class="text-justify" style="padding:0 3rem;"><strong>${data.keterangan}</strong></h4>
                            <h4>
                                <p class="text-right">
                                    ${data.tanggal}
                                </p>
                            </h4>
                    `)
                    $('.btn-simpan').hide()
                    $('.btn-close').text('Close')
                }
            })
        })
    });
</script>