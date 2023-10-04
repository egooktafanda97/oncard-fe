<div class="page-wrapper">
			<div class="page-content">
				<div class="row">
					<div class="col-lg-5">
						<div class="card radius-10 w-100">
							<div class="row" >
								<div class="col-12 puthere">
                                <img class="mb-3" src="https://cdn.pixabay.com/photo/2013/03/16/07/00/qr-code-94197_1280.jpg" id="putImageSessionHere" style="width:100%; height:100%!important; border-radius:5px; object-fit:contain; object-position:center; display:block;"/>
                                <p style="margin:0;">Session akan otomatis ter-generate selang waktu 2 menit.</p>
            
                                </div>
							</div>
						</div>
					</div>
				</div>
				
				
			</div>
		</div>

        <div class="modal fade" id="modalSetPIN" tabindex="-1" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Autentikasi Hak Akses</h5>
					</div>
					<div class="modal-body py-4">
						<p style="padding:0; margin:0;">Masukkan PIN</p>
                        <input type="password" class="form-control" value="PpsrHebat" id="pinSet" placeholder=". . . . ."/>
					</div>
					<div class="modal-footer text-center">
                        <button type="button" onclick="window.location.href='<?=base_url();?>CPanel_Admin/Wapage';"class="btn btn-outline-dark">Kembali ke dashboard</button>
						<button type="button" onclick="okelogin();" id="btnSubmitPesanKirim" class="btn btn-outline-primary">Masuk</button>
						
					</div>
				</div>
			</div>
		</div>

        <script type="text/javascript">
            function runFirstDialog(){
                $('#modalSetPIN').modal('toggle');
            }
            function okelogin(){
                let val = $('#pinSet').val();
                if(val=='PpsrHebat'){
                    getDataSession();
                    $('#modalSetPIN').modal('toggle');
                }else {
                    Toastify({
                        text: 'PIN Autentikasi Salah!',
                        duration: 3000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        className: "errorMessage",

                    }).showToast();

                    $('#pinSet').val('');
                }
            }
            $(document).ready(function () {
                // getDataSession();
                runFirstDialog();
            });

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
                        // if(mapping=='ppsrSess'){
                            $('.puthere').html(`
                                <p class="p-4">Session masih digunakan. Untuk saat ini layanan Whatsapp masih <strong>AKTIF</strong>.<br/>Anda yakin akan memperbaharui session? Klik tombol berikut untuk membuat session baru<br/>
                                <button class="btn btn-sm btn-primary" onclick="createSessionWA();">Create New Session</butto>
                            `);
                            return false;
                        if(mapping=='ppsrSess'){
                            $('.puthere').html(`
                                <p class="p-4">Session masih digunakan. Untuk saat ini layanan Whatsapp masih <strong>AKTIF</strong>.<br/>Anda yakin akan memperbaharui session? Klik tombol berikut untuk membuat session baru<br/>
                                <button class="btn btn-sm btn-primary" onclick="createSessionWA();">Create New Session</butto>
                            `);
                            return false;
                        }else {
                            // createSessionWA();
                            return false;
                        }
                    });

                }).catch((error) => {
                    console.log(error);
                })
            }
            function createSessionWA(){
                $('.puthere').html(`<img class="mb-3" src="#/" id="putImageSessionHere" style="width:100%; height:100%!important; border-radius:5px; object-fit:contain; object-position:center; display:block;"/>
                                <p style="margin:0;">Session akan otomatis ter-generate selang waktu 2 menit.</p>`);
                let code = "ppsrSess";
                axios.get("https://v3.gigades.id/rest/api/v1/wa/new-session/"+code)
                .then((res) => {
                    if (res.data.status === true) {
                        $('#putImageSessionHere').attr('src',res.data.data.qr);
                        // getDataSession();
                    }else {
                        alert('Session masih ada yang menggunakannya! Harap copot session dari Whatsapp tersebut dahulu!');
                    }
                })
                .catch((err) => {
                    alert('Buat session Sekarang!');
                });

            }
        </script>