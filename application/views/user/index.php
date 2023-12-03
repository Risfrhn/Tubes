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

				<div style="margin: 15px"  id="message">
					<?php echo $this->session->userdata('stok') <> '' ? $this->session->userdata('stok') : ''; ?>
				</div>

				<div class="panel-body">
					<div class="row">
						<div class="col-md-3">
							<div class="metric">
								<span class="icon"><i class="fas fa-tablets"></i></span>
								<p>
									<span class="number"><?= $obat; ?></span>
									<span class="title">Obat</span>
								</p>
							</div>
						</div>
						<div class="col-md-3">
							<div class="metric">
								<span class="icon"><i class="fas fa-chalkboard-teacher"></i></span>
								<p>
									<span class="number"><?= $pasien; ?></span>
									<span class="title">Pasien</span>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
						<div class="col-md-8">
							<!-- PANEL HEADLINE -->
							<div class="panel panel-headline">
								<div class="panel-heading">
									<h3 class="panel-title">Sistem Informasi <strong>Persediaan Obat</strong></h3>
								</div>
								<div class="panel-body">
									<p>Sistem Informasi Persediaan Obat di lingkungan <strong>Puskesmas Sangkrah</strong>. Dengan adanya sistem ini diharapkan mampu membantu dalam memanajemen obat dengan baik sehingga mengurangi/meminimalisir kesalahan input</p>
								</div>
							</div>
							<!-- END PANEL HEADLINE -->
						</div>
					</div>
			
		</div>
	</div>
	<!-- END MAIN CONTENT -->
</div>