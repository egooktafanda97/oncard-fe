<link href="<?=base_url();?>assets_oncard/plugins/Drag-And-Drop/dist/imageuploadify.min.css" rel="stylesheet" />
<style>
	/*
    Common 
*/

select {
        padding:20px!important;
        border-radius:10px!important;
        font-size:16px!important;
        
    }

.wizard,
.tabcontrol {
  display: block;
  width: 100%;
  overflow: hidden;
}

.wizard a,
.tabcontrol a {
  outline: 0;
}

.wizard ul,
.tabcontrol ul {
  list-style: none !important;
  padding: 0;
  margin: 0;
}

.wizard ul > li,
.tabcontrol ul > li {
  display: block;
  padding: 0;
}


/* Accessibility */

.wizard > .steps .current-info,
.tabcontrol > .steps .current-info {
  position: absolute;
  left: -999em;
}

.wizard > .content > .title,
.tabcontrol > .content > .title {
  position: absolute;
  left: -999em;
}


/*
    Wizard
*/

.wizard > .steps {
  position: relative;
  display: block;
  width: 100%;
}

.wizard.vertical > .steps {
  display: inline;
  float: left;
  width: 30%;
}

.wizard > .steps .number {
  font-size: 1.429em;
}

.wizard > .steps > ul > li {
  width: 25%;
}

.wizard > .steps > ul > li,
.wizard > .actions > ul > li {
  float: left;
}

.wizard.vertical > .steps > ul > li {
  float: none;
  width: 100%;
}

.wizard > .steps a,
.wizard > .steps a:hover,
.wizard > .steps a:active {
  display: block;
  width: auto;
  margin: 0 0.5em 0.5em;
  padding: 1em 1em;
  text-decoration: none;
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  border-radius: 5px;
}

.wizard > .steps .disabled a,
.wizard > .steps .disabled a:hover,
.wizard > .steps .disabled a:active {
  background: #eee;
  color: #aaa;
  cursor: default;
}

.wizard > .steps .current a,
.wizard > .steps .current a:hover,
.wizard > .steps .current a:active {
  background: #373566;
  color: #fff;
  cursor: default;
}

.wizard > .steps .done a,
.wizard > .steps .done a:hover,
.wizard > .steps .done a:active {
  background: #11caf0;
  color: #fff;
}

.wizard > .steps .error a,
.wizard > .steps .error a:hover,
.wizard > .steps .error a:active {
  background: #ff3111;
  color: #fff;
}

.wizard > .content {
  background: #eee;
  display: block;
  margin: 0.5em;
  min-height: 45em;
  overflow: hidden;
  position: relative;
  width: auto;
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  border-radius: 5px;
}

.wizard.vertical > .content {
  display: inline;
  float: left;
  margin: 0 2.5% 0.5em 2.5%;
  width: 65%;
}

.wizard > .content > .body {
  float: left;
  position: absolute;
  width: 100%;
  height: 100%;
  padding: 2.5%;
  overflow-y:auto!important;
}

.wizard > .content > .body ul {
  list-style: disc !important;
}

.wizard > .content > .body ul > li {
  display: list-item;
}

.wizard > .content > .body > iframe {
  border: 0 none;
  width: 100%;
  height: 100%;
}

.wizard > .content > .body input {
  display: block;
  border: 1px solid #ccc;
}

.wizard > .content > .body input[type="checkbox"] {
  display: inline-block;
}

.wizard > .content > .body input.error {
  background: rgb(251, 227, 228);
  border: 1px solid #fbc2c4;
  color: #8a1f11;
}

.wizard > .content > .body label {
  display: inline-block;
  margin-bottom: 0.5em;
}

.wizard > .content > .body label.error {
  color: #8a1f11;
  display: inline-block;
  margin-left: 1.5em;
}

.wizard > .actions {
  position: relative;
  display: block;
  text-align: right;
  width: 100%;
}

.wizard.vertical > .actions {
  display: inline;
  float: right;
  margin: 0 2.5%;
  width: 95%;
}

.wizard > .actions > ul {
  display: inline-block;
  text-align: right;
}

.wizard > .actions > ul > li {
  margin: 0 0.5em;
}

.wizard.vertical > .actions > ul > li {
  margin: 0 0 0 1em;
}

