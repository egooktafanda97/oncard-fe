<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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
.select2-container--open {
    z-index: 9999999 !important; /* Ensure Select2 dropdown appears above the modal */
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
										<th>Kode Semester</th>
										<th>Semester</th>
										<th>Tanggal Mulai</th>
										<th>Tanggal Selesai</th>
										<th>Status</th>
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
				<div class="modal-dialog modal-sm modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Formulir Semester</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body addmodify">
							<div class="row g-3">
								<div class="col-md-12">
									<label for="setTahunAkademik" style="display:block;" class="form-label">Tahun Akademik</label>
									<select class="form-control" style="font-size:11px; width:100%;" id="setTahunAkademik">
										<option value="">Cari tahun akademik</option>
									</select>
								</div>
								<div class="col-md-12">
									<label for="semester_string" style="display:block;" class="form-label">Semester</label>
									<select class="form-control" style=" width:100%;" id="semester_string">
										<option value="Ganjil">Ganjil</option>
										<option value="Genap">Genap</option>
									</select>
								</div>

								<div class="col-md-12">
									<label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
									<input type="date" class="form-control" id="tanggal_mulai" placeholder="Cth : Iuran Komite">
								</div>
								<div class="col-md-12">
									<label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
									<input type="date" class="form-control" id="tanggal_selesai" placeholder="Cth : Iuran Komite">
								</div>

							</div>
						</div>
						<div class="modal-footer text-center">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
							<button type="button" class="btn btn-success" id="submitBtnTagihan" onclick="procModifyTahunAkdemik();">Simpan</button>
						</div>
					</div>
				</div>
			</div>
			
		</div>

		<script src="https://pawelgrzybek.github.io/siema/assets/siema.min.js"></script>

        <script type="text/javascript">
			
			let idsett;
			let idsett2;
			let modesett;

			let tahun_mulai_sett;
			let tahun_selesai_sett;

			let table;

			$(document).ready(function () {
				// getTahunAkademik();

				table = $('#example').DataTable( {
					fixedHeader: true,
					"processing": true,
					//"serverSide": true,
					"searching": true,
					order: [[0, 'asc']], // Order by "created_at" column in descending order (most recent first)
					ajax: function (data, callback) {
						axios.get('<?= api_url_core(); ?>api/master/semester', {
							headers: {
								'Authorization': 'Bearer ' + localStorage.getItem('_token')
							}
						}).then(response => {
								
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
							data: 'kode_semester', 
							title: 'Kode Semester', 
							render: function (data, type, row) {
								
								return `<span class="kode-semester text-primary" style="font-weight: bold; ">
											${row.kode_semester}
										</span>`;
							} 
						},
						{ 
							data: 'kode_tahun_akademik', 
							title: 'Kode Tahun Akademik', 
							render: function (data, type, row) {
								
								return `<span class="kode-kunjungan text-dark" style="font-weight: bold; ">
											${row.tahun_akademik_id}
										</span>`;
							} 
						},
						{ data: 'semester', title: 'Semester' },          // Maps to 'age' field
						{ 
							data: null, 
							title: 'Mulai', 
							render: function (data, type, row) {
								
								return `${moment(data.tanggal_mulai).format('dddd, DD-MM-YYYY')}`;
							} 
						},
						{ 
							data: null, 
							title: 'Berakhir', 
							render: function (data, type, row) {
								
								return `${moment(data.tanggal_selesai).format('dddd, DD-MM-YYYY')}`;
							} 
						},
						{ data: 'status_id', title: 'Status' },  // Maps to 'address' field
						{ 
							data: null, 
							title: 'Action',
							orderable: false,
							render: function (data, type, row) {
								return `
									<button class="btn btn-primary btn-sm" style="font-size:11px;" onclick="showDetails('${row.id}')"><i class="bx bx-info-circle" style="font-size:1.6em;"></i> Info</button>
									<button class="btn btn-warning btn-sm" style="font-size:11px;" onclick="modalAddModify('${row.id}')"><i class="bx bx-edit" style="font-size:1.6em;"></i> Edit</button>
								`;
							}
						}
					],
					lengthMenu: [[20, 35, 50, -1], [20, 35, 50, "All"]], // Add "All" option
    				pageLength: 20 // Default page length
				} );
  

				showTahunAkademik();

				$('#setTahunAkademik').select2({
					placeholder: 'Search options...',
					dropdownParent: $('#modalSetTagihan'), // Replace #myModal with the actual modal ID
					minimumInputLength: 0
				}).on('change', function (e) {
					// Your code here
					const selectedValue = $(this).val(); // Get the selected value
					idsett = selectedValue; //set id tahun akademik
					idsett2 = $(this).find('option:selected').text();

					const foundItem = newpath.find(item => item.kode_tahun_akademik === parseInt(selectedValue));
					const tahunMulai = foundItem.tahun_mulai;
					$('#tanggal_mulai').val(tahunMulai);
				});


            });

			let newpath = [];
			function showTahunAkademik(){
				axios.get('<?= api_url_core(); ?>api/master/tahun-akademik', {
					headers: {
						'Authorization': 'Bearer ' + localStorage.getItem('_token')
					}
				}).then(response => {
					console.log(response.data);
					response.data.map((mapping,i)=>{
						newpath.push({
							'tahun_mulai' : mapping.tanggal_mulai,
							'tahun_selesai' : mapping.tanggal_selesai,
							'tahun_akademik' : mapping.tahun_akademik,
							'kode_tahun_akademik' : mapping.id,
						})
					});

					// Convert tahun_mulai to date objects for comparison
					newpath.sort((a, b) => {
						const dateA = new Date(a.tahun_mulai);
						const dateB = new Date(b.tahun_mulai);
						return dateA - dateB;
					});

					newpath.map((mapping,i)=>{
						const option = new Option(mapping.tahun_akademik, mapping.kode_tahun_akademik, true, true);
						
						// Append it to the select2 dropdown
						$('#setTahunAkademik').append(option).trigger('change');
					});


					console.log(newpath);
				})
				.catch(error => {
					console.error('Error fetching data:', error);
				});
			}

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
						$('.titledetail').html("TA "+posts2.data.kode_semester);
						$('.puter').html(tableColumn);
						
					}
				}
				save2();

				
			}
			
			function modalAddModify(mode){
				modesett = mode;

				if(mode!='add'){

					const save2 = async () => {
						const posts2 = await axios.get('<?= api_url_core(); ?>api/master/semester/'+mode, {
							headers: {
								'Authorization': 'Bearer ' + localStorage.getItem('_token')
							}
						}).catch((err) => {
							console.log(err.response);
						});
				
						if (posts2.status == 200) {

							let semesterStrGet = posts2.data.kode_semester;
							semesterStrGet = semesterStrGet.split("-");
							$('#setTahunAkademik').val(posts2.data.tahun_akademik_id).trigger('change');
							$('#semester_string').val(semesterStrGet[1]);
							$('#tanggal_mulai').val(posts2.data.tanggal_mulai);
							$('#tanggal_selesai').val(posts2.data.tanggal_selesai);
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
					url = '<?= api_url_core(); ?>api/master/semester';
				}else {
					url = '<?= api_url_core(); ?>api/master/semester/'+modesett;
				}


				var tanggal_mulai = $("#tanggal_mulai").val();
				var tanggal_selesai = $("#tanggal_selesai").val();
				var semester_string = $("#semester_string").val();

				let kodeSemester = idsett2;

				const [tahunMulai, tahunSelesai] = kodeSemester.split("/");

				let kodeSemesterSett = tahunMulai+"-"+semester_string;
				let semesterSett = semester_string+" "+tahunMulai;
				
				
				var form_data = new FormData();

				form_data.append('tanggal_mulai', tanggal_mulai);
				form_data.append('tanggal_selesai', tanggal_selesai);
				form_data.append('tahun_akademik_id', idsett);
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
        </script>