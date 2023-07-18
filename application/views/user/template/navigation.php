<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<img src="<?=base_url();?>assets/png/icon.png" class="logo-icon" alt="logo icon">
				</div>
				<div>
					<h4 class="logo-text text-success">ON<b>CARD</b></h4>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left text-success'></i>
				</div>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
				<li>
					<a href="<?=base_url().$function;?>">
						<div class="parent-icon"><i class='bx bx-home-circle'></i>
						</div>
						<div class="menu-title">Dashboard</div>
					</a>
				</li>
				<?php
				if($role=='owner'){ ?>
                <li>
					<a href="<?=base_url().$function;?>/Agensi">
						<div class="parent-icon"><i class='bx bx-bookmark-heart'></i>
						</div>
						<div class="menu-title">Agensi</div>
					</a>
				</li>
				<?php }else if($role=='Host'){ ?>
					
					<li>
						<a href="<?=base_url().$function;?>/Siswa">
							<div class="parent-icon"><i class='bx bx-user-circle'></i>
							</div>
							<div class="menu-title">Siswa</div>
						</a>
					</li>
					
					<li>
						<a href="<?=base_url().$function;?>/Kantin">
							<div class="parent-icon"><i class='bx bx-shopping-bag'></i>
							</div>
							<div class="menu-title">Kantin</div>
						</a>
					</li>
					
					
                    <hr/>
                    <!-- <li>
						<a href="<?=base_url().$function;?>/Saldo">
							<div class="parent-icon"><i class='bx bx-wallet'></i>
							</div>
							<div class="menu-title">Tabungan & Saldo</div>
						</a>
					</li> -->
                    
                    <li>
						<a href="javascript:;" class="has-arrow">
							<div class="parent-icon"><i class='bx bx-file'></i>
							</div>
							<div class="menu-title">Jurnal</div>
						</a>
						<ul>
							<li> <a href="<?=base_url().$function;?>/Mutasi_Transaksi_Siswa"><i class='bx bx-radio-circle'></i>Laporan Saldo Siswa</a>
							</li>
							<li> <a href="<?=base_url().$function;?>/Mutasi_Transaksi_Kantin"><i class='bx bx-radio-circle'></i>Laporan Saldo Kantin</a>
							</li>
							<li> <a href="<?=base_url().$function;?>/Mutasi_Withdrawal"><i class='bx bx-radio-circle'></i>Mutasi Pencairan Saldo</a>
							</li>
							<!-- <li> <a href="<?=base_url().$function;?>/Mutasi_Top_Up"><i class='bx bx-radio-circle'></i>Mutasi Top-Up Saldo</a>
							</li> -->
							<!-- <li> <a href="<?=base_url().$function;?>/Mutasi_Pendapatan"><i class='bx bx-radio-circle'></i>Mutasi Saldo</a>
							</li> -->
						</ul>
					</li>
					
					<hr/>
                    
					<!-- <li>
						<a href="<?=base_url().$function;?>/WD">
							<div class="parent-icon"><i class='bx bx-transfer-alt'></i>
							</div>
							<div class="menu-title">Pencairan Dana</div>
						</a>
					</li> -->
				<?php }else if($role=='Merchant'){ ?>
					
					<li>
						<a href="<?=base_url().$function;?>/Transaksi">
							<div class="parent-icon"><i class='bx bx-calculator'></i>
							</div>
							<div class="menu-title">Transaksi</div>
						</a>
					</li>

					<li>
						<a href="<?=base_url().$function;?>/Produk">
							<div class="parent-icon"><i class='bx bx-shopping-bag'></i>
							</div>
							<div class="menu-title">Produk</div>
						</a>
					</li>
					
					<hr/>

					<li>
						<a href="javascript:;" class="has-arrow">
							<div class="parent-icon"><i class='bx bx-file'></i>
							</div>
							<div class="menu-title">Jurnal</div>
						</a>
						<ul>
							<li> <a href="<?=base_url().$function;?>/Riwayat"><i class='bx bx-radio-circle'></i>Riwayat Transaksi</a>
							</li>
							<li> <a href="<?=base_url().$function;?>/Mutasi_Withdrawal"><i class='bx bx-radio-circle'></i>Mutasi Pencairan Saldo</a>
							</li>
							<!-- <li> <a href="<?=base_url().$function;?>/Mutasi_Top_Up"><i class='bx bx-radio-circle'></i>Mutasi Top-Up Saldo</a>
							</li> -->
							<!-- <li> <a href="<?=base_url().$function;?>/Mutasi_Pendapatan"><i class='bx bx-radio-circle'></i>Mutasi Saldo</a>
							</li> -->
						</ul>
					</li>
					
					
				<?php } else { ?>
					<!-- empty menu -->
				<?php } ?>

					<li>
						<a href="<?=base_url().$function;?>/Profil">
							<div class="parent-icon"><i class='bx bx-cog'></i>
							</div>
							<div class="menu-title">Pengaturan</div>
						</a>
					</li>
			</ul>
			<!--end navigation-->
		</div>
		<!--end sidebar wrapper -->
		<!--start header -->
		<header>
			<div class="topbar d-flex align-items-center">
				<nav class="navbar navbar-expand">
					<div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
					</div>
					
					<div class="top-menu ms-auto">
						<ul class="navbar-nav align-items-center">
							<li class="nav-item mobile-search-icon">
								
							</li>	
                            <?php
                            if($_SERVER['REQUEST_URI'] == '/'.$function){ ?>
                            <li class="nav-item">
                                <div class="badge badge-lg bg-gradient-blooker p-2 px-4 text-dark" data-bs-toggle="tooltip" data-bs-placement="top" title="Saldo Anda pada saat ini" ><img src="<?=base_url();?>assets_oncard/images/coins_2.png" style="width:2em;height:2em; margin-right:7px;"/> <span class="getSaldoInstansiCache">Rp0</span></div>
                            </li>
                            <?php }?>
                            
							<li class="nav-item dropdown dropdown-large">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span class="alert-count">7</span>
									<i class='bx bx-bell'></i>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<a href="javascript:;">
										<div class="msg-header">
											<p class="msg-header-title">Notifications</p>
											<p class="msg-header-clear ms-auto">Marks all as read</p>
										</div>
									</a>
									<div class="header-notifications-list">
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-primary text-primary"><i class="bx bx-group"></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">New Customers<span class="msg-time float-end">14 Sec
												ago</span></h6>
													<p class="msg-info">5 new user registered</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-danger text-danger"><i class="bx bx-cart-alt"></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">New Orders <span class="msg-time float-end">2 min
												ago</span></h6>
													<p class="msg-info">You have recived new orders</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-success text-success"><i class="bx bx-file"></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">24 PDF File<span class="msg-time float-end">19 min
												ago</span></h6>
													<p class="msg-info">The pdf files generated</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-warning text-warning"><i class="bx bx-send"></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Time Response <span class="msg-time float-end">28 min
												ago</span></h6>
													<p class="msg-info">5.1 min avarage time response</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-info text-info"><i class="bx bx-home-circle"></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">New Product Approved <span
												class="msg-time float-end">2 hrs ago</span></h6>
													<p class="msg-info">Your new product has approved</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-danger text-danger"><i class="bx bx-message-detail"></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">New Comments <span class="msg-time float-end">4 hrs
												ago</span></h6>
													<p class="msg-info">New customer comments recived</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-success text-success"><i class='bx bx-check-square'></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Your item is shipped <span class="msg-time float-end">5 hrs
												ago</span></h6>
													<p class="msg-info">Successfully shipped your item</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-primary text-primary"><i class='bx bx-user-pin'></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">New 24 authors<span class="msg-time float-end">1 day
												ago</span></h6>
													<p class="msg-info">24 new authors joined last week</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-warning text-warning"><i class='bx bx-door-open'></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Defense Alerts <span class="msg-time float-end">2 weeks
												ago</span></h6>
													<p class="msg-info">45% less alerts last 4 weeks</p>
												</div>
											</div>
										</a>
									</div>
									<a href="javascript:;">
										<div class="text-center msg-footer">View All Notifications</div>
									</a>
								</div>
							</li>
							<li class="nav-item dropdown dropdown-large">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span class="alert-count">8</span>
									<i class='bx bx-comment'></i>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<a href="javascript:;">
										<div class="msg-header">
											<p class="msg-header-title">Messages</p>
											<p class="msg-header-clear ms-auto">Marks all as read</p>
										</div>
									</a>
									<div class="header-message-list">
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img  src="<?=base_url();?>assets_oncard/images/avatars/avatar-1.png" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Daisy Anderson <span class="msg-time float-end">5 sec
												ago</span></h6>
													<p class="msg-info">The standard chunk of lorem</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img  src="<?=base_url();?>assets_oncard/images/avatars/avatar-2.png" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Althea Cabardo <span class="msg-time float-end">14
												sec ago</span></h6>
													<p class="msg-info">Many desktop publishing packages</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img  src="<?=base_url();?>assets_oncard/images/avatars/avatar-3.png" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Oscar Garner <span class="msg-time float-end">8 min
												ago</span></h6>
													<p class="msg-info">Various versions have evolved over</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img  src="<?=base_url();?>assets_oncard/images/avatars/avatar-4.png" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Katherine Pechon <span class="msg-time float-end">15
												min ago</span></h6>
													<p class="msg-info">Making this the first true generator</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img  src="<?=base_url();?>assets_oncard/images/avatars/avatar-5.png" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Amelia Doe <span class="msg-time float-end">22 min
												ago</span></h6>
													<p class="msg-info">Duis aute irure dolor in reprehenderit</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img  src="<?=base_url();?>assets_oncard/images/avatars/avatar-6.png" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Cristina Jhons <span class="msg-time float-end">2 hrs
												ago</span></h6>
													<p class="msg-info">The passage is attributed to an unknown</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img  src="<?=base_url();?>assets_oncard/images/avatars/avatar-7.png" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">James Caviness <span class="msg-time float-end">4 hrs
												ago</span></h6>
													<p class="msg-info">The point of using Lorem</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img  src="<?=base_url();?>assets_oncard/images/avatars/avatar-8.png" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Peter Costanzo <span class="msg-time float-end">6 hrs
												ago</span></h6>
													<p class="msg-info">It was popularised in the 1960s</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img  src="<?=base_url();?>assets_oncard/images/avatars/avatar-9.png" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">David Buckley <span class="msg-time float-end">2 hrs
												ago</span></h6>
													<p class="msg-info">Various versions have evolved over</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img  src="<?=base_url();?>assets_oncard/images/avatars/avatar-10.png" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Thomas Wheeler <span class="msg-time float-end">2 days
												ago</span></h6>
													<p class="msg-info">If you are going to use a passage</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img  src="<?=base_url();?>assets_oncard/images/avatars/avatar-11.png" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Johnny Seitz <span class="msg-time float-end">5 days
												ago</span></h6>
													<p class="msg-info">All the Lorem Ipsum generators</p>
												</div>
											</div>
										</a>
									</div>
									<a href="javascript:;">
										<div class="text-center msg-footer">View All Messages</div>
									</a>
								</div>
							</li>				
						</ul>
					</div>
					<div class="user-box dropdown">
						<a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							<img  src="<?=base_url();?>assets_oncard/images/icons/user.webp" class="user-img" alt="user avatar">
							<div class="user-info ps-3">
								<p class="user-name mb-0" style="text-transform:uppercase;"><?php if($namaLengkap){echo $namaLengkap;}else {echo 'User';}?></p>
								<p class="designattion mb-0" style="text-transform:capitalize;"><?=$role;?></p>
							</div>
						</a>
						<ul class="dropdown-menu dropdown-menu-end">
							<li><a class="dropdown-item" href="<?=base_url().$function;?>/Profil"><i class="bx bx-cog"></i><span>Pengaturan</span></a>
							</li>
							<li>
								<div class="dropdown-divider mb-0"></div>
							</li>
							<li><a class="dropdown-item" style="cursor:pointer;" onclick="localStorage.clear();window.location.href = '<?=base_url() . 'Login/logoutUser';?>'; "><i class='bx bx-log-out-circle'></i><span>Logout</span></a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</header>