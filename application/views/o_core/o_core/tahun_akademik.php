<style>
.break-word {
    word-break: break-word; /* Break words when necessary */
    overflow-wrap: break-word; /* Ensures long words break correctly */
    white-space: normal; /* Allows the text to wrap normally */
}
.quota-info {
	display: flex;
	justify-content: space-between;
	margin-top: 10px;
}
.progress-container {
	width: 100%;
	margin: 0 auto;
}
.text-right {
        text-align: right;
    }
</style>
<div class="page-wrapper">
			<div class="page-content">
				<div class="row">
                   <div class="col">
					 <div class="card radius-1">
						<div class="card-body">
							<div class="d-lg-flex align-items-center mb-4 gap-3">
							<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
								<div class="breadcrumb-title pe-3"><?=$pageTitle;?></div>
								<div class="ps-3">
									<nav aria-label="breadcrumb">
										<ol class="breadcrumb mb-0 p-0">
											<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
											</li>
											<li class="breadcrumb-item active" aria-current="page">Kelola <?=$pageTitle;?></li>
										</ol>
									</nav>
								</div>
							</div>
							
							<div class="ms-auto">
								<a href="#/" onclick="modalAddModify('add');" class="btn btn-success radius-30 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i> Tambah Data</a>
							</div>
						</div>
						<div class="table-responsive" style="margin-top:-15px;">
						<button class="btn btn-sm btn-outline-primary me-2 mb-3" id="btnSave2PDF" onclick="save2PDF('tabelPrint');" style="border-radius:0px;"><i class="bx bxs-file-export"></i> Export PDF</button>
						<button class="btn btn-sm btn-outline-success me-2 mb-3" onclick="saveToExcel('tabelsiswa');" style="border-radius:0px;"><i class="bx bxs-file-export"></i> Export Excel</button>
							<table id="example" class="tabelsiswa table table-hover tabelproduk" style="width:100%;font-size:12px!important;">
								<thead class="table-light">
									<tr>
										<th>No.</th>
										<th>Kode Tahun Akademik</th>
										<th>Tahun Akademik</th>
										<th>Tanggal Mulai</th>
										<th>Tanggal Selesai</th>
										<th>Kelas Tersubmit</th>
										<th>Siswa Tersubmit</th>
									</tr>
								</thead>
							</table>
						</div>
					 </div>
				   </div>
				  </div>
				</div><!--end row-->

			</div>

			<div class="modal fade" id="modalViewDetails" tabindex="-1" aria-hidden="true">
				<div class="modal-dialog modal-sm modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title titledetail">Details</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body puter table-responsive">

						</div>
						<div class="modal-footer text-center">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
						</div>
					</div>
				</div>
			</div>
			
			<div class="modal fade" id="modalSetTagihan" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Formulir Tahun Akademik</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body addmodify">
                <div class="row g-3">
                    <div class="col-md-12">
                        <label for="tanggal_mulai" class="form-label">Pilih Tahun</label>
                        <input type="date" class="form-control" id="tanggal_mulai" onchange="updateYears();">
                    </div>
                    <div class="col-md-12">
                        <label for="tanggal_selesai" class="form-label">Tahun Selesai</label>
                        <input type="date" class="form-control" id="tanggal_selesai" disabled readonly>
                    </div>

                    <div class="col-md-12">
                        <label for="kode_tahun_akademik" class="form-label">Kode Tahun Akademik</label>
                        <input type="text" class="form-control" id="kode_tahun_akademik" disabled readonly>
                        <small class="text-muted"><font class="text-danger">(*)</font> Otomatis ditentukan oleh sistem.</small>
                    </div>

                    <div class="col-md-12">
                        <label for="tahun_akademik" class="form-label">Tahun Akademik</label>
                        <input type="text" class="form-control" id="tahun_akademik" disabled readonly>
                        <small class="text-muted"><font class="text-danger">(*)</font> Otomatis ditentukan oleh sistem.</small>
                    </div>

                    <div class="col-md-12">
                        <label for="semester_string" class="form-label">Semester</label>
                        <select class="form-control" id="semester_string" onchange="updateYears();">
                            <option value="Ganjil">Ganjil</option>
                            <option value="Genap">Genap</option>
                        </select>
                    </div>

                    <div class="col-md-12">
                        <label for="semester_start" class="form-label">Tanggal Mulai Semester</label>
                        <input type="date" class="form-control" id="semester_start" disabled readonly>
                    </div>
                    <div class="col-md-12">
                        <label for="semester_end" class="form-label">Tanggal Selesai Semester</label>
                        <input type="date" class="form-control" id="semester_end" disabled readonly>
                    </div>
                </div>
            </div>
            <div class="modal-footer text-center">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-success" id="submitBtnTagihan" disabled onclick="procModifyTahunAkdemik();">Simpan</button>
            </div>
        </div>
    </div>
