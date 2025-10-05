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

</style>
<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Seluruh Tunggakan</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Daftar Tunggakan</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
			  
				<div class="card">
					<div class="card-body">
						
                    <div class="table-responsive">
						<button class="btn btn-sm btn-outline-primary me-2 mb-3" id="btnSave2PDF" onclick="save2PDF('tabelPrint');" style="border-radius:0px;"><i class="bx bxs-file-export"></i> Export PDF</button>
						<button class="btn btn-sm btn-outline-success me-2 mb-3" onclick="saveToExcel('tabelsiswa');" style="border-radius:0px;"><i class="bx bxs-file-export"></i> Export Excel</button>
							<table class="table mb-0 tabelsiswa" id="tabelPrint">
								<thead class="table-light">
                                <th>ID</th>
                <th>Siswa</th>
                <th>Kelas</th>
                <th>Tagihan</th>
                <th class="text-end">Total</th>
                <th>Status</th>
                <th class="text-end">Dibayar</th>
                <th class="text-end">Sisa</th>
                <th>Status</th>
                <th>Wali</th>
                <th class="text-end">Aksi</th>
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

		<script type="text/javascript">
			let idsett = '';
			let pinsett = '';
			let modescan = '';
            let secret_code= '';
            let namauser = '';
            let namainstansi = '';
			let endPointGetDataSiswa = '<?= api_url_tagihan(); ?>api/payment/tunggakan-siswa';
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

			// function showData(params){
			// 	let num = 0;
			// 	let tableColumn = '';
			// 	tableColumn += `<tr><td colspan="8" class="text-center">Loading...</td></tr>`;
			// 	$('.putContentHere').html(tableColumn);
				
			// 	const save2 = async () => {
			// 		const posts2 = await axios.get( params , {
			// 			headers: {
			// 				'Authorization': 'Bearer ' + localStorage.getItem('_token'),
            //                 'no-pagination': false
			// 			}
			// 		}).catch((err) => {
			// 			console.log(err.response);
			// 		});
			
			// 		if (posts2.status == 200) {
			// 				num += 1;
			// 				tableColumn = '';
			// 				if(posts2.data.data.length==0){
			// 					tableColumn +=`<tr><td colspan="8" class="text-center">Tidak ada data.</td></tr>`;
			// 					$('.putContentHere').html(tableColumn);return false;
			// 				}
							
			// 				console.log(posts2.data.data);
			// 				posts2.data.data.map((mapping2, i) => {
            //                 // Process name and education level
            //                 let textTingkat = '';
            //                 let textNamaA = mapping2.user.name;
            //                 let textNama = textNamaA.split("-");
            //                 let pendidikan = textNama.length > 1 ? textNama.pop() : '';
                            
            //                 // Determine education level
            //                 if (pendidikan === 'MA') {
            //                     textTingkat = 'Madrasah Aliyah';
            //                 } else if (pendidikan === 'MTS') {
            //                     textTingkat = 'Madrasah Tsanawiyah';
            //                 } else if (pendidikan === 'TK') {
            //                     textTingkat = 'TK';
            //                 } else if (pendidikan === 'SD') {
            //                     textTingkat = 'Sekolah Dasar';
            //                 } else if (pendidikan === 'SMP') {
            //                     textTingkat = 'Sekolah Menengah Pertama';
            //                 } else {
            //                     textTingkat = '-';
            //                 }
                            
            //                 // Calculate payment status
            //                 let sudahbayar = parseInt(mapping2.jumlah_tagihan) - parseInt(mapping2.jumlah_belum_dibayarkan);
            //                 let paymentPercentage = (sudahbayar / mapping2.jumlah_tagihan * 100).toFixed(0);
                            
            //                 // Get wali (parent/guardian) information
            //                 const wali = mapping2.user.siswas?.wali_siswa;
            //                 const waliName = wali?.user?.name || '-';
            //                 const waliPhone = wali?.user?.telepon || '-';
                            
            //                 // Status badge styling
            //                 let statusBadge = '';
            //                 if (mapping2.status_pembayaran === 'lunas') {
            //                     statusBadge = `<span class="badge bg-success">LUNAS</span>`;
            //                 } else if (paymentPercentage > 0) {
            //                     statusBadge = `<span class="badge bg-warning text-dark">SEBAGIAN (${paymentPercentage}%)</span>`;
            //                 } else {
            //                     statusBadge = `<span class="badge bg-danger">BELUM LUNAS</span>`;
            //                 }
                            
            //                 // Payment progress bar
            //                 const progressBar = `
            //                     <div class="progress" style="height: 6px;">
            //                         <div class="progress-bar" 
            //                             role="progressbar" 
            //                             style="width: ${paymentPercentage}%;" 
            //                             aria-valuenow="${paymentPercentage}" 
            //                             aria-valuemin="0" 
            //                             aria-valuemax="100">
            //                         </div>
            //                     </div>
            //                     <small class="text-muted">${paymentPercentage}% terbayar</small>
            //                 `;
                            
            //                 // Action buttons
            //                 const actionButtons = `
            //                     <div class="d-flex gap-2">
                                
            //                         <button class="btn btn-sm btn-outline-secondary" 
            //                                 onclick="showDetail(${mapping2.id})">
            //                             <i class="bx bx-detail"></i> Detail
            //                         </button>
            //                     </div>
            //                 `;
                            
            //                 tableColumn += `
            //                     <tr>
            //                         <td>${mapping2.id}</td>
            //                         <td>
            //                             <div class="d-flex flex-column">
            //                                 <b>${textNama[0]}</b>
            //                                 <small class="text-muted">${textTingkat}</small>
            //                             </div>
            //                         </td>
            //                         <td>
            //                             <div class="d-flex flex-column">
            //                                 <span>${mapping2.tagihan.nama_tagihan}</span>
            //                                 <small class="text-muted">ID: ${mapping2.tagihan.id}</small>
            //                             </div>
            //                         </td>
            //                         <td class="text-end">${formatRupiah(mapping2.jumlah_tagihan.toString())}</td>
            //                         <td>
            //                             ${progressBar}
            //                         </td>
            //                         <td class="text-end">${formatRupiah(sudahbayar.toString())}</td>
            //                         <td class="text-end">${formatRupiah(mapping2.jumlah_belum_dibayarkan.toString())}</td>
            //                         <td>${statusBadge}</td>
            //                         <td>
            //                             <div class="d-flex flex-column">
            //                                 <span>${waliName}</span>
            //                                 <small class="text-muted">${waliPhone}</small>
            //                             </div>
            //                         </td>
            //                         <td class="text-end">
            //                             ${actionButtons}
            //                         </td>
            //                     </tr>
            //                 `;
            //             });
                                                    
			// 			$('.putContentHere').html(tableColumn);
			// 			createPaginations(posts2.data, "siswa-pagination-container", "siswa-pagination-details", "showData");
			// 		}
			// 	}
			// 	save2();
			// }
            // function formatRupiahNew(amount) {
            //     return new Intl.NumberFormat('id-ID', {
            //         style: 'currency',
            //         currency: 'IDR',
            //         minimumFractionDigits: 0
            //     }).format(amount);
            // }

			

            // Function to format currency as Rupiah
            function formatRupiah(amount) {
    if (!amount) return 'Rp 0';
    return new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
        minimumFractionDigits: 0
    }).format(amount);
}

