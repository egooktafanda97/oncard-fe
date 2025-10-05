<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.14/index.global.min.js"></script>
<style>
    #calendar {
    max-width: 100%;
    margin: 40px auto;
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
								<li class="breadcrumb-item active" aria-current="page">CASHLESS</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
			  
				<div class="card">
					<div class="card-body">
						<div class="col mb-4 gap-3">
							<div class="position-relative" style="display:flex; gap:15px;">
								<!-- <input type="text" class="form-control ps-5 radius-30" placeholder="Ketik nama agensi"> <span class="position-absolute top-50 product-show translate-middle-y"><i class="bx bx-search"></i></span> -->
                                <button type="button" onclick="window.location.href='<?=base_url();?>CPanel_Admin/IpaymuCreateInvoice';" class="btn btn-success d-block" style="margin-right:0!important;border-radius:0px!important; padding:16px;"><i class="bx bx-plus"></i> Create Invoice</button>
                                <button type="button" onclick="window.location.href='<?=base_url();?>CPanel_Admin/IpaymuHistoryInvoice';" class="btn btn-primary d-block" style="margin-right:0!important;border-radius:0px!important; padding:16px; "><i class="bx bx-file"></i> History Invoice</button>
							</div>
							
							<div style=" margin-top:20px; margin-bottom:20px; text-align:right;">
								<font style="font-size:20px;" class="totalSummaries">Grand total : Rp0</font>
							</div>
						</div>
						
						<div class="table-responsive">

                         <table id="maintable" class="table mb-0">
								<thead class="table-light">
									<tr>
										<th>No.</th>
										<th>Nama agensi</th>
										<th align="right" style="text-align:right!important;">Saldo IpayMu</th>
										<th align="right" style="text-align:right!important;">Aksi</th>
										<!-- <th>Aksi</th> -->
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
            
			$(document).ready(function () {
                showData();
            });
			function showData(){
				let num = 0;
				let tableColumn = '';
				tableColumn += `<tr><td colspan="7" class="text-center">Loading...</td></tr>`;
				$('.putContentHere').html(tableColumn);
				
				const save2 = async () => {
					const posts2 = await axios.get('<?=base_url(); ?>CPanel_Admin/getDataAgensiAllIpaymu').catch((err) => {
						console.log(err.response);
					});
			
					if (posts2.status == 200) {

                        console.log(posts2.data.data);

							tableColumn = '';
							let totals=0;
							posts2.data.data.map((mapping,i)=>{
							num += 1;
                            let mxxx = mapping.jumlah_saldo_available_ipaymu??0;
							totals += parseInt(mxxx);
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
                                    ${mapping.nama}
                                    </td>
                                    <td align="right">
                                    Rp${formatRupiah(parseInt(mxxx).toString())}
                                    </td>
                                    <td align="right">
										<div class="">
											<a href="#/" onclick="setInstansi('${mapping.idINSTANSI}');" class="me-3"><i class='bx bx-right-arrow-alt'></i> Cairkan</a>
										</div>
									</td>
									
								</tr>
							`;
							});
							
                        $('.putContentHere').html(tableColumn);

						let saldoclearipaymu = totals+115500;
                        $('.totalSummaries').html("<b>Grand total : Rp"+formatRupiah(parseInt(totals).toString())+"</b><br/><small style='font-size:10px'>Saldo di ipaymu (Rp"+formatRupiah(saldoclearipaymu.toString())+") Karena saldo awal dari pengetesan dulu : Rp121.500. (2x pencairan - Rp6.000) = Rp115.500</small>");
							
					}
				}
				
				save2();
				
				
			}

            function setInstansi(id){
                localStorage.setItem('_idsett_paymu', id);
                window.location.href='<?=base_url();?>CPanel_Admin/IpaymuCreateInvoiceByInstansiID/'+id;
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

            $('.box1val').attr('style','display:none;');
                $('.box10val').attr('style','display:none;');
		</script>