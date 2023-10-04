<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div class="page-wrapper">
			<div class="page-content">
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Pesan Broadcast</div>
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
					<div class="col-12">
						<div class="card radius-10 w-100" >
							
                                <div class="card-body">
                                    <div class="d-flex align-items-start">
                                        <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                            <button class="nav-link" style="text-align:left;" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true" onclick="setContent('v-pills-home');">Info Saldo Santri</button>
                                            <button class="nav-link" style="text-align:left;" id="v-pills-home-tab2" data-bs-toggle="pill" data-bs-target="#v-pills-home2" type="button" role="tab" aria-controls="v-pills-home2" aria-selected="true" onclick="setContent('v-pills-home2');">Info Saldo Guru/Staf</button>
                                            <button class="nav-link" style="text-align:left;" id="v-pills-home-tab3" data-bs-toggle="pill" data-bs-target="#v-pills-home3" type="button" role="tab" aria-controls="v-pills-home3" aria-selected="true" onclick="setContent('v-pills-home3');">Pengumuman Khusus Santri</button>
                                            <button class="nav-link" style="text-align:left;" id="v-pills-home-tab3" data-bs-toggle="pill" data-bs-target="#v-pills-home4" type="button" role="tab" aria-controls="v-pills-home4" aria-selected="true" onclick="setContent('v-pills-home4');">Pengumuman Khusus Guru/Staf</button>
                                            
                                        </div>
                                        <div class="tab-content" id="v-pills-tabContent">
                                            <div class="tab-pane fade " id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">...</div>
                                            <div class="tab-pane fade " id="v-pills-home2" role="tabpanel" aria-labelledby="v-pills-home-tab2">...</div>
                                            <div class="tab-pane fade " id="v-pills-home3" role="tabpanel" aria-labelledby="v-pills-home-tab3">...</div>
                                            <div class="tab-pane fade " id="v-pills-home4" role="tabpanel" aria-labelledby="v-pills-home-tab4">...</div>
                                            
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
        
        <div class="modal fade" id="modalSetPIN" tabindex="-1" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Konfirmasi</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						Anda yakin akan mengirimkan pesan ini?
					</div>
					<div class="modal-footer text-center">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
						<button type="button" onclick="sendMessageNow();" id="btnSubmitPesanKirim" class="btn btn-outline-primary">Kirim Pesan</button>
					</div>
				</div>
			</div>
		</div>

        <script type="text/javascript">
            let sessionSet = '';
            let endPointGetDataSiswa = '<?= api_url(); ?>api/v1/siswa';
			let endPointGetDataSiswaSearch = '<?= api_url(); ?>api/v1/siswa/search?q=';

            let numberSet ='';
            let namaSet = '';
			var typingTimer;
			
            $(document).ready(function () {

                getDataSession();
                
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

            function getDataSession(){

                axios.get('https://v3.gigades.id/rest/api/v1/wa/all-session').then((response) => {
                    let dataHere = '';
                    let periodeBerjalan = 0;
                    let no = 0;
                    let countWaiting = 0;
                    let countActive = 0;
                    if(response.data.length==0){
                        alert('Tidak ada session yang aktif! Scan ulang device sekarang juga!');
                    return false;
                    }
                    
                    response.data.map((mapping,i)=>{
                        console.log(mapping);
                        if(mapping=='ppsrSess'){
                            sessionSet = mapping;
                            showData(endPointGetDataSiswa);
                            return false;
                        }else {
                            // alert('Sambungkan ke nomor API ');
                        }
                    });

                }).catch((error) => {
                    console.log(error);
                })
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
                            posts2.data.data.map((mapping,i)=>{

                                if(mapping.telp_ortu!=null){
                                    let noortu =mapping.telp_ortu;

                                    let textBody = `Assalamu'alaikum warahmatullahi wabarakatuh,
*Pusat Informasi ${mapping.instansi.nama}*

Yth. Orangtua / Wali dari :
Nama : *${mapping.nama_lengkap??'-'}*,
TTL : *${moment(mapping.tanggal_lahir??'0000-00-00').format('DD MMMM YYYY')}*,
Alamat : *${mapping.alamat_lengkap??'-'}*,

Saldo terakhir anak Bpk/Ibu adalah : *Rp${formatRupiah(mapping.accounts.balance)}*

_Pastikan selalu memantau perkembangan keuangan anak Bpk/Ibu agar selalu dipakai secara tepat oleh ananda._

Terimakasih.`
;
                                    if(noortu.length>8 && noortu!='0'){
                                        var strFirstThree = noortu.substring(0,3);
                                        if(strFirstThree=='628' ){
                                            arrayBaruBroadcast.push({
                                                'to' : noortu,
                                                'text' : textBody
                                            })   
                                        }
                                    }
                                }

                            });
                            
                            html += `
                                <div class="row jumbotron">
                                    <div class="col-12">
                                        <div class="alert alert-success" role="alert">
                                            Sistem akan mengirim broadcast kepada <b>${posts2.data.data.length}</b> nomor orangtua santri. Klik tombol <b>KIRIM BROADCAST</b> dibawah ini untuk mengeksekusi pengiriman secara massal sekarang juga.
                                        </div>
                                        <p>Contoh pesan :</p>
                                        <div class="alert alert-secondary" role="alert" style="font-size:12px;">
                                            <font>Yth. Orangtua / Wali<br/>
[DETAIL SANTRI],<br/>
Saldo terakhir anak Bpk/Ibu adalah : [NOMINAL SALDO]*<br/>
<br/>
Pastikan selalu memantau perkembangan keuangan anak Bpk/Ibu agar selalu dipakai secara tepat oleh ananda.<br/>
<br/>
Terimakasih.</font>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-1">
                                        <button type="button" onclick="confirmSend();" class="btn btn-primary"><i class="bx bx-send"></i> KIRIM BROADCAST</button>
                                    </div>
                                </div>
                            `;

                            $('#'+idDIV).html(html);
                        }
                    }
                    save2();

                }else if(idDIV=='v-pills-home2'){

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
                            posts2.data.data.map((mapping,i)=>{

                                let noortu =mapping.telpon;

                                let textBody = `Assalamu'alaikum warahmatullahi wabarakatuh,
*Pusat Informasi ${mapping.instansi.nama}*

Yth. *${mapping.nama_lengkap}*,
Saldo terakhir Bpk/Ibu adalah : *Rp${formatRupiah(mapping.accounts.balance)}*

_Pastikan selalu memantau saldo kartu agar selalu aman dan nyaman dalam bertransaksi._

Terimakasih.


_Kode pesan : #${createRandom()}_`
;

                                if(noortu.length>8 && noortu!='0'){
                                    var strFirstThree = noortu.substring(0,3);
                                    if(strFirstThree=='628' ){
                                        arrayBaruBroadcast.push({
                                            'to' : noortu,
                                            'text' : textBody
                                        })   
                                    }
                                }
                            });
                            console.log(arrayBaruBroadcast);


                            html += `
                                <div class="row jumbotron">
                                    <div class="col-12">
                                        <div class="alert alert-success" role="alert">
                                            Sistem akan mengirim broadcast kepada <b>${posts2.data.data.length}</b> nomor guru/staf. Klik tombol <b>KIRIM BROADCAST</b> dibawah ini untuk mengeksekusi pengiriman secara massal sekarang juga.
                                        </div>
                                        <p>Contoh pesan :</p>
                                        <div class="alert alert-secondary" role="alert" style="font-size:12px;">
                                            <font>Yth.[NAMA USER],<br/>
Saldo terakhir Bpk/Ibu adalah : [NOMINAL SALDO]*<br/>
<br/>
Pastikan selalu memantau saldo kartu agar selalu aman dan nyaman dalam bertransaksi.<br/>
<br/>
Terimakasih.</font>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-1">
                                        <button type="button" onclick="confirmSend();" class="btn btn-primary"><i class="bx bx-send"></i> KIRIM BROADCAST</button>
                                    </div>
                                </div>
                            `;

                            $('#'+idDIV).html(html);
                        }
                    }
                    save2();

                
                }else if(idDIV=='v-pills-home3'){
                    
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
                          
                            html += `
                                <div class="row jumbotron">
                                    <div class="col-12">
                                        <div class="alert alert-success" role="alert">
                                            Sistem akan mengirim broadcast kepada <b>${posts2.data.data.length}</b> nomor orangtua santri. Klik tombol <b>KIRIM BROADCAST</b> dibawah ini untuk mengeksekusi pengiriman secara massal sekarang juga.
                                        </div>
                                        <p>Ketik isi pesan:</p>
                                        <textarea class="form-control mb-3 putPesanHereSiswa" rows="5" placeholder="Assalamu'alaikum warahmatullahi wabarakatuh,"></textarea>
                                    </div>
                                    <div class="col-12 mt-1">
                                        <button type="button" onclick="renderPengumumanSiswa();" class="btn btn-primary"><i class="bx bx-send"></i> KIRIM BROADCAST</button>
                                    </div>
                                </div>
                            `;

                            $('#'+idDIV).html(html);
                        }
                    }
                    save2();
                
                }else if(idDIV=='v-pills-home4'){
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
                            
                            html += `
                                <div class="row jumbotron">
                                    <div class="col-12">
                                        <div class="alert alert-success" role="alert">
                                            Sistem akan mengirim broadcast kepada <b>${posts2.data.data.length}</b> nomor guru/staf. Klik tombol <b>KIRIM BROADCAST</b> dibawah ini untuk mengeksekusi pengiriman secara massal sekarang juga.
                                        </div>
                                        <p>Ketik isi pesan:</p>
                                        <textarea class="form-control mb-3 putPesanHereGeneral" rows="5" placeholder="Assalamu'alaikum warahmatullahi wabarakatuh,"></textarea>
                                    </div>
                                    <div class="col-12 mt-1">
                                        <button type="button" onclick="renderPengumumanGeneral();" class="btn btn-primary"><i class="bx bx-send"></i> KIRIM BROADCAST</button>
                                    </div>
                                </div>
                            `;

                            $('#'+idDIV).html(html);
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
                $('#modalSetPIN').modal('toggle');
            }

            function sendMessageNow(){

                $('#btnSubmitPesanKirim').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Memproses...');
				$('#btnSubmitPesanKirim').attr('disabled', 'disabled');
                $('#btnSubmitPesanKirim').css('cursor', 'not-allowed');


                let mmmmmmm = chunkArrayInGroups(arrayBaruBroadcast,10);

                console.log(mmmmmmm);
                
                var interval = 100000;
                mmmmmmm.forEach(function (el, index) {
                setTimeout(function () {
                    
                    
                    let arrayLengkap = {"session":sessionSet,"data":el,"delay":10000};
                    
                    axios.post("https://v3.gigades.id/rest/api/v1/wa/broadcast", arrayLengkap)
                    .then((res) => {
                        if (res.data.status === true) {
                            arrayBaruBroadcast = [];

                            Toastify({
                                text: (index+1)+' dari '+ mmmmmmm.length+" group pesan telah dikirim...",
                                duration: 3000,
                                close: true,
                                gravity: "top",
                                position: "right",
                                className: "successMessage",

                            }).showToast();

                        }

                    })
                    .catch((err) => {
                    });
                    
                    if(index==mmmmmmm.length-1){

                        $('#btnSubmitPesanKirim').html('KIRIM PESAN');
                        $('#btnSubmitPesanKirim').attr('disabled', false);
                        $('#btnSubmitPesanKirim').css('cursor', 'pointer');

                        $('#modalSetPIN').modal('toggle');
                        console.log('close');
                        console.log(mmmmmmm.length);

                        location.reload();
                    }
                }, index * interval);
                });

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
        </script>