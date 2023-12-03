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
							<div class="col-md-6">
								<form action="<?php echo site_url('admin/lap_obatkeluar_hasil') ?>" method="post" class="form-horizontal form-bordered">
									<div class="form-group">
										<label class="col-md-2 control-label" for="example-daterange1">Tanggal</label>
										<div class="col-md-10">
											<div class="input-group input-daterange" data-date-format="yyyy/mm/dd">
												<input type="text" id="datepicker1" name="tgl1" class="form-control datepicker5" placeholder="Dari" autocomplete="off">
												<span class="input-group-addon"><i class="fa fa-chevron-right"></i></span>
												<input type="text" id="datepicker2" name="tgl2" class="form-control datepicker5" placeholder="Sampai" autocomplete="off">
											</div>
										</div>
									</div>
									<div class="form-group form-actions">
										<div class="col-md-10 col-md-offset-2">
											<button type="submit" class="btn btn-effect-ripple btn-primary">Tampil</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
