<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.14/index.global.min.js"></script>
<style>
    #calendar {
    max-width: 100%;
    margin: 40px auto;
    }
    .animatecard {
        position:relative;
        -moz-transition:all 0.2s linear 0s;
        -webkit-transition:all 0.2s linear 0s;
        -o-transition:all 0.2s linear 0s;
    }
    .animatecard:hover {
        /* transform:scale(1.01,1.01); */
        border:3px solid #aaa;
        cursor:pointer;
    }
    .animatecard.active {
        background-color: #fff!important; /* Example: light green background */
        border:3px solid #000;
    }
</style>
<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">IPAYMU CONNECT</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">BIAYA PENDIDIKAN</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
			  
				<div class="card">
					<div class="card-body">
						<div class="col mb-4 gap-3">
							<div class="position-relative" style="display:flex; gap:15px; justify-content : flex-end">
								<!-- <input type="text" class="form-control ps-5 radius-30" placeholder="Ketik nama agensi"> <span class="position-absolute top-50 product-show translate-middle-y"><i class="bx bx-search"></i></span> -->
                                <button type="button" onclick="window.location.href='<?=base_url();?>CPanel_Admin/IpaymuHistoryInvoice';" class="btn btn-outline-secondary d-block px-3" style="margin-right:0!important;border-radius:100px!important; padding:8px; "><i class="bx bx-file"></i> History Pencairan</button>
							</div>
							
							<div style=" margin-top:20px; margin-bottom:20px; text-align:right;">
								<!-- <font style="font-size:20px;" class="totalSummaries">Grand total : Rp0</font> -->
							</div>
						</div>
						
						<div class="table-responsive">

                         <table id="maintable" class="table mb-0">
								<thead class="table-light">
									<tr>
										<th>No.</th>
										<th>Nama agensi</th>
										<th align="right" style="text-align:right!important;">Saldo Instansi</th>
										<th >Pending Request</th>
										<th align="right" style="text-align:right!important;">Aksi</th>
									</tr>
								</thead>
								<tbody class="putContentHere">
								</tbody>
							</table>

                            <!-- <div id='calendar'></div> -->
						</div>
					</div>
				</div>


			</div>
		</div>

        <div class="modal fade" id="modalShowListPendingPencairan" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-fullscreen">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title titledetail">Withdrawal Section</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body puter">
                        <div class="row">
                            <div class="col-4 putlisthere"></div>
                            <div class="col-8">
                                <font style="font-size:26px; font-weight:800;">Form Withdrawal</font>
                                <div class="row">
                                    <div class="col-md-12 mt-3 mb-3">
                                        <label for="">Nominal</label>
                                        <input type="text" class="form-control" id="nominal" disabled readonly style="font-size:35px; font-weight:700;">
                                    
                                    </div>
                                    <div class="col-md-12">
                                        <textarea name="noted" class="form-control" disabled cols="30" rows="4" id="noted" placeholder="Masukkan alasan Anda menghapus item ini."></textarea>
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <p>Anda harus mengetikkan <b>SUBMIT</b> pada kolom dibawah ini.</p>
                                        <input type="text" class="form-control" maxlength="6" id="passcode" disabled>
                                    
                                    </div>
                            </div>
                        </div>
                        
                        
                    </div>
                    </div>
                    <div class="modal-footer text-center">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="button" class="btn btn-danger" id="rejectBtnDelete" data-action="reject" onclick="procDeleteTagihan(this);">
                            Reject Withdrawal
                        </button>
                        <button type="button" class="btn btn-success" id="submitBtnDelete" data-action="commit" onclick="procDeleteTagihan(this);">
                            Commit Withdrawal
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">

            document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                timeZone: 'UTC',
                initialView: 'dayGridMonth',
                events: '#',
                editable: true,
                selectable: true
            });

            calendar.render();
            });

            let idsett = '';

            $('#modalImportData').on('hidden.bs.modal', function () {
                // $('#modalSetCard').modal('toggle');
                idsett = '';
                
            });
            
			let datamajor = [];
			let dataminor = [];
			$(document).ready(function () {
                showData();
            });
			function showData(){
				let num = 0;
				let tableColumn = '';
				datamajor = [];
				tableColumn += `<tr><td colspan="7" class="text-center">Loading...</td></tr>`;
				$('.putContentHere').html(tableColumn);
				
				const save2 = async () => {
					const posts2 = await axios.get('<?=base_url(); ?>CPanel_Admin/getDataAgensiAllIpaymuBiayaPendidikan').catch((err) => {
						console.log(err.response);
					});
			
					if (posts2.status == 200) {

                        console.log(posts2.data.data);

							tableColumn = '';
							let totals=0;
							posts2.data.data.map((mapping,i)=>{
								num += 1;
								let mxxx = mapping.jumlah_saldo_available_ipaymu??0;
								let myyy = mapping.jumlah_saldo_original??0;
								totals += parseInt(myyy);

								datamajor.push({
									"nama_instansi" : mapping.nama,
									"instansi_id" : mapping.idINSTANSI,
									"foto" : mapping.foto,
									"username" : mapping.username,
									"jumlah_saldo_available_ipaymu" : mapping.jumlah_saldo_available_ipaymu,
									"jumlah_saldo_original" : mapping.jumlah_saldo_original,
									"kode_instansi" : mapping.kode_instansi,
									"account_number" : mapping.account_number,
									"account_number_cash" : mapping.account_number_cash,
									"balance" : mapping.balance,
									"pin" : mapping.pin,
									"payment_gateway_ids_combined" : mapping.payment_gateway_ids_combined,
								});
							});
							
                        console.log(datamajor);
						getPendingNotification();
							
					}
				}
				
				save2();
				
				
			}

            let secret_code = '';

            function procDeleteTagihan(button){
                
                let mxy = $('#passcode').val();

                if(mxy != 'SUBMIT'){
                    Toastify({
                        text: "Silahkan ketik SUBMIT pada form yang tersedia.",
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
                    $('#submitBtnDelete').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Memproses...');
                    $('#submitBtnDelete').attr('disabled', 'disabled');
                    $('#submitBtnDelete').css('cursor', 'not-allowed');

                    const save2 = async () => {
                        const posts2 = await axios.get('<?= api_url(); ?>api/v1/key/create', {
                            headers: {
                                'Authorization': 'Bearer ' + localStorage.getItem('_token')
                            }
                        }).catch((err) => {
                            $('#submitBtnDelete').html('Commit Withdrawal');
                            $('#submitBtnDelete').attr('disabled', false);
                            $('#submitBtnDelete').css('cursor', 'pointer');
                            console.log(err.response);
                        });

                        if (posts2.status == 201) {
                            secret_code = posts2.data.data.client_secret;
                            prosCair();
                        }else {
                            $('#submitBtnDelete').html('Commit Withdrawal');
                            $('#submitBtnDelete').attr('disabled', false);
                            $('#submitBtnDelete').css('cursor', 'pointer');
                        }
                    }
                    save2();
                } else if (action === 'reject') {
                    // Perform reject action

                    let notedx = $('#noted').val();
                    
                    var form_data = new FormData();
                    form_data.append('id', idsett);
                    form_data.append('status', action);
                    form_data.append('noted', notedx);
                    
                    const save2 = async () => {
                        const posts2 = await axios.post('<?=base_url(); ?>CPanel_Admin/updateStatusTagihan', form_data).catch((err) => {
                            console.log(err.response);
                        });
                
                        if (posts2.status == 200) {
                            showData();
                            $('#modalShowListPendingPencairan').modal('toggle');
                            Toastify({
                                text: "Request tersebut telah di reject dari sistem!",
                                duration: 3000,
                                close: true,
                                gravity: "top",
                                position: "right",
                                className: "successMessage",

                            }).showToast();
                        }
                    }
                    
                    save2();
                }
            }

            function prosCair(){
				
				let value = $('#nominal').val();
                value = value.split('.').join("");

				let keteranganCair = $('#noted').val();

                var form_data = new FormData();
				
				form_data.append('amount', value);
				form_data.append('account_number_from', selected_accountNumber);
				form_data.append('account_number_to', selected_accountNumberCash);
				form_data.append('pin', selected_pin);
				form_data.append('description', keteranganCair);
                form_data.append('instansi_id', selected_instansiID);
				
				let url = '';
				
				const save = async (form_data) => {
					const posts = await axios.post('<?= api_url(); ?>api/transfer/transfer-balance', form_data, {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {
                        $('#submitBtnDelete').html('Commit Withdrawal');
						$('#submitBtnDelete').attr('disabled', false);
						$('#submitBtnDelete').css('cursor', 'pointer');

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
					if (posts.status == 201 || posts.status==200) {

						pinsett = '';
							
                        Toastify({
                            text: posts.data.message,
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            className: "successMessage",

                        }).showToast();

                        submitSuccessPendingRequest();

                        $('#submitBtnDelete').html('Commit Withdrawal');
						$('#submitBtnDelete').attr('disabled', false);
						$('#submitBtnDelete').css('cursor', 'pointer');

					}
					else {
						Toastify({
								text: 'Server Error!',
								duration: 3000,
								close: true,
								gravity: "top",
								position: "right",
								className: "errorMessage",

							}).showToast();
						$('#submitBtnDelete').html('Commit Withdrawal');
						$('#submitBtnDelete').attr('disabled', false);
						$('#submitBtnDelete').css('cursor', 'pointer');
					}
				}
				
				save(form_data);				

			}

            // function prosCair(){
				
			// 	let value = $('#nominal').val();
            //     value = value.split('.').join("");

			// 	let keteranganCair = $('#noted').val();

            //     var form_data = new FormData();
				
			// 	form_data.append('amount', value);
			// 	form_data.append('account_number', selected_accountNumber);
			// 	form_data.append('client_secret', secret_code);
			// 	form_data.append('pin', selected_pin);
			// 	form_data.append('description', keteranganCair);
			// 	form_data.append('instansi_id', selected_instansiID);
				
			// 	let url = '';
				
			// 	const save = async (form_data) => {
			// 		const posts = await axios.post('<?= api_url(); ?>api/v1/wd', form_data, {
			// 			headers: {
			// 				'Authorization': 'Bearer ' + localStorage.getItem('_token')
			// 			}
			// 		}).catch((err) => {
            //             $('#submitBtnDelete').html('Commit Withdrawal');
			// 			$('#submitBtnDelete').attr('disabled', false);
			// 			$('#submitBtnDelete').css('cursor', 'pointer');

            //             if(err.response.data.message=='your balance is not enough!'){
            //                 Toastify({
            //                     text: 'Saldo tidak cukup!',
            //                     duration: 3000,
            //                     close: true,
            //                     gravity: "top",
            //                     position: "right",
            //                     className: "errorMessage",

            //                 }).showToast();
            //             }else if(err.response.data.message=='account not found!'){
            //                 Toastify({
            //                     text: 'PIN tidak benar!',
            //                     duration: 3000,
            //                     close: true,
            //                     gravity: "top",
            //                     position: "right",
            //                     className: "errorMessage",

            //                 }).showToast();
            //             }
                        
			// 		});
			// 		if (posts.status == 201) {

			// 			if (posts.data.status == true) {
						    
			// 			    pinsett = '';
							
			// 				Toastify({
			// 					text: posts.data.message,
			// 					duration: 3000,
			// 					close: true,
			// 					gravity: "top",
			// 					position: "right",
			// 					className: "successMessage",

			// 				}).showToast();

            //                 submitSuccessPendingRequest();
                            
			// 			} else {
			// 				Toastify({
			// 					text: posts.data.message,
			// 					duration: 3000,
			// 					close: true,
			// 					gravity: "top",
			// 					position: "right",
			// 					className: "errorMessage",

			// 				}).showToast();
			// 			}

            //             $('#submitBtnDelete').html('Commit Withdrawal');
			// 			$('#submitBtnDelete').attr('disabled', false);
			// 			$('#submitBtnDelete').css('cursor', 'pointer');

			// 		}
			// 		else {
			// 			posts.data.error.map((mapping, i) => {
			// 				Toastify({
			// 					text: 'Oops!',
			// 					duration: 3000,
			// 					close: true,
			// 					gravity: "top",
			// 					position: "right",
			// 					className: "errorMessage",

			// 				}).showToast();
			// 			});
			// 			$('#submitBtnDelete').html('Commit Withdrawal');
			// 			$('#submitBtnDelete').attr('disabled', false);
			// 			$('#submitBtnDelete').css('cursor', 'pointer');
			// 		}
			// 	}
				
			// 	save(form_data);				

			// }

            function submitSuccessPendingRequest(){
                let notedx = $('#noted').val();
                
                var form_data = new FormData();
                form_data.append('id', idsett);
                form_data.append('status', 'done');
                form_data.append('noted', notedx);
                form_data.append('selected_payment_gateway_ids_combined', selected_payment_gateway_ids_combined);
                
                const save2 = async () => {
                    const posts2 = await axios.post('<?=base_url(); ?>CPanel_Admin/updateStatusTagihan', form_data).catch((err) => {
                        console.log(err.response);
                    });
            
                    if (posts2.status == 200) {
                        showData();
                        $('#modalShowListPendingPencairan').modal('toggle');
                        Toastify({
                            text: "Request berhasil diterima dan dana telah dicairkan",
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            className: "successMessage",

                        }).showToast();
                        
                        location.reload();

                    }
                }
                
                save2();
            }

			function getPendingNotification(){

				dataminor = [];

				const save2 = async () => {
					const posts2 = await axios.get('<?=base_url(); ?>CPanel_Admin/getInfoTagihan').catch((err) => {
						console.log(err.response);
					});
			
					if (posts2.status == 200) {

                        console.log(posts2.data.data);

							tableColumn = '';
							let totals=0;
							posts2.data.data.map((mapping,i)=>{
								dataminor.push({
									'instansi_id' : mapping.instansi_id,
									'nominal' : mapping.nominal,
									'id_request_pencairan' : mapping.id,
								})
							});

							renderDataJoint();
					}
				}

				save2();
				
			}

			function renderDataJoint(){
				datamajor.forEach(item => {
					const matchingEntries = dataminor.filter(entry => entry.instansi_id === item.instansi_id);

					// Add count
					item.count = matchingEntries.length;

					// Add sum of nominal
					item.sum_nominal = matchingEntries.reduce((sum, entry) => sum + parseInt(entry.nominal || 0, 10), 0);
				});

				console.log("final array",datamajor);
				
				let tableColumn = '';

				let totals=0;

				let num = 0;
				
				
				datamajor.map((mapping,i)=>{
					num += 1;
					let mxxx = mapping.jumlah_saldo_available_ipaymu??0;
					let myyy = mapping.jumlah_saldo_original??0;
					totals += parseInt(myyy);

					tableColumn +=`
						<tr id="${mapping.idINSTANSI}" ${localStorage.getItem('_idsett_paymu') != mapping.idINSTANSI ? style="background-color:#a6e6b5;":'style="background-color:#fff;"'}>
							<td>
								<div class="d-flex align-items-center">
									<div class="ms-2">
										<h6 class="mb-0 font-14">${num}</h6>
									</div>
								</div>
							</td>
							<td style="white-space: normal !important;max-width:200px;min-width:200px;">
							<img src="<?=base_url();?>app/assets/users/foto/${mapping.foto}" style="width:30px; height:30px; object-fit:cover;border-radius:5px;margin-bottom:20px;float:left; margin-right:10px;"/>
							${mapping.nama_instansi}
							</td>
							<td align="right" style="font-weight:800;">
							Rp${formatRupiah(parseInt(mxxx).toString())}
							</td>
							<td align="left">
								${(mapping.count)?'<div class="badge bg-danger p-2">'+mapping.count+' requests menunggu pencairan</div>':'Tidak ada'}
							</td>
							<td  align="right" class="text-right">
								<a href="#/" onclick="setInstansi('${mapping.instansi_id}','${mapping.account_number}','${mapping.account_number_cash}','${mxxx}','${mapping.pin}','${mapping.payment_gateway_ids_combined}');" style="padding:5px;font-size:12px;" class="btn ${(mapping.count)?'btn-success':'btn-dark'}"><i class='bx bx-right-arrow-alt'></i> Pencairan</a>
							</td>
							
						</tr>
					`;

				});
				$('.putContentHere').html(tableColumn);
				$('.totalSummaries').html("<b style='font-weight:900;font-size:33px;'>Rp"+formatRupiah(parseInt(totals).toString())+"</b>");

			}

            let selected_instansiID = '';
            let selected_accountNumber = '';
            let selected_accountNumberCash = '';
            let selected_nominal = '';
            let selected_pin = '';
            let selected_payment_gateway_ids_combined = '';

            function setInstansi(id, account_number,account_number_cash, nominal,pin,payment_gateway_ids_combined){
                console.log(account_number);

                 selected_instansiID = id;
                 selected_accountNumber = account_number;
                 selected_accountNumberCash = account_number_cash;
                 selected_nominal = nominal;
                 selected_pin = pin;
                 selected_payment_gateway_ids_combined = payment_gateway_ids_combined;

                 console.log("x", selected_accountNumber,selected_accountNumberCash);

                const notedTextareaxx = document.getElementById('noted');
                const passcodeInputxx = document.getElementById('passcode');
                const nominalxx = document.getElementById('nominal');
                notedTextareaxx.disabled = true;
                passcodeInputxx.disabled = true;
                nominalxx.disabled = true;

                let htmlx = '<font style="font-size:26px; font-weight:800;">List Pending Request</font>';

                if(account_number!="null"){
                    $('#modalShowListPendingPencairan').modal('toggle');

                    const save2 = async () => {
                        const posts2 = await axios.get('<?=base_url(); ?>CPanel_Admin/getInfoTagihan/'+id).catch((err) => {
                            console.log(err.response);
                        });
                
                        if (posts2.status == 200) {
                        if(posts2.data.status==true && posts2.data.data.length>0){
                            posts2.data.data.map((mapping,i)=>{

                                let xnote = mapping.noted;
                                if(xnote==""){
                                    xnote = '-';
                                }
                                htmlx += `
                                    <div class="col-12">
                                    <div class="card animatecard" data-value="${mapping.nominal}" data-id="${mapping.id}">
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
                            $('.putlisthere').html(htmlx);

                            const cards = document.querySelectorAll('.animatecard');

                            // Get textarea and input elements
                            const notedTextarea = document.getElementById('noted');
                            const passcodeInput = document.getElementById('passcode');
                            const nominal = document.getElementById('nominal');
                            


                            // Add click event listener to each card
                            cards.forEach(card => {
                                card.addEventListener('click', () => {
                                    // Remove 'active' class from all cards
                                    cards.forEach(c => c.classList.remove('active'));
                                    
                                    let dataValue = card.getAttribute('data-value');
                                    let dataID = card.getAttribute('data-id');

                                    idsett = dataID;
                                    console.log("idsett", idsett);

                                    let nominalTagihan = selected_nominal.split('.').join("");
                                    dataValue = dataValue.split('.').join("");

                                    console.log(dataValue, selected_nominal);
                                    if(dataValue > parseInt(selected_nominal)){
                                        Toastify({
                                            text: "Nominal melebihi saldo yang ada! Tombol Commit Withdrawal akan ter-disable!",
                                            duration: 3000,
                                            close: true,
                                            gravity: "top",
                                            position: "right",
                                            className: "errorMessage",

                                        }).showToast();

                                        $('#submitBtnDelete').prop('disabled', true);
                                    }else {
                                        $('#submitBtnDelete').prop('disabled', false);
                                    }

                                    // Add 'active' class to the clicked card
                                    card.classList.add('active');

                                    // Enable textarea and input when a card is active
                                    notedTextarea.disabled = false;
                                    passcodeInput.disabled = false;
                                    nominal.disabled = false;

                                    $('#nominal').val(formatRupiah(dataValue));
                                });
                            });

                   
                        }else {
                            htmlx =`
                                <div class="col-12 text-center">
                                    <img src="https://img.freepik.com/free-vector/no-data-concept-illustration_114360-536.jpg" alt="" style="width:300px;">
                                    <h5>You don't have any pending request right now.</h5>
                                </div>
                            `;
                            $('.putlisthere').html(htmlx);
                        }
					}
                    }

                    save2();
                }else {
                    Toastify({
                        text: "Not available for now!",
                        duration: 3000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        className: "errorMessage",

                    }).showToast();
                }
                
            }

		</script>