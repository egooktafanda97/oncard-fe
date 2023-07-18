<link href="<?=base_url();?>assets_oncard/plugins/Drag-And-Drop/dist/imageuploadify.min.css" rel="stylesheet" />
<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Agensi</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
                                <li class="breadcrumb-item"><a href="<?=base_url().$function;?>/Agensi">Daftar Agensi</a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Form penambahan agensi</li>
							</ol>
						</nav>
					</div>
					
				</div>
				<!--end breadcrumb-->
			  
				<div class="card">
				  <div class="card-body p-4">
					  <h5 class="card-title">Formulir Penambahan Agensi</h5>
					  <hr/>
                       <div class="form-body mt-4">
					<form id="main">
						<div class="row">
						   <div class="col-lg-7">
                           <div class="border border-3 p-4 rounded">
							<div class="mb-3">
								<label for="namaAgensi" class="form-label">Nama Agensi</label>
								<input type="email" class="form-control" id="namaAgensi" placeholder="Ketik nama agensi / instansi / perusahaan">
							  </div>
							  <div class="mb-3">
								<label for="alamatAgensi" class="form-label">Alamat</label>
								<textarea class="form-control" id="alamatAgensi" rows="2"></textarea>
							  </div>
							  <div class="mb-3">
								<label for="inputProductDescription" class="form-label">Foto</label>
								<input id="image-uploadify" type="file" accept="image/*,.pdf" multiple>
							  </div>
                            </div>
						   </div>
						   <div class="col-lg-5">
							<div class="border border-3 p-4 rounded">
                              <div class="row g-3">
								  <div class="col-md-12">
									<label for="username" class="form-label">Kode Instansi<br/><small><i>Generated automatically by system</i></small></label>
									<input type="text" class="form-control" id="kodeInstansi" readonly>
								  </div>
								  <div class="col-md-6">
									<label for="username" class="form-label">Username</label>
									<input type="text" class="form-control" id="username" placeholder="Ketik username">
								  </div>
								  <div class="col-md-6">
									<label for="password" class="form-label">Password</label>
									<input type="password" class="form-control" id="password" placeholder="Minimal 6 karakter">
								  </div>
								  <div class="col-md-6">
									<label for="email" class="form-label">Email</label>
									<input type="email" class="form-control" id="email" placeholder="Email agensi">
								  </div>
								  <div class="col-md-6">
									<label for="pin" class="form-label">PIN</label>
									<input type="password" class="form-control" id="pin" placeholder="Minimal 4 karakter">
								  </div>
								  <div class="col-12">
								 	 <label for="koordinat" class="form-label">Koordinat</label>
									 <input type="text" class="form-control" id="koordinat" placeholder="Longitude, Latitude">
								  </div>
								  <div class="col-12">
								 	 <label for="reference" class="form-label">Kode Referal</label>
									 <input type="text" class="form-control" id="reference" placeholder="Masukkan kode referal">
								  </div>
								  <div class="col-12">
								  	 <label for="saldo" class="form-label">Saldo</label>
									 <input type="text" class="form-control" id="saldo" placeholder="Masukkan saldo awal">
								  </div>
								  <div class="col-12">
									<label for="role" class="form-label">Role</label>
									<input type="text" class="form-control" id="role" value="agensi" readonly>
								  </div>
								  <div class="col-12">
									  <div class="d-grid">
                                         <button type="button" id="btnSave" class="btn btn-primary" onclick="addData();"><i class="bx bx-save"></i> Simpan</button>
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
        <script>
            $(document).ready(function () {
                $('#image-uploadify').imageuploadify();
				let rands = randstr(3)+"."+randstr(3)+"."+randstr(3);
				$('#kodeInstansi').val(rands);
            });

			function addData() {

				$('#btnSave').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Memproses...');
				$('#btnSave').attr('disabled', 'disabled');
                $('#btnSave').css('cursor', 'not-allowed');
				
				var kodeInstansi = $("#kodeInstansi").val();
				var namaAgensi = $("#namaAgensi").val();
				var alamatAgensi = $("#alamatAgensi").val();
				var imageuploadify = $("#image-uploadify")[0].files[0];
				var username = $("#username").val();
				var password = $("#password").val();
				var email = $("#email").val();
				var pin = $("#pin").val();
				var reference = $("#reference").val();
				var saldo = $("#saldo").val();
				var role = $("#role").val();
				var koordinat = $("#koordinat").val();

				var form_data = new FormData();
				form_data.append('kode_instansi', kodeInstansi);
				form_data.append('nama', namaAgensi);
				form_data.append('alamat', alamatAgensi);
				form_data.append('foto', imageuploadify);
				form_data.append('koordinat', koordinat);
				form_data.append('username', username);
				form_data.append('password', password);
				form_data.append('email', email);
				form_data.append('pin', pin);
				form_data.append('code_reference', reference);
				form_data.append('saldo', saldo);
				form_data.append('foto', imageuploadify);
				form_data.append('role', role);
				
				const save = async (form_data) => {
					const posts = await axios.post('<?= api_url(); ?>api/v1/agency/store', form_data, {
						headers: {
							'Authorization': 'Bearer ' + sessionStorage.getItem('_token')
						}
					}).catch((err) => {
						Toastify({
							text: "Terjadi kesalahan dalam proses data.",
							duration: 3000,
							close: true,
							gravity: "top",
							position: "right",
							className: "errorMessage",

						}).showToast();
						$('#btnSave').html('<i class="bx bx-save"></i> Simpan');
						$('#btnSave').attr('disabled', false);
						$('#btnSave').css('cursor', 'pointer');
					});

					

					if (posts.status == 201) {

						if (posts.data.status == true) {

							Toastify({
								text: posts.data.message,
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
					let rands = randstr(3)+"."+randstr(3)+"."+randstr(3);
					$('#kodeInstansi').val(rands);
				}

				save(form_data);

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