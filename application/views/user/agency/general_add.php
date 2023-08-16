<link href="<?=base_url();?>assets_oncard/plugins/Drag-And-Drop/dist/imageuploadify.min.css" rel="stylesheet" />
<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Tambah Pengguna General</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
                                <li class="breadcrumb-item"><a href="<?=base_url().$function;?>/General">Daftar Pengguna</a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Form <font class="modeText">penambahan</font> pengguna</li>
							</ol>
						</nav>
					</div>
					
				</div>
				<!--end breadcrumb-->
			  
				<div class="card">
				  <div class="card-body p-4">
					  <h5 class="card-title" style="text-transform:capitalize;">Formulir <font class="modeText">Penambahan</font> Pengguna</h5>
					  <hr/>
                       <div class="form-body mt-4">
					<form id="main">
						<div class="row">
						   <div class="col-lg-7">
								<div class="border border-3 p-4 mb-3 rounded">
									<div class="row mb-3">
									<div class="col-md-12">
                                            <label for="jabatan" class="form-label">Tipe Pengguna</label>
                                            <select class="form-control" id="jabatan">
                                                <option value="Guru">Guru</option>
                                                <option value="Orangtua">Orangtua</option>
                                                <option value="Barbershop">Barbershop</option>
                                                <option value="Laundry">Laundry</option>
                                                <option value="Petugas Kebersihan">Petugas Kebersihan</option>
												<option value="Petugas Kantin">Petugas Kantin</option>
                                                <option value="Pembina Asrama">Pembina Asrama</option>
                                                <option value="Lainnya">Lainnya</option>
												<option value="Staf Sekolah">Staf Sekolah</option>
												<option value="Kepala Madrasah Tsanawiyah">Kepala Madrasah Tsanawiyah</option>
												<option value="Kepala Madrasah Aliyah">Kepala Madrasah Aliyah</option>
                                            </select>
                                        </div>
									</div>

									<div class="row mb-3 bagianguru" style="display:block;">
										<!-- <div class="col-md-12">
											<div class="col-12 mt-3 mb-3 ">
												<label for="nuptk" class="form-label">Nomor Unik Pendidik dan Tenaga Kependidikan (NUPTK)</label>
												<input type="text" class="form-control" id="nuptk" placeholder="Masukkan NUPTK">
											</div>
										</div> -->
                                        <div class="col-md-12">
                                            <label for="mataPelajaran" class="form-label">Mata Pelajaran <i>(Jika jabatan yang dipilih : Guru)</i></label>
                                            <select class="form-control" id="mataPelajaran">
                                                <option value="Matematika">Matematika</option>
                                                <option value="Pendidikan Agama Islam">Pendidikan Agama Islam</option>
                                                <option value="Bahasa Indonesia">Bahasa Indonesia</option>
                                                <option value="Bahasa Inggris">Bahasa Inggris</option>
                                                <option value="Ilmu Tafsir">Ilmu Tafsir</option>
                                                <option value="Lainnya">Lainnya</option>
                                            </select>
                                        </div>
									</div>

                                	<div class="mb-3">
										<label for="namaGuru" class="form-label">Nama Pengguna</label>
										<input type="text" class="form-control" id="namaGuru" placeholder="Ketik nama lengkap pengguna">
									</div>

                                    

									<div class="mb-3">
										<label for="alamatGuru" class="form-label">Alamat</label>
										<textarea class="form-control" id="alamatGuru" rows="2"></textarea>
									</div>
                                    <div class="row mb-3">
                                        <div class="col-6">
                                        <label for="tempatLahir" class="form-label">Tempat lahir</label>
                                        <input type="text" class="form-control" id="tempatLahir" placeholder="Alamat tempat lahir">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="tanggalLahir" class="form-label">Tanggal Lahir</label>
                                            <input type="date" class="form-control" id="tanggalLahir" placeholder="Email agensi">
                                        </div>
									</div>

									<div class="mb-3">
										<label for="noTelp" class="form-label">Nomor Whatsapp <i>(Harus dimulai dengan 62)</i></label>
										<input type="text" class="form-control" id="noTelp" placeholder="Ketik nama lengkap pengguna">
									</div>
                                    
								</div>
							</div>

							<div class="col-lg-5">
								<div class="border border-3 p-4 mb-3 rounded fotodivupdate">
									<div class="row g-3">
										<div class="col-lg-5 col-md-6 col-sm-6 col-12 text-center">
											<img src="#/" id="putfotopreview" style="width:80px; height:110px; border-radius:5px; border-:5px solid #f2f2f2; object-fit:cover; object-position:center;"/>
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
								<div class="row g-3">
									<div class="col-md-6">
										<label for="username" class="form-label">Username<br/><small><i class="statsText">Bisa diubah</i></small></label>
										<input type="text" class="form-control" id="username" placeholder="Ketik username">
									</div>
									<div class="col-md-6">
										<label for="password" class="form-label">PIN<br/><small><i>Default : 123456</i></small></label>
										<input type="password" class="form-control" value="123456" id="password" placeholder="Minimal 6 karakter">
									</div>
									<div class="col-md-6">
										<label for="email" class="form-label">Email</label>
										<input type="email" class="form-control" id="email" placeholder="Email siswa">
									</div>
									<div class="col-md-6">
										<label for="pin" class="form-label">Jenis Kelamin</label>
										<select class="form-control" id="jenisKelamin">
											<option value="L">Laki-laki</option>
											<option value="P">Perempuan</option>
										</select>
									</div>
									<div class="col-md-12">
										<label for="agama" class="form-label">Agama</label>
										<select class="form-control" id="agama">
											<option value="Islam">Islam</option>
											<option value="Kristen Protestan">Kristen Protestan</option>
											<option value="Kristen Katolik">Kristen Katolik</option>
											<option value="Hindu">Hindu</option>
											<option value="Buddha">Buddha</option>
											<option value="Lainnya">Lainnya</option>
										</select>
									</div>
									<div class="col-12 fotodiv">
										<div class="mb-3">
											<label for="inputProductDescription" class="form-label">Foto</label>
											<input id="file" class="form-control" type="file" accept="image/*,.pdf">
										</div>
									</div>
									
									<div class="col-12">
										<div class="d-grid">
											<button type="button" id="btnSave" class="btn btn-primary" onclick="addData();"><i class="bx bx-save"></i> Simpan</button>
										</div>
									</div>
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
			console.log(pageMode);
			let userIDX = '';
			if(pageMode!='add'){
				$('.fotodiv').attr('style','display:none!important;');
				$('.fotodivupdate').attr('style','display:block!important;');
			}else {
				$('.fotodivupdate').attr('style','display:none!important;');
			}

            $(document).ready(function () {
                $('#image-uploadify').imageuploadify();
				let rands = "user-"+randstr(5);
				$('#username').val(rands);

				$('#jabatan').on('change', function() {
					var jabatan = $("#jabatan").val();
					if(jabatan=='Guru'){
						$('.bagianguru').attr('style','display:block');
					}else {
						$('.bagianguru').attr('style','display:none');
					}
				});

				if(pageMode!='add'){
					callDataToUpdate(pageMode);
					$('.modeText').text('update');
					$('.statsText').html('Dalam mode <b>Update</b>! Tidak bisa diubah!');
					$('.fotodiv').attr('style','display:none!important;');
				}

            });

			function addData() {

				$('#btnSave').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Memproses...');
				$('#btnSave').attr('disabled', 'disabled');
                $('#btnSave').css('cursor', 'not-allowed');
				
				
				var namaGuru = $("#namaGuru").val();
				var alamatGuru = $("#alamatGuru").val();
				var imageuploadify = $("#file")[0].files[0]; 
				// imageuploadify = $("#file")[0].files[0];
				var username = $("#username").val();
				var password = $("#password").val();
				var email = $("#email").val();
				var jenisKelamin = $("#jenisKelamin").val();
				var agama = $("#agama").val();
				var tanggalLahir = $("#tanggalLahir").val();
				var tempatLahir = $("#tempatLahir").val();
				// var waOrtu = $("#waOrtu").val();
				var jabatan = $("#jabatan").val();
				var noTelp = $("#noTelp").val();
				
				var form_data = new FormData();
				
				if(jabatan=='Guru'){
					// var nuptk = $("#nuptk").val();
					var mataPelajaran = $("#mataPelajaran").val();
					// form_data.append('nuptk', nuptk);
					form_data.append('mata_pelajaran', mataPelajaran);
				}

				form_data.append('nama_lengkap', namaGuru);
				form_data.append('jenis_kelamin', jenisKelamin);
				form_data.append('tempat_lahir', tempatLahir);
				form_data.append('tanggal_lahir', tanggalLahir);
				form_data.append('jabatan', jabatan);
				
				form_data.append('username', username);
				form_data.append('email', email);
				form_data.append('agama', agama);
				form_data.append('alamat_lengkap', alamatGuru);
				form_data.append('telpon', noTelp);

				if(imageuploadify!='' && pageMode=='add'){
					form_data.append('foto', imageuploadify);	
				}
				if(password!=''){
					form_data.append('password', password);
				}
				
				let url = '';

				if(pageMode!='add'){
					url = '<?= api_url(); ?>api/v1/general/update/'+userIDX;
				}else {
					url = '<?= api_url(); ?>api/v1/general/store';
				}

				if(password!=''){
					form_data.append('password', password);
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
						
						$('#btnSave').html('<i class="bx bx-save"></i> Simpan');
						$('#btnSave').attr('disabled', false);
						$('#btnSave').css('cursor', 'pointer');
					});
					if (posts.status == 201||posts.status == 200) {

						if (posts.data.status == true) {

							if(pageMode!='add'){
								callDataToUpdate(pageMode);
							}

							Toastify({
								text: 'Data berhasil ditambahkan!',
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

						$('#btnSave').html('<i class="bx bx-save"></i> Simpan');
						$('#btnSave').attr('disabled', false);
						$('#btnSave').css('cursor', 'pointer');

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
						$('#btnSave').html('<i class="bx bx-save"></i> Simpan');
						$('#btnSave').attr('disabled', false);
						$('#btnSave').css('cursor', 'pointer');
					}

					//re-create rand string format
					let rands = "user-"+randstr(5);
					$('#username').val(rands);
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
					const posts = await axios.get('<?= api_url(); ?>api/v1/general/id/' + str, {
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
						$('#username').attr('disabled','disabled');

						
						if(posts.data.data.jabatan=='Guru'){
							// $("#nuptk").val(posts.data.data.nuptk);
							$("#mataPelajaran").val(posts.data.data.mata_pelajaran);
							$('.bagianguru').attr('style','display:block');
						}else {
							$('.bagianguru').attr('style','display:none');
						}
						
						$("#username").val(posts.data.data.user.username);
						$("#alamatGuru").val(posts.data.data.alamat_lengkap);
						$("#tempatLahir").val(posts.data.data.tempat_lahir);
						$("#namaGuru").val(posts.data.data.nama_lengkap);
						$("#email").val(posts.data.data.user.email);
						$("#jenisKelamin").val(posts.data.data.jenis_kelamin);
						$("#agama").val(posts.data.data.agama);
						$("#tanggalLahir").val(posts.data.data.tanggal_lahir);
						$("#jabatan").val(posts.data.data.jabatan);
						$("#noTelp").val(posts.data.data.telpon);
						
						userIDX  = posts.data.data.user.id;
						$('#password').val('');
						$('#password').attr('placeholder','Kosongkan bila tidak ingin diubah!');
						
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