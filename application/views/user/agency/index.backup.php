<div class="page-wrapper">
			<div class="page-content">
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-3">
                   <div class="col">
					<div class="card radius-10 border-success" style="">
					   <div class="card-body  px-4 py-2" style="">
						   <div class="d-flex align-items-center">
                              <div>
                                <img src="<?=base_url();?>assets_oncard/images/icon_user.png" alt="logo icon" style="width:50px;margin-right:30px; width:50px;object-fit:cover!important;">
                              </div>
							   <div>
								   <p class="mb-0 text-dongker" style="font-weight:800;">Jumlah Siswa</p>
								   <p class="mb-0 font-13 box2val2">-</p>
							   </div>
							   <div class="ms-auto" style="width:auto!important;height:50px!important;">
                               <!-- <i class='bx bxs-group'></i> -->
                               <h4 class="my-1 text-dongker box2val pt-2" style="font-weight:800; font-size:26px!important;"><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></h4>
							   </div>
						   </div>
					   </div>
					</div>
				  </div>
				  <div class="col">
                    <div class="card radius-10 border-success" style="">
					   <div class="card-body  px-4 py-2" style="">
						   <div class="d-flex align-items-center">
                           <div>
                                <img src="<?=base_url();?>assets_oncard/images/icon_merchant.png" alt="logo icon" style="width:50px;margin-right:30px; width:50px;object-fit:cover!important;">
                              </div>
							   <div>
								   <p class="mb-0 text-dongker" style="font-weight:800;">Jumlah Merchant</p>
								   
								   <p class="mb-0 font-13 box3val2"><a href="<?=base_url().$function;?>/Merchant">Lihat daftar merchant</a></p>
							   </div>
							   <div class="ms-auto" style="width:50px!important;height:50px!important;">
                               <h4 class="my-1 text-dongker box3val" style="font-weight:800;font-size:26px!important; padding-top:5px;display:block;"><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></h4>
							   </div>
						   </div>
					   </div>
					</div>
				  </div>
				  <div class="col">
                  <div class="card radius-10 border-success" style="">
					   <div class="card-body  px-4 py-2" style="">
						   <div class="d-flex align-items-center">
                           <div>
                                <img src="<?=base_url();?>assets_oncard/images/icon_rupiah.png" alt="logo icon" style="width:50px;margin-right:30px; width:50px;object-fit:cover!important;">
                              </div>
							   <div>
                               <p class="mb-0 text-dongker" style="font-weight:800;">Jumlah Saldo</p>
								   
								   <p class="mb-0 font-13"><a href="<?=base_url('CPanel_Admin/SebaranSaldo');?>">Sebaran jumlah saldo</a></p>
							   </div>
							   <div class="ms-auto" style="width:auto!important;height:50px!important;">
                                <h4 class="my-1 text-dongker box4val" style="font-weight:800;font-size:26px!important;padding-top:5px;"><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></h4>
							   </div>
						   </div>
					   </div>
					</div>
				  </div> 
				</div><!--end row-->

				<div class="row rowslider" style="display:none;">
					<div class="col-12">
						<div class="card radius-10 w-100" style="overflow:hidden;">
							<div class="row" >
								<!-- <img src="<?=base_url();?>assets_oncard/images/bg_new.webp" style="width:100%; object-fit:cover;object-position:center;height:200px;"/> -->
								<div class="siema">
                                <div><img src="<?=base_url();?>assets_oncard/images/bg_new6.jpg" style="width:100%; object-fit:cover;object-position:center;height:200px;"/></div>
								<div><img src="<?=base_url();?>assets_oncard/images/bg_new4.png" style="width:100%; object-fit:cover;object-position:center;height:200px;"/></div>
								<div><img src="<?=base_url();?>assets_oncard/images/bg_new2.png" style="width:100%; object-fit:cover;object-position:center;height:200px;"/></div>
								<div><img src="<?=base_url();?>assets_oncard/images/bg_new3.png" style="width:100%; object-fit:cover;object-position:center;height:200px;"/></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="row row-cols-1 row-cols-lg-3">
						 <div class="col d-flex">
							<div class="card radius-10 w-100">
								<div class="card-header bg-transparent">
									<div class="d-flex align-items-center">
										<div>
											<h6 class="mb-0 statusTextheader">Loading...</h6>
										</div>
										
									</div>
								</div>
								<div class="card-body">

									<div class="bxnx">
										<button type="button" class="btn btn-outline-secondary" style="display:block;margin:auto;" onclick="getGraph1('totaltransaksi');">Tampilkan grafik dan data status hari ini</button>
									</div>

									<div class="chart-container-1 chart3DIV">
										<canvas id="chart3"></canvas>
									</div>
									<div class="row rowrowrow">
										
									</div>
								</div>
								<ul class="list-group list-group-flush">
									<li class="list-group-item d-flex bg-transparent justify-content-between align-items-center"><b>Status Hari Ini</b>
									</li>
									<li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">Transaksi <span class="badge bg-gradient-quepal transaksiToday rounded-pill">0</span>
									</li>
									<li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">Nominal Transaksi <span class="badge bg-gradient-quepal uangBeralihToday rounded-pill">Rp0</span>
									</li>
									<li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">Income Sekolah <span class="badge bg-gradient-deepblue saldoInstansiToday rounded-pill">Rp0</span>
									</li>
									<li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">Income Oncard <span class="badge bg-gradient-bloody saldoOwnerToday rounded-pill">Rp0</span>
									</li>
								</ul>
							</div>
						 </div>
						 <div class="col d-flex">
							<div class="card radius-10 w-100">
								<div class="card-header bg-transparent">
									<div class="d-flex align-items-center">
										<div>
											<h6 class="mb-0">Sebaran Jumlah Saldo</h6>
										</div>
										
									</div>
								</div>
								<div class="card-body">
									<div class="bxnx">
										<button type="button" class="btn btn-outline-secondary" style="display:block;margin:auto;" onclick="getGraph1('totaltransaksi');">Tampilkan grafik</button>
									</div>
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
								   <div class="">

                                   <swiper-container class="mySwiper putListKantinSaldoHere" init="false">

                                    </swiper-container>

								   </div>

								   <hr/>
								   <div class="bxnx">
										<button type="button" class="btn btn-outline-secondary" style="display:block;margin:auto;" onclick="getGraph1('totaltransaksi');">Tampilkan grafik</button>
									</div>
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

		<script src="https://pawelgrzybek.github.io/siema/assets/siema.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>


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

            const swiperEl = document.querySelector('swiper-container')

            const params = {
            injectStyles: [`
            .swiper-pagination-bullet {
                margin-top:25px;
                width: 20px;
                height: 20px;
                text-align: center;
                line-height: 20px;
                font-size: 12px;
                color: #000;
                opacity: 1;
                background: rgba(0, 0, 0, 0.2);
            }

            .swiper-pagination-bullet-active {
                color: #fff;
                background: #007aff;
            }
            `],
            pagination: {
                clickable: true,
                renderBullet: function (index, className) {
                return '<span class="' + className + '">' + (index + 1) + "</span>";
                },
            },
            }

            Object.assign(swiperEl, params)

            swiperEl.initialize();
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
                        $('.box2val').html("<font class='text-dongker'>"+jmlDataConnect.toString()+"</font>"+"<font style='font-size:13px; font-weight:450;'> / "+formatRupiah(jmlData.toString())+"</font>");
                        $('.box2val2').html(percentage+"% terkoneksi kartu");

						
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
							'Authorization': 'Bearer ' + localStorage.getItem('_token'),
                            'nopaginate' : true
						}
					}).catch((err) => {
						console.log(err.response);
					});
			
					if (posts2.status == 200) {
                        $('.box3val').html(posts2.data.data.length);

						tableColumn = '';
						let num = 0;
						let saldo = 0;

                        let kantinArray = [];
                        let result = [];

						if(posts2.data.data.length==0){
							tableColumn +=`<tr><td colspan="7" class="text-center">Tidak ada data.</td></tr>`;
							$('.putContentHere').html(tableColumn);return false;
						}
						
						// console.log(posts2.data.data.data);
						posts2.data.data.map((mapping,i)=>{

						saldo += parseInt(mapping.accounts.balance);

                        let nmkntn = mapping.nama_kantin;

                        kantinArray.push({
                            'namakantin' : mapping.nama_kantin,
                            'saldokantin' : mapping.accounts.balance,
                        });

                        kantinArray.sort((a, b) => b.saldokantin - a.saldokantin); // ordered desc by saldokantin
                        nmkntn = nmkntn.replace("'","");

						NewDataArrayForGraph5.push({
							namaKantin: nmkntn,
							saldoKantin : mapping.accounts.balance
						});

                        
						});

						
						saldoKantinTotal = saldo;
						
						arrSebaranSaldo.push(saldo);
                        saldoAll+=saldo;



                        for (let i = 0; i < kantinArray.length; i += 10) {
                            result.push(kantinArray.slice(i, i + 10));
                        }
                        result.forEach((chunk, index) => {
                            tableColumn += `<swiper-slide>`;
                            chunk.forEach((item) => {
                                num += 1;
                                tableColumn +=`
                                
                                <div class="row pb-2" style="font-size:12px!important;">
                                    <div class="col-12" style="display:inline-block;">
                                    <img src="<?=base_url();?>assets/png/shop.png" class="me-2" style="width:100%; object-fit:cover;object-position:center;height:35px;width:35px;padding:5px;"/> ${item.namakantin}<font style="float:right!important;margin-top:7px!important;">Rp${formatRupiah(item.saldokantin)}</font>
                                    </div>
                                </div>
                                
                                `;
                                // You can add any additional actions here for each item
                            });
                            tableColumn+=`</swiper-slide>`;
                        });
                        console.log(result);
						
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
                        // let statusInstansi = '';
                        // if(posts2.data.data[1].status.status=='Active'){
                        //     // statusInstansi = `Verified <i class="bx bxs-badge-check text-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Instansi ini telah secara resmi bergabung dengan sistem Oncard.id" ></i>`;
                        // }else {
                        //     statusInstansi = 'Not set';
                        // }
                        // $('.box1val').html(posts2.data.data[1].instansi.nama);
                        // $('.box1val2').html(statusInstansi);

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