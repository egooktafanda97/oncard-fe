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
					<div class="breadcrumb-title pe-3">Pengaturan</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Pengaturan</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
				<div class="container">
					<div class="main-body">
						<div class="row">
							<div class="col-lg-4">
								<div class="card">
									<div class="card-body">
										<div class="d-flex flex-column align-items-center text-center">
											<img src="<?=base_url();?>assets_oncard/images/icons/user.webp" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
											<div class="mt-3">
												<h4>John Doe</h4>
												<p class="text-secondary mb-1">Pondok Pesantren Syafa'aturrasul</p>
												<p class="text-muted font-size-sm">Teluk Kuantan, Kab. Kuantan Singingi, Prov. Riau, Indonesia, 1928227</p>
												<button class="btn btn-primary">Follow</button>
												<button class="btn btn-outline-primary">Message</button>
											</div>
										</div>
										<hr class="my-4">
										<ul class="list-group list-group-flush">
											<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
												<h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe me-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>Saldo</h6>
												<span class="text-secondary">Rp1.500</span>
											</li>
											<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
												<h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github me-2 icon-inline"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>Pencairan Saldo</h6>
												<span class="text-secondary">15 kali</span>
											</li>
											<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
												<h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter me-2 icon-inline text-info"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>Bergabung Pada</h6>
												<span class="text-secondary">15-02-2023</span>
											</li>
											<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
												<h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram me-2 icon-inline text-danger"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>Email</h6>
												<span class="text-secondary">ppsr@mail.com</span>
											</li>
											<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
												<h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook me-2 icon-inline text-primary"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>Nomor Rekening</h6>
												<span class="text-secondary">BRI - 201292615</span>
											</li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
												<h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook me-2 icon-inline text-primary"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>Kontak Personal</h6>
												<span class="text-secondary">085272261551</span>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-lg-8">
								<div class="card">
									<div class="card-body">
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Full Name</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" value="John Doe">
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Email</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" value="john@example.com">
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Phone</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" value="(239) 816-9029">
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Mobile</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" value="(320) 380-4539">
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Address</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" value="Bay Area, San Francisco, CA">
											</div>
										</div>
										<div class="row">
											<div class="col-sm-3"></div>
											<div class="col-sm-9 text-secondary">
												<input type="button" class="btn btn-primary px-4" value="Save Changes">
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<div class="card">
											<div class="card-body">
												<img src="<?=base_url();?>assets/png/image_welcome_oncard.webp" style="width:100%; object-fit:cover;object-position:center;height:200px;"/>
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
							'Authorization': 'Bearer ' + sessionStorage.getItem('_token')
						}
					}).catch((err) => {
						console.log(err.response);
					});
			
					if (posts2.status == 200) {
							tableColumn = '';

                            let j = 0;

                            if(posts2.data.data.data.length==0){
                                callJmlDt(j,'');
                                tableColumn +=`<tr><td colspan="9" class="text-center">Tidak ada data.</td></tr>`;
								$('.putContentHere').html(tableColumn);return false;
							}

                            posts2.data.data.data.map((mapping,i)=>{

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
                            <div id="main-title">
                            <h4 style="margin-bottom:0;padding-bottom:0px;">INVOICE</h4>
                            <span>#${x['invoice']}</span>
                            </div>
                            
                            <span id="date">${moment(x['date']).format('DD/MM/YYYY - HH:mm:ss')} WIB</span>
                            <span style="font-size:11px;">- - -</span>
                        </div>
                        <div style="text-align:center;">
                        WITHDRAWAL
                        <small style="display:block;color: rgba(0, 0, 0, 0.4);">Beringin Taluk, Kec. Kuantan Tengah, Kabupaten Kuantan Singingi, Riau 29566</small>
                        
                        </div>
                        
                        <div class="invoice-details">
                            <table class="invoice-table">
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
		</script>