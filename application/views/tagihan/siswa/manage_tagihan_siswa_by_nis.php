<style>
        .quota-info {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }
        .progress-container {
            width: 450px;
            margin: 0 auto;
        }
    </style>
<style>
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

/* Hide the input div initially */
.slide-input-container {
  display: none;
  position: relative;
  overflow: hidden;
}

/* Slide in from the right */
.slide-input {
  position: relative;
  left: 100%; /* Start from the right */
  transition: left 0.5s ease;
}

/* Class to slide in the input field */
.show-slide {
  left: 0;
}
</style>

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

    .text-container {
        display: inline-block; /* Keep inline layout */
        max-width: 100px; /* Set the maximum width to 100px */
        white-space: nowrap; /* Prevent text from wrapping */
        overflow: hidden; /* Hide overflow text */
        text-overflow: ellipsis; /* Add ellipsis to overflow text */
        vertical-align: middle;
        transition: max-width 0.3s ease; /* Smooth transition for width change */
    }

    td:hover .text-container {
        max-width: 100%; /* Expand max width on hover */
    }

    /* Optional: Add tooltip for better usability */
    td:hover::after {
        content: attr(data-full-text);
        position: absolute;
        top: 100%;
        left: 0;
        white-space: nowrap;
        background: #f0f0f0;
        border: 1px solid #ddd;
        padding: 4px;
        z-index: 1;
    }
</style>

<style>
:root {
  --primary-color: #4e73df;
  --secondary-color: #1cc88a;
  --text-color: #2d3748;
  --light-gray: #f8f9fa;
  --border-color: #e2e8f0;
}

body {
  font-family: 'Segoe UI', Roboto, 'Helvetica Neue', sans-serif;
  color: var(--text-color);
  background-color: #f5f7fa;
  padding: 20px;
}

.invoice-container {
  max-width: 800px;
  margin: 0 auto;
  background: white;
  border-radius: 12px;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
  overflow: hidden;
}