// Function to extract unique values for filters from API data
function extractFilterValues(data) {
    const filters = {
        kelas: new Set(),
        tagihan: new Set(),
    };
    
    data.forEach(item => {
        // Extract sub kelas from siswa data
        if (item.siswa && item.siswa.nama_sub_kelas) {
            filters.kelas.add(item.siswa.nama_sub_kelas);
        }
        
        // Extract tagihan names
        if (item.tagihan && item.tagihan.nama_tagihan) {
            filters.tagihan.add(item.tagihan.nama_tagihan);
        }
    });
    
    return filters;
}

// Function to create filter dropdowns and grouping mode selector
function createFilters(filterValues) {
    // Remove existing filters if any
    const existingFilter = document.querySelector('.filter-section');
    if (existingFilter) {
        existingFilter.remove();
    }
    
    const filterContainer = document.createElement('div');
    filterContainer.className = 'filter-section mb-3 p-3 bg-light rounded';
    
    // Kelas filter (using nama_sub_kelas)
    const kelasOptions = Array.from(filterValues.kelas).map(kelas => 
        `<option value="${kelas}">${kelas}</option>`
    ).join('');
    
    // Tagihan filter
    const tagihanOptions = Array.from(filterValues.tagihan).map(tagihan => 
        `<option value="${tagihan}">${tagihan}</option>`
    ).join('');
    
    filterContainer.innerHTML = `
        <div class="row g-3">
            <div class="col-md-3">
                <label for="filterKelas" class="form-label">Filter Kelas</label>
                <select class="form-select" id="filterKelas">
                    <option value="">Semua Kelas</option>
                    ${kelasOptions}
                </select>
            </div>
            <div class="col-md-3">
                <label for="filterTagihan" class="form-label">Filter Tagihan</label>
                <select class="form-select" id="filterTagihan">
                    <option value="">Semua Tagihan</option>
                    ${tagihanOptions}
                </select>
            </div>
            <div class="col-md-3">
                <label for="filterStatus" class="form-label">Filter Status</label>
                <select class="form-select" id="filterStatus">
                    <option value="">Semua Status</option>
                    <option value="lunas">Lunas</option>
                    <option value="sebagian">Sebagian</option>
                    <option value="belum lunas">Belum Lunas</option>
                </select>
            </div>
            <div class="col-md-3">
                <label for="groupMode" class="form-label">Mode Grouping</label>
                <select class="form-select" id="groupMode">
                    <option value="tagihan">Group by Tagihan</option>
                    <option value="siswa">Group by Siswa</option>
                </select>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <button class="btn btn-primary" id="btnTerapkanFilter">Terapkan Filter</button>
                <button class="btn btn-outline-secondary" id="btnResetFilter">Reset Filter</button>
            </div>
        </div>
    `;
    
    // Insert filters before the table
    const table = document.querySelector('.table');
    table.parentNode.insertBefore(filterContainer, table);
    
    // Add event listeners
    document.getElementById('btnTerapkanFilter').addEventListener('click', applyFilters);
    document.getElementById('btnResetFilter').addEventListener('click', resetFilters);
    document.getElementById('groupMode').addEventListener('change', applyFilters);
    
    // Restore filter values if they exist
    restoreFilterValues();
}

