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
                                <li class="breadcrumb-item"><a href="<?=base_url().$function;?>/Produk">Daftar Produk</a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Form <font class="modeText">penambahan</font> produk</li>
							</ol>
						</nav>
					</div>
					
				</div>
				<!--end breadcrumb-->
			  
				<div class="card">
				  <div class="card-body p-4">
					  <h5 class="card-title" style="text-transform:capitalize;">Formulir <font class="modeText">Penambahan</font> Produk</h5>
					  <hr/>
                       <div class="form-body mt-4">
					<form id="main">
						<div class="row">
						   <div class="col-lg-6">
								<div class="border border-3 p-4 rounded">
									<div class="mb-3">
										<label for="namaProduk" class="form-label">Nama Produk</label>
										<input type="email" class="form-control" id="namaProduk" placeholder="Ketik nama produk">
									</div>
									<div class="mb-3">
										<label for="deskripsi" class="form-label">Deskripsi</label>
										<textarea class="form-control" id="deskripsi" rows="2"></textarea>
									</div>

								  <div class="col-12 mt-3">
								  	<div class="mb-3">
										<label for="file" class="form-label">Foto produk</label>
										<input id="file" class="form-control" type="file" accept="image/*,.pdf">
									</div>
								  </div>

								</div>
								
							</div>

							<div class="col-lg-6">
							<div class="border border-3 p-4 rounded">
                              <div class="row g-3">
								  <div class="col-md-6">
									<label for="jenis" class="form-label">Jenis Produk</label>
									<select class="form-control" id="jenis">
										<option value="Makanan">Makanan</option>
										<option value="Minuman">Minuman</option>
										<option value="Alat Tulis">Alat Tulis</option>
										<option value="Pakaian">Pakaian</option>
										<option value="Perlengkapan Lainnya">Perlengkapan Lainnya</option>
									</select>
								  </div>
								  <div class="col-md-6">
									<label for="kategori" class="form-label">Kategori Produk</label>
									<select class="form-control" id="kategori">
										<option value="Belum ada kategori" selected>Belum ada kategori</option>
									</select>
								  </div>
								  <div class="col-md-12">
									<label for="harga" class="form-label">Harga</label>
									<input type="text" class="form-control" id="harga" placeholder="Rp0">
								  </div>

								  <div class="col-md-6">
									<label for="satuan" class="form-label">Satuan</label>
									<select class="form-control" id="satuan">
										<option value="pcs" selected>pcs</option>
										<option value="unit" >unit</option>
										<option value="kg" >kg</option>
										<option value="gram" >gram</option>
									</select>
								  </div>

								  <div class="col-md-6">
									<label for="stok" class="form-label">Stok</label>
									<input type="text" class="form-control" id="stok" placeholder="0">
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
				
				var namaProduk = $("#namaProduk").val();
				var deskripsi = $("#deskripsi").val();
				var imageuploadify = $("#file")[0].files[0];
				var jenis = $("#jenis").val();
				var kategori = $("#kategori").val();
				var harga = $("#harga").val();
				var satuan = $("#satuan").val();
				var stok = $("#stok").val();
				
				var form_data = new FormData();
				form_data.append('nama_produk', namaProduk);
				form_data.append('deskripsi', deskripsi);
				form_data.append('gambar', imageuploadify);
				form_data.append('jenis_produk', jenis);
				form_data.append('kategori_produk', kategori);
				form_data.append('harga', harga);
				form_data.append('satuan', satuan);
				form_data.append('stok', stok);

				let url = '';

				if(pageMode!='add'){
					url = '<?= api_url(); ?>api/v1/produk/update/'+pageMode;
				}else {
					url = '<?= api_url(); ?>api/v1/produk/store';
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
					if (posts.status == 201 || posts.status == 200) {

						if (posts.data.status == true) {
							if(pageMode!='add'){
								callDataToUpdate(pageMode);
								Toastify({
								text: 'Produk berhasil diupdate!',
								duration: 3000,
								close: true,
								gravity: "top",
								position: "right",
								className: "successMessage",

							}).showToast();
							}else {
								Toastify({
								text: 'Produk berhasil ditambahkan',
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

        </script>