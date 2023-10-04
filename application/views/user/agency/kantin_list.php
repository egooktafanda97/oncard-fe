<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Merchant</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Daftar Merchant</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
			  
				<div class="card">
					<div class="card-body">
						<div class="d-lg-flex align-items-center mb-4 gap-3">
							<div class="position-relative">
								<input type="text" id="floatingInput" class="form-control ps-5 radius-30" placeholder="Ketik nama merchant"> <span class="position-absolute top-50 product-show translate-middle-y"><i class="bx bx-search"></i></span>
							</div>
						  <div class="ms-auto"><a href="<?=base_url().$function.'/kantinManage';?>" class="btn btn-primary radius-30 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>Tambah Merchant</a></div>
						</div>
						<div class="table-responsive">
						<button class="btn btn-sm btn-outline-primary me-2 mb-3" id="btnSave2PDF" onclick="save2PDF('tabelPrint');" style="border-radius:0px;"><i class="bx bxs-file-export"></i> Export PDF</button>
						<button class="btn btn-sm btn-outline-success me-2 mb-3" onclick="saveToExcel('tabelkantin');" style="border-radius:0px;"><i class="bx bxs-file-export"></i> Export Excel</button>
							<table class="table mb-0 tabelkantin" id="tabelPrint">
								<thead class="table-light">
									<tr>
										<th>No.</th>
										<th>Nama Merchant</th>
										<th>Rekening</th>
										<th>Nomor WA</th>
										<th>Saldo</th>
										<th>Aksi</th>
										<th></th>
										<th>Limit Tr.</th>
										<th>Pin</th>

									</tr>
								</thead>
								<tbody class="putContentHere">
								</tbody>
							</table>
						</div>
					</div>
				</div>


			</div>
		</div>

        <div class="modal fade" id="wdMODAL" tabindex="-1" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content" style="">
                    <div class="modal-header">
						<h5 class="modal-title">Pencairan Dana</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" data-value="="></button>
					</div>
					<div class="modal-body">
                        <form id="mainx">
                            <div class="mb-3">
                                <label for="namaSiswa" class="form-label">Nama Pengguna</label>
                                <font style="font-weight:bold;display:block;" id="namaPengguna">Loading...</font>
                            </div>
                            <div class="mb-3">
                                <label for="namaSiswa" class="form-label">Sisa Saldo</label>
                                <font style="font-weight:bold;display:block;" id="saldoPengguna">Loading...</font>
                            </div>
                            <div class="mb-3">
                                <label for="namaSiswa" class="form-label">Saldo Dicairkan</label>
                                <input type="text" class="form-control" id="saldoCair" placeholder="Ketikkan saldo">
                            </div>
                            <h5 class="mt-4">PIN Pengguna</h5>
                            <div class="mb-3">
                                <label for="pin" class="form-label">PIN</label>
                                <input type="password" class="form-control" id="pin" placeholder="Ketikkan saldo">
                            </div>
                        </form>

                        <div class="col-12">
                            <div class="d-grid">
                                <button type="button" id="btnSave" class="btn btn-primary" onclick="requestSecret();"><i class="bx bx-transfer-alt"></i> Cairkan Sekarang</button>
                            </div>
                        </div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="modal fade" id="upPASS" tabindex="-1" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content" style="">
                    <div class="modal-header">
						<h5 class="modal-title">Reset Password</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" data-value="="></button>
					</div>
					<div class="modal-body">
                        <form id="mainx">
							<div class="row">
								<div class="col-md-4 text-center">
								<img src="<?=base_url();?>assets_oncard/images/image-removebg-preview.webp" style="width:100%; max-width:150px;text-align:center;"/>
								</div>
								<div class="col-md-8">
								<h6>Password pengguna ini akan diupdate ke password default, yakni :<br/><p class="text-center" style="background:#198adf; border-radius:10px; padding:10px;color:white;"><b>123456</b></p>Harap beritahukan kepada pengguna tersebut. </h6>
								</div>
							</div>
							<h5 class="mt-4">Konfirmasi dengan PIN</h5>
                            <div class="mb-3">
                                <label for="pinUpdate" class="form-label">PIN</label>
                                <input type="password" class="form-control" id="pinUpdate" placeholder="Ketikkan pin">
                            </div>
                        </form>

                        <div class="col-12">
                            <div class="d-grid">
                                <button type="button" id="btnSavePassword" class="btn btn-primary" onclick="resetPassword();"><i class="bx bxs-key"></i> Reset Now</button>
                            </div>
                        </div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="modal fade" id="upBankAccount" tabindex="-1" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content" style="">
                    <div class="modal-header">
						<h5 class="modal-title">Setting Akun Bank <img src="<?=base_url();?>assets_oncard/images/BRK_Syariah.webp" style=" margin-left:15px;margin-top:4px; width:100%; max-width:100px;text-align:center;float:right;"/></h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" data-value="="></button>
					</div>
					<div class="modal-body">
                        <form id="mainx">
							
						<div class="mb-3">
                                <label for="pinUpdate" class="form-label">Nomor Rekening</label>
                                <input type="number" class="form-control" id="norek" placeholder="Ketikkan nomor rekening">
                            </div>
							<div class="mb-3">
                                <label for="namadirekening" class="form-label">Nama di rekening</label>
                                <input type="text" class="form-control" id="namadirekening" placeholder="Ketikkan nama lengkap direkening">
                            </div>
                        </form>

                        <div class="col-12">
                            <div class="d-grid">
                                <button type="button" id="btnSaveBank" class="btn btn-primary" onclick="saveBankAcc();"><i class="bx bx-save"></i> Simpan</button>
                            </div>
                        </div>
					</div>
				</div>
			</div>
		</div>

		<script type="text/javascript">
            let secret_code = '';
			let idsett = '';
			$(document).ready(function () {
                showData();

				$("#floatingInput").on("keyup", function() {
					let value = $(this).val().toLowerCase();
					$(".putContentHere tr").filter(function() {
						$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
					});
				});
            });

            function showData(){
				let num = 0;
				let tableColumn = '';
				tableColumn += `<tr><td colspan="7" class="text-center">Loading...</td></tr>`;
				$('.putContentHere').html(tableColumn);
				
				const save2 = async () => {
					const posts2 = await axios.get('<?= api_url(); ?>api/v1/kantin', {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {
						console.log(err.response);
					});
			
					if (posts2.status == 200) {
							

							tableColumn = '';

							if(posts2.data.data.data.length==0){
								tableColumn +=`<tr><td colspan="7" class="text-center">Tidak ada data.</td></tr>`;
								$('.putContentHere').html(tableColumn);return false;
							}
							
							console.log(posts2.data.data.data);
							posts2.data.data.data.map((mapping,i)=>{
							num += 1;

							tableColumn +=`
								<tr>
									<td>
										<div class="d-flex align-items-center">
											<div>
												<input class="form-check-input me-3" type="checkbox" value="" aria-label="...">
											</div>
											<div class="ms-2">
												<h6 class="mb-0 font-14">${num}.</h6>
											</div>
										</div>
									</td>
									<td>${mapping.nama_kantin} ${(mapping.accounts.bank_account_number!=null && mapping.user.foto!=null)?'<i class="bx bxs-badge-check text-primary"></i>':'<i class="bx bxs-x-circle text-danger"></i>'}<br/><small class="text-muted">${mapping.user.username}</small></td>
									<td>${mapping.accounts.bank_account_number}<br/><small class="text-muted">${mapping.accounts.bank_account_name}</small></td>
									<td>${mapping.no_telepon}</td>
									<td>Rp${formatRupiah(mapping.accounts.balance)}</td>
									<td>
										<div class="d-flex order-actions">
											<a href="#/" onclick="window.location.href='<?=base_url().$function;?>/kantinManage/${mapping.id}'" class=""><i class='bx bxs-edit'></i></a>
											<a href="#/" disabled onclick="openModalDelete('${mapping.id}','kantin');" class="ms-3"><i class='bx bxs-trash'></i></a>
											<a href="#/" onclick="openModalUpdatePass('${mapping.user.id}');" class="ms-3"><i class='bx bxs-key'></i></a>
											<a href="#/" onclick="openModalUpdateBankAccount('${mapping.accounts.id}','${mapping.accounts.bank_account_name}');" class="ms-3"><i class='bx bxs-credit-card-front'></i></a>
										</div>
									</td>
									<td><button type="button" onclick="openDialogWD(${mapping.accounts.account_number},'${mapping.user.username}','Rp${formatRupiah(mapping.accounts.balance)}');" class="btn btn-primary btn-sm radius-30 px-4"><i class="bx bx-transfer-alt"></i> Pencairan</button></td>
									<td>
										<div class="form-check form-switch">
											<input class="form-check-input form-toggle-trx-${mapping.id}" type="checkbox" ${(mapping.limit_trx_setting==0)?'':'checked'} onclick="idsett='${mapping.id}';runProsesUpdateSettingTrx(${mapping.id});" id="onofftrx">
										</div>
									</td>
									<td>
										<div class="form-check form-switch">
											<input class="form-check-input form-toggle-pin-${mapping.id}" type="checkbox" id="onoffpin" ${(mapping.pin_setting==0)?'':'checked'} onclick="idsett='${mapping.id}';runProsesUpdateSettingPin(${mapping.id});">
										</div>
									</td>
								</tr>
							`;
							});
							
						$('.putContentHere').html(tableColumn);
							
					}
				}
				
				save2();
			}

            function openDialogWD(id, nama, saldo){
                $('#wdMODAL').modal('toggle');
				
				idsett = id;
                $('#namaPengguna').html(nama);
                $('#saldoPengguna').html(saldo);
            }

			function openModalUpdatePass(id){
                $('#upPASS').modal('toggle');
				
				idsett = id;
            }
			
			let account_number = '';
			let nama_diakun_m = '';
			function openModalUpdateBankAccount(id, nama_diakun){

				idsett = id;
				nama_diakun_m = nama_diakun;

                $('#upBankAccount').modal('toggle');

				const save = async (id) => {
					const posts = await axios.get('<?= api_url(); ?>api/v1/account/id/' + id, {
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
					});

					if (posts.status == 200) {
						account_number = posts.data.data.account_number;
						$('#norek').val(posts.data.data.bank_account_number);
						$('#namadirekening').val(posts.data.data.bank_account_name);
						
					} else {

					}
				}

				save(id);
            }

            $('#wdMODAL').on('hidden.bs.modal', function () {
                $('#mainx')[0].reset();
            });

			function prosCair(){
				
				let value = $('#saldoCair').val();
				let pin = $('#pin').val();
				value = value.replace(/\D/g, "");

				if(value=='0'||value==''){

					$('#btnSave').html('Selesai');
					$('#btnSave').attr('disabled', false);
					$('#btnSave').css('cursor', 'pointer');
					Toastify({
						text: 'Nominal harus diisi!',
						duration: 3000,
						close: true,
						gravity: "top",
						position: "right",
						className: "errorMessage",

					}).showToast();
					return false;
				}
				
            	var form_data = new FormData();
				
				form_data.append('amount', value);
				form_data.append('account_number', idsett);
				form_data.append('client_secret', secret_code);
				form_data.append('pin', pin);
				
				let url = '';
				
				const save = async (form_data) => {
					const posts = await axios.post('<?= api_url(); ?>api/v1/wd', form_data, {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {
                        $('#btnSave').html('Selesai');
						$('#btnSave').attr('disabled', false);
						$('#btnSave').css('cursor', 'pointer');

                        if(err.response.data.message=='your balance is not enough!'){
                            Toastify({
                                text: 'Saldo tidak cukup!',
                                duration: 3000,
                                close: true,
                                gravity: "top",
                                position: "right",
                                className: "errorMessage",

                            }).showToast();
                        }else if(err.response.data.message=='account not found!'){
                            Toastify({
                                text: 'PIN tidak benar!',
                                duration: 3000,
                                close: true,
                                gravity: "top",
                                position: "right",
                                className: "errorMessage",

                            }).showToast();
                        }
                        
					});
					if (posts.status == 201) {

						if (posts.data.status == true) {
							
							Toastify({
								text: posts.data.message,
								duration: 3000,
								close: true,
								gravity: "top",
								position: "right",
								className: "successMessage",

							}).showToast();

							$('#wdMODAL').modal('toggle');
							showData();

                            
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

						$('#btnSave').html('<i class="bx bx-transfer-alt"></i> Cairkan Sekarang');
						$('#btnSave').attr('disabled', false);
						$('#btnSave').css('cursor', 'pointer');

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
						$('#btnSave').html('<i class="bx bx-transfer-alt"></i> Cairkan Sekarang');
						$('#btnSave').attr('disabled', false);
						$('#btnSave').css('cursor', 'pointer');
					}
				}
				
				save(form_data);				

			}
			
			function resetPassword(){
				
				let pin = $('#pinUpdate').val();
				
				if(pin==''){

					$('#btnSavePassword').html('<i class="bx bxs-key"></i> Reset Now');
					$('#btnSavePassword').attr('disabled', false);
					$('#btnSavePassword').css('cursor', 'pointer');
					Toastify({
						text: 'PIN harus diisi oleh pengguna akun tersebut!',
						duration: 3000,
						close: true,
						gravity: "top",
						position: "right",
						className: "errorMessage",

					}).showToast();
					return false;
				}
				
            	var form_data = new FormData();
				
				form_data.append('password', '123456');
				form_data.append('pin', pin);
				
				let url = '';
				
				const save = async (form_data) => {
					const posts = await axios.post('<?= api_url(); ?>api/v1/password/upd-passwords/'+idsett, form_data, {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {
                        $('#btnSavePassword').html('<i class="bx bxs-key"></i> Reset Now');
						$('#btnSavePassword').attr('disabled', false);
						$('#btnSavePassword').css('cursor', 'pointer');
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
					});
					if (posts.status == 201||posts.status == 200) {
						Toastify({
							text: posts.data.message,
							duration: 3000,
							close: true,
							gravity: "top",
							position: "right",
							className: "successMessage",

						}).showToast();

						$('#upPASS').modal('toggle');
						$('#pinUpdate').val('');
						$('#btnSavePassword').html('<i class="bx bxs-key"></i> Reset Now');
						$('#btnSavePassword').attr('disabled', false);
						$('#btnSavePassword').css('cursor', 'pointer');

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
						$('#btnSavePassword').html('<i class="bx bxs-key"></i> Reset Now');
						$('#btnSavePassword').attr('disabled', false);
						$('#btnSavePassword').css('cursor', 'pointer');
					}
				}
				
				save(form_data);				

			}
			
			function saveBankAcc(){
				
				let norek = $('#norek').val();
				let namadirekening = $('#namadirekening').val();

				
				if(pin==''){

					$('#btnSaveBank').html('<i class="bx bxs-key"></i> Reset Now');
					$('#btnSaveBank').attr('disabled', false);
					$('#btnSaveBank').css('cursor', 'pointer');
					Toastify({
						text: 'Nomor rekening harus diisi!',
						duration: 3000,
						close: true,
						gravity: "top",
						position: "right",
						className: "errorMessage",

					}).showToast();
					return false;
				}
				
            	var form_data = new FormData();
				
				form_data.append('bank_account_number', norek);
				form_data.append('account_number', account_number);

				if(namadirekening!=nama_diakun_m){
					form_data.append('bank_account_name', namadirekening);	
				}
				
				let url = '';
				
				const save = async (form_data) => {
					const posts = await axios.post('<?= api_url(); ?>api/v1/account/update/'+idsett, form_data, {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {
                        $('#btnSaveBank').html('<i class="bx bx-save"></i> Simpan');
						$('#btnSaveBank').attr('disabled', false);
						$('#btnSaveBank').css('cursor', 'pointer');
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
					});
					if (posts.status == 201||posts.status == 200) {
						Toastify({
							text: 'Informasi akun bank berhasil disimpan!',
							duration: 3000,
							close: true,
							gravity: "top",
							position: "right",
							className: "successMessage",

						}).showToast();

						showData();

						$('#upBankAccount').modal('toggle');
						$('#btnSaveBank').html('<i class="bx bx-save"></i> Simpan');
						$('#btnSaveBank').attr('disabled', false);
						$('#btnSaveBank').css('cursor', 'pointer');

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
						$('#btnSaveBank').html('<i class="bx bx-save"></i> Simpan');
						$('#btnSaveBank').attr('disabled', false);
						$('#btnSaveBank').css('cursor', 'pointer');
					}
				}
				
				save(form_data);				

			}

            var tanpa_rupiah = document.getElementById('saldoCair');
            tanpa_rupiah.addEventListener('keyup', function(e)
            {
                tanpa_rupiah.value = formatRupiah(this.value);
            });

            function requestSecret(){

				$('#btnSave').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Memproses...');
				$('#btnSave').attr('disabled', 'disabled');
                $('#btnSave').css('cursor', 'not-allowed');

				const save2 = async () => {
					const posts2 = await axios.get('<?= api_url(); ?>api/v1/key/create', {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {
						$('#btnSave').html('<i class="bx bx-transfer-alt"></i> Cairkan Sekarang');
						$('#btnSave').attr('disabled', false);
						$('#btnSave').css('cursor', 'pointer');
						console.log(err.response);
					});

					if (posts2.status == 201) {
						secret_code = posts2.data.data.client_secret;

						prosCair();
					}else {
						$('#btnSave').html('<i class="bx bx-transfer-alt"></i> Cairkan Sekarang');
						$('#btnSave').attr('disabled', false);
						$('#btnSave').css('cursor', 'pointer');
					}
				}
				save2();
			}

			function runProsesUpdateSettingPin(val){
				let valx = $('.form-toggle-pin-'+val).prop('checked');
				console.log(valx);
                if(valx) {
                    togglesettingconf('pin_setting',1);
                }else {
                    togglesettingconf('pin_setting',0);
                }
            };
			function runProsesUpdateSettingTrx(val){
				let valx = $('.form-toggle-trx-'+val).prop('checked');
				console.log(valx);
                if(valx) {
                    togglesettingconf('limit_trx_setting',1);
                }else {
                    togglesettingconf('limit_trx_setting',0);
                }
            };

			function togglesettingconf(kolom, str){
            
			var key = kolom;
			var value = str;
			
			var form_data = new FormData();
			form_data.append(key, parseInt(value));
			
			const save = async (form_data) => {
				const posts = await axios.post('<?= api_url(); ?>api/v1/kantin/update/'+idsett, form_data, {
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
					
				});
				if (posts.status == 201||posts.status == 200) {

					if (posts.data.status == true) {

						Toastify({
							text: 'Tersimpan!',
							duration: 3000,
							close: true,
							gravity: "top",
							position: "right",
							className: "successMessage",

						}).showToast();

						idsett= '';

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
					console.log('Developer must be see it!');
				}

			}

			save(form_data);
		}
		</script>