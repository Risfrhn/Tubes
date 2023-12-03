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
							<?php echo form_error('name','<div class="text-danger">','</div>');?>
							<?php echo form_error('email','<div class="text-danger">','</div>');?>
							<a href="" class="btn btn-primary" data-toggle="modal" data-target="#newUserModal"><i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah User</a>
						</div>
					</div>
				</div>


				<div class="panel-body">
					<div class="row">
						<div class="col-md-12">
							<div class="card shadow">
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-striped" id="example1" style="font-size:13px;">
											<thead>
												<tr>
													<th>#</th>
													<th>Nama</th>
													<th>Email</th>
													<th scope="col" class="text-center" colspan="2">Action</th>
												</tr>
											</thead>
											<tbody>
												<?php $i = 1; ?>
												<?php foreach ($config as $c): ?>
													<tr>
														<th scope="row"><?= $i++; ?></th>
														<td><?= $c['name']; ?></td>
														<td><?= $c['email']; ?></td>

														<?php if ($c['is_active'] == 1):?>
															<td class="text-right">
																<a href="<?php echo base_url('admin/nonaktifUser/');?><?php echo encrypt_url($c['id']);?>"><span class="label label-success">nonaktif</span></a></td>
																<?php else : ?>
																	<td class="text-right">
																		<a href="<?php echo base_url('admin/aktifUser/');?><?php echo encrypt_url($c['id']);?>"><span class="label label-success">aktif</span></a></td>
																	<?php endif ; ?>
																	<td class="text-left">
																		<a href="<?php echo base_url('admin/deleteUser/');?><?php echo encrypt_url($c['id']);?>"onclick="return confirm('Sure?');"><span class="label label-success">delete</span></a> </td>     	
																	</tr>
																<?php endforeach ?>
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
				<!-- END MAIN CONTENT -->

				<!-- Modal Add User -->
				<div class="modal fade" id="newUserModal" tabindex="-1" role="dialog" aria-labelledby="newUserModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="newUserModalLabel">Tambah User</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<form action="<?php echo base_url('admin/addUser'); ?>" method="post">
								<div class="modal-body">
									<div class="form-group">
										<input type="text" class="form-control" id="name" name="name" placeholder="Full name">
									</div>
									<div class="form-group">
										<input type="email" class="form-control form-control-user" id="email" name="email" placeholder="Email Address">
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										<button type="submit" class="btn btn-primary">Tambah</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