.invoice-header {
  padding: 30px;
  border-bottom: 1px solid var(--border-color);
  background: linear-gradient(135deg, #f8f9fa, #ffffff);
}

.logo-container {
  display: flex;
  align-items: center;
  gap: 20px;
  margin-bottom: 20px;
}

.logo {
  height: 50px;
}

.school-info h2 {
  margin: 0;
  font-size: 1.25rem;
  color: var(--primary-color);
}

.school-info p {
  margin: 5px 0 0;
  font-size: 0.875rem;
  color: #718096;
}

.invoice-title {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-top: 20px;
}

.invoice-title h1 {
  margin: 0;
  font-size: 1.75rem;
  color: var(--text-color);
}

.status-badge {
  padding: 8px 16px;
  border-radius: 20px;
  font-weight: 600;
  text-transform: uppercase;
  font-size: 0.875rem;
}

.status-badge.lunas {
  background-color: #e6f7ee;
  color: var(--secondary-color);
}

.invoice-details {
  padding: 25px 30px;
  border-bottom: 1px solid var(--border-color);
}

.detail-row-riwayat {
  display: flex;
  gap: 40px;
}

.detail-col {
  flex: 1;
}

.detail-item {
  margin-bottom: 15px;
}

.detail-label {
  display: block;
  font-size: 0.75rem;
  color: #718096;
  text-transform: uppercase;
  letter-spacing: 0.5px;
  margin-bottom: 4px;
}

.detail-value {
  font-size: 0.9375rem;
  font-weight: 500;
}

.invoice-items {
  padding: 0 30px;
}

.items-header {
  display: flex;
  padding: 15px 0;
  border-bottom: 1px solid var(--border-color);
  font-weight: 600;
  text-transform: uppercase;
  font-size: 0.75rem;
  color: #718096;
  letter-spacing: 0.5px;
}

.item-row {
  display: flex;
  padding: 20px 0;
  border-bottom: 1px solid var(--border-color);
}

.item-desc {
  flex: 3;
}

.item-amount {
  flex: 1;
  text-align: right;
  font-weight: 500;
}

.invoice-summary {
  padding: 20px 30px;
  background-color: var(--light-gray);
  border-bottom: 1px solid var(--border-color);
}

.summary-row {
  display: flex;
  justify-content: space-between;
  margin-bottom: 12px;
  font-size: 0.9375rem;
}

.summary-row.total {
  font-size: 1.125rem;
  font-weight: 600;
  margin: 20px 0;
  padding-top: 10px;
  border-top: 1px solid var(--border-color);
}

.summary-row.paid {
  color: var(--secondary-color);
  font-weight: 500;
}

.summary-row.balance {
  font-weight: 500;
}

.invoice-footer {
  display: flex;
  justify-content: space-between;
  padding: 25px 30px;
}

.payment-info h3 {
  margin: 0 0 10px;
  font-size: 1rem;
}

.payment-info p {
  margin: 5px 0;
  font-size: 0.875rem;
  color: #718096;
}

.school-stamp {
  align-self: flex-end;
}

.stamp-placeholder {
  width: 150px;
  height: 100px;
  border: 2px dashed #e2e8f0;
  display: flex;
  align-items: center;
  justify-content: center;
  color: #a0aec0;
  font-size: 0.875rem;
}

@media (max-width: 768px) {
  .detail-row-riwayat {
    flex-direction: column;
    gap: 0;
  }
  
  .invoice-footer {
    flex-direction: column;
    gap: 20px;
  }
  
  .school-stamp {
    align-self: center;
  }
}
</style>
<div class="page-wrapper">
			<div class="page-content">
				<div id="loadingScreen" class="loading-overlay">
					<div class="loading-spinner"></div>
					<p>Processing, please wait...</p>
				</div>
				<div class="row">
				<div class="progress-container mb-4">
					<h4 class="text-center">Progress Kelengkapan Tagihan</h4>
					
					<!-- Progress bar -->
					<div class="progress" style="height: 30px;">
						<div class="progress-bar bg-primary" role="progressbar" id="progressAll" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
					</div>
					
					<!-- Quota Information -->
					<div class="quota-info">
						<span id="tagihanterbayar">Rp0</span>
						<span id="totaltagihan">Rp0</span>
					</div>
				</div>
				</div>
				<div class="row">
                   <div class="col">
					 <div class="card radius-1">
						<div class="card-body">
							<div class="d-lg-flex align-items-center mb-4 gap-3">
							<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
								<div class="breadcrumb-title pe-3">Tagihan</div>
								<div class="ps-3">
									<nav aria-label="breadcrumb">
									<ol class="breadcrumb mb-0 p-0">
										<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
										</li>
										<li class="breadcrumb-item"><a href="<?=base_url().$function;?>/PelajarPage">Daftar Siswa</a>
											</li>
										<li class="breadcrumb-item active" aria-current="page">Daftar Tagihan</li>
									</ol>
									</nav>
								</div>
							</div>
							
						</div>
						<div class="table-responsive" style="margin-top:-15px;">
						<button class="btn btn-sm btn-danger me-4 mb-3" onclick="goToMultiPayment('<?=$idJenisTagihan;?>')" style="border-radius:0px;"><i class="bx bxs-archive-in"></i> Pembayaran Cash</button>
						<button class="btn btn-sm btn-outline-primary me-2 mb-3" id="btnSave2PDF" onclick="save2PDF('tabelPrint');" style="border-radius:0px;"><i class="bx bxs-file-export"></i> Export PDF</button>
						<button class="btn btn-sm btn-outline-success me-2 mb-3" onclick="saveToExcel('tabelsiswa');" style="border-radius:0px;"><i class="bx bxs-file-export"></i> Export Excel</button>
							<table class="table mb-0 tabelsiswa table-hover" id="tabelPrint">
								<thead class="table-light">
									<tr>
										<th>No.</th>
										<th>Nama Tagihan</th>
										<th>Tanggal Penagihan</th>
                                        <th>Tanggal Jatuh Tempo</th>
										<th>Total Tagihan</th>
										<th>Terbayar</th>
										<th>Sisa Tagihan</th>
										<th>Progress</th>
										<th>Status</th>
									</tr>
								</thead>
								<tbody class="putContentHere">
								</tbody>
							</table>

							<!-- Pagination -->
							<nav class="container mt-5"
								id="siswa-pagination-container"
								aria-label="Page navigation example">
							</nav>

							<!-- Pagination details -->
							<div class="container mt-1 text-muted text-center">
								<small id="siswa-pagination-details"></small>
							</div>

						</div>
					 </div>

				   </div>

                   <div class="card">
                        <div class="card-header">
                            <div class="pe-3"><h5>Riwayat Pembayaran + Kwitansi</h5></div>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <button class="btn btn-sm btn-outline-primary me-2 mb-3" id="btnSave2PDF" onclick="save2PDF('tabelPrint2','landscape');" style="border-radius:0px;"><i class="bx bxs-file-export"></i> Export PDF</button>
                                <button class="btn btn-sm btn-outline-success me-2 mb-3" onclick="saveToExcel('tabelsiswa2');" style="border-radius:0px;"><i class="bx bxs-file-export"></i> Export Excel</button>
                                <!-- <button class="btn btn-sm btn-outline-success me-2 mb-3" onclick="downloadAll();" style="border-radius:0px;"><i class="bx bxs-file-export"></i> Export All Data</button> -->
                                    <table class="table mb-0 tabelsiswa2 table-hover w-100" id="tabelPrint2">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Invoice No.</th>
                                                <th>Metode Bayar</th>
                                                
                                                <th>Tagihan</th>
                                                <th style="background:#e4fff6b8 !important;color:black; font-weight:bold;">Pembayaran</th>
                                                <th>Total tagihan</th>
                                                <th>Sudah dibayarkan</th>
                                                <th>Sisa tagihan</th>
                                                <th>Status</th>
                                                <th></th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody class="putContentHereRiwayat">
                                        </tbody>
                                    </table>

                                    <!-- Pagination -->
                                    <nav class="container mt-5"
                                        id="siswa-pagination-container"
                                        aria-label="Page navigation example">
                                    </nav>

                                    <!-- Pagination details -->
                                    <div class="container mt-1 text-muted text-center">
                                        <small id="siswa-pagination-details"></small>
                                    </div>

                                </div>
                            </div>

                        </div>
                     </div>
                     
				  </div>
				</div><!--end row-->

			</div>

		</div>

		<div id="input-template" style="display: none;">
		<div class="row py-5">
			<div class="col-lg-6 col-md-5 col-12 slide-input text-end pt-2">Masukkan nominal pembayaran sekarang disini <i class="bx bx-chevron-right"></i> </div>
			<div class="col-lg-3 col-md-6 col-10">
			<input type="text" id="nominalTagihan" class="form-control mb-2 setTocurrency" 
                            oninput="setValx(this.value);" 
                            placeholder="Jumlah saldo (Rp)" maxlength="9" onkeydown="return isNumberKey(event);"/>
			</div>
			<div class="col-lg-3 col-md-1 col-2"><button class="btn btn-primary submit-btn" onclick="procSubmitTagihanBayarByHost();">Commit Bayar</button></div>
		</div>	
		
		</div>

		<div class="modal fade" id="modalMultiPayment" tabindex="-1" aria-hidden="true">
				<div class="modal-dialog modal-fullscreen modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header" style="background:#17ca20">
							<h5 class="modal-title text-white">Pilih Beberapa Tagihan</h5>
							<button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<div class="row g-3">
								<div class="col-md-12 mb-3 ">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
												<div class="col-lg-6 col-md-6 col-12">
													<h6>Pengguna</h6>
													<div class="row">
														<div class="col-11" style="display:flex;flex-direction:row; gap:16px;background:#f2f2f2;border-radius:10px;margin-left:15px;padding:15px; ">
															<img  src="<?=base_url();?>assets_oncard/images/icons/user.webp" class="user-img image-profile" alt="user avatar">
															<h5 style="margin-top:7px;"><font class="data1" style="font-weight:900;">Loading...</font>
														<br/>NIS/NISN <font class="data2">---</font></h5>
														</div>
													</div>
													<h6 class="mt-4">Daftar Tagihan</h6>
													<table class="table mb-0 tabelsiswa" id="tabelPrint">
														<thead class="table-light">
															<tr>
																<th>Nama tagihan</th>
																<th>Nominal</th>
																<th class="text-end">Aksi</th>
															</tr>
														</thead>
														<tbody class="putListTagihanHere">
														</tbody>
													</table>
													
												</div>
												<div class="col-lg-6 col-md-6 col-12">
													<div class="card">
														<div class="card-body">
															<h4 style="font-weight:bolder;"><i class='bx bxs-shopping-bag-alt'></i> Keranjang</h4>
															<div class="row keranjangside">
																<div class="col-12">
																	<img src="https://static.vecteezy.com/system/resources/previews/016/026/442/original/empty-shopping-cart-concept-illustration-flat-design-eps10-modern-graphic-element-for-landing-page-empty-state-ui-infographic-icon-vector.jpg" alt="" style="width:50%; display:block; border-radius:15px;">
																</div>
															</div>
															<div class="row">
																<div class="col-6 putinfohere_2" style="background:#f2f2f2;border-radius:10px;padding:15px; ">
																
																</div>
																<div class="col-6">
																	<label for="" style="font-size:20px; font-weight:bold;">Cash diterima</label><br/>
																	<small>Pastikan uang yang diterima telah dihitung dengan benar. Dan harus cocok dengan total tagihan yang muncul.</small>
																<input type="text" id="uangDibayar" class="form-control mb-2 setTocurrency" 
																oninput="setValy(this.value);" 
																placeholder="Uang cash diterima (Rp)" maxlength="9" onkeydown="return isNumberKey(event);"/>
																</div>
															</div>
														</div>
														
													</div>
													
												</div>
											</div>
                                            
                                        </div>
                                    </div>
								</div>

							</div>
						</div>
						<div class="modal-footer" style="display:inline;min-height:100px;">
                            <div class="row">
                                <div class="col-7  text-start">
                                    
                                </div>
                                <div class="col-5 text-end">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                    <button type="button" class="btn btn-success" id="submitBtnNominal" onclick="procApplyUserToTagihan();">Simpan Data</button>
                                </div>
                            </div>
						</div>
					</div>
				</div>
			</div>

            <div class="modal fade" id="invoiceModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content" style="    background: transparent !important;
                        box-shadow: none !important;
                        border: none !important;
                    }">
                    
                    <div class="modal-body puttreee">
                        
                    </div>
                    <div class="modal-footer" style="border:none;">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="button" class="btn btn-primary" onclick="printInvoice()">
                        <i class="bx bx-printer"></i> Cetak
                        </button>
                    </div>
                    </div>
                </div>
            </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
		<script src="https://pawelgrzybek.github.io/siema/assets/siema.min.js"></script>

        <script type="text/javascript">
			
			let idsett;
			let modesett;
			let totaltagihan=0;
			let tagihanterbayar=0;
			let idsett_tagihan_user_id;
			let idsett_user_billed_id;

            let user_id_siswa ;
			let bea_admin = '';
			let bea_admin_final = 0;
			let totaltagihanconfirmation = '';
			
            let namaTertagih = '';

            let endPointGetDataSiswa = '<?= api_url_tagihan(); ?>api/payment/history-payment';
			let endPointGetDataSiswaSearch = '<?= api_url_tagihan(); ?>api/siswa/search?q=';


			let arraySelected = [];
			function isNumberKey(evt) {
                // Allow only numerical keys
                var charCode = (evt.which) ? evt.which : evt.keyCode;
                if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                    return false;
                }
                return true;
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

			function setValx(value) {
                // Ensure the value is a number and truncate to 8 characters
                let cleanedValue = value.replace(/\D/g, '').substring(0,9);
                document.getElementById('nominalTagihan').value = formatRupiah(cleanedValue);
            }
			function setValy(value) {
                // Ensure the value is a number and truncate to 8 characters
                let cleanedValue = value.replace(/\D/g, '').substring(0,11);
                document.getElementById('uangDibayar').value = formatRupiah(cleanedValue);
            }

			$(document).on('click', '.toggle-input-btn', function () {
				var currentRow = $(this).closest('tr'); // Get the current row

				if (currentRow.next().hasClass('input-row')) {
					currentRow.next().remove(); // Remove the input row if it exists
				} else {

					idsett = currentRow.data('value'); 
					idsett_user_billed_id = currentRow.data('userbilled'); 
					console.log(idsett);
					var newRow = $('<tr class="input-row"><td colspan="20"></td></tr>');

					var inputField = $('#input-template').html(); // Clone the template input field
					newRow.find('td').append('<div class="slide-input-container">' + inputField + '</div>');

					currentRow.after(newRow);

					var inputContainer = newRow.find('.slide-input-container');
					inputContainer.show(); // Display the container
					setTimeout(function () {
						inputContainer.find('.slide-input').addClass('show-slide'); // Start the slide animation
					}, 10); // Delay to allow rendering before sliding

					
					
				}
			});

            let tableColumnX = `<tr><td colspan="10" class="text-center">Loading...</td></tr>`;
            $('.putContentHereRiwayat').html(tableColumnX);


			$(document).ready(function () {
				getBeaAdmin();
				getTagihanList();

                $(document).on('click', '.show-detail-btn', function () {
					var currentRow = $(this).closest('tr');

					if (currentRow.next().hasClass('detail-row')) {
						currentRow.next().remove();
					} else {
						var rowValue = currentRow.data('value'); 

						idsett = currentRow.data('value'); 
						idsett_user_billed_id = currentRow.data('userbilled'); 
						
                        showLoading();

                        let mercusuar = '';
                
                        const save2 = async () => {
                            const posts2 = await axios.get('<?= api_url_tagihan(); ?>api/payment/history-payment-tagihan-user/'+idsett_user_billed_id+'/'+idsett, {
                                headers: {
                                    'Authorization': 'Bearer ' + localStorage.getItem('_token')
                                }
                            }).catch((err) => {
                                console.log(err.response);
                            });
                    
                            if (posts2.status == 200) {

                                mercusuar +=`<tr class="detail-row"><td colspan="10">
                                        <div class="row py-2" style="font-weight:bold;">
                                            <div class="col">ID</div>
                                            <div class="col">Tanggal Pembayaran</div>
                                            <div class="col">Jam Pembayaran</div>
                                            <div class="col">Nominal Penagihan</div>
                                            <div class="col">Terbayarkan</div>
                                            <div class="col">Sisa</div>
                                            <div class="col">Status</div>
                                            
                                        </div>

                                `;
                                let totaltagihan = 0;
								if(posts2.data.length==0){
									mercusuar += `<p class="text-center p-5">Belum ada pembayaran yang telah dilakukan.</p>`;
								}
                                posts2.data.map((mapping,i)=>{
                                    let mbx = mapping.jumlah_tagihan;
                                    let mby = mapping.jumlah_bayar;
                                    let mbz = mapping.jumlah_belum_dibayarkan;
                                    let stats = '';
                                    totaltagihan+=mbx;
                                    if(mapping.status_pembayaran=='lunas'){
                                        stats = `<font class="text-success">${mapping.status_pembayaran}</font>`;
                                    }else {
                                        stats = `<font class="text-danger">${mapping.status_pembayaran}</font>`;
                                    }
                                    mercusuar+=`
                                        <div class="row py-1">
                                            <div class="col" style="max-width: 100%; word-wrap: break-word; white-space: normal;">
                                            ${mapping.oncard_invoice}
                                            </div>

                                            <div class="col">${moment(mapping.created_at).format('dddd, DD-MM-YYYY')}</div>
                                            <div class="col">${moment(mapping.created_at).format('HH:mm:ss')}</div>
                                            <div class="col">Rp${formatRupiah(mbx.toString())}</div>
                                            <div class="col">Rp${formatRupiah(mby.toString())}</div>
                                            <div class="col">Rp${formatRupiah(mbz.toString())}</div>
                                            <div class="col">${stats}</div>
                                            
                                        </div>
                                    `;
                                });
                                mercusuar+=`</td></tr>`;

                                // mercusuar +=`<tr class="detail-row"><td colspan="6">
                                //         <div class="row" style="font-weight:bold; border-radius:20px; background:#f2f2f2; padding-top:15px; margin-top:-10px;padding-bottom:15px; border-top-left-radius:0px; border-top-right-radius:0px; margin-bottom:25px;">
                                    
                                //             <div class="col-1"></div>
                                //             <div class="col-3">Total</div>
                                //             <div class="col-3">Rp${formatRupiah(totaltagihan.toString())}</div>
                                //             <div class="col-3"></div>
                                //             <div class="col-1"></div>
                                //         </div>

                                // `;

                                hideLoading();

                                currentRow.after(mercusuar);
                                
                            }
                        }
                        save2();

                        // Insert the detail row right after the clicked row
                        
					}
				});

            });


			function getTagihanList(){
				let num = 1;
				let tableColumn = '';

				totaltagihan = 0;
				tagihanterbayar = 0;
			
				tableColumn += `<tr><td colspan="20" class="text-center">Loading....</td></tr>`;
				$('.putContentHere').html(tableColumn);

				var progressBar = document.getElementById('progressAll');
				var newValue = 0;
				progressBar.setAttribute('aria-valuenow', newValue);
				progressBar.style.width = newValue + '%';
				progressBar.innerHTML = newValue + '%';
				
				const save2 = async () => {
					const posts2 = await axios.get('<?= api_url_tagihan(); ?>api/tagihan-siswa/oncard-id/<?=$idJenisTagihan;?>', {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token'),
                            'no-paginate' : true
						}
					}).catch((err) => {
						console.log(err.response);
					});
			
					if (posts2.status == 200) {

						tableColumn='';
						
						if(posts2.data.data.length==0){
							tableColumn=`<tr><td colspan="10" class="text-center p-5">Tidak ada data.</td></tr>`;
						}

						tableColumnModalDialog = '';

						posts2.data.data.map((mapping,i)=>{

							
							let mmm = parseInt(mapping.jumlah_belum_dibayarkan);
							let mmn = parseInt(mapping.jumlah_dibayarkan);
							let mmo = parseInt(mapping.jumlah_tagihan);

                            $('.data1').html(mapping.siswa.nama);
                            $('.data2').html(mapping.siswa.nis);

							idsett_user_billed_id = mapping.siswa.user_id;

							totaltagihan+=mmo;
							tagihanterbayar+=mmn;

							let percentageProgress = (mmn/mmo)*100;

							if(mmo==0){
								percentageProgress = 0;
							}

							percentageProgress = Math.round(percentageProgress);
							let statusString = '';

							if(mapping.status_pembayaran=='lunas'){
								statusString =`<div class="badge bg-success" style="text-transform:uppercase">${mapping.status_pembayaran}</div>`;
							}else {
								statusString =`<div class="badge bg-danger" style="text-transform:uppercase">${mapping.status_pembayaran}</div>`;
							}
							tableColumn+=`
								<tr data-value="${mapping.id}" data-userbilled="${mapping.siswa.user_id}">
									<td><button class="btn btn-warning btn-sm show-detail-btn me-3" style="padding:5px;padding-right: unset;"> <i class="bx bx-chevron-down"></i> </button> ${num++}</td>
									<td>${mapping?.nama_tagihan??'-'}
									<br/>
									<i>${mapping.jenis_tagihan??'-'}</i></td>
									<td>${moment(mapping.tanggal_mulai_tagihan).format('dddd, DD-MM-YYYY')}</td>
									<td>${moment(mapping.tanggal_jatuh_tempo).format('dddd, DD-MM-YYYY')}</td>
									<td>Rp${formatRupiah(mmo.toString())}</td>
									<td>Rp${formatRupiah(mmn.toString())}</td>
									<td>Rp${formatRupiah(mmm.toString())}</td>
									<td>
									<div class="progress">
									<div class="progress-bar bg-primary" role="progressbar" style="width: ${percentageProgress}%;" aria-valuenow="${percentageProgress}" aria-valuemin="0" aria-valuemax="100">${percentageProgress}%</div>
									</div>
									</td>
									<td>
									${statusString}
									</td>
									
							`; 

							// <td class="text-end">
							// 	<button type="button" class="btn btn-sm btn-primary toggle-input-btn" id="updateData"><i class="bx bx-pencil"></i> Bayar</button>
							// </td>

							if(mapping.status_pembayaran!='lunas'){
								tableColumnModalDialog+=`
									<tr>
										<td><b>${mapping?.nama_tagihan??'-'}</b></td>
										<td>Rp${formatRupiah(mmm.toString())}</td>
										<td  class="text-end">
										<button 
                                        type="button" 
                                        class="btn${mapping.id} btn btn-sm btn-primary ps-2 pe-1" 
                                        onclick="addToQueue('${mapping.id}', '${mapping.nama_tagihan ? mapping.nama_tagihan.replace(/'/g, "\\'") : ''}', '${mmm}');"
                                        id="seeDetails"
                                        >
                                        <i class="bx bx-right-arrow-alt"></i>
                                        </button>
										</td>
									</tr>
								`;
							}

							$('.active').html('Daftar Tagihan '+mapping.siswa.nama+" (NIS : "+mapping.siswa.nis+")");
                            namaTertagih = mapping.siswa.nama;
                            user_id_siswa = mapping.siswa.user_id;

                            showData(endPointGetDataSiswa,user_id_siswa);
						});

						$('.putContentHere').html(tableColumn);
						$('.putListTagihanHere').html(tableColumnModalDialog);

						$('#totaltagihan').html("Rp"+formatRupiah(totaltagihan.toString()));
						$('#tagihanterbayar').html("Rp"+formatRupiah(tagihanterbayar.toString()));

						newValue = (tagihanterbayar/totaltagihan)*100;
						newValue = newValue.toFixed(1);
						progressBar.setAttribute('aria-valuenow', newValue);
						progressBar.style.width = newValue + '%';
						progressBar.innerHTML = newValue + '%';

						// createPaginations(posts2.data.data, "siswa-pagination-container", "siswa-pagination-details", "getTagihanList");
					}
				}
				save2();
			}
			
			
			function getBeaAdmin(){
				
				const save2 = async () => {
					const posts2 = await axios.get('<?= api_url_tagihan(); ?>api/config/beadmin', {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {
						console.log(err.response);
					});
			
					if (posts2.status == 200) {
						bea_admin = posts2.data;
					}
				}
				save2();
			}


			function addToQueue(id_user, nama,nominal) {
				// Check if id_user already exists in the array
				const exists = arraySelected.some(item => item.tagihan_id === id_user);

				
				if (exists) {
					Toastify({
						text: "Data ini sudah ada dalam daftar yang akan dibayarkan.",
						duration: 3000,
						close: true,
						gravity: "top",
						position: "right",
						className: "errorMessage",

					}).showToast();
					return; // Exit the function if the user ID exists
				}
				
				$('.btn'+id_user).attr('class',`btn${id_user} btn btn-sm btn-secondary ps-2 pe-1 disabled`);

				// Add to the queue if the user ID is new
				arraySelected.push({
					'tagihan_id': id_user,
					'nama': nama,
					'nominal': nominal,
				});

				let noms = 0;
				let urutan = 0;
				let html = '<table class="table">';
				arraySelected.forEach(item => {
					html +=`
						<tr>
							<td>
							<button type="button" class="btn_sentout_${id_user} btn btn-sm btn-danger ps-2 pe-1" onclick="removeFromQueue('${id_user}');"  id="seeDetails"><i class="bx bx-left-arrow-alt"></i></button>
							</td>
							<td>${item.nama}</td>
							<td id="nominal_td_${item.tagihan_id}" class="text-end">
								Rp${formatRupiah(item.nominal)} 
								<i class="bx bx-edit ms-3" onclick="editNominal('${item.tagihan_id}','${item.nominal}');"></i>
							</td>
						</tr>
					`;
					noms += parseInt(item.nominal);

					if(urutan<1){
						urutan++;
					}
					console.log(urutan);
				});

				html += '</table>';

				$('.keranjangside').html(html);
				console.log(arraySelected);

				bea_admin_final = bea_admin*urutan;

				let nomstotal = parseInt(noms+bea_admin_final);
				totaltagihanconfirmation = nomstotal;

				let newhtml = `<font>${arraySelected.length} tagihan terpilih.</font><br/>
					<h4 style="font-weight:bolder;">Rp${formatRupiah(noms.toString())}</h4>
					<p class="text-success"><b>+Rp${formatRupiah(bea_admin_final.toString())} untuk biaya aplikasi</b></p>

					<hr/>
					<p>Total tagihan</p>
					<h3 style="font-weight:bolder;">Rp${formatRupiah(nomstotal.toString())}</h3>
				`;
				$('.putinfohere_2').html(newhtml);
			}

			function editNominal(tagihan_id, nominal) {
				// Get the <td> element where the nominal is displayed
				const nominalTd = document.getElementById(`nominal_td_${tagihan_id}`);
				
				// Replace the content with an input field
				nominalTd.innerHTML = `
					Rp <input type="text" id="input_nominal_${tagihan_id}" value="${nominal}" style="width: 100px;" />
					<button type="button" class="btn btn-sm btn-success ms-2" onclick="saveNominal('${tagihan_id}')">Save</button>
					<button type="button" class="btn btn-sm btn-secondary ms-1" onclick="cancelEdit('${tagihan_id}', '${nominal}')">Cancel</button>
				`;
			}

			function saveNominal(tagihan_id) {
				// Get the new value from the input field
				const newNominal = document.getElementById(`input_nominal_${tagihan_id}`).value;

				// Perform any validation or saving operation here (e.g., sending to backend via AJAX)

				// After saving, update the <td> with the new nominal value
				const nominalTd = document.getElementById(`nominal_td_${tagihan_id}`);
				nominalTd.innerHTML = `
					Rp${formatRupiah(newNominal)} 
					<i class="bx bx-edit ms-3" onclick="editNominal('${tagihan_id}', '${newNominal}');"></i>
				`;

				let noms = 0;

				// Update or push the updated values to the array
				const index = arraySelected.findIndex(item => item.tagihan_id === tagihan_id);
				if (index > -1) {
					// Update existing entry in arraySelected
					arraySelected[index].nominal = newNominal;
				} else {
					// Push a new entry into arraySelected
					arraySelected.push({
						'tagihan_id': tagihan_id,
						'nama': nama,
						'nominal': newNominal
					});
				}

				let urutan = 0;

				arraySelected.forEach(item => {
					noms += parseInt(item.nominal);

					if(urutan<1){
						urutan++;
					}
				});

				bea_admin_final = bea_admin*urutan;

				let nomstotal = parseInt(noms+bea_admin_final);
				
				totaltagihanconfirmation = nomstotal;

				let newhtml = `<font>${arraySelected.length} tagihan terpilih.</font><br/>
					<h4 style="font-weight:bolder;">Rp${formatRupiah(noms.toString())}</h4>
					<p class="text-success"><b>+Rp${formatRupiah(bea_admin_final.toString())} untuk biaya aplikasi</b></p>

					<hr/>
					<p>Total tagihan</p>
					<h3 style="font-weight:bolder;">Rp${formatRupiah(nomstotal.toString())}</h3>
				`;

				$('.putinfohere_2').html(newhtml);

				console.log(arraySelected); // For debugging to see the updated array
			}

			function removeFromQueue(id_user){
                arraySelected = arraySelected.filter(item => item.tagihan_id !== id_user);

				let noms = 0;
				let urutan = 0;
                let html = '<table class="table">';
                arraySelected.forEach(item => {
                    html +=`
                        <tr>
                            <td>
                            <button type="button" class="btn_sentout_${item.tagihan_id} btn btn-sm btn-danger ps-2 pe-1" onclick="removeFromQueue('${item.tagihan_id}');"  id="seeDetails"><i class="bx bx-left-arrow-alt"></i></button>
                            </td>
                            <td>${item.nama}</td>
							<td id="nominal_td_${item.tagihan_id}" class="text-end">
								Rp${formatRupiah(item.nominal)} 
								<i class="bx bx-edit ms-3" onclick="editNominal('${item.tagihan_id}','${item.nominal}');"></i>
							</td>
                        </tr>
                    `;
					noms += parseInt(item.nominal);

					if(urutan<1){
						urutan++;
					}
                });

				html +='</table>';

                $('.keranjangside').html(html);
				
				bea_admin_final = bea_admin*urutan;

				let nomstotal = parseInt(noms+bea_admin_final);

				totaltagihanconfirmation = nomstotal;

                $('.btn'+id_user).attr('class',`btn${id_user} btn btn-sm btn-primary ps-2 pe-1`);

                let newhtml = `<font>${arraySelected.length} tagihan terpilih.</font><br/>
					<h4 style="font-weight:bolder;">Rp${formatRupiah(noms.toString())}</h4>
					<p class="text-success"><b>+Rp${formatRupiah(bea_admin_final.toString())} untuk biaya aplikasi</b></p>

					<hr/>
					<p>Total tagihan</p>
					<h3 style="font-weight:bolder;">Rp${formatRupiah(nomstotal.toString())}</h3>
				`;


                $('.putinfohere_2').html(newhtml);
            }

			function cancelEdit(tagihan_id, originalNominal) {
				// Restore the original nominal value if the user cancels the edit
				const nominalTd = document.getElementById(`nominal_td_${tagihan_id}`);
				nominalTd.innerHTML = `
					Rp${formatRupiah(originalNominal)} 
					<i class="bx bx-edit ms-3" onclick="editNominal('${tagihan_id}', '${originalNominal}');"></i>
				`;
			}
			
			function goToMultiPayment(idSISWA){

				$('#modalMultiPayment').modal('toggle');
				return false;

				// let num = 1;
				// let tableColumn = '';

				// totaltagihan = 0;
				// tagihanterbayar = 0;
			
				// tableColumn += `<tr><td colspan="20" class="text-center">Loading....</td></tr>`;
				// $('.putContentHere').html(tableColumn);

				// var progressBar = document.getElementById('progressAll');
				// var newValue = 0;
				// progressBar.setAttribute('aria-valuenow', newValue);
				// progressBar.style.width = newValue + '%';
				// progressBar.innerHTML = newValue + '%';
				
				// const save2 = async () => {
				// 	const posts2 = await axios.get('<?= api_url_tagihan(); ?>api/tagihan-siswa/nis/'+idSISWA, {
				// 		headers: {
				// 			'Authorization': 'Bearer ' + localStorage.getItem('_token')
				// 		}
				// 	}).catch((err) => {
				// 		console.log(err.response);
				// 	});
			
				// 	if (posts2.status == 200) {

				// 		tableColumn='';
						
				// 		if(posts2.data.data.data.length==0){
				// 			tableColumn=`<tr><td colspan="10" class="text-center p-5">Tidak ada data.</td></tr>`;
				// 		}

				// 		let m1;
				// 		let m2;
				// 		posts2.data.data.data.map((mapping,i)=>{
				// 			m1='';
				// 		});
						
				// 		$('.putContentHere').html(tableColumn);
				// 		$('#totaltagihan').html("Rp"+formatRupiah(totaltagihan.toString()));
				// 		$('#tagihanterbayar').html("Rp"+formatRupiah(tagihanterbayar.toString()));

				// 		newValue = (tagihanterbayar/totaltagihan)*100;
				// 		newValue = newValue.toFixed(1);
				// 		progressBar.setAttribute('aria-valuenow', newValue);
				// 		progressBar.style.width = newValue + '%';
				// 		progressBar.innerHTML = newValue + '%';

				// 		createPaginations(posts2.data.data, "siswa-pagination-container", "siswa-pagination-details", "getTagihanList");
				// 	}
				// }
				// save2();
			}

			function showDetails(str){

				$('#modalViewDetails').modal('toggle');

				$('.puter').html('<div class="row"><div class="col-12 text-center">Loading...</div></div>');

				const save2 = async () => {
					const posts2 = await axios.get('<?= api_url_tagihan(); ?>api/master/jenis-tagihan/'+str, {
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
							<p>
								<small>Value</small><br/>
								<code>${posts2.data.data.value}</code>
							</p>
							<p>
								<small>Tanggal Terbuat</small><br/>
								${moment(posts2.data.data.created_at).format('dddd, DD-MM-YYYY')}
							</p>
							<p>
								<small>Jam Terbuat</small><br/>
								${moment(posts2.data.data.created_at).format('HH:mm:ss')} WIB
							</p>
						`; 
						$('.puter').html(tableColumn);
						$('.titledetail').html(posts2.data.data.name);

						
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

			function procSubmitTagihanBayarByHost(){
				
				showLoading();

				let m5val = $('#nominalTagihan').val();
				m5val = m5val.split('.').join("");

				if(m5val=='' || parseInt(m5val=='') < 1000){
					Toastify({
							text: 'Nominal pembayaran harus diisi terlebih dahulu, atau lebih dari Rp1.000.',
							duration: 3000,
							close: true,
							gravity: "top",
							position: "right",
							className: "errorMessage",

						}).showToast();

						hideLoading();

					return false;
				}
				
				var form_data = new FormData();

				form_data.append('jumlah_dibayarkan', m5val);
				form_data.append('user_pembayaran_id', '');
				form_data.append('user_billed_id', idsett_user_billed_id);
				form_data.append('metode_pembayaran', 'cash');
				form_data.append('tagihan_user_id', idsett);

	


				const save = async (str) => {
					const posts = await axios.post('<?= api_url_tagihan(); ?>api/payment/cash',form_data, {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token'),
							'oncard_token' : localStorage.getItem('_token_oncard')
						}
					}).catch((err) => {
						Toastify({
							text: 'Sistem tidak dapat memproses permintaan ini.',
							duration: 3000,
							close: true,
							gravity: "top",
							position: "right",
							className: "errorMessage",

						}).showToast();
						hideLoading();
					});

					if (posts.status == 200||posts.status == 201) {
						Toastify({
							text: 'Pembayaran berhasil!',
							duration: 3000,
							close: true,
							gravity: "top",
							position: "right",
							className: "successMessage",

						}).showToast();
						$('#modalSetTagihan').modal('toggle');
						getTagihanList();

						$('#submitBtnTagihan').html('Simpan');
						$('#submitBtnTagihan').attr('disabled', false);
						$('#submitBtnTagihan').css('cursor', 'pointer');
					} else {
						Toastify({
							text: posts.data.message,
							duration: 3000,
							close: true,
							gravity: "top",
							position: "right",
							className: "errorMessage",

						}).showToast();
					}
					hideLoading();
				}
				save(form_data);
			}

			function procApplyUserToTagihan(){
                Swal.fire({
                    title: "Anda yakin ingin membayarkan tagihan ini secara cash?",
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: "Ya, Lakukan Sekarang",
                    denyButtonText: `Nanti saja`
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {

						let inputbayar = $('#uangDibayar').val();
						let toss = totaltagihanconfirmation.toString();
						toss = toss.split('.').join("");
						inputbayar = inputbayar.split('.').join("");

						let arraytoSend = [];

						arraySelected.forEach(item => {
							arraytoSend.push({
								'tagihan_user_id':item.tagihan_id,
								'nominal':item.nominal
							})
						});

						
						if(parseInt(totaltagihanconfirmation)!=parseInt(inputbayar)){
							Swal.fire("Uang diterima tidak sama dengan tagihan yang muncul!", "", "info");
							return false;
						}

                        showLoading();
                        
                        var form_data = new FormData();

                        const userIds = arraySelected.map(item => item.user_id);

                        console.log(userIds);

                        form_data.append('keranjang_tagihan', JSON.stringify(arraytoSend));
                        // userIds.forEach(userIds => form_data.append('user_siswa_id[]', userIds)); // Append each ID separately
                        form_data.append('user_billed_id', idsett_user_billed_id);
                        form_data.append('jumlah_dibayarkan', totaltagihanconfirmation);
                        form_data.append('user_pembayaran_id', '');


						// for (let [key, value] of form_data.entries()) {
						// 	console.log(key + ': ' + value);
						// }
						// return false;

						const save = async (form_data) => {
                            const posts = await axios.post('<?= api_url_tagihan(); ?>api/payment/cash-multiple',form_data, {
                                headers: {
                                    'Authorization': 'Bearer ' + localStorage.getItem('_token'),
									'oncard_token' : localStorage.getItem('_token_oncard')
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

                                    hideLoading();
                                }
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
                                location.reload();
                                
                                hideLoading();
                            } else {

                            }
                        }
                        save(form_data);
                    } else if (result.isDenied) {
                        Swal.fire("Proses dibatalkan", "", "info");
                    }
                });
                
            }



            // NEW #################################################################

            function showData(params,user_id) {
                    let tableColumn = '';
                    let num = 0;

                    // Add date filter HTML if it doesn't exist
                    if ($('#filterTanggal').length === 0) {
                        const filterHTML = `
                            <div class="col-md-12 mb-3">
                                <input type="date" id="filterTanggal" class="form-control form-control-sm">
                            </div>
                        `;
                        const filterXX = `<div class="col-md-12 mb-3 py-3">
                                <font id="counted" class="alert alert-primary">0</font>
                                <font id="counted2" class="alert alert-success">0</font>
                                <font id="counted3" class="alert alert-info">0</font>
                            </div>
                            <div class="col-md-12 mb-3" id="paymentSummary" style="max-height:100%;overflow-y:scroll;"></div>`;
                        $('.filter-container').prepend(filterHTML);
                        $('.filter-container2').prepend(filterXX);
                    }

                    tableColumn += `<tr><td colspan="10" class="text-center">Loading...</td></tr>`;
                    $('.putContentHereRiwayat').html(tableColumn);

                    const save2 = async () => {
                        const posts2 = await axios.get(params+"/"+user_id, {
                            headers: {
                                'Authorization': 'Bearer ' + localStorage.getItem('_token'),
                                'no-pagination': true
                            }
                        }).catch((err) => {
                            console.log(err.response);
                        });

                        if (posts2?.status === 200) {
                            tableColumn = '';
                            const selectedDate = $('#filterTanggal').val();
                            
                            const grouped = {};
                            const paymentSummary = {};
                            let totalCash = 0;
                            let totalTransfer = 0;
                            let totalStudents = 0;
                            let totalCashPayments = 0;
                            let totalTransferPayments = 0;

                            const sortedData = [...posts2.data].sort((a, b) => {
                            return new Date(b.created_at) - new Date(a.created_at); // DESC (newest first)
                            });

                            // 2. Then process the sorted data
                            let mercusuar = '';
                            
                            sortedData.forEach((item) => {

                                const itemDate = moment(item.created_at).format('YYYY-MM-DD');
                                if (!selectedDate || itemDate === selectedDate) {
                                    const invoice = item.oncard_invoice;
                                    if (!grouped[invoice]) {
                                        grouped[invoice] = [];
                                    }
                                    grouped[invoice].push(item);
                                    
                                    // Build payment summary
                                    const studentName = item.tagihan_user?.user?.name || 'Unknown';
                                    const isTransfer = ['BILLER-IPAYMU', 'BILLER-BRKS-MOBILE'].some(biller => item.oncard_invoice.includes(biller));

                                    if (!paymentSummary[studentName]) {
                                        paymentSummary[studentName] = {
                                            count: 0,
                                            total: 0,
                                            cashCount: 0,
                                            cashTotal: 0,
                                            transferCount: 0,
                                            transferTotal: 0,
                                            nis: item.tagihan_user?.user?.siswas?.nis || 'N/A'
                                        };
                                        totalStudents++;
                                    }
                                    
                                    paymentSummary[studentName].count++;
                                    paymentSummary[studentName].total += item.jumlah_bayar;

                                    if (isTransfer) {
                                        paymentSummary[studentName].transferCount++;
                                        paymentSummary[studentName].transferTotal += item.jumlah_bayar;
                                        totalTransfer++;
                                        totalTransferPayments += item.jumlah_bayar;
                                    } else {
                                        paymentSummary[studentName].cashCount++;
                                        paymentSummary[studentName].cashTotal += item.jumlah_bayar;
                                        totalCash++;
                                        totalCashPayments += item.jumlah_bayar;
                                    }
                                }

                            });

                            // Display payment summary
                            let summaryHTML = `<div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Rangkuman Pembayaran</h5>
                                </div>
                                <div class="card-body">
                                <button class="btn btn-sm btn-outline-success me-2 mb-3" onclick="saveToExcel('tablesiswa2');" style="border-radius:0px;"><i class="bx bxs-file-export"></i> Export Excel</button>
                                    <div class="table-responsive">
                                        <table id="paymentSummaryTable" class="table table-sm table-hover tablesiswa2">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>NIS</th>
                                                    <th>Total Pembayaran</th>
                                                    <th>Cash (x)</th>
                                                    <th>Cash (Rp)</th>
                                                    <th>Transfer (x)</th>
                                                    <th>Transfer (Rp)</th>
                                                    <th>Total (Rp)</th>
                                                </tr>
                                            </thead>
                                            <tbody>`;

                            let summaryNum = 1;
                            for (const name in paymentSummary) {
                                const student = paymentSummary[name];
                                summaryHTML += `
                                    <tr>
                                        <td>${summaryNum++}</td>
                                        <td>${student.nis}</td>
                                        <td >${student.count}x</td>
                                        <td style="background:#d1e7dd">${student.cashCount}x</td>
                                        <td style="background:#d1e7dd">${formatRupiah(student.cashTotal.toString())}</td>
                                        <td style="background:#cff4fc">${student.transferCount}x</td>
                                        <td style="background:#cff4fc">${formatRupiah(student.transferTotal.toString())}</td>
                                        <td><strong>${formatRupiah(student.total.toString())}</strong></td>
                                    </tr>`;
                            }

                            summaryHTML += `</tbody></table></div></div></div>`;
                            $('#paymentSummary').html(summaryHTML);

                            // Initialize DataTable after the table is rendered
                            $(document).ready(function() {
                                $('#paymentSummaryTable').DataTable({
                                    dom: '<"top"f>rt<"bottom"lip><"clear">',
                                    pageLength: 10,
                                    lengthMenu: [
                                        [10, 25, 50, 100, -1],
                                        [10, 25, 50, 100, "Semua"]
                                    ],
                                    order: [[0, 'asc']],
                                    language: {
                                        search: "Cari:",
                                        lengthMenu: "Tampilkan _MENU_ data per halaman",
                                        info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                                        paginate: {
                                            first: "Pertama",
                                            last: "Terakhir",
                                            next: "Selanjutnya",
                                            previous: "Sebelumnya"
                                        }
                                    },
                                    initComplete: function() {
                                        // Add totals row programmatically
                                        const api = this.api();
                                        const footerRow = `
                                            <tr class="table-primary">
                                                <td colspan="3"><strong>TOTAL</strong></td>
                                                <td><strong>${totalCash + totalTransfer}x</strong></td>
                                                <td><strong>${totalCash}x</strong></td>
                                                <td><strong>${formatRupiah(totalCashPayments.toString())}</strong></td>
                                                <td><strong>${totalTransfer}x</strong></td>
                                                <td><strong>${formatRupiah(totalTransferPayments.toString())}</strong></td>
                                                <td><strong>${formatRupiah((totalCashPayments + totalTransferPayments).toString())}</strong></td>
                                            </tr>`;
                                        
                                        $(api.table().footer()).html(footerRow);
                                    }
                                });
                            });
                            $('#counted').html(totalStudents + " user membayar");
                            $('#counted2').html(totalCash + " pembayaran cash <b>(" + formatRupiah(totalCashPayments.toString()) + ")</b>");
                            $('#counted3').html(totalTransfer + " pembayaran transfer <b>(" + formatRupiah(totalTransferPayments.toString()) + ")</b>");

                            $('.cash_t').html(formatRupiah(totalCash.toString()));
                            $('.transfer_t').html(formatRupiah(totalTransfer.toString()));

                            if (Object.keys(grouped).length === 0) {
                                tableColumn += `<tr><td colspan="10" class="text-center">Tidak ada data.</td></tr>`;
                                $('.putContentHereRiwayat').html(tableColumn);
                                return;
                            }


                            // showRecap();
                            
                            for (const invoice in grouped) {
                                const group = grouped[invoice];
                                const rowspan = group.length;

                                group.forEach((mapping, index) => {
                                    num++;

                                    const invoiceData = {
                                        oncard_invoice: mapping.oncard_invoice || '',
                                        status_pembayaran: mapping.status_pembayaran || '',
                                        created_at: mapping.created_at || '',
                                        tanggal_jatuh_tempo: mapping.tanggal_jatuh_tempo || '',
                                        nama_tagihan: mapping.nama_tagihan || '',
                                        jumlah_tagihan: mapping.jumlah_tagihan || 0,
                                        jumlah_diskon: mapping.jumlah_diskon || 0,
                                        jumlah_dibayarkan: mapping.jumlah_bayar || 0,
                                        jumlah_belum_dibayarkan: mapping.jumlah_belum_dibayarkan || 0,
                                        metode_pembayaran: mapping.metode_pembayaran || '',
                                        uuid: mapping.uuid || '',
                                        tanggal_pembayaran: mapping.tanggal_pembayaran || '',
                                        user: {
                                            name: mapping.tagihan_user?.user?.name || '',
                                            siswas: {
                                                nis: mapping.tagihan_user?.user?.siswas?.nis || ''
                                            }
                                        },
                                        tagihan: {
                                            jenis_nominal_data: {
                                                name: mapping.tagihan?.jenis_nominal_data?.name || ''
                                            }
                                        }
                                    };

                                    const safeInvoiceData = JSON.stringify(invoiceData)
                                        .replace(/"/g, '&quot;')
                                        .replace(/'/g, '&apos;');
                                    
                                    tableColumn += `<tr>`;

                                    // Invoice cell (only on first row of group)
                                    if (index === 0) {
                                        console.log(rowspan);
                                        tableColumn += `
                                            <td rowspan="${rowspan}" style="${rowspan>1?'background:#f2f2f2;':''}">
                                                <div class="d-flex align-items-center" data-full-text="${mapping.oncard_invoice}">
                                                    <h6 class="mb-0 font-14"><span class="text-container" style="font-size:10px;">${mapping.oncard_invoice}</span></h6>
                                                </div>
                                                <div><small class="text-muted">${moment(mapping.created_at).format('HH:mm, DD-MM-YYYY')}</small></div>
                                                ${rowspan>1?'<div><small class="badge badge-sm bg-secondary">Multipayment</small></div>':''}
                                            </td>
                                        `;
                                    }
                                    
                                    tableColumn += `
                                        <td>
                                            ${
                                                ['BILLER-IPAYMU', 'BILLER-BRKS-MOBILE'].some(biller => mapping.oncard_invoice.includes(biller))
                                                    ? '<div class="badge bg-info">TRANSFER</div>' 
                                                    : '<div class="badge bg-success">CASH</div>'
                                            }
                                        </td>

                                        <td>${mapping.nama_tagihan}</td>
                                        <td style="background:#e4fff6b8 !important;color:black; font-weight:bold;">
                                            ${formatRupiah(mapping.jumlah_bayar.toString())}
                                        </td>
                                        <td>${formatRupiah(mapping.jumlah_tagihan.toString())}</td>
                                        <td>${formatRupiah(mapping.jumlah_dibayarkan.toString())}</td>
                                        <td>${formatRupiah(mapping.jumlah_belum_dibayarkan.toString())}</td>
                                        <td style="text-transform:capitalize;">${mapping.status_pembayaran}</td>
                                        <td class="text-end">
                                            
                                            <button type="button" class="btn btn-sm btn-outline-primary btn-issue-invoice" data-invoice='${safeInvoiceData}'>
                                                <i class="bx bx-file"></i> Terbitkan Invoice
                                            </button>
                                        </td>
                                    </tr>`;
                                });
                            }

                        // Modify the click handler for the invoice button
                            $(document).on('click', '.btn-issue-invoice', function () {
                                try {
                                    const rawData = $(this).attr('data-invoice');
                                    const unescapedData = rawData.replace(/&quot;/g, '"').replace(/&apos;/g, "'");
                                    const invoiceData = JSON.parse(unescapedData);
                                    
                                    // Get all rows with the same invoice number
                                    const invoiceNumber = invoiceData.oncard_invoice;
                                    const allInvoiceData = [];
                                    
                                    // Find all rows with the same invoice number
                                    $('.btn-issue-invoice').each(function() {
                                        const rowData = JSON.parse($(this).attr('data-invoice').replace(/&quot;/g, '"').replace(/&apos;/g, "'"));
                                        if (rowData.oncard_invoice === invoiceNumber) {
                                            allInvoiceData.push(rowData);
                                        }
                                    });
                                    
                                    // Show modal with all grouped data
                                    showInvoiceModal(allInvoiceData.length > 1 ? allInvoiceData : invoiceData);
                                } catch (e) {
                                    console.error("Error processing invoice data:", e);
                                    alert("Gagal memuat data invoice. Silakan coba lagi.");
                                }
                            });


                            $('.putContentHereRiwayat').html(tableColumn);
                            createPaginations(posts2.data, "siswa-pagination-container", "siswa-pagination-details", "showData");
                        }
                    };

                                // Add change handler for date filter
                    $('#filterTanggal').off('change').on('change', function() {
                        showData(params); // Reload data with date filter
                    });


                save2();
            }

            
			
           
            // Updated showInvoiceModal function
            function showInvoiceModal(data) {
                // Create invoice HTML using the data
                const invoiceHTML = generateInvoiceHTML(data);

                $('.puttreee').html(invoiceHTML);

                // Show modal
                $('#invoiceModal').modal('show');
                
                // Remove modal when closed
                $('#invoiceModal').on('hidden.bs.modal', function () {
                    $(this).find('.modal-body').empty();
                });
            }


        // Updated generateInvoiceHTML function
        function generateInvoiceHTML(data) {
            let mxu = $('.box10val').text();
            let totalAmount = 0;
            let isGrouped = Array.isArray(data);
            let firstItem = isGrouped ? data[0] : data;
            
            // Create payment items list
            let paymentItems = '';
            if (isGrouped) {
                data.forEach((item, index) => {
                    totalAmount += item.jumlah_dibayarkan || 0;
                    paymentItems += `
                        <tr>
                            <td>${index + 1}</td>
                            <td>${item.nama_tagihan || 'Tidak tercantum'}</td>
                            <td>${moment(item.created_at).format('DD MMMM YYYY')}</td>
                            <td>${formatRupiah(item.jumlah_dibayarkan.toString())}</td>
                        </tr>
                    `;
                });
            } else {
                totalAmount = data.jumlah_dibayarkan || 0;
                paymentItems = `
                    <tr>
                        <td>1</td>
                        <td>${data.nama_tagihan || 'Tidak tercantum'}</td>
                        <td>${moment(data.created_at).format('DD MMMM YYYY')}</td>
                        <td>${formatRupiah(data.jumlah_dibayarkan.toString())}</td>
                    </tr>
                `;
            }

            return `
            <style>
                    /* Gaya Kuitansi Indonesia */
                    body {
                        font-family: 'Times New Roman', serif;
                        background-color: #f9f9f9;
                        padding: 20px;
                    }
                    .kuitansi-wrapper {
                        max-width: 800px;
                        margin: 0 auto;
                        background: white;
                        padding: 30px;
                        border: 1px solid #ddd;
                        box-shadow: 0 0 10px rgba(0,0,0,0.1);
                    }
                    .kop-kuitansi {
                        text-align: center;
                        border-bottom: 3px double #333;
                        padding-bottom: 15px;
                        margin-bottom: 20px;
                    }
                    .kop-kuitansi h1 {
                        font-size: 24px;
                        margin-bottom: 5px;
                        text-decoration: underline;
                    }
                    .kop-kuitansi h2 {
                        font-size: 18px;
                        margin: 5px 0;
                    }
                    .info-transaksi {
                        margin: 25px 0;
                    }
                    .info-row {
                        display: flex;
                        margin-bottom: 8px;
                    }
                    .info-label {
                        width: 180px;
                        font-weight: bold;
                    }
                    .nominal-box {
                        border: 2px solid #000;
                        padding: 15px;
                        text-align: center;
                        margin: 25px 0;
                    }
                    .nominal-angka {
                        font-size: 22px;
                        font-weight: bold;
                        margin-bottom: 5px;
                    }
                    .nominal-terbilang {
                        font-size: 16px;
                        text-transform: capitalize;
                    }
                    .footer-kuitansi {
                        display: flex;
                        justify-content: space-between;
                        margin-top: 60px;
                    }
                    .ttd-area {
                        text-align: center;
                    }
                    .ttd-placeholder {
                        height: 80px;
                        margin: 15px 0;
                        border-bottom: 1px solid #000;
                    }
                    .no-kuitansi {
                        text-align: right;
                        font-style: italic;
                        margin-bottom: 10px;
                    }
                    .payment-items {
                        width: 100%;
                        border-collapse: collapse;
                        margin: 20px 0;
                    }
                    .payment-items th, .payment-items td {
                        border: 1px solid #ddd;
                        padding: 8px;
                        text-align: left;
                    }
                    .payment-items th {
                        background-color: #f2f2f2;
                    }
                    .total-row {
                        font-weight: bold;
                        background-color: #f9f9f9;
                    }
                </style>
                <div class="kuitansi-wrapper invoice-container" id="kuitansi-content">
                    <div class="kop-kuitansi">
                        <img src="${imgUrlX}" style="width:60px; height:auto; display:block; margin:auto;position:absolute; border-radius:10px;"/>
                        <h1>KUITANSI</h1>
                        <h2>${instansiNameX}</h2>
                        <p style="max-width:450px;margin:auto;">${mxu}</p>
                    </div>

                    <div class="no-kuitansi">
                        No: ${firstItem.oncard_invoice}
                    </div>

                    <div class="info-transaksi">
                        <div class="info-row">
                            <div class="info-label">Telah diterima dari</div>
                            <div>: ${namaTertagih}</div>
                        </div>
                        <div class="info-row">
                            <div class="info-label">Uang sejumlah</div>
                            <div>: ${terbilang(totalAmount)} Rupiah</div>
                        </div>
                        <div class="info-row">
                            <div class="info-label">Untuk pembayaran</div>
                            <div>: ${isGrouped ? 'Beberapa item tagihan' : firstItem.nama_tagihan}</div>
                        </div>
                        <div class="info-row">
                            <div class="info-label">Tanggal Transaksi</div>
                            <div>: ${moment(firstItem.created_at).format('DD MMMM YYYY')}</div>
                        </div>
                        <div class="info-row">
                            <div class="info-label">Metode Pembayaran</div>
                            <div>: ${['BILLER-IPAYMU', 'BILLER-BRKS-MOBILE'].some(biller => firstItem.oncard_invoice.includes(biller)) ? 'Transfer' : 'Tunai'}</div>
                        </div>
                    </div>

                    <table class="payment-items">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Deskripsi Pembayaran</th>
                                <th>Tanggal</th>
                                <th>Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            ${paymentItems}
                            <tr class="total-row">
                                <td colspan="3" style="text-align: right;">Total Pembayaran:</td>
                                <td>${formatRupiah(totalAmount.toString())}</td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="nominal-box">
                        <div class="nominal-angka">${formatRupiah(totalAmount.toString())}</div>
                        <div class="nominal-terbilang">${terbilang(totalAmount)} Rupiah</div>
                    </div>

                    <div class="footer-kuitansi">
                        <div class="ttd-area">
                            <p style="margin-top:35px;">Bendahara</p>
                            <div class="ttd-placeholder" style="height:80px!important;"></div>
                            <p>(___________________)</p>
                        </div>
                        <div class="ttd-area">
                            <p>____________, ${moment(firstItem.created_at).format('DD MMMM YYYY')}</p>
                            <p>Pembayar,</p>
                            <div class="ttd-placeholder"></div>
                            <p>(${namaTertagih})</p>
                        </div>
                    </div>
                </div>
            `;
        }

        function printInvoice() {
            const printContent = $('#invoiceModal .invoice-container').clone();
            const printWindow = window.open('', '_blank');
            
            // First write the basic HTML structure
            printWindow.document.write(`
                <html>
                <head>
                    <title>Invoice Print</title>
                    <style>
                        body {
                            font-family: 'Times New Roman', serif;
                            background-color: #f9f9f9;
                            padding: 20px;
                        }
                        .kuitansi-wrapper {
                            max-width: 800px;
                            margin: 0 auto;
                            background: white;
                            padding: 30px;
                            border: 1px solid #ddd;
                            box-shadow: 0 0 10px rgba(0,0,0,0.1);
                        }
                        .kop-kuitansi {
                            text-align: center;
                            border-bottom: 3px double #333;
                            padding-bottom: 15px;
                            margin-bottom: 20px;
                        }
                        .kop-kuitansi h1 {
                            font-size: 24px;
                            margin-bottom: 5px;
                            text-decoration: underline;
                        }
                        .kop-kuitansi h2 {
                            font-size: 18px;
                            margin: 5px 0;
                        }
                        .info-transaksi {
                            margin: 25px 0;
                        }
                        .info-row {
                            display: flex;
                            margin-bottom: 8px;
                        }
                        .info-label {
                            width: 180px;
                            font-weight: bold;
                        }
                        .nominal-box {
                            border: 2px solid #000;
                            padding: 15px;
                            text-align: center;
                            margin: 25px 0;
                        }
                        .nominal-angka {
                            font-size: 22px;
                            font-weight: bold;
                            margin-bottom: 5px;
                        }
                        .nominal-terbilang {
                            font-size: 16px;
                            text-transform: capitalize;
                        }
                        .footer-kuitansi {
                            display: flex;
                            justify-content: space-between;
                            margin-top: 60px;
                        }
                        .ttd-area {
                            text-align: center;
                        }
                        .ttd-placeholder {
                            height: 80px;
                            margin: 15px 0;
                            border-bottom: 1px solid #000;
                        }
                        .no-kuitansi {
                            text-align: right;
                            font-style: italic;
                            margin-bottom: 10px;
                        }
                        .payment-items {
                            width: 100%;
                            border-collapse: collapse;
                            margin: 20px 0;
                        }
                        .payment-items th, .payment-items td {
                            border: 1px solid #ddd;
                            padding: 8px;
                            text-align: left;
                        }
                        .payment-items th {
                            background-color: #f2f2f2;
                        }
                        .total-row {
                            font-weight: bold;
                            background-color: #f9f9f9;
                        }
                    </style>
                </head>
                <body>
                    ${printContent.html()}
                </body>
                </html>
            `);
            
            printWindow.document.close();
            
            // Add the print functionality after the document is loaded
            printWindow.onload = function() {
                setTimeout(function() {
                    printWindow.print();
                    // Don't immediately close as some browsers block this
                    // Let the user decide when to close the print preview
                }, 200);
            };
        }
        </script>

        <script>
            // Fungsi terbilang untuk konversi angka ke teks
            function terbilang(angka) {
                const bilangan = ["", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas"];
                
                if (angka < 12) {
                    return bilangan[angka];
                } else if (angka < 20) {
                    return terbilang(angka-10) + " Belas";
                } else if (angka < 100) {
                    return terbilang(Math.floor(angka/10)) + " Puluh " + terbilang(angka%10);
                } else if (angka < 200) {
                    return "Seratus " + terbilang(angka-100);
                } else if (angka < 1000) {
                    return terbilang(Math.floor(angka/100)) + " Ratus " + terbilang(angka%100);
                } else if (angka < 2000) {
                    return "Seribu " + terbilang(angka-1000);
                } else if (angka < 1000000) {
                    return terbilang(Math.floor(angka/1000)) + " Ribu " + terbilang(angka%1000);
                } else if (angka < 1000000000) {
                    return terbilang(Math.floor(angka/1000000)) + " Juta " + terbilang(angka%1000000);
                } else if (angka < 1000000000000) {
                    return terbilang(Math.floor(angka/1000000000)) + " Milyar " + terbilang(angka%1000000000);
                }
            }

            // Fungsi format Rupiah
            function formatRupiah(angka) {
                return 'Rp ' + angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            }
        </script>   