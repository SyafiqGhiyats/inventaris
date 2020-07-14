<section id="content">
    <div class="page page-tables-datatables">

        <div class="pageheader">

            <div class="page-bar">

                <ul class="page-breadcrumb">
                    <li>
                        <a href="<?= base_url() ?>"><i class="fa fa-home"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="#">Pembelian</a>
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
                                <div id="tableTools"></div>
                            </div>
                            <div class="col-md-6">
                                <button id="clickTambah" style="float: right;" class="btn btn-ef btn-ef-5 btn-ef-5b btn-success mb-10" data-toggle="modal" data-target="#splash" data-options="splash-2 splash-ef-14"><i class="fa fa-plus"></i> <span>Tambah</span></button>
                            </div>
                        </div>
                        <br>
                        <table class="table table-custom table-responsive" id="advanced-usage">
                            <thead>
                                <tr>
                                    <th>NIP</th>
                                    <th>Kode Barang</th>
                                    <th>Keterangan</th>
                                    <th>Status</th>
                                    <th>Jumlah</th>
                                    <th>Total Harga</th>
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
                                        <td style="cursor:pointer;" data-options="splash-2 splash-ef-14" data-toggle="modal" data-target="#modal-barang" class="popup-gambar" data-kode="<?= $d['kode_barang']; ?>"><?= $d['kode_barang']; ?></td>
                                        <td><?= $d['keterangan']; ?></td>
                                        <td><?= $d['status']; ?></td>
                                        <td><?= $d['jumlah']; ?></td>
                                        <td><?= $d['total_harga']; ?></td>
                                        <td><?= $d['kepala_gudang'] == '' ? 'Belum Dikonfirmasi' : $d['kepala_gudang'] ?></td>
                                        <td><?= $d['kepala_gudang_status']; ?></td>
                                        <td><?= $d['manajer'] == '' ? 'Belum Dikonfirmasi' : $d['manajer'] ?></td>
                                        <td><?= $d['manajer_status']; ?></td>
                                        <td><?= $d['tanggal']; ?></td>
                                        <td>
                                            <div class="text-center">
                                                <a href="<?= base_url('pembelian/ubah/') . $d['id_pembelian'] ?>" class="btn btn-sm btn-primary btn-ef btn-ef-5 btn-ef-5b edit-button"><i class="fa fa-edit"></i> <span>Ubah</span></a>
                                                <a href="<?= base_url('pembelian/hapus/') . $d['id_pembelian'] ?>" class="btn btn-sm btn-danger btn-ef btn-ef-5 btn-ef-5b delete-button" value="'+data+'"><i class="fa fa-trash"></i> <span>Hapus</span></a>
                                            </div>
                                        </td>

                                    </tr>
                                </tbody>

                            <?php $no++;
                            endforeach; ?>
                        </table>
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
                <h3 class="modal-title custom-font" id="myModalLabel">Form pembelian</h3>
            </div>
            <form role="form" action="<?= base_url('pembelian/save'); ?>" id="form" method="post">
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
                                <input required type="number" name="jumlah" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 align-middle stok-awal gaada">
                            <div class="form-group">
                                <label for="stokawal">Stok Awal</label>
                                <input type="text" name="stok" id="stokawal" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-md-6 align-middle text-center gambar-barang gaada">
                            <img style="height:100px;" src="" alt="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="tanggal">Keterangan</label>
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
                    $('.gambar-barang img').attr('src', `<?= base_url('gambar/') ?>${data.gambar}`);
                    $('.gaada').show();
                }
            })
        })
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
                                <h4><strong>Rp ${harga}</strong></h4>
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