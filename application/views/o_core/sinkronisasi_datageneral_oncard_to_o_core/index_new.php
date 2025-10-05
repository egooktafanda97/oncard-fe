<style>
    #keteranganCair {
        position: relative;
        height:30px;
        -webkit-transition:all 0.1s linear 0s;
    }
    #keteranganCair:focus {
        height:150px;
    }
    
</style>

<style type="text/css">
    .merx {
        position:relative;
        cursor:pointer;
        transition:all 0.1s linear 0s;
    }
    .merx:hover {
        transform:scale(1.1,1.1);
    }
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
</style>
<div class="page-wrapper">
			<div class="page-content">
                <div id="loadingScreen" class="loading-overlay">
                    <div class="loading-spinner"></div>
                    <p id="progress">Processing, please wait...</p>
                    <div class="progress" style="width:200px;">
                        <div id="progressBar" class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
				</div>
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Sinkronisasi Data General</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Sync Status General</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
			  
                <div class="row">
                    <div class="col-lg-3 col-md-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <!-- <div id="importResults">
                                        <ul id="dataList"></ul>
                                        <div id="progress"></div>
                                    </div> -->

                                    <div class="col-12 text-center">
                                        <!-- <button type="button" class="btn btn-lg btn-primary" style="font-size:70px; padding:25px;border-radius:100%" onclick="syncDataNow();"><i class="bx bx-sync" style="font-size:100px;"></i></button> -->
                                        <img class="merx" src="https://oncard.id/assets/png/sync_button.png" style="width:100%;"  onclick="syncDataNow();"/>
                                    </div>
                                    <div class="col-12 text-center mt-5 mb-5">
                                        <font style="font-size:16px; border-radius:5px; padding:25px;text-align:center; display:block;" id="synctext"></font>
                                    </div>

                                    
                                </div>
                            </div>
                        </div>
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
			let endPointGetDataSiswa = '<?= api_url_tagihan(); ?>api/siswa';
			let endPointGetDataSiswaSearch = '<?= api_url_tagihan(); ?>api/siswa/search?q=';

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

            let currentPage = 1;
            let totalPages = null;
            let importing = false;

            function updateProgress(message) {
                const progressElement = document.getElementById('progress');
                progressElement.textContent = message;
            }

            function fetchData(page = 1) {
                if (importing) return; // Avoid duplicate requests
                importing = true;

                var form_data = new FormData();

                showLoading();

                axios.post(`<?=api_url_core();?>api/imports/general?page=${page}&t=${Date.now()}`, form_data, {
                    headers: {
                        'Authorization': 'Bearer ' + localStorage.getItem('_token')
                    }
                })
                .then(response => {
                    const data = response.data.data;
                    const pagination = response.data.pagination;

                    // Debug: Log pagination details
                    console.log('Pagination:', pagination);

                    // Display data (optional)
                    // const dataList = document.getElementById('dataList');
                    // data.forEach(item => {
                    //     const li = document.createElement('li');
                    //     li.textContent = item.nama_lengkap; // Or other relevant info
                    //     dataList.appendChild(li);
                    // });

                    // Update progress
                    updateProgress(`Importing page ${pagination.current_page} of ${pagination.total_pages}...`);

                    const progressBar = document.getElementById('progressBar');
                    const progress = Math.round((pagination.current_page / pagination.total_pages) * 100);
                    progressBar.style.width = `${progress}%`;
                    progressBar.setAttribute('aria-valuenow', progress);
                    progressBar.textContent = `${progress}%`; // Optional: Show percentage inside the bar

                    
                    // Ensure pagination object is valid
                    if (pagination && pagination.current_page < pagination.total_pages) {
                        importing = false;
                        fetchData(pagination.current_page + 1); // Fetch next page
                    } else {
                        Swal.fire({
                        title: "Import Selesai!",
                        icon: "success",
                        draggable: true
                        });
                        updateProgress("Import selesai!");
                        importing = false; // Mark as done
                        hideLoading();
                    }
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                    updateProgress("Terjadi kesalahan saat import.");
                    importing = false; // Reset on error
                    hideLoading();
                });
            }


            // Mulai import otomatis saat halaman dimuat
            // window.onload = function () {
            //     updateProgress("Memulai import...");
            //     fetchData(currentPage);  // Mulai dengan halaman pertama
            // };

            
            function showLoading() {
				document.getElementById('loadingScreen').style.display = 'flex';
				$('#loadingScreen').css('flex-direction','column');
				$('#loadingScreen').css('align-items','center');
				$('#loadingScreen').css('justify-content','center');
			}

			function hideLoading() {
				document.getElementById('loadingScreen').style.display = 'none';
			}

			var typingTimer;
			
			$(document).ready(function () {

                if (localStorage.getItem('last_sync_data_siswa') !== null) {
                    $('#synctext').html('Terakhir sinkronisasi pada : <br/>'+moment(localStorage.getItem('last_sync_data_siswa')).format('dddd, DD-MM-YYYY HH:mm:ss') +" WIB");
                } else {
                    $('#synctext').html('Belum pernah ada sinkronisasi pada device ini.<br/>Silahkan tekan tombol sinkronisasi diatas sekarang juga!');
                }

            });

			function syncDataNow(){

                updateProgress("Memulai import...");
                fetchData(currentPage);  // Mulai dengan halaman pertama
			}
           
		</script>