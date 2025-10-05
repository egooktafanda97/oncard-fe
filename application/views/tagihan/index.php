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
            margin: 20px;
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
                    <div class="col-lg-12 col-md-6 col-12" style="display:none;">
                        <div class="row">
                            <div class="col-lg-8 col-md-6 col-12">
                                <div class="card" style="border-radius:16px;">
                                    <div class="card-body">
                                        <h5 style="font-weight:800;" class="text-center">Payment Progress by Tahun Ajaran</h5>
                                        <div class="row" id="chart4"></div>
                                    </div>
                                </div>
                                <div class="card" style="border-radius:16px;">
                                    <div class="card-body">
                                        <h5 style="font-weight:800;" class="text-center">Payment Progress by Angkatan</h5>
                                        <!-- <div class="row" id="chart4"></div> -->
                                        <div class="chart-container">
                                            <div class="row text-center">
                                            <script>
                                                const dataB = [
                                                    { year: 2023, progress: 92 },
                                                    { year: 2024, progress: 78 },
                                                    { year: 2025, progress: 18 },
                                                    { year: 2026, progress: 92 },
                                                    { year: 2027, progress: 78 },
                                                    { year: 2028, progress: 65 }
                                                ];

                                                document.write(
                                                    dataB.map(({ year, progress }) => `
                                                        <div class="chart text-center">
                                                            <div class="progress-bar" style="background: linear-gradient(to top, #00E396 ${progress}%, #e0e0e0 ${progress}%);">
                                                                <div class="progress-percentage">${progress}%</div>
                                                            </div>
                                                            <div class="year-label">${year}</div>
                                                        </div>
                                                    `).join('')
                                                );
                                            </script>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="card" style="border-radius:16px;">
                                    <div class="card-body">
                                        <select name="bytp" id="tp" class="form-control" style="font-size:20px; font-weight:800; text-align:center;">
                                        </select>

                                        <div class="month-container" id="monthContainer"></div>

                                        <!-- <h5 style="font-weight:800;" class="text-center">Payment By Month</h5> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <!-- <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header">[Sample] Pembayaran SPP Tiap Semester</div>
                            <div class="card-body">
                                <div id="chart4"></div>
                            </div>
                            <div class="card-footer text-sm">
                                <small> Update pada <?=date("Y/m/d");?> </small>
                            </div>
                        </div>
                    </div>
                </div> -->
				
				
			</div>
		</div>

		<script src="https://pawelgrzybek.github.io/siema/assets/siema.min.js"></script>

        <script>
        const data = [
            { year: 2023, progress: 92 },
            { year: 2024, progress: 78 },
            { year: 2025, progress: 65 },
            { year: 2026, progress: 92 },
            { year: 2027, progress: 78 },
            { year: 2028, progress: 65 }
        ];

        const chartContainer = document.getElementById("chartContainer");

        data.forEach(({ year, progress }, index) => {
            const chartDiv = document.createElement("div");
            chartDiv.className = "chart";
            chartDiv.id = `chart-${index}`;

            const yearLabel = document.createElement("div");
            yearLabel.className = "year-label";
            yearLabel.textContent = year;

            const container = document.createElement("div");
            container.appendChild(chartDiv);
            container.appendChild(yearLabel);

            chartContainer.appendChild(container);

            const options = {
                chart: {
                    type: 'radialBar',
                    height: 200
                },
                series: [progress],
                plotOptions: {
                    radialBar: {
                        hollow: {
                            size: '70%'
                        },
                        dataLabels: {
                            name: {
                                show: false
                            },
                            value: {
                                fontSize: '16px',
                                color: '#333',
                                offsetY: 5
                            }
                        }
                    }
                },
                fill: {
                    gradient: {
                        shade: 'dark',
                        type: 'vertical',
                        shadeIntensity: 0.5,
                        gradientToColors: ['#00E396'],
                        inverseColors: false,
                        stops: [0, 100]
                    },
                    colors: ['#4CAF50']
                },
                labels: [progress + '%']
            };

            const chart = new ApexCharts(document.querySelector(`#chart-${index}`), options);
            chart.render();
        });
    </script>

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

                getTagihanList();

                showTahunAkademik();

                $('.rowslider').attr('style','display:block');

                const mySiema = new Siema({
			    easing: "cubic-bezier(.17,.67,.32,1.34)" });


                var barWidth = $('.health').width();
                $('.shade').css('width', barWidth);
                
            });

            const months = [
                "Jan", "Feb", "Mar", "Apr", "Mei", "Jun", 
                "Jul", "Agu", "Sep", "Okt", "Nov", "Des"
            ];
            const year = `'${new Date().getFullYear().toString().slice(-2)}`;
            const monthContainer = document.getElementById("monthContainer");

            months.forEach((month, index) => {
                const progress = Math.floor(Math.random() * 101); // Random progress from 0 to 100
                const monthId = `chart-${index}`;

                // Create month item container
                const monthItem = document.createElement("div");
                monthItem.className = "month-item";

                // Add month title
                const monthTitle = document.createElement("div");
                monthTitle.className = "month-title";
                monthTitle.textContent = `${month} ${year}`;

                // Add chart container
                const chartDiv = document.createElement("div");
                chartDiv.id = monthId;
                chartDiv.className = "chart";

                monthItem.appendChild(monthTitle);
                monthItem.appendChild(chartDiv);
                monthContainer.appendChild(monthItem);

                // Render chart
                const options = {
                    chart: {
                        type: 'bar',
                        height: 30,
                        sparkline: {
                            enabled: true
                        }
                    },
                    series: [{
                        data: [progress]
                    }],
                    plotOptions: {
                        bar: {
                            horizontal: true,
                            barHeight: '50%',
                            borderRadius: 4
                        }
                    },
                    tooltip: {
                        enabled: false
                    },
                    xaxis: {
                        max: 100
                    },
                    fill: {
                        colors: ['#00E396']
                    }
                };

                const chart = new ApexCharts(document.querySelector(`#${monthId}`), options);
                chart.render();
            });
            


			function getSaldoOwner(){
				let num = 0;
				let tableColumn = '';
			
				tableColumn += `<tr><td colspan="7" class="text-center">Loading....</td></tr>`;
				$('.putContentHere').html(tableColumn);
				
				const save2 = async () => {
					const posts2 = await axios.get('<?= api_url(); ?>api/v1/account/get/owner', {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {
						console.log(err.response);
					});
			
					if (posts2.status == 200) {
                        saldoOwner= posts2.data.data.data[0].balance;

						$('.saldoOwner').html("Rp"+formatRupiah(saldoOwner.toString()));

                        saldoAll=parseInt(saldoOwner);
						getSiswa();

					}
				}
				save2();
			}
			
            
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

            function getTagihanList(){

                let tgl_tagihan = [];
				
				const save2 = async () => {
					const posts2 = await axios.get('<?= api_url_tagihan(); ?>api/tagihan', {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {
						console.log(err.response);
					});
			
					if (posts2.status == 200) {

						
                        posts2.data.data.forEach((mapping, i) => {
                            tgl_tagihan.push({
                                "tanggal_mulai_tagihan" : mapping.tanggal_mulai_tagihan
                            })
                        });

                        tgl_tagihan.sort((a, b) => {
                            return new Date(a.tanggal_mulai_tagihan) - new Date(b.tanggal_mulai_tagihan);
                        });

                        if(tgl_tagihan!=null){
                            console.log(tgl_tagihan[0]);

                            let tgltext = "Cut of time "+moment(tgl_tagihan[0].tanggal_mulai_tagihan).format('DD-MM-YYYY')+" hingga "+moment(new Date()).format('DD-MM-YYYY');
                            $('.COT').html(tgltext);
                        }


                        console.log(tgl_tagihan);
                        
					}
				}
				save2();
			}

            function showTahunAkademik() {
                axios.get('<?= api_url_core(); ?>api/master/semester/list', {
                    headers: {
                        'Authorization': 'Bearer ' + localStorage.getItem('_private_token')
                    }
                })
                .then(response => {
                    console.log(response.data);

                    $('#tp').empty();

                    // Clear the dropdown before appending options
                    
                    // Map and sort the data
                    tahunAkademikArray = response.data.map(mapping => ({
                        id_ta:mapping.id,
                        tahun_mulai: mapping.tanggal_mulai,
                        tahun_selesai: mapping.tanggal_selesai,
                        tahun_akademik: mapping.tahun_akademik.tahun_akademik,
                        kode_tahun_akademik: mapping.tahun_akademik_id,
                        relatedTagihan: [] // Prepare for merging tagihan data
                    }));

                    tahunAkademikArray.sort((a, b) => {
                        const dateA = new Date(a.tahun_mulai);
                        const dateB = new Date(b.tahun_mulai);
                        return dateA - dateB;
                    });

                    // Append the sorted options to the dropdown
                    tahunAkademikArray.forEach(mapping => {
                        // Add the option to #setTahunAkademik without modifying the text
                        const optionSetTahunAkademik = new Option(mapping.tahun_akademik, mapping.kode_tahun_akademik);
                        $('#setTahunAkademik').append(optionSetTahunAkademik);
                    });

                    console.log("Tahun Akademik Array:", tahunAkademikArray);

                    // Fetch and merge Jenis Tagihan List
                    getAllTagihanList(tahunAkademikArray);

                    getJumlahSiswa();
                    
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                });
            }

            function getAllTagihanList(tahunAkademikArray) {
                let dataArray = []; // Store jenis tagihan data

                $('.putContentHere').html(`<tr><td colspan="20" class="text-center">Loading....</td></tr>`);

                axios.get('<?= api_url_tagihan(); ?>api/tagihan', {
                    headers: {
                        'Authorization': 'Bearer ' + localStorage.getItem('_token')
                    }
                })
                .then(response => {
                    if (response.status === 200) {
                        console.log(response.data.data);
                        // Map the jenis tagihan data
                        dataArray = response.data.data.map(mapping => ({
                            jenis_tagihan: mapping.jenis_tagihan?.name??'0',
                            nama_tagihan: mapping.nama_tagihan,
                            tagihan_all: mapping.tagihan_all,
                            tagihan_belum_lunas:mapping.tagihan_belum_lunas,
                            tagihan_lunas:mapping.tagihan_lunas
                        }));

                        console.log("Jenis Tagihan Array:", dataArray);

                        tahunAkademikArray.forEach(tahun => {
                            // Filter related tagihan
                            const relatedTagihan = dataArray.filter(tagihan => 
                                tagihan.jenis_tagihan.includes(tahun.tahun_akademik) // Match tahun_akademik
                            );

                            // Calculate sums for tagihan_all and tagihan_belum_lunas
                            const sumTagihanAll = relatedTagihan.reduce((sum, tagihan) => sum + parseInt(tagihan.tagihan_all), 0);
                            const sumTagihanBelumLunas = relatedTagihan.reduce((sum, tagihan) => sum + parseInt(tagihan.tagihan_belum_lunas), 0);

                            // Add related tagihan and sums to tahunAkademikArray
                            tahun.relatedTagihan = relatedTagihan;
                            tahun.sumTagihanAll = sumTagihanAll;
                            tahun.sumTagihanBelumLunas = sumTagihanBelumLunas;
                        });

                        console.log("Merged Data with Sums:", tahunAkademikArray);

                        tahunAkademikArray.forEach((tahun, index) => {

                            // Add "Tahun Akademik" before the actual tahun_akademik text for #tp
                            const optionTextTp = `Tahun Akademik ${tahun.tahun_akademik}`;
                            const optionTp = new Option(optionTextTp, tahun.kode_tahun_akademik);

                            // Add the option to #tp with the modified text
                            $('#tp').append(optionTp);

                            console.log("summary : ",tahun.sumTagihanAll,tahun.sumTagihanBelumLunas,tahun.sumTagihanAll);
                            
                            const percentage = tahun.sumTagihanAll > 0 
                            ? ((tahun.sumTagihanAll - tahun.sumTagihanBelumLunas) / tahun.sumTagihanAll) * 100 
                            : 0;
                            const chartId = `chart-${index}`;
                            
                            // Append chart row to the #chart4 container
                            const chartRow = `
                                    <div class="col-md-6">
                                        <div id="${chartId}" style="height: 280px;"></div>
                                        <h6 class="text-center" style="margin:0;padding:0;padding-bottom:25px">${tahun.tahun_akademik}</h6>
                                    </div>
                                `;
                            document.querySelector("#chart4").insertAdjacentHTML("beforeend", chartRow);

                            // Define chart options
                            const options = {
                                chart: {
                                    height: 280,
                                    type: "radialBar",
                                },
                                series: [percentage.toFixed(1)], // Use the calculated percentage
                                colors: ["#20E647"],
                                plotOptions: {
                                    radialBar: {
                                        hollow: {
                                            margin: 0,
                                            size: "70%",
                                            background: "#293450"
                                        },
                                        track: {
                                            dropShadow: {
                                                enabled: true,
                                                top: 2,
                                                left: 0,
                                                blur: 4,
                                                opacity: 0.15
                                            }
                                        },
                                        dataLabels: {
                                            name: {
                                                offsetY: -10,
                                                color: "#fff",
                                                fontSize: "13px"
                                            },
                                            value: {
                                                color: "#fff",
                                                fontSize: "30px",
                                                show: true
                                            }
                                        }
                                    }
                                },
                                fill: {
                                    type: "gradient",
                                    gradient: {
                                        shade: "dark",
                                        type: "vertical",
                                        gradientToColors: ["#87D4F9"],
                                        stops: [0, 100]
                                    }
                                },
                                stroke: {
                                    lineCap: "round"
                                },
                                labels: ["Progress (%)"]
                            };

                            // Render the chart
                            const chart = new ApexCharts(document.querySelector(`#${chartId}`), options);
                            chart.render();
                        });

                        $('#tp').trigger('change');
                    }
                })
                .catch(error => {
                    console.error('Error fetching jenis tagihan:', error);
                });
            }

            $('#tp').on('change', function () {
                const selectedKode = parseInt($(this).val()); // Convert selected value to a number

                // Find the selected Tahun Akademik
                const selectedTahun = tahunAkademikArray.find(tahun => tahun.id_ta === selectedKode);
                console.log(selectedKode,selectedTahun);

                if (selectedTahun) {
                    console.log('Selected Tahun Akademik:', selectedTahun.tahun_akademik);

                    // Initialize an array with 12 months and set default values
                    const months = [
                        { name: 'Januari', tagihan_all: 0, percentage: 0 },
                        { name: 'Februari', tagihan_all: 0, percentage: 0 },
                        { name: 'Maret', tagihan_all: 0, percentage: 0 },
                        { name: 'April', tagihan_all: 0, percentage: 0 },
                        { name: 'Mei', tagihan_all: 0, percentage: 0 },
                        { name: 'Juni', tagihan_all: 0, percentage: 0 },
                        { name: 'Juli', tagihan_all: 0, percentage: 0 },
                        { name: 'Agustus', tagihan_all: 0, percentage: 0 },
                        { name: 'September', tagihan_all: 0, percentage: 0 },
                        { name: 'Oktober', tagihan_all: 0, percentage: 0 },
                        { name: 'November', tagihan_all: 0, percentage: 0 },
                        { name: 'Desember', tagihan_all: 0, percentage: 0 }
                    ];

                    // Place tagihan in the correct month
                    selectedTahun.relatedTagihan.forEach(tagihan => {
                        months.forEach((month, index) => {
                            if (tagihan.jenis_tagihan.includes(month.name)) {
                                months[index].tagihan_all += parseInt(tagihan.tagihan_all);
                            }
                        });
                    });

                    console.log(selectedTahun);

                    // Calculate total tagihan_all
                    const totalTagihanAll = months.reduce((sum, month) => sum + month.tagihan_all, 0);

                    // Calculate percentages for each month
                    months.forEach(month => {
                        month.percentage = totalTagihanAll > 0 
                            ? ((month.tagihan_all / totalTagihanAll) * 100).toFixed(2) // Rounded to 2 decimal places
                            : 0;
                    });

                    console.log('Monthly Data with Percentages:', months);

                }
            });



            
        </script>


        