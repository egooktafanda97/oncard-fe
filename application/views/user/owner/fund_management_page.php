<script src="https://cdn.jsdelivr.net/npm/xlsx@0.18.5/dist/xlsx.full.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.14/index.global.min.js"></script>
<style>

.balance-toggle {
    color: #6c757d;
    font-size: 1.1rem;
    line-height: 1;
    vertical-align: middle;
}

.balance-toggle:hover {
    color: #0d6efd;
}

.balance-info {
    transition: all 0.3s ease;
}

.bank-summary {
    background-color: #f8f9fa;
}
.bank-summary h5 {
    color: #2c3e50;
    border-bottom: 1px solid #dee2e6;
    padding-bottom: 8px;
}
.toggle-details {
    margin-top: 10px;
}

    #calendar {
    max-width: 100%;
    margin: 40px auto;
    }
/* Table Styles */
#maintable {
  width: 100%;
  border-collapse: separate;
  border-spacing: 0;
  font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
  font-size: 0.875rem;
}

/* Header Styles */
.table-head th {
  position: sticky;
  top: 0;
  background-color: #f8f9fa;
  font-weight: 600;
  padding: 12px 15px;
  border-bottom: 2px solid #dee2e6;
  z-index: 10;
}

/* Provider Color Coding */
.bg-brks { background-color: #e3f2fd; color: #0d47a1; }
.bg-brks-light { background-color: #bbdefb; }
.bg-ipaymu { background-color: #e8f5e9; color: #2e7d32; }
.bg-ipaymu-light { background-color: #c8e6c9; }

/* Row Styles */
.institution-row {
  transition: background-color 0.2s ease;
}
.institution-row:hover {
  background-color: rgba(0, 0, 0, 0.03);
}

.institution-name {
  font-weight: 500;
  min-width: 180px;
}
.inst-name {
  font-weight: 500;
  color: #333;
}
.inst-meta {
  display: flex;
  gap: 6px;
  margin-top: 4px;
}
.badge {
  font-size: 0.7em;
  padding: 2px 6px;
  border-radius: 4px;
  font-weight: 500;
}
.brks-badge {
  background-color: #bbdefb;
  color: #0d47a1;
}
.ipaymu-badge {
  background-color: #c8e6c9;
  color: #2e7d32;
}

/* Amount Cells */
.amount {
  font-weight: 500;
  text-align: right;
  padding: 10px 12px;
  border-left: 1px solid #f0f0f0;
}
.oncard-brks { color: #1565c0; }
.ontuition-brks { color: #1976d2; }
.oncard-ipaymu { color: #2e7d32; }
.ontuition-ipaymu { color: #388e3c; }

/* Fees Cells */
.fees {
  text-align: right;
  font-weight: 500;
  color: #616161;
}
.brks-fees { color: #0d47a1; }
.ipaymu-fees { color: #2e7d32; }

/* Progress Bar in Total */
.progress {
  height: 4px;
  background-color: #f0f0f0;
  border-radius: 2px;
}
.progress-bar {
  height: 100%;
}
.brks-bar { background-color: #2196f3; }
.ipaymu-bar { background-color: #4caf50; }

/* Summary Row */
.summary-row {
  background-color: #f5f5f5;
  font-weight: 600;
  border-top: 2px solid #ddd;
}
.summary-label {
  font-weight: 700;
  color: #333;
}
.brks-summary { color: #0d47a1; }
.ipaymu-summary { color: #2e7d32; }
.grand-total {
  color: #4a148c;
  font-weight: 700;
  font-size: 1.05em;
}

/* Responsive */
@media (max-width: 992px) {
  #maintable {
    font-size: 0.8rem;
  }
  .table-head th, 
  .institution-row td {
    padding: 8px 10px;
  }
}

/* Table Styling */
#maintable {
  width: 100%;
  border-collapse: separate;
  border-spacing: 0;
  font-size: 0.9rem;
}

#maintable th {
  position: sticky;
  top: 0;
  background-color: #f8f9fa;
  font-weight: 600;
  padding: 12px 15px;
  border-bottom: 2px solid #dee2e6;
  z-index: 10;
}

#maintable td {
  padding: 10px 12px;
  vertical-align: middle;
  border-top: 1px solid #e9ecef;
}

/* Institution Row */
.institution-row {
  cursor: pointer;
  transition: background-color 0.2s;
}

.institution-row:hover {
  background-color: rgba(0, 0, 0, 0.03);
}

/* Summary Row */
.summary-row {
  background-color: #f5f5f5;
  font-weight: 600;
}

.summary-row td {
  border-top: 2px solid #ddd;
}

/* Modal Styling */
#transactionModal .modal-body {
  max-height: 90vh;
  overflow-y: auto;
}

#transactionModal .nav-tabs .nav-link {
  font-weight: 500;
}

#transactionModal .table-sm {
  font-size: 0.85rem;
}

#transactionModal .table-sm th {
  background-color: #f8f9fa;
}

/* Responsive */
@media (max-width: 992px) {
  #maintable {
    font-size: 0.8rem;
  }
  
  #maintable th, 
  #maintable td {
    padding: 8px 10px;
  }
}
</style>

<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">KEUANGAN</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">FUNDS</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
			  
				<div class="card">
					<div class="card-header pt-3" style="display:flex;     flex-direction: row;
    justify-content: space-between;">
						<h3>Transaksi Menunggu Closing</h3>

						<div class="mb-3" style="display:flex; flex-direction:column;">
								<button class="btn btn-outline-primary px-4 mb-3" id="batchActionBtn" style="background-image: linear-gradient(to right bottom, #5abece, #31c3c3, #16c6ad, #35c78e, #5dc669);color:white;font-size:2em;font-weight:bold;margin-right:-16px; margin-top:-15px;border-top-left-radius:0px; border-bottom-right-radius:0px;">
									Pencairan Semua <i class="bx bx-chevron-right text-white text-lg" style="font-size:1.4em;"></i>
								</button>
								<div style="display:flex; flex:1;gap:10px;align-items:center;width:100%;">
									<button class="btn btn-outline-primary px-4" id="onlyONCARD" style="background-image: linear-gradient(to right bottom, #14a09f, #00ab9a, #0db58e, #39be7e, #5dc669);color:white;font-size:1em;font-weight:bold;">
										Only ONCARD <i class="bx bx-chevron-right text-white text-lg" style="font-size:1em;"></i>
									</button>
									<button class="btn btn-outline-primary px-4" id="onlyONTUITION" style="border:none;background-image: linear-gradient(to right bottom, #c2f318, #a4e93a, #8ade4e, #72d25d, #5dc669);color:white;font-size:1em;font-weight:bold;">
										Only ONTUITION <i class="bx bx-chevron-right text-white text-lg" style="font-size:1em;"></i>
									</button>
								</div>
								
							</div>
					</div>
					<div class="card-body">
						
						<div class="table-responsive">

                        	 <table id="maintable" class="table mb-0">
								<thead class="table-light">
								</thead>
								<tbody class="putContentHere">
								</tbody>
							</table>

						</div>
					</div>
				</div>


			</div>
		</div>

        <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Confirm Transaction Submission</h5>
                        <button type="button" class="close btn btn-outline-dark" data-bs-dismiss="modal" aria-label="Close">
                            <i class="bx bx-x" style="margin:0;"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Summary will be inserted here -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" id="confirmSubmit">Submit Transactions</button>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">

			let processedData;
            let modeSett;

            document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                timeZone: 'UTC',
                initialView: 'dayGridMonth',
                events: '#',
                editable: true,
                selectable: true
            });

            calendar.render();
            });

            let idsett = '';

            $('#modalImportData').on('hidden.bs.modal', function () {
                // $('#modalSetCard').modal('toggle');
                idsett = '';
                
            });
            
			$(document).ready(function () {
                showData();
            });
			
			
			function showData() {
				let loadingHtml = `
					<tr>
					<td colspan="12" class="text-center py-4">
						<div class="spinner-border text-success" role="status">
						<span class="visually-hidden">Loading...</span>
						</div>
					</td>
					</tr>`;
				$('.putContentHere').html(loadingHtml);
				
				const fetchData = async () => {
					try {
						const response = await axios.get('<?=base_url(); ?>CPanel_Admin/getDataFundManagement');
						if (response.status === 200) {
							const data = response.data.data;
                            
							processedData = data.reduce((acc, item) => {
								const isONCARD = (
									(item.providers === 'BRKS' && item.payment_method === 'BRKS-PAY') ||
									(item.providers === 'ipaymu' && 
										((item.payment_method === 'va' || item.payment_method === 'plugins' || item.payment_method === null) &&
										(item.clasification === 'topup' || item.clasification === null))
									)
								);
								const category = isONCARD ? 'ONCARD' : 'ONTUITION';
								const provider = item.providers === 'BRKS' ? 'BRKS' : 'IPaymu';

								if (!acc[item.instansi_id]) {
									acc[item.instansi_id] = {
										name: item.nama,
										code: item.kode_instansi,
										ONCARD: { BRKS: { total: 0, count: 0, adminFee: 0 }, IPaymu: { total: 0, count: 0, adminFee: 0 } },
										ONTUITION: { BRKS: { total: 0, count: 0, adminFee: 0 }, IPaymu: { total: 0, count: 0, adminFee: 0 } },
										transactions: [],
                                        saldoBillingTransfer: item.saldoBillingTransfer || 0 // Add this line
									};
								}
								const amount = parseInt(item.jumlah_topup) || 0;
								const adminFee = parseInt(item.administrative_fee) || 0;

								acc[item.instansi_id][category][provider].total += amount;
								acc[item.instansi_id][category][provider].adminFee += adminFee;
								acc[item.instansi_id][category][provider].count++;
								acc[item.instansi_id].transactions.push({ ...item, category, provider });

								return acc;
							}, {});

							renderTable(processedData);
						}
					} catch (error) {
						console.error('Error:', error);
						$('.putContentHere').html(`
							<tr>
								<td colspan="13" class="text-center py-4 text-danger">
									<i class='bx bx-error-alt'></i> Error loading data. Please try again.
								</td>
							</tr>`);
					}
				};
							
				// Format currency helper
				function formatCurrency(num) {
					return new Intl.NumberFormat('id-ID', { 
					style: 'currency', 
					currency: 'IDR', 
					minimumFractionDigits: 0 
					}).format(num).replace('Rp', 'Rp ');
				}
				
				// Render the table
				function renderTable(data) {
                let html = `
                <thead class="table-light">

                    <tr class="table-light">
                        <td colspan="13" class="text-end">
                            <button id="toggleAllBalances" class="btn btn-sm btn-outline-primary text-white fw-bold" style="border:none;background-image: linear-gradient(to right bottom, #29d370, #6fcd57, #96c645, #b4bd3c, #cdb43d);">
                                <i class="bx bx-show"></i> CEK BALANCING
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <th rowspan="2"><input type="checkbox" id="selectAll" style="width:20px;height:20px;" /></th>
                        <th rowspan="2">#</th>
                        <th rowspan="2">Nama Institusi</th>
                        <th rowspan="2">Kode</th>
                        <th colspan="4" class="text-center" style="background-image: linear-gradient(to right bottom, #14a09f, #00ab9a, #0db58e, #39be7e, #5dc669);color:white;">
                            <img src="https://qrion.id/assets_qrion/img/logo_oncard_x.png" style="width:100px;"/>
                        </th>
                        <th colspan="5" class="text-center" style="background-image: linear-gradient(to right bottom, #c2f318, #a4e93a, #8ade4e, #72d25d, #5dc669);">
                            <img src="https://qrion.id/assets_qrion/img/logo_ontuition_x.png" style="width:120px;"/>
                        </th>
                        <th rowspan="2">Total</th>
                    </tr>
                    <tr>
                        <!-- ONCARD headers -->
                        <th class="bg-primary text-white">EDUPAY Total</th>
                        <th class="bg-primary text-white">QRION Fee</th>
                        <th class="bg-success text-white">IPaymu Total</th>
                        <th class="bg-success text-white">QRION Fee</th>
                        
                        <!-- ONTUITION headers -->
                        <th class="bg-primary text-white">EDUPAY Total</th>
                        <th class="bg-primary text-white">QRION Fee</th>
                        <th class="bg-success text-white">IPaymu Total</th>
                        <th class="bg-success text-white">QRION Fee</th>
                        <th class="bg-warning text-dark">Saldo Billing</th>
                    </tr>
                </thead>
                <tbody>`;
                
                // Add rows for each institution
                Object.entries(data).forEach(([instansiId, instansi], index) => {
                    const brksONCARD = instansi.ONCARD.BRKS.total;
                    const brksONTUITION = instansi.ONTUITION.BRKS.total;
                    const ipaymuONCARD = instansi.ONCARD.IPaymu.total;
                    const ipaymuONTUITION = instansi.ONTUITION.IPaymu.total;

                    const totalONCARD = brksONCARD + ipaymuONCARD;
                    const totalONTUITION = brksONTUITION + ipaymuONTUITION;
                    const totalAll = totalONCARD + totalONTUITION;
                    
                    // Calculate balancing
                    const balance = instansi.saldoBillingTransfer - totalONTUITION;
                    const balanceClass = balance === 0 ? 'text-success' : (balance > 0 ? 'text-primary' : 'text-danger');

                    html += `
                    <tr class="institution-row" data-id="${instansiId}">
                        <td><input type="checkbox" style="width:20px;height:20px;" class="rowCheckbox bg-success" value="${instansiId}" /></td>
                        <td>${index + 1}</td>
                        <td>
                            <div class="fw-bold">${instansi.name}</div>
                            <small class="text-muted">${instansi.transactions.length} transactions</small>
                        </td>
                        <td style="border-right:1px solid #ccc">
                            ${instansi.code}
                        </td>
                        
                        <!-- ONCARD columns -->
                        <td class="text-end">${instansi.ONCARD.BRKS.count ? formatCurrency(brksONCARD) : '-'}</td>
                        <td class="text-end">${instansi.ONCARD.BRKS.count ? formatCurrency(instansi.ONCARD.BRKS.adminFee) : '-'}</td>
                        <td class="text-end">${instansi.ONCARD.IPaymu.count ? formatCurrency(ipaymuONCARD) : '-'}</td>
                        <td class="text-end" style="border-right:1px solid #ccc">${instansi.ONCARD.IPaymu.count ? formatCurrency(instansi.ONCARD.IPaymu.adminFee) : '-'}</td>
                        
                        <!-- ONTUITION columns -->
                        <td class="text-end">${instansi.ONTUITION.BRKS.count ? formatCurrency(brksONTUITION) : '-'}</td>
                        <td class="text-end">${instansi.ONTUITION.BRKS.count ? formatCurrency(instansi.ONTUITION.BRKS.adminFee) : '-'}</td>
                        <td class="text-end">${instansi.ONTUITION.IPaymu.count ? formatCurrency(ipaymuONTUITION) : '-'}</td>
                        <td class="text-end">${instansi.ONTUITION.IPaymu.count ? formatCurrency(instansi.ONTUITION.IPaymu.adminFee) : '-'}</td>
                        <td class="text-end ${balanceClass}" style="border-right:1px solid #ccc">${formatCurrency(instansi.saldoBillingTransfer)}
                        <button class="btn btn-sm btn-link p-0 ms-1 balance-toggle" data-instansi="${instansiId}">
                            <i class="bx bx-chevron-down balance-toggle-icon"></i>
                        </button>
                        </td>
                        
                        <!-- Total column -->
                        <td class="text-end fw-bold">${formatCurrency(totalAll)}</td>
                    </tr>
                    
                    <tr class="balance-info bg-secondary" style="display:none;background-image: linear-gradient(to top, #e7e7e7, #ebebeb, #f0f0f0, #f4f4f4, #f9f9f9, #fbfbfb, #fdfdfd, #ffffff, #ffffff, #ffffff, #ffffff, #ffffff);" data-instansi="${instansiId}">
                        <td colspan="4" class="text-end fw-bold">Balance Check:</td>
                        <td colspan="4" class="text-end fw-bold" style="border-right:1px solid #ccc">ONCARD Total: ${formatCurrency(totalONCARD)}</td>
                        <td colspan="5" class="text-end ${balanceClass} fw-bold" style="border-right:1px solid #ccc">ONTUITION vs Saldo: ${formatCurrency(balance)}</td>
                    </tr>`;
                });

                            
                const grandTotals = Object.values(data).reduce((acc, instansi) => {
                    acc.ONCARD.BRKS.total += instansi.ONCARD.BRKS.total;
                    acc.ONCARD.BRKS.adminFee += instansi.ONCARD.BRKS.adminFee;
                    acc.ONCARD.IPaymu.total += instansi.ONCARD.IPaymu.total;
                    acc.ONCARD.IPaymu.adminFee += instansi.ONCARD.IPaymu.adminFee;

                    acc.ONTUITION.BRKS.total += instansi.ONTUITION.BRKS.total;
                    acc.ONTUITION.BRKS.adminFee += instansi.ONTUITION.BRKS.adminFee;
                    acc.ONTUITION.IPaymu.total += instansi.ONTUITION.IPaymu.total;
                    acc.ONTUITION.IPaymu.adminFee += instansi.ONTUITION.IPaymu.adminFee;

                    acc.total += instansi.ONCARD.BRKS.total + instansi.ONCARD.IPaymu.total +
                                instansi.ONTUITION.BRKS.total + instansi.ONTUITION.IPaymu.total;

                    return acc;
                }, {
                    ONCARD: { BRKS: { total: 0, adminFee: 0 }, IPaymu: { total: 0, adminFee: 0 } },
                    ONTUITION: { BRKS: { total: 0, adminFee: 0 }, IPaymu: { total: 0, adminFee: 0 } },
                    total: 0
                });

                html += `
                    <tr class="table-active fw-bold">
                        <td colspan="4">Grand Total</td>
                        <td class="text-end">${formatCurrency(grandTotals.ONCARD.BRKS.total)}</td>
                        <td class="text-end">${formatCurrency(grandTotals.ONCARD.BRKS.adminFee)}</td>
                        <td class="text-end">${formatCurrency(grandTotals.ONCARD.IPaymu.total)}</td>
                        <td class="text-end">${formatCurrency(grandTotals.ONCARD.IPaymu.adminFee)}</td>
                        <td class="text-end">${formatCurrency(grandTotals.ONTUITION.BRKS.total)}</td>
                        <td class="text-end">${formatCurrency(grandTotals.ONTUITION.BRKS.adminFee)}</td>
                        <td class="text-end">${formatCurrency(grandTotals.ONTUITION.IPaymu.total)}</td>
                        <td class="text-end">${formatCurrency(grandTotals.ONTUITION.IPaymu.adminFee)}</td>
                        <td class="text-end">${formatCurrency(grandTotals.total)}</td>
                        <td class="text-end">${formatCurrency(grandTotals.total)}</td>
                    </tr>
                </tbody>`;

                $('#maintable').html(html);

                // Add this after your table rendering code
                // $(document).on('click', '.institution-row', function() {
                //     const instansiId = $(this).data('id');
                //     const balanceRow = $(`.balance-info[data-instansi="${instansiId}"]`);
                //     balanceRow.toggle();
                    
                //     // Update the button icon
                //     const isVisible = balanceRow.is(':visible');
                //     $(this).find('.balance-toggle-icon')
                //         .toggleClass('bx-chevron-down', !isVisible)
                //         .toggleClass('bx-chevron-up', isVisible);
                // });

                // Toggle all balances button
                let allBalancesVisible = false;
                $('#toggleAllBalances').click(function() {
                    allBalancesVisible = !allBalancesVisible;
                    $('.balance-info').toggle(allBalancesVisible);
                    
                    // Update button text and icon
                    $(this).html(`
                        <i class="bx ${allBalancesVisible ? 'bx-hide' : 'bx-show'}"></i> 
                        ${allBalancesVisible ? 'Hide' : 'Show'} All Balances
                    `);
                    
                    // Update all toggle icons in institution rows
                    $('.institution-row .balance-toggle-icon')
                        .toggleClass('bx-chevron-down', !allBalancesVisible)
                        .toggleClass('bx-chevron-up', allBalancesVisible);
                });

               

                // Checkbox functionality
                $('#selectAll').on('change', function () {
                    $('.rowCheckbox').prop('checked', this.checked);
                });

                $('.rowCheckbox').on('change', function () {
                    if (!this.checked) {
                        $('#selectAll').prop('checked', false);
                    } else if ($('.rowCheckbox:checked').length === $('.rowCheckbox').length) {
                        $('#selectAll').prop('checked', true);
                    }
                });

                // Click row to view details
                // $('.institution-row').click(function (e) {
                //     if (!$(e.target).is('input[type="checkbox"]')) {
                //         const instansiId = $(this).data('id');
                //         showTransactionDetails(instansiId, data[instansiId].transactions);
                //     }
                // });

                // Handle balance toggle button clicks (without opening transaction dialog)
                $(document).on('click', '.balance-toggle', function(e) {
                    e.stopPropagation(); // This prevents the event from bubbling up
                    e.preventDefault(); // This prevents any default behavior
                    
                    const instansiId = $(this).data('instansi');
                    const balanceRow = $(`.balance-info[data-instansi="${instansiId}"]`);
                    const isVisible = balanceRow.is(':visible');
                    
                    balanceRow.toggle(!isVisible);
                    $(this).find('.balance-toggle-icon')
                        .toggleClass('bx-chevron-down', isVisible)
                        .toggleClass('bx-chevron-up', !isVisible);
                });

                // Handle institution row clicks (will still open transaction dialog)
                $(document).on('click', '.institution-row', function(e) {
                    // Don't open dialog if clicking on checkbox or balance toggle
                    if ($(e.target).is('input[type="checkbox"]') || 
                        $(e.target).closest('.balance-toggle').length) {
                        return;
                    }
                    
                    const instansiId = $(this).data('id');
                    showTransactionDetails(instansiId, processedData[instansiId].transactions);
                });
				
				}
				
				// Show transaction details modal
				function showTransactionDetails(instansiId, transactions) {
					// Group transactions by category and provider
					const grouped = {
					ONCARD: { BRKS: [], IPaymu: [] },
					ONTUITION: { BRKS: [], IPaymu: [] }
					};
					
					transactions.forEach(txn => {
					grouped[txn.category][txn.provider].push(txn);
					});
					
					// Create modal content
					let modalContent = `
					<div class="modal fade" id="transactionModal" tabindex="-1" aria-hidden="true">
						<div class="modal-dialog modal-fullscreen">
						<div class="modal-content">
							<div class="modal-header bg-success text-white">
							<h5 class="modal-title text-white fw-bold">Transaction Details</h5>
							<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
							<h5>${transactions[0].nama} (${transactions[0].kode_instansi})</h5>
							
							<ul class="nav nav-tabs mb-3" id="transactionTabs" role="tablist">
								<li class="nav-item" role="presentation">
								<button class="nav-link active" data-bs-toggle="tab" data-bs-target="#oncard-brks" type="button">
									ONCARD BRKS (${grouped.ONCARD.BRKS.length})
								</button>
								</li>
								<li class="nav-item" role="presentation">
								<button class="nav-link" data-bs-toggle="tab" data-bs-target="#oncard-ipaymu" type="button">
									ONCARD IPaymu (${grouped.ONCARD.IPaymu.length})
								</button>
								</li>
								<li class="nav-item" role="presentation">
								<button class="nav-link" data-bs-toggle="tab" data-bs-target="#ontuition-brks" type="button">
									ONTUITION BRKS (${grouped.ONTUITION.BRKS.length})
								</button>
								</li>
								<li class="nav-item" role="presentation">
								<button class="nav-link" data-bs-toggle="tab" data-bs-target="#ontuition-ipaymu" type="button">
									ONTUITION IPaymu (${grouped.ONTUITION.IPaymu.length})
								</button>
								</li>
							</ul>
							
							<div class="tab-content">
								<!-- ONCARD BRKS Tab -->
								<div class="tab-pane fade show active" id="oncard-brks">
								${renderTransactionTable(grouped.ONCARD.BRKS)}
								</div>
								
								<!-- ONCARD IPaymu Tab -->
								<div class="tab-pane fade" id="oncard-ipaymu">
								${renderTransactionTable(grouped.ONCARD.IPaymu)}
								</div>
								
								<!-- ONTUITION BRKS Tab -->
								<div class="tab-pane fade" id="ontuition-brks">
								${renderTransactionTable(grouped.ONTUITION.BRKS)}
								</div>
								
								<!-- ONTUITION IPaymu Tab -->
								<div class="tab-pane fade" id="ontuition-ipaymu">
								${renderTransactionTable(grouped.ONTUITION.IPaymu)}
								</div>
							</div>
							</div>
						</div>
						</div>
					</div>
					`;
					
					// Add modal to body if not exists
					if ($('#transactionModal').length === 0) {
					$('body').append(modalContent);
					} else {
					$('#transactionModal').replaceWith(modalContent);
					}
					
					// Show the modal
					const modal = new bootstrap.Modal(document.getElementById('transactionModal'));
					modal.show();
				}
				
				// Render transaction table for modal
				function renderTransactionTable(transactions) {
					if (transactions.length === 0) {
					return '<div class="alert alert-info">No transactions found</div>';
					}
					
					let html = `
					<div class="table-responsive">
						<table class="table table-sm">
						<thead style="">
							<tr>
                            <th>Date</th>
							<th>Invoice</th>
							<th>Nama Pengguna</th>
							<th>Method</th>
							<th class="text-end">Amount</th>
							<th class="text-end">Admin Fee</th>
							<th>Status</th>
							</tr>
						</thead>
						<tbody>`;


                    const sortedTransactions = [...transactions].sort((a, b) => {
                        return new Date(b.tglTerbuat) - new Date(a.tglTerbuat);
                    });
					
					sortedTransactions.forEach(txn => {
					// Determine payment method display
					let methodDisplay = '';
					if (txn.providers === 'BRKS') {
						if (txn.payment_method === 'BRKS-PAY') {
							if (txn.props && txn.props.includes('QRISBRK')) {
								methodDisplay = '<img style="width:1.4em;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAAAXNSR0IArs4c6QAAAPZJREFUaEPtl0sOwzAIRJP7H7qVuopQ1McIEuJ2vAVhzwdj79via1/8/JsBTCtoBZ6swKt4uKhud73P8b5ZqHvD7noGQA57nIXoxooWIQDVerKFqhsSwKhoKl9pYgMIFFcJsYVUz6Y8fSiayncPCIylGBXqyT1AgyvGaQ5U6xkAMWgFMnODhgmxPB43gGkJflqB7i8gDTKKn4qtPCVUt9A1qsYNYHkFqOFVD1M+xeW3kAEEDxLDFLcC3V/KFOP06TjG1YKUX42X50C1iQ3gTII7nxLdPSPfQtVJbAB/ZyHVMiP5dDWOHErZ1AAUtq7ItQJXsKrUfAM+5GgxOqPSlgAAAABJRU5ErkJggg=="/> QRIS';
							} 
							else if (txn.props && txn.props.includes('TOPUP Edupay')) {
								methodDisplay = '<i class="bx bx-mobile-alt"></i> Mobile Banking BRKS';
							}
							else {
								methodDisplay = '<i class="bx bx-user-voice"></i> MB / Teller';
							}
						} else {
						methodDisplay = '<i class="bx bx-chip"></i> Virtual Token';
						}
					} else {
						if (txn.payment_method === 'va') {
						methodDisplay = '<i class="bx bx-notification"></i> Virtual Account';
						} else if (txn.payment_method === 'plugins') {
						methodDisplay = '<i class="bx bx-plug"></i> Plugins';
						} else {
						methodDisplay = '<i class="bx bx-dollar"></i> Other';
						}
					}
					html += `
						<tr>
						<td>${moment(txn.tglTerbuat).format('DD-MM-YYYY, HH:mm:ss')}</td>
                        <td><small>${txn.invoice}</small></td>
                        <td><small>${txn.userPengguna}</small></td>
						<td>${methodDisplay}</td>
						<td class="text-end">${formatCurrency(parseInt(txn.jumlah_topup) || 0)}</td>
						<td class="text-end">${formatCurrency(parseInt(txn.administrative_fee) || 0)}</td>
						<td>
							<span class="badge ${txn.status_id === '1' ? 'bg-success' : 'bg-warning'}">
							${txn.status_id === '1' ? 'Completed' : 'Pending'}
							</span>
						</td>
						</tr>`;
					});
					
					// Calculate totals
					const totalAmount = transactions.reduce((sum, txn) => sum + (parseInt(txn.jumlah_topup) || 0), 0);
					const totalAdminFee = transactions.reduce((sum, txn) => sum + (parseInt(txn.administrative_fee) || 0), 0);
					
					html += `
						</tbody>
						<tfoot>
							<tr class="table-active">
							<td colspan="4" class="text-end"><strong>Total:</strong></td>
							<td class="text-end fw-bold">${formatCurrency(totalAmount)}</td>
							<td class="text-end fw-bold">${formatCurrency(totalAdminFee)}</td>
							<td></td>
							</tr>
						</tfoot>
						</table>
					</div>`;
					
					return html;
				}

				
				// Button to get selected IDs and show their detail transactions
				$(document).on('click', '#batchActionBtn', function () {
					const selectedIds = $('.rowCheckbox:checked').map(function () {
						return $(this).val();
					}).get();

					if (selectedIds.length === 0) {
						alert('Please select at least one institution.');
						return;
					}

					// Aggregate transactions
					const allTransactions = [];
					selectedIds.forEach(id => {
						if (processedData[id]) {
							allTransactions.push(...processedData[id].transactions);
						}
					});

					showMultiTransactionDetails(selectedIds, allTransactions);
				});
				
				
				// Button to get selected IDs and show their detail transactions
				$(document).on('click', '#onlyONCARD', function () {
					const selectedIds = $('.rowCheckbox:checked').map(function () {
						return $(this).val();
					}).get();

					if (selectedIds.length === 0) {
						alert('Please select at least one institution.');
						return;
					}

                    modeSett = 'ONCARD';

					// Aggregate transactions
					const allTransactions = [];
					selectedIds.forEach(id => {
						if (processedData[id]) {
							allTransactions.push(...processedData[id].transactions);
						}
					});

					showMultiTransactionDetails(selectedIds, allTransactions,'ONCARD');
				});
				
				
				$(document).on('click', '#onlyONTUITION', function () {
					const selectedIds = $('.rowCheckbox:checked').map(function () {
						return $(this).val();
					}).get();

					if (selectedIds.length === 0) {
						alert('Please select at least one institution.');
						return;
					}

                    modeSett = 'ONTUITION';

					// Aggregate transactions
					const allTransactions = [];
					selectedIds.forEach(id => {
						if (processedData[id]) {
							allTransactions.push(...processedData[id].transactions);
						}
					});

					showMultiTransactionDetails(selectedIds, allTransactions,'ONTUITION');
				});

				function showMultiTransactionDetails(instansiIds, transactions, showMode = 'ALL') {
					// showMode can be: 'ALL', 'ONCARD', or 'ONTUITION'
					const grouped = {
						ONCARD: { BRKS: [], IPaymu: [] },
						ONTUITION: { BRKS: [], IPaymu: [] }
					};

					transactions.forEach(txn => {
						grouped[txn.category][txn.provider].push(txn);
					});

					const names = instansiIds.map(id => processedData[id]?.name || '(Unknown)').join(', ');

					// Modify renderTransactionTable to include checkboxes
					
                    const renderTransactionTableWithCheckboxes = (transactions, tableId = 'table' + Math.random().toString(36).substr(2, 9)) => {
                        if (transactions.length === 0) {
                            return '<div class="alert alert-info">No transactions found</div>';
                        }
                        
                        let html = `
                        <div class="table-responsive">
                            <table class="table table-sm" id="${tableId}" data-instansi="4">
                            <thead>
                                <tr>
                                <th style="width: 40px;"><input type="checkbox" id="selectAll-${tableId}" class="form-check-input select-all-checkbox"></th>
                                <th>Date</th>
                                <th>Invoice</th>
                                <th>Nama Pengguna</th>
                                <th>Method</th>
                                <th class="text-end">Amount</th>
                                <th class="text-end">Admin Fee</th>
                                <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>`;

                        const sortedTransactions = [...transactions].sort((a, b) => {
                            return new Date(b.tglTerbuat) - new Date(a.tglTerbuat);
                        });
						
						sortedTransactions.forEach((txn, index) => {
						// Determine payment method display (your existing code)
						let methodDisplay = '';
						if (txn.providers === 'BRKS') {
							if (txn.payment_method === 'BRKS-PAY') {
							if (txn.props && txn.props.includes('QRISBRK')) {
								methodDisplay = '<img style="width:1.4em;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAAAXNSR0IArs4c6QAAAPZJREFUaEPtl0sOwzAIRJP7H7qVuopQ1McIEuJ2vAVhzwdj79via1/8/JsBTCtoBZ6swKt4uKhud73P8b5ZqHvD7noGQA57nIXoxooWIQDVerKFqhsSwKhoKl9pYgMIFFcJsYVUz6Y8fSiayncPCIylGBXqyT1AgyvGaQ5U6xkAMWgFMnODhgmxPB43gGkJflqB7i8gDTKKn4qtPCVUt9A1qsYNYHkFqOFVD1M+xeW3kAEEDxLDFLcC3V/KFOP06TjG1YKUX42X50C1iQ3gTII7nxLdPSPfQtVJbAB/ZyHVMiP5dDWOHErZ1AAUtq7ItQJXsKrUfAM+5GgxOqPSlgAAAABJRU5ErkJggg=="/> QRIS';
							} 
							else if (txn.props && txn.props.includes('TOPUP Edupay')) {
								methodDisplay = '<i class="bx bx-mobile-alt"></i> Mobile Banking BRKS';
							}
							else {
								methodDisplay = '<i class="bx bx-user-voice"></i> MB / Teller';
							}
							} else {
							methodDisplay = '<i class="bx bx-chip"></i> Virtual Token';
							}
						} else {
							if (txn.payment_method === 'va') {
							methodDisplay = '<i class="bx bx-notification"></i> Virtual Account';
							} else if (txn.payment_method === 'plugins') {
							methodDisplay = '<i class="bx bx-plug"></i> Plugins';
							} else {
							methodDisplay = '<i class="bx bx-dollar"></i> Other';
							}
						}
						
						html += `
                                <tr>
                                <td><input type="checkbox" class="form-check-input transaction-checkbox" 
                                        data-id="${txn.pgID}" data-amount="${txn.jumlah_topup}"  
                                        data-pengguna="${txn.userPengguna.replace(/'/g, '')}"
                                        data-instansi="${txn.namaINSTANSI.replace(/'/g, '')}"
                                        data-akunbank="${txn.akunBank}"
                                        data-namabank="${txn.namaBank}"
                                        data-fee="${txn.administrative_fee}" checked></td>
                                <td>${moment(txn.tglTerbuat).format('DD-MM-YYYY, HH:mm:ss')}</td>
                                <td><small>${txn.invoice}</small></td>
                                <td><small>${txn.userPengguna}</small></td>
                                <td>${methodDisplay}</td>
                                <td class="text-end">${formatCurrency(parseInt(txn.jumlah_topup) || 0)}</td>
                                <td class="text-end">${formatCurrency(parseInt(txn.administrative_fee) || 0)}</td>
                                <td>
                                    <span class="badge ${txn.status_id === '1' ? 'bg-success' : 'bg-warning'}">
                                    ${txn.status_id === '1' ? 'Completed' : 'Pending'}
                                    </span>
                                </td>
                                </tr>`;
                        });
						
						// Calculate totals
						const totalAmount = transactions.reduce((sum, txn) => sum + (parseInt(txn.jumlah_topup) || 0), 0);
						const totalAdminFee = transactions.reduce((sum, txn) => sum + (parseInt(txn.administrative_fee) || 0), 0);
						
						html += `
						</tbody>
						<tfoot>
							<tr class="table-active">
							<td colspan="5" class="text-end"><strong>Total:</strong></td>
							<td class="text-end fw-bold">${formatCurrency(totalAmount)}</td>
							<td class="text-end fw-bold">${formatCurrency(totalAdminFee)}</td>
							<td></td>
							</tr>
						</tfoot>
						</table>
						</div>`;
						
						return html;
					};

					// Determine which tabs to show based on showMode
					const showONCARD = showMode === 'ALL' || showMode === 'ONCARD';
					const showONTUITION = showMode === 'ALL' || showMode === 'ONTUITION';

					let modalContent = `
					<div class="modal fade" id="transactionModal" tabindex="-1" aria-hidden="true">
						<div class="modal-dialog modal-fullscreen">
						<div class="modal-content">
							<div class="modal-header bg-primary text-white" style="background-image: linear-gradient(to right bottom, #14a09f, #00ab9a, #0db58e, #39be7e, #5dc669);">
							<h5 class="modal-title text-white fw-bold">
								${showMode === 'ONCARD' ? 'ONCARD Transactions' : 
								showMode === 'ONTUITION' ? 'ONTUITION Transactions' : 
								'Multiple Instansi Akan Dicairkan'} 
							</h5>
							<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
							<h6 class="mb-3"><strong>Institutions:</strong></h6>
							<div class="d-flex flex-wrap gap-2 mb-3" id="institutionAlerts">
								${names.split(',').map(name => `
								<div class="alert alert-primary py-1 px-2 m-0">
									${name.trim()}
								</div>
								`).join('')}
							</div>

							<div class="d-flex justify-content-between align-items-center mb-3">
								<div>
								<button class="btn btn-sm btn-outline-primary me-2" id="selectAllBtn">
									<i class="fas fa-check-square"></i> Select All
								</button>
								<button class="btn btn-sm btn-outline-secondary" id="deselectAllBtn">
									<i class="fas fa-square"></i> Deselect All
								</button>
								</div>
								<div class="text-end text-lg">
								<span class="badge bg-info" style="font-size:26px;" id="selectedCount">0 selected</span>
								<span class="badge bg-success ms-2" style="font-size:26px;" id="selectedAmount">Rp 0</span>
								</div>
							</div>

							${showMode === 'ALL' ? `
							<ul class="nav nav-tabs mb-3" id="transactionTabs" role="tablist">
								${showONCARD ? `
								<li class="nav-item"><button class="nav-link active" data-bs-toggle="tab" data-bs-target="#oncard-brks" type="button">ONCARD BRKS (${grouped.ONCARD.BRKS.length})</button></li>
								<li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#oncard-ipaymu" type="button">ONCARD IPaymu (${grouped.ONCARD.IPaymu.length})</button></li>
								` : ''}
								${showONTUITION ? `
								<li class="nav-item"><button class="nav-link ${!showONCARD ? 'active' : ''}" data-bs-toggle="tab" data-bs-target="#ontuition-brks" type="button">ONTUITION BRKS (${grouped.ONTUITION.BRKS.length})</button></li>
								<li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#ontuition-ipaymu" type="button">ONTUITION IPaymu (${grouped.ONTUITION.IPaymu.length})</button></li>
								` : ''}
							</ul>
							` : ''}

							<div class="tab-content">
								${showONCARD ? `
								${showMode === 'ALL' ? `
									<div class="tab-pane fade show active" id="oncard-brks">${renderTransactionTableWithCheckboxes(grouped.ONCARD.BRKS)}</div>
									<div class="tab-pane fade" id="oncard-ipaymu">${renderTransactionTableWithCheckboxes(grouped.ONCARD.IPaymu)}</div>
								` : `
									<div id="oncard-brks">${renderTransactionTableWithCheckboxes(grouped.ONCARD.BRKS)}</div>
									<div id="oncard-ipaymu">${renderTransactionTableWithCheckboxes(grouped.ONCARD.IPaymu)}</div>
								`}
								` : ''}
								
								${showONTUITION ? `
								${showMode === 'ALL' ? `
									<div class="tab-pane fade ${!showONCARD ? 'show active' : ''}" id="ontuition-brks">${renderTransactionTableWithCheckboxes(grouped.ONTUITION.BRKS)}</div>
									<div class="tab-pane fade" id="ontuition-ipaymu">${renderTransactionTableWithCheckboxes(grouped.ONTUITION.IPaymu)}</div>
								` : `
									<div id="ontuition-brks">${renderTransactionTableWithCheckboxes(grouped.ONTUITION.BRKS)}</div>
									<div id="ontuition-ipaymu">${renderTransactionTableWithCheckboxes(grouped.ONTUITION.IPaymu)}</div>
								`}
								` : ''}
							</div>
							</div>
							<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-success me-2" id="exportXLS">
                                <i class="fas fa-file-excel"></i> Export to Excel
                            </button>
							<button type="button" class="btn btn-primary" id="confirmSelection" style="background-image: linear-gradient(to right bottom, #14a09f, #00ab9a, #0db58e, #39be7e, #5dc669);>
								<i class="fas fa-check-circle"></i> Confirm Selected Transactions
							</button>
							</div>
						</div>
						</div>
					</div>`;

                    function exportToExcel(selectedTransactions) {
                        // Create Excel data structure with headers
                        const excelData = [
                            ['type_rekening', 'no_rekening', 'nama_rekening', 'jumlah','Nama Instansi'],
                        ];

                        // Group transactions by institution and bank account
                        const institutionMap = {};
                        let totalFees = 0;
                        
                        selectedTransactions.forEach(txn => {
                            const key = `${txn.instansi_id}_${txn.akunBank}`;
                            if (!institutionMap[key]) {
                                institutionMap[key] = {
                                    instansi_id: txn.instansi_id,
                                    akunBank: txn.akunBank || 'NOT SET',
                                    namaBank: txn.namaBank || 'NOT SET',
                                    total: 0,
                                    namaInstansi: txn.namaInstansi
                                };
                            }
                            institutionMap[key].total += txn.amount;
                            totalFees += txn.fee || 0; // Sum all fees
                        });

                        // Add each institution's data to Excel
                        Object.values(institutionMap).forEach((institution, index) => {
                            excelData.push([
                                'W', // type_rekening
                                institution.akunBank, // no_rekening
                                institution.namaBank, // nama_rekening
                                institution.total, // jumlah
                                institution.namaInstansi // jumlah
                            ]);
                        });

                        // Add BRKS PHOENIX SOFTWARE row (total fees)
                        excelData.push([
                            'W', // type_rekening
                            '0000000000', // placeholder account number
                            'BRKS PHOENIX SOFTWARE', // nama_rekening
                            totalFees,// total fees amount,
                            'PESANTREN DEMO' // total fees amount,
                        ]);

                        // Create Excel file
                        const wb = XLSX.utils.book_new();
                        const ws = XLSX.utils.aoa_to_sheet(excelData);
                        XLSX.utils.book_append_sheet(wb, ws, "Transaction Report");
                        
                        // Generate and download
                        const fileName = `Transaction_Report_${new Date().toISOString().slice(0,10)}.xlsx`;
                        XLSX.writeFile(wb, fileName);
                    }

                    if ($('#transactionModal').length === 0) {
						$('body').append(modalContent);
					} else {
						$('#transactionModal').replaceWith(modalContent);
					}

					const modal = new bootstrap.Modal(document.getElementById('transactionModal'));
					modal.show();

                    // Add this event handler after modal.show()
                    $('#exportXLS').click(function() {
                        const selectedTransactions = [];
                        $('#transactionModal .transaction-checkbox:checked').each(function() {
                            selectedTransactions.push({
                                id: $(this).data('id'),
                                amount: parseInt($(this).data('amount')) || 0,
                                instansi_id: $(this).closest('table').data('instansi'),
                                userPengguna: $(this).data('pengguna'),
                                namaInstansi: $(this).data('instansi'),
                                akunBank: $(this).data('akunbank'),
							    namaBank: $(this).data('namabank'),
                                fee: $(this).data('fee')
                            });
                        });
                        
                        if (selectedTransactions.length === 0) {
                            alert('Please select at least one transaction to export');
                            return;
                        }
                        
                        
                        exportToExcel(selectedTransactions);
                    });

					// Add checkbox functionality
					$('#transactionModal').on('change', '.transaction-checkbox', function() {
						updateSelectionSummary();
					});

					$('#selectAllBtn').click(function() {
						$('#transactionModal .transaction-checkbox').prop('checked', true).trigger('change');
					});
					
					$('#selectAll2').click(function() {
						$('#transactionModal .transaction-checkbox').prop('checked', true).trigger('change');
					});

					$('#deselectAllBtn').click(function() {
						$('#transactionModal .transaction-checkbox').prop('checked', false).trigger('change');
					});

                    $('#transactionModal').on('change', '.transaction-checkbox', function() {
                        updateSelectionSummary();
                    });

                    // Tab-specific select all functionality
                    $('#transactionModal').on('click', '#selectAllBtn', function() {
                        const activeTab = $('#transactionModal .tab-pane.active');
                        activeTab.find('.transaction-checkbox').prop('checked', true).trigger('change');
                    });

                    $('#transactionModal').on('click', '#selectAll2', function() {
                        const activeTab = $('#transactionModal .tab-pane.active');
                        activeTab.find('.transaction-checkbox').prop('checked', true).trigger('change');
                    });

                    $('#transactionModal').on('click', '#deselectAllBtn', function() {
                        const activeTab = $('#transactionModal .tab-pane.active');
                        activeTab.find('.transaction-checkbox').prop('checked', false).trigger('change');
                    });

                    // Global select all (for all tabs)
                    $('#transactionModal').on('click', '#selectAllGlobalBtn', function() {
                        $('#transactionModal .transaction-checkbox').prop('checked', true).trigger('change');
                    });

                    $('#transactionModal').on('click', '#deselectAllGlobalBtn', function() {
                        $('#transactionModal .transaction-checkbox').prop('checked', false).trigger('change');
                    });


                    // Handle select all for each individual table
                    $('#transactionModal').on('change', '.select-all-checkbox', function() {
                        const tableId = $(this).closest('table').attr('id');
                        const isChecked = $(this).prop('checked');
                        $(`#${tableId} .transaction-checkbox`).prop('checked', isChecked).trigger('change');
                    });


                    
                    
					$('#confirmSelection').click(function() {
                        const selectedTransactions = [];
                        $('#transactionModal .transaction-checkbox:checked').each(function() {
                            selectedTransactions.push({
                                id: $(this).data('id'),
                                amount: $(this).data('amount'),
                                userPengguna: $(this).data('pengguna'),
                                akunBank: $(this).data('akunbank'),
                                namaBank: $(this).data('namabank'),
                                fee: $(this).data('fee'),
                                instansi_id: $(this).closest('table').data('instansi')
                            });
                        });
                        
                        if (selectedTransactions.length === 0) {
                            alert('Please select at least one transaction');
                            return;
                        }

                        // Generate invoice number (PRBLN_42SN90_29072025153854 format)
                        const generateInvoice = () => {
                            const now = new Date();
                            const datePart = now.getDate().toString().padStart(2, '0') + 
                                            (now.getMonth()+1).toString().padStart(2, '0') + 
                                            now.getFullYear().toString().slice(-2);
                            const timePart = now.getHours().toString().padStart(2, '0') + 
                                            now.getMinutes().toString().padStart(2, '0') + 
                                            now.getSeconds().toString().padStart(2, '0');
                            return `PRBLN_${Math.random().toString(36).substr(2, 6).toUpperCase()}_${datePart}${timePart}`;
                        };
                        
                        const invoiceNumber = generateInvoice();
                        
                        // Group transactions by namaBank and include HTML details
                        const transactionsByBank = {};
                        selectedTransactions.forEach(transaction => {
                            if (!transactionsByBank[transaction.namaBank]) {
                                transactionsByBank[transaction.namaBank] = {
                                    totalAmount: 0,
                                    totalFee: 0,
                                    count: 0,
                                    transactions: [],
                                    instansi_id: transaction.instansi_id,
                                    html: `
                                    <div class="instansi-details">
                                        <h4>${transaction.namaBank || 'No Bank Specified'}</h4>
                                        <p><strong>Account:</strong> ${transaction.akunBank || 'N/A'}</p>
                                        <p><strong>Institution ID:</strong> ${transaction.instansi_id}</p>
                                        <hr>
                                        <table class="table table-sm">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>User</th>
                                                    <th>Amount</th>
                                                    <th>Fee</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                    `
                                };
                            }
                            
                            transactionsByBank[transaction.namaBank].totalAmount += transaction.amount;
                            transactionsByBank[transaction.namaBank].totalFee += transaction.fee;
                            transactionsByBank[transaction.namaBank].count++;
                            transactionsByBank[transaction.namaBank].transactions.push(transaction);
                            
                            // Add to HTML details
                            transactionsByBank[transaction.namaBank].html += `
                                <tr>
                                    <td>${transaction.id}</td>
                                    <td>${transaction.userPengguna}</td>
                                    <td>${formatCurrency(transaction.amount)}</td>
                                    <td>${formatCurrency(transaction.fee)}</td>
                                </tr>
                            `;
                        });
                        
                        // Complete HTML for each bank
                        Object.values(transactionsByBank).forEach(bank => {
                            bank.html += `
                                            </tbody>
                                            <tfoot>
                                                <tr class="table-active">
                                                    <td colspan="2"><strong>Total</strong></td>
                                                    <td>${formatCurrency(bank.totalAmount)}</td>
                                                    <td>${formatCurrency(bank.totalFee)}</td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                            `;
                        });
                        
                        // Generate summary HTML
                        let summaryHTML = '';
                        for (const [bankName, data] of Object.entries(transactionsByBank)) {
                            summaryHTML += `
                            <div class="bank-summary mb-3 p-3 border rounded">
                                <h5>${bankName || 'No Bank Specified'}</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p><strong>Total Transactions:</strong> <span class="fw-bold">${data.count}</span></p>
                                        <p><strong>Total Amount:</strong> <span class="fw-bold">${formatCurrency(data.totalAmount)}</span></p>
                                    </div>
                                    <div class="col-md-6">
                                        <p><strong>Total Fee:</strong> <span class="fw-bold">${formatCurrency(data.totalFee)}</span></p>
                                        <p><strong>Net Amount:</strong> <span class="fw-bold">${formatCurrency(data.totalAmount - data.totalFee)}</span></p>
                                    </div>
                                </div>
                                <div class="transaction-details mt-2" style="display: none;">
                                    ${data.html}
                                </div>
                                <button class="btn btn-sm btn-outline-primary toggle-details" data-bank="${bankName}">
                                    Show Details
                                </button>
                            </div>`;
                        }
                        
                        // Add required information form
                        summaryHTML += `
                        <div class="required-info mt-4 p-3 border rounded bg-light">
                            <h5 class="mb-3">Transfer Information</h5>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Invoice Number</label>
                                    <input type="text" class="form-control" value="${invoiceNumber}" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="transferDate" class="form-label">Transfer Date <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="transferDate" required>
                                    <div class="invalid-feedback">Please select a transfer date</div>
                                </div>
                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="confirmApproval" required>
                                        <label class="form-check-label" for="confirmApproval">
                                            I confirm this transfer has been approved <span class="text-danger">*</span>
                                        </label>
                                        <div class="invalid-feedback">You must confirm approval</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="transferProgress" class="mt-4" style="display: none;">
                            <div class="progress mb-3">
                                <div id="progressBar" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 0%"></div>
                            </div>
                            <div id="progressMessages" class="alert alert-info">
                                <p id="currentStep">Preparing transfer...</p>
                                <ul id="progressDetails" class="mb-0"></ul>
                            </div>
                        </div>`;

                        $('#confirmationModal .modal-body').html(summaryHTML);
                        $('#confirmationModal').modal('show');
                        
                        // Hide the transaction modal only after confirmation is shown
                        setTimeout(() => {
                            $('#transactionModal').modal('hide');
                        }, 300);
                        
                        // Handle confirmation close
                        $('#confirmationModal').off('hidden.bs.modal').on('hidden.bs.modal', function() {
                            $('#transactionModal').modal('show');
                        });

                        // Set default date to today
                        $('#transferDate').val(new Date().toISOString().split('T')[0]);
                        
                        // Toggle details visibility
                        $(document).on('click', '.toggle-details', function() {
                            const bankName = $(this).data('bank');
                            const detailsDiv = $(this).siblings('.transaction-details');
                            detailsDiv.toggle();
                            $(this).text(detailsDiv.is(':visible') ? 'Hide Details' : 'Show Details');
                        });
                        
                        // Handle final submission with validation
                        $('#confirmSubmit').off('click').on('click', function() {
    // Validate form
    const form = $('.required-info');
    form.addClass('was-validated');
    
    // Check if all required fields are filled
    let isValid = true;
    form.find('[required]').each(function() {
        if (!$(this).val()) {
            isValid = false;
            return false; // Break the loop
        }
    });
    
    if (!isValid || !form.find('#confirmApproval').is(':checked')) {
        $('.is-invalid').first().get(0)?.scrollIntoView({
            behavior: 'smooth',
            block: 'center'
        });
        return;
    }
    
    // Get and validate all required data
    const transferDate = $('#transferDate').val();
    if (!transferDate) {
        alert('Transfer date is required');
        return;
    }

    // Prepare data for submission with proper validation
    const listInstansiData = Array.from(new Set(selectedTransactions.map(t => t.instansi_id))).map(instansi_id => {
        // Calculate total nominal for this instansi
        const nominal = selectedTransactions
            .filter(t => t.instansi_id === instansi_id)
            .reduce((sum, t) => sum + (t.amount || 0), 0);
        
        return {
            instansi_id: instansi_id,
            nominal: nominal
        };
    });
    
    // Prepare data for submission with proper validation
    const submissionData = {
    mode: modeSett,
    transaction_ids: selectedTransactions.map(t => t.id),
    html: Object.values(transactionsByBank).map(bank => bank.html).join(''),
    list_instansi: JSON.stringify(listInstansiData), // Stringify the array of objects
    invoice: invoiceNumber,
    date_given: transferDate,
    transfer_info: {
        approved: $('#confirmApproval').is(':checked')
    }
};

    
    // Validate that no critical fields are empty
    if (!submissionData.invoice || !submissionData.date_given || 
        !submissionData.transaction_ids || submissionData.transaction_ids.length === 0) {
        alert('Required data is missing. Please check your selections.');
        return;
    }
    
    // Show loading state and progress UI
    const submitBtn = $('#confirmSubmit');
    submitBtn.prop('disabled', true).html('<span class="spinner-border spinner-border-sm" role="status"></span> Processing...');
    
    $('#transferProgress').show();
    updateProgress(0, 'Starting transfer process...');
    
    // Function to update progress UI
    function updateProgress(percent, message, detail) {
        $('#progressBar').css('width', percent + '%');
        $('#currentStep').text(message);
        if (detail) {
            $('#progressDetails').append('<li>' + detail + '</li>');
        }
    }
    
    // Function to handle ONTUITION transfers
    async function processOntuitionTransfers() {
        updateProgress(30, 'Processing ONTUITION transfers...');
        
        try {
            let processedCount = 0;
            const totalTransactions = selectedTransactions.length;
            
            for (const transaction of selectedTransactions) {
                const form_data = new FormData();
                form_data.append('amount', transaction.amount || 0);
                form_data.append('account_number_from', selected_accountNumber || '');
                form_data.append('account_number_to', selected_accountNumberCash || '');
                form_data.append('pin', selected_pin || '');
                form_data.append('description', `Transfer for transaction ${transaction.id || ''}`);
                form_data.append('instansi_id', transaction.instansi_id || '');
                
                try {
                    updateProgress(
                        30 + Math.floor((processedCount / totalTransactions) * 50),
                        `Processing transaction ${processedCount + 1} of ${totalTransactions}`,
                        `Transferring ${formatCurrency(transaction.amount)} for transaction ID: ${transaction.id}`
                    );
                    
                    const response = await axios.post('<?= api_url(); ?>api/transfer/transfer-balance', form_data, {
                        headers: {
                            'Authorization': 'Bearer ' + localStorage.getItem('_token')
                        }
                    });
                    
                    processedCount++;
                    updateProgress(
                        30 + Math.floor((processedCount / totalTransactions) * 50),
                        `Processed ${processedCount} of ${totalTransactions} transactions`,
                        `Success: ${response.data.message}`
                    );
                    
                } catch (error) {
                    processedCount++;
                    let errorMsg = 'Error processing transaction';
                    if (error.response) {
                        if (error.response.data.message === 'your balance is not enough!') {
                            errorMsg = 'Insufficient balance for transaction';
                        } else if (error.response.data.message === 'account not found!') {
                            errorMsg = 'Invalid PIN for transaction';
                        }
                    }
                    
                    updateProgress(
                        30 + Math.floor((processedCount / totalTransactions) * 50),
                        `Processed ${processedCount} of ${totalTransactions} transactions (with errors)`,
                        `Error: ${errorMsg} for transaction ID: ${transaction.id}`
                    );
                }
            }
            
            return processedCount === totalTransactions;
            
        } catch (error) {
            console.error('Error in ONTUITION processing:', error);
            updateProgress(80, 'Encountered errors during ONTUITION processing', 'Some transactions may not have been processed');
            return false;
        }
    }
    
    // Main processing function
    async function processTransfer() {
        try {
            // Step 1: Submit to FundManagementSubmitData
            updateProgress(10, 'Submitting transaction data...');
            
            const form_data = new FormData();
            form_data.append('mode', modeSett);
            form_data.append('html', Object.values(transactionsByBank).map(bank => bank.html).join(''));
            form_data.append('invoice', invoiceNumber);
            form_data.append('list_instansi', JSON.stringify(listInstansiData));
            form_data.append('date_given', transferDate);
            form_data.append('transaction_ids', submissionData.transaction_ids.join(','));
            
            const fundResponse = await axios.post('<?=base_url();?>CPanel_Admin/FundManagementSubmitDataDev', form_data);

            // return false;
            
            // Check response from back-end
            if (!fundResponse.data.status) {
                throw new Error(fundResponse.data.message || 'Failed to create invoice');
            }
            
            updateProgress(20, 'Invoice created successfully', fundResponse.data.message);
            
            // Step 2: If ONTUITION, process the transfers
            // let ontuitionSuccess = true;
            // if (modeSett === 'ONTUITION') {
            //     ontuitionSuccess = await processOntuitionTransfers();
            // }
            
            // Step 3: Finalize
            updateProgress(90, 'Finalizing transfer...');
            
            // if ((modeSett === 'ONCARD') || (modeSett === 'ONTUITION' && ontuitionSuccess)) {
            if ((modeSett === 'ONCARD') || (modeSett === 'ONTUITION')) {
                updateProgress(100, 'Transfer completed successfully!');
                
                // Show success message
                setTimeout(() => {
                    $('#confirmationModal').modal('hide');
                    Swal.fire({
                        title: 'Success!',
                        text: `Transfer completed with invoice ${invoiceNumber}`,
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        location.reload();
                    });
                }, 1000);
            } else {
                updateProgress(100, 'Transfer completed with some errors');
                
                // Show warning message
                setTimeout(() => {
                    $('#confirmationModal').modal('hide');
                    Swal.fire({
                        title: 'Completed with errors',
                        text: `Transfer processed but some ONTUITION transactions failed. Invoice: ${invoiceNumber}`,
                        icon: 'warning',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        location.reload();
                    });
                }, 1000);
            }
            
        } catch (error) {
            console.error('Error:', error);
            updateProgress(100, 'Transfer failed', 'Error: ' + (error.response?.data?.message || error.message));
            
            // Show error message
            submitBtn.prop('disabled', false).text('Confirm Transfer');
            Swal.fire({
                title: 'Error!',
                text: error.response?.data?.message || error.message || 'Error processing transfer. Please try again.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        }
    }
    
    // Start the transfer process
    processTransfer();
});
                    });




					function updateSelectionSummary() {
						const selectedCount = $('#transactionModal .transaction-checkbox:checked').length;
						let totalAmount = 0;
						
						$('#transactionModal .transaction-checkbox:checked').each(function() {
						totalAmount += parseInt($(this).data('amount')) || 0;
						});
						
						$('#selectedCount').text(`${selectedCount} selected`);
						$('#selectedAmount').text(formatCurrency(totalAmount));
					}

					// Initialize summary
					updateSelectionSummary();
                }
					

				
				fetchData();

            }
		</script>