.wizard > .actions a,
.wizard > .actions a:hover,
.wizard > .actions a:active {
  background: #373566;
  color: #fff;
  display: block;
  padding: 0.5em 1em;
  text-decoration: none;
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  border-radius: 5px;
}

.wizard > .actions .disabled a,
.wizard > .actions .disabled a:hover,
.wizard > .actions .disabled a:active {
  background: #eee;
  color: #aaa;
}

.wizard > .loading {}

.wizard > .loading .spinner {}


/*
    Tabcontrol
*/

.tabcontrol > .steps {
  position: relative;
  display: block;
  width: 100%;
}

.tabcontrol > .steps > ul {
  position: relative;
  margin: 6px 0 0 0;
  top: 1px;
  z-index: 1;
}

.tabcontrol > .steps > ul > li {
  float: left;
  margin: 5px 2px 0 0;
  padding: 1px;
  -webkit-border-top-left-radius: 5px;
  -webkit-border-top-right-radius: 5px;
  -moz-border-radius-topleft: 5px;
  -moz-border-radius-topright: 5px;
  border-top-left-radius: 5px;
  border-top-right-radius: 5px;
}

.tabcontrol > .steps > ul > li:hover {
  background: #edecec;
  border: 1px solid #bbb;
  padding: 0;
}

.tabcontrol > .steps > ul > li.current {
  background: #fff;
  border: 1px solid #bbb;
  border-bottom: 0 none;
  padding: 0 0 1px 0;
  margin-top: 0;
}

.tabcontrol > .steps > ul > li > a {
  color: #5f5f5f;
  display: inline-block;
  border: 0 none;
  margin: 0;
  padding: 10px 30px;
  text-decoration: none;
}

.tabcontrol > .steps > ul > li > a:hover {
  text-decoration: none;
}

.tabcontrol > .steps > ul > li.current > a {
  padding: 15px 30px 10px 30px;
}

.tabcontrol > .content {
  position: relative;
  display: inline-block;
  width: 100%;
  height: 35em;
  overflow: hidden;
  border-top: 1px solid #bbb;
  padding-top: 20px;
}

.tabcontrol > .content > .body {
  float: left;
  position: absolute;
  width: 95%;
  height: 95%;
  padding: 2.5%;
}

.tabcontrol > .content > .body ul {
  list-style: disc !important;
}

.tabcontrol > .content > .body ul > li {
  display: list-item;
}

/* Fullscreen overlay */
.loading-overlay {
    display: none; /* Initially hidden */
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
    z-index: 9999;
    text-align: center;
    color: white;
}

/* Centering the spinner */
.loading-spinner {
    border: 9px solid #f3f3f3; /* Light grey */
    border-top: 9px solid #3498db; /* Blue */
    border-radius: 50%;
    width: 50px;
    height: 50px;
    animation: spin 2s linear infinite;
	margin-bottom:15px;
}

/* Spinner animation */
@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

