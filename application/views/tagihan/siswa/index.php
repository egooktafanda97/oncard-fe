<style>
    #keteranganCair {
        position: relative;
        height:30px;
        -webkit-transition:all 0.1s linear 0s;
    }
    #keteranganCair:focus {
        height:150px;
    }

    select {
        padding:20px!important;
        border-radius:10px!important;
        font-size:16px!important;
        
    }
    /* Padding inside the Select2 selection box */
    .select2-container .select2-selection--single {
        padding: 15px 15px; /* adjust as needed */
        height: auto;
        font-size: 15px;
    }

    /* Optional: Adjust dropdown items */
    .select2-results__option {
        padding: 6px 10px;
        font-size: 12px;
    }
</style>

<style type="text/css">
    .invoice-card {
    display: flex;
    flex-direction: column;
    position: relative;
    padding: 10px 2em;
    top: 0%;
    left: 50%;
    transform: translate(-50%, 0%);
    min-height: 25em;
    width: 22em;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0px 10px 30px 5px rgba(0, 0, 0, 0.15);
    }

    .invoice-card > div {
    margin: 5px 0;
    }

    .invoice-title {
    flex: 3;
    }

    .invoice-title #date {
    display: block;
    /* margin: 8px 0; */
    font-size: 12px;
    }

    .invoice-title #main-title {
    display: flex;
    justify-content: space-between;
    margin-top: 0em;
    }

    .invoice-title #main-title h4 {
    letter-spacing: 2.5px;
    }

    .invoice-title span {
    color: rgba(0, 0, 0, 0.4);
    }

    .invoice-details {
    flex: 1;
    border-top: 0.5px dashed grey;
    display: flex;
    align-items: center;
    }

    .invoice-table {
    width: 100%;
    border-collapse: collapse;
    }

    .invoice-table thead tr td {
    font-size: 12px;
    letter-spacing: 1px;
    color: grey;
    padding: 8px 0;
    }

    .invoice-table thead tr td:nth-last-child(1),
    .row-data td:nth-last-child(1),
    .calc-row td:nth-last-child(1)
    {
    text-align: right;
    }

    .invoice-table tbody tr td {
        padding: 8px 0;
        letter-spacing: 0;
    }

    .invoice-table .row-data #unit {
    text-align: center;
    }

    .invoice-table .row-data span {
    font-size: 13px;
    color: rgba(0, 0, 0, 0.6);
    }

    .invoice-footer {
    flex: 1;
    display: flex;
    justify-content: flex-end;
    align-items: center;
    }

    .invoice-footer #later {
    margin-right: 5px;
    }

