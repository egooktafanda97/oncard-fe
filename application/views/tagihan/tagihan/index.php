<div class="page-wrapper">
			<div class="page-content">
				<div class="row">
                   <div class="col">
					 <div class="card radius-1">
						<div class="card-body">
							<div class="d-flex align-items-center">
								<div>
									<p class="mb-0 text-secondary">Nama Instansi</p>
									<h4 class="my-1 text-primary box1val" style="font-size:20px!important;"><?=$_instansi_name;?></h4>
                                    <p class="mb-0 font-13 box1val2">
                                        Verified <i class="bx bxs-badge-check text-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Instansi ini telah secara resmi bergabung dengan sistem Oncard.id" ></i>
                                    </p>
								</div>
							</div>
						</div>
					 </div>
				   </div>
				  </div>
				</div><!--end row-->

			</div>
		</div>

		<script src="https://pawelgrzybek.github.io/siema/assets/siema.min.js"></script>

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

                $('.rowslider').attr('style','display:block');

                const mySiema = new Siema({
			    easing: "cubic-bezier(.17,.67,.32,1.34)" });
                
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
                        percentage = percentage.toFixed(2);
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
						<div class="row pb-2" style="font-size:12px!important;">
							<div class="col-12" style="display:inline-block;">
							<img src="<?=base_url();?>assets/png/shop.png" class="me-2" style="width:100%; object-fit:cover;object-position:center;height:35px;width:35px;padding:5px;"/> ${mapping.nama_kantin}<font style="float:right!important;margin-top:7px!important;">Rp${formatRupiah(mapping.accounts.balance)}</font>
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

						// getGraph1('totaltransaksi');
						
					}

				}
				save2();				
			}
            
			function getGraph1(str){

				$('.bxnx').remove();

				$('.statusTextheader').html('Loading...');
				$('.chart3DIV').html(`Sedang memproses...<br/><small>Kami sedang mempersiapkan datanya, mohon bersabar menunggu.</small>`);

				setGraph2();
				setGraph3();

				let setDaysAgo = 2;

				let dateToday = moment(new Date()).format('YYYY-MM-DD');
				let threedaysAgo = moment().subtract(setDaysAgo, "days").format('YYYY-MM-DD');
				let totalTransaksi = 0;
				let totalUang = 0;
				let totalDistribusiInstansi = 0;
				let totalDistribusiOncard = 0;

				
				
				const save2 = async () => {
					const posts2 = await axios.get('<?= api_url(); ?>api/v1/rep/jurnal?date_from='+dateToday+'&date_to='+dateToday, {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token'),
							'paginate' : true,
						}
					}).catch((err) => {
						console.log(err.response);
                        filterTabungan = 0;
					});

					let num = 0;

					if (posts2.status == 200) {	

						console.log("fees",posts2.data.data);
				
						posts2.data.data.map((mapping,i)=>{


							// console.log("trx",mapping.account.account_number,accountNumberBisnisX)

							if(mapping.description=='shopping transactions' && mapping.management_type.name_type=='sell'){
								
								totalUang+= parseInt(mapping.credit_amount);
							}
							
							if(mapping.account.account_number==accountNumberBisnisX && mapping.description=="admin fee"){
								totalDistribusiInstansi+= parseInt(mapping.credit_amount);
								totalTransaksi++;
							}
							if((mapping.description=="debit admin fee agency transactions")){
								totalDistribusiInstansi+= parseInt(mapping.credit_amount);
							}

							if(mapping.account.account_number!=accountNumberBisnisX && mapping.description=="admin fee"){
								totalDistribusiOncard+= parseInt(mapping.credit_amount);
							}
							if((mapping.description=="debit admin fee owner transactions")){
								totalDistribusiOncard+= parseInt(mapping.credit_amount);
							}
						
							
						});
						
					}

					$('.transaksiToday').html(formatRupiah(totalTransaksi.toString())+" kali");
					$('.uangBeralihToday').html("Rp"+formatRupiah(totalUang.toString()));
					$('.saldoInstansiToday').html("Rp"+formatRupiah(totalDistribusiInstansi.toString()));
					$('.saldoOwnerToday').html("Rp"+formatRupiah(totalDistribusiOncard.toString()));

					// callFilterDateGraph1();

					

				}
				save2();				
				
				
				const save3 = async () => {
					const posts2 = await axios.get('<?= api_url(); ?>api/v1/rep/jurnal?mtype=buy&date_from='+threedaysAgo+'&date_to='+dateToday, {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token'),
							'paginate' : true
						}
					}).catch((err) => {
						console.log(err.response);
                        filterTabungan = 0;
					});

					let num = 0;

					if (posts2.status == 200) {	

						$('.statusTextheader').html('Loading...');
						$('.chart3DIV').html(`Sedang memproses...`);

						invoiceDataArray = [];

						// console.log(posts2.data.data);
				
						posts2.data.data.map((mapping,i)=>{


							let totalPayment = parseInt(beaAdmin)+parseInt(mapping.debit_amount);
								
							graphtot += totalPayment;

							let mmm = 0;

							if(str=='totaltransaksi'){
								if(mapping.management_type.name_type=="buy"){
									mmm = 1;
								}
								$('.statusTextheader').html('Total Transaksi dalam '+(setDaysAgo+1)+' hari terakhir.');

								let dateModified = moment(mapping.created_at).format('YYYY-MM-DD');
								let existingInvoice = invoiceDataArray.find(invoice => invoice.invoice_number === mapping.invoice);

								if (!existingInvoice) {
									invoiceDataArray.push({
										invoice_number: mapping.invoice,
										date: dateModified,
										total_payment: mmm,
										date_origin: mapping.created_at,
									});
								}
								
							}else if(str=='uangberalih'){
								if(mapping.management_type.name_type=="buy"){
									mmm = parseInt(mapping.credit_amount);
								}
								$('.statusTextheader').html('Nominal Transaksi dalam '+(setDaysAgo+1)+' hari terakhir.');

								let dateModified = moment(mapping.created_at).format('YYYY-MM-DD');
								invoiceDataArray.push({
									invoice_number: mapping.invoice,
									date: dateModified,
									total_payment: mmm,
									date_origin: mapping.created_at,
								});
								
							}
							
						});

						$('.chart3DIV').html(`<canvas id="chart3"></canvas>`);

						callFilterDateGraph1(str);

						$('.rowrowrow').html(`
						<div class="col-6">
							<button type="button" onclick="getGraph1('totaltransaksi');" class="btn btn-sm btn-outline-primary" style="display:block;width:100%;">Total Transaksi</button>
						</div>
						<div class="col-6">
							<button type="button" onclick="getGraph1('uangberalih');" class="btn btn-sm btn-outline-primary" style="display:block;width:100%;">Nominal Transaksi</button>
						</div>
						`);
						
					}
				}
				save3();				
			}

			function callFilterDateGraph1(str){
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
				setGraph1(str);
				// setGraph2();
				// setGraph3();
				
			}

			function setGraph1(str){
				var ctx = document.getElementById('chart3').getContext('2d');

				var gradientStroke1 = ctx.createLinearGradient(0, 0, 0, 300);
				gradientStroke1.addColorStop(0, '#008cff');
				gradientStroke1.addColorStop(1, 'rgba(22, 195, 233, 0.1)');

				if(str=='totaltransaksi'){
					str = 'Total transaksi';
				}else if(str=='uangberalih'){
					str = 'Nominal Transaksi';
				}

				let namaLabel = [];
				let dataValue = [];

				let num = 0;
				$.each(NewInvoiceDataArray, function (i, item) {
					if(num<7){
					namaLabel.push(item.dayname);
					if(str=='uangberalih'){
						dataValue.push(formatRupiah(item.value));
					}else {
						dataValue.push(item.value);
					}
					}num++;
                });
				
				var myChart = new Chart(ctx, {
					type: 'line',
					data: {
					labels: namaLabel,
					datasets: [{
						label: str,
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
							caretPadding: 10,
							callbacks: {
								label: function(context) {
									let label = str;
									let val = context.yLabel;

									
									if (label) {
										label += ': ';
									}
									if (context.yLabel !== null) {
										label += formatRupiah(val.toString());
									}
									return label;
								}
							}
						}
					}
				});

				
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

				// $('.saldoOwner').html("Rp"+formatRupiah(saldoOwner.toString()));

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


            // let totalSALDOTOPUPALL = 0;
            // let totalSALDOWITHDRAW = 0;


            // let totalsaldotopup = 0;
            // topuptotal();
            // function topuptotal(){

            //     totalsaldotopup = 0;
            //     totalSALDOTOPUPALL = 0;

			// 	const save2 = async () => {
			// 		const posts2 = await axios.get('<?= api_url(); ?>api/v1/rep/jurnal?mtype=top_up', {
			// 			headers: {
			// 				'Authorization': 'Bearer ' + localStorage.getItem('_token'),
            //                 'paginate' : true
			// 			}
			// 		}).catch((err) => {
			// 			console.log(err.response);
			// 		});
			
			// 		if (posts2.status == 200) {
            //             posts2.data.data.map((mapping,i)=>{
            //                 totalsaldotopup += parseInt(mapping.credit_amount);
            //             });

            //             console.log("topup", formatRupiah(totalsaldotopup.toString()));

            //             totalSALDOTOPUPALL +=totalsaldotopup;
            //             wdtotal();
            //         }
			// 	}
			// 	save2();
			// }
            
            
            // let totalsaldowd = 0;
            
            // function wdtotal(){

            //     totalsaldowd = 0;

			// 	const save2 = async () => {
			// 		const posts2 = await axios.get('<?= api_url(); ?>api/v1/rep/jurnal?account_type=business&mtype=withdrawal', {
			// 			headers: {
			// 				'Authorization': 'Bearer ' + localStorage.getItem('_token'),
            //                 'paginate' : true
			// 			}
			// 		}).catch((err) => {
			// 			console.log(err.response);
			// 		});
			
			// 		if (posts2.status == 200) {
            //             posts2.data.data.map((mapping,i)=>{
            //                 totalsaldowd += parseInt(mapping.debit_amount);
            //             });

            //             console.log("wd1", formatRupiah(totalsaldowd.toString()));
            //             totalSALDOWITHDRAW +=totalsaldowd;
            //             wdtotal2();
            //         }
			// 	}
			// 	save2();
			// }
            
            
            // let totalsaldowd2 = 0;
            
            // function wdtotal2(){

            //     totalsaldowd2 = 0;

			// 	const save2 = async () => {
			// 		const posts2 = await axios.get('<?= api_url(); ?>api/v1/rep/jurnal?account_type=primary&mtype=withdrawal', {
			// 			headers: {
			// 				'Authorization': 'Bearer ' + localStorage.getItem('_token'),
            //                 'paginate' : true
			// 			}
			// 		}).catch((err) => {
			// 			console.log(err.response);
			// 		});
			
			// 		if (posts2.status == 200) {
            //             posts2.data.data.map((mapping,i)=>{
            //                 totalsaldowd2 += parseInt(mapping.debit_amount);
            //             });

            //             console.log("wd2", formatRupiah(totalsaldowd2.toString()));
            //             totalSALDOWITHDRAW +=totalsaldowd2;

            //             let tttls = totalSALDOTOPUPALL - totalSALDOWITHDRAW;

            //             console.log("saldoAllBARU",formatRupiah(tttls.toString()));

            //             // $('.box4val').html(formatRupiah(tttls.toString()));
            //         }
			// 	}
			// 	save2();
			// }


            
        </script>