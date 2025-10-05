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
								<li class="breadcrumb-item active" aria-current="page">Admin Fee</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
			  
				<div class="card">
					<div class="card-header pt-3" style="display:flex;     flex-direction: row;
    justify-content: space-between;">
						<h3>Admin Fee</h3>

						<div class="mb-3" style="display:flex; flex-direction:column;">
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
            <td colspan="6" class="text-center py-4">
                <div class="spinner-border text-success" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </td>
        </tr>`;
    $('.putContentHere').html(loadingHtml);

    const fetchData = async () => {
        try {
            const response = await axios.get('<?=base_url(); ?>CPanel_Admin/getDataFundManagementFeeOncard');
            if (response.status === 200) {
                const data = response.data.data;
                
                // Process data to get admin fees per institution
                processedData = data.reduce((acc, item) => {
                    const instansiId = item.instansi_id;
                    const adminFee = parseInt(item.admin_fee) || 0;
                    const saldoBillingFee = parseInt(item.saldoBillingFee) || 0;
                    const adminFeeTopup = parseInt(item.administrative_fee) || 0;

                    if (!acc[instansiId]) {
                        acc[instansiId] = {
                            name: item.nama,
                            code: item.kode_instansi,
                            adminFee: 0,
                            totalAdminFee: 0,
                            totalSaldoBillingFee: 0,
                            transactionCount: 0,
                            transactions: []
                        };
                    }
                    
                    acc[instansiId].totalAdminFee += adminFee;
                    acc[instansiId].totalSaldoBillingFee = saldoBillingFee;
                    acc[instansiId].adminFee += adminFeeTopup;
                    acc[instansiId].transactionCount++;
                    acc[instansiId].transactions.push(item);

                    return acc;
                }, {});

                renderSimpleAdminFeeTable(processedData);
            }
        } catch (error) {
            console.error('Error:', error);
            $('.putContentHere').html(`
                <tr>
                    <td colspan="6" class="text-center py-4 text-danger">
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

    // Render simplified table showing only institutions and admin fees
    function renderSimpleAdminFeeTable(data) {
        let html = `
        <thead class="table-light">
            <tr>
                <th>#</th>
                <th>Nama Institusi</th>
                <th>Kode</th>
                <th class="text-end">Total Admin Fee</th>
                <th class="text-end">Jumlah Transaksi</th>

            </tr>
        </thead>
        <tbody>`;
        
        // Add rows for each institution
        Object.entries(data).forEach(([instansiId, instansi], index) => {
            // Calculate the difference
            const difference = instansi.totalSaldoBillingFee - instansi.totalAdminFee;
            const differenceClass = difference >= 0 ? 'text-success' : 'text-danger';
            const differenceIcon = difference >= 0 ? 'bx-trending-up' : 'bx-trending-down';
            const differenceText = difference >= 0 ? 'Match' : 'Defisit';

            html += `
            <tr class="institution-row" data-id="${instansiId}">
                <td>${index + 1}</td>
                <td>
                    <div class="fw-bold">${instansi.name}</div>
                    <small class="text-muted">ID: ${instansiId}</small>
                </td>
                <td>${instansi.code}</td>
                <td class="text-end fw-bold">${formatCurrency(instansi.adminFee)}</td>
                <td class="text-end">${instansi.transactionCount}</td>
            </tr>`;
        });

        // Calculate grand totals
        const grandTotalAdminFee = Object.values(data).reduce((sum, instansi) => {
            return sum + instansi.adminFee;
        }, 0);

        const grandTotalSaldoBillingFee = Object.values(data).reduce((sum, instansi) => {
            return sum + instansi.totalSaldoBillingFee;
        }, 0);

        const grandTotalDifference = grandTotalSaldoBillingFee - grandTotalAdminFee;
        const grandDifferenceClass = grandTotalDifference >= 0 ? 'text-success' : 'text-danger';

        const totalTransactions = Object.values(data).reduce((sum, instansi) => {
            return sum + instansi.transactionCount;
        }, 0);

        html += `
            <tr class="table-active fw-bold">
                <td colspan="3">Grand Total</td>
                <td class="text-end">${formatCurrency(grandTotalAdminFee)}</td>
                <td class="text-end">${totalTransactions}</td>
            </tr>
        </tbody>`;

        $('#maintable').html(html);

        // Add click handler to view transaction details
        $('.institution-row').click(function() {
            const instansiId = $(this).data('id');
            showTransactionDetails(instansiId, data[instansiId].transactions);
        });
    }

    // Show transaction details modal with filters
    function showTransactionDetails(instansiId, transactions) {
        // Calculate totals for the modal header
        const totalAdminFee = transactions.reduce((sum, txn) => sum + (parseInt(txn.admin_fee) || 0), 0);
        const totalSaldoBillingFee = transactions.reduce((sum, txn) =>(parseInt(txn.saldoBillingFee) || 0), 0);
        const difference = totalSaldoBillingFee - totalAdminFee;
        const differenceClass = difference >= 0 ? 'text-success' : 'text-danger';
        const differenceText = difference >= 0 ? 'Surplus' : 'Defisit';

        // Get unique payment types and bill types for filters
        const paymentTypes = [...new Set(transactions.map(t => t.payment_type))].filter(Boolean);
        const billTypes = [...new Set(transactions.map(t => t.bill_type))].filter(Boolean);

        let modalContent = `
        <div class="modal fade" id="transactionModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title">Transaction Details - ${transactions[0]?.nama || 'Unknown'}</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="row w-100">
                                <div class="col-lg-6 col-6">
                                    <div class="alert alert-info">
                                        <strong>Total Admin Fee:</strong> ${formatCurrency(totalAdminFee)}
                                        <strong class="d-block">Total Transactions:</strong> ${transactions.length}<br>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-6">
                                    <div class="alert alert-success">
                                        <strong>Aktual Admin Fee Disekolah:</strong><br/><font style="font-size:25px; font-weight:900;">${formatCurrency(totalSaldoBillingFee)}</font><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Withdraw Button -->
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <button id="selectAllBtn" class="btn btn-outline-primary btn-sm">
                                    <i class="bx bx-check-square"></i> Select All
                                </button>
                                <button id="deselectAllBtn" class="btn btn-outline-secondary btn-sm ms-2">
                                    <i class="bx bx-square"></i> Deselect All
                                </button>
                            </div>
                            <button id="withdrawBtn" class="btn btn-success" disabled>
                                <i class="bx bx-money"></i> Withdraw Selected
                            </button>
                        </div>
                        
                        <!-- Filter Section -->
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="paymentTypeFilter" class="form-label">Payment Type</label>
                                <select class="form-select" id="paymentTypeFilter">
                                    <option value="">All Payment Types</option>
                                    ${paymentTypes.map(type => `<option value="${type}">${type}</option>`).join('')}
                                </select>
                            </div>
                            <div class="col-md-4">
                                
                            </div>
                            <div class="col-md-4">
                                <label for="billTypeFilter" class="form-label">Bill Type</label>
                                <select class="form-select" id="billTypeFilter">
                                    <option value="">All Bill Types</option>
                                    ${billTypes.map(type => `<option value="${type}">${type}</option>`).join('')}
                                </select>
                            </div>
                            
                        </div>
                        
                        <!-- Summary Cards -->
                        <div class="row mb-3" id="filterSummary">
                            ${renderFilterSummary(transactions)}
                        </div>
                        
                        ${renderSimpleTransactionTable(transactions)}
                    </div>
                </div>
            </div>
        </div>`;
        
        // Add modal to body if not exists
        if ($('#transactionModal').length === 0) {
            $('body').append(modalContent);
        } else {
            $('#transactionModal').replaceWith(modalContent);
        }
        
        // Add filter event handlers
        $('#paymentTypeFilter, #billTypeFilter, #statusFilter').on('change', function() {
            filterTransactions(transactions);
        });
        
        // Add selection handlers
        $('#selectAllBtn').click(function() {
            $('.transaction-checkbox').prop('checked', true);
            updateWithdrawButton();
        });
        
        $('#deselectAllBtn').click(function() {
            $('.transaction-checkbox').prop('checked', false);
            updateWithdrawButton();
        });
        
        // Add withdraw button handler
        $('#withdrawBtn').click(function() {
            withdrawSelectedTransactions(instansiId, transactions);
        });
        
        // Show the modal
        const modal = new bootstrap.Modal(document.getElementById('transactionModal'));
        modal.show();
    }

    // Filter transactions based on selected filters
    function filterTransactions(allTransactions) {
        const paymentType = $('#paymentTypeFilter').val();
        const billType = $('#billTypeFilter').val();
        
        let filteredTransactions = allTransactions;
        
        if (paymentType) {
            filteredTransactions = filteredTransactions.filter(t => t.payment_type === paymentType);
        }
        
        if (billType) {
            filteredTransactions = filteredTransactions.filter(t => t.bill_type === billType);
        }
        
        // Update the table and summary
        $('#transactionTable').html(renderTransactionTableBody(filteredTransactions));
        $('#filterSummary').html(renderFilterSummary(filteredTransactions, paymentType, billType));
    }

    // Render filter summary cards
    function renderFilterSummary(transactions, paymentType = '', billType = '') {
        if (transactions.length === 0) {
            return `<div class="col-12"><div class="alert alert-warning">No transactions match the selected filters</div></div>`;
        }
        
        // Calculate summary data
        const totalAmount = transactions.reduce((sum, txn) => sum + (parseInt(txn.amount) || 0), 0);
        const totalAdminFee = transactions.reduce((sum, txn) => sum + (parseInt(txn.admin_fee) || 0), 0);
        const totalProviderFee = transactions.reduce((sum, txn) => sum + (parseInt(txn.provider_fee) || 0), 0);
        
        // Count by payment type if no specific payment type filter is applied
        let paymentTypeSummary = '';
        if (!paymentType) {
            const paymentTypeCounts = transactions.reduce((acc, txn) => {
                acc[txn.payment_type] = (acc[txn.payment_type] || 0) + 1;
                return acc;
            }, {});
            
            paymentTypeSummary = Object.entries(paymentTypeCounts)
                .map(([type, count]) => `<span class="badge bg-info me-1">${type}: ${count}</span>`)
                .join('');
        }
        
        // Count by bill type if no specific bill type filter is applied
        let billTypeSummary = '';
        if (!billType) {
            const billTypeCounts = transactions.reduce((acc, txn) => {
                acc[txn.bill_type] = (acc[txn.bill_type] || 0) + 1;
                return acc;
            }, {});
            
            billTypeSummary = Object.entries(billTypeCounts)
                .map(([type, count]) => `<span class="badge bg-secondary me-1">${type}: ${count}</span>`)
                .join('');
        }
        
        return `
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body p-3">
                        <h6 class="card-title">Transactions</h6>
                        <div class="d-flex align-items-center">
                            <div class="fw-bold fs-4 me-2">${transactions.length}</div>
                            <div class="text-muted small">transactions</div>
                        </div>
                        ${paymentTypeSummary ? `<div class="mt-2">${paymentTypeSummary}</div>` : ''}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body p-3">
                        <h6 class="card-title">Amount & Fees</h6>
                        <div class="small">
                            <div style="display:flex; justify-content:space-between"><font>Total :</font><font style="font-size:1em;font-weight:bold;display:inline;">${formatCurrency(totalAmount)}</font></div>
                            <div style="display:flex; justify-content:space-between"><font>Admin Fees:</font><font class="text-success" style="font-size:1em;font-weight:bold;display:inline;">${formatCurrency(totalAdminFee)}</font></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body p-3">
                        <h6 class="card-title">Bill Types</h6>
                        ${billTypeSummary || `<div class="text-muted">Filtered by: ${billType}</div>`}
                    </div>
                </div>
            </div>
        `;
    }

    // Update the transaction table to include checkboxes
    function renderSimpleTransactionTable(transactions) {
        if (transactions.length === 0) {
            return '<div class="alert alert-info">No transactions found</div>';
        }
        
        return `
        <div class="table-responsive">
            <table class="table table-sm table-striped">
                <thead>
                    <tr>
                        <th style="width: 40px;">
                            <input type="checkbox" id="headerCheckbox">
                        </th>
                        <th>Date (WIB)</th>
                        <th>Invoice</th>
                        <th>Nama</th>
                        <th>Payment Type</th>
                        <th>Bill Type</th>
                        <th>Amount</th>
                        <th class="text-end">Admin Fee</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody id="transactionTable">
                    ${renderTransactionTableBody(transactions)}
                </tbody>
            </table>
        </div>`;
    }


    // Update transaction table body to include checkboxes and use tbID
    function renderTransactionTableBody(transactions) {
        const sortedTransactions = [...transactions].sort((a, b) => {
            return new Date(b.tglTerbuat) - new Date(a.tglTerbuat);
        });
        
        let html = '';
        
        sortedTransactions.forEach(txn => {
            const adminFee = parseInt(txn.administrative_fee) || 0;
            const amount = parseInt(txn.jumlah_topup) || 0;
            const isCompleted = txn.status_id === '1';
            const transactionId = txn.tbID; // Using tbID as the transaction identifier
            
            html += `
                <tr>
                    <td>
                        <input type="checkbox" class="transaction-checkbox" data-id="${transactionId}" 
                               data-fee="${adminFee}" ${isCompleted ? '' : 'disabled'}>
                    </td>
                    <td>${moment(txn.tglTerbuat).format('DD-MM-YYYY HH:mm')}</td>
                    <td><small>${txn.invoice}</small></td>
                    <td><small>${txn.userPengguna}</small></td>
                    <td><span class="badge bg-light text-dark">${txn.payment_method || 'N/A'}${'-'+txn.channel || 'N/A'}</span></td>
                    <td><span class="badge bg-light text-dark">${txn.providers || 'N/A'}</span></td>
                    <td>${formatCurrency(amount)}</td>
                    <td class="text-end">${formatCurrency(adminFee)}</td>
                    <td>
                        <span class="badge ${isCompleted ? 'bg-success' : 'bg-warning'}">
                            ${isCompleted ? 'Completed' : 'Pending'}
                        </span>
                    </td>
                </tr>`;
        });
        
        return html;
    }// Update the withdraw button state based on selection
    function updateWithdrawButton() {
        const selectedCount = $('.transaction-checkbox:checked').length;
        const totalFee = calculateSelectedTotalFee();
        
        if (selectedCount > 0) {
            $('#withdrawBtn').prop('disabled', false);
            $('#withdrawBtn').html(`<i class="bx bx-money"></i> Withdraw Selected (${selectedCount}) - ${formatCurrency(totalFee)}`);
        } else {
            $('#withdrawBtn').prop('disabled', true);
            $('#withdrawBtn').html('<i class="bx bx-money"></i> Withdraw Selected');
        }
    }

    // Calculate total fee of selected transactions
    function calculateSelectedTotalFee() {
        let total = 0;
        $('.transaction-checkbox:checked').each(function() {
            total += parseInt($(this).data('fee')) || 0;
        });
        return total;
    }

    // Get selected transaction IDs (tbID) as comma-separated string
    function getSelectedTransactionIds() {
        const selectedIds = [];
        $('.transaction-checkbox:checked').each(function() {
            selectedIds.push($(this).data('id'));
        });
        return selectedIds.join(',');
    }

    // Withdraw selected transactions
    function withdrawSelectedTransactions(instansiId, transactions) {
        const selectedIds = getSelectedTransactionIds();
        const totalFee = calculateSelectedTotalFee();
        
        if (!selectedIds) {
            Swal.fire('Error', 'Please select at least one transaction to withdraw', 'error');
            return;
        }
        
        // Confirmation dialog
        Swal.fire({
            title: 'Confirm Withdrawal',
            html: `You are about to withdraw admin fees from <strong>${$('.transaction-checkbox:checked').length}</strong> transactions.<br>
                   Total amount: <strong>${formatCurrency(totalFee)}</strong>`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, withdraw now!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Create form data
                const formData = new FormData();
                formData.append('instansi_id', instansiId);
                formData.append('ids_selected', selectedIds);
                formData.append('nominal', totalFee);
                
                // Send POST request
                axios.post('<?=base_url(); ?>CPanel_Admin/withdrawFundManagementFee', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then(response => {
                    if (response.data.status==true) {
                        Swal.fire(
                            'Success!',
                            response.data.message || 'Funds have been successfully withdrawn.',
                            'success'
                        ).then(() => {
                            // Refresh the data
                            showData();
                            // Close the modal
                            bootstrap.Modal.getInstance(document.getElementById('transactionModal')).hide();
                        });
                    } else {
                        Swal.fire(
                            'Error!',
                            response.data.message || 'An error occurred during withdrawal.',
                            'error'
                        );
                    }
                })
                .catch(error => {
                    console.error('Withdrawal error:', error);
                    Swal.fire(
                        'Error!',
                        'An error occurred while processing your request. Please try again.',
                        'error'
                    );
                });
            }
        });
    }

    // Add event listener for checkboxes
    $(document).on('change', '.transaction-checkbox', function() {
        updateWithdrawButton();
    });

    // Add event listener for header checkbox
    $(document).on('change', '#headerCheckbox', function() {
        $('.transaction-checkbox:not(:disabled)').prop('checked', this.checked);
        updateWithdrawButton();
    });
    // Initialize
    fetchData();
}
		</script>