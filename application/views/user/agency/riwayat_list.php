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
					<div class="breadcrumb-title pe-3">Tabungan & Riwayat Saldo</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Tabungan & Riwayat Saldo</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
			  
                <div class="row">
                    <div class="col-lg-9 col-md-8 col-sm-6 col-12">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body text-left">
                                        <div class="row pt-2">
                                            <div class="col-1 text-center">
                                                <h4><i class="bx bx-wallet"></i></h4>
                                            </div>
                                            <div class="col-11">
                                            <font style="font-size:17px;">Saldo Aktual</font>
                                                <i class="bx bx-chevron-right"></i>
                                                <font style="font-size:17px;font-weight:bold;background: rgb(40,167,69);
                background: linear-gradient(34deg, rgba(40,167,69,1) 0%, rgba(8,213,218,1) 100%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;" class="totalTabungan"><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></font>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body text-left">
                                        <div class="row pt-2">
                                            <div class="col-1 text-center">
                                                <h4><i class="bx bx-wallet"></i></h4>
                                            </div>
                                            <div class="col-11">
                                            <font style="font-size:17px;">Saldo Hasil Filter</font>
                                                <i class="bx bx-chevron-right"></i>
                                                <font style="font-size:17px;font-weight:bold;background: rgb(40,167,69);
                background: linear-gradient(34deg, rgb(98 98 98) 0%, rgb(135 162 163) 100%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;" class="filterTabungan"><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></font>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="col-12 pb-3">
                                    Menampilkan <font class="jmldt"><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></font> data <font class="stdt">pada hari ini</font>.
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0" style="font-size:12px!important;">
                                        <thead class="table-light">
                                            <tr>
                                                <th>No.</th>
                                                <th>Tanggal</th>
                                                <th>Jam</th>
                                                <th>No. Invoice</th>
                                                <th>Asal / Tujuan Dana</th>
                                                <th>Biaya</th>
                                                <th>Saldo</th>
                                                <th>Keterangan</th>
                                                <th class="text-end"></th>
                                            </tr>
                                        </thead>
                                        <tbody class="putContentHere">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="col-12 pb-3">
                                    Filter
                                </div>

                                <div class="col-12">
<!--                                     
                                    <div class="form-group mb-3">
                                        <label for="noInvoice">No. Invoice</label>
                                        <select class="form-select single-select inputFilterItem" id="noInvoice" data-object='invoice' style="border-radius:0px!important;">

                                        </select>
                                    </div> -->
                                    
                                    <div class="form-group mb-3">
                                        <label for="daterange">Rentang Tanggal</label>
                                        <input type="text" class="form-control date-range inputFilterItem" data-object='dateDifferensial' id="daterange" style="font-size:12px!important;"/>
                                    </div>
                                    
                                </div>

                                <div class="col-12 text-end">
                                    <button type="button" class="btn btn-sm btn-secondary" onclick="resetFilter();" style="border-radius:0px;">Clear filter</button>
                                </div>

                                
                            </div>
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
            
            let isFilterOn = false;
            let urlSetFromFilter = '';
            let totalTabungan = '0';
            let filterTabungan = 0;
			$(document).ready(function () {
                showData();

                $('.single-select').select2({
                    theme: 'bootstrap4',
                    width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                    placeholder: $(this).data('placeholder'),
                    allowClear: Boolean($(this).data('allow-clear')),
                });

                flatpickr.localize(flatpickr.l10ns.id);
                $(".date-range").flatpickr({
                    locale: "id",
                    mode: "range",
                    altInput: true,
                    altFormat: "j-F-Y",
                    dateFormat: "Y-m-d",
                    onClose: function(selectedDates, dateStr, instance){
                        // $('.inputFilterItem').trigger('change');
                        isFilterOn = true;
                        dateStr = dateStr.split(" - ");

                        if(dateStr.length==1){
                            urlSetFromFilter = '<?= api_url(); ?>api/v1/rep/business-history?date_from='+dateStr[0]+'&date_to='+dateStr[0];
                        }else {
                            urlSetFromFilter = '<?= api_url(); ?>api/v1/rep/business-history?date_from='+dateStr[0]+'&date_to='+dateStr[1];
                        }
                        showData();
                    }
                });

                
            });

            function resetFilter(){
                isFilterOn = false;
                $('.date-range').html('');
                $('.date-range').val('');
                showData();
            }

            let invoiceDataArray = [];
			function showData(){
				let num = 0;
				let tableColumn = '';
                filterTabungan = 0;
				tableColumn += `<tr><td colspan="9" class="text-center">Loading...</td></tr>`;
				$('.putContentHere').html(tableColumn);

                invoiceDataArray = [];

                let url ='';
                if(isFilterOn){
                    url = urlSetFromFilter;
                }else {
                    url = '<?= api_url(); ?>api/v1/rep/business-history?date_from='+moment(new Date()).format('YYYY-MM-DD')+'&date_to='+moment(new Date()).format('YYYY-MM-DD');
                }
				
				const save2 = async () => {
					const posts2 = await axios.get(url, {
						headers: {
							'Authorization': 'Bearer ' + sessionStorage.getItem('_token')
						}
					}).catch((err) => {
						console.log(err.response);
					});
			
					if (posts2.status == 200) {
							tableColumn = '';

                            let j = 0;

                            if(posts2.data.data.length==0){
                                callJmlDt(j,'');
                                $('.filterTabungan').html("Rp0");
								tableColumn +=`<tr><td colspan="9" class="text-center">Tidak ada data.</td></tr>`;
								$('.putContentHere').html(tableColumn);return false;
							}
                            jQuery.each(posts2.data.data, function(index, item) {
                                
                                j++;

                                invoiceDataArray.push({
                                    invoice: item[1].invoice.invoice,
                                    date: item[1].created_at
                                });

                                totalTabungan = formatRupiah(item[1].account.balance);
                                filterTabungan += parseInt(item[1].transaction_amount);


                                num += 1;
                                tableColumn +=`
                                    <tr>
                                        <td width="25">
                                            <div class="d-flex align-items-center">
                                                <div class="ms-2">
                                                    <h6 class="mb-0 font-14">${num}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td width="120">${moment(item[1].created_at).format('DD-MM-YYYY')}</td>
                                        <td width="120">${moment(item[1].created_at).format('HH:mm:ss')} WIB</td>
                                        <td width="160">${item[1].invoice.invoice}</td>
                                        <td>${item[1].account.customers_name}</td>
                                        <td>Rp${formatRupiah(item[1].transaction_amount)}</td>
                                        <td>Rp${formatRupiah(item[1].current_balance)}</td>
                                        <td>${(item[1].types.name_type=='distribution')?'Bea bagi hasil':'NOT SET, YET'}</td>
                                        <td class="text-end">
                                                <a href="#/" onclick="openInvoice('${item[1].invoice.invoice}','${item[1].transaction_amount}');" class="btn btn-success btn-sm" style="font-size:13px;border-radius:0!important;"><i class='bx bxs-printer'></i> Invoice</a>
                                        </td>
                                    </tr>
                                `;
                            });
							
							
						$('.putContentHere').html(tableColumn);
						$('.filterTabungan').html("Rp"+formatRupiah(filterTabungan.toString()));

                        callJmlDt(j,'');
                        $('.totalTabungan').html("Rp"+totalTabungan);
							
					}
				}
				
				save2();
				
				
			}

            function openInvoice(str,jumlah){
                let htmlx = '';

                let listPembelian = '';

                const save2 = async () => {
					const posts2 = await axios.get('<?= api_url(); ?>api/v1/rep/history-first?invoice='+str, {
						headers: {
							'Authorization': 'Bearer ' + sessionStorage.getItem('_token')
						}
					}).catch((err) => {
						console.log(err.response);
					});
			
					if (posts2.status == 200) {
							tableColumn = '';

							htmlx = `
                                <div class="invoice-card" id="divToPRINT">
                                    <div class="invoice-title">
                                        <div id="main-title">
                                        <h4 style="margin-bottom:0;padding-bottom:0px;">INVOICE</h4>
                                        <span>#${posts2.data.data.invoice.invoice}</span>
                                        </div>
                                        
                                        <span id="date">${moment(posts2.data.data.created_at).format('DD/MM/YYYY - HH:mm:ss')} WIB</span>
                                        <span style="font-size:11px;">ID Card . ${posts2.data.data.account.card_id}</span>
                                    </div>
                                    <div style="text-align:center; text-transform:uppercase;">
                                    ${posts2.data.data.users.username}
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
                                            <tr><td colspan="3">
                                                <div style="width:100%; height:5px;border-bottom: 0.5px dashed grey;"></div>
                                            </td></tr>
                                            
                                            <tr class="calc-row">
                                            <td colspan="2">Subtotal</td>
                                            <td>Rp${posts2.data.data.transaction_amount}</td>
                                            </tr>
                                            <tr class="calc-row">
                                            <td colspan="2">Biaya transaksi</td>
                                            <td>Rp${formatRupiah(jumlah)}</td>
                                            </tr>
                                            <tr class="calc-row">
                                            <td colspan="2">Total</td>
                                            <td>Rp${formatRupiah((parseInt(posts2.data.data.transaction_amount)+parseInt(jumlah)).toString())}</td>
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

							
					}
				}
				
				save2();


            }

            // $(".inputFilterItem").bind("change", function() {
                
            //     isFilterOn = true;

            //     var inputs = $(".inputFilterItem");
            //     let urlsets = '<?= api_url(); ?>api/v1/rep/business-history?';
            //     let valueData = '';
            //     for(var i = 0; i < inputs.length; i++){
            //         valueData = $(this).data('object');
            //         if($(inputs[i]).val()!=''){
            //             if(i<1){
            //                 urlsets+=valueData+`=${$(inputs[i]).val()}`;
            //             }else {
            //                 urlsets+=`${'&$'+valueData+'='+$(inputs[i]).val()}`;
            //             }
            //         }
                    
            //     }
            //     console.log(urlsets);
            //     urlSetFromFilter = urlsets;
            //     showData();
            // });
            

            function findElement(arr, propName, propValue) {
                for (var i=0; i < arr.length; i++)
                    if (arr[i][propName] == propValue)
                return arr[i];
            }

            function callJmlDt(jmlh, str){
                $('.jmldt').html(jmlh);
                $('.stdt').html(str);
                pecahData();
            }

            function pecahData(){

                let dataNama = Object.values(invoiceDataArray.reduce((r, x) => {
                    r[x.account_users] = r[x.account_users] ? r[x.account_users] : x
                    return r
                }, {}));
                
                let dataNoInvoice = Object.values(invoiceDataArray.reduce((r, x) => {
                    r[x.invoice] = r[x.invoice] ? r[x.invoice] : x
                    return r
                }, {}));

                
                //FILTER 1 %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
                // $('#noInvoice').html('');
                // $('#noInvoice').append($('<option>', { 
                //     value: '',
                //     text : 'Pilih nomor invoice'
                // }));
                // $.each(dataNoInvoice, function (i, item) {
                //     $('#noInvoice').append($('<option>', { 
                //         value: item.invoice,
                //         text : item.invoice 
                //     }));
                // });
            }
		</script>