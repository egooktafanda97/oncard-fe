
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css"  />
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.1.7/css/fixedHeader.bootstrap4.min.css"  />
<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button-->
		  <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<footer class="page-footer">
			<p class="mb-0">Oncard v2.0 © <?=date('Y');?>. All right reserved.</p>
		</footer>
	</div>

	
	<div class="modal fade" id="modalDelete" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Hapus Data</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">Dengan memilih tombol <b>Hapus</b> dibawah ini, Anda dengan bersedia bahwa data tersebut dihapus pada sistem.<br/>Yakin ingin menghapus?</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
					<button type="button" onclick="commitDelete();" class="btn btn-primary">Hapus</button>
				</div>
			</div>
		</div>
	</div>
	
    <div class="modal fade" id="modalDeleteNew" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Dengan memilih tombol <b>Hapus</b> di bawah ini, Anda dengan bersedia bahwa data tersebut dihapus dari sistem.<br/>
                    Yakin ingin menghapus?<br/><br/>
                    
                    <label for="confirmInput" class="form-label">Ketik <b>COMMIT</b> untuk konfirmasi:</label>
                    <input type="text" id="confirmInput" class="form-control" placeholder="Ketik COMMIT" oninput="validateCommitInput()" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" id="commitDeleteBtn" onclick="commitDeleteNew();" class="btn btn-primary" disabled>Hapus</button>
                </div>
            </div>
        </div>
    </div>

	
	<div class="modal fade" id="modalDeleteGeneral" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Hapus Data</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">Dengan memilih tombol <b>Hapus</b> dibawah ini, Anda dengan bersedia bahwa data tersebut dihapus pada sistem.<br/>Yakin ingin menghapus?</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
					<button type="button" onclick="commitDeleteGeneral();" class="btn btn-primary">Hapus</button>
				</div>
			</div>
		</div>
	</div>
	<!--end wrapper-->
	
	<!-- Bootstrap JS -->
	<script src="<?=base_url();?>assets_oncard/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="<?=base_url();?>assets_oncard/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="<?=base_url();?>assets_oncard/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="<?=base_url();?>assets_oncard/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<script src="<?=base_url();?>assets_oncard/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="<?=base_url();?>assets_oncard/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
	<script src="<?=base_url();?>assets_oncard/plugins/chartjs/js/Chart.min.js"></script>
	<script src="<?=base_url();?>assets_oncard/plugins/chartjs/js/Chart.extension.js"></script>
    <script src="<?=base_url();?>assets_oncard/plugins/select2/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://npmcdn.com/flatpickr/dist/flatpickr.min.js"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/id.js"></script>
	<script src="<?=base_url();?>assets_oncard/plugins/bootstrap-material-datetimepicker/js/moment.min.js"></script>
	<script src="<?=base_url();?>assets_oncard/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.min.js"></script>
	<script src="<?=base_url();?>assets_oncard/js/index.js"></script>
	<!--app JS-->
	<script src="<?=base_url();?>assets_oncard/js/app.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@linways/table-to-excel@1.0.4/dist/tableToExcel.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://momentjs.com/downloads/moment.js"></script>
	<script src="https://momentjs.com/downloads/moment-with-locales.js"></script>
	<script type="text/javascript">moment.locale('id');</script>

    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.1.7/js/dataTables.fixedHeader.min.js"></script>

	<script type="text/javascript">

        let userNameX = '';
		let uidsett = '';
		let tablesett = '';
		function openModalDelete(id, table){
			$('#modalDelete').modal('toggle');
			uidsett = id;
			tablesett = table;
		}
		function openModalDeleteNew(id, table){
			$('#modalDeleteNew').modal('toggle');
			uidsett = id;
			tablesett = table;
		}
		
		function openModalDeleteGeneral(id, table){
			$('#modalDeleteGeneral').modal('toggle');
			uidsett = id;
			tablesett = table;
		}

        function validateCommitInput() {
            const input = document.getElementById("confirmInput").value.trim();
            const deleteBtn = document.getElementById("commitDeleteBtn");

            if (input === "COMMIT") {
                deleteBtn.removeAttribute("disabled");
            } else {
                deleteBtn.setAttribute("disabled", "true");
            }
        }

		
        $(document).ready(function () {
            var y = localStorage.getItem("menutoggle");

            y = localStorage.getItem("menutoggle");

            if(y){
                if(y=='open'){
                    $('.wrapper').removeClass('toggled');
                    $('.logo-icon').attr('src','https://oncard.id/assets_oncard/images/logo_ontime.png');
                    $('.logo-icon').removeClass('setkecil');
                }else {
                    $('.wrapper').addClass('toggled');
                    $('.logo-icon').attr('src','<?=base_url();?>assets_oncard/logo/o_navy.png');
                    $('.logo-icon').addClass('setkecil');
                }
            }else {
                localStorage.setItem("menutoggle","open");
            }

            // getAuth();
        });

        function getAuth(){
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
                        if(posts2.data.data[0].user.foto!=undefined && posts2.data.data[0].user.foto!='undefined' && posts2.data.data[0].user.foto!=null){
                            $('.image-profile').attr('src','<?=base_url();?>app/assets/users/foto/'+posts2.data.data[0].user.foto);
                        }

                        let statusInstansi = '';
                        if(posts2.data.data[1].status.status=='Active'){
                            // statusInstansi = `Verified <i class="bx bxs-badge-check text-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Instansi ini telah secara resmi bergabung dengan sistem Oncard.id" ></i>`;
                        }else {
                            statusInstansi = 'Not set';
                        }

                        $('.box1val').html(posts2.data.data[1].instansi.nama);
                        $('.box10val').html(posts2.data.data[1].instansi.alamat);
                        $('.box1val2').html(statusInstansi);

				        userNameX = posts2.data.data[0].user.username;
						accountNumberX = posts2.data.data[0].account_number;
                        posts2.data.data.map((mapping,i)=>{
                            if(mapping.account_type=='business' && mapping.account_level=='agency'){
                                accountNumberBisnisX = mapping.account_number;
                            }
                        });

                        console.log("accountNumberBisnisX",accountNumberBisnisX);
                        
						idInstansiX = posts2.data.data[0].instansi.id;
						instansiNameX = posts2.data.data[0].instansi.nama;
                        kodeInstansiX = posts2.data.data[0].instansi.kode_instansi;
						roleUserX = posts2.data.data[0].user.role;
						bankAccountNumber = posts2.data.data[0].bank_account_number;
                    }
				}
				save2();
			}

        function changemethod(){
            var myElement = document.getElementById("menuicosss");
            if (myElement && myElement.classList.contains("toggled")) {
                localStorage.setItem("menutoggle","open");
            } else {
                localStorage.setItem("menutoggle","close");
            }

            console.log(myElement.classList.contains("toggled"));
        }

        var hoveredElement = document.querySelector(".sidebar-wrapper");
        hoveredElement.addEventListener("mouseover", function () {
            var myElement = document.getElementById("menuicosss");
            
            if (myElement && myElement.classList.contains("toggled") ) {
                $('.wrapper').addClass('sidebar-hovered');
                $('.logo-icon').attr('src','https://oncard.id/assets_oncard/images/logo_ontime.png');
                $('.logo-icon').removeClass('setkecil');
                
            } else {
                $('.wrapper').removeClass('sidebar-hovered');
                $('.logo-icon').attr('src','https://oncard.id/assets_oncard/images/logo_ontime.png');
                $('.logo-icon').removeClass('setkecil');
                
            }

        });
        hoveredElement.addEventListener("mouseout", function () {
            var myElement = document.getElementById("menuicosss");
            if (myElement && myElement.classList.contains("toggled")) {
                $('.wrapper').removeClass('sidebar-hovered');
                $('.logo-icon').attr('src','<?=base_url();?>assets_oncard/logo/o_navy.png');
                $('.logo-icon').addClass('setkecil');
            } else {
                $('.wrapper').addClass('sidebar-hovered');
                $('.logo-icon').attr('src','https://oncard.id/assets_oncard/images/logo_ontime.png');
                $('.logo-icon').removeClass('setkecil');
            }
        });

		function underMaintanance(){
			Toastify({
				text: "Fitur ini sedang dalam pengembangan dan pengujian",
				duration: 3000,
				close: true,
				gravity: "bottom",
				position: "left",
				className: "infoMessage",

			}).showToast();
		}

		function commitDelete(){
			let url = '';
			if(tablesett == 'general'){
				url = '<?=api_url_core(); ?>api/v1/'+tablesett+'/' + uidsett;
			}else if(tablesett == 'card-reader'){
				url = '<?=api_url_core(); ?>api/v1/'+tablesett+'/destory/' + uidsett;
			}else {
				url = '<?=api_url_core(); ?>api/v1/'+tablesett+'/destroy/' + uidsett;
			}

			const save = async (uidsett) => {
				const posts = await axios.delete(url, {
					headers: {
						'Authorization': 'Bearer ' + localStorage.getItem('_token')
					}
				}).catch((err) => { 

					if(err.error){
						Toastify({
							text: 'Maaf. Data tidak ditemukan.',
							duration: 3000,
							close: true,
							gravity: "bottom",
							position: "left",
							className: "errorMessage",

						}).showToast();
						return false;
					}

					for (const key in err.response.data.error) {
							Toastify({
								text: err.response.data.error[key],
								duration: 3000,
								close: true,
								gravity: "bottom",
								position: "left",
								className: "errorMessage",

							}).showToast();
						}
				});

				if (posts.status == 200) {

					Toastify({
						text: posts.message,
						duration: 3000,
						close: true,
						gravity: "top",
						position: "left",
						className: "successMessage",

					}).showToast();

					showData();
					uidsett = '';
					tablesett = '';

					$('#modalDelete').modal('toggle');


				} else {

				}
			}

			save(uidsett);
		}
		
        
        function commitDeleteNew(){
			let url = '';
			
            url = '<?=api_url_core(); ?>api/master/'+tablesett+'/' + uidsett;

			const save = async (uidsett) => {
				const posts = await axios.delete(url, {
					headers: {
						'Authorization': 'Bearer ' + localStorage.getItem('_token')
					}
				}).catch((err) => { 

					if(err.error){
						Toastify({
							text: 'Maaf. Data tidak ditemukan.',
							duration: 3000,
							close: true,
							gravity: "bottom",
							position: "left",
							className: "errorMessage",

						}).showToast();
						return false;
					}

					for (const key in err.response.data.error) {
							Toastify({
								text: err.response.data.error[key],
								duration: 3000,
								close: true,
								gravity: "bottom",
								position: "left",
								className: "errorMessage",

							}).showToast();
						}
				});

				if (posts.status == 200) {

					Toastify({
						text: posts.message,
						duration: 3000,
						close: true,
						gravity: "top",
						position: "left",
						className: "successMessage",

					}).showToast();
                    
                    
                    location.reload();


				} else {

				}
			}

			save(uidsett);
		}

		let roleUserX = '';
		let accountNumberX = '';
		let accountNumberBisnisX = '';
		let userIDX = '';
		let bankAccountNumber = '';
        let instansiNameX = '';
        
        let kodeInstansiX = '';
        let idInstansiX = '';
        function formatRupiah(angka, prefix){
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiah     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if(ribuan){
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}
 
			rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
			return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
		}

		function printDiv() {
			var printContents = document.getElementById('divToPRINT').outerHTML;
			var originalContents = document.body.innerHTML;

			let m = document.body.innerHTML = `
			<!-- Bootstrap CSS -->
			<link href="<?=base_url();?>assets_oncard/css/bootstrap.min.css" rel="stylesheet">
			<link href="<?=base_url();?>assets_oncard/css/bootstrap-extended.css" rel="stylesheet">
			<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
			<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:ital,wght@0,200;0,600;0,800;1,800&display=swap" rel="stylesheet">
			<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css/style_universal.css">
			<style type="text/css">body {font-family: 'JetBrains Mono', monospace;
			}* { -webkit-print-color-adjust: exact !important;color-adjust: exact !important;print-color-adjust: exact !important;}</style>
			`+printContents;
			

			(function() {

			var beforePrint = function() {
				// console.log('Functionality to run before printing.');
				document.body.innerHTML = m;
			};

			var afterPrint = function() {
				// console.log('Functionality to run after printing');
				
				setTimeout(function() {
						document.body.innerHTML = originalContents;
						location.reload();
				}, 1000);
				
			};

			if (window.matchMedia) {
				var mediaQueryList = window.matchMedia('print');
				mediaQueryList.addListener(function(mql) {
					if (mql.matches) {
						beforePrint();
					} else {
						afterPrint();
					}
				});
			}

			window.onbeforeprint = beforePrint;
			window.onafterprint = afterPrint;
           
			}());

			window.print();
		}
		
        function printDivNEW() {
			var printContents = document.getElementById('divToPRINT').outerHTML;
			var originalContents = document.body.innerHTML;

            let m =  `
			<!-- Bootstrap CSS -->
			<link href="<?=base_url();?>assets_oncard/css/bootstrap.min.css" rel="stylesheet">
			<link href="<?=base_url();?>assets_oncard/css/bootstrap-extended.css" rel="stylesheet">
			<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
			<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:ital,wght@0,200;0,600;0,800;1,800&display=swap" rel="stylesheet">
			<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css/style_universal.css">
			<style type="text/css">
            body {font-family: 'JetBrains Mono', monospace;
			}* { -webkit-print-color-adjust: exact !important;color-adjust: exact !important;print-color-adjust: exact !important;}
            </style>
			`+printContents;
			

            localStorage.setItem("struk", m);

            window.open("<?=base_url();?>CPanel_Admin/PrintStrukAuto", '_blank', 'location=yes,height=570,width=220,scrollbars=yes,status=yes');

		}

		function saveToExcel(className){
			let table = document.getElementsByClassName(className);
			TableToExcel.convert(table[0], { 
			name: `excel_oncard_report_${moment(new Date()).format("ddddDDMMMMYYYY-Hms")}.xlsx`,
			sheet: {
			name: 'Sheet 1'
			}
			});
		}

		function save2PDF(idName){
			$('#btnSave2PDF').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Sedang memproses...');
			$('#btnSave2PDF').prop("disabled", true);

			var element = document.getElementById(idName);
			var opt = {
			margin:       0.2,
			filename:     `pdf_core_oncard_report_${moment(new Date()).format("dddd_DD_MMMM_YYYY-H_m_s")}.pdf`,
			image:        { type: 'jpeg', quality: 1 },
			html2canvas:  { scale: 2 },
			jsPDF:        { unit: 'in', format: 'letter', orientation: 'portrait' },
			pagebreak: { mode: ['avoid-all', 'css', 'legacy'] }
			};

			// New Promise-based usage:
			html2pdf().set(opt).from(element).save().then(
			function (pdf) {

				$('#btnSave2PDF').html('<i class="bx bxs-file-export"></i> Export PDF');
				$('#btnSave2PDF').prop("disabled", false);

				// alert('sukses');
				//Success here
				
			}, 
			function(){
				alert('gagal');
				$('#btnSave2PDF').html('<i class="bx bxs-file-export"></i> Export PDF');
				$('#btnSave2PDF').prop("disabled", false);
				//Error Here
				
			});
		}

		// Membuat pagination detail
		function createPaginations(params, 
			paginationContainer, 
			PaginationDetailsContainer,
			linkTo,
			) {

			let ril = '';
				
			const collections_data = params;
			let _html_paging_left = ``;
			let _html_paging_right = ``;
			let _html_paging = ``;
			const counting_page = collections_data?.links?.length;

			const paginations = collections_data?.links?.map((x, inx) => {
				if (inx === 0) {
					_html_paging_left += `
								<li class="page-item ${x.url ? '' : 'disabled'}">
									<button onclick="${linkTo}('${x?.url}')" class="page-link">
										${x.label}
									</button>
								</li>`;
				} else if (inx === (counting_page - 1)) {
					_html_paging_right += `
								<li class="page-item ${x.url ? '' : 'disabled'}">
									<button onclick="${linkTo}('${x?.url}')" class="page-link">
										${x.label} 
									</button>
								</li>`;
				} else {
					_html_paging += `
							<li class="page-item ${x?.active ? 'active' : ''} ${x.url ? '' : 'disabled'}">
								<button onclick="${linkTo}('${x?.url}')" class="page-link">${x?.label}</button>
							</li>
							`;
				}
				ril = x?.url;
			});

			const _html_paging_set = `
						<div class="pagination justify-content-center">
								${_html_paging_left}
								${_html_paging}
								${_html_paging_right}
								</div>
						</div>
					`;
			$("#" + paginationContainer).html(_html_paging_set);

			// create pagination details
			const paginationDetails = `Menampilkan ${params?.from}-${params?.to} dari ${params?.total} jumlah seluruh data.`;
			$("#" + PaginationDetailsContainer).html(paginationDetails);
		}
		function createPaginationsNEW(params, 
			paginationContainer, 
			PaginationDetailsContainer,
			linkTo,
            addon
			) {

			let ril = '';
				
			const collections_data = params;
			let _html_paging_left = ``;
			let _html_paging_right = ``;
			let _html_paging = ``;
			const counting_page = collections_data?.links?.length;

			const paginations = collections_data?.links?.map((x, inx) => {
				if (inx === 0) {
					_html_paging_left += `
								<li class="page-item ${x.url ? '' : 'disabled'}">
									<button onclick="${linkTo}('${x?.url}${addon}')" class="page-link">
										${x.label}
									</button>
								</li>`;
				} else if (inx === (counting_page - 1)) {
					_html_paging_right += `
								<li class="page-item ${x.url ? '' : 'disabled'}">
									<button onclick="${linkTo}('${x?.url}${addon}')" class="page-link">
										${x.label} 
									</button>
								</li>`;
				} else {
					_html_paging += `
							<li class="page-item ${x?.active ? 'active' : ''} ${x.url ? '' : 'disabled'}">
								<button onclick="${linkTo}('${x?.url}${addon}')" class="page-link">${x?.label}</button>
							</li>
							`;
				}
				ril = x?.url;
			});

			const _html_paging_set = `
						<div class="pagination justify-content-center">
								${_html_paging_left}
								${_html_paging}
								${_html_paging_right}
								</div>
						</div>
					`;
			$("#" + paginationContainer).html(_html_paging_set);

			// create pagination details
			const paginationDetails = `Menampilkan ${params?.from}-${params?.to} dari ${params?.total} jumlah seluruh data.`;
			$("#" + PaginationDetailsContainer).html(paginationDetails);
		}

        function removeHtmlTags(inputHtml) {
        const tempElement = document.createElement('div');

        tempElement.innerHTML = inputHtml;

        const textContent = tempElement.textContent || tempElement.innerText;

        tempElement.remove();

        return textContent;
        }

        function disableAllInputs(disabled = true) {
            document.querySelectorAll("input, button, select, textarea").forEach(el => {
                el.disabled = disabled;
            });
        }
	</script>
</body>

</html>