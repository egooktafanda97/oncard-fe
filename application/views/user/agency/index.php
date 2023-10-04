<div class="page-wrapper">
			<div class="page-content">
				<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
                   <div class="col">
					 <div class="card radius-10 border-start border-0 border-3 border-info">
						<div class="card-body">
							<div class="d-flex align-items-center">
								<div>
									<p class="mb-0 text-secondary">Nama Instansi</p>
									<h4 class="my-1 text-primary box1val" style="font-size:20px!important;"><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></h4>
                                    <p class="mb-0 font-13 box1val2">-</p>
								</div>
							</div>
						</div>
					 </div>
				   </div>
				   <div class="col">
					<div class="card radius-10 border-start border-0 border-3 border-danger">
					   <div class="card-body">
						   <div class="d-flex align-items-center">
							   <div>
								   <p class="mb-0 text-secondary">Total Siswa</p>
								   <h4 class="my-1 text-danger box2val"><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></h4>
								   <p class="mb-0 font-13 box2val2">-</p>
							   </div>
							   <div class="widgets-icons-2 rounded-circle bg-gradient-bloody text-white ms-auto" style="width:50px!important;height:50px!important;"><i class='bx bxs-group'></i>
							   </div>
						   </div>
					   </div>
					</div>
				  </div>
				  <div class="col">
					<div class="card radius-10 border-start border-0 border-3 border-success">
					   <div class="card-body">
						   <div class="d-flex align-items-center">
							   <div>
								   <p class="mb-0 text-secondary">Total Kantin</p>
								   <h4 class="my-1 text-success box3val"><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></h4>
								   <p class="mb-0 font-13 box3val2"><a href="<?=base_url().$function;?>/Merchant">Lihat daftar kantin</a></p>
							   </div>
							   <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto"><i class='bx bxs-bar-chart-alt-2' ></i>
							   </div>
						   </div>
					   </div>
					</div>
				  </div>
				  <div class="col">
					<div class="card radius-10 border-start border-0 border-3 border-warning">
					   <div class="card-body">
						   <div class="d-flex align-items-center">
							   <div>
								   <p class="mb-0 text-secondary">Saldo Akun</p>
								   <h4 class="my-1 text-warning box4val"><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></h4>
								   <p class="mb-0 font-13"><a href="#/">Total saldo keseluruhan.</a></p>
							   </div>
							   <div class="widgets-icons-2 rounded-circle bg-gradient-blooker text-white ms-auto"><i class='bx bxs-wallet'></i>
							   </div>
						   </div>
					   </div>
					</div>
				  </div> 
				</div><!--end row-->

				<div class="row">
					<div class="col-12">
						<div class="card radius-10 w-100" style="overflow:hidden;">
							<div class="row" >
								<img src="<?=base_url();?>assets_oncard/images/bg_new.webp" style="width:100%; object-fit:cover;object-position:center;height:200px;"/>
							</div>
						</div>
					</div>
				</div>
				
				<div class="row row-cols-1 row-cols-lg-3">
						 <div class="col d-flex">
                           <div class="card radius-10 w-100">
							   <div class="card-body">
								<p class="font-weight-bold mb-1 text-secondary">Grafik Transaksi</p>
								<div class="d-flex align-items-center mb-4">
									<div>
										<h4 class="mb-0 totalTransaksiGrafik">0</h4>
									</div>
								</div>
								<div class="chart-container-0">
									<canvas id="chart3"></canvas>
								</div>

								<p class="text-sm font-weight-bold mt-3 text-secondary"><i class="text-primary bx bx-info-square" data-bs-toggle="tooltip" data-bs-placement="top" title="7 hari terakhir seluruh transaksi yang terjadi dari semua kantin"></i> Data dari 7 hari terakhir</p>
							   </div>
							   
						   </div>
						 </div>
						 <div class="col d-flex">
							<div class="card radius-10 w-100">
								<div class="card-header bg-transparent">
									<div class="d-flex align-items-center">
										<div>
											<h6 class="mb-0">Sebaran Saldo</h6>
										</div>
										
									</div>
								</div>
								<div class="card-body">
									<div class="chart-container-1">
										<canvas id="chart4"></canvas>
									</div>
								</div>
								<ul class="list-group list-group-flush">
									<li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">Siswa <span class="badge bg-gradient-quepal saldoSiswa rounded-pill">Rp0</span>
									</li>
									<li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">General <span class="badge bg-gradient-quepal saldoGeneral rounded-pill">Rp0</span>
									</li>
									<li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">Merchant <span class="badge bg-gradient-ibiza saldoKantin rounded-pill">Rp0</span>
									</li>
									<li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">Income Sekolah <span class="badge bg-gradient-deepblue saldoInstansi rounded-pill">Rp0</span>
									</li>
									<li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">Income Oncard <span class="badge bg-gradient-bloody saldoOwner rounded-pill">Rp0</span>
									</li>
								</ul>
							</div>
						  </div>
						  <div class="col d-flex">
							<div class="card radius-10 w-100">
								 <div class="card-header bg-transparent">
									<div class="d-flex align-items-center">
										<div>
											<h6 class="mb-0">Saldo Merchant</h6>
										</div>
										
									 </div>
								 </div>
								<div class="card-body">
								   <div class="putListKantinSaldoHere">
								   </div>
								   <hr/>
								   <div class="chart-container-4">
										<canvas id="chart5"></canvas>
									</div>
								</div>
							</div>
						  </div>
					 </div><!--end row-->

                     <div class="row">
                        <div class="col d-flex">
                           <div class="card radius-10 w-100">
							   <div class="card-body">
                                <img src="<?=base_url();?>assets_oncard/images/icons/birthday-illustration.webp" style="width:350px; height:100%; max-height:250px; object-fit:cover;opacity:.2; object-position:center center; position:absolute; bottom:0px; right:5px; border-radius:5px;"/>
								<p class="font-weight-bold mb-1 text-secondary">Ultah Hari Ini</p>
								<div class="d-flex align-items-center mb-4">
									<div>
										<h4 class="mb-0 totalUltah">0</h4>
									</div>
								</div>

                                <div class="row putUltahHere">
                                    
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
			let NewInvoiceDataArrayForGraph2 = [];
			let NewDataArrayForGraph5 = [];
			let arrSebaranSaldo = [];
            let arrUltah = [];
			let beaAdmin = 0;
			let graphtot = 0;
			let saldoOwner = 0;
			let saldTot = 0;
			let saldoKantinTotal = 0;
            let saldoAll = 0;
            $(document).ready(function () {
				getSaldoOwner();
                
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
                        saldoAll=parseInt(saldoOwner);
						getSiswa();

					}
				}
				save2();
			}

			
            function getSiswa(){

				arrSebaranSaldo = [];

				const save2 = async () => {
					const posts2 = await axios.get('<?= api_url(); ?>api/v1/siswa/get-inpaging', {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {
						console.log(err.response);
					});
			
					if (posts2.status == 200) {
                        let jmlData = 0;
                        let jmlDataConnect = 0;
                        let percentage = 0.0;
						let saldo = 0;
                        let jmlUltah = 0;
                        let htmlUltah = '';
                        jmlData = posts2.data.data.length;
                        
                        posts2.data.data.map((mapping,i)=>{
                            if(mapping.accounts.card_id){
                                jmlDataConnect++;
                            }

                            let tglUltahServer = moment(mapping.tanggal_lahir).format('MM-DD');
							let dateToday = moment(new Date()).format('MM-DD');

                            if(tglUltahServer==dateToday){
                                jmlUltah++;

                                let defaultURLFoto = '<?=base_url();?>assets_oncard/images/icons/user.webp';

                                let textTingkat = '';
                                let textNamaA = mapping.nama_lengkap;
                                let textNama = textNamaA.split("-M");
                                if(textNama[1]==='A'){
                                    textTingkat = 'Madrasah Aliyah';
                                }
                                if(textNama[1]==='TS'){
                                    textTingkat = 'Madrasah Tsanawiyah';
                                }

                                htmlUltah +=`
                                <div class="col-lg-3 col-md-6 col-xs-6 col-sm-6 col-12 mb-3">
                                    <div class="row">
                                        <div class="col-2 text-center">
                                            <img src="${(mapping.user.foto=='default.jpg')?defaultURLFoto:`<?=base_url();?>app/assets/users/foto/${mapping.user.foto}`}" style="object-fit:cover; object-position:center; border-radius:100%; width:45px; height:45px;"/>
                                        </div>
                                        <div class="col-10">
                                            <h6 style="font-size:13px;text-transform:uppercase;">${textNama[0]}<br/><font class="text-muted" style="font-weight:normal;">${textTingkat}</font></h6>
                                        </div>
                                    </div>
                                </div>
                                `;
                            }

							saldo += parseInt(mapping.accounts.balance);
                        });

                        percentage = (jmlDataConnect/jmlData)*100;
                        $('.box2val').html(posts2.data.data.length);
                        $('.box2val2').html(formatRupiah(jmlDataConnect.toString())+"/"+formatRupiah(jmlData.toString())+"("+percentage+"%) akun terkoneksi.");

						
						arrSebaranSaldo.push(saldo);
                        saldoAll+=saldo;

						$('.saldoSiswa').html("Rp"+formatRupiah(saldo.toString()));
						$('.totalUltah').html(formatRupiah(jmlUltah.toString())+' orang');
						$('.putUltahHere').html(htmlUltah);
						
						getGeneral();
                    }
				}
				save2();
			}

			function getGeneral(){
			
				const save2 = async () => {
					const posts2 = await axios.get('<?= api_url(); ?>api/v1/general/get-inpaging', {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {
						console.log(err.response);
					});
			
					if (posts2.status == 200) {
                        let saldo = 0;
                        
                        posts2.data.data.map((mapping,i)=>{
                            saldo += parseInt(mapping.accounts.balance);
                        });

						arrSebaranSaldo.push(saldo);
						$('.saldoGeneral').html("Rp"+formatRupiah(saldo.toString()));

                        saldoAll+=saldo;
						
						getKantin();
                    }
				}
				save2();
			}

			function getKantin(){
				const save2 = async () => {
					const posts2 = await axios.get('<?= api_url(); ?>api/v1/kantin', {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {
						console.log(err.response);
					});
			
					if (posts2.status == 200) {
                        $('.box3val').html(posts2.data.data.data.length);

						tableColumn = '';
						let num = 0;
						let saldo = 0;

						if(posts2.data.data.data.length==0){
							tableColumn +=`<tr><td colspan="7" class="text-center">Tidak ada data.</td></tr>`;
							$('.putContentHere').html(tableColumn);return false;
						}
						
						// console.log(posts2.data.data.data);
						posts2.data.data.data.map((mapping,i)=>{

						saldo += parseInt(mapping.accounts.balance);

                        let nmkntn = mapping.nama_kantin;
                        
                        nmkntn = nmkntn.replace("'","");

						NewDataArrayForGraph5.push({
							namaKantin: nmkntn,
							saldoKantin : mapping.accounts.balance
						});

                        
						

						num += 1;
						tableColumn +=`
						<div class="row pb-4">
							<div class="col-12 d-flex">
							<img src="<?=base_url();?>assets/png/canteen_ico.webp" class="me-2" style="width:100%; object-fit:cover;object-position:center;height:35px;width:35px;"/> ${mapping.nama_kantin}<br/>Rp${formatRupiah(mapping.accounts.balance)}
							</div>
						</div>
						`;
						
						});

						
						saldoKantinTotal = saldo;
						
						arrSebaranSaldo.push(saldo);
                        saldoAll+=saldo;
						
					$('.putListKantinSaldoHere').html(tableColumn);
					$('.saldoKantin').html("Rp"+formatRupiah(saldo.toString()));

                    getAkun();

                    }
				}
				save2();
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
                        // console.log(posts2.data.data);
                        let statusInstansi = '';
                        if(posts2.data.data[1].status.status=='Active'){
                            statusInstansi = `Verified <i class="bx bxs-badge-check text-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Instansi ini telah secara resmi bergabung dengan sistem Oncard.id" ></i>`;
                        }else {
                            statusInstansi = 'Not set';
                        }
                        $('.box1val').html(posts2.data.data[1].instansi.nama);
                        $('.box1val2').html(statusInstansi);
                        
                        saldTot = parseInt(posts2.data.data[1].balance);
                        $('.saldoInstansi').html("Rp"+formatRupiah(posts2.data.data[2].balance));

						arrSebaranSaldo.push(parseInt(posts2.data.data[2].balance));

                        saldoAll+=parseInt(posts2.data.data[2].balance);

						$('[data-bs-toggle="tooltip"]').tooltip();

						getTrxBusiness();

						localStorage.removeItem("saldoTerakhir");
						localStorage.setItem("saldoTerakhir", "Rp"+formatRupiah(posts2.data.data[2].balance));
						$('.getSaldoInstansiCache').html(localStorage.getItem("saldoTerakhir"));

                        if(posts2.data.data[0].uid=='1f3ade3e-5a26-4018-8a97-a8a00919ba85'){
                            var ul = document.getElementById("menu");
                            var li = document.createElement("li");
                            li.appendChild(document.createTextNode("Four"));
                            li.setAttribute("id", "element4"); // added line
                            ul.appendChild(li);
                        }

                        console.log('saldoAllLama', formatRupiah(saldoAll.toString()));

                        $('.box4val').html(formatRupiah(saldoAll.toString()));
						

                    }
				}
				save2();
			}

			function getTrxBusiness(){
				
				const save2 = async () => {
					const posts2 = await axios.get('<?= api_url(); ?>api/v1/setting/get-config-trx-business', {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {
						console.log(err.response);
					});
			
					if (posts2.status == 200) {	
						beaAdmin = posts2.data.data[0].admin_fee_total;

						getGraph1();
						
					}

				}
				save2();				
			}
            
			function getGraph1(){
				
				const save2 = async () => {
					const posts2 = await axios.get('<?= api_url(); ?>api/v1/rep/history?type=sell', {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {
						console.log(err.response);
                        filterTabungan = 0;
					});

					let num = 0;

					if (posts2.status == 200) {	
				
						posts2.data.data.data.map((mapping,i)=>{
							
								let totalPayment = parseInt(beaAdmin)+parseInt(mapping.transaction_amount);
								
								graphtot += totalPayment;

								let dateModified = moment(mapping.created_at).format('YYYY-MM-DD');
								// console.log(totalPayment,graphtot);
								invoiceDataArray.push({
									date: dateModified,
									total_payment: totalPayment,
									date_origin: mapping.created_at,
								});
							
						});
						
					}

					$('.totalTransaksiGrafik').html("Rp"+formatRupiah(graphtot.toString()));

					callFilterDateGraph1();

				}
				save2();				
			}
			
			

			function callFilterDateGraph1(){
				function get_date_parts(iso_string) {
				const [year, month, day] = iso_string.split(/\D/g);

				return year+"-"+month+"-"+day;
				}

				let num = 0;
				function group_by_year(arr) {
				return Object.values(
					arr.reduce((a, { date: date_string, total_payment: value, date_origin: date_origin}) => {
						let day = date_string;
						let nameDay = moment(date_origin).format('ddd');
						(a[day]??= { value: 0, label: day, dayname : nameDay, dateOrigin : date_origin}).value += value;
						return a;
					}, {}),
				);
				}

				const grouped_by_year = group_by_year(invoiceDataArray).sort((a, b) => +b.label - +a.label);

				NewInvoiceDataArray = grouped_by_year;
				NewInvoiceDataArray.reverse();


				// console.log(NewInvoiceDataArray);
				setGraph1();
				
			}

			function setGraph1(){
				var ctx = document.getElementById('chart3').getContext('2d');

				var gradientStroke1 = ctx.createLinearGradient(0, 0, 0, 300);
				gradientStroke1.addColorStop(0, '#008cff');
				gradientStroke1.addColorStop(1, 'rgba(22, 195, 233, 0.1)');

				let namaLabel = [];
				let dataValue = [];

				let num = 0;
				$.each(NewInvoiceDataArray, function (i, item) {
					if(num<7){
					namaLabel.push(item.dayname);
					dataValue.push(item.value);
					}num++;
                });
				
				var myChart = new Chart(ctx, {
					type: 'line',
					data: {
					labels: namaLabel,
					datasets: [{
						label: 'Total Transaksi',
						data: dataValue,
						pointBorderWidth: 2,
						pointHoverBackgroundColor: gradientStroke1,
						backgroundColor: gradientStroke1,
						borderColor: gradientStroke1,
						borderWidth: 3
					}]
					},
					options: {
						maintainAspectRatio: false,
						legend: {
						position: 'bottom',
						display:false
						},
						tooltips: {
						displayColors:false,	
						mode: 'nearest',
						intersect: false,
						position: 'nearest',
						xPadding: 10,
						yPadding: 10,
						caretPadding: 10
						}
					}
				});

				setGraph2();
				setGraph3();
			}
			
			function setGraph2(){

				
				arrSebaranSaldo.push(saldoOwner);

                console.log(arrSebaranSaldo);
				let graph2Data = [];
				
				$.each(arrSebaranSaldo, function (i, item) {
					let mtk = (item/saldTot)*100;
					mtk = mtk.toFixed(2)
					graph2Data.push(mtk);
                });

				$('.saldoOwner').html("Rp"+formatRupiah(saldoOwner.toString()));

				var ctx = document.getElementById("chart4").getContext('2d');

				var gradientStroke1 = ctx.createLinearGradient(0, 0, 0, 300);
					gradientStroke1.addColorStop(0, '#42e695');
					gradientStroke1.addColorStop(1, '#3bb2b8');
				var gradientStroke4 = ctx.createLinearGradient(0, 0, 0, 300);
					gradientStroke4.addColorStop(0, '#42e695');
					gradientStroke4.addColorStop(1, '#3bb2b8');
					
				var gradientStroke2 = ctx.createLinearGradient(0, 0, 0, 300);
					gradientStroke2.addColorStop(0, '#ee0979');
					gradientStroke2.addColorStop(1, '#ff6a00');

				var gradientStroke3 = ctx.createLinearGradient(0, 0, 0, 300);
					gradientStroke3.addColorStop(0, '#6a11cb');
					gradientStroke3.addColorStop(1, '#2575fc');
					
				var gradientStroke4 = ctx.createLinearGradient(0, 0, 0, 300);
					gradientStroke4.addColorStop(0, '#f54ea2');
					gradientStroke4.addColorStop(1, '#ff7676');

					var myChart = new Chart(ctx, {
						type: 'pie',
						data: {
						labels: ["Siswa ","General", "Merchant ", "Instansi ","Oncard "],
						datasets: [{
							backgroundColor: [
							gradientStroke1,
							gradientStroke1,
							gradientStroke2,
							gradientStroke3,
							gradientStroke4
							],

							hoverBackgroundColor: [
							gradientStroke1,
							gradientStroke1,
							gradientStroke2,
							gradientStroke3,
							gradientStroke4
							],

							data: graph2Data,
					borderWidth: [1,1, 1, 1,1]
						}]
						},
						
						options: {
							maintainAspectRatio: false,
							cutoutPercentage: 0,
							legend: {
							position: 'bottom',
							display: true,
							labels: {
								boxWidth:8
							}
							},
							tooltips: {
							displayColors:false,
							},
						}
					});

			}
			
			function setGraph3(){

				let graph5DataLabel = [];
				let graph5DataValue = [];
				var coloR = [];
				var dynamicColors = function() {
					var r = Math.floor(Math.random() * 100);
					var g = Math.floor(200);
					var b = Math.floor(Math.random() * 255);
					return "rgb(" + r + "," + g + "," + b + ")";
				};
				
				$.each(NewDataArrayForGraph5, function (i, item) {
					let mtk = (item.saldoKantin/saldoKantinTotal)*100;
					mtk = mtk.toFixed(2)
					
					graph5DataLabel.push(item.namaKantin)
					graph5DataValue.push(mtk);
					
           			coloR.push(dynamicColors());
					
                });

                console.log(graph5DataLabel);

				var ctx = document.getElementById("chart5").getContext('2d');

					var myChart = new Chart(ctx, {
						type: 'pie',
						data: {
						labels: graph5DataLabel,
						datasets: [{
							backgroundColor: coloR,
							hoverBackgroundColor: coloR,
							data: graph5DataValue,
							borderWidth: [1, 1, 1,1]
						}]
						},
						
						options: {
							maintainAspectRatio: false,
							cutoutPercentage: 0,
							legend: {
							position: 'right',
							display: true,
							labels: {
								boxWidth:8
							}
							},
							tooltips: {
							displayColors:false,
							},
						},

					});

			}


            let totalSALDOTOPUPALL = 0;
            let totalSALDOWITHDRAW = 0;


            let totalsaldotopup = 0;
            topuptotal();
            function topuptotal(){

                totalsaldotopup = 0;
                totalSALDOTOPUPALL = 0;

				const save2 = async () => {
					const posts2 = await axios.get('<?= api_url(); ?>api/v1/rep/jurnal?mtype=top_up', {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token'),
                            'paginate' : true
						}
					}).catch((err) => {
						console.log(err.response);
					});
			
					if (posts2.status == 200) {
                        posts2.data.data.map((mapping,i)=>{
                            totalsaldotopup += parseInt(mapping.credit_amount);
                        });

                        console.log("topup", formatRupiah(totalsaldotopup.toString()));

                        totalSALDOTOPUPALL +=totalsaldotopup;
                        wdtotal();
                    }
				}
				save2();
			}
            
            
            let totalsaldowd = 0;
            
            function wdtotal(){

                totalsaldowd = 0;

				const save2 = async () => {
					const posts2 = await axios.get('<?= api_url(); ?>api/v1/rep/jurnal?account_type=business&mtype=withdrawal', {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token'),
                            'paginate' : true
						}
					}).catch((err) => {
						console.log(err.response);
					});
			
					if (posts2.status == 200) {
                        posts2.data.data.map((mapping,i)=>{
                            totalsaldowd += parseInt(mapping.debit_amount);
                        });

                        console.log("wd1", formatRupiah(totalsaldowd.toString()));
                        totalSALDOWITHDRAW +=totalsaldowd;
                        wdtotal2();
                    }
				}
				save2();
			}
            
            
            let totalsaldowd2 = 0;
            
            function wdtotal2(){

                totalsaldowd2 = 0;

				const save2 = async () => {
					const posts2 = await axios.get('<?= api_url(); ?>api/v1/rep/jurnal?account_type=primary&mtype=withdrawal', {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token'),
                            'paginate' : true
						}
					}).catch((err) => {
						console.log(err.response);
					});
			
					if (posts2.status == 200) {
                        posts2.data.data.map((mapping,i)=>{
                            totalsaldowd2 += parseInt(mapping.debit_amount);
                        });

                        console.log("wd2", formatRupiah(totalsaldowd2.toString()));
                        totalSALDOWITHDRAW +=totalsaldowd2;

                        let tttls = totalSALDOTOPUPALL - totalSALDOWITHDRAW;

                        console.log("saldoAllBARU",formatRupiah(tttls.toString()));

                        // $('.box4val').html(formatRupiah(tttls.toString()));
                    }
				}
				save2();
			}


            
        </script>