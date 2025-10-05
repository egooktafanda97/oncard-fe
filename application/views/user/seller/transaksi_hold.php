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
        background:url(https://img.freepik.com/free-vector/gray-line-drawings-organic-shapes-background_1409-3947.jpg?w=1800&t=st=1699762516~exp=1699763116~hmac=64dc5de79b674a3642320b00d960818d173f816fd629a5ebe3c749e7cdf907f0);
        background-size:270px 150px;
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

    
</style>
<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
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
                        
						<div class="tab-content" id="pills-tabContent">
							<div class="tab-pane fade  active show" id="primary-pills-home" role="tabpanel">
								<div class="row">
									<div class="col-lg-6 col-12 mb-3">
										<input type="number" class="display" id="saldoTambah" oninput="setVal(this.value);" autocomplete="off"  />
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
											<button type="button" class="btn btn-success" data-value="" onclick="submitPembelian('pembelian');" style="width:100%;padding:13px;">SELESAIKAN TRANSAKSI</button>
											
									</div>
								</div>
							</div>
							<div class="tab-pane fade " id="primary-pills-profile" role="tabpanel">
                                <div class="row">
                                    <div class="col-lg-6 col-12 mb-2">
                                        <div class="card">
                                            <div class="card-body">
                                                <font style="font-size:1.25em;display:block;" class="text-dark">
                                                    <b>Order</b> Menu
                                                    <!--<small style="display:block; font-size:.67em;">Kode Transaksi : <b>4049281</b></small>-->
                                                </font>

                                                <div class="row" id="invoiceSide" style="padding:14px; padding-right:0px; margin-right:0px;">
												<img src="<?=base_url();?>assets_oncard/images/empty_cart.png" style="width:150px; height:150px; margin:auto; display:block; object-fit:cover; object-position:center;"/>
                                                </div>
                                                <div class="row text-center">
                                                    <div class="col-md-6 col-lg-6 col-6 text-right">
                                                        Total
                                                    </div>
                                                    <div class="col-md-6 col-lg-6 col-6 text-right" id="totalTagihan" style="font-weight:bold; padding-bottom:0px;">Rp 0</div>
                                                    <button type="button" class="btn btn-danger mt-4 mb-5" id="btnNextPayment" style="width:50%;margin:auto;padding:.5em;">Bayar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-12 mb-2">
                                        <div class="card">
                                            <div class="card-body">
            
                                                <input type="text" id="searchThisPage" class="form-control" style="height:40px;" placeholder="Cari item">
                                                <i class="bx bx-trash btn-dark text-danger" onclick="emptySearchText()" style="position:absolute; right:25px;padding:4px;padding-left:8px; padding-right:8px; background:#f2f2f2; border-radius:5px; top:23px;"></i>
                                            
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                                <input type="hidden" name="cekUs" id="cekUs">
                                                <font style="font-size:1.25em;display:block;" class="text-dark">
                                                    <b>Pilih</b> Menu
                                                </font>

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
				<div class="modal-content"  style="border:none!important;">
					<div class="modal-header" style="border:none!important;">
						<h5 class="modal-title"></h5>
                        <div>
                        <button type="button" onclick="window.location.href='<?=base_url();?>CPanel_Admin';" class="btn btn-sm btn-outline-secondary me-2"><i class="bx bx-home" style="margin-right:0px!important;"></i></button>
                        <button type="button" onclick="location.reload();"class="btn btn-sm btn-outline-secondary"><i class="bx bx-refresh" style="margin-right:0px!important;"></i></button>
                        </div>
                    </div>
					<div class="modal-body text-center" style="border:none!important;" id="kart" onclick="putFocusScanCard();" >
                        <h6>Pindai Kartu</h6>
						Indikator dibawah ini harus bergaris <font class="text-success">hijau</font> dulu.
						<small class="text-muted"><i><br/>Apabila garis hijau belum muncul, klik pada gambar dibawah ini untuk mengaktifkan indikator tersebut!</i></small>
						<br/>
						
						<img id="scanCard" src="<?=base_url();?>assets_oncard/images/scan_kard2.webp"  style="width:100px;  margin:auto; border-radius:20px; display:block; margin-top:15px; margin-bottom:15px;"/>
						<p class="text-center" id="textIndicator" style="margin:auto; transform:scale(0);transition:all 0.2s linear 0s;padding:5px; padding-left:25px; padding-right:25px; font-size:14px; border-radius:100px; background:#53edaa; color:#fff;"></p>
						<input type="number" style="transform:scale(0)!important; margin:auto; text-align:center; width:100%; border:none;outline:none!important;" id="textToCard"/>
						
					</div>
					<div class="modal-footer text-center" style="border:none!important;" onclick="putFocusScanCard();" >
						<!-- <button type="button" id="btnConnectToCard" style="display:block;margin:auto;" data-value="=" class="btn btn-outline-primary">Status</button> -->
					</div>
				</div>
			</div>
		</div>
		
        
        <div class="modal fade" id="modalSetCardWithNominal" tabindex="-1" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content"  style="border:none!important;">
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
						
						<img id="scanCard4" src="<?=base_url();?>assets_oncard/images/scan_kard2.webp"  style="width:100px;  margin:auto; border-radius:20px; display:block; margin-top:15px; margin-bottom:15px;"/>
						<p class="text-center" id="textIndicator4" style="margin:auto; transform:scale(0);transition:all 0.2s linear 0s;padding:5px; padding-left:25px; padding-right:25px; font-size:14px; border-radius:100px; background:#53edaa; color:#fff;"></p>
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
				<div class="modal-content"  style="border:none!important;">
					<div class="modal-header" style="border:none!important;">
						<i>- Langkah 3</i>
                        <div>
                        <button type="button" onclick="window.location.href='<?=base_url();?>CPanel_Admin';" class="btn btn-sm btn-outline-secondary me-2"><i class="bx bx-home" style="margin-right:0px!important;"></i></button>
                        <button type="button" onclick="location.reload();" class="btn btn-sm btn-outline-secondary"><i class="bx bx-refresh" style="margin-right:0px!important;"></i></button>
                        </div>
                    </div>
					<div class="modal-body text-center" style="border:none!important;" onclick="putFocusScanCard5();" >
                        <strong>Nominal Pembelian :</strong>
                        <code>
                        <h1 class="nominalTrx" style="font-weight:bolder;"></h1>
                        </code>
                        <div class="putContentPembeliHereWithNominal"></div>
                        </hr>
                        <h4>Apakah Anda Yakin<br/><font style="font-size:25px;">Melanjutkan Proses Ini?</font></h4>
						
                        <br/>

                        <div class="row">
                            <div class="col-lg-4 col-4 text-start">
                            <button onclick="location.reload();" type="button" class="btn btn-outline-danger btn-lg round-15">Batal</button>
                            </div>
                            <div class="col-lg-8 col-8">
                            <button type="button" onclick="lockCheckWithNominal();" style="width:100%;" class="btn btn-success btn-lg round-15">Lanjutkan</button>
                            </div>
                        </div>
                        
                        
						
						<!-- <img id="scanCard5" src="<?=base_url();?>assets_oncard/images/scan_kard2.webp"  style="width:100px;  margin:auto; border-radius:20px; display:block; margin-top:15px; margin-bottom:15px;"/>
						<p class="text-center" id="textIndicator5" style="margin:auto; transform:scale(0);transition:all 0.2s linear 0s;padding:5px; padding-left:25px; padding-right:25px; font-size:14px; border-radius:100px; background:#53edaa; color:#fff;"></p>
						<input type="number" style="transform:scale(0)!important; margin:auto; text-align:center; width:100%; border:none;outline:none!important;" id="textToCard5"/> -->
						
					</div>
					<div class="modal-footer text-center" style="border:none!important;" onclick="putFocusScanCard5();" >
						<!-- <button type="button" id="btnConnectToCard" style="display:block;margin:auto;" data-value="=" class="btn btn-outline-primary">Status</button> -->
					</div>
				</div>
			</div>
		</div>
		
        
        <div class="modal fade" id="modalScanNominal" tabindex="-1" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content"  style="border:none!important;">
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
						
						<img id="scanCard3" src="<?=base_url();?>assets_oncard/images/nominal.png"  style="width:100px;  margin:auto; border-radius:20px;padding:10px; display:block; margin-top:15px; margin-bottom:15px;"/>
						<p class="text-center" id="textIndicator3" style="margin:auto; transform:scale(0);transition:all 0.2s linear 0s;padding:5px; padding-left:25px; padding-right:25px; font-size:14px; border-radius:100px; background:#53edaa; color:#fff;"></p>
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
				<div class="modal-content"  style="border:none!important;">
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
        
        <div class="modal fade" id="modalSetNominalByTapHold" tabindex="-1" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content"  style="border:none!important;">
					<div class="modal-header" style="border:none!important;">
                    <i>UNDER MAINTANANCE</i>
                        <div>
                        <button type="button" onclick="window.location.href='<?=base_url();?>CPanel_Admin';" class="btn btn-sm btn-outline-secondary me-2"><i class="bx bx-home" style="margin-right:0px!important;"></i></button>
                        <button type="button" onclick="location.reload();"class="btn btn-sm btn-outline-secondary"><i class="bx bx-refresh" style="margin-right:0px!important;"></i></button>
                        </div>
                    </div>
					<div class="modal-body text-center" style="border:none!important;background:#fcfcfd">
                    <img src="https://cdnl.iconscout.com/lottie/premium/thumb/website-under-maintenance-5690953-4747761.gif" style="display:block; width:300px;text-align:center;margin:auto;" />
                    Sedang dalam perbaikan, tunggu sebentar.
					</div>
				</div>
			</div>
		</div>
		
		<div class="modal fade" id="transaksiNext" tabindex="-1" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
			<div class="modal-dialog modal-dialog-centered" style="border:none!important;">
				<div class="modal-content" style="border:none!important;">
					<div class="modal-header" style="border:none!important;">
						<h5 class="modal-title">Konfirmasi Transaksi</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" data-value="="></button>
					</div>
					<div class="modal-body" style="border:none!important;">
                    
						<div class="detailTransaksi" onclick="putFocusScanCard2();"></div>
						
						<p class="text-center" id="textIndicator2" style="margin:auto; transform:scale(1);transition:all 0.2s linear 0s;padding:5px; padding-left:25px; padding-right:25px; font-size:14px; border-radius:100px; background:#53edaa; color:#fff;">PIN</p>
						<input type="password" data-lpignore="true" autocomplete="aus" pattern="[0-9]*" inputmode="numeric" style="transform:scale(1)!important; margin:auto; text-align:center; width:100%; letter-spacing:10px; border:none;outline:none!important;" id="textToCard2"/>
						
					</div>
					<div class="modal-footer text-center" style="border:none!important;">
						<button type="button" onclick="lockCheck();" id="btnSubmitTransaksi" style="display:block;margin:auto;" data-value="" class="btn btn-success">Selesai</button>
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
		<script type="text/javascript">

            $('.page-wrapper').css('opacity','0');
			let mode = '';
			let secret_code = '';
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
            let fotopembeli = '';
            let pinvalue = '';
            
            let usePINorNOT = '';

			$(document).ready(function () {

                getAuthConf();
                
                $('.page-wrapper').css('opacity','0');
                
            });
			
            function loadMenu(){
				let tableColumn = '';
				const save2 = async () => {
					const posts2 = await axios.get('<?= api_url(); ?>api/v1/produk', {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {
						console.log(err.response);
					});
			
					if (posts2.status == 200) {
							tableColumn = '';
                            let sintaks = '';

                            $('#putBtnFilter').html('');

                            if(posts2.data.data.data.length==0){
								tableColumn +=`<div class="text-center">Tidak ada data.</div>`;
								$('.listitems').html(tableColumn);return false;
							}
							posts2.data.data.data.map((mapping, i) => {
                                sintaks += `
                                <div class="col-md-3 col-lg-3 col-sm-4 col-6 text-center itemnya" onclick="addToCart('${mapping.id}')" style="padding:7px;">
                                    <div class="card-body" style="padding:0px;margin:0px;border:1px solid #ccc; border-radius:10px;padding-bottom:10px;">
                                    <img src="https://png.pngtree.com/png-vector/20190726/ourlarge/pngtree-food-icon-design-vector-png-image_1608882.jpg" width="70%" style="display:block;margin:auto;"/>
                                    <p style="font-size:14px;font-weight:bold;color:#000;line-height:1em;padding-left:.2em;padding-right:.2em;">${mapping.nama_produk}</p>
                                    <p style="font-size:11px;color:#636363;margin-top:-17px; margin-bottom:10px;">${"Rp "+formatRupiah(mapping.harga)}</p>
                                    </div>
                                </div>
                                `;
                            });

                            $('.listitems').html(sintaks);
							
					}
				}
				save2();				
			}
            
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

                const save = async () => {
                    const posts = await axios.get('<?= api_url(); ?>api/v1/produk/search?q='+searchText, {
                        headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
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
				
				// $('#modalSetCard').modal('toggle');
				$('#modalSetNominalByTapHold').modal('toggle');
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
                // $('#modalSetNominalByTap').modal('toggle');
                $('#modalSetNominalByTapHold').modal('toggle');
                // getDataNominal();
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
				$('#textIndicator').attr('style','transform:scale(1);transition:all 0.2s linear 0s;padding:5px; padding-left:25px; padding-right:25px; font-size:14px; border-radius:100px; background:#53edaa; color:#fff; display:table; text-align:center; margin:auto;');
				$('#textIndicator').html('Alat scan ready!');
				$('#scanCard').attr('style','border:5px solid #53edaa;width:100px;  margin:auto; border-radius:20px; display:block; margin-top:15px; margin-bottom:15px; transition:all 0.2s linear 0s;');
			});
			$('#textToCard').blur(function(){
				console.log('input tidak fokus');
				$('#textToCard').val('');
				$('#textIndicator').attr('style','transform:scale(1);transition:all 0.2s linear 0s;padding:5px; padding-left:25px; padding-right:25px; font-size:14px; border-radius:100px; background:red; color:#fff;display:table;  text-align:center;margin:auto;');
				$('#textIndicator').html('Klik disini untuk dapat memulai scan kartu!');
				$('#scanCard').attr('style','width:100px;  margin:auto; border-radius:20px; display:block; margin-top:15px; margin-bottom:15px; transition:all 0.2s linear 0s;');
                
			});
			
            function putFocusScanCard(){
				$('#textToCard').focus();
				$('#scanCard').attr('style','border:5px solid #53edaa;width:100px;  margin:auto; border-radius:20px; display:block; margin-top:15px; margin-bottom:15px; transition:all 0.2s linear 0s;');
			}
			
			$("#textToCard2").focus(function(){
				console.log('input sedang fokus');
                if(usePINorNOT=='true'){
                    $('#textIndicator2').attr('style','transform:scale(1);transition:all 0.2s linear 0s;padding:5px; padding-left:25px; padding-right:25px; font-size:14px; border-radius:100px; background:#53edaa; color:#fff; display:table; text-align:center; margin:auto;');
                    $('#textIndicator2').html('Masukkan PIN!');
                }else {
                    $('#textIndicator2').attr('style','transform:scale(0);transition:all 0.2s linear 0s;padding:5px; padding-left:25px; padding-right:25px; font-size:14px; border-radius:100px; background:#53edaa; color:#fff; display:table; text-align:center; margin:auto;');
                }
			});
			$('#textToCard2').blur(function(){
				console.log('input tidak fokus');
				$('#textIndicator2').attr('style','transform:scale(1);transition:all 0.2s linear 0s;padding:5px; padding-left:25px; padding-right:25px; font-size:14px; border-radius:100px; background:#53edaa; color:#fff;display:table;  text-align:center;margin:auto;');
				
			});

			function putFocusScanCard2(){
				$('#textToCard2').focus();
			}

            

            $("#textToCard3").focus(function(){
				console.log('input sedang fokus');
				$('#textIndicator3').attr('style','transform:scale(1);transition:all 0.2s linear 0s;padding:5px; padding-left:25px; padding-right:25px; font-size:14px; border-radius:100px; background:#53edaa; color:#fff; display:table; text-align:center; margin:auto;');
				$('#textIndicator3').html('Alat scan ready!');
				$('#scanCard3').attr('style','border:5px solid #53edaa;width:100px; padding:10px; margin:auto; border-radius:20px; display:block; margin-top:15px; margin-bottom:15px; transition:all 0.2s linear 0s;');
			});
			$('#textToCard3').blur(function(){
				console.log('input tidak fokus');
				$('#textToCard3').val('');
				$('#textIndicator3').attr('style','transform:scale(1);transition:all 0.2s linear 0s;padding:5px; padding-left:25px; padding-right:25px; font-size:14px; border-radius:100px; background:red; color:#fff;display:table;  text-align:center;margin:auto;');
				$('#textIndicator3').html('Klik disini untuk dapat memulai scan kartu!');
				$('#scanCard3').attr('style','width:100px;  margin:auto; border-radius:20px;padding:10px; display:block; margin-top:15px; margin-bottom:15px; transition:all 0.2s linear 0s;');
                
			});
            function putFocusScanCard3(){
				$('#textToCard3').focus();
				$('#scanCard3').attr('style','border:5px solid #53edaa;width:100px;padding:10px;  margin:auto; border-radius:20px; display:block; margin-top:15px; margin-bottom:15px; transition:all 0.2s linear 0s;');
			}
			

            $("#textToCard4").focus(function(){
				console.log('input sedang fokus');
				$('#textIndicator4').attr('style','transform:scale(1);transition:all 0.2s linear 0s;padding:5px; padding-left:25px; padding-right:25px; font-size:14px; border-radius:100px; background:#53edaa; color:#fff; display:table; text-align:center; margin:auto;');
				$('#textIndicator4').html('Alat scan ready!');
				$('#scanCard4').attr('style','border:5px solid #53edaa;width:100px;  margin:auto; border-radius:20px; display:block; margin-top:15px; margin-bottom:15px; transition:all 0.2s linear 0s;');
			});
			$('#textToCard4').blur(function(){
				console.log('input tidak fokus');
				$('#textToCard4').val('');
				$('#textIndicator4').attr('style','transform:scale(1);transition:all 0.2s linear 0s;padding:5px; padding-left:25px; padding-right:25px; font-size:14px; border-radius:100px; background:red; color:#fff;display:table;  text-align:center;margin:auto;');
				$('#textIndicator4').html('Klik disini untuk dapat memulai scan kartu!');
				$('#scanCard4').attr('style','width:100px;  margin:auto; border-radius:20px; display:block; margin-top:15px; margin-bottom:15px; transition:all 0.2s linear 0s;');
                
			});
            function putFocusScanCard4(){
				$('#textToCard4').focus();
				$('#scanCard4').attr('style','border:5px solid #53edaa;width:100px;padding:10px;  margin:auto; border-radius:20px; display:block; margin-top:15px; margin-bottom:15px; transition:all 0.2s linear 0s;');
			}
            
            $("#textToCard5").focus(function(){
				console.log('input sedang fokus');
				$('#textIndicator5').attr('style','transform:scale(1);transition:all 0.2s linear 0s;padding:5px; padding-left:25px; padding-right:25px; font-size:14px; border-radius:100px; background:#53edaa; color:#fff; display:table; text-align:center; margin:auto;');
				$('#textIndicator5').html('Alat scan ready!');
				$('#scanCard5').attr('style','border:5px solid #53edaa;width:100px;  margin:auto; border-radius:20px; display:block; margin-top:15px; margin-bottom:15px; transition:all 0.2s linear 0s;');
			});
			$('#textToCard5').blur(function(){
				console.log('input tidak fokus');
				$('#textToCard5').val('');
				$('#textIndicator5').attr('style','transform:scale(1);transition:all 0.2s linear 0s;padding:5px; padding-left:25px; padding-right:25px; font-size:14px; border-radius:100px; background:red; color:#fff;display:table;  text-align:center;margin:auto;');
				$('#textIndicator5').html('Klik disini untuk dapat memulai scan kartu!');
				$('#scanCard5').attr('style','width:100px;  margin:auto; border-radius:20px; display:block; margin-top:15px; margin-bottom:15px; transition:all 0.2s linear 0s;');
                
			});
            function putFocusScanCard5(){
				$('#textToCard5').focus();
				$('#scanCard5').attr('style','border:5px solid #53edaa;width:100px;padding:10px;  margin:auto; border-radius:20px; display:block; margin-top:15px; margin-bottom:15px; transition:all 0.2s linear 0s;');
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
							searchSiswaByKartu(mx);
						}
						
						// getSiswaData($('#textToCard').val());
					}else {
						console.log('NEED AN API TO GET SALDO SISWA BY KODE KARTU');
					}
				}, 1500);
			});
            
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

			

            function submitPembelian(str){
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
						$('#textToCard').blur();
                        return false;
					});
					if (posts2.status == 200) {

                        $('#textIndicator').html('Alat scan ready!');

                        if(posts2.data.status==false){
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

                        tipe_kartu = posts2.data.data.debts_card;
                        pinvalue = posts2.data.data.pin;
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
                                                <small>${nomoridentitas} | Rp${formatRupiah(saldopembeli)}</small>
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
                            requestSecret();
                            // getConfigBsns();
                            getAuthSeconds();

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
                                            <small>${nomoridentitas} | Rp${formatRupiah(saldopembeli)}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `);

                        // loadMenu();
                        requestSecret();
                        // getConfigBsns();
                        // getAuthSeconds();
                        
                        
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
                    
                    nominal_belanja = '';
                    let htmlx= '<div class="row">';

                    posts2.data.map((mapping, i) => {
                        htmlx+=`
                            <div class="col-lg-6 col-md-6 col-sm-6 prevent-select radius-30 col-6 text-center" onclick="setNominalValue(${mapping.values})">
                                <div class="card">
                                    <div class="card-body">
                                    <small>Nominal</small>
                                    <h2>Rp${formatRupiah(mapping.values)}</h2>    
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
                                        <small>Saldo : Rp${formatRupiah(balance)}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                            
						<table class="table table-bordered" style="border-radius:10px!important;">
							<tr><td colspan="2" class="text-center">Detail Transaksi</td></tr>
							<tr>
								<td>Sub total transaksi</td>
								<td class="text-end">Rp ${formatRupiah(total)}</td>
							</tr>
							<tr>
								<td>Sub total bea admin</td>
								<td class="text-end">Rp${formatRupiah(beaAdmin.toString())}</td>
							</tr>
							<tr>
								<td>TOTAL</td>
								<td class="text-end"><h4 class="text-end" style="margin:0;padding:0;font-weight:bolder;"">Rp ${formatRupiah((parseInt(total)+parseInt(beaAdmin)).toString())}</h4></td>
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

			function commitTransaction(){
				$('#btnSubmitTransaksi').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Memproses...');
				$('#btnSubmitTransaksi').attr('disabled', 'disabled');
                $('#btnSubmitTransaksi').css('cursor', 'not-allowed');
				
				var pin = $("#textToCard2").val();

                console.log(pin, "pinnya : "+pinvalue);

                        // $('#btnSubmitTransaksi').html('Selesai');
                        // $('#btnSubmitTransaksi').attr('disabled', false);
                        // $('#btnSubmitTransaksi').css('cursor', 'pointer');
                        // return false;

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
				form_data.append('pin', pin);
				form_data.append('client_secret', secret_code);
				
				let url = '';

				if(mode=='pembelian'){
                    if(tipe_kartu==1){
                        url = '<?= api_url(); ?>api/v3/trx/shop';
                    }else {
                        url = '<?= api_url(); ?>api/v21/trx/shop';
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
                                text: 'Tekan tombol Selesai kembali!',
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
                            $('#textToCard2').val('');
							$('#transaksiNext').modal('toggle');
							$('.display').val('');
							

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
			
            
            function commitTransactionWithNominal(){
				
                var pin = $("#textToCard5").val();
				
                invoiceResultPrint = '';

                let arrStoreTransaksi = [];
				var form_data = new FormData();


				
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
            

            function openInvoiceModal(){
                let htmlx = '';

                // console.log(invoiceText);

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
                                <span style=" color:black!important; display:block; font-size:12px!important;">#${invoiceResultPrint.transaction.invoice}</span>
                            </div>
                            
                            <span id="date">${moment(invoiceResultPrint.transaction.created_at).format('DD/MM/YYYY - HH:mm:ss')} WIB</span>
                            <span style="font-size:11px;">ID Card . ${invoiceResultPrint.balance.users.card_id}</span>
                        </div>
                        <div style="text-align:center;">
                        ${invoiceResultPrint.balance.seller.customers_name}
                        <small style="display:block;color: rgba(0, 0, 0, 1);">Beringin Taluk, Kec. Kuantan Tengah, Kabupaten Kuantan Singingi, Riau 29566</small>
                        
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
						console.log(err.response);
					});

					if (posts2.status == 201) {
						secret_code = posts2.data.data.client_secret;

                        // commitTransaction();
					}
				}
				save2();
			}
			
            
            function lockCheck(){

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
                        
                        clearTimeout(timer);

                        let mmm = Math.floor(Math.random() * 1250) + 1;
                        

                        timer = setTimeout(() => {

                            commitTransaction();

                            console.log(mmm);
                            // $('#btnSubmitTransaksi').html('Selesai');
                            // $('#btnSubmitTransaksi').attr('disabled', false);
                            // $('#btnSubmitTransaksi').css('cursor', 'pointer');

                        }, mmm);
                        

                        
					}
				}
				save2();
			}
            
            function lockCheckWithNominal(){
                
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
                        
						accountNumberX = posts2.data.data.account_number;

                        if(posts2.data.data.kantin.pin_setting==0){
                            usePINorNOT = 'false';
                        }else {
                            usePINorNOT = 'true';
                        }

                        console.log("Gunakan PIN? : ",usePINorNOT);

                        beaAdmin = posts2.data.data.admin_fee.admin_fee_total;

                        
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
                        
                    }
				}
				save2();
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