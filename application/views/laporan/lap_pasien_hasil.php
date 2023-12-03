<div class="main" id="pasienhasil">
	<!-- MAIN CONTENT -->
	<div class="main-content">
		<div class="container-fluid">

			<div class="panel panel-headline">
				<div class="panel-heading">
					<div class="block-options pull-right">
						<a href="javascript:void(0)" id="buttonPrint" class="btn btn-effect-ripple btn-default" onclick="printContent('pasienhasil')"><i class="fa fa-print"></i> Print</a>
					</div>
					<h3 class="panel-title">Laporan Pasien</h3>
					<hr class="sidebar-divider">
				</div>

				<div class="panel-body">
					<div class="row">
						<div class="col-md-12">
								<table class="table table-bordered table-vcenter">
									<?php foreach($pasien_byId->result_array() as $p) { ?>
									<tr>
										<td style="width: 100px"><strong>Kode Pasien</strong></td>
										<td style="width: 350px"><?= $p['kd_pasien']; ?></td>
									</tr>
									<tr>
										<td style="width: 100px"><strong>Nama Pasien</strong></td>
										<td style="width: 350px"><?= $p['nama_pasien']; ?></td>
									</tr>
									<tr>
										<td style="width: 100px"><strong>Alamat</strong></td>
										<td style="width: 350px"><?= $p['alamat']; ?></td>
									</tr>
									<tr>
										<td style="width: 100px"><strong>No Rekam Medis</strong></td>
										<td style="width: 350px"><?= $p['no_rekam']; ?></td>
									</tr>
								<?php } ?>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
