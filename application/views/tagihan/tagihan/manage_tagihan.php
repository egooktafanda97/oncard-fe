<style>
    /* Fullscreen overlay */
.loading-overlay {
    display: none; /* Initially hidden */
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
    z-index: 9999;
    text-align: center;
    color: white;
}

/* Centering the spinner */
.loading-spinner {
    border: 9px solid #f3f3f3; /* Light grey */
    border-top: 9px solid #3498db; /* Blue */
    border-radius: 50%;
    width: 50px;
    height: 50px;
    animation: spin 2s linear infinite;
	margin-bottom:15px;
}

/* Spinner animation */
@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
</style>
<div class="page-wrapper">
            <div id="loadingScreen" class="loading-overlay">
                <div class="loading-spinner"></div>
                <p>Processing, please wait...</p>
            </div>

			<div class="page-content">
				<div class="row">
                   <div class="col">
					 <div class="card radius-1">
						<div class="card-body">
							<div class="d-lg-flex align-items-center mb-4 gap-3">
							<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
								<div class="breadcrumb-title pe-3">Manajemen Tagihan</div>
								<div class="ps-3">
									<nav aria-label="breadcrumb">
										<ol class="breadcrumb mb-0 p-0">
											<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
											</li>
											<li class="breadcrumb-item active" aria-current="page">Kelola Semua Tagihan</li>
										</ol>
									</nav>
								</div>
							</div>
							
							<div class="ms-auto">
                            <button class="btn btn-sm btn-outline-primary me-2 mb-3" id="btnSave2PDF" onclick="save2PDF('tabelPrint');" style="border-radius:100px;"><i class="bx bxs-file-pdf mx-1" style="margin:0px;"></i></button>
                            <button class="btn btn-sm btn-outline-success me-2 mb-3" onclick="saveToExcel('tabelsiswa');" style="border-radius:100px;"><i class="bx bxs-file mx-1" style="margin:0px;"></i></button>
                            
								<a href="#/" onclick="window.location.href='<?=base_url();?>CPanel_Tagihan/AddModifyTagihan'" style="margin-top:-15px;" class="btn btn-success radius-30"><i class="bx bxs-plus-square"></i> Tambah Tagihan Baru</a>
							</div>
						</div>
						<div class="" style="margin-top:-15px;">
						<div class="row" style="justify-content:space-between">
                            <div class="col-6">
                                <div class="filter-container">
                                    <h4>Filter</h4>
                                    <select id="yearFilter" onchange="getTagihanList()" class="form-control" style="display:inline;width:200px;">
                                        <option value="">Select Year</option>
                                        <!-- Dynamically populated years will go here -->
                                    </select>

                                    <select id="monthFilter" onchange="getTagihanList()" class="form-control" style="display:inline;width:200px;">
                                        <option value="">Select Month</option>
                                        <option value="01">January</option>
                                        <option value="02">February</option>
                                        <option value="03">March</option>
                                        <option value="04">April</option>
                                        <option value="05">May</option>
                                        <option value="06">June</option>
                                        <option value="07">July</option>
                                        <option value="08">August</option>
                                        <option value="09">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
                                    </select>
                                    <select id="jenisTagihanFilter" class="form-control" onchange="getTagihanList()" style="display:inline;width:200px;">
                                        <option value="">Select Jenis Tagihan</option>
                                    </select>
                                    <br/>
                                    <button id="resetFilterButton" class="btn btn-secondary my-3" onclick="resetFilters()">Reset Filters</button>

                                </div>
                            </div>
                            <div class="col-6">
                                <div class="summary-container mt-3" style="    text-align: right;
    background: rgb(242,242,242);