// Function to get current filter values
function getCurrentFilterValues() {
    return {
        kelas: document.getElementById('filterKelas').value,
        tagihan: document.getElementById('filterTagihan').value,
        status: document.getElementById('filterStatus').value,
        groupMode: document.getElementById('groupMode').value
    };
}

// Function to set filter values
function setFilterValues(filters) {
    if (filters.kelas) document.getElementById('filterKelas').value = filters.kelas;
    if (filters.tagihan) document.getElementById('filterTagihan').value = filters.tagihan;
    if (filters.status) document.getElementById('filterStatus').value = filters.status;
    if (filters.groupMode) document.getElementById('groupMode').value = filters.groupMode;
}

// Function to save filter values to localStorage
function saveFilterValues() {
    const filters = getCurrentFilterValues();
    localStorage.setItem('pembayaranFilters', JSON.stringify(filters));
}

// Function to restore filter values from localStorage
function restoreFilterValues() {
    const savedFilters = localStorage.getItem('pembayaranFilters');
    if (savedFilters) {
        const filters = JSON.parse(savedFilters);
        setFilterValues(filters);
    }
}

// Function to clear saved filter values
function clearFilterValues() {
    localStorage.removeItem('pembayaranFilters');
}

// Function to create pagination
function createPagination(paginationData, containerId = 'paginationContainer') {
    // Remove existing pagination if any
    const existingPagination = document.getElementById(containerId);
    if (existingPagination) {
        existingPagination.remove();
    }
    
    if (!paginationData || paginationData.last_page <= 1) {
        return; // No pagination needed for single page
    }
    
    const paginationContainer = document.createElement('div');
    paginationContainer.id = containerId;
    paginationContainer.className = 'd-flex justify-content-between align-items-center mt-3';
    
    // Pagination info
    const from = paginationData.from || 1;
    const to = paginationData.to || paginationData.per_page;
    const total = paginationData.total || 0;
    const perPage = paginationData.per_page || 20;
    
    const infoText = `Menampilkan ${from} sampai ${to} dari ${total} data`;
    
    // Pagination links
    const links = paginationData.links || [];
    let paginationLinks = '';
    
    links.forEach((link, index) => {
        if (link.url === null) {
            paginationLinks += `<li class="page-item disabled"><span class="page-link">${link.label}</span></li>`;
        } else if (link.active) {
            paginationLinks += `<li class="page-item active"><span class="page-link">${link.label}</span></li>`;
        } else {
            const pageNum = link.url ? new URL(link.url).searchParams.get('page') : link.label;
            paginationLinks += `<li class="page-item"><a class="page-link" href="#" data-page="${pageNum}">${link.label}</a></li>`;
        }
    });
    
    paginationContainer.innerHTML = `
        <div class="pagination-info">
            <small class="text-muted">${infoText}</small>
        </div>
        <nav>
            <ul class="pagination pagination-sm mb-0">
                ${paginationLinks}
            </ul>
        </nav>
    `;
    
    // Insert pagination after the table
    const table = document.querySelector('.table');
    table.parentNode.appendChild(paginationContainer);
    
    // Add event listeners to pagination links
    paginationContainer.querySelectorAll('.page-link[data-page]').forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const page = this.getAttribute('data-page');
            loadPage(page);
        });
    });
}

