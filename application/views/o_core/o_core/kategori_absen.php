<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<style>
  .addon-grid {
    display: grid;
    align-items:right;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 6px;
  }

  @media (max-width: 700px) {
        .addon-grid {
            grid-template-columns: repeat(1, minmax(0, 1fr));
        }
  }
</style>

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
										<th>Kategori</th>
										<th>Kode</th>
										<th>Kode</th>
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
				<div class="modal-dialog modal-dialog-centered">
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
							<h5 class="modal-title">Formulir Kategori Absen</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body addmodify">
							<div class="row g-3">
								<div class="col-md-12">
								<label for="setTingkat" style="display:block;" class="form-label">Kategori</label>
									<div class="input-group">
										<input type="text" class="form-control" id="namaKategori" placeholder="ex: Absen Kehadiran" aria-label="Text input with prefix" aria-describedby="basic-addon1">
									</div>
								</div>
								
                                <div class="col-md-12">
								
									<div class="row">
                                        <div class="col-lg-6 col-12">
                                            <label for="jamMasuk" style="display:block;" class="form-label">Jam Masuk</label>
                                            <div class="input-group">
                                                <input type="time" class="form-control" id="jamMasuk" placeholder="ex : 07:00" aria-label="Text input with prefix" aria-describedby="basic-addon1">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <label for="toleransi" style="display:block;" class="form-label">Toleransi (menit)</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" id="toleransi" placeholder="ex: 15 menit" aria-label="Text input with prefix" aria-describedby="basic-addon1">
                                            </div>
                                        </div>
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
							targets: [2,3], // Column index (e.g., 1 for the second column)
							className: 'text-right' // Adds a class for right alignment
						}
					],
					order: [[1, 'asc']], // Order by "created_at" column in descending order (most recent first)
					ajax: function (data, callback) {
						axios.get('<?= api_url_core(); ?>api/master/kategori-absen', {
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
								
								return `<span class="kode-semester text-primary" style="font-weight: bold; ">
											${row.name}
										</span>`;
							} 
						},
						{ data: 'kode', title: 'Kode' },          // Maps to 'age' field
						
                        {
                        data: 'absensi_addons',
                        title: 'Addons',
                        render: function (data, type, row) {
                            let content = '';

                            if (Array.isArray(row.absensi_addons) && row.absensi_addons.length > 0) {
                            content = row.absensi_addons.map(addon => {
                                return `
                                <span class="badge bg-primary me-1 mb-1 px-3 d-inline-flex align-items-center" style="font-size:12px; width:100%;">
                                    ${addon.nama}
                                    <button onclick="deleteAddon(${addon.id})" class="btn btn-sm btn-light ms-1 py-0 px-1" title="Hapus" style="font-size: 0.7em; float:right;"><i class="bx bx-trash" style="font-size:10px;margin:0; padding:0; display:block; margin:auto;"></i></button>
                                </span>
                                `;
                            }).join('');

                            content = `<div class="addon-grid">${content}</div>`;
                            } else {
                            content = `<span class="text-muted"></span>`;
                            }

                            return `
                            <div>
                                ${content}
                                <button class="btn btn-sm btn-outline-primary" style="font-size:10px;" onclick="addAddon(${row.id})">
                                <i class="bx bx-plus"></i> Add Addon
                                </button>
                            </div>
                            `;
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
									<button class="btn btn-danger ms-4 btn-sm" style="font-size:11px;" onclick="openModalDeleteNew('${row.id}','kategori-absen')"><i class="bx bx-trash" style="font-size:1.6em;"></i> Delete</button>
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

            function addAddon(kategoriAbsenId) {
                const addonName = prompt("Masukkan nama Addon:");
                if (!addonName) return;

                axios.post('<?= api_url_core(); ?>api/m-absensi-addons', {
                        m_kategori_absen_id: kategoriAbsenId,
                        nama: addonName,
                        status: true,  
                    headers: {
                        'Authorization': 'Bearer ' + localStorage.getItem('_token')
                    }
                }, {
                    headers: {
                    'Authorization': 'Bearer ' + localStorage.getItem('_token')
                    }
                })
                .then(res => {
                    alert("Addon berhasil ditambahkan!");
                    $('#example').DataTable().ajax.reload();
                })
                .catch(err => {
                    console.error(err);
                    alert("Gagal menambahkan addon.");
                });
            }

            function deleteAddon(addonId) {
                if (!confirm("Yakin ingin menghapus addon ini?")) return;

                axios.delete(`<?= api_url_core(); ?>api/m-absensi-addons/${addonId}`, {
                    headers: {
                    'Authorization': 'Bearer ' + localStorage.getItem('_token')
                    }
                })
                .then(res => {
                    alert("Addon berhasil dihapus!");
                    $('#example').DataTable().ajax.reload();
                })
                .catch(err => {
                    console.error(err);
                    alert("Gagal menghapus addon.");
                });
            }



			function showDetails(str){

				$('#modalViewDetails').modal('toggle');

				$('.puter').html('<div class="row"><div class="col-12 text-center">Loading...</div></div>');

				const save2 = async () => {
					const posts2 = await axios.get('<?= api_url_core(); ?>api/master/kategori-absen/'+str, {
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
								<h6 class="text-danger">${posts2.data.kode}</h6>
                            <p>
								<small>Jam Absen</small><br/>
								${posts2.data.jam_absen}
							</p>
							<p>
								<small>Toleransi</small><br/>
								${posts2.data.toleransi??'-'} menit
							</p>
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
                
                disableAllInputs(true);

				if(mode!='add'){

					const save2 = async () => {
						const posts2 = await axios.get('<?= api_url_core(); ?>api/master/kategori-absen/'+mode, {
							headers: {
								'Authorization': 'Bearer ' + localStorage.getItem('_token')
							}
						}).catch((err) => {
							console.log(err.response);
						});
				
						if (posts2.status == 200) {

							let semesterStrGet = posts2.data.name;
							$('#namaKategori').val(semesterStrGet);
							$('#jamMasuk').val(posts2.data.jam_absen??'');
							$('#toleransi').val(posts2.data.toleransi??'');

                            disableAllInputs(false);
						}
					}
					save2();
				}else {
                    disableAllInputs(false);
                }
				$('#modalSetTagihan').modal('toggle');
			}

			function procModifyKategoriAbsen(){
				$('#submitBtnTagihan').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Memproses...');
				$('#submitBtnTagihan').attr('disabled', 'disabled');
				$('#submitBtnTagihan').css('cursor', 'not-allowed');

				let url = '';
				if(modesett=='add'){
					url = '<?= api_url_core(); ?>api/master/kategori-absen';
				}else {
					url = '<?= api_url_core(); ?>api/master/kategori-absen/'+modesett;
				}


				var namaKategori = $("#namaKategori").val();
				var jamMasuk = $("#jamMasuk").val();
				var toleransi = $("#toleransi").val();
                let randomCode = `ABS - ${namaKategori}-${Date.now().toString().slice(-5)}${Math.floor(100 + Math.random() * 900)}`;
				
				var form_data = new FormData();

				form_data.append('name', namaKategori);
				form_data.append('jam_absen', jamMasuk);
				form_data.append('toleransi', toleransi);
				form_data.append('kode',randomCode);
				
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