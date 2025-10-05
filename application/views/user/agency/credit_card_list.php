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
<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Buku Kredit <b class="text-primary"><?=$namakustomer;?></b></div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Daftar / Detail Kredit</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->

                <div class="row">
                    <div class="col-lg-12 col-12">
                        <div class="row">
                            <div class="col-lg-3 col-12">
                                <div class="card">
                                   <div class="card-body">
                                   Saldo Tersedia
                                   <h3 class="saldokredit" ></h3>
                                   <button class="btn btn-sm btn-primary radius-10" onclick="location.href='<?=base_url().$function;?>/general'" style="font-size:11px; padding:3px 10px;" >Isi Saldo</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-9 col-12">
                                <div class="card">
                                    <div class="card-body" style="    background: url(https://static.vecteezy.com/system/resources/previews/009/338/887/original/3d-illustration-credit-card-png.png);
    background-repeat: no-repeat;
    background-position: right;
    background-size: cover;">
                                        <div class="row">
                                            <div class="col-lg-4 col-12 mb-3">
                                                Sisa Kredit
                                                <h3 class="sisakredit text-bloody">Rp0</h3>
                                            </div>
                                            <div class="col-lg-8 col-12">
                                                <div class="card radius-30 bg-warning" style="    box-shadow: 3px 5px 0px rgba(0,0,0,0.5);">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-lg-8 col-12 text-center pt-1 text-white"  style="font-size:16px; text-shadow:1px 1px 0px rgba(0,0,0,.3)">
                                                                Item dipilih <strong class="item_selected">0</strong> | Nominal <strong style="font-size:20px;" class="nominal_selected">0</strong> 
                                                            </div>
                                                            <div class="col-lg-4 col-12 text-center">
                                                                <button class="btn btn-sm btn-success radius-10" onclick="openDialogConfirm();" style="box-shadow: 2px 3px 0px rgba(0,0,0,0.5);">Bayar Sekarang</button>
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
                    </div>
                </div>
			  
				<div class="card mb-5">
					<div class="card-body">
						<div class="d-lg-flex align-items-center mb-4 gap-3">
							<div class="position-relative">
								<input type="text" id="floatingInput" class="form-control ps-5 radius-30" placeholder="Ketik nama merchant"> <span class="position-absolute top-50 product-show translate-middle-y"><i class="bx bx-search"></i></span>
							</div>
						</div>
						<div class="table-responsive">
						<button class="btn btn-sm btn-outline-primary me-2 mb-3" id="btnSave2PDF" onclick="save2PDF('tabelPrint');" style="border-radius:0px;"><i class="bx bxs-file-export"></i> Export PDF</button>
						<button class="btn btn-sm btn-outline-success me-2 mb-3" onclick="saveToExcel('tabelkantin');" style="border-radius:0px;"><i class="bx bxs-file-export"></i> Export Excel</button>
							<table class="table mb-0 tabelkantin" id="tabelPrint">
								<thead class="table-light">
									<tr>
										<th>No.</th>
										<th>Tanggal</th>
										<th>Invoice ID</th>
										<th>Belanja</th>
										<th>Biaya adm.</th>
										<th>Total Belanja</th>
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
        
        
        <div class="modal fade" id="dialogConfirm" tabindex="-1" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content" style="">
                    <div class="modal-header">
						<h5 class="modal-title">Konfirmasi</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" data-value="="></button>
					</div>
					<div class="modal-body">
                        Pada proses ini akan mengkonfirmasi pembayaran dari user <?=$namakustomer;?> dengan detail sebagai berikut :
                        <table class="table table-borderless">
                            <tr>
                                <td width="44%">Saldo saat ini</td>
                                <td><font class="saldokredit"></font></td>
                            </tr>
                            <tr>
                                <td width="44%">Sisa kredit saat ini</td>
                                <td><font class="sisakredit"></font></td>
                            </tr>
                            <tr>
                                <td width="44%">Total kredit akan dibayar</td>
                                <td><font class="nominal_selected"></font></td>
                            </tr>
                            <tr>
                                <td width="44%">Sisa kredit</td>
                                <td><font class="totalsisakredit"></font></td>
                            </tr>
                        </table>
                        <div class="col-12">
                            <div class="d-grid">
                                <button type="button" id="btnSaveBank" class="btn btn-success" onclick="requestSecret();"><i class="bx bx-check"></i> Lanjutkan</button>
                            </div>
                        </div>
					</div>
				</div>
			</div>
		</div>

        

		<script type="text/javascript">
            let secret_code = '';
			let idsett = '';
            let arrKredit = [];
            let arrKreditos = [];
            let hutang = '';
            let noms = 0;

			$(document).ready(function () {
                showData();

                let saldobalance = <?=$balance;?>;
                $(".saldokredit").html("Rp"+formatRupiah(saldobalance.toString()));

                $("#floatingInput").on("keyup", function() {
					let value = $(this).val().toLowerCase();
					$(".putContentHere tr").filter(function() {
						$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
					});
				});
            });

            function showData(){
				let num = 0;
				let tableColumn = '';
				tableColumn += `<tr><td colspan="12" class="text-center">Loading...</td></tr>`;
				$('.putContentHere').html(tableColumn);
				
				const save2 = async () => {
					const posts2 = await axios.get('<?= api_url(); ?>api/v1/trx/debts-check?card=<?=$cardID;?>', {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {
						console.log(err.response);
					});
			
					if (posts2.status == 200) {
							

							tableColumn = '';

							if(posts2.data.items.length==0){
								tableColumn +=`<tr><td colspan="7" class="text-center">Tidak ada data.</td></tr>`;
								$('.putContentHere').html(tableColumn);return false;
							}

                            hutang = posts2.data.total_hutang;

                            $('.sisakredit').html("Rp"+ formatRupiah(hutang.toString()));
							
							console.log(posts2.data.items);
							posts2.data.items.map((mapping,i)=>{
							num += 1;



							tableColumn +=`
								<tr>
									<td>
										<div class="d-flex align-items-center">
											<div>
												<input class="form-check-input me-3" onchange="funcChangeCheckBox(this.checked? '1': '0','${mapping.invoice}','${mapping.total_payment}');" type="checkbox" value="" aria-label="...">
											</div>
											<div class="ms-2">
												<h6 class="mb-0 font-14">${num}.</h6>
											</div>
										</div>
									</td>
									<td>${moment(mapping.created_at).format('MM-DD-YYYY HH:mm')} WIB</td>
									<td>${mapping.invoice}</td>
									<td>Rp${formatRupiah(mapping.total_spending)}</td>
									<td>Rp${formatRupiah(mapping.admin_fee)}</td>
									<td>Rp${formatRupiah(mapping.total_payment)}</td>
									
								</tr>
							`;
							});
							
						$('.putContentHere').html(tableColumn);
							
					}
				}
				
				save2();
			}

            function funcChangeCheckBox(value,invoice,totalpayment){

                if(arrKredit.find(item => item.invoice === invoice)){
                    arrKredit = arrKredit.filter((item) => item.invoice !== invoice);
                }else {
                    arrKredit.push({
                        'invoice' : invoice,
                        'totalpayment' : totalpayment,
                    });
                }

                noms = 0;

                arrKreditos = [];
                
                arrKredit.map((mapping, i) => {
                    noms +=parseInt(mapping.totalpayment);
                    arrKreditos.push(mapping.invoice);
                });

                console.log(arrKreditos);

                let sisatotalkredit = parseInt(hutang) - parseInt(noms);

                $('.totalsisakredit').html("Rp"+formatRupiah(sisatotalkredit.toString()));

                $('.item_selected').html(arrKredit.length);
                $('.nominal_selected').html("Rp"+formatRupiah(noms.toString()));

            }

            function openDialogConfirm(){

                if(arrKreditos.length == 0){
                    Toastify({
						text: 'Mohon pilih salah satu item yang ada di tabel tersebut.',
						duration: 3000,
						close: true,
						gravity: "top",
						position: "right",
						className: "errorMessage",

					}).showToast();
                    return false;
                }
                $('#dialogConfirm').modal('toggle');

                console.log(<?=$balance;?>, noms);

                if(parseInt(<?=$balance;?>) > parseInt(noms)){
                    $('#btnSaveBank').attr('class','btn btn-success');
                    $('#btnSaveBank').html('<i class="bx bx-check"></i> Lanjutkan');
                }else {
                    $('#btnSaveBank').attr('class','btn btn-danger disabled');
                    $('#btnSaveBank').html('<i class="bx bx-times"></i> Saldo Kurang!');
                }
            }



           
			function prosCair(){
				
            	var form_data = new FormData();
				
				form_data.append('invoice', JSON.stringify(arrKreditos));
				form_data.append('card', '<?=$cardID;?>');
				form_data.append('client_secret', secret_code);
				
				let url = '';
				
				const save = async (form_data) => {
					const posts = await axios.post('<?= api_url(); ?>api/v1/trx/payment-debts', form_data, {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {
                        $('#btnSaveBank').html('<i class="bx bx-check"></i> Lanjutkan');
						$('#btnSaveBank').attr('disabled', false);
						$('#btnSaveBank').css('cursor', 'pointer');

                        if(err.response.data.message=='your balance is not enough!'){
                            Toastify({
                                text: 'Saldo tidak cukup!',
                                duration: 3000,
                                close: true,
                                gravity: "top",
                                position: "right",
                                className: "errorMessage",

                            }).showToast();
                        }else if(err.response.data.message=='account not found!'){
                            Toastify({
                                text: 'PIN tidak benar!',
                                duration: 3000,
                                close: true,
                                gravity: "top",
                                position: "right",
                                className: "errorMessage",

                            }).showToast();
                        }
                        
					});
					if (posts.status == 201) {

						if (posts.data.status == true) {
							
							Toastify({
								text: posts.data.message,
								duration: 3000,
								close: true,
								gravity: "top",
								position: "right",
								className: "successMessage",

							}).showToast();

                            location.reload();

						} else {
							Toastify({
								text: posts.data.message,
								duration: 3000,
								close: true,
								gravity: "top",
								position: "right",
								className: "errorMessage",

							}).showToast();
						}

						$('#btnSaveBank').html('<i class="bx bx-check"></i> Lanjutkan');
						$('#btnSaveBank').attr('disabled', false);
						$('#btnSaveBank').css('cursor', 'pointer');

					}
					else {
						posts.data.error.map((mapping, i) => {
							Toastify({
								text: 'Oops!',
								duration: 3000,
								close: true,
								gravity: "top",
								position: "right",
								className: "errorMessage",

							}).showToast();
						});
						$('#btnSaveBank').html('<i class="bx bx-check"></i> Lanjutkan');
						$('#btnSaveBank').attr('disabled', false);
						$('#btnSaveBank').css('cursor', 'pointer');
					}
				}
				
				save(form_data);				

			}
			
            function requestSecret(){

				$('#btnSaveBank').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Memproses...');
				$('#btnSaveBank').attr('disabled', 'disabled');
                $('#btnSaveBank').css('cursor', 'not-allowed');

				const save2 = async () => {
					const posts2 = await axios.get('<?= api_url(); ?>api/v1/key/create', {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {
						$('#btnSaveBank').html('<i class="bx bx-check"></i> Lanjutkan');
						$('#btnSaveBank').attr('disabled', false);
						$('#btnSaveBank').css('cursor', 'pointer');
						console.log(err.response);
					});

					if (posts2.status == 201) {
						secret_code = posts2.data.data.client_secret;

						prosCair();
					}else {
						$('#btnSaveBank').html('<i class="bx bx-check"></i> Lanjutkan');
						$('#btnSaveBank').attr('disabled', false);
						$('#btnSaveBank').css('cursor', 'pointer');
					}
				}
				save2();
			}

		</script>