// Function to load a specific page with current filters
function loadPage(page) {
    const currentParams = window.currentApiParams || '';
    const baseUrl = currentParams.split('?')[0];
    const searchParams = new URLSearchParams(currentParams.split('?')[1] || '');
    
    // Update page parameter
    searchParams.set('page', page);
    
    // Get current filter values and add them to the URL
    const filters = getCurrentFilterValues();
    
    // Add filter parameters to the URL
    if (filters.kelas) {
        searchParams.set('filter_kelas', filters.kelas);
    } else {
        searchParams.delete('filter_kelas');
    }
    
    if (filters.tagihan) {
        searchParams.set('filter_tagihan', filters.tagihan);
    } else {
        searchParams.delete('filter_tagihan');
    }
    
    if (filters.status) {
        searchParams.set('filter_status', filters.status);
    } else {
        searchParams.delete('filter_status');
    }
    
    const newUrl = `${baseUrl}?${searchParams.toString()}`;
    showData(newUrl);
}

// Function to group data by tagihan
function groupDataByTagihan(data) {
    const grouped = {};
    
    data.forEach(item => {
        const tagihanName = item.tagihan?.nama_tagihan || 'Tagihan Lain';
        
        if (!grouped[tagihanName]) {
            grouped[tagihanName] = [];
        }
        
        grouped[tagihanName].push(item);
    });
    
    // Sort students alphabetically within each group
    Object.keys(grouped).forEach(tagihanName => {
        grouped[tagihanName].sort((a, b) => {
            const nameA = a.user?.name?.split('-')[0] || '';
            const nameB = b.user?.name?.split('-')[0] || '';
            return nameA.localeCompare(nameB);
        });
    });
    
    return grouped;
}

// Function to group data by siswa
function groupDataBySiswa(data) {
    const grouped = {};
    
    data.forEach(item => {
        const siswaName = item.user?.name?.split('-')[0] || 'Siswa Lain';
        const siswaKey = `${siswaName}-${item.user_id}`;
        
        if (!grouped[siswaKey]) {
            grouped[siswaKey] = {
                siswaName: siswaName,
                items: [],
                siswaData: item.siswa,
                userData: item.user
            };
        }
        
        grouped[siswaKey].items.push(item);
    });
    
    // Sort groups by student name
    const sortedGroups = {};
    Object.keys(grouped).sort((a, b) => {
        return grouped[a].siswaName.localeCompare(grouped[b].siswaName);
    }).forEach(key => {
        sortedGroups[key] = grouped[key];
        
        // Sort items within student group by tagihan name
        sortedGroups[key].items.sort((a, b) => {
            const tagihanA = a.tagihan?.nama_tagihan || '';
            const tagihanB = b.tagihan?.nama_tagihan || '';
            return tagihanA.localeCompare(tagihanB);
        });
    });
    
    return sortedGroups;
}

