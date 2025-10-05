<link href="<?=base_url();?>assets_oncard/plugins/Drag-And-Drop/dist/imageuploadify.min.css" rel="stylesheet" />
<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Produk</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
                                <li class="breadcrumb-item"><a href="<?=base_url().$function;?>/NominalList">Daftar Kartu Nominal</a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Form <font class="modeText">penambahan</font> Kartu Nominal</li>
							</ol>
						</nav>
					</div>
					
				</div>
				<!--end breadcrumb-->
			  
				<div class="card">
				  <div class="card-body p-4">
					  <h5 class="card-title" style="text-transform:capitalize;">Formulir <font class="modeText">Penambahan</font> Kartu Nominal</h5>
					  <hr/>
                       <div class="form-body mt-4">
					<form id="main">
						<div class="row">
						   <div class="col-lg-12">
								<div class="border border-3 p-4 rounded">
									<div class="mb-3">
										<label for="nominal" class="form-label">NOMINAL</label>
										<input type="text" oninput="setVal2(this.value);" class="form-control" id="nominal" placeholder="Ketik nominal">
									</div>
									<div class="mb-3">
										<label for="deskripsi" class="form-label">ID KARTU</label>
                                        <small><i>Cara pengisian :</i>
                                            <ol>
                                                <li>Klik pada inputan dibawah ini dahulu.</li>
                                                <li>Tap kartu ke alat yang tersedia.</li>
                                                <li>Lalu simpan.</li>
                                            </ol>
                                        </small>
										<input type="number" class="form-control" id="kodekartu">
									</div>

								</div>

                                
								
							</div>

                            <div class="col-12 mt-3">
                                <div class="d-grid">
                                    <button type="button" id="btnSave" class="btn btn-primary" onclick="addData();"><i class="bx bx-save"></i> Simpan</button>
                                </div>
                            </div>


						   </div>
							
						  </div>
					   </div><!--end row-->
					</form>
					</div>
				  </div>
			  </div>


			</div>
		</div>

        <script src="<?=base_url();?>assets_oncard/plugins/Drag-And-Drop/dist/imageuploadify.min.js"></script>
        <script type="text/javascript">
			
			let pageMode = '<?=$pageMode;?>';
			$('.modeText').text(pageMode);

            $(document).ready(function () {
                $('#image-uploadify').imageuploadify();
				let rands = "kantin-"+randstr(5);
				$('#username').val(rands);

				if(pageMode!='add'){
					callDataToUpdate(pageMode);
					$('.modeText').text('update');
				}
				
            });

			function addData() {

				$('#btnSave').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Memproses...');
				$('#btnSave').attr('disabled', 'disabled');
                $('#btnSave').css('cursor', 'not-allowed');
				
				var nominal = $("#nominal").val();
                nominal = nominal.replace(/\D/g, "");
				
                var kodekartu = $("#kodekartu").val();
				
				var form_data = new FormData();
				form_data.append('values', nominal);
				form_data.append('card_id', kodekartu);
				form_data.append('type_card', 'priece-card');
				form_data.append('status_id', '1');
			
				const save = async (form_data) => {
					const posts = await axios.post('<?= api_url(); ?>api/v1/card-reader', form_data, {
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
						
						$('#btnSave').html('<i class="bx bx-save"></i> Simpan');
						$('#btnSave').attr('disabled', false);
						$('#btnSave').css('cursor', 'pointer');
					});
					if (posts.status == 201 || posts.status == 200) {

						if (posts.data.status == true) {
							if(pageMode!='add'){
								callDataToUpdate(pageMode);
								Toastify({
								text: 'Nominal kartu berhasil diupdate!',
								duration: 3000,
								close: true,
								gravity: "top",
								position: "right",
								className: "successMessage",

							}).showToast();
							}else {
								Toastify({
								text: 'Nominal kartu berhasil ditambahkan',
								duration: 3000,
								close: true,
								gravity: "top",
								position: "right",
								className: "successMessage",

							}).showToast();
							}
							

							$('#main')[0].reset();

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

						$('#btnSave').html('<i class="bx bx-save"></i> Simpan');
						$('#btnSave').attr('disabled', false);
						$('#btnSave').css('cursor', 'pointer');

					}
					else {
						// posts.data.error.map((mapping, i) => {
						// 	Toastify({
						// 		text: 'Oops!',
						// 		duration: 3000,
						// 		close: true,
						// 		gravity: "bottom",
						// 		position: "left",
						// 		className: "errorMessage",

						// 	}).showToast();
						// });
						$('#btnSave').html('<i class="bx bx-save"></i> Simpan');
						$('#btnSave').attr('disabled', false);
						$('#btnSave').css('cursor', 'pointer');
					}

					//re-create rand string format
					let rands = "kantin-"+randstr(5);
					$('#username').val(rands);
				}

				save(form_data);

			}

            let timer;
			const input = document.querySelector('#kodekartu');
			input.addEventListener('keyup', function (e) {
				clearTimeout(timer);
				timer = setTimeout(() => {
					let valx = $('#kodekartu').val();

					if(valx.length>10){
						Toastify({
							text: 'Scan ulang kartu tersebut!',
							duration: 3000,
							close: true,
							gravity: "top",
							position: "right",
							className: "errorMessage",

						}).showToast();
						$('#kodekartu').val('');
					}else {
                        if(valx.length!=0){
                            Toastify({
                                text: 'Kartu berhasil di scan!',
                                duration: 3000,
                                close: true,
                                gravity: "top",
                                position: "right",
                                className: "successMessage",

                            }).showToast();
                        }else {
                            Toastify({
                                text: 'Scan ulang kartu tersebut!',
                                duration: 3000,
                                close: true,
                                gravity: "top",
                                position: "right",
                                className: "errorMessage",

                            }).showToast();
                            $('#kodekartu').val('');
                        }
						
					}
				}, 1500);
			});

			function callDataToUpdate(str){
				
				const save = async (str) => {
					const posts = await axios.get('<?= api_url(); ?>api/v1/produk/id/' + str, {
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

						console.log(posts.data);

						$("#namaProduk").val(posts.data.data.nama_produk);
						$("#deskripsi").val(posts.data.data.deskripsi);
						$("#jenis").val(posts.data.data.jenis_produk);
						$("#kategori").val(posts.data.data.kategori_produk);
						$("#harga").val(posts.data.data.harga);
						$("#satuan").val(posts.data.data.satuan);
						$("#stok").val(posts.data.data.stok);
						
					} else {

					}
				}

				save(str);
			}

			function randstr(length) {
				let result = '';
				const characters = 'ABC0123456789';
				const charactersLength = characters.length;
				let counter = 0;
				while (counter < length) {
				result += characters.charAt(Math.floor(Math.random() * charactersLength));
				counter += 1;
				}
				return result;
			}

            function setVal3(str){
                $('#harga').val(formatRupiah(str));
            }
            function setVal2(str){
                $('#nominal').val(formatRupiah(str));
            }

        </script>