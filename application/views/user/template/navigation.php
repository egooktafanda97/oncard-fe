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
						<a href="<?=base_url().$function;?>/General">
							<div class="parent-icon"><i class='bx bx-user-circle'></i>
							</div>
							<div class="menu-title">General</div>
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
							<li> <a href="<?=base_url().$function;?>/Mutasi_Transaksi_General"><i class='bx bx-radio-circle'></i>Laporan Saldo General</a>
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
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span class="alert-count">0</span>
									<i class='bx bx-bell'></i>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<a href="javascript:;">
										<div class="msg-header">
											<p class="msg-header-title">Notifications</p>
											<p class="msg-header-clear ms-auto">Marks all as read</p>
										</div>
									</a>
									<div class="header-notifications-list" style="height:auto!important;">
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-primary text-primary"><i class="bx bx-group"></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Tidak ada notifikasi yang masuk.<span class="msg-time float-end">0 Sec
												ago</span></h6>
													<p class="msg-info">Untuk saat ini.</p>
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
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span class="alert-count">0</span>
									<i class='bx bx-comment'></i>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<a href="javascript:;">
										<div class="msg-header">
											<p class="msg-header-title">Messages</p>
											<p class="msg-header-clear ms-auto">Marks all as read</p>
										</div>
									</a>
									<div class="header-message-list"  style="height:auto!important;">
									<a class="dropdown-item" href="javascript:;">
									<div class="d-flex align-items-center">
												<div class="notify bg-light-primary text-primary"><i class="bx bx-group"></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Tidak ada pesan yang masuk.<span class="msg-time float-end">0 Sec
												ago</span></h6>
													<p class="msg-info">Untuk saat ini.</p>
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
							<img  src="<?=base_url();?>assets_oncard/images/icons/user.webp" class="user-img image-profile" alt="user avatar">
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