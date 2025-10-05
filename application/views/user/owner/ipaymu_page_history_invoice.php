<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.14/index.global.min.js"></script>
<style>
    #calendar {
    max-width: 100%;
    margin: 40px auto;
    }
    .button-container {
        display: grid;
        grid-template-columns: repeat(15, 1fr);
        gap: 10px;
        margin-bottom: 20px;
    }

    .date-button {
        border-radius:10px;
        border:none;
        background-color:#f2f2f2;
    }

</style>

<style>.invoice-box{max-width:860px;margin:auto;padding:30px;border:1px solid #eee;box-shadow:0 0 10px rgba(0,0,0,.15);font-size:16px;line-height:24px;font-family:'Helvetica Neue',Helvetica,Helvetica,Arial,sans-serif;color:#555}.invoice-box table{width:100%;line-height:inherit;text-align:left}.invoice-box table td{padding:5px;vertical-align:top}.invoice-box table tr td:nth-child(2){text-align:right}.invoice-box table tr.top table td{padding-bottom:20px}.invoice-box table tr.top table td.title{font-size:45px;line-height:45px;color:#333}.invoice-box table tr.information table td{padding-bottom:40px}.invoice-box table tr.heading td{background:#eee;border-bottom:1px solid #ddd;font-weight:700}.invoice-box table tr.details td{padding-bottom:20px}.invoice-box table tr.item td{border-bottom:1px solid #eee}.invoice-box table tr.item.last td{border-bottom:none}.invoice-box table tr.total td:nth-child(2){border-top:2px solid #eee;font-weight:700}@media only screen and (max-width:600px){.invoice-box table tr.top table td{width:100%;display:block;text-align:center}.invoice-box table tr.information table td{width:100%;display:block;text-align:center}}.invoice-box.rtl{direction:rtl;font-family:Tahoma,'Helvetica Neue',Helvetica,Helvetica,Arial,sans-serif}.invoice-box.rtl table{text-align:right}.invoice-box.rtl table tr td:nth-child(2){text-align:left}</style>

<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3" >HISTORY INVOICE</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
                                <li class="breadcrumb-item active" aria-current="page"><a href='<?=base_url();?>CPanel_Admin/IpaymuPanel'>Ipaymu Control</a></li>
								<li class="breadcrumb-item active" aria-current="page">History invoice</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->

                <div class="col-12 pendingPayment">
                    
                </div>

			  
			</div>
		</div>


        <div class="modal fade" id="modalSetInvoice" tabindex="-1" aria-hidden="true"  data-bs-keyboard="false" data-bs-backdrop="static">
			<div class="modal-dialog modal-lg modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Detail Invoice</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						
					</div>
					<div class="modal-footer text-center">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
					</div>
				</div>
			</div>
		</div>
        
        <div class="modal fade" id="modalSetPin" tabindex="-1" aria-hidden="true"  data-bs-keyboard="false" data-bs-backdrop="static">
			<div class="modal-dialog modal-sm modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-body">
                        <h3>Validasi</h3>
                        <input type="password" id="pinc" placeholder="Masukkan kode keamanan anda." class="form-control"/>
					</div>
					<div class="modal-footer text-center">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Nanti</button>
						<button type="button" class="btn btn-success" onclick="confirmValidateInvoice();">Konfirmasi</button>
					</div>
				</div>
			</div>
		</div>

        <script src="https://momentjs.com/downloads/moment.js"></script>
	<script src="https://momentjs.com/downloads/moment-with-locales.js"></script>
	<script type="text/javascript">moment.locale('id');</script>

        <script type="text/javascript">

            let invoiceID='';
            


            // document.addEventListener("DOMContentLoaded", function () {
            //     const buttonContainer = document.getElementById("buttonContainer");
            //     const selectedDateDiv = document.getElementById("selectedDate");

            //     const year = new Date().getFullYear();
            //     const month = new Date().getMonth() + 1; // getMonth() is zero-based

            //     const daysInMonth = new Date(year, month, 0).getDate();

            //     for (let day = 1; day <= daysInMonth; day++) {
            //         const button = document.createElement("button");
            //         button.textContent = day;
            //         button.classList.add('date-button');
            //         button.addEventListener("click", function () {
            //             const formattedDate = `${year}-${String(month).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
            //             selectedDateDiv.textContent = `Selected Date: ${formattedDate}`;
            //         });
            //         buttonContainer.appendChild(button);
            //     }
            // });

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
            let instansi_id_pool = [];
            let group_payment_ids = [];
            let instansi_json_pool = [];
            let html_parsing = [];
            let date_selected = '';

            $('#modalSetInvoice').on('hidden.bs.modal', function () {
                // $('#modalSetCard').modal('toggle');
            });

            function modalSetInvoice(str){

                idsett = str;

                const specificItem = html_parsing.find(item => item.id === str);
                console.log(specificItem.html);

                let foot = `
                    <div class="row mt-3 mb-3">
                    <div class="col-12">
                        <div class="alert alert-success"><b>STATUS</b> PEMBAYARAN BERHASIL!</div>
                    </div>
                    </div>


                `;
                $('#modalSetInvoice .modal-body').html(foot+specificItem.html);

                $('#modalSetInvoice').modal('toggle');
            }

            function confirmValidateInvoice(){

                let pin = $('#pinc').val();
                if(pin!='PKD2020'){
                    Toastify({
                        text: 'Kode akses tidak diterima!',
                        duration: 3000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        className: "errorMessage",

                    }).showToast();
                    return false;
                }
                var form_data = new FormData();
                form_data.append('id', idsett);
                
				const save2 = async () => {
					const posts2 = await axios.post('<?=base_url(); ?>CPanel_Admin/updateStatusInvoicePaymentGateways', form_data).catch((err) => {
						console.log(err.response);
					});
			
					if (posts2.status == 200) {

                       location.reload();
							
					}
				}
				
				save2();
            }

            function modalSetPin(str){
                $('#modalSetPin').modal('toggle');
            }

            let first_date_current_month ='';
            let last_date_current_month ='';
            
            
			$(document).ready(function () {
                // showData();
                getHistoryPayment();

                //get current date pool!
                first_date_current_month = moment().startOf('month').format('YYYY-MM-DD');
                last_date_current_month = moment().endOf('month').format('YYYY-MM-DD');
                console.log(first_date_current_month,last_date_current_month);

            });
			
            function getHistoryPayment(){
				let num = 0;
				let tableColumn = '';
				tableColumn += `<tr><td colspan="7" class="text-center">Loading...</td></tr>`;
				$('.putContentHere').html(tableColumn);
				
				const save2 = async () => {
					const posts2 = await axios.get('<?=base_url(); ?>CPanel_Admin/getDataAgensiAllIpaymuHistoryInvoice').catch((err) => {
						console.log(err.response);
					});
			
					if (posts2.status == 200) {

                        // console.log(posts2.data.data);

                        if(posts2.data.data.length>0){

                            tableColumn = `
                            <div class="card">
                                <div class="card-header p-3">
                                    <h5>Tagihan Terselesaikan</h5>
                                </div>
                                <div class="card-body">
                                    <div class="col-12 table-responsive">
                                    <table class="table table-striped">
                                    
                            `;
                            let num=1;
                            
							posts2.data.data.map((mapping,i)=>{

                                let htmlparsed = mapping.html;
                                htmlparsed = htmlparsed.replace(/'/g, "");

                                html_parsing.push({
                                    "id" : mapping.id,
                                    "html" : mapping.html,
                                })

                                tableColumn +=`
                                    <tr>
                                        <td>${num++}</td>
                                        <td>Withdrawal tgl. ${mapping.date_invoice}</td>
                                        <td>${mapping.invoice}</td>
                                        <td align="right"><button type="button" class="btn btn-sm btn-secondary" onclick="modalSetInvoice('${mapping.id}');">Lihat Invoice</button></td>
                                    </tr>
                                `;                           
							});

                            tableColumn +=`
                                    </table>
                                    </div>
                                </div>
                            </div>`;
							
                        $('.pendingPayment').html(tableColumn);
                        console.log(html_parsing);
                        }
					}
				}
				
				save2();
				
				
			}
			
            
           
            function setShowData(){
                // console.log(str);

                group_payment_ids = [];

                date_selected = str;

                invoiceID = generateRandomStringWithTimestamp();

                const save2 = async () => {
					const posts2 = await axios.get('<?=base_url(); ?>CPanel_Admin/getDataAgensiAllIpaymuHistoryInvoice/').catch((err) => {
						console.log(err.response);
					});
			
					if (posts2.status == 200) {

                        // console.log(posts2.data.data);

							tableColumn = '';

                            let dm = 0;
                            // console.log("totalnya",dm)

                            tableColumn = `
                            `;
							posts2.data.data.map((mapping,i)=>{
							let mxxx = mapping.jumlah_saldo_available_ipaymu??0;
							tableColumn +=`
                                <tr class="item">
                                    <td>${mapping.nama}</td>
                                    <td>Rp${formatRupiah(parseInt(mxxx).toString())}</td>
                                </tr>
							`;
							});

                            tableColumn +=`
                            `;
							
                        $('.contentx').html(tableColumn);

                        console.log("acccc",group_payment_ids);
							
					}
				}

                save2();
                
            }

            function submitCreateInvoice(){
				let num = 0;
				let tableColumn = '';
				tableColumn += `<tr><td colspan="7" class="text-center">Loading...</td></tr>`;
				$('.putContentHere').html(tableColumn);


                // return false;

                var form_data = new FormData();
                form_data.append('date_given', date_selected);
                form_data.append('invoice', invoiceID);
                form_data.append('list_instansi', JSON.stringify(instansi_json_pool));
                form_data.append('pg_ids', group_payment_ids);
                form_data.append('html', $('#inv_x').html());
                
				const save2 = async () => {
					const posts2 = await axios.post('<?=base_url(); ?>CPanel_Admin/createInvoie', form_data).catch((err) => {
						console.log(err.response);
					});
			
					if (posts2.status == 200) {

                        if(posts2.data.status==true){
                            Toastify({
                                text: posts2.data.message,
                                duration: 3000,
                                close: true,
                                gravity: "top",
                                position: "right",
                                className: "successMessage",

                            }).showToast();

                            location.reload();

                        }else {
                            Toastify({
                                text: posts2.data.message,
                                duration: 3000,
                                close: true,
                                gravity: "top",
                                position: "right",
                                className: "errorMessage",

                            }).showToast();
                        }
                        
							
					}
				}
				
				save2();
				
				
			}

            function setInstansi(id){
                localStorage.setItem('_idsett_paymu', id);
                window.location.href='<?=base_url();?>CPanel_Admin/IpaymuPanelDetail';
            }

           
            function openDialogImport(str){
                idsett = str;
                $('#modalImportData').modal('toggle');
                $('#kodeInstansi').val(idsett);
            }
            
            function openDialogLoginByPass(str,str2){
                $('#namaInstansi').val(str);
                $('#userInstansi').val(str2);
                $('#modalLoginByPass').modal('toggle');
            }

            function generateRandomStringWithTimestamp() {
                const timestamp = moment(Date.now()).format('DDMMYYYYHHmmss'); // Get current timestamp in milliseconds
                const randomString = Math.random().toString(36).substring(2, 8); // Generate random string
                
                return `${randomString.toUpperCase()}_${timestamp}`;
            }

            $('.box1val').attr('style','display:none;');
                $('.box10val').attr('style','display:none;');
		</script>