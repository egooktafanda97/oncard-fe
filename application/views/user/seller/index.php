<div class="page-wrapper">
			<div class="page-content">
				<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
                   <div class="col">
					 <div class="card radius-10 border-start border-0 border-3 border-info">
						<div class="card-body">
							<div class="d-flex align-items-center">
								<div>
									<p class="mb-0 text-secondary">Nama Kantin</p>
									<h4 class="my-1 text-primary box1valxx" style="font-size:20px!important;"><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></h4>
                                    <p class="mb-0 font-13 box1val2xx">-</p>
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
								   <p class="mb-0 text-secondary">Nama Instansi</p>
								   <h4 class="my-1 text-danger box2val" style="font-size:20px!important;"><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></h4>
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
								   <p class="mb-0 text-secondary">Total Produk</p>
								   <h4 class="my-1 text-success box3val"><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></h4>
								   <p class="mb-0 font-13 box3val2"><a href="<?=base_url().$function;?>/Produk">Lihat daftar produk</a></p>
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
								   <p class="mb-0 font-13 box4val2"><a href="#/">Lihat rincian saldo</a></p>
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
								<img src="<?=base_url();?>assets_oncard/images/banner_new.webp" style="width:100%; object-fit:cover;object-position:center;height:200px;"/>
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
            $(document).ready(function () {
                getAkunTT();
				getTrxBusiness();
                getProduk();
				// getGraph1();
            });
            function getAkunTT(){
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
                        if(posts2.data.data[1].status?.status=='Active'){
                            statusInstansi = `Verified <i class="bx bx-badge-check text-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Kantin ini telah secara resmi bergabung dengan sistem Oncard.id" ></i>`;
                        }else {
                            statusInstansi = 'Not set';
                        }
                        $('.box1valxx').html(posts2.data.data[1]?.customers_name);
                        $('.box1val2xx').html(statusInstansi);
                        $('.box2val').html(posts2.data.data[1]?.instansi.nama);
                        $('.box4val').html(formatRupiah(posts2.data.data[0].balance??'0'));

						$('[data-bs-toggle="tooltip"]').tooltip();

						$('.getSaldoInstansiCache').html("Rp"+formatRupiah(posts2.data.data[0].balance??'0'));
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
								console.log(totalPayment,graphtot);
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
						beaAdmin = posts2.data.data[0]?.admin_fee_total;
					}

				}
				save2();				
			}
            
            function getProduk(){
				
				const save2 = async () => {
					const posts2 = await axios.get('<?= api_url(); ?>api/v1/produk', {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {
						console.log(err.response);
					});
			
					if (posts2.status == 200) {	
                        if(posts2.data.data.data.length==0){
                            $('.box3val').html('0');
                        }else {
                            $('.box3val').html(posts2.data.data.data.length);
                        }
						
					}

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


				console.log(NewInvoiceDataArray);
				// setGraph1();
			}

        </script>