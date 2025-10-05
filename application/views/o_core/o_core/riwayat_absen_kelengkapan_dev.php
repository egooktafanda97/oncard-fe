<!-- In your HTML -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/dompurify/3.0.5/purify.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<?php
// 1. Default values
$waktu_keterlambatan = '07:05:00';
$instansi_id = '';

// 2. Check if instansi_id is set in cookie (from JS)
if (isset($_COOKIE['_instansi_id'])) {
    $instansi_id = $_COOKIE['_instansi_id'];
    
    // 3. Set waktu_keterlambatan based on instansi_id
    switch ($instansi_id) {
        case '4':
            $waktu_keterlambatan = '07:00:00';
            break;
        case '11':
            $waktu_keterlambatan = '07:15:00';
            break;
        case '32':
            $waktu_keterlambatan = '07:25:00';
            break;
        case '105':
            $waktu_keterlambatan = '07:20:00';
            break;
        case '26':
            $waktu_keterlambatan = '06:45:00';
            break;
        case '63':
            $waktu_keterlambatan = '07:20:00';
            break;
        default:
            $waktu_keterlambatan = '07:05:00';
    }
}
?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const instansiId = localStorage.getItem('_instansi_id');
    if (instansiId && instansiId !== '<?= $instansi_id ?>') {
        document.cookie = `_instansi_id=${instansiId}; path=/; max-age=${60 * 60 * 24}`;
        if (!'<?= $instansi_id ?>') {
            location.reload();
        }
    }
    
    console.log('late_come', '<?= $waktu_keterlambatan ?>');
    console.log('instansi_id', '<?= $instansi_id ?>');
});
</script>


<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<style>
    .text-success { color: green; }
    .text-danger { color: red; }
    .fw-bold { font-weight: bold; }
    .fw-semibold { font-weight: 600; }
    .table thead th {
        background-color: #f8f9fa;
    }
