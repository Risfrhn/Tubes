<!-- MAIN -->
<div class="main">
	<!-- MAIN CONTENT -->
	<div class="main-content">
		<div class="container-fluid">

			<div class="row">
				<div class="col-md-4">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Entry Data</h3>
						</div>


						<div class="panel-body">
							<div class="row">
								<div class="col-md-12">
									<div class="card shadow">
										<div class="card-body">

											<form action="obatkeluar" method="post">

												<div class="form-group">
													<label for="inputobat">Kode Pasien</label>
													<input type="text" class="form-control disabled" id="kd_pasien" name="kd_pasien" readonly>
													<?php echo form_error('kd_pasien','<small class="text-danger">','</small>');?>
												</div>

												<div class="form-group">
													<label for="inputobat">Kode Obat</label>
													<input type="text" class="form-control" id="kd_obat" name="kd_obat" readonly>
													<?php echo form_error('kd_obat','<small class="text-danger">','</small>');?>
												</div>

												<div class="form-group">
													<label for="inputobat">Tanggal Keluar</label>
													<div class="input-group date">
														<span class="input-group-addon"><i class="far fa-calendar-alt"></i></span>
														<input type="text" name="tgl_obatkeluar" class="form-control pull-right datepicker" id="datepicker" autocomplete="off" required>
													</div>
												</div>

												<div class="form-group">
													<label for="inputobat">Jumlah</label>
													<input type="hidden" class="form-control" id="qty" name="stok">
													<input type="number" class="form-control" name="qty" required>
												</div>

												<button type="submit" class="btn btn-primary">Simpan</button>

											</form>

										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-8">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Pasien</h3>
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
										<table class="table table-striped" id="example4" style="font-size:13px;">
											<thead>
												<tr>
													<th>Kode Pasien</th>
													<th>Nama</th>
													<th>No. Rekam Medis</th>
												</tr>
											</thead>
											<tbody>
												<?php foreach($pasien->result_array() as $p): ?>
													<tr>
														<td><?= $p['kd_pasien']; ?></td>
														<td><?=	$p['nama_pasien']; ?></td>
														<td><?= $p['no_rekam']; ?></td>
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
													<table class="table table-striped" id="example5" style="font-size:13px;">
														<thead>
															<tr>
																<th style="width:20px;">Kode Obat</th>
																<th style="width:100px;">Nama</th>
																<th style="width:20px;">Stok</th>
															</tr>
														</thead>
														<tbody>
															<?php
															foreach($obatmasuk->result_array() as $om):
																?>
																<tr>
																	<td><?= $om['kd_obat'] ;?></td>
																	<td><?= $om['nama_obat'] ;?></td>
																	<td><?= $om['qty'] ;?></td>
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
			<!--ROW-->

			<!--TABEL OBATKELUAR-->
			<div class="row">
				<div class="col-md-12">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Obat Keluar</h3>
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
															<th>ID</th>
															<th>Pasien</th>
															<th>Obat</th>
															<th>Petugas</th>
															<th>Tanggal Keluar</th>
															<th>Jumlah</th>
															<th style="text-align:center; width: 10px;">Delete</th>
														</tr>
													</thead>
													<tbody>
														<?php
														$no=0;
														foreach($obatkeluar->result_array() as $ok): 
														$no++;
														?>
														<tr>
															<td><?= $no; ?></td>
															<td><?= $ok['nama_pasien']; ?></td>
															<td><?= $ok['nama_obat']; ?></td>
															<td><?= $ok['nama_petugas']; ?></td>
															<td><?= $ok['tgl_obatkeluar']; ?></td>
															<td><?= $ok['qty']; ?></td>
															<td style="text-align:center;">
																<a class="btn" data-toggle="modal" data-target="#ModalHapus<?= $ok['id_obatkeluar'];?>"><span class="fa fa-trash"></span></a>
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
					</div>
				</div>
			</div>
			<!--TABEL OBATKELUAR-->


		</div> 
	</div>
</div>
<!-- END MAIN CONTENT -->

<!--HAPUS OBAT KELUAR-->
<?php foreach($obatkeluar->result_array() as $ok): ?>
	<div class="modal fade" id="ModalHapus<?= $ok['id_obatkeluar'];?>" tabindex="-1" role="dialog" aria-labelledby="ModalHapusLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">

				<div class="panel">
					<div class="panel-heading">
						<div class="modal-header">
							<h3 class="modal-title" id="ModalHapusLabel">Hapus Obat Keluar</h3>
						</div>
					</div>

					<div class="panel-body">
						<div class="row">
							<div class="col-md-12">
								<form class="form-horizontal" action="<?php echo base_url('obatkeluar/hapus'); ?>" method="post" enctype="multipart/form-data">
									<div class="modal-body">
										<input type="hidden" name="id_obatkeluar" value="<?= $ok['id_obatkeluar'];?>"/>

										<p>Apakah Anda yakin mau menghapus obat keluar <b><?= $ok['nama_obat'];?></b> ?</p>

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
<!--END OBAT KELUAR-->