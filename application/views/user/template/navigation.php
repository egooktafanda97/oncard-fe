<body>
	<!--wrapper-->
	<div class="wrapper" id="menuicosss">
		<!--sidebar wrapper -->
		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div style="text-align:center;">
					<img src="<?=base_url();?>assets_oncard/logo/logo_dongker.png" class="logo-icon" alt="logo icon" style="width:140px;">
				</div>
				<div>
					<!-- <h4 class="logo-text text-success">ON<b>CARD</b></h4> -->
				</div>
				<div  class="toggle-icon ms-auto" onclick="changemethod();"><i class='bx bx-arrow-to-left text-success' ></i>
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

                <?php if (isset($_SESSION['_token_apps'])) { ?>

                <li>
					<a href="<?=base_url().$function;?>/Agensi">
						<div class="parent-icon"><i class='bx bx-bookmark-heart'></i>
						</div>
						<div class="menu-title"><i class='bx bxs-lock text-danger'></i> Agensi</div>
					</a>
				</li>
                
                <li>
					<a href="<?=base_url().$function;?>/IpaymuPanel">
						<div class="parent-icon"><i class='bx bx-tag-alt'></i>
						</div>
						<div class="menu-title"><i class='bx bxs-lock text-danger'></i> Ipaymu Cashless</div>
					</a>
				</li>
				<li>
					<a href="<?=base_url().$function;?>/IpaymuPanelBiayaPendidikan">
						<div class="parent-icon"><i class='bx bxs-tag-alt'></i>
						</div>
						<div class="menu-title"><i class='bx bxs-lock text-danger'></i> Ipaymu Biaya Pendidikan</div>
					</a>
				</li>


                <li class="menu-label"><div>Finance</div></li>
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon">
                            <i class='bx bx-data'></i>
                        </div>
                        <div class="menu-title">
                            Fund Flow
                            
                        </div>
                    </a>
                    <ul class="submenu">
                        <li>
                            <a href="<?=base_url().$function;?>/FundManagement">
                                <i class='bx bxs-lock text-danger'></i> Fund Flow 
                            </a>
                        </li>
                        <li>
                            <a href="<?=base_url().$function;?>/FundManagementFee">
                                <i class='bx bxs-lock text-danger'></i> Ontuition - Admin Fee 
                            </a>
                        </li>
                        <li>
                            <a href="<?=base_url().$function;?>/FundManagementFeeOncard">
                                <i class='bx bxs-lock text-danger'></i> Oncard - Admin Fee 
                            </a>
                        </li>
                    </ul>
                </li>
				
                <hr/>

                <li class="menu-label"><div>QMS</div></li>
                
                <li>
					<a href="<?=base_url().$function;?>/ActivateQMSAccount">
						<div class="parent-icon">
                            <i class='bx bx-building-house'></i>
						</div>
						<div class="menu-title"><i class='bx bxs-lock text-danger'></i> Create Account  </div>
					</a>
				</li>
                
                <li>
					<a href="<?=base_url().$function;?>/ListQMSAccount">
						<div class="parent-icon">
                            <i class='bx bx-list-ol'></i>
						</div>
						<div class="menu-title"><i class='bx bxs-lock text-danger'></i> List Account  </div>
					</a>
				</li>
                
                <li class="menu-label"><div>Data Source</div></li>

                <li>
					<a href="<?=base_url().$function;?>/AppsNext">
						<div class="parent-icon"><i class='bx bx-certification' ></i>
						</div>
						<div class="menu-title"><i class='bx bxs-lock text-danger'></i> SNAP BRKS</div>
					</a>
				</li>
                
                <li>
					<a href="<?=base_url().$function;?>/ServerMonitoring">
						<div class="parent-icon"><i class='bx bxs-server' ></i>
						</div>
						<div class="menu-title"><i class='bx bxs-lock text-danger'></i> Server </div>
					</a>
				</li>
                

                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon">
                            <i class='bx bx-data'></i>
                        </div>
                        <div class="menu-title">
                            <i class='bx bxs-lock text-danger'></i> Data Source OnBoard 
                            
                        </div>
                    </a>
                    <ul class="submenu">
                        <li>
                            <a href="<?=base_url().$function;?>/DataSourceONBOARD/OncardTransaksi">
                                <i class='bx bx-chevron-right'></i> Oncard - Transaksi
                            </a>
                        </li>
                        <li>
                            <a href="<?=base_url().$function;?>/DataSourceONBOARD/OntuitionTagihan">
                                <i class='bx bx-chevron-right'></i> Ontuition - Tagihan
                            </a>
                        </li>
                        <li>
                            <a href="<?=base_url().$function;?>/DataSourceONBOARD/OntimeLaporan">
                                <i class='bx bx-chevron-right'></i> Ontime - Laporan
                            </a>
                        </li>
                    </ul>
                </li>

                <hr/>

                <?php } ?>

                <li class="menu-label"><div>Kartu Pelajar</div></li>
                <li>
					<a href="<?=base_url().$function;?>/RegistKartu">
						<div class="parent-icon"><i class='bx bx-id-card'></i>
						</div>
						<div class="menu-title">Registrasi Kartu</div>
					</a>
				</li>
                <li>
					<a href="<?=base_url().$function;?>/MonitoringBatchFastCard">
						<div class="parent-icon"><i class='bx bx-bolt-circle text-danger'></i>
						</div>
						<div class="menu-title">Monitoring Fastcard</div>
					</a>
				</li>
               
                <li>
					<a href="<?=base_url().$function;?>/CetakKartuListWait">
						<div class="parent-icon"><i class='bx bxs-id-card'></i>
						</div>
						<div class="menu-title">Cetak Kartu</div>
					</a>
				</li>

                <hr>

                <li class="menu-label"><div>Monitoring</div></li>
               
                <li>
					<a href="<?=base_url().$function;?>/DownloadPage">
						<div class="parent-icon"><i class='bx bx-food-menu'></i>
						</div>
						<div class="menu-title">Download Report</div>
					</a>
				</li>
               
               
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon">
                            <i class='bx bx-data'></i>
                        </div>
                        <div class="menu-title">
                            <i class='bx bxs-lock text-danger'></i>Sistem Monitoring
                            
                        </div>
                    </a>
                    <ul class="submenu">
                        <li>
                            <a href="<?=base_url().$function;?>/SistemMonitorPre">
                                <i class='bx bx-chevron-right'></i> Pre-TRX
                            </a>
                        </li>
                        <li>
                            <a href="<?=base_url().$function;?>/SistemMonitor">
                                <i class='bx bx-chevron-right'></i> Post-TRX
                            </a>
                        </li>
                    
                    </ul>
                </li>

                
                <li>
					<a href="<?=base_url().$function;?>/OrangtuaMonitoring">
						<div class="parent-icon"><i class='bx bx-user'></i>
						</div>
						<div class="menu-title">Orangtua</div>
					</a>
				</li>
                
                <hr>

                <li class="menu-label"><div>Additional</div></li>

                <li>
					<a href="<?=base_url().$function;?>/FiturManagement">
						<div class="parent-icon">
                            <i class='bx bx-layer-plus'></i>
						</div>
						<div class="menu-title">Fitur Manajemen</div>
					</a>
				</li>
                
                <li>
					<a href="<?=base_url().$function;?>/KonektifitasWatzap">
						<div class="parent-icon">
                            <i class='bx bxl-whatsapp '></i>
						</div>
						<div class="menu-title">Status Konektifitas Watzap</div>
					</a>
				</li>
                
                <li>
					<a href="<?=base_url().$function;?>/PushNotifMain">
						<div class="parent-icon">
                            <i class='bx bxs-bell-ring text-success'></i>
						</div>
						<div class="menu-title">Trigger Push Notif</div>
					</a>
				</li>
                <hr>
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
						<a href="<?=base_url().$function;?>/Membership">
							<div class="parent-icon"><i class='bx bx-crown'></i>
							</div>
							<div class="menu-title">Membership</div>
						</a>
					</li>
					
					<li>
						<a href="<?=base_url().$function;?>/Merchant">
							<div class="parent-icon"><i class='bx bx-shopping-bag'></i>
							</div>
							<div class="menu-title">Merchant</div>
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
							<li> <a href="<?=base_url().$function;?>/Mutasi_Transaksi_Siswa"><i class='bx bx-radio-circle'></i>Jurnal Siswa</a>
							</li>
							<li> <a href="<?=base_url().$function;?>/Mutasi_Transaksi_General"><i class='bx bx-radio-circle'></i>Jurnal General</a>
							</li>
							<li> <a href="<?=base_url().$function;?>/Mutasi_Transaksi_Kantin"><i class='bx bx-radio-circle'></i>Jurnal Merchant</a>
							</li>
							<li> <a href="<?=base_url().$function;?>/Mutasi_Withdrawal"><i class='bx bx-radio-circle'></i>Jurnal Pencairan</a>
							</li>
                            <!-- <li> <a href="#"><i class='bx bx-radio-circle'></i>Download
                            <font style="float:right;" class="ms-2 badge bg-danger">NEW</font>
                            </a>
							</li> -->
							<!-- <li> <a href="<?=base_url().$function;?>/Mutasi_Top_Up"><i class='bx bx-radio-circle'></i>Mutasi Top-Up Saldo</a>
							</li> -->
							<!-- <li> <a href="<?=base_url().$function;?>/Mutasi_Pendapatan"><i class='bx bx-radio-circle'></i>Mutasi Saldo</a>
							</li> -->
						</ul>
					</li>

                    <li>
						<a href="<?=base_url().$function;?>/Wapage">
							<div class="parent-icon"><i class='bx bxl-whatsapp'></i>
							</div>
							<div class="menu-title" style="width:100%;">Broadcast 
                            <!-- <font style="float:right;" class="badge bg-danger">NEW</font> -->
                        </div>
						</a>
					</li>
					
					<hr/>

					<li>
						<a href="<?=base_url().$function;?>/WDStakeHolders">
							<div class="parent-icon"><i class='bx bx-transfer'></i>
							</div>
							<div class="menu-title">Pencairan Bagi Hasil</div>
						</a>
					</li>

                    <li>
						<a href="<?=base_url().$function;?>/Profil">
							<div class="parent-icon"><i class='bx bx-cog'></i>
							</div>
							<div class="menu-title">Pengaturan</div>
						</a>
					</li>
                    
					<!-- <li>
						<a href="<?=base_url().$function;?>/WD">
							<div class="parent-icon"><i class='bx bx-transfer-alt'></i>
							</div>
							<div class="menu-title">Pencairan Dana</div>
						</a>
					</li> -->
				<?php }else if($role=='Merchant'){ ?>
					
					<li>
						<a href="<?=base_url().$function;?>/TransaksiTrialV21">
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
					
                    <li>
						<a href="<?=base_url().$function;?>/NominalList">
							<div class="parent-icon"><i class='bx bx-card'></i>
							</div>
							<div class="menu-title" style="width:100%;">Kartu Nominal </div>
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
							<li> <a href="<?=base_url().$function;?>/Revenue"><i class='bx bx-radio-circle'></i>Revenue</a>
							</li>
							<!-- <li> <a href="<?=base_url().$function;?>/Mutasi_Top_Up"><i class='bx bx-radio-circle'></i>Mutasi Top-Up Saldo</a>
							</li> -->
							<!-- <li> <a href="<?=base_url().$function;?>/Mutasi_Pendapatan"><i class='bx bx-radio-circle'></i>Mutasi Saldo</a>
							</li> -->
						</ul>
					</li>

                    <li>
						<a href="<?=base_url().$function;?>/Profil">
							<div class="parent-icon"><i class='bx bx-cog'></i>
							</div>
							<div class="menu-title">Pengaturan</div>
						</a>
					</li>
					
                    
					
				<?php } else { ?>
					<!-- empty menu -->
				<?php } ?>

                <li>
						<a onclick="localStorage.clear();sessionStorage.clear();window.location.href = '<?=base_url() . 'Login/logoutUser';?>'; " href="#/">
							<div class="parent-icon"><i class='bx bx-log-out-circle'></i>
							</div>
							<div class="menu-title">Logout</div>
						</a>
					</li>
					

					
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
					
					<div class="top-menu ms-auto">
                        <ul class="navbar-nav align-items-center">
							<li class="nav-item mobile-search-icon">
								
							</li>	
                            <?php
                            if($_SERVER['REQUEST_URI'] == '/'.$function){ ?>
                            <li class="nav-item saldow">
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
							<li class="nav-item dropdown dropdown-large" style="display:none;">
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
							<li><a class="dropdown-item" style="cursor:pointer;" onclick="localStorage.clear();window.location.href = '<?=base_url() . 'Login/logoutUser';?>'; "><i class='bx bx-log-out-circle'></i><span>Logout</span></a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</header>