// Function to get group color based on index
function getGroupColor(index) {
    const colors = [
        { bg: '#e3f2fd', border: '#2196f3' }, // Blue
        { bg: '#f3e5f5', border: '#9c27b0' }, // Purple
        { bg: '#e8f5e8', border: '#4caf50' }, // Green
        { bg: '#fff3e0', border: '#ff9800' }, // Orange
        { bg: '#fce4ec', border: '#e91e63' }, // Pink
        { bg: '#e0f2f1', border: '#009688' }, // Teal
    ];
    return colors[index % colors.length];
}

// Function to apply filters
function applyFilters() {
    // Save current filter values
    saveFilterValues();
    
    const selectedKelas = document.getElementById('filterKelas').value;
    const selectedTagihan = document.getElementById('filterTagihan').value;
    const selectedStatus = document.getElementById('filterStatus').value;
    const groupMode = document.getElementById('groupMode').value;
    
    // Since we're filtering client-side, we need to use the full dataset
    if (!window.currentFullData) {
        console.warn('No full data available for filtering');
        return;
    }
    
    // Filter the data based on selections
    const filteredData = window.currentFullData.filter(item => {
        const kelasMatch = !selectedKelas || (item.siswa?.nama_sub_kelas === selectedKelas);
        const tagihanMatch = !selectedTagihan || (item.tagihan?.nama_tagihan === selectedTagihan);
        
        // Status filter logic
        let statusMatch = true;
        if (selectedStatus) {
            const sudahbayar = parseInt(item.jumlah_tagihan || 0) - parseInt(item.jumlah_belum_dibayarkan || 0);
            const paymentPercentage = item.jumlah_tagihan > 0 ? 
                (sudahbayar / item.jumlah_tagihan * 100) : 0;
            
            if (selectedStatus === 'lunas') {
                statusMatch = item.status_pembayaran === 'lunas';
            } else if (selectedStatus === 'sebagian') {
                statusMatch = paymentPercentage > 0 && paymentPercentage < 100;
            } else if (selectedStatus === 'belum lunas') {
                statusMatch = paymentPercentage === 0;
            }
        }
        
        return kelasMatch && tagihanMatch && statusMatch;
    });
    
    // Re-render table with filtered data and selected grouping mode
    renderTable(filteredData, groupMode);
    
    // Update pagination info for filtered results
    updatePaginationForFilteredData(filteredData.length);
}

// Function to update pagination for filtered data
function updatePaginationForFilteredData(filteredCount) {
    const paginationContainer = document.getElementById('paginationContainer');
    if (!paginationContainer) return;
    
    const infoElement = paginationContainer.querySelector('.pagination-info');
    if (infoElement) {
        infoElement.innerHTML = `<small class="text-muted">Menampilkan ${Math.min(filteredCount, 1)} sampai ${Math.min(filteredCount, 20)} dari ${filteredCount} data (Filtered)</small>`;
    }
}

// Function to reset filters
function resetFilters() {
    document.getElementById('filterKelas').value = '';
    document.getElementById('filterTagihan').value = '';
    document.getElementById('filterStatus').value = '';
    document.getElementById('groupMode').value = 'tagihan';
    
    // Clear saved filter values
    clearFilterValues();
    
    // Reload the original page data without filters
    if (window.currentApiParams) {
        // Remove filter parameters from URL
        const baseUrl = window.currentApiParams.split('?')[0];
        const searchParams = new URLSearchParams(window.currentApiParams.split('?')[1] || '');
        
        // Remove filter parameters
        searchParams.delete('filter_kelas');
        searchParams.delete('filter_tagihan');
        searchParams.delete('filter_status');
        
        const newUrl = `${baseUrl}?${searchParams.toString()}`;
        showData(newUrl);
    }
}

