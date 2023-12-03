<!-- WRAPPER -->
<div id="wrapper">
	<div class="vertical-align-wrap">
		<div class="vertical-align-middle">
			<div class="auth-box ">
				<div class="left">
					<div class="content">
						<div class="header">
							<p class="lead"><h1>LOG<strong> IN</strong></h1></p>
						</div>
						<?php echo $this->session->flashdata('message'); ?>
						<form method="post" action="<?php echo base_url('auth');?>">
							<div class="form-group">
								<label for="signin-email" class="control-label sr-only">Email</label>
								<input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo set_value('email');?>" autocomplete="off">
							</div>
							<?php echo form_error('email','<small class="text-danger align-left">','</small>');?>

							<div class="form-group">
								<label for="signin-password" class="control-label sr-only">Password</label>
								<input type="password" class="form-control" id="password" name="password" placeholder="Password">
							</div>
							<?php echo form_error('password','<small class="text-danger">','</small>');?>
							<div class="form-group clearfix"></div>

							<button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
						</form>
					</div>
				</div>
				<div class="right">
					<div class="overlay"></div>
					<div class="content text">
						<h1 class="heading">Sistem Informasi <strong>Persediaan Obat</strong></h1>
						<p><strong>Puskesmas Sangkrah Surakarta</strong></p>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div>
	<!-- END WRAPPER -->