</style>
<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Siswa</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Daftar Siswa</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
			  
				<div class="card">
					<div class="card-body">
						<div class="d-lg-flex align-items-center mb-4 gap-3">
							<div class="position-relative">
                            <a href="#/" onclick="window.location.href='<?=base_url().$function;?>/SyncPage';" class="btn btn-secondary radius-30 mt-2 me-3 mt-lg-0" style="color:white; margin-top:-10px!important;"><i class="bx bx-sync" ></i>Goto: Sync Data</a>
							</div>
						  <div class="ms-auto">
                                <button class="btn btn-sm btn-outline-primary mt-2 me-2 px-4 mb-3" id="btnSave2PDF" onclick="save2PDF('tabelPrint');" style="border-radius:100px;"><i style="padding:0; margin:0;" class="bx bxs-file-export"></i> PDF</button>
                                <button class="btn btn-sm btn-outline-success mt-2 me-2 px-4 mb-3" onclick="saveToExcel('tabelsiswa');" style="border-radius:100px;"><i style="padding:0; margin:0;" class="bx bxs-file-export"></i> Excel</button>
							</div>
						</div>


                        <div class="row g-3 mb-4">
                        <div class="row g-3">
								<div class="col-md-3">
									<label for="setTahunAkademik" style="display:block;" class="form-label">Tahun Akademik</label>
									<select class="form-control" style="font-size:11px; width:100%;" id="setTahunAkademik">
										<option value="">Pilih semua data</option>
									</select>
								</div>
								<!-- <div class="col-md-3">
									<label for="setSemester" style="display:block;" class="form-label">Kelas</label>
									<select class="form-control" style="font-size:11px; width:100%;" id="setSemester">
                                    <option value="">Pilih semua data</option>
									</select>
								</div> -->
								<div class="col-md-3">
									<label for="setSubKelas" style="display:block;" class="form-label">Pilih Kelas</label>
									<select class="form-control" style="font-size:11px; width:100%;" id="setSubKelas">
                                    <option value="">Pilih semua data</option>
									</select>
								</div>
								
                                <div class="col-md-3">
									<label for="setSiswa" style="display:block;" class="form-label">Cari Siswa</label>
									<select class="form-control" style="font-size:11px; width:100%;" id="setSiswa">
                                    <option value="">Pilih semua data</option>
									</select>
								</div>
								
							</div>
                            
                        </div>

                        
						<div class="table-responsive">
							<table class="table mb-0 tabelsiswa" id="tabelPrint">
								<thead class="table-light">
									<tr>
										<th></th>
										<th>Nama</th>
										<th>Tahun Akademik</th>
										<th>Semester</th>
										<th>Tingkat / Kelas</th>
										<th>Tanggal Data</th>
										<th class="text-end">Aksi</th>
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
				</div>


			</div>
		</div>


        <div class="modal fade" id="invoiceModal" tabindex="-1" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content" style="background:transparent;border:none;">
					<div class="modal-body">
					</div>
				</div>
			</div>
		</div>

		<script type="text/javascript">
			let idsett = '';
			let pinsett = '';
			let modescan = '';
            let secret_code= '';
            let namauser = '';
            let namainstansi = '';
			let endPointGetDataSiswa = '<?= api_url_core(); ?>api/master/siswa-kelas?status_id=1';
			let endPointGetDataSiswaSearch = '<?= api_url_tagihan(); ?>api/master/siswa-kelas?status_id=1';

            let balancepublic = '';
            let notelppublic = '';
            let tanggalLahirpublic = '';
            let accountnumberS = '';

            let struk_invoice = '';
            let struk_owner = '';
            let struk_balance = '';
            let struk_amount = '';
            let struk_card_id = '';
            let struk_created_at = '';
            let struk_keterangan = '';

			var typingTimer;
			

            let newpath = [];
			let newpath2 = [];
			let newpath3 = [];
			let newpath4 = [];
			let newpath5 = [];
			let newpath6 = [];
			let newpath7 = [];

            function updateEndpoint() {
                const tahunAkademik = document.getElementById('setTahunAkademik').value;
                // const semester = document.getElementById('setSemester').value;
                const subKelas = document.getElementById('setSubKelas').value;

                // Create a URL object to manage query parameters
                const url = new URL(endPointGetDataSiswa, window.location.origin);
                const params = new URLSearchParams(url.search);

                // Update or remove parameters based on selection
                if (tahunAkademik) {
                    params.set('tahun_akademik_id', tahunAkademik);
                } else {
                    params.delete('tahun_akademik_id');
                }

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
                        

            let newpathNotThisTA = [];
            function showTahunAkademik(){
				axios.get('<?= api_url_core(); ?>api/master/semester', {
					headers: {
						'Authorization': 'Bearer ' + localStorage.getItem('_private_token')
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
                        const option = new Option(mapping.tahun_akademik+" ("+mapping.kode_tahun_akademik_id+")", mapping.kode_tahun_akademik_id, false, false);
                        
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
                    if (selectedKodeTahunAkademik) {
                        $('#setTahunAkademik').val(selectedKodeTahunAkademik).trigger('change');
                    }

                    // Set Select2 value programmatically (if using Select2)
                    
                    // showSiswaAll();

                    showSubKelas();

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
                    const emptyOption = new Option('Pilih semua data', '', true, true);
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
                    // newpath2.forEach(mapping => {
                    //     const option = new Option(mapping.semester, mapping.kode_semester);
                    //     $('#setSemester').append(option);
                    // });

                    console.log(newpath2);
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                });
            }

			
            async function showSubKelas() {
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
                    const emptyOption = new Option('Pilih semua data', '', true, true);
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

                    // Get saved value from localStorage
                    const savedValue1 = localStorage.getItem('selectedTahunAkademik');
                    if (savedValue1 && $('#setTahunAkademik option[value="' + savedValue1 + '"]').length) {
                        $('#setTahunAkademik').val(savedValue1);
                        
                        // Add change handler (if not already added)
                        $('#setTahunAkademik').off('change', updateEndpoint).on('change', updateEndpoint);
                        
                        // Delay the change trigger
                        setTimeout(() => {
                            $('#setTahunAkademik').trigger('change');
                        }, 500);
                    }
                    
                    // Get saved value from localStorage
                    const savedValue = localStorage.getItem('selectedSubKelas');
                    if (savedValue && $('#setSubKelas option[value="' + savedValue + '"]').length) {
                        $('#setSubKelas').val(savedValue);
                        
                        // Add change handler (if not already added)
                        $('#setSubKelas').off('change', updateEndpoint).on('change', updateEndpoint);
                        
                        // Delay the change trigger
                        setTimeout(() => {
                            $('#setSubKelas').trigger('change');
                        }, 500);
                    }

                    console.log(newpath4);


                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                });
            }

            
            
            function showSiswa() {
                axios.get('<?= api_url_core(); ?>api/master/siswa', {
                    headers: {
                        'Authorization': 'Bearer ' + localStorage.getItem('_private_token'),
                        'nopaging':true
                    }
                })
                .then(response => {
                    console.log(response.data);

                    // Clear the dropdown before appending options
                    $('#setSiswa').empty();

                    // Add a placeholder option
                    const emptyOption = new Option('Pilih salah satu dibawah ini', '', true, true);
                    $('#setSiswa').append(emptyOption).trigger('change'); // Ensure it’s visible on select2

                    const newpath4 = response.data
                    .filter(mapping => mapping.detail.deleted_at === '' || mapping.detail.deleted_at === null)
                    .map(mapping => ({
                        'nis': mapping.network_identity,
                        'name': mapping.name,
                    }));


                    console.log("okee",newpath4);

                    newpath4.sort((a, b) => a.name.localeCompare(b.name));

                    // Append options
                    newpath4.forEach(mapping => {
                        const option = new Option(mapping.name, mapping.nis);
                        $('#setSiswa').append(option);
                    });

                    // Initialize or refresh Select2
                    $('#setSiswa').select2({
                        placeholder: 'Pilih salah satu dibawah ini',
                        allowClear: true,
                        width: '100%'
                    });

                    console.log(newpath4);
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                });
            }

            // Trigger navigation on change
            $('#setSiswa').on('change', function () {
                const selectedNIS = $(this).val();
                if (selectedNIS) {
                    window.location.href = '<?= base_url(); ?>CPanel_Tagihan/TagihanSiswaByNIS/' + selectedNIS;
                }
            });



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


                showSiswa();
                showSemester();
				

                document.getElementById('setTahunAkademik').addEventListener('change', updateEndpoint);
                // document.getElementById('setSemester').addEventListener('change', updateEndpoint);
                document.getElementById('setSubKelas').addEventListener('change', updateEndpoint);
                
                
            });

            // Initialize when page loads
            $(document).ready(async function() {
                // Set up change handler first
                $('#setSubKelas').on('change', function() {
                    const selectedValue = $(this).val();
                    localStorage.setItem('selectedSubKelas', selectedValue);
                    // Only make API call if a specific kelas is selected (not the empty option)
                    
                });
                
                $('#setTahunAkademik').on('change', function() {
                    const selectedValue = $(this).val();
                    localStorage.setItem('selectedTahunAkademik', selectedValue);
                    // Only make API call if a specific kelas is selected (not the empty option)
                    
                });

                // Then load the data
                await showTahunAkademik();
                


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

                                let textTingkat = '';
								let textNamaA = mapping.siswa.name;
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
                                            <input type="checkbox" class="select-id" data-id="${mapping.id}" />
                                        </td>
                                        <td><b>${textNama[0]}</b><br/>
                                            <small class="text-muted">${textTingkat}</small> 
                                        </td>
                                        <td>${mapping.tahun_akademik.tahun_akademik}</td>
                                        <td>${mapping.semester.semester}</td>
                                        <td>${mapping.sub_kelas.name}</td>
                                        <td>${moment(mapping.created_at).format('YYYY-MM-DD, HH:mm:ss')} WIB</td>
                                        <td class="text-end">
                                            <button type="button" class="btn btn-sm btn-primary" 
                                                onclick="window.location.href='<?=base_url();?>CPanel_Tagihan/TagihanSiswaByNIS/${mapping.siswa.network_identity}'" 
                                                id="seeDetails">
                                                <i class="bx bx-show-alt"></i> Lihat Biaya
                                            </button>
                                        </td>
                                    </tr>
                                `;
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
            });

            $(document).on('click', '#toggleAllCheckboxes', function () {
                const isCheckAll = $(this).text() === 'Pilih Semua';
                $('.select-id').prop('checked', isCheckAll); // Set all checkboxes to checked/unchecked
                if (isCheckAll) {
                    // Add all IDs to the array
                    selectedIds = $('.select-id').map(function () {
                        return $(this).data('id');
                    }).get();
                    $(this).text('Hapus Semua Pilihan'); // Change button text
                } else {
                    // Clear the array
                    selectedIds = [];
                    $(this).text('Pilih Semua'); // Change button text
                }
                console.log('Selected IDs:', selectedIds); // Log the updated array
            });

            function formatRupiahNew(amount) {
                return new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                    minimumFractionDigits: 0
                }).format(amount);
            }

			
		</script>