<style type="text/css">
    .invoice-card {
    display: flex;
    flex-direction: column;
    position: relative;
    padding: 10px 2em;
    top: 0%;
    left: 50%;
    transform: translate(-50%, 0%);
    min-height: 25em;
    width: 22em;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0px 10px 30px 5px rgba(0, 0, 0, 0.15);
    }

    .invoice-card > div {
    margin: 5px 0;
    }

    .invoice-title {
    flex: 3;
    }

    .invoice-title #date {
    display: block;
    /* margin: 8px 0; */
    font-size: 12px;
    }

    .invoice-title #main-title {
    display: flex;
    justify-content: space-between;
    margin-top: 0em;
    }

    .invoice-title #main-title h4 {
    letter-spacing: 2.5px;
    }

    .invoice-title span {
    color: rgba(0, 0, 0, 0.4);
    }

    .invoice-details {
    flex: 1;
    border-top: 0.5px dashed grey;
    display: flex;
    align-items: center;
    }

    .invoice-table {
    width: 100%;
    border-collapse: collapse;
    }

    .invoice-table thead tr td {
    font-size: 12px;
    letter-spacing: 1px;
    color: grey;
    padding: 8px 0;
    }

    .invoice-table thead tr td:nth-last-child(1),
    .row-data td:nth-last-child(1),
    .calc-row td:nth-last-child(1)
    {
    text-align: right;
    }

    .invoice-table tbody tr td {
        padding: 8px 0;
        letter-spacing: 0;
    }

    .invoice-table .row-data #unit {
    text-align: center;
    }

    .invoice-table .row-data span {
    font-size: 13px;
    color: rgba(0, 0, 0, 0.6);
    }

    .invoice-footer {
    flex: 1;
    display: flex;
    justify-content: flex-end;
    align-items: center;
    }

    .invoice-footer #later {
    margin-right: 5px;
    }

