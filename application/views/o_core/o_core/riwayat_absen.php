<?php 

$namaInstansi = $_instansi_name;
$standar_jam_absen = '07:00';

if($namaInstansi == 'ppsr'){
    $standar_jam_absen = '07:30';
}else if($namaInstansi == 'ppsrputra'){
    $standar_jam_absen = '07:15';
}else if($namaInstansi == 'alazharsb'){
    $standar_jam_absen = '06:45';
}else if($namaInstansi == 'smk.perbankan'){
    $standar_jam_absen = '07:25';
}else if($namaInstansi == 'yayasan.ibuharapan.bengkalis'){
    $standar_jam_absen = '07:20';
}else if($namaInstansi == 'tk.labschool'){
    $standar_jam_absen = '07:20';
}

?>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<style>
.swal-custom-text .swal2-html-container {
    color: white !important;
}

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

.dropdown-checkbox-wrapper {
  position: relative;
  display: inline-block;
  width:100%;
  text-align:left;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: white;
  border: 1px solid #ccc;
  padding: 10px;
  max-height: 200px;
  overflow-y: auto;
  z-index: 1000;
  width: 200px;
}

.dropdown-checkbox-wrapper.open .dropdown-content {
  display: block;
  text-align:left;
}

.dropdown-content label {
  display: block;
  margin-bottom: 5px;
}

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

</style>

