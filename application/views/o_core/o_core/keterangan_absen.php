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
										<th>Keterangan</th>
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
							<h5 class="modal-title">Formulir Kategori Absen</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body addmodify">
							<div class="row g-3">
								<div class="col-md-12">
								<label for="setTingkat" style="display:block;" class="form-label">Kategori</label>
									<div class="input-group">
										<input type="text" class="form-control" id="namaKeterangan" placeholder="ex: Absen Kehadiran" aria-label="Text input with prefix" aria-describedby="basic-addon1">
									</div>
								</div>
								
							</div>
						</div>
						<div class="modal-footer text-center">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
							<button type="button" class="btn btn-success" id="submitBtnTagihan" onclick="procModifyKategoriAbsen();">Simpan</button>
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
					columnDefs: [
						{
							targets: [1], // Column index (e.g., 1 for the second column)
							className: 'text-right' // Adds a class for right alignment
						}
					],
					order: [[1, 'asc']], // Order by "created_at" column in descending order (most recent first)
					ajax: function (data, callback) {
						axios.get('<?= api_url_core(); ?>api/master/keterangan-absen', {
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
							data: 'name', 
							title: 'Kategori', 
							render: function (data, type, row) {
								
								return `<span class="kode-semester text-primary" style="font-weight: bold;text-transform:uppercase; ">
											${row.name}
										</span>`;
							} 
						},
						{ 
							data: null, 
							title: 'Action',
							orderable: false,
							render: function (data, type, row) {
								return `
									<button class="btn btn-primary btn-sm" style="font-size:11px;" onclick="showDetails('${row.id}')"><i class="bx bx-info-circle" style="font-size:1.6em;"></i> Info</button>
									<button class="btn btn-warning btn-sm" style="font-size:11px;" onclick="modalAddModify('${row.id}')"><i class="bx bx-edit" style="font-size:1.6em;"></i> Edit</button>
									<button class="btn btn-danger ms-4 btn-sm" style="font-size:11px;" onclick="openModalDeleteNew('${row.id}','keterangan-absen')"><i class="bx bx-trash" style="font-size:1.6em;"></i> Delete</button>
								`;
							}
						}
					],
					lengthMenu: [[20, 35, 50, -1], [20, 35, 50, "All"]], // Add "All" option
    				pageLength: 20 // Default page length
				} );
  

				showTahunAkademik();

				$('#setTingkat').select2({
					placeholder: 'Search options...',
					dropdownParent: $('#modalSetTagihan'), // Replace #myModal with the actual modal ID
					minimumInputLength: 0
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
					const posts2 = await axios.get('<?= api_url_core(); ?>api/master/keterangan-absen/'+str, {
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
							
								<small>Tanggal Terbuat</small><br/>
								${moment(posts2.data.created_at).format('dddd, DD-MM-YYYY')}
							</p>
							<p>
								<small>Jam Terbuat</small><br/>
								${moment(posts2.data.created_at).format('HH:mm:ss')} WIB
							</p>
						`; 

						tableColumn +='</table>';
						$('.titledetail').html(posts2.data.name);
						$('.puter').html(tableColumn);
						
					}
				}
				save2();

				
			}
			
			function modalAddModify(mode){
				modesett = mode;

				if(mode!='add'){

					const save2 = async () => {
						const posts2 = await axios.get('<?= api_url_core(); ?>api/master/keterangan-absen/'+mode, {
							headers: {
								'Authorization': 'Bearer ' + localStorage.getItem('_token')
							}
						}).catch((err) => {
							console.log(err.response);
						});
				
						if (posts2.status == 200) {

							let semesterStrGet = posts2.data.name;
							$('#namaKeterangan').val(semesterStrGet);
						}
					}
					save2();
				}
				$('#modalSetTagihan').modal('toggle');
			}

			function procModifyKategoriAbsen(){
				$('#submitBtnTagihan').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Memproses...');
				$('#submitBtnTagihan').attr('disabled', 'disabled');
				$('#submitBtnTagihan').css('cursor', 'not-allowed');

				let url = '';
				if(modesett=='add'){
					url = '<?= api_url_core(); ?>api/master/keterangan-absen';
				}else {
					url = '<?= api_url_core(); ?>api/master/keterangan-absen/'+modesett;
				}


				var namaKeterangan = $("#namaKeterangan").val();
				
				var form_data = new FormData();

				form_data.append('name', namaKeterangan);
				
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