<style type="text/css">
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
	.buttons button {
	padding: 10px;
	border-radius: 6px;
	border: none;
	font-size: 20px;
	cursor: pointer;
	background-color: #3c4043;
	color: #fff;
	font-weight: 500;
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
				<div class="card">
					<div class="card-body">
						<ul class="nav nav-pills mb-3" role="tablist">
							<li class="nav-item" role="presentation">
								<a class="nav-link active" data-bs-toggle="pill" href="#primary-pills-home" role="tab" aria-selected="true">
									<div class="d-flex align-items-center">
										<div class="tab-icon"><i class="bx bx-cart font-18 me-1"></i>
										</div>
										<div class="tab-title">Quick</div>
									</div>
								</a>
							</li>
							<li class="nav-item" role="presentation">
								<a class="nav-link" data-bs-toggle="pill" href="#primary-pills-profile" role="tab" aria-selected="false" tabindex="-1">
									<div class="d-flex align-items-center">
										<div class="tab-icon"><i class="bx bx-grid-alt font-18 me-1"></i>
										</div>
										<div class="tab-title">Menu</div>
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
									<div class="col-lg-6 col-12 mb-5">
										<input type="text" class="display" />
										<div class="buttons">
											<button class="operator" data-value="AC">AC</button>
											<button class="operator" data-value="DEL">DEL</button>
											<button class="operator" data-value="%">%</button>
											<button class="operator" data-value="/">÷</button>
											<button data-value="7">7</button>
											<button data-value="8">8</button>
											<button data-value="9">9</button>
											<button class="operator" data-value="*">×</button>
											<button data-value="4">4</button>
											<button data-value="5">5</button>
											<button data-value="6">6</button>
											<button class="operator" data-value="-">-</button>
											<button data-value="1">1</button>
											<button data-value="2">2</button>
											<button data-value="3">3</button>
											<button class="operator" data-value="+">+</button>
											<button data-value="0">0</button>
											<button data-value="00">00</button>
											<button data-value=".">.</button>
											<button class="operator equal" data-value="=">=</button>
										</div>
									</div>
									<div class="col-lg-6 col-12">
											<button type="button" class="btn btn-lg btn-success" data-value="" onclick="openDialogScan('pembelian');" style="width:100%;padding:20px;">SELESAIKAN TRANSAKSI</button>
											<div class="row mt-3">
												<div class="col-6">
												<button type="button" onclick="openDialogScan('ceksaldo');" data-value="" class="btn btn-lg btn-outline-success" style="width:100%;padding:10px;">CEK SALDO</button>
												</div>
												<div class="col-6">
												<button type="button" class="btn btn-lg btn-secondary disabled" style="width:100%;padding:10px;"><i class="bx bx-lock"></i> Fitur Terkunci</button>
												</div>
											</div>
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
				<div class="modal-content" onclick="putFocusScanCard();">
					<div class="modal-header">
						<h5 class="modal-title">Pindai Kartu</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" data-value="="></button>
					</div>
					<div class="modal-body">
						Pastikan indikator dibawah ini sudah bergaris <font class="text-success">hijau</font> terlebih dahulu.
						<small class="text-muted"><i>Apabila garis hijau belum muncul, klik pada gambar dibawah ini untuk mengaktifkan indikator tersebut!</i></small>
						<br/>
						
						<img id="scanCard" src="<?=base_url();?>assets_oncard/images/scan_kard.webp"  style="width:30%;margin:auto; border-radius:20px; display:block; margin-top:15px; margin-bottom:15px;"/>
						<p class="text-center" id="textIndicator" style="margin:auto; transform:scale(0);transition:all 0.2s linear 0s;padding:5px; padding-left:25px; padding-right:25px; font-size:14px; border-radius:100px; background:#53edaa; color:#fff;"></p>
						<input type="text" style="transform:scale(0)!important; margin:auto; text-align:center; width:100%; border:none;outline:none!important;" id="textToCard"/>
						
					</div>
					<div class="modal-footer text-center">
						<button type="button" id="btnConnectToCard" style="display:block;margin:auto;" data-value="=" disabled class="btn btn-outline-primary">Status</button>
					</div>
				</div>
			</div>
		</div>
		
		<div class="modal fade" id="transaksiNext" tabindex="-1" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content" >
					<div class="modal-header">
						<h5 class="modal-title">Konfirmasi Transaksi</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" data-value="="></button>
					</div>
					<div class="modal-body">
						<div class="detailTransaksi" onclick="putFocusScanCard2();"></div>
						
						<p class="text-center" id="textIndicator2" style="margin:auto; transform:scale(0);transition:all 0.2s linear 0s;padding:5px; padding-left:25px; padding-right:25px; font-size:14px; border-radius:100px; background:#53edaa; color:#fff;"></p>
						<input type="password" style="transform:scale(1)!important; margin:auto; text-align:center; width:100%; letter-spacing:10px; border:none;outline:none!important;" id="textToCard2"/>
						
					</div>
					<div class="modal-footer text-center">
						<button type="button" onclick="commitTransaction();" id="btnSubmitTransaksi" style="display:block;margin:auto;" data-value="" class="btn btn-success">Selesai</button>
					</div>
				</div>
			</div>
		</div>
        
        <div class="modal fade" id="transaksiNextCekSaldo" tabindex="-1" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content" >
					<div class="modal-header">
						<h5 class="modal-title">Cek Saldo</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" data-value="="></button>
					</div>
					<div class="modal-body">
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
			let mode = '';
			let secret_code = '';
			let nominal_belanja = '0';
			let kode_kartu = '';
            let invoiceText = [];
            let invoiceResultPrint = '';
            let beaAdmin = 0;

			$(document).ready(function () {
                loadMenu();
                getConfigBsns();

            });
			
            function loadMenu(){
				let tableColumn = '';
				const save2 = async () => {
					const posts2 = await axios.get('<?= api_url(); ?>api/v1/produk', {
						headers: {
							'Authorization': 'Bearer ' + sessionStorage.getItem('_token')
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
							'Authorization': 'Bearer ' + sessionStorage.getItem('_token')
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
							'Authorization': 'Bearer ' + sessionStorage.getItem('_token')
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
                if((total==''||total=='0'||total=='00') && str=='pembelian'){
					Toastify({
						text: 'Pembelian Masih Kosong! Transaksi Tidak Dapat Dilakukan!',
						duration: 3000,
						close: true,
						gravity: "top",
                        position: "right",
						className: "errorMessage",

					}).showToast();
					return false;
				}


				secret_code = '';//reset secret code when modal dialog opened
				
				$('#modalSetCard').modal('toggle');
				$('#btnConnectToCard').html('Status');
				$('#modalSetCard').on('shown.bs.modal', function () {
					$('#textToCard').focus();
				});
				
				mode = str;
			}


			$("#textToCard").focus(function(){
				console.log('input sedang fokus');
				$('#textIndicator').attr('style','transform:scale(1);transition:all 0.2s linear 0s;padding:5px; padding-left:25px; padding-right:25px; font-size:14px; border-radius:100px; background:#53edaa; color:#fff; display:table; text-align:center; margin:auto;');
				$('#textIndicator').html('Alat scan ready!');
				$('#scanCard').attr('style','border:5px solid #53edaa;width:30%;margin:auto; border-radius:20px; display:block; margin-top:15px; margin-bottom:15px; transition:all 0.2s linear 0s;');
			});
			$('#textToCard').blur(function(){
				console.log('input tidak fokus');
				$('#textToCard').val('');
				$('#textIndicator').attr('style','transform:scale(1);transition:all 0.2s linear 0s;padding:5px; padding-left:25px; padding-right:25px; font-size:14px; border-radius:100px; background:red; color:#fff;display:table;  text-align:center;margin:auto;');
				$('#textIndicator').html('Klik disini untuk dapat memulai scan kartu!');
				$('#scanCard').attr('style','width:30%;margin:auto; border-radius:20px; display:block; margin-top:15px; margin-bottom:15px; transition:all 0.2s linear 0s;');
			});
			function putFocusScanCard(){
				$('#textToCard').focus();
				$('#scanCard').attr('style','border:5px solid #53edaa;width:30%;margin:auto; border-radius:20px; display:block; margin-top:15px; margin-bottom:15px; transition:all 0.2s linear 0s;');
			}
			
			$("#textToCard2").focus(function(){
				console.log('input sedang fokus');
				$('#textIndicator2').attr('style','transform:scale(1);transition:all 0.2s linear 0s;padding:5px; padding-left:25px; padding-right:25px; font-size:14px; border-radius:100px; background:#53edaa; color:#fff; display:table; text-align:center; margin:auto;');
				$('#textIndicator2').html('Masukkan PIN!');
			});
			$('#textToCard2').blur(function(){
				console.log('input tidak fokus');
				$('#textIndicator2').attr('style','transform:scale(1);transition:all 0.2s linear 0s;padding:5px; padding-left:25px; padding-right:25px; font-size:14px; border-radius:100px; background:#53edaa; color:#fff;display:table;  text-align:center;margin:auto;');
				
			});
			function putFocusScanCard2(){
				$('#textToCard2').focus();
			}

			let timer;
			const input = document.querySelector('#textToCard');
			input.addEventListener('keyup', function (e) {
				clearTimeout(timer);
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

			function getConfigBsns(){
				
                const save2 = async () => {
					const posts2 = await axios.get('<?= api_url(); ?>api/v1/setting/get-config-trx-business', {
						headers: {
							'Authorization': 'Bearer ' + sessionStorage.getItem('_token')
						}
					}).catch((err) => {
						$('#textToCard').blur();
                        return false;
					});
					if (posts2.status == 200) {
                        if(posts2.data.status==false){
                            Toastify({
                                text: 'Network is unavailable!',
                                duration: 3000,
                                close: true,
                                gravity: "top",
                                position: "right",
                                className: "errorMessage",
                            }).showToast();
                            $('#textToCard').blur();
                            $('#textToCard').focus();
                            
                            return false;

                        }
                        console.log(posts2.data.data);
                        // posts2.data.map((mapping, i) => {
                            beaAdmin = posts2.data.data.admin_fee_total;
                        // });
                        

					}else {
                        Toastify({
                            text: 'Tunggu. Telah terjadi kesalahan pada aplikasi!',
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            className: "errorMessage",
                        }).showToast();
                        // $('#textToCard').blur();
                        
                    }
				}
				
				save2();
				
				
			}
            
            function searchSiswaByKartu(str){
				
                const save2 = async () => {
					const posts2 = await axios.get('<?= api_url(); ?>api/v1/usr?card='+str, {
						headers: {
							'Authorization': 'Bearer ' + sessionStorage.getItem('_token')
						}
					}).catch((err) => {
						$('#textToCard').blur();
                        return false;
					});
					if (posts2.status == 200) {
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
                        
                        if(mode!='ceksaldo'){
                            requestSecret();
                            if(mode=='pembelian'){
                                openNextDialogPembelian(posts2.data.data.siswa.nama_lengkap,posts2.data.data.siswa.nis,posts2.data.data.balance);
                            }else {
                                openNextDialogPembelianDenganMenu(posts2.data.data.siswa.nama_lengkap,posts2.data.data.siswa.nis,posts2.data.data.balance);
                            }
                        }else {
                            openNextDialogSaldoCek(posts2.data.data.siswa.nama_lengkap,posts2.data.data.siswa.nis,posts2.data.data.balance);
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
                        
                    }
				}
				
				save2();
				
				
			}

			function openNextDialogSaldoCek(nama, nis, balance){
				
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
                                        <img src="<?=base_url();?>assets_oncard/images/icons/user.webp" style="width:77px; height:77px; object-fit:cover;border-radius:100px;"/>
                                    </div>
                                    <div class="col-8">
                                        <p style="margin:0;padding:0;font-weight:bold;">${nama}</p>
                                        <small>NIS : ${nis}</small><br/>
                                        <small style="font-size:1.5em; font-weight:bold;">Rp${formatRupiah(balance)}</small>
                                    </div>
                                    <div class="col-12">
                                        <div style="width:100%;display:block; text-align:center; width:100%;">Sisa limit harian : Rp0</div>
                                    </div>
                                </div>
                            </div>
                        </div>
						
					</div>
					</div>
				`);
			}
            
            function openNextDialogPembelian(nama, nis, balance){
				nominal_belanja = '0';
				let total = '0';
				total = $('.display').val();
				nominal_belanja = parseInt(total);

                $('#textToCard2').val('');
				
				$('#modalSetCard').modal('toggle');
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
                                        <img src="<?=base_url();?>assets_oncard/images/icons/user.webp" style="width:77px; height:77px; object-fit:cover;border-radius:100px;"/>
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
            
            function openNextDialogPembelianDenganMenu(nama, nis, balance){
				nominal_belanja = '0';
				let totalTransaksi = $('#totalTagihan').html();
				
                let jumlahTotal = 0;
                invoiceText.map((mapping, i) => {
                    jumlahTotal += parseInt(mapping.totalHarga);
                });
				nominal_belanja = jumlahTotal;

                $('#textToCard2').val('');
				
				$('#modalSetCard').modal('toggle');
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
                                        <img src="<?=base_url();?>assets_oncard/images/icons/user.webp" style="width:77px; height:77px; object-fit:cover;border-radius:100px;"/>
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
					// console.log(jsonToStrings);
                    form_data.append('shop', jsonToStrings);
                }

				form_data.append('card', kode_kartu);
				form_data.append('pin', pin);
				form_data.append('client_secret', secret_code);
				
				let url = '';

				if(mode=='pembelian'){
					url = '<?= api_url(); ?>api/v2/trx/shop';
				}else {
					url = '<?= api_url(); ?>api/v1/trx/shop';
				}
				
				const save = async (form_data) => {
					const posts = await axios.post(url, form_data, {
						headers: {
							'Authorization': 'Bearer ' + sessionStorage.getItem('_token')
						}
					}).catch((err) => {
                        $('#btnSubmitTransaksi').html('Selesai');
						$('#btnSubmitTransaksi').attr('disabled', false);
						$('#btnSubmitTransaksi').css('cursor', 'pointer');

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
								text: posts.data.message,
								duration: 3000,
								close: true,
								gravity: "top",
								position: "right",
								className: "successMessage",

							}).showToast();

							nominal_belanja = '0';
							kode_kartu = '';
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
                    openDialogScan('pembelianDenganMenu');
                }
            });

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
                            <div id="main-title">
                            <h4 style="margin-bottom:0;padding-bottom:0px;">INVOICE</h4>
                            <span>#${invoiceResultPrint.transaction.invoice}</span>
                            </div>
                            
                            <span id="date">${moment(invoiceResultPrint.transaction.created_at).format('DD/MM/YYYY - HH:mm:ss')} WIB</span>
                            <span style="font-size:11px;">ID Card . ${invoiceResultPrint.balance.users.card_id}</span>
                        </div>
                        <div style="text-align:center;">
                        ${invoiceResultPrint.balance.seller.customers_name}
                        <small style="display:block;color: rgba(0, 0, 0, 0.4);">Beringin Taluk, Kec. Kuantan Tengah, Kabupaten Kuantan Singingi, Riau 29566</small>
                        
                        </div>
                        
                        <div class="invoice-details">
                            <table class="invoice-table">
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
                                <td>Rp${formatRupiah(invoiceResultPrint.transaction.total_spending.toString())}</td>
                                </tr>
                                <tr class="calc-row">
                                <td colspan="2">Biaya transaksi</td>
                                <td>Rp${formatRupiah(invoiceResultPrint.transaction.admin_fee.toString())}</td>
                                </tr>
                                <tr class="calc-row">
                                <td colspan="2">Total</td>
                                <td>Rp${formatRupiah(invoiceResultPrint.transaction.total_payment.toString())}</td>
                                </tr>
                                <tr><td colspan="3">
                                    <div style="width:100%; height:5px;border-bottom: 0.5px dashed grey;"></div>
                                </td></tr>
                                <tr class="calc-row">
                                <td colspan="2"><b>Sisa Saldo</b></td>
                                <td>Rp${formatRupiah(invoiceResultPrint.balance.users.balance.toString())}</td>
                                </tr>
                            </tbody>
                            </table>
                        </div>
                        
                        <div class="invoice-footer">
                            <button class="btn btn-sm btn-secondary" id="later" data-bs-dismiss="modal" aria-label="Close">Tutup</button>
                            <button class="btn btn-sm btn-primary" onclick="printDiv();"><i class="bx bx-printer"></i> CETAK</button>
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
            }

			// ------------------------------------------------------------------------------------

			const display = document.querySelector(".display");
			const buttons = document.querySelectorAll("button");
			const specialChars = ["%", "*", "/", "-", "+", "="];
			let output = "";

			display.focus();

			//Define function to calculate based on button clicked.
			const calculate = (btnValue) => {
			display.focus();
			if (btnValue === "=" && output !== "") {
				//If output has '%', replace with '/100' before evaluating.
				output = eval(output.replace("%", "/100"));
			} else if (btnValue === "AC") {
				output = "";
			} else if (btnValue === "DEL") {
				//If DEL button is clicked, remove the last character from the output.
				output = output.toString().slice(0, -1);
			} else {
				//If output is empty and button is specialChars then return
				if (output === "" && specialChars.includes(btnValue)) return;
				output += btnValue;
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
					const posts2 = await axios.get('<?= api_url(); ?>api/v1/key/create', {
						headers: {
							'Authorization': 'Bearer ' + sessionStorage.getItem('_token')
						}
					}).catch((err) => {
						console.log(err.response);
					});

					if (posts2.status == 201) {
						secret_code = posts2.data.data.client_secret;
					}
				}
				save2();
			}

		</script>