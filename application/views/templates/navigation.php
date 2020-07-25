<aside id="sidebar" style="background-color: #000000;">


	<div id="sidebar-wrap">

		<div class="panel-group slim-scroll" role="tablist">
			<div class="panel panel-default">
				<div class="panel-heading" role="tab">
					<h4 class="panel-title">
						<a data-toggle="collapse" href="#sidebarNav">
							Navigation <i class="fa fa-angle-up"></i>
						</a>
					</h4>
				</div>
				<div id="sidebarNav" class="panel-collapse collapse in" role="tabpanel">
					<div class="panel-body">
						<ul id="navigation" style="background-color: #000000;">
							<?php if ($this->session->userdata('id_level') == 1) : ?>
								<li>
									<a href="<?= base_url('permintaan'); ?>">
										<i class="fa fa-caret-right"></i>Permintaan
									</a>
								</li>
								<li>
									<a href="<?= base_url('laporan-permintaan'); ?>">
										<i class="fa fa-caret-right"></i>Laporan permintaan
									</a>
								</li>
							<?php elseif ($this->session->userdata('id_level') == 2) : ?>
								<li>
									<a href="<?= base_url('barang'); ?>">
										<i class="fa fa-caret-right"></i>Barang
									</a>
								</li>
								<li>
									<a href="<?= base_url('permintaan'); ?>">
										<i class="fa fa-caret-right"></i>Permintaan
									</a>
								</li>
								<li>
									<a href="<?= base_url('pembelian'); ?>">
										<i class="fa fa-caret-right"></i>Pembelian Barang
									</a>
								</li>
								<li>
									<a href="<?= base_url('rak'); ?>">
										<i class="fa fa-caret-right"></i>Rak
									</a>
								</li>
								<li>
									<a href="<?= base_url('laporan-pembelian'); ?>">
										<i class="fa fa-caret-right"></i>Laporan Pembelian
									</a>
								</li>
								<li>
									<a href="<?= base_url('laporan-permintaan'); ?>">
										<i class="fa fa-caret-right"></i>Laporan permintaan
									</a>
								</li>
							<?php elseif ($this->session->userdata('id_level') == 3) : ?>
								<li>
									<a href="<?= base_url('barang'); ?>">
										<i class="fa fa-caret-right"></i>Barang
									</a>
								</li>
								<li>
									<a href="<?= base_url('permintaan'); ?>">
										<i class="fa fa-caret-right"></i>Permintaan
									</a>
								</li>
								<li>
									<a href="<?= base_url('pembelian'); ?>">
										<i class="fa fa-caret-right"></i>Pembelian Barang
									</a>
								</li>
								<li>
									<a href="<?= base_url('laporan-pembelian'); ?>">
										<i class="fa fa-caret-right"></i>Laporan Pembelian
									</a>
								</li>
								<li>
									<a href="<?= base_url('laporan-permintaan'); ?>">
										<i class="fa fa-caret-right"></i>Laporan permintaan
									</a>
								</li>
							<?php elseif ($this->session->userdata('id_level') == 4) : ?>
								<li>
									<a href="<?= base_url('permintaan'); ?>">
										<i class="fa fa-caret-right"></i>Permintaan
									</a>
								</li>
								<li>
									<a href="<?= base_url('pembelian'); ?>">
										<i class="fa fa-caret-right"></i>Pembelian Barang
									</a>
								</li>
								<li>
									<a href="<?= base_url('laporan-pembelian'); ?>">
										<i class="fa fa-caret-right"></i>Laporan Pembelian
									</a>
								</li>
								<li>
									<a href="<?= base_url('laporan-permintaan'); ?>">
										<i class="fa fa-caret-right"></i>Laporan permintaan
									</a>
								</li>
							<?php endif; ?>
							<li>
								<a href="<?= base_url() ?>login/logout"><i class="fa fa-caret-right"></i>Logout</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>

	</div>


</aside>