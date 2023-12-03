<div class="main" id="obatmasuk">
	<!-- MAIN CONTENT -->
	<div class="main-content">
		<div class="container-fluid">

			<div class="panel panel-headline">
				<div class="panel-heading">
					<div class="block-options pull-right">
						<a href="javascript:void(0)" id="buttonPrint" class="btn btn-effect-ripple btn-default" onclick="printContent('obatmasuk')"><i class="fa fa-print"></i> Print</a>
					</div>
					<h3 class="panel-title"><?= $title; ?></h3>
					<div class="justify-center">
						<img src="<?= base_url('assets/img/kop.png')?>" alt="">
					</div>
					<hr class="sidebar-divider">
				</div>

				<div class="panel-body">
					<div class="row">
						<div class="col-md-12">
							<table class="table table-striped" id="example6" style="font-size:13px;">
								Data Laporan Obat Masuk tanggal <?php echo date("d/m/Y", strtotime($date1)).' s/d '.date("d/m/Y", strtotime($date2)) ?><br><br>

								<thead>
									<tr>
										<th>ID</th>
										<th>Kode Obat</th>
										<th>Nama Obat</th>
										<th>Tanggal Kadaluarsa</th>
										<th>Jumlah</th>
										<th>Nama Petugas</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									$no=0;
									foreach ($hasildata->result_array() as $hd): 
										$no++;
									?>
									<tr>
										<td><?= $no; ?></td>
										<td><?= $hd['kd_obat']; ?></td>
										<td><?= $hd['nama_obat']; ?></td>
										<td><?= $hd['tgl_expired']; ?></td>
										<td><?= $hd['qty']; ?></td>
										<td><?= $hd['nama_petugas']; ?></td>
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