background: linear-gradient(270deg, rgba(242,242,242,1) 0%, rgba(255,255,255,1) 100%);
    padding: 10px;
    border-top-right-radius: 10px;">
                                    <h4>Summary</h4>
                                    <p>Total Completion: <span id="totalPercentage">0%</span></p>
                                    <p>Total Collected: <span id="totalCollected">Rp0</span></p>
                                    <p>Total Expected: <span id="totalExpected">Rp0</span></p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-12 table-responsive">
                        	<table class="table mb-0 tabelsiswa table-hover" id="tabelPrint">
								<thead class="table-light">
									<tr>
										<th>No.</th>
										<th>Nama Tagihan</th>
                                        <th>Jenis Tagihan</th>
										<th>Periode (thn-bln)</th>
										<th>Tanggal Jatuh Tempo</th>
										<th>Tanggal Mulai Penagihan</th>
										<th>Nominal Penagihan</th>
										<th>Progress (%)</th>
										<th class="text-end"></th>
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
				</div><!--end row-->

			</div>

			<div class="modal fade" id="modalViewDetails" tabindex="-1" aria-hidden="true">
				<div class="modal-dialog modal-sm modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title titledetail">Details</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body puter">

						</div>
						<div class="modal-footer text-center">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
						</div>
					</div>
				</div>
			</div>
			
			<div class="modal fade" id="modalSetTagihan" tabindex="-1" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title titledetail">Modify</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body addmodify">
							<div class="row g-3">
								<div class="col-md-12 mb-3">
									<label for="tagihan_name" class="form-label">Nama tagihan</label>
									<input type="text" class="form-control" id="tagihan_name" placeholder="">
								</div>
								<div class="col-md-6 mt-1">
								<label for="tanggalJatuhTempo" class="form-label">Pilih tanggal jatuh tempo</label>
									<input type="datetime-local" class="form-control" id="tanggalJatuhTempo"/>
								</div>
								<div class="col-md-6 mt-1">
								<label for="tanggalPenagihan" class="form-label">Pilih tanggal penagihan</label>
									<input type="datetime-local" class="form-control" id="tanggalPenagihan"/>
								</div>
							</div>
						</div>
						<div class="modal-footer text-center">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
							<button type="button" class="btn btn-success" id="submitBtnTagihan" onclick="procModifyTagihan();">Simpan</button>
						</div>
					</div>
				</div>
			</div>
			
			
            <div class="modal fade" id="modalSetNominal" tabindex="-1" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title titledetail">Modify</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body addmodify">
							<div class="row g-3">
								<div class="col-md-12 mb-3 putlistnominalhere">
								</div>
							</div>
						</div>
						<div class="modal-footer text-center">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
							<button type="button" class="btn btn-success" id="submitBtnNominal" onclick="procModifyNominal();">Simpan</button>
						</div>
					</div>
				</div>
			</div>
			
            
            <div class="modal fade" id="modalSetUserToTagihan" tabindex="-1" aria-hidden="true">
				<div class="modal-dialog modal-fullscreen modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Tetapkan Pengguna ke Tagihan </h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<div class="row g-3">
								<div class="col-md-6 mb-3 ">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-6 text-start mb-3">
                                                    Anda dapat langsung menekan tombol berikut untuk mengaplikasikan tagihan ini ke semua pengguna, tana melakukan filter apapun.
                                                </div>
                                                <div class="col-6 text-end mb-3">
                                                    <button type="button" class="btn btn-secondary btn-sm" onclick="SyncData(idsett);">Apply ke semua</button>
                                                </div>
                                            </div>
                                            <table class="table mb-0 tabelsiswa" id="tabelPrint">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>Nama siswa</th>
                                                        <th>Tingkat / Kelas</th>
                                                        <th>Kontak Orangtua</th>
                                                        <th class="text-end">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="putListSiswaHere">
                                                </tbody>
                                            </table>

                                            <nav class="container mt-5"
                                                id="siswa-pagination-container-222"
                                                aria-label="Page navigation example">
                                            </nav>

                                            <!-- Pagination details -->
                                            <div class="container mt-1 text-muted text-center">
                                                <small id="siswa-pagination-details-222"></small>
                                            </div>
                                        </div>
                                    </div>
								</div>

                                <div class="col-md-6 mb-3">
                                    <div class="card">
                                        <div class="card-body table-responsive">
                                            <table class="table mb-0" id="">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th class="text-start"></th>
                                                        <th>Nama siswa</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="putListSiswaHereInQueue">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
							</div>
						</div>
						<div class="modal-footer" style="display:inline;min-height:100px;">
                            <div class="row">
                                <div class="col-7 putinfohere text-start">
                                    Loading...
                                </div>
                                <div class="col-5 text-end">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                    <button type="button" class="btn btn-success" id="submitBtnNominal" onclick="procApplyUserToTagihan();">Simpan Data</button>
                                </div>
                            </div>
						</div>
					</div>
				</div>
			</div>
			
		</div>

		<script src="https://pawelgrzybek.github.io/siema/assets/siema.min.js"></script>

        <script type="text/javascript">
			
			let idsett;
			let modesett;
            let arnom = [];

            let nominalsett = '';
            let linklisttertagih = '';

            function isNumberKey(evt) {
                // Allow only numerical keys
                var charCode = (evt.which) ? evt.which : evt.keyCode;
                if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                    return false;
                }
                return true;
            }

            function setValx(id, value) {
                // Ensure the value is a number and truncate to 8 characters
                let cleanedValue = value.replace(/\D/g, '').substring(0,9);
                document.getElementById(id).value = formatRupiah(cleanedValue);
            }

			$(document).ready(function () {
				getTagihanList();
  
                $(document).on('click', '.show-detail-btn', function () {
					var currentRow = $(this).closest('tr');

					if (currentRow.next().hasClass('detail-row')) {
						currentRow.next().remove();
						currentRow.next().remove();
					} else {
						var rowValue = currentRow.data('value'); 
						
                        showLoading();

                        let mercusuar = '';
                
                        const save2 = async () => {
                            const posts2 = await axios.get(linklisttertagih, {
                                headers: {
                                    'Authorization': 'Bearer ' + localStorage.getItem('_token')
                                }
                            }).catch((err) => {
                                Toastify({
                                    text: err.response.data.message,
                                    duration: 3000,
                                    close: true,
                                    gravity: "top",
                                    position: "right",
                                    className: "errorMessage",

                                }).showToast();

                                hideLoading();
                            });
                    
                            if (posts2.status == 200) {

                                mercusuar +=`<tr class="detail-row"><td colspan="20">
                                                <div class="row py-2" style="font-weight:bold;">
                                                    <div class="col-1">ID</div>
                                                    <div class="col-3">Nama Tertagih</div>
                                                    <div class="col-3">Nominal Penagihan</div>
                                                    <div class="col-3">Status</div>
                                                    <div class="col-1">Aksi</div>
                                                </div>
                                                <div class="putih">

                                `;
                                let totaltagihan = 0;
                                posts2.data.data.data.map((mapping,i)=>{
                                    let mbx = mapping.jumlah_tagihan;
                                    let stats = '';
                                    totaltagihan+=mbx;
                                    if(mapping.status_pembayaran=='lunas'){
                                        stats = `<font class="text-success">${mapping.status_pembayaran}</font>`;
                                    }else {
                                        stats = `<font class="text-danger">${mapping.status_pembayaran}</font>`;
                                    }

                                    if(mapping.status_pembayaran!='lunas'){
                                    mercusuar+=`
                                        <div class="row py-1">
                                            <div class="col-1">${mapping.id}</div>
                                            <div class="col-3">${mapping.siswa.nama}</div>
                                            <div class="col-3">Rp${formatRupiah(mbx.toString())}</div>
                                            <div class="col-3">${stats}</div>
                                            <div class="col-1">
                                            +628
                                            </div>
                                        </div>
                                        
                                    `;
                                    }
                                });
                                mercusuar+=`</div></td></tr>`;

                                mercusuar +=`<tr class=""><td colspan="20">
                                        <div class="row barisbawah" style="font-weight:bold; border-radius:20px; background:#f2f2f2; padding-top:15px; margin-top:-10px;padding-bottom:15px; border-top-left-radius:0px; border-top-right-radius:0px; margin-bottom:25px;">
                                    
                                            <div class="col-1"></div>
                                            <div class="col-3">Total</div>
                                            <div class="col-3">Rp${formatRupiah(totaltagihan.toString())}</div>
                                            <div class="col-3 text-end">
                                            <font style="font-size:10px; background:#b6b6c352; border-radius:10px; padding:5px;" class="px-2">Tagihan ${posts2.data.data.from} - ${posts2.data.data.to}, total tagihan : ${posts2.data.data.total} item</font></div>
                                            <div class="col-1">
                                                <button type="button" onclick="setlink('detail','${posts2.data.data.prev_page_url}'); console.log('prev');" class="btn btn-sm btn-secondary"><i class="bx bx-chevron-left"></i></button>
                                                <button type="button" onclick="setlink('detail','${posts2.data.data.next_page_url}'); console.log('next');" class="btn btn-sm btn-secondary"><i class="bx bx-chevron-right"></i></button>
                                            </div>
                                        </div>

                                        </td></tr>

                                `;

                                hideLoading();


                                if(posts2.data.data.data.length<1){
                                    mercusuar = `<tr class="detail-row"><td colspan="20" class="text-center p-5">Belum dilakukan proses <b>Sync</b> !</td></tr>`;
                                }
                                currentRow.after(mercusuar);
                            }
                        }
                        save2();

                        // Insert the detail row right after the clicked row
                        
					}
				});
            });

            function anotherRow(){
                showLoading();

                let mercusuar = '';
        
                const save2 = async () => {
                    const posts2 = await axios.get(linklisttertagih, {
                        headers: {
                            'Authorization': 'Bearer ' + localStorage.getItem('_token')
                        }
                    }).catch((err) => {
                        Toastify({
                            text: err.response.data.message,
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            className: "errorMessage",

                        }).showToast();

                        hideLoading();
                    });
            
                    if (posts2.status == 200) {

                        $('.putih').html('');

                        let totaltagihan = 0;
                        posts2.data.data.data.map((mapping,i)=>{
                            let mbx = mapping.jumlah_tagihan;
                            let stats = '';
                            totaltagihan+=mbx;
                            if(mapping.status_pembayaran=='lunas'){
                                stats = `<font class="text-success">${mapping.status_pembayaran}</font>`;
                            }else {
                                stats = `<font class="text-danger">${mapping.status_pembayaran}</font>`;
                            }

                            if(mapping.status_pembayaran!='lunas'){
                                mercusuar+=`
                                    <div class="row py-1">
                                        <div class="col-1">${mapping.id}</div>
                                        <div class="col-3">${mapping.siswa.nama}</div>
                                        <div class="col-3">Rp${formatRupiah(mbx.toString())}</div>
                                        <div class="col-3">${stats}</div>
                                        <div class="col-1">ok</div>
                                    </div>
                                `;
                            }
                        });
                        mercusuar+=`</td></tr>`;

                        hideLoading();
                        $('.putih').html(mercusuar);

                        $('.barisbawah').html(`
                                    <div class="col-1"></div>
                                    <div class="col-3">Total</div>
                                    <div class="col-3">Rp${formatRupiah(totaltagihan.toString())}</div>
                                    <div class="col-3 text-end">
                                            <font style="font-size:10px; background:#b6b6c352; border-radius:10px; padding:5px;" class="px-2">Tagihan ${posts2.data.data.from} - ${posts2.data.data.to}, total tagihan : ${posts2.data.data.total} item</font></div>
                                    <div class="col-1">
                                        <button type="button" onclick="setlink('detail','${posts2.data.data.prev_page_url}'); console.log('prev');" class="btn btn-sm btn-secondary "><i class="bx bx-chevron-left"></i></button>
                                        <button type="button" onclick="setlink('detail','${posts2.data.data.next_page_url}'); console.log('next');" class="btn btn-sm btn-secondary "><i class="bx bx-chevron-right"></i></button>
                                    </div>
                    
                        `);
                        
                    }
                }
                save2();
            }

            function showLoading() {
				document.getElementById('loadingScreen').style.display = 'flex';
				$('#loadingScreen').css('flex-direction','column');
				$('#loadingScreen').css('align-items','center');
				$('#loadingScreen').css('justify-content','center');
			}

			function hideLoading() {
				document.getElementById('loadingScreen').style.display = 'none';
			}

			let tagihanData = []; // Global array to store fetched data

            function resetFilters() {
                document.getElementById('yearFilter').value = '';
                document.getElementById('monthFilter').value = '';
                document.getElementById('jenisTagihanFilter').value = '';
                getTagihanList();
            }


            function getTagihanList() {
                let num = 1;
                let tableColumn = '';

                tableColumn += `<tr><td colspan="20" class="text-center">Loading....</td></tr>`;
                $('.putContentHere').html(tableColumn);

                const save2 = async () => {
                    if (tagihanData.length === 0) { // Fetch data only if not already fetched
                        const posts2 = await axios.get('<?= api_url_tagihan(); ?>api/tagihan', {
                            headers: {
                                'Authorization': 'Bearer ' + localStorage.getItem('_token')
                            }
                        }).catch((err) => {
                            console.log(err.response);
                        });

                        if (posts2.status == 200) {
                            tagihanData = posts2.data.data; // Store data in global array
                            populateYearFilter(); // Populate year filter based on data
                            populateJenisTagihanFilter(); // New function to populate Jenis Tagihan filter

                        }
                    }

                    const selectedYear = document.getElementById('yearFilter').value;
                    const selectedMonth = document.getElementById('monthFilter').value;
                    const selectedJenisTagihan = document.getElementById('jenisTagihanFilter').value;

                    const filteredData = tagihanData.filter(item => {
                        const itemDate = moment(item.tanggal_jatuh_tempo);
                        return (
                            (!selectedYear || itemDate.format('YYYY') === selectedYear) &&
                            (!selectedMonth || itemDate.format('MM') === selectedMonth) &&
                            (!selectedJenisTagihan || item.jenis_tagihan.name === selectedJenisTagihan)
                        );
                    });

                    // Calculate summary metrics
                    let totalCollected = 0;
                    let totalExpected = 0;
                    let overallPercentage = 0;

                    tableColumn = '';

                    if (filteredData.length === 0) {
                        tableColumn = `<tr><td colspan="8" class="text-center p-5">Tidak ditemukan data.</td></tr>`;
                    } else {
                        filteredData.map((mapping, i) => {
                            const collectedAmount = parseInt(mapping.tagihan_lunas || 0);
                            const expectedAmount = parseInt(mapping.tagihan_all || 0);
                            const percentage = ((collectedAmount / (expectedAmount || 1)) * 100).toFixed(0);

                            totalCollected += collectedAmount;
                            totalExpected += expectedAmount;
                            overallPercentage += parseFloat(percentage);

                            tableColumn += `
                                <tr data-value="${mapping.id}">
                                    <td><button class="btn btn-warning btn-sm show-detail-btn me-3" onclick="setlink('normal',${mapping.id});" style="padding:5px;padding-right: unset;"> <i class="bx bx-chevron-down"></i> </button> ${num++}</td>
                                    <td><b>${mapping.nama_tagihan}</b></td>
                                    <td>${mapping.jenis_tagihan.name}</td>
                                    <td><b>${moment(mapping.tanggal_jatuh_tempo).format('YYYY-MMM')}</b></td>
                                    <td>${moment(mapping.tanggal_jatuh_tempo).format('dddd, DD-MM-YYYY')}</td>
                                    <td>${moment(mapping.tanggal_mulai_tagihan).format('dddd, DD-MM-YYYY')}</td>
                                    <td>`;

                            mapping.jenis_nominal_data.nominal_tagihans.map((mapping2) => {
                                const nominal = mapping2.nominal_tagihan;
                                tableColumn += `
                                    <p class="mert${mapping.id}" style="line-height:1em;"><i class='bx bxs-bolt-circle'></i> Rp${formatRupiah(nominal.toString())}<br/><font style="font-size:9px; margin-top:-7px; line-height:0px;">${mapping2.kategori_tagihan}</font></p>
                                `;
                            });

                            tableColumn += `</td>
                                <td>
                                    <font style="font-size:15px;font-weight:bold;">${percentage}%</font>
                                    <br/>
                                    <font style="font-size:11px;">${formatRupiah(collectedAmount.toString())} / ${formatRupiah(expectedAmount.toString())}</font>
                                </td>
                                <td class="text-end">
                                    <button type="button" class="btn btn-sm btn-outline-primary" onclick="modalAddModify(${mapping.id});" id="updateData" style=""><i class="bx bx-pencil"></i> Update</button>
                                    <button type="button" class="btn btn-sm btn-info" onclick="modalSetNominal(${mapping.id});" id="updateData" style="color:white;"><i class="bx bx-money"></i> Nominal</button>
                                    <button type="button" class="btn btn-sm btn-primary" onclick="openDialogSelectUserFirst(${mapping.id},'${mapping.nama_tagihan}');nominalsett=${mapping.jenis_nominal_data.nominal_tagihans[0].nominal_tagihan}" id="syncData"><i class="bx bx-sync"></i> Apply Now</button>
                                </td>
                            `;
                        });

                        overallPercentage = (overallPercentage / filteredData.length).toFixed(2); // Average percentage
                    }

                    $('.putContentHere').html(tableColumn);

                    // Update summary
                    document.getElementById('totalPercentage').textContent = `${overallPercentage}%`;
                    document.getElementById('totalCollected').textContent = `Rp${formatRupiah(totalCollected.toString())}`;
                    document.getElementById('totalExpected').textContent = `Rp${formatRupiah(totalExpected.toString())}`;

                    createPaginations(filteredData, "siswa-pagination-container-222", "siswa-pagination-details-222", "getTagihanList");
                };

                save2();
            }

            // Populate year filter dynamically
            function populateYearFilter() {
                const years = [...new Set(tagihanData.map(item => moment(item.tanggal_jatuh_tempo).format('YYYY')))];
                const yearFilter = document.getElementById('yearFilter');
                
                years.forEach(year => {
                    const option = document.createElement('option');
                    option.value = year;
                    option.textContent = year;
                    yearFilter.appendChild(option);
                });
            }
            function populateJenisTagihanFilter() {
                const jenisTagihanSet = [...new Set(tagihanData.map(item => item.jenis_tagihan.name))];
                const jenisTagihanFilter = document.getElementById('jenisTagihanFilter');

                jenisTagihanSet.forEach(jenis => {
                    const option = document.createElement('option');
                    option.value = jenis;
                    option.textContent = jenis;
                    jenisTagihanFilter.appendChild(option);
                });
            }


            function updateData(str){

            }
            function setlink(mode,str){
                if(mode=='normal'){
                    linklisttertagih = '<?= api_url_tagihan(); ?>api/tagihan-siswa/'+str;
                }else {
                    console.log(str);
                    if(str!='null'){
                        linklisttertagih = str;
                        anotherRow();
                    }else {
                        console.log('tidak ada halaman lainnya');
                    }
                    
                }
                

            }
            function openDialogSelectUserFirst(str, nama_tagihan){
                $('#modalSetUserToTagihan').modal('toggle');
                let mxx = $('.mert'+str).html();
                $('.putinfohere').html(`
                    <div class="row">
                        <div class="col">
                        <h6>${nama_tagihan}</h6>
                        <font class="putinfohere_2"></font>
                        </div>
                        <div class="col">
                        ${mxx}
                        </div>
                    </div>
                    
                `);
                idsett = str;
                console.log("id tagihan set multiple : "+idsett);

                showDataSiswa();
            }

            function procApplyUserToTagihan(){
                Swal.fire({
                    title: "Anda yakin ingin menerapkan tagihan ini?",
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: "Ya, Lakukan Sekarang",
                    denyButtonText: `Nanti saja`
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        showLoading();
                        
                        var form_data = new FormData();

                        const userIds = arraySelected.map(item => item.user_id);

                        console.log(userIds);

                        form_data.append('tagihan_id', idsett);
                        // userIds.forEach(userIds => form_data.append('user_siswa_id[]', userIds)); // Append each ID separately
                        form_data.append('user_siswa_id', userIds);
                        form_data.append('nominal', nominalsett);
                        form_data.append('keterangan', 'set by admin');

                        const save = async (form_data) => {
                            const posts = await axios.post('<?= api_url_tagihan(); ?>api/tagihan-siswa/buat-tagihan-siswa/multiple',form_data, {
                                headers: {
                                    'Authorization': 'Bearer ' + localStorage.getItem('_token')
                                }
                            }).catch((err) => {
                                for (const key in err.response.data.error) {
                                    Toastify({
                                        text: err.response.data.error[key],
                                        duration: 3000,
                                        close: true,
                                        gravity: "top",
                                        position: "right",
                                        className: "errorMessage",

                                    }).showToast();

                                    hideLoading();
                                }
                            });

                            if (posts.status == 200||posts.status == 201) {
                                Toastify({
                                    text: posts.data.message,
                                    duration: 3000,
                                    close: true,
                                    gravity: "top",
                                    position: "right",
                                    className: "successMessage",

                                }).showToast();

                                arraySelected = []; //reset array selected ids
                                location.reload();
                                
                                hideLoading();
                            } else {

                            }
                        }
                        save(form_data);
                    } else if (result.isDenied) {
                        Swal.fire("Proses dibatalkan", "", "info");
                    }
                });
                
            }

            function SyncData(str){

                Swal.fire({
                title: "Anda yakin ingin menerapkan tagihan ini ke SEMUA SISWA yang terdaftar?",
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: "Ya, Lakukan Sekarang",
                denyButtonText: `Nanti saja`
                }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    showLoading();
                    
                    var form_data = new FormData();

                    form_data.append('tagihan_id', str);

                    const save = async (str) => {
                        const posts = await axios.post('<?= api_url_tagihan(); ?>api/tagihan-siswa/buat-tagihan-seluruh-siswa',form_data, {
                            headers: {
                                'Authorization': 'Bearer ' + localStorage.getItem('_token')
                            }
                        }).catch((err) => {
                            for (const key in err.response.data.error) {
                                Toastify({
                                    text: err.response.data.error[key],
                                    duration: 3000,
                                    close: true,
                                    gravity: "top",
                                    position: "right",
                                    className: "errorMessage",

                                }).showToast();

                                hideLoading();
                            }
                        });

                        if (posts.status == 200||posts.status == 201) {
                            Toastify({
                                text: posts.data.message,
                                duration: 3000,
                                close: true,
                                gravity: "top",
                                position: "right",
                                className: "successMessage",

                            }).showToast();

                            location.reload();
                            
                            hideLoading();
                        } else {

                        }
                    }
                    save(form_data);
                } else if (result.isDenied) {
                    Swal.fire("Proses dibatalkan", "", "info");
                }
                });
            }
            
            function showDetails(str){

				$('#modalViewDetails').modal('toggle');

				$('.puter').html('<div class="row"><div class="col-12 text-center">Loading...</div></div>');

				const save2 = async () => {
					const posts2 = await axios.get('<?= api_url_tagihan(); ?>api/tagihan', {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {
						console.log(err.response);
					});
			
					if (posts2.status == 200) {

						tableColumn='';

						console.log(posts2.data.data);
						
                        posts2.data.data.map((mapping,i)=>{

                        tableColumn+=`
                            <tr>
                                <td>${num++}</td>
                                <td>${mapping.name}</td>
                                <td>${moment(mapping.created_at).format('dddd, DD-MM-YYYY')}</td>
                                <td>${moment(mapping.created_at).format('HH:mm:ss')} WIB</td>
                                <td class="text-end">
                                    <button type="button" class="btn btn-sm btn-success" onclick="window.location.href='<?=base_url();?>CPanel_Tagihan/TagihanByJenis/${mapping.id}'" id="showTagihanPage"><i class="bx bx-list-check"></i> List Tagihan</button>
                                    <button type="button" class="btn btn-sm btn-outline-success" onclick="showDetails('${mapping.id}');" id="seeDetails"><i class="bx bx-show-alt"></i> Details</button>
                                    <button type="button" class="btn btn-sm btn-outline-primary" onclick="modalAddModify(${mapping.id});" id="updateData"><i class="bx bx-pencil"></i> Update</button>
                                </td>
                        `; 
                        });

                        $('.putContentHere').html(tableColumn);
						
                        // createPaginations(posts2.data.data, "siswa-pagination-container", "siswa-pagination-details", "showData");
						
					}
				}
				save2();

				
			}

			function modalAddModify(mode){
				modesett = mode;

				if(mode!='add'){

					const save2 = async () => {
						const posts2 = await axios.get('<?= api_url_tagihan(); ?>api/tagihan/'+mode, {
							headers: {
								'Authorization': 'Bearer ' + localStorage.getItem('_token')
							}
						}).catch((err) => {
							console.log(err.response);
						});
				
						if (posts2.status == 200) {

                            idsett = posts2.data.jenis_tagihan_id;

                            let tanggalMulaiTagihan = posts2.data.tanggal_mulai_tagihan;
                            let tanggalJatuhTempo = posts2.data.tanggal_jatuh_tempo;

                            let formattedDateTime = tanggalMulaiTagihan.replace(' ', 'T').slice(0, 16);
                            let formattedDateTime2 = tanggalJatuhTempo.replace(' ', 'T').slice(0, 16);

							$('#tagihan_name').val(posts2.data.nama_tagihan);
							$('#tanggalJatuhTempo').val(formattedDateTime2);
							$('#tanggalPenagihan').val(formattedDateTime);

							
						}
					}
					save2();
				}
				$('#modalSetTagihan').modal('toggle');
			}
			
            
            function modalSetNominal(mode){
				modesett = mode;

                $('.putlistnominalhere').html('');

                let mercusuar = '';
				if(mode!='add'){

					const save2 = async () => {
						const posts2 = await axios.get('<?= api_url_tagihan(); ?>api/tagihan/'+mode+"/show-nominal", {
							headers: {
								'Authorization': 'Bearer ' + localStorage.getItem('_token')
							}
						}).catch((err) => {
							console.log(err.response);
						});
				
						if (posts2.status == 200) {

                            idsett = posts2.data.id;
                            posts2.data.nominal_tagihans.map((mapping,i)=>{
                                let mxi = mapping.nominal_tagihan;
                                mercusuar+=`
                                    <label for="${mapping.kategori_tagihan}" class="form-label"><div class="badge bg-dark me-2">Tag : </div>${mapping.kategori_tagihan}</label>
                                    <input type="text" id="${mapping.kategori_tagihan}" class="form-control mb-3 setTocurrency" 
                                    oninput="setValx('${mapping.kategori_tagihan}',this.value);" style="font-size:26px!important;"
                                    placeholder="(Rp)" maxlength="9" value="${formatRupiah(mxi.toString())}" onkeydown="return isNumberKey(event);"/>
                                `;    
                            });
                            $('.putlistnominalhere').html(mercusuar);
						}
					}
					save2();
				}
				$('#modalSetNominal').modal('toggle');
			}

			function procModifyTagihan(){
				$('#submitBtnTagihan').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Memproses...');
				$('#submitBtnTagihan').attr('disabled', 'disabled');
				$('#submitBtnTagihan').css('cursor', 'not-allowed');

				let url = '';
				
				var nama_tagihan = $('#tagihan_name').val();
				var tgljatuhtempo = $('#tanggalJatuhTempo').val();
				var tglpenagihan = $('#tanggalPenagihan').val();
				
				var form_data = new FormData();

				form_data.append('jenis_tagihan_id', idsett);
				form_data.append('nama_tagihan', nama_tagihan);
				form_data.append('tanggal_mulai_tagihan', tglpenagihan);
				form_data.append('tanggal_jatuh_tempo', tgljatuhtempo);

				const save = async (str) => {
					const posts = await axios.post('<?= api_url_tagihan(); ?>api/tagihan/'+modesett,form_data, {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {
						for (const key in err.response.data.error) {
							Toastify({
								text: err.response.data.error[key],
								duration: 3000,
								close: true,
								gravity: "top",
								position: "right",
								className: "errorMessage",

							}).showToast();
						}
					});

					if (posts.status == 200||posts.status == 201) {
						Toastify({
							text: 'Berhasil diperbaharui!',
							duration: 3000,
							close: true,
							gravity: "top",
							position: "right",
							className: "successMessage",

						}).showToast();
						$('#modalSetTagihan').modal('toggle');
						getTagihanList();

						$('#submitBtnTagihan').html('Simpan');
						$('#submitBtnTagihan').attr('disabled', false);
						$('#submitBtnTagihan').css('cursor', 'pointer');
					} else {

					}
				}
				save(form_data);
			}
			
            
            function procModifyNominal(){
				$('#submitBtnNominal').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Memproses...');
				$('#submitBtnNominal').attr('disabled', 'disabled');
				$('#submitBtnNominal').css('cursor', 'not-allowed');

				let url = '';
				
				var nama_tagihan = $('#tagihan_name').val();
				var tgljatuhtempo = $('#tanggalJatuhTempo').val();
				var tglpenagihan = $('#tanggalPenagihan').val();
				
				var form_data = new FormData();

				$('.setTocurrency').each(function() {
                    let id = $(this).attr('id');
                    let value = $(this).val();
                    value = value.split('.').join("");
                    console.log('ID:', id, 'Value:', value);
                    form_data.append(id, value);
                });

				const save = async (str) => {
					const posts = await axios.post('<?= api_url_tagihan(); ?>api/tagihan/'+modesett+"/nominal",form_data, {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {
						for (const key in err.response.data.error) {
							Toastify({
								text: err.response.data.error[key],
								duration: 3000,
								close: true,
								gravity: "top",
								position: "right",
								className: "errorMessage",

							}).showToast();
						}
					});

					if (posts.status == 200||posts.status == 201) {
						Toastify({
							text: 'Berhasil diperbaharui!',
							duration: 3000,
							close: true,
							gravity: "top",
							position: "right",
							className: "successMessage",

						}).showToast();
						$('#modalSetNominal').modal('toggle');
						getTagihanList();

						$('#submitBtnNominal').html('Simpan');
						$('#submitBtnNominal').attr('disabled', false);
						$('#submitBtnNominal').css('cursor', 'pointer');
					} else {

					}
				}
				save(form_data);
			}

            function showDataSiswa(){
				let num = 0;
				let tableColumn = '';
				tableColumn += `<tr><td colspan="8" class="text-center">Loading...</td></tr>`;
				$('.putListSiswaHere').html(tableColumn);
				
				const save2 = async () => {
					const posts2 = await axios.get( '<?= api_url_tagihan(); ?>api/siswa' , {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {
						console.log(err.response);
					});
			
					if (posts2.status == 200) {
							num += 1;
							tableColumn = '';
							if(posts2.data.data.length==0){
								tableColumn +=`<tr><td colspan="8" class="text-center">Tidak ada data.</td></tr>`;
								$('.putListSiswaHere').html(tableColumn);return false;
							}
							
							console.log(posts2.data.data);
							posts2.data.data.map((mapping,i)=>{

                                let textTingkat = '';
								let textNamaA = mapping.nama;
								let textNama = textNamaA.split("-M");

                                if(textNama[1]=='A'){
									textTingkat = 'Madrasah Aliyah';
								}
								if(textNama[1]=='TS'){
									textTingkat = 'Madrasah Tsanawiyah';
								}
                                if(textNama[1]==undefined){
                                    textTingkat = '-';
                                }

                                let nisclear = mapping.nis;
                                nisclear = nisclear.replace(/\s/g, "");

                                // tanggalLahirpublic = mapping.tanggal_lahir;

							tableColumn +=`
								<tr>
									<td><b>${textNama[0]}</b></td>
									<td><small class="text-muted">${textTingkat}</small> </td>
                                    <td>${mapping?.oncard?.telp_ortu??'0'}</td>
                                    <td  class="text-end">
                                    <button type="button" class="btn${mapping.user_id} btn btn-sm btn-primary ps-2 pe-1" onclick="addToQueue('${mapping.user_id}','${mapping.nama}');"  id="seeDetails"><i class="bx bx-right-arrow-alt"></i></button>
                                    </td>
								</tr>
							`;
							});
							
						$('.putListSiswaHere').html(tableColumn);
						createPaginations(posts2.data, "siswa-pagination-container", "siswa-pagination-details", "showDataSiswa");
					}
				}
				save2();
			}

            let arraySelected = [];

            function addToQueue(id_user, nama) {
                // Check if id_user already exists in the array
                const exists = arraySelected.some(item => item.user_id === id_user);

                
                if (exists) {
                    Toastify({
                        text: "Data ini sudah ada dalam daftar yang akan di submit.",
                        duration: 3000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        className: "errorMessage",

                    }).showToast();
                    return; // Exit the function if the user ID exists
                }
                
                $('.btn'+id_user).attr('class',`btn${id_user} btn btn-sm btn-secondary ps-2 pe-1 disabled`);

                // Add to the queue if the user ID is new
                arraySelected.push({
                    'user_id': id_user,
                    'nama': nama
                });

                let html = '';
                arraySelected.forEach(item => {
                    html +=`
                        <tr>
                            <td>
                            <button type="button" class="btn_sentout_${id_user} btn btn-sm btn-danger ps-2 pe-1" onclick="removeFromQueue('${id_user}');"  id="seeDetails"><i class="bx bx-left-arrow-alt"></i></button>
                            </td>
                            <td>${item.nama}</td>
                        </tr>
                    `;
                });

                $('.putListSiswaHereInQueue').html(html);
                console.log(arraySelected);

                let newhtml = `<font>${arraySelected.length} data terpilih.</font>`;
                $('.putinfohere_2').html(newhtml);
            }

            function removeFromQueue(id_user){
                arraySelected = arraySelected.filter(item => item.user_id !== id_user);

                let html = '';
                arraySelected.forEach(item => {
                    html +=`
                        <tr>
                            <td>
                            <button type="button" class="btn_sentout_${item.user_id} btn btn-sm btn-danger ps-2 pe-1" onclick="removeFromQueue('${item.user_id}');"  id="seeDetails"><i class="bx bx-left-arrow-alt"></i></button>
                            </td>
                            <td>${item.nama}</td>
                        </tr>
                    `;
                });

                $('.putListSiswaHereInQueue').html(html);

                $('.btn'+id_user).attr('class',`btn${id_user} btn btn-sm btn-primary ps-2 pe-1`);

                console.log(arraySelected);
                let newhtml = `<font>${arraySelected.length} data terpilih.</font>`;
                $('.putinfohere_2').html(newhtml);
            }

        </script>