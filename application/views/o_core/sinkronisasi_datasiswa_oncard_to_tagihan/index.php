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
                <p>Processing, please wait...</p>
				</div>
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Sinkronisasi Data</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Sync Status</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
			  
				<div class="card">
					<div class="card-body">
						<div class="row">
                            <div class="col-12 text-center">
                                <button type="button" class="btn btn-lg btn-primary" style="font-size:70px; padding:25px;border-radius:100%" onclick="syncDataNow();"><i class="bx bx-sync" style="font-size:100px;"></i></button>
                            </div>
                            <div class="col-12 text-center mt-5 mb-5">
                                <font style="font-size:16px; border-radius:5px; padding:25px;text-align:center; display:block;" id="synctext"></font>
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

                showLoading();

				let num = 0;
				
                const save2 = async () => {
					const posts2 = await axios.get( 'https://api2.oncard.id/api/imports' , {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {
						console.log(err.response);
					});
			
					if (posts2.status == 200 || posts2.status == 201) {
                            var m = localStorage.setItem("last_sync_data_siswa",moment());
							location.reload();
                    }
                }
                save2();
                
			}
           
		</script>