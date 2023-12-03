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
										<th>Satuan</th>
										<th>Persediaan</th>
										<th>Pengeluaran</th>
										<th>Sisa Stok</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									$no=0;
									foreach ($stokfifo->result_array() as $s): 
										$no++;
									?>
									<tr>
										<td><?= $no; ?></td>
										<td><?= $s['kd_obat']; ?></td>
										<td><?= $s['nama_obat']; ?></td>
										<td><?= $s['nama_satuan']; ?></td>
										<td><?= $s['qty_obatmasuk']; ?></td>
										<td><?= $s['qty_obatkeluar']; ?></td>
										<td><?= $s['qty_stok']; ?></td>
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
