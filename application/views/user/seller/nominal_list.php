<style>
    .monday {
        position:relative;
        -webkit-transition:all 0.1s linear 0s;
    }
    .monday:hover {
        margin-top:-10px;
    }
</style>
<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Kartu Nominal</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Daftar Kartu</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
			  
				<div class="card">
					<div class="card-body">
						<div class="d-lg-flex align-items-center mb-4 gap-3">
							<div class="position-relative">
								<h5>Syarat dan Ketentuan :</h5>
                                <ol>
                                    <li>Fitur ini berfungsi <b>hanya jika</b> merchant Anda diberi akses untuk fitur <b>Kustom Debit</b></li>
                                    <li>Nominal hanya dapat dikoneksikan pada <b>SATU</b> kartu saja.</li>
                                    <li>Silahkan tanyakan ke Host apabila ada pertanyaan lebih lanjut.</li>
                                </ol>
							</div>
						  <div class="ms-auto"><a href="<?=base_url().$function.'/NominalListManage';?>" class="btn btn-primary radius-30 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>Tambah Kartu</a></div>
						</div>
						
                        <div class="row putContentHere">
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="card monday" style="background-color:transparent;background:url(<?=base_url();?>assets/img/bg_card.png);background-size:cover;">
                                    <div class="card-body px-3 py-5 text-center">
                                        <h4 class="text-muted" style="font-weight:400;">Memuat data...</h4>
                                        <div class="row">
                                            <div class="col-6 text-start"><code>xxxxxx x</code></div>
                                            <div class="col-6 text-end">24/7</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
					</div>
				</div>


			</div>
		</div>

        <div class="modal fade" id="modalDeleteNominal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Hapus Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">Dengan memilih tombol <b>Hapus</b> dibawah ini, Anda dengan bersedia bahwa data tersebut dihapus pada sistem.<br/>Yakin ingin menghapus?</div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="button" onclick="commitDeleteNominal();" class="btn btn-primary">Hapus</button>
                    </div>
                </div>
            </div>
        </div>

		<script type="text/javascript">

            
			$(document).ready(function () {
                var typingTimer;
                clearTimeout(typingTimer);
                typingTimer = setTimeout(function() {
                    showData();
                }, 2000);
                
				$("#floatingInput").on("keyup", function() {
					let value = $(this).val().toLowerCase();
					$(".putContentHere tr").filter(function() {
					$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
					});
				});
            });

            function openModalDeleteNominal(id, table){
                $('#modalDeleteNominal').modal('toggle');
                uidsett = id;
                tablesett = table;
            }
			function showData(){
				let num = 0;
				let tableColumn = '';
				
				const save2 = async () => {
					const posts2 = await axios.get('<?= api_url(); ?>api/v1/card-reader', {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {
						console.log(err.response);
					});
			
					if (posts2.status == 200) {
							tableColumn = '';

                            if(posts2.data.length==0){
								tableColumn +=`<div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="card monday" style="background-color:transparent;background:url(<?=base_url();?>assets/img/bg_card.png);background-size:cover;">
                                    <div class="card-body px-3 py-5 text-center">
                                        <h4 class="text-muted" style="font-weight:400;">Belum ada kartu</h4>
                                        <div class="row">
                                            <div class="col-6 text-start"><code>xxxxxx x</code></div>
                                            <div class="col-6 text-end">24/7</div>
                                        </div>
                                    </div>
                                </div>
                            </div>`;
								$('.putContentHere').html(tableColumn);return false;
							}
							posts2.data.map((mapping,i)=>{
                                if(mapping.instansi_id==idInstansiX){
                                    num += 1;
                                    tableColumn +=`
                                        <div class="col-lg-3 col-md-4 col-sm-6">
                                            <div class="card monday" style="background-color:transparent;background:url(<?=base_url();?>assets/img/bg_card.png);background-size:cover;">
                                                <div class="card-body px-3 py-5 pb-0 text-center">
                                                    <h4 class="text-muted" style="font-weight:900;font-size:35px;"><code class="text-dark">${formatRupiah(mapping.values)}</code></h4>
                                                    <div class="row">
                                                        <div class="col-6 text-start"><code>${mapping.card_id}</code></div>
                                                        <div class="col-6 text-end"><code>${localStorage.getItem('_user')}</code></div>
                                                    </div>
                                                    <div class="row mt-3 mb-1">
                                                        <div class="col-12 text-end">
                                                            <div type="button" class="badge btn btn-outline-danger btn-sm" onclick="openModalDeleteNominal('${mapping.id}','card-reader');"><i class="bx bx-trash" style="font-size:11px;"></i> Hapus</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    `;
                                }
							});
							
						$('.putContentHere').html(tableColumn);
							
					}
				}
				
				save2();
				
				
			}

            
            function commitDeleteNominal(){
			

                const save2 = async () => {
					const posts2 = await axios.get('<?= api_url(); ?>api/v1/card-reader/destory/'+uidsett, {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {
						console.log(err.response);
					});
			
					if (posts2.status == 201) {

					Toastify({
						text: posts2.message,
						duration: 3000,
						close: true,
						gravity: "top",
						position: "left",
						className: "successMessage",

					}).showToast();

					showData();
					uidsett = '';
					tablesett = '';

					$('#modalDeleteNominal').modal('toggle');


				} else {

				}
			}

			save2();
		}
		</script>