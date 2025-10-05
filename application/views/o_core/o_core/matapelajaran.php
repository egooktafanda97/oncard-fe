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
										<th>Mata Pelajaran</th>
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
                                    <select class="form-control" style="font-size: 13px; width:100%;" id="setTingkat">
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
                                    <label for="namaMapel" class="form-label">Nama Mata Pelajaran</label>
                                    <input type="text" class="form-control" id="namaMapel" placeholder="ex : Matematika">
                                </div>
                                <div class="col-md-12">
                                    <input type="checkbox" id="showTingkatText" checked>
                                    <label for="showTingkatText" class="form-label">Tampilkan kata "Tingkat"</label>
                                </div>
                                <div class="col-md-12">
                                    <label for="combinedInput" class="form-label">Ditampilkan menjadi : </label>
                                    <input type="text" class="form-control" id="combinedInput" readonly>
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

            document.addEventListener("DOMContentLoaded", function () {
                const namaMapel = document.getElementById("namaMapel");
                const setTingkat = document.getElementById("setTingkat");
                const combinedInput = document.getElementById("combinedInput");
                const showTingkatText = document.getElementById("showTingkatText");

                function updateCombinedInput() {
                    const tingkat = setTingkat.value;
                    const mapel = namaMapel.value.trim();
                    const showText = showTingkatText.checked ? `- Tingkat ${tingkat}` : '';

                    if (tingkat && mapel) {
                        combinedInput.value = `${mapel} ${showText}`;
                    } else {
                        combinedInput.value = "";
                    }
                }

                namaMapel.addEventListener("input", updateCombinedInput);
                setTingkat.addEventListener("change", updateCombinedInput);
                showTingkatText.addEventListener("change", updateCombinedInput);
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
							targets: [2], // Column index (e.g., 1 for the second column)
							className: 'text-right' // Adds a class for right alignment
						}
					],
					order: [[1, 'asc']], // Order by "created_at" column in descending order (most recent first)
					ajax: function (data, callback) {
						axios.get('<?= api_url_core(); ?>api/master/matapelajaran', {
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
							title: 'Mata Pelajaran', 
							render: function (data, type, row) {
								
								return `<span class="kode-semester text-dark" style="font-weight: bold; ">
											${row.name}
										</span>`;
							} 
						},
						{ 
							data: 'tingkat', 
							title: 'Tingkat / Kelas', 
							render: function (data, type, row) {
								
								return `<span class="kode-kunjungan text-dark" style="font-weight: normal; ">
											${row.tingkat}
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
									<button class="btn btn-danger ms-4 btn-sm" style="font-size:11px;" onclick="openModalDeleteNew('${row.id}','matapelajaran')"><i class="bx bx-trash" style="font-size:1.6em;"></i> Delete</button>
								`;
							}
						}
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

					// newpath.map((mapping,i)=>{
					// 	const option = new Option(mapping.tahun_akademik, mapping.kode_tahun_akademik, true, true);
						
					// 	// Append it to the select2 dropdown
					// 	$('#setTingkat').append(option).trigger('change');
					// });


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
							let namaMapelStrGet = posts2.data.name;
                            let firstPart = namaMapelStrGet.includes('- Tingkat') 
                            ? namaMapelStrGet.split('- Tingkat')[0] 
                            : namaMapelStrGet;

							semesterStrGet = semesterStrGet.split("-"); 
							$('#setTingkat').val(posts2.data.tingkat).trigger('change');
							$('#kodeMapel').val(semesterStrGet[1]);
							$('#namaMapel').val(firstPart);
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
				let namamamepelfull = $('#combinedInput').val();
				let kodeMapel = '';
                for (let i = 0; i < 13; i++) {
                kodeMapel += Math.floor(Math.random() * 10); // 0-9
                }

                var form_data = new FormData();

				form_data.append('tingkat', tingkat);
				form_data.append('name', namamamepelfull);
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