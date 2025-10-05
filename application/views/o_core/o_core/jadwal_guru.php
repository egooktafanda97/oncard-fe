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
                   <div class="card">
                    <div class="card-body">
                       <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                            <div class="" style="font-size:20px; font-weight:800;">Tabulasi Jadwal Pelajaran</div></div>
                            							
							<div class="ms-auto">
                                <button class="btn btn-sm btn-outline-primary me-2 mb-3" id="btnSave2PDF" onclick="save2PDF('bxmxmx');" style="border-radius:100px;"><i class="bx bxs-file-pdf mx-1" style="margin:0px;"></i></button>
                                <button class="btn btn-sm btn-outline-success me-2 mb-3" onclick="saveToExcel('tabelsiswaxxx');" style="border-radius:100px;"><i class="bx bxs-file mx-1" style="margin:0px;"></i></button>
                                
								<a href="#/" onclick="modalAddModify('add');" class="btn btn-success radius-30" style="margin-top:-20px;"><i class="bx bxs-plus-square"></i> Tambah Data</a>
							</div>

                            <div class="row">
                                <div class="col-12" style="display:flex;gap:25px;">
                                    <div>
                                        <label for="" style="display:block;" class="form-label">Tahun Akademik</label>
                                        <select id="filter-tahun-akademik-xxx" class="form-control" style="width:150px; border-radius:50px">
                                            <option value="">All Tahun Akademik</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="" style="display:block;" class="form-label">Semester</label>
                                        <select id="filter-semester-xxx" class="form-control" style="width:150px; border-radius:50px;">
                                            <option value="">All Semester</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="" style="display:block;" class="form-label">Kelas</label>
                                        <select id="filter-kelas-xxx" class="form-control" style="width:150px; border-radius:50px">
                                            <option value="">All Kelas</option>
                                        </select>
                                    </div>
                                    <div>
                                    <label for="" style="display:block;" class="form-label">&nbsp;</label>
                                        <button type="button" class="btn btn-sm btn-rounded btn-success p-2 px-4" id="tampilkan-data-btn" style="border-radius:100px;">Tampilkan Data</button>
                                    </div>
                                </div>

                                <div class="col-12 put-ok-here"></div>

                                
                            </div>
                    </div>
                   </div>
					 <div class="card radius-1" style="display:none;">
						<div class="card-body">
							<div class="d-lg-flex align-items-center mb-4 gap-3">
							<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
								<div class="text-lg" style="font-size:20px;">Raw Data <?=$pageTitle;?></div>
								
							</div>

						</div>
						<div class="table-responsive" style="margin-top:-15px;">
						<div class="filter-container" style="display:flex; gap:10px; margin-bottom:15px;">
                            <div>
                                <label for="" style="display:block;" class="form-label">Tahun Akademik</label>
                                <select id="filter-tahun-akademik" class="form-control" style="width:150px;">
                                    <option value="">All Tahun Akademik</option>
                                </select>
                            </div>
                            <div>
                                <label for="" style="display:block;" class="form-label">Semester</label>
                                <select id="filter-semester" class="form-control" style="width:150px;">
                                    <option value="">All Semester</option>
                                </select>
                            </div>
                            <div>
                                <label for="" style="display:block;" class="form-label">Tingkat</label>
                                <select id="filter-kelas" class="form-control" style="width:150px;">
                                    <option value="">All Kelas</option>
                                </select>
                            </div>
                            <div>
                                <label for="" style="display:block;" class="form-label">Reset</label>
                                <button id="reset-filters" class="btn btn-secondary">Reset Filters</button>
                            </div>

                        </div>
							<table id="example" class="tabelsiswa table table-hover tabelproduk" style="width:100%;font-size:12px!important;">
								<thead class="table-light">
									<tr>
										<th>No.</th>
										<th>Kode Tahun Akademik</th>
										<th>Kode Semester</th>
										<th>Semester</th>
										<th>Tanggal Mulai</th>
										<th>Tanggal Mulai</th>
										<th>Tanggal Mulai</th>
										<th>Tanggal Mulai</th>
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
				<div class="modal-dialog modal-dialog-centered">
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
									<label for="setSemester" style="display:block;" class="form-label">Semester</label>
									<select class="form-control" style="font-size:11px; width:100%;" id="setSemester">
										<option value="">Cari tahun semester</option>
									</select>
								</div>
								<div class="col-md-12">
									<label for="setKelas" style="display:block;" class="form-label">Kelas</label>
									<select class="form-control" style="font-size:11px; width:100%;" id="setKelas">
										<option value="">Cari kelas</option>
									</select>
								</div>
								<div class="col-md-12">
									<label for="setSubKelas" style="display:block;" class="form-label">Sub-Kelas</label>
									<select class="form-control" style="font-size:11px; width:100%;" id="setSubKelas">
										<option value="">Cari sub-kelas</option>
									</select>
								</div>
								<div class="col-md-12">
									<label for="setMapel" style="display:block;" class="form-label">Mata Pelajaran</label>
									<select class="form-control" style="font-size:11px; width:100%;" id="setMapel">
										<option value="">Cari mapel</option>
									</select>
								</div>
								<div class="col-12 pt-3 text-center">
									<h5>Info Penjadwalan</h5>
								</div>
								<div class="col-md-12">
									<label for="setHari" class="form-label">Hari</label>
									<select class="form-control" style="font-size:11px; width:100%;" id="setHari">
										<option value="1">Senin</option>
										<option value="2">Selasa</option>
										<option value="3">Rabu</option>
										<option value="4">Kamis</option>
										<option value="5">Jum'at</option>
										<option value="6">Sabtu</option>
										<option value="7">Minggu</option>
									</select>
								</div>
								<div class="col-md-6">
									<label for="tanggal_mulai" class="form-label">Jam Mulai</label>
									<input type="time" class="form-control" id="tanggal_mulai" value="07:00">
								</div>
								<div class="col-md-6">
									<label for="tanggal_selesai" class="form-label">Jam Selesai</label>
									<input type="time" class="form-control" id="tanggal_selesai">
								</div>
								<div class="col-md-12">
									<label for="setGuru" style="display:block;" class="form-label">Pilih Guru</label>
									<select class="form-control" style="font-size:11px; width:100%;" id="setGuru">
										<option value="">Cari kelas</option>
									</select>
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

            let guru_list = [];

			let table;

            let datagot = [];

            document.getElementById('tampilkan-data-btn').addEventListener('click', function () {
                const tahunAkademik = document.getElementById('filter-tahun-akademik-xxx').value;
                const semester = document.getElementById('filter-semester-xxx').value;
                const kelas = document.getElementById('filter-kelas-xxx').value;

                // Check if all fields are selected
                if (!tahunAkademik || !semester || !kelas) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Semua filter harus dipilih!',
                    });
                } else {


                    localStorage.setItem('filter_tahun_akademik', tahunAkademik);
                    localStorage.setItem('filter_semester', semester);
                    localStorage.setItem('filter_kelas', kelas);

                    console.log(tahunAkademik, semester,kelas);
                    // If all fields are selected, run showdata()
                    // showdata(tahunAkademik, semester, kelas);
                    const filteredData = datagot
                    .filter(item =>
                        item.tahun_akademik?.tahun_akademik === tahunAkademik &&
                        item.semester?.semester === semester &&
                        item.sub_kelas?.name === kelas
                    )
                    .sort((a, b) => a.jam_mulai.localeCompare(b.jam_mulai));


                    // Check if there is any data after filtering
                    if (filteredData.length === 0) {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Tidak ada data',
                            text: 'Data tidak ditemukan untuk filter yang dipilih.',
                        });
                    } else {
                        console.log("Filtered Data:", filteredData);
                        renderTable(filteredData); // Pass the filtered data to render the table
                    }
                }
            });

            function triggetitback(){
                const tahunAkademik = localStorage.getItem('filter_tahun_akademik');
                const semester = localStorage.getItem('filter_semester');
                const kelas = localStorage.getItem('filter_kelas');

                if (tahunAkademik && semester && kelas) {
                    // Set the saved values back to the inputs
                    document.getElementById('filter-tahun-akademik-xxx').value = tahunAkademik;
                    document.getElementById('filter-semester-xxx').value = semester;
                    document.getElementById('filter-kelas-xxx').value = kelas;


                    console.log(tahunAkademik,semester,kelas);
                    // Optionally trigger the filter button
                    document.getElementById('tampilkan-data-btn').click();
                }
            }


            function renderTable(data) {
    let a = $('#filter-tahun-akademik-xxx').val();
    let b = $('#filter-semester-xxx').val();
    let c = $('#filter-kelas-xxx').val();

    const days = ["Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu", "Minggu"];

    let tableHtml = `
        <table class="table table-bordered my-3 tabelsiswaxxx" id="bxmxmx" border="1" style="width: 100%; border-collapse: collapse; text-align: center;">
            <thead>
                <tr>
                <td colspan="8">
                <div class="col-12 py-4 text-center" style="font-size:23px;">
                    <b>Jadwal Pelajaran Kelas ${c}<br/>
                    Semester ${b}, T.A ${a}
                    </b>
                </div>
                </td>
                </tr>
                <tr>
                    <th>Jam</th>
                    ${days.map(day => `<th>${day}</th>`).join("")}
                </tr>
            </thead>
            <tbody>
    `;

    // Group data by `jam_mulai` and `jam_selesai`
    const timeSlots = {};
    data.forEach(item => {
        const timeKey = `${item.jam_mulai} - ${item.jam_selesai}`;
        if (!timeSlots[timeKey]) {
            timeSlots[timeKey] = {};
        }
        
        const dayIndex = parseInt(item.hari, 10) - 1;
        if (!timeSlots[timeKey][dayIndex]) {
            timeSlots[timeKey][dayIndex] = [];
        }
        timeSlots[timeKey][dayIndex].push(item);
    });

    // Render rows based on grouped time slots
    for (const timeSlot in timeSlots) {
        const timeSlotData = timeSlots[timeSlot];
        const rowData = Array(7).fill(""); // 7 days (Mon-Sun)

        for (let dayIndex = 0; dayIndex < 7; dayIndex++) {
            if (timeSlotData[dayIndex] && timeSlotData[dayIndex].length > 0) {
                const items = timeSlotData[dayIndex];
                
                // Highlight cell if there are multiple entries
                const highlightStyle = items.length > 1 ? 'background-color: #fff3cd; border: 2px solid #ffc107;' : '';
                
                rowData[dayIndex] = `
                    <div style="${highlightStyle} padding: 5px; border-radius: 4px;">
                        ${items.map(item => `
                            <div style="margin-bottom: 8px;">
                                <div>${item.matapelajaran.name}</div>
                                <div style="font-size:11px; font-weight:800;">${item?.guru?.name??'-'}</div>
                                <div>
                                    <button type="button" onclick="updateGuruByIDJadwal('${item.m_tahun_akademik_id}','${item.semester_id}','${item.kelas_id}','${item.sub_kelas_id}','${item.matapelajaran_id}','${item.jam_mulai}','${item.jam_selesai}','${item.hari}','${item.id}','${item.guru_id}');" class="btn btn-sm btn-success" style="font-size:10px; padding:3px; margin:2px; border-radius:2px;">
                                        <i class="bx bx-refresh"></i> Ganti Jadwal
                                    </button>
                                    <button type="button" onclick="updateGuruByIDRoster('${item.m_tahun_akademik_id}','${item.semester_id}','${item.kelas_id}','${item.sub_kelas_id}','${item.matapelajaran_id}','${item.jam_mulai}','${item.jam_selesai}','${item.hari}','${item.id}');" class="btn btn-sm btn-primary" style="font-size:10px; padding:3px; margin:2px; border-radius:2px;">
                                        <i class="bx bx-user"></i> Ganti Guru
                                    </button>
                                    <button type="button" onclick="deleteRosterByID('${item.id}');" class="btn btn-sm btn-danger" style="font-size:10px; padding:3px; margin:2px; border-radius:2px;">
                                        <i class="bx bx-trash"></i>
                                    </button>
                                </div>
                            </div>
                        `).join('<hr style="margin: 5px 0; border-color: #eee;">')}
                    </div>
                `;
            }
        }

        tableHtml += `
            <tr>
                <td>${timeSlot}</td>
                ${rowData.map((data, dayIndex) => `
                    <td>
                        ${data || `
                            <button class="btn btn-sm" style="background:#f2f2f2;border-radius:100px;" onclick="openDialog('${timeSlot}', ${dayIndex + 1}, null, '${a}', '${b}', '${c}')">
                                <i class="bx bx-plus-circle" style="color: #d2d2d2;"></i>
                            </button>
                        `}
                    </td>
                `).join("")}
            </tr>
        `;
    }

    // Add the "add new" row at the bottom
    tableHtml += `
            <tr>
                <td></td>
                ${Array(7).fill("").map((_, dayIndex) => `
                    <td>
                        <button class="btn btn-sm" style="background:#f2f2f2;border-radius:100px;" onclick="openDialog('00:00:00 - 00:00:00', ${dayIndex + 1}, null, '${a}', '${b}', '${c}')">
                            <i class="bx bxs-plus-circle" style="color: #d2d2d2;"></i>
                        </button>
                    </td>
                `).join("")}
            </tr>
        </tbody>
    </table>
    `;

    $('.put-ok-here').html(tableHtml);
}

            function openDialog(timeSlot, dayIndex, cellData, tahunAkademik, semester, kelas) {
                console.log('Time Slot:', timeSlot);
                console.log('Day Index:', dayIndex); // 0 = Monday, 6 = Sunday
                console.log('Data:', cellData); 
                console.log('Tahun Akademik:', tahunAkademik);
                console.log('Semester:', semester);
                console.log('Kelas:', kelas);

                // Open the modal
                const modal = new bootstrap.Modal(document.getElementById('modalSetTagihan'));
                modal.show();

                modesett='add';

                // Set the time slot
                $('#tanggal_mulai').val(timeSlot.split(' - ')[0].slice(0, 5) || "07:00"); // Default start time (HH:mm)
                $('#tanggal_selesai').val(timeSlot.split(' - ')[1].slice(0, 5) || "");    // Default end time (HH:mm)


                // Populate the form with the selected data
                $('#setHari').val(dayIndex).trigger('change'); // Set day (1-7) and trigger Select2 update

                // Populate additional fields based on selected filters
                setSelect2ByText('#setTahunAkademik', tahunAkademik);
                setSelect2ByText('#setSemester', semester);
                setSelect2ByText('#setKelas', kelas);
                setSelect2ByText('#setSubKelas', kelas);
                

                // Handle pre-existing data (if any) in the cell
                if (cellData) {
                    // Assuming cellData includes `matapelajaran` and `guru` objects
                    const mapelSelect = $('#setMapel');
                    const guruSelect = $('#setGuru');

                    mapelSelect.html(`<option value="${cellData.matapelajaran.id}" selected>${cellData.matapelajaran.name}</option>`);
                    guruSelect.html(`<option value="${cellData.guru.id}" selected>${cellData.guru.name}</option>`);

                    // Reinitialize Select2 for mata pelajaran and guru
                    mapelSelect.trigger('change');
                    guruSelect.trigger('change');
                } else {
                    // Clear dropdowns for mata pelajaran and guru if no data
                    $('#setMapel').html(`<option value="">Cari mapel</option>`).trigger('change');
                    $('#setGuru').html(`<option value="">Cari guru</option>`).trigger('change');
                }
            }

            function setSelect2ByText(selectId, textValue) {
                const option = $(`${selectId} option`).filter(function() {
                    return $(this).text() === textValue;
                });

                // If the option exists, set its value and trigger the change event
                if (option.length) {
                    $(selectId).val(option.val()).trigger('change');
                } else {
                    $(selectId).val("").trigger('change'); // Option not found, clear the selection
                }
            }

            function updateGuruByIDRoster(p1, p2, p3, p4, p5, p6, p7,p8, strKita) {
                let selectHTML = `<select id="guru-select" class="swal2-select" style="width:100%"><option></option>`;
                guru_list.forEach(guru => {
                    selectHTML += `<option value="${guru.kode_guru}">${guru.nama_guru} - ${guru.mata_pelajaran}</option>`;
                });
                selectHTML += `</select>`;

                Swal.fire({
                    title: 'Ganti Guru?',
                    html: `
                        <p style="color:white;">Pilih guru pengganti untuk jadwal ini:</p>
                        ${selectHTML}
                    `,
                    showCancelButton: true,
                    confirmButtonText: 'Ya, ganti sekarang!',
                    cancelButtonText: 'Batal',
                    preConfirm: () => {
                        const selected = document.getElementById('guru-select').value;
                        if (!selected) {
                            Swal.showValidationMessage('Anda harus memilih seorang guru!');
                        }
                        return selected;
                    },
                    didOpen: () => {
                        // Activate Select2 after SweetAlert has rendered
                        $('#guru-select').select2({
                            placeholder: 'Cari guru...',
                            dropdownParent: $('.swal2-popup') // Ensures the dropdown is inside the modal
                        });
                    }
                }).then(result => {
                    if (result.isConfirmed) {
                        const selectedGuruId = result.value;
                        console.log('Guru selected:', selectedGuruId);
                        
                        let jam_mulai = p6.split(":");
                        let jam_selesai = p7.split(":");
                        
                        var form_data = new FormData();

                        form_data.append('jam_mulai', jam_mulai[0]+':'+jam_mulai[1]);
                        form_data.append('jam_selesai', jam_selesai[0]+':'+jam_selesai[1]);
                        form_data.append('m_tahun_akademik_id', p1);
                        form_data.append('semester_id', p2);
                        form_data.append('kelas_id', p3);
                        form_data.append('sub_kelas_id', p4);
                        form_data.append('matapelajaran_id', p5);
                        form_data.append('hari', p8);
                        form_data.append('guru_id', selectedGuruId);
                        
                        const save = async (str) => {
                            const posts = await axios.post('<?= api_url_core(); ?>api/master/jadwal-pelajaran/'+strKita,form_data, {
                                headers: {
                                    'Authorization': 'Bearer ' + localStorage.getItem('_token')
                                }
                            }).catch((err) => {
                                    Toastify({
                                        text: 'Error System',
                                        duration: 3000,
                                        close: true,
                                        gravity: "top",
                                        position: "right",
                                        className: "errorMessage",

                                    }).showToast();
                                    return false;
                            });

                            if (posts.status == 200||posts.status == 201) {
                                location.reload();

                            } else {

                            }
                        }
                        save(form_data);
                    }
                });
            }

            function updateGuruByIDJadwal(p1, p2, p3, p4, p5, p6, p7, p8, strKita,guruID) {
                let selectHTML = `<select id="guru-select" class="swal2-select" style="width:100%"><option></option>`;
                guru_list.forEach(guru => {
                    selectHTML += `<option value="${guru.kode_guru}">${guru.nama_guru} - ${guru.mata_pelajaran}</option>`;
                });
                selectHTML += `</select>`;

                Swal.fire({
                    title: 'Ganti Guru & Waktu Ajar?',
                    html: `
                        <p style="color:white;">Pilih guru pengganti untuk jadwal ini:</p>
                        <label for="jam-mulai" style="color:white;">Jam Mulai:</label>
                        <input type="time" id="jam-mulai" class="swal2-input" value="${p6}">
                        <label for="jam-selesai" style="color:white;">Jam Selesai:</label>
                        <input type="time" id="jam-selesai" class="swal2-input" value="${p7}">
                    `,
                    showCancelButton: true,
                    confirmButtonText: 'Ya, simpan!',
                    cancelButtonText: 'Batal',
                    preConfirm: () => {
                        const jamMulai = document.getElementById('jam-mulai').value;
                        const jamSelesai = document.getElementById('jam-selesai').value;

                        if (!jamMulai || !jamSelesai) {
                            Swal.showValidationMessage('Jam mulai dan selesai harus diisi!');
                        }

                        return { jamMulai, jamSelesai };
                    },
                    didOpen: () => {
                        $('#guru-select').select2({
                            placeholder: 'Cari guru...',
                            dropdownParent: $('.swal2-popup')
                        });
                    }
                }).then(result => {
                    if (result.isConfirmed) {
                        const { selectedGuru, jamMulai, jamSelesai } = result.value;

                        let jam_mulai = jamMulai.split(":");
                        let jam_selesai = jamSelesai.split(":");

                        const form_data = new FormData();
                        form_data.append('jam_mulai', jam_mulai[0]+':'+jam_mulai[1]);
                        form_data.append('jam_selesai', jam_selesai[0]+':'+jam_selesai[1]);
                        form_data.append('m_tahun_akademik_id', p1);
                        form_data.append('semester_id', p2);
                        form_data.append('kelas_id', p3);
                        form_data.append('sub_kelas_id', p4);
                        form_data.append('matapelajaran_id', p5);
                        form_data.append('hari', p8);
                        form_data.append('guru_id', guruID);

                        const save = async (str) => {
                            const posts = await axios.post('<?= api_url_core(); ?>api/master/jadwal-pelajaran/' + strKita, form_data, {
                                headers: {
                                    'Authorization': 'Bearer ' + localStorage.getItem('_token')
                                }
                            }).catch((err) => {
                                Toastify({
                                    text: 'Error System',
                                    duration: 3000,
                                    close: true,
                                    gravity: "top",
                                    position: "right",
                                    className: "errorMessage",
                                }).showToast();
                                return false;
                            });

                            if (posts.status == 200 || posts.status == 201) {
                                location.reload();
                            }
                        };
                        save(form_data);
                    }
                });
            }



            function deleteRosterByID(str){
                Swal.fire({
                    icon: 'warning',
                    title: 'Hapus?',
                    text: 'Anda yakin menghapus jadwal ini dari roster? (ID ' + str+')',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        deleteDataRoster(str); // call your delete function here
                    }
                });

            }

            function deleteDataRoster(str){
                axios.delete('<?= api_url_core(); ?>api/master/jadwal-pelajaran/'+str, {
                    headers: {
                        'Authorization': 'Bearer ' + localStorage.getItem('_token')
                    }
                }).then(response => {
                    location.reload();
                    })
                    .catch(error => {
                        console.error('Error fetching data:', error);
                    });
            }

			$(document).ready(function () {
				// getTahunAkademik();

                showGuru();

				table = $('#example').DataTable( {
					fixedHeader: true,
					"processing": true,
					//"serverSide": true,
					"searching": true,
					order: [[4, 'asc']], // Order by "created_at" column in descending order (most recent first)
					ajax: function (data, callback) {
                        
						axios.get('<?= api_url_core(); ?>api/master/jadwal-pelajaran', {
							headers: {
								'Authorization': 'Bearer ' + localStorage.getItem('_token')
							}
						}).then(response => {
                            console.log("sss", response.data);
                            populateFilterOptions(response.data);
                            datagot.push(...response.data);
                            callback({ data: response.data });
							})
							.catch(error => {
								console.error('Error fetching data:', error);
							});
					},
					columns: [
                        { 
							data: 'tahunAkademik', 
							title: 'Tahun Akademik', 
							render: function (data, type, row) {
								
								return `<span class="kode-kunjungan text-dark" style="font-weight: bold; ">
											${row.tahun_akademik?.kode_tahun_akademik??'-'}
										</span>`;
							} 
						},
						{ 
							data: 'semester.semester', 
							title: 'Semester', 
							render: function (data, type, row) {
								
								return `<span class="kode-kunjungan text-dark" style="font-weight: bold; ">
											${row.semester.semester}
										</span>`;
							} 
						},
                        { 
							data: 'kelas.tingkat', 
							title: 'Tingkat', 
							render: function (data, type, row) {
								
								return `<span class="kode-semester text-primary" style="font-weight: bold; ">
											${row.kelas.tingkat}
										</span>`;
							} 
						},
						{ 
							data: 'sub_kelas.name', 
							title: 'Kelas', 
							render: function (data, type, row) {
								
								return `<span class="kode-kunjungan text-dark" style="font-weight: bold; ">
											${row.sub_kelas.name}
										</span>`;
							} 
						},
						{ 
							data: 'hari', 
							title: 'Hari', 
							render: function (data, type, row) {
								
								return `<span class="kode-kunjungan text-dark" style="font-weight: bold; ">
											${moment().day(row.hari).format('dddd')}
										</span>`;
							} 
						},
						{ 
							data: 'jam_mulai', 
							title: 'Mulai', 
							render: function (data, type, row) {
								
								return `${row.jam_mulai}`;
							} 
						},
						{ 
							data: 'jam_selesai', 
							title: 'Berakhir', 
							render: function (data, type, row) {
								
								return `${row.jam_selesai}`;
							} 
						},
						{ 
							data: 'matapelajaran.name', 
							title: 'Mata Pelajaran', 
							render: function (data, type, row) {
								
								return `<span class="kode-kunjungan text-dark" style="font-weight: bold; ">
											${row.matapelajaran.name}
										</span>`;
							} 
						},
						{ 
							data: 'guru.name', 
							title: 'Pengampu', 
							render: function (data, type, row) {
								
								return `<span class="kode-kunjungan text-dark" style="font-weight: bold; ">
											${row.guru.name}
										</span>`;
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
  
                // Function to populate filter dropdowns
                function populateFilterOptions(data) {
                    var tahunAkademikSet = new Set(
                        data.map(item => item.tahun_akademik?.kode_tahun_akademik ? String(item.tahun_akademik.kode_tahun_akademik).trim() : '')
                    );
                    var tahunAkademikSetXXX = new Set(
                        data.map(item => item.tahun_akademik?.tahun_akademik ? String(item.tahun_akademik.tahun_akademik).trim() : '')
                    );

                    var semesterSet = new Set(
                        data.map(item => item.semester?.semester ? String(item.semester.semester).trim() : '')
                    );

                    var kelasSet = new Set(
                        data.map(item => item.kelas?.tingkat ? String(item.kelas.tingkat).trim() : '')
                    );
                    var subkelasSet = new Set(
                        data.map(item => item.sub_kelas?.name ? String(item.sub_kelas.name).trim() : '')
                    );


                    populateDropdown('#filter-tahun-akademik', tahunAkademikSet);
                    populateDropdown('#filter-semester', semesterSet);
                    populateDropdown('#filter-kelas', kelasSet);
                    

                    console.log(tahunAkademikSetXXX,"asdaasd");
                    populateDropdown('#filter-tahun-akademik-xxx', tahunAkademikSetXXX);
                    populateDropdown('#filter-semester-xxx', semesterSet);

                    const sortedSet = new Set([...subkelasSet].sort((a, b) => parseFloat(a) - parseFloat(b)));
                    populateDropdown('#filter-kelas-xxx', sortedSet);
                }

                // Helper function to populate a dropdown
                function populateDropdown(selector, values) {
                    var dropdown = $(selector);
                    dropdown.empty();
                    dropdown.append('<option value="">Semua Data</option>');
                    values.forEach(value => {
                        dropdown.append(`<option value="${value}">${value}</option>`);
                    });
                }

                // Event listeners for filtering
                $('#filter-tahun-akademik, #filter-semester, #filter-kelas').on('change', function () {
                    applyFilters();
                });

                // Function to apply filters
                function applyFilters() {
                    var tahunAkademik = $('#filter-tahun-akademik').val()?.trim() || '';
                    var semester = $('#filter-semester').val()?.trim() || '';
                    var kelas = $('#filter-kelas').val()?.trim() || '';

                    // Apply filters to specific columns
                    table.column(0).search(tahunAkademik, true, false); // Column index 0: Tahun Akademik
                    table.column(1).search(semester, true, false);      // Column index 1: Semester
                    table.column(2).search(kelas, true, false);         // Column index 2: Kelas

                    // Redraw the table with the applied filters
                    table.draw();
                }

                function resetFilters() {
                    // Clear dropdowns
                    $('#filter-tahun-akademik').val('');
                    $('#filter-semester').val('');
                    $('#filter-kelas').val('');

                    // Clear DataTable filters
                    table.columns().search('');

                    // Redraw the table
                    table.draw();
                }

                // Attach Reset Button Event Listener
                $('#reset-filters').on('click', resetFilters);


				showTahunAkademik();
				
				$('#setHari').select2({
					placeholder: 'Search options...',
					dropdownParent: $('#modalSetTagihan'), // Replace #myModal with the actual modal ID
					minimumInputLength: 0
				});

				$('#setTahunAkademik').select2({
					placeholder: 'Search options...',
					dropdownParent: $('#modalSetTagihan'), // Replace #myModal with the actual modal ID
					minimumInputLength: 0
				}).on('change', function (e) {
					// Your code here
					const selectedValue = $(this).val(); // Get the selected value
					idsettTahunAkademik = selectedValue; //set id tahun akademik
				});
				
				$('#setGuru').select2({
					placeholder: 'Search options...',
					dropdownParent: $('#modalSetTagihan'), // Replace #myModal with the actual modal ID
					minimumInputLength: 0,
					templateResult: function(data) {
						if (!data.id) {
							return data.text; // Handle the placeholder
						}
						
						// Access subtitle from data attribute
						const subtitle = $(data.element).data('subtitle');

						// Create a formatted option with title and subtitle
						const $result = $(
							`<div>
								<div><strong>${data.text}</strong></div>
								<div style="font-size: 0.85em; color: #666;">${subtitle}</div>
							</div>`
						);

						return $result;
					},
					templateSelection: function (data) {
						return data.text || data.id;
					}
				}).on('change', function (e) {
					// Your code here
					const selectedValue = $(this).val(); // Get the selected value
					idsettGuru = selectedValue; //set id tahun akademik
				});
				
				
				$('#setSemester').select2({
					placeholder: 'Menunggu tahun akademik dipilih...',
					dropdownParent: $('#modalSetTagihan'), // Replace #myModal with the actual modal ID
					minimumInputLength: 0
				}).on('change', function (e) {
					// Your code here
					const selectedValue = $(this).val(); // Get the selected value
					idsettSemester = selectedValue; //set id tahun akademik
				});
				
				$('#setKelas').select2({
					placeholder: 'Menunggu semester dipilih...',
					dropdownParent: $('#modalSetTagihan'), // Replace #myModal with the actual modal ID
					minimumInputLength: 0
				}).on('change', function (e) {
					// Your code here
					const selectedValue = $(this).val(); // Get the selected value
					idsettKelas = selectedValue; //set id tahun akademik
					findMapel(selectedValue);
					$('#setMapel').empty();
					$('#setGuru').empty();

					showGuru();
					
				});
				$('#setSubKelas').select2({
					placeholder: 'Menunggu kelas dipilih...',
					dropdownParent: $('#modalSetTagihan'), // Replace #myModal with the actual modal ID
					minimumInputLength: 0
				}).on('change', function (e) {
					// Your code here
					const selectedValue = $(this).val(); // Get the selected value
					idsettSubKelas = selectedValue; //set id tahun akademik
				});
				$('#setMapel').select2({
					placeholder: 'Menunggu kelas dipilih...',
					dropdownParent: $('#modalSetTagihan'), // Replace #myModal with the actual modal ID
					minimumInputLength: 0
				}).on('change', function (e) {
					// Your code here
					const selectedValue = $(this).val(); // Get the selected value
					idsettMapel = selectedValue; //set id tahun akademik
				});


            });

            

			let newpath = [];
			let newpath2 = [];
			let newpath3 = [];
			let newpath4 = [];
			let newpath5 = [];
			let newpath6 = [];
			let newpath7 = [];
			let newpath8 = [];
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

                    showSemester();
				

					console.log(newpath);
				})
				.catch(error => {
					console.error('Error fetching data:', error);
				});
			}
			
			
			function showGuru(){
				newpath7 = [];
				axios.get('<?= api_url_core(); ?>api/general', {
					headers: {
						'Authorization': 'Bearer ' + localStorage.getItem('_token'),
                        'nopaging' : false
					}
				}).then(response => {
					response.data.map((mapping,i)=>{
						newpath7.push({
							'nama_guru' : mapping.name,
							'kode_guru' : mapping.id,
							'mata_pelajaran' : mapping.detail.mata_pelajaran,
						})
					});
					newpath7.sort((a, b) => {
						const nameA = a.nama_guru.toLowerCase(); // Convert to lowercase for case-insensitive sorting
						const nameB = b.nama_guru.toLowerCase();
						return nameA.localeCompare(nameB); // Sorts alphabetically
					});

					newpath7.map((mapping) => {
						// Create an option with subtitle as a custom data attribute
						const option = new Option(mapping.nama_guru, mapping.kode_guru, true, true);
						option.dataset.subtitle = mapping.mata_pelajaran; // Set subtitle as a data attribute

						// Append option to Select2
						$('#setGuru').append(option).trigger('change');

                        
					});
                    
                    guru_list  = newpath7;


					console.log(newpath);
				})
				.catch(error => {
					console.error('Error fetching data:', error);
				});
			}
			
			
			function showSemester(){
				axios.get('<?= api_url_core(); ?>api/master/semester', {
					headers: {
						'Authorization': 'Bearer ' + localStorage.getItem('_token')
					}
				}).then(response => {
					console.log(response.data);
					response.data.map((mapping,i)=>{
						newpath2.push({
							'tahun_mulai' : mapping.tanggal_mulai,
							'tahun_selesai' : mapping.tanggal_selesai,
							'semester' : mapping.semester,
							'kode_semester' : mapping.id,
						})
					});

					// Convert tahun_mulai to date objects for comparison
					newpath2.sort((a, b) => {
						const dateA = new Date(a.tahun_mulai);
						const dateB = new Date(b.tahun_mulai);
						return dateA - dateB;
					});

					newpath2.map((mapping,i)=>{
						const option = new Option(mapping.semester, mapping.kode_semester, true, true);
						
						// Append it to the select2 dropdown
						$('#setSemester').append(option);
					});

                    showKelas();
				

					console.log(newpath2);
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
					let uniqueNames = new Set(); // Track unique names

                    response.data.map((mapping, i) => {
                        newpath3.push({
                            'tingkat': mapping.tingkat,
                            'kode_kelas': mapping.id,
                            'name': mapping.name,
                        });
                    });

                    // Sort by 'tingkat'
                    newpath3.sort((a, b) => a.tingkat - b.tingkat);

                    // Append only unique names
                    newpath3.map((mapping, i) => {
                        if (!uniqueNames.has(mapping.name)) {
                            uniqueNames.add(mapping.name); // Add to Set
                            
                            const option = new Option(mapping.name, mapping.kode_kelas, false, false);
                            $('#setKelas').append(option);
                        }
                    });

                    showSubKelas();

					console.log(newpath3);
				})
				.catch(error => {
					console.error('Error fetching data:', error);
				});
			}
			function findMapel(str){
				axios.get('<?= api_url_core(); ?>api/master/kelas/'+str, {
					headers: {
						'Authorization': 'Bearer ' + localStorage.getItem('_token')
					}
				}).then(response => {
					console.log("kelas : ",response.data);
					findMapel2(response.data.tingkat);
				})
				.catch(error => {
					console.error('Error fetching data:', error);
				});
			}
			
			function findMapel2(str){
				axios.get('<?= api_url_core(); ?>api/master/matapelajaran/tingkat/'+str, {
					headers: {
						'Authorization': 'Bearer ' + localStorage.getItem('_token')
					}
				}).then(response => {
					
					newpath5 = [];

					console.log(response.data);
					response.data.map((mapping,i)=>{
						newpath5.push({
							'tingkat' : mapping.tingkat,
							'kode_mapel' : mapping.id,
							'name' : mapping.name,
						})
					});

					newpath5.sort((a, b) => a.name - b.name);

					newpath5.map((mapping,i)=>{
						const option = new Option(mapping.name, mapping.kode_mapel, true, true);
						$('#setMapel').append(option);
					});
					console.log(newpath5);
				})
				.catch(error => {
					console.error('Error fetching data:', error);
				});
			}
			

            function mapel(){
				axios.get('<?= api_url_core(); ?>api/master/matapelajaran/tingkat/'+str, {
					headers: {
						'Authorization': 'Bearer ' + localStorage.getItem('_token')
					}
				}).then(response => {
					
					newpath8 = [];

					console.log(response.data);
					response.data.map((mapping,i)=>{
						newpath8.push({
							'tingkat' : mapping.tingkat,
							'kode_mapel' : mapping.id,
							'name' : mapping.name,
						})
					});

					newpath8.sort((a, b) => a.name - b.name);

					newpath8.map((mapping,i)=>{
						const option = new Option(mapping.name, mapping.kode_mapel, true, true);
						$('#setMapel').append(option);
					});
				})
				.catch(error => {
					console.error('Error fetching data:', error);
				});
			}
			

			function showSubKelas(){
				axios.get('<?= api_url_core(); ?>api/master/sub-kelas', {
					headers: {
						'Authorization': 'Bearer ' + localStorage.getItem('_token')
					}
				}).then(response => {
					console.log(response.data);
					response.data.map((mapping,i)=>{
						newpath4.push({
							'tingkat' : mapping.tingkat,
							'kode_sub_kelas' : mapping.id,
							'sub_kelas' : mapping.name,
						})
					});

					newpath4.sort((a, b) => a.tingkat - b.tingkat);

					newpath4.map((mapping,i)=>{
						const option = new Option(mapping.sub_kelas, mapping.kode_sub_kelas, true, true);
						
						// Append it to the select2 dropdown
						$('#setSubKelas').append(option);
					});


                    
                    setTimeout(function() {
                        triggetitback();
                    }, 1000);
                    console.log(">>>",newpath4);
				})
				.catch(error => {
					console.error('Error fetching data:', error);
				});
			}
			
			
			function showDetails(str){

				$('#modalViewDetails').modal('toggle');

				$('.puter').html('<div class="row"><div class="col-12 text-center">Loading...</div></div>');

				const save2 = async () => {
					const posts2 = await axios.get('<?= api_url_core(); ?>api/master/jadwal-pelajaran/'+str, {
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
						const posts2 = await axios.get('<?= api_url_core(); ?>api/master/jadwal-pelajaran/'+mode, {
							headers: {
								'Authorization': 'Bearer ' + localStorage.getItem('_token')
							}
						}).catch((err) => {
							console.log(err.response);
						});
				
						if (posts2.status == 200) {

							$('#setTahunAkademik').val(posts2.data.m_tahun_akademik_id).trigger('change');
							$('#setSemester').val(posts2.data.semester_id).trigger('change');
							$('#setKelas').val(posts2.data.kelas_id).trigger('change');
							$('#setSubKelas').val(posts2.data.sub_kelas_id).trigger('change');
							$('#setHari').val(posts2.data.hari).trigger('change');
							
							$('#tanggal_mulai').val(posts2.data.jam_mulai);
							$('#tanggal_selesai').val(posts2.data.jam_selesai);

							setTimeout(function() {
								$('#setMapel').val(posts2.data.matapelajaran_id).trigger('change');
								$('#setGuru').val(posts2.data.guru_id).trigger('change');
							}, 1000);
							
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
					url = '<?= api_url_core(); ?>api/master/jadwal-pelajaran';
				}else {
					url = '<?= api_url_core(); ?>api/master/jadwal-pelajaran/'+modesett;
				}


				var setTahunAkademik = $("#setTahunAkademik").val();
				var setSemester = $("#setSemester").val();
				var setKelas = $("#setKelas").val();
				var setSubKelas = $("#setSubKelas").val();
				var setMapel = $("#setMapel").val();
				var setHari = $("#setHari").val();
				var setGuru = $("#setGuru").val();
				var tanggal_mulai = $("#tanggal_mulai").val();
				var tanggal_selesai = $("#tanggal_selesai").val();

				tanggal_mulai = tanggal_mulai.split(":");
				tanggal_selesai = tanggal_selesai.split(":");
				
				var form_data = new FormData();

				form_data.append('jam_mulai', tanggal_mulai[0]+':'+tanggal_mulai[1]);
				form_data.append('jam_selesai', tanggal_selesai[0]+':'+tanggal_selesai[1]);
				form_data.append('m_tahun_akademik_id', setTahunAkademik);
				form_data.append('semester_id', setSemester);
				form_data.append('kelas_id', setKelas);
				form_data.append('sub_kelas_id', setSubKelas);
				form_data.append('matapelajaran_id', setMapel);
				form_data.append('hari', setHari);
				form_data.append('guru_id', setGuru);
				
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
                        // triggetitback();
                        location.reload();

					} else {

					}
				}
				save(form_data);
			}
        </script>