</style>
<div class="page-wrapper">
			<div class="page-content">

				<div id="loadingScreen" class="loading-overlay">
					<div class="loading-spinner"></div>
					<p>Processing, please wait...</p>
				</div>

				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Item Biaya</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
                                <li class="breadcrumb-item"><a href="<?=base_url().$function;?>/JenisTagihan">Daftar Biaya</a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Form <font class="modeText">penambahan</font> item biaya</li>
							</ol>
						</nav>
					</div>
					
				</div>
				<!--end breadcrumb-->
			  
				<div class="card">
				  <div class="card-body p-4">
					  <h5 class="card-title" style="text-transform:capitalize;">Formulir <font class="modeText">penambahan</font> item biaya</h5>
					  <hr/>
					  <div id="example-vertical">
						<h3>Inisiasi Data</h3>
						<section>
							<div class="row">
								<div class="col-md-12">
								<label for="mTypeGet" class="form-label">Pilih Jenis Tagihan</label>
									<select class="form-select single-select inputFilterItem" id="mTypeGet" data-object='mtype' style="border-radius:5px!important;">
                                        <option value="">Pilih salah satu</option>
									</select>
								</div>
								
								<div class="mb-3 mt-3">
									<label for="namaTagihan" class="form-label">Nama Item Biaya</label><br/>
									<label class="form-label"><small><code>Maksimal 100 karakter.</code></small></label>
									<input type="text" class="form-control" id="namaTagihan" placeholder="Cth : SPP <?=date('F');?>" maxlength="100">
								</div>
								<div class="mb-3 mt-3">
									<label for="namaTagihan" class="form-label">Detail Tambahan</label><br/>
									<label class="form-label"><small><code>Maksimal 200 karakter.</code></small></label>
									<textarea class="form-control" id="deskripsiTagihan" placeholder="Detailkan maksud biaya ini." rows="3"></textarea>
								</div>

								<div class="col-md-6 mt-1">
								<label for="tanggalPenagihan" class="form-label">Pilih tanggal penagihan</label>
									<input type="datetime-local" class="form-control" id="tanggalPenagihan"/>
								</div>


								<div class="col-md-6 mt-1">
								<label for="tanggalJatuhTempo" class="form-label">Pilih tanggal jatuh tempo</label>
									<input type="datetime-local" class="form-control" id="tanggalJatuhTempo"/>
								</div>
								
								<div class="col-md-12 mt-4">
									<h5>Nominal Biaya</h5>
								<p><small>
								Silakan masukkan nominal biaya yang ingin Anda buat pada kolom berikut dengan angka yang sesuai. 
								Pastikan nilai yang dimasukkan tidak mengandung simbol atau tanda baca, kecuali titik untuk desimal jika diperlukan. 
								Nominal ini akan menjadi jumlah total yang ditagihkan, jadi mohon untuk memeriksanya kembali sebelum melanjutkan.
								</small></p>
								<label for="mTypeGet" class="form-label">Masukkan nominal biaya</label>
								
								<div class="row">
									<div class="col-lg-4 col-4">
										<label for="">Jumlah Tagihan</label>
										<input type="text" id="nominalTagihan" class="form-control mb-2 setTocurrency" 
										oninput="setValx(this.value); handleNominalTagihanInput(this.value);" 
										style="font-size:26px!important;" placeholder="(Rp)" maxlength="20" onkeydown="return isNumberKey(event);"/>
									</div>
									<div class="col-lg-4 col-4">
										<label for="">Diskon</label>
										<input type="text" id="persenTagihan" class="form-control mb-2 setTocurrency" 
										oninput="handlePersenTagihanInput(this.value);" 
										style="font-size:26px!important;" placeholder="%" maxlength="9" disabled/>
									</div>
									<div class="col-lg-4 col-4">
										<label for="">Tagihan</label>
										<input type="text" id="nominalTagihanFinal" class="form-control mb-2 setTocurrency" 
										oninput="setValy(this.value); handleNominalTagihanFinalInput(this.value);" 
										style="font-size:26px!important;" placeholder="(Rp)" maxlength="20" onkeydown="return isNumberKey(event);" disabled/>
									</div>
								</div>
								
								</div>
								
							</div>
							
						</section>
						<h3>Pilih User</h3>
						<section>
							<div class="col-12">
								<div class="row g-3 py-3">
									<div class="col-md-3" style="display:none;">
										<label for="setTahunAkademik" style="display:block;" class="form-label">Tahun Akademik</label>
										<select class="form-control" style="font-size:11px; width:100%;" id="setTahunAkademik" disabled>
											<option value="">Tampilkan semua</option>
										</select>
									</div>
									<div class="col-md-3" style="display:none;">
										<label for="setSemester" style="display:block;" class="form-label">Kelas</label>
										<select class="form-control" style="font-size:11px; width:100%;" id="setSemester">
										<option value="">Tampilkan semua</option>
										</select>
									</div>
									<div class="col-md-3">
										<label for="setSubKelas" style="display:block;" class="form-label">Kelas</label>
										<select class="form-control" style="font-size:11px; width:100%;" id="setSubKelas">
										<option value="">Tampilkan semua</option>
										</select>
									</div>
									<div class="col-md-3 text-end">
										<label for="setSubKelas" style="display:block;" class="form-label">Data Terpilih</label>
										<h3 style="font-weight:900;font-size:39px;" class="jmldata">0</h3>
									</div>
									
								</div>
								
							

							
							<div class="table-responsive">
								<table class="table mb-0 tabelsiswa" id="tabelPrint">
									<thead class="table-dark table-bordered table-striped">
										<tr>
											<th></th>
											<th>Nama</th>
											<th>Tahun Akademik</th>
											<th>Semester</th>
											<th>Tingkat / Kelas</th>
											<th>Tanggal Data</th>
										</tr>
									</thead>
									<tbody class="putContentHere">
										<tr>
											<td colspan="6" class="text-center">
												<h5>Pilih filter terlebih dahulu untuk menampilkan data pada tabel ini.</h5>
											</td>
										</tr>
									</tbody>
								</table>

							</div>
							</div>
						</section>
						<h3>Konfirmasi</h3>
						<section>
							<div class="col-md-12 table-responsive">
								<h5>Summary</h5>
								<table class="table table-striped">
									<tr>
										<td>Jenis Tagihan</td>
										<td class="m1"></td>
									</tr>
									<tr>
										<td>Nama Tagihan</td>
										<td class="m2"></td>
									</tr>
									<tr>
										<td>Tanggal Jatuh Tempo</td>
										<td class="m3"></td>
									</tr>
									<tr>
										<td>Tanggal Penagihan Awal</td>
										<td class="m4"></td>
									</tr>
									<tr>
										<td>Nominal</td>
										<td class="m5"></td>
									</tr>
									<tr>
										<td>User Terpilih</td>
										<td class="m6"></td>
									</tr>
								</table>

								<p>Dengan menekan tombol Simpan dibawah ini, Anda sudah menyetujui<br/>dan yakin dengan semua inputan yang telah diberikan. <br/>Pastikan terlebih dahulu bahwa data diatas memang sudah benar adanya. </p>
								
							</div>
						</section>
					</div>

				  </div>
			  </div>


			</div>
		</div>

        <script src="<?=base_url();?>assets_oncard/plugins/Drag-And-Drop/dist/imageuploadify.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-steps/1.1.0/jquery.steps.js"></script>

		<script>
			// Function to enable/disable fields and calculate values
			function handleNominalTagihanInput(value) {
				value = value.split('.').join("");
				const nominalTagihan = parseFloat(value) || 0;
				const persenTagihan = document.getElementById('persenTagihan');
				const nominalTagihanFinal = document.getElementById('nominalTagihanFinal');
				
				// Enable/disable fields based on nominalTagihan value
				persenTagihan.disabled = nominalTagihan === 0;
				nominalTagihanFinal.disabled = nominalTagihan === 0;

				if (nominalTagihan === 0) {
					persenTagihan.value = '';
					nominalTagihanFinal.value = '';
				}
			}

			function handlePersenTagihanInput(value) {
				let nominalTagihan = document.getElementById('nominalTagihan').value || 0;
				nominalTagihan = nominalTagihan.split('.').join("");
				const persenTagihan = parseFloat(value) || 0;
				const nominalTagihanFinal = document.getElementById('nominalTagihanFinal');

				// Calculate the final amount if persenTagihan is set
				if (nominalTagihan > 0 && persenTagihan > 0) {
					const finalAmount = nominalTagihan - (nominalTagihan * persenTagihan / 100);
					nominalTagihanFinal.value = finalAmount.toFixed(0);
					setValy(nominalTagihanFinal.value);
				}else {
					nominalTagihanFinal.value = nominalTagihan;
					setValy(nominalTagihanFinal.value);
				}
			}

			function handleNominalTagihanFinalInput(value) {
				let nominalTagihan = document.getElementById('nominalTagihan').value || 0;
				nominalTagihan = nominalTagihan.split('.').join("");

				let nominalTagihanFinal = value || 0;
				nominalTagihanFinal = nominalTagihanFinal.split('.').join("");

				const persenTagihan = document.getElementById('persenTagihan');

				// Calculate the percentage if nominalTagihanFinal is set
				if (nominalTagihan > 0 && nominalTagihanFinal > 0) {
					const percentage = ((nominalTagihan - nominalTagihanFinal) / nominalTagihan) * 100;
					persenTagihan.value = percentage.toFixed(0);
				}

			}

		</script>

        <script type="text/javascript">

			let idsett = '';
			let idsaved= '';
			let jenis_nominal_data= '';
			let nominal_new= '';

			let newpath = [];
			let newpath2 = [];
			let newpath3 = [];
			let newpath4 = [];
			let newpath5 = [];
			let newpath6 = [];
			let newpath7 = [];

			let endPointGetDataSiswa = '<?= api_url_core(); ?>api/master/siswa-kelas?status_id=1';

			function updateEndpoint() {
                const tahunAkademik = document.getElementById('setTahunAkademik').value;
                const semester = document.getElementById('setSemester').value;
                const subKelas = document.getElementById('setSubKelas').value;

                // Create a URL object to manage query parameters
                const url = new URL(endPointGetDataSiswa, window.location.origin);
                const params = new URLSearchParams(url.search);

                // Update or remove parameters based on selection
                // if (tahunAkademik) {
                //     params.set('tahun_akademik_id', tahunAkademik);
                // } else {
                //     params.delete('tahun_akademik_id');
                // }

                // if (semester) {
                //     params.set('kelas_id', semester);
                // } else {
                //     params.delete('kelas_id');
                // }

                if (subKelas) {
                    params.set('sub_kelas_id', subKelas);
                } else {
                    params.delete('sub_kelas_id');
                }

                // Update the endpoint with the new query parameters
                url.search = params.toString();
                const updatedEndpoint = url.toString();
                
                console.log('Updated Endpoint:', updatedEndpoint);
                // Update the global variable or use the updated endpoint as needed
                endPointGetDataSiswa = updatedEndpoint;
                showData(endPointGetDataSiswa);
            }
                        

            // Add event listeners for the dropdowns
            function showTahunAkademik() {
                axios.get('<?= api_url_core(); ?>api/master/tahun-akademik', {
                    headers: {
                        'Authorization': 'Bearer ' + localStorage.getItem('_private_token')
                    }
                })
                .then(response => {
                    console.log(response.data);

                    // Map and sort the data
                    const newpath = response.data.map(mapping => ({
                        'tahun_mulai': mapping.tanggal_mulai,
                        'tahun_selesai': mapping.tanggal_selesai,
                        'tahun_akademik': mapping.tahun_akademik,
                        'kode_tahun_akademik': mapping.id,
                    }));

                    newpath.sort((a, b) => {
                        const dateA = new Date(a.tahun_mulai);
                        const dateB = new Date(b.tahun_mulai);
                        return dateA - dateB;
                    });

                    // Append the sorted options to the dropdown
                    newpath.forEach(mapping => {
                        const option = new Option(mapping.tahun_akademik, mapping.kode_tahun_akademik,true , true);
                        $('#setTahunAkademik').append(option);
                    });

                    console.log(newpath);
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                });
            }


            function showSemester() {
                axios.get('<?= api_url_core(); ?>api/master/kelas', {
                    headers: {
                        'Authorization': 'Bearer ' + localStorage.getItem('_private_token')
                    }
                })
                .then(response => {
                    console.log(response.data);

                    // Clear the dropdown before appending options
                    $('#setSemester').empty();

                    // Add an empty option as the first item
                    const emptyOption = new Option('Tampilkan semua data', '', true, true);
                    $('#setSemester').append(emptyOption);

                    // Map and sort the data
                    const newpath2 = response.data.map(mapping => ({
                        'tahun_mulai': mapping.created_at,
                        'tahun_selesai': mapping.created_at,
                        'semester': mapping.name,
                        'kode_semester': mapping.id,
                    }));

                    newpath2.sort((a, b) => {
                        const dateA = new Date(a.tahun_mulai);
                        const dateB = new Date(b.tahun_mulai);
                        return dateA - dateB;
                    });

                    // Append the sorted options to the dropdown
                    newpath2.forEach(mapping => {
                        const option = new Option(mapping.semester, mapping.kode_semester);
                        $('#setSemester').append(option);
                    });

                    console.log(newpath2);
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                });
            }

			
            function showSubKelas() {
                axios.get('<?= api_url_core(); ?>api/master/sub-kelas', {
                    headers: {
                        'Authorization': 'Bearer ' + localStorage.getItem('_private_token')
                    }
                })
                .then(response => {
                    console.log(response.data);

                    // Clear the dropdown before appending options
                    $('#setSubKelas').empty();

                    // Add an empty option as the first item
                    const emptyOption = new Option('Tampilkan semua data', '', true, true);
                    $('#setSubKelas').append(emptyOption);

                    // Map and sort the data
                    const newpath4 = response.data.map(mapping => ({
                        'tingkat': mapping.tingkat,
                        'kode_sub_kelas': mapping.id,
                        'sub_kelas': mapping.sub_kelas,
                        'name': mapping.name,
                    }));

                    newpath4.sort((a, b) => a.name.localeCompare(b.name));


                    // Append the sorted options to the dropdown
                    newpath4.forEach(mapping => {
                        const option = new Option(mapping.name, mapping.kode_sub_kelas);
                        $('#setSubKelas').append(option);
                    });

                    console.log(newpath4);
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                });
            }


			$(document).ready(function () {
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

                showTahunAkademik();
                showSemester();
				showSubKelas();
				
                document.getElementById('setTahunAkademik').addEventListener('change', updateEndpoint);
                document.getElementById('setSemester').addEventListener('change', updateEndpoint);
                document.getElementById('setSubKelas').addEventListener('change', updateEndpoint);
                
                
            });

            let selectedIds = [];

			function showData(params){
				let num = 0;
				let tableColumn = '';
				tableColumn += `<tr><td colspan="8" class="text-center">Loading...</td></tr>`;
				$('.putContentHere').html(tableColumn);
				
				const save2 = async () => {
					const posts2 = await axios.get( params , {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_private_token')
						}
					}).catch((err) => {
						console.log(err.response);
					});
			
					if (posts2.status == 200) {
							num += 1;
							tableColumn = '';
							if(posts2.data.length==0){
								tableColumn +=`<tr><td colspan="8" class="text-center">Tidak ada data.</td></tr>`;
								$('.putContentHere').html(tableColumn);return false;
							}
							
							console.log(posts2.data);

                            tableColumn = `
                                <tr>
                                    <td colspan="7" class="text-start">
                                        <button type="button" id="toggleAllCheckboxes" class="btn btn-sm btn-secondary">Pilih Semua</button>
                                    </td>
                                </tr>
                            `;
							posts2.data.map((mapping,i)=>{

                                if(mapping.siswa){

                                    let textTingkat = '';
                                    let textNamaA = mapping.siswa?.name??'-';
                                    let textNama = textNamaA.split("-M");

                                    if(textNama[1]=='A'){
                                        textTingkat = 'Madrasah Aliyah';
                                    }
                                    if(textNama[1]=='TS'){
                                        textTingkat = 'Madrasah Tsanawiyah';
                                    }
                                    if(textNama[1]==undefined){
                                        textTingkat = '-';
                                    }

                                    // tanggalLahirpublic = mapping.tanggal_lahir;

                                    tableColumn += `
                                        <tr>
                                            <td>
                                                <input type="checkbox" class="select-id" data-id="${mapping.siswa.network_identity}" />
                                            </td>
                                            <td><b>${textNama[0]}</b><br/>
                                                <small class="text-muted">${textTingkat}</small> 
                                            </td>
                                            <td>${mapping.tahun_akademik.tahun_akademik}</td>
                                            <td>${mapping.semester.semester}</td>
                                            <td>${mapping.sub_kelas.name}</td>
                                            <td>${moment(mapping.created_at).format('YYYY-MM-DD, HH:mm:ss')} WIB</td>
                                            
                                        </tr>
                                    `;
                                }
							});
							
						$('.putContentHere').html(tableColumn);
					}
				}
				save2();
			}

			$(document).on('change', '.select-id', function () {
                const id = $(this).data('id'); // Get the ID from the data attribute
                if (this.checked) {
                    // Add the ID to the array if checked
                    if (!selectedIds.includes(id)) {
                        selectedIds.push(id);
                    }
                } else {
                    // Remove the ID from the array if unchecked
                    selectedIds = selectedIds.filter(item => item !== id);
                }
                console.log('Selected IDs:', selectedIds); // Log the updated array
                $('.jmldata').html(selectedIds.length);
            });

            $(document).on('click', '#toggleAllCheckboxes', function () {
                const isCheckAll = $(this).text() === 'Pilih Semua';

                $('.select-id').each(function () {
                    const id = $(this).data('id');

                    if (isCheckAll) {
                        // Check all checkboxes
                        $(this).prop('checked', true);
                        if (!selectedIds.includes(id)) {
                            selectedIds.push(id); // Add only if not already present
                        }
                    } else {
                        // Uncheck all checkboxes
                        $(this).prop('checked', false);
                        selectedIds = selectedIds.filter(item => !$('.select-id').map((_, el) => $(el).data('id')).get().includes(item)); // Remove only those visible
                    }
                });

                // Update button text
                $(this).text(isCheckAll ? 'Hapus Semua Pilihan' : 'Pilih Semua');

                console.log('Selected IDs:', selectedIds);
                $('.jmldata').html(selectedIds.length);
            });


			function isNumberKey(evt) {
                // Allow only numerical keys
                var charCode = (evt.which) ? evt.which : evt.keyCode;
                if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                    return false;
                }
                return true;
            }

			function setValx(value) {
                // Ensure the value is a number and truncate to 8 characters
                let cleanedValue = value.replace(/\D/g, '').substring(0,9);
                document.getElementById('nominalTagihan').value = formatRupiah(cleanedValue);
            }
			function setValy(value) {
                // Ensure the value is a number and truncate to 8 characters
                let cleanedValue = value.replace(/\D/g, '').substring(0,9);
                document.getElementById('nominalTagihanFinal').value = formatRupiah(cleanedValue);
            }

			function showLoading() {
				document.getElementById('loadingScreen').style.display = 'flex';
				$('#loadingScreen').css('flex-direction','column');
				$('#loadingScreen').css('align-items','center');
				$('#loadingScreen').css('justify-content','center');
			}

			function hideLoading() {
				document.getElementById('loadingScreen').style.display = 'none';
			}
			
			$("#example-vertical").steps({
				headerTag: "h3",
				bodyTag: "section",
				transitionEffect: "slideLeft",
				stepsOrientation: "horizontal",
				onStepChanged: function (event, currentIndex, priorIndex) {
					if (currentIndex === 2) {

						let m1val = $('#mTypeGet option:selected').text();
						let m2val = $('#namaTagihan').val();
						let m3val = $('#tanggalJatuhTempo').val();
						let m4val = $('#tanggalPenagihan').val();
						let m5val = $('#nominalTagihan').val();
						let m6val = $('#nominalTagihanFinal').val();

						let distext = '';

						let persenTagihan = $('#persenTagihan').val();
						if(parseInt(persenTagihan)!=0){
							distext = ' (Discount '+persenTagihan+"%)";
						}
						
						$('.m1').html(m1val);
						$('.m2').html(m2val+distext);
						$('.m3').html(moment(m3val).format('dddd, DD-MM-YYYY'));
						$('.m4').html(moment(m4val).format('dddd, DD-MM-YYYY'));
						$('.m5').html("Rp"+m6val);
						$('.m6').html(selectedIds.length+" orang");
					}
				},
				onFinished: function (event, currentIndex) {
					procAddTagihan();
				}
			});


            $(document).ready(function () {
                if('<?=$idJenisTagihan;?>'!=''){
					
                // Get the current URL from the address bar
                const currentUrl = window.location.href;

                // Split the URL by '/' to get its segments
                const segments = currentUrl.split('/');

                // Get the last segment
                const lastSegment = decodeURIComponent(segments.pop());

                // Decode the entire URI multiple times if needed
                let fullyDecodedTitle = decodeURIComponent(decodeURIComponent(lastSegment));

                console.log(fullyDecodedTitle); // Output: Infaq Jariah (Pembangunan) 2024/2025


                $('#mTypeGet').html('');
                    $('#mTypeGet').append($('<option>', { 
                        value: '<?=$idJenisTagihan;?>',
                        text : fullyDecodedTitle
                    }));

                }else {
                    getTagihanList();
                    console.log('no tagihan selected');
                }
				
            });

			function getTagihanList(){
			
				$('#mTypeGet').html('');
				$('#mTypeGet').append($('<option>', { 
					value: '',
					text : 'Pilih salah satu jenis'
				}));
				
				const save2 = async () => {
					const posts2 = await axios.get('<?= api_url_tagihan(); ?>api/master/jenis-tagihan', {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {
						console.log(err.response);
						
					});
			
					if (posts2.status == 200) {

						tableColumn='';
						
						posts2.data.data.map((mapping,i)=>{

							$('#mTypeGet').append($('<option>', { 
								value: mapping.id,
								text : mapping.name
							}));
						});
						
					}
				}
				save2();
			}

			function procAddTagihan() {

				showLoading();

				var mTypeGet = $("#mTypeGet").val();

                if(mTypeGet==''){
                    Toastify({
                        text: 'Jenis tagihan harus dipilih terlebih dahulu!',
                        duration: 3000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        className: "errorMessage",

                    }).showToast();

					hideLoading();

                    $('#btnSavePIN').html('<i class="bx bx-save"></i> Update PIN');
                    $('#btnSavePIN').attr('disabled', false);
                    $('#btnSavePIN').css('cursor', 'pointer');
                    return false;
                }
				
				let m1val = $('#mTypeGet').val();
				let m2val = $('.m2').html();
				let m3val = $('#tanggalJatuhTempo').val();
				let m4val = $('#tanggalPenagihan').val();
				let m5val = $('#nominalTagihan').val();
				let m6val = $('#nominalTagihanFinal').val();
				m6val = m6val.split('.').join("");

				nominal_new = m6val;

				// PROCESS 1
				var form_data = new FormData();
				form_data.append('jenis_tagihan_id', m1val);
				form_data.append('nama_tagihan', m2val);
				form_data.append('tanggal_mulai_tagihan', m4val);
				form_data.append('tanggal_jatuh_tempo', m3val);

				const save = async (form_data) => {
					const posts = await axios.post('<?= api_url_tagihan(); ?>api/tagihan', form_data, {
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
					if (posts.status == 201||posts.status == 200) {

						if (posts.data.success == true) {

							Toastify({
								text: posts.data.message,
								duration: 3000,
								close: true,
								gravity: "top",
								position: "right",
								className: "successMessage",

							}).showToast();

						} else {
							Toastify({
								text: posts.data.message,
								duration: 3000,
								close: true,
								gravity: "top",
								position: "right",
								className: "successMessage",

							}).showToast();
						}

						idsaved = posts.data.data.id;
						jenis_nominal_data = posts.data.data.jenis_nominal_data.nominal_tagihans[0].kategori_tagihan;
						console.log(idsaved,jenis_nominal_data);

						runUpdateNominalSpesificByIDTagihanCreated();
						
					}else if(posts.status==500){
						
						Toastify({
							text: "Server dalam perbaikan!",
							duration: 3000,
							close: true,
							gravity: "top",
							position: "right",
							className: "infoMessage",
	
						}).showToast();
					}else {
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
					}

				}
				// save(form_data);
				
				// axios.all([save(form_data), save3(form_data3)])
				// axios.all([save(form_data), save2(form_data2)])
				axios.all([save(form_data)])
				.then(axios.spread((response1, response2) => {
					// Handle success
				}))
				.catch(error => {
					// Handle error
					console.error(error);
					hideLoading();
				})
				.finally(() => {
					// Hide loading screen after all requests finish
					hideLoading();
				});

			}

			function runUpdateNominalSpesificByIDTagihanCreated(){
				// PROCESS 2
				var form_data2 = new FormData();
				form_data2.append(jenis_nominal_data, nominal_new);
				
				const save2 = async (form_data2) => {
					const posts = await axios.post('<?= api_url_tagihan(); ?>api/tagihan/'+idsaved+'/nominal', form_data2, {
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
					if (posts.status == 201||posts.status == 200) {

						if (posts.data.success == true) {

							hideLoading();

						} else {
							Toastify({
								text: 'Nominal telah disesuaikan!',
								duration: 3000,
								close: true,
								gravity: "top",
								position: "right",
								className: "successMessage",

							}).showToast();

							runSetUserTagihanByIDTagihanCreated();

						}

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
					}

				}
				save2(form_data2);
			}

			function runSetUserTagihanByIDTagihanCreated(){
                showLoading();
                        
				var form_data = new FormData();

				let desc = $('#deskripsiTagihan').val();
				let nominalsett = $('#nominalTagihanFinal').val();
				let persenTagihan = $('#persenTagihan').val();
				nominalsett = nominalsett.split('.').join("");

				form_data.append('tagihan_id', idsaved);
				// form_data.append('user_siswa_id', "["+selectedIds+"]");
				// form_data.append('oncard_siswa_id[]', selectedIds);
				selectedIds.forEach(id => {
					form_data.append('oncard_siswa_id[]', id);
				});
				form_data.append('nominal', nominalsett);
				form_data.append('jumlah_diskon', persenTagihan);
				form_data.append('keterangan', desc);

				const save = async (form_data) => {
					const posts = await axios.post('<?= api_url_tagihan(); ?>api/tagihan-siswa/buat-tagihan-oncard-siswa/multiple',form_data, {
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
						hideLoading();
					});

					if (posts.status == 200||posts.status == 201) {
						Toastify({
							text: posts.data.message,
							duration: 3000,
							close: true,
							gravity: "top",
							position: "right",
							className: "successMessage",

						}).showToast();

						arraySelected = []; //reset array selected ids
						window.location.href="<?=base_url();?>CPanel_Tagihan/JenisTagihan";
					} else {
						hideLoading();
					}
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