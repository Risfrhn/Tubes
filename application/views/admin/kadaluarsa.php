<!-- MAIN -->
<div class="main">
	<!-- MAIN CONTENT -->
	<div class="main-content">
		<div class="container-fluid">

			<div class="panel panel-headline">
				<div class="panel-heading">
					<h3 class="panel-title">Stok Obat</h3>
					<hr class="sidebar-divider">
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
													<th style="width:20px;">ID</th>
													<th>Kode Obat</th>
													<th>Nama</th>
													<th>Stok</th>
													<th style="width:20px;">Keluarkan</th>
												</tr>
											</thead>
											<tbody>
												<?php 
												$no=0;
												foreach($expired->result_array() as $x): 
													$no++;
													?>
													<tr>
														<td><?= $no; ?></td>
														<td><?= $x['kd_obat']; ?></td>
														<td><?= $x['nama_obat']; ?></td>
														<td><?= $x['qty']; ?></td>
														<td>
															<a class="btn" data-toggle="modal" data-target="#ModalKadaluarsa<?= $x['kd_obat'];?>"><span class="fas fa-trash-restore-alt"></span></a>
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
			<!--END PANEL-->

			<div class="panel panel-headline">
				<div class="panel-heading">
					<h3 class="panel-title"><?= $title; ?></h3>
					<hr class="sidebar-divider">
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
													<th style="width:20px;">ID</th>
													<th>Kode Obat</th>
													<th>Jumlah</th>
													<th>Tanggal dikeluarkan</th>
												</tr>
											</thead>
											<tbody>
												<?php 
												$no=0;
												foreach($kadaluarsa->result_array() as $k): 
													$no++;
													?>
													<tr>
														<td><?= $no; ?></td>
														<td><?= $k['kd_obat']; ?></td>
														<td><?= $k['qty']; ?></td>
														<td><?= $k['tgl_keluar']; ?></td>
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
			<!--END PANEL-->



		</div>
		<!--END ROW-->
	</div>
	<!--END CONTAINER-->
</div>
<!-- END MAIN CONTENT -->


<!--HAPUS OBAT-->
<?php foreach($expired->result_array() as $x): ?>
	<div class="modal fade" id="ModalKadaluarsa<?= $x['kd_obat']; ?>" tabindex="-1" role="dialog" aria-labelledby="ModalKadaluarsaLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">

				<div class="panel">
					<div class="panel-heading">
						<div class="modal-header">
							<h3 class="modal-title" id="ModalKadaluarsaLabel">Peringatan!!!</h3>
						</div>
					</div>

					<div class="panel-body">
						<div class="row">
							<div class="col-md-12">
								<form class="form-horizontal" action="<?php echo base_url('kadaluarsa/simpan'); ?>" method="post" enctype="multipart/form-data">
									<input type="hidden" name="kd_obat" value="<?= $x['kd_obat']; ?>">
									<input type="hidden" name="qty" value="<?= $x['qty']; ?>">

									<div class="modal-body">
										
										<div class="form-group">
											<p>Obat yang sudah diproses tidak dapat dikembalikan lagi, cek kembali apakah </p>
											<p>Kode obat <br>
												<strong><?= $x['kd_obat']; ?></strong>
												<p>Nama obat <br>
													<strong><?= $x['nama_obat']; ?></strong></p>
													<p>Jumlah obat <br>
														<strong><?= $x['qty']; ?></strong>
														<input type="hidden" name="qty" value="<?= $x['qty']; ?>">
													</p>
													<p>yakin akan di<b>keluarkan</b></b> ?</p>
												</div>

												<div class="form-group">
													<label for="jumlah_keluar">Jumlah keluar</label>
													<input type="number" name="jumlah_keluar" required>
												</div>

												<!-- <div class="form-group">
													<label for="inputobat">Tanggal Keluar</label>
													<div class="input-group date">
														<span class="input-group-addon"><i class="far fa-calendar-alt"></i></span>
														<input type="text" name="tgl_keluar" class="form-control pull-right datepicker" id="datepicker" autocomplete="off" required>
													</div>
												</div> -->

											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
												<button type="submit" class="btn btn-primary">Keluarkan</button>
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
		<!--END HAPUS OBAT-->


