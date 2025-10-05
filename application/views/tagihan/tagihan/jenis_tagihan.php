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
.modal-fullscreen {
    z-index: 1000;
}

.modal-overlay {
    z-index: 1100;
}

.modal-dialog {
    z-index: 1200;
}

.discount {
    position: relative;
    display: inline-block;
    font-size: 24px;
    color: #333;
}

.discount::before {
    content: "";
    position: absolute;
    top: 50%;
    left: 0;
    width: 100%;
    height: 2px;
    background-color: red;
    transform: rotate(-10deg);
    transform-origin: center;
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

#duplicationDialog table tr td:nth-child(3),
#duplicationDialog table tr td:nth-child(4),
#duplicationDialog table tr th:nth-child(3),
#duplicationDialog table tr th:nth-child(4),
#duplicationDialog #settotagihan_id {
    display: none;
}
#duplicationDialog table tr td:nth-child(2){
    text-align:right!important;
}


.tagihan-summary-container {
    /* background: #f8f9fe; */
    /* padding: 20px; */
    /* border-radius: 12px; */
    /* box-shadow: 0 4px 20px rgba(0,0,0,0.03); */
}

.summary-card {
    transition: all 0.3s ease;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
}

.summary-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.icon-shape {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* .progress-wrapper {
    background: white;
    padding: 15px;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
}

.progress {
    border-radius: 100px;
    background-color: #e9ecef;
}

.progress-bar {
    border-radius: 100px;
    transition: width 0.6s ease;
} */

</style>
<div class="page-wrapper">
			<div class="page-content">

                <div id="loadingScreen" class="loading-overlay">
					<div class="loading-spinner"></div>
					<p>Processing, please wait...</p>
				</div>

				<div class="row">
                   <div class="col">
					 <div class="card radius-1">
						<div class="card-body" >
							<div class="d-lg-flex align-items-center mb-4 gap-3 px-2 py-2">

                            <div>
                            <a href="#/" onclick="modalAddModify('add');" style="margin-top:-15px!important" class="btn btn-success bg-dongker px-4 radius-30 mt-1 mt-lg-0 "> Set Kategori</a>
                            <a href="#/" onclick="window.location.href='<?=base_url();?>CPanel_Tagihan/AddModifyTagihan'" style="margin-top:-15px!important" class="btn btn-success bg-dongker px-4 radius-30 mt-1 mt-lg-0 "><i class="bx bx-plus"></i> Item Biaya</a>
                            </div>
							
							<div class="ms-auto">
                                <!-- <button class="btn btn-sm btn-outline-primary mt-2 me-2 px-4 mb-3" id="btnSave2PDF" onclick="save2PDF('tabelPrint');" style="border-radius:100px;"><i style="padding:0; margin:0;" class="bx bxs-file-export"></i> PDF</button> -->
                                <button class="btn btn-sm btn-outline-success mt-2 me-2 px-4 mb-3" onclick="saveToExcel('tabelsiswa');" style="border-radius:100px;"><i style="padding:0; margin:0;" class="bx bxs-file-export"></i> Excel</button>
							</div>
						</div>

                       <div class="table-responsive" style="margin-top:-15px;">
							<table class="table mb-0 tabelsiswa table-hover table-borderlesss" id="tabelPrint">
								<thead class="table-light">
									<tr>
										<th>No.</th>
										<th colspan="2">Kategori & Item Biaya</th>
										<th>Nominal</th>
										<th>Penagihan</th>
										<th>Jatuh Tempo</th>
										<th>Progress</th>
										<th class="text-end"></th>
									</tr>
								</thead>
								<tbody class="putContentHere">
								</tbody>
							</table>

						</div>
					 </div>
				   </div>
				  </div>
				</div><!--end row-->

			</div>

			<div class="modal fade" id="modalViewDetails" tabindex="-1" aria-hidden="true">
				<div class="modal-dialog modal-fullscreen modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title titledetail">Details</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
                            <div class="row">
                                <div class="col-lg-3 col-md-6 col-12 puter1"></div>
                                <div class="col-lg-9 col-md-6 col-12 puter2"></div>
                            </div>
						</div>
						<div class="modal-footer text-center">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
						</div>
					</div>
				</div>
			</div>
			
            
            <div class="modal fade" id="duplicationDialog" tabindex="-1" aria-hidden="true">
				<div class="modal-dialog modal-fullscreen modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title ">BUAT SALINAN TAGIHAN</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-12">
                                    <p>Tagihan dengan konfigurasi yang sama akan diterapkan untuk tagihan dengan nama baru dibawah ini.<br/>Pastikan semua item benar terlebih dahulu sebelum Anda menekan tombol `SUBMIT`, ya! </p>
                                </div>
                                <div class="col-lg-12 col-md-12 col-12 puter1_duplication"></div>
                                <div class="col-lg-12 col-md-12 col-12 puter2"></div>
                            </div>
						</div>
						<div class="modal-footer text-center">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
							<button type="button" class="btn btn-success" onclick="procSubmitDuplication_1st();" >SUBMIT</button>
						</div>
					</div>
				</div>
			</div>
			
            
            <div class="modal fade" id="modalViewAddUserToTagihan" tabindex="-1" aria-hidden="true">
				<div class="modal-dialog modal-fullscreen modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title titledetail">Pilih User</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
                            <div class="row">
                        
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
                                <div class="col-md-3 text-end">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text"><i class="bx bx-search"></i></span>
                                        <input type="text" id="studentSearchInputTambahKeTagihan" class="form-control" placeholder="Cari siswa..." onkeyup="filterStudentTableTambahKeTagihan()">
                                        <button class="btn btn-outline-secondary" type="button" onclick="clearStudentSearchTambahKeTagihan()">
                                            <i class="bx bx-x"></i>
                                        </button>
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
                                        <tbody class="putContentHereTabled" id="studentTableBodyTambahKeTagihan">
                                            <tr>
                                                <td colspan="6" class="text-center">
                                                    <h5>Pilih filter terlebih dahulu untuk menampilkan data pada tabel ini.</h5>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>
                                
                            
                                    
                            </div>
						</div>

                        <div class="modal-footer text-center">
							<button type="button" class="btn btn-secondary" onclick="setToTagihan();">Set Ke Grup Ini</button>
						</div>

					</div>
				</div>
			</div>
			
            <div class="modal fade" id="modalViewDelete" tabindex="-1" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title titledetailx">Konfirmasi</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body puter">
                            <h6>Saya dengan sadar akan menghapus data ini, berikut dengan alasan yang diberikan :</h6>
                            <div class="col-md-12">
                                <textarea name="noted" class="form-control" cols="30" rows="4" id="noted" placeholder="Masukkan alasan Anda menghapus item ini."></textarea>
                            </div>
                            <div class="col-md-12 mt-3">
                                <p>Anda harus mengetikkan <b>SUBMIT</b> pada kolom dibawah ini.</p>
                                <input type="text" class="form-control" maxlength="6" id="passcode">
                            </div>
						</div>
						<div class="modal-footer text-center">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
							<button type="button" class="btn btn-danger" id="submitBtnDelete" onclick="procDeleteTagihan();">Hapus Sekarang</button>
						</div>
					</div>
				</div>
			</div>
			
			<div class="modal fade" id="modalSetTagihan" tabindex="-1" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title titledetail">Tetapkan Data</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body addmodify">
							<div class="row g-3">
								<div class="col-md-12">
									<label for="tagihan_name" class="form-label">Inisial Pembiayaan
                                        <br>
                                        <code style="font-size:10px;">Anda dapat mengisi inputan berikut dengan data seperti : <br><b>SPP / Iuran Komite / Iuran OSIS / lainnya.</b></code>
                                    </label>
									<input type="text" class="form-control" id="tagihan_name" placeholder="Isi dengan data yang benar.">
								</div>
							</div>
							<div class="row g-3 mt-1">
								<div class="col-md-12">
									<label for="tahun_ajaran" class="form-label">Tahun Ajaran</label>
                                    <select name="tahun_ajaran" class="form-control" id="tahun_ajaran">
                                        <option value="">Pilih tahun ajaran</option>
                                    </select>
									
								</div>
							</div>

                            <div class="row g-3 mt-2">
								<div class="col-md-12">
									<label for="tagihan_name" class="form-label">Deskripsi Singkat</label>
									<textarea name="description" class="form-control" id="description" cols="30" rows="4" placeholder="Uraikan secara singkat terkait kategori ini"></textarea>
								</div>
							</div>
						</div>
						<div class="modal-footer text-center">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
							<button type="button" class="btn btn-success" id="submitBtnTagihan" onclick="procModifyTagihan();">Simpan</button>
						</div>
					</div>
				</div>
			</div>
			
		</div>

        <div class="modal fade" id="modalDelete" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content" style="background: #ffd3d3;">
                    <div class="modal-header">
                        <h5 class="modal-title">Hapus Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h6>Saya dengan sadar akan menghapus data ini, berikut dengan alasan yang diberikan :</h6>
                        <div class="col-md-12">
                            <textarea name="noted" class="form-control" cols="30" rows="4" id="noted2" placeholder="Masukkan alasan Anda menghapus item ini."></textarea>
                        </div>
                        <div class="col-md-12 mt-3">
                            <p>Anda harus mengetikkan <b>SUBMIT</b> pada kolom dibawah ini.</p>
                            <input type="text" class="form-control" maxlength="6" id="passcode2">
                        </div>
                    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="button" onclick="commitDeleteData();" id="btndilit" class="btn btn-primary">Hapus</button>
                    </div>
                </div>
            </div>
        </div>

		<script src="https://pawelgrzybek.github.io/siema/assets/siema.min.js"></script>

        <script type="text/javascript">
			
			let idsett;
			let uidsettt;
			let modesett;

            let idsaved= '';

            let jenis_nominal_data= '';
			let nominal_new= '';
            let jumlah_diskon = '0';

            let modedelete;

            let dup_jenis_tagihan_id;

            let dataArray = [];
            let dataArrayResult = [];
            
			$(document).ready(function () {

                getJenisTagihanList();
				const selectElement = document.getElementById('tahun_ajaran');
                const currentYear = new Date().getFullYear();
                const startYear = currentYear - 5;
                const endYear = currentYear + 5;

                for (let year = startYear; year <= endYear; year++) {
                    const option = document.createElement('option');
                    option.value = `${year}/${year + 1}`;
                    option.textContent = `${year}/${year + 1}`;
                    selectElement.appendChild(option);
                }

                document.getElementById('setTahunAkademik').addEventListener('change', updateEndpoint);
                document.getElementById('setSemester').addEventListener('change', updateEndpoint);
                document.getElementById('setSubKelas').addEventListener('change', updateEndpoint);
            });

            function setToTagihan(){
                console.log(selectedIds);
                runSetUserTagihanByIDTagihanCreated();
            }

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

                    newpath4.sort((a, b) => a.tingkat - b.tingkat);

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


            function showLoading() {
				document.getElementById('loadingScreen').style.display = 'flex';
				$('#loadingScreen').css('flex-direction','column');
				$('#loadingScreen').css('align-items','center');
				$('#loadingScreen').css('justify-content','center');
			}

			function hideLoading() {
				document.getElementById('loadingScreen').style.display = 'none';
			}

            function runSetUserTagihanByIDTagihanCreated(){
                showLoading();
                        
				var form_data = new FormData();

				// let desc = $('#deskripsiTagihan').val();
				// let nominalsett = $('#nominalTagihanFinal').val();
				// let persenTagihan = $('#persenTagihan').val();
				// nominalsett = nominalsett.split('.').join("");

				form_data.append('tagihan_id', idsett);
				// form_data.append('user_siswa_id', "["+selectedIds+"]");
				// form_data.append('oncard_siswa_id[]', selectedIds);
				selectedIds.forEach(id => {
					form_data.append('oncard_siswa_id[]', id);
				});
				// form_data.append('nominal', nominalsett);
				// form_data.append('jumlah_diskon', persenTagihan);
				// form_data.append('keterangan', desc);

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
						// window.location.href="<?=base_url();?>CPanel_Tagihan/JenisTagihan";
                        $('#modalViewAddUserToTagihan').modal('toggle');
                        getListTertagih(idsett);
                        hideLoading();
					} else {
						hideLoading();
					}
				}
				save(form_data);
            }

            function showData(params){
				let num = 0;
				let tableColumn = '';
				tableColumn += `<tr><td colspan="8" class="text-center">Loading...</td></tr>`;
				$('.putContentHereTabled').html(tableColumn);
				
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
								$('.putContentHereTabled').html(tableColumn);return false;
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
                                    let textNamaA = mapping.siswa?.name??'Not Available';
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
							
                            
						$('.putContentHereTabled').html(tableColumn);
					}
				}
				save2();
			}

            let selectedIds = [];
            let selectedIds_Duplicate = [];

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


            function getJenisTagihanList(){
				let num = 1;
				let tableColumn = '';

                dataArray = [];
                dataArrayResult = [];
			
				tableColumn += `<tr><td colspan="20" class="text-center">Loading....</td></tr>`;
				$('.putContentHere').html(tableColumn);
				
				const save2 = async () => {
					const posts2 = await axios.get('<?= api_url_tagihan(); ?>api/master/jenis-tagihan', {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {
						console.log(err.response);
					});
			
					if (posts2.status == 200) {
                        getTagihanList();

                        
                        posts2.data.data.map((mapping,i)=>{
                            dataArray.push({
                                jenis_tagihan : mapping.name,
                                id : mapping.id,
                                created_at : mapping.created_at,
                                json_props : mapping.json_props,
                            })
                        });
                        
                        console.log(dataArray);
					}
				}
				save2();
			}

            

			function getTagihanList(){
				let num = 1;
				let tableColumn = '';
			
				tableColumn += `<tr><td colspan="20" class="text-center">Loading....</td></tr>`;
				$('.putContentHere').html(tableColumn);
				
				const save2 = async () => {
					const posts2 = await axios.get('<?= api_url_tagihan(); ?>api/tagihan', {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token'),
                            'nopaginate' : true
						}
					}).catch((err) => {
						console.log(err.response);
					});
			
					if (posts2.status == 200) {

						tableColumn='';

						if(posts2.data.length==0){
							tableColumn  = `<tr><td class="text-center p-5" colspan="7">Tidak ada data yang dapat dimunculkan</td></tr>`;	
						}
						
						posts2.data.forEach((mapping, i) => {
                            dataArray.forEach((firstItem) => {
                                const existingEntry = dataArrayResult.find((entry) => entry.id === firstItem.id);

                                if (firstItem.id === mapping.jenis_tagihan_id) {
                                    if (existingEntry) {
                                        existingEntry.matchedItem.push(mapping);
                                    } else {
                                        dataArrayResult.push({
                                        ...firstItem,
                                        matchedItem: [mapping],
                                        });
                                    }
                                } else if (!existingEntry) {
                                    dataArrayResult.push({
                                        ...firstItem,
                                        matchedItem: [],
                                    });
                                }
                            });
						});
						
                        dataArrayResult.sort((a, b) => {
                        const dateA = new Date(a.created_at); // Convert `created_at` to Date object
                        const dateB = new Date(b.created_at);

                        return dateB - dateA; // Compare dates for descending order
                        });
                        console.log("sksksk",dataArrayResult);

                        dataArrayResult.forEach((mapping, i) => {
                        if (mapping.matchedItem.length > 0) {
                            // Add a header row for the group

                            tableColumn += `
                            <tr>
                                <td style="font-weight:bold;" class="bg-light py-3 text-dark font-weight-bold">${num++}</td>
                                <td style="font-weight:bold; text-transform:uppercase;" colspan="1" class="bg-light py-3 text-dark font-weight-bold">
                                ${mapping.jenis_tagihan}
                                </td>
                                <td class="text-end bg-light" colspan="6">
                                <button type="button" class="btn btn-sm bg-dongker text-white" onclick="goToPage('${mapping.id}','${mapping.jenis_tagihan}');" id="showTagihanPage">
                                    <i class="bx bx-plus"></i> Item Biaya
                                </button>
                                <button type="button" class="btn btn-sm btn-danger" onclick="showModalDelete('${mapping.id}');modedelete='jenis-tagihan'" id="seeDeletes">
                                    <i class="bx bx-trash"></i> Delete
                                    </button>
                                    </td>
                                
                            </tr>
                            `;

                            // Iterate through matched items for this group
                            mapping.matchedItem.forEach((mapping3) => {
                            let mer = '';

                            let terbayar = mapping3.tagihan_lunas;
                            let belumterbayar = mapping3.tagihan_belum_lunas;
                            let total = parseInt(terbayar) + parseInt(belumterbayar);

                            // Avoid division by zero
                            let percent = 0; // Default to 0 in case of division by zero

                            if (total > 0) {  // Only perform the division if total is greater than zero
                                percent = (terbayar / total) * 100;
                                percent = Math.round(percent);
                            }

                            console.log(percent); // Display the percentage

                            
                            if (mapping3.jenis_nominal_data.nominal_tagihans.length > 0) {
                                const mapping2 = mapping3.jenis_nominal_data.nominal_tagihans[0]; // Access the first item
                                const nominal = mapping2.nominal_tagihan;
                                let m = 0;
                                mer += `
                                <p class="mert${mapping.id}" style="line-height:1.5em;">
                                    <i class='bx bxs-bolt-circle'></i> Rp${formatRupiah(nominal.toString())}
                                    
                                </p>
                                `;
                            }


                            // Add each item under the group
                            tableColumn += `
                                <tr>
                                
                                <td></td>
                                <td colspan="2">${mapping3.nama_tagihan}
                                </td>
                                <td>${mer}</td>
                                <td>
                                    ${moment(mapping3.tanggal_mulai_tagihan).format('YYYY-MM-DD')}
                                    <br/>
                                    <small class="text-muted">
                                    ${
                                        moment(mapping3.tanggal_mulai_tagihan).diff(moment(), 'days') < 0
                                        ? `Sudah lewat ${Math.abs(moment(mapping3.tanggal_mulai_tagihan).diff(moment(), 'days') + 1)} hari`
                                        : `${moment(mapping3.tanggal_mulai_tagihan).diff(moment(), 'days') + 1} hari lagi`
                                    }
                                    </small>
                                </td>
                                <td>
                                    ${moment(mapping3.tanggal_jatuh_tempo).format('YYYY-MM-DD')}
                                    <br/>
                                    <small class="text-muted">
                                    ${
                                        moment(mapping3.tanggal_jatuh_tempo).diff(moment(), 'days') < 0
                                        ? `Sudah lewat ${Math.abs(moment(mapping3.tanggal_jatuh_tempo).diff(moment(), 'days') + 1)} hari`
                                        : `${moment(mapping3.tanggal_jatuh_tempo).diff(moment(), 'days') + 1} hari lagi`
                                    }
                                    </small>
                                </td>
                                
                                
                                <td>
                                <div style="display:flex; gap:10px;">
                                    <div class="progress bg-light" style="height: 30px;width:200px;">
                                        <div class="progress-bar bg-primary" role="progressbar" id="progressAll" style="width: ${percent}%;" aria-valuenow="${percent}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div>${percent}%</div>
                                </div>
                                </td>

                                <td class="text-end">
                                    <button type="button" class="btn btn-sm btn-primary" onclick="showDetails('${mapping3.id}');" id="seeDetails">
                                    <i class="bx bx-folder"></i> Details
                                    </button>
                                    
                                    <button type="button" class="btn btn-sm btn-danger" onclick="showModalDelete('${mapping3.id}');modedelete='tagihan'" id="seeDeletes">
                                    <i class="bx bx-trash"></i> Delete
                                    </button>
                                </td>
                                </tr>
                            `;
                            });
                        } else {
                            // Add a row for groups with no items
                            tableColumn += `
                            <tr>
                            <td style="font-weight:bold;" class="bg-light py-3 text-dark font-weight-bold">${num++}</td>
                                <td style="font-weight:bold; text-transform:uppercase;" colspan="6" class="bg-light py-3 text-dark font-weight-bold">
                                ${mapping.jenis_tagihan} <!-- Group name -->
                                </td>
                                <td class="text-end bg-light py-3 text-dark font-weight-bold">
                                <button type="button" class="btn btn-sm bg-dongker text-white" onclick="goToPage('${mapping.id}','${mapping.jenis_tagihan}');" id="showTagihanPage">
                                    <i class="bx bx-plus"></i> Item Biaya
                                </button>
                                <button type="button" class="btn btn-sm btn-danger" onclick="showModalDelete('${mapping.id}');modedelete='jenis-tagihan'" id="seeDeletes">
                                    <i class="bx bx-trash"></i> Delete
                                    </button>
                                </td>
                            </tr>
                            `;
                        }
                        });

						$('.putContentHere').html(tableColumn);
					}
				}
				save2();
			}

            function goToPage(url,title){
                
                title = title.replace(/\(/g, '%28').replace(/\)/g, '%29');

                // Transform the entire title into a URI component (for other special characters)
                const encodedTitle = encodeURIComponent(title);

                console.log(encodedTitle);

                // Example usage in URL
                window.location.href = `<?=base_url();?>CPanel_Tagihan/AddModifyTagihan/${url}/${encodedTitle}`;

            }

            let old_tgl_jatuh_tempo;
            let old_tgl_penagihan;

			function showDetails(str){

                idsett = str;

				$('#modalViewDetails').modal('toggle');

				$('.puter1').html('<div class="row"><div class="col-12 text-center">Loading...</div></div>');

				const save2 = async () => {
					const posts2 = await axios.get('<?= api_url_tagihan(); ?>api/tagihan/'+str, {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {
						console.log(err.response);
					});
			
					if (posts2.status == 200) {

						tableColumn='';

                        let tableColumn_Duplicate = '';
                        let tableColumn_Duplicate_Nominal = '';

						console.log(posts2.data);

                        let discount = 0;


                        dup_jenis_tagihan_id = posts2.data.jenis_tagihan_id;
                        
                        if (posts2.data.nama_tagihan.includes("Discount")) {
                            // Extract the discount percentage
                            let discountMatch = posts2.data.nama_tagihan.match(/Discount (\d+)%/);
                            if (discountMatch) {
                                discount = parseInt(discountMatch[1], 10); // Convert extracted number to integer
                                console.log(`The discount is ${discount}%.`);
                            } else {
                                console.log("No discount percentage found.");
                            }
                        } else {
                            console.log("No discount available.");
                        }

                        console.log(discount);
						
						tableColumn+=`
                            <h5>Keterangan Tambahan</h5>
                            <div id="tagihanUserSummary" class="tagihan-summary-container" style="margin-bottom: 25px;">
                                <div class="row">
                                    <!-- Total Students Card -->
                                    <div class="col-md-12 mb-3">
                                        <div class="summary-card bg-white rounded-3 p-3 h-100" style="border-left: 4px solid #5e72e4;">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h6 class="text-muted mb-1" style="font-size: 13px;">TOTAL SISWA</h6>
                                                    <h3 class="mb-0" id="totalStudents">0</h3>
                                                </div>
                                                <div class="icon-shape bg-primary bg-gradient rounded-2 p-2">
                                                    <i class="bx bx-group text-white"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Paid Students Card -->
                                    <div class="col-md-12 mb-3">
                                        <div class="summary-card bg-white rounded-3 p-3 h-100" style="border-left: 4px solid #2dce89;">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h6 class="text-muted mb-1" style="font-size: 13px;">LUNAS</h6>
                                                    <h3 class="mb-0" id="paidStudents">0</h3>
                                                    <small class="text-success" id="paidPercentage">0%</small>
                                                </div>
                                                <div class="icon-shape bg-success bg-gradient rounded-2 p-2">
                                                    <i class="bx bx-check-circle text-white"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Unpaid Students Card -->
                                    <div class="col-md-12 mb-3">
                                        <div class="summary-card bg-white rounded-3 p-3 h-100" style="border-left: 4px solid #f5365c;">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h6 class="text-muted mb-1" style="font-size: 13px;">BELUM LUNAS</h6>
                                                    <h3 class="mb-0" id="unpaidStudents">0</h3>
                                                    <small class="text-danger" id="unpaidPercentage">0%</small>
                                                </div>
                                                <div class="icon-shape bg-danger bg-gradient rounded-2 p-2">
                                                    <i class="bx bx-time-five text-white"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Total Amount Card -->
                                    <div class="col-md-12 mb-3">
                                        <div class="summary-card bg-white rounded-3 p-3 h-100" style="border-left: 4px solid #fb6340;">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h6 class="text-muted mb-1" style="font-size: 13px;">TOTAL TAGIHAN</h6>
                                                    <h3 class="mb-0" id="totalAmount">Rp0</h3>
                                                    <small class="text-info" id="totalExpected">Dari Rp0</small>
                                                </div>
                                                <div class="icon-shape bg-warning bg-gradient rounded-2 p-2">
                                                    <i class="bx bx-money text-white"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Progress Bar -->
                                <div class="progress-wrapper mt-2">
                                    <div class="d-flex justify-content-between mb-1">
                                        <span class="text-sm">Progress Pembayaran</span>
                                        <span class="text-sm font-weight-bold" id="progressPercentage">0%</span>
                                    </div>
                                    <div class="progress" style="height: 8px;">
                                        <div id="paymentProgress" class="progress-bar bg-gradient-success" role="progressbar" style="width: 0%"></div>
                                    </div>
                                </div>
                            </div>

                            <h5>Keterangan Biaya</h5>
							<p style="background:#f2f2f2; border-radius:7px;" class="p-3">
								<small>Value</small><br/>
								<code>${posts2.data.jenis_tagihan.value}</code>
							</p>
							<p style="background:#f2f2f2; border-radius:7px;" class="p-3">
								<small>Tanggal Terbuat</small><br/>
								${moment(posts2.data.created_at).format('dddd, DD-MM-YYYY')}
							</p>
							<p style="background:#f2f2f2; border-radius:7px;" class="p-3">
								<small>Jam Terbuat</small><br/>
								${moment(posts2.data.created_at).format('HH:mm:ss')} WIB
							</p>
						`; 
						
                        const dateObj = new Date(posts2.data.tanggal_mulai_tagihan);
                        const formatted = dateObj.toISOString().slice(0, 16); // "YYYY-MM-DDTHH:MM"

                        const inputpenagihan = `<input type="datetime-local" class="form-control" id="tanggalPenagihan" value="${formatted}"/>`;
                        $('#tanggalPenagihan').val(formatted);
                        
                        const dateObj2 = new Date(posts2.data.tanggal_jatuh_tempo);
                        const formatted2 = dateObj2.toISOString().slice(0, 16); // "YYYY-MM-DDTHH:MM"

                        const inputjatuhtempo = `<input type="datetime-local" class="form-control" id="tanggalJatuhTempo" value="${formatted2}"/>`;
                        $('#tanggalJatuhTempo').val(formatted2);

                        old_tgl_jatuh_tempo = formatted;
                        old_tgl_penagihan = formatted2;

                        
                        tableColumn_Duplicate+=`
                            <h5>Keterangan Biaya</h5>
                            <p style="background:#f1f1f1; border-radius:7px;" class="p-3">
								<small>Nama Tagihan Baru</small><br/>
								<input type="text" class="form-control" id="namaTagihanDuplikat" value="${posts2.data.nama_tagihan}"/>
							</p>
							<p style="background:#f1f1f1; border-radius:7px;" class="p-3">
								<small>Tetapkan Tanggal Penagihan</small><br/>
								${inputpenagihan}
							</p>
							<p style="background:#f1f1f1; border-radius:7px;" class="p-3">
								<small>Tetapkan Tanggal Jatuh Tempo</small><br/>
								${inputjatuhtempo}
							</p>

                            <div class="row">
                                <div class="col-12" id="put1"></div>
                            </div>
						`; 
						
						tableColumn +=`
						
                        <table class="mt-2 table table-striped" style="border-radius:8px; overflow:hidden;">
								<tr>
								<th>Kode</th>
								<th>Nominal</th>
								</tr>`;

                        if (posts2.data.jenis_nominal_data.nominal_tagihans.length > 0) {
                            const mapping2 = posts2.data.jenis_nominal_data.nominal_tagihans[0]; // Access the first item
                            const nominal = mapping2.nominal_tagihan;
                            let m = 0;

                            let originalPrice = Math.round(parseInt(nominal) / (1 - discount / 100));
                            console.log("ds", originalPrice);

                            tableColumn_Duplicate_Nominal = `${discount!=0 ? 
                                    `<div class="row">
                                        <div class="col-6">
                                            
                                            <p style="background:#f1f1f1; border-radius:7px;" class="p-3">
                                                <font style="font-weight:900">Harga Awal</font><br/>
                                                <font class="discount" style="font-size:25px!important;">Rp${formatRupiah(originalPrice.toString())}</font>
                                            </p>
                                        </div>
                                        <div class="col-6" style="background:#f1f1f1!important; border-radius:7px;">
                                            <div class="row">
                                                <div class="col-10">
                                                    <p  class="p-3">
                                                        <font style="font-weight:900">Harga Setelah Diskon</font><br/>
                                                        <font style="font-size:25px; font-weight:900;" id="hargaFinal">Rp${formatRupiah(nominal.toString())}</font>
                                                    </p>
                                                </div>
                                                <div class="col-2 text-center">
                                                    <i class="bx bx-check-double text-success p-3" style="font-size:35px;"></i>
                                                </div>
                                            </div>
                                        </div>
                                     </div>
                                     
                                    `
                                :`
                                    
                                        <div class="col-12 mb-3" style="background:#f1f1f1!important; border-radius:7px;">
                                                <div class="row px-3">
                                                    <div class="col-10 p-3">
                                                        <font style="font-weight:900">Harga Penagihan</font><br/>
                                                        <font style="font-size:25px; font-weight:900;" id="hargaFinal">Rp${formatRupiah(nominal.toString())}</font>
                                                    </div>
                                                    <div class="col-2 text-center">
                                                        <i class="bx bx-check-double text-success p-3" style="font-size:35px;"></i>
                                                    </div>
                                                </div>
                                            
                                        </div>
                                     
                                `}`;

                            tableColumn+=`
								<tr>
								<td class="break-word">${mapping2.kategori_tagihan}</td>
								<td class="" style="font-size:25px; font-weight:bold;">
                                ${discount!=0 ? 
                                    `<font class="discount" style="font-size:14px!important;">Rp${formatRupiah(originalPrice.toString())}</font><br/>
                                    <font class="">Rp${formatRupiah(nominal.toString())}</font>`
                                :`<font class="">Rp${formatRupiah(nominal.toString())}</font>`}
                                
                                </td>
								</tr>
							`;
                        }

						
						tableColumn +='</table>';
						$('.puter1').html(tableColumn);
						$('.puter1_duplication').html(tableColumn_Duplicate);
						$('#put1').html(tableColumn_Duplicate_Nominal);
						$('.titledetail').html("<font style='text-transform:uppercase;'>"+posts2.data.nama_tagihan+"</font> <button class='btn btn-sm btn-outline-primary ms-3' onclick='showDuplicationDialog();'><i class='bx bx-duplicate' style='padding:0;margin:0;'></i> Buat Salinan</button>");

                        getListTertagih(str);
						
					}
				}
				save2();

			}

            function showDuplicationDialog(){
                $('#duplicationDialog').modal('toggle');
            }
			
            
            function getListTertagih(str) {
                $('.puter2').html('<div class="row"><div class="col-12 text-center">Loading...</div></div>');

                const save2 = async () => {
                    const posts2 = await axios.get('<?= api_url_tagihan(); ?>api/tagihan-siswa/'+str, {
                        headers: {
                            'Authorization': 'Bearer ' + localStorage.getItem('_token'),
                            'nopaginate': true
                        }
                    }).catch((err) => {
                        console.log(err.response);
                    });

                    if (posts2.status == 200) {
                        let tableColumn = '';
                        const studentData = posts2.data.data;

                        // Sort data - unpaid first
                        studentData.sort((a, b) => {
                            return (a.status_pembayaran.toLowerCase() === 'lunas') - (b.status_pembayaran.toLowerCase() === 'lunas');
                        });

                        tableColumn += `
                            <div style="display:flex; justify-content:space-between; margin-bottom:15px;">
                                <h5>Daftar Siswa</h5>
                                <button type="button" onclick="openDialogAddUserToTagihan();" id="settotagihan_id" class="btn btn-sm btn-primary px-3" style="border-radius:100px;box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);">
                                    Masukkan Siswa Ke Tagihan
                                </button>
                            </div>
                            
                            <!-- Search Box -->
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="bx bx-search"></i></span>
                                <input type="text" id="studentSearchInput" class="form-control" placeholder="Cari siswa..." onkeyup="filterStudentTable()">
                                <button class="btn btn-outline-secondary" type="button" onclick="clearStudentSearch()">
                                    <i class="bx bx-x"></i>
                                </button>
                            </div>
                            
                            <div class="table-responsive">
                                <table id="studentTable" class="mt-2 table table-striped" style="border-radius:15px; overflow:hidden;">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Nominal</th>
                                            <th>Status</th>
                                            <th class="text-end">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="studentTableBody">
                        `;

                        if (studentData.length < 1) {
                            tableColumn += `
                                <tr>
                                    <td colspan="4" class="text-center">Tidak ada data.</td>
                                </tr>
                            `;
                        }

                        // Store original data for filtering
                        window.studentTableData = studentData;

                        selectedIds_Duplicate = [];

                        studentData.forEach((mapping, i) => {
                            const idToPush = mapping.siswa.oncard_siswa_id;
                            if (!selectedIds_Duplicate.includes(idToPush)) {
                                selectedIds_Duplicate.push(idToPush);
                            }

                            jumlah_diskon = mapping.jumlah_diskon;

                            tableColumn += `
                                <tr>
                                    <td>${mapping.siswa.nama}</td>
                                    <td>Rp${formatRupiah(mapping.jumlah_tagihan.toString())}</td>
                                    <td style="text-transform:uppercase;">
                                        <span class="badge ${mapping.status_pembayaran.toLowerCase() === 'lunas' ? 'bg-success' : 'bg-danger'}">
                                            ${mapping.status_pembayaran}
                                        </span>
                                    </td>
                                    <td class="text-end">
                                        ${mapping.status_pembayaran.toLowerCase() === 'lunas' ? '' : 
                                        `<button type="button" class="btn btn-sm btn-outline-danger" onclick="deleteData(${mapping.id});">
                                            <i class="bx bx-minus"></i> Hapus
                                        </button>`}
                                    </td>
                                </tr>
                            `;
                        });

                        tableColumn += `
                                    </tbody>
                                </table>
                            </div>
                        
                        `;

                            const totalStudents = studentData.length;
                            const paidStudents = studentData.filter(s => s.status_pembayaran.toLowerCase() === 'lunas').length;
                            const unpaidStudents = totalStudents - paidStudents;
                            const paidPercentage = totalStudents > 0 ? Math.round((paidStudents / totalStudents) * 100) : 0;
                            
                            // Calculate total amounts
                            const totalExpected = studentData.reduce((sum, s) => sum + parseInt(s.jumlah_tagihan), 0);
                            const totalPaid = studentData
                                .filter(s => s.status_pembayaran.toLowerCase() === 'lunas')
                                .reduce((sum, s) => sum + parseInt(s.jumlah_tagihan), 0);
                            
                            // Update UI
                            $('#totalStudents').text(totalStudents);
                            $('#paidStudents').text(paidStudents);
                            $('#unpaidStudents').text(unpaidStudents);
                            $('#paidPercentage').text(`${paidPercentage}%`);
                            $('#unpaidPercentage').text(`${100 - paidPercentage}%`);
                            $('#totalAmount').text(`Rp${formatRupiah(totalPaid.toString())}`);
                            $('#totalExpected').text(`Dari Rp${formatRupiah(totalExpected.toString())}`);
                            $('#progressPercentage').text(`${paidPercentage}%`);
                            $('#paymentProgress').css('width', `${paidPercentage}%`);
                        
                        

                        $('.puter2').html(tableColumn);
                    }
                }
                save2();
            }

            function filterStudentTable() {
                const input = document.getElementById('studentSearchInput');
                const filter = input.value.toUpperCase();
                const table = document.getElementById('studentTableBody');
                const rows = table.getElementsByTagName('tr');
                
                for (let i = 0; i < rows.length; i++) {
                    const nameCell = rows[i].getElementsByTagName('td')[0];
                    if (nameCell) {
                        const txtValue = nameCell.textContent || nameCell.innerText;
                        rows[i].style.display = txtValue.toUpperCase().indexOf(filter) > -1 ? "" : "none";
                    }       
                }
            }
            
            function filterStudentTableTambahKeTagihan() {
    const input = document.getElementById('studentSearchInputTambahKeTagihan');
    const filter = input.value.toUpperCase().trim();
    const table = document.getElementById('studentTableBodyTambahKeTagihan');
    const rows = table.getElementsByTagName('tr');
    let visibleCount = 0;
    
    for (let i = 0; i < rows.length; i++) {
        let row = rows[i];
        let displayRow = false;
        
        // Skip rows with colspan (header, messages, etc.)
        if (row.querySelector('td[colspan]')) {
            row.style.display = filter ? 'none' : '';
            continue;
        }
        
        // Search across all columns
        const cells = row.getElementsByTagName('td');
        for (let j = 0; j < cells.length; j++) {
            const cellText = cells[j].textContent || cells[j].innerText;
            if (cellText.toUpperCase().indexOf(filter) > -1) {
                displayRow = true;
                break; // No need to check other cells if found
            }
        }
        
        // Show/hide row based on search match
        row.style.display = displayRow ? '' : 'none';
        if (displayRow) visibleCount++;
    }
    
    // Update result counter if exists
    const counterElement = document.getElementById('studentResultCountTambahKeTagihan');
    if (counterElement) {
        counterElement.textContent = `${visibleCount} siswa ditemukan`;
    }
    
}
            
            function clearStudentSearch() {
                document.getElementById('studentSearchInput').value = "";
                filterStudentTable();
            }
            
            function clearStudentSearchTambahKeTagihan() {
                document.getElementById('studentSearchInputTambahKeTagihan').value = "";
                filterStudentTable();
            }

            function openDialogAddUserToTagihan(){
                $('#modalViewAddUserToTagihan').modal('toggle');
                showData(endPointGetDataSiswa);
                showSubKelas();
            }

            function deleteData(str){
                $('#modalDelete').modal('toggle');
                uidsettt = str;
            }

            function commitDeleteData(){

                let paskod = $('#passcode2').val();

                if(paskod!='SUBMIT'){
                    Toastify({
                        text: "Anda belum mengetik SUBMIT dengan benar! Cek kembali inputan Anda.",
                        duration: 3000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        className: "errorMessage",

                    }).showToast();
                    $('#btndilit').html('Hapus Sekarang');
                    $('#btndilit').attr('disabled', false);
                    $('#btndilit').css('cursor', 'pointer');
                    return false;

                }

                let noted = $('#noted2').val();
                if(noted==''){
                    noted = "Tidak ada alasan diberikan.";
                }

                var form_data3 = new FormData();
                form_data3.append('id', uidsettt);
                form_data3.append('noted', noted);
                
                const save = async (form_data3) => {
                    const posts = await axios.post('<?= api_url_tagihan(); ?>api/tagihan-siswa/is-delete',form_data3, {
                        headers: {
                            'Authorization': 'Bearer ' + localStorage.getItem('_token')
                        }
                    }).catch((err) => { 

                        if(err.error){
                            Toastify({
                                text: 'Maaf. Data tidak ditemukan.',
                                duration: 3000,
                                close: true,
                                gravity: "bottom",
                                position: "left",
                                className: "errorMessage",

                            }).showToast();
                            return false;
                        }

                        for (const key in err.response.data.error) {
                                Toastify({
                                    text: err.response.data.error[key],
                                    duration: 3000,
                                    close: true,
                                    gravity: "bottom",
                                    position: "left",
                                    className: "errorMessage",

                                }).showToast();
                            }
                    });

                    if (posts.status == 200) {

                        Toastify({
                            text: "Berhasil dikeluarkan dari tagihan",
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "left",
                            className: "successMessage",

                        }).showToast();

                        getListTertagih(idsett);
                        uidsettt = '';
                        
                        $('#modalDelete').modal('toggle');


                    } else {

                    }
                }

			save(form_data3);
		}
			
            
            function showModalDelete(str){

				$('#modalViewDelete').modal('toggle');

                modesett = str;

				

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
						const posts2 = await axios.get('<?= api_url_tagihan(); ?>api/master/jenis-tagihan/'+mode, {
							headers: {
								'Authorization': 'Bearer ' + localStorage.getItem('_token')
							}
						}).catch((err) => {
							console.log(err.response);
						});
				
						if (posts2.status == 200) {
							$('#tagihan_name').val(posts2.data.data.name);

							
						}
					}
					save2();
				}
				$('#modalSetTagihan').modal('toggle');
			}

			function procModifyTagihan(){
				$('#submitBtnTagihan').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Memproses...');
				$('#submitBtnTagihan').attr('disabled', 'disabled');
				$('#submitBtnTagihan').css('cursor', 'not-allowed');

				let url = '';
				if(modesett=='add'){
					url = '<?= api_url_tagihan(); ?>api/master/jenis-tagihan';
				}else {
					url = '<?= api_url_tagihan(); ?>api/master/jenis-tagihan/'+modesett;
				}

				var tagihan_name = $("#tagihan_name").val();
				var tahun_ajaran = $("#tahun_ajaran").val();
				var description = $("#description").val();

                let props_value = [];

                props_value.push({
                    "description" : description
                });

                let new_name = tagihan_name+" "+tahun_ajaran;
				let tagihan_name_convertion = new_name.replace(/\s+/g, '_').replace(/\//g, '_');
				var timestamp = Date.now();
				tagihan_name_convertion += '_' + timestamp;

				var form_data = new FormData();

				form_data.append('name', new_name);
				form_data.append('value', tagihan_name_convertion);
				form_data.append('json_props', JSON.stringify(props_value));

				const save = async (str) => {
					const posts = await axios.post(url,form_data, {
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

					if (posts.status == 200||posts.status == 201) {
						Toastify({
							text: 'Jenis tagihan berhasil ditambahkan.',
							duration: 3000,
							close: true,
							gravity: "top",
							position: "right",
							className: "successMessage",

						}).showToast();
						$('#modalSetTagihan').modal('toggle');
						// getTagihanList();
                        getJenisTagihanList();

						idsett = posts.data.data.id;
						modesett = posts.data.data.value;
						runAddNominalData();

						$('#submitBtnTagihan').html('Simpan');
						$('#submitBtnTagihan').attr('disabled', false);
						$('#submitBtnTagihan').css('cursor', 'pointer');
					} else {

					}
				}
				save(form_data);
			}
			
            
            function procDeleteTagihan(){
				$('#submitBtnDelete').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Memproses...');
				$('#submitBtnDelete').attr('disabled', 'disabled');
				$('#submitBtnDelete').css('cursor', 'not-allowed');

                let paskod = $('#passcode').val();

                if(paskod!='SUBMIT'){
                    Toastify({
                        text: "Anda belum mengetik SUBMIT dengan benar! Cek kembali inputan Anda.",
                        duration: 3000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        className: "errorMessage",

                    }).showToast();
                    $('#submitBtnDelete').html('Hapus Sekarang');
                    $('#submitBtnDelete').attr('disabled', false);
                    $('#submitBtnDelete').css('cursor', 'pointer');
                    return false;

                }

				let url = '';
				if(modedelete=='jenis-tagihan'){

                    let noted = $('#noted').val();
                    if(noted==''){
                        noted = "Tidak ada alasan diberikan.";
                    }

                    var form_data3 = new FormData();
                    form_data3.append('id', modesett);
                    form_data3.append('noted', noted);
                    
					url = '<?= api_url_tagihan(); ?>api/master/jenis-tagihan/is-delete';
                    const save = async (form_data3) => {
                        const posts = await axios.post(url,form_data3,{
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


                                $('#submitBtnDelete').html('Hapus Sekarang');
                                $('#submitBtnDelete').attr('disabled', false);
                                $('#submitBtnDelete').css('cursor', 'pointer');
                            }
                        });

                        if (posts.status == 200||posts.status == 201) {
                            Toastify({
                                text: 'Jenis tagihan berhasil dihapus.',
                                duration: 3000,
                                close: true,
                                gravity: "top",
                                position: "right",
                                className: "successMessage",

                            }).showToast();
                            $('#modalViewDelete').modal('toggle');
                            // getTagihanList();
                            getJenisTagihanList();

                            $('#passcode').val('');

                            $('#submitBtnDelete').html('Hapus Sekarang');
                            $('#submitBtnDelete').attr('disabled', false);
                            $('#submitBtnDelete').css('cursor', 'pointer');
                        } else {

                        }
                    }
                    save(form_data3);

				}else {
					let noted = $('#noted').val();
                    if(noted==''){
                        noted = "Tidak ada alasan diberikan.";
                    }

                    var form_data3 = new FormData();
                    form_data3.append('id', modesett);
                    form_data3.append('noted', noted);
                    
					url = '<?= api_url_tagihan(); ?>api/tagihan/is-delete';
                    const save = async (form_data3) => {
                        const posts = await axios.post(url,form_data3,{
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


                                $('#submitBtnDelete').html('Hapus Sekarang');
                                $('#submitBtnDelete').attr('disabled', false);
                                $('#submitBtnDelete').css('cursor', 'pointer');
                            }
                        });

                        if (posts.status == 200||posts.status == 201) {
                            Toastify({
                                text: 'Jenis tagihan berhasil dihapus.',
                                duration: 3000,
                                close: true,
                                gravity: "top",
                                position: "right",
                                className: "successMessage",

                            }).showToast();
                            $('#modalViewDelete').modal('toggle');
                            // getTagihanList();
                            getJenisTagihanList();

                            $('#submitBtnDelete').html('Hapus Sekarang');
                            $('#submitBtnDelete').attr('disabled', false);
                            $('#submitBtnDelete').css('cursor', 'pointer');
                        } else {

                        }
                    }
                    save(form_data3);
				}

                
			}

			function runAddNominalData(){
				var form_data3 = new FormData();
				form_data3.append('kategori_tagihan', modesett);
				form_data3.append('nominal_tagihan', 0);
				form_data3.append('jenis_tagihan_id', idsett);

				const save3 = async (form_data3) => {
					const posts = await axios.post('<?= api_url_tagihan(); ?>api/master/nominal-tagihan', form_data3, {
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
				save3(form_data3);
			}


            function procSubmitDuplication_1st() {
                // PROCESS 1
                
                showLoading();

                
                let m2val = $('#namaTagihanDuplikat').val();
                let m3val = $('#tanggalJatuhTempo').val();
                let m4val = $('#tanggalPenagihan').val();

                if (
                    (old_tgl_jatuh_tempo === m3val && old_tgl_penagihan === m4val) ||
                    (old_tgl_jatuh_tempo === m4val && old_tgl_penagihan === m3val)
                ) {
                    Toastify({
                        text: "Tanggal Penagihan / Jatuh Tempo Tidak Boleh Sama Dengan Yang Lama!",
                        duration: 3000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        className: "errorMessage",
                    }).showToast();

                    hideLoading();
                    return false;
                }

                console.log("old",old_tgl_jatuh_tempo,old_tgl_penagihan);
                console.log("new",m3val,m4val);

                var form_data = new FormData();
                form_data.append('jenis_tagihan_id', dup_jenis_tagihan_id);
                form_data.append('nama_tagihan', m2val);
                form_data.append('tanggal_mulai_tagihan', m4val);
                form_data.append('tanggal_jatuh_tempo', m3val);


                for (var pair of form_data.entries()) {
                    console.log(pair[0]+ ': ' + pair[1]);
                }

                console.log('diskon',jumlah_diskon);
                console.log('data',selectedIds_Duplicate);

                // return false;

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

                    let datanominalfinal = $('#hargaFinal').html();
                    let numberOnly = datanominalfinal.replace(/[^\d]/g, ''); // removes non-digits
                    nominal_new = numberOnly;

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

                                runSetUserTagihanByIDTagihanCreated_Duplicate();

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
                

                function runSetUserTagihanByIDTagihanCreated_Duplicate(){

                    //PROCESS_3
                    showLoading();
                            
                    var form_data = new FormData();

                    let desc = $('#namaTagihanDuplikat').val();
                    
                    form_data.append('tagihan_id', idsaved);
                    // form_data.append('user_siswa_id', "["+selectedIds+"]");
                    // form_data.append('oncard_siswa_id[]', selectedIds);
                    selectedIds_Duplicate.forEach(id => {
                        form_data.append('oncard_siswa_id[]', id);
                    });
                    form_data.append('nominal', nominal_new);
                    form_data.append('jumlah_diskon', jumlah_diskon);
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
                            // window.location.href="<?=base_url();?>CPanel_Tagihan/JenisTagihan";
                        } else {
                            hideLoading();
                        }
                    }
                    save(form_data);
                }


        </script>