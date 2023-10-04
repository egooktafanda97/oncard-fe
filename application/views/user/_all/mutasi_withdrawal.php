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
					<div class="breadcrumb-title pe-3">Mutasi Pencairan Saldo</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Mutasi Pencairan Saldo</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
			  
                <div class="row">
                    <div class="col-lg-9 col-md-8 col-sm-6 col-12">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="col-12 pb-3">
                                        Menampilkan <font class="jmldt"><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></font> data <font class="stdt">pada hari ini</font>.
                                    </div>
                                    <div class="table-responsive">
                                    <button class="btn btn-sm btn-outline-primary me-2 mb-3" id="btnSave2PDF" onclick="save2PDF('tabelPrint');" style="border-radius:0px;"><i class="bx bxs-file-export"></i> Export PDF</button>
                                    <button class="btn btn-sm btn-outline-success me-2 mb-3" onclick="saveToExcel('tabelmutasi');" style="border-radius:0px;"><i class="bx bxs-file-export"></i> Export Excel</button>
                                        <table class="table table-hover tabelmutasi mb-0" id="tabelPrint" style="font-size:12px!important;">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Tanggal</th>
                                                    <th>Jam</th>
                                                    <th>No. Invoice</th>
                                                    <th>Akun</th>
                                                    <th>Nominal</th>
                                                    <th>Keterangan</th>
                                                    <th>Invoice</th>
                                                </tr>
                                            </thead>
                                            <tbody class="putContentHere">
                                            </tbody>
                                        </table>
                                    </div>
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
                                    
                                    <div class="row mb-4">
                                        <div class="col-9">
                                        Secara <i>default</i>, data yang dimunculkan hanya 20 baris terbaru.<br/>
                                        Lihat semua data? 
                                        </div>
                                        <div class="col-3">
                                        <div class="form-check form-switch">
											<input class="form-check-input form-toggle-showdata" type="checkbox" id="onoffpin" onchange="setValToggle();">
                                            
										</div>
                                        </div>
                                    </div>
                                

                                    <div class="form-group mb-3">
                                        <label for="akunGet">Akun</label>
                                        <select class="form-select single-select inputFilterItem" id="akunGet" data-object='account_number' style="border-radius:0px!important;">

                                        </select>
                                    </div>
                                    
                                    <div class="form-group mb-3">
                                        <label for="invoiceGet">Invoice</label>
                                        <select class="form-select single-select inputFilterItem" id="invoiceGet" data-object='invoice' style="border-radius:0px!important;">

                                        </select>
                                    </div>
                                    
                                    <div class="form-group mb-3">
                                        <label for="daterange">Rentang Tanggal</label>
                                        <input type="text" class="form-control date-range" data-object='dateDifferensial' id="daterange" style="font-size:12px!important;"/>
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
            let oldDateKeep = '';

			$(document).ready(function () {
                // getSiswaData();
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
                        if(dateStr==''){
                            return false;
                        }
                        if(oldDateKeep==dateStr){
                            return false;
                        }

                        isFilterOn = true;
                        dateStr = dateStr.split(" - ");

                        if(dateStr.length==1){
                            urlSetFromFilter = '<?= api_url(); ?>api/v1/rep/history?type=withdrawal&date_from='+dateStr[0]+'&date_to='+dateStr[0]; 
                        }else {
                            urlSetFromFilter = '<?= api_url(); ?>api/v1/rep/history?type=withdrawal&date_from='+dateStr[0]+'&date_to='+dateStr[1];
                        }
                        showData();
                        oldDateKeep = dateStr;
                    }
                });

                
            });

            function resetFilter(){
                isFilterOn = false;
                $('.date-range').html('');
                $('.date-range').val('');

                var inputs = $(".inputFilterItem");
                for(var i = 0; i < inputs.length; i++){
                    $(inputs[i]).val('');
                }

                showData();
            }

            let invoiceDataArray = [];
            let invoiceDataArrayAkun = [];
            
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
                    url = '<?= api_url(); ?>api/v1/rep/history?type=withdrawal';
                }
				
				const save2 = async () => {
					const posts2 = await axios.get(url, {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token'),
                            'paginate' : statustoggle
						}
					}).catch((err) => {
						console.log(err.response);
					});
			
					if (posts2.status == 200) {
							tableColumn = '';

                            let j = 0;

                            let mmm = posts2.data;
                        
                            if(statustoggle==true){
                                mmm = posts2.data.data;
                            }else {
                                mmm = posts2.data.data.data;
                            }

                            console.log(mmm);

                            if(mmm.length==0){
                                callJmlDt(j,'');
                                tableColumn +=`<tr><td colspan="9" class="text-center">Tidak ada data.</td></tr>`;
								$('.putContentHere').html(tableColumn);return false;
							}

                            mmm.map((mapping,i)=>{

                                if(mapping.account.user_id=<?=$this->session->userdata('_user_id');?> && mapping.status.status=='success'){
                                    invoiceDataArray.push({
                                        invoice: mapping.invoice.invoice,
                                        date: mapping.created_at,
                                        account_number: mapping.account.account_number,
                                        customers_name: mapping.account.customers_name,
                                        transaction_amount: mapping.transaction_amount,
                                        initial_balance: mapping.initial_balance,
                                        current_balance: mapping.current_balance,
                                    });
                                
                                    j++;

                                    let statusText = '';

                                    if(mapping.status.status=='success'){
                                        statusText = '<span class="badge bg-gradient-quepal text-white shadow-sm w-100">Success</span>';
                                    }else if(mapping.status.status=='success'){
                                        statusText = '<span class="badge bg-gradient-blooker text-white shadow-sm w-100">Pending</span>';
                                    }else{
                                        statusText = '<span class="badge bg-gradient-bloody text-white shadow-sm w-100">Failed</span>';
                                    }
                                    
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
                                            <td width="70">${moment(mapping.created_at).format('DD-MM-YYYY')}</td>
                                            <td width="70">${moment(mapping.created_at).format('HH:mm:ss')} WIB</td>
                                            <td width="160">${mapping.invoice.invoice}</td>
                                            <td>${mapping.account.customers_name}</td>
                                            <td>Rp${formatRupiah(mapping.transaction_amount.toString())}</td>
                                            <td>${statusText}</td>
                                            <td><a href="javascript:;" onclick="openInvoice('${mapping.invoice.invoice}');" class="btn btn-success btn-sm" style="padding:0px!important;font-size:12px!important; padding-left:8px!important; padding-right:8px!important;border-radius:100!important;"><i class='bx bxs-printer' style="font-size:12px!important;"></i> Invoice</a></td>
                                        </tr>
                                    `;
                                }

                            });

						$('.putContentHere').html(tableColumn);
                        callJmlDt(j,'');							
					}
				}
				
				save2();
				
				
			}

            function openInvoice(str){
                let htmlx = '';

                var x = findElement(invoiceDataArray, "invoice", str);
                console.log(invoiceDataArray);
                let listPembelian = '';

                let initial_balance = x['initial_balance'];
                let nomialPencairan = x['transaction_amount'];
                let nomialSisaSaldo = x['current_balance'];

                htmlx = `
                    <div class="invoice-card" id="divToPRINT">
                        <div class="invoice-title">
                            <div id="main-title" style="display:block!important;">
                            <h4 style="margin-bottom:0;padding-bottom:0px; color:black!important;background: black;text-align: center;color: white!important;padding: 7px;">INVOICE</h4>
                            <span style=" color:black!important; display:block; font-size:12px!important;">#${x['invoice']}</span>
                            </div>
                            
                            <span id="date" style=" color:black!important;">${moment(x['date']).format('DD/MM/YYYY - HH:mm:ss')} WIB</span>
                            <span style="font-size:11px; color:black!important;">- - -</span>
                        </div>
                        <div style="text-align:center;">
                        WITHDRAWAL
                        <small style="display:block;color: rgba(0, 0, 0, 0.4); color:black!important;">Beringin Taluk, Kec. Kuantan Tengah, Kabupaten Kuantan Singingi, Riau 29566</small>
                        
                        </div>
                        
                        <div class="invoice-details">
                            <table class="invoice-table" style="width:100%;">
                            <tbody class="detailTabelInvoice">
                                <tr class="calc-row">
                                    <td colspan="2">Saldo Awal</td>
                                <td>Rp${formatRupiah(initial_balance)}</td></tr>
                                <tr><td colspan="3">
                                    <div style="width:100%; height:5px;border-bottom: 0.5px dashed grey;"></div>
                                </td></tr>
                                
                                <tr class="calc-row">
                                <td colspan="2">Pencairan Saldo</td>
                                <td>Rp${formatRupiah(nomialPencairan)}</td></tr>
                                <tr><td colspan="3">
                                    <div style="width:100%; height:5px;border-bottom: 0.5px dashed grey;"></div>
                                </td></tr>
                                <tr class="calc-row">
                                <td colspan="2"><b>Sisa Saldo</b></td>
                                <td>Rp${formatRupiah(nomialSisaSaldo)}</td>
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
                            <button class="btn btn-sm btn-secondary" data-dismiss="modal" id="later" data-bs-dismiss="modal" aria-label="Close">Tutup</button>
                            <button class="btn btn-sm btn-primary" onclick="printDivNEW();"><i class="bx bx-printer"></i> CETAK BUKTI</button>
                        </div>
                    
                    </div>
                `;

                $('#invoiceModal .modal-body').html(htmlx);
                $('#invoiceModal').modal('toggle');

                

            }

            $(".inputFilterItem").bind("change", function() {
                
                isFilterOn = true;

                var inputs = $(".inputFilterItem");
                let ursets = '';
                urlsets = '<?= api_url(); ?>api/v1/rep/history?type=withdrawal';
                let valueData = '';
                for(var i = 0; i < inputs.length; i++){
                    valueData = $(inputs[i]).data('object');
                    if($(inputs[i]).val()!=''){
                        urlsets+='&'+valueData+'='+$(inputs[i]).val();
                    }
                    
                }
                console.log(urlsets);
                urlSetFromFilter = urlsets;
                showData();
            });
            

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
                
                let dataNoInvoice = Object.values(invoiceDataArray.reduce((r, x) => {
                    r[x.invoice] = r[x.invoice] ? r[x.invoice] : x
                    return r
                }, {}));
                
                let dataAkun = Object.values(invoiceDataArray.reduce((r, x) => {
                    r[x.account_number] = r[x.account_number] ? r[x.account_number] : x
                    return r
                }, {}));

                
                // FILTER 1 %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
                $('#invoiceGet').html('');
                $('#invoiceGet').append($('<option>', { 
                    value: '',
                    text : 'Pilih nomor invoice'
                }));
                $.each(dataNoInvoice, function (i, item) {
                    $('#invoiceGet').append($('<option>', { 
                        value: item.invoice,
                        text : item.invoice 
                    }));
                });

                // FILTER 2 %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
                $('#akunGet').html('');
                $('#akunGet').append($('<option>', { 
                    value: '',
                    text : 'Pilih akun'
                }));
                $.each(dataAkun, function (i, item) {
                    $('#akunGet').append($('<option>', { 
                        value: item.account_number,
                        text : item.customers_name 
                    }));
                });
            }

            let statustoggle = false;

            function setValToggle(){
                let valx = $('.form-toggle-showdata').prop('checked');
                console.log(valx);

                if(valx==true){
                    statustoggle = true;
                }else {
                    statustoggle = false;
                }

                showData();
            }
		</script>