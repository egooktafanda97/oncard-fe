<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.14/index.global.min.js"></script>
<style>
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

        <script type="text/javascript">

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
						<div class="spinner-border text-primary" role="status">
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
						
						// 1. Process and categorize data with corrected classification logic
						const processedData = data.reduce((acc, item) => {
						// Corrected classification logic
						const isONCARD = item.clasification === 'topup' && item.providers === 'BRKS' || item.clasification === null && item.providers === 'ipaymu';
						const category = isONCARD ? 'ONCARD' : 'ONTUITION';
						const provider = item.providers === 'BRKS' ? 'BRKS' : 'IPaymu';
						
						if (!acc[item.instansi_id]) {
							acc[item.instansi_id] = {
							name: item.nama,
							code: item.kode_instansi,
							ONCARD: { BRKS: { total: 0, count: 0 }, IPaymu: { total: 0, count: 0 } },
							ONTUITION: { BRKS: { total: 0, count: 0 }, IPaymu: { total: 0, count: 0 } },
							fees: { BRKS: 0, IPaymu: 0 }
							};
						}
						
						const amount = parseInt(item.jumlah_topup) || 0;
						const fees = parseInt(item.administrative_fee) + parseInt(item.provider_fee) || 0;
						
						acc[item.instansi_id][category][provider].total += amount;
						acc[item.instansi_id][category][provider].count++;
						acc[item.instansi_id].fees[provider] += fees;
						
						return acc;
						}, {});
						
						// 2. Generate table HTML
						renderTable(processedData);
					}
					} catch (error) {
					console.error('Error:', error);
					$('.putContentHere').html(`
						<tr>
						<td colspan="12" class="text-center py-4 text-danger">
							<i class='bx bx-error-alt'></i> Error loading data. Please try again.
						</td>
						</tr>`);
					}
				};
				
				// Helper functions
				function formatCurrency(num) {
					return new Intl.NumberFormat('id-ID', { 
					style: 'currency', 
					currency: 'IDR', 
					minimumFractionDigits: 0 
					}).format(num).replace('Rp', 'Rp ');
				}
				
				function renderTable(data) {
					let html = `
					<thead class="table-head">
						<tr>
						<th rowspan="2">#</th>
						<th rowspan="2">Institution</th>
						<th rowspan="2">Code</th>
						<th colspan="3" class="text-center bg-brks">BRKS</th>
						<th colspan="3" class="text-center bg-ipaymu">IPaymu</th>
						<th rowspan="2">Total</th>
						</tr>
						<tr>
						<!-- BRKS headers -->
						<th class="bg-brks-light">ONCARD</th>
						<th class="bg-brks-light">ONTUITION</th>
						<th class="bg-brks-light">Fees</th>
						
						<!-- IPaymu headers -->
						<th class="bg-ipaymu-light">ONCARD</th>
						<th class="bg-ipaymu-light">ONTUITION</th>
						<th class="bg-ipaymu-light">Fees</th>
						</tr>
					</thead>
					<tbody>`;
					
					// Add rows for each institution
					Object.entries(data).forEach(([instansiId, instansi], index) => {
					const brksTotal = instansi.ONCARD.BRKS.total + instansi.ONTUITION.BRKS.total;
					const ipaymuTotal = instansi.ONCARD.IPaymu.total + instansi.ONTUITION.IPaymu.total;
					const totalAll = brksTotal + ipaymuTotal;
					
					html += `
						<tr class="institution-row">
						<td class="index-col">${index + 1}</td>
						<td class="institution-name">
							<div class="inst-name">${instansi.name}</div>
							<div class="inst-meta">
							<span class="badge brks-badge">BRKS: ${instansi.ONCARD.BRKS.count + instansi.ONTUITION.BRKS.count}</span>
							<span class="badge ipaymu-badge">IPaymu: ${instansi.ONCARD.IPaymu.count + instansi.ONTUITION.IPaymu.count}</span>
							</div>
						</td>
						<td class="institution-code">${instansi.code}</td>
						
						<!-- BRKS Data -->
						<td class="amount oncard-brks">
							${instansi.ONCARD.BRKS.count ? formatCurrency(instansi.ONCARD.BRKS.total) : '-'}
						</td>
						<td class="amount ontuition-brks">
							${instansi.ONTUITION.BRKS.count ? formatCurrency(instansi.ONTUITION.BRKS.total) : '-'}
						</td>
						<td class="fees brks-fees">
							${instansi.fees.BRKS ? formatCurrency(instansi.fees.BRKS) : '-'}
						</td>
						
						<!-- IPaymu Data -->
						<td class="amount oncard-ipaymu">
							${instansi.ONCARD.IPaymu.count ? formatCurrency(instansi.ONCARD.IPaymu.total) : '-'}
						</td>
						<td class="amount ontuition-ipaymu">
							${instansi.ONTUITION.IPaymu.count ? formatCurrency(instansi.ONTUITION.IPaymu.total) : '-'}
						</td>
						<td class="fees ipaymu-fees">
							${instansi.fees.IPaymu ? formatCurrency(instansi.fees.IPaymu) : '-'}
						</td>
						
						<td class="total-amount">
							${formatCurrency(totalAll)}
							<div class="progress mt-1">
							<div class="progress-bar brks-bar" style="width: ${brksTotal/totalAll*100}%"></div>
							<div class="progress-bar ipaymu-bar" style="width: ${ipaymuTotal/totalAll*100}%"></div>
							</div>
						</td>
						</tr>`;
					});
					
					// Add summary row
					const summary = calculateSummary(data);
					html += `
					<tr class="summary-row">
						<td colspan="3" class="summary-label">TOTAL</td>
						<td class="oncard-summary brks-summary">${formatCurrency(summary.ONCARD.BRKS)}</td>
						<td class="ontuition-summary brks-summary">${formatCurrency(summary.ONTUITION.BRKS)}</td>
						<td class="fees-summary brks-summary">${formatCurrency(summary.fees.BRKS)}</td>
						<td class="oncard-summary ipaymu-summary">${formatCurrency(summary.ONCARD.IPaymu)}</td>
						<td class="ontuition-summary ipaymu-summary">${formatCurrency(summary.ONTUITION.IPaymu)}</td>
						<td class="fees-summary ipaymu-summary">${formatCurrency(summary.fees.IPaymu)}</td>
						<td class="grand-total">${formatCurrency(summary.grandTotal)}</td>
					</tr>
					</tbody>`;
					
					$('#maintable').html(html);
				}
				
				function calculateSummary(data) {
					return Object.values(data).reduce((acc, instansi) => {
					acc.ONCARD.BRKS += instansi.ONCARD.BRKS.total;
					acc.ONTUITION.BRKS += instansi.ONTUITION.BRKS.total;
					acc.fees.BRKS += instansi.fees.BRKS;
					
					acc.ONCARD.IPaymu += instansi.ONCARD.IPaymu.total;
					acc.ONTUITION.IPaymu += instansi.ONTUITION.IPaymu.total;
					acc.fees.IPaymu += instansi.fees.IPaymu;
					
					acc.grandTotal += instansi.ONCARD.BRKS.total + instansi.ONTUITION.BRKS.total + 
									instansi.ONCARD.IPaymu.total + instansi.ONTUITION.IPaymu.total;
					
					return acc;
					}, {
					ONCARD: { BRKS: 0, IPaymu: 0 },
					ONTUITION: { BRKS: 0, IPaymu: 0 },
					fees: { BRKS: 0, IPaymu: 0 },
					grandTotal: 0
					});
				}
				
				fetchData();
			}

		</script>