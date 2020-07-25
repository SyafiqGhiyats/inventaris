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
                    <div class="tile-body" style="overflow: auto;padding:10px;">
                        <div class="row">
                            <div class="col-md-6">
                                <div id="tableTools"></div>
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
                                        <td><?= $d['nip']; ?></td>
                                        <td style="cursor:pointer;" data-options="splash-2 splash-ef-14" data-toggle="modal" data-target="#modal-barang" class="popup-gambar" data-kode="<?= $d['kode_barang']; ?>"><?= $d['kode_barang']; ?></td>
                                        <td><?= $d['keterangan']; ?></td>
                                        <td><?= $d['status']; ?></td>
                                        <td><?= $d['jumlah']; ?></td>
                                        <td><?= $d['kepala_gudang'] == '' ? 'Belum Dikonfirmasi' : $d['kepala_gudang'] ?></td>
                                        <td><?= $d['kepala_gudang_status']; ?></td>
                                        <td><?= $d['manajer'] == '' ? 'Belum Dikonfirmasi' : $d['manajer'] ?></td>
                                        <td><?= $d['manajer_status']; ?></td>
                                        <td><?= $d['tanggal']; ?></td>
                                        <td>
                                            <div class="text-center">
                                                <?php if ($d['manajer_status'] == 'accepted' or $d['manajer_status'] == 'rejected') : ?>
                                                    <button data-options="splash-2 splash-ef-14" data-toggle="modal" data-target="#modal-barang" class="btn btn-sm btn-success btn-ef btn-ef-5 btn-ef-5b popup-gambar" data-kode="<?= $d['kode_barang']; ?>"><i class="fa fa-eye"></i> <span>Detail</span></button>
                                                <?php else : ?>
                                                    <a href="<?= base_url('permintaan/accept_manajer/') . $d['id_permintaan'] ?>" class="btn btn-sm btn-primary btn-ef btn-ef-5 btn-ef-5b edit-button"><i class="fa fa-check"></i> <span>Accept</span></a>
                                                    <a href="<?= base_url('permintaan/reject_manajer/') . $d['id_permintaan'] ?>" class="btn btn-sm btn-danger btn-ef btn-ef-5 btn-ef-5b delete-button"><i class="fa fa-ban"></i> <span>Reject</span></a>
                                                    <button data-options="splash-2 splash-ef-14" data-toggle="modal" data-target="#modal-barang" class="btn btn-sm btn-success btn-ef btn-ef-5 btn-ef-5b popup-gambar" data-kode="<?= $d['kode_barang']; ?>"><i class="fa fa-eye"></i> <span>Detail</span></button>
                                                <?php endif; ?>
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