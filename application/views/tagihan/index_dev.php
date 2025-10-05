<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<style>
.health, .progress {
  height: 55px;
  width: 100%;
  margin-bottom: 30px;
  /* padding-top: 1px; */
  border-radius: 14px;
  background-color: #323550;
  position: relative;
  margin-left:-1px;
}
.health .progress-bar, 
.progress .progress-bar {
  display: block;
  overflow: hidden;
  position: relative;
  height: 100%;
  /* margin-left: 1px; */
  border-radius: 14px;
  min-width: 13px;
}
.health .shade {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  display: block;
}
.warm {
    background: rgb(0,141,252);
background: linear-gradient(90deg, rgba(0,141,252,1) 0%, rgba(53,184,128,1) 100%);
}

.card {
    border-radius:14px!important;
}
    
</style>

<style>
       .month-container {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .month-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .month-title {
            flex-shrink: 0;
            font-size: 14px;
            font-weight: bold;
            white-space: nowrap;
        }

        .chart {
            flex-grow: 1;
            max-width: 400px;
        }
        .chart-container {
            display: flex;
            justify-content: space-around;
            align-items: flex-end;
        }

        .chart {
            width: 100px;
            text-align: center;
        }


        .progress-bar {
            position: relative;
            height: 150px;
            /* width: 50px; */
            background: linear-gradient(to top, #00E396 65%, #e0e0e0 65%);
            border-radius: 6px;
            display: flex;
            align-items: flex-end;
            justify-content: center;
            overflow: hidden;
            border-top-left-radius:10px;
            border-top-right-radius:10px;
        }

        .progress-percentage {
            position: absolute;
            top: 10px;
            font-size: 14px;
            font-weight: bold;
            color: #333;
            right:20px;
        }

        .year-label {
            margin-top: 8px;
            font-size: 14px;
        }
    </style>
<div class="page-wrapper">
			<div class="page-content">
				<div class="row rowslider" style="display:none;">
					<div class="col-12">
						<div class="card radius-10 w-100" style="overflow:hidden;">
							<div class="row" >
                                <div class="box"></div>
								<!-- <img src="<?=base_url();?>assets_oncard/images/bg_new.webp" style="width:100%; object-fit:cover;object-position:center;height:200px;"/> -->
								<div class="siema">
                                <div><img src="<?=base_url();?>assets_oncard/images/banner_new.webp" style="width:100%; object-fit:cover;object-position:center;height:250px;"/></div>
								</div>
                                
							</div>
						</div>
					</div>
				</div>

                <div class="row">
                    <div class="col-12">
                        <h5 class="COT"></h5>
                    </div>
                    <div class="col-lg-8 col-md-12 col-12">
                        <div class="row">
                            <div class="col-12" style="margin-bottom:-20px;">
                                <div class="health">
                                    <span class="progress-bar percentagevalue" style="width: 0%;">
                                        <span class="shade warm"></span>

                                        
                                    </span>    
                                    <div class="text-light" style="display:flex; justify-content:space-between; position:relative; margin-top:-38px;z-index:4;">
                                            <b class="px-3">Payment Progress All</b>
                                            <b class="px-3 percentagetext">0%</b>
                                        </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="card" style="background:#008cff;">
                                    <div class="card-body text-center" style="padding-top:5px!important;padding-bottom:5px!important;">
                                        <h5 class="text-white" style="margin-top:0!important;; padding-top:0!important;">Dibayar</h5>
                                        <h4 class="text-white sudahbayartext" style="font-weight:bolder!important;">Rp0</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="card" style="background:#363466;">
                                    <div class="card-body text-center" style="padding-top:5px!important;padding-bottom:5px!important;">
                                        <h5 class="text-white" style="margin-top:0!important;; padding-top:0!important;">Belum Dibayar</h5>
                                        <h4 class="text-white belumbayartext" style="font-weight:bolder!important;">Rp0</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="card" style="background:#34b77e;">
                                    <div class="card-body text-center" style="padding-top:5px!important;padding-bottom:5px!important;">
                                        <h5 class="text-white" style="margin-top:0!important;; padding-top:0!important;">Semua Biaya</h5>
                                        <h4 class="text-white allbiayatext" style="font-weight:bolder!important;">Rp0</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="row">
                            <div class="col-lg-12 col-md-6 col-12">
                                <div class="card py-3" style="background:#34b77e;">
                                    <div class="card-body text-center" style="padding-top:13px!important;padding-bottom:13px!important;">
                                        <h5 class="text-white" style="margin-top:0!important;; padding-top:0!important;">Siswa</h5>
                                        <h4 class="text-white siswatotaltext" style="font-weight:900!important;font-size:50px;margin:auto;">
                                        <style>
                                            .loader {
                                                display:block;
                                                margin:auto;
                                                margin-top:22px;
                                                margin-bottom:22px;
                                                width: 100px;
                                                aspect-ratio: 4;
                                                --_g: no-repeat radial-gradient(circle closest-side,#fff 90%,#fff);
                                                background: 
                                                    var(--_g) 0%   50%,
                                                    var(--_g) 50%  50%,
                                                    var(--_g) 100% 50%;
                                                background-size: calc(100%/3) 100%;
                                                animation: l7 1s infinite linear;
                                                }
                                                @keyframes l7 {
                                                    33%{background-size:calc(100%/3) 0%  ,calc(100%/3) 100%,calc(100%/3) 100%}
                                                    50%{background-size:calc(100%/3) 100%,calc(100%/3) 0%  ,calc(100%/3) 100%}
                                                    66%{background-size:calc(100%/3) 100%,calc(100%/3) 100%,calc(100%/3) 0%  }
                                                }
                                            </style>
                                        <div class="loader"></div>
                                    </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-6 col-12" style="display:none;">
                                <div class="card py-4" style="background:#fecd3e;">
                                    <div class="card-body text-center" style="padding-top:13px!important;padding-bottom:13px!important;">
                                        <h5 class="text-dark" style="margin-top:0!important;; padding-top:0!important;">Balance</h5>
                                        <h4 class="text-dark balancetext" style="font-weight:900!important;">Rp0</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-6 col-12" >
                        <div class="row">
                            <div class="col-lg-8 col-md-6 col-12">
                                <div class="card" style="border-radius:16px;overflow:hidden!important;">
                                    <div class="card-body" style="padding:0;overflow:hidden!important;">
                                        <div class="row"  id="tagihanListHere" style="overflow:hidden;">
                                            
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="card" style="border-radius:16px;">
                                    <div class="card-body">
                                        <select name="bytp" id="tp" class="form-control" style="font-size:20px; font-weight:800; text-align:center;">
                                        </select>

                                        <div class="month-container" id="chart"></div>

                                        <!-- <h5 style="font-weight:800;" class="text-center">Payment By Month</h5> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="detailModal" tabindex="-1">
                    <div class="modal-dialog modal-fullscreen">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Detail Tagihan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body" id="modalContent">
                            <!-- Detail tagihan akan diinject di sini -->
                        </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="allTagihanModal" tabindex="-1">
                    <div class="modal-dialog modal-fullscreen">
                        <div class="modal-content">
                        <div class="modal-header bg-dark text-white" style="background: #2A7B9B;
background: linear-gradient(42deg, rgba(42, 123, 155, 1) 0%, rgba(87, 199, 133, 1) 100%);color:white; font-weight:bolder;">
                            <h5 class="modal-title text-white fw-bold" id="allTagihanTitle"></h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body" id="allTagihanBody">
                            <!-- Isi tabel akan ditaruh di sini -->
                        </div>
                        </div>
                    </div>
                </div>

                <!-- Fullscreen Modal -->
                <div class="modal fade" id="tagihanDetailModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-fullscreen">
                    <div class="modal-content">
                    <div class="modal-header" style="background: #2A7B9B;
background: linear-gradient(42deg, rgba(42, 123, 155, 1) 0%, rgba(87, 199, 133, 1) 100%);color:white; font-weight:bolder;">
                        <h5 class="modal-title text-white fw-bold">Detail Tagihan *</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        
                        <!-- Summary -->
                        <div id="tagihanSummary" class="mb-4"></div>

                        <!-- DataTable -->
                        <div class="table-responsive">
                        <table id="tagihanDetailTable" class="table table-bordered table-striped align-middle w-100">
                            <thead class="table-dark">
                            <tr>
                                <th>Nama Tertagih</th>
                                <th>Tagihan</th>
                                <th>Dibayar</th>
                                <th>Belum</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody class="putContentHere2">
                            <tr><td colspan="2" class="text-center">Loading...</td></tr>
                            </tbody>
                        </table>
                        </div>

                    </div>
                    </div>
                </div>
                </div>

				
			</div>
		</div>

		<script src="https://pawelgrzybek.github.io/siema/assets/siema.min.js"></script>


        <script type="text/javascript">

			let invoiceDataArray = [];
			let NewInvoiceDataArray = [];
			let NewInvoiceDataArrayForGraph2 = [];
			let NewDataArrayForGraph5 = [];
            let tahunAkademikArray = [];
			let arrSebaranSaldo = [];
            let arrUltah = [];
			let beaAdmin = 0;
			let graphtot = 0;
			let saldoOwner = 0;
			let saldTot = 0;
			let saldoKantinTotal = 0;
            let saldoAll = 0;
            $(document).ready(function () {
				getInfoDashboard();

                console.log(new Date().getFullYear());
                getTagihanList(new Date().getFullYear());

                // showTahunAkademik();

                $('.rowslider').attr('style','display:block');

                const mySiema = new Siema({
			    easing: "cubic-bezier(.17,.67,.32,1.34)" });


                var barWidth = $('.health').width();
                $('.shade').css('width', barWidth);
                

                getJumlahSiswa();

            });

            
            function getJumlahSiswa(){
				let num = 0;
				let tableColumn = '';
			
				tableColumn += `<tr><td colspan="7" class="text-center">Loading....</td></tr>`;
				$('.putContentHere').html(tableColumn);
				
                
				const save2 = async () => {
					const posts2 = await axios.get('<?= api_url_core(); ?>api/master/siswa/siswa-detail', {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_private_token')
						}
					}).catch((err) => {
						console.log(err.response);
					});
			
					if (posts2.status == 200) {
                        $('.siswatotaltext').html(posts2.data.length)
					}
				}
				save2();
			}
            
            
            
            
			function getInfoDashboard(){
				const save2 = async () => {
					const posts2 = await axios.get('<?= api_url_tagihan(); ?>api/dashboard/tagihan-count', {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {
						console.log(err.response);
					});
			
					if (posts2.status == 200) {
                        
                        let balance = posts2.data.balance;
                        let jmlBelumDibayarkan = posts2.data.jmlBelumDibayarkan;
                        let jmlDibayarkan = posts2.data.jmlDibayarkan;
                        let jmlTagihan = posts2.data.jmlTagihan;

                        let percentage = (jmlDibayarkan / jmlTagihan) * 100;
                        
                        $('.balancetext').html("Rp"+formatRupiah(balance));
                        $('.sudahbayartext').html("Rp"+formatRupiah(jmlDibayarkan));
                        $('.belumbayartext').html("Rp"+formatRupiah(jmlBelumDibayarkan));
                        $('.allbiayatext').html("Rp"+formatRupiah(jmlTagihan));

                        $('.percentagetext').html(percentage.toFixed(2)+"%");
                        $('.percentagevalue').attr('style',`width:${percentage.toFixed(2)}%`);
                    }
				}
				save2();
			}

            async function getTagihanList(yearSelected) {
                const response = await axios.get('<?= api_url_tagihan(); ?>api/tagihan', {
                    headers: {
                        'Authorization': 'Bearer ' + localStorage.getItem('_token'),
                        'Nopaginate': true
                    }
                });

                if (response.status !== 200) return;

                const data = response.data;

                // 1. Tentukan rentang tahun (3 tahun terakhir)
                const startYear = yearSelected - 2;
                const endYear = yearSelected;

                // 2. Grouping per bulan & tahun jatuh tempo
                const grouped = {};
                data.forEach(item => {
                    const jatuhTempo = new Date(item.tanggal_mulai_tagihan);
                    const year = jatuhTempo.getFullYear();
                    const month = jatuhTempo.getMonth(); // 0-11

                    if (year < startYear || year > endYear) return; // filter 3 tahun terakhir

                    const key = `${year}-${month}`;
                    if (!grouped[key]) {
                        grouped[key] = {
                            bulan: month,
                            tahun: year,
                            lunas: 0,
                            belumLunas: 0,
                            items: []
                        };
                    }

                    grouped[key].lunas += parseInt(item.tagihan_lunas || 0);
                    grouped[key].belumLunas += parseInt(item.tagihan_belum_lunas || 0);
                    grouped[key].items.push(item);
                });

                // 3. Konversi ke array agar bisa diurutkan
                const chartData = Object.values(grouped).sort((a, b) => {
                    if (a.tahun === b.tahun) return a.bulan - b.bulan;
                    return a.tahun - b.tahun;
                });

                // 4. Siapkan data chart
                const bulanNames = ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"];

                const categories = chartData.map(d => `${bulanNames[d.bulan]} ${d.tahun}`);
                const lunasSeries = chartData.map(d => d.lunas);
                const belumSeries = chartData.map(d => d.belumLunas);

                // 5. Render ApexCharts
                const options = {
                    chart: {
                        type: 'bar',
                        stacked: true,
                        height: 400,
                        events: {
                            dataPointSelection: function(event, chartContext, config) {
                                const index = config.dataPointIndex;
                                const bulanData = chartData[index];
                                showModalDetail(bulanData);
                            }
                        }
                    },
                    plotOptions: {
                        bar: {
                            horizontal: true,
                            borderRadius: 4
                        }
                    },
                    series: [
                        { name: "Sudah Dibayar", data: lunasSeries },
                        { name: "Belum Dibayar", data: belumSeries }
                    ],
                    xaxis: {
                        categories: categories
                    },
                    colors: ["#00E396", "#FF4560"],
                    tooltip: {
                        y: {
                            formatter: val => "Rp " + val.toLocaleString()
                        }
                    }
                };

                document.querySelector("#chart").innerHTML = ""; // reset container
                const chart = new ApexCharts(document.querySelector("#chart"), options);
                chart.render();

                renderNearestTagihan(data);


                // 6. Modal detail tagihan
                function showModalDetail(bulanData) {
                    // --- Hitung summary ---
                    let countLunas = 0;
                    let countBelum = 0;
                    let sumLunas = 0;
                    let sumBelum = 0;
                    let sumTotal = 0;

                    bulanData.items.forEach(item => {
                        const lunas = parseInt(item.tagihan_lunas) || 0;
                        const belum = parseInt(item.tagihan_belum_lunas) || 0;
                        const total = parseInt(item.tagihan_all) || 0;

                        if (belum === 0) countLunas++;
                        else countBelum++;

                        sumLunas += lunas;
                        sumBelum += belum;
                        sumTotal += total;
                    });

                    const percentage = sumTotal > 0 ? ((sumLunas / sumTotal) * 100).toFixed(2) : 0;

                    // --- 3. Tambahkan Search Section ---
                let searchHTML = `
                    <div class="mb-3">
                        <input type="text" id="searchTagihan" class="form-control" placeholder="Cari tagihan...">
                    </div>
                `;
                    // --- Summary Section ---
                    let summaryHTML = `
                        <div class="row g-3 mb-3">
                            <div class="col-md-4 col-6">
                                <div class="card shadow-sm border-0 rounded-3">
                                    <div class="card-body text-center">
                                        <h6 class="fw-bold text-success mb-1">✔️ Tagihan Lunas</h6>
                                        <h5 class="fw-bold mb-0">${countLunas}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-6">
                                <div class="card shadow-sm border-0 rounded-3">
                                    <div class="card-body text-center">
                                        <h6 class="fw-bold text-danger mb-1">❌ Belum Lunas</h6>
                                        <h5 class="fw-bold mb-0">${countBelum}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-6">
                                <div class="card shadow-sm border-0 rounded-3">
                                    <div class="card-body text-center">
                                        <h6 class="fw-bold text-warning mb-1">💰 Sisa Tagihan</h6>
                                        <h5 class="fw-bold mb-0">Rp ${sumBelum.toLocaleString()}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-6">
                                <div class="card shadow-sm border-0 rounded-3">
                                    <div class="card-body text-center">
                                        <h6 class="fw-bold text-primary mb-1">✅ Total Dibayar</h6>
                                        <h5 class="fw-bold mb-0">Rp ${sumLunas.toLocaleString()}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-6">
                                <div class="card shadow-sm border-0 rounded-3">
                                    <div class="card-body text-center">
                                        <h6 class="fw-bold text-dark mb-1">📊 Total Tagihan</h6>
                                        <h5 class="fw-bold mb-0">Rp ${sumTotal.toLocaleString()}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-6">
                                <div class="card shadow-sm border-0 rounded-3">
                                    <div class="card-body text-center">
                                        <h6 class="fw-bold text-info mb-1">📈 Persentase</h6>
                                        <h5 class="fw-bold mb-0">${percentage}%</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;


                    // --- Table ---
                    let html = `
                        ${summaryHTML}

                        ${searchHTML}

                        <table class="table table-bordered text-start align-middle" id="detailTable">
                            <thead class="table">
                                <tr>
                                    <th>Nama Tagihan</th>
                                    <th>Mulai</th>
                                    <th>Jatuh Tempo</th>
                                    <th>Tagihan</th>
                                    <th>Dibayar</th>
                                    <th>Belum Dibayar</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                    `;

                    bulanData.items.forEach(item => {
                        const lunas = parseInt(item.tagihan_lunas) || 0;
                        const belum = parseInt(item.tagihan_belum_lunas) || 0;
                        const total = parseInt(item.tagihan_all) || 0;

                        const status = belum === 0 
                            ? `<span class="badge bg-success">Lunas</span>` 
                            : `<span class="badge bg-danger">Belum Lunas</span>`;

                        html += `
                            <tr>
                                <td>${item.nama_tagihan}</td>
                                <td>${moment(item.tanggal_mulai_tagihan).format("DD-MM-YYYY")}</td>
                                <td>${moment(item.tanggal_jatuh_tempo).format("DD-MM-YYYY")}</td>
                                <td>Rp ${total.toLocaleString()}</td>
                                <td>Rp ${lunas.toLocaleString()}</td>
                                <td>Rp ${belum.toLocaleString()}</td>
                                <td>${status}</td>
                            </tr>
                        `;
                    });

                    // --- Footer total ---
                    html += `
                        </tbody>
                        <tfoot class="fw-bold table-light">
                            <tr>
                                <td colspan="3" class="text-end">TOTAL</td>
                                <td>Rp ${sumTotal.toLocaleString()}</td>
                                <td>Rp ${sumLunas.toLocaleString()}</td>
                                <td>Rp ${sumBelum.toLocaleString()}</td>
                                <td>-</td>
                            </tr>
                        </tfoot>
                        </table>
                    `;

                    document.getElementById("modalContent").innerHTML = html;

                    // --- Show modal ---
                    const modal = new bootstrap.Modal(document.getElementById("detailModal"));
                    modal.show();

                    const searchInput = document.getElementById("searchTagihan");
                searchInput.addEventListener("keyup", function() {
                    const filter = this.value.toLowerCase();
                    const rows = document.querySelectorAll("#detailTable tbody tr");

                    rows.forEach(row => {
                        const text = row.innerText.toLowerCase();
                        row.style.display = text.includes(filter) ? "" : "none";
                    });
                });

                }

                // 7. Tampilkan 10 tagihan terdekat
                function renderNearestTagihan(data) {
                    const today = new Date();

                    const nearest = data
                        .filter(item => new Date(item.tanggal_jatuh_tempo) >= today)
                        .sort((a, b) => new Date(a.tanggal_jatuh_tempo) - new Date(b.tanggal_jatuh_tempo))
                        .slice(0, 10);

                    const overdue = data
                        .filter(item => new Date(item.tanggal_jatuh_tempo) < today && (parseInt(item.tagihan_belum_lunas) || 0) > 0)
                        .sort((a, b) => (parseInt(b.tagihan_belum_lunas) || 0) - (parseInt(a.tagihan_belum_lunas) || 0))
                        .slice(0, 10);

                    let html = "";

                    // Helper untuk buat tabel
                    function renderTable(title, color, rows, allRows, type) {
                        let table = `
                        <div class="table-responsive mb-4">
                            <table class="table table-hover align-middle">
                                <thead style="background:${color};color:white;padding:10px;">
                                    <tr>
                                        <th colspan="7" class="text-center" >
                                            <h3 class="text-white m-0">${title}</h3>
                                            <button class="btn btn-warning btn-sm pt-2 d-block text-center m-auto mt-2 mb-2" onclick="showAllTagihan('${type}')">
                                                <i class="bx bx-list-ul"></i> Lihat Semua
                                            </button>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>Nama Tagihan</th>
                                        <th>Jatuh Tempo</th>
                                        <th>Total</th>
                                        <th>Dibayar</th>
                                        <th>Belum</th>
                                        <th>Progress</th>
                                    </tr>
                                </thead>
                                <tbody>
                        `;

                        rows.forEach(item => {
                            const total = parseInt(item.tagihan_all) || 0;
                            const lunas = parseInt(item.tagihan_lunas) || 0;
                            const belum = parseInt(item.tagihan_belum_lunas) || 0;
                            const progress = total > 0 ? ((lunas / total) * 100).toFixed(1) : 0;

                            table += `
                                <tr>
                                    <td>${item.nama_tagihan}</td>
                                    <td>${moment(item.tanggal_jatuh_tempo).format("DD-MM-YYYY")}</td>
                                    <td>Rp ${total.toLocaleString()}</td>
                                    <td class="text-success">Rp ${lunas.toLocaleString()}</td>
                                    <td class="text-danger fw-bold">Rp ${belum.toLocaleString()}</td>
                                    <td class="fw-bold ${progress == 100 ? 'text-success' : 'text-warning'}">${progress}%</td>
                                </tr>
                            `;
                        });

                        table += `</tbody></table></div>`;

                        return table;
                    }

                    if (nearest.length > 0) {
                        html += renderTable(
                            "Top 10 Tagihan Dalam Waktu Dekat",
                            "linear-gradient(42deg, rgba(42, 123, 155, 1) 0%, rgba(87, 199, 133, 1) 100%)",
                            nearest,
                            data.filter(item => new Date(item.tanggal_jatuh_tempo) >= today),
                            "nearest"
                        );
                    }

                    if (overdue.length > 0) {
                        html += renderTable(
                            "Top 10 Tagihan Lewat Jatuh Tempo",
                            "linear-gradient(42deg, rgba(155, 42, 42, 1) 0%, rgba(255, 99, 71, 1) 100%)",
                            overdue,
                            data.filter(item => new Date(item.tanggal_jatuh_tempo) < today && (parseInt(item.tagihan_belum_lunas) || 0) > 0),
                            "overdue"
                        );
                    }

                    if (nearest.length === 0 && overdue.length === 0) {
                        html = `<div class="alert alert-info">Tidak ada data tagihan untuk ditampilkan 🎉</div>`;
                    }

                    document.getElementById("tagihanListHere").innerHTML = html;

                    // Simpan dataset lengkap supaya bisa dipanggil "lihat semua"
                    window._tagihanDataFull = {
                        nearest: data.filter(item => new Date(item.tanggal_jatuh_tempo) >= today),
                        overdue: data.filter(item => new Date(item.tanggal_jatuh_tempo) < today && (parseInt(item.tagihan_belum_lunas) || 0) > 0)
                    };
                }

                // Fungsi untuk tampilkan semua tagihan di modal
                window.showAllTagihan = function(type) {
                    const dataset = window._tagihanDataFull[type] || [];
                    const title = type === "nearest" ? "Semua Tagihan Dalam Waktu Dekat" : "Semua Tagihan Lewat Jatuh Tempo";

                    let html = `
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped align-middle">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Nama Tagihan</th>
                                        <th>Tanggal Mulai</th>
                                        <th>Jatuh Tempo</th>
                                        <th>Total</th>
                                        <th>Dibayar</th>
                                        <th>Belum</th>
                                        <th>Progress</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                    `;

                    dataset.forEach(item => {
                        const total = parseInt(item.tagihan_all) || 0;
                        const lunas = parseInt(item.tagihan_lunas) || 0;
                        const belum = parseInt(item.tagihan_belum_lunas) || 0;
                        const progress = total > 0 ? ((lunas / total) * 100).toFixed(1) : 0;

                        const status = belum === 0 
                            ? `<span class="badge bg-success">Lunas</span>` 
                            : `<span class="badge bg-danger">Belum Lunas</span>`;

                        html += `
                            <tr>
                                <td>${item.nama_tagihan}</td>
                                <td>${moment(item.tanggal_mulai_tagihan).format("DD-MM-YYYY")}</td>
                                <td>${moment(item.tanggal_jatuh_tempo).format("DD-MM-YYYY")}</td>
                                <td>Rp ${total.toLocaleString()}</td>
                                <td class="text-success">Rp ${lunas.toLocaleString()}</td>
                                <td class="text-danger">Rp ${belum.toLocaleString()}</td>
                                <td class="fw-bold ${progress == 100 ? 'text-success' : 'text-warning'}">${progress}%</td>
                                <td>${status}</td>
                            </tr>
                        `;
                    });

                    html += `</tbody></table></div>`;

                    document.getElementById("allTagihanTitle").innerText = title;
                    document.getElementById("allTagihanBody").innerHTML = html;

                    const modal = new bootstrap.Modal(document.getElementById("allTagihanModal"));
                    modal.show();
                };



            }

            

        </script>


        