<style>
    .metismenu a {
        font-size:13px!important;
    }
    .metismenu i {
        font-size:20px!important;
    }
</style>
<body>
	<!--wrapper-->
	<div class="wrapper" id="menuicosss">
		<!--sidebar wrapper -->
		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<img src="https://absen.oncard.id/assets_oncard/images/ontime_logo.png" class="logo-icon" alt="logo icon" style="width:170px;">
				</div>
				<!-- <div>
					<h4 class="logo-text text-success">ON<b>CARD</b></h4>
				</div> -->
				<div  class="toggle-icon ms-auto" onclick="changemethod();"><i class='bx bx-arrow-to-left text-success' ></i>
				</div>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
				<li>
					<a href="<?=base_url().$function;?>">
						<div class="parent-icon"><i class='bx bxs-home-circle'></i>
						</div>
						<div class="menu-title">Dashboard</div>
					</a>
				</li>
				
                <li>
					<a href="<?=base_url().$function;?>/AbsenKelas">
						<div class="parent-icon"><i class='bx bx-shield-alt'></i>
						</div>
						<div class="menu-title">Absen Kelas</div>
					</a>
				</li>
				<?php
				if($role=='host'){ ?>
                	<li>
						<a href="<?=base_url().$function;?>/SyncPage">
							<div class="parent-icon"><i class='bx bx-sync'></i>
							</div>
							<div class="menu-title">Sinkronisasi Data Siswa</div>
						</a>
					</li>
                	<li>
						<a href="<?=base_url().$function;?>/SyncPageGeneral">
							<div class="parent-icon"><i class='bx bx-sync'></i>
							</div>
							<div class="menu-title">Sinkronisasi Data General</div>
						</a>
					</li>

                    <li>
						<a href="<?=base_url().$function;?>/Siswa">
							<div class="parent-icon">
                                <i class='bx bxs-user'></i>
							</div>
							<div class="menu-title">Siswa</div>
						</a>
					</li>
					
                    <li>
						<a href="<?=base_url().$function;?>/General">
							<div class="parent-icon">
                                <i class='bx bxs-user'></i>
							</div>
							<div class="menu-title">General</div>
						</a>
					</li>
					
                    <hr>


                    <li>
						<a href="<?=base_url().$function;?>/JadwalGuru">
							<div class="parent-icon"><i class='bx bxs-calendar-star text-warning'></i>
							</div>
							<div class="menu-title">Jadwal Pelajaran</div>
						</a>
					</li>

                    <hr>

                    <h6 class="px-3 py-3 text-muted" style="font-size:12px;">Master</h6>

                    <!-- <li>
						<a href="<?=base_url().$function;?>/TahunAkademik">
							<div class="parent-icon"><i class='bx bxs-category text-danger'></i>
							</div>
							<div class="menu-title">Tahun Akademik</div>
						</a>
					</li> -->
                    <li>
						<a href="<?=base_url().$function;?>/TahunAkademik">
							<div class="parent-icon"><i class='bx bxs-category text-danger'></i>
							</div>
							<div class="menu-title">Tahun Pelajaran</div>
						</a>
					</li>
                    <!-- <li>
						<a href="<?=base_url().$function;?>/Kelas">
							<div class="parent-icon"><i class='bx bxs-category text-primary'></i>
							</div>
							<div class="menu-title">Tingkatan</div>
						</a>
					</li> -->
                    <li>
						<a href="<?=base_url().$function;?>/SubKelas">
							<div class="parent-icon"><i class='bx bxs-category text-primary'></i>
							</div>
							<div class="menu-title">Kelas</div>
						</a>
					</li>
                    
                    <li>
						<a href="<?=base_url().$function;?>/MataPelajaran">
							<div class="parent-icon"><i class='bx bxs-category text-success'></i>
							</div>
							<div class="menu-title">Mata Pelajaran</div>
						</a>
					</li>
                    
                    <hr>

                    <!-- <li>
						<a href="<?=base_url().$function;?>/OrtuPage">
							<div class="parent-icon"><i class='bx bx-user-pin text-success'></i>
							</div>
							<div class="menu-title">Data Orangtua</div>
						</a>
					</li> -->
                    <h6 class="px-3 py-3 text-muted" style="font-size:12px;">onAbsent</h6>

                    <li>
                        <a href="<?=base_url().$function;?>/KategoriAbsen">
							<div class="parent-icon"><i class='bx bxs-circle text-success'></i>
							</div>
							<div class="menu-title">Kategori Absen</div>
						</a>
					</li>
                    <li>
						<a href="<?=base_url().$function;?>/KeteranganAbsen">
							<div class="parent-icon"><i class='bx bxs-circle text-primary'></i>
							</div>
							<div class="menu-title">Keterangan Absen</div>
						</a>
					</li>
                    <li>
						<a href="<?=base_url().$function;?>/HistoriAbsensi">
							<div class="parent-icon"><i class='bx bxs-folder text-dongker'></i>
							</div>
							<div class="menu-title">Riwayat Absen</div>
						</a>
					</li>
                   
                    <li>
						<a href="<?=base_url().$function;?>/HistoriAbsensiKelengkapan">
							<div class="parent-icon"><i class='bx bxs-folder text-dongker'></i>
							</div>
							<div class="menu-title">Riwayat Absen Kelengkapan <div class="badge bg-danger">NEW</div></div>
						</a>
					</li>
                    
                    <li>
						<a href="<?=base_url().$function;?>/BukuBatas">
							<div class="parent-icon"><i class='bx bxs-notepad text-dongker'></i>
							</div>
							<div class="menu-title">Buku Batas</div>
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
                    
                    <!-- <li>
						<a href="javascript:;" class="has-arrow">
							<div class="parent-icon"><i class='bx bx-file'></i>
							</div>
							<div class="menu-title">Jurnal Tagihan</div>
						</a>
						<ul>
							<li> <a href="<?=base_url().$function;?>/ListSeluruhTagihan"><i class='bx bx-radio-circle'></i>Jurnal Pembayaran</a>
							</li>
							<li> <a href="<?=base_url().$function;?>/ListTunggakan"><i class='bx bx-radio-circle'></i>Jurnal Tunggakan</a>
							</li>
						</ul>
					</li>

                    <hr>
                    <li>
						<a href="<?=base_url().$function;?>/Wapage_BulkMessageBroadcast">
							<div class="parent-icon"><i class='bx bxl-whatsapp text-success'></i>
							</div>
							<div class="menu-title" style="width:100%;">Broadcast 
                        </div>
						</a>
					</li>  -->
				
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
					<div class="user-box dropdown" >
						<a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							<!-- <img  src="<?=base_url();?>assets_oncard/images/icons/user.webp" class="user-img image-profile" alt="user avatar"> -->
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
							<li><a class="dropdown-item" style="cursor:pointer;" onclick="localStorage.clear();window.location.href = '<?=base_url() . 'LoginCore/logoutUser';?>'; "><i class='bx bx-log-out-circle'></i><span>Logout</span></a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</header>