</style>

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
						
						</div>
                        <div class="row">

                        <div class="col-lg-12 col-12">
                            <div class="row">
                                <div class="col-12">
                                    <div class="alert alert-info p-3" style="overflow:hidden;">
                                        <p style="width:60%;">Jika Anda ingin mengetahui data siswa yang tidak melakukan / melalui proses Absensi Kelengkapan, silahkan tekan tombol berikut terlebih dahulu.</p>
                                        <button type="button" id="hits-button-siswa-tidak-absen" class="btn btn-sm btn-primary">Lihat Daftar Siswa Tidak Absen</button>
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
                                        <button type="button" class="dropdown-btn" style="width:100%!important;background: white;border: 1px solid #ced4da;border-radius: 3px;padding: 8px; text-align:left; display: flex; justify-content: space-between; align-items: center;">
                                            <span class="selected-items-text">Select Category</span>
                                            <span>⬇</span>
                                        </button>
                                        <div class="dropdown-content" id="filter-user-type-kat" style="display: none; position: absolute; width: 100%; background: white; border: 1px solid #ced4da; border-radius: 0 0 3px 3px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); z-index: 1000; max-height: 300px; overflow-y: auto;">
                                            <div class="search-box p-2 border-bottom">
                                                <input type="text" class="form-control category-search" placeholder="Search categories..." style="width: 100%; padding: 5px 10px; border: 1px solid #ced4da; border-radius: 3px;">
                                            </div>
                                            <div class="checkbox-items p-2">
                                                <!-- Checkboxes will be populated here -->
                                            </div>
                                        </div>
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
                                    <button type="button" class="btn btn-primary" id="btnFilterSearch" onclick="goNext();">Tampilkan Data</button>
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

						<div class="showdataafterget" style="display:none;">
					
                            <div class="col-12">
                                <div id="summaryContainer" class="">
                                    <h3 class="mb-3">📊 Absensi Kelengkapan</h3>
                                    <div id="summaryContent"></div>
                                    
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-12">
                                    <font class="head" style="font-size:30px; font-weight:900;"></font>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-2 col-md-6 col-sm-6 col-12">
                                    <div class="mb-3">
                                        <label for="filter-user-type">Filter by User Type:</label>
                                        <select id="filter-user-type" class="form-control" style="width:200px;">
                                            <option value="">All</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-6 col-sm-6 col-12">
                                    <div class="mb-3">
                                        <label for="filter-user-kategori">Filter by Jenis Absen:</label>
                                        <select id="filter-user-kategori" class="form-control" style="width:200px;">
                                            <option value="">All</option>
                                        </select>
                                    </div>
                                </div>
                               

                                <div class="col-lg-2 col-md-6 col-sm-6 col-12">
                                    <div class="mb-3">
                                        <label for="filter-user-late">Filter by Status:</label>
                                        <select id="filter-user-late" class="form-control" style="width:200px;">
                                            <option value="">All</option>
                                            <option value="ON TIME">ON TIME</option>
                                            <option value="TELAT">TELAT</option>
                                        </select>
                                    </div>
                                </div>
                               

                                <div class="col-lg-2 col-md-6 col-sm-6 col-12">
                                    <div class="mb-3">
                                        <label for="filter-user-kelas">Filter by Kelas:</label>
                                        <select id="filter-user-kelas" class="form-control" style="width:200px;">
                                            <option value="">All</option>
                                        </select>
                                    </div>
                                </div>
                               
                               
                                <div class="col-lg-2 col-md-6 col-sm-6 col-12">
                                    <div class="mb-3">
                                        <label for="filter-user-kelengkapan">Filter by Kelengkapan:</label>
                                        <select id="filter-user-kelengkapan" class="form-control" style="width:200px;">
                                            <option value="">All</option>
                                            <option value="LENGKAP">LENGKAP</option>
                                            <option value="TIDAK LENGKAP">TIDAK LENGKAP</option>
                                        </select>
                                    </div>
                                </div>
                               
                                <div class="col-lg-2 col-md-6 col-sm-6 col-12 text-end">
                                    <div class="mb-3">
                                        <br/>
                                        <button id="reset-filters" class="btn btn-secondary" style="display:block;">Reset Filters</button>
                                    </div>
                                </div>
                            </div>


                            <div class="col-12">
                                <div class="ms-auto">
                                <button class="btn btn-sm btn-outline-primary me-2 mb-3 pe-3" id="btnSave2PDF" onclick="save2PDFGo('example');$('#btnSave2PDF').attr('disabled', 'disabled');" style="border-radius:100px;"><i class="bx bxs-file-pdf mx-1" style="margin:0px;"></i> Export PDF</button>
                                <button class="btn btn-sm btn-outline-success me-2 mb-3 pe-3" onclick="saveToExcel('tabelsiswa');" style="border-radius:100px;"><i class="bx bxs-file mx-1" style="margin:0px;"></i> Download Excel</button>
                                
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
										<th>Nama</th>
										<th>Matapelajaran</th>
										<th>Kategori</th>
										
										
									</tr>
								</thead>
                                <tbody id="okas"></tbody>
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

            let kategori_arr = [];
            let kategori_text = '';

            let dataGet1;

			let tahun_mulai_sett;
			let tahun_selesai_sett;

            let nama_instansi;

			let table;
			let table2;

            let summary = {};

			$(document).ready(function () {
				// getTahunAkademik();

                const today = new Date().toISOString().split('T')[0];
                document.getElementById('date-filter').value = today;
                
                getKategoriAbsen();
                
            });


            function goNext() {
                let tgl_select = $('#date-filter').val();

                $('#btnFilterSearch').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Memproses...');
				$('#btnFilterSearch').attr('disabled', 'disabled');
				$('#btnFilterSearch').css('cursor', 'not-allowed');

                
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
                    axios.get('<?= api_url_core(); ?>api/absensi/multi-kategori?kategori_absen=' + kategori_text + '&user_type=siswa&dates=' + tgl_select, {
                        headers: {
                            'Authorization': 'Bearer ' + localStorage.getItem('_token'),
                            'pagination': false
                        }
                    }).then(response => {

                        
                        $('.showdataafterget').css('display', 'block');

                        const dataGroup = response.data[tgl_select]; // array with multiple kategori_absen_id groups
                        let allDetails = [];
                        let allDetailsHeader = [];

                        dataGroup.forEach(item => {
                            if (Array.isArray(item.details)) {
                                allDetails = allDetails.concat(item.details);
                                allDetailsHeader.push(item.details[0].kategori_absen.name??'_');

                                nama_instansi = item.details[0].organisasi.name??'QRION SCHOOL';
                            }
                        });

                        if(modesett=='cekabsentidakhadir'){
                            dataGet1 = allDetails;
                            console.log(dataGet1);
                            showAllSiswa();
                        }
                        

                        table.clear().rows.add(allDetails).draw();


                        const summary = summarizeWithPercentage(allDetails);
                        renderSummaryWithBadges(summary);
                        

                        const records = allDetails;
                        const qrionColor = '#0072ff'; // Example QRION tone color, adjust as needed
                        const records2 = allDetailsHeader.map(item => 
                            `<span style="
                                display: inline-block;
                                margin: 4px;
                                padding: 6px 12px;
                                border-radius: 100px;
                                background-color: ${qrionColor};
                                color: white;
                                font-size: 17px;
                                font-weight:900;
                            ">${item}</span>`
                        ).join('');

                        // Set HTML
                        $('.head').html(records2);


                        $('#total-records').text(records.length);
                        const userTypes = [...new Set(records.map(item => item.user_type))];
                        $('#filter-user-type').empty().append(`<option value="">Semua</option>`);
                        userTypes.forEach(type => {
                            $('#filter-user-type').append(`<option value="${type}">${type}</option>`);
                        });

                        const userTypes3 = [...new Set(records.map(item => item.kategori_absen.name))];
                        $('#filter-user-kategori').empty().append(`<option value="">Semua</option>`);
                        userTypes3.forEach(type => {
                            $('#filter-user-kategori').append(`<option value="${type}">${type}</option>`);
                        });
                        
                        
                        const userTypes4 = [...new Set(records.map(item => item.siswaDetail?.siswa_kelas?.sub_kelas?.name))];
                        $('#filter-user-kelas').empty().append(`<option value="">Semua</option>`);
                        userTypes4.forEach(type => {
                            $('#filter-user-kelas').append(`<option value="${type}">${type}</option>`);
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
                        

                        $('#btnFilterSearch').html('Tampilkan Data');
                        $('#btnFilterSearch').attr('disabled', false);
                        $('#btnFilterSearch').css('cursor', 'pointer');

                    }).catch(error => {
                        hideLoading();
                        console.error('Error fetching data:', error);
                    });
                };

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
                        data: [],
                        columns: [
                            {
                                data: null, 
                                title: 'No.', 
                                orderable: false, 
                                className: 'text-center',
                                render: (data, type, row, meta) => meta.row + 1
                            },
                            {
                                data: 'jam_absen', 
                                title: 'Waktu',
                                render: (data, type, row) =>
                                    `<span class="text-dark fw-bold">${moment(row.created_at).format('DD-MM-YYYY HH:mm:ss')}</span>`
                            },
                            {
                                data: 'jam_absen_late',
                                title: 'Status',
                                className: 'text-center',
                                render: function(data, type, row) {
                                    // Get PHP waktu_keterlambatan from hidden input or JS variable
                                    const waktuKeterlambatan = '<?= $waktu_keterlambatan ?>'; // PHP value
                                    const absensiTime = moment(row.created_at).format('HH:mm:ss');
                                    
                                    // Calculate if late
                                    const waktuTelat = moment(waktuKeterlambatan, 'HH:mm:ss');
                                    const waktuAbsen = moment(absensiTime, 'HH:mm:ss');

                                    const diffSeconds = waktuAbsen.diff(waktuTelat, 'seconds');
                                    const isLate = diffSeconds > 0;

                                    // Format time difference
                                    let timeDifference = '';
                                    if (isLate) {
                                        if (diffSeconds < 60) {
                                            timeDifference = `TELAT (+${diffSeconds} detik)`;
                                        } else if (diffSeconds < 3600) {
                                            const minutes = Math.floor(diffSeconds / 60);
                                            const remainingSeconds = diffSeconds % 60;
                                            timeDifference = `TELAT (+${minutes} menit ${remainingSeconds} detik)`;
                                        } else if (diffSeconds < 86400) {
                                            const hours = Math.floor(diffSeconds / 3600);
                                            const minutes = Math.floor((diffSeconds % 3600) / 60);
                                            timeDifference = `TELAT (+${hours} jam ${minutes} menit)`;
                                        } else {
                                            const days = Math.floor(diffSeconds / 86400);
                                            const hours = Math.floor((diffSeconds % 86400) / 3600);
                                            timeDifference = `TELAT (+${days} hari ${hours} jam)`;
                                        }
                                    }

                                    // Format output
                                    if (isLate) {
                                        return `
                                            <span class="badge bg-danger">
                                                ${timeDifference}
                                            </span>
                                        `;
                                    } else {
                                        return `
                                            <span class="badge bg-success">
                                                ON TIME
                                            </span>
                                        `;
                                    }
                                }
                            },
                            { 
                                data: 'user_absensi.name', 
                                title: 'Nama',
                                className: 'fw-bold'
                            },
                            {
                                data: 'user_type', 
                                title: 'Tipe',
                                className: 'text-center'
                            },
                            {
                                data: 'kelas', 
                                title: 'Kelas',
                                render: (data, type, row) =>
                                    `<span class="text-dark">${row.siswaDetail?.siswa_kelas?.sub_kelas?.name || '-'}</span>`
                            },
                            {
                                data: 'kategori_absen', 
                                title: 'Jenis Absen',
                                render: (data, type, row) =>
                                    `<span class="text-dark">${row.kategori_absen?.name || '-'}</span>`
                            },
                            {
                                data: null,
                                title: 'Status Kelengkapan',
                                className: 'text-center',
                                orderable: false,
                                render: function(data, type, row) {
                                    const masterAddons = row.kategori_absen?.absensi_addons || [];
                                    const checkedAddons = row.absensi_addons || [];
                                    
                                    if (masterAddons.length === 0) {
                                        return '<span class="text-muted">-</span>';
                                    }
                                    
                                    // Check if all addons are completed
                                    const allCompleted = masterAddons.every(addon => 
                                        checkedAddons.some(a => a.m_absensi_addons_id === addon.id)
                                    );
                                    
                                    if (allCompleted) {
                                        return `
                                            <span class="badge bg-success">
                                                LENGKAP
                                            </span>
                                        `;
                                    } else {
                                        return `
                                            <span class="badge bg-danger">
                                                TIDAK LENGKAP
                                            </span>
                                        `;
                                    }
                                }
                            },
                            {
                                data: 'kategori_absen.absensi_addons',
                                title: 'Item Kelengkapan',
                                orderable: false,
                                width: '300px',
                                render: function (data, type, row) {
                                    const masterAddons = row.kategori_absen?.absensi_addons || [];
                                    const checkedAddons = row.absensi_addons || [];
                                    
                                    if (masterAddons.length === 0) {
                                        return '<span class="text-muted">-</span>';
                                    }

                                    // Create a compact display of addons with status
                                    return masterAddons.map(addon => {
                                        const isChecked = checkedAddons.some(
                                            a => a.m_absensi_addons_id === addon.id
                                        );
                                        const statusClass = isChecked ? 'badge bg-success' : 'badge bg-secondary';
                                        const statusIcon = isChecked ? '\u2713' : '\u2717';
                                        
                                        return `
                                            <div class="d-inline-block me-2 mb-1">
                                                <span class="${statusClass}">
                                                    ${addon.nama} ${statusIcon}
                                                </span>
                                            </div>
                                        `;
                                    }).join('');
                                }
                            }
                        ],
                        lengthMenu: [[20, 35, 50, -1], [20, 35, 50, "All"]],
                        pageLength: -1
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

            function initCategoryDropdown(records) {
                const $dropdown = $('.dropdown-checkbox-wrapper');
                const $dropdownBtn = $dropdown.find('.dropdown-btn');
                const $dropdownContent = $('#filter-user-type-kat');
                const $searchInput = $dropdown.find('.category-search');
                const $checkboxItems = $dropdown.find('.checkbox-items');
                
                // Clear previous items
                $checkboxItems.empty();
                
                // Filter records with absensi_addons
                const categoriesWithAddons = records.filter(item => item.absensi_addons.length > 0);
                
                // Populate checkboxes
                function populateCheckboxes(filter = '') {
                    $checkboxItems.empty();
                    
                    const filteredCategories = categoriesWithAddons.filter(cat => 
                        cat.name.toLowerCase().includes(filter.toLowerCase())
                    );
                    
                    if (filteredCategories.length === 0) {
                        $checkboxItems.append('<div class="p-2 text-muted">No categories found</div>');
                        return;
                    }
                    
                    // Add "All" option
                    // $checkboxItems.append(`
                    //     <div class="form-check py-1 px-2">
                    //         <input class="form-check-input filter-checkbox category-checkbox" type="checkbox" 
                    //             id="cat-all" value="all" data-name="All Categories">
                    //         <label class="form-check-label w-100" for="cat-all" 
                    //             style="cursor: pointer;">All Categories</label>
                    //     </div>
                    // `);
                    
                    filteredCategories.forEach(cat => {
                        $checkboxItems.append(`
                            <div class="form-check py-1 px-2">
                                <input class="form-check-input category-checkbox filter-checkbox" type="checkbox" 
                                    id="cat-${cat.id}" value="${cat.id}" data-name="${cat.name}">
                                <label class="form-check-label w-100" for="cat-${cat.id}" 
                                    style="cursor: pointer;">${cat.name}</label>
                            </div>
                        `);
                    });
                }
                
                // Toggle dropdown
                $dropdownBtn.click(function(e) {
                    e.stopPropagation();
                    $dropdownContent.toggle();
                    if ($dropdownContent.is(':visible')) {
                        $searchInput.focus();
                    }
                });
                
                // Search functionality
                $searchInput.on('input', function() {
                    populateCheckboxes($(this).val());
                });
                
                // Handle checkbox changes - single selection only
                $checkboxItems.on('change', '.category-checkbox', function() {
                    const $clickedCheckbox = $(this);
                    
                    if ($clickedCheckbox.val() === 'all') {
                        // If "All" is selected, uncheck all others
                        $('.category-checkbox').not(this).prop('checked', false);
                    } else {
                        // If a specific category is selected
                        $('#cat-all').prop('checked', false);
                        
                        // Uncheck all other checkboxes except this one
                        $('.category-checkbox').not(this).prop('checked', false);
                    }
                    
                    updateSelectedText();
                    // filterTableByCategories();
                });
                
                // Close when clicking outside
                $(document).click(function() {
                    $dropdownContent.hide();
                });
                
                // Prevent dropdown close when clicking inside
                $dropdownContent.click(function(e) {
                    e.stopPropagation();
                });
                
                // Update the button text with selected item
                function updateSelectedText() {
                    const $checked = $('.category-checkbox:checked');
                    const $textSpan = $dropdownBtn.find('.selected-items-text');
                    
                    if ($checked.length === 0) {
                        $textSpan.text('Select Category');
                    } else {
                        $textSpan.text($checked.data('name'));
                    }
                }
                
                // Filter table based on selected category
                function filterTableByCategories() {
                    const selectedId = $('.category-checkbox:checked').val();
                    
                    if (!selectedId || selectedId === 'all') {
                        // Show all rows if "All" or nothing selected
                        table.columns(6).search('').draw();
                    } else {
                        // Filter rows where kategori_absen_id matches the selected one
                        table.columns(6).search(selectedId, true, false).draw();
                    }
                }
                
                // Initial population
                populateCheckboxes();
            }

            function showAllSiswa(){
				axios.get('<?= api_url_core(); ?>api/master/siswa/siswa-detail', {
					headers: {
						'Authorization': 'Bearer ' + localStorage.getItem('_token'),
                        'nopaging' : false
					}
				}).then(response => {
                    createAbsentStudentsTable(response.data);
					console.log(newpath);
				})
				.catch(error => {
					console.error('Error fetching data:', error);
				});
			}

            function createAbsentStudentsTable(allStudents) {
                hideLoading();

                if ($.fn.DataTable.isDataTable('#example2')) {
                    $('#example2').DataTable().destroy();
                }

                if ($('#example2').length === 0) {
                    $('.putdaftartidakabsen').html(`
                        <div class="card radius-1 my-3">
                            <div class="card-body">
                                <h3 style="font-weight:900">Daftar Siswa Tidak Absen</h3>
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
                                        <label>Filter Kelas</label>
                                        <select id="filterKelas" class="form-control form-control-sm">
                                            <option value="">Semua</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Filter Jenjang (SMP/SMA)</label>
                                        <select id="filterJenjang" class="form-control form-control-sm">
                                            <option value="">Semua</option>
                                            <option value="SMP">SMP</option>
                                            <option value="SMA">SMA</option>
                                        </select>
                                    </div>
                                </div>
                                <table id="example2" class="tabelsiswa table table-hover tabelproduk2" style="width:100%;font-size:12px!important;">
                                </table>
                            </div>
                        </div>
                    `);
                }

                const presentStudentIds = (dataGet1 || []).map(att => att.user_absensi_id);

                const absentStudents = allStudents
                    .filter(student => !presentStudentIds.includes(student.user_id))
                    .map(student => {
                        const jenis_kelamin = student.detail.jenis_kelamin === 'L' ? 'Laki-laki' : 'Perempuan';
                        const kelas = student.siswa_kelas?.sub_kelas?.name ?? 'Belum Ditentukan';
                        const jenjang = student.name.includes('-SMA') ? 'SMA' :
                                        student.name.includes('-SMP') ? 'SMP' : 'Tidak Diketahui';

                        return {
                            id: student.id,
                            name: student.name,
                            nis: student.detail.nis,
                            kelas,
                            jenis_kelamin,
                            jenjang,
                            account_number: student.detail.account_number
                        };
                    });

                // Populate Kelas filter
                const kelasOptions = [...new Set(absentStudents.map(s => s.kelas))];
                kelasOptions.forEach(kelas => {
                    $('#filterKelas').append(`<option value="${kelas}">${kelas}</option>`);
                });

                const table = $('#example2').DataTable({
                    fixedHeader: true,
                    processing: true,
                    searching: true,
                    data: absentStudents,
                    columns: [
                        {
                            data: 'name',
                            title: 'Nama Siswa',
                            render: data => `<span class="text-dark" style="font-weight: bold;">${data}</span>`
                        },
                        {
                            data: 'jenis_kelamin',
                            title: 'JK',
                            className: 'text-center'
                        },
                        {
                            data: 'nis',
                            title: 'NIS'
                        },
                        {
                            data: 'kelas',
                            title: 'Kelas',
                            render: data => `<span class="${data === 'Belum Ditentukan' ? 'text-danger' : ''}">${data}</span>`
                        },
                        {
                            data: 'jenjang',
                            title: 'Jenjang',
                            visible: false // hidden column just for filtering
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

                // Filter handlers
                $('#filterJK, #filterKelas, #filterJenjang').on('change', function () {
                    const jk = $('#filterJK').val();
                    const kelas = $('#filterKelas').val();
                    const jenjang = $('#filterJenjang').val();
                    

                    table.column(1).search(jk);
                    table.column(3).search(kelas);
                    table.column(4).search(jenjang).draw();
                    
                });

                
            }


            


            $('#reset-filters').on('click', function () {
                // Reset all filter-user-* dropdowns
                $('[id^="filter-user-"]').val('').trigger('change');
                
                // Reset the DataTable search and redraw the table
                table.search('').columns().search('').draw();
            });

            $('#filter-user-type').on('change', function () {
                const filterValue = $(this).val();
                table.column(4).search(filterValue).draw(); 
            });

            $('#filter-user-kelas').on('change', function () {
                const filterValue = $(this).val();
                table.column(5).search(filterValue).draw(); 
            });
            
            
            $('#filter-user-kelengkapan').on('change', function() {
                const filterValue = $(this).val();
                
                // Remove previous custom search
                $.fn.dataTable.ext.search.pop();
                
                if (filterValue) {
                    // Add custom search function
                    $.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {
                        const rowData = table.row(dataIndex).data();
                        const masterAddons = rowData.kategori_absen?.absensi_addons || [];
                        const checkedAddons = rowData.absensi_addons || [];
                        
                        if (masterAddons.length === 0) return filterValue === ''; // Show empty ones only if no filter
                        
                        const allCompleted = masterAddons.every(addon => 
                            checkedAddons.some(a => a.m_absensi_addons_id === addon.id)
                        );
                        
                        if (filterValue === 'LENGKAP') return allCompleted;
                        if (filterValue === 'TIDAK LENGKAP') return !allCompleted;
                        return true;
                    });
                }
                
                table.draw();
            });

            $('#filter-user-late').on('change', function() {
                const status = $(this).val();
                table.column(2).search(status === '' ? '' : `\\b${status}\\b`, true, false).draw();
            });

            $('#filter-user-kategori').on('change', function () {
                const filterValue = $(this).val();
                table.column(6).search(filterValue).draw(); 
            });

            $('#filter-user-type').on('change', function () {
                // Apply both filters together when any filter is changed
                table.draw();
            });
            
            $('#filter-user-kelas').on('change', function () {
                // Apply both filters together when any filter is changed
                table.draw();
            });

            showTahunAkademik();

            $('#setTingkat').select2({
                placeholder: 'Search options...',
                dropdownParent: $('#modalSetTagihan'), // Replace #myModal with the actual modal ID
                minimumInputLength: 0
            });

            function renderSummaryWithBadges(summaryData) {
                const container = document.getElementById('summaryContent');
                container.innerHTML = '';

                Object.entries(summaryData).forEach(([kategori, detail]) => {
                    const tableRows = detail.addons.map(item => `
                    <tr>
                        <td>${item.name}</td>
                        <td class="text-success fw-bold">${item.checked}</td>
                        <td class="text-danger fw-bold">${item.unchecked}</td>
                        <td><span class="badge bg-primary">${item.percent}%</span></td>
                    </tr>
                    `).join('');

                    let scoreClass = 'bg-secondary';
                    if (detail.behaviorScore >= 80) scoreClass = 'bg-success';
                    else if (detail.behaviorScore >= 50) scoreClass = 'bg-warning';
                    else scoreClass = 'bg-danger';

                    const table = `
                    <div class="mb-4 border rounded shadow-sm">
                        <div class="bg-light p-2 rounded-top fw-semibold">${kategori}</div>
                        <div class="table-responsive">
                        <table class="table table-bordered m-0">
                            <thead class="table-light">
                            <tr>
                                <th>Item Kelengkapan</th>
                                <th>✔ Checked</th>
                                <th>✘ Unchecked</th>
                                <th>% Checked</th>
                            </tr>
                            </thead>
                            <tbody>${tableRows}</tbody>
                            <tfoot>
                            <tr class="table-info">
                                <td colspan="3"><strong>Skor Ketertiban</strong></td>
                                <td><span class="badge ${scoreClass}">${detail.behaviorScore}%</span></td>
                            </tr>
                            </tfoot>
                        </table>
                        </div>
                    </div>
                    `;

                    container.innerHTML += table;
                });
            }

            $('#hits-button-siswa-tidak-absen').on('click', function() {
                showLoading();
                
                // Check all checkboxes and get their values
                const checkedBoxes = $('.filter-checkbox').prop('checked', true).trigger('change');
                
                // Log the number of checkboxes checked
                console.log('Checked', checkedBoxes.length, 'checkboxes');
                
                // Get all the values from checked checkboxes
                const values = checkedBoxes.map(function() {
                    return $(this).val();
                }).get();
                
                console.log('Checkbox values:', values);
                
                kategori_text = values.join('-');

                let timer = setTimeout(() => {
                    goNext();
                    modesett = 'cekabsentidakhadir';
                    console.log('Proceeding with mode:', modesett);
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

                    initCategoryDropdown(records);


                    // records.forEach(item => {
                    //     if(item.absensi_addons.length>0){
                    //         kategori_arr.push(item.id);
                    //         $('#filter-user-type-kat').append(`
                    //             <label>
                    //                 <input type="checkbox" class="filter-checkbox" value="${item.id}">
                    //                 ${item.name}
                    //             </label>
                    //         `);
                    //     }
                        
                    // });

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

            function summarizeWithPercentage(data) {
                const summary = {};

                data.forEach(row => {
                    const kategori = row.kategori_absen?.name || 'Tanpa Kategori';
                    const masterAddons = row.kategori_absen?.absensi_addons || [];
                    const checkedAddons = row.absensi_addons || [];

                    if (!summary[kategori]) summary[kategori] = {};

                    masterAddons.forEach(addon => {
                        const addonName = addon.nama;
                        const isChecked = checkedAddons.some(a => a.m_absensi_addons_id === addon.id);

                        if (!summary[kategori][addonName]) {
                            summary[kategori][addonName] = { checked: 0, unchecked: 0 };
                        }

                        if (isChecked) {
                            summary[kategori][addonName].checked++;
                        } else {
                            summary[kategori][addonName].unchecked++;
                        }
                    });
                });

                // Add percentages and scores
                const result = {};
                Object.entries(summary).forEach(([kategori, addons]) => {
                    let totalPercent = 0;
                    let addonCount = 0;

                    const detailed = Object.entries(addons).map(([name, counts]) => {
                        const total = counts.checked + counts.unchecked;
                        const percent = total > 0 ? Math.round((counts.checked / total) * 100) : 0;
                        totalPercent += percent;
                        addonCount++;
                        return { name, ...counts, percent };
                    });

                    const score = addonCount > 0 ? Math.round(totalPercent / addonCount) : 0;

                    result[kategori] = {
                        addons: detailed,
                        behaviorScore: score
                    };
                });

                return result;
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




            function save2PDFGo(tableId) {

                $('#btnSave2PDF').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Memproses...');
				$('#btnSave2PDF').attr('disabled', 'disabled');
				$('#btnSave2PDF').css('cursor', 'not-allowed');
                
                // Get the table element
                const table = document.getElementById(tableId);
                const tableClone = table.cloneNode(true);
                
                // Remove DataTable controls, pagination, etc.
                $(tableClone).find('.dataTables_length, .dataTables_filter, .dataTables_info, .dataTables_paginate, .dt-buttons').remove();
                
                // Create a temporary container for the cloned table
                const tempDiv = document.createElement('div');
                tempDiv.style.position = 'absolute';
                tempDiv.style.left = '-9999px';
                tempDiv.appendChild(tableClone);
                document.body.appendChild(tempDiv);
                
                // Get the original table's DataTable instance
                const dataTable = $('#' + tableId).DataTable();
                const totalRecords = dataTable.rows({ search: 'applied' }).count();
                
                // Calculate statistics for footer
                let totalLengkap = 0;
                let totalTidakLengkap = 0;
                let totalLateSeconds = 0;
                let lateCount = 0;
                const waktuKeterlambatan = '<?= $waktu_keterlambatan ?>';
                
                dataTable.rows({ search: 'applied' }).every(function() {
                    const rowData = this.data();
                    
                    // Check kelengkapan status
                    const masterAddons = rowData.kategori_absen?.absensi_addons || [];
                    const checkedAddons = rowData.absensi_addons || [];
                    
                    if (masterAddons.length > 0) {
                        const allCompleted = masterAddons.every(addon => 
                            checkedAddons.some(a => a.m_absensi_addons_id === addon.id)
                        );
                        if (allCompleted) {
                            totalLengkap++;
                        } else {
                            totalTidakLengkap++;
                        }
                    }
                    
                    // Calculate lateness
                    const absensiTime = moment(rowData.created_at).format('HH:mm:ss');
                    const waktuTelat = moment(waktuKeterlambatan, 'HH:mm:ss');
                    const waktuAbsen = moment(absensiTime, 'HH:mm:ss');
                    const diffSeconds = waktuAbsen.diff(waktuTelat, 'seconds');
                    
                    if (diffSeconds > 0) {
                        totalLateSeconds += diffSeconds;
                        lateCount++;
                    }
                });
                
                // Calculate average late time
                const avgLateSeconds = lateCount > 0 ? Math.round(totalLateSeconds / lateCount) : 0;
                let avgLateFormatted = '';
                if (avgLateSeconds > 0) {
                    if (avgLateSeconds < 60) {
                        avgLateFormatted = `${avgLateSeconds} detik`;
                    } else if (avgLateSeconds < 3600) {
                        const minutes = Math.floor(avgLateSeconds / 60);
                        const seconds = avgLateSeconds % 60;
                        avgLateFormatted = `${minutes} menit ${seconds} detik`;
                    } else {
                        const hours = Math.floor(avgLateSeconds / 3600);
                        const minutes = Math.floor((avgLateSeconds % 3600) / 60);
                        avgLateFormatted = `${hours} jam ${minutes} menit`;
                    }
                }
                
                // Create summary HTML
                const summaryHTML = `
                    <div style="margin-top: 20px; padding: 15px; background: #f8f9fa; border-radius: 0px; border: 1px solid #dee2e6;font-family:Arial!important;">
                        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 15px; text-align: center;">
                            <div>
                                <div style="font-weight: bold; color: #495057;">Total Records</div>
                                <div style="font-size: 24px; color: #007bff;">${totalRecords}</div>
                            </div>
                            <div>
                                <div style="font-weight: bold; color: #495057;">LENGKAP</div>
                                <div style="font-size: 24px; color: #28a745;">${totalLengkap}</div>
                            </div>
                            <div>
                                <div style="font-weight: bold; color: #495057;">TIDAK LENGKAP</div>
                                <div style="font-size: 24px; color: #dc3545;">${totalTidakLengkap}</div>
                            </div>
                        </div>
                    </div>
                `;

                const plainTableHTML = `
                    <style>
                        table {
                            width: 100%;
                            border-collapse: collapse;
                            font-family: Arial, sans-serif;
                            font-size: 8px;
                        }
                        table th {
                            background: #007bff;
                            color: #fff;
                            text-align: left;
                            padding: 6px;
                            border: 1px solid #dee2e6;
                        }
                        table td {
                            border: 1px solid #dee2e6;
                            padding: 5px;
                            text-align: left;
                            word-wrap: break-word;
                        }
                        table tbody tr:nth-child(even) {
                            background: #eee;
                        }
                        .bg-success {
                            background:green;
                            color:white;
                        }
                        .bg-secondary {
                            background:grey;
                            color:dark;
                        }
                    </style>
                    <table>
                        <thead>
                            <tr>
                                ${Array.from(tableClone.querySelectorAll("thead tr th"))
                                    .map(th => `<th>${th.innerText}</th>`)
                                    .join("")}
                            </tr>
                        </thead>
                        <tbody>
                            ${Array.from(tableClone.querySelectorAll("tbody tr"))
                                .map(row => `
                                    <tr>
                                        ${Array.from(row.querySelectorAll("td"))
                                            .map(td => `<td>${td.innerText}</td>`)
                                            .join("")}
                                    </tr>
                                `)
                                .join("")}
                        </tbody>
                    </table>
                `;
                
                // Create HTML content for jsPDF
                const content = `
                <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
                    <div style="text-align: center; margin-bottom: 20px;font-family:Arial!important;">
                        <h2 style="color: #007bff; margin-bottom: 5px;">Laporan Absensi Kelengkapan</h2>
                        <h4 style="color: #007bff; margin-bottom: 5px;font-weight:bold;">${nama_instansi}</h4>
                        <p style="color: #6c757d; margin: 0;">Generated on: ${moment().format('DD MMMM YYYY HH:mm:ss')}</p>
                    </div>

                    ${summaryHTML}

                    <div style="font-family:Arial!important;font-size:8px!important;">
                        ${plainTableHTML}
                    </div>

                `;
                
                // Clean up
                document.body.removeChild(tempDiv);

                console.log()
                
                // Create PDF
                const { jsPDF } = window.jspdf;
                const doc = new jsPDF('l', 'mm', 'a3'); // Landscape orientation
                
                doc.setFont("Arial", "normal");
                // Add content to PDF
                console.log(content);

                doc.html(content, {
                    callback: function (doc) {
                        const pageCount = doc.internal.getNumberOfPages();
                        for (let i = 1; i <= pageCount; i++) {
                            doc.setPage(i);
                            doc.setFontSize(10);
                            doc.setTextColor(100);
                            doc.text(
                                `Page ${i} of ${pageCount}`,
                                doc.internal.pageSize.width - 50,
                                doc.internal.pageSize.height - 5
                            );
                        }

                        const fileName = `Laporan_Absensi_${moment().format('YYYYMMDD_HHmmss')}.pdf`;
                        doc.save(fileName);

                        $('#btnSave2PDF').html('<i class="bx bxs-file-pdf mx-1" style="margin:0px;"></i> Export PDF');
                        $('#btnSave2PDF').attr('disabled', false);
                        $('#btnSave2PDF').css('cursor', 'pointer');
                    },
                    x: 10,
                    y: 10,
                    width: doc.internal.pageSize.width - 20,
                    windowWidth: 1000,  // tell jsPDF how wide the HTML is
                    autoPaging: 'text',
                    html2canvas: {
                        scale: 0.4,      // shrink content to fit width
                        useCORS: true
                    }
                });


            }


        </script>