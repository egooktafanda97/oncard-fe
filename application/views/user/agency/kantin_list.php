<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Kantin</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Daftar Kantin</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
			  
				<div class="card">
					<div class="card-body">
						<div class="d-lg-flex align-items-center mb-4 gap-3">
							<div class="position-relative">
								<input type="text" class="form-control ps-5 radius-30" placeholder="Ketik nama kantin"> <span class="position-absolute top-50 product-show translate-middle-y"><i class="bx bx-search"></i></span>
							</div>
						  <div class="ms-auto"><a href="<?=base_url().$function.'/kantinManage';?>" class="btn btn-primary radius-30 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>Tambah Kantin</a></div>
						</div>
						<div class="table-responsive">
							<table class="table mb-0">
								<thead class="table-light">
									<tr>
										<th>No.</th>
										<th>Nama kantin</th>
										<th>Nomor WA</th>
										<th>Didaftarkan Pada</th>
                                        <th>Saldo</th>
										<th></th>
										<th>Aksi</th>
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

		<script type="text/javascript">
            let secret_code = '';
			let idsett = '';
			$(document).ready(function () {
                showData();
            });

            function showData(){
				let num = 0;
				let tableColumn = '';
				tableColumn += `<tr><td colspan="7" class="text-center">Loading...</td></tr>`;
				$('.putContentHere').html(tableColumn);
				
				const save2 = async () => {
					const posts2 = await axios.get('<?= api_url(); ?>api/v1/kantin', {
						headers: {
							'Authorization': 'Bearer ' + sessionStorage.getItem('_token')
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
									<td>${mapping.nama_kantin}<br/><small class="text-muted">${mapping.user.username}</small></td>
									<td>${mapping.no_telepon}</td>
									<td>${moment(mapping.created_at).format('Do MMMM YYYY')}</td>
                                    <td>Rp${formatRupiah(mapping.accounts.balance)}</td>
									<td><button type="button" onclick="openDialogWD(${mapping.accounts.account_number},'${mapping.user.username}','Rp${formatRupiah(mapping.accounts.balance)}');" class="btn btn-primary btn-sm radius-30 px-4"><i class="bx bx-transfer-alt"></i> Pencairan Dana</button></td>
									<td>
										<div class="d-flex order-actions">
											<a href="#/" onclick="window.location.href='<?=base_url().$function;?>/kantinManage/${mapping.id}'" class=""><i class='bx bxs-edit'></i></a>
											<a href="#/" disabled onclick="console.log('belum ada function deletenya');return false; openModalDelete('${mapping.id}','kantin');" class="ms-3"><i class='bx bxs-trash'></i></a>
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
							'Authorization': 'Bearer ' + sessionStorage.getItem('_token')
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
							'Authorization': 'Bearer ' + sessionStorage.getItem('_token')
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
		</script>