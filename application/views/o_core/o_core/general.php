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
							
							
						</div>
						<div class="table-responsive" style="margin-top:-15px;">
						<button class="btn btn-sm btn-outline-primary me-2 mb-3" id="btnSave2PDF" onclick="save2PDF('tabelPrint');" style="border-radius:0px;"><i class="bx bxs-file-export"></i> Export PDF</button>
						<button class="btn btn-sm btn-outline-success me-2 mb-3" onclick="saveToExcel('tabelsiswa');" style="border-radius:0px;"><i class="bx bxs-file-export"></i> Export Excel</button>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-12">
                                <div class="mb-3 mt-2">
                                    <label for="filter-user-type">Filter Mata Pelajaran:</label>
                                    <select id="filter-user-type" class="form-control" style="width:200px;">
                                        <option value="">All</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-lg-4 col-md-4 col-12">
                                <div class="mb-3 mt-2">
                                    <label for="filter-user-jabatan">Filter Jabatan:</label>
                                    <select id="filter-user-jabatan" class="form-control" style="width:200px;">
                                        <option value="">All</option>
                                    </select>
                                </div>
                            </div>
                        </div>
							<table id="example" class="tabelsiswa table table-hover tabelproduk" style="width:100%;font-size:12px!important;">
								<thead class="table-light">
									<tr>
										<th>No.</th>
										<th>Mata Pelajaran</th>
										<th>Mata Pelajaran</th>
										<th>Kelas</th>
										<th>Kelas</th>
										
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
							<h5 class="modal-title">Formulir Matapelajaran</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body addmodify">
							<div class="row g-3">
								<div class="col-md-12">
									<label for="setTingkat" style="display:block;" class="form-label">Tingkat</label>
									<select class="form-control" style="font-size:11px; width:100%;" id="setTingkat">
										<?php for($i=0;$i<12;$i++){?>
											<option value="<?=$i+1;?>"><?=$i+1;?></option>
										<?php } ?>
									</select>
								</div>
								<div class="col-md-12">
								<label for="setTingkat" style="display:block;" class="form-label">Kode MP</label>
									<div class="input-group">
										<span class="input-group-text" id="basic-addon1">MP</span>
										<input type="text" class="form-control" id="kodeMapel" placeholder="ex: MTK001" aria-label="Text input with prefix" aria-describedby="basic-addon1">
									</div>
								</div>
								<div class="col-md-12">
									<label for="namaMapel" class="form-label">Nama Mata Pelajaran</label>
									<input type="text" class="form-control" id="namaMapel" placeholder="ex : Matematika">
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
					columnDefs: [
						{
							targets: [4], // Column index (e.g., 1 for the second column)
							className: 'text-right' // Adds a class for right alignment
						}
					],
					order: [[0, 'asc']], // Order by "created_at" column in descending order (most recent first)
					ajax: function (data, callback) {
						axios.get('<?= api_url_core(); ?>api/general', {
							headers: {
								'Authorization': 'Bearer ' + localStorage.getItem('_token'),
								'nopaging' : false
							}
						}).then(response => {
								
								callback({
									data: response.data
								});
                                const records = response.data;
                                const userTypes = [...new Set(records.map(item => item.detail.mata_pelajaran))];
                                userTypes.forEach(type => {
                                    $('#filter-user-type').append(`<option value="${type}">${type}</option>`);
                                });
                                const userTypes2 = [...new Set(records.map(item => item.detail.jabatan))];
                                userTypes2.forEach(type => {
                                    $('#filter-user-jabatan').append(`<option value="${type}">${type}</option>`);
                                });
							})
							.catch(error => {
								console.error('Error fetching data:', error);
							});
					},
					columns: [
						{ 
							data: 'name', 
							title: 'Nama Siswa', 
							render: function (data, type, row) {
								
								return `<span class="kode-semester text-dark" style="font-weight: bold; ">
											${row.name}
										</span>`;
							} 
						},
						{ 
							data: 'detail.nip', 
							title: 'NIP', 
							render: function (data, type, row) {
								
								return `<span class="kode-kunjungan text-dark" style="font-weight: normal; ">
											${row.detail.nip??'not set'}
										</span>`;
							} 
						},
						{ 
							data: 'detail.mata_pelajaran', 
							title: 'Mata Pelajaran', 
							render: function (data, type, row) {
								
								return `<span class="kode-kunjungan text-dark" style="font-weight: normal; ">
											${row.detail.mata_pelajaran}
										</span>`;
							} 
						},
						{ 
							data: 'detail.jabatan', 
							title: 'Jabatan', 
							render: function (data, type, row) {
								
								return `<span class="kode-kunjungan text-dark" style="font-weight: normal; ">
											${row.detail.jabatan}
										</span>`;
							} 
						},
						{ 
							data: 'detail.tanggal_lahir', 
							title: 'Tanggal Lahir', 
							render: function (data, type, row) {
								
								return `<span class="kode-kunjungan text-dark" style="font-weight: normal; ">
											${row.detail.tanggal_lahir}
										</span>`;
							} 
						},
						
					],
					lengthMenu: [[20, 35, 50, -1], [20, 35, 50, "All"]], // Add "All" option
    				pageLength: 20 // Default page length
				} );
  

				showKelas();

				$('#setTingkat').select2({
					placeholder: 'Search options...',
					dropdownParent: $('#modalSetTagihan'), // Replace #myModal with the actual modal ID
					minimumInputLength: 0
				});

                $('#filter-user-type').on('change', function () {
                    const filterValue = $(this).val();
                    table.column(2).search(filterValue).draw(); // Column index 4 is 'user_type'
                });
                
                $('#filter-user-jabatan').on('change', function () {
                    const filterValue = $(this).val();
                    table.column(3).search(filterValue).draw(); // Column index 4 is 'user_type'
                });
            });

			let newpath = [];
			function showKelas(){
				axios.get('<?= api_url_core(); ?>api/master/kelas', {
					headers: {
						'Authorization': 'Bearer ' + localStorage.getItem('_token')
					}
				}).then(response => {
					console.log(response.data);
					response.data.map((mapping,i)=>{
						newpath.push({
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
						$('#setTingkat').append(option).trigger('change');
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
					const posts2 = await axios.get('<?= api_url_core(); ?>api/master/matapelajaran/'+str, {
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
								<h6 class="text-danger">${posts2.data.kode_matapelajaran}</h6>
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
						const posts2 = await axios.get('<?= api_url_core(); ?>api/master/matapelajaran/'+mode, {
							headers: {
								'Authorization': 'Bearer ' + localStorage.getItem('_token')
							}
						}).catch((err) => {
							console.log(err.response);
						});
				
						if (posts2.status == 200) {

							let semesterStrGet = posts2.data.kode_matapelajaran;
							semesterStrGet = semesterStrGet.split("-"); 
							$('#setTingkat').val(posts2.data.tingkat).trigger('change');
							$('#kodeMapel').val(semesterStrGet[1]);
							$('#namaMapel').val(posts2.data.name);
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
					url = '<?= api_url_core(); ?>api/master/matapelajaran';
				}else {
					url = '<?= api_url_core(); ?>api/master/matapelajaran/'+modesett;
				}


				var tingkat = $("#setTingkat").val();
				var namaMapel = $("#namaMapel").val();
				var kodeMapel = "MP-"+$("#kodeMapel").val();

				var form_data = new FormData();

				form_data.append('tingkat', tingkat);
				form_data.append('name', namaMapel);
				form_data.append('kode_matapelajaran', kodeMapel);
				form_data.append('type', "wajib");
				// form_data.append('jurusan_id', 1);
				
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