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
				<div class="mb-3">
                    <div style="display:flex; flex:1; justify-content:space-between">
                        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                            <div class="breadcrumb-title pe-3">Revenue</div>
                            <div class="ps-3">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb mb-0 p-0">
                                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">Data Revenue</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                        <div class="text-center p-3" style="border-radius:15px; background:#fff2d7;border:1px solid #c7ac75;">
                            <p style="margin:0;font-weight:bold;">Filter Tanggal</p>
                            <input type="date" class="form-control px-4" id="dateselected" style="padding:10px; border-radius:10px; font-weight:900;border:none;">
                        </div>
                    </div>


				</div>
				<!--end breadcrumb-->
			  
                <div class="row">

                <div class="container mt-4">
                    <div class="row">
                        <!-- Card 1: Most Bought Items -->
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">3 Produk Terlaris</h5>
                                    <ul id="mostBoughtList" class="list-group">
                                        <!-- Most bought items will be dynamically inserted here -->
                                    </ul>
                                    <button id="showAllButton" class="btn btn-sm btn-success mt-3">Tampilkan Semua</button>

                                </div>
                            </div>
                        </div>

                        <!-- Card 2: Total Net Income -->
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <h5 class="card-title">Gross</h5>
                                            <p id="grossIncome" class="mt-4 fs-4 fw-bold text-success" style="font-size:35px!important;font-weight:900!important;">
                                                <!-- Net income will be dynamically inserted here -->
                                            </p>
                                        </div>
                                        <div class="col-lg-6">
                                            <h5 class="card-title">Total Net Income</h5>
                                            <p id="netIncome" class="mt-4 fs-4 fw-bold text-success" style="font-size:35px!important;font-weight:900!important;">
                                                <!-- Net income will be dynamically inserted here -->
                                            </p>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                    <div class="col-lg-12 col-12">
                        
                    
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                <div class="col-lg-6 col-12 pb-3 text-start">
                                    <h4>Detail</h4>
                                </div>
                                <div class="col-lg-6 col-12 pb-3 text-end">
                                    <button class="btn btn-sm btn-outline-primary me-2 mb-3" id="btnSave2PDF" onclick="save2PDF('tabelPrint');" style="border-radius:0px;"><i class="bx bxs-file-export"></i> Export PDF</button>
                                    <button class="btn btn-sm btn-outline-success me-2 mb-3" onclick="saveToExcel('tabelriwayattransaksi');" style="border-radius:0px;"><i class="bx bxs-file-export"></i> Export Excel</button>
                                </div>
                                </div>
                                <div class="table-responsive">
                                
                                    <table class="table table-hover mb-0 tabelriwayattransaksi" id="tabelPrint" style="font-size:12px!important;">
                                        <thead class="table-light">
                                            <tr>
                                                <th>No.</th>
                                                <th>Tanggal</th>
                                                <th>Jam</th>
                                                <th>Invoice</th>
                                                <th>Nama Produk</th>
                                                <th>Quantity</th>
                                                <th>Total Jual</th>
                                                <th class="bg-secondary text-light">Harga Modal</th>
                                                <th class="bg-secondary text-light">Harga Jual</th>
                                                <th class="bg-secondary text-light">Surplus</th>
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

       <!-- Modal structure -->
        <div class="modal fade" id="dataModal" tabindex="-1" aria-labelledby="dataModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="dataModalLabel">All Sold Items</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul id="fullItemList" class="list-group">
                <!-- Full list will be inserted here -->
                </ul>
            </div>
            </div>
        </div>
        </div>

		<script type="text/javascript">
            
            let isFilterOn = false;
            let urlSetFromFilter = '';
            let totalTabungan = 0;
            let filterTabungan = 0;
            let oldDateKeep = '';

            
            let endPointGetDataSiswa = '<?= api_url(); ?>api/v1/rep/barang-terjual?start_date=2025-01-01&end_date=2025-01-04';

            // Function to format the date to DD-MM-YYYY
        
        // Get today's date in YYYY-MM-DD format
        const today = new Date().toISOString().split('T')[0];

        // Set the value of the date input
        const dateInput = document.getElementById('dateselected');
        dateInput.value = today;

        document.getElementById('dateselected').addEventListener('change', function () {
            // Update the dateSelected variable
            dateSelected = this.value;

            // Run the showData function
            showData();
        });

        let dateSelected = today;
        console.log(dateSelected);

        
			$(document).ready(function () {
                showData();
                getAccounts();

            });

            let allList;

            let invoiceDataArray = [];
			function showData(){
				let num = 0;
				let tableColumn = '';
				tableColumn += `<tr><td colspan="10" class="text-center">Loading...</td></tr>`;
				$('.putContentHere').html(tableColumn);

                const date = new Date(dateSelected);

                // Increment the date by 1 day
                date.setDate(date.getDate() + 1);

                // Format the new date back to YYYY-MM-DD
                const endDate = date.toISOString().split('T')[0];

                invoiceDataArray = [];

                let grs = 0;
				
				const save2 = async () => {
					const posts2 = await axios.get('<?= api_url(); ?>api/v1/rep/barang-terjual?start_date='+dateSelected+'&end_date='+endDate, {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token'),
                            'paginate' : statustoggle,
                            // 'take' : 20
						}
					}).catch((err) => {
						console.log(err.response);
                        filterTabungan = 0;
					});
			
					if (posts2.status == 200) {
							tableColumn = '';
                            let j = 0;

                            let mmm = posts2.data;
                        
                            
                            // mmm = posts2.data.data;

                            console.log(mmm);

                            let num=1;

                            mmm.map((mapping,i)=>{
                                let selisih = 0;
                                if(parseInt(mapping.produk.harga_modal)==0){
                                    selisih = parseInt(mapping.produk.harga)-parseInt(mapping.produk.harga);
                                }else {
                                    selisih = (parseInt(mapping.produk.harga) -  parseInt(mapping.produk.harga_modal)) * mapping.qty;
                                }
                                
                                grs += parseInt(mapping.produk.harga);

                                tableColumn +=`
                                    <tr>
                                        <td width="25">
                                            <div class="d-flex align-items-center">
                                                <div class="ms-2">
                                                    <h6 class="mb-0 font-14">${num++}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td width="120">${moment(mapping.created_at).format('DD-MM-YYYY')}</td>
                                        <td width="120">${moment(mapping.created_at).format('HH:mm:ss')} WIB</td>
                                        <td width="160">${mapping.invoice}</td>
                                        <td>${mapping.produk.nama_produk}</td>
                                        <td style="font-weight:bold;">${formatRupiah(mapping.qty.toString())}</td>
                                        <td>Rp${formatRupiah(mapping.order_total.toString())}</td>
                                        <td class="bg-light">Rp${formatRupiah(mapping.produk.harga_modal.toString())}</td>
                                        <td class="bg-light">Rp${formatRupiah(mapping.produk.harga.toString())}</td>
                                        <td class="bg-light" style="color: ${selisih > 0 ? '#0fae23' : 'red'};">
                                        ${selisih > 0 ? '+' : ''} Rp${formatRupiah(selisih.toString())}
                                        </td>
                                    </tr>
                                `;
							});
                        
						$('.putContentHere').html(tableColumn);
                        $('.filterTabungan').html("Rp"+formatRupiah(filterTabungan.toString()));
                        $('#grossIncome').html('Rp'+formatRupiah(grs.toString()));

                        // Process Data
                        const sortedItems = mmm.sort((a, b) => b.qty - a.qty);
                        const totalNetIncome = mmm.reduce((sum, item) => {
                            if (item.produk.harga_modal > 0) { // Ignore if harga_modal is 0
                                const net = item.produk.harga - item.produk.harga_modal;
                                return sum + (net * item.qty); // Multiply net by qty if qty > 1
                            }
                            return sum; // Skip if harga_modal is 0
                        }, 0);

                        // Render Most Bought Items
                        const mostBoughtList = document.getElementById("mostBoughtList");
                        mostBoughtList.innerHTML = ""; 

                        // Group items by product name and calculate total quantity sold
                        const groupedItems = sortedItems.reduce((acc, item) => {
                            // Check if the product already exists in the accumulator
                            if (acc[item.produk.nama_produk]) {
                                // If product exists, add quantity to the total
                                acc[item.produk.nama_produk].qty += item.qty;
                            } else {
                                // If product doesn't exist, initialize it with the current quantity
                                acc[item.produk.nama_produk] = {
                                    nama_produk: item.produk.nama_produk,
                                    qty: item.qty
                                };
                            }
                            return acc;
                        }, {});

                        // Convert groupedItems to an array and sort by total quantity sold (descending)
                        const groupedItemsArray = Object.values(groupedItems)
                            .sort((a, b) => b.qty - a.qty) 
                            .slice(0, 3);  // Get the top 3 items

                        if(groupedItemsArray.length < 1){
                            $('#mostBoughtList').html('Tidak ada data yang dapat ditampilkan');
                        }
                        // Display the grouped and total quantity sold in the list
                        groupedItemsArray.forEach(item => {
                            const li = document.createElement("li");
                            li.className = "list-group-item d-flex justify-content-between align-items-center";
                            li.innerHTML = `
                                <span class="flex-grow-1">${item.nama_produk}</span>
                                <span>${item.qty} pcs</span>
                            `;
                            mostBoughtList.appendChild(li);
                        });

                        // Add event listener to the "Show All Data" button
                        document.getElementById("showAllButton").addEventListener("click", function() {
                            const fullItemList = document.getElementById("fullItemList");
                            fullItemList.innerHTML = "";  // Clear previous content

                            // Display all items in the modal
                            Object.values(groupedItems).forEach(item => {
                                const li = document.createElement("li");
                                li.className = "list-group-item d-flex justify-content-between align-items-center";
                                li.innerHTML = `
                                    <span class="flex-grow-1">${item.nama_produk}</span>
                                    <span>${item.qty} pcs</span>
                                `;
                                fullItemList.appendChild(li);
                            });

                            // Show the modal
                            $('#dataModal').modal('toggle');
                        });

                        // Render Net Income
                        document.getElementById("netIncome").textContent = `Rp${totalNetIncome.toLocaleString('id-ID')}`;
                        

                        
							
					}else {
                        filterTabungan = 0;
                    }
				}
				
				save2();
				
				
			}

            function getAccounts(){
				
				const save2 = async () => {
					const posts2 = await axios.get('<?= api_url(); ?>api/v1/account/auth', {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {
						console.log(err.response);
					});
			
					if (posts2.status == 200) {
							$('.totalTabungan').html("Rp"+formatRupiah(posts2.data.data[0].balance));
					}
				}
				
				save2();
				
				
			}

            function openInvoice(str){
                let htmlx = '';

                var x = findElement(invoiceDataArray, "invoice", str);
                
                let listPembelian = '';

                htmlx = `
                    <div class="invoice-card" id="divToPRINT">
                        <div class="invoice-title">
                            <div id="main-title" style="display:block!important;">
                            <h4 style="margin-bottom:0;padding-bottom:0px; color:black!important;background: black;text-align: center;color: white!important;padding: 7px;">INVOICE</h4>
                            <span style=" color:black!important; display:block; font-size:12px!important;">#${x['invoice']}</span>
                            </div>
                            
                            <span id="date" style=" color:black!important;">${moment(x['created_at']).format('DD/MM/YYYY - HH:mm:ss')} WIB</span>
                            <span style="display:block; font-size:11px; color:black!important;">ID Card . 000</span>
                        </div>
                        <div style="text-align:center; color:black!important; ">
                        <font style="font-weight:bolder;">${x['account_seller']}</font>
                        <small style="display:block;color: rgba(0, 0, 0, 0.4); color:black!important;">Beringin Taluk, Kec. Kuantan Tengah, Kabupaten Kuantan Singingi, Riau 29566</small>
                        
                        </div>
                        
                        <div class="invoice-details">
                            <table class="invoice-table" style="width:100%;">
                            <thead>
                                <tr>
                                <td style="color:black!important;">PRODUK</td>
                                <td style="color:black!important;">JML</td>
                                <td style="color:black!important;">HARGA</td>
                                </tr>
                            </thead>
                            
                            <tbody class="detailTabelInvoice">
                                <tr><td colspan="3">
                                    <div style="width:100%; height:5px;border-bottom: 0.5px dashed grey;"></div>
                                </td></tr>
                                
                                <tr class="calc-row">
                                <td colspan="2">Subtotal</td>
                                <td style="color:black!important;">Rp${formatRupiah(x['total_spending'])}</td>
                                </tr>
                                <tr class="calc-row">
                                <td colspan="2">Biaya transaksi</td>
                                <td style="color:black!important;">Rp${formatRupiah(x['admin_fee'])}</td>
                                </tr>
                                <tr class="calc-row">
                                <td colspan="2">Total</td>
                                <td style="color:black!important;">Rp${formatRupiah(x['total_payment'])}</td>
                                </tr>
                                <tr><td colspan="3">
                                    <div style="width:100%; height:5px;border-bottom: 0.5px dashed grey;"></div>
                                </td></tr>
                                <tr class="calc-row">
                                <td colspan="2"><b>Sisa Saldo</b></td>
                                <td style="color:black!important;">Rp${formatRupiah(x['sisa_saldo'])}</td>
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

            }

            function findElement(arr, propName, propValue) {
                for (var i=0; i < arr.length; i++)
                    if (arr[i][propName] == propValue)
                return arr[i];
            }

            function callJmlDt(jmlh, str){
                $('.jmldt').html('jmlh');
                $('.stdt').html(str);
                pecahData();
            }

            $(".inputFilterItem").bind("change", function() {
                
                isFilterOn = true;

                var inputs = $(".inputFilterItem");
                let ursets = '';
                urlsets = '<?= api_url(); ?>api/v1/trx/all-invoice?mutasi=true';
                let valueData = '';
                for(var i = 0; i < inputs.length; i++){
                    valueData = $(inputs[i]).data('object');
                    if($(inputs[i]).val()!=''){
                        urlsets+='&'+valueData+'='+$(inputs[i]).val();
                    }
                    
                }
                console.log(urlsets);
                urlSetFromFilter = urlsets;
                showData(endPointGetDataSiswa);
            });

            function resetFilter(){
                isFilterOn = false;
                $('.date-range').html('');
                $('.date-range').val('');

                var inputs = $(".inputFilterItem");
                for(var i = 0; i < inputs.length; i++){
                    $(inputs[i]).val('');
                }

                showData(endPointGetDataSiswa);
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
                $('#namaUser').html('');
                $('#namaUser').append($('<option>', { 
                    value: '',
                    text : 'Pilih siswa'
                }));
                $.each(dataNama, function (i, item) {
                    $('#namaUser').append($('<option>', { 
                        value: item.account_users,
                        text : item.account_users 
                    }));
                });

                //FILTER 2 %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
                $('#noInvoice').html('');
                $('#noInvoice').append($('<option>', { 
                    value: '',
                    text : 'Pilih nomor invoice'
                }));
                $.each(dataNoInvoice, function (i, item) {
                    $('#noInvoice').append($('<option>', { 
                        value: item.invoice,
                        text : item.invoice 
                    }));
                });
            }

            let statustoggle = true;

            function setValToggle(){
                let valx = $('.form-toggle-showdata').prop('checked');
                console.log(valx);

                if(valx==true){
                    statustoggle = false;
                }else {
                    statustoggle = true;
                }

                showData();
            }
		</script>