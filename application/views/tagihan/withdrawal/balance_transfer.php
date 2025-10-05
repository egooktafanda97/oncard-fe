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
							<div class="d-lg-flex align-items-center mb-1 gap-3 px-2 pt-2">
                                <h3>Saldo Transfer</h3>
						    </div>
                            
							<div class="d-lg-flex align-items-center mb-4 gap-3 px-2 pb-2">
                            <font class="text-sm">Saldo dibawah merupakan nominal yang ditransfer oleh orangtua saat pembayaran biaya pendidikan.</font>
						    </div>

                            <form id="master">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="">Saldo</label>
                                        <h1 class="text-dongker saldoterkini" style="font-weight:900;" id="saldoTerkini">Rp0</h1>
                                    </div>
                                </div>
                                <!-- <div class="col-12 mt-4">
                                    <div class="form-group">
                                        <label for="">Permintaan Pencairan Saldo</label>
                                        <input type="text" id="nominalTagihan" class="form-control px-4 py-2 mt-2 mb-2 setTocurrency" 
                                            oninput="setValx(this.value);" 
                                            style="font-size:26px!important; border-radius:45px;font-weight:800;" placeholder="(Rp)" maxlength="20" 
                                            onkeydown="return isNumberKey(event);"/>
                                    </div>
                                </div> -->
                                <div class="col-12 mt-4">
                                    <div class="form-group">
                                        <label for="" class="mb-2">Alasan Pencairan</label>
                                        <textarea name="noted" id="noted" cols="30" rows="4" oninput="handleInputChange(this.value);" style="border-radius:20px;" class="form-control p-3"></textarea>
                                    </div>
                                </div>
                                <div class="col-12 mt-5">
                                    <button href="#/" id="withdrawButton" 
                                    onclick="procSubmitWithdrawal();" 
                                    style="margin-top:-15px!important" 
                                    class="btn btn-success bg-dongker px-4 radius-30 mt-1 mt-lg-0 py-3" disabled>
                                        <i class="bx bx-plus"></i> Create Withdrawal
                                    </button>
                                </div>
                            </div>  
                            </form>
                        </div>
					 </div>
				   </div>
                   
                   <div class="col-lg-12">
                    <div class="card radius-2" style="border-radius:25px;">
						<div class="card-body" >
							<div class="d-lg-flex align-items-center mb-4 gap-3 px-2 py-2">
                                <h3>List Pending Request</h3>
						    </div>

                            <div class="row putcontenthere">
                                <div class="col-12 text-center">
                                    <img src="https://img.freepik.com/free-vector/no-data-concept-illustration_114360-536.jpg" alt="" style="width:300px;">
                                    <h5>You don't have any pending request right now.</h5>
                                    <button href="#/" id="" 
                                    style="" 
                                    class="btn btn-info bg-info px-4 radius-30 mt-4 mt-lg-0">
                                        See History Page
                                    </button>
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
                getAuth2nd();
            });

            function getAuth2nd(){
				const save2 = async () => {
					const posts2 = await axios.get('<?= api_url(); ?>api/v1/account/auth', {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token_oncard')
						}
					}).catch((err) => {

                        if(err.response.data.message=='Too Many Attempts.'){
                            Toastify({
                                text: 'Terlalu banyak proses. Perlambat aktifitas Anda. Refresh 10 detik kemudian. [-getAuthFooter]',
                                duration: 10000,
                                close: true,
                                gravity: "bottom",
                                position: "right",
                                className: "errorMessage",

                            }).showToast();
                            return false;
                        }
						Toastify({
							text: 'Maaf. Sesi telah berakhir. Silahkan login kembali.',
							duration: 30000,
							close: true,
							gravity: "bottom",
							position: "right",
							className: "errorMessage",

						}).showToast();

						setTimeout(function() {
							Toastify({
								text: 'Logout terlebih dahulu, lalu LOGIN kembali.',
								duration: 28500,
								close: true,
								gravity: "bottom",
								position: "right",
								className: "errorMessage",

							}).showToast();
						}, 1500);

						return false;
					});
			
					if (posts2.status == 200) {
                        // console.log(posts2.data.data);
                        posts2.data.data.map((mapping,i)=>{

                            if(mapping.account_type=='billing' && mapping.account_level=='agency'){
                                let balance = mapping.balance;
                                $('.saldoterkini').html(formatRupiah(balance));
                                user_id = mapping.user_id;
                                instansi_id = mapping.instansi_id;
                            }
                            
                        });
                    }
				}
				save2();
			}

            function procSubmitWithdrawal(){
				$('#withdrawButton').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Memproses...');
				$('#withdrawButton').attr('disabled', 'disabled');
				$('#withdrawButton').css('cursor', 'not-allowed');

                // var nominalTagihan = $("#nominalTagihan").val();
                // nominalTagihan = nominalTagihan.split('.').join("");

                let all = $('.saldoterkini').html();
                all = all.split('.').join("");

                var noted = $("#noted").val();
                
				var form_data = new FormData();

				form_data.append('nominalTagihan', all);
				form_data.append('noted', noted);
				form_data.append('instansi_id', instansi_id);
				form_data.append('user_id', user_id);

                if(parseInt(all) < 1){
                    Toastify({
                        text: "Tidak dapat melanjutkan proses karena saldo tidak ada.",
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

            

            function getJenisTagihanList(){

                let htmlx = '';
				
				const save2 = async () => {
					const posts2 = await axios.get('<?= base_url(); ?>CPanel_Tagihan/getInfoTagihan').catch((err) => {
						console.log(err.response);
					});
			
					if (posts2.status == 200) {
                        if(posts2.data.status==true){
                            posts2.data.data.map((mapping,i)=>{

                                let xnote = mapping.noted;
                                if(xnote==""){
                                    xnote = '-';
                                }
                                htmlx += `
                                    <div class="col-12">
                                    <div class="card bg-light">
                                        <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6 col-12 mb-2">
                                                <p styxnotele="margin:0;padding:0;">Tanggal Pengajuan :</p>
                                                <b>${moment(mapping.created_at).format('YYYY-MM-DD, HH:mm:ss')} WIB</b>
                                            </div>
                                            <div class="col-lg-3 col-12 mb-2">
                                                <p style="margin:0;padding:0;">Status :</p>
                                                <b style="text-transform:uppercase;">${mapping.status}</b>
                                            </div>
                                            <div class="col-lg-3 col-12 mb-2 text-end">
                                                <p style="margin:0;padding:0;">Nominal</p>
                                                <b>${formatRupiah(mapping.nominal)}</b>
                                            </div>
                                            <div class="col-lg-12 col-12 mb-2 text-start text-sm p-3" style="background:#ebebebba; border-radius:10px;">
                                                <i style="font-size:11px;">Catatan</i><br/>
                                                <p style="margin:0">${xnote}</p>
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
                                    <button href="#/" id="" 
                                    style="" 
                                    class="btn btn-info bg-info px-4 radius-30 mt-4 mt-lg-0">
                                        See History Page
                                    </button>
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