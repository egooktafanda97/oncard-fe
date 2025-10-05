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
                   <div class="col-lg-8 col-12">
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
							<table id="example" class="tabelsiswa table table-hover tabelproduk" style="width:100%;font-size:11px!important;">
								<thead class="table-light">
									<tr>
										<th>Tingkat</th>
										<th>Kelas</th>
										<th>Kelas</th>
										<th>Status</th>
									</tr>
								</thead>
							</table>
						</div>
					 </div>
				   </div>

                   
				  </div>

                  <div class="col-lg-4 col-12">
                        <div class="row">
                            <div class="col-12">
                                <div class="card radius-1" style="border-radius:15px;box-shadow:5px 15px 20px #eee;">
                                    <div class="card-header">
                                        <div class="pe-3 mtp my-3 header1" style="font-size:16px; font-weight:800;">Daftar Pelajar</div>
                                        
                                    </div>
                                    <div class="card-body putcontentnexthere">
                                        
                                        
                                    </div>
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
							<h5 class="modal-title">Kelas</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body addmodify">
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <label for="setKelas" style="display:block;" class="form-label">Tingkat</label>
                                    <select class="form-control" style="font-size: 13px; width:100%;" id="setKelas">
                                        <optgroup label="PAUD/TK/Sederajat">
                                            <option value="100">100 (PAUD/TK)</option>
                                        </optgroup>
                                        <optgroup label="SD/MI/Sederajat">
                                            <?php for($i=0;$i<6;$i++){ ?>
                                                <option value="<?= $i+1; ?>"><?= $i+1; ?></option>
                                            <?php } ?>
                                        </optgroup>
                                        <optgroup label="SMP/MTS/Sederajat">
                                            <?php for($i=6;$i<9;$i++){ ?>
                                                <option value="<?= $i+1; ?>"><?= $i+1; ?></option>
                                            <?php } ?>
                                        </optgroup>
                                        <optgroup label="SMA/MA/Sederajat">
                                            <?php for($i=9;$i<12;$i++){ ?>
                                                <option value="<?= $i+1; ?>"><?= $i+1; ?></option>
                                            <?php } ?>
                                        </optgroup>
                                        <optgroup label="Alumni / Tidak Aktif Lagi">
                                            <option value="101">101. ALUMNI</option>
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label for="namaKelas" style="display:block;" class="form-label">Nama Kelas</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="namaKelas" placeholder="Nama kelas" aria-label="Text input with prefix">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="combinedKelas" style="display:block;" class="form-label">Kombinasi Tingkat & Kelas</label>
                                    <input type="text" class="form-control" id="combinedKelas" placeholder="Not set" disabled readonly>
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
			let idsettKelas;
			let modesett;

			let tahun_mulai_sett;
			let tahun_selesai_sett;

			let table;

            function updateCombinedValue() {
                let tingkat = document.getElementById('setKelas').value;
                let kelas = document.getElementById('namaKelas').value.trim();
                let combinedField = document.getElementById('combinedKelas');
                let submitBtn = document.getElementById('submitBtnTagihan');

                // Update the combined field
                combinedField.value = tingkat && kelas ? `${tingkat}.${kelas}` : 'Not set';

                // Enable or disable the submit button
                if (tingkat && kelas) {
                    submitBtn.removeAttribute('disabled');
                    submitBtn.style.cursor = 'pointer';
                } else {
                    submitBtn.setAttribute('disabled', 'disabled');
                    submitBtn.style.cursor = 'not-allowed';
                }
            }

            document.getElementById('setKelas').addEventListener('change', updateCombinedValue);
            document.getElementById('namaKelas').addEventListener('input', updateCombinedValue);

            // Disable the button initially
            document.addEventListener("DOMContentLoaded", function () {
                document.getElementById('submitBtnTagihan').setAttribute('disabled', 'disabled');
            });

			$(document).ready(function () {
				// getTahunAkademik();

				table = $('#example').DataTable( {
					fixedHeader: true,
					"processing": true,
					//"serverSide": true,
					"searching": true,
					columnDefs: [
						{
							targets: [1,2,3], // Column index (e.g., 1 for the second column)
							className: 'text-right' // Adds a class for right alignment
						}
					],
					order: [[0, 'asc']], // Order by "created_at" column in descending order (most recent first)
					ajax: function (data, callback) {
						axios.get('<?= api_url_core(); ?>api/master/siswa-kelas/classroom', {
							headers: {
								'Authorization': 'Bearer ' + localStorage.getItem('_token')
							}
						}).then(response => {
								
                            console.log("+",response.data.classrooms);

								callback({
									data: response.data.classrooms
								});
                                
							})
							.catch(error => {
								console.error('Error fetching data:', error);
							});
					},
					columns: [
						{ 
							data: 'classrooms.name', 
							title: 'Kelas', 
							render: function (data, type, row) {
								
								return `<span class="kode-kunjungan text-dark" style="font-weight: bold;font-size:14px; ">
											${row.name}
										</span>`;
							} 
						},
						
						
                        { 
							data: 'classrooms.name', 
							title: 'Nama Pelajar', 
							render: function (data, type, row) {
								
								return `<span class="kode-kunjungan text-dark" style="font-weight: normal;font-size:12px; ">
											${row.students.length} data
										</span>`;
							} 
						},
						
						
                        { 
							data: 'classrooms.class_id', 
							title: 'Lihat Pelajar', 
							render: function (data, type, row) {
								
								return `<button class="btn btn-info btn-sm text-white" style="font-size:11px;" onclick="goToKelasSiswa('${row.sub_class_id}','${row.class_id}')"><i class="bx bx-cog" style="font-size:1.6em;"></i> Kelola Pelajar</button>`;
							} 
						},
						{ 
							data: null, 
							title: 'Action',
							orderable: false,
							render: function (data, type, row) {
    let studented = row.students;

    // Ensure `studented` is a string before calling `.replace()`
    if (typeof studented === 'string') {
        studented = studented.replace(/'/g, "`");
    } else {
        // Convert it to a string if it's not
        studented = String(studented).replace(/'/g, "`");
    }

    return `
        <button class="btn btn-primary btn-sm" style="font-size:11px;" onclick="showDetails('${row.id}','${studented}','${row.name}')">
            <i class="bx bx-show-alt" style="font-size:1.6em;"></i> Preview List Pelajar
        </button>
        <!---<button class="btn btn-warning btn-sm" style="font-size:11px;" onclick="modalAddModify('${row.id}')">
            <i class="bx bx-edit" style="font-size:1.6em;"></i> Edit
        </button>--->
        <!---<button class="btn btn-danger ms-4 btn-sm" style="font-size:11px;" onclick="openModalDeleteNew('${row.id}','sub-kelas')">
            <i class="bx bx-trash" style="font-size:1.6em;"></i> Delete
        </button>--->
    `;
}

						}
					],
					lengthMenu: [[20, 35, 50, -1], [20, 35, 50, "All"]], // Add "All" option
    				pageLength: 20 // Default page length
				} );
  

				showKelas();

            });

            function goToKelasSiswa(str,idKelas){
                window.location.href='<?=base_url();?>CPanel_Core/ManageKelasSiswa/'+idKelas+"/"+str;
            }

			let newpath = [];
			let newpath3 = [];
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

			function showKelas(){

				axios.get('<?= api_url_core(); ?>api/master/kelas', {
					headers: {
						'Authorization': 'Bearer ' + localStorage.getItem('_token')
					}
				}).then(response => {
					console.log(response.data);
					response.data.map((mapping,i)=>{
						newpath3.push({
							'tingkat' : mapping.tingkat,
							'kode_kelas' : mapping.id,
							'name' : mapping.name,
						})
					});

					newpath3.sort((a, b) => a.tingkat - b.tingkat);


					console.log(newpath3);
				})
				.catch(error => {
					console.error('Error fetching data:', error);
				});
			}

			function showDetails(str,arrays,name){

                let mxmx = arrays.split(",");
                console.log(mxmx);

                $('.header1').html('Daftar Pelajar '+name);

                // Ensure students exist
                let studentsList = mxmx.length > 0 
                    ? mxmx.sort((a, b) => a.toLowerCase().localeCompare(b.toLowerCase()))
                        .map(student => `
                            <div class="card radius-1" style="border-radius:15px;box-shadow:5px 15px 20px #eee; margin-bottom:10px;">
                                <div class="card-body">
                                    <i class="bx bxs-user-circle me-1" style="font-size:13px!important;width:20px;"></i> ${student}
                                </div>
                            </div>
                        `)
                        .join('')
                    : '<li style="list-style: none;"><i class="bx bx-user"></i> No students available</li>';

                // Populate the .putcontentnexthere div
                document.querySelector('.putcontentnexthere').innerHTML = `
                    ${studentsList}
                `;


                return false;

				$('#modalViewDetails').modal('toggle');

				$('.puter').html('<div class="row"><div class="col-12 text-center">Loading...</div></div>');

				const save2 = async () => {
					const posts2 = await axios.get('<?= api_url_core(); ?>api/master/sub-kelas/'+str, {
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
								<h6 class="text-danger">${posts2.data.kode_sub_kelas}</h6>
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
						const posts2 = await axios.get('<?= api_url_core(); ?>api/master/sub-kelas/'+mode, {
							headers: {
								'Authorization': 'Bearer ' + localStorage.getItem('_token')
							}
						}).catch((err) => {
							console.log(err.response);
						});
				
						if (posts2.status == 200) {

							let semesterStrGet = posts2.data.name;
							semesterStrGet = semesterStrGet.split(" ");
							$('#setTingkat').val(posts2.data.tingkat).trigger('change');
							$('#namaKelas').val(semesterStrGet[1]);
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
					url = '<?= api_url_core(); ?>api/master/kelas';
				}else {
					url = '<?= api_url_core(); ?>api/master/kelas/'+modesett;
				}

                let random =  Math.floor(100 + Math.random() * 900).toString();


				var tingkat = $("#setKelas").val();
				var namaKelas = tingkat;
				var kodeKelas = "KLS-"+tingkat+"-"+random;

				var form_data = new FormData();

				form_data.append('tingkat', tingkat);
				form_data.append('kode_kelas', kodeKelas);
				form_data.append('name', namaKelas);
				
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
						// $('#modalSetTagihan').modal('toggle');
						
						// idsett = '';
						// modesett = '';
						
						// $('#submitBtnTagihan').html('Simpan');
						// $('#submitBtnTagihan').attr('disabled', false);
						// $('#submitBtnTagihan').css('cursor', 'pointer');

						// table.ajax.reload();
                        runAddSubKelas(posts.data.id);

					} else {

					}
				}
				save(form_data);
			}

			function runAddSubKelas(idkelas){
				$('#submitBtnTagihan').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Memproses...');
				$('#submitBtnTagihan').attr('disabled', 'disabled');
				$('#submitBtnTagihan').css('cursor', 'not-allowed');

				let url = '';
				if(modesett=='add'){
					url = '<?= api_url_core(); ?>api/master/sub-kelas';
				}else {
					url = '<?= api_url_core(); ?>api/master/sub-kelas/'+modesett;
				}

				var form_data = new FormData();

				let penamaan = 'SUBKLS-';

				let names = $('#namaKelas').val();

                var tingkat = $("#setKelas").val();

				form_data.append('sub_kelas', penamaan+""+names);
				form_data.append('kode_sub_kelas', penamaan+""+names);
				form_data.append('kelas_id', idkelas);
				form_data.append('name', tingkat+"."+names);
				
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