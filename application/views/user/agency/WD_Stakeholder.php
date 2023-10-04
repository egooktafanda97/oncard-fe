<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Pencairan Bagi <b>Hasil</b></div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Pencairan Bagi <b>Hasil</b></li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
			  
				<div class="card">
					<div class="card-body">
						
						<div class="table-responsive">
							<table class="table mb-0">
								<thead class="table-light">
									<tr>
										<th>Nomor Akun</th>
										<th>Nama Pemegang Akun</th>
										<th>Keterangan</th>
										<th>Rekening</th>
										<th>Saldo</th>
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

		<div class="modal fade" id="modalSetCard" tabindex="-1" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content" onclick="putFocusScanCard();">
					<div class="modal-header">
						<h5 class="modal-title">Connect to Card</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						Pastikan indikator dibawah ini sudah bergaris <font class="text-success">hijau</font> terlebih dahulu.
						<small class="text-muted"><i>Apabila garis hijau belum muncul, klik pada gambar dibawah ini untuk mengaktifkan indikator tersebut</i></small>
						<br/>
						
						<img id="scanCard" src="<?=base_url();?>assets_oncard/images/scan_kard.webp"  style="width:100%; border-radius:20px; display:block; margin-top:15px; margin-bottom:15px;"/>
						<p class="text-center" id="textIndicator" style="margin:auto; transform:scale(0);transition:all 0.2s linear 0s;padding:5px; padding-left:25px; padding-right:25px; font-size:14px; border-radius:100px; background:#53edaa; color:#fff;"></p>
						<input type="text" style="transform:scale(0)!important; margin:auto; text-align:center; width:100%; border:none;outline:none!important;" id="textToCard"/>
						
					</div>
					<div class="modal-footer text-center">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
						<button type="button" onclick="commitConnectToCard();" id="btnConnectToCard" disabled class="btn btn-outline-primary">Status</button>
					</div>
				</div>
			</div>
		</div>
        
        <div class="modal fade" id="modalSetSaldo" tabindex="-1" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content" onclick="putFocusScanCard();">
					<div class="modal-header">
						<h5 class="modal-title">Isi Saldo User</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						
					</div>
					<div class="modal-footer text-center">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
						<button type="button" onclick="commitSaldo();" id="btnSubmitSaldo" class="btn btn-outline-primary">Masukkan Saldo Sekarang</button>
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
                                <input type="text" class="form-control" id="saldoCair"  oninput="setVal3(this.value);" placeholder="Ketikkan saldo">
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
			let idsett = '';
			let modescan = '';
            let secret_code= '';
            let htmlListAkun = '';
			$(document).ready(function () {
                showData();
            });

            function openDialogWD(id, nama, saldo){
                $('#wdMODAL').modal('toggle');
				
				idsett = id;
                $('#namaPengguna').html(nama);
                $('#saldoPengguna').html(saldo);
            }

			function showData(){
				let num = 0;
				let tableColumn = '';
				htmlListAkun = '';
				tableColumn += `<tr><td colspan="7" class="text-center">Loading...</td></tr>`;
				$('.putContentHere').html(tableColumn);
				
				const save2 = async () => {
					const posts2 = await axios.get('<?= api_url(); ?>api/v1/account/auth', {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {
						console.log(err.response);
					});
			
					if (posts2.status == 200) {
                        let norek = posts2.data.data[2].bank_account_number;
                        let trufals = true;
                        if(!norek){
                            norek = '<font class="text-danger">Not set</font>';
                            trufals = false;
                        }
                        htmlListAkun +=`
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <input class="form-check-input me-3" type="checkbox" value="" aria-label="...">
                                        </div>
                                        <div class="ms-2">
                                            <h6 class="mb-0 font-14">#${posts2.data.data[2].account_number}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td style="text-transform:uppercase;">${posts2.data.data[2].instansi.nama} <i class="bx bxs-badge-check text-primary"></i></td>
                                <td>Anda</td>
                                <td>${norek}</td>
                                <td>Rp${formatRupiah(posts2.data.data[2].balance)}</td>
                                <td>
                                    <div class="d-flex order-actions">
                                    ${(trufals)?`<a href="#/" onclick="openDialogWD('${posts2.data.data[2].account_number}','${posts2.data.data[2].user.username}','Rp${formatRupiah(posts2.data.data[2].balance)}');idsett='${posts2.data.data[2].account_number}';" class="me-3 "><i class='bx bx-transfer'></i></a>`:'NONE'}
                                    </div>
                                </td>
                            </tr>
                        `;
                        
                        showData2();
					}
				}
				save2();
			}

			let norekbankowner=''
			let namabankowner=''
			
            function showData2(){
				let num = 0;
				let tableColumn = '';
			
				tableColumn += `<tr><td colspan="7" class="text-center">Loading....</td></tr>`;
				$('.putContentHere').html(tableColumn);
				
				const save2 = async () => {
					const posts2 = await axios.get('<?= api_url(); ?>api/v1/account/get/owner', {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {
						console.log(err.response);
					});
			
					if (posts2.status == 200) {
                        let norek = posts2.data.data.data[0].bank_account_number;
                        let trufals = true;
                        // if(!norek){
                        //     norek = '<font class="text-danger">Not set</font>';
                        //     trufals = false;
                        // }
                        htmlListAkun +=`
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <input class="form-check-input me-3" type="checkbox" value="" aria-label="...">
                                        </div>
                                        <div class="ms-2">
                                            <h6 class="mb-0 font-14">#${posts2.data.data.data[0].account_number}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td style="text-transform:uppercase;">${posts2.data.data.data[0].customers_name} <i class="bx bxs-badge-check text-warning"></i></td>
                                <td>Oncard Official</td>
                                <td class="textnorekowner">${norekbankowner}</td>
                                <td>Rp${formatRupiah(posts2.data.data.data[0].balance)}</td>
                                <td>
                                    <div class="d-flex order-actions">
                                    ${(trufals)?`<a href="#/" onclick="openDialogWD('${posts2.data.data.data[0].account_number}','${posts2.data.data.data[0].user.username}','Rp${formatRupiah(posts2.data.data.data[0].balance)}');idsett='${posts2.data.data.data[0].account_number}';" class="me-3 "><i class='bx bx-transfer'></i></a>`:'NONE'}
                                    </div>
                                </td>
                            </tr>
                        `;

                        $('.putContentHere').html(htmlListAkun);

						getNorekBankOwner();
						getNamaBankOwner();
					}
				}
				save2();
			}

			function getNorekBankOwner(){
				const save2 = async () => {
					const posts2 = await axios.get('<?= api_url(); ?>api/v1/setting/get-id/8', {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {
						console.log(err.response);
					});

					if (posts2.status == 201) {
                        console.log(posts2.data.data);
						norekbankowner = posts2.data.data;
						$('.textnorekowner').html(norekbankowner);
					}
				}
				save2();
			}
			function getNamaBankOwner(){
				const save2 = async () => {
					const posts2 = await axios.get('<?= api_url(); ?>api/v1/setting/get-id/9', {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {
						console.log(err.response);
					});

					if (posts2.status == 201) {
                        console.log(posts2.data.data);
						namabankowner = posts2.data.data;
					}
				}
				save2();
			}

            function setVal3(str){
                $('#saldoCair').val(formatRupiah(str));
            }
           

			function openmodalSetCard(mode){
				modescan = mode;
				$('#modalSetCard').modal('toggle');
				$('#btnConnectToCard').html('Status');
				$('#modalSetCard').on('shown.bs.modal', function () {
					$('#textToCard').focus();

				});
			}

			$("#textToCard").focus(function(){
				console.log('input sedang fokus');
				$('#textIndicator').attr('style','transform:scale(1);transition:all 0.2s linear 0s;padding:5px; padding-left:25px; padding-right:25px; font-size:14px; border-radius:100px; background:#53edaa; color:#fff; display:table; text-align:center; margin:auto;');
				$('#textIndicator').html('Alat scan ready!');
				$('#scanCard').attr('style','border:5px solid #53edaa;width:100%; border-radius:20px; display:block; margin-top:15px; margin-bottom:15px; transition:all 0.2s linear 0s;');
			});

			$('#textToCard').blur(function(){
				console.log('input tidak fokus');
				$('#textToCard').val('');
				$('#textIndicator').attr('style','transform:scale(1);transition:all 0.2s linear 0s;padding:5px; padding-left:25px; padding-right:25px; font-size:14px; border-radius:100px; background:red; color:#fff;display:table;  text-align:center;margin:auto;');
				$('#textIndicator').html('Klik disini untuk dapat memulai scan kartu!');
				$('#scanCard').attr('style','width:100%; border-radius:20px; display:block; margin-top:15px; margin-bottom:15px; transition:all 0.2s linear 0s;');
			});
			
			function putFocusScanCard(){
				$('#textToCard').focus();
				$('#scanCard').attr('style','border:5px solid #53edaa;width:100%; border-radius:20px; display:block; margin-top:15px; margin-bottom:15px; transition:all 0.2s linear 0s;');
			}

			let timer;
			const input = document.querySelector('#textToCard');
			input.addEventListener('keyup', function (e) {
				clearTimeout(timer);
				timer = setTimeout(() => {
					let valx = $('#textToCard').val();

					if(valx.length>10){
						Toastify({
							text: 'Scan ulang kartu tersebut!',
							duration: 3000,
							close: true,
							gravity: "top",
							position: "right",
							className: "errorMessage",

						}).showToast();
						$('#textToCard').val('');
					}else {
						if(modescan=='connect'){
							setNomorKartuKeSiswa(valx);
						}else {
							searchSiswaByKartu(valx);
						}
					}
				}, 1500);
			});

			function searchSiswaByKartu(str){
				
                const save2 = async () => {
					const posts2 = await axios.get('<?= api_url(); ?>api/v1/usr?card='+str, {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {
						$('#textToCard').blur();
                        return false;
					});
			
					if (posts2.status == 200) {

                        if(posts2.data.status==false){
                            Toastify({
                                text: 'Scan ulang kartu tersebut!',
                                duration: 3000,
                                close: true,
                                gravity: "top",
                                position: "right",
                                className: "errorMessage",

                            }).showToast();
                            $('#textToCard').blur();
                            $('#textToCard').focus();
                        }
                        
                        $('#modalSetCard').modal('toggle');

                        idsett = str;
                        requestSecret();

                        $('#modalSetSaldo .modal-body').html(`
                            <div class="row">
                                <div class="col-12 table-responsive">
                                    <table class="table table-borderless">
                                        <tr><td colspan="2" class="text-center"><div class="alert alert-sm alert-success">( ! ) Pastikan data berikut ini adalah benar dan valid.</div></td></tr>
                                        <tr>
                                            <td width="100">Nama user</td>
                                            <td>: ${posts2.data.data.siswa.nama_lengkap}</td>
                                        </tr>
                                        <tr>
                                            <td width="100">NIS</td>
                                            <td>: ${posts2.data.data.siswa.nis}</td>
                                        </tr>
                                        <tr>
                                            <td width="100">Tanggal Lahir</td>
                                            <td>: ${moment(posts2.data.data.siswa.tanggal_lahir).format('Do MMMM YYYY')}</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-12 mt-3">
                                    <label for="saldoTambah" class="mb-1">Saldo</label>
                                    <input type="text" id="saldoTambah" class="form-control mb-2" style="border-radius:100px;" placeholder="Jumlah saldo (Rp)"/>

                                    <label for="pin" class="mt-3 mb-1">PIN Otoritas</label>
                                    <input type="password" id="pin" class="form-control mb-2" style="border-radius:100px;" placeholder="Masukkan PIN Anda!"/>
                                </div>
                            </div>
                        `);
                        $('#modalSetSaldo').modal('toggle');

                        Toastify({
                            text: 'Scan berhasil!',
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            className: "successMessage",

                        }).showToast();
                        console.log(posts2.data.data.data);

					}else {
                        Toastify({
                            text: 'Scan ulang kartu tersebut!',
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            className: "errorMessage",
                        }).showToast();
                        // $('#textToCard').blur();
                        
                    }
				}
				
				save2();
				
				
			}

            function prosCair(){
				
				let value = $('#saldoCair').val();
				let pin = $('#pin').val();
				value = value.replace(/\D/g, "");
                value = value.split('.').join("");

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

                        if(err.response.data.message=='request ulang beberapa saat lagi'){
                            Toastify({
                                text: 'Dimohon ulang kembali. [Token Locked]',
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