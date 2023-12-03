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



				<!--TABEL OBAT-->
				<div class="panel-body">
					<div class="row">
						<div class="col-md-12">
							<a href="" class="btn btn-primary" data-toggle="modal" data-target="#ModalTambahObat"><i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Obat</a>
							<a href="" class="btn btn-warning" data-toggle="modal" data-target="#ModalInfoObat"><i class="fas fa-question-circle" area-hidden="true"></i></a>
							
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
													<th>ID</th>
													<th>Kode Obat</th>
													<th>Nama</th>
													<th>Kategori</th>
													<th>Satuan</th>
													<th>Kegunaan</th>
													<th style="text-align:center;">Aksi</th>
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
														<td><?= $o['kegunaan'] ?></td>
														<td style="text-align:center;">
															<a class="btn" data-toggle="modal" data-target="#ModalEditObat<?= $o['kd_obat'];?>"><span class="fas fa-edit"></span></a>
															<a class="btn" data-toggle="modal" data-target="#ModalHapusObat<?= $o['kd_obat'];?>"><span class="fa fa-trash"></span></a>
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
			

			
			<div class="row">

				<!--TABEL KATEGORI-->
				<div class="col-md-6">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Kategori Obat</h3>
							<div class="right">
								<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
								<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
							</div>
						</div>

						<div class="panel-body">
							<div class="row">
								<div class="col-md-12">
									<a href="" class="btn btn-primary" data-toggle="modal" data-target="#ModalTambahKategori"><i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Kategori</a>
									<a href="" class="btn btn-warning" data-toggle="modal" data-target="#ModalInfoKategori"><i class="fas fa-question-circle" area-hidden="true"></i></a>
								</div>
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
															<th>Kategori</th>
															<th style="text-align:right;">Aksi</th>
														</tr>
													</thead>
													<tbody>
														<?php
														$no=0; 
														foreach($kategori->result_array() as $k): 
															$no++;
															?>
															<tr>
																<td><?= $no; ?></td>
																<td><?= $k['nama_kategori']; ?></td>
																<td style="text-align:right;">
																	<a class="btn" data-toggle="modal" data-target="#ModalEditKategori<?= $k['id_kategori'];?>"><span class="fas fa-edit"></span></a>
																	<a class="btn" data-toggle="modal" data-target="#ModalHapusKategori<?= $k['id_kategori'];?>"><span class="fa fa-trash"></span></a>
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
				<!--END TABEL KATEGORI-->

				<!--TABEL SATUAN-->
				<div class="col-md-6">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Satuan Obat</h3>
							<div class="right">
								<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
								<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
							</div>
						</div>

						<div class="panel-body">
							<div class="row">
								<div class="col-md-12">
									<a href="" class="btn btn-primary" data-toggle="modal" data-target="#ModalTambahSatuan"><i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Satuan</a>
									<a href="" class="btn btn-warning" data-toggle="modal" data-target="#ModalInfoSatuan"><i class="fas fa-question-circle" area-hidden="true"></i></a>
								</div>
							</div>
						</div>


						<div class="panel-body">
							<div class="row">
								<div class="col-md-12">
									<div class="card shadow">
										<div class="card-body">
											<div class="table-responsive">
												<table class="table table-striped" id="example3" style="font-size:13px;">
													<thead>
														<tr>
															<th>ID</th>
															<th>Satuan</th>
															<th style="text-align:right;">Aksi</th>
														</tr>
													</thead>
													<tbody>
														<?php
														$no=0; 
														foreach($satuan->result_array() as $s): 
															$no++;
															?>
															<tr>
																<td><?= $no; ?></td>
																<td><?= $s['nama_satuan']; ?></td>
																<td style="text-align:right;">
																	<a class="btn" data-toggle="modal" data-target="#ModalEditSatuan<?= $s['id_satuan'];?>"><span class="fas fa-edit"></span></a>
																	<a class="btn" data-toggle="modal" data-target="#ModalHapusSatuan<?= $s['id_satuan'];?>"><span class="fa fa-trash"></span></a>
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
				<!--END TABEL SATUAN-->


			</div>
			<!--END ROW-->
		</div>
		<!--END CONTAINER-->
	</div>
	<!-- END MAIN CONTENT -->


	<!--TAMBAH OBAT-->
	<div class="modal fade" id="ModalTambahObat" tabindex="-1" role="dialog" aria-labelledby="ModalTambahObatLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">

				<div class="panel">
					<div class="panel-heading">
						<div class="modal-header">
							<h3 class="modal-title" id="ModalTambahObatLabel">Tambah Obat</h3>
						</div>
					</div>

					<div class="panel-body">
						<div class="row">
							<div class="col-md-12">
								<form class="form-horizontal" action="<?= base_url('obat/simpanobat'); ?>" method="post" enctype="multipart/form-data">
									<div class="modal-body">

										<div class="form-group">
											<label for="inputobat">Kode Obat</label>
											<input type="text" class="form-control" id="kd_obat" name="kd_obat" value="<?= $kode; ?>" readonly>
										</div>

										<div class="form-group">
											<label for="inputobat">Nama Obat</label>
											<input type="text" class="form-control" id="nama_obat" name="nama_obat" placeholder="Nama Obat" autocomplete="off" required>
										</div>

										<div class="form-group">
											<label for="inputobat">Kategori</label>
											<select name="kategori" class="form-control" required>
												<option value="">-Pilih-</option>
												<?php foreach($kategori->result_array() as $k): ?>
													<option value="<?= $k['id_kategori']; ?>"><?= $k['nama_kategori']; ?></option>
												<?php endforeach; ?>
											</select>
										</div>

										<div class="form-group">
											<label for="inputobat">Satuan</label>
											<select name="satuan" class="form-control" required>
												<option value="">-Pilih-</option>
												<?php foreach($satuan->result_array() as $s): ?>
													<option value="<?= $s['id_satuan']; ?>"><?= $s['nama_satuan']; ?></option>
												<?php endforeach; ?>
											</select>
										</div>

										<div class="form-group">
											<label for="inputobat">Kegunaan</label>
											<textarea class="form-control" rows="2" id="kegunaan" name="kegunaan" required></textarea>
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
	<!--END TAMBAH OBAT-->


	<!--TAMBAH KATEGORI-->
	<div class="modal fade" id="ModalTambahKategori" tabindex="-1" role="dialog" aria-labelledby="ModalTambahKategoriLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">

				<div class="panel">
					<div class="panel-heading">
						<div class="modal-header">
							<h3 class="modal-title" id="ModalTambahKategoritLabel">Tambah Kategori</h3>
						</div>
					</div>

					<div class="panel-body">
						<div class="row">
							<div class="col-md-12">
								<form class="form-horizontal" action="<?= base_url('obat/simpankategori'); ?>" method="post" enctype="multipart/form-data">
									<div class="modal-body">

										<div class="form-group">
											<label for="inputkategori">Nama Kategori</label>
											<input type="text" class="form-control" id="nama_kategori" name="nama_kategori" autocomplete="off">
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
	<!--END TAMBAH KATEGORI-->

	<!--TAMBAH SATUAN-->
	<div class="modal fade" id="ModalTambahSatuan" tabindex="-1" role="dialog" aria-labelledby="ModalTambahSatuanLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">

				<div class="panel">
					<div class="panel-heading">
						<div class="modal-header">
							<h3 class="modal-title" id="ModalTambahSatuanLabel">Tambah Satuan</h3>
						</div>
					</div>

					<div class="panel-body">
						<div class="row">
							<div class="col-md-12">
								<form class="form-horizontal" action="<?= base_url('obat/simpansatuan'); ?>" method="post" enctype="multipart/form-data">
									<div class="modal-body">

										<div class="form-group">
											<label for="inputsatuan">Nama Satuan</label>
											<input type="text" class="form-control" id="nama_satuan" name="nama_satuan" autocomplete="off">
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
	<!--END TAMBAH SATUAN-->


	<!--EDIT OBAT-->
	<?php foreach($obat->result_array() as $o): ?>
		<div class="modal fade" id="ModalEditObat<?= $o['kd_obat']; ?>" tabindex="-1" role="dialog" aria-labelledby="ModalEditObatLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">

					<div class="panel">
						<div class="panel-heading">
							<div class="modal-header">
								<h3 class="modal-title" id="ModalEditObatLabel">Edit Obat</h3>
							</div>
						</div>

						<div class="panel-body">
							<div class="row">
								<div class="col-md-12">
									<form class="form-horizontal" action="<?= base_url('obat/ubahobat'); ?>" method="post" enctype="multipart/form-data">
										<div class="modal-body">

											<input type="hidden" name="kd_obat" value="<?= $o['kd_obat']; ?> ">

											<div class="form-group">
												<label for="inputobat">Nama Obat</label>
												<input type="text" class="form-control" id="nama_obat" name="nama_obat" value="<?= $o['nama_obat']; ?> " autocomplete="off" required>
											</div>

											<div class="form-group">
												<label for="inputobat">Kategori</label>
												<select name="kategori" class="form-control" required>
													<option value="">-Pilih-</option>
													<?php foreach($kategori->result_array() as $k): ?>
														<?php if($o['kategori']==$k['id_kategori']): ?>
															<option value="<?= $k['id_kategori']; ?>" selected><?= $k['nama_kategori']; ?></option>
															<?php else:?>
																<option value="<?= $k['id_kategori']; ?>"><?= $k['nama_kategori']; ?></option>
															<?php endif; ?>
														<?php endforeach; ?>
													</select>
												</div>

												<div class="form-group">
													<label for="inputsatuan">Satuan</label>
													<select name="satuan" class="form-control" required>
														<option value="">-Pilih-</option>
														<?php foreach($satuan->result_array() as $s): ?>
															<?php if($o['satuan']==$s['id_satuan']): ?>
																<option value="<?= $s['id_satuan']; ?>" selected><?= $s['nama_satuan']; ?></option>
																<?php else:?>
																	<option value="<?= $s['id_satuan']; ?>"><?= $s['nama_satuan']; ?></option>
																<?php endif; ?>
															<?php endforeach; ?>
														</select>
													</div>

													<div class="form-group">
														<label for="inputobat">Kegunaan</label>
														<textarea class="form-control" rows="2" id="kegunaan" name="kegunaan" required><?= $o['kegunaan']; ?></textarea>
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
			<!--END EDIT OBAT-->


			<!--EDIT KATEGORI-->
			<?php foreach ($kategori->result_array() as $k): ?>
				<div class="modal fade" id="ModalEditKategori<?= $k['id_kategori'];?>" tabindex="-1" role="dialog" aria-labelledby="ModalEditKategoriLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">

							<div class="panel">
								<div class="panel-heading">
									<div class="modal-header">
										<h3 class="modal-title" id="ModalEditKategoritLabel">Edit Kategori</h3>
									</div>
								</div>

								<div class="panel-body">
									<div class="row">
										<div class="col-md-12">
											<form class="form-horizontal" action="<?= base_url('obat/ubahkategori'); ?>" method="post" enctype="multipart/form-data">

												<div class="modal-body">

													<input type="hidden" name="id_kategori" value="<?= $k['id_kategori']; ?>">

													<div class="form-group">
														<label for="inputkategori">Nama Kategori</label>
														<input type="text" class="form-control" id="nama_kategori" name="nama_kategori" value="<?= $k['nama_kategori']; ?> " autocomplete="off">
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
			<!--END EDIT KATEGORI-->

			<!--EDIT SATUAN-->
			<?php foreach($satuan->result_array() as $s): ?>
				<div class="modal fade" id="ModalEditSatuan<?= $s['id_satuan'];?>" tabindex="-1" role="dialog" aria-labelledby="ModalEditSatuanLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">

							<div class="panel">
								<div class="panel-heading">
									<div class="modal-header">
										<h3 class="modal-title" id="ModalEditSatuanLabel">Edit Satuan</h3>
									</div>
								</div>

								<div class="panel-body">
									<div class="row">
										<div class="col-md-12">
											<form class="form-horizontal" action="<?= base_url('obat/ubahsatuan'); ?>" method="post" enctype="multipart/form-data">

												<div class="modal-body">

													<input type="hidden" name="id_satuan" value="<?= $s['id_satuan']; ?>">

													<div class="form-group">
														<label for="inputsatuan">Nama Satuan</label>
														<input type="text" class="form-control" id="nama_satuan" name="nama_satuan" value="<?= $s['nama_satuan']; ?>" autocomplete="off">
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
			<!--END EDIT SATUAN-->

			<!--HAPUS OBAT-->
			<?php foreach($obat->result_array() as $o): ?>
				<div class="modal fade" id="ModalHapusObat<?= $o['kd_obat']; ?>" tabindex="-1" role="dialog" aria-labelledby="ModalHapusObatLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">

							<div class="panel">
								<div class="panel-heading">
									<div class="modal-header">
										<h3 class="modal-title" id="ModalHapusObatLabel">Hapus Obat</h3>
									</div>
								</div>

								<div class="panel-body">
									<div class="row">
										<div class="col-md-12">
											<form class="form-horizontal" action="<?php echo base_url('obat/hapusobat'); ?>" method="post" enctype="multipart/form-data">
												<div class="modal-body">
													<input type="hidden" name="kd_obat" value="<?= $o['kd_obat'];?>"/>
													<p>Apakah Anda yakin mau menghapus Obat <b><?= $o['nama_obat'];?></b> ?</p>

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
			<!--END HAPUS OBAT-->


			<!--HAPUS KATEGORI-->
			<?php foreach ($kategori->result_array() as $k): ?>
				<div class="modal fade" id="ModalHapusKategori<?= $k['id_kategori'];?>" tabindex="-1" role="dialog" aria-labelledby="ModalHapusKategoriLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">

							<div class="panel">
								<div class="panel-heading">
									<div class="modal-header">
										<h3 class="modal-title" id="ModalHapusKategoritLabel">Hapus Kategori</h3>
									</div>
								</div>

								<div class="panel-body">
									<div class="row">
										<div class="col-md-12">
											<form class="form-horizontal" action="<?php echo base_url('obat/hapuskategori'); ?>" method="post" enctype="multipart/form-data">
												<div class="modal-body">
													<input type="hidden" name="id_kategori" value="<?= $k['id_kategori'];?>"/>
													<p>Menghapus kategori dapat <strong>menghapus</strong> data obat yang bersangkutan</p>
													<p>Apakah Anda yakin mau menghapus Kategori <b><?= $k['nama_kategori'];?></b> ?</p>

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
			<!--END HAPUS KATEGORI-->

			<!--HAPUS SATUAN-->
			<?php foreach($satuan->result_array() as $s): ?>
				<div class="modal fade" id="ModalHapusSatuan<?= $s['id_satuan'];?>" tabindex="-1" role="dialog" aria-labelledby="ModalHapusSatuanLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">

							<div class="panel">
								<div class="panel-heading">
									<div class="modal-header">
										<h3 class="modal-title" id="ModalHapusSatuanLabel">Hapus Satuan</h3>
									</div>
								</div>

								<div class="panel-body">
									<div class="row">
										<div class="col-md-12">
											<form class="form-horizontal" action="<?php echo base_url('obat/hapussatuan'); ?>" method="post" enctype="multipart/form-data">
												<div class="modal-body">
													<input type="hidden" name="id_satuan" value="<?= $s['id_satuan'];?>"/>
													<p>Menghapus satuan dapat <strong>menghapus</strong> data obat yang bersangkutan</p>
													<p>Apakah Anda yakin mau menghapus Satuan <b><?= $s['nama_satuan'];?></b> ?</p>

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

	<!--INFO OBAT-->
	<div class="modal fade" id="ModalInfoObat" tabindex="-1" role="dialog" aria-labelledby="ModalInfoObatLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">

				<div class="panel">
					<div class="panel-heading">
						<div class="modal-header">
							<h3 class="modal-title" id="ModalInfoObatLabel">Informasi !!</h3>
						</div>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-12">
								<p>Pastikan kategori obat dan satuan obat sudah anda isi</p>
								<p>Lakukan pengisian kategori dan satuan pada panel bawah dengan menekan tombol tambah di masing-masing kategori dan satuan</p>

								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--END INFO OBAT-->

	<!--INFO KATEGORI-->
	<div class="modal fade" id="ModalInfoKategori" tabindex="-1" role="dialog" aria-labelledby="ModalInfoKategoriLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">

				<div class="panel">
					<div class="panel-heading">
						<div class="modal-header">
							<h3 class="modal-title" id="ModalInfoKategoriLabel">Informasi !!</h3>
						</div>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-12">
								<p>Pastikan data kategori yang diinputkan benar</p>
								<p>Dengan menghapus data kategori, anda juga menghapus data obat yang bersangkutan</p>

								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--END INFO KATEGORI-->

	<!--INFO SATUAN-->
	<div class="modal fade" id="ModalInfoSatuan" tabindex="-1" role="dialog" aria-labelledby="ModalInfoSatuanLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">

				<div class="panel">
					<div class="panel-heading">
						<div class="modal-header">
							<h3 class="modal-title" id="ModalInfoSatuanLabel">Informasi !!</h3>
						</div>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-12">
								<p>Pastikan data satuan yang diinputkan benar</p>
								<p>Dengan menghapus data satuan, anda juga menghapus data obat yang bersangkutan</p>

								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--END INFO SATUAN-->

