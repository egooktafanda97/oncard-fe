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
                                <h3>Saldo Cash</h3>
						    </div>
                            
							<div class="d-lg-flex align-items-center mb-4 gap-3 px-2 pb-2">
                            <font class="text-sm">Saldo dibawah merupakan nominal yang diterima oleh Anda (HOST) saat pembayaran biaya pendidikan.</font>
						    </div>

                            <form id="master">
                            <div class="row px-2">
                                <div class="col-9">
                                    <div class="form-group">
                                        <label for="">Saldo</label>
                                        <h1 class="text-dongker saldoterkini" style="font-weight:900;" id="saldoTerkini">Rp0</h1>
                                    </div>
                                </div>
                                <div class="col-3 text-end pt-4">
                                    <button href="#/" id="cii" 
                                    type="button"
                                    onclick="$('#modalShowListPendingPencairan').modal('toggle');"
                                    style="margin-top:-15px!important" 
                                    class="btn btn-success bg-dongker px-4 radius-30 mt-1 mt-lg-0 py-3">
                                        <i class="bx bx-plus"></i> Pencairan
                                    </button>
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
                                
                            </div>  
                            </form>
                        </div>
					 </div>
				   </div>
                   
                   <div class="col-lg-12">
                    <div class="card radius-2" style="border-radius:25px;">
						<div class="card-body" >
							<div class="d-lg-flex align-items-center mb-4 gap-3 px-2 py-2">
                                <h3>
                                <i class='bx bx-file'></i>
                                Pencairan Terakhir</h3>
						    </div>

                            <div class="row xxx">
                                <table id="example" class="tabelsiswa table table-hover tabelproduk" style="width:100%;font-size:12px!important;">
								<thead class="table-light">
									<tr>
										<th>No.</th>
										<th>Tanggal</th>
										<th>Tujuan Pencairan</th>
										<th>Nominal</th>
									</tr>
								</thead>
							</table>
                            </div>
                        </div>
					 </div>
				   </div>
				  </div>
				</div><!--end row-->

			</div>

			
			
		</div>

        <div class="modal fade" id="modalShowListPendingPencairan" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title titledetail">Withdrawal Section</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body puter">
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-md-12 mt-3 mb-3">
                                        <label for="">Nominal</label>
                                        <input type="text" id="nominal" class="form-control px-4 py-2 mt-2 mb-2 setTocurrency" 
                                            oninput="setValx(this.value);" 
                                            style="font-size:26px!important; font-weight:800;" placeholder="(Rp)" maxlength="20" 
                                            onkeydown="return isNumberKey(event);"/>
                                            <span id="error-message" style="color: red; display: none;">Nominal tidak boleh lebih besar dari saldo terkini.</span>
                                    
                                    </div>
                                    <div class="col-md-12">
                                        <textarea name="noted" class="form-control"  cols="30" rows="4" id="noted" placeholder="Masukkan perihal untuk pencairan berikut."></textarea>
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <p>Anda harus memasukkan pin pada kolom dibawah ini.</p>
                                        <input type="password" class="form-control" maxlength="6" id="passcode">
                                    
                                    </div>
                            </div>
                        </div>
                        
                        
                    </div>
                    </div>
                    <div class="modal-footer text-center">
                        <div class="col-12 mt-5">
                            <button href="#/" id="withdrawButton" 
                            data-action="commit" onclick="procDeleteTagihan(this);"
                            style="margin-top:-15px!important" 
                            class="btn btn-success bg-dongker px-4 radius-30 mt-1 mt-lg-0 py-3" disabled>
                                <i class="bx bx-plus"></i> Create Withdrawal
                            </button>
                        </div>
                        
                    </div>
                </div>
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
            let selected_accountNumber;

            let instansi_id;
            let user_id;

            let modedelete;

            let dataArray = [];
            let dataArrayResult = [];
            
			$(document).ready(function () {

                getJenisTagihanList();
                getAuth2nd();

            });
            
            let secret_code = '';

            function procDeleteTagihan(button){
                
                let mxy = $('#passcode').val();

                if(mxy == ''){
                    Toastify({
                        text: "PIN wajib diisi!",
                        duration: 3000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        className: "errorMessage",

                    }).showToast();
                    return false;
                }
                // Get the action value from the clicked button
                const action = button.getAttribute('data-action');
                if (action === 'commit') {
                    $('#withdrawButton').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Memproses...');
                    $('#withdrawButton').attr('disabled', 'disabled');
                    $('#withdrawButton').css('cursor', 'not-allowed');

                    const save2 = async () => {
                        const posts2 = await axios.get('<?= api_url(); ?>api/v1/key/create', {
                            headers: {
                                'Authorization': 'Bearer ' + localStorage.getItem('_token_oncard')
                            }
                        }).catch((err) => {
                            $('#withdrawButton').html('Commit Withdrawal');
                            $('#withdrawButton').attr('disabled', false);
                            $('#withdrawButton').css('cursor', 'pointer');
                            console.log(err.response);
                        });

                        if (posts2.status == 201) {
                            secret_code = posts2.data.data.client_secret;
                            prosCair();
                        }else {
                            $('#withdrawButton').html('Commit Withdrawal');
                            $('#withdrawButton').attr('disabled', false);
                            $('#withdrawButton').css('cursor', 'pointer');
                        }
                    }
                    save2();
                }
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
                document.getElementById('nominal').value = formatRupiah(cleanedValue);
                let balance = parseRupiahToNumber($('.saldoterkini').html());


                let nominalValue = parseRupiahToNumber(value || '0');

                // Check if nominalValue exceeds balance
                if (nominalValue > balance) {
                    // Add error state
                    $(this).addClass('is-invalid'); // Add a Bootstrap error class (if using Bootstrap)
                    $('#error-message').show();    // Show the error message
                    withdrawButton.disabled = true;
                } else if(value==''){
                    withdrawButton.disabled = true;
                } else {
                    // Remove error state
                    $(this).removeClass('is-invalid'); // Remove the error class
                    $('#error-message').hide();        // Hide the error message
                    withdrawButton.disabled = false;
                    
                }
            }

            function parseRupiahToNumber(rupiah) {
                return parseInt(rupiah.replace(/[^\d]/g, ''), 10); // Remove non-numeric characters and convert to number
            }


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

                            if(mapping.account_type=='billing_cash' && mapping.account_level=='agency'){
                                let balance = mapping.balance;
                                $('.saldoterkini').html(formatRupiah(balance));
                                user_id = mapping.user_id;
                                instansi_id = mapping.instansi_id;
                                selected_accountNumber = mapping.account_number;

                                showReport();
                            }
                            
                        });
                    }
				}
				save2();
			}

            function showReport(){

                if ($.fn.DataTable.isDataTable('#example')) {
                    // Destroy the existing DataTable instance
                    $('#example').DataTable().destroy();
                }

                // Clear the table content (optional, for clean slate)
                $('#example tbody').empty();

                table = $('#example').DataTable( {
					fixedHeader: true,
					"processing": true,
					//"serverSide": true,
					"searching": true,
					order: [[0, 'asc']], // Order by "created_at" column in descending order (most recent first)
					ajax: function (data, callback) {
						axios.get('<?= api_url(); ?>api/v1/rep/jurnal?account_number='+selected_accountNumber+'&mtype=withdrawal', {
							headers: {
								'Authorization': 'Bearer ' + localStorage.getItem('_token_oncard'),
                                'paginate' : true
							}
						}).then(response => {
								
								callback({
									data: response.data.data
								});
							})
							.catch(error => {
								console.error('Error fetching data:', error);
							});
					},
					columns: [
						{
                            data: null, // Set to null because the data will be generated dynamically
                            title: 'No', // Update the title if needed
                            render: function (data, type, row, meta) {
                                return `<span class="kode-semester text-dark" style="font-weight: 400;">
                                            ${meta.row + 1}
                                        </span>`;
                            }
                        },
						{ 
							data: 'created_at', 
							title: 'Tanggal', 
							render: function (data, type, row) {
								
								return `<span class="kode-kunjungan text-dark" style="font-weight: 400; ">
											${moment(row.created_at).format('YYYY-MM-DD, HH:mm:ss')} WIB
										</span>`;
							} 
						},
						{ 
							data: 'description', 
							title: 'Tujuan Pencairan', 
							render: function (data, type, row) {
								
								return `<span class="kode-kunjungan text-dark" style="font-weight: bold; ">
											${row.description}
										</span>`;
							} 
						},
						
						{ 
							data: 'debit_amount', 
							title: 'Nominal', 
							render: function (data, type, row) {
								
								return `<span class="kode-kunjungan text-dark text-right" style="font-weight: 900 ">
											Rp${formatRupiah(row.debit_amount.toString())}
										</span>`;
							} 
						}
						
					],
					lengthMenu: [[5, 20, 35, -1], [5, 20, 35, "All"]], // Add "All" option
    				pageLength: 5 // Default page length
				} );
  
            }


            function prosCair(){
				
				let value = $('#nominal').val();
                value = value.split('.').join("");

				let keteranganCair = $('#noted').val();
				let pinInserted = $('#passcode').val();

                var form_data = new FormData();
				
				form_data.append('amount', value);
				form_data.append('account_number', selected_accountNumber);
				form_data.append('client_secret', secret_code);
				form_data.append('pin', pinInserted);
				form_data.append('description', keteranganCair);
				form_data.append('instansi_id', instansi_id);
				
				let url = '';
				
				const save = async (form_data) => {
					const posts = await axios.post('<?= api_url(); ?>api/v1/wd', form_data, {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token_oncard')
						}
					}).catch((err) => {
                        $('#withdrawButton').html('Commit Withdrawal');
						$('#withdrawButton').attr('disabled', false);
						$('#withdrawButton').css('cursor', 'pointer');

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
					if (posts.status == 201||posts.status == 200) {

						if (posts.data.status == true) {
						    
						    pinsett = '';

                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Berhasil!',
                                text: 'Saldo berhasil dicairkan. Silahkan cek pada bagian riwayat pencairan terakhir.',
                                showConfirmButton: true

                            });
							getAuth2nd();
                            $('#modalShowListPendingPencairan').modal('toggle');
                            $('#noted').val('');
                            $('#nominal').val('');
                            $('#passcode').val('');

                            
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

                        $('#withdrawButton').html('Commit Withdrawal');
						$('#withdrawButton').attr('disabled', false);
						$('#withdrawButton').css('cursor', 'pointer');

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
						$('#withdrawButton').html('Commit Withdrawal');
						$('#withdrawButton').attr('disabled', false);
						$('#withdrawButton').css('cursor', 'pointer');
					}
				}
				
				save(form_data);				

			}

        </script>