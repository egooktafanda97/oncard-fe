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
                   <div class="col-lg-12 col-md-12 col-12 mb-4">
                    <div class="row">
                        <div class="col">
					        <h6><i style="cursor:pointer; padding:10px;padding-left:0px;" onclick="history.back();" class="bx bx-chevron-left me-2"></i>Filter Data</h6>
                        </div>
                        <div class="col-lg-3 col-md-6 col-12 text-center  pb-3 pt-1" style="background:#f2f2f2; border-radius:10px;background: #10A0A2;
background: linear-gradient(90deg, rgba(16, 160, 162, 1) 0%, rgba(16, 160, 162, 1) 40%, rgba(88, 196, 114, 1) 100%);">
                            
                            <label for="setKelasSwitch" style="display:block;font-weight:bold;" class="form-label text-white">Beralih ke Kelas :</label>
                            <select class="form-control " style="font-size:11px; width:100%;" id="setKelasSwitch">
                                <option value="">Cari kelas</option>
                            </select>                   
                            
                        </div>
                    </div>
					
                    <div class="row">
                        <div class="col-3">
                        <label for="setKelas" style="display:block;" class="form-label">Kelas</label>
                        <select class="form-control" style="font-size:11px; width:100%;" id="setKelas">
                            <option value="">Cari kelas</option>
                        </select>                   
                        </div>
                        <div class="col-3">
                        <label for="setTahunAkademik" style="display:block;" class="form-label">Tahun Akademik</label>
                        <select class="form-control" style="font-size:11px; width:100%;" id="setTahunAkademik">
                            <option value="">Cari tahun akademik</option>
                        </select>
                        </div>
                        <!-- <div class="col-3">
                        <label for="setSemester" style="display:block;" class="form-label">Semester</label>
                        <select class="form-control" style="font-size:11px; width:100%;" id="setSemester">
                            <option value="">Cari tahun semester</option>
                        </select>
                        </div> -->
                        <div class="col-3">
                        <button class="btn btn-primary my-3 mt-4" onclick="setParameterFilter();" id="btnSKS" style=" background: #10A0A2;
