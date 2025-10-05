<body>
	<!--wrapper-->
	<div class="wrapper" id="menuicosss">
		<!--sidebar wrapper -->
		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<img src="<?=base_url();?>assets_oncard/images/Logo_Ontuition_Dark.png" class="logo-icon" alt="logo icon" style="width:170px;">
				</div>
				<!-- <div>
					<h4 class="logo-text text-success">ON<b>CARD</b></h4>
				</div> -->
				<div  class="toggle-icon ms-auto" onclick="changemethod();"><i class='bx bx-arrow-to-left text-dark' ></i>
				</div>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
				<li>
					<a href="<?=base_url().$function;?>">
						<div class="parent-icon">
                            <i class='bx bxs-home-smile'></i>
						</div>
						<div class="menu-title">Dashboard</div>
					</a>
				</li>
				<?php
				if($role=='organisasi'){ ?>
					<li>
						<a href="<?=base_url().$function;?>/JenisTagihan">
							<div class="parent-icon"><i class='bx bxs-notepad text-dark'></i>
							</div>
							<div class="menu-title">Set Biaya</div>
						</a>
					</li>
                    <li>
						<a href="<?=base_url().$function;?>/PelajarPage">
							<div class="parent-icon">
                                <i class='bx bxs-user-detail text-dark'></i>
							</div>
							<div class="menu-title">Set Siswa</div>
						</a>
					</li>
					
                    <!-- <li>
						<a href="<?=base_url().$function;?>/ManageTagihan">
							<div class="parent-icon"><i class='bx bxs-note text-dark'></i>
							</div>
							<div class="menu-title">Detail</div>
						</a>
					</li> -->
                   
                    <hr>

                   
                    <li>
						<a href="javascript:;" class="has-arrow">
							<div class="parent-icon">
                            <i class='bx bxs-select-multiple'></i>
							</div>
							<div class="menu-title">Keuangan</div>
						</a>
						<ul>
							<li> <a href="<?=base_url().$function;?>/BalanceCash"><i class='bx bx-radio-circle'></i>Balance</a>
							</li>
							<li> <a href="<?=base_url().$function;?>/BalanceTransfer"><i class='bx bx-radio-circle'></i>Pindah Buku ( Pinbuk ) </a>
							</li>
							<li> <a href="<?=base_url().$function;?>/OncardBalance"><i class='bx bxs-circle'></i>Biaya Layanan</a>
							</li>
							
						</ul>
					</li>

                    <hr>
                    <li>
						<a href="javascript:;" class="has-arrow">
							<div class="parent-icon"><i class='bx bxs-file'></i>
							</div>
							<div class="menu-title">Jurnal</div>
						</a>
						<ul>
							<li> <a href="<?=base_url().$function;?>/ListSeluruhTagihan"><i class='bx bx-radio-circle'></i>Jurnal Pembayaran</a>
							</li>
							<li> <a href="<?=base_url().$function;?>/ListTunggakan"><i class='bx bx-radio-circle'></i>Jurnal Tunggakan</a>
							</li>
                            <li> <a href="<?=base_url().$function;?>/HistoriWithdrawal"><i class='bx bx-radio-circle'></i>Jurnal Pencairan</a>
							</li>
						</ul>
					</li>

                    <hr>
                    
                    <li>
						<a href="#/" class="text-danger" onclick="localStorage.clear();window.location.href = '<?=base_url() . 'LoginTagihan/logoutUser';?>'; ">
							<div class="parent-icon">
                            <i class='bx bx-log-out-circle'></i>
							</div>
							<div class="menu-title">Logout</div>
						</a>
					</li>
					
				
				<?php } ?>
					<!-- <li>
						<a href="<?=base_url().$function;?>/Profil">
							<div class="parent-icon"><i class='bx bx-cog'></i>
							</div>
							<div class="menu-title">Pengaturan</div>
						</a>
					</li> -->
			</ul>
			<!--end navigation-->
		</div>
		<!--end sidebar wrapper -->
		<!--start header -->
		<header>
			<div class="topbar d-flex align-items-center">
            <div>
                    <div class="d-flex align-items-center">
                        <div>
                        <img  src="<?=base_url();?>assets_oncard/images/icons/user.webp" class="user-img image-profile" alt="user avatar">
                        </div>
                        <div>
                            <h4 class="mx-4 mt-1 text-dongker box1val" style=""><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></h4>
                            <h4 class="mx-4 text-dongker box10val" style=""><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></h4>
                        </div>
                    </div>
                    
                </div>
				<nav class="navbar navbar-expand">
					<div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
					</div>
					
					<div class="top-menu ms-auto" >
						<ul class="navbar-nav align-items-center" style="display:none;">
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
							<li><a class="dropdown-item" style="cursor:pointer;" onclick="localStorage.clear();window.location.href = '<?=base_url() . 'LoginTagihan/logoutUser';?>'; "><i class='bx bx-log-out-circle'></i><span>Logout</span></a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</header>