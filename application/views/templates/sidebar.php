<!-- LEFT SIDEBAR -->
<div id="sidebar-nav" class="sidebar">
	<div class="sidebar-scroll">

		<!--QUERY MENU--> 
		<?php
		$role_id = $this->session->userdata('role_id');
		$queryMenu = "SELECT `user_menu`.`id`, `menu`
		FROM `user_menu` JOIN `user_access_menu` 
		ON `user_menu`.`id` = `user_access_menu`.`menu_id`
		WHERE `user_access_menu`.`role_id` = $role_id
		ORDER BY `user_access_menu`.`menu_id` ASC
		";
		$menu = $this->db->query($queryMenu)->result_array();
		?>

		<!-- LOOPING -->
		<?php foreach ($menu as $m): ?>    

			<?php 
			$menuId = $m['id'];
			$querySubMenu = "SELECT * FROM `user_sub_menu`
			WHERE `menu_id` = $menuId
			AND `is_active` = 1
			ORDER BY `user_sub_menu`.`sort_menu` ASC";
			$subMenu = $this->db->query($querySubMenu)->result_array();
			?>

			<nav>
				<ul class="nav">
					<?php foreach ($subMenu as $sm): ?>
						<?php if ($title == $sm['title']):?>
							<li>
								<a href="<?php echo base_url($sm['url']); ?>" class="active">
									<?php else : ?>
										<li>
											<a href="<?php echo base_url($sm['url']); ?>">
											<?php endif ; ?>
											<i class="<?php echo $sm['icon']; ?>"></i>
											<span><?php echo $sm['title']; ?></span>
										</a>
								<?php endforeach; ?>
								<hr>
							<?php endforeach; ?>

							<li>
								<a href="<?= base_url('auth/logout');?>">
									<i class="fas fa-fw fa-sign-out-alt"></i>
									<span>Log Out</span>
								</a>
						</ul>
					</nav>
				</div>
			</div>
		<!-- END LEFT SIDEBAR -->