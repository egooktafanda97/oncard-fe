<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<div class="page-wrapper">
			<div class="page-content">
				<div class="row">
					<div class="col-12">
						<div class="card radius-10 w-100" style="overflow:hidden;">
							<div class="row" >
								<img src="<?=base_url();?>assets_oncard/images/banner_new.webp" style="width:100%; object-fit:cover;object-position:center;height:200px;"/>
							</div>
						</div>
					</div>

                    <div class="col-12">
                        <div class="card radius-10 w-100">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6 col-12">
                                        <div class="mb-3" style="flex:1; justify-content:space-between; display:flex; flex-direction:row;">
                                            <h4 style="font-weight:900;">Pendapatan per Instansi</h4>
                                            <div>
                                                <input type="date" id="datePicker" class="form-control" name="datePicker" style="width:150px;" onchange="handleDateChange(this)">
                                            </div>
                                        </div>

                                        <div class="putcontenthere "></div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="mb-3" style="flex:1; justify-content:space-between; display:flex; flex-direction:row;">
                                            <h4 style="font-weight:900;">Total Pendapatan</h4>
                                            <div>
                                                <h3 style="font-weight:900;" class="totaltrxcls text-dongker">Rp0</h3>
                                            </div>
                                        </div>    

                                        <div class="card" style="box-shadow:0px 9px 30px rgba(0,0,0,0.1)">
                                            <div class="card-body">
                                            <h5 style="font-weight:700;"><i class="bx bxs-circle text-success me-2"></i>Transaksi | Free Admin</h5>
                                            <div id="chart2"></div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
				</div>
				
				
			</div>
		</div>

        <script type="text/javascript">

			let invoiceDataArray = [];
			let NewInvoiceDataArray = [];
			let beaAdmin = 0;
			let graphtot = 0;
            let totaltrx = 0;
            let graph1modal = [];

            let chart;

            let datetoday = '';
            $(document).ready(function () {
                getAkun();

                const today = new Date();
                datetoday = today.toISOString().split('T')[0];
				
                // showData(datetoday);

                $('.box1val').attr('style','display:none;');
                $('.box10val').attr('style','display:none;');

            });

            function handleDateChange(input) {
                const selectedDate = input.value; // Get the value in YYYY-MM-DD format
                showData(selectedDate);          // Call the showData function with the selected date
            }
            function getAkun(){
				const save2 = async () => {
					const posts2 = await axios.get('<?= api_url(); ?>api/v1/account/auth', {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {
						console.log(err.response);
					});
			
					if (posts2.status == 200) {
                        console.log(posts2.data.data);
                        let statusInstansi = '';
                        if(posts2.data.data[0].status.status=='Active'){
                            statusInstansi = `Verified <i class="bx bx-badge-check text-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Kantin ini telah secara resmi bergabung dengan sistem Oncard.id" ></i>`;
                        }else {
                            statusInstansi = 'Not set';
                        }
                        $('.box1val').html(posts2.data.data[0].customers_name);
                        $('.box1val2').html(statusInstansi);
                        $('.box2val').html(posts2.data.data[0].instansi.nama);
                        $('.box4val').html(formatRupiah(posts2.data.data[0].balance));

						$('[data-bs-toggle="tooltip"]').tooltip();

						$('.getSaldoInstansiCache').html("Rp"+formatRupiah(posts2.data.data[0].balance));
                    }
				}
				save2();
			}
			
            
            function showData(str){
				let num = 0;
                totaltrx = 0;
                graph1modal = [];
				let tableColumn = '';
				tableColumn += `<tr><td colspan="7" class="text-center">Loading...</td></tr>`;
				$('.putcontenthere').html(tableColumn);
                
                $('.totaltrxcls').html("Loading...");

                console.log('tgl', datetoday);
				
				const save2 = async () => {
					const posts2 = await axios.get('<?=base_url(); ?>CPanel_Admin/getDataAgensiTrxToday/'+str).catch((err) => {
						console.log(err.response);
					});
			
					if (posts2.status == 200) {

                        console.log(posts2.data.data);
                            let totals = 0;

                            let arrays = [];
                            arrays.push(...posts2.data.data);
                            console.log(arrays);

                            let datePicker = $('#datePicker').val();

                            arrays.sort((a, b) => b.muted - a.muted); // Sort by `muted` descending

                            let cot = moment(new Date()).format('DD-MM-YYYY, HH:mm:ss');
                            tableColumn =`
                            <div class="row table-responsive">
                                <div class="col-lg-6 col-12">
                                    <div class="alert alert-dark text-center">Data untuk tanggal ${(datePicker=='')?'hari ini':moment(datePicker).format('DD-MM-YYYY')}</div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="alert alert-info text-center">Time load : ${cot} WIB</div>
                                </div>
                            </div>
                            <table class="table table-borderless">`;
							arrays.map((mapping,i)=>{

                                num += 1;

                                totaltrx+=parseInt(mapping.muted??'0');

                                let jmltrx = parseInt(mapping.muted2??'0')/7;
                                let possibility_free_adm = parseInt(mapping.muted)/250;
                                let diffUs = jmltrx-possibility_free_adm;
                                
                                graph1modal.push({
                                    'instansi_name' : mapping.nama,
                                    'instansi_uname' : mapping.username,
                                    'count_trx_today' : jmltrx,
                                    'total_trx_today' : mapping.muted??'0',
                                    'count_trx_today_null' : diffUs,
                                })

                                tableColumn +=`
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="ms-2">
                                                    <h6 class="mb-0 font-14">${num}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="white-space: normal !important;max-width:200px;min-width:200px;">
                                        <img src="<?=base_url();?>app/assets/users/foto/${mapping.foto}" style="width:30px; height:30px; object-fit:cover;border-radius:5px;margin-bottom:20px;float:left; margin-right:10px;"/>
                                        ${mapping.nama}
                                        
                                        </td>
                                        <td valign="right" style="word-wrap: break-word!important;min-width: 160px;max-width: 160px;white-space: normal !important;font-weight:500;text-align:right;">
                                        ${formatRupiah(jmltrx.toString())} Transaksi <br/>
                                        <small style="background:#666; color:#fff; padding:4px; border-radius:3px; font-size:10px;">${formatRupiah(diffUs.toString())} trx dengan free admin</small>
                                        
                                        </td>
                                        <td valign="right" style="word-wrap: break-word!important;min-width: 160px;max-width: 160px;white-space: normal !important;font-weight:900;text-align:right;">Rp${formatRupiah(mapping.muted??'0')}</td>
                                        
                                    </tr>
                                `;
							});

                            tableColumn+='</table>';
							
                        $('.putcontenthere').html(tableColumn);

                        console.log("trx",graph1modal);
                        $('.totaltrxcls').html("Rp"+formatRupiah(totaltrx.toString()));

                        runChartRender(graph1modal);
                        
							
					}
				}
				
				save2();
				
				
			}

            function runChartRender(graph1modal){
                // Preparing data for ApexCharts
                const categories = graph1modal.map(item => item.instansi_uname); // x-axis categories
                
                // Chart 2 - Stacked bar for count_trx_today and count_trx_today_null
                const chart2Options = {
                    chart: {
                        type: 'bar',
                        stacked: true,
                        height: 350
                    },
                    plotOptions: {
                        bar: {
                            horizontal: true,
                            dataLabels: {
                                position: 'center'
                            }
                        }
                    },
                    dataLabels: {
                        enabled: true,
                        formatter: function (val) {
                            return val.toLocaleString(); // Format numbers with commas
                        }
                    },
                    series: [
                        {
                            name: "Transaksi",
                            data: graph1modal.map(item => item.count_trx_today)
                        },
                        {
                            name: "Free Admin",
                            data: graph1modal.map(item => item.count_trx_today_null)
                        }
                    ],
                    xaxis: {
                        categories: categories
                    },
                    legend: {
                        position: 'top'
                    },
                    fill: {
                        opacity: 1
                    }
                };

                // Render both charts
                const chart2 = new ApexCharts(document.querySelector("#chart2"), chart2Options);

                
                chart2.render();
            }
        </script>