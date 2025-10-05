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
<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Seluruh Pembayaran Tagihan</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Daftar Pembayaran</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
			  
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row p-3">
                                    <div class="col-lg-6 col-6">
                                        <h4>Metode Cash</h4>
                                        <h1 style="font-weight:900;" class="cash_t"></h1>
                                    </div>
                                    <div class="col-lg-6 col-6">
                                        <h4>Metode Transfer</h4>
                                        <h1 style="font-weight:900;" class="transfer_t"></h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <p>Lihat halaman khusus untuk filterisasi data, halaman ini memiliki tingkat loading page yang relatif lebih lama. Pastikan jaringan internet Anda stabil terlebih dahulu.</p>
                                <button class="btn btn-lg btn-success"><i class="bx bx-filter"></i> Filter</button>
                            </div>
                        </div>
                    </div>
                </div>
                
				<div class="card">
					<div class="card-body">
						
                    <div class="table-responsive">
						<button class="btn btn-sm btn-outline-primary me-2 mb-3" id="btnSave2PDF" onclick="save2PDF('tabelPrint');" style="border-radius:0px;"><i class="bx bxs-file-export"></i> Export PDF</button>
						<button class="btn btn-sm btn-outline-success me-2 mb-3" onclick="saveToExcel('tabelsiswa');" style="border-radius:0px;"><i class="bx bxs-file-export"></i> Export Excel</button>
						<button class="btn btn-sm btn-outline-success me-2 mb-3" onclick="downloadAll();" style="border-radius:0px;"><i class="bx bxs-file-export"></i> Export All Data</button>

                        <table id="example" class="tabelsiswa table table-hover tabelproduk" style="width:100%;font-size:12px!important;">
                            <thead class="table-light">
                                <tr>
                                    <th>Invoice No.</th>
                                    <th>Metode Bayar</th>
                                    <th>Nama siswa</th>
                                    <th>Tagihan</th>
                                    <th style="background:#e4fff6b8 !important;color:black; font-weight:bold;">Pembayaran</th>
                                    <th>Total tagihan</th>
                                    <th>Sudah dibayarkan</th>
                                    <th>Sisa tagihan</th>
                                    <th>Dibayar Pada</th>
                                    <th>Status</th>
                                    <th class="text-end">Aksi</th>
                                </tr>
                            </thead>
                        </table>
							<table class="table mb-0 tabelsiswa" id="tabelPrint">
								<thead class="table-light">
									<tr>
										<th>Invoice No.</th>
										<th>Metode Bayar</th>
										<th>Nama siswa</th>
										<th>Tagihan</th>
										<th style="background:#e4fff6b8 !important;color:black; font-weight:bold;">Pembayaran</th>
										<th>Total tagihan</th>
										<th>Sudah dibayarkan</th>
										<th>Sisa tagihan</th>
										<th>Dibayar Pada</th>
										<th>Status</th>
										<th class="text-end">Aksi</th>
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


        <div class="modal fade" id="invoiceModal" tabindex="-1" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content" style="background:transparent;border:none;">
					<div class="modal-body">
					</div>
				</div>
			</div>
		</div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>


		<script type="text/javascript">
			let idsett = '';
			let pinsett = '';
			let modescan = '';
            let secret_code= '';
            let namauser = '';
            let namainstansi = '';
			let endPointGetDataSiswa = '<?= api_url_tagihan(); ?>api/payment/all-history-payment';
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

			var typingTimer;

            function exportToExcel(data, filename = 'rekapan-pembayaran.xlsx') {
                const formatted = data.map((mapping, i) => ({
                    No: i + 1,
                    'Invoice': mapping.oncard_invoice,
                    'Metode Pembayaran': mapping.oncard_invoice.includes('BILLER-IPAYMU') ? 'TRANSFER' : 'CASH',
                    'Nama Siswa': mapping.tagihan_user?.user?.name ?? 'not set',
                    'Nama Tagihan': mapping.nama_tagihan,
                    'Jumlah Bayar': formatRupiah(mapping.jumlah_bayar.toString()),
                    'Jumlah Tagihan': formatRupiah(mapping.jumlah_tagihan.toString()),
                    'Jumlah Dibayarkan': formatRupiah(mapping.jumlah_dibayarkan.toString()),
                    'Jumlah Belum Dibayarkan': formatRupiah(mapping.jumlah_belum_dibayarkan.toString()),
                    'Waktu Bayar': moment(mapping.created_at).format('HH:mm, DD-MM-YYYY'),
                    'Status Pembayaran': mapping.status_pembayaran
                }));

                const worksheet = XLSX.utils.json_to_sheet(formatted);
                const workbook = XLSX.utils.book_new();
                XLSX.utils.book_append_sheet(workbook, worksheet, 'Data Pembayaran');
                XLSX.writeFile(workbook, filename);
            }

            function downloadAll(params){
                let num = 0;
                
                const save2 = async () => {
                    const posts2 = await axios.get('<?= api_url_tagihan(); ?>api/payment/all-history-payment', {
                        headers: {
                            'Authorization': 'Bearer ' + localStorage.getItem('_token'),
                            'no-pagination': true
                        }
                    }).catch((err) => {
                        console.log(err.response);
                    });

                        const data = posts2.data;

                        // 🔥 Trigger download here
                        // downloadXLSX(data, 'rekapan-absensi.xlsx');
                        exportToExcel(data);
                }

                save2();
            }


			
			$(document).ready(function () {
                showData(endPointGetDataSiswa);

				$("#floatingInput").on("keyup", function() {
					let value = $(this).val().toLowerCase();
					clearTimeout(typingTimer);
					typingTimer = setTimeout(function() {
						if(value==''){
							showData(endPointGetDataSiswa);
						}else {
							showData(endPointGetDataSiswaSearch+value);	
						}
					}, 1200);

					
				});
                
            });

			function showData(params){
				let num = 0;
				let tableColumn = '';
				tableColumn += `<tr><td colspan="8" class="text-center">Loading...</td></tr>`;
				$('.putContentHere').html(tableColumn);

                table = $('#example').DataTable( {
					fixedHeader: true,
					"processing": true,
					//"serverSide": true,
					"searching": true,
					columnDefs: [
						{
							targets: [4], // Column index (e.g., 1 for the second column)
							className: 'text-right' // Adds a class for right alignment
						}
					],
					order: [[0, 'asc']], // Order by "created_at" column in descending order (most recent first)
					ajax: function (data, callback) {
						axios.get(params, {
							headers: {
                                'Authorization': 'Bearer ' + localStorage.getItem('_token'),
                                'no-pagination' : true
                                
                            }
						}).then(response => {
								
								callback({
									data: response.data
								});
							})
							.catch(error => {
								console.error('Error fetching data:', error);
							});
					},
					columns: [
						{ 
							data: 'tingkat', 
							title: 'Invoice No.', 
							render: function (data, type, row) {
								
								return `<span class="kode-semester text-primary" style="font-weight: bold; ">
											${row.oncard_invoice}
										</span>`;
							} 
						},
						{ 
							data: 'kode_kelas', 
							title: 'Metode', 
							render: function (data, type, row) {
								
								return `<span class="kode-kunjungan text-dark" style="font-weight: bold; ">
											${row.oncard_invoice.includes('BILLER-IPAYMU') ? '<div class="badge bg-info">TRANSFER</div>' : '<div class="badge bg-success">CASH</div>'}
										</span>`;
							} 
						},
						{ 
							data: 'kode_kelas', 
							title: 'Nama Biller', 
							render: function (data, type, row) {
								
								return `<span class="kode-kunjungan text-dark" style="font-weight: bold; ">
											${row.tagihan_user?.user?.name??'not set'}
										</span>`;
							} 
						},
                        { 
							data: 'kode_kelas', 
							title: 'Nama Tagihan', 
							render: function (data, type, row) {
								
								return `<span class="kode-kunjungan text-dark" style="background:#e4fff6b8 !important;color:black; font-weight:bold;">
                                        ${row.nama_tagihan}
										</span>`;
							} 
						},
						{ 
							data: 'kode_kelas', 
							title: 'Tagihan', 
							render: function (data, type, row) {
								
								return `<span class="kode-kunjungan text-dark" style="background:#e4fff6b8 !important;color:black; font-weight:bold;">
                                        ${formatRupiah(row.jumlah_bayar.toString())}
										</span>`;
							} 
						}
					],
					lengthMenu: [[20, 35, 50, -1], [20, 35, 50, "All"]], // Add "All" option
    				pageLength: 20 // Default page length
				} );
  				
			}
            
			
            
            function showRecap(){
				let num = 0;
				let htmlx = '';
                const save2 = async () => {
					const posts2 = await axios.get( '<?= api_url_tagihan(); ?>api/report/payment' , {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {
						console.log(err.response);
					});
			
					if (posts2.status == 200) {
							num += 1;
							
                            let x_cash = posts2.data.JumlahTrxCash;
                            let x_trans = posts2.data.JumlahTrxPaymentGateway;
                            $('.cash_t').html(formatRupiah(x_cash.toString()));
                            $('.transfer_t').html(formatRupiah(x_trans.toString()));

					}
				}
				save2();
			}
            function formatRupiahNew(amount) {
                return new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                    minimumFractionDigits: 0
                }).format(amount);
            }

			
		</script>