// Enhanced showData function with grouping, filters, and pagination
function showData(params) {
    let tableColumn = '';
    tableColumn += `<tr><td colspan="11" class="text-center py-4">Loading...</td></tr>`;
    document.querySelector('.putContentHere').innerHTML = tableColumn;
    
    // Store current API parameters
    window.currentApiParams = params;
    
    const fetchData = async () => {
        try {
            const response = await axios.get(params, {
                headers: {
                    'Authorization': 'Bearer ' + localStorage.getItem('_token'),
                    'pagination' : false
                }
            });
            
            if (response.status === 200) {
                if (!response.data.data || response.data.data.length === 0) {
                    tableColumn = `<tr><td colspan="11" class="text-center py-4">Tidak ada data.</td></tr>`;
                    document.querySelector('.putContentHere').innerHTML = tableColumn;
                    
                    // Clear pagination if no data
                    const existingPagination = document.getElementById('paginationContainer');
                    if (existingPagination) {
                        existingPagination.remove();
                    }
                    return false;
                }
                
                // Store the paginated data for current page
                window.currentData = response.data.data;
                
                // Store the full data for filtering (if this is the first page, we might need to load all pages)
                // For now, we'll use the current page data for filtering
                window.currentFullData = response.data.data;
                
                // Extract filter values and create filters (only on first load or when filters change)
                if (!document.querySelector('.filter-section')) {
                    const filterValues = extractFilterValues(response.data.data);
                    createFilters(filterValues);
                    
                    // Check if there are filter parameters in the URL and apply them
                    applyUrlFilters(params);
                }
                
                // Create pagination
                createPagination(response.data);
                
                // Get grouping mode from current filter values or default to 'tagihan'
                const currentFilters = getCurrentFilterValues();
                const groupMode = currentFilters.groupMode || 'tagihan';
                
                // Render the table with the appropriate grouping
                renderTable(response.data.data, groupMode);
            }
        } catch (err) {
            console.error('Error loading data:', err);
            tableColumn = `<tr><td colspan="11" class="text-center py-4 text-danger">Error loading data. Please check console.</td></tr>`;
            document.querySelector('.putContentHere').innerHTML = tableColumn;
        }
    };
    
    fetchData();
}

// Function to apply filters from URL parameters
function applyUrlFilters(url) {
    const urlParams = new URLSearchParams(url.split('?')[1] || '');
    
    const urlFilters = {
        kelas: urlParams.get('filter_kelas') || '',
        tagihan: urlParams.get('filter_tagihan') || '',
        status: urlParams.get('filter_status') || '',
        groupMode: 'tagihan' // Default group mode
    };
    
    // Set the filter values from URL
    setFilterValues(urlFilters);
    
    // If there are URL filters, apply them immediately
    if (urlFilters.kelas || urlFilters.tagihan || urlFilters.status) {
        // Save the filter values
        saveFilterValues();
    }
}