</div>

			
		</div>

		<script src="https://pawelgrzybek.github.io/siema/assets/siema.min.js"></script>

        <script type="text/javascript">
			
			let idsett;
			let modesett;

			let tahun_mulai_sett;
			let tahun_selesai_sett;

			let table;

            function generateRandomCode() {
                return Math.floor(100 + Math.random() * 900);
            }

			$(document).ready(function () {
				// getTahunAkademik();

				table = $('#example').DataTable( {
					fixedHeader: true,
					"processing": true,
					//"serverSide": true,
					"searching": true,
					order: [[0, 'asc']], // Order by "created_at" column in descending order (most recent first)
					ajax: function (data, callback) {
						axios.get('<?= api_url_core(); ?>api/master/semester/list', {
							headers: {
								'Authorization': 'Bearer ' + localStorage.getItem('_token')
							}
						}).then(response => {
							// Pass the retrieved data to DataTables
							callback({
								data: response.data
							});
						})
						.catch(error => {
							console.error('Error fetching data:', error);
						});
					},
					columns: [
						{ 
							data: 'kode_tahun_akademik', 
							title: 'Tahun Akademik', 
							render: function (data, type, row) {
								// Add custom styling and format the content
								return `<span class="kode-kunjungan text-dark" style="font-weight: bold; ">
											${row.tahun_akademik.tahun_akademik}
										</span>`;
							} 
						},            // Maps to 'id' field from response
						{ data: 'semester', title: 'Semester' },
						{ 
							data: null, 
							title: 'Mulai', 
							render: function (data, type, row) {
								// Add custom styling and format the content
								return `${moment(data.tanggal_mulai).format('dddd, DD-MM-YYYY')}`;
							} 
						},
						{ 
							data: null, 
							title: 'Berakhir', 
							render: function (data, type, row) {
								// Add custom styling and format the content
								return `${moment(data.tanggal_selesai).format('dddd, DD-MM-YYYY')}`;
							} 
						},
						{ 
							data: null, 
							title: 'Kelas Tersubmit', 
							render: function (data, type, row) {
								// Add custom styling and format the content
								return `${data.jumlah_kelas}`;
							} 
						},
						{ 
							data: null, 
							title: 'Siswa Tersubmit', 
							render: function (data, type, row) {
								// Add custom styling and format the content
								return `${data.jumlah_siswa_terdaftar}`;
							} 
						},
						{ 
							data: null, 
							title: 'Action',
							orderable: false,
							render: function (data, type, row) {
								return `
									<button class="btn btn-primary btn-sm" style="font-size:11px;" onclick="showDetails('${row.id}')"><i class="bx bx-info-circle" style="font-size:1.6em;"></i> Info</button>
									<!---<button class="btn btn-warning btn-sm" style="font-size:11px;" onclick="modalAddModify('${row.id}')"><i class="bx bx-edit" style="font-size:1.6em;"></i> Edit</button>--->
								`;
							}
						}
					],
					lengthMenu: [[20, 35, 50, -1], [20, 35, 50, "All"]], // Add "All" option
    				pageLength: 20 // Default page length
				} );
  
            });

			function showDetails(str){

				$('#modalViewDetails').modal('toggle');

				$('.puter').html('<div class="row"><div class="col-12 text-center">Loading...</div></div>');

				const save2 = async () => {
					const posts2 = await axios.get('<?= api_url_core(); ?>api/master/semester/'+str, {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {
						console.log(err.response);
					});
			
					if (posts2.status == 200) {

						tableColumn='';

						console.log(posts2.data);
						
						tableColumn+=`
							
								<small>Kode</small><br/>
								<h6 class="text-danger">${posts2.data.kode_semester}</h6>
							<p>
								<small>Tanggal Terbuat</small><br/>
								${moment(posts2.data.created_at).format('dddd, DD-MM-YYYY')}
							</p>
							<p>
								<small>Jam Terbuat</small><br/>
								${moment(posts2.data.created_at).format('HH:mm:ss')} WIB
							</p>
						`; 

						tableColumn +='</table>';
						$('.titledetail').html("TA "+posts2.data.kode_tahun_akademik);
						$('.puter').html(tableColumn);
						
					}
				}
				save2();

				
			}
			
			function runGetSUMTagihanByJenisID(str){

				$('.progress-container').html('<div class="row"><div class="col-12 text-center">Loading...</div></div>');

				const save2 = async () => {
					const posts2 = await axios.get('<?= api_url_tagihan(); ?>api/dashboard/sum-jenis-tagihan-byid/'+str, {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {
						console.log(err.response);
					});
			
					if (posts2.status == 200) {

						tableColumn='';
						let terbayar = posts2.data.jenis_tagihan_lunas;
						let belumterbayar = posts2.data.jenis_tagihan_belum_lunas;
						let total = parseInt(terbayar)+parseInt(belumterbayar);

						let percent = (terbayar/total)*100;
						percent = Math.round(percent);

						console.log(posts2.data);
						tableColumn+=`
							<h6 class="text-center"><b>Progress Kelengkapan Tagihan</b></h6>
							<div class="progress" style="height: 30px;">
								<div class="progress-bar bg-primary" role="progressbar" id="progressAll" style="width: ${percent}%;" aria-valuenow="${percent}" aria-valuemin="0" aria-valuemax="100">${percent}%</div>
							</div>
							<div class="quota-info">
								<span id="tagihanterbayar">Rp${formatRupiah(posts2.data.jenis_tagihan_lunas.toString())}</span>
								<span id="totaltagihan">Rp${formatRupiah(total.toString())}</span>
							</div>
						`; 
						$('.progress-container').html(tableColumn);
						
					}
				}
				save2();

				
			}

			function modalAddModify(mode){
				modesett = mode;

				if(mode!='add'){

					const save2 = async () => {
						const posts2 = await axios.get('<?= api_url_core(); ?>api/master/tahun-akademik/'+mode, {
							headers: {
								'Authorization': 'Bearer ' + localStorage.getItem('_token')
							}
						}).catch((err) => {
							console.log(err.response);
						});
				
						if (posts2.status == 200) {
							$('#tanggal_mulai').val(posts2.data.tanggal_mulai);
							$('#tanggal_selesai').val(posts2.data.tanggal_selesai);
							$('#kode_tahun_akademik').val(posts2.data.kode_tahun_akademik);
							$('#tahun_akademik').val(posts2.data.tahun_akademik);
						}
					}
					save2();
				}
				$('#modalSetTagihan').modal('toggle');
			}

			function procModifyTahunAkdemik(){
				$('#submitBtnTagihan').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Memproses...');
				$('#submitBtnTagihan').attr('disabled', 'disabled');
				$('#submitBtnTagihan').css('cursor', 'not-allowed');

				let url = '';
				if(modesett=='add'){
					url = '<?= api_url_core(); ?>api/master/tahun-akademik';
				}else {
					url = '<?= api_url_core(); ?>api/master/tahun-akademik/'+modesett;
				}

				var tanggal_mulai = $("#tanggal_mulai").val();
				var tanggal_selesai = $("#tanggal_selesai").val();
				var kode_tahun_akademik = $("#kode_tahun_akademik").val();
				var tahun_akademik = $("#tahun_akademik").val();
				
				var form_data = new FormData();

				form_data.append('tanggal_mulai', tanggal_mulai);
				form_data.append('tanggal_selesai', tanggal_selesai);
				form_data.append('kode_tahun_akademik', kode_tahun_akademik+"-"+generateRandomCode());
				form_data.append('tahun_akademik', tahun_akademik);
				
				const save = async (str) => {
					const posts = await axios.post(url,form_data, {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {
							Toastify({
								text: err.response.data.error,
								duration: 3000,
								close: true,
								gravity: "top",
								position: "right",
								className: "errorMessage",

							}).showToast();

							$('#submitBtnTagihan').html('Simpan');
							$('#submitBtnTagihan').attr('disabled', false);
							$('#submitBtnTagihan').css('cursor', 'pointer');

							return false;
					});

					if (posts.status == 200||posts.status == 201) {
						Toastify({
							text: 'Berhasil tersimpan.',
							duration: 3000,
							close: true,
							gravity: "top",
							position: "right",
							className: "successMessage",

						}).showToast();
						
						idsett = '';
						modesett = '';

                        runAddSemester('add',posts.data.tahun_akademik,posts.data.id);
						
						$('#submitBtnTagihan').html('Simpan');
						$('#submitBtnTagihan').attr('disabled', false);
						$('#submitBtnTagihan').css('cursor', 'pointer');

					} else {

					}
				}
				save(form_data);
			}

            function runAddSemester(mode,ta_val,ta_id){
                
                modesett = mode;

				$('#submitBtnTagihan').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Memproses...');
				$('#submitBtnTagihan').attr('disabled', 'disabled');
				$('#submitBtnTagihan').css('cursor', 'not-allowed');

				let url = '';
				if(modesett=='add'){
					url = '<?= api_url_core(); ?>api/master/semester';
				}else {
					url = '<?= api_url_core(); ?>api/master/semester/'+modesett;
				}


				var tanggal_mulai = $("#semester_start").val();
				var tanggal_selesai = $("#semester_end").val();
				var semester_string = $("#semester_string").val();

				let kodeSemester = ta_val;

				const [tahunMulai, tahunSelesai] = kodeSemester.split("/");

				let kodeSemesterSett = tahunMulai+"-"+semester_string;
				let semesterSett = semester_string;
				
				
				var form_data = new FormData();

				form_data.append('tanggal_mulai', tanggal_mulai);
				form_data.append('tanggal_selesai', tanggal_selesai);
				form_data.append('tahun_akademik_id', ta_id);
				form_data.append('kode_semester', kodeSemesterSett);
				form_data.append('semester', semesterSett);
				
				const save = async (str) => {
					const posts = await axios.post(url,form_data, {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {
							Toastify({
								text: err.response.data.error,
								duration: 3000,
								close: true,
								gravity: "top",
								position: "right",
								className: "errorMessage",

							}).showToast();

							$('#submitBtnTagihan').html('Simpan');
							$('#submitBtnTagihan').attr('disabled', false);
							$('#submitBtnTagihan').css('cursor', 'pointer');

							return false;
					});

					if (posts.status == 200||posts.status == 201) {
						Toastify({
							text: 'Berhasil tersimpan.',
							duration: 3000,
							close: true,
							gravity: "top",
							position: "right",
							className: "successMessage",

						}).showToast();
						$('#modalSetTagihan').modal('toggle');
						
						idsett = '';
						modesett = '';
						
						$('#submitBtnTagihan').html('Simpan');
						$('#submitBtnTagihan').attr('disabled', false);
						$('#submitBtnTagihan').css('cursor', 'pointer');

						table.ajax.reload();

					} else {

					}
				}
				save(form_data);
			}

			function updateYears() {
                const startYearInput = document.getElementById("tanggal_mulai");
                const endYearInput = document.getElementById("tanggal_selesai");
                const tahunAkademik = document.getElementById("tahun_akademik");
                const semesterStart = document.getElementById("semester_start");
                const semesterEnd = document.getElementById("semester_end");
                const semesterSelect = document.getElementById("semester_string");
                const kodeTahunAkademik = document.getElementById("kode_tahun_akademik");

                let startYear = startYearInput.value ? new Date(startYearInput.value).getFullYear() : "";
                
                if (!startYear) {
                    Toastify({
                        text: 'Oops! Pilih tahun mulai terlebih dahulu!',
                        duration: 3000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        className: "errorMessage",
                    }).showToast();

                    return;
                }

                let nextYear = startYear + 1;
                endYearInput.value = `${nextYear}-06-30`; // Always end on June 30

                // Set Academic Year (e.g., 2025/2026)
                tahunAkademik.value = `${startYear}/${nextYear}`;
                kodeTahunAkademik.value = `${startYear}-${nextYear}`;

                // Set Semester Dates based on selection
                if (semesterSelect.value === "Ganjil") {
                    semesterStart.value = `${startYear}-07-01`; // 1st July of start year
                    semesterEnd.value = `${startYear}-12-31`; // 31st December of start year
                } else if (semesterSelect.value === "Genap") {
                    semesterStart.value = `${nextYear}-01-01`; // 1st January of next year
                    semesterEnd.value = `${nextYear}-06-30`; // 30th June of next year
                }

                // Enable Submit Button
                document.getElementById("submitBtnTagihan").disabled = false;
                document.getElementById("submitBtnTagihan").style.cursor = "pointer";
            }
        </script>