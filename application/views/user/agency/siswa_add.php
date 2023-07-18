<link href="<?=base_url();?>assets_oncard/plugins/Drag-And-Drop/dist/imageuploadify.min.css" rel="stylesheet" />
<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Siswa</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
                                <li class="breadcrumb-item"><a href="<?=base_url().$function;?>/Siswa">Daftar Siswa</a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Form <font class="modeText">penambahan</font> siswa</li>
							</ol>
						</nav>
					</div>
					
				</div>
				<!--end breadcrumb-->
			  
				<div class="card">
				  <div class="card-body p-4">
					  <h5 class="card-title" style="text-transform:capitalize;">Formulir <font class="modeText">penambahan</font> Siswa</h5>
					  <hr/>
                       <div class="form-body mt-4">
					<form id="main">
						<div class="row">
						   <div class="col-lg-7">
								<div class="border border-3 p-4 rounded">
									<div class="mb-3">
										<label for="namaSiswa" class="form-label">Nama Siswa</label>
										<input type="email" class="form-control" id="namaSiswa" placeholder="Ketik nama lengkap siswa">
									</div>
									<div class="mb-3">
										<label for="alamatSiswa" class="form-label">Alamat</label>
										<textarea class="form-control" id="alamatSiswa" rows="2"></textarea>
									</div>
									
									<div class="col-12">
								 	 <label for="tempatLahir" class="form-label">Tempat lahir</label>
									 <input type="text" class="form-control" id="tempatLahir" placeholder="Alamat tempat lahir">
								  </div>
								  <div class="col-12 mt-3">
								 	 <label for="waOrtu" class="form-label">Telefon (WA) Orangtua<br/><small><i>Nomor harus dimulai dari 62.</i></small></label>
									 <input type="text" class="form-control" id="waOrtu" placeholder="cth : 6281220222922">
								  </div>
								  <div class="col-12 mt-3">
								  	 <label for="nisn" class="form-label">NISN</label>
									 <input type="text" class="form-control" id="nisn" placeholder="Masukkan NISN">
								  </div>
								</div>
							</div>

							<div class="col-lg-5">
							<div class="border border-3 p-4 rounded">
                              <div class="row g-3">
								  <div class="col-md-6">
									<label for="username" class="form-label">Username<br/><small><i class="statsText">Bisa diubah</i></small></label>
									<input type="text" class="form-control" id="username" placeholder="Ketik username">
								  </div>
								  <div class="col-md-6">
									<label for="password" class="form-label">Password<br/><small><i>Default : 123456</i></small></label>
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
								  <div class="col-md-6">
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
								  <div class="col-md-6">
									<label for="tanggalLahir" class="form-label">Tanggal Lahir</label>
									<input type="date" class="form-control" id="tanggalLahir" placeholder="Email agensi">
								  </div>

								  <div class="col-12">
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
			

            $(document).ready(function () {
                $('#image-uploadify').imageuploadify();
				let rands = "user-"+randstr(5);
				$('#username').val(rands);

				if(pageMode!='add'){
					callDataToUpdate(pageMode);
					$('.modeText').text('update');
					$('.statsText').html('Dalam mode <b>Update</b>! Tidak bisa diubah!');
				}

            });

			function addData() {

				$('#btnSave').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Memproses...');
				$('#btnSave').attr('disabled', 'disabled');
                $('#btnSave').css('cursor', 'not-allowed');
				
				var namaSiswa = $("#namaSiswa").val();
				var alamatSiswa = $("#alamatSiswa").val();
				var imageuploadify = $("#file")[0].files[0]; 
				// imageuploadify = $("#file")[0].files[0];
				var username = $("#username").val();
				var password = $("#password").val();
				var email = $("#email").val();
				var jenisKelamin = $("#jenisKelamin").val();
				var agama = $("#agama").val();
				var tanggalLahir = $("#tanggalLahir").val();
				var tempatLahir = $("#tempatLahir").val();
				var waOrtu = $("#waOrtu").val();
				var nisn = $("#nisn").val();

				var form_data = new FormData();
				form_data.append('nama_lengkap', namaSiswa);
				form_data.append('jenis_kelamin', jenisKelamin);
				form_data.append('tempat_lahir', tempatLahir);
				form_data.append('tanggal_lahir', tanggalLahir);
				form_data.append('username', username);
				form_data.append('password', password);
				form_data.append('email', email);
				form_data.append('agama', agama);
				form_data.append('alamat_lengkap', alamatSiswa);
				form_data.append('telp_ortu', waOrtu);
				form_data.append('foto', 'image.jpg');
				form_data.append('nis', nisn);

				let url = '';

				if(pageMode!='add'){
					url = '<?= api_url(); ?>api/v1/siswa/update/'+pageMode;
				}else {
					url = '<?= api_url(); ?>api/v1/siswa/store';
				}
				
				const save = async (form_data) => {
					const posts = await axios.post(url, form_data, {
						headers: {
							'Authorization': 'Bearer ' + sessionStorage.getItem('_token')
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

			function callDataToUpdate(str){
				const save = async (str) => {
					const posts = await axios.get('<?= api_url(); ?>api/v1/siswa/id/' + str, {
						headers: {
							'Authorization': 'Bearer ' + sessionStorage.getItem('_token')
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
						
						$("#username").val(posts.data.data.user.username);
						$("#alamatSiswa").val(posts.data.data.alamat_lengkap);
						$("#tempatLahir").val(posts.data.data.tempat_lahir);
						$("#waOrtu").val(posts.data.data.telp_ortu);
						$("#nisn").val(posts.data.data.nis);
						$("#namaSiswa").val(posts.data.data.nama_lengkap);
						$("#email").val(posts.data.data.user.email);
						$("#jenisKelamin").val(posts.data.data.jenis_kelamin);
						$("#agama").val(posts.data.data.agama);
						$("#tanggalLahir").val(posts.data.data.tanggal_lahir);

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