// Function to render student row (used in both grouping modes)
function renderStudentRow(mapping, groupColor = null) {
    // Process name and education level
    let textTingkat = '';
    let textNamaA = mapping.user?.name || '-';
    let textNama = textNamaA.split("-");
    let pendidikan = textNama.length > 1 ? textNama.pop() : '';
    
    // Determine education level
    const tingkatMap = {
        'MA': 'Madrasah Aliyah',
        'MTS': 'Madrasah Tsanawiyah',
        'TK': 'TK',
        'SD': 'Sekolah Dasar',
        'SMP': 'Sekolah Menengah Pertama',
        'SMK': 'Sekolah Menengah Kejuruan'
    };
    textTingkat = tingkatMap[pendidikan] || '-';
    
    // Calculate payment status
    let sudahbayar = parseInt(mapping.jumlah_tagihan || 0) - parseInt(mapping.jumlah_belum_dibayarkan || 0);
    let paymentPercentage = mapping.jumlah_tagihan > 0 ? 
        (sudahbayar / mapping.jumlah_tagihan * 100).toFixed(0) : 0;
    
    // Get wali information
    const wali = mapping.user?.siswas?.wali_siswa;
    const waliName = wali?.user?.name || '-';
    const waliPhone = wali?.user?.telepon || '-';
    
    // Get kelas information
    const kelasInfo = mapping.siswa ? 
        `${mapping.siswa.nama_sub_kelas || mapping.siswa.nama_kelas || ''}`.trim() : '-';
    
    // Status badge
    let statusBadge = '';
    if (mapping.status_pembayaran === 'lunas') {
        statusBadge = `<span class="badge bg-success">LUNAS</span>`;
    } else if (paymentPercentage > 0) {
        statusBadge = `<span class="badge bg-warning text-dark">SEBAGIAN (${paymentPercentage}%)</span>`;
    } else {
        statusBadge = `<span class="badge bg-danger">BELUM LUNAS</span>`;
    }
    
    // Payment progress bar with color coding
    let progressColor = 'bg-danger';
    if (paymentPercentage >= 100) progressColor = 'bg-success';
    else if (paymentPercentage > 0) progressColor = 'bg-warning';
    
    const progressBar = `
        <div style="display: flex; align-items: center;">
            <div style="flex-grow: 1; margin-right: 8px;">
                <div class="progress" style="height: 8px;">
                    <div class="progress-bar ${progressColor}" 
                        role="progressbar" 
                        style="width: ${paymentPercentage}%;">
                    </div>
                </div>
            </div>
            <small class="text-muted">${paymentPercentage}%</small>
        </div>
    `;
    
    // Action buttons
    const actionButtons = `
        <div style="display: flex; gap: 5px; justify-content: flex-end;">
            <button class="btn btn-sm btn-outline-primary" onclick="showDetail(${mapping.id})">
                Detail
            </button>
        </div>
    `;
    
    const borderStyle = groupColor ? `style="border-left: 3px solid ${groupColor.border}"` : '';
    
    return `
        <tr class="group-row" ${borderStyle}>
            <td class="fw-bold">${mapping.id}</td>
            <td>
                <div style="display: flex; flex-direction: column;">
                    <strong class="text-dark">${textNama[0] || '-'}</strong>
                    <small class="text-muted">${textTingkat}</small>
                </div>
            </td>
            <td>
                <span class="badge bg-light text-dark">${kelasInfo}</span>
            </td>
            <td>
                <small class="text-muted">${mapping.tagihan?.nama_tagihan || '-'}</small>
            </td>
            <td class="text-end fw-bold">${formatRupiah(mapping.jumlah_tagihan.toString())}</td>
            <td>${progressBar}</td>
            <td class="text-end text-success">${formatRupiah(sudahbayar.toString())}</td>
            <td class="text-end text-danger">${formatRupiah(mapping.jumlah_belum_dibayarkan.toString())}</td>
            <td>${statusBadge}</td>
            <td>
                <div style="display: flex; flex-direction: column;">
                    <small>${waliName}</small>
                    <small class="text-muted">${waliPhone}</small>
                </div>
            </td>
            <td class="text-end">${actionButtons}</td>
        </tr>
    `;
}

