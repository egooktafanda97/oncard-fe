<link href="<?=base_url();?>assets_oncard/plugins/Drag-And-Drop/dist/imageuploadify.min.css" rel="stylesheet" />
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
                                <li class="breadcrumb-item"><a href="<?=base_url().$function;?>/Merchant">Daftar Merchant</a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Form <font class="modeText">penambahan</font> merchant</li>
							</ol>
						</nav>
					</div>
					
				</div>
				<!--end breadcrumb-->
			  
				<div class="card">
				  <div class="card-body p-4">
					  <h5 class="card-title" style="text-transform:capitalize;">Formulir <font class="modeText">Penambahan</font> Merchant</h5>
					  <hr/>
                       <div class="form-body mt-4">
					<form id="main">
						<div class="row">
						   	<div class="ifUpdate1st col-lg-12 ">

						  	 	<div class="border border-3 p-4 mb-3 rounded fotodivupdate">
									<div class="row g-3">
										<div class="col-lg-5 col-md-6 col-sm-6 col-12 text-center">
											<img src="#/" id="putfotopreview" style="width:140px; height:200px; border-radius:5px; border-:5px solid #f2f2f2; object-fit:cover; object-position:center;"/>
										</div>
										<div class="col-lg-7 col-md-6 col-sm-6 col-12">
											<div class="mb-3">
												<label for="inputProductDescription" class="form-label">Upload Foto Baru</label>
												<input id="file_update" class="form-control" type="file" accept="image/*,.pdf">

												<button type="button" id="btnSaveUpload" class="btn btn-primary mt-4" onclick="updateImage();"><i class="bx bx-upload"></i> Upload</button>
											</div>
											
										</div>
									</div>
								</div>

								<div class="border border-3 p-4 rounded">
									<div class="mb-3">
										<label for="namaKantin" class="form-label">Nama Merchant</label>
										<input type="email" class="form-control" id="namaKantin" placeholder="Ketik nama merchant">
									</div>
									<div class="mb-3">
										<label for="alamat" class="form-label">Alamat</label>
										<textarea class="form-control" id="alamat" rows="2" placeholder="Masukkan alamat merchant"></textarea>
									</div>
									
								  <div class="col-12">
								 	 <label for="waKantin" class="form-label">Nomor Telefon (WA)<br/><small><i>Nomor harus dimulai dari 62.</i></small></label>
									 <input type="text" class="form-control" id="waKantin" placeholder="cth : 6281220222922">
								  </div>
								</div>
							</div>

							<div class="col-lg-12 mt-3 ifUpdate">
							<div class="border border-3 p-4 rounded">
                              <div class="row g-3">
								  <div class="col-md-6">
									<label for="username" class="form-label">Username<br/><small><i>Bisa diubah</i></small></label>
									<input type="text" class="form-control" id="username" placeholder="Ketik username">
								  </div>
								  <div class="col-md-6">
									<label for="password" class="form-label">Password<br/><small><i>Default : 123456</i></small></label>
									<input type="password" class="form-control" value="123456" id="password" placeholder="Minimal 6 karakter">
								  </div>
								  <div class="col-md-6">
									<label for="email" class="form-label">Email</label>
									<input type="email" class="form-control" id="email" placeholder="Email kantin">
								  </div>
								  
							  </div> 
						    </div>
							
						   </div>
						   <div class="col-12 text-end py-3">
									  
                                         <button type="button" id="btnSave" class="btn btn-primary" onclick="addData();"><i class="bx bx-save"></i> Simpan</button>
									  
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
			let userIDX = '';
			if(pageMode!='add'){
				$('.ifUpdate').css('display','none');
				$('.ifUpdate1st').attr('class','ifUpdate1st col-lg-12');
			}
			if(pageMode=='add'){
				$('.fotodivupdate').css('display','none');
			}
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
				
				var namaKantin = $("#namaKantin").val();
				var alamat = $("#alamat").val();
				var username = $("#username").val();
				var password = $("#password").val();
				var email = $("#email").val();
				var waKantin = $("#waKantin").val();
				var norek = $("#norek").val();
				
				var form_data = new FormData();
				form_data.append('nama_kantin', namaKantin);
				form_data.append('alamat_lengkap', alamat);
				form_data.append('no_telepon', waKantin);
				if(pageMode=='add'){
					form_data.append('username', username);
					form_data.append('password', password);
					form_data.append('email', email);
					// form_data.append('bank_account_number', norek);
				}

				let url = '';

				if(pageMode!='add'){
					url = '<?= api_url(); ?>api/v1/kantin/update/'+pageMode;
				}else {
					url = '<?= api_url(); ?>api/v1/kantin/store';
				}
				
				const save = async (form_data) => {
					const posts = await axios.post(url, form_data, {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {

                        if(err.response.data.error=='error server'){
                            Toastify({
                                text: 'Error saat penyimpanan data!',
                                duration: 3000,
                                close: true,
                                gravity: "top",
                                position: "right",
                                className: "errorMessage",

                            }).showToast();
                        }else {
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
                        }
						
						$('#btnSave').html('<i class="bx bx-save"></i> Simpan');
						$('#btnSave').attr('disabled', false);
						$('#btnSave').css('cursor', 'pointer');
					});
					if (posts.status == 200||posts.status == 201) {

						if (posts.data.status == true) {
							if(pageMode!='add'){
								callDataToUpdate(pageMode);
								Toastify({
									text: 'Data berhasil diperbaharui!',
									duration: 3000,
									close: true,
									gravity: "top",
									position: "right",
									className: "successMessage",

								}).showToast();

							}else {
								Toastify({
									text: 'Data berhasil ditambahkan!',
									duration: 3000,
									close: true,
									gravity: "top",
									position: "right",
									className: "successMessage",

								}).showToast();

								$('#main')[0].reset();
							}
							

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
						
							Toastify({
								text: 'Oops! Terjadi kesalahan proses dalam menyimpan data',
								duration: 3000,
								close: true,
								gravity: "top",
								position: "right",
								className: "errorMessage",

							}).showToast();
						
						$('#btnSave').html('<i class="bx bx-save"></i> Simpan');
						$('#btnSave').attr('disabled', false);
						$('#btnSave').css('cursor', 'pointer');
					}

				}

				save(form_data);

			}

			function updateImage() {

				$('#btnSaveUpload').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Memproses...');
				$('#btnSaveUpload').attr('disabled', 'disabled');
				$('#btnSaveUpload').css('cursor', 'not-allowed');


				var email = $("#email").val();
				var imageuploadify = $("#file_update")[0].files[0]; 

				var form_data = new FormData();


				if(imageuploadify!='' && pageMode!='add'){
					form_data.append('foto', imageuploadify);	
				}

				let url = '';

				if(pageMode!='add'){
					url = '<?= api_url(); ?>api/v1/usr/upadate-me/'+userIDX;
				}

				const save = async (form_data) => {
					const posts = await axios.post(url, form_data, {
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
						
						$('#btnSaveUpload').html('<i class="bx bx-upload"></i> Upload');
						$('#btnSaveUpload').attr('disabled', false);
						$('#btnSaveUpload').css('cursor', 'pointer');
					});
					if (posts.status == 201||posts.status == 200) {

						if (posts.data.status == true) {

							if(pageMode!='add'){
								callDataToUpdate(pageMode);
							}

							Toastify({
								text: 'Data berhasil diperbaharui!',
								duration: 3000,
								close: true,
								gravity: "top",
								position: "right",
								className: "successMessage",

							}).showToast();

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

						$('#btnSaveUpload').html('<i class="bx bx-upload"></i> Upload');
						$('#btnSaveUpload').attr('disabled', false);
						$('#btnSaveUpload').css('cursor', 'pointer');

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
						$('#btnSaveUpload').html('<i class="bx bx-upload"></i> Upload');
						$('#btnSaveUpload').attr('disabled', false);
						$('#btnSaveUpload').css('cursor', 'pointer');
					}
				}

				save(form_data);

				}

			function callDataToUpdate(str){
				const save = async (str) => {
					const posts = await axios.get('<?= api_url(); ?>api/v1/kantin/id/' + str, {
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
						console.log(posts.data.data);
						$('#username').attr('disabled','disabled');
						
						userIDX = posts.data.data.user.id;
						$("#namaKantin").val(posts.data.data.nama_kantin);
						$("#alamat").val(posts.data.data.alamat_lengkap);
						$("#waKantin").val(posts.data.data.no_telepon);
						$("#password").prop("disabled", true);
						$("#norek").val('');

						if(posts.data.data.user.foto!='default.jpg'){
							$('#putfotopreview').attr('src','<?=base_url();?>app/assets/users/foto/'+posts.data.data.user.foto);
						}
						
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

        </script>