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
							<div class="col-md-6">
								<form action="<?php echo base_url('user/changepassword');?>" method="post">

									<div class="form-group">
										<label for="currentpassword">Current Password</label>
										<input type="password" class="form-control" id="currentpassword" name="currentpassword">
										<?php echo form_error('currentpassword','<small class="text-danger">','</small>');?>
									</div>

									<div class="form-group">
										<label for="newpassword1">New Password</label>
										<input type="password" class="form-control" id="newpassword1" name="newpassword1">
										<?php echo form_error('newpassword1','<small class="text-danger">','</small>');?>
									</div>

									<div class="form-group">
										<label for="newpassword2">Repeat New Password</label>
										<input type="password" class="form-control" id="newpassword2" name="newpassword2">
										<?php echo form_error('newpassword2','<small class="text-danger">','</small>');?>
									</div>

									<div class="form-group">
										<button type="submit" class="btn btn-primary">Change Password</button>
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
