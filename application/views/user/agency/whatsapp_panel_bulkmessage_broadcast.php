<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<style>
    /* Fullscreen overlay */
.loading-overlay {
    display: none; /* Initially hidden */
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
    z-index: 9999;
    text-align: center;
    color: white;
}
/* Centering the spinner */
.loading-spinner {
        border: 9px solid #f3f3f3; /* Light grey */
        border-top: 9px solid #3498db; /* Blue */
        border-radius: 50%;
        width: 50px;
        height: 50px;
        animation: spin 2s linear infinite;
        margin-bottom:15px;
    }

    /* Spinner animation */
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>
<div class="page-wrapper">
			<div class="page-content">
                
                <!-- <div id="loadingScreen" class="loading-overlay">
                    <div class="loading-spinner"></div>
                    <p id="progress">Processing, please wait...</p>
                    <div class="progress" style="width:200px;">
                        <div id="progressBar" class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
				</div> -->

                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Pesan Broadcast [1]</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Pilih Template Broadcast</li>
							</ol>
						</nav>
					</div>
				</div>
				<div class="row">
                    <div class="col-lg-6 mah">
                        <div class="alert alert-success"><i class="bx bxs-circle me-3 text-success"></i>API Whatsapp sedang <b>ON</b></div>
                    </div>
					<div class="col-12">
						<div class="card radius-10 w-100" >
							
                                <div class="card-body">
                                    <div class="row align-items-start">
                                        <div class="col-lg-3 col-12 mb-4">
                                        <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                            <button class="nav-link" style="text-align:left;" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true" onclick="setContent('v-pills-home');">Info Saldo pelajar</button>
                                            <button class="nav-link" style="text-align:left;" id="v-pills-home-tab120" data-bs-toggle="pill" data-bs-target="#v-pills-home120" type="button" role="tab" aria-controls="v-pills-home120" aria-selected="true" onclick="setContent('v-pills-home120');">Info Akun On-Time General</button>
                                            <button class="nav-link" style="text-align:left;" id="v-pills-home-tab5" data-bs-toggle="pill" data-bs-target="#v-pills-home5" type="button" role="tab" aria-controls="v-pills-home5" aria-selected="true" onclick="setContent('v-pills-home5');">Info Transfer BRKS</button>
                                            <button class="nav-link" style="text-align:left;" id="v-pills-home-tab3" data-bs-toggle="pill" data-bs-target="#v-pills-home3" type="button" role="tab" aria-controls="v-pills-home3" aria-selected="true" onclick="setContent('v-pills-home3');">Pengumuman Khusus Ke Ortu</button>
                                            <button class="nav-link" style="text-align:left;" id="v-pills-home-tab100" data-bs-toggle="pill" data-bs-target="#v-pills-home100" type="button" role="tab" aria-controls="v-pills-home100" aria-selected="true" onclick="setContent('v-pills-home100');">Pengumuman Khusus Ke Ortu (Tanpa template)</button>
                                            <button class="nav-link" style="text-align:left;" id="v-pills-home-tab3" data-bs-toggle="pill" data-bs-target="#v-pills-home4" type="button" role="tab" aria-controls="v-pills-home4" aria-selected="true" onclick="setContent('v-pills-home4');">Pengumuman Khusus General</button>
                                            
                                        </div>
                                        </div>
                                        <div class="col-lg-9 col-12">
                                        <div class="tab-content" id="v-pills-tabContent">
                                            <div class="tab-pane fade " id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">...</div>
                                            <div class="tab-pane fade " id="v-pills-home120" role="tabpanel" aria-labelledby="v-pills-home-tab120">...</div>
                                            <div class="tab-pane fade " id="v-pills-home5" role="tabpanel" aria-labelledby="v-pills-home-tab5">...</div>
                                            <div class="tab-pane fade " id="v-pills-home3" role="tabpanel" aria-labelledby="v-pills-home-tab3">...</div>
                                            <div class="tab-pane fade " id="v-pills-home100" role="tabpanel" aria-labelledby="v-pills-home-tab100">...</div>
                                            <div class="tab-pane fade " id="v-pills-home4" role="tabpanel" aria-labelledby="v-pills-home-tab4">...</div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
							
					</div>
				</div>
				
				
			</div>
		</div>

        <div class="modal fade" id="modalSetSaldo" tabindex="-1" aria-hidden="true"  data-bs-keyboard="false" data-bs-backdrop="static">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Pesan Personal</h5>
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
        
        <div class="modal fade" id="modalSetPIN" tabindex="-1" aria-hidden="true"  data-bs-keyboard="false" data-bs-backdrop="static">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Konfirmasi</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						Anda yakin akan mengirimkan pesan ini?<br/>

                        <strong class="mt-4">Silahkan isi inputan berikut dengan benar!</strong>
                        <input type="password" class="form-control mt-1 mb-3" id="passGo" placeholder="Masukkan kata kunci rahasia..."/>

                        <hr>
                        <div class="row mt-2">
                            <div class="col-2 text-center">
                                <i class="bx bx-bell text-danger" style="font-size:30px;font-weight:bold;;"></i>
                            </div>
                            <div class="col-10 text-muted text-danger"><code>NB : Jangan refresh halaman atau tutup halaman ini apabila masih berstatus <b>Memproses...</b></code></div>
                        </div>
					</div>
					<div class="modal-footer text-center">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
						<button type="button" onclick="sendMessageNow();" id="btnSubmitPesanKirim" class="btn btn-outline-primary">Kirim Pesan</button>
					</div>
				</div>
			</div>
		</div>

        <!-- Progress Modal -->
        <div id="progressModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="progressModalLabel" aria-hidden="true"  data-bs-keyboard="false" data-bs-backdrop="static">
            <div class="modal-dialog modal-fullscreen modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="progressModalLabel">Progress</h5>
                    </div>
                    <div class="modal-body">
                        <p id="progressMessage">Sending messages...</p>
                        <div class="progress">
                            <div id="progressBar" class="progress-bar progress-bar-striped progress-bar-animated" 
                                role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" 
                                style="width: 0%;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script type="text/javascript">
            let sessionSet = '';
            let endPointGetDataSiswa = '<?= api_url(); ?>api/v1/siswa';
			let endPointGetDataSiswaSearch = '<?= api_url(); ?>api/v1/siswa/search?q=';
            let totalAllTarget = 0;

            let varrr1 = ['Assalamualaikum','Assalamualaikum warahmatullahi wabarakatuh','Salam sejahtera','Salam','Assalamualaikum w.r w.b'];
            let varrr2 = ['Yth. Orangtua / Wali','Kami hormati Orangtua','Bapak','Ibu','Bapak/Ibu'];
            let varrr3 = ['Saldo','Sisa uang','Sisa duit','Adapun saldo','Uang'];
            let varrr4 = ['Saldo anak','Sisa uang ananda','Sisa duit anak','Adapun saldo ananda','Uang'];
            let varrr5 = ['Pastikan selalu memantau perkembangan keuangan anak Bpk/Ibu agar selalu dipakai secara tepat oleh ananda','Selalu pantau keuangan ananda.','Terimakasih atas perhatian Bpk/Ibu','Abaikan pesan ini jika sudah mendapatkannya','Silahkan balas dengan Alhamdulillah.'];

            let numberSet ='';
            let namaSet = '';
			var typingTimer;
            let modeSett = '';

            function showLoading() {
				document.getElementById('loadingScreen').style.display = 'flex';
				$('#loadingScreen').css('flex-direction','column');
				$('#loadingScreen').css('align-items','center');
				$('#loadingScreen').css('justify-content','center');
			}

			function hideLoading() {
				document.getElementById('loadingScreen').style.display = 'none';
			}
			
            $(document).ready(function () {

                // getDataSession();
                
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
							tableColumn +=`
								<tr>
									<td >
										<div class="d-flex align-items-center">
											<div>
												<input class="form-check-input me-3" type="checkbox" value="" aria-label="...">
											</div>
											<div class="ms-2">
												<h6 class="mb-0 font-14">#${mapping.nis}</h6>
											</div>
										</div>
									</td>
									<td>${textNama[0]} ${(mapping.user.foto!='default.jpg')?'<i class="bx bxs-badge-check text-primary"></i>':'<i class="bx bxs-x-circle text-danger"></i>'}
									<br/><small class="text-muted">${textTingkat}</small> </td>
									<td>${mapping.telp_ortu}</td>
									<td>
										<div class="d-flex order-actions">
											<a href="#/" onclick="openModalSendWA('${mapping.nama_lengkap}','${mapping.telp_ortu}');" class="me-3 ">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path fill-rule="evenodd" clip-rule="evenodd" d="M18.403 5.633A8.919 8.919 0 0 0 12.053 3c-4.948 0-8.976 4.027-8.978 8.977 0 1.582.413 3.126 1.198 4.488L3 21.116l4.759-1.249a8.981 8.981 0 0 0 4.29 1.093h.004c4.947 0 8.975-4.027 8.977-8.977a8.926 8.926 0 0 0-2.627-6.35m-6.35 13.812h-.003a7.446 7.446 0 0 1-3.798-1.041l-.272-.162-2.824.741.753-2.753-.177-.282a7.448 7.448 0 0 1-1.141-3.971c.002-4.114 3.349-7.461 7.465-7.461a7.413 7.413 0 0 1 5.275 2.188 7.42 7.42 0 0 1 2.183 5.279c-.002 4.114-3.349 7.462-7.461 7.462m4.093-5.589c-.225-.113-1.327-.655-1.533-.73-.205-.075-.354-.112-.504.112s-.58.729-.711.879-.262.168-.486.056-.947-.349-1.804-1.113c-.667-.595-1.117-1.329-1.248-1.554s-.014-.346.099-.458c.101-.1.224-.262.336-.393.112-.131.149-.224.224-.374s.038-.281-.019-.393c-.056-.113-.505-1.217-.692-1.666-.181-.435-.366-.377-.504-.383a9.65 9.65 0 0 0-.429-.008.826.826 0 0 0-.599.28c-.206.225-.785.767-.785 1.871s.804 2.171.916 2.321c.112.15 1.582 2.415 3.832 3.387.536.231.954.369 1.279.473.537.171 1.026.146 1.413.089.431-.064 1.327-.542 1.514-1.066.187-.524.187-.973.131-1.067-.056-.094-.207-.151-.43-.263"></path></svg>
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

            function openModalSendWA(nama, nomor){
                $('#modalSetSaldo').modal('toggle');

                numberSet = nomor;
                namaSet = nama;

                let textTingkat = '';
                let textNamaA = nama;
                let textNama = textNamaA.split("-M");
                if(textNama[1]=='A'){
                    textTingkat = 'Madrasah Aliyah';
                }
                if(textNama[1]=='TS'){
                    textTingkat = 'Madrasah Tsanawiyah';
                }

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
                    <textarea class="form-control isipesandisini" id="valuePesan" rows="5" placeholder="Tulis pesan disini...">Kepada Yth. Orangtua dari Ananda ${textNama[0]},
</textarea>
                   
                `;

                $('#modalSetSaldo .modal-body').html(html);
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

                isiPesan += `

`;

                isiPesan += $('.isipesandisini').val();

                arrayBaru.push(
                    {"to" : numberSet,
                    "text" : isiPesan}
                )

                let arrayLengkap = {"session":sessionSet,"data":arrayBaru,"delay":1000};
                

                axios.post("https://v3.gigades.id/rest/api/v1/wa/broadcast", arrayLengkap)
                .then((res) => {
                    if (res.data.status === true) {
                        $('#modalSetSaldo').modal('toggle');
                        $('.isipesandisini').val('');
                        namaSet = '';
                        numberSet = '';
                    }

                    $('#btnSubmitPesan').html(defaultButton);
                    $("#btnSubmitPesan").prop("disabled",false);
                })
                .catch((err) => {
                    $('#btnSubmitPesan').html(defaultButton);
                    $("#btnSubmitPesan").prop("disabled",false);
                });

            }

            


            let arrayBaruBroadcast = [];

            function setContent(idDIV){

                
                html = '';
                $('#'+idDIV).html(html);
                if(idDIV=='v-pills-home'){

                    arrayBaruBroadcast = [];

                    $('#'+idDIV).html('');
                    const save2 = async () => {
                        const posts2 = await axios.get('<?= api_url(); ?>api/v1/siswa/get-inpaging', {
                            headers: {
                                'Authorization': 'Bearer ' + localStorage.getItem('_token')
                            }
                        }).catch((err) => {
                            console.log(err.response);
                        });
                
                        if (posts2.status == 200) {

                            modeSett = 'broadcastSaldoSiswa';

                            let noortu = '';
                            let countData = 1;

                            posts2.data.data.map((mapping,i)=>{
                                noortu = mapping.telp_ortu??'';
                                if(noortu.length>8 && noortu!='0'){
                                    var strFirstThree = noortu.substring(0,3);
                                    if(strFirstThree=='628' ){
                                        countData++;
                                    }
                                }
                            });

                            totalAllTarget = countData;
                            
                            html += `
                                <div class="row jumbotron">
                                    <div class="col-12">
                                        <div class="alert alert-success" role="alert">
                                            Sistem akan mengirim broadcast kepada <b>${countData}</b> nomor orangtua pelajar. Klik tombol <b>KIRIM BROADCAST</b> dibawah ini untuk mengeksekusi pengiriman secara massal sekarang juga.
                                        </div>
                                    </div>
                                    <div class="col-12 mt-1">
                                        <button type="button" onclick="confirmSend();" class="btn btn-primary"><i class="bx bx-send"></i> KIRIM BROADCAST</button>
                                    </div>
                                </div>
                            `;

                            $('#'+idDIV).html(html);

                            let modul = totalAllTarget/ 20;
                            modul = Math.ceil(modul);

                            console.log('total target : '+totalAllTarget, 'step : ' + modul);
                        }
                    }
                    save2();

                }else if(idDIV=='v-pills-home5'){

                    arrayBaruBroadcast = [];

                    $('#'+idDIV).html('');
                    const save2 = async () => {
                        const posts2 = await axios.get('<?= api_url(); ?>api/v1/siswa/get-inpaging', {
                            headers: {
                                'Authorization': 'Bearer ' + localStorage.getItem('_token')
                            }
                        }).catch((err) => {
                            console.log(err.response);
                        });

                        if (posts2.status == 200) {

                            modeSett = 'broadcastTransferBRKS';

                            let noortu = '';
                            let countData = 1;

                            posts2.data.data.map((mapping,i)=>{
                                noortu = mapping.telp_ortu??'';
                                if(noortu.length>8 && noortu!='0'){
                                    var strFirstThree = noortu.substring(0,3);
                                    if(strFirstThree=='628' ){
                                        countData++;
                                    }
                                }
                            });

                            totalAllTarget = countData;
                            
                            html += `
                                <div class="row jumbotron">
                                    <div class="col-12">
                                        <div class="alert alert-success" role="alert">
                                            Sistem akan mengirim broadcast kepada <b>${countData}</b> nomor orangtua pelajar. Klik tombol <b>KIRIM BROADCAST</b> dibawah ini untuk mengeksekusi pengiriman secara massal sekarang juga.
                                        </div>
                                    </div>
                                    <div class="col-12 mt-1">
                                        <button type="button" onclick="confirmSend();" class="btn btn-primary"><i class="bx bx-send"></i> KIRIM BROADCAST</button>
                                    </div>
                                </div>
                            `;

                            $('#'+idDIV).html(html);

                            let modul = totalAllTarget/ 20;
                            modul = Math.ceil(modul);

                            console.log('total target : '+totalAllTarget, 'step : ' + modul);
                        }
                    }
                    save2();

                    }
                else if(idDIV=='v-pills-home120'){

                    arrayBaruBroadcast = [];

                    $('#'+idDIV).html('');
                    const save2 = async () => {
                        const posts2 = await axios.get('<?= api_url(); ?>api/v1/general/get-inpaging', {
                            headers: {
                                'Authorization': 'Bearer ' + localStorage.getItem('_token')
                            }
                        }).catch((err) => {
                            console.log(err.response);
                        });

                        if (posts2.status == 200) {

                            modeSett = 'broadcastInisiasiAkunGeneral';

                            let noortu = '';
                            let countData = 1;

                            posts2.data.data.map((mapping,i)=>{
                                noortu = mapping.telpon??'';
                                if(noortu.length>8 && noortu!='0'){
                                    var strFirstThree = noortu.substring(0,3);
                                    if(strFirstThree=='628' ){
                                        countData++;
                                    }
                                }
                            });

                            totalAllTarget = countData;
                            
                            html += `
                                <div class="row jumbotron">
                                    <div class="col-12">
                                        <div class="alert alert-success" role="alert">
                                            Sistem akan mengirim broadcast kepada <b>${countData}</b> nomor orangtua pelajar. Klik tombol <b>KIRIM BROADCAST</b> dibawah ini untuk mengeksekusi pengiriman secara massal sekarang juga.
                                        </div>
                                    </div>
                                    <div class="col-12 mt-1">
                                        <button type="button" onclick="confirmSend();" class="btn btn-primary"><i class="bx bx-send"></i> KIRIM BROADCAST</button>
                                    </div>
                                </div>
                            `;

                            $('#'+idDIV).html(html);

                            let modul = totalAllTarget/ 20;
                            modul = Math.ceil(modul);

                            console.log('total target : '+totalAllTarget, 'step : ' + modul);
                        }
                    }
                    save2();

                    }
//                 else if(idDIV=='v-pills-home2'){

//                     arrayBaruBroadcast = [];
                    

//                     $('#'+idDIV).html('');
//                     const save2 = async () => {
//                         const posts2 = await axios.get('<?= api_url(); ?>api/v1/general/get-inpaging', {
//                             headers: {
//                                 'Authorization': 'Bearer ' + localStorage.getItem('_token')
//                             }
//                         }).catch((err) => {
//                             console.log(err.response);
//                         });
                
//                         if (posts2.status == 200) {
//                             posts2.data.data.map((mapping,i)=>{

//                                 let noortu =mapping.telpon;

//                                 let textBody = `Assalamu'alaikum warahmatullahi wabarakatuh,
// *Pusat Informasi ${mapping.instansi.nama}*

// Yth. *${mapping.nama_lengkap}*,
// Saldo terakhir Bpk/Ibu adalah : *Rp${formatRupiah(mapping.accounts.balance)}*

// _Pastikan selalu memantau saldo kartu agar selalu aman dan nyaman dalam bertransaksi._

// Terimakasih.


// _Kode pesan : #${createRandom()}_`
// ;

//                                 if(noortu.length>8 && noortu!='0'){
//                                     var strFirstThree = noortu.substring(0,3);
//                                     if(strFirstThree=='628' ){
//                                         arrayBaruBroadcast.push({
//                                             'to' : noortu,
//                                             'text' : textBody
//                                         })   
//                                     }
//                                 }
//                             });
//                             console.log(arrayBaruBroadcast);


//                             html += `
//                                 <div class="row jumbotron">
//                                     <div class="col-12">
//                                         <div class="alert alert-success" role="alert">
//                                             Sistem akan mengirim broadcast kepada <b>${posts2.data.data.length}</b> nomor guru/staf. Klik tombol <b>KIRIM BROADCAST</b> dibawah ini untuk mengeksekusi pengiriman secara massal sekarang juga.
//                                         </div>
//                                         <p>Contoh pesan :</p>
//                                         <div class="alert alert-secondary" role="alert" style="font-size:12px;">
//                                             <font>Yth.[NAMA USER],<br/>
// Saldo terakhir Bpk/Ibu adalah : [NOMINAL SALDO]*<br/>
// <br/>
// Pastikan selalu memantau saldo kartu agar selalu aman dan nyaman dalam bertransaksi.<br/>
// <br/>
// Terimakasih.</font>
//                                         </div>
//                                     </div>
//                                     <div class="col-12 mt-1">
//                                         <button type="button" onclick="confirmSend();" class="btn btn-primary"><i class="bx bx-send"></i> KIRIM BROADCAST</button>
//                                     </div>
//                                 </div>
//                             `;

//                             $('#'+idDIV).html(html);
//                         }
//                     }
//                     save2();

                
//                 }
                else if(idDIV=='v-pills-home3'){
                    
                    $('#'+idDIV).html('');

                    arrayBaruBroadcast = [];
                    

                    const save2 = async () => {
                        const posts2 = await axios.get('<?= api_url(); ?>api/v1/siswa/get-inpaging', {
                            headers: {
                                'Authorization': 'Bearer ' + localStorage.getItem('_token')
                            }
                        }).catch((err) => {
                            console.log(err.response);
                        });
                
                        if (posts2.status == 200) {

                            
                            let countData = 1;
                          
                            modeSett = 'sendSiswa';

                            posts2.data.data.map((mapping,i)=>{
                                let noortu = mapping.telp_ortu??'';
                                if(noortu.length>8 && noortu!='0'){
                                    var strFirstThree = noortu.substring(0,3);
                                    if(strFirstThree=='628' ){
                                        countData++;
                                    }
                                }
                            });

                            totalAllTarget = countData;
                            

                            html += `
                                <div class="row jumbotron">
                                    <div class="col-12">
                                        <div class="alert alert-success" role="alert">
                                            Sistem akan mengirim broadcast kepada <b>${countData}</b> nomor orangtua pelajar. Klik tombol <b>KIRIM BROADCAST</b> dibawah ini untuk mengeksekusi pengiriman secara massal sekarang juga.
                                        </div>
                                        <p>Ketik isi pesan:</p>
                                        <textarea class="form-control mb-3 putPesanHereSiswa" rows="5" placeholder="Assalamu'alaikum warahmatullahi wabarakatuh,"></textarea>
                                    </div>
                                    <div class="col-12 mt-1">
                                        <button type="button" onclick="confirmSend();" class="btn btn-primary"><i class="bx bx-send"></i> KIRIM BROADCAST</button>
                                    </div>
                                </div>
                            `;

                            $('#'+idDIV).html(html);

                            let modul = totalAllTarget/ 20;

                            modul = Math.ceil(modul);

                            console.log('total target : '+totalAllTarget, 'step : ' + modul);
                            
                        }
                    }
                    save2();
                
                }
                
                else if(idDIV=='v-pills-home100'){
                    
                    $('#'+idDIV).html('');

                    arrayBaruBroadcast = [];
                    

                    const save2 = async () => {
                        const posts2 = await axios.get('<?= api_url(); ?>api/v1/siswa/get-inpaging', {
                            headers: {
                                'Authorization': 'Bearer ' + localStorage.getItem('_token')
                            }
                        }).catch((err) => {
                            console.log(err.response);
                        });
                
                        if (posts2.status == 200) {

                            
                            let countData = 1;
                          
                            modeSett = 'sendSiswaPlainTemplate';

                            posts2.data.data.map((mapping,i)=>{
                                let noortu = mapping.telp_ortu??'';
                                if (noortu.startsWith('628')) {
                                // if (noortu.startsWith('628') && noortu=='628526523633') {
                                    countData++;
                                }
                            });

                            totalAllTarget = countData;
                            

                            html += `
                                <div class="row jumbotron">
                                    <div class="col-12">
                                        <div class="alert alert-success" role="alert">
                                            Sistem akan mengirim broadcast kepada <b>${countData}</b> nomor orangtua pelajar. Klik tombol <b>KIRIM BROADCAST</b> dibawah ini untuk mengeksekusi pengiriman secara massal sekarang juga.
                                        </div>
                                        <p>Ketik isi pesan:</p>
                                        <textarea class="form-control mb-3 putPesanHereSiswaPlain" rows="10" placeholder="Assalamu'alaikum warahmatullahi wabarakatuh,"></textarea>
                                    </div>
                                    <div class="col-12 mt-1">
                                        <button type="button" onclick="confirmSend();" class="btn btn-primary"><i class="bx bx-send"></i> KIRIM BROADCAST</button>
                                    </div>
                                </div>
                            `;

                            $('#'+idDIV).html(html);

                            let modul = totalAllTarget/ 20;

                            modul = Math.ceil(modul);

                            console.log('total target : '+totalAllTarget, 'step : ' + modul);
                            
                        }
                    }
                    save2();
                
                }
                else if(idDIV=='v-pills-home4'){
                    
                    $('#'+idDIV).html('');

                    arrayBaruBroadcast = [];
                    

                    const save2 = async () => {
                        const posts2 = await axios.get('<?= api_url(); ?>api/v1/general/get-inpaging', {
                            headers: {
                                'Authorization': 'Bearer ' + localStorage.getItem('_token')
                            }
                        }).catch((err) => {
                            console.log(err.response);
                        });
                
                        if (posts2.status == 200) {

                            
                            let countData = 1;
                          
                            modeSett = 'sendGeneral';

                            posts2.data.data.map((mapping,i)=>{
                                let noortu = mapping.telpon??'';
                                
                                
                                // if(noortu=='6281320996169' || noortu=='6285259875754'){

                                    if(noortu.length>8 && noortu!='0'){
                                        var strFirstThree = noortu.substring(0,3);
                                        if(strFirstThree=='628' ){
                                            countData++;
                                        }
                                    }

                                // }

                            });

                            totalAllTarget = countData;
                            

                            html += `
                                <div class="row jumbotron">
                                    <div class="col-12">
                                        <div class="alert alert-success" role="alert">
                                            Sistem akan mengirim broadcast kepada <b>${countData}</b> nomor  general. Klik tombol <b>KIRIM BROADCAST</b> dibawah ini untuk mengeksekusi pengiriman secara massal sekarang juga.
                                        </div>
                                        <p>Ketik isi pesan:</p>
                                        <textarea class="form-control mb-3 putPesanHereGeneral" rows="5" placeholder="Assalamu'alaikum warahmatullahi wabarakatuh,"></textarea>
                                    </div>
                                    <div class="col-12 mt-1">
                                        <button type="button" onclick="confirmSend();" class="btn btn-primary"><i class="bx bx-send"></i> KIRIM BROADCAST</button>
                                    </div>
                                </div>
                            `;

                            $('#'+idDIV).html(html);

                            let modul = totalAllTarget/ 20;

                            modul = Math.ceil(modul);

                            console.log('total target : '+totalAllTarget, 'step : ' + modul);
                            
                        }
                    }
                    save2();
                
                }

                
            }

            function renderPengumumanSiswa(){
                arrayBaruBroadcast = [];
                const save2 = async () => {
                        const posts2 = await axios.get('<?= api_url(); ?>api/v1/siswa/get-inpaging', {
                            headers: {
                                'Authorization': 'Bearer ' + localStorage.getItem('_token')
                            }
                        }).catch((err) => {
                            console.log(err.response);
                        });
                
                        if (posts2.status == 200) {

                            let num = 0;
                            posts2.data.data.map((mapping,i)=>{
                            if(mapping.telp_ortu!=null){
                                let noortu = mapping.telp_ortu;

                                

                                let isiPesan = `Assalamu'alaikum warahmatullahi wabarakatuh,
*Pusat Informasi ${mapping.instansi.nama}*

`;
                            isiPesan += $('.putPesanHereSiswa').val();
                            isiPesan += `


_Pesan ini tidak perlu untuk dibalas kembali, dan abaikan jika sudah menerima pesan ini sebelumnya._
_Kode pesan : #${createRandom()}_
                            `;
                                
                                if(noortu.length>8 && noortu!='0'){
                                    var strFirstThree = noortu.substring(0,3);
                                    if(strFirstThree=='628' ){
                                        arrayBaruBroadcast.push({
                                            'to' : mapping.telp_ortu,
                                            'text' : isiPesan
                                        })   ;
                                    }
                                }
                                num++;
                            }
                            });
                            console.log(arrayBaruBroadcast);

                            $('#modalSetPIN').modal('toggle');

                        }
                    }
                    save2();
            }
            
            function renderPengumumanGeneral(){
                arrayBaruBroadcast = [];
                const save2 = async () => {
                        const posts2 = await axios.get('<?= api_url(); ?>api/v1/general/get-inpaging', {
                            headers: {
                                'Authorization': 'Bearer ' + localStorage.getItem('_token')
                            }
                        }).catch((err) => {
                            console.log(err.response);
                        });
                
                        let nmbbb = 0;
                        if (posts2.status == 200) {

                            let num = 0;
                            posts2.data.data.map((mapping,i)=>{
                            if(mapping.telpon!=null){
                                let noortu = mapping.telpon;

                                
                                let isiPesan = `Assalamu'alaikum warahmatullahi wabarakatuh,
*Pusat Informasi ${mapping.instansi.nama}*

`;

                            isiPesan += $('.putPesanHereGeneral').val();
                            isiPesan += `


_Pesan ini tidak perlu untuk dibalas kembali, dan abaikan jika sudah menerima pesan ini sebelumnya._
_Kode pesan : #${createRandom()}_
                            `;
                                
                                if(noortu.length>8 && noortu!='0'){
                                    var strFirstThree = noortu.substring(0,3);
                                    if(strFirstThree=='628' ){
                                        arrayBaruBroadcast.push({
                                            'to' : mapping.telpon,
                                            'text' : isiPesan
                                        })   ;
                                    }
                                }
                                num++;
                            }
                            });
                            console.log(arrayBaruBroadcast);

                            $('#modalSetPIN').modal('toggle');
                        }
                    }
                    save2();
            }

            function confirmSend(){

                console.log(modeSett);
                $('#modalSetPIN').modal('toggle');
            }

            let renderTextMessage = '';

            function sendMessageNow() {
                // showLoading();

                let pass = $('#passGo').val();

                if (pass != 'pesantrenhebat!') {
                    Toastify({
                        text: 'Kode akses tidak benar!',
                        duration: 3000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        className: "errorMessage",
                    }).showToast();
                    return false;
                }

                $('#btnSubmitPesanKirim').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Memproses...');
                $('#btnSubmitPesanKirim').attr('disabled', 'disabled');
                $('#btnSubmitPesanKirim').css('cursor', 'not-allowed');

                // Show the progress modal
                $('#progressModal').modal('toggle');

                let rentang = 20; // 20 items per batch
                let modul = Math.ceil(totalAllTarget / rentang); // Calculate total modules
                let totalProgress = modul; // Total steps (example)
                let currentProgress = 0; // Track progress

                // for (let mx = 0; mx < 5; mx++) {
                for (let mx = 0; mx < (rentang+1); mx++) {
                    (function (mx) {
                        window.setTimeout(function () {
                            let minnn = 0;
                            let maxxx = 0;

                            if (mx == 0) {
                                minnn = mx * rentang;
                                maxxx = minnn + rentang;
                            } else {
                                minnn = mx * rentang + 1;
                                maxxx = minnn - 1 + rentang;
                            }

                            console.log("range : ", minnn, maxxx);

                            let pesan = modeSett === 'sendGeneral'
                            ? $('.putPesanHereGeneral').val()
                            : modeSett === 'sendSiswaPlainTemplate'
                                ? $('.putPesanHereSiswaPlain').val()
                                : $('.putPesanHereSiswa').val();
                                

                            var form_data = new FormData();
                            form_data.append('end', minnn);
                            form_data.append('start', maxxx);
                            form_data.append('endPoint', modeSett);
                            form_data.append('pesan', pesan);

                            jQuery.ajax({
                                type: "POST",
                                url: "<?php echo base_url(); ?>" + "WebhookOncard/sendBroadcastBerkalaKustom/" + kodeInstansiX,
                                cache: false,
                                contentType: false,
                                processData: false,
                                data: form_data,
                                dataType: 'json',
                                success: function (e) {
                                    if (e.status === "true") {
                                        console.log(e.data);
                                    } else {
                                        console.error('Error sending message');
                                        window.location.reload();
                                    }
                                }
                            });

                            console.log("step now :",mx, parseInt(modul - 1));
                            // if (mx == parseInt(modul - 1)) {
                            if (mx == parseInt(modul)) {
                                $('#btnSubmitPesanKirim').html('KIRIM PESAN');
                                $('#btnSubmitPesanKirim').attr('disabled', false);
                                $('#btnSubmitPesanKirim').css('cursor', 'pointer');
                                $('#modalSetPIN').modal('toggle');

                                // hideLoading();

                                currentProgress += 1;
                                const progressPercentage = Math.ceil((currentProgress / totalProgress) * 100);
                                $('#progressBar').css('width', progressPercentage + '%').attr('aria-valuenow', progressPercentage);
                                $('#progressMessage').text(`Processing... ${progressPercentage}%`);

                                Swal.fire({
                                    position: 'center',
                                    icon: 'success',
                                    title: 'Tuntas Kirim Pesan',
                                    text: 'Pesan telah terkirim ke seluruh nomor!',
                                    showConfirmButton: true,
                                });

                                // Close the progress modal
                                $('#progressModal').modal('toggle');
                            }else {
                                currentProgress += 1;
                                const progressPercentage = Math.ceil((currentProgress / totalProgress) * 100);
                                $('#progressBar').css('width', progressPercentage + '%').attr('aria-valuenow', progressPercentage);
                                $('#progressMessage').text(`Processing... ${progressPercentage}%`);
                            }
                        }, mx * 120000); // Set delay (0.5 minute)
                    })(mx);
                }

                return false;
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

            function chunkArrayInGroups(arr, size) {
            var myArray = [];
            for(var i = 0; i < arr.length; i += size) {
                myArray.push(arr.slice(i, i+size));
            }
            return myArray;
            }

            function renderTextMessageShow() {
                localStorage.setItem("struk", renderTextMessage);
                window.open("<?=base_url();?>CPanel_Admin/PrintStruk", '_blank', 'location=yes,height=570,width=220,scrollbars=yes,status=yes');
            }


        </script>