background: linear-gradient(90deg, rgba(16, 160, 162, 1) 0%, rgba(16, 160, 162, 1) 40%, rgba(88, 196, 114, 1) 100%);display:block; border-top-right-radius:100px;border-bottom-left-radius:55px; border-bottom-right-radius:100px;">Tampilkan Kelas</button>    
                        </div>
                    </div>
					
				   </div>

				   <div class="col-lg-4 col-md-6 col-12 mb-4">
				   <h4 style="padding:10px;padding-left:0px;">Siswa Tersedia</h4>
				   <div class="row mb-2"  style="max-height:70vh!important;overflow-y:scroll;width:100%; border-radius:20px; box-shadow:5px 15px 20px #eee; overflow-x:none; padding:10px; padding-top:20px; background:#fff; ">
				   	<input type="text" oninput="searchSiswa(this.value)"  class="form-control mb-2" style="border:none;outline:none;" placeholder="Cari nama pelajar...">
				   </div>
				   <div class="row putlistsiswa"  style="max-height:70vh!important;overflow-y:scroll;width:100%; border-radius:20px; box-shadow:5px 15px 20px #eee; overflow-x:none; padding:10px; padding-top:20px; background:#fff; ">
				   	<div class="alert alert-secondary">Tentukan variabel filter terlebih dahulu, ya.</div>
				   </div>
				  </div>

                   <div class="col-lg-8 col-md-6 col-12">
				   <h4 style="padding:10px;padding-left:0px;">Daftar Peserta Didik</h4>
					 <div class="card radius-1" style="border-radius:15px; background:#f8fbfa;box-shadow:5px 15px 20px #eee;">
						<div class="card-body">
							
						<div class="table-responsive" style="margin-top:5px;">
						<button class="btn btn-sm btn-outline-primary me-2 mb-3" id="btnSave2PDF" onclick="save2PDF('example');" style="border-radius:0px;"><i class="bx bxs-file-export"></i> Export PDF</button>
						<button class="btn btn-sm btn-outline-success me-2 mb-3" onclick="saveToExcel('tabelsiswa');" style="border-radius:0px;"><i class="bx bxs-file-export"></i> Export Excel</button>
							<table id="example" class="tabelsiswa table table-hover table-striped tabelproduk" style="overflow:hidden; border-radius:10px;width:100%;font-size:12px!important;">
								<thead class="table-light">
									<tr>
										<th>No.</th>
										<th>Tingkat</th>
										<th>Kelas</th>
										<th>Sub-Kelas</th>
										<th>Sub-Kelas</th>
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
			
			<div class="modal fade" id="modalReasonKeluarKelas" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-sm modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title titledetail">Alasan : </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body puter table-responsive">
                            <!-- Select for Reason -->
                            <div class="d-block">
                            <label for="setAlasanDikeluarkan" style="font-size:11px;">Pilih Alasan :</label><br/>
                            <select class="form-control" style="font-size:11px; width:100%;" id="setAlasanDikeluarkan" onchange="toggleKelasTujuan(this.value)">
                                <option value=" ">PILIH ALASAN YANG TEPAT</option>
                                <option value="NAIK_KELAS">NAIK / PINDAH KELAS</option>
                                <!-- <option value="TIDAK_NAIK_KELAS">TIDAK NAIK KELAS</option> -->
                                <!-- <option value="PINDAH_SEKOLAH">PINDAH SEKOLAH</option>
                                <option value="DROP_OUT">DROPPED OUT</option> -->
                                <!-- <option value="LAINNYA">LAINNYA</option> -->
                            </select>
                            </div>

                            <!-- Select for Kelas Tujuan -->
                            <div id="kelasTujuanContainer" style="display: none; margin-top: 10px;">
                                <label for="kelasTujuan" style="font-size:11px;">Pilih Kelas Tujuan:</label>
                                <select class="form-control" style="font-size:11px; width:100%;" id="kelasTujuan">
                                </select>
                            </div>
                            <div id="tahunAkademikContainer" style="display: none; margin-top: 10px;">
                                <label for="TATujuan" style="font-size:11px;">Pilih Tahun Akademik:</label>
                                <select class="form-control" style="font-size:11px; width:100%;" id="TATujuan">
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer text-center">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="button" class="btn btn-success" id="submitBtnTagihan" onclick="procKeluarKelas();">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                // Function to toggle the visibility of the Kelas Tujuan dropdown and populate its values
                function toggleKelasTujuan(selectedValue) {
                    const kelasTujuanContainer = document.getElementById('kelasTujuanContainer');
                    const kelasTujuanSelect = document.getElementById('kelasTujuan');
                    
                    const tahunAkademikContainer = document.getElementById('tahunAkademikContainer');
                    
                    if (selectedValue === "NAIK_KELAS") {
                        // Show the container
                        tahunAkademikContainer.style.display = "block";
                        kelasTujuanContainer.style.display = "block";

                        // Clear existing options
                        kelasTujuanSelect.innerHTML = "";

                        newpathNotThisClass.sort((a, b) => a.name.localeCompare(b.name));
                        // Populate the dropdown with newpathNotThisClass items
                        $('#kelasTujuan').html('');
                        $('#kelasTujuan').append('<option value="" selected disabled>Pilih kelas tujuan</option>');

                        newpathNotThisClass.map((mapping, i) => {
                            // Create a new option
                            const option = new Option(mapping.name, mapping.id);

                            // Add sub_kelas_id as a data attribute
                            option.dataset.kelasID = mapping.kode_kelas;

                            // Append the option to the select dropdown
                            kelasTujuanSelect.appendChild(option);

                        
                    
                        });

                        // Event listener to log the selected option details
                        kelasTujuanSelect.addEventListener('change', (event) => {
                            const selectedOption = event.target.selectedOptions[0];
                            const selectedSubKelasId = selectedOption.value; // Value of the selected option
                            const selectedKodeKelas = selectedOption.dataset.kelasID; // sub_kelas_id from the dataset

                            console.log(`Selected Kode Kelas: ${selectedKodeKelas}`);
                            console.log(`Selected Sub Kelas ID: ${selectedSubKelasId}`);

                            // Create a new object (shallow copy) from newpath20
                            newpath21 = { ...newpath20 };

                            // Update kelas_id and sub_kelas_id in newpath21
                            newpath21.kelas_id = selectedKodeKelas;
                            newpath21.sub_kelas_id = selectedSubKelasId;

                            // Log both objects to confirm changes
                            console.log("newpath20:", newpath20);
                            console.log("newpath21:", newpath21);

                        });

                    } else {
                        // Hide the container and clear options
                        kelasTujuanContainer.style.display = "none";
                        kelasTujuanSelect.innerHTML = ""; // Optional: Clear options if not "NAIK_KELAS"
                    }
                }
            </script>


			
			<div class="modal fade" id="modalSetTagihan" tabindex="-1" aria-hidden="true">
				<div class="modal-dialog modal-sm modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Formulir Sub-Kelas</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body addmodify">
							<div class="row g-3">
								<div class="col-md-12">
									<label for="namaKelas" style="display:block;" class="form-label">Sub-Kelas Alias</label>
									<div class="input-group">
										<input type="text" class="form-control" id="namaKelas" placeholder="Nama kelas" aria-label="Text input with prefix" aria-describedby="basic-addon1">
									</div>
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

			let kelasID;
			let subkelasID;
			let tahunAkademikID;
			let semesterID;
			let modeActive = true;
            let idSemesterSetted;

			let reasonout = '';

			function setParameterFilter(){
                $('#btnSKS').attr('disabled', 'disabled');
				$('#btnSKS').css('cursor', 'not-allowed');
				showSiswaAll();

                $('#TATujuan').html('');
                $('#TATujuan').html('<option value="">Pilih Tahun Akademik</option>');

                newpathNotThisTA.map((mapping, i) => {
                    // const isSelected = mapping.id_tahun_akademik == tahunAkademikID; //use it when need auto selected
                    const isSelected = 00001;

                    const option = new Option(
                        mapping.nama_tahun_akademik + " " + mapping.kode_semester +" ("+mapping.id_tahun_akademik+")",
                        mapping.id_tahun_akademik,
                        false,
                        false
                    );

                    // Store id_semester as a data attribute
                    $(option).attr('data-id-semester', mapping.id_semester);

                    $('#TATujuan').append(option);
                });

			}

            $('#TATujuan').on('change', function () {
                const selectedOption = $(this).find(':selected');
                const idTahunAkademik = $(this).val(); // selected value
                const idSemester = selectedOption.data('id-semester'); // get data-id-semester

                idSemesterSetted = idSemester;

                console.log(idSemesterSetted);

                // You can now use both in your logic
            });
            
            $('#setKelasSwitch').on('change', function () {
                
                const selectedValue = $(this).val();
                
                
                window.location.href="<?=base_url();?>CPanel_Core/ManageKelasSiswa/<?=$idKelas;?>/"+selectedValue;

                // You can now use both in your logic
            });

			$(document).ready(function () {
				// getTahunAkademik();

                kelasID = '<?=$idKelas;?>';
				subkelasID = '<?=$idData;?>';
				showKelas();
				$('#setKelas').select2({
					placeholder: 'Pilih kelas...',
					// dropdownParent: $('#modalSetTagihan'), // Replace #myModal with the actual modal ID
					minimumInputLength: 0
				}).on('change', function (e) {
					// Your code here
					const selectedValue = $(this).val(); // Get the selected value
					idsettKelas = selectedValue; //set id tahun akademik
					idsett2 = $(this).find('option:selected').text();

				});
				
				$('#setAlasanDikeluarkan').select2({
					placeholder: 'Pilih alasan keluar...',
					// dropdownParent: $('#modalSetTagihan'), // Replace #myModal with the actual modal ID
					minimumInputLength: 0
				}).on('change', function (e) {
					// Your code here
					const selectedValue = $(this).val(); // Get the selected value
					reasonout = selectedValue;
					
				});
            });

            function goToKelasSiswa(str){
                window.location.href='<?=base_url();?>CPanel_Core/ManageKelasSiswa/'+str;
            }

			let newpath = [];
			let newpath2 = [];
			let newpath3 = [];
			let newpath4 = [];
			let newpath5 = [];
			let newpath6 = [];
			let newpath7 = [];
            let newpath19 = [];
            let newpath20 = [];
            let newpath21 = [];

            let siswaID = '';
            let subKelasID = '';
            let statusPerubahan = '';

            let newpathNotThisTA = [];
            function showTahunAkademik(){
				axios.get('<?= api_url_core(); ?>api/master/semester', {
					headers: {
						'Authorization': 'Bearer ' + localStorage.getItem('_token')
					}
				}).then(response => {
					
					const today = new Date().toISOString().split('T')[0]; // Get today's date in YYYY-MM-DD format
                    let selectedKodeTahunAkademik = null;

                    response.data.map((mapping, i) => {
                        newpath.push({
                            'tahun_mulai': mapping.tanggal_mulai,
                            'tahun_selesai': mapping.tanggal_selesai,
                            'tahun_akademik': mapping.tahun_akademik.tahun_akademik + " " + mapping.semester,
                            'kode_tahun_akademik': mapping.id,
                            'kode_tahun_akademik_id': mapping.tahun_akademik_id,
                        });

                        newpathNotThisTA.push({
                            'id_semester' : mapping.id,
                            'kode_semester' : mapping.semester,
                            'id_tahun_akademik' : mapping.tahun_akademik.id,
                            'nama_tahun_akademik' : mapping.tahun_akademik.tahun_akademik,
                            'combined': mapping.tahun_akademik.tahun_akademik + " " + mapping.semester // for sorting

                        });
                    });

                    newpathNotThisTA.sort((a, b) => a.combined.localeCompare(b.combined));

                    
                    // Sort by 'tahun_mulai'
                    newpath.sort((a, b) => new Date(a.tahun_mulai) - new Date(b.tahun_mulai));

                    // Append options and determine the selected one
                    newpath.map((mapping, i) => {
                        const option = new Option(mapping.tahun_akademik+" ("+mapping.kode_tahun_akademik_id+")", mapping.kode_tahun_akademik, false, false);
                        
                        // Store kode_tahun_akademik_id as a data attribute
                        $(option).attr('data-kode-id', mapping.kode_tahun_akademik_id);

                        // Check if today falls within the range
                        if (mapping.tahun_mulai <= today && today <= mapping.tahun_selesai) {
                            option.selected = true;
                            selectedKodeTahunAkademik = mapping.kode_tahun_akademik; // Store selected value
                        }

                        $('#setTahunAkademik').append(option);
                    });

                    // Set Select2 value programmatically (if using Select2)
                    // if (selectedKodeTahunAkademik) {
                    //     $('#setTahunAkademik').val(selectedKodeTahunAkademik).trigger('change');
                    // }

                    // Auto-select the first non-empty option
                    const firstValidOption = $('#setTahunAkademik option[value!=""]').first();
                    if (firstValidOption.length) {
                        $('#setTahunAkademik').val(firstValidOption.val()).trigger('change');
                    }

                    // Set Select2 value programmatically (if using Select2)
                    
                    // showSiswaAll();
                    setParameterFilter();

				})
				.catch(error => {
					console.error('Error fetching data:', error);
				});
			}

            // Event listener to get selected kode_tahun_akademik_id
            $('#setTahunAkademik').on('change', function() {
                let selectedOption = $(this).find(':selected');
                
                // Use .attr() instead of .data()
                let selectedKodeTahunAkademikId = selectedOption.attr('data-kode-id'); 

                tahunAkademikID = selectedKodeTahunAkademikId;
                semesterID = $('#setTahunAkademik').val();

                console.log("Selected kode_tahun_akademik_id:", tahunAkademikID,semesterID);
            });

            let newpathNotThisClass = [];
            function showKelas(){

				axios.get('<?= api_url_core(); ?>api/master/sub-kelas', {
					headers: {
						'Authorization': 'Bearer ' + localStorage.getItem('_token')
					}
				}).then(response => {

                    let newpath4 = [];
					
					response.data.map((mapping,i)=>{
                        newpathNotThisClass.push({
                                'tingkat' : mapping.tingkat,
								'kode_kelas' : mapping.kelas_id,
								'id' : mapping.id,
								'name' : mapping.name,
                            });
						if(mapping.id=='<?=$idData;?>'){
							newpath3.push({
								'tingkat' : mapping.tingkat,
								'kode_kelas' : mapping.id,
								'name' : mapping.name,
								'tanggal_mulai' : mapping.tanggal_mulai,
								'tanggal_selesai' : mapping.tanggal_selesai,
							});
						}

                        newpath4.push({
                            'tingkat' : mapping.tingkat,
                            'kode_kelas' : mapping.id,
                            'name' : mapping.name,
                            'tanggal_mulai' : mapping.tanggal_mulai,
                            'tanggal_selesai' : mapping.tanggal_selesai,
                        });
                        
                        // else {
                        //     newpathNotThisClass.push({
                        //         'tingkat' : mapping.tingkat,
						// 		'kode_kelas' : mapping.kelas_id,
						// 		'id' : mapping.id,
						// 		'name' : mapping.name,
                        //     });
                        // }
					});

					newpath3.sort((a, b) => a.tingkat - b.tingkat);
					newpathNotThisClass.sort((a, b) => a.tingkat - b.tingkat);

					newpath3.map((mapping,i)=>{
						const option = new Option(mapping.name, mapping.id, true, true);
						
						// Append it to the select2 dropdown
						$('#setKelas').append(option);
					});
					
                    newpath4.sort((a, b) => a.tingkat - b.tingkat);
					
					// Add default option at the top
                    $('#setKelasSwitch').html('<option value="">Pilih Kelas Tujuan</option>');

                    // Append the rest of the options from newpath4
                    newpath4.map((mapping, i) => {
                        const option = new Option(mapping.name, mapping.kode_kelas, false, false);
                        $('#setKelasSwitch').append(option);
                    });

					
                    
                    // newpathNotThisClass.map((mapping,i)=>{
					// 	const option = new Option(mapping.name, mapping.id, true, true);
						
					// 	// Append it to the select2 dropdown
					// 	$('#kelasTujuan').append(option);
					// });

                    // newpathNotThisClass.sort((a, b) => a.name.localeCompare(b.name));

                    // $('#kelasTujuan').html('');
                    // $('#kelasTujuan').append('<option value="" selected disabled>Pilih kelas tujuan</option>');


                    // newpathNotThisClass.map((mapping, i) => {
                    //     const option = new Option(mapping.name, mapping.id, false, false);
                    //     // $('#kelasTujuan').append(option);
                    // });


					showTahunAkademik();
					// showSemester();
				})
				.catch(error => {
					console.error('Error fetching data:', error);
				});
			}

            
			function showSiswaAll(){
				newpath4 = [];
				axios.get('<?= api_url_core(); ?>api/master/siswa/siswa-detail', {
					headers: {
						'Authorization': 'Bearer ' + localStorage.getItem('_token'),
						'nopaging' : false
					}
				}).then(response => {
					

                    let newpath5=[];

					response.data.map((mapping,i)=>{
						newpath4.push({
							'id_siswa' : mapping.siswa_kelas?.siswa_id??mapping.id,
							// 'id_siswa' : mapping.id,
							'nama' : mapping.name,
							'kelas' : mapping.siswa_kelas?.kelas_id??'-',
							'nis' : mapping.detail?.nis??'-',
							'has_kelas' : mapping.siswa_kelas,
						})
					});

					newpath4.sort((a, b) => a.nama.localeCompare(b.nama));

                    newpath4.forEach(item => {
                        if (item.has_kelas && item.has_kelas.semester_id==semesterID && item.has_kelas.sub_kelas_id==subkelasID) {
                            newpath5.push(item);
                        }
                    });

                    newpath19 = newpath5;
                    
                    let html = '';

                    const filteredData = newpath4.filter(item => Array.isArray(item.has_class) && item.has_class.length === 0);

                    console.log("ahai",filteredData);
					newpath4.map((mapping,i)=>{
                        if(!mapping.has_kelas){
                            html +=`
                            
                                <div class="col-10">
                                    <p style="font-size:12px;"><i class="bx bxs-circle text-success"></i> ${mapping.nama}
                                    <br/>
                                    <small style="font-size:10px;">${mapping.nis}</small>
                                    </p>
                                </div>
                                <div class="col-2 text-end">
                                    <button type="button" onclick="setKeKelasNya('${mapping.id_siswa}');" style="font-size:11px;padding:6px;" class="btn btn-sm btn-success" ><i class="bx bx-arrow-from-left"></i></button>
                                </div>
                            `;
                        }
					});


                    $('.putlistsiswa').html(html);


                    // Destroy the DataTable if it already exists
                    if ($.fn.DataTable.isDataTable('#example')) {
                        $('#example').DataTable().destroy();
                        $('#example').empty(); // Optional: clear the table contents to avoid residual data
                    }

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
                        data : newpath5,
                        columns: [
                            {
                                data: '',
                                title: 'No.',
                                render: function (data, type, row, meta) {
                                    // `meta.row` gives you the zero-based row index
                                    return `<span class="kode-semester text-dark" style="font-weight: bold;">
                                                ${meta.row + 1}  <!-- Convert zero-based index to one-based -->
                                            </span>`;
                                }
                            },
                            { 
                                data: 'kode_sub_kelas', 
                                title: 'Nama Siswa', 
                                render: function (data, type, row) {
                                    
                                    return `<span class="kode-kunjungan text-dark" style="font-weight: normal; ">
                                                ${row.nama}
                                            </span>`;
                                } 
                            },
                            { 
                                data: 'semester', 
                                title: 'NIS/NISN', 
                                render: function (data, type, row) {
                                    
                                    return `<span class="kode-kunjungan text-dark" style="font-weight: normal; ">
                                                ${row.nis??'-'}
                                            </span>`;
                                } 
                            },
                           
                            { 
                                data: 'kelas', 
                                title: 'Kelas', 
                                render: function (data, type, row) {
                                    
                                    return `<span class="kode-kunjungan text-dark" style="font-weight: normal; ">
                                                ${row.has_kelas.sub_kelas.name}
                                            </span>`;
                                } 
                            },
                            { 
                                data: null, 
                                title: 'Action',
                                orderable: false,
                                render: function (data, type, row) {
                                    return `
                                        <button class="btn btn-danger btn-sm" style="font-size:11px;" onclick="setKeluarKelas('${row.has_kelas.kelas_id}','${row.has_kelas.sub_kelas_id}','${row.has_kelas.siswa_id}','${row.has_kelas.tahun_akademik_id}','${row.has_kelas.semester_id}')"><i class="bx bx-arrow-from-right" style="font-size:1.6em;"></i> Mutasikan</button>
                                    `;
                                }
                            }
                        ],
                        lengthMenu: [[20, 35, 50, -1], [20, 35, 50, "All"]], // Add "All" option
                        pageLength: 20 // Default page length
                    } );
                    

                    $('#btnSKS').attr('disabled', false);
				    $('#btnSKS').css('cursor', 'pointer');
				})
				.catch(error => {
					console.error('Error fetching data:', error);
				});
			}

            // Function to render the filtered list
            function renderSiswaList(filteredData) {
                const container = document.querySelector(".putlistsiswa");
                container.innerHTML = ""; // Clear the current content

                if (filteredData.length === 0) {
                    container.innerHTML = `<div class="alert alert-warning">Tidak ada siswa ditemukan.</div>`;
                    return;
                }

                filteredData.forEach((mapping) => {
                    if (!mapping.has_kelas) {
                        const html = `
                            <div class="col-10">
                                <p style="font-size:12px;"><i class="bx bxs-circle text-success"></i> ${mapping.nama}
                                <br/>
                                <small style="font-size:10px;">${mapping.nis}</small>
                                </p>
                            </div>
                            <div class="col-2 text-end">
                                <button type="button" onclick="setKeKelasNya('${mapping.id_siswa}');" style="font-size:11px;padding:6px;" class="btn btn-sm btn-success" ><i class="bx bx-arrow-from-left"></i></button>
                            </div>
                        `;
                        container.insertAdjacentHTML("beforeend", html);
                    }
                });
            }

            // Function to handle the search
            function searchSiswa(query) {
                const filteredData = newpath4.filter((siswa) =>
                    siswa.nama.toLowerCase().includes(query.toLowerCase())
                );
                renderSiswaList(filteredData);
            }

            // Initial rendering of the list
            renderSiswaList(newpath4);


			function setKeKelasNya(idSiswa){

				var namaKategori = $("#namaKategori").val();
				
				var form_data = new FormData();

				form_data.append('kelas_id', kelasID);
				form_data.append('siswa_id', idSiswa);
				form_data.append('tahun_akademik_id', tahunAkademikID);
				form_data.append('semester_id', semesterID);
				form_data.append('sub_kelas_id', subkelasID);
				
				const save = async (str) => {
					const posts = await axios.post('<?= api_url_core(); ?>api/master/siswa-kelas',form_data, {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {
							Toastify({
								text: err.response.data.message,
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
						
						// table.ajax.reload();
                        showSiswaAll();

					} else {
					}
				}
				save(form_data);
			}
			
			
			function setKeluarKelas(idkelas, idsubkelas, idsiswa, idta,idsemester){
				
				idsett = idsiswa;
                
                newpath20 = newpath19.find(item => item.id_siswa == parseInt(idsiswa));

                $('#modalReasonKeluarKelas').modal('toggle');

                if (newpath20) {
                    // Add new items to the found object
                    newpath20.kelas_id = idkelas;
                    newpath20.sub_kelas_id = idsubkelas;
                    newpath20.tahun_akademik_id = idta;
                    newpath20.semester_id = idsemester;
                }

                console.log(newpath20);

				return false;
			}

			function procKeluarKelas(){
				var form_data = new FormData();

                let useNewPath;

                if (newpath21 && reasonout === 'NAIK_KELAS') {
                    useNewPath = newpath21;
                } else {
                    useNewPath = newpath20;
                }

                let ta_new = $('#TATujuan').val();

                if (useNewPath && useNewPath.has_kelas) {
                    form_data.append('kelas_id', useNewPath.kelas_id || '');
                    form_data.append('sub_kelas_id', useNewPath.sub_kelas_id || '');
                    form_data.append('siswa_id', useNewPath.id_siswa || '');
                    form_data.append('tahun_akademik_id', ta_new);
                    // form_data.append('tahun_akademik_id', useNewPath.tahun_akademik_id || '');
                    form_data.append('semester_id', idSemesterSetted);
                    // form_data.append('semester_id', useNewPath.semester_id || '');
                } else {
                    console.error("useNewPath or useNewPath.has_kelas is undefined");
                }
                form_data.append('status_perubahan', reasonout);


				const save = async (str) => {
					const posts = await axios.post('<?= api_url_core(); ?>api/master/siswa-kelas/mutasi',form_data, {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {
							Toastify({
								text: err.response.data.message,
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
						
						// idsett = '';
						// reasonout = '';
						// $('#modalReasonKeluarKelas').modal('toggle');
						// showSiswaAll();
                        location.reload();
                        

					} else {

					}
				}
				save(form_data);
			}

            // function procKeluarKelas(){
				
			// 	var form_data = new FormData();
			// 	form_data.append('status_perubahan', reasonout);

			// 	const save = async (str) => {
			// 		const posts = await axios.post('<?= api_url_core(); ?>api/master/siswa-kelas/update-siswa-kelas/'+idsett,form_data, {
			// 			headers: {
			// 				'Authorization': 'Bearer ' + localStorage.getItem('_token')
			// 			}
			// 		}).catch((err) => {
			// 				Toastify({
			// 					text: err.response.data.error,
			// 					duration: 3000,
			// 					close: true,
			// 					gravity: "top",
			// 					position: "right",
			// 					className: "errorMessage",

			// 				}).showToast();

			// 				$('#submitBtnTagihan').html('Simpan');
			// 				$('#submitBtnTagihan').attr('disabled', false);
			// 				$('#submitBtnTagihan').css('cursor', 'pointer');

			// 				return false;
			// 		});

			// 		if (posts.status == 200||posts.status == 201) {
			// 			Toastify({
			// 				text: 'Berhasil tersimpan.',
			// 				duration: 3000,
			// 				close: true,
			// 				gravity: "top",
			// 				position: "right",
			// 				className: "successMessage",

			// 			}).showToast();
						
			// 			idsett = '';
			// 			reasonout = '';
			// 			$('#modalReasonKeluarKelas').modal('toggle');
			// 			table.ajax.reload();

			// 		} else {

			// 		}
			// 	}
			// 	save(form_data);
			// }

			function showDetails(str){

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
					url = '<?= api_url_core(); ?>api/master/sub-kelas';
				}else {
					url = '<?= api_url_core(); ?>api/master/sub-kelas/'+modesett;
				}

				var form_data = new FormData();

				let penamaan = 'SUB-KLS-';

				let names = $('#namaKelas').val();

				form_data.append('sub_kelas', penamaan+""+names);
				form_data.append('kode_sub_kelas', penamaan+""+names);
				form_data.append('kelas_id', idsettKelas);
				form_data.append('name', names);
				
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