<div class="page-wrapper">

    <div id="loadingScreen" class="loading-overlay">
    <div class="loading-spinner"></div>
    <p>Memuat data, silahkan menunggu...</p>
    </div>

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
                            <button class="btn btn-sm btn-outline-primary me-2 mb-3" id="btnSave2PDF" onclick="save2PDF('example');" style="border-radius:100px;"><i class="bx bxs-file-pdf mx-1" style="margin:0px;"></i></button>
                            <button class="btn btn-sm btn-outline-success me-2 mb-3" onclick="saveToExcel('tabelsiswa');" style="border-radius:100px;"><i class="bx bxs-file mx-1" style="margin:0px;"></i></button>
                            
							</div>
						</div>
                        <div class="row">
                            
                        <div class="col-lg-12 col-12">
                            <div class="row">
                                <div class="col-12">
                                    <div class="alert alert-primary p-3" style="overflow:hidden;">
                                        <p style="width:60%;">Jika Anda ingin mengetahui data guru ataupun staf yang tidak melakukan / melalui proses Absensi Masuk Sekolah, silahkan tekan tombol berikut terlebih dahulu.</p>
                                        <button type="button" id="hits-button-siswa-tidak-absen" class="btn btn-sm btn-primary d-block" style="border-radius:3px!important;">1 - Lihat Daftar Guru/Staf Tidak Absen Masuk Sekolah <div class="badge bg-danger end-this-at-15june">new</div></button>
                                        <button type="button" id="hits-button-siswa-tidak-absen-kelas" class="btn btn-sm btn-info d-block mt-3 text-white" style="border-radius:3px!important;">2 - Lihat Daftar Guru/Staf Tidak Absen Masuk Kelas <div class="badge bg-danger end-this-at-15june">new</div></button>
                                        <img src="<?=base_url();?>assets_oncard/images/thumbs.webp" alt="" style="position:absolute; right:0; bottom:0; margin-right:0px; border-radius:0px;border-top-left-radius:100px; object-fit:cover;">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            <h4>Tampilkan Data Filter</h4>
                            <div class="col-3">
                                <div class="mb-3">
                                    <label for="filter-user-type-kat">Pilih Kategori:</label>
                                    <div class="dropdown-checkbox-wrapper">
                                    <button type="button" class="dropdown-btn" style="width:100%!important;background: white;border: 1px solid;border-radius: 3px;padding: 8px; text-align:left;">Select Categories ⬇</button>
                                    <div class="dropdown-content" id="filter-user-type-kat"></div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-3">
                                <div class="mb-3">
                                    <label for="filter-start-date">Pilih Tanggal:</label>
                                        <input type="date" id="date-filter" class="form-control">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="mb-3 mt-3">
                                    <button type="button" class="btn btn-primary" onclick="goNext();">Tampilkan Data</button>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="mb-3 mt-3">
                                    <button type="button" class="btn btn-danger" onclick="location.reload();">Reset Filter</button>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-12">
                            <div id="summary-cards" class="row g-3 mb-3"></div>
                        </div>
                            
                        </div>
                        <hr>
						<div class="showdataafterget" style="display:none;">
					
                            <div class="row mb-3">
                                <div class="col-12">
                                    <font class="head" style="font-size:30px; font-weight:900;"></font>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="filter-user-type">Filter by User Type:</label>
                                        <select id="filter-user-type" class="form-control" style="width:200px;">
                                            <option value="">All</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="filter-user-kategori">Filter by Jenis Absen:</label>
                                        <select id="filter-user-kategori" class="form-control" style="width:200px;">
                                            <option value="">All</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="filter-keterangan-absen">Filter by Keterangan Absen:</label>
                                        <select id="filter-keterangan-absen" class="form-control" style="width:200px;">
                                            <option value="">All</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="filter-sub-kelas">Filter by Kelas:</label>
                                        <select id="filter-sub-kelas" class="form-control" style="width:200px;">
                                            <option value="">All</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="filter-matapelajaran">Filter by Matapelajaran:</label>
                                        <select id="filter-matapelajaran" class="form-control" style="width:200px;">
                                            <option value="">All</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 text-center m-auto">
                                        <button id="reset-filters" class="btn btn-secondary d-block" style="display:block;margin:auto; text-align:center;">Reset Filters</button>
                                </div>
                            </div>

                            
                            <div class="table-responsive">
							<table id="example" class="tabelsiswa table table-hover tabelproduk" style="width:100%;font-size:12px!important;">
								<thead class="table-light">
									<tr>
										<th>No.</th>
										<th>Waktu</th>
										<th>Waktu</th>
										<th>Waktu</th>
										<th>Tanggal</th>
										<th>Nama</th>
										<th>Matapelajaran</th>
										<th>Kategori</th>
										<th>Kategori</th>
										<th>Tipe</th>
										<th>Tipe</th>
										<th>Tipe</th>
										
									</tr>
								</thead>
							</table>
						    </div>
						</div>
					 </div>
				   </div>

                   <!-- ok1 -->
                   <div id="plothere" class="col-12 putdaftartidakabsen">
                   </div>
                   <!-- ok2 -->

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
										<input type="text" class="form-control" id="namaKategori" placeholder="ex: Absen Kehadiran" aria-label="Text input with prefix" aria-describedby="basic-addon1">
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

            <!-- Modal for Image -->
            <div class="modal fade" id="modalImage" tabindex="-1" aria-labelledby="modalImageLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalImageLabel">Lampiran Gambar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <img id="imgLampiran" src="" alt="Lampiran" class="img-fluid" style="max-height: 400px;">
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

            let dataGet1;

            let kategori_arr = [];
            let kategori_text = '';

			let tahun_mulai_sett;
			let tahun_selesai_sett;

			let table;

            let summary = {};

			$(document).ready(function () {
				// getTahunAkademik();

                const today = new Date().toISOString().split('T')[0];
                document.getElementById('date-filter').value = today;
                
                getKategoriAbsen();
                
            });


            function goNext() {
                let tgl_select = $('#date-filter').val();

                summary = {};

                if (kategori_text === '' || !tgl_select) {
                    Toastify({
                        text: 'Kategori / Tanggal Belum Dipilih',
                        duration: 3000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        className: "errorMessage",
                    }).showToast();
                    return false;
                }

                const ajaxReload = function () {
                    axios.get('<?= api_url_core(); ?>api/absensi/multi-kategori?kategori_absen=' + kategori_text + '&dates=' + tgl_select, {
                        headers: {
                            'Authorization': 'Bearer ' + localStorage.getItem('_token'),
                            'pagination': false
                        }
                    }).then(response => {
                        $('.showdataafterget').css('display', 'block');

                        let dataGroup = response.data[tgl_select]; // array with multiple kategori_absen_id groups
                        let allDetails = [];
                        let allDetailsHeader = [];

                        if (!Array.isArray(dataGroup) || dataGroup.length === 0) {
                            hideLoading();
                        } else {
                            dataGroup.forEach(item => {
                                if (Array.isArray(item.details)) {
                                    allDetails = allDetails.concat(item.details);
                                    allDetailsHeader.push(item.details[0]?.kategori_absen?.name ?? '_');
                                }
                            });
                        }


                        if(modesett=='cekabsentidakhadir'){
                            dataGet1 = allDetails;
                            console.log(dataGet1);
                            showAllGeneral();
                        }

                        if (modesett === 'cekabsentidakhadirkelas') {
                            dataGet1 = allDetails.filter(item => item.user_type !== 'SISWA');
                            console.log(dataGet1);
                            showAllGeneral();
                        }


                        table.clear().rows.add(allDetails).draw();

                        const records = allDetails;
                        const records2  = allDetailsHeader.join('-');
                        // table.clear().rows.add(records).draw();

                        $('.head').html(records2);

                        $('#total-records').text(records.length);
                        const userTypes = [...new Set(records.map(item => item.user_type))];
                        $('#filter-user-type').empty().append(`<option value="">Semua</option>`);
                        userTypes.forEach(type => {
                            $('#filter-user-type').append(`<option value="${type}">${type}</option>`);
                        });

                        const userTypes2 = [...new Set(records.map(item => item.keterangan_absen?.name??'-'))];
                        $('#filter-keterangan-absen').empty().append(`<option value="">Semua</option>`);
                        userTypes2.forEach(type => {
                            $('#filter-keterangan-absen').append(`<option value="${type}">${type}</option>`);
                        });
                        
                        const userTypes3 = [...new Set(records.map(item => item.kategori_absen.name))];
                        $('#filter-user-kategori').empty().append(`<option value="">Semua</option>`);
                        userTypes3.forEach(type => {
                            $('#filter-user-kategori').append(`<option value="${type}">${type}</option>`);
                        });

                        // Populate Sub Kelas filter
                        const subKelasOptions = [...new Set(records.map(item => item.sub_kelas?.name || '-'))].sort();
                        $('#filter-sub-kelas').empty().append(`<option value="">Semua</option>`);
                        subKelasOptions.forEach(type => {
                            $('#filter-sub-kelas').append(`<option value="${type}">${type}</option>`);
                        });

                        // Populate Matapelajaran filter
                        const matapelajaranOptions = [...new Set(records.map(item => item.mata_pelajaran?.name || '-'))].sort();
                        $('#filter-matapelajaran').empty().append(`<option value="">Semua</option>`);
                        matapelajaranOptions.forEach(type => {
                            $('#filter-matapelajaran').append(`<option value="${type}">${type}</option>`);
                        });

                        // Group and count
                        let groupedSummary = {};
                        records.forEach(item => {
                            const userType = item.user_type || 'Unknown';
                            const ket = item.keterangan_absen?.name || 'Tidak ada';

                            if (!groupedSummary[userType]) {
                                groupedSummary[userType] = {};
                            }

                            groupedSummary[userType][ket] = (groupedSummary[userType][ket] || 0) + 1;
                        });

                        console.log("summary",groupedSummary);

                        let summaryHtml = '';

                        Object.entries(groupedSummary).forEach(([userType, ketCounts]) => {
                            summaryHtml += `
                            <div class="col">
                                <h5 class="mb-2">${userType}</h5>
                                <div class="d-flex overflow-auto mb-4 gap-3 flex-nowrap">
                            `;

                            Object.entries(ketCounts).forEach(([ket, count]) => {
                                summaryHtml += `
                                    <div class="card shadow-sm border-info" style="min-width: 220px; flex-shrink: 0;">
                                        <div class="card-body">
                                            <h6 class="card-title text-info">${ket}</h6>
                                            <p class="card-text fw-bold" style="font-size:26px;">${count}</p>
                                        </div>
                                    </div>
                                `;
                            });

                            summaryHtml += `</div></div>
                            
                            `;
                        });


                        $('#summary-cards').html(summaryHtml);


                    }).catch(error => {
                        console.error('Error fetching data:', error);
                    });
                };

                function showAllGeneral(){
                    axios.get('<?= api_url_core(); ?>api/general', {
                        headers: {
                            'Authorization': 'Bearer ' + localStorage.getItem('_token'),
                            'nopaging' : false
                        }
                    }).then(response => {
                        createAbsentGeneralTable(response.data);
                        console.log(newpath);
                    })
                    .catch(error => {
                        console.error('Error fetching data:', error);
                    });
                }

                function createAbsentGeneralTable(allTeachers) {
                    hideLoading();

                    if ($.fn.DataTable.isDataTable('#example2')) {
                        $('#example2').DataTable().destroy();
                    }

                    if ($('#example2').length === 0) {
                        $('.putdaftartidakabsen').html(`
                            <div class="card radius-1 my-3">
                                <div class="card-body">
                                    <h3 style="font-weight:900">Daftar Guru/Staff Tidak Absen</h3>
                                    <div class="row mb-2">
                                        <div class="col-md-3">
                                            <label>Filter Jenis Kelamin</label>
                                            <select id="filterJK" class="form-control form-control-sm">
                                                <option value="">Semua</option>
                                                <option value="Laki-laki">Laki-laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label>Filter Jabatan</label>
                                            <select id="filterJabatan" class="form-control form-control-sm">
                                                <option value="">Semua</option>
                                            </select>
                                        </div>
                                    </div>
                                    <table id="example2" class="tabelsiswa table table-hover tabelproduk2" style="width:100%;font-size:12px!important;"></table>
                                </div>
                            </div>
                        `);
                    }

                    const presentIDs = (dataGet1 || []).map(att => att.user_absensi_id);

                    const absentTeachers = allTeachers
                        .filter(t => !presentIDs.includes(t.user_id))
                        .map(t => {
                            const gender = t.detail.jenis_kelamin === 'L' ? 'Laki-laki' : 'Perempuan';
                            const jabatan = t.detail.jabatan ?? 'Belum Ditentukan';

                            return {
                                id: t.id,
                                name: t.name,
                                jenis_kelamin: gender,
                                jabatan: jabatan,
                                telpon: t.detail.telpon ?? '-'
                            };
                        });

                    // Populate Jabatan filter
                    const jabatanOptions = [...new Set(absentTeachers.map(s => s.jabatan.trim()))].sort();

                    $('#filterJabatan').html('<option value="">Semua</option>');
                    jabatanOptions.forEach(j => {
                        if (j !== '') {
                            $('#filterJabatan').append(`<option value="${j}">${j}</option>`);
                        }
                    });


                    const table = $('#example2').DataTable({
                        fixedHeader: true,
                        processing: true,
                        searching: true,
                        data: absentTeachers,
                        columns: [
                            {
                                data: 'name',
                                title: 'Nama',
                                render: data => `<span class="text-dark fw-bold">${data}</span>`
                            },
                            {
                                data: 'jenis_kelamin',
                                title: 'JK',
                                className: 'text-center'
                            },
                            {
                                data: 'jabatan',
                                title: 'Jabatan'
                            },
                            {
                                data: 'telpon',
                                title: 'Telpon'
                            }
                        ],
                        lengthMenu: [[10, 20, 30, -1], [10, 20, 30, "All"]],
                        pageLength: 30,
                        dom: '<"top"f>rt<"bottom"lip><"clear">',
                        initComplete: function () {
                            $('html, body').animate({
                                scrollTop: $('.putdaftartidakabsen').offset().top
                            }, 500);
                        }
                    });

                    // Filtering
                    $('#filterJK, #filterJabatan').on('change', function () {
                        const jk = $('#filterJK').val();
                        const jabatan = $('#filterJabatan').val();

                        table.column(1).search(jk);
                        table.column(2).search(jabatan).draw();
                    });
                }


                if ( $.fn.DataTable.isDataTable('#example') ) {
                    // Already initialized, just reload data
                    table = $('#example').DataTable();
                    ajaxReload();
                } else {
                    // First time init
                    table = $('#example').DataTable({
    fixedHeader: true,
    processing: true,
    searching: true,
    columnDefs: [{ className: 'text-right' }],
    order: [[0, 'desc']],
    data: [], // Empty until loaded
    columns: [
        {
            data: null, title: 'No.', orderable: false, className: 'text-center',
            render: (data, type, row, meta) => meta.row + 1
        },
        {
            data: 'jam_absen', title: 'Waktu',
            render: (data, type, row) =>
                `<span class="kode-kunjungan text-dark" style="font-weight: bold;">${moment(row.created_at).format('DD-MM-YYYY HH:mm:ss')}</span>`
        },
        // New column: Standar Jam Masuk
        {
            data: null, title: 'Standar Jam Masuk',
            render: (data, type, row) => {
                // Define the standard time (07:30 in this case)
                const standar_jam_absen = '<?=$standar_jam_absen;?>';
                return `<span class="text-dark" style="font-weight: bold;">${standar_jam_absen}</span>`;
            }
        },
        // New column: Status
        {
            data: null, title: 'Status',
            render: (data, type, row) => {
                const standar_jam_absen = '<?=$standar_jam_absen;?>';
                const waktu_absen = moment(row.created_at);
                
                // Create date objects for comparison (using today's date)
                const today = moment().format('YYYY-MM-DD');
                const absenTime = moment(`${today} ${waktu_absen.format('HH:mm:ss')}`);
                const standarTime = moment(`${today} ${standar_jam_absen}`);
                
                let status = '';
                let statusClass = '';
                
                // Check the type of absence
                let timeDiff = '';
                
                // Check the type of absence
                if (row.kategori_absen?.name.toLowerCase() === 'masuk sekolah') {
                    // For "masuk sekolah", compare with standard time
                    const diffMinutes = absenTime.diff(standarTime, 'minutes');
                    
                    if (diffMinutes <= 0) {
                        status = 'Tepat Waktu';
                        statusClass = 'text-success';
                        timeDiff = `(${Math.abs(diffMinutes)} menit lebih awal)`;
                    } else {
                        status = 'Terlambat';
                        statusClass = 'text-danger';
                        timeDiff = `(terlambat ${diffMinutes} menit)`;
                    }
                } else if (row.kategori_absen?.name.toLowerCase() === 'masuk kelas') {
                    // For "masuk kelas", compare with schedule start time
                    if (row.jadwal?.jam_mulai) {
                        const jadwalTime = moment(`${today} ${row.jadwal.jam_mulai}`);
                        const diffMinutes = absenTime.diff(jadwalTime, 'minutes');
                        
                        if (diffMinutes <= 0) {
                            status = 'Tepat Waktu';
                            statusClass = 'text-success';
                            timeDiff = `(${Math.abs(diffMinutes)} menit lebih awal)`;
                        } else {
                            status = 'Terlambat';
                            statusClass = 'text-danger';
                            timeDiff = `(terlambat ${diffMinutes} menit)`;
                        }
                    } else {
                        status = 'Tidak Ada Jadwal';
                        statusClass = 'text-warning';
                        timeDiff = '(jadwal tidak tersedia)';
                    }
                } else if (row.kategori_absen?.name.toLowerCase() === 'keluar kelas') {
                    // For "keluar kelas", we might need different logic
                    // This is just a placeholder implementation
                    status = 'Selesai';
                    statusClass = 'text-info';
                    timeDiff = '(telah menyelesaikan kelas)';
                } else {
                    // For other types
                    status = 'Diverifikasi';
                    statusClass = 'text-primary';
                    timeDiff = '(absensi diverifikasi)';
                }
                
                return `
                    <div>
                        <span class="${statusClass}" style="font-weight: bold;">${status}</span>
                        <br>
                        <small class="text-muted">${timeDiff}</small>
                    </div>`;
            
            }
        },
        {
            data: 'user_type', title: 'Tipe',
            render: (data, type, row) =>
                `<span class="kode-kunjungan text-dark" style="font-weight: bold;">${row.user_type}</span>`
        },
        { data: 'user_absensi.name', title: 'Nama' },
        {
            data: 'jadwal.jam_mulai', title: 'Mulai',
            render: (data, type, row) =>
                `<span class="kode-kunjungan text-dark" style="font-weight: bold;">${row.jadwal?.jam_mulai ?? '-'}</span>`
        },
        {
            data: 'kelas', title: 'Kelas',
            render: (data, type, row) =>
                `<span class="kode-kunjungan text-dark" style="font-weight: bold;">${row.siswaDetail?.siswa_kelas?.sub_kelas?.name ?? '-'}</span>`
        },
        {
            data: 'mata_pelajaran', title: 'Matapelajaran',
            render: (data, type, row) =>
                `<span class="kode-kunjungan text-dark" style="font-weight: bold;">${row.mata_pelajaran?.name ?? '-'}</span>`
        },
        {
            data: 'kategori_absen', title: 'Jenis Absen',
            render: (data, type, row) =>
                `<span class="kode-kunjungan text-dark" style="font-weight: bold;">${row.kategori_absen?.name ?? '-'}</span>`
        },
        {
            data: 'keterangan_absen', title: 'Keterangan Absen',
            render: (data, type, row) =>
                `<span class="kode-kunjungan text-dark" style="font-weight: bold;">${row.keterangan_absen?.name??'-'}</span>`
        },
        {
            data: null,
            title: 'Lampiran & Notulensi',
            orderable: false,
            render: function (data, type, row) {
                const hasImage = row.lampiran && row.lampiran !== '';
                const not = row.notulensi || 'Tidak ada';
                const imageBtn = `<button class="btn btn-sm btn-${hasImage ? 'info' : 'secondary'} me-2 show-image" ${hasImage ? `data-img="${row.lampiran}"` : 'disabled'}>
                                    <i class="bx bx-image"></i> Gambar
                                </button>`;

                const noteBtn = `<button class="btn btn-sm btn-warning show-note" data-note="${not}">
                                    <i class="bx bx-message"></i> Notulensi
                                </button>`;

                return `<div class="d-flex">${imageBtn}${noteBtn}</div>`;
            }
        }
    ],
    lengthMenu: [[20, 35, 50, -1], [20, 35, 50, "All"]],
    pageLength: 20
});

                    ajaxReload();

                    $('#example').on('click', '.show-image', function () {
                        const imgUrl = $(this).data('img');
                        $('#imgLampiran').attr('src', '<?=api_url_core();?>'+imgUrl);
                        $('#modalImage').modal('show');
                    });

                    $('#example').on('click', '.show-note', function () {
                        const note = $(this).data('note');
                        Swal.fire({
                            title: 'Notulensi',
                            text: note,
                            icon: 'info',
                            confirmButtonText: 'Tutup',
                            customClass: {
                                popup: 'swal-custom-text'
                            }
                        });

                    });

                    
                }
            }


            
                // $('#reset-filters').on('click', function () {
                //     // Clear the user type filter
                //     $('#filter-user-type').val('').trigger('change'); // Reset the user type filter
                    
                    
                //     // Reset the DataTable search and redraw the table
                //     table.search('').columns().search('').draw();
                // });

                $('#reset-filters').on('click', function() {
                    $('#filter-user-type, #filter-user-kategori, #filter-keterangan-absen, #filter-sub-kelas, #filter-matapelajaran').val('');
                    // table.draw();
                    table.search('').columns().search('').draw();
                });

                // $('#filter-sub-kelas, #filter-matapelajaran').on('change', function() {
                //     table.draw();
                // });


                $('#filter-user-type').on('change', function () {
                    const filterValue = $(this).val();
                    table.column(4).search(filterValue).draw(); // Column index 4 is 'user_type'
                });
               
               
                $('#filter-matapelajaran').on('change', function () {
                    const filterValue = $(this).val();
                    table.column(8).search(filterValue).draw(); // Column index 4 is 'user_type'
                });
                
                $('#filter-sub-kelas').on('change', function () {
                    const filterValue = $(this).val();
                    table.column(7).search(filterValue).draw(); // Column index 4 is 'user_type'
                });

                $('#filter-keterangan-absen').on('change', function () {
                    const filterValue = $(this).val();
                    table.column(10).search(filterValue).draw(); // Column index 4 is 'user_type'
                });
                
                $('#filter-user-kategori').on('change', function () {
                    const filterValue = $(this).val();
                    table.column(9).search(filterValue).draw(); // Column index 4 is 'user_type'
                });

                $('#filter-user-type').on('change', function () {
                    // Apply both filters together when any filter is changed
                    table.draw();
                });
                $('#filter-keterangan-absen').on('change', function () {
                    // Apply both filters together when any filter is changed
                    table.draw();
                });
                // $('#filter-user-kategori').on('change', function () {
                //     // Apply both filters together when any filter is changed
                //     table.draw();
                // });

  

				showTahunAkademik();

				$('#setTingkat').select2({
					placeholder: 'Search options...',
					dropdownParent: $('#modalSetTagihan'), // Replace #myModal with the actual modal ID
					minimumInputLength: 0
				});
            

            $('#hits-button-siswa-tidak-absen').on('click', function() {
                showLoading();
                // Check all checkboxes
                $('.filter-checkbox').each(function () {
                const labelText = $(this).closest('label').text().trim().toLowerCase();
                if (labelText.includes('masuk sekolah')) {
                    $(this).prop('checked', true).trigger('change');
                } else {
                    $(this).prop('checked', false).trigger('change');
                }
                });


                let timer = setTimeout(() => {
                    goNext();
                    modesett = 'cekabsentidakhadir';
                }, 500);
            });
            
            $('#hits-button-siswa-tidak-absen-kelas').on('click', function() {
                showLoading();
                // Check all checkboxes
                $('.filter-checkbox').each(function () {
                const labelText = $(this).closest('label').text().trim().toLowerCase();
                if (labelText.includes('masuk kelas')) {
                    $(this).prop('checked', true).trigger('change');
                } else {
                    $(this).prop('checked', false).trigger('change');
                }
                });


                let timer = setTimeout(() => {
                    goNext();
                    modesett = 'cekabsentidakhadirkelas';
                }, 500);
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

            function getKategoriAbsen() {
                axios.get('<?= api_url_core(); ?>api/master/kategori-absen', {
                    headers: {
                        'Authorization': 'Bearer ' + localStorage.getItem('_token')
                    }
                }).then(response => {
                    const records = response.data;

                    // Bersihkan dulu isi select (optional)
                    // $('#filter-user-type-kat').empty().append('<option value="">-- Pilih Kategori --</option>');

                    records.forEach(item => {
                        kategori_arr.push(item.id);
                        $('#filter-user-type-kat').append(`
                            <label>
                                <input type="checkbox" class="filter-checkbox" value="${item.id}">
                                ${item.name}
                            </label>
                        `);
                        
                    });

                    // Toggle dropdown
                    $('.dropdown-btn').on('click', function () {
                        $(this).parent().toggleClass('open');
                    });

                    // Track checked values
                    let checkedKategoriIds = [];

                    $('#filter-user-type-kat').on('change', '.filter-checkbox', function () {
                        checkedKategoriIds = $('.filter-checkbox:checked').map(function () {
                            return $(this).val();
                        }).get();
                        
                        kategori_arr = [];
                        kategori_arr = checkedKategoriIds;

                        kategori_text = kategori_arr.join('-');
                        console.log(kategori_text);
                    });

                    // Optional: close dropdown when clicking outside
                    $(document).on('click', function (e) {
                        if (!$(e.target).closest('.dropdown-checkbox-wrapper').length) {
                            $('.dropdown-checkbox-wrapper').removeClass('open');
                        }
                    });
                    
                    // kategori_text = kategori_arr.join('-');
                    // console.log(kategori_text);
                    
                }).catch(error => {
                    console.error('Error fetching data:', error);
                });
            }

            

			
			function modalAddModify(mode){
				modesett = mode;

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
					url = '<?= api_url_core(); ?>api/master/kategori-absen';
				}else {
					url = '<?= api_url_core(); ?>api/master/kategori-absen/'+modesett;
				}


				var namaKategori = $("#namaKategori").val();
				
				var form_data = new FormData();

				form_data.append('name', namaKategori);
				form_data.append('kode', "ABS - "+namaKategori);
				
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

            function showLoading() {
				document.getElementById('loadingScreen').style.display = 'flex';
				$('#loadingScreen').css('flex-direction','column');
				$('#loadingScreen').css('align-items','center');
				$('#loadingScreen').css('justify-content','center');
			}

			function hideLoading() {
				document.getElementById('loadingScreen').style.display = 'none';
			}
        </script>

        <script>
        document.addEventListener("DOMContentLoaded", function () {
            const badges = document.querySelectorAll('.end-this-at-15june');
            const now = new Date();
            const deadline = new Date('2025-06-15T23:59:59');

            if (now > deadline) {
                badges.forEach(badge => badge.style.display = 'none');
            }
        });
        </script>
