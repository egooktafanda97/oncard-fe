<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Membership</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Daftar Pengguna</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
			  
				<div class="card">
					<div class="card-body">
						
						<div class="table-responsive">
						<button class="btn btn-sm btn-outline-primary me-2 mb-3" id="btnSave2PDF" onclick="save2PDF('tabelPrint');" style="border-radius:0px;"><i class="bx bxs-file-export"></i> Export PDF</button>
						<button class="btn btn-sm btn-outline-success me-2 mb-3" onclick="saveToExcel('tabelguru');" style="border-radius:0px;"><i class="bx bxs-file-export"></i> Export Excel</button>
							<table class="table mb-0 tabelguru" id="tabelPrint">
								<thead class="table-light">
									<tr>
										<th>Tipe</th>
										<th>Nama Pengguna</th>
										<th>Foto</th>
										<th>Koneksi Kartu</th>
										<th>Saldo</th>
										<th>Limit Transaksi</th>
									</tr>
								</thead>
								<tbody class="putContentHere">
								</tbody>
							</table>

							<!-- Pagination -->
							<nav class="container mt-5"
								id="general-pagination-container"
								aria-label="Page navigation example">
							</nav>

							<!-- Pagination details -->
							<div class="container mt-1 text-muted text-center">
								<small id="general-pagination-details"></small>
							</div>
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
						
						<img id="scanCard" src="<?=base_url();?>assets_oncard/images/scan_kard2.webp"  style="width:100%; border-radius:20px; display:block; margin-top:15px; margin-bottom:15px;"/>
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
		
		<div class="modal fade" id="modalSetLimitTrx" tabindex="-1" aria-hidden="true">
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
						<button type="button" onclick="commitLimitTrxUpdate();" id="btnSubmitLimitTrx" class="btn btn-outline-primary">Simpan</button>
					</div>
				</div>
			</div>
		</div>

		<script type="text/javascript">
			let idsett = '';
			let modescan = '';
            let secret_code= '';
            let notelppublic = '';
			let endPointGetDataGeneral = '<?= api_url(); ?>api/v1/general/get-inpaging';
			let endPointGetDataGeneralSearch = '<?= api_url(); ?>api/v1/general?search=';

			var typingTimer;

            $('#modalSetSaldo').on('hidden.bs.modal', function () {
                    // $('#modalSetCard').modal('toggle');
                    if(!$('#modalSetSaldo').hasClass('show')){
                        notelppublic = '';
                    }else {
                        return false;
                    }
                    
                });
            $('#modalSetSaldo').on('hidden.bs.modal', function () {
                notelppublic = '';
            });

			$(document).ready(function () {
                showData(endPointGetDataGeneral);

				$("#floatingInput").on("keyup", function() {
					
					let value = $(this).val().toLowerCase();
					clearTimeout(typingTimer);
					typingTimer = setTimeout(function() {
						if(value==''){
							showData(endPointGetDataGeneral);
						}else {
							showData(endPointGetDataGeneralSearch+value);	
						}
					}, 1200);

				});
                
            });
			function showData(params){
				let num = 0;
				let tableColumn = '';
				tableColumn += `<tr><td colspan="8" class="text-center">Loading...</td></tr>`;
				$('.putContentHere').html(tableColumn);
				
				const save2 = async () => {
					const posts2 = await axios.get(params, {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {
						console.log(err.response);
					});
			
					if (posts2.status == 200) {
							num += 1;
							tableColumn = '';
							if(posts2.data.data.length==0){
								tableColumn +=`<tr><td colspan="8" class="text-center">Tidak ada data.</td></tr>`;
								$('.putContentHere').html(tableColumn);return false;
							}
							
							console.log(posts2.data.data);
							posts2.data.data.map((mapping,i)=>{

                                if(mapping.jabatan=='membership'){
                                    tableColumn +=`
                                        <tr>
                                            <td >
                                                <h6 class="mb-0 font-14">${mapping.jabatan}</h6>
                                            </td>
                                            <td>${mapping.nama_lengkap} ${(mapping.user.foto!='default.jpg')?'<i class="bx bxs-badge-check text-primary"></i>':'<i class="bx bxs-x-circle text-danger"></i>'}</td>
                                            <td>${(mapping.user.foto!="default.jpg")?"ADA":"TIDAK ADA"}</td>
                                            <td>${(mapping.accounts.card_id==null)?`<div class="badge rounded-pill text-warning bg-light-warning p-2 text-uppercase px-3"><i class='bx bxs-circle me-1'></i>NOT CONNECTED</div>`:`<div class="badge rounded-pill text-success bg-light-success p-2 text-uppercase px-3"><i class='bx bxs-circle me-1'></i>CONNECTED</div>`}</td>
                                            <td >Rp${formatRupiah(mapping.accounts.balance)}</td>
                                            <td >Rp${formatRupiah(mapping.accounts.limit_trx)}
                                            </td>
                                            
                                        </tr>
                                    `;
                                }
							
							});
							
						$('.putContentHere').html(tableColumn);
						createPaginations(posts2.data.data, "general-pagination-container", "general-pagination-details", "showData");
					}
				}
				save2();
			}

            let balancepublic = '';

            function setSaldoManually(nama,nis,tgl,cardNumber, balance,telepon){

                idsett = cardNumber;
                notelppublic = telepon;
                balancepublic = balance;

                $('#modalSetSaldo .modal-body').html(`
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-borderless">
                                <tr><td colspan="2" class="text-center"><div class="alert alert-sm alert-success">( ! ) Pastikan data berikut ini adalah benar dan valid.</div></td></tr>
                                <tr>
                                    <td width="100">Nama user</td>
                                    <td>: ${nama}</td>
                                </tr>
                                <tr>
                                    <td width="100">Saldo</td>
                                    <td>: Rp${formatRupiah(balance)}</td>
                                </tr>
                                
                            </table>
                        </div>
                        <div class="col-12 mt-3">
                            <label for="saldoTambah" class="mb-1">Saldo</label>
                            <input type="text" id="saldoTambah" class="form-control mb-2" oninput="setVal(this.value);" style="border-radius:100px;" placeholder="Jumlah saldo (Rp)"/>

                            <label for="pin" class="mt-3 mb-1">PIN Otoritas</label>
                            <input type="password" id="pin" class="form-control mb-2 setPinSaldo" style="border-radius:100px;" placeholder="Masukkan PIN Anda!"/>
                        </div>
                    </div>
                `);
                $('#modalSetSaldo').modal('toggle');
            }

			function openmodalSetCard(mode){
				modescan = mode;
				$('#modalSetCard').modal('toggle');
				$('#btnConnectToCard').html('Status');
				$('#modalSetCard').on('shown.bs.modal', function () {
					$('#textToCard').focus();

				});
			}
			
			function openModalSetLimitTrx(nama,nis,tglLahir){

				$('#modalSetLimitTrx .modal-body').html(`
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-borderless">
                                <tr><td colspan="2" class="text-center"><div class="alert alert-sm alert-success">( ! ) Pastikan data berikut ini adalah benar dan valid.</div></td></tr>
                                <tr>
                                    <td width="100">Nama user</td>
                                    <td>: ${nama}</td>
                                </tr>
                                <tr>
                                    <td width="100">Tempat Lahir</td>
                                    <td>: ${nis}</td>
                                </tr>
                                <tr>
                                    <td width="100">Tanggal Lahir</td>
                                    <td>: ${moment(tglLahir).format('Do MMMM YYYY')}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-12 mt-3">
                            <label for="limitTrx" class="mb-1">Limit Transaksi</label>
                            <input type="text" id="limitTrx" class="form-control mb-2" style="border-radius:100px;" placeholder="Jumlah (Rp)"/>

                        </div>
                    </div>
                `);

				$('#modalSetLimitTrx').modal('toggle');
				$('#modalSetLimitTrx').on('shown.bs.modal', function () {
					$('#limitTrx').focus();

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

            $(".setPinSaldo").on("keydown",function search(e) {
                if(e.keyCode == 13) {
                    alert($(this).val());
                }
            });

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

			function setNomorKartuKeSiswa(value) {
				$('#btnConnectToCard').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Memproses...');
				$('#btnConnectToCard').attr('disabled', 'disabled');
				$('#btnConnectToCard').css('cursor', 'not-allowed');

				var card_id = value;
				var rekening = idsett;
				
				var form_data = new FormData();
				form_data.append('rekening', rekening);
				form_data.append('card_id', card_id);
				
				const save = async (form_data) => {
					const posts = await axios.post('<?= api_url(); ?>api/v1/account/connetions-card', form_data, {
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
						$('#textToCard').val('');
						$('#btnConnectToCard').html('Status : Gagal menyambungkan kartu.');
					});
					if (posts.status == 200) {
						if (posts.data.status == true) {
							
							showData(endPointGetDataGeneral);
							$('#modalSetCard').modal('toggle');
							$('#textToCard').val('');
							Toastify({
								text: 'Kartu berhasil terkoneksi pada siswa tersebut!',
								duration: 3000,
								close: true,
								gravity: "top",
								position: "right",
								className: "successMessage",

							}).showToast();
							$('#btnConnectToCard').html('Status : Done');


						} else {
								let msgg = '';
								if(posts.data.response.data.error=='Card ID already exists in the database'){
									msgg = 'Kartu ini sudah terkoneksi dengan akun lainnya!';
								}else {
									msgg = posts.data.response.data.error;
								}
								Toastify({
									text: msgg,
									duration: 3000,
									close: true,
									gravity: "top",
									position: "right",
									className: "errorMessage",

								}).showToast();
								$('#textToCard').val('');
								$('#btnConnectToCard').html('Status : Error');
						}

						
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
						$('#btnConnectToCard').html('Status : Gagal menyambungkan kartu.');
						$('#textToCard').val('');
					}
				}

			save(form_data);

			}
            
            function commitSaldo() {
				$('#btnSubmitSaldo').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Memproses...');
				$('#btnSubmitSaldo').attr('disabled', 'disabled');
				$('#btnSubmitSaldo').css('cursor', 'not-allowed');

				var card_id = idsett;
				var saldo = $('#saldoTambah').val();
				var pin = $('#pin').val();

                saldo = saldo.replace(".","");

				var form_data = new FormData();
				form_data.append('card', card_id);
				form_data.append('amount', saldo);
				form_data.append('pin', pin);
				form_data.append('client_secret', secret_code);
				
				const save = async (form_data) => {
					const posts = await axios.post('<?= api_url(); ?>api/v1/trx/store-balance', form_data, {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {

                        if(err.response.data.error=='error login kartu!'){
                            Toastify({
                                text: 'PIN Tidak Benar!',
                                duration: 3000,
                                close: true,
                                gravity: "top",
                                position: "right",
                                className: "errorMessage",

                            }).showToast();
                        }else {
                        requestSecret();

							Toastify({
								text: 'Terjadi kesalahan pada server!',
								duration: 3000,
								close: true,
								gravity: "top",
								position: "right",
								className: "errorMessage",

							}).showToast();
                        }
						
						$('#textToCard').val('');
						$('#btnSubmitSaldo').html('Masukkan Saldo Sekarang');
						$('#btnSubmitSaldo').attr('disabled', false);
						$('#btnSubmitSaldo').css('cursor', 'pointer');
					});
					if (posts.status == 201) {
						if (posts.data.status == true) {
							
							showData(endPointGetDataGeneral);

                            $('#modalSetSaldo').modal('toggle');
							$('#textToCard').val('');
							Toastify({
								text: 'Saldo berhasil ditambahkan pada akun tersebut!',
								duration: 3000,
								close: true,
								gravity: "top",
								position: "right",
								className: "successMessage",

							}).showToast();
							$('#btnSubmitSaldo').html('Masukkan Saldo Sekarang');
                            $('#btnSubmitSaldo').attr('disabled', false);
                            $('#btnSubmitSaldo').css('cursor', 'pointer');

                            if(notelppublic.length>8 && notelppublic!='0'){
                                var strFirstThree = notelppublic.substring(0,3);
                                if(strFirstThree=='628' ){
                                    sendMessageSaldoSuccess(`${saldo}`,`${posts.data.data.customers_name}`);
                                }
                            }

                            idsett='';
                            
						} else {
								let msgg = '';
								if(posts.data.response.data.error=='Card ID already exists in the database'){
									msgg = 'Kartu ini sudah terkoneksi dengan akun lainnya!';
								}else {
									msgg = posts.data.response.data.error;
								}
								Toastify({
									text: msgg,
									duration: 3000,
									close: true,
									gravity: "top",
									position: "right",
									className: "errorMessage",

								}).showToast();
								$('#textToCard').val('');
								$('#btnSubmitSaldo').html('Masukkan Saldo Sekarang');
                                $('#btnSubmitSaldo').attr('disabled', false);
						}

						
					}
					else {
						
							Toastify({
								text: 'Terjadi kesalahan dalam menyimpan data!',
								duration: 3000,
								close: true,
								gravity: "top",
								position: "right",
								className: "errorMessage",

							}).showToast();
						$('#btnSubmitSaldo').html('Masukkan Saldo Sekarang');
						$('#btnSubmitSaldo').attr('disabled', false);
						$('#btnSubmitSaldo').css('cursor', 'pointer');
						$('#textToCard').val('');
					}
				}

			save(form_data);

			}

            function sendMessageSaldoSuccess(saldo,nama){
                let isiPesan = "";
                let arrayBaru = [];
                let totalSaldoAkhir = parseInt(saldo) + parseInt(balancepublic);

                isiPesan += `Assalamu'alaikum warahmatullahi wabarakatuh,
*SALDO Rp${formatRupiah(saldo)} BERHASIL DITAMBAHKAN*
Selamat! Saldo Bpk/Ibu berhasil ditambahkan ke dalam sistem Kartu Elektronik Santri pada ${moment(moment()).format('Do MMMM YYYY HH:mm:ss')} WIB.

*===SALDO SAAT INI===*
        *Rp${formatRupiah(totalSaldoAkhir.toString())}*
*===================*

_Selalu pantau perkembangan saldo Bapak/Ibu agar selalu dapat digunakan sesuai dengan keperluannya._

Terimakasih.
`;

isiPesan += `


_Kode pesan : #${createRandom()}_
                            `;

                arrayBaru.push(
                    {"to" : notelppublic,
                    "text" : isiPesan}
                )

                let arrayLengkap = {"session":"ppsrSess","data":arrayBaru,"delay":1000};
                

                axios.post("https://v3.gigades.id/rest/api/v1/wa/broadcast", arrayLengkap)
                .then((res) => {
                    if (res.data.status === true) {
                        Toastify({
                            text: 'Pemberitahuan juga terkirim ke Whatsapp Bpk/Ibu.',
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            className: "successMessage",

                        }).showToast();

                        idsett = '';
                        notelppublic = '';
                        balancepublic ='';
                    }

                })
                .catch((err) => {
                    console.log('error kirim pesan ke wa ortu');
                });
            }
			
			function commitLimitTrxUpdate() {
				$('#btnSubmitLimitTrx').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Memproses...');
				$('#btnSubmitLimitTrx').attr('disabled', 'disabled');
				$('#btnSubmitLimitTrx').css('cursor', 'not-allowed');

				var card_id = idsett;
				var saldo = $('#limitTrx').val();
				
				var form_data = new FormData();
				form_data.append('limit_trx', saldo);
				
				const save = async (form_data) => {
					const posts = await axios.post('<?= api_url(); ?>api/v1/account/update/'+card_id, form_data, {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {

                        console.log(err.response.data);
						
						$('#limitTrx').val('');
						$('#btnSubmitLimitTrx').html('Simpan');
						$('#btnSubmitLimitTrx').attr('disabled', false);
						$('#btnSubmitLimitTrx').css('cursor', 'pointer');
					});
					if (posts.status == 201||posts.status == 200) {
						if (posts.data.status == true) {
							
							showData(endPointGetDataGeneral);
                            $('#modalSetLimitTrx').modal('toggle');
							$('#limitTrx').val('');
							Toastify({
								text: 'Limit transaksi telah diperbaharui',
								duration: 3000,
								close: true,
								gravity: "top",
								position: "right",
								className: "successMessage",

							}).showToast();
							
							idsett ='';

							$('#btnSubmitLimitTrx').html('Simpan');
                            $('#btnSubmitLimitTrx').attr('disabled', false);
                            $('#btnSubmitLimitTrx').css('cursor', 'pointer');
						} else {
								let msgg = '';
								if(posts.data.response.data.error=='Card ID already exists in the database'){
									msgg = 'Kartu ini sudah terkoneksi dengan akun lainnya!';
								}else {
									msgg = posts.data.response.data.error;
								}
								Toastify({
									text: msgg,
									duration: 3000,
									close: true,
									gravity: "top",
									position: "right",
									className: "errorMessage",

								}).showToast();
								$('#limitTrx').val('');
								$('#btnSubmitLimitTrx').html('Simpan');
                                $('#btnSubmitLimitTrx').attr('disabled', false);
						}

						
					}
					else {
						
							Toastify({
								text: 'Terjadi kesalahan dalam menyimpan data!',
								duration: 3000,
								close: true,
								gravity: "top",
								position: "right",
								className: "errorMessage",

							}).showToast();
						$('#btnSubmitLimitTrx').html('Simpan');
						$('#btnSubmitLimitTrx').attr('disabled', false);
						$('#btnSubmitLimitTrx').css('cursor', 'pointer');
						$('#limitTrx').val('');
					}
				}

			save(form_data);

			}
			
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
                                            <td>: ${posts2.data.data.customers_name}</td>
                                        </tr>
                                        <tr>
                                            <td width="100">Saldo</td>
                                            <td>: Rp${formatRupiah(posts2.data.data.balance)}</td>
                                        </tr>

                                    </table>
                                </div>
                                <div class="col-12 mt-3">
                                    <label for="saldoTambah" class="mb-1">Saldo</label>
                                    <input type="text" id="saldoTambah" class="form-control mb-2" oninput="setVal(this.value);" style="border-radius:100px;" placeholder="Jumlah saldo (Rp)"/>

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
			
			function commitDeleteGeneral(){
			let url = '';
			if(tablesett == 'general'){
				url = '<?= api_url(); ?>api/v1/'+tablesett+'/' + uidsett;
			}else {
				url = '<?= api_url(); ?>api/v1/'+tablesett+'/destroy/' + uidsett;
			}

			const save = async (uidsett) => {
				const posts = await axios.delete(url, {
					headers: {
						'Authorization': 'Bearer ' + localStorage.getItem('_token')
					}
				}).catch((err) => { 

					if(err.error){
						Toastify({
							text: 'Maaf. Data tidak ditemukan.',
							duration: 3000,
							close: true,
							gravity: "bottom",
							position: "left",
							className: "errorMessage",

						}).showToast();
						return false;
					}

					for (const key in err.response.data.error) {
							Toastify({
								text: err.response.data.error[key],
								duration: 3000,
								close: true,
								gravity: "bottom",
								position: "left",
								className: "errorMessage",

							}).showToast();
						}
				});

				if (posts.status == 200) {

					Toastify({
						text: 'Data berhasil dihapus!',
						duration: 3000,
						close: true,
						gravity: "top",
						position: "left",
						className: "successMessage",

					}).showToast();

					showData(endPointGetDataGeneral);
					uidsett = '';
					tablesett = '';

					$('#modalDeleteGeneral').modal('toggle');


				} else {

				}
			}

			save(uidsett);
		}

            function requestSecret(){
				const save2 = async () => {
					const posts2 = await axios.get('<?= api_url(); ?>api/v1/key/create', {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {
						console.log(err.response);
					});

					if (posts2.status == 201) {
						secret_code = posts2.data.data.client_secret;
					}
				}
				save2();
			}

            function createRandom(){
                let result = '';
                const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
                const charactersLength = characters.length;
                let counter = 0;
                while (counter < 10) {
                result += characters.charAt(Math.floor(Math.random() * charactersLength));
                counter += 1;
                }
                return result;
            }

            function setVal(str){
                $('#saldoTambah').val(formatRupiah(str));
            }

			
		</script>