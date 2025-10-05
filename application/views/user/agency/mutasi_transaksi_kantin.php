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
<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Jurnal Merchant</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Jurnal Merchant</li>
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
                                    <button class="btn btn-sm btn-outline-success me-2 mb-3" onclick="saveToExcel('tabelmutasitransaksikantin');" style="border-radius:0px;"><i class="bx bxs-file-export"></i> Export Excel</button>
                                        <table class="table table-hover tabelmutasitransaksikantin mb-0" id="tabelPrint" style="font-size:12px!important;">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Tanggal</th>
                                                    <th>Jam</th>
                                                    <th>No. Invoice</th>
                                                    <th>Akun</th>
                                                    <th>Merchant</th>
                                                    <th>Nominal</th>
                                                    <th>Keterangan</th>
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
                                        <label for="siswaGet">Akun</label>
                                        <select class="form-select single-select inputFilterItem" id="siswaGet" data-object='account_number' style="border-radius:0px!important;">

                                        </select>
                                    </div>
                                    
                                    <div class="form-group mb-3">
                                        <label for="invoiceGet">Invoice</label>
                                        <select class="form-select single-select inputFilterItem" id="invoiceGet" data-object='invoice' style="border-radius:0px!important;">

                                        </select>
                                    </div>
                                    
                                    <div class="form-group mb-3">
                                        <label for="daterange">Rentang Tanggal</label>
                                        <input type="text" class="form-control date-range inputFilterItemXXX" data-object='dateDifferensial' id="daterange" style="font-size:12px!important;"/>
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
                // getSiswaData();
                showData();
                getDataMerchant();

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
                            urlSetFromFilter = '<?= api_url(); ?>api/v1/rep/jurnal?account_level=seller&date_from='+dateStr[0]+'&date_to='+dateStr[0];
                        }else {
                            urlSetFromFilter = '<?= api_url(); ?>api/v1/rep/jurnal?account_level=seller&date_from='+dateStr[0]+'&date_to='+dateStr[1];
                        }
                        showData();
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
                    url = '<?= api_url(); ?>api/v1/rep/jurnal?usr-model=Kantin';
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

                                if(mapping.account.account_type=='primary'){
                                    invoiceDataArray.push({
                                        invoice: mapping.invoice,
                                        date: mapping.created_at,
                                        customers_name: mapping.account.customers_name,
                                        account_number: mapping.account.account_number,
                                    });
                                }
                            
                                j++;

                                let statusText = '';

                                if(mapping.management_type.name_type=='buy'){
                                    statusText = '<span class="badge bg-gradient-quepal text-white shadow-sm w-100">Pembelian</span>';
                                }else if(mapping.management_type.name_type=='adminitrasi'){
                                    statusText = '<span class="badge bg-gradient-blooker text-white shadow-sm w-100">Biaya Admin</span>';
                                }else if(mapping.management_type.name_type=='withdrawal'){
                                    statusText = '<span class="badge bg-gradient-bloody text-white shadow-sm w-100">Pencairan Saldo</span>';
                                }else if(mapping.management_type.name_type=='sell'){
                                    statusText = '<span class="badge bg-info text-white shadow-sm w-100">Penjualan</span>';
                                }else if(mapping.management_type.name_type=='distribution'){
                                    statusText = '<span class="badge bg-info text-white shadow-sm w-100">Admin Fee</span>';
                                }else if(mapping.management_type.name_type=='top_up'){
                                    statusText = '<span class="badge bg-primary text-white shadow-sm w-100">Pengisian Saldo</span>';
                                }
                                let namaNya = '';
                                let namaMerchant = '';
                                let amount ='0';
                                let cond1 = mapping.management_type.name_type;
                                if(cond1 =='top_up'){
                                    namaNya = mapping.credit_account?.customers_name;
                                    amount = mapping.credit_amount??'0';
                                }else {
                                    namaNya = mapping.debit_account?.customers_name;
                                    amount = mapping.debit_amount??'0';
                                    namaMerchant = mapping.credit_account?.customers_name??'-';
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
                                        <td data-full-text="${mapping.invoice}">
                                            <span class="text-container">
                                        ${mapping.invoice}
                                        </span>
                                        </td>
                                        <td>${namaNya}</td>
                                        <td>${namaMerchant}</td>
                                        <td>Rp${formatRupiah(amount.toString())}</td>
                                        <td>${statusText}</td>
                                    </tr>
                                `;

                            });

						$('.putContentHere').html(tableColumn);
                        // createPaginations(posts2.data.data, "siswa-pagination-container", "siswa-pagination-details", "showData");
                        callJmlDt(j,'');							
					}
				}
				
				save2();
				
				
			}

            // function getSiswaData(){
            //     $('#siswaGet').html('');
            //     const save2 = async () => {
			// 		const posts2 = await axios.get('<?= api_url(); ?>api/v1/siswa', {
			// 			headers: {
			// 				'Authorization': 'Bearer ' + sessionStorage.getItem('_token')
			// 			}
			// 		}).catch((err) => {
			// 			console.log(err.response);
			// 		});
			
			// 		if (posts2.status == 200) {
            //             if(posts2.data.data.data.length==0){
            //                 $('#siswaGet').append($('<option>', {
            //                     value: '',
            //                     text: 'Tidak ada data siswa'
            //                 }));
            //             }
            //             $('#siswaGet').append($('<option>', {
            //                 value: '',
            //                 text: 'Pilih data akun'
            //             }));
            //             posts2.data.data.data.map((mapping,i)=>{
            //                 $('#siswaGet').append($('<option>', {
            //                     value: mapping.accounts.account_number,
            //                     text: mapping.accounts.customers_name+" - "+mapping.nis
            //                 }));
            //             });
			// 		}
			// 	}
				
			// 	save2();
            // }

            $(".inputFilterItem").bind("change", function() {
                
                isFilterOn = true;

                var inputs = $(".inputFilterItem");
                let urlsets = '<?= api_url(); ?>api/v1/rep/jurnal?account_level=seller';
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
                    r[x.customers_name] = r[x.customers_name] ? r[x.customers_name] : x
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
                // $('#siswaGet').html('');
                // $('#siswaGet').append($('<option>', { 
                //     value: '',
                //     text : 'Pilih akun'
                // }));
                // $.each(dataAkun, function (i, item) {
                //     $('#siswaGet').append($('<option>', { 
                //         value: item.account_number,
                //         text : item.customers_name 
                //     }));
                // });
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

            function getDataMerchant(){
				let num = 0;
				let tableColumn = '';
				tableColumn += `<tr><td colspan="8" class="text-center">Loading...</td></tr>`;
				$('.putContentHere').html(tableColumn);
				
				const save2 = async () => {
					const posts2 = await axios.get( '<?= api_url(); ?>api/v1/kantin' , {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token'),
                            'nopaginate' : true
						}
					}).catch((err) => {
						console.log(err.response);
					});
			
					if (posts2.status == 200) {
							num += 1;
							tableColumn = '';

                            $('#siswaGet').html('');
                            $('#siswaGet').append($('<option>', { 
                                value: '',
                                text : 'Pilih akun merchant'
                            }));

							posts2.data.data.map((mapping,i)=>{
							        $('#siswaGet').append($('<option>', { 
                                        value: mapping.accounts.account_number,
                                        text : mapping.accounts.customers_name
                                    }));
							});
						
					}
				}
				save2();
			}

		</script>