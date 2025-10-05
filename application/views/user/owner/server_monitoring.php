<style>
    .responsive-iframe {
      width: 100%;
      height: 50vh; /* 80% of viewport height */
      border: none;
      border-radius: 8px;
    }
  </style>

<link href="<?=base_url();?>assets_oncard/plugins/Drag-And-Drop/dist/imageuploadify.min.css" rel="stylesheet" />
<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Server</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
                                <li class="breadcrumb-item active" aria-current="page">Server Monitoring</li>
							</ol>
						</nav>
					</div>
					
				</div>
				<!--end breadcrumb-->
			  
				<div class="card">
				  <div class="card-body p-4">
					<h3>* ONDASHBOARD</h3>
					<iframe width="100%" height="650" src="https://lookerstudio.google.com/embed/u/0/reporting/97753813-0ed9-4321-87b7-142435b68814/page/m0sSF" frameborder="0" style="border:0" allowfullscreen sandbox="allow-storage-access-by-user-activation allow-scripts allow-same-origin allow-popups allow-popups-to-escape-sandbox"></iframe>
						<hr>
					<h3>1. QMS</h3>
					<iframe 
							src="https://103.179.56.190:61208/" 
							class="responsive-iframe"
							allow="fullscreen"
						></iframe>
						<hr>
					<h3>2. ONCARDVPS</h3>
					<iframe 
							src="https://103.179.56.190:61208/" 
							class="responsive-iframe"
							allow="fullscreen"
						></iframe>
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

                $('.box1val').attr('style','display:none;');
                $('.box10val').attr('style','display:none;');
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
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
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