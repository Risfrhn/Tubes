<div class="main" id="pasien">
	<!-- MAIN CONTENT -->
	<div class="main-content">
		<div class="container-fluid">

			<div class="panel panel-headline">
				<div class="panel-heading">
					<div class="block-options pull-right">
						<a href="javascript:void(0)" id="buttonPrint" class="btn btn-effect-ripple btn-default" onclick="printContent('pasien')"><i class="fa fa-print"></i> Print</a>
					</div>
					<h3 class="panel-title"><?= $title; ?></h3>
					<hr class="sidebar-divider">
				</div>

				<div class="panel-body">
					<div class="row">
						<div class="col-md-12">
							<div class="card shadow">
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-striped" id="example6" style="font-size:13px;">
											<thead>
												<tr>
													<th style="width:5px;">ID</th>
													<th style="width:160px;">Kode Pasien</th>
													<th style="width:160px;">Nama</th>
													<th style="width:250px;">Alamat</th>
													<th style="width:200px;">No. Rekam Medis</th>
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
</div>