</style>
<div class="page-wrapper">
        <div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Pengaturan</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Pengaturan</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
				<div class="container">
					<div class="main-body">
						<div class="row">
							<div class="col-lg-4">
								<div class="card">
									<div class="card-body">
										<div class="d-flex flex-column align-items-center text-center">
											<img src="<?=base_url();?>assets_oncard/images/icons/user.webp" alt="Admin" class="rounded-circle p-1 bg-primary image-profile" width="110">
											<div class="mt-3">
												<h4 style="text-transform:uppercase;" id="username">Loading...</h4>
												<p class="text-secondary mb-1" id="namaUser">Loading...</p>
												<p class="text-muted font-size-sm" id="alamat">Loading</p>
											</div>
										</div>
										<hr class="my-4">
										<ul class="list-group list-group-flush">
											<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
												<h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe me-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>Saldo</h6>
												<span class="text-secondary" id="saldo">Loading...</span>
											</li>
											<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
												<h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe me-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>Tanggal Join</h6>
												<span class="text-secondary" id="tglJoin">Loading...</span>
											</li>
											<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
												<h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe me-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>Email</h6>
												<span class="text-secondary" id="email">Loading...</span>
											</li>
											<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
												<h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe me-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>No. Rekening</h6>
												<span class="text-secondary" id="nomorRekening">Loading...</span>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-lg-8">
								<div class="card">
									<div class="card-body">
                                        <div class="row mb-3">
                                            <div class="col-12">
                                                <h5>Akun</h5>
                                                <small class="text-muted">Konfigurasi informasi akun, Anda dapat mengubah informasi email / pin / foto profil melalui panel ini.</small>
                                            </div>
                                        </div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Username</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" id="usernameText" value="" readonly disabled>
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Email</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="email" id="emailText" class="form-control" value="">
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">PIN</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="password" id="pin" class="form-control" value="" placeholder="Kosongkan saja apabila tidak akan diubah!">
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Foto profil</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="file" class="form-control" id="foto" value="">
											</div>
										</div>
										<div class="row">
											<div class="col-sm-3"></div>
											<div class="col-sm-9 text-secondary">
												<button type="button" onclick="saveSettingAccount();" id="btnSettingAkun" class="btn btn-primary px-4"><i class="bx bx-save"></i> Simpan</button>
											</div>
										</div>
									</div>
								</div>
                                
                                <div class="card">
									<div class="card-body putKontenSpesifikUser">

                                    </div>
                                </div>
								
								<div class="card">
									<div class="card-body">
										<div class="col-12 mb-3">
											<h5>Rekening BRKS <img src="<?=base_url();?>assets_oncard/images/BRK_Syariah.webp" style="width:100%; max-width:150px;text-align:center;float:right;"/></h5>
											<small class="text-muted mt-4 mb-3" style="display:block;">Pengaturan ini hanya dapat dilakukan melalui Administrator Instansi. Silahkan hubungi pihak administrator apabila ingin mengubah informasi nomor rekening Anda.</small>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Nomor Rekening</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="number" id="norekBank" class="form-control" value="" placeholder="Harus dimasukkan nomor rekening BRKs" readonly disabled>
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Nama di rekening</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" id="namadiRekening" class="form-control" value="" placeholder="" readonly disabled>
											</div>
										</div>

										<div class="row divupdatebankagensi" style="display:none;">
											<div class="col-sm-3"></div>
											<div class="col-sm-9 text-secondary">
												<button type="button" onclick="saveSettingAccountBank();" id="btnSettingAkunBank" class="btn btn-primary px-4"><i class="bx bx-save"></i> Simpan</button>
											</div>
										</div>

                                    </div>
                                </div>
								
								<div class="row">
									<div class="col-sm-12">
										<div class="card">
											<div class="card-body">
												<img src="<?=base_url();?>assets/png/image_welcome_oncard.webp" style="width:100%; object-fit:cover;object-position:center;height:200px;"/>
											</div>
										</div>
									</div>
								</div>

								<div class="card">
									<div class="card-body">
                                        <div class="row mb-3">
                                            <div class="col-12">
                                                <h5>Keamanan</h5>
                                                <small class="text-muted">Konfigurasi password akun melalui panel ini.</small>
                                            </div>
                                        </div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Password saat ini</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="password" class="form-control" id="currentPass" value="">
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Password Baru</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="password" id="newPass" class="form-control" value="">
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Konfirmasi Password Baru</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="password" id="newPass2" class="form-control" value="" placeholder="Harus sama dengan inputan diatas!">
											</div>
										</div>
										<div class="row">
											<div class="col-sm-3"></div>
											<div class="col-sm-9 text-secondary">
												<button type="button" onclick="saveSettingAccountPassword();" id="btnSettingAkunPassword" class="btn btn-primary px-4"><i class="bx bx-save"></i> Simpan</button>
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

        <div class="modal fade" id="invoiceModal" tabindex="-1" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content" style="background:transparent;border:none;">
					<div class="modal-body">
					</div>
				</div>
			</div>
		</div>

		<script type="text/javascript">
            
            let isFilterOn = false;
            let urlSetFromFilter = '';
            let totalTabungan = '0';
            let filterTabungan = 0;
            let oldDateKeep = '';

            let roleUser = '';
            let alamatUser = '';
            let saldoUser = '';

			let idAkun = '';
			let accountNumber = '';
            
            let url = '';
            
            function getAkunPengaturan(roleUserX,accountNumberX){

                if(roleUserX=='agensi'){
                    url = '<?= api_url(); ?>api/v1/account/auth';
                }else {
                    url = '<?= api_url(); ?>api/v1/usr?q='+accountNumberX;
                }
                
				const save2 = async () => {
					const posts2 = await axios.get( url , {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {
						console.log(err.response);
					});
			
					if (posts2.status == 200) {
                        // console.log(posts2.data.data);
                        let accountNumber = accountNumberX;
                        roleUser = roleUserX;
                        
                        let html = '';

                        if(roleUser=='agensi'){
							$('#norekBank').prop("disabled", false);
							$('#norekBank').prop("readonly", false);
							
							$('#namadiRekening').prop("disabled", false);
							$('#namadiRekening').prop("readonly", false);

							$('.divupdatebankagensi').attr('style','display:flex');
							
                            userIDX = posts2.data.data[0].id;
                            alamatUser = posts2.data.data[0].instansi.alamat;
                            saldoUser = posts2.data.data[2].balance;
                            idAkun = posts2.data.data[2].id;
                            accountNumber = posts2.data.data[2].account_number;
                            if(posts2.data.data[0].user.foto!=undefined  && posts2.data.data[0].user.foto!=null){
                                $('.image-profile').attr('src','<?=base_url();?>app/assets/users/foto/'+posts2.data.data[0].user.foto);
                            }

                            html+=`
                            <div class="row mb-3">
                                <div class="col-12">
                                    <h5>Informasi</h5>
                                    <small class="text-muted">Pengaturan lainnya yang dapat Anda lakukan melalui panel ini.</small>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Nama Lengkap</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" id="fullName" value="">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Alamat</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <textarea rows="2" class="form-control" id="alamatText"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9 text-secondary">
                                <button type="button" onclick="saveSettingAccountNext();" id="btnSettingAkunNext" class="btn btn-primary px-4"><i class="bx bx-save"></i> Simpan</button>
                                </div>
                            </div>
                            `;

                        }else if(roleUser=='seller'){
							$('.divupdatebankagensi').attr('style','display:none');
                            userIDX = posts2.data.data.id;
                            saldoUser = posts2.data.data.balance;
                            alamatUser = posts2.data.data.kantin.alamat_lengkap;
							idAkun = posts2.data.data.id;
                            accountNumber = posts2.data.data.account_number;
                            if(posts2.data.data.user.foto!=undefined  && posts2.data.data.user.foto!=null){
                                $('.image-profile').attr('src','<?=base_url();?>app/assets/users/foto/'+posts2.data.data.user.foto);
                            }
                            html+=`
                            <div class="row mb-3">
                                <div class="col-12">
                                    <h5>Informasi</h5>
                                    <small class="text-muted">Pengaturan lainnya yang dapat Anda lakukan melalui panel ini.</small>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Nama Kantin</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" id="fullName" value="">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Whatsapp (aktif!)</h6>
                                    
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="number" class="form-control" id="noWA" value="">
                                    <small class="text-muted">Harus dimulai dengan 62</small>
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Alamat</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <textarea rows="2" class="form-control" id="alamatText"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9 text-secondary">
                                <button type="button" onclick="saveSettingAccountNext();" id="btnSettingAkunNext" class="btn btn-primary px-4"><i class="bx bx-save"></i> Simpan</button>
                                </div>
                            </div>
                            `;
                        }
                        $('.putKontenSpesifikUser').html(html);


                        

                        if(roleUser=='agensi'){
                            $('#usernameText').val(posts2.data.data[0].user.username);
                            $('#username').html(posts2.data.data[0].user.username);
                            $('#emailText').val(posts2.data.data[0].user.email);
                            $('#email').html(posts2.data.data[0].user.email);
                            $('#fullName').val(posts2.data.data[0].instansi.nama);
                            $('#namaUser').html(posts2.data.data[0].instansi.nama);
                            $('#tglJoin').html(moment(posts2.data.data[0].user.created_at).format('DD-MM-YYYY'));
                            $('#nomorRekening').html(posts2.data.data[2].bank_account_number);
							$('#norekBank').val(posts2.data.data[2].bank_account_number);
                        	$('#namadiRekening').val(posts2.data.data[2].bank_account_name);
                        }else {
                            $('#usernameText').val(posts2.data.data.user.username);
                            $('#username').html(posts2.data.data.user.username);
                            $('#emailText').val(posts2.data.data.user.email);
                            $('#noWA').val(posts2.data.data.kantin.no_telepon);
                            $('#email').html(posts2.data.data.user.email);
                            $('#fullName').val(posts2.data.data.kantin.nama_kantin);
                            $('#namaUser').html(posts2.data.data.kantin.nama_kantin);
                            $('#tglJoin').html(moment(posts2.data.data.user.created_at).format('DD-MM-YYYY'));
                            $('#nomorRekening').html(posts2.data.data.bank_account_number);

							$('#norekBank').val(posts2.data.data.bank_account_number);
                        	$('#namadiRekening').val(posts2.data.data.bank_account_name);
                        }
                        
                        $('#alamatText').val(alamatUser);
                        
                        $('#alamat').html(alamatUser);
                        
                        
                        $('#saldo').html("Rp"+formatRupiah(saldoUser));
                        
                        
                        
                        // showData(accountNumber);
						

                    }
				}
				save2();
			}

            function saveSettingAccount(){
                $('#btnSettingAkun').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Memproses...');
				$('#btnSettingAkun').attr('disabled', 'disabled');
                $('#btnSettingAkun').css('cursor', 'not-allowed');
				
				var email = $("#emailText").val();
				var pin = $("#pin").val();
				var foto = $("#foto")[0].files[0]; 
				// imageuploadify = $("#file")[0].files[0];
				
				var form_data = new FormData();
				form_data.append('email', email);
				
                if(foto){
				form_data.append('foto', foto);
                }
                if(pin){
				form_data.append('pin', pin);
                }
				
                const save = async (form_data) => {
					const posts = await axios.post('<?= api_url(); ?>api/v1/usr/upadate-me', form_data, {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {

						for (const key in err.response.data.error) {
							Toastify({
								text: err.response.data.error[key],
								duration: 3000,
								close: true,
								gravity: "top",
								position: "right",
								className: "errorMessage",

							}).showToast();
						}
						
						$('#btnSettingAkun').html('<i class="bx bx-save"></i> Simpan');
						$('#btnSettingAkun').attr('disabled', false);
						$('#btnSettingAkun').css('cursor', 'pointer');
					});
					if (posts.status == 201||posts.status == 200) {

						if (posts.data.status == true) {

							Toastify({
								text: 'Data berhasil ditambahkan!',
								duration: 3000,
								close: true,
								gravity: "top",
								position: "right",
								className: "successMessage",

							}).showToast();

							
                            getAkunPengaturan(roleUserX,accountNumberX);

						} else {
							Toastify({
								text: posts.data.message,
								duration: 3000,
								close: true,
								gravity: "top",
								position: "right",
								className: "errorMessage",

							}).showToast();
						}

						$('#btnSettingAkun').html('<i class="bx bx-save"></i> Simpan');
						$('#btnSettingAkun').attr('disabled', false);
						$('#btnSettingAkun').css('cursor', 'pointer');

					}else if(posts.status==500){
						
						Toastify({
							text: "Server dalam perbaikan!",
							duration: 3000,
							close: true,
							gravity: "top",
							position: "right",
							className: "infoMessage",
	
						}).showToast();
					} 
					else {
						posts.data.error.map((mapping, i) => {
							Toastify({
								text: 'Oops!',
								duration: 3000,
								close: true,
								gravity: "top",
								position: "right",
								className: "errorMessage",

							}).showToast();
						});
						$('#btnSettingAkun').html('<i class="bx bx-save"></i> Simpan');
						$('#btnSettingAkun').attr('disabled', false);
						$('#btnSettingAkun').css('cursor', 'pointer');
					}

				}

				save(form_data);
            }
			
			function saveSettingAccountPassword(){
                $('#btnSettingAkunPassword').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Memproses...');
				$('#btnSettingAkunPassword').attr('disabled', 'disabled');
                $('#btnSettingAkunPassword').css('cursor', 'not-allowed');
				
				var currentPass = $("#currentPass").val();
				var newPass = $("#newPass").val();
				var newPass2 = $("#newPass2").val();

				if(newPass!=newPass2){
					Toastify({
						text: 'Password harus dikonfirmasi dengan benar!',
						duration: 3000,
						close: true,
						gravity: "top",
						position: "right",
						className: "errorMessage",

					}).showToast();
					$('#btnSettingAkunPassword').html('<i class="bx bx-save"></i> Simpan');
						$('#btnSettingAkunPassword').attr('disabled', false);
						$('#btnSettingAkunPassword').css('cursor', 'pointer');
					return false;
				}

				if(newPass==''){
					Toastify({
						text: 'Password harus diisi apabila ingin menyimpan ini!',
						duration: 3000,
						close: true,
						gravity: "top",
						position: "right",
						className: "errorMessage",

					}).showToast();
					$('#btnSettingAkunPassword').html('<i class="bx bx-save"></i> Simpan');
						$('#btnSettingAkunPassword').attr('disabled', false);
						$('#btnSettingAkunPassword').css('cursor', 'pointer');
					return false;
				}
				
				var form_data = new FormData();
				
				form_data.append('_method', 'PATCH');
				form_data.append('old_password', currentPass);
				form_data.append('new_password', newPass);
				form_data.append('confirm_new_password', newPass2);
				form_data.append('pin', '123456');

				// var object = {};
				// form_data.forEach((value, key) => object[key] = value);
				// var json = JSON.stringify(object);
				// console.log(json);
				
                const save = async (form_data) => {
					const posts = await axios.post('<?= api_url(); ?>api/v1/password/update', form_data, {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {

						for (const key in err.response.data) {
							Toastify({
								text: err.response.data[key],
								duration: 3000,
								close: true,
								gravity: "top",
								position: "right",
								className: "errorMessage",

							}).showToast();
						}
						
						$('#btnSettingAkunPassword').html('<i class="bx bx-save"></i> Simpan');
						$('#btnSettingAkunPassword').attr('disabled', false);
						$('#btnSettingAkunPassword').css('cursor', 'pointer');
					});
					if (posts.status == 201||posts.status == 200) {
						
						Toastify({
							text: 'Password berhasil diperbaharui!',
							duration: 3000,
							close: true,
							gravity: "top",
							position: "right",
							className: "successMessage",

						}).showToast();

						$("#currentPass").val('');
						$("#newPass").val('');
						$("#newPass2").val('');
							
						$('#btnSettingAkunPassword').html('<i class="bx bx-save"></i> Simpan');
						$('#btnSettingAkunPassword').attr('disabled', false);
						$('#btnSettingAkunPassword').css('cursor', 'pointer');

					}else if(posts.status==500){
						
						Toastify({
							text: "Server dalam perbaikan!",
							duration: 3000,
							close: true,
							gravity: "top",
							position: "right",
							className: "infoMessage",
	
						}).showToast();
					} 
					else {
						posts.data.error.map((mapping, i) => {
							Toastify({
								text: 'Oops!',
								duration: 3000,
								close: true,
								gravity: "top",
								position: "right",
								className: "errorMessage",

							}).showToast();
						});
						$('#btnSettingAkunPassword').html('<i class="bx bx-save"></i> Simpan');
						$('#btnSettingAkunPassword').attr('disabled', false);
						$('#btnSettingAkunPassword').css('cursor', 'pointer');
					}

				}

				save(form_data);
            }
			
            function saveSettingAccountNext(){
                $('#btnSettingAkunNext').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Memproses...');
				$('#btnSettingAkunNext').attr('disabled', 'disabled');
                $('#btnSettingAkunNext').css('cursor', 'not-allowed');
				
				var fullName = $("#fullName").val();
				var alamatText = $("#alamatText").val();
				var emailText = $("#emailText").val();
				
				var form_data = new FormData();
                form_data.append('email', emailText);
				if(roleUser=='seller'){
                    var noWA = $("#noWA").val();
                    form_data.append('nama_kantin', fullName);
                    form_data.append('alamat_lengkap', alamatText);
                    form_data.append('no_telepon', noWA);
                }else {
                    form_data.append('nama', fullName);
                    form_data.append('alamat', alamatText);
                }
                const save = async (form_data) => {
					const posts = await axios.post('<?= api_url(); ?>api/v1/usr/upadate-me', form_data, {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {

						for (const key in err.response.data.error) {
							Toastify({
								text: err.response.data.error[key],
								duration: 3000,
								close: true,
								gravity: "top",
								position: "right",
								className: "errorMessage",

							}).showToast();
						}
						
						$('#btnSettingAkunNext').html('<i class="bx bx-save"></i> Simpan');
						$('#btnSettingAkunNext').attr('disabled', false);
						$('#btnSettingAkunNext').css('cursor', 'pointer');
					});
					if (posts.status == 201||posts.status == 200) {

						if (posts.data.status == true) {

							Toastify({
								text: 'Data berhasil ditambahkan!',
								duration: 3000,
								close: true,
								gravity: "top",
								position: "right",
								className: "successMessage",

							}).showToast();

							getAkunPengaturan(roleUserX,accountNumberX);
						} else {
							Toastify({
								text: posts.data.message,
								duration: 3000,
								close: true,
								gravity: "top",
								position: "right",
								className: "errorMessage",

							}).showToast();
						}

						$('#btnSettingAkunNext').html('<i class="bx bx-save"></i> Simpan');
						$('#btnSettingAkunNext').attr('disabled', false);
						$('#btnSettingAkunNext').css('cursor', 'pointer');

					}else if(posts.status==500){
						
						Toastify({
							text: "Server dalam perbaikan!",
							duration: 3000,
							close: true,
							gravity: "top",
							position: "right",
							className: "infoMessage",
	
						}).showToast();
					} 
					else {
						posts.data.error.map((mapping, i) => {
							Toastify({
								text: 'Oops!',
								duration: 3000,
								close: true,
								gravity: "top",
								position: "right",
								className: "errorMessage",

							}).showToast();
						});
						$('#btnSettingAkunNext').html('<i class="bx bx-save"></i> Simpan');
						$('#btnSettingAkunNext').attr('disabled', false);
						$('#btnSettingAkunNext').css('cursor', 'pointer');
					}

				}

				save(form_data);
            }
			
			function saveSettingAccountBank(){
                $('#btnSettingAkunBank').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Memproses...');
				$('#btnSettingAkunBank').attr('disabled', 'disabled');
                $('#btnSettingAkunBank').css('cursor', 'not-allowed');
				
				var norekBank = $("#norekBank").val();
				var namadiRekening = $("#namadiRekening").val();
				var account_number = accountNumber; 
				
				var form_data = new FormData();
				form_data.append('bank_account_number', norekBank);
				form_data.append('bank_account_name', namadiRekening);
				form_data.append('account_number', accountNumber);
				
                const save = async (form_data) => {
					const posts = await axios.post('<?= api_url(); ?>api/v1/account/update/'+idAkun, form_data, {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {

						for (const key in err.response.data.error) {
							Toastify({
								text: err.response.data.error[key],
								duration: 3000,
								close: true,
								gravity: "top",
								position: "right",
								className: "errorMessage",

							}).showToast();
						}
						
						$('#btnSettingAkunBank').html('<i class="bx bx-save"></i> Simpan');
						$('#btnSettingAkunBank').attr('disabled', false);
						$('#btnSettingAkunBank').css('cursor', 'pointer');
					});
					if (posts.status == 201||posts.status == 200) {

						if (posts.data.status == true) {

							Toastify({
								text: 'Data berhasil ditambahkan!',
								duration: 3000,
								close: true,
								gravity: "top",
								position: "right",
								className: "successMessage",

							}).showToast();

							getAkunPengaturan(roleUserX,accountNumberX);
						} else {
							Toastify({
								text: posts.data.message,
								duration: 3000,
								close: true,
								gravity: "top",
								position: "right",
								className: "errorMessage",

							}).showToast();
						}

						$('#btnSettingAkunBank').html('<i class="bx bx-save"></i> Simpan');
						$('#btnSettingAkunBank').attr('disabled', false);
						$('#btnSettingAkunBank').css('cursor', 'pointer');

					}else if(posts.status==500){
						
						Toastify({
							text: "Server dalam perbaikan!",
							duration: 3000,
							close: true,
							gravity: "top",
							position: "right",
							className: "infoMessage",
	
						}).showToast();
					} 
					else {
						posts.data.error.map((mapping, i) => {
							Toastify({
								text: 'Oops!',
								duration: 3000,
								close: true,
								gravity: "top",
								position: "right",
								className: "errorMessage",

							}).showToast();
						});
						$('#btnSettingAkunBank').html('<i class="bx bx-save"></i> Simpan');
						$('#btnSettingAkunBank').attr('disabled', false);
						$('#btnSettingAkunBank').css('cursor', 'pointer');
					}

				}

				save(form_data);
            }

			$(document).ready(function () {
                $('.single-select').select2({
                    theme: 'bootstrap4',
                    width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                    placeholder: $(this).data('placeholder'),
                    allowClear: Boolean($(this).data('allow-clear')),
                });
            });

        </script>