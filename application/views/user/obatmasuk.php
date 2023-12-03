<!-- MAIN -->
<div class="main">
	<!-- MAIN CONTENT -->
	<div class="main-content">
		<div class="container-fluid">

			<!--TABEL OBAT-->
			<div class="row">
				<div class="col-md-12">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Obat</h3>
							<div class="right">
								<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
								<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
							</div>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-12">
									<div class="card shadow">
										<div class="card-body">
											<div class="table-responsive">
												<table class="table table-striped" id="example1" style="font-size:13px;">
													<thead>
														<tr>
															<th style="width:1px;">ID</th>
															<th style="width:50px;">Kode Obat</th>
															<th style="width:150px;">Nama</th>
															<th style="width:20px;">Kategori</th>
															<th style="width:20px;">Satuan</th>
															<th style="text-align:right; width:40px;">Aksi</th>
														</tr>
													</thead>
													<tbody>
														<?php
														$no=0;
														foreach($obat->result_array() as $o): 
															$no++;
															?>
															<tr>
																<td><?= $no; ?></td>
																<td><?= $o['kd_obat']; ?></td>
																<td><?= $o['nama_obat']; ?></td>
																<?php foreach($kategori->result_array() as $k): ?>
																	<?php if($k['id_kategori']==$o['kategori']): ?>
																		<td><?= $k['nama_kategori']; ?></td>
																	<?php endif; ?>
																<?php endforeach; ?>
																<?php foreach($satuan->result_array() as $s): ?>
																	<?php if($s['id_satuan']==$o['satuan']):  ?>
																		<td><?= $s['nama_satuan']; ?></td>
																	<?php endif; ?>
																<?php endforeach; ?>
																<td style="text-align:right;">
																	<a class="btn" title="Input Obat"data-toggle="modal" data-target="#ModalTambahObatMasuk<?= $o['kd_obat'];?>"><span class="fas fa-external-link-alt"></span></a>
																</td>
															</tr>
														<?php endforeach; ?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!--END TABEL OBAT-->
					</div>
				</div>
			</div>
			<!--PANEL HEADLINE-->


			<!--TABEL OBATMASUK-->
			<div class="row">
				<div class="col-md-12">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Obat Masuk</h3>
							<div class="right">
								<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
								<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
							</div>
						</div>

						<div class="panel-body">
							<div class="row">
								<div class="col-md-12">
									<div class="card shadow">
										<div class="card-body">
											<div class="table-responsive">
												<table class="table table-striped" id="example2" style="font-size:13px;">
													<thead>
														<tr>
															<th>ID</th>
															<th>Kode Obat</th>
															<th>Nama Obat</th>
															<th>Tgl Obat Masuk</th>
															<th>Petugas</th>
															<th>Tgl Obat Expired</th>
															<th>Jumlah</th>
															<!-- <th style="text-align:center; width: 10px;">Delete</th> -->
														</tr>
													</thead>
													<tbody>
														<?php
														$no=0;
														foreach($obatmasuk->result_array() as $om): 
															$no++;
															?>
															<tr>
																<td><?= $no; ?></td>
																<td><?= $om['kd_obat'] ;?></td>
																<td><?= $om['nama_obat'] ;?></td>
																<td><?= $om['tgl_obatmasuk'] ;?></td>
																<td><?= $om['nama_petugas']; ?></td>
																<td><?= $om['tgl_expired'] ;?></td>
																<td><?= $om['qty'] ;?></td>
																<!-- <td style="text-align:center;">
																	<a class="btn" title="Hapus Obat"data-toggle="modal" data-target="#ModalHapus<?= $om['id_obatmasuk'];?> "><span class="fa fa-trash"></span></a>
																</td> -->
															</tr>
														<?php endforeach; ?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--END TABEL OBATMASUK-->
		</div>
		<!--ROW-->
	</div>
</div>
<!-- END MAIN CONTENT -->

<!--TAMBAH OBAT MASUK-->
<?php foreach ($obat->result_array() as $o): ?>
	<div class="modal fade" id="ModalTambahObatMasuk<?= $o['kd_obat']; ?>" tabindex="-1" role="dialog" aria-labelledby="ModalTambahObatMasukLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">

				<div class="panel">
					<div class="panel-heading">
						<div class="modal-header">
							<h3 class="modal-title" id="ModalTambahObatMasukLabel">Tambah Obat Masuk</h3>
						</div>
					</div>

					<div class="panel-body">
						<div class="row">
							<div class="col-md-12">
								<form class="form-horizontal" action="<?= base_url('obatmasuk/simpan'); ?>" method="post" enctype="multipart/form-data">
									<div class="modal-body">

										<input type="hidden" name="kd_obat" value="<?= $o['kd_obat']; ?> ">

										<div class="form-group">
											<label for="inputobatmasuk">Nama Obat</label>
											<input type="text" class="form-control" id="nama_obat" name="nama_obat" value="<?= $o['nama_obat'] ?> " readonly>
										</div>

										<div class="form-group">
											<label for="inputobat">Tanggal Masuk</label>
											<div class="input-group date">
												<span class="input-group-addon"><i class="far fa-calendar-alt"></i></span>
												<input type="text" name="tgl_obatmasuk" class="form-control pull-right datepicker" id="datepicker" autocomplete="off" required>
											</div>
										</div>

										<div class="form-group">
											<label for="inputobat">Tanggal Expired</label>
											<div class="input-group date">
												<span class="input-group-addon"><i class="far fa-calendar-alt"></i></span>
												<input type="text" name="tgl_expired" class="form-control pull-right datepicker2" id="datepicker2" autocomplete="off" required>
											</div>
										</div>

										<div class="form-group">
											<label for="inputobatmasuk">Jumlah</label>
											<input type="number" class="form-control" id="qty" name="qty" required>
										</div>

										

									</div>

									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
										<button type="submit" class="btn btn-primary">Simpan</button>
									</div>

								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endforeach; ?>
<!--END TAMBAH OBAT MASUK-->

<!--HAPUS OBAT MASUK-->
<?php foreach($obatmasuk->result_array() as $om): ?>
	<div class="modal fade" id="ModalHapus<?= $om['id_obatmasuk'];?>" tabindex="-1" role="dialog" aria-labelledby="ModalHapusLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">

				<div class="panel">
					<div class="panel-heading">
						<div class="modal-header">
							<h3 class="modal-title" id="ModalHapusLabel">Hapus Obat Masuk</h3>
						</div>
					</div>

					<div class="panel-body">
						<div class="row">
							<div class="col-md-12">
								<form class="form-horizontal" action="<?php echo base_url('obatmasuk/hapus'); ?>" method="post" enctype="multipart/form-data">
									<div class="modal-body">
										<input type="hidden" name="id_obatmasuk" value="<?= $om['id_obatmasuk'];?>"/>
										<input type="hidden" name="kd_obat" value="<?= $om['kd_obat'];?>"/>

										<p>Menghapus obat Masuk dapat <strong>menghapus</strong> data obat keluar yang bersangkutan</p>
										<p>Apakah Anda yakin mau menghapus obat masuk <b><?= $om['nama_obat'];?></b> ?</p>

									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
										<button type="submit" class="btn btn-primary">Hapus</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endforeach; ?>
<!--END OBAT MASUK-->