// Function to render the table with grouped data
function renderTable(data, groupMode = 'tagihan') {
    if (!data || data.length === 0) {
        const tableColumn = `<tr><td colspan="11" class="text-center py-4">Tidak ada data.</td></tr>`;
        document.querySelector('.putContentHere').innerHTML = tableColumn;
        return;
    }
    
    let tableColumn = '';
    let groupIndex = 0;
    
    if (groupMode === 'tagihan') {
        // Group by Tagihan
        const groupedData = groupDataByTagihan(data);
        
        Object.keys(groupedData).forEach(tagihanName => {
            const groupColor = getGroupColor(groupIndex);
            const groupItems = groupedData[tagihanName];
            
            // Calculate group summary
            const totalTagihan = groupItems.reduce((sum, item) => sum + parseInt(item.jumlah_tagihan || 0), 0);
            const totalDibayar = groupItems.reduce((sum, item) => sum + (parseInt(item.jumlah_tagihan || 0) - parseInt(item.jumlah_belum_dibayarkan || 0)), 0);
            const totalSisa = groupItems.reduce((sum, item) => sum + parseInt(item.jumlah_belum_dibayarkan || 0), 0);
            const lunasCount = groupItems.filter(item => item.status_pembayaran === 'lunas').length;
            
            // Add group header
            tableColumn += `
                <tr class="group-header" style="background-color: ${groupColor.bg}; border-left: 4px solid ${groupColor.border}">
                    <td colspan="11">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <div>
                                <strong style="color: ${groupColor.border}">${tagihanName}</strong>
                                <small style="margin-left: 8px; opacity: 0.75;">${groupItems.length} siswa</small>
                            </div>
                            <div style="background: #667eea; color: white; border-radius: 5px; padding: 8px 12px; font-size: 0.875rem;">
                                <span style="margin-right: 15px;">Total: ${formatRupiah(totalTagihan.toString())}</span>
                                <span style="margin-right: 15px;">Dibayar: ${formatRupiah(totalDibayar.toString())}</span>
                                <span style="margin-right: 15px;">Sisa: ${formatRupiah(totalSisa.toString())}</span>
                                <span>Lunas: ${lunasCount}/${groupItems.length}</span>
                            </div>
                        </div>
                    </td>
                </tr>
            `;
            
            // Add students for this tagihan group
            groupItems.forEach(mapping => {
                tableColumn += renderStudentRow(mapping, groupColor);
            });
            
            groupIndex++;
        });
        
    } else {
        // Group by Siswa
        const groupedData = groupDataBySiswa(data);
        
        Object.keys(groupedData).forEach(siswaKey => {
            const groupColor = getGroupColor(groupIndex);
            const group = groupedData[siswaKey];
            const groupItems = group.items;
            
            // Calculate student summary
            const totalTagihan = groupItems.reduce((sum, item) => sum + parseInt(item.jumlah_tagihan || 0), 0);
            const totalDibayar = groupItems.reduce((sum, item) => sum + (parseInt(item.jumlah_tagihan || 0) - parseInt(item.jumlah_belum_dibayarkan || 0)), 0);
            const totalSisa = groupItems.reduce((sum, item) => sum + parseInt(item.jumlah_belum_dibayarkan || 0), 0);
            const lunasCount = groupItems.filter(item => item.status_pembayaran === 'lunas').length;
            const totalTagihanCount = groupItems.length;
            
            // Get student info
            const kelasInfo = group.siswaData ? 
                `${group.siswaData.nama_sub_kelas || group.siswaData.nama_kelas || ''}`.trim() : '-';
            
            // Add student group header
            tableColumn += `
                <tr class="group-header" style="background-color: ${groupColor.bg}; border-left: 4px solid ${groupColor.border}">
                    <td colspan="11">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <div>
                                <strong style="color: ${groupColor.border}">${group.siswaName}</strong>
                                <small style="margin-left: 8px; opacity: 0.75;">Kelas: ${kelasInfo}</small>
                                <small style="margin-left: 8px; opacity: 0.75;">${totalTagihanCount} tagihan</small>
                            </div>
                            <div style="background: #667eea; color: white; border-radius: 5px; padding: 8px 12px; font-size: 0.875rem;">
                                <span style="margin-right: 15px;">Total: ${formatRupiah(totalTagihan.toString())}</span>
                                <span style="margin-right: 15px;">Dibayar: ${formatRupiah(totalDibayar.toString())}</span>
                                <span style="margin-right: 15px;">Sisa: ${formatRupiah(totalSisa.toString())}</span>
                                <span>Lunas: ${lunasCount}/${totalTagihanCount}</span>
                            </div>
                        </div>
                    </td>
                </tr>
            `;
            
            // Add tagihan items for this student
            groupItems.forEach(mapping => {
                tableColumn += renderStudentRow(mapping, groupColor);
            });
            
            groupIndex++;
        });
    }
    
    // If no data after filtering
    if (tableColumn === '') {
        tableColumn = `
            <tr>
                <td colspan="11" class="text-center py-5">
                    <div class="text-muted">
                        Tidak ada data yang sesuai dengan filter.
                    </div>
                </td>
            </tr>
        `;
    }
    
    document.querySelector('.putContentHere').innerHTML = tableColumn;
}

// Placeholder function
function showDetail(id) {
    alert('Show detail for ID: ' + id);
}
		</script>