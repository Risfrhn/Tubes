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
								<h3 class="panel-title"><?= $title; ?></h3>
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
																<th>Kode Obat</th>
																<th>Nama</th>
																<th>Satuan</th>
																<th>Stok</th>
															</tr>
														</thead>
														<tbody>
															<?php
															foreach($obatmasuk->result_array() as $om):
																?>
																<tr>
																	<td><?= $om['kd_obat'] ;?></td>
																	<td><?= $om['nama_obat'] ;?></td>
																	<td><?= $om['nama_satuan']; ?></td>
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
			</div>
			<!--PANEL HEADLINE-->
		</div>
	</div>
</div>