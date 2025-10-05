<style type="text/css">

    .prevent-select {
    -webkit-user-select: none; /* Safari */
    -ms-user-select: none; /* IE 10 and IE 11 */
    user-select: none; /* Standard syntax */
    }
    .prevent-select:hover {
        cursor:pointer;
    }

    .blink-soft {
    animation: blinker 1.5s linear infinite;
    }

    @keyframes blinker {
    50% {
        opacity: 1;
    }
    75% {
        opacity: 0.3;
    }
    100% {
        opacity: 1;
    }
    }
    .modal-backdrop
    {
        opacity:1!important;
        background-color:#fff;!important;
        /* background:url(https://img.freepik.com/free-vector/gray-line-drawings-organic-shapes-background_1409-3947.jpg?w=1800&t=st=1699762516~exp=1699763116~hmac=64dc5de79b674a3642320b00d960818d173f816fd629a5ebe3c749e7cdf907f0);
        background-size:270px 150px; */
        /* background:url(<?=base_url();?>assets_oncard/images/bg_trx.webp); */
        /* background:url(https://t4.ftcdn.net/jpg/00/57/68/87/360_F_57688788_IpoT2an65bzRUFkgvnlcx2xqor4LrY5z.jpg); */
        background-size:cover;
        background-repeat:repeat;
        
    }
    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
    }

    /* Firefox */
    input[type=number] {
    -moz-appearance: textfield;
    }
	.display {
	width: 100%;
	outline: none;
	border: none;
	text-align: right;
	font-size: 28px;
	color: #fff;
	pointer-events: none;
	padding: 1rem 0.8rem 0.8rem;
	border-radius: 0.5rem;
	margin-bottom: 1rem;
	background: #303134;font-weight
	}
	.buttons {
	display: grid;
	grid-gap: 10px;
	grid-template-columns: repeat(4, 1fr);
	}
	.buttons buttonmm {
	padding: 10px;
	border-radius: 6px;
	border: none;
	font-size: 20px;
	cursor: pointer;
	background-color: #3c4043;
	color: #fff;
	font-weight: 500;
    text-align:center;
	}
	.buttons button:active {
	transform: scale(0.99);
	}
	.operator {
	background: #5f6368 !important;
	}
	.operator.equal {
	background: #8ab4f8 !important;
	color: #202124 !important;
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

    .alsss {
        position: sticky;
        top: 100px; /* Adds 100px space from the top of the viewport */
        background-color: #f2f2f2; /* Background color to prevent transparency */
        border-radius:10px;
        z-index: 1000; /* Ensures it stays above other content */
        padding: 0px;
        text-align:center;
        
        /* border-bottom: 1px solid #ccc; Optional border for visibility */

        max-height:350px;
        overflow-y:auto;
    }
    .alphabet-navigation a{
        position:relative;
        margin-top:30px;
    }
    
    swiper-container {
        width: 100%;
    height: 90px;
    /* margin-top: -35px; */
    z-index: 1;
    }

    swiper-slide {
      text-align: center;
      font-size: 18px;
      background: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
      width:100%;
      padding-top:6px;
      padding-bottom:6px;
    }

    swiper-slide img {
      display: block;
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .filter-btn {
        width:100%;
    }

    .mbx {
        width: 30%;
    }
    /* For Mobile */
    @media screen and (max-width: 540px) {
        .mbx {
            width: 100%;
        }
    }

    /* For Tablets */
    @media screen and (min-width: 540px) and (max-width: 780px) {
        .mbx {
            width: 100%;
        }
    }

    /* HTML: <div class="loader"></div> */
    .loaderxxx {
    --c: no-repeat linear-gradient(135deg, #19a49c 0%, #2ecc71 100%);
    background: 
        var(--c),var(--c),var(--c),
        var(--c),var(--c),var(--c),
        var(--c),var(--c),var(--c);
    background-size: 10px 10px;
    animation: 
        l32-1 1s infinite,
        l32-2 1s infinite;
    }

    .loaderxxx::after {
        background:none;
    }
    @keyframes l32-1 {
    0%,100% {width:30px;height: 30px}
    35%,65% {width:45px;height: 45px}
    }
    @keyframes l32-2 {
    0%,40%  {background-position: 0 0,0 50%, 0 100%,50% 100%,100% 100%,100% 50%,100% 0,50% 0,  50% 50% }
    60%,100%{background-position: 0 50%, 0 100%,50% 100%,100% 100%,100% 50%,100% 0,50% 0,0 0,  50% 50% }
    }
</style>
<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->

                <div class="loaderxxx d-none" style="
                    position: fixed;
                    top: 5%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                    z-index:9999999;
                "></div>

                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Transaksi</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Panel Transaksi</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
                <div class="putContentPembeliHere mb-3"></div>
				<div class="card">
					<div class="card-body">
						<ul class="nav nav-pills mb-3" role="tablist">
							<li class="nav-item" role="presentation">
								<a class="nav-link menu1 active" data-bs-toggle="pill" href="#primary-pills-home" role="tab" aria-selected="true">
									<div class="d-flex align-items-center">
										<div class="tab-icon"><i class="bx bx-cart font-18 me-1"></i>
										</div>
										<div class="tab-title">Quick</div>
									</div>
								</a>
							</li>
							<li class="nav-item menu2" role="presentation">
								<a class="nav-link" data-bs-toggle="pill" href="#primary-pills-profile" role="tab" aria-selected="false" tabindex="-1">
									<div class="d-flex align-items-center">
										<div class="tab-icon"><i class="bx bx-grid-alt font-18 me-1"></i>
										</div>
										<div class="tab-title">Menu</div>
									</div>
								</a>
							</li>
							<li class="nav-item menu3" role="presentation" style="display:none;">
								<a class="nav-link" onclick="openDialogScan('ceksaldo');"  data-bs-toggle="pill" href="#primary-pills-ceksaldo" role="tab" aria-selected="false" tabindex="-1" style="color:#5fd302!important;">
									<div class="d-flex align-items-center">
										<div class="tab-icon"><i class="bx bx-scan font-18 me-1"></i>
										</div>
										<div class="tab-title">Cek Saldo</div>
									</div>
								</a>
							</li>
							<!-- <li class="nav-item" role="presentation">
								<a class="nav-link" data-bs-toggle="pill" href="#primary-pills-contact" role="tab" aria-selected="false" tabindex="-1">
									<div class="d-flex align-items-center">
										<div class="tab-icon"><i class="bx bx-history font-18 me-1"></i>
										</div>
										<div class="tab-title">Riwayat</div>
									</div>
								</a>
							</li> -->
                            
						</ul>

                        <img src="https://oncard.id/assets_oncard/logo/logo_dongker.png" alt="" style="width:80px; position:absolute; right:20px; top:32px;">
                        
						<div class="tab-content" id="pills-tabContent">
							<div class="tab-pane fade  active show" id="primary-pills-home" role="tabpanel">
								<div class="row">
									<div class="col-lg-6 col-12 mb-3">
										<input type="number" class="display" id="saldoTambah" oninput="setVal(this.value);" autocomplete="off"  onkeypress="handleEnter(event);" />
										<div class="buttons">
											<buttonmm class="operator" data-value="AC">AC</buttonmm>
											<buttonmm class="operator" data-value="DEL">DEL</buttonmm>
											<!-- <buttonmm class="operator" data-value="%">%</buttonmm>
											<buttonmm class="operator" data-value="/">÷</buttonmm> -->
											<!-- <buttonmm data-value="7">7</buttonmm>
											<buttonmm data-value="8">8</buttonmm>
											<buttonmm data-value="9">9</buttonmm>
											<buttonmm class="operator" data-value="*">×</buttonmm>
											<buttonmm data-value="4">4</buttonmm>
											<buttonmm data-value="5">5</buttonmm>
											<buttonmm data-value="6">6</buttonmm>
											<buttonmm class="operator" data-value="-">-</buttonmm>
											<buttonmm data-value="1">1</buttonmm>
											<buttonmm data-value="2">2</buttonmm>
											<buttonmm data-value="3">3</buttonmm>
											<buttonmm class="operator" data-value="+">+</buttonmm>
											<buttonmm data-value="0">0</buttonmm>
											<buttonmm data-value="00">00</buttonmm>
											<buttonmm data-value=".">.</buttonmm>
											<buttonmm class="operator equal" data-value="=">=</buttonmm> -->
										</div>
									</div>
									<div class="col-lg-6 col-12">
											<button type="button" class="btn btn-success btnselesaitransaksi" data-value="" onclick="submitPembelian('pembelian');" style="width:100%;padding:13px;box-shadow: 0px 2px 10px rgb(21 255 28 / 65%);
                                            border: 1px solid #FFF;
                                            border-radius: 100px;
                                            font-weight: 900;">SELESAIKAN TRANSAKSI</button>
											
									</div>
								</div>
							</div>
							<div class="tab-pane fade " id="primary-pills-profile" role="tabpanel">
                            <div class="row">
                                    <div class="col-lg-8 col-12 mb-2">
                                        <div class="card">
                                            <div class="card-body">
                                            <div class="row">
                                                    <div class="col-12">
                                                        <div id="filterContainer"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                                <input type="hidden" name="cekUs" id="cekUs">
                                                <font style="font-size:1.25em;display:block;" class="text-dark">
                                                    <b>Pilih</b> Menu
                                                </font>

                                                <div class="row">
                                                    <div class="col-11">
                                                        <div class="row listitems" style="margin-bottom:30px;">
                                                            <?php
                                                            for ($i = 0; $i < 4; $i++) { ?>
                                                                <li class="blog-post o-media" style="background:#fff; border-radius:0px; padding:10px;padding-left:5px; height:100px; width:22%; margin:10px; display:inline-table">
                                                                    <div class="o-media__body">

                                                                        <div class="o-vertical-spacing">
                                                                            <span class="skeleton-box" style="width:100%;"></span>
                                                                        </div>
                                                                        <div class="o-vertical-spacing">
                                                                            <span class="skeleton-box" style="width:100%;"></span>
                                                                        </div>
                                                                        <div class="o-vertical-spacing">
                                                                            <span class="skeleton-box" style="width:60%;"></span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            <?php } ?>

                                                        </div>
                                                    </div>
                                                    <div class="col-1 text-center">
                                                        <div class="row alsss">
                                                            <div id="alphabetNav" class="alphabet-navigation text-center row-1" style="margin-bottom: 15px;"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-12 mb-2">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card">
                                                    <div class="card-body">
                    
                                                        <input type="text" id="searchThisPage" class="form-control" style="height:40px;" placeholder="Cari item">
                                                        <i class="bx bx-trash btn-dark text-danger" onclick="emptySearchText()" style="position:absolute; right:25px;padding:4px;padding-left:8px; padding-right:8px; background:#f2f2f2; border-radius:5px; top:23px;"></i>
                                                    
                                                    </div>
                                                </div>
                                                <div class="card ">
                                                    <div class="card-body">
                                                        <font style="font-size:1.25em;display:block;" class="text-dark">
                                                            <b>Daftar</b> Belanja
                                                            <!--<small style="display:block; font-size:.67em;">Kode Transaksi : <b>4049281</b></small>-->
                                                        </font>

                                                        <div class="row" id="invoiceSide" style="padding:14px; padding-right:0px; margin-right:0px;">
                                                        <img src="<?=base_url();?>assets_oncard/images/empty_cart.png" style="width:150px; height:150px; margin:auto; display:block; object-fit:cover; object-position:center;"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="row text-center mbx" style="position: fixed;
                                                    bottom: 0;
                                                    background: #fff;
                                                    border-top: 2px solid #f2f2f2;
                                                    padding-top: 10px;
                                                    padding-bottom: 10px;">
                                                    <p>Hapus seluruh daftar <a href="#/" onclick="clearAllItemsInvoice();">belanja dikeranjang ini</a></p>
                                                    <div class="col-md-6 col-lg-6 col-6 text-right">
                                                        Total
                                                    </div>
                                                    <div class="col-md-6 col-lg-6 col-6 text-right" id="totalTagihan" style="font-weight:bold; padding-bottom:0px;">Rp 0</div>
                                                    <button type="button" class="btn btn-danger mt-4 mb-5" id="btnNextPayment" style="width:50%;margin:auto;padding:.5em;">Bayar</button>

                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>

                                    
                                </div>
							</div>
							
                            
                            <div class="tab-pane fade " id="primary-pills-ceksaldo" role="tabpanel">
                                <div class="row">
                                    
                                </div>
							</div>
							<!-- <div class="tab-pane fade" id="primary-pills-contact" role="tabpanel">
								<p>API SEDANG DALAM PENGEMBANGAN.</p>
							</div> -->
						</div>
					</div>
				</div>
				
			</div>
		</div>

		<div class="modal fade" id="modalSetCard" tabindex="-1" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
			<div class="modal-dialog modal-dialog-centered">

                <div class="modal-content"  style="border: 8px solid #030303;
                border-radius: 20px;
                padding: 0.5em;">

                    <div class="modal-header" style="border:none!important;">
						<h5 class="modal-title">
                        <button type="button" onclick="window.location.href='<?=base_url();?>CPanel_Admin';" class="btn btn-sm btn-outline-dark me-2" style="font-weight:800;"><i class="bx bx-home-circle" style="margin-right:0px!important;"></i> Dashboard</button>
                        </h5>
                        <div>
                        <button type="button" id="modeset_id" class="btn btn-sm btn-dark me-2" style="font-weight:800;"><i class="bx bx-search" style="margin-right:0px!important;"></i></button>
                        <button type="button" onclick="location.reload();"class="btn btn-sm btn-danger" style="font-weight:900;"><i class="bx bx-refresh" style="margin-right:0px!important;"></i> Refresh</button>
                        </div>
                    </div>
					<div class="modal-body text-center" style="border:none!important;" id="kart" onclick="putFocusScanCard();" >
                        <h6 style="font-weight:900;text-transform:uppercase;">Pindai Kartu</h6>
						<br/>
						
						<img id="scanCard" src="<?=base_url();?>assets_oncard/images/scan_kad.gif"  style="width:200px;  margin:auto; border-radius:20px; display:block; margin-top:15px; margin-bottom:15px;"/>
						<p class="text-center" id="textIndicator" style="margin:auto; transform:scale(0);transition:all 0.2s linear 0s;padding:5px; padding-left:25px; padding-right:25px; font-size:14px; border-radius:100px; background:#27ae60; color:#fff;"></p>
						<input type="number" style="transform:scale(0)!important; margin:auto; text-align:center; width:100%; border:none;outline:none!important;" id="textToCard"/>
						
					</div>

                    <div class="modal-body text-center" style="border:none!important; display:none;" id="searchView">
                        <h6 style="font-weight:900;text-transform:uppercase;">Cari Data Siswa</h6>
                        <h6 style="font-weight:700; font-size:12px;">Daftar ini bersifat temporer</h6>
                        <input type="text" id="searchInput" class="form-control" placeholder="Type to search..." style="margin-bottom:15px;">
                        <div id="searchResults" style="text-align:left; margin-top:10px;">
                            <!-- Search results will appear here -->
                        </div>
                    </div>

					<div class="modal-footer text-center" style="border:none!important;" onclick="putFocusScanCard();" >
						<!-- <button type="button" id="btnConnectToCard" style="display:block;margin:auto;" data-value="=" class="btn btn-outline-primary">Status</button> -->
					</div>

                    <font class="px-3" style="display:block; text-align:center; margin:auto; font-size:12px; padding:5px; background:#f2f2f2; border-radius:5px; margin-bottom:10px; margin-top:-30px;">
                        Pastikan 'Alat scan ready!' sudah muncul dahulu.
                        <small class="text-muted"><i><br/>Apabila garis hijau belum muncul, klik pada gambar dibawah ini untuk mengaktifkan indikator tersebut!</i></small>
                    </font>
                    <font class="px-3" style="display:block; text-align:center; margin:auto; font-size:12px; letter-spacing:2px; padding:5px; background:#000;color:white; border-radius:100px; margin-bottom:-24px; margin-top:10px;">Version 22</font>
				</div>
			</div>
		</div>

        <script>
        document.getElementById('modeset_id').addEventListener('click', function() {
            var icon = this.querySelector('i');
            var kart = document.getElementById('kart');
            var searchView = document.getElementById('searchView');

            if (icon.classList.contains('bx-search')) {
                // Switch to search view
                icon.classList.remove('bx-search');
                icon.classList.add('bx-arrow-back');
                
                kart.style.display = 'none';
                searchView.style.display = 'block';
            } else {
                // Switch back to card scan view
                icon.classList.remove('bx-arrow-back');
                icon.classList.add('bx-search');

                searchView.style.display = 'none';
                kart.style.display = 'block';
            }
        });
        </script>

		
        
        <div class="modal fade" id="modalSetCardWithNominal" tabindex="-1" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content" style="border: 8px solid #030303;
                border-radius: 20px;
                padding: 0.5em;">
					<div class="modal-header" style="border:none!important;">
						<i>- Langkah 2</i>
                        <div>
                        <button type="button" onclick="window.location.href='<?=base_url();?>CPanel_Admin';" class="btn btn-sm btn-outline-secondary me-2"><i class="bx bx-home" style="margin-right:0px!important;"></i></button>
                        <button type="button" onclick="location.reload();"class="btn btn-sm btn-outline-secondary"><i class="bx bx-refresh" style="margin-right:0px!important;"></i></button>
                        </div>
                    </div>
					<div class="modal-body text-center" style="border:none!important;" id="kart" onclick="putFocusScanCard4();" >
                        <h4>Pindai <strong>Kartu</strong><br/><font style="font-size:35px;">Kustomer</font></h4>
						Indikator dibawah ini harus bergaris <font class="text-success">hijau</font> dulu.
						<small class="text-muted"><i><br/>Apabila garis hijau belum muncul, klik pada gambar dibawah ini untuk mengaktifkan indikator tersebut!</i></small>
						<br/>
						
						<img id="scanCard4" src="<?=base_url();?>assets_oncard/images/scan_kard2.webp"  style="width:200px;  margin:auto; border-radius:20px; display:block; margin-top:15px; margin-bottom:15px;"/>
						<p class="text-center" id="textIndicator4" style="margin:auto; transform:scale(0);transition:all 0.2s linear 0s;padding:5px; padding-left:25px; padding-right:25px; font-size:14px; border-radius:100px; background:#27ae60; color:#fff;"></p>
						<input type="number" style="transform:scale(0)!important; margin:auto; text-align:center; width:100%; border:none;outline:none!important;" id="textToCard4"/>
						
					</div>
					<div class="modal-footer text-center" style="border:none!important;" onclick="putFocusScanCard4();" >
						<!-- <button type="button" id="btnConnectToCard" style="display:block;margin:auto;" data-value="=" class="btn btn-outline-primary">Status</button> -->
					</div>
				</div>
			</div>
		</div>
        
        
        <div class="modal fade" id="modalKonfirmTransaksiWithNominal" tabindex="-1" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border: 8px solid #030303;
                border-radius: 20px;
                padding: 0.5em;">
            <div class="modal-header" style="border:none!important;">
                <i>- Langkah 3</i>
                <div>
                    <button type="button" onclick="window.location.href='<?=base_url();?>CPanel_Admin';" class="btn btn-sm btn-outline-secondary me-2"><i class="bx bx-home" style="margin-right:0px!important;"></i></button>
                    <button type="button" onclick="location.reload();" class="btn btn-sm btn-outline-secondary"><i class="bx bx-refresh" style="margin-right:0px!important;"></i></button>
                </div>
            </div>
            <div class="modal-body text-center" style="border:none!important;" onclick="putFocusScanCard5();">
                <strong>Nominal Pembelian :</strong>
                <code>
                    <h1 class="nominalTrx" style="font-weight:bolder;"></h1>
                </code>
                <div class="putContentPembeliHereWithNominal"></div>
                <hr/>

                <!-- PIN Input (Hidden by Default) -->
                <div id="pinInputContainer" style="display: none; margin-bottom: 20px;">
                    <label for="pinInput" class="form-label">Masukkan PIN:</label>
                    <input type="password" id="pinInput" class="form-control" placeholder="****" style="text-align: center; font-size: 18px; margin: 0 auto; max-width: 200px;">
                    <small id="pinError" class="text-danger" style="display: none;">PIN salah!</small>
                </div>

                <h4>Apakah Anda Yakin<br/><font style="font-size:25px;">Melanjutkan Proses Ini?</font></h4>
                <br/>

                <div class="row">
                    <div class="col-lg-4 col-4 text-start">
                        <button onclick="location.reload();" type="button" class="btn btn-outline-danger btn-lg round-15">Batal</button>
                    </div>
                    <div class="col-lg-8 col-8">
                        <button type="button" onclick="lockCheckWithNominal();" style="width:100%;" id="btnbtnbtn" class="btn btn-success btn-lg round-15">Lanjutkan</button>
                    </div>
                </div>
            </div>
            <div class="modal-footer text-center" style="border:none!important;" onclick="putFocusScanCard5();">
                <!-- Footer content -->
            </div>
        </div>
    </div>
</div>
		
        
        <div class="modal fade" id="modalScanNominal" tabindex="-1" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content"  style="border: 8px solid #030303;
                border-radius: 20px;
                padding: 0.5em;">
					<div class="modal-header" style="border:none!important;">
                    <i>- Langkah 1</i>
                        <div>
                        <button type="button" onclick="window.location.href='<?=base_url();?>CPanel_Admin';" class="btn btn-sm btn-outline-secondary me-2"><i class="bx bx-home" style="margin-right:0px!important;"></i></button>
                        <button type="button" onclick="location.reload();"class="btn btn-sm btn-outline-secondary"><i class="bx bx-refresh" style="margin-right:0px!important;"></i></button>
                        </div>
                    </div>
					<div class="modal-body text-center" style="border:none!important;" id="kart3" onclick="putFocusScanCard3();" >
                        
                        <h4>Pindai <strong>Kartu</strong><br/><font style="font-size:35px;">Nominal</font></h4>
						Indikator dibawah ini harus bergaris <font class="text-success">hijau</font> dulu.
						<small class="text-muted"><i><br/>Apabila garis hijau belum muncul, klik pada gambar dibawah ini untuk mengaktifkan indikator tersebut!</i></small>
						<br/>
						
						<img id="scanCard3" src="<?=base_url();?>assets_oncard/images/nominal.png"  style="width:200px;  margin:auto; border-radius:20px;padding:10px; display:block; margin-top:15px; margin-bottom:15px;"/>
						<p class="text-center" id="textIndicator3" style="margin:auto; transform:scale(0);transition:all 0.2s linear 0s;padding:5px; padding-left:25px; padding-right:25px; font-size:14px; border-radius:100px; background:#27ae60; color:#fff;"></p>
						<input type="number" style="transform:scale(0)!important; margin:auto; text-align:center; width:100%; border:none;outline:none!important;" id="textToCard3"/>
						
					</div>
					<div class="modal-footer text-center" style="border:none!important;" onclick="putFocusScanCard3();" >
						<!-- <button type="button" id="btnConnectToCard" style="display:block;margin:auto;" data-value="=" class="btn btn-outline-primary">Status</button> -->
					</div>
				</div>
			</div>
		</div>
        
        
        <div class="modal fade" id="modalSetNominalByTap" tabindex="-1" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content"  style="border: 8px solid #030303;
                border-radius: 20px;
                padding: 0.5em;">
					<div class="modal-header" style="border:none!important;">
                    <i>- Langkah 1</i>
                        <div>
                        <button type="button" onclick="window.location.href='<?=base_url();?>CPanel_Admin';" class="btn btn-sm btn-outline-secondary me-2"><i class="bx bx-home" style="margin-right:0px!important;"></i></button>
                        <button type="button" onclick="location.reload();"class="btn btn-sm btn-outline-secondary"><i class="bx bx-refresh" style="margin-right:0px!important;"></i></button>
                        </div>
                    </div>
					<div class="modal-body putherelah text-center" style="border:none!important;">
                      
					</div>
				</div>
			</div>
		</div>
		
		<div class="modal fade" id="transaksiNext" tabindex="-1" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
			<div class="modal-dialog modal-dialog-centered" style="border:none!important;">
				<div class="modal-content" style="border: 8px solid #030303;
                border-radius: 20px;
                padding: 0.5em;">
					<div class="modal-header" style="border:none!important;">
						<h5 class="modal-title" style="font-weight:900; text-transform:uppercase;">Konfirmasi Transaksi</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" data-value="="></button>
					</div>
					<div class="modal-body" style="border:none!important;">
                    
						<div class="detailTransaksi" onclick="putFocusScanCard2();"></div>
						
						<p class="text-center" id="textIndicator2" onclick="putfocusTotextToCard2();" style="margin:auto; transform:scale(1);transition:all 0.2s linear 0s;padding:5px; padding-left:25px; padding-right:25px; font-size:14px; border-radius:100px; background:#27ae60; color:#fff;">PIN</p>
						<input type="password" data-lpignore="true" autocomplete="aus" pattern="[0-9]*" inputmode="numeric" style="transform:scale(1)!important; margin:auto; text-align:center; width:100%; letter-spacing:10px; border:none;outline:none!important;" id="textToCard2"/>
						
					</div>
					<div class="modal-footer text-center" style="border:none!important;">
						<button type="button" onclick="lockCheck();" id="btnSubmitTransaksi" style="width:100%;padding:13px;box-shadow: 0px 2px 10px rgb(21 255 28 / 65%);
                        border: 1px solid #FFF;
                        border-radius: 100px;
                        font-weight: 900;" data-value="" class="btn btn-success">Selesai</button>
					</div>
				</div>
			</div>
		</div>
        
        <div class="modal fade" id="transaksiNextCekSaldo" tabindex="-1" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
			<div class="modal-dialog modal-dialog-centered" style="border:none!important;">
				<div class="modal-content" style="border:none!important;">
					<div class="modal-header" style="border:none!important;">
						<h5 class="modal-title">Cek Saldo</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" data-value="="></button>
					</div>
					<div class="modal-body" style="border:none!important;">
						<div class="detailTransaksi2"></div>
						
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

		<script src="<?=base_url();?>assets_oncard/js/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
		<script type="text/javascript">

            $('.page-wrapper').css('opacity','0');
			let mode = '';
			let secret_code = '';
			let limit_trx_setting_value = '';
			let nominal_belanja = '0';
			let kode_kartu = '';
            let invoiceText = [];
            let invoiceResultPrint = '';
            let beaAdmin = 0;
            let kode_kartu_kustdebit = '';
            let tipe_transaksi_merchant = '';
            let tipe_kartu = 0;

            let namalengkap = '';
            let nomoridentitas = '';
            let saldopembeli = '';
            let limit_harian_pembeli = '';
            let limit_harian_pembeli_aktual = '';
            let fotopembeli = '';
            let pinvalue = '';

            let kantin_name = '';
            let kantin_id = '';
            let kantin_address = '';

            let isUseCard = true;
            let akun_number = '';
            
            let usePINorNOT = '';

            let dataArray = [];

            let waktu_mulai_trx;
            let waktu_selesai_trx;

            function handleEnter(event) {
                if (event.key === 'Enter') {

                    let totalx = $('.display').val().replace(/\./g, '').replace(',', '.');

                    let numericValue = parseFloat(totalx);

                    if (isNaN(numericValue) || numericValue <= 0 || numericValue % 500 !== 0) {
                        Toastify({
                            text: 'Nominal pembelian tidak normal! Cek kembali inputan yang diberikan!',
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            className: "infoMessage",

                        }).showToast();
                        $('.display').val('');
                        $('.btnselesaitransaksi').html('SELESAIKAN TRANSAKSI');
                        $('.btnselesaitransaksi').attr('disabled', false);
                        $('.btnselesaitransaksi').css('cursor', 'pointer');
                        return; // Gagalkan proses berikutnya
                    }

                    // Simulate button click
                    document.querySelector('.btnselesaitransaksi').click();
                }
            }

			$(document).ready(function () {

                getAuthConf();
                
                $('.page-wrapper').css('opacity','0');

            });

            // Function to handle search
            document.getElementById('searchInput').addEventListener('input', function() {
            const query = this.value.trim().toLowerCase();
            const searchResults = document.getElementById('searchResults');
            
            searchResults.innerHTML = ''; // Clear previous results

            if (query.length === 0) {
                // If empty input, no message
                return;
            }

            if (query.length < 3) {
                searchResults.innerHTML = `
                <div class="alert alert-info" role="alert">
                    Ketikkan minimal 3 huruf pertama
                </div>
                `;
                return;
            }
            
            if (query.length >= 3) {
                const filteredData = dataArray.filter(item => {
                    const name = item.account?.customers_name || item.general_user?.nama_lengkap || item.siswa?.nama_lengkap || '';
                    const cardId = item.card_id || '';
                    const accountNumber = item.account?.account_number || '';

                    return name.toLowerCase().includes(query.toLowerCase()) ||
                        cardId.toLowerCase().includes(query.toLowerCase()) ||
                        accountNumber.toLowerCase().includes(query.toLowerCase());
                });

                searchResults.innerHTML = ''; // Clear previous results

                if (filteredData.length > 0) {
                    filteredData.forEach(item => {
                        const name = item.account?.customers_name || item.general_user?.nama_lengkap || item.siswa?.nama_lengkap || 'Tanpa Nama';
                        const cardId = item.card_id || '-';
                        const accountNumber = item.account?.account_number || '-';

                        const div = document.createElement('div');
                        div.className = 'search-item';
                        div.style.padding = '5px 0';

                        // Unique ID for the input
                        const inputId = 'pin_' + Math.random().toString(36).substring(2, 10);

                        div.innerHTML = `
                            <div class="card" style="cursor:pointer;">
                                <div class="card-body">
                                    <strong>${name}</strong><br>
                                    Card ID: ${cardId}<br>
                                    Account Number: ${accountNumber}
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <label>PIN</label>
                                    <input type="password" name="passwords" class="form-control" id="${inputId}" placeholder="Masukkan PIN User"/>
                                    <button class="btn btn-primary mt-2" id="submit_${inputId}">Gunakan</button>
                                </div>
                            </div>
                        `;

                        searchResults.appendChild(div);

                        // Add listener to button
                        setTimeout(() => {
                            const btn = document.getElementById(`submit_${inputId}`);
                            btn.addEventListener('click', (e) => {
                                e.stopPropagation();
                                const pinValue = document.getElementById(inputId).value;
                                if (!pinValue) {
                                    Swal.fire({
                                        position: 'center',
                                        icon: 'error',
                                        title: 'Proses Gagal',
                                        text: 'PIN Wajib Diisi dengan Benar!',
                                        showConfirmButton: true,

                                    });
                                    return;
                                }
                                
                                if (pinValue!=item.account.pin) {
                                    Swal.fire({
                                        position: 'center',
                                        icon: 'error',
                                        title: 'Proses Gagal',
                                        text: 'Pin Salah!',
                                        showConfirmButton: true,

                                    });
                                    return;
                                }

                                // Optionally validate pinValue here before proceeding

                                console.log("items : ",item);

                                const save2 = async () => {
                                const posts2 = await axios.get('<?= api_url(); ?>api/v1/usr?q='+item.account.account_number, {
                                    headers: {
                                        'Authorization': 'Bearer ' + localStorage.getItem('_token')
                                    }
                                }).catch((err) => {
                                    // $('#textIndicator').html('Alat scan ready!');
                                    $('#textToCard').blur();
                                    return false;
                                });

                                if (posts2.status == 200) {
                                    item = posts2.data.data;
                                    handleItemSelected(item);

                                }
                                
                            }
                            
                            save2();

                            // return false;
                                // Call handler
                                
                            });
                        }, 0);
                    });
                }
                else {
                    searchResults.innerHTML =  `<div class="alert alert-primary" role="alert">
                        Tidak ada data yang ditemukan.
                    </div>`;
                }
            }

            });

            function handleItemSelected(selectedItem) {
                console.log('Selected Item:', selectedItem);

                if (selectedItem.siswa !== null) {
                    // Kalau ada siswa
                    namalengkap = selectedItem.siswa.nama_lengkap;
                    nomoridentitas = selectedItem.siswa.nis;
                    saldopembeli = selectedItem.balance;
                } 
                else if (selectedItem.general_user !== null) {
                    // Kalau siswa null tapi ada general_user
                    namalengkap = selectedItem.general_user.nama_lengkap;
                    nomoridentitas = selectedItem.general_user.nip || '-';
                    saldopembeli = selectedItem.balance;
                } 
                else {
                    // Data tidak lengkap
                    console.error('Unknown user type.');
                }

                isUseCard = true;
                akun_number = selectedItem.account_number;

                if(selectedItem.user.foto=='default.jpg'){
                    fotopembeli = `<?=base_url();?>assets_oncard/images/icons/user.webp`;
                }else {
                    fotopembeli = `<?=base_url();?>app/assets/users/foto/${selectedItem.user.foto}`;
                }

                // fotopembeli = `<?=base_url();?>assets_oncard/images/icons/user.webp`;

                limit_harian_pembeli = selectedItem.limit_trx;
                limit_harian_pembeli_aktual = selectedItem.limits_useds??0;

                tipe_kartu = selectedItem.debts_card;
                pinvalue = selectedItem.pin;
                if(mode!='ceksaldo'){
                    let htmlnya = '';
                    $('#modalSetCard').modal('toggle');
                    htmlnya= `
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-3 text-center">
                                    <img src="${fotopembeli}" style="width:46px; height:46px; object-fit:cover;border-radius:6px;"/>
                                    </div>
                                    <div class="col-9">
                                        <h6 style="margin:0;padding:0; font-weight:bolder;">${namalengkap}</h6>
                                        <small style="
                                            font-size: 1.5em;
                                            font-weight: bold;
                                            color: #27ae60;
                                            background: rgba(39, 174, 96, 0.1);
                                            padding: 0.25rem 0.5rem;
                                            border-radius: 4px;
                                            display: inline-block;
                                        ">Rp${formatRupiah(saldopembeli)}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card" style="margin-top: -38px;
                            border-radius: 12px;
                            background: #f2f2f2;
                            padding-top: 13px;
                            z-index: -1;font-weight:600;">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 text-center">
                                        Total Belanja Hari Ini : ${formatRupiah(limit_harian_pembeli_aktual.toString())} / ${formatRupiah(limit_harian_pembeli.toString())}
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;

                    if(tipe_kartu==1){
                        $('.menu2').attr('style','display:none');

                        htmlnya += `
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 text-center blink-soft" style="font-size:11px;">
                                    <strong>Kartu Kredit</strong><br/>Pelanggan ini menggunakan kartu kredit untuk berbelanja, saldo dari kegiatan transaksi ini akan segera masuk ketika pelanggan ini membayarkan tagihan hutangnya.
                                    </div>
                                </div>
                            </div>
                        </div>
                        `;
                    }

                    $('.putContentPembeliHere').html(htmlnya);

                    getAuthSeconds();
                    loadMenu();
                    // requestSecret();
                    // getConfigBsns();
                    playSound();
                    
                    return false;
                    
                }else {
                    openNextDialogSaldoCek(namalengkap,nomoridentitas,saldopembeli,fotopembeli);
                }

                Toastify({
                    text: 'Scan berhasil!',
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    className: "successMessage",

                }).showToast();
            }

			
            function loadMenu() {
                let tableColumn = '';
                const save2 = async () => {
                    const posts2 = await axios.get('<?= api_url(); ?>api/v1/produk', {
                        headers: {
                            'Authorization': 'Bearer ' + localStorage.getItem('_token'),
                            'nopaginate': true
                        }
                    }).catch((err) => {
                        console.log(err.response);
                    });

                    if (posts2.status == 200) {
                        tableColumn = '';
                        let sintaks = '';
                        let alphabetNav = '';

                        $('#putBtnFilter').html('');

                        if (posts2.data.data.length == 0) {
                            tableColumn += `<div class="text-center">Tidak ada data.</div>`;
                            $('.listitems').html(tableColumn);
                            return false;
                        }

                        // Sort by nama_produk in ascending order
                        const sortedData = posts2.data.data.sort((a, b) => a.nama_produk.localeCompare(b.nama_produk));

                        // Group by the first letter of nama_produk
                        const groupedData = sortedData.reduce((acc, item) => {
                            const firstLetter = item.nama_produk.charAt(0).toUpperCase();
                            if (!acc[firstLetter]) {
                                acc[firstLetter] = [];
                            }
                            acc[firstLetter].push(item);
                            return acc;
                        }, {});

                        // Generate unique categories for filter buttons
                        const categories = [...new Set(posts2.data.data.map(item => item.kategori_produk))]; // Assuming each item has a 'kategori' property

                        // Generate Category Filter Buttons
                        let categoryButtons = `<swiper-container style="" class="mySwiper" pagination="true" pagination-clickable="true" space-between="30" slides-per-view="5" navigation="false">
                                                <swiper-slide><button class="btn btn-outline-primary filter-btn " data-category="all" style="border-radius:100px;font-size:11px;">All</button></swiper-slide>`;
                        categories.forEach(category => {
                            categoryButtons += `<swiper-slide><button class="btn btn-outline-secondary filter-btn" data-category="${category}" style="border-radius:100px;font-size:11px;">${category}</button></swiper-slide>`;
                        });

                        categoryButtons += `</swiper-container>
                        
                        `;
                        $('#filterContainer').html(categoryButtons); // Place category buttons in a specified div

                        
                        // Generate Alphabet Navigation
                        Object.keys(groupedData).sort().forEach(letter => {
                            alphabetNav += `<a href="#group-${letter}" style="margin-top:10px;display:block; margin-bottom:10px;">${letter}</a>`;
                        });

                        $('#alphabetNav').html(alphabetNav); // Place alphabet navigation in the specified div

                        // Function to render items by category
                        function renderItems(category) {
                            let sintaks = '';
                            Object.keys(groupedData).sort().forEach(letter => {
                                const filteredItems = groupedData[letter].filter(item => category === 'all' || item.kategori_produk === category);
                                if (filteredItems.length) {
                                    sintaks += `<h3 id="group-${letter}" style="font-size:0px;">${letter}</h3><div class="row">`;

                                    filteredItems.forEach(mapping => {
                                        sintaks += `
                                        <div class="col-md-2 col-lg-2 col-sm-4 col-6 text-center itemnya" onclick="addToCart('${mapping.id}')" style="padding:7px;">
                                            <div class="card-body" style="padding:0px;margin:0px;border:1px solid #ccc; border-radius:10px;padding-bottom:10px;">
                                                <img src="https://png.pngtree.com/png-vector/20190726/ourlarge/pngtree-food-icon-design-vector-png-image_1608882.jpg" width="70%" style="display:block;margin:auto;"/>
                                                <p style="font-size:14px;font-weight:bold;color:#000;line-height:1em;padding-left:.2em;padding-right:.2em;">${mapping.nama_produk}</p>
                                                <p style="font-size:11px;color:#636363;margin-top:-17px; margin-bottom:10px;">${"Rp "+formatRupiah(mapping.harga)}</p>
                                                <p style="font-size:11px;color:#636363;margin-top:0px; margin-bottom:10px;">Stok : ${formatRupiah(mapping.stok.toString())}</p>
                                            </div>
                                        </div>
                                        `;
                                    });

                                    sintaks += `</div>`; // Close row div for each letter
                                }
                            });

                            $('.listitems').html(sintaks);
                        }

                        // Initial rendering (show all items)
                        renderItems('all');

                        // Add event listener for filter buttons
                        $('.filter-btn').on('click', function() {
                            const category = $(this).data('category');
                            renderItems(category);
                        });
                    }
                }
                save2();
            }

            document.querySelectorAll('.alphabet-navigation a').forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault(); // Prevent default link behavior

                    // Get the target section's ID from the link's href attribute
                    const targetId = this.getAttribute('href').substring(1);
                    const targetElement = document.getElementById(targetId);

                    // Calculate the offset position (element's position - 100px for the margin)
                    const offsetTop = targetElement.offsetTop + 100;

                    // Smooth scroll to the calculated position
                    window.scrollTo({
                        top: offsetTop,
                        behavior: 'smooth'
                    });
                });
            });
            
            function addToCart(str){
				let tableColumn = '';
				const save2 = async (str) => {
					const posts2 = await axios.get('<?= api_url(); ?>api/v1/produk/id/'+str, {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {
						console.log(err.response);
					});
			
					if (posts2.status == 200) {
                        let newarr = [];
                        let oldarr = [...invoiceText];
                        if (oldarr.length > 0) {
                            invoiceText = [];
                            // console.log('1',oldarr.concat({id:posts.data.id_product, totalHargaPerItem :posts.data.harga_produk, jumlahItem : 1, namaItem:posts.data.nama_produk, totalHarga : (posts.data.harga_produk*1)}));
                            let idget = posts2.data.data.id;
                            let switching = false;
                            oldarr.map((mapping, i) => {
                                if (mapping.id == idget) {
                                    switching = true;
                                }
                            });
                            if (switching == false) {
                                newarr = oldarr.concat({
                                    id: posts2.data.data.id,
                                    totalHargaPerItem: posts2.data.data.harga,
                                    jumlahItem: 1,
                                    namaItem: posts2.data.data.nama_produk,
                                    totalHarga: (posts2.data.data.harga * 1)
                                });
                            } else {
                                for (var i in oldarr) {
                                    if (oldarr[i].id == posts2.data.data.id) {
                                        oldarr[i].jumlahItem = (parseInt(oldarr[i].jumlahItem) + 1);
                                        oldarr[i].totalHarga = ((parseInt(oldarr[i].jumlahItem)) * oldarr[i].totalHargaPerItem);
                                        break; //Stop this loop, we found it!
                                    }
                                }
                                newarr = oldarr;
                            }
                            invoiceText = newarr;

                        } else {
                            invoiceText.push({
                                id: posts2.data.data.id,
                                totalHargaPerItem: posts2.data.data.harga,
                                jumlahItem: 1,
                                namaItem: posts2.data.data.nama_produk,
                                totalHarga: (posts2.data.data.harga * 1)
                            });
                        }
                        // console.log(invoiceText);
                        setIsiInvoice(invoiceText);
                        setTotalInvoice();
					}
				}
				save2(str);				
			}

            function setIsiInvoice(invoiceText) {
				if(invoiceText.length<1){
					$('#invoiceSide').html(`<img src="<?=base_url();?>assets_oncard/images/empty_cart.png" style="width:150px; height:150px; margin:auto; display:block; object-fit:cover; object-position:center;"/>`);
					return false;
				}
                let htmlx = '';
                invoiceText.map((mapping, i) => {
                    htmlx += `<div class="row mt-3" style="width:100%; margin:0px; padding:0px; height:70px;" id="item${mapping.id}">
                        <div class="col-md-3 col-lg-3 col-3 text-left" style="border-right:1px solid #f2f2f2;">
                            <div class="row">
                                <div class="col-md-5 col-lg-5 col-5" >
                                    <i class="bx bx-chevron-up mb-2 indec" onclick="setJumlah('tambah','${mapping.id}')" style="display:block;"></i>
                                    <i class="bx bx-chevron-down indec" onclick="setJumlah('kurang','${mapping.id}')"></i>
                                </div>
                                <div class="col-md-7 col-lg-7 col-7 text-left" style="padding-top:10px;">
                                    <font id="jmlOrder${mapping.id}" style="font-weight:normal; font-size:1em;">${mapping.jumlahItem}</font>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-md-5 col-lg-5 col-5" style="font-size:14px; line-height:1em;">
                            ${mapping.namaItem}
                            <br/>
                            <small class="mt-2" style="display:block;">@ ${"Rp "+formatRupiah(mapping.totalHargaPerItem)}</small>
                            
                        </div>
                        <div class="col-md-4 col-lg-4 col-4" style="font-size:14px">
                            <font id="budget${mapping.id}">${"Rp "+formatRupiah(mapping.totalHarga.toString())}</font>
                            <input type="hidden" value="${mapping.totalHarga}" id="hargaItem${mapping.id}">
                            <i class="bx bx-trash text-danger" onclick="deleteItemInvoice('${mapping.id}')" style="float:right;"></i>
                        
                        </div>
                        
                        
                    </div>`;
                })
                $('#invoiceSide').html(htmlx);
            }
            
            function setTotalInvoice() {
                let jumlahTotal = 0;
                invoiceText.map((mapping, i) => {
                    jumlahTotal += parseInt(mapping.totalHarga);
                });
                $('#totalTagihan').html("Rp " + formatRupiah(jumlahTotal.toString()));
            }

            function setJumlah(str, id) {

                let nominee = parseInt($('#jmlOrder' + id).text());
                let hargaItem = parseInt($('#hargaItem' + id).val());

                if (str == 'tambah') {
                    //   return obj.id!==str; 
                    for (var i in invoiceText) {
                        if (invoiceText[i].id == id) {
                            invoiceText[i].jumlahItem = (parseInt(invoiceText[i].jumlahItem) + 1);
                            invoiceText[i].totalHarga = ((parseInt(invoiceText[i].jumlahItem)) * invoiceText[i].totalHargaPerItem);
                            break; //Stop this loop, we found it!
                        }
                    }
                } else {
                    if (nominee > 1) {

                        for (var i in invoiceText) {
                            if (invoiceText[i].id == id) {
                                invoiceText[i].jumlahItem = (parseInt(invoiceText[i].jumlahItem) - 1);
                                invoiceText[i].totalHarga = ((parseInt(invoiceText[i].jumlahItem)) * invoiceText[i].totalHargaPerItem);
                                break; //Stop this loop, we found it!
                            }
                        }
                    } else {
                    }
                }

                setIsiInvoice(invoiceText);
                setTotalInvoice();

            }

            $('#transaksiNext').on('hidden.bs.modal', function () {
                    // $('#modalSetCard').modal('toggle');
                    if(!$('#invoiceModal').hasClass('show')){
                        location.reload();    
                    }else {
                        return false;
                    }
                    
                });
            $('#invoiceModal').on('hidden.bs.modal', function () {
                location.reload();   
            });

            function deleteItemInvoice(str) {
                // console.log(invoiceText);return false;
                invoiceText = invoiceText.filter(function(obj) {
                    return obj.id != str;
                });

				if(invoiceText.length<1){
                    setTotalInvoice();
					$('#invoiceSide').html(`<img src="<?=base_url();?>assets_oncard/images/empty_cart.png" style="width:150px; height:150px; margin:auto; display:block; object-fit:cover; object-position:center;"/>`);
					return false;
				}

                let htmlx = '';
                invoiceText.map((mapping, i) => {
                    htmlx += `<div class="row mt-3" style="width:100%; margin:0px; padding:0px; height:70px;" id="item${mapping.id}">
                        <div class="col-md-3 col-lg-3 col-3 text-left" style="border-right:1px solid #f2f2f2;">
                            <div class="row">
                                <div class="col-md-5 col-lg-5 col-5" >
                                    <i class="bx bx-chevron-up mb-2 indec" onclick="setJumlah('tambah','${mapping.id}')" style="display:block;"></i>
                                    <i class="bx bx-chevron-down indec" onclick="setJumlah('kurang','${mapping.id}')"></i>
                                </div>
                                <div class="col-md-7 col-lg-7 col-7 text-left" style="padding-top:10px;">
                                    <font id="jmlOrder${mapping.id}" style="font-weight:normal; font-size:1em;">${mapping.jumlahItem}</font>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-md-5 col-lg-5 col-5" style="font-size:14px; line-height:1em;">
                            ${mapping.namaItem}
                            <br/>
                            <small class="mt-2" style="display:block;">@ ${"Rp "+formatRupiah(mapping.totalHargaPerItem)}</small>
                            
                        </div>
                        <div class="col-md-4 col-lg-4 col-4" style="font-size:14px">
                            <font id="budget${mapping.id}">${"Rp "+formatRupiah(mapping.totalHarga.toString())}</font>
                            <input type="hidden" value="${mapping.totalHarga}" id="hargaItem${mapping.id}">
                            <i class="bx bx-trash text-danger" onclick="deleteItemInvoice('${mapping.id}')" style="float:right;"></i>
                        
                        </div>
                        
                        
                    </div>`;
                })
                $('#invoiceSide').html(htmlx);
                setTotalInvoice();
            }

            function clearAllItemsInvoice() {
                invoiceText = []; // Clear the array
                setTotalInvoice(); // Reset the total invoice
                $('#invoiceSide').html(`
                    <img src="<?=base_url();?>assets_oncard/images/empty_cart.png" 
                        style="width:150px; height:150px; margin:auto; display:block; object-fit:cover; object-position:center;"/>
                `);
            }

            function runSearchText(str) {

                $('#btnConnectToCard').html('Mencari...');

                let searchText = str;
                let sintaks = ``;
                for (let i = 0; i < 4; i++) {
                    sintaks += `<li class="blog-post o-media" style="background:#fff; border-radius:15px; padding:20px;padding-left:5px; height:100px; width:20%; margin:10px; display:inline-table">
                        <div class="o-media__body">
                            
                            <div class="o-vertical-spacing">
                            <span class="skeleton-box" style="width:100%;"></span>
                            </div>
                            <div class="o-vertical-spacing">
                            <span class="skeleton-box" style="width:100%;"></span>
                            </div>
                            <div class="o-vertical-spacing">
                            <span class="skeleton-box" style="width:60%;"></span>
                            </div>
                        </div>
                        </li>`;


                }

                $('.listitems').html(sintaks);

                let urlsett = '';
                if(searchText != ''){
                    urlsett = '<?= api_url(); ?>api/v1/produk/search?q='+searchText;
                }else {
                    urlsett = '<?= api_url(); ?>api/v1/produk';
                }

                const save = async () => {
                    const posts = await axios.get(urlsett, {
                        headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token'),
                            'nopaginate' : true
						}
                    }).catch((err) => {
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'Proses Gagal',
                            text: 'Terjadi kesalahan dalam memproses request Anda.',
                            showConfirmButton: true,

                        });
                    });

                    if (posts.status == 200) {

                        $(".loading").fadeOut();

                        $('#btnConnectToCard').html('Status');

                        if (posts.data.data.length > 0) {
                            let sintaks = '';
                            posts.data.data.map((mapping, i) => {
                                $('#putBtnFilter').html(`<div class="btn btn-sm badge badge-sm badge-secondary ml-4" onclick="loadMenu()" style="float:right;display:block;padding:13px;">Filter berdasar kata kunci ${searchText}<i class="fa fa-times ml-3"></i></div>`);

                                sintaks += `
                                <div class="col-md-3 col-lg-3 col-sm-4 col-6 text-center itemnya" onclick="addToCart('${mapping.id}')" style="padding:7px;">
                                    <div class="card-body" style="padding:0px;margin:0px;border:1px solid #ccc; border-radius:10px;padding-bottom:10px;">
                                    <img src="https://png.pngtree.com/png-vector/20190726/ourlarge/pngtree-food-icon-design-vector-png-image_1608882.jpg" width="70%" style="display:block;margin:auto;"/>
                                    <p style="font-size:14px;font-weight:bold;color:#000;line-height:1em;padding-left:.2em;padding-right:.2em;">${mapping.nama_produk}</p>
                                    <p style="font-size:11px;color:#636363;margin-top:-17px; margin-bottom:10px;">${"Rp "+formatRupiah(mapping.harga)}</p>
                                    <p style="font-size:11px;color:#636363;margin-top:0px; margin-bottom:10px;">Stok : ${formatRupiah(mapping.stok.toString())}</p>
                                    </div>
                                </div>
                                `;

                            });
                            $('.listitems').html(sintaks);
                        }else {

                            $('.listitems').html(`
                                <div class="col-12 text-center">
                                    Item tidak ditemukan! Cobalah cari dengan kata yang lain.
                                </div>
                            `);
                        }

                    } else {
                        $(".loading").fadeOut();
                    }
                }
                save();
            }

            function emptySearchText() {
                let val = $('#searchThisPage').val();
                if(val==''){
                    Toastify({
						text: 'Keyword pencarian masih kosong!',
						duration: 3000,
						close: true,
						gravity: "top",
                        position: "right",
						className: "errorMessage",

					}).showToast();
                    return false;
                }
                $(".loading").fadeIn();
                $('#searchThisPage').val('');
                loadMenu();
            }

            function openDialogScan(str){

				let total = '0';
				total = $('.display').val();
                // if((total==''||total=='0'||total=='00') && str=='pembelian'){
				// 	Toastify({
				// 		text: 'Pembelian Masih Kosong! Transaksi Tidak Dapat Dilakukan!',
				// 		duration: 3000,
				// 		close: true,
				// 		gravity: "top",
                //         position: "right",
				// 		className: "errorMessage",

				// 	}).showToast();
				// 	return false;
				// }


				secret_code = '';//reset secret code when modal dialog opened
				
				$('#modalSetCard').modal('toggle');
				$('#btnConnectToCard').html('Status');
				$('#modalSetCard').on('shown.bs.modal', function () {
					$('#textToCard').focus();
				});
				
				mode = str;
			}
            
            
            function openDialogScanNominal(){
              
                $('#modalScanNominal').modal('toggle');
				$('#modalScanNominal').on('shown.bs.modal', function () {
					$('#textToCard3').focus();
				});
			}
            
            function openDialogScanNominalByTap(){
                $('#modalSetNominalByTap').modal('toggle');
                getDataNominal();
			}

            function openModalScanKartuUser(){

                if(tipe_transaksi_merchant=='kustdebitbytap'){
                    $('#modalSetNominalByTap').modal('toggle');
                }else {
                    $('#modalScanNominal').modal('toggle');

                }
                

                $('#modalSetCardWithNominal').modal('toggle');
				$('#modalSetCardWithNominal').on('shown.bs.modal', function () {
					$('#textToCard4').focus();
				});
			}

            $('#modalKonfirmTransaksiWithNominal').on('shown.bs.modal', function () {
                $('#textToCard5').focus();
            });

			$("#textToCard").focus(function(){
				console.log('input sedang fokus');
				$('#textIndicator').attr('style','transform:scale(1);transition:all 0.2s linear 0s;padding:5px; padding-left:25px; padding-right:25px; font-size:14px; border-radius:100px; background:#27ae60; color:#fff; display:table; text-align:center; margin:auto;');
				$('#textIndicator').html('Alat scan ready!');
				$('#scanCard').attr('style','border:5px solid #27ae60;width:200px;  margin:auto; border-radius:20px; display:block; margin-top:15px; margin-bottom:15px; transition:all 0.2s linear 0s;');
			});
			$('#textToCard').blur(function(){
				console.log('input tidak fokus');
				$('#textToCard').val('');
				$('#textIndicator').attr('style','transform:scale(1);transition:all 0.2s linear 0s;padding:5px; padding-left:25px; padding-right:25px; font-size:14px; border-radius:100px; background:red; color:#fff;display:table;  text-align:center;margin:auto;');
				$('#textIndicator').html('Klik disini untuk dapat memulai scan kartu!');
				$('#scanCard').attr('style','border:5px solid red;width:200px;  margin:auto; border-radius:20px; display:block; margin-top:15px; margin-bottom:15px; transition:all 0.2s linear 0s;');
                
			});
			
            function putFocusScanCard(){
				$('#textToCard').focus();
				$('#scanCard').attr('style','border:5px solid #27ae60;width:200px;  margin:auto; border-radius:20px; display:block; margin-top:15px; margin-bottom:15px; transition:all 0.2s linear 0s;');
			}
			
			$("#textToCard2").focus(function(){
				console.log('input sedang fokus');
                if(usePINorNOT=='true'){
                    $('#textIndicator2').attr('style','transform:scale(1);transition:all 0.2s linear 0s;padding:5px; padding-left:25px; padding-right:25px; font-size:14px; border-radius:100px; background:#27ae60; color:#fff; display:table; text-align:center; margin:auto;');
                    $('#textIndicator2').html('Masukkan PIN!');
                }else {
                    $('#textIndicator2').attr('style','transform:scale(0);transition:all 0.2s linear 0s;padding:5px; padding-left:25px; padding-right:25px; font-size:14px; border-radius:100px; background:#27ae60; color:#fff; display:table; text-align:center; margin:auto;');
                }
			});
			$('#textToCard2').blur(function(){
				console.log('input tidak fokus');
				$('#textIndicator2').attr('style','transform:scale(1);transition:all 0.2s linear 0s;padding:5px; padding-left:25px; padding-right:25px; font-size:14px; border-radius:100px; background:#27ae60; color:#fff;display:table;  text-align:center;margin:auto;');
				
			});

			function putFocusScanCard2(){
				$('#textToCard2').focus();
			}

            

            $("#textToCard3").focus(function(){
				console.log('input sedang fokus');
				$('#textIndicator3').attr('style','transform:scale(1);transition:all 0.2s linear 0s;padding:5px; padding-left:25px; padding-right:25px; font-size:14px; border-radius:100px; background:#27ae60; color:#fff; display:table; text-align:center; margin:auto;');
				$('#textIndicator3').html('Alat scan ready!');
				$('#scanCard3').attr('style','border:5px solid #27ae60;width:200px; padding:10px; margin:auto; border-radius:20px; display:block; margin-top:15px; margin-bottom:15px; transition:all 0.2s linear 0s;');
			});
			$('#textToCard3').blur(function(){
				console.log('input tidak fokus');
				$('#textToCard3').val('');
				$('#textIndicator3').attr('style','transform:scale(1);transition:all 0.2s linear 0s;padding:5px; padding-left:25px; padding-right:25px; font-size:14px; border-radius:100px; background:red; color:#fff;display:table;  text-align:center;margin:auto;');
				$('#textIndicator3').html('Klik disini untuk dapat memulai scan kartu!');
				$('#scanCard3').attr('style','width:200px;  margin:auto; border-radius:20px;padding:10px; display:block; margin-top:15px; margin-bottom:15px; transition:all 0.2s linear 0s;');
                
			});
            function putFocusScanCard3(){
				$('#textToCard3').focus();
				$('#scanCard3').attr('style','border:5px solid #27ae60;width:200px;padding:10px;  margin:auto; border-radius:20px; display:block; margin-top:15px; margin-bottom:15px; transition:all 0.2s linear 0s;');
			}
			

            $("#textToCard4").focus(function(){
				console.log('input sedang fokus');
				$('#textIndicator4').attr('style','transform:scale(1);transition:all 0.2s linear 0s;padding:5px; padding-left:25px; padding-right:25px; font-size:14px; border-radius:100px; background:#27ae60; color:#fff; display:table; text-align:center; margin:auto;');
				$('#textIndicator4').html('Alat scan ready!');
				$('#scanCard4').attr('style','border:5px solid #27ae60;width:200px;  margin:auto; border-radius:20px; display:block; margin-top:15px; margin-bottom:15px; transition:all 0.2s linear 0s;');
			});
			$('#textToCard4').blur(function(){
				console.log('input tidak fokus');
				$('#textToCard4').val('');
				$('#textIndicator4').attr('style','transform:scale(1);transition:all 0.2s linear 0s;padding:5px; padding-left:25px; padding-right:25px; font-size:14px; border-radius:100px; background:red; color:#fff;display:table;  text-align:center;margin:auto;');
				$('#textIndicator4').html('Klik disini untuk dapat memulai scan kartu!');
				$('#scanCard4').attr('style','width:200px;  margin:auto; border-radius:20px; display:block; margin-top:15px; margin-bottom:15px; transition:all 0.2s linear 0s;');
                
			});
            function putFocusScanCard4(){
				$('#textToCard4').focus();
				$('#scanCard4').attr('style','border:5px solid #27ae60;width:200px;padding:10px;  margin:auto; border-radius:20px; display:block; margin-top:15px; margin-bottom:15px; transition:all 0.2s linear 0s;');
			}
            
            $("#textToCard5").focus(function(){
				console.log('input sedang fokus');
				$('#textIndicator5').attr('style','transform:scale(1);transition:all 0.2s linear 0s;padding:5px; padding-left:25px; padding-right:25px; font-size:14px; border-radius:100px; background:#27ae60; color:#fff; display:table; text-align:center; margin:auto;');
				$('#textIndicator5').html('Alat scan ready!');
				$('#scanCard5').attr('style','border:5px solid #27ae60;width:200px;  margin:auto; border-radius:20px; display:block; margin-top:15px; margin-bottom:15px; transition:all 0.2s linear 0s;');
			});
			$('#textToCard5').blur(function(){
				console.log('input tidak fokus');
				$('#textToCard5').val('');
				$('#textIndicator5').attr('style','transform:scale(1);transition:all 0.2s linear 0s;padding:5px; padding-left:25px; padding-right:25px; font-size:14px; border-radius:100px; background:red; color:#fff;display:table;  text-align:center;margin:auto;');
				$('#textIndicator5').html('Klik disini untuk dapat memulai scan kartu!');
				$('#scanCard5').attr('style','width:200px;  margin:auto; border-radius:20px; display:block; margin-top:15px; margin-bottom:15px; transition:all 0.2s linear 0s;');
                
			});
            function putFocusScanCard5(){
				$('#textToCard5').focus();
				$('#scanCard5').attr('style','border:5px solid #27ae60;width:200px;padding:10px;  margin:auto; border-radius:20px; display:block; margin-top:15px; margin-bottom:15px; transition:all 0.2s linear 0s;');
			}
            

			let timer;
			const input = document.querySelector('#textToCard');
			input.addEventListener('keyup', function (e) {
				clearTimeout(timer);

                $('#textIndicator').html('Sedang melakukan pencarian...');

				timer = setTimeout(() => {

					if(mode=='pembelian'||mode=='ceksaldo'||mode=='pembelianDenganMenu'){
						let mx = $('#textToCard').val();
						kode_kartu = mx;
						if(mx.length>10){
							Toastify({
								text: 'Scan ulang kartu tersebut!',
								duration: 3000,
								close: true,
								gravity: "top",
								position: "right",
								className: "errorMessage",

							}).showToast();
							$('#textToCard').val('');
							$('#textToCard').blur();
						}else {

                            showLoaderXXX();
							searchSiswaByKartu(mx);
						}
						
						// getSiswaData($('#textToCard').val());
					}else {
						console.log('NEED AN API TO GET SALDO SISWA BY KODE KARTU');
					}
				}, 1500);
			});

            // Show loader
            function showLoaderXXX() {
                document.querySelector('.loaderxxx').classList.remove('d-none');
            }

            // Hide loader
            function hideLoaderXXX() {
                document.querySelector('.loaderxxx').classList.add('d-none');
            }

            
            let timer2;
			const input2 = document.querySelector('#searchThisPage');
			input2.addEventListener('keyup', function (e) {
				clearTimeout(timer2);
				timer2 = setTimeout(() => {
                    let mx = $('#searchThisPage').val();
					runSearchText(mx);
				}, 1500);
			});

            let timer3;
			const input3 = document.querySelector('#textToCard3');
			input3.addEventListener('keyup', function (e) {
				clearTimeout(timer3);

                $('#textIndicator3').html('Sedang melakukan pencarian...');

				timer3 = setTimeout(() => {
                
                    let mx = $('#textToCard3').val();
                    if(mx.length>10){
                        Toastify({
                            text: 'Scan ulang kartu tersebut!',
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            className: "errorMessage",

                        }).showToast();
                        $('#textToCard3').val('');
                        $('#textToCard3').blur();
                    }else {
                        searchNominalByKartu(mx);
                    }
                
				}, 1500);
			});
            
            let timer4;
			const input4 = document.querySelector('#textToCard4');
			input4.addEventListener('keyup', function (e) {
				clearTimeout(timer4);

                $('#textIndicator4').html('Sedang melakukan pencarian...');

				timer4 = setTimeout(() => {
                
                    let mx = $('#textToCard4').val();
                    if(mx.length>10){
                        Toastify({
                            text: 'Scan ulang kartu tersebut!',
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            className: "errorMessage",

                        }).showToast();
                        $('#textToCard4').val('');
                        $('#textToCard4').blur();
                    }else {
                        kode_kartu_kustdebit = mx;
                        searchSiswaByKartuWithNominal(mx);
                    }
                
				}, 1500);
			});
            
            
            // let timer5;
			// const input5 = document.querySelector('#textToCard5');
			// input5.addEventListener('keyup', function (e) {
			// 	clearTimeout(timer5);

            //     $('#textIndicator5').html('Sedang melakukan pencarian...');

			// 	timer5 = setTimeout(() => {
                
            //         let mx = $('#textToCard5').val();
            //         kode_kartu = mx;
            //         if(mx.length>10){
            //             Toastify({
            //                 text: 'Scan ulang kartu tersebut!',
            //                 duration: 3000,
            //                 close: true,
            //                 gravity: "top",
            //                 position: "right",
            //                 className: "errorMessage",

            //             }).showToast();
            //             $('#textToCard5').val('');
            //             $('#textToCard5').blur();
            //         }else {
            //             if(kode_kartu==kode_kartu_kustdebit){
            //                 lockCheckWithNominal();
            //             }else {
            //                 $('#textToCard5').blur();
            //                 $('#textToCard5').focus();
            //                 Toastify({
            //                     text: 'Konfirmasi Gagal! Kartu tidak sesuai dengan yang pertama.',
            //                     duration: 3000,
            //                     close: true,
            //                     gravity: "top",
            //                     position: "right",
            //                     className: "errorMessage",

            //                 }).showToast();
            //             }
                        
            //         }
                
			// 	}, 1500);
			// });

			

            //update 21 ags
            function submitPembelian(str){

                showLoaderXXX();
                
                let total = $('.display').val();
                total = total.split('.').join("");

                console.log(limit_trx_setting_value);

                // Check the condition
                if (limit_trx_setting_value== 1 && parseInt(limit_harian_pembeli) < parseInt(limit_harian_pembeli_aktual) + parseInt(total)) {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Over Limit',
                        text: 'Limit Belanja Harian Melewati Batas Maksimum!',
                        showConfirmButton: true,

                    });
                    $('#btnselesaitransaksi').html('SELESAIKAN TRANSAKSI');
                    $('#btnselesaitransaksi').attr('disabled', false);
                    $('#btnselesaitransaksi').css('cursor', 'pointer');

                    return false;
                }

                if(parseInt(total)> parseInt(saldopembeli)){
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Saldo Tidak Cukup',
                        text: 'Mohon periksa kembali saldo yang tersedia.',
                        showConfirmButton: true,

                    });
                    $('#btnselesaitransaksi').html('SELESAIKAN TRANSAKSI');
                    $('#btnselesaitransaksi').attr('disabled', false);
                    $('#btnselesaitransaksi').css('cursor', 'pointer');

                    return false;
                }
                
                if (total=='') {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Nominal Masih Kosong',
                        text: 'Masukkan nominal belanja terlebih dahulu!',
                        showConfirmButton: true,

                    });
                    $('#btnselesaitransaksi').html('SELESAIKAN TRANSAKSI');
                    $('#btnselesaitransaksi').attr('disabled', false);
                    $('#btnselesaitransaksi').css('cursor', 'pointer');

                    hideLoaderXXX();

                    return false;
                }

                $('.btnselesaitransaksi').html('Processing...');
                $('.btnselesaitransaksi').attr('disabled', 'disabled');
                $('.btnselesaitransaksi').css('cursor', 'not-allowed');

                const save2 = async () => {
					const posts2 = await axios.get('<?= api_url(); ?>api/v1/key/create-trx', {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {
						console.log("Error create token");
                        Toastify({
                            text: 'Klik tombol SELESAIKAN TRANSAKSI kembali.',
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            className: "infoMessage",

                        }).showToast();
                        // requestSecret();

                        $('#btnselesaitransaksi').html('SELESAIKAN TRANSAKSI');
                        $('#btnselesaitransaksi').attr('disabled', false);
                        $('#btnselesaitransaksi').css('cursor', 'pointer');

                        hideLoaderXXX();

					});

					if (posts2.status == 201) {

                        hideLoaderXXX();

						secret_code = posts2.data.data.client_secret;

                        total = $('.display').val();
                        if(total==''){
                            
                            Toastify({
                                text: 'Pembelian masih kosong!',
                                duration: 3000,
                                close: true,
                                gravity: "top",
                                position: "right",
                                className: "infoMessage",

                            }).showToast();
                            
                            
                            return false;
                        }
                        openNextDialogPembelian(namalengkap,nomoridentitas,saldopembeli,fotopembeli);
                        if(usePINorNOT=='false'){
                            $('#textToCard2').val(pinvalue);
                            $('#textToCard2').css('display','none');
                            $('#textIndicator2').html('TRANSAKSI TIDAK MEMERLUKAN PIN!');
                        }else {
                            // pinvalue = '';
                            $('#textToCard2').val('');
                            $('#textToCard2').css('display','block');
                            $('#textIndicator2').attr('style','display:block;');
                        }

                        $('#btnselesaitransaksi').html('SELESAIKAN TRANSAKSI');
                        $('#btnselesaitransaksi').attr('disabled', false);
                        $('#btnselesaitransaksi').css('cursor', 'pointer');

                        
					}
				}
				save2();
            }
            
            function searchSiswaByKartu(str){

                namalengkap = '';
                nomoridentitas = '';
                saldopembeli = '';
                fotopembeli = '';

                let hutangTotal = '0';

                if(str==''){
                    Toastify({
						text: 'Silahkan ulangi lagi.',
						duration: 3000,
						close: true,
						gravity: "top",
                        position: "right",
						className: "errorMessage",

					}).showToast();

                    $('#textIndicator').html('Alat scan ready!');
                    return false;
                }

                $('.putContentPembeliHere').html(``);
				
                const save2 = async () => {
					const posts2 = await axios.get('<?= api_url(); ?>api/v1/usr?card='+str, {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {
                        // $('#textIndicator').html('Alat scan ready!');
                        hideLoaderXXX();
						$('#textToCard').blur();
                        return false;
					});
					if (posts2.status == 200) {

                        $('#textIndicator').html('Alat scan ready!');

                        if(posts2.data.status==false){

                            hideLoaderXXX();

                            Toastify({
                                text: 'Scan ulang kartu tersebut!',
                                duration: 3000,
                                close: true,
                                gravity: "top",
                                position: "right",
                                className: "errorMessage",
                            }).showToast();
                            $('#textToCard').blur();
                            $('#textToCard').focus();
                        }
                        
                        if(posts2.data.data.user.model=='Siswa'){
                            namalengkap = posts2.data.data.siswa?.nama_lengkap??'-';
                            nomoridentitas = posts2.data.data.siswa.nis;
                            saldopembeli = posts2.data.data.balance;
                        }
                        else if(posts2.data.data.user.model=='General'){
                            namalengkap = posts2.data.data.customers_name;
                            nomoridentitas = posts2.data.data.account_number;
                            saldopembeli = posts2.data.data.balance;
                        }

                        if(posts2.data.data.user.foto=='default.jpg'){
                            fotopembeli = `<?=base_url();?>assets_oncard/images/icons/user.webp`;
                        }else {
                            fotopembeli = `<?=base_url();?>app/assets/users/foto/${posts2.data.data.user.foto}`;
                        }

                        limit_harian_pembeli = posts2.data.data.limit_trx;
                        limit_harian_pembeli_aktual = posts2.data.data.limits_useds;

                        tipe_kartu = posts2.data.data.debts_card;
                        pinvalue = posts2.data.data.pin;
                        if(mode!='ceksaldo'){
                            let htmlnya = '';
                            $('#modalSetCard').modal('toggle');
                            htmlnya= `
                            <div class="card" style="border-radius: 12px; border: 1px solid #e0e0e0;border-bottom-left-radius:0px; border-bottom-right-radius:0px;">
                                <div class="card-body" style="padding: 1rem;">
                                    <div class="row" style="align-items: center;">
                                        <div class="col-3 text-center">
                                            <div style="
                                                width: 50px;
                                                height: 50px;
                                                border-radius: 8px;
                                                overflow: hidden;
                                                border: 2px solid #fff;
                                                box-shadow: 0 2px 8px rgba(0,0,0,0.1);
                                                margin: 0 auto;
                                            ">
                                                <img src="${fotopembeli}" style="width:100%; height:100%; object-fit:cover;"/>
                                            </div>
                                        </div>
                                        <div class="col-9">
                                            <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 6px;">
                                                <i class='bx bx-user' style="color: #555; font-size: 1.1em;"></i>
                                                <h6 style="margin:0; font-weight:700; color:#333; font-size:1em;">${namalengkap}</h6>
                                            </div>
                                            <div style="display: flex; align-items: center; gap: 10px; background: rgba(39, 174, 96, 0.05); padding: 6px 10px; border-radius: 8px;">
                                                <i class='bx bx-wallet-alt' style="color: #27ae60; font-size: 1.2em;"></i>
                                                <span id="balanceValue" style="
                                                    font-size: 1.3em;
                                                    font-weight: 700;
                                                    color: transparent;
                                                    text-shadow: 0 0 8px rgba(0,0,0,0.3);
                                                    border-radius: 4px;
                                                    user-select: none;
                                                    font-family: 'Courier New', monospace;
                                                ">•••••••</span>
                                                
                                                <button onclick="toggleBalance()" style="
                                                    background: transparent;
                                                    border: none;
                                                    cursor: pointer;
                                                    color: #27ae60;
                                                    font-size: 1.1em;
                                                    padding: 0;
                                                    margin-left: auto;
                                                    transition: all 0.3s ease;
                                                    display: flex;
                                                    align-items: center;
                                                    justify-content: center;
                                                " title="Toggle balance visibility">
                                                    <i id="balanceIcon" class="bx bx-show" style="transition: all 0.3s ease;"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card" style="
                                margin-top: -24px;
                                border-radius: 0 0 12px 12px;
                                background: linear-gradient(135deg, #f8f8f8 0%, #ffffff 100%);
                                border: 1px solid #e0e0e0;
                                border-top: none;
                                box-shadow: 0 4px 12px rgba(0,0,0,0.03);
                            ">
                                <div class="card-body" style="padding: 0.8rem 1rem;">
                                    <div class="row">
                                        <div class="col-12">
                                            <div style="display: flex; align-items: center; justify-content: center; gap: 8px;">
                                                <i class='bx bx-cart-alt' style="color: #e67e22; font-size: 1.2em;"></i>
                                                <span style="font-weight: 600; color: #555; font-size: 0.9em;">
                                                    Total Belanja Hari Ini: 
                                                    <span style="color: #e67e22; font-weight: 700;">${formatRupiah(limit_harian_pembeli_aktual.toString())}</span>
                                                    / 
                                                    <span style="color: #27ae60; font-weight: 700;">${formatRupiah(limit_harian_pembeli.toString())}</span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            `;

                            if(tipe_kartu==1){
                                $('.menu2').attr('style','display:none');

                                htmlnya += `
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12 text-center blink-soft" style="font-size:11px;">
                                            <strong>Kartu Kredit</strong><br/>Pelanggan ini menggunakan kartu kredit untuk berbelanja, saldo dari kegiatan transaksi ini akan segera masuk ketika pelanggan ini membayarkan tagihan hutangnya.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                `;
                            }

                            $('.putContentPembeliHere').html(htmlnya);

                            loadMenu();
                            // requestSecret();
                            // getConfigBsns();
                            getAuthSeconds();

                            playSound();
                            hideLoaderXXX();
                            
                            return false;
                            
                        }else {
                            openNextDialogSaldoCek(namalengkap,nomoridentitas,saldopembeli,fotopembeli);
                            hideLoaderXXX();
                        }

                        Toastify({
                            text: 'Scan berhasil!',
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            className: "successMessage",

                        }).showToast();
                        
                        

					}else {
                        Toastify({
                            text: 'Scan ulang kartu tersebut!',
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            className: "errorMessage",
                        }).showToast();

                        hideLoaderXXX();
                        // $('#textToCard').blur();

                        // $('#textIndicator').html('Alat scan ready!');
                        
                    }
				}
				
				save2();
				
				
			}
            
            
            function searchSiswaByKartuWithNominal(str){

                namalengkap = '';
                nomoridentitas = '';
                saldopembeli = '';
                fotopembeli = '';

                if(str==''){
                    Toastify({
						text: 'Silahkan ulangi lagi.',
						duration: 3000,
						close: true,
						gravity: "top",
                        position: "right",
						className: "errorMessage",

					}).showToast();

                    // $('#textIndicator4').html('Alat scan ready!');
                    return false;
                }

                
                
                $('.putContentPembeliHereWithNominal').html(``);
				
                const save2 = async () => {
					const posts2 = await axios.get('<?= api_url(); ?>api/v1/usr?card='+str, {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {
                        // $('#textIndicator').html('Alat scan ready!');
						$('#textToCard4').blur();
                        return false;
					});
					if (posts2.status == 200) {

                        $('#modalSetCardWithNominal').modal('toggle');

                        

                        // $('#textIndicator4').html('Alat scan ready!');

                        $('.nominalTrx').html("Rp"+formatRupiah(nominal_belanja.toString()));

                        if(posts2.data.status==false){
                            Toastify({
                                text: 'Scan ulang kartu tersebut!',
                                duration: 3000,
                                close: true,
                                gravity: "top",
                                position: "right",
                                className: "errorMessage",
                            }).showToast();
                            $('#textToCard4').blur();
                            $('#textToCard4').focus();
                        }

                        limit_harian_pembeli = posts2.data.data.limit_trx;
                        limit_harian_pembeli_aktual = posts2.data.data.limits_useds??0;
                        
                        if(posts2.data.data.user.model=='Siswa'){
                            namalengkap = posts2.data.data.siswa.nama_lengkap;
                            nomoridentitas = posts2.data.data.siswa.nis;
                            saldopembeli = posts2.data.data.balance;
                        }
                        else if(posts2.data.data.user.model=='General'){
                            namalengkap = posts2.data.data.customers_name;
                            nomoridentitas = posts2.data.data.account_number;
                            saldopembeli = posts2.data.data.balance;
                        }

                        if(posts2.data.data.user.foto=='default.jpg'){
                            fotopembeli = `<?=base_url();?>assets_oncard/images/icons/user.webp`;
                        }else {
                            fotopembeli = `<?=base_url();?>app/assets/users/foto/${posts2.data.data.user.foto}`;
                        }
                        
                        pinvalue = posts2.data.data.pin;
                        $('.putContentPembeliHereWithNominal').html(`
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-3 text-center">
                                        <img src="${fotopembeli}" style="width:46px; height:46px; object-fit:cover;border-radius:100px;"/>
                                        </div>
                                        <div class="col-9">
                                            <h6 style="margin:0;padding:0; font-weight:bolder;">${namalengkap}</h6>
                                            <small>${nomoridentitas}</small>
                                            <div style="display: inline-flex; align-items: center; gap: 0.5rem; background: rgba(39, 174, 96, 0.1); border-radius: 6px; padding: 0.25rem 0.75rem;">
                                                    <span id="balanceValue2" style="
                                                        font-size: 1.5em;
                                                        font-weight: bold;
                                                        color: transparent;
                                                        text-shadow: 0 0 8px rgba(0,0,0,0.3);
                                                        border-radius: 4px;
                                                        padding: 0.1rem 0.5rem;
                                                        user-select: none;
                                                    ">•••••••</span>
                                                    
                                                    <button onclick="toggleBalance2()" style="
                                                        background: rgba(39, 174, 96, 0.2);
                                                        border: none;
                                                        cursor: pointer;
                                                        color: #27ae60;
                                                        font-size: 1.2em;
                                                        padding: 0.35rem;
                                                        padding-left:10px;
                                                        padding-right:10px;
                                                        border-radius: 50%;
                                                        transition: all 0.3s ease;
                                                        display: flex;
                                                        align-items: center;
                                                        justify-content: center;
                                                    " title="Toggle balance visibility">
                                                        <i id="balanceIcon2" class="bx bx-show" style="transition: all 0.3s ease;"></i>
                                                    </button>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `);

                        // loadMenu();
                        // requestSecret();
                        // getConfigBsns();
                        getAuthSecondsWithNominal();
                        
                        
                        Toastify({
                            text: 'Scan berhasil!',
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            className: "successMessage",

                        }).showToast();

                        playSound();

                        putFocusScanCard5();

                        $('#modalKonfirmTransaksiWithNominal').modal('toggle');
                        

                        
                        

					}else {
                        Toastify({
                            text: 'Scan ulang kartu tersebut!',
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            className: "errorMessage",
                        }).showToast();
                        // $('#textToCard').blur();

                        $('#textToCard4').blur();
                        $('#textToCard4').focus();

                        // $('#textIndicator').html('Alat scan ready!');
                        
                    }
				}
				
				save2();
				
				
			}
            
            
            function searchNominalByKartu(str){

                namalengkap = '';
                nomoridentitas = '';
                saldopembeli = '';
                fotopembeli = '';

                if(str==''){
                    Toastify({
						text: 'Silahkan ulangi lagi.',
						duration: 3000,
						close: true,
						gravity: "top",
                        position: "right",
						className: "errorMessage",

					}).showToast();

                    $('#textIndicator').html('Alat scan ready!');
                    return false;
                }

                
                const save2 = async () => {
					const posts2 = await axios.get('<?= api_url(); ?>api/v1/card-reader/card?keys='+str, {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {
                        // $('#textIndicator').html('Alat scan ready!');
						$('#textToCard3').blur();
                        $('#textIndicator3').html('Alat scan ready!');
                        return false;
					});
					
                        
                    console.log(posts2.data);

                        if (Object.keys(posts2.data).length === 0) {
                            Toastify({
                                text: 'Scan ulang kartu tersebut!',
                                duration: 3000,
                                close: true,
                                gravity: "top",
                                position: "right",
                                className: "errorMessage",
                            }).showToast();
                            $('#textToCard3').blur();
                            $('#textToCard3').focus();
                            return false;
                        }else {
                            Toastify({
                                text: 'Scan berhasil!',
                                duration: 3000,
                                close: true,
                                gravity: "top",
                                position: "right",
                                className: "successMessage",

                            }).showToast();

                            nominal_belanja = posts2.data.values;

                            playSound();

                            openModalScanKartuUser();
                        }

                        $('#textIndicator3').html('Alat scan ready!');
                    
				}
				
				save2();
				
				
			}
            
            
            function getDataNominal(){

                const save2 = async () => {
					const posts2 = await axios.get('<?= api_url(); ?>api/v1/card-reader', {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {
                        
                        return false;
					});
					
                    console.log(posts2.data);

                    if (Object.keys(posts2.data).length === 0) {
                        Toastify({
                            text: 'Terjadi kesalahan pada server. Tunggu sebentar [1]',
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            className: "errorMessage",
                        }).showToast();
                        $('#textToCard3').blur();
                        $('#textToCard3').focus();
                        return false;
                    }
                    
                    nominal_belanja = '0';
                    let htmlx= '<div class="row">';

                    posts2.data.map((mapping, i) => {
                        htmlx+=`
                        <div class="col-lg-6 col-md-6 col-sm-6 prevent-select radius-30 col-6 text-center" onclick="setNominalValue(${mapping.values})">
                            <div class="card" style="
                                border-radius: 20px;
                                overflow: hidden;
                                border:3px solid #25af60;
                                transition: all 0.3s ease;
                            ">
                                <div class="card-body" style="
                                    position: relative;
                                    overflow: hidden;
                                ">
                                    <!-- Fixed money pattern overlay -->
                                    <div style="
                                        position: absolute;
                                        top: 0;
                                        left: 0;
                                        right: 0;
                                        bottom: 0;
                                        opacity: 0.15;
                                        pointer-events: none;
                                    "></div>
                                    
                                    <small style="
                                        display: block;
                                        color: #7f8c8d;
                                        font-size: 0.9em;
                                        letter-spacing: 1px;
                                        margin-bottom: 0.5em;
                                        text-transform: uppercase;
                                        font-weight: 600;
                                    ">Nominal</small>
                                    
                                    <h2 style="
                                        margin: 0;
                                        color: #27ae60;
                                        font-weight: 800;
                                        text-shadow: 0 2px 4px rgba(39, 174, 96, 0.15);
                                        position: relative;
                                        font-size: 1.75em;
                                    ">
                                        ${formatRupiah(mapping.values)}
                                    </h2>
                                    
                                    <!-- Currency symbol decoration -->
                                    <div style="
                                        position: absolute;
                                        top: 50%;
                                        left: 15px;
                                        transform: translateY(-50%);
                                        color: rgba(39, 174, 96, 0.1);
                                        font-size: 3em;
                                        font-weight: bold;
                                        pointer-events: none;
                                    ">Rp</div>
                                </div>
                            </div>
                        </div>
                        `;
                    });

                    htmlx += '</div>';


                    $('.putherelah').html(htmlx);

                    
                    
				}
				
				save2();
				
				
			}
            
            
            function getMrnt(){

                const save2 = async () => {
					const posts2 = await axios.get('<?= api_url(); ?>api/v1/history-card/user-card-issue', {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {
                        
                        return false;
					});
					
                    dataArray = posts2.data;

                    document.querySelector('.pace').classList.add('d-none');
				}
				
				save2();
				
				
			}

            function setNominalValue(str){
                nominal_belanja = str;

                playSound();

                openModalScanKartuUser();

            }

			function openNextDialogSaldoCek(nama, nis, balance, foto){
				
				$('#modalSetCard').modal('toggle');
				$('#transaksiNextCekSaldo').modal('toggle');

				$('.detailTransaksi2').html(`
					<div class="jumbotron jumbotron-fluid">
					<div class="container">

                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 text-center pb-3">
                                        Data Pemilik Kartu
                                    </div>
                                    <div class="col-4 text-center" style="border-right:1px solid #dee2e6">
                                        <img src="${foto}" style="width:77px; height:77px; object-fit:cover;border-radius:100px;"/>
                                    </div>
                                    <div class="col-8">
                                        <p style="margin:0;padding:0;font-weight:bold;">${nama}</p>
                                        <small>NIS : ${nis}</small><br/>
                                        <small style="font-size:1.5em; font-weight:bold;">Rp${formatRupiah(balance)}</small>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
						
					</div>
					</div>
				`);
			}
            
            function openNextDialogPembelian(nama, nis, balance, foto){
				nominal_belanja = '0';
				let total = '0';
				total = $('.display').val();
                total = total.split('.').join("");
                total = total.split(',').join("");
				nominal_belanja = parseInt(total);

                $('#textToCard2').val('');
				
				// $('#modalSetCard').modal('toggle');
				$('#transaksiNext').modal('toggle');
				
				let val = $('#textToCard').val();

				$('#transaksiNext').on('shown.bs.modal', function () {
					$('#textToCard2').focus();
                    // if(usePINorNOT=='false'){
                    //     Toastify({
                    //         text: 'Transaksi ini tidak menggunakan pin!',
                    //         duration: 3000,
                    //         close: true,
                    //         gravity: "top",
                    //         position: "right",
                    //         className: "successMessage",

                    //     }).showToast(); 
                    //     $('#textToCard2').val('DEFAULT');
                    // }
				});
				$('.detailTransaksi').html(`
					<div class="jumbotron jumbotron-fluid">
					<div class="container">

                        <div class="card" style="
                            border: 1px solid #f0f0f0;
                            border-radius: 8px;
                            background: linear-gradient(to bottom, #f8f8f8 0%, #ffffff 50%);
                            box-shadow: 0 2px 6px rgba(0,0,0,0.05);
                        ">
                            <div class="card-body" style="padding: 16px;">
                                <div class="row" style="align-items: center; margin: 0 -8px;">
                                    <div class="col-12" style="
                                        font-weight: 500;
                                        color: #555;
                                        padding-bottom: 12px;
                                        margin-bottom: 12px;
                                        border-bottom: 1px solid #eee;
                                        font-size: 14px;
                                        padding-left: 8px;
                                    ">
                                        Data Pemilik Kartu
                                    </div>
                                    <div class="col-3" style="padding: 0 8px;">
                                        <img src="${foto}" style="
                                            width: 60px;
                                            height: 60px;
                                            object-fit: cover;
                                            border-radius: 50%;
                                            border: 2px solid white;
                                            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
                                        "/>
                                    </div>
                                    <div class="col-9" style="padding: 0 8px;">
                                        <p style="
                                            margin: 0 0 4px 0;
                                            font-weight: 600;
                                            font-size: 15px;
                                            color: #333;
                                        ">${nama}</p>
                                        <p style="
                                            margin: 0 0 8px 0;
                                            color: #777;
                                            font-size: 13px;
                                        ">NIS: ${nis}</p>
                                        <small style="
                                            font-size: 1.5em;
                                            font-weight: bold;
                                            color: #27ae60;
                                            background: rgba(39, 174, 96, 0.1);
                                            padding: 0.25rem 0.5rem;
                                            border-radius: 4px;
                                            display: inline-block;
                                        ">Rp${formatRupiah(balance)}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                            
						<table class="table table-bordered" style="border-radius:10px!important;">
							<tr><td colspan="2" class="text-center">Detail Transaksi</td></tr>
							<tr>
								<td>Sub Total</td>
								<td class="text-end">Rp ${formatRupiah(total)}</td>
							</tr>
							<tr>
                                <td>Biaya Admin</td>
                                <td class="text-end">
                                    Rp${parseInt(total) <= 2000 ? '0' : formatRupiah(beaAdmin.toString())}
                                </td>
                            </tr>
                            <tr>
                                <td>Total</td>
                                <td class="text-end">
                                    <h4 class="text-end" style="margin:0;padding:0;font-weight:bolder;">
                                        Rp ${formatRupiah((parseInt(total) + (parseInt(total) <= 2000 ? 0 : parseInt(beaAdmin))).toString())}
                                    </h4>
                                </td>
                            </tr>
						</table>
						
						
					</div>
					</div>
				`);
			}
            
            $("#textToCard2").on("keydown",function search(e) {
                if(e.keyCode == 13) {
                    lockCheck();
                }
            });
            
            function openNextDialogPembelianDenganMenu(nama, nis, balance,foto){
				nominal_belanja = '0';
				let totalTransaksi = $('#totalTagihan').html();
				
                let jumlahTotal = 0;
                invoiceText.map((mapping, i) => {
                    jumlahTotal += parseInt(mapping.totalHarga);
                });
				nominal_belanja = jumlahTotal;

                $('#textToCard2').val('');
				
				// $('#modalSetCard').modal('toggle');
				$('#transaksiNext').modal('toggle');
				
				let val = $('#textToCard').val();

				$('#transaksiNext').on('shown.bs.modal', function () {
					$('#textToCard2').focus();
				});
				$('.detailTransaksi').html(`
					<div class="jumbotron jumbotron-fluid">
					<div class="container">

                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 text-center pb-3">
                                        Data Pemilik Kartu
                                    </div>
                                    <div class="col-6 text-center" style="border-right:1px solid #dee2e6">
                                        <img src="${foto}" style="width:77px; height:77px; object-fit:cover;border-radius:100px;"/>
                                    </div>
                                    <div class="col-6">
                                        <p style="margin:0;padding:0;font-weight:bold;">${nama}</p>
                                        <small>NIS : ${nis}</small><br/>
                                        <small>Saldo : Rp${formatRupiah(balance)}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                            
						<table class="table table-bordered" style="border-radius:10px!important;">
							<tr><td colspan="2" class="text-center">Detail Transaksi</td></tr>
							<tr>
								<td>Sub total transaksi</td>
								<td class="text-end">${totalTransaksi}</td>
							</tr>
							<tr>
								<td>Sub total bea admin</td>
								<td class="text-end">Rp${formatRupiah(beaAdmin.toString())}</td>
							</tr>
							<tr>
								<td>TOTAL</td>
								<td class="text-end"><h4 class="text-end" style="margin:0;padding:0;font-weight:bolder;"">${formatRupiah((parseInt(nominal_belanja)+parseInt(beaAdmin)).toString())}</h4></td>
							</tr>
						</table>
						
						
					</div>
					</div>
				`);
			}

            let trxspeed_id = '';

            function commitTransaction(){

                //SET MULAI TRX TIME
                // waktu_mulai_trx  = new Date()
                //     .toISOString()
                //     .replace('T', ' ')
                //     .substring(0, 19);

                waktu_mulai_trx =moment(new Date()).format('YYYY-MM-DD HH:mm:ss');


				$('#btnSubmitTransaksi').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Memproses...');
				$('#btnSubmitTransaksi').attr('disabled', 'disabled');
                $('#btnSubmitTransaksi').css('cursor', 'not-allowed');

                var pin = $("#textToCard2").val();
				
                invoiceResultPrint = '';

                let arrStoreTransaksi = [];
				var form_data = new FormData();
				
                if(mode=='pembelian'){
                    form_data.append('shop', nominal_belanja);
                }else {
                    arrStoreTransaksi = [];

                    invoiceText.map((mapping, i) => {
                        let m = mapping.id;
                        let n = mapping.jumlahItem;
                        arrStoreTransaksi.push({
                            id_product: m.toString(),
                            jumlah: n.toString()
                        });
                    });
                    
					let jsonToStrings = JSON.stringify(arrStoreTransaksi);
					 
                    form_data.append('shop', jsonToStrings);
                }

				form_data.append('card', kode_kartu);

                if(isUseCard){
                    form_data.append('account_number', akun_number);    
                }
				form_data.append('pin', pin);
				form_data.append('client_secret', secret_code);
				
				let url = '';

				if(mode=='pembelian'){
                    if(tipe_kartu==1){
                        url = '<?= api_url(); ?>api/v3/trx/shop';
                    }else {
                        url = '<?= api_url(); ?>api/v22/trx';
                        form_data.append('limit_trx_setting', limit_trx_setting_value);
                    }				
				}else {
					url = '<?= api_url(); ?>api/v1/trx/shop';
				}
				
				const save = async (form_data) => {
					const posts = await axios.post(url, form_data, {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {
                        $('#btnSubmitTransaksi').html('Selesai');
						$('#btnSubmitTransaksi').attr('disabled', false);
						$('#btnSubmitTransaksi').css('cursor', 'pointer');

                        if(err.response.status==500||err.response.status==402){
                            Toastify({
                                text: 'Tekan tombol Selesai kembali! Bila perlu, ulang kembali proses tap kartu.',
                                duration: 3000,
                                close: true,
                                gravity: "top",
                                position: "right",
                                className: "infoMessage"
                            }).showToast();

                            requestSecret();

                            $('#btnSubmitTransaksi').html('Selesai');
                            $('#btnSubmitTransaksi').attr('disabled', false);
                            $('#btnSubmitTransaksi').css('cursor', 'pointer');

                        }


                        if(err.response.data.error=='error login kartu!'){
                            Toastify({
                                text: 'PIN Tidak Benar!',
                                duration: 3000,
                                close: true,
                                gravity: "top",
                                position: "right",
                                className: "errorMessage",

                            }).showToast();
                        }else if(err.response.data.error=='overload limit'){
                            Toastify({
                                text: 'Limit belanja harian!',
                                duration: 3000,
                                close: true,
                                gravity: "top",
                                position: "right",
                                className: "errorMessage",

                            }).showToast();
                        }else if(err.response.data.error=='insufficient balance.'){
                            Toastify({
                                text: 'Saldo kartu tidak cukup!',
                                duration: 3000,
                                close: true,
                                gravity: "top",
                                position: "right",
                                className: "errorMessage",

                            }).showToast();
                        }else {
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
                        }
                        
					});
					if (posts.status == 201 || posts.status == 200) {

                        // waktu_selesai_trx  = new Date()
                        //     .toISOString()
                        //     .replace('T', ' ')
                        //     .substring(0, 19);
                        waktu_selesai_trx = moment(new Date()).format('YYYY-MM-DD HH:mm:ss')

							Toastify({
								text: 'Transaksi berhasil!',
								duration: 3000,
								close: true,
								gravity: "top",
								position: "right",
								className: "successMessage",

							}).showToast();

							nominal_belanja = '0';
							kode_kartu = '';
                            $('#textToCard2').val('');
							$('#transaksiNext').modal('toggle');
							$('.display').val('');

                            invoiceResultPrint = posts.data.data;
                            openInvoiceModalV21();

                            console.log("trx time : ", waktu_mulai_trx,waktu_selesai_trx);
                            setKodetrxspeed();

                        $('#btnSubmitTransaksi').html('Selesai');
						$('#btnSubmitTransaksi').attr('disabled', false);
						$('#btnSubmitTransaksi').css('cursor', 'pointer');

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
						$('#btnSubmitTransaksi').html('Selesai');
						$('#btnSubmitTransaksi').attr('disabled', false);
						$('#btnSubmitTransaksi').css('cursor', 'pointer');
					}
				}

				save(form_data);

			}

            function runAgainTrxSpeedTrack(id){
				const save2 = async () => {
					const posts2 = await axios.get('<?= api_url(); ?>api/time-execute/end/'+id, {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {
						console.log("Error create token");
                        // requestSecret();
					});

				}
				save2();
			}
			
            
            function commitTransactionWithNominal(){
				
                var pin = $("#textToCard5").val();
				
                invoiceResultPrint = '';

                let arrStoreTransaksi = [];
				var form_data = new FormData();


                if(nominal_belanja==='0'){
                    Toastify({
                        text: 'Nominal transaksi belum terpilih!',
                        duration: 3000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        className: "infoMessage"
                    }).showToast();
                    return false;
                }

				
                form_data.append('shop', nominal_belanja);

				form_data.append('card', kode_kartu_kustdebit);
				form_data.append('pin', pinvalue);
				form_data.append('client_secret', secret_code);
				
				const save = async (form_data) => {
					const posts = await axios.post('<?= api_url(); ?>api/v2/trx/shop', form_data, {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {
                        
                        if(err.response.status==500||err.response.status==402){
                            Toastify({
                                text: 'Proses transaksi GAGAL! Scan ulang kartu kembali',
                                duration: 3000,
                                close: true,
                                gravity: "top",
                                position: "right",
                                className: "infoMessage"
                            }).showToast();

                            requestSecret();

                            $('#textToCard5').blur();
                            $('#textToCard5').focus();

                            putFocusScanCard5();
                        }


                        if(err.response.data.error=='error login kartu!'){
                            Toastify({
                                text: 'PIN Tidak Benar!',
                                duration: 3000,
                                close: true,
                                gravity: "top",
                                position: "right",
                                className: "errorMessage",

                            }).showToast();
                        }else if(err.response.data.error=='overload limit'){
                            Toastify({
                                text: 'Limit belanja harian!',
                                duration: 3000,
                                close: true,
                                gravity: "top",
                                position: "right",
                                className: "errorMessage",

                            }).showToast();
                        }else if(err.response.data.error=='insufficient balance.'){
                            Toastify({
                                text: 'Saldo kartu tidak cukup!',
                                duration: 3000,
                                close: true,
                                gravity: "top",
                                position: "right",
                                className: "errorMessage",

                            }).showToast();
                        }else {
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
                        }
                        
					});
					if (posts.status == 201) {

						if (posts.data.status == true) {
							
							Toastify({
								text: 'Transaksi berhasil!',
								duration: 3000,
								close: true,
								gravity: "top",
								position: "right",
								className: "successMessage",

							}).showToast();

							nominal_belanja = '0';
							kode_kartu = '';
                            $('#modalKonfirmTransaksiWithNominal').modal('toggle');

                            invoiceResultPrint = posts.data.data;
                            openInvoiceModal();
                            
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

				save(form_data);

			}

            $('#btnNextPayment').on('click', function() {
                if ($('#totalTagihan').text() == 'Rp 0') {
                    Toastify({
                        text: 'Keranjang masih kosong!',
                        duration: 3000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        className: "infoMessage",

                    }).showToast();
                } else {
                    mode = 'pembelianDenganMenu';
                    submitPembelianMenu(mode);
                }
            });

            function putfocusTotextToCard2(){
             $('#textToCard2').focus();
            }

            function submitPembelianMenu(str){
                if ($('#totalTagihan').text() == 'Rp 0') {
                    Toastify({
                        text: 'Pembelian masih kosong!',
                        duration: 3000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        className: "infoMessage",

                    }).showToast();
                    return false;
                }
                requestSecret();
                openNextDialogPembelianDenganMenu(namalengkap,nomoridentitas,saldopembeli,fotopembeli);
                if(usePINorNOT=='false'){
                    $('#textToCard2').val(pinvalue);
                    $('#textToCard2').css('display','none');
                    $('#textIndicator2').html('TRANSAKSI TIDAK MEMERLUKAN PIN!');
                }else {
                    // pinvalue = '';
                    $('#textToCard2').val('');
                    $('#textToCard2').css('display','block');
                    $('#textIndicator2').attr('style','display:block;');
                }
            }
            
            function openInvoiceModalV21(){

                console.log(invoiceResultPrint);
                let htmlx = '';

                // console.log(invoiceText);

                let listPembelian = '';

                htmlx = `
                    <div class="invoice-card" id="divToPRINT">
                        <div class="invoice-title">
                            <div id="main-title" style="display:block!important;">
                                <h4 style="margin-bottom:0;padding-bottom:0px; color:black!important;background: black;text-align: center;color: white!important;padding: 7px;">INVOICE</h4>
                                <span style=" color:black!important; display:block; font-size:15px!important; text-align:center;">${namalengkap}</span>
                            </div>
                            
                            <span id="date" style="text-align:center!important;">${moment(invoiceResultPrint.created_at).format('DD/MM/YYYY - HH:mm:ss')} WIB</span>
                            <span style="font-size:9px;color:grey;text-align:center!important;display:block;">${invoiceResultPrint.invoice}</span>
                        </div>
                        <div style="text-align:center;">
                        ${kantin_name}
                        <small style="display:block;color: rgba(0, 0, 0, 1);">${kantin_address}</small>
                        
                        </div>
                        
                        <div class="invoice-details">
                            <table class="invoice-table" style="width:100%;">
                            <thead>
                                <tr>
                                <td>PRODUK</td>
                                <td>JML</td>
                                <td>HARGA</td>
                                </tr>
                            </thead>
                            
                            <tbody class="detailTabelInvoice">
                                ${listPembelian}
                                <tr><td colspan="3">
                                    <div style="width:100%; height:5px;border-bottom: 0.5px dashed grey;"></div>
                                </td></tr>
                                
                                <tr class="calc-row">
                                <td colspan="2">Subtotal</td>
                                <td ${(tipe_transaksi_merchant!='default')?'class="harga"':''}>Rp${formatRupiah(invoiceResultPrint.total_order.toString())}</td>
                                </tr>
                                <tr class="calc-row">
                                <td colspan="2">Biaya adm.</td>
                                <td>Rp${formatRupiah(invoiceResultPrint.admin_fee.toString())}</td>
                                </tr>
                                <tr class="calc-row">
                                <td colspan="2">Total</td>
                                <td >Rp${formatRupiah(invoiceResultPrint.total_payment.toString())}</td>
                                </tr>
                                <tr><td colspan="3">
                                    <div style="width:100%; height:5px;border-bottom: 0.5px dashed grey;"></div>
                                </td></tr>
                                <tr class="calc-row">
                                <td colspan="2"><b>Sisa Saldo</b></td>
                                <td>Rp${formatRupiah(invoiceResultPrint.total_balance.toString())}</td>
                                </tr>

                                <tr><td colspan="3">
                                    <div style="width:100%; height:5px;border-bottom: 0.5px dashed grey; margin-top:15px;"></div>
                                </td></tr>

                            </tbody>
                            </table>
                        </div>
                        
                    </div>
                    <div class="invoice-card mt-4" style="min-height:auto!important;">
                        <div class="invoice-footer d-block text-center">
                            <button class="btn btn-sm btn-success" onclick="printDivNEW();" style="width:100%;padding:13px;box-shadow: 0px 2px 10px rgb(21 255 28 / 65%);border: 1px solid #FFF;border-radius: 100px;font-weight: 900;"><i class="bx bx-printer"></i> CETAK BUKTI </button>
                                <p style="margin:1em; padding:0px;">atau</p>
                            <button class="btn btn-sm " id="later" data-bs-dismiss="modal" aria-label="Close" style="background:transparent; border:none;display:block;text-align:center; margin:auto; box-shadow:none; margin-top:15px;text-decoration:underline;">Kembali ke halaman transaksi</button>
                        </div>
                    
                    </div>
                `;

                $('#invoiceModal .modal-body').html(htmlx);
                $('#invoiceModal').modal('toggle');

                if(mode=='pembelianDenganMenu'){
                    invoiceText = [];
                    setIsiInvoice(invoiceText);
                    setTotalInvoice();
                    
                }

                if(tipe_transaksi_merchant!='default'){
                    
                    let timerInterval;
                    Swal.fire({
                    title: "Printing Bills...",
                    html: "Akan dialihkan <b></b>ms lagi.",
                    timer: 2000,
                    timerProgressBar: true,
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                        const timer = Swal.getPopup().querySelector("b");
                        timerInterval = setInterval(() => {
                        timer.textContent = `${Swal.getTimerLeft()}`;
                        }, 100);
                    },
                    willClose: () => {
                        clearInterval(timerInterval);
                    }
                    }).then((result) => {
                    /* Read more about handling dismissals below */
                    if (result.dismiss === Swal.DismissReason.timer) {
                        // console.log("I was closed by the timer");
                        printDivNEW();
                        playSoundSuccess();

                        setTimeout(() => {
                            location.reload();
                        
                        }, 1500);
                    }
                    });
                    
                }
            }

            function openInvoiceModal(){
                let htmlx = '';

                console.log("ok",invoiceResultPrint);

                let listPembelian = '';

                invoiceText.map((mapping, i) => {
                    let hargaPembelianString = mapping.totalHarga;
                    listPembelian+=`
                        <tr class="row-data">
                            <td>${mapping.namaItem}</td>
                            <td id="unit">${mapping.jumlahItem}</td>
                            <td>Rp${formatRupiah(hargaPembelianString.toString())}</td>
                        </tr>
                    `;
                });

                htmlx = `
                    <div class="invoice-card" id="divToPRINT">
                        <div class="invoice-title">
                            <div id="main-title" style="display:block!important;">
                                <h4 style="margin-bottom:0;padding-bottom:0px; color:black!important;background: black;text-align: center;color: white!important;padding: 7px;">INVOICE</h4>
                                <span style="margin-top:4px; margin-bottom:4px; color:black!important; display:block; text-align:center; font-size:14px!important;">${invoiceResultPrint.balance.users.customers_name}</span>
                            </div>
                            
                            <span id="date">${moment(invoiceResultPrint.created_at).format('DD/MM/YYYY - HH:mm:ss')} WIB</span>
                            <span style="font-size:11px;">#${invoiceResultPrint.transaction.invoice}</span>
                        </div>
                        <div style="text-align:center;">
                        ${kantin_name}
                        <small style="display:block;color: rgba(0, 0, 0, 1);">${kantin_address}</small>
                        
                        </div>
                        
                        <div class="invoice-details">
                            <table class="invoice-table" style="width:100%;">
                            <thead>
                                <tr>
                                <td>PRODUK</td>
                                <td>JML</td>
                                <td>HARGA</td>
                                </tr>
                            </thead>
                            
                            <tbody class="detailTabelInvoice">
                                ${listPembelian}
                                <tr><td colspan="3">
                                    <div style="width:100%; height:5px;border-bottom: 0.5px dashed grey;"></div>
                                </td></tr>
                                
                                <tr class="calc-row">
                                <td colspan="2">Subtotal</td>
                                <td ${(tipe_transaksi_merchant!='default')?'class="harga"':''}>Rp${formatRupiah(invoiceResultPrint.transaction.total_spending.toString())}</td>
                                </tr>
                                <tr class="calc-row">
                                <td colspan="2">Biaya adm.</td>
                                <td>Rp${formatRupiah(invoiceResultPrint.transaction.admin_fee.toString())}</td>
                                </tr>
                                <tr class="calc-row">
                                <td colspan="2">Total</td>
                                <td >Rp${formatRupiah(invoiceResultPrint.transaction.total_payment.toString())}</td>
                                </tr>
                                <tr><td colspan="3">
                                    <div style="width:100%; height:5px;border-bottom: 0.5px dashed grey;"></div>
                                </td></tr>
                                <tr class="calc-row">
                                <td colspan="2"><b>Sisa Saldo</b></td>
                                <td>Rp${formatRupiah(invoiceResultPrint.balance.users.balance.toString())}</td>
                                </tr>

                                <tr><td colspan="3">
                                    <div style="width:100%; height:5px;border-bottom: 0.5px dashed grey; margin-top:15px;"></div>
                                </td></tr>

                            </tbody>
                            </table>
                        </div>
                        
                    </div>
                    <div class="invoice-card mt-4" style="min-height:auto!important;">
                        <div class="invoice-footer">
                            <button class="btn btn-sm btn-secondary" id="later" data-bs-dismiss="modal" aria-label="Close">Tutup</button>
                            <button class="btn btn-sm btn-primary" onclick="printDivNEW();"><i class="bx bx-printer"></i> CETAK BUKTI</button>
                        </div>
                    
                    </div>
                `;

                $('#invoiceModal .modal-body').html(htmlx);
                $('#invoiceModal').modal('toggle');

                if(mode=='pembelianDenganMenu'){
                    invoiceText = [];
                    setIsiInvoice(invoiceText);
                    setTotalInvoice();
                    
                }

                if(tipe_transaksi_merchant!='default'){
                    
                    let timerInterval;
                    Swal.fire({
                    title: "Printing Bills...",
                    html: "Akan dialihkan <b></b>ms lagi.",
                    timer: 2000,
                    timerProgressBar: true,
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                        const timer = Swal.getPopup().querySelector("b");
                        timerInterval = setInterval(() => {
                        timer.textContent = `${Swal.getTimerLeft()}`;
                        }, 100);
                    },
                    willClose: () => {
                        clearInterval(timerInterval);
                    }
                    }).then((result) => {
                    /* Read more about handling dismissals below */
                    if (result.dismiss === Swal.DismissReason.timer) {
                        // console.log("I was closed by the timer");
                        printDivNEW();
                        playSoundSuccess();

                        setTimeout(() => {
                            location.reload();
                        
                        }, 1500);
                    }
                    });
                    
                }
            }

			// ------------------------------------------------------------------------------------

			const display = document.querySelector(".display");
			const buttons = document.querySelectorAll("buttonmm");
			const specialChars = ["%", "*", "/", "-", "+", "="];
			let output = "";

			display.focus();

			//Define function to calculate based on button clicked.
			const calculate = (btnValue) => {
			display.focus();
			// if (btnValue === "=" && output !== "") {
			// 	//If output has '%', replace with '/100' before evaluating.
			// 	output = eval(output.replace("%", "/100"));
			// } 
            if (btnValue === "AC") {
				output = "";
			} else if (btnValue === "DEL") {
				//If DEL button is clicked, remove the last character from the output.
				output = output.toString().slice(0, -1);
			} 
			display.value = output;
			};

			//Add event listener to buttons, call calculate() on click.
			buttons.forEach((button) => {
			//Button click listener calls calculate() with dataset value as argument.
			button.addEventListener("click", (e) => calculate(e.target.dataset.value));
			});





			function requestSecret(){
				const save2 = async () => {
					const posts2 = await axios.get('<?= api_url(); ?>api/v1/key/create-trx', {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {
						console.log("Error create token");
                        // requestSecret();
					});

					if (posts2.status == 201) {
						secret_code = posts2.data.data.client_secret;

                        
					}
				}
				save2();
			}
			
            
            function requestSecretWithNominal(){
				const save2 = async () => {
					const posts2 = await axios.get('<?= api_url(); ?>api/v1/key/create-trx', {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {
						console.log("Error create token");
                    
					});

					if (posts2.status == 201) {
						secret_code = posts2.data.data.client_secret;
					}
				}
				save2();
			}
			
            
            function lockCheck(){

                var pin = $("#textToCard2").val();
                if(usePINorNOT!='false'){
                    if(pin != pinvalue){
                        Toastify({
                            text: 'PIN tidak benar!',
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            className: "infoMessage"
                        }).showToast();

                        $('#btnSubmitTransaksi').html('Selesai');
                        $('#btnSubmitTransaksi').attr('disabled', false);
                        $('#btnSubmitTransaksi').css('cursor', 'pointer');
                        return false;
                    }
                }

                $('#btnSubmitTransaksi').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Memproses...');
				$('#btnSubmitTransaksi').attr('disabled', 'disabled');
                $('#btnSubmitTransaksi').css('cursor', 'not-allowed');
                
				const save2 = async () => {
					const posts2 = await axios.get('<?= api_url(); ?>api/v1/key/lock-check', {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {
						if(err.response.status==500){
                            Toastify({
                                text: 'Tunggu sejenak, transaksi di titik lain sedang berlangsung!',
                                duration: 3000,
                                close: true,
                                gravity: "top",
                                position: "right",
                                className: "infoMessage"
                            }).showToast();

                            $('#btnSubmitTransaksi').html('Selesai');
                            $('#btnSubmitTransaksi').attr('disabled', false);
                            $('#btnSubmitTransaksi').css('cursor', 'pointer');
                        }
					});

					if (posts2.status == 201||posts2.status == 200) {
                        
						// secret_code = posts2.data.data.client_secret;
                        commitTransaction();

                        // setKodetrxspeed().then((kodetrxspeed) => {
                        //     trxspeed_id = kodetrxspeed;
                        // });  
					}
				}
				save2();
			}
            
            function lockCheckWithNominal(){

                var pin = $("#pinInput").val();

                $('#btnbtnbtn').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Memproses...');
				$('#btnbtnbtn').attr('disabled', 'disabled');
                $('#btnbtnbtn').css('cursor', 'not-allowed');

                if(usePINorNOT!='false'){
                    if(pin != pinvalue){
                        Toastify({
                            text: 'PIN tidak benar!',
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            className: "infoMessage"
                        }).showToast();

                        $('#btnbtnbtn').html('Lanjutkan');
                        $('#btnbtnbtn').attr('disabled', false);
                        $('#btnbtnbtn').css('cursor', 'pointer');
                        return false;
                    }
                }
                
				const save2 = async () => {
					const posts2 = await axios.get('<?= api_url(); ?>api/v1/key/lock-check', {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {
						if(err.response.status==500){
                            Toastify({
                                text: 'Tunggu sejenak, transaksi di titik lain sedang berlangsung!',
                                duration: 3000,
                                close: true,
                                gravity: "top",
                                position: "right",
                                className: "infoMessage"
                            }).showToast();

                            $('#textToCard5').blur();
                            $('#textToCard5').focus();

                            putFocusScanCard5();
                        }
					});

					if (posts2.status == 201||posts2.status == 200) {
                        
						// secret_code = posts2.data.data.client_secret;
                        
                        clearTimeout(timer);

                        let mmm = Math.floor(Math.random() * 1250) + 1;
                        

                        timer = setTimeout(() => {

                            commitTransactionWithNominal();

                            console.log(mmm);

                        }, mmm);
                        

                        
					}
				}
				save2();
			}



            function getAuthSeconds(){
				const save2 = async () => {
					const posts2 = await axios.get('<?= api_url(); ?>api/v2/usr', {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {

                        if(err.response.data.message=='Too Many Attempts.'){
                            Toastify({
                                text: 'Terlalu banyak proses. Perlambat aktifitas Anda. Refresh 10 detik kemudian.',
                                duration: 10000,
                                close: true,
                                gravity: "bottom",
                                position: "right",
                                className: "errorMessage",

                            }).showToast();
                            return false;
                        }
						Toastify({
							text: 'Maaf. Sesi telah berakhir. Silahkan login kembali.',
							duration: 30000,
							close: true,
							gravity: "bottom",
							position: "right",
							className: "errorMessage",

						}).showToast();

						setTimeout(function() {
							Toastify({
								text: 'Logout terlebih dahulu, lalu LOGIN kembali.',
								duration: 28500,
								close: true,
								gravity: "bottom",
								position: "right",
								className: "errorMessage",

							}).showToast();
						}, 1500);

						return false;
					});
			
					if (posts2.status == 200) {
                        
						if(posts2.data.data.kantin.pin_setting==0){
                            usePINorNOT = 'false';
                        }else {
                            usePINorNOT = 'true';
                        }

                        console.log("Gunakan PIN? : ",usePINorNOT);

                        setTimeout(() => {
                            $('#saldoTambah').focus();
                        }, 100);

                        
                    }
				}
				save2();
			}
            
            
            
            function getAuthSecondsWithNominal(){
				const save2 = async () => {
                    const posts2 = await axios.get('<?= api_url(); ?>api/v2/usr', {
                        headers: {
                            'Authorization': 'Bearer ' + localStorage.getItem('_token')
                        }
                    }).catch((err) => {
                        if (err.response.data.message == 'Too Many Attempts.') {
                            Toastify({
                                text: 'Terlalu banyak proses. Perlambat aktifitas Anda. Refresh 10 detik kemudian.',
                                duration: 10000,
                                close: true,
                                gravity: "bottom",
                                position: "right",
                                className: "errorMessage",
                            }).showToast();
                            return false;
                        }
                        Toastify({
                            text: 'Maaf. Sesi telah berakhir. Silahkan login kembali.',
                            duration: 30000,
                            close: true,
                            gravity: "bottom",
                            position: "right",
                            className: "errorMessage",
                        }).showToast();

                        setTimeout(function() {
                            Toastify({
                                text: 'Logout terlebih dahulu, lalu LOGIN kembali.',
                                duration: 28500,
                                close: true,
                                gravity: "bottom",
                                position: "right",
                                className: "errorMessage",
                            }).showToast();
                        }, 1500);

                        return false;
                    });

                    if (posts2.status == 200) {
                        usePINorNOT = posts2.data.data.kantin.pin_setting == 0 ? 'false' : 'true';
                        console.log("Gunakan PIN? : ", usePINorNOT);

                        // Show/hide PIN input based on setting
                        const pinContainer = document.getElementById('pinInputContainer');
                        if (usePINorNOT === 'true') {
                            pinContainer.style.display = 'block';
                        } else {
                            pinContainer.style.display = 'none';
                        }

                        requestSecretWithNominal();
                    }
                }
                save2();
			}
            
            
            function getAuthConf(){
				const save2 = async () => {
					const posts2 = await axios.get('<?= api_url(); ?>api/v2/usr', {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {

                        if(err.response.data.message=='Too Many Attempts.'){
                            Toastify({
                                text: 'Terlalu banyak proses. Perlambat aktifitas Anda. Refresh 10 detik kemudian.',
                                duration: 10000,
                                close: true,
                                gravity: "bottom",
                                position: "right",
                                className: "errorMessage",

                            }).showToast();
                            return false;
                        }
						Toastify({
							text: 'Maaf. Sesi telah berakhir. Silahkan login kembali.',
							duration: 30000,
							close: true,
							gravity: "bottom",
							position: "right",
							className: "errorMessage",

						}).showToast();

						setTimeout(function() {
							Toastify({
								text: 'Logout terlebih dahulu, lalu LOGIN kembali.',
								duration: 28500,
								close: true,
								gravity: "bottom",
								position: "right",
								className: "errorMessage",

							}).showToast();
						}, 1500);

						return false;
					});
			
					if (posts2.status == 200) {
                        
                        if(posts2.data.data.kantin.seller_type=='AKTIF'){
                            // openDialogScanNominal();
                            // tipe_transaksi_merchant = 'kustdebit';
                            
                            openDialogScanNominalByTap();
                            tipe_transaksi_merchant = 'kustdebitbytap';
                            
                        }else {
                            tipe_transaksi_merchant = 'default';
                            openDialogScan('pembelian');
                        }

                        $('.page-wrapper').css('opacity','1');

                        kantin_id = posts2.data.data.kantin.id;
                        kantin_name = posts2.data.data.kantin.nama_kantin;
                        kantin_address = posts2.data.data.kantin.alamat_lengkap;

                        beaAdmin = posts2.data.data.admin_fee.admin_fee_total;

                        limit_trx_setting_value = posts2.data.data.kantin.limit_trx_setting;
                        console.log('limit_trx_value',limit_trx_setting_value);
                        console.log('bea_admin',beaAdmin);

                        getMrnt();
                        
                    }
				}
				save2();
			}

            async function getClientInfo() {
                let datetime = getFormattedDatetime();
                let mmm = Math.floor(Math.random() * 1250) + 1;
                return `v22-${kantin_id}-${datetime}`;
            }

            function getFormattedDatetime() {
                const now = new Date();
                
                // Format individual components
                const year = now.getFullYear();
                const month = String(now.getMonth() + 1).padStart(2, '0');
                const day = String(now.getDate()).padStart(2, '0');
                const hours = String(now.getHours()).padStart(2, '0');
                const minutes = String(now.getMinutes()).padStart(2, '0');
                const seconds = String(now.getSeconds()).padStart(2, '0');
                const milliseconds = String(now.getMilliseconds()).padStart(3, '0');

                // Combine into formatted string (YYYY-MM-DD HH:MM:SS.mmm)
                return `${year}${month}${day}-${hours}${minutes}${seconds}.${milliseconds}`;
            }
            
            async function setKodetrxspeed() {
                // Get client info first
                const clientInfo = await getClientInfo(); 

                // Prepare form data
                var form_data = new FormData();
                form_data.append('instansi_id', localStorage.getItem('_instansi_id'));
                form_data.append('name', clientInfo); // Use the obtained client info
                form_data.append('starts', waktu_mulai_trx); // Use the obtained client info
                form_data.append('ends', waktu_selesai_trx); // Use the obtained client info

                // Function to send data
                const save = async (form_data) => {
                    try {
                        const response = await axios.post('<?= api_url(); ?>api/time-execute/exec', form_data, {
                            headers: {
                                'Authorization': 'Bearer ' + localStorage.getItem('_token')
                            }
                        });

                        console.log("Data sent successfully:", response.data);
                    } catch (err) {
                        console.error("Error sending data:", err);
                    }
                }

                // Call the save function
                await save(form_data);

                // Return client info
                return clientInfo;
            }


            function setVal(str){
                $('#saldoTambah').val(formatRupiah(str));
            }

            function playSound() {
            // Create an Audio object
            var audio = new Audio('<?=base_url();?>assets_oncard/sound/error-2-126514.mp3'); // Replace with the path to your sound file

            // Play the audio
            audio.play();
            }
            
            function playSoundSuccess() {
            // Create an Audio object
            var audio = new Audio('<?=base_url();?>assets_oncard/sound/success.mp3'); // Replace with the path to your sound file

            // Play the audio
            audio.play();
            }

		</script>


<script>
  let balanceVisible = false; // Default hidden
  let balanceVisible2 = false; // Default hidden
  
  function toggleBalance() {
    const valueElement = document.getElementById('balanceValue');
    const iconElement = document.getElementById('balanceIcon');
    
    balanceVisible = !balanceVisible;
    
    if (balanceVisible) {
      valueElement.style.color = '#27ae60';
      valueElement.style.textShadow = 'none';
      valueElement.textContent = `Rp${formatRupiah(saldopembeli)}`;
      iconElement.className = 'bx bx-hide';
    } else {
      valueElement.style.color = 'transparent';
      valueElement.style.textShadow = '0 0 8px rgba(0,0,0,0.3)';
      valueElement.textContent = '•••••••';
      iconElement.className = 'bx bx-show';
    }
  }
  
  function toggleBalance2() {
    const valueElement = document.getElementById('balanceValue2');
    const iconElement = document.getElementById('balanceIcon2');
    
    balanceVisible2 = !balanceVisible2;
    
    if (balanceVisible2) {
      valueElement.style.color = '#27ae60';
      valueElement.style.textShadow = 'none';
      valueElement.textContent = `Rp${formatRupiah(saldopembeli)}`;
      iconElement.className = 'bx bx-hide';
    } else {
      valueElement.style.color = 'transparent';
      valueElement.style.textShadow = '0 0 8px rgba(0,0,0,0.3)';
      valueElement.textContent = '•••••••';
      iconElement.className = 'bx bx-show';
    }
  }
  
  // Format currency function (example)
  function formatRupiah(amount) {
    return new Intl.NumberFormat('id-ID').format(amount);
  }
</script>