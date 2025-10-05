<div class="page-wrapper">
			<div class="page-content">
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Pesan Personal General</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Personal General</li>
							</ol>
						</nav>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="card radius-10 w-100" style="overflow:hidden;">
							<div class="row" >
                            <div class="card">
                                <div class="card-body">
                                        <div class="d-lg-flex align-items-center mb-4 gap-3">
                                            <div class="position-relative">
                                                <input type="text" class="form-control ps-5 radius-30" id="floatingInput" placeholder="Ketik nama siswa"> <span class="position-absolute top-50 product-show translate-middle-y"><i class="bx bx-search"></i></span>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table mb-0 tabelsiswa" id="tabelPrint">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>Nomor Akun</th>
                                                        <th>Nama Lengkap</th>
                                                        <th>Nomor (WA)</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="putContentHere">
                                                </tbody>
                                            </table>

                                            <!-- Pagination -->
                                            <nav class="container mt-5"
                                                id="siswa-pagination-container"
                                                aria-label="Page navigation example">
                                            </nav>

                                            <!-- Pagination details -->
                                            <div class="container mt-1 text-muted text-center">
                                                <small id="siswa-pagination-details"></small>
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

        <div class="modal fade" id="modalSetSaldo" tabindex="-1" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Pesan Personal (General)</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						
					</div>
					<div class="modal-footer text-center">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
						<button type="button" onclick="commitPesan();" id="btnSubmitPesan" class="btn btn-outline-primary">Kirim Pesan</button>
					</div>
				</div>
			</div>
		</div>
        
        
        <div class="modal fade" id="modalSetSaldoInisiasi" tabindex="-1" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Pesan Personal (General)</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						
					</div>
					<div class="modal-footer text-center">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
						<button type="button" onclick="commitPesan();" id="btnSubmitPesanOfficial" class="btn btn-primary">Kirim Pesan Melalui Qrion Official</button>
					</div>
				</div>
			</div>
		</div>

        <script type="text/javascript">
            let sessionSet = '';
            let endPointGetDataSiswa = '<?= api_url(); ?>api/v1/general';
			let endPointGetDataSiswaSearch = '<?= api_url(); ?>api/v1/general?search=';

            let numberSet ='';
            let namaSet = '';
			var typingTimer;
            let vaSet = '';
            let namaInstansiSet = '';

            let userID;
			
            $(document).ready(function () {

                

                showData(endPointGetDataSiswa);
                
				$("#floatingInput").on("keyup", function() {
					let value = $(this).val().toLowerCase();
					clearTimeout(typingTimer);
					typingTimer = setTimeout(function() {
						if(value==''){
							showData(endPointGetDataSiswa);
						}else {
							showData(endPointGetDataSiswaSearch+value);	
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
					const posts2 = await axios.get( params , {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {
						console.log(err.response);
					});
			
					if (posts2.status == 200) {
							num += 1;
							tableColumn = '';
							if(posts2.data.data.data.length==0){
								tableColumn +=`<tr><td colspan="8" class="text-center">Tidak ada data.</td></tr>`;
								$('.putContentHere').html(tableColumn);return false;
							}
							
							console.log(posts2.data.data.data);
							posts2.data.data.data.map((mapping,i)=>{
							    let textTingkat = '';
								let textNamaA = mapping.nama_lengkap;
								let textNama = textNamaA.split("-M");
								if(textNama[1]=='A'){
									textTingkat = 'Madrasah Aliyah';
								}
								if(textNama[1]=='TS'){
									textTingkat = 'Madrasah Tsanawiyah';
								}

                                let namanormal = textNamaA.split("'").join("");
                                let namainstansi = mapping.instansi.nama;
                                namainstansi = namainstansi.split("'").join("");

							tableColumn +=`
								<tr>
									<td >
										<div class="d-flex align-items-center">
											<div>
												<input class="form-check-input me-3" type="checkbox" value="" aria-label="...">
											</div>
											<div class="ms-2">
												<h6 class="mb-0 font-14">${mapping.accounts.account_number}</h6>
											</div>
										</div>
									</td>
									<td>${textNama[0]} ${(mapping.user.foto!='default.jpg')?'<i class="bx bxs-badge-check text-primary"></i>':'<i class="bx bxs-x-circle text-danger"></i>'}
									<br/><small class="text-muted">${textTingkat}</small> </td>
									<td>${mapping.telpon}</td>
									<td>
										<div class="btn btn-sm btn-success text-dark">
											<a href="#/" onclick="openModalSendWA('${namanormal}','${mapping.telpon}','${mapping.accounts.account_number}');" class="me-3 text-dark">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path fill-rule="evenodd" clip-rule="evenodd" d="M18.403 5.633A8.919 8.919 0 0 0 12.053 3c-4.948 0-8.976 4.027-8.978 8.977 0 1.582.413 3.126 1.198 4.488L3 21.116l4.759-1.249a8.981 8.981 0 0 0 4.29 1.093h.004c4.947 0 8.975-4.027 8.977-8.977a8.926 8.926 0 0 0-2.627-6.35m-6.35 13.812h-.003a7.446 7.446 0 0 1-3.798-1.041l-.272-.162-2.824.741.753-2.753-.177-.282a7.448 7.448 0 0 1-1.141-3.971c.002-4.114 3.349-7.461 7.465-7.461a7.413 7.413 0 0 1 5.275 2.188 7.42 7.42 0 0 1 2.183 5.279c-.002 4.114-3.349 7.462-7.461 7.462m4.093-5.589c-.225-.113-1.327-.655-1.533-.73-.205-.075-.354-.112-.504.112s-.58.729-.711.879-.262.168-.486.056-.947-.349-1.804-1.113c-.667-.595-1.117-1.329-1.248-1.554s-.014-.346.099-.458c.101-.1.224-.262.336-.393.112-.131.149-.224.224-.374s.038-.281-.019-.393c-.056-.113-.505-1.217-.692-1.666-.181-.435-.366-.377-.504-.383a9.65 9.65 0 0 0-.429-.008.826.826 0 0 0-.599.28c-.206.225-.785.767-.785 1.871s.804 2.171.916 2.321c.112.15 1.582 2.415 3.832 3.387.536.231.954.369 1.279.473.537.171 1.026.146 1.413.089.431-.064 1.327-.542 1.514-1.066.187-.524.187-.973.131-1.067-.056-.094-.207-.151-.43-.263"></path></svg> Standard
                                            </a>
											
										</div>
										
                                        <div class="btn btn-sm btn-primary text-dark">
											<a href="#/" onclick="openModalSendWAInisiasi('${namanormal}','${mapping.telpon}','${mapping.user.username}','${mapping.accounts.pin}','${namainstansi}','${mapping.user_id}');" class="me-3 text-dark">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path fill-rule="evenodd" clip-rule="evenodd" d="M18.403 5.633A8.919 8.919 0 0 0 12.053 3c-4.948 0-8.976 4.027-8.978 8.977 0 1.582.413 3.126 1.198 4.488L3 21.116l4.759-1.249a8.981 8.981 0 0 0 4.29 1.093h.004c4.947 0 8.975-4.027 8.977-8.977a8.926 8.926 0 0 0-2.627-6.35m-6.35 13.812h-.003a7.446 7.446 0 0 1-3.798-1.041l-.272-.162-2.824.741.753-2.753-.177-.282a7.448 7.448 0 0 1-1.141-3.971c.002-4.114 3.349-7.461 7.465-7.461a7.413 7.413 0 0 1 5.275 2.188 7.42 7.42 0 0 1 2.183 5.279c-.002 4.114-3.349 7.462-7.461 7.462m4.093-5.589c-.225-.113-1.327-.655-1.533-.73-.205-.075-.354-.112-.504.112s-.58.729-.711.879-.262.168-.486.056-.947-.349-1.804-1.113c-.667-.595-1.117-1.329-1.248-1.554s-.014-.346.099-.458c.101-.1.224-.262.336-.393.112-.131.149-.224.224-.374s.038-.281-.019-.393c-.056-.113-.505-1.217-.692-1.666-.181-.435-.366-.377-.504-.383a9.65 9.65 0 0 0-.429-.008.826.826 0 0 0-.599.28c-.206.225-.785.767-.785 1.871s.804 2.171.916 2.321c.112.15 1.582 2.415 3.832 3.387.536.231.954.369 1.279.473.537.171 1.026.146 1.413.089.431-.064 1.327-.542 1.514-1.066.187-.524.187-.973.131-1.067-.056-.094-.207-.151-.43-.263"></path></svg> Inisiasi Akun
                                            </a>
											
										</div>
										
									</td>
								</tr>
							`;
							});
							
						$('.putContentHere').html(tableColumn);
						createPaginations(posts2.data.data, "siswa-pagination-container", "siswa-pagination-details", "showData");
					}
				}
				save2();
			}

            function openModalSendWA(nama, nomor, va){
                $('#modalSetSaldo').modal('toggle');

                numberSet = nomor;
                namaSet = nama;
                vaSet = va;

                let textTingkat = '';
                let textNamaA = nama;
                let textNama = textNamaA.split("-M");
                if(textNama[1]=='A'){
                    textTingkat = 'Madrasah Aliyah';
                }
                if(textNama[1]=='TS'){
                    textTingkat = 'Madrasah Tsanawiyah';
                }

                let isiPesan = `Kepada Yth. Orangtua dari Anda ${textNama[0]},
Berikut kami informasikan tata cara untuk mengetahui informasi penggunaan saldo Anda.
1. Ketik : CekSaldo_${va}
_Untuk mengetahui saldo terakhir_

2. Ketik : Belanja1_${va}
_Untuk mendapatkan aktifitas belanja pada hari ini_

3. Ketik : Belanja2_${va}
_Untuk mendapatkan aktifitas belanja dalam 2 hari yang lalu_

`;

                let html = `
                    <div class="row">
                        <div class="col-lg-6">
                            <small>Orangtua dari</small>
                            <h6 style="margin:0;padding:0;">${textNama[0]}</h6>
                            <small style="margin:0;padding:0;">${textTingkat}</small>
                        </div>
                        <div class="col-lg-6">
                            <small class="mt-3 d-block">Nomor tujuan</small>
                            <h6 style="margin:0;padding:0;">${nomor}</h6>
                        </div>
                    </div>
                    <small class="mt-3 d-block">Isi pesan</small>
                    <textarea class="form-control isipesandisini" id="valuePesan" rows="15" placeholder="Tulis pesan disini...">${isiPesan}</textarea>
                   
                `;

                $('#modalSetSaldo .modal-body').html(html);
            }
            
            
            function openModalSendWAInisiasi(nama, nomor, va,pin,instansi_name, user_id){
                $('#modalSetSaldoInisiasi').modal('toggle');

                userID = user_id;

                numberSet = nomor;
                namaSet = nama;
                vaSet = va;
                pinSet = pin;
                namaInstansiSet = instansi_name;

                $('#modalSetSaldoInisiasi .modal-body').html('');

                let textTingkat = '';
                let textNamaA = nama;
                let textNama = textNamaA.split("-M");
                if(textNama[1]=='A'){
                    textTingkat = 'Madrasah Aliyah';
                }
                if(textNama[1]=='TS'){
                    textTingkat = 'Madrasah Tsanawiyah';
                }

                let isiPesan = `Assalamu'alaikum Warahmatullah Wabarakatuh 

Bapak Ibu Guru dan Karyawan ${namaInstansiSet}, Berikut kami kirimkan Akses log in aplikasi absen.

- Nama : *${namaSet}*
- Username : *${vaSet}*
- Password : 123456

Informasi ini bersifat rahasia, mohon tidak diberitahu kepada siapapun. Terimakasih

Wassalamualaikum Warrahmatullah. 
#TeamQrion`;

                let html = `
                    <div class="row">
                        <div class="col-lg-6">
                            <small>Orangtua dari</small>
                            <h6 style="margin:0;padding:0;">${textNama[0]}</h6>
                            <small style="margin:0;padding:0;">${textTingkat}</small>
                        </div>
                        <div class="col-lg-6">
                            <small class="mt-3 d-block">Nomor tujuan</small>
                            <h6 style="margin:0;padding:0;">${nomor}</h6>
                        </div>
                    </div>
                    <small class="mt-3 d-block">Preview pesan</small>
                    <textarea class="form-control isipesandisini" id="valuePesan" style="font-size:11px;" rows="24" placeholder="Tulis pesan disini..." disabled readonly>${isiPesan}</textarea>
                   
                `;

                $('#modalSetSaldoInisiasi .modal-body').html(html);
            }

            
            function commitPesan(){
                
                $('#btnSubmitPesan').html(`
                <span class="spinner-grow spinner-grow-sm " role="status" aria-hidden="true"></span>
                    Mengirim pesan...
                `);
                $("#btnSubmitPesan").prop("disabled",true);

                let defaultButton = `Kirim Pesan`;

                let isiPesan = "";
                let arrayBaru = [];

                isiPesan += `*Pusat Informasi ${instansiNameX}*

`;

                isiPesan += $('.isipesandisini').val();

                var form_data = new FormData();
                form_data.append('noWA',numberSet);
                form_data.append('pesan',isiPesan);
                form_data.append('vaSet',vaSet);
                 
                form_data.append('kodeInstansi',kodeInstansiX);
                
                jQuery.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>"+"WebhookOncard/sendMessageWatzap",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,
                    dataType: 'json',  // what to expect back from the PHP script, if anything
                    beforeSend: function() {
                        
                    },
                    success : function(e){

                        if(e.status==true){
                            
                            $('#modalSetSaldo').modal('toggle');
                            $('.isipesandisini').val('');
                            namaSet = '';
                            numberSet = '';
                            vaSet = '';
                            
                            $('#btnSubmitPesan').html(defaultButton);
                            $("#btnSubmitPesan").prop("disabled",false);

                            Toastify({
                                text: "Pesan berhasil terkirim!",
                                duration: 3500,
                                close: true,
                                gravity: "top",
                                position: "right",
                                className: "successMessage",

                            }).showToast();

                            window.location.reload();
                        }else {
                            console.log('error mengirim pesan');
                            // window.location.reload();
                            Toastify({
                                text: "Telah terjadi kesalahan dalam pengiriman pesan.",
                                duration: 3500,
                                close: true,
                                gravity: "top",
                                position: "right",
                                className: "errorMessage",

                            }).showToast();
                        }

                        $('#btnSubmitPesan').html(defaultButton);
                        $("#btnSubmitPesan").prop("disabled",false);
                        
                        
                    }
                
                });

            }
            
            
            function commitPesanInisiasiFromOfficialQRION(){
                
                $('#btnSubmitPesanOfficial').html(`
                <span class="spinner-grow spinner-grow-sm " role="status" aria-hidden="true"></span>
                    Mengirim pesan...
                `);
                $("#btnSubmitPesanOfficial").prop("disabled",true);

                let defaultButton = `Kirim Pesan Melalui Qrion Official`;

                const save2 = async () => {
					const posts2 = await axios.get( "<?=api_url(); ?>api/wa/notify/"+userID+"/ortu-register" , {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {
						console.log(err.response);
					});
			
					if (posts2.status == 200) {
                        Swal.fire({
                            title: "Message Sent",
                            text: "Pesan berhasil dikirimkan.",
                            icon: "success"
                        });
                        $('#btnSubmitPesanOfficial').html(defaultButton);
                        $("#btnSubmitPesanOfficial").prop("disabled",false);

                        $('#modalSetSaldoInisiasi').modal('toggle');
					}else {

                    }
				}
				save2();

                
                
            }

            
        </script>