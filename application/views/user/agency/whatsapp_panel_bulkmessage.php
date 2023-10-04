<div class="page-wrapper">
			<div class="page-content">
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Pesan Personal</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Personal</li>
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
                                                        <th>#NIS</th>
                                                        <th>Nama siswa</th>
                                                        <th>Nomor Orangtua (WA)</th>
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
                            // alert('Sambungkan ke nomor API');
                        }
                    });

                }).catch((error) => {
                    console.log(error);
                })
                }
        </script>