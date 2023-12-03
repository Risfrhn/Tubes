<!-- MAIN -->
<div class="main">
	<!-- MAIN CONTENT -->
	<div class="main-content">
		<div class="container-fluid">

			<div class="panel panel-headline">
				<div class="panel-heading">
					<h3 class="panel-title"><?= $title; ?></h3>
					<hr class="sidebar-divider">
				</div>


				<div class="panel-body">
					<div class="row">
						<div class="col-md-12">
							<a href="" class="btn btn-primary" data-toggle="modal" data-target="#ModalTambahPasien"><i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Pasien</a>
						</div>
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
													<th style="width:5px;">ID</th>
													<th>Kode Pasien</th>
													<th>Nama</th>
													<th style="width:250px;">Alamat</th>
													<th>No. Rekam Medis</th>
													<th style="text-align:center;">Aksi</th>
												</tr>
											</thead>
											<tbody>
												<?php 
												$no=0;
												foreach($pasien->result_array() as $p): 
													$no++;
													?>
													<tr>
														<td><?= $no; ?></td>
														<td><?= $p['kd_pasien']; ?></td>
														<td><?=	$p['nama_pasien']; ?></td>
														<td><?= $p['alamat']; ?></td>
														<td><?= $p['no_rekam']; ?></td>
														<td style="text-align:center;">
															<a class="btn" data-toggle="modal" data-target="#ModalEditPasien<?= $p['kd_pasien'];?>"><span class="fas fa-edit"></span></a>
															<a class="btn" href="<?= base_url('pasien/lap_pasien_hasil/');?><?= encrypt_url($p['kd_pasien']); ?>"><span class="fas fa-print"></span></a>
															<a class="btn" data-toggle="modal" data-target="#ModalHapusPasien<?= $p['kd_pasien'];?>"><span class="fa fa-trash"></span></a>
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
	<!-- END MAIN CONTENT -->


	<!--TAMBAH PASIEN-->
	<div class="modal fade" id="ModalTambahPasien" tabindex="-1" role="dialog" aria-labelledby="ModalTambahPasienLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">

				<div class="panel">
					<div class="panel-heading">
						<div class="modal-header">
							<h3 class="modal-title" id="ModalTambahPasienLabel">Tambah Pasien</h3>
						</div>
					</div>

					<div class="panel-body">
						<div class="row">
							<div class="col-md-12">
								<form class="form-horizontal" action="<?= base_url('pasien/simpan'); ?>" method="post" enctype="multipart/form-data">
									<div class="modal-body">

										<div class="form-group">
											<label for="inputpasien">Kode Pasien</label>
											<input type="text" class="form-control" id="kd_pasien" name="kd_pasien" value="<?= $kode; ?>" readonly>
										</div>

										<div class="form-group">
											<label for="inputpasien">Nama Pasien</label>
											<input type="text" class="form-control" id="nama_pasien" name="nama_pasien" placeholder="Nama Pasien" autocomplete="off" required>
										</div>

										<div class="form-group">
											<label for="inputpasien">Alamat</label>
											<textarea class="form-control" rows="3" id="alamat" name="alamat"></textarea>
										</div>

										<div class="form-group">
											<label for="inputpasien">No Rekam Medis</label>
											<input type="text" class="form-control" id="no_rekam" name="no_rekam" placeholder="No Rekam Medis" autocomplete="off" required>
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
	<!--END TAMBAH PASIEN-->

	<!--EDIT PASIEN-->
	<?php foreach($pasien->result_array() as $p): ?>
	<div class="modal fade" id="ModalEditPasien<?= $p['kd_pasien']; ?>" tabindex="-1" role="dialog" aria-labelledby="ModalEditPasienLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">

				<div class="panel">
					<div class="panel-heading">
						<div class="modal-header">
							<h3 class="modal-title" id="ModalEditPasienLabel">Edit Pasien</h3>
						</div>
					</div>

					<div class="panel-body">
						<div class="row">
							<div class="col-md-12">
								<form class="form-horizontal" action="<?= base_url('pasien/ubah'); ?>" method="post" enctype="multipart/form-data">
									<div class="modal-body">

										<input type="hidden" name="kd_pasien" value="<?= $p['kd_pasien']; ?> ">

										<div class="form-group">
											<label for="inputpasien">Nama Pasien</label>
											<input type="text" class="form-control" id="nama_pasien" name="nama_pasien" value="<?= $p['nama_pasien']; ?> " autocomplete="off" required>
										</div>

										<div class="form-group">
											<label for="inputpasien">Alamat</label>
											<textarea class="form-control" rows="3" id="alamat" name="alamat"><?= $p['alamat']; ?></textarea>
										</div>

										<div class="form-group">
											<label for="inputpasien">No Rekam Medis</label>
											<input type="text" class="form-control" id="no_rekam" name="no_rekam" value="<?= $p['no_rekam']; ?> " autocomplete="off" required>
										</div>							

									</div>

									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
										<button type="submit" class="btn btn-primary">Ubah</button>
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
	<!--END EDIT PASIEN-->

	<!--HAPUS SATUAN-->
			<?php foreach($pasien->result_array() as $p): ?>
				<div class="modal fade" id="ModalHapusPasien<?= $p['kd_pasien'];?>" tabindex="-1" role="dialog" aria-labelledby="ModalHapusPasienLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">

							<div class="panel">
								<div class="panel-heading">
									<div class="modal-header">
										<h3 class="modal-title" id="ModalHapusPasienLabel">Hapus Pasien</h3>
									</div>
								</div>

								<div class="panel-body">
									<div class="row">
										<div class="col-md-12">
											<form class="form-horizontal" action="<?php echo base_url('pasien/hapus'); ?>" method="post" enctype="multipart/form-data">
												<div class="modal-body">
													<input type="hidden" name="kd_pasien" value="<?= $p['kd_pasien'];?>"/>
													<p>Menghapus pasien dapat <strong>menghapus</strong> data obat keluar yang bersangkutan</p>
													<p>Apakah Anda yakin mau menghapus Pasien <b><?= $p['nama_pasien'];?></b> ?</p>

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
			<!--END HAPUS SATUAN-->