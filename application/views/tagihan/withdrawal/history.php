<style>
.break-word {
    word-break: break-word; /* Break words when necessary */
    overflow-wrap: break-word; /* Ensures long words break correctly */
    white-space: normal; /* Allows the text to wrap normally */
}
.quota-info {
	display: flex;
	justify-content: space-between;
	margin-top: 10px;
}
.progress-container {
	width: 100%;
	margin: 0 auto;
}
.modal-fullscreen {
    z-index: 1000;
}

.modal-overlay {
    z-index: 1100;
}

.modal-dialog {
    z-index: 1200;
}

.discount {
    position: relative;
    display: inline-block;
    font-size: 24px;
    color: #333;
}

.discount::before {
    content: "";
    position: absolute;
    top: 50%;
    left: 0;
    width: 100%;
    height: 2px;
    background-color: red;
    transform: rotate(-10deg);
    transform-origin: center;
}
</style>
<div class="page-wrapper">
			<div class="page-content">
				<div class="row">
                   <div class="col-lg-12">
                    <div class="card radius-2" style="border-radius:25px;">
						<div class="card-body" >
							<div class="d-lg-flex align-items-center mb-4 gap-3 px-2 py-2">
                                <h3>History Request</h3>
						    </div>

                            <div class="row putcontenthere">
                                <div class="col-12 text-center">
                                    <img src="https://img.freepik.com/free-vector/no-data-concept-illustration_114360-536.jpg" alt="" style="width:300px;">
                                    <h5>You don't have any history request right now.</h5>
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

        <script>
            
            const withdrawButton = document.getElementById('withdrawButton');

            function handleInputChange(value) {
                console.log(value);
                
                // Enable button if value is truthy
                withdrawButton.disabled = !value;
            }


            withdrawButton.disabled = true;
        </script>

        
        <script type="text/javascript">
			
			let idsett;
			let uidsettt;
			let modesett;

            let instansi_id;
            let user_id;

            let modedelete;

            let dataArray = [];
            let dataArrayResult = [];
            
			$(document).ready(function () {

                getJenisTagihanList();
                getInfoDashboard();
            });

            function procSubmitWithdrawal(){
				$('#withdrawButton').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Memproses...');
				$('#withdrawButton').attr('disabled', 'disabled');
				$('#withdrawButton').css('cursor', 'not-allowed');

                var nominalTagihan = $("#nominalTagihan").val();
                nominalTagihan = nominalTagihan.split('.').join("");

                let all = $('.saldoterkini').html();
                all = all.split('.').join("");

                if(parseInt(nominalTagihan) > parseInt(all)){
                    Toastify({
                        text: "Nominal yang dimasukkan melebihi saldo saat ini.",
                        duration: 3000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        className: "errorMessage",

                    }).showToast();
                    $('#withdrawButton').html('<i class="bx bx-plus"></i> Create Withdrawal');
                    $('#withdrawButton').attr('disabled', false);
                    $('#withdrawButton').css('cursor', 'pointer');
                    
                    return false;

                }

				var noted = $("#noted").val();
                
				var form_data = new FormData();

				form_data.append('nominalTagihan', nominalTagihan);
				form_data.append('noted', noted);
				form_data.append('instansi_id', instansi_id);
				form_data.append('user_id', user_id);
				
				const save = async (str) => {
					const posts = await axios.post('<?= base_url(); ?>CPanel_Tagihan/saveInfoWithdrawal',form_data).catch((err) => {
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
							text: 'Request berhasil diajukan.',
							duration: 3000,
							close: true,
							gravity: "top",
							position: "right",
							className: "successMessage",

						}).showToast();
						
                        $('#master')[0].reset();
                        
                        getJenisTagihanList();

						$('#withdrawButton').html('<i class="bx bx-plus"></i> Create Withdrawal');
						$('#withdrawButton').attr('disabled', false);
						$('#withdrawButton').css('cursor', 'pointer');
					} else {

					}
				}
				save(form_data);
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
                        $('.saldoterkini').html(formatRupiah(balance));
                        user_id = posts2.data.user_id;
                        instansi_id = posts2.data.instansi_id;

                    }
				}
				save2();
			}

            function getJenisTagihanList(){

                let htmlx = '';
				
				const save2 = async () => {
					const posts2 = await axios.get('<?= base_url(); ?>CPanel_Tagihan/getInfoTagihanHistori').catch((err) => {
						console.log(err.response);
					});
			
					if (posts2.status == 200) {
                        if(posts2.data.status==true && posts2.data.data.length>0){
                            posts2.data.data.map((mapping,i)=>{

                                let xnote = mapping.noted;
                                let ynote = mapping.noted_response_admin;
                                if(xnote==""){
                                    xnote = '-';
                                }
                                if(ynote==""){
                                    ynote = '-';
                                }
                                htmlx += `
                                    <div class="col-12">
                                    <div class="card bg-light">
                                        <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-3 col-12 mb-2">
                                                <p style="margin:0;padding:0;">Tanggal Pengajuan :</p>
                                                <b>${moment(mapping.created_at).format('YYYY-MM-DD, HH:mm:ss')} WIB</b>
                                            </div>
                                            <div class="col-lg-2 col-12 mb-2">
                                                <p style="margin:0;padding:0;">Status :</p>
                                                <b style="text-transform:uppercase;">${mapping.status}</b>
                                            </div>
                                            <div class="col-lg-2 col-12 mb-2 text-end">
                                                <p style="margin:0;padding:0;">Nominal</p>
                                                <b>${formatRupiah(mapping.nominal)}</b>
                                            </div>
                                            <div class="col-lg-5 col-12 mb-2 text-end">
                                            <div class="row">
                                                <div class="col-lg-6 col-12">
                                                    <i style="font-size:11px;">Catatan</i><br/>
                                                    <p style="margin:0">${xnote}</p>
                                                </div>
                                                <div class="col-lg-6 col-12">
                                                    <i style="font-size:11px;">Tindak Lanjut Admin</i><br/>
                                                    <p style="margin:0">${ynote}</p>
                                                    <font style="font-size:10px;">
                                                    ${moment(mapping.updated_at).format('YYYY-MM-DD, HH:mm:ss')} WIB
                                                    </font>
                                                </div>
                                            </div>
                                            
                                            </div>
                                            
                                            
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                `;
                            });
                            $('.putcontenthere').html(htmlx);
                        }else {
                            htmlx =`
                                <div class="col-12 text-center">
                                    <img src="https://img.freepik.com/free-vector/no-data-concept-illustration_114360-536.jpg" alt="" style="width:300px;">
                                    <h5>You don't have any pending request right now.</h5>
                                </div>
                            `;
                            $('.putcontenthere').html(htmlx);
                        }
					}
				}
				save2();
			}

            function isNumberKey(evt) {
                // Allow only numerical keys
                var charCode = (evt.which) ? evt.which : evt.keyCode;
                if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                    return false;
                }
                return true;
            }
            function setValx(value) {
                // Ensure the value is a number and truncate to 8 characters
                let cleanedValue = value.replace(/\D/g, '').substring(0,9);
                document.getElementById('nominalTagihan').value = formatRupiah(cleanedValue);
            }

        </script>