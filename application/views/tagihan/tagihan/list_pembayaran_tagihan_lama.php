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

.detail-row {
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
  .detail-row {
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
                    <div class="col-lg-4 col-md-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row p-3">
                                    <div class="col-12 text-center">
                                    <h4>Total</h4>
                                    </div>
                                    <div class="col-lg-6 col-6 text-center">
                                        <h4>Cash</h4>
                                        <h1 style="font-weight:900;" class="cash_t"></h1>
                                    </div>
                                    <div class="col-lg-6 col-6 text-center">
                                        <h4>Transfer</h4>
                                        <h1 style="font-weight:900;" class="transfer_t"></h1>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                    </div>
                    <div class="col-lg-8 col-md-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <h6>Filter Tanggal</h6>
                                        <div class="filter-container" style="width:100%;display:block;"></div>
                                    </div>
                                    <div class="col-6">
                                        <p>Reset filter dengan menampilkan semua data awal.</p>
                                        <button class="btn btn-secondary" onclick="location.reload();">Reset Filter</button>
                                    </div>
                                    
                                </div>
                            
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h6>Rangkuman Data</h6>
                                <div class="filter-container2" style="width:100%;display:block;"></div>
                            </div>
                        </div>
                    </div>
                </div>
                
				<div class="card">
					<div class="card-body">
						
                    <div class="table-responsive">
                        <button class="btn btn-sm btn-outline-primary me-2 mb-3" id="btnSave2PDF" onclick="save2PDF('tabelPrint','landscape');" style="border-radius:0px;"><i class="bx bxs-file-export"></i> Export PDF</button>
						<button class="btn btn-sm btn-outline-success me-2 mb-3" onclick="saveToExcel('tabelsiswa');" style="border-radius:0px;"><i class="bx bxs-file-export"></i> Export Excel</button>
						<button class="btn btn-sm btn-outline-success me-2 mb-3" onclick="downloadAll();" style="border-radius:0px;"><i class="bx bxs-file-export"></i> Export All Data</button>
							<table class="table mb-0 tabelsiswa table-hover w-100" id="tabelPrint">
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
                    'Metode Pembayaran': (
                    mapping.oncard_invoice.includes('BILLER-IPAYMU') ||
                    mapping.oncard_invoice.includes('BILLER-BRKS')
                    ) ? 'TRANSFER' : 'CASH',

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

			function showData(params) {
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
                    $('.putContentHere').html(tableColumn);

                    const save2 = async () => {
                        const posts2 = await axios.get(params, {
                            headers: {
                                'Authorization': 'Bearer ' + localStorage.getItem('_token'),
                                'no-pagination': false
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

                            posts2.data.forEach(item => {
                                const itemDate = moment(item.created_at).format('YYYY-MM-DD');
                                if (!selectedDate || itemDate === selectedDate) {
                                    const invoice = item.oncard_invoice;
                                    if (!grouped[invoice]) {
                                        grouped[invoice] = [];
                                    }
                                    grouped[invoice].push(item);
                                    
                                    // Build payment summary
                                    const studentName = item.tagihan_user?.user?.name || 'Unknown';
                                    const isTransfer = ['BILLER-IPAYMU', 'BILLER-BRKS'].some(biller => item.oncard_invoice.includes(biller));

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
                                                    <th>Nama Siswa</th>
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
                                        <td>${name}</td>
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
                                $('.putContentHere').html(tableColumn);
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
                                                ['BILLER-IPAYMU', 'BILLER-BRKS'].some(biller => mapping.oncard_invoice.includes(biller))
                                                    ? '<div class="badge bg-info">TRANSFER</div>' 
                                                    : '<div class="badge bg-success">CASH</div>'
                                            }
                                        </td>

                                        <td><b>${mapping.tagihan_user?.user?.name ?? 'not set'}</b></td>
                                        <td>${mapping.nama_tagihan}</td>
                                        <td style="background:#e4fff6b8 !important;color:black; font-weight:bold;">
                                            ${formatRupiah(mapping.jumlah_bayar.toString())}
                                        </td>
                                        <td>${formatRupiah(mapping.jumlah_tagihan.toString())}</td>
                                        <td>${formatRupiah(mapping.jumlah_dibayarkan.toString())}</td>
                                        <td>${formatRupiah(mapping.jumlah_belum_dibayarkan.toString())}</td>
                                        <td style="text-transform:capitalize;">${mapping.status_pembayaran}</td>
                                        <td class="text-end">
                                            <button type="button" class="btn btn-sm btn-outline-success" onclick="window.location.href='<?=base_url();?>CPanel_Tagihan/TagihanSiswaByNIS/${mapping.tagihan_user?.user?.siswas?.oncard_siswa_id ?? '-'}'">
                                                <i class="bx bx-show-alt"></i> Lihat Tagihan
                                            </button>
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


                            $('.putContentHere').html(tableColumn);
                            // createPaginations(posts2.data, "siswa-pagination-container", "siswa-pagination-details", "showData");
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
                        <img src="${imgUrlX}" style="width:100px; height:auto; display:block; margin:auto;position:absolute; border-radius:10px;"/>
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
                            <div>: ${firstItem.user?.name || 'Tidak tercantum'}</div>
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
                            <div>: ${['BILLER-IPAYMU', 'BILLER-BRKS'].some(biller => firstItem.oncard_invoice.includes(biller)) ? 'Transfer' : 'Tunai'}</div>
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
                            <p>(${firstItem.user?.name || 'Tidak tercantum'})</p>
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
            // function showRecap(){
			// 	let num = 0;
			// 	let htmlx = '';
            //     const save2 = async () => {
			// 		const posts2 = await axios.get( '<?= api_url_tagihan(); ?>api/report/payment' , {
			// 			headers: {
			// 				'Authorization': 'Bearer ' + localStorage.getItem('_token')
			// 			}
			// 		}).catch((err) => {
			// 			console.log(err.response);
			// 		});
			
			// 		if (posts2.status == 200) {
			// 				num += 1;
							
            //                 let x_cash = posts2.data.JumlahTrxCash;
            //                 let x_trans = posts2.data.JumlahTrxPaymentGateway;
            //                 $('.cash_t').html(formatRupiah(x_cash.toString()));
            //                 $('.transfer_t').html(formatRupiah(x_trans.toString()));

			// 		}
			// 	}
			// 	save2();
			// }
            function formatRupiahNew(amount) {
                return new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                    minimumFractionDigits: 0
                }).format(amount);
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