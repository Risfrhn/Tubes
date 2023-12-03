<div class="main" id="stok">
	<!-- MAIN CONTENT -->
	<div class="main-content">
		<div class="container-fluid">

			<div class="panel panel-headline">
				<div class="panel-heading">
					<div class="block-options pull-right">
						<a href="javascript:void(0)" id="buttonPrint" class="btn btn-effect-ripple btn-default" onclick="printContent('stok')"><i class="fa fa-print"></i> Print</a>
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
								<thead>
									<tr>
										<th>ID</th>
										<th>Kode Obat</th>
										<th>Nama Obat</th>
										<th>Nama Satuan</th>
										<th>Jumlah</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									$no=0;
									foreach ($persediaan->result_array() as $p): 
										$no++;
									?>
									<tr>
										<td><?= $no; ?></td>
										<td><?= $p['kd_obat']; ?></td>
										<td><?= $p['nama_obat']; ?></td>
										<td><?= $p['nama_satuan']; ?></td>
										<td><?= $p['qty']; ?></td>
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
