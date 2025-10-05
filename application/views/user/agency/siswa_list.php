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

<style type="text/css">
    .invoice-card {
    display: flex;
    flex-direction: column;
    position: relative;
    padding: 10px 2em;
    top: 0%;
    left: 50%;
    transform: translate(-50%, 0%);
    min-height: 25em;
    width: 22em;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0px 10px 30px 5px rgba(0, 0, 0, 0.15);
    }

    .invoice-card > div {
    margin: 5px 0;
    }

    .invoice-title {
    flex: 3;
    }

    .invoice-title #date {
    display: block;
    /* margin: 8px 0; */
    font-size: 12px;
    }

    .invoice-title #main-title {
    display: flex;
    justify-content: space-between;
    margin-top: 0em;
    }

    .invoice-title #main-title h4 {
    letter-spacing: 2.5px;
    }

    .invoice-title span {
    color: rgba(0, 0, 0, 0.4);
    }

    .invoice-details {
    flex: 1;
    border-top: 0.5px dashed grey;
    display: flex;
    align-items: center;
    }

    .invoice-table {
    width: 100%;
    border-collapse: collapse;
    }

    .invoice-table thead tr td {
    font-size: 12px;
    letter-spacing: 1px;
    color: grey;
    padding: 8px 0;
    }

    .invoice-table thead tr td:nth-last-child(1),
    .row-data td:nth-last-child(1),
    .calc-row td:nth-last-child(1)
    {
    text-align: right;
    }

    .invoice-table tbody tr td {
        padding: 8px 0;
        letter-spacing: 0;
    }

    .invoice-table .row-data #unit {
    text-align: center;
    }

    .invoice-table .row-data span {
    font-size: 13px;
    color: rgba(0, 0, 0, 0.6);
    }

    .invoice-footer {
    flex: 1;
    display: flex;
    justify-content: flex-end;
    align-items: center;
    }

    .invoice-footer #later {
    margin-right: 5px;
    }

</style>
<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Siswa</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Daftar Siswa</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
			  
				<div class="card">
					<div class="card-body">
						<div class="d-lg-flex align-items-center mb-4 gap-3">
							<div class="position-relative">
								<input type="text" class="form-control ps-5 radius-30" id="floatingInput" placeholder="Ketik nama siswa"> <span class="position-absolute top-50 product-show translate-middle-y"><i class="bx bx-search"></i></span>
							</div>
						  <div class="ms-auto">
                            <a href="#/" onclick="openmodalSetCard('saldo')" class="btn btn-warning radius-30 mt-2 me-3 mt-lg-0" style="color:white;"><i class="bx bx-scan" ></i> Saldo Siswa</a>
                            <a href="#/" onclick="openmodalSetCard('pencairan')" class="btn btn-primary radius-30 mt-2 me-3 mt-lg-0" style="color:white;"><i class="bx bx-transfer-alt" ></i> Pencairan</a>
							<a href="<?=base_url().$function.'/siswaManage';?>" class="btn btn-success radius-30 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i> Tambah Siswa</a>
						  </div>
						</div>
						<div class="table-responsive">
						<!-- <button class="btn btn-sm btn-outline-primary me-2 mb-3" id="btnSave2PDF" onclick="save2PDF('tabelPrint');" style="border-radius:0px;"><i class="bx bxs-file-export"></i> Export PDF</button>
						<button class="btn btn-sm btn-outline-success me-2 mb-3" onclick="saveToExcel('tabelsiswa');" style="border-radius:0px;"><i class="bx bxs-file-export"></i> Export Excel</button> -->
						<!-- <a class="btn btn-sm btn-outline-secondary me-2 mb-3" href="<?=base_url();?>CPanel_Admin/SiswaAllRender" style="border-radius:0px;" target="_blank"><i class="bx bx-grid-small"></i> Lihat Semua Data</a> -->
							<table class="table mb-0 tabelsiswa" id="tabelPrint">
								<thead class="table-light">
									<tr>
										<th>#NIS</th>
										<th>Nama siswa</th>
										<th>Koneksi Kartu</th>
										<!-- <th>Diinput Pada</th> -->
										<th>PIN</th>
										<th>Saldo</th>
										<th>Tambah Saldo</th>
										<th>Limit Transaksi</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody class="putContentHere">
								</tbody>
							</table>

							<!-- Pagination -->
							<nav class="container mt-5"
								id="siswa-pagination-container"
								aria-label="Page navigation example">
							</nav>

							<!-- Pagination details -->
							<div class="container mt-1 text-muted text-center">
								<small id="siswa-pagination-details"></small>
							</div>

						</div>
					</div>
				</div>


			</div>
		</div>

		<div class="modal fade" id="modalSetCard" tabindex="-1" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content" onclick="putFocusScanCard();">
					<div class="modal-header">
						<h5 class="modal-title">Connect to Card</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						Pastikan indikator dibawah ini sudah bergaris <font class="text-success">hijau</font> terlebih dahulu.
						<small class="text-muted"><i>Apabila garis hijau belum muncul, klik pada gambar dibawah ini untuk mengaktifkan indikator tersebut</i></small>
						<br/>
						
						<img id="scanCard" src="<?=base_url();?>assets_oncard/images/scan_kard2.webp"  style="width:100%; border-radius:20px; display:block; margin-top:15px; margin-bottom:15px;"/>
						<p class="text-center" id="textIndicator" style="margin:auto; transform:scale(0);transition:all 0.2s linear 0s;padding:5px; padding-left:25px; padding-right:25px; font-size:14px; border-radius:100px; background:#53edaa; color:#fff;"></p>
						<input type="text" style="transform:scale(0)!important; margin:auto; text-align:center; width:100%; border:none;outline:none!important;" id="textToCard"/>
						
					</div>
					<div class="modal-footer text-center">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
						<button type="button" onclick="commitConnectToCard();" id="btnConnectToCard" disabled class="btn btn-outline-primary">Status</button>
					</div>
				</div>
			</div>
		</div>
		
        <div class="modal fade" id="modalReleaseCard" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Lepaskan dari Kartu</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">Dengan memilih tombol <b>Lepaskan</b> dibawah ini, Anda dengan bersedia bahwa data tersebut akan dilepas dengan kartu tersebut pada sistem.<br/>Yakin ingin melepaskan dengan kartu?</div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="button" onclick="commitRelease();" class="btn btn-primary">Lepaskan</button>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="modal fade" id="modalReleaseCardNew" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                    <div class="badge bg-danger text-white">New Feature</div>    
                    Lepaskan dari Kartu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-info" role="alert">
                    Setelah proses ini disetujui, Pengguna ini tetap dapat melakukan transaksi menggunakan mode darurat tanpa kartu hingga <b>kartu yang baru</b> berhasil dikoneksikan.
                    </div>

                    <label for="" class="form-label">Pilih mode pelepasan kartu : </label>
                    <div id="releaseModes" class="d-flex flex-column gap-3 mb-4">
                    <div class="mode-option p-3 border rounded" data-mode="hilang">
                        <div class="fw-bold">Kartu Hilang</div>
                        <small class="text-muted">Saldo minimal Rp35.000 diperlukan untuk melanjutkan proses kartu hilang.</small>
                    </div>
                    <div class="mode-option p-3 border rounded" data-mode="rusak">
                        <div class="fw-bold">Kartu Rusak</div>
                        <small class="text-muted">Saldo minimal Rp35.000 diperlukan untuk melanjutkan proses kartu rusak.</small>
                    </div>
                    <div class="mode-option p-3 border rounded" data-mode="malfungsi">
                        <div class="fw-bold">Kartu Malfungsi</div>
                        <small class="text-muted">Tidak memerlukan saldo tambahan. Proses dapat langsung dilanjutkan.</small>
                    </div>
                    </div>

                    <div class="mb-3">
                    <label for="noteInput" class="form-label">Catatan (Opsional)</label>
                    <textarea id="noteInput" class="form-control" rows="3" placeholder="Tulis catatan di sini..."></textarea>
                    </div>
                    
                    <div class="mb-3">
                    <label for="pinOto" class="form-label">Pin Otoritas</label>
                    <input type="password" id="pinOto" class="form-control" placeholder="PIN harus benar..."/>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" onclick="setModePelepasan();" id="cardIssueSubmitBTN" class="btn btn-primary">Lepaskan</button>
                </div>
                </div>
            </div>
        </div>

        <style>
        .mode-option {
            cursor: pointer;
            border-radius: 10px;
            transition: all 0.3s;
            text-align: left;
        }
        .mode-option.selected {
            background-color: #e7f1ff;
            border-color: #0d6efd;
        }
        .mode-option .fw-bold {
            font-size: 1rem;
            margin-bottom: 4px;
        }
        .mode-option small {
            font-size: 0.85rem;
        }
        </style>

        <script>
        let modesett_up = ""; // Untuk mode yang dipilih
        let note = "";        // Untuk catatan
        let saldo_user = 50000; // contoh saldo user, misal dapat dari server

        const modeOptions = document.querySelectorAll('.mode-option');

        modeOptions.forEach(option => {
            option.addEventListener('click', function() {
            modeOptions.forEach(opt => opt.classList.remove('selected'));
            this.classList.add('selected');
            modesett_up = this.dataset.mode;
            console.log("Mode yang dipilih:", modesett_up); // Optional: debug
            });
        });

        function setModePelepasan() {

            let mxht = $('#pinOto').val();
            if(mxht!=pjshsX){
                Swal.fire({
                    icon: "error",
                    title: "Pin Otoritas Tidak Sesuai",
                    text: "Anda harus memasukkan PIN Otoritas dengan benar untuk dapat melanjutkan proses berikutnya.",
                    });
                return false;
            }

            if(parseInt(saldo_now) < 35000){
                Swal.fire({
                    icon: "error",
                    title: "Saldo tidak mencukupi",
                    text: "Tidak dapat melanjutkan ke proses berikutnya karena saldo pada akun ini tidak mencukupi.",
                    });
                return false;
            }
            note = document.getElementById('noteInput').value.trim(); // Ambil isi textarea

            if (!modesett_up) {
                Toastify({
                    text: 'Silahkan pilih salah satu dari pilihan tersebut!',
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    className: "errorMessage",

                }).showToast();
            return;
            }

            if ((modesett_up === "hilang" || modesett_up === "rusak") && saldo_user < 35000) {
            alert("Saldo Anda kurang dari Rp35.000 untuk melanjutkan proses ini.");
            return;
            }

            runCardIssue();

            console.log("Proses release dengan mode:", modesett_up);
            console.log("Catatan:", note);

            // Di sini lanjutkan proses ke server
        }
        </script>

        
        <div class="modal fade" id="modalSetSaldo" tabindex="-1" aria-hidden="true"  data-bs-keyboard="false" data-bs-backdrop="static">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content" onclick="putFocusScanCard();">
					<div class="modal-header">
						<h5 class="modal-title">Isi Saldo User</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						
					</div>
					<div class="modal-footer text-center">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
						<button type="button" onclick="commitSaldo();" id="btnSubmitSaldo" class="btn btn-outline-primary">Masukkan Saldo Sekarang</button>
					</div>
				</div>
			</div>
		</div>
		
		<div class="modal fade" id="modalSetLimitTrx" tabindex="-1" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content" onclick="putFocusScanCard();">
					<div class="modal-header">
						<h5 class="modal-title">Isi Saldo User</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						
					</div>
					<div class="modal-footer text-center">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
						<button type="button" onclick="commitLimitTrxUpdate();" id="btnSubmitLimitTrx" class="btn btn-outline-primary">Simpan</button>
					</div>
				</div>
			</div>
		</div>

        <div class="modal fade" id="wdMODAL" tabindex="-1" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content" style="">
                    <div class="modal-header">
						<h5 class="modal-title">Pencairan Dana</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" data-value="="></button>
					</div>
					<div class="modal-body">
                        <form id="mainx">
                            <div class="mb-3">
                                <label for="namaSiswa" class="form-label">Nama Pengguna</label>
                                <font style="font-weight:bold;display:block;" id="namaPengguna">Loading...</font>
                            </div>
                            <div class="mb-3">
                                <label for="namaSiswa" class="form-label">Sisa Saldo</label>
                                <font style="font-weight:bold;display:block;" id="saldoPengguna">Loading...</font>
                            </div>
                            <div class="mb-3">
                                <label for="namaSiswa" class="form-label">Saldo Dicairkan</label>
                                <input type="text" class="form-control" id="saldoCair" maxlength="25" oninput="setVal3(this.value);" placeholder="Ketikkan saldo">
                            </div>
							<div class="mb-3">
                                <label for="keteranganCair" class="form-label">Keterangan</label>
                                <textarea name="keteranganCair" class="form-control" id="keteranganCair" rows="1" placeholder="Bagian ini harus diisi..."></textarea>
                            </div>
                            <h5 class="mt-4">PIN Pengguna</h5>
                            <div class="mb-3">
                                <label for="pin" class="form-label">PIN</label>
                                <input type="password" class="form-control" id="pin" placeholder="Ketikkan saldo">
                            </div>
                        </form>

                        <div class="col-12">
                            <div class="d-grid">
                                <button type="button" id="btnSave" class="btn btn-primary" onclick="requestSecretPencairan();"><i class="bx bx-transfer-alt"></i> Cairkan Sekarang</button>
                            </div>
                        </div>
					</div>
				</div>
			</div>
		</div>

        <div class="modal fade" id="invoiceModal" tabindex="-1" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content" style="background:transparent;border:none;">
					<div class="modal-body">
					</div>
				</div>
			</div>
		</div>

		<script type="text/javascript">
			let idsett = '';
            let useridsett = '';
            let saldo_now = '';
            let notesett = '';
			let pinsett = '';
			let modescan = '';
            let secret_code= '';
            let namauser = '';
            let namainstansi = '';
			let endPointGetDataSiswa = '<?= api_url(); ?>api/v1/siswa';
			let endPointGetDataSiswaSearch = '<?= api_url(); ?>api/v1/siswa/search?q=';

            let balancepublic = '';
            let notelppublic = '';
            let tanggalLahirpublic = '';
            let accountnumberS = '';

            let struk_invoice = '';
            let struk_owner = '';
            let struk_balance = '';
            let struk_amount = '';
            let struk_card_id = '';
            let struk_created_at = '';
            let struk_keterangan = '';

			var typingTimer;
			
			$(document).ready(function () {
                showData(endPointGetDataSiswa);

				$("#floatingInput").on("keyup", function() {
					let value = $(this).val().toLowerCase();
					clearTimeout(typingTimer);
					typingTimer = setTimeout(function() {
						if(value==''){
							showData(endPointGetDataSiswa);
						}else {
							showData(endPointGetDataSiswaSearch+value);	
						}
					}, 1200);

					
				});
                
            });

			function showData(params){
				let num = 0;
				let tableColumn = '';
				tableColumn += `<tr><td colspan="8" class="text-center">Loading...</td></tr>`;
				$('.putContentHere').html(tableColumn);
				
				const save2 = async () => {
					const posts2 = await axios.get( params , {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {
						console.log(err.response);
					});
			
					if (posts2.status == 200) {
							num += 1;
							tableColumn = '';
							if(posts2.data.data.data.length==0){
								tableColumn +=`<tr><td colspan="8" class="text-center">Tidak ada data.</td></tr>`;
								$('.putContentHere').html(tableColumn);return false;
							}
							
							console.log(posts2.data.data.data);
							posts2.data.data.data.map((mapping,i)=>{
							    let textTingkat = '';
								let textNamaA = mapping.nama_lengkap;
								let textNama = textNamaA.split("-M");
								
                                if(textNama.length>0 && (textNamaA.includes('-MA') || textNamaA.includes('-MTS'))){
                                    if(textNama[1]=='A'){
                                        textTingkat = 'Madrasah Aliyah';
                                    }
                                    if(textNama[1]=='TS'){
                                        textTingkat = 'Madrasah Tsanawiyah';
                                    }

                                    if(textNama[1]==undefined){
                                        textTingkat = '-';
                                    }
                                }else {
                                    if (textNamaA.includes('-TK')) {
                                        let parts = textNamaA.split('-TK');
                                        let beforeTK = parts[0].trim(); // The part before -TK
                                        let afterTK = parts[1] ? parts[1].trim() : ''; // The part after -TK

                                        textNama = parts;
                                        textTingkat = 'TK';
                                    }
                                    else if (textNamaA.includes('-SD')) {
                                        let parts = textNamaA.split('-SD');
                                        let beforeTK = parts[0].trim(); // The part before -TK
                                        let afterTK = parts[1] ? parts[1].trim() : ''; // The part after -TK

                                        textNama = parts;
                                        textTingkat = 'Sekolah Dasar';
                                    }
                                    else if (textNamaA.includes('-SMP')) {
                                        let parts = textNamaA.split('-SMP');
                                        let beforeTK = parts[0].trim(); // The part before -TK
                                        let afterTK = parts[1] ? parts[1].trim() : ''; // The part after -TK

                                        textNama = parts;
                                        textTingkat = 'Sekolah Menengah Pertama';
                                    }
                                    else if (textNamaA.includes('-SMK')) {
                                        let parts = textNamaA.split('-SMK');
                                        let beforeTK = parts[0].trim(); // The part before -TK
                                        let afterTK = parts[1] ? parts[1].trim() : ''; // The part after -TK

                                        textNama = parts;
                                        textTingkat = 'Sekolah Menengah Kejuruan';
                                    }
                                }
								
                                let namauser = mapping.nama_lengkap??'-';
                                namauser = encodeSingleQuotes(namauser);

                                let mmmsaldo = mapping.accounts?.balance??'0';
                                
                                let nisclear = mapping.nis;
                                nisclear = nisclear.replace(/\s/g, "");

                                // tanggalLahirpublic = mapping.tanggal_lahir;

							tableColumn +=`
								<tr>
									<td >
										<div class="d-flex align-items-center">
											<div>
												<input class="form-check-input me-3" type="checkbox" value="" aria-label="...">
											</div>
											<div class="ms-2">
												<h6 class="mb-0 font-14">#${nisclear}</h6>
											</div>
										</div>
									</td>
									<td>${textNama[0]} ${(mapping.user.foto!='default.jpg')?'<i class="bx bxs-badge-check text-primary"></i>':'<i class="bx bxs-x-circle text-danger"></i>'}
									<br/><small class="text-muted">${textTingkat}</small> </td>
                                    <td>${(mapping.accounts?.card_id==null)?`<div class="badge rounded-pill text-warning bg-light-warning p-2 text-uppercase px-3"><i class='bx bxs-circle me-1'></i>NOT CONNECTED</div>`:`<div class="badge rounded-pill text-success bg-light-success p-2 text-uppercase px-3"><i class='bx bxs-circle me-1'></i>CONNECTED</div>`}</td>
									<td >${mapping.accounts?.pin}</td>
									<td >${formatRupiahNew(mapping.accounts?.balance??'0'??'0')}</td>
									<td >
                                    <button type="button" ${(mapping.accounts?.card_id==null)?'disabled':''} onclick="console.log('${mapping.telp_ortu}');setSaldoManually('${mapping.accounts?.account_number}','${mapping.nama_lengkap}','${nisclear}','${mapping.tanggal_lahir}','${mapping.accounts?.card_id}','${mapping.accounts?.balance??'0'}','${mapping.telp_ortu}');" class="btn btn-warning btn-sm radius-30 px-4"><i class="bx bx-plus"></i> Saldo</button>
                                    <button type="button" ${(mapping.accounts?.card_id==null)?'disabled':''} onclick="openDialogWD(${mapping.telp_ortu},${mapping.accounts?.account_number},${mapping.accounts?.account_number},'${mapping.nama_lengkap}','Rp${formatRupiah(mapping.accounts?.balance??'0')}');" class="btn btn-primary btn-sm radius-30 px-4"><i class="bx bx-transfer-alt"></i> Pencairan</button>
                                    </td>
									<td >
											<div class="btn-group">
                                            <button type="button" class="disabled btn btn-sm btn-outline-success">${(mapping.accounts?.limit_trx=='100000000')?'Maksimum':'Rp'+formatRupiah(mapping.accounts?.limit_trx??'0')}</button>
												<button type="button" class="btn btn-sm btn-outline-success dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">	<span class="visually-hidden">Toggle Dropdown</span>
												</button>
												<ul class="dropdown-menu">
													<li><a class="dropdown-item" href="#/" onclick="openModalSetLimitTrx('${namauser}','${nisclear}','${mapping.tanggal_lahir}','${mapping.telp_ortu}');idsett='${mapping.accounts?.id}';"><i class='bx bxs-edit'></i> Update</a>
													</li>
												</ul>
											</div>
									</td>
									<td>
										<div class="d-flex order-actions">
                                        ${(mapping.accounts?.card_id==null)?`<a href="#/" onclick="openmodalSetCard('connect');idsett='${mapping.accounts?.account_number}';" class="me-3 "><i class='bx bx-link'></i></a>`:`<a href="#/" onclick="openmodalReleaseCard();idsett='${mapping.accounts?.account_number}';useridsett='${mapping.user_id}';saldo_now='${mapping.accounts?.balance??0}'" class="me-3 text-danger"><i class='bx bx-unlink'></i></a>`} 
											
											<a href="#/" onclick="window.location.href='<?=base_url().$function;?>/siswaManage/${mapping.id}';" class=""><i class='bx bxs-edit'></i></a>
											<a href="#/" onclick="openModalDelete('${mapping.id}','siswa');" class="ms-3"><i class='bx bxs-trash'></i></a>
										</div>
										
									</td>
								</tr>
							`;
							});
							
						$('.putContentHere').html(tableColumn);
						createPaginations(posts2.data.data, "siswa-pagination-container", "siswa-pagination-details", "showData");
					}
				}
				save2();
			}

            function encodeSingleQuotes(str) {
                if (!str || str === '-') return '-';
                return String(str).replace(/'/g, ':::');
            }

            function decodeSingleQuotes(str) {
                if (!str || str === '-') return '-';
                return String(str).replace(/:::/g, "'");
            }

            function openDialogWD(telp, accountnumber, id, nama, saldo){
                accountnumberS = accountnumber;
                notelppublic = telp;
                $('#wdMODAL').modal('toggle');
				
				idsett = id;
                $('#namaPengguna').html(nama);
                $('#saldoPengguna').html(saldo);
            }

            $('#modalSetSaldo').on('hidden.bs.modal', function () {
                    // $('#modalSetCard').modal('toggle');
                    if(!$('#modalSetSaldo').hasClass('show')){
                        notelppublic = '';
                    }else {
                        return false;
                    }
                    
                });

            $('#modalSetCard').on('show.bs.modal', function () {
                idsett = ''; // Empty the variable when the modal opens
                console.log('Modal opened, idsett cleared:', idsett);
            });

            $('#modalSetSaldo').on('hidden.bs.modal', function () {
                notelppublic = '';
            });

            function setSaldoManually(accountnumber, nama,nis,tgl,cardNumber, balance, notelp){

                namauser = nama;
                
                notelppublic = notelp;
                balancepublic = balance;

                idsett = cardNumber;
                accountnumberS = accountnumber;

                $('#modalSetSaldo .modal-body').html(`
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-borderless">
                                <tr><td colspan="2" class="text-center"><div class="alert alert-sm alert-success">( ! ) Pastikan data berikut ini adalah benar dan valid.</div></td></tr>
                                <tr>
                                    <td width="100">Nama user</td>
                                    <td>: ${nama}</td>
                                </tr>
                                <tr>
                                    <td width="100">Saldo</td>
                                    <td>: ${formatRupiah(balance)}</td>
                                </tr>
                                <tr>
                                    <td width="100">Tanggal Lahir</td>
                                    <td>: ${moment(tgl).format('Do MMMM YYYY')}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-12 mt-3">
                            <label for="setTipeKirimPesan" class="mb-1">Tipe Setor</label>
                            <select class="form-control mb-2 setTipeKirimPesan" style="border-radius:100px;">
                                <option value="">Pilih tipe setoran saldo...</option>
                                <option value="setor_tunai">Setor tunai ke host</option>
                                <option value="transfer_ortu">Transfer dari orangtua</option>
                            </select>
                            <label for="saldoTambah" class="mb-1">Saldo</label>
                            <!---<input type="text" id="saldoTambah" class="form-control mb-2 setTocurrency" oninput="setVal(this.value);" style="border-radius:100px;" placeholder="Jumlah saldo (Rp)"/>--->
                            
                            <input type="text" id="saldoTambah" class="form-control mb-2 setTocurrency" 
                            oninput="setValx(this.value);" style="border-radius:100px;" 
                            placeholder="Jumlah saldo (Rp)" maxlength="9" onkeydown="return isNumberKey(event);"/>

                            <label for="pinsaldo" class="mt-3 mb-1">PIN Otoritas</label>
                            <input type="password" id="pinsaldo" class="form-control mb-2 setPinSaldo" style="border-radius:100px;" placeholder="Masukkan PIN Anda!"/>
                        </div>
                    </div>
                `);
                $('#modalSetSaldo').modal('toggle');

                requestSecret();

            }

            function setValx(value) {
                // Ensure the value is a number and truncate to 8 characters
                let cleanedValue = value.replace(/\D/g, '').substring(0,9);
                document.getElementById('saldoTambah').value = formatRupiah(cleanedValue);
            }

            function isNumberKey(evt) {
                // Allow only numerical keys
                var charCode = (evt.which) ? evt.which : evt.keyCode;
                if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                    return false;
                }
                return true;
            }

			function openmodalSetCard(mode){
                // if(mode=='pencairan'){
                //     Toastify({
				// 			text: 'Mohon maaf! Masih dalam tahap pengembangan!',
				// 			duration: 3000,
				// 			close: true,
				// 			gravity: "top",
				// 			position: "right",
				// 			className: "infoMessage",

				// 		}).showToast();
                //         return false;
                // }
				modescan = mode;
				$('#modalSetCard').modal('toggle');
				$('#btnConnectToCard').html('Status');
				$('#modalSetCard').on('shown.bs.modal', function () {
					$('#textToCard').focus();

				});
			}
			
            
            function openmodalReleaseCard(){
				$('#modalReleaseCard').modal('toggle');
			}
            
            
            function openmodalReleaseCardNew(){
				$('#modalReleaseCardNew').modal('toggle');
			}


			
			function openModalSetLimitTrx(nama,nis,tglLahir,telportu){
                notelppublic = '';

                nama = decodeSingleQuotes(namauser);

                notelppublic = telportu;

				$('#modalSetLimitTrx .modal-body').html(`
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-borderless">
                                <tr><td colspan="2" class="text-center"><div class="alert alert-sm alert-success">( ! ) Pastikan data berikut ini adalah benar dan valid.</div></td></tr>
                                <tr>
                                    <td width="100">Nama user</td>
                                    <td>: ${nama}</td>
                                </tr>
                                <tr>
                                    <td width="100">NIS</td>
                                    <td>: ${nis}</td>
                                </tr>
                                <tr>
                                    <td width="100">Tanggal Lahir</td>
                                    <td>: ${moment(tglLahir).format('Do MMMM YYYY')}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-12 mt-3">
                            <label for="limitTrx" class="mb-1">Limit Transaksi</label>
                            <input type="text" id="limitTrx" class="form-control mb-2" style="border-radius:100px;" oninput="setVal2(this.value);" placeholder="Jumlah (Rp)"/>

                        </div>
                    </div>
                `);

				$('#modalSetLimitTrx').modal('toggle');
				$('#modalSetLimitTrx').on('shown.bs.modal', function () {
					$('#limitTrx').focus();

				});
			}

			$("#textToCard").focus(function(){
				console.log('input sedang fokus');
				$('#textIndicator').attr('style','transform:scale(1);transition:all 0.2s linear 0s;padding:5px; padding-left:25px; padding-right:25px; font-size:14px; border-radius:100px; background:#53edaa; color:#fff; display:table; text-align:center; margin:auto;');
				$('#textIndicator').html('Alat scan ready!');
				$('#scanCard').attr('style','border:5px solid #53edaa;width:100%; border-radius:20px; display:block; margin-top:15px; margin-bottom:15px; transition:all 0.2s linear 0s;');
			});

			$('#textToCard').blur(function(){
				console.log('input tidak fokus');
				$('#textToCard').val('');
				$('#textIndicator').attr('style','transform:scale(1);transition:all 0.2s linear 0s;padding:5px; padding-left:25px; padding-right:25px; font-size:14px; border-radius:100px; background:red; color:#fff;display:table;  text-align:center;margin:auto;');
				$('#textIndicator').html('Klik disini untuk dapat memulai scan kartu!');
				$('#scanCard').attr('style','width:100%; border-radius:20px; display:block; margin-top:15px; margin-bottom:15px; transition:all 0.2s linear 0s;');
			});
			
			function putFocusScanCard(){
				$('#textToCard').focus();
				$('#scanCard').attr('style','border:5px solid #53edaa;width:100%; border-radius:20px; display:block; margin-top:15px; margin-bottom:15px; transition:all 0.2s linear 0s;');
			}

            $(".setPinSaldo").on("keydown",function search(e) {
                if(e.keyCode == 13) {
                    alert($(this).val());
                }
            });

			let timer;
			const input = document.querySelector('#textToCard');
			input.addEventListener('keyup', function (e) {
				clearTimeout(timer);
				timer = setTimeout(() => {
					let valx = $('#textToCard').val();

					if(valx.length>10){
						Toastify({
							text: 'Scan ulang kartu tersebut!',
							duration: 3000,
							close: true,
							gravity: "top",
							position: "right",
							className: "errorMessage",

						}).showToast();
						$('#textToCard').val('');
					}else {
						if(modescan=='connect'){
							setNomorKartuKeSiswa(valx);
						}else if(modescan=='saldo'){
							searchSiswaByKartu(valx);
                        }else if(modescan=='pencairan'){
							searchSiswaByKartuPencairan(valx);
                        }
					}
				}, 1500);
			});

			function setNomorKartuKeSiswa(value) {
				$('#btnConnectToCard').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Memproses...');
				$('#btnConnectToCard').attr('disabled', 'disabled');
				$('#btnConnectToCard').css('cursor', 'not-allowed');

				var card_id = value;
				var rekening = idsett;
				
				var form_data = new FormData();
				form_data.append('rekening', rekening);
				form_data.append('card_id', card_id);
				
				const save = async (form_data) => {
					const posts = await axios.post('<?= api_url(); ?>api/v1/account/connetions-card', form_data, {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {

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
						$('#textToCard').val('');
						$('#btnConnectToCard').html('Status : Gagal menyambungkan kartu.');
					});
					if (posts.status == 200) {
						if (posts.data.status == true) {
							
							showData(endPointGetDataSiswa);
							$('#modalSetCard').modal('toggle');
							$('#textToCard').val('');
							Toastify({
								text: 'Kartu berhasil terkoneksi pada siswa tersebut!',
								duration: 3000,
								close: true,
								gravity: "top",
								position: "right",
								className: "successMessage",

							}).showToast();
							$('#btnConnectToCard').html('Status : Done');
						} else {
								let msgg = '';
								if(posts.data?.response?.data?.error=='Card ID already exists in the database'){
									msgg = 'Kartu ini sudah terkoneksi dengan akun lainnya!';
								}else {
									msgg = posts.data?.response?.data?.error;
								}

                                if(posts.data?.msg=='card error'){
                                    msgg = 'Kartu ini tidak terdaftar dipusat data oncard.id!';
                                }

                                Toastify({
									text: msgg,
									duration: 3000,
									close: true,
									gravity: "top",
									position: "right",
									className: "errorMessage",

								}).showToast();
								$('#textToCard').val('');
								$('#btnConnectToCard').html('Status : Error');
						}

						
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
						$('#btnConnectToCard').html('Status : Gagal menyambungkan kartu.');
						$('#textToCard').val('');
					}
				}

			save(form_data);

			}
            
            function commitSaldo() {
				$('#btnSubmitSaldo').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Memproses...');
				$('#btnSubmitSaldo').attr('disabled', 'disabled');
				$('#btnSubmitSaldo').css('cursor', 'not-allowed');

				var card_id = idsett;
				var saldo = $('#saldoTambah').val();
				var pin = $('.setPinSaldo').val();
                var jenis = $('.setTipeKirimPesan').val();

                if(jenis==''){

                    $('#btnSubmitSaldo').html('Masukkan Saldo Sekarang');
                    $('#btnSubmitSaldo').attr('disabled', false);
                    $('#btnSubmitSaldo').css('cursor', 'pointer');
                    
                    Toastify({
                        text: 'Tipe Setor wajib dipilih!',
                        duration: 3000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        className: "errorMessage",

                    }).showToast();
                    return false;
                }

                saldo = saldo.split('.').join("");

				var form_data = new FormData();
				form_data.append('card', card_id);
				form_data.append('amount', saldo);
				form_data.append('pin', pin);
				form_data.append('client_secret', secret_code);
				form_data.append('description', jenis);
				
				const save = async (form_data) => {
					const posts = await axios.post('<?= api_url(); ?>api/v1/trx/store-balance', form_data, {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {

                        if(err.response.data.error=='error login kartu!'){
                            Toastify({
                                text: 'PIN Tidak Benar!',
                                duration: 3000,
                                close: true,
                                gravity: "top",
                                position: "right",
                                className: "errorMessage",

                            }).showToast();
                        }else {
                        
                            requestSecret();

							Toastify({
								text: err?.response?.message??'Terjadi kesalahan pada server!',
								duration: 3000,
								close: true,
								gravity: "top",
								position: "right",
								className: "errorMessage",

							}).showToast();
                        }
						idsett = '';
						$('#textToCard').val('');
						$('#btnSubmitSaldo').html('Masukkan Saldo Sekarang');
						$('#btnSubmitSaldo').attr('disabled', false);
						$('#btnSubmitSaldo').css('cursor', 'pointer');
					});
					if (posts.status == 201) {
						if (posts.data.status == true) {
							
							showData(endPointGetDataSiswa);
                            
							$('#textToCard').val('');
							Toastify({
								text: 'Saldo berhasil ditambahkan pada akun tersebut!',
								duration: 3000,
								close: true,
								gravity: "top",
								position: "right",
								className: "successMessage",

							}).showToast();
							
                            // $('#modalSetSaldo').modal('toggle');
                            // $('#btnSubmitSaldo').html('Masukkan Saldo Sekarang');
                            // $('#btnSubmitSaldo').attr('disabled', false);
                            // $('#btnSubmitSaldo').css('cursor', 'pointer');

                            // window.location.reload();
                            // return false;

                            // if(notelppublic.length>8 && notelppublic!='0' && jenis=='transfer_ortu'){
                            if(notelppublic.length>8 && notelppublic!='0'){
                                var strFirstThree = notelppublic.substring(0,3);
                                if(strFirstThree=='628' ){

                                    struk_invoice = posts.data.data.transaction.invoice;
                                    struk_owner = posts.data.data.customers_name;
                                    struk_balance = posts.data.data.transaction.balance;
                                    struk_amount = posts.data.data.transaction.credit_amount;
                                    struk_card_id = posts.data.data.card_id;
                                    struk_created_at = posts.data.data.created_at;
                                    struk_keterangan = posts.data.data.transaction.description;

                                    // sendMessageSaldoSuccess(`${saldo}`);
                                    openInvoice('topup',struk_invoice,struk_owner, struk_balance, struk_amount, struk_card_id, struk_created_at, struk_keterangan);
                                }
                            }else {
                                
                                // window.location.reload();

                                openInvoice('topup',posts.data.data.transaction.invoice, posts.data.data.customers_name, posts.data.data.transaction.balance, posts.data.data.transaction.credit_amount, posts.data.data.card_id, posts.data.data.created_at, posts.data.data.transaction.description);
                                // console.log(posts.data.data.transaction.invoice, posts.data.data.transaction.balance, posts.data.data.transaction.credit_amount, posts.data.data.card_id,posts.data.data.created_at);
                                // console.log(posts.data.data.transaction.invoice, posts.data.data.transaction.balance,posts.data.data.transaction.credit_amount,posts.data.data.card_id);
                            }

                            idsett='';
                            
						} else {
								let msgg = '';
								if(posts.data.response.data.error=='Card ID already exists in the database'){
									msgg = 'Kartu ini sudah terkoneksi dengan akun lainnya!';
								}else {
									msgg = posts.data.response.data.error;
								}
								Toastify({
									text: msgg,
									duration: 3000,
									close: true,
									gravity: "top",
									position: "right",
									className: "errorMessage",

								}).showToast();
								$('#textToCard').val('');
								$('#btnSubmitSaldo').html('Masukkan Saldo Sekarang');
                                $('#btnSubmitSaldo').attr('disabled', false);
						}

						
					}
					else {
						
							Toastify({
								text: 'Terjadi kesalahan dalam menyimpan data!',
								duration: 3000,
								close: true,
								gravity: "top",
								position: "right",
								className: "errorMessage",

							}).showToast();
						$('#btnSubmitSaldo').html('Masukkan Saldo Sekarang');
						$('#btnSubmitSaldo').attr('disabled', false);
						$('#btnSubmitSaldo').css('cursor', 'pointer');
						$('#textToCard').val('');
					}
				}

			save(form_data);

			}

            //PART GREETINGS SETTING//
            let greetings = ["Bismillahirrahmanirrahim, Assalamualaikum.","Bismillah!","Bismillah, Assalamu'alaikum","Selamat pagi!", "Selamat siang!", "Selamat sore!", "Selamat malam!", "Assalamu'alaikum warahmatullahi wabarakatuh", "Assalamu'alaikum wr. wb.", "Assalamu'alaikum!", "Assalamualaikum!"]
            let greetingslocal = localStorage.getItem("greetings");
            greetingslocal = JSON.parse(greetingslocal);
            if(greetingslocal && greetingslocal.length > 0){
                greetings = greetingslocal;
            }
            //PART GREETINGS SETTING//
            
            //PART PERSONAL SETTING//
            let personal = ["Bpk","Ibu yang terhormat","Bapak yang terhormat","Bapak/Ibu", "Bapak", "Ibu", "Bpk/Ibu", "Saudara", "Saudari", "bapak ibu","Ayah / Bunda"]
            let personallocal = localStorage.getItem("personal");
            personallocal = JSON.parse(personallocal);
            if(personallocal && personallocal.length > 0){
                personal = personallocal;
            }
            //PART PERSONAL SETTING//

            
            function sendMessageSaldoSuccess(saldo){

                // PART GREETINGS ARRAY //
                let valuegreetings = (Math.floor(Math.random() * greetings.length));
                let textgreetings = greetings[valuegreetings];
                valuegreetings = greetings[valuegreetings];
                greetings = greetings.filter(function(item) {
                    return item !== valuegreetings
                });
                localStorage.setItem("greetings", JSON.stringify(greetings));
                let getgreetingslast = localStorage.getItem("greetings");
                getgreetingslast = JSON.parse(getgreetingslast);
                if(getgreetingslast.length==0){
                    localStorage.removeItem('greetings');
                }
                // PART GREETINGS ARRAY //
                
                // PART PERSONAL ARRAY //
                let valuepersonal = (Math.floor(Math.random() * personal.length));
                let textpersonal = personal[valuepersonal];
                valuepersonal = personal[valuepersonal];
                personal = personal.filter(function(item) {
                    return item !== valuepersonal
                });
                localStorage.setItem("personal", JSON.stringify(personal));
                let getpersonallast = localStorage.getItem("personal");
                getpersonallast = JSON.parse(getpersonallast);
                if(getpersonallast.length==0){
                    localStorage.removeItem('personal');
                }
                // PART PERSONAL ARRAY //

                
                let isiPesan = "";
                let arrayBaru = [];
                let totalSaldoAkhir = parseInt(saldo) + parseInt(balancepublic);

                isiPesan += `${textgreetings},
*Pusat Informasi ${instansiNameX}*

*Rp${formatRupiah(saldo)} BERHASIL DITAMBAHKAN*
Selamat anak ${textpersonal}, *${(namauser)??'-'}!*,
Proses setor saldo telah *Berhasil* dilakukan dan saldo sudah masuk ke dalam Kartu Belanja.

*===SALDO SAAT INI===*
        *Rp${formatRupiah(totalSaldoAkhir.toString())}*
*===================*

Terimakasih atas kerjasamanya.
`;

console.log(isiPesan);
// return false;


isiPesan += `

_Kode pesan : #${createRandom()}_
                            `;

				let rndInt = Math.floor(Math.random() * 280) + 120; //random detik antara 120 to 400
                let unixTimeStamp = Math.floor(new Date() / 1000); //currentTime

                let xyz = parseInt(unixTimeStamp)+parseInt(rndInt);

                if(!localStorage.getItem("lastTime")){
                    localStorage.setItem("lastTime", xyz);
                }else {
                    let mmmmmmm = localStorage.getItem("lastTime");
                    if(mmmmmmm < xyz){
                        localStorage.setItem("lastTime", xyz);
                    }else {
                        xyz = parseInt(mmmmmmm)+parseInt(rndInt);
                        localStorage.setItem("lastTime", xyz);
                    }
                }

                // return false;

			
                var form_data = new FormData();
                form_data.append('noWA',notelppublic);
                form_data.append('pesan',isiPesan);
                form_data.append('timeTerakhir',xyz);
                form_data.append('kodeInstansi',kodeInstansiX);

				console.log(kodeInstansiX);
                
                jQuery.ajax({
                    type: "POST",
                    // url: "<?php echo base_url(); ?>"+"CPanel_Admin/Wa",
                    url: "<?php echo base_url(); ?>"+"WebhookOncard/sendMessageWatzap",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,
                    dataType: 'json',  // what to expect back from the PHP script, if anything
                    beforeSend: function() {
                        
                    },
                    success : function(e){
                        openInvoice('topup',struk_invoice,struk_owner, struk_balance, struk_amount, struk_card_id, struk_created_at, struk_keterangan);
                    }
                
                });
            }
			
            
            
            function sendMessageWDSuccess(saldo, nominal, keterangan){

                // PART GREETINGS ARRAY //
                let valuegreetings = (Math.floor(Math.random() * greetings.length));
                let textgreetings = greetings[valuegreetings];
                valuegreetings = greetings[valuegreetings];
                greetings = greetings.filter(function(item) {
                    return item !== valuegreetings
                });
                localStorage.setItem("greetings", JSON.stringify(greetings));
                let getgreetingslast = localStorage.getItem("greetings");
                getgreetingslast = JSON.parse(getgreetingslast);
                if(getgreetingslast.length==0){
                    localStorage.removeItem('greetings');
                }
                // PART GREETINGS ARRAY //
                
                // PART PERSONAL ARRAY //
                let valuepersonal = (Math.floor(Math.random() * personal.length));
                let textpersonal = personal[valuepersonal];
                valuepersonal = personal[valuepersonal];
                personal = personal.filter(function(item) {
                    return item !== valuepersonal
                });
                localStorage.setItem("personal", JSON.stringify(personal));
                let getpersonallast = localStorage.getItem("personal");
                getpersonallast = JSON.parse(getpersonallast);
                if(getpersonallast.length==0){
                    localStorage.removeItem('personal');
                }
                // PART PERSONAL ARRAY //

                
                let isiPesan = "";
                let arrayBaru = [];
                let totalSaldoAkhir = parseInt(saldo);

                isiPesan += `${textgreetings},
*Pusat Informasi ${instansiNameX}*

*Rp${formatRupiah(nominal)} TELAH DICAIRKAN*
Proses pencairan atau _withdrawal_ saldo telah *Berhasil* dilakukan dengan alasan :
*${keterangan}*

*===SALDO SAAT INI===*
        *Rp${formatRupiah(totalSaldoAkhir.toString())}*
*===================*

Terimakasih.
`;

console.log(isiPesan);
// return false;


isiPesan += `

_Kode pesan : #${createRandom()}_
                            `;

				let rndInt = Math.floor(Math.random() * 280) + 120; //random detik antara 120 to 400
                let unixTimeStamp = Math.floor(new Date() / 1000); //currentTime

                let xyz = parseInt(unixTimeStamp)+parseInt(rndInt);

                if(!localStorage.getItem("lastTime")){
                    localStorage.setItem("lastTime", xyz);
                }else {
                    let mmmmmmm = localStorage.getItem("lastTime");
                    if(mmmmmmm < xyz){
                        localStorage.setItem("lastTime", xyz);
                    }else {
                        xyz = parseInt(mmmmmmm)+parseInt(rndInt);
                        localStorage.setItem("lastTime", xyz);
                    }
                }

                // return false;

			
                var form_data = new FormData();
                form_data.append('noWA',notelppublic);
                form_data.append('pesan',isiPesan);
                form_data.append('timeTerakhir',xyz);
                form_data.append('kodeInstansi',kodeInstansiX);

				console.log(kodeInstansiX);
                
                $('#btnSave').html('<i class="bx bx-transfer-alt"></i> Sedang mengirim notifikasi...');

                jQuery.ajax({
                    type: "POST",
                    // url: "<?php echo base_url(); ?>"+"CPanel_Admin/Wa",
                    url: "<?php echo base_url(); ?>"+"WebhookOncard/sendMessageWatzap",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,
                    dataType: 'json',  // what to expect back from the PHP script, if anything
                    beforeSend: function() {
                        
                    },
                    success : function(e){
                        openInvoice('wd',struk_invoice, struk_owner, struk_balance, struk_amount, struk_card_id, struk_created_at, struk_keterangan);
                        $('#wdMODAL').modal('toggle');

                        $('#btnSave').html('<i class="bx bx-transfer-alt"></i> Cairkan Sekarang');
						$('#btnSave').attr('disabled', false);
						$('#btnSave').css('cursor', 'pointer');
                    }
                
                });
            }
			
			function commitLimitTrxUpdate() {
				$('#btnSubmitLimitTrx').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Memproses...');
				$('#btnSubmitLimitTrx').attr('disabled', 'disabled');
				$('#btnSubmitLimitTrx').css('cursor', 'not-allowed');

				var card_id = idsett;
				var saldo = $('#limitTrx').val();
                saldo = saldo.split('.').join("");

                if(saldo==''|| saldo=='0'){
                    Toastify({
                        text: 'Limit transaksi harus diisi dahulu!',
                        duration: 3000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        className: "errorMessage",

                    }).showToast();

                    $('#limitTrx').val('');
                    $('#btnSubmitLimitTrx').html('Simpan');
                    $('#btnSubmitLimitTrx').attr('disabled', false);
                    $('#btnSubmitLimitTrx').css('cursor', 'pointer');
                    return false;
                }
				
				var form_data = new FormData();
				form_data.append('limit_trx', saldo);
				
				const save = async (form_data) => {
					const posts = await axios.post('<?= api_url(); ?>api/v1/account/update/'+card_id, form_data, {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {

                        console.log(err.response.data);
						
						$('#limitTrx').val('');
						$('#btnSubmitLimitTrx').html('Simpan');
						$('#btnSubmitLimitTrx').attr('disabled', false);
						$('#btnSubmitLimitTrx').css('cursor', 'pointer');
					});
					if (posts.status == 201||posts.status == 200) {
						if (posts.data.status == true) {
							
							showData(endPointGetDataSiswa);
                            $('#modalSetLimitTrx').modal('toggle');
							$('#limitTrx').val('');
							Toastify({
								text: 'Limit transaksi telah diperbaharui',
								duration: 3000,
								close: true,
								gravity: "top",
								position: "right",
								className: "successMessage",

							}).showToast();
							
							idsett ='';

							$('#btnSubmitLimitTrx').html('Simpan');
                            $('#btnSubmitLimitTrx').attr('disabled', false);
                            $('#btnSubmitLimitTrx').css('cursor', 'pointer');
						} else {
								let msgg = '';
								if(posts.data.response.data.error=='Card ID already exists in the database'){
									msgg = 'Kartu ini sudah terkoneksi dengan akun lainnya!';
								}else {
									msgg = posts.data.response.data.error;
								}
								Toastify({
									text: msgg,
									duration: 3000,
									close: true,
									gravity: "top",
									position: "right",
									className: "errorMessage",

								}).showToast();
								$('#limitTrx').val('');
								$('#btnSubmitLimitTrx').html('Simpan');
                                $('#btnSubmitLimitTrx').attr('disabled', false);
						}

						
					}
					else {
						
							Toastify({
								text: 'Terjadi kesalahan dalam menyimpan data!',
								duration: 3000,
								close: true,
								gravity: "top",
								position: "right",
								className: "errorMessage",

							}).showToast();
						$('#btnSubmitLimitTrx').html('Simpan');
						$('#btnSubmitLimitTrx').attr('disabled', false);
						$('#btnSubmitLimitTrx').css('cursor', 'pointer');
						$('#limitTrx').val('');
					}
				}

			save(form_data);

			}
			
            
            function runCardIssue() {
				$('#cardIssueSubmitBTN').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Memproses...');
				$('#cardIssueSubmitBTN').attr('disabled', 'disabled');
				$('#cardIssueSubmitBTN').css('cursor', 'not-allowed');

                let note = $('#noteInput').val();

				var form_data = new FormData();
				form_data.append('user_id', useridsett);
				form_data.append('status_issue', modesett_up);
				form_data.append('note_issue', note);
				form_data.append('noted', 'Host '+userNameX+'melepaskan kartu');
				
				const save = async (form_data) => {
					const posts = await axios.post('<?= api_url(); ?>api/v1/history-card/create-history-issue', form_data, {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {

                        console.log(err.response.data);
						
						$('#limitTrx').val('');
						$('#cardIssueSubmitBTN').html('Lepaskan');
                        $('#cardIssueSubmitBTN').attr('disabled', false);
                        $('#cardIssueSubmitBTN').css('cursor', 'pointer');
					});
					if (posts.status == 201||posts.status == 200) {
						if (posts.data.status == true) {
							
							showData(endPointGetDataSiswa);
                            
                            Toastify({
								text: 'Berhasil tersimpan',
								duration: 3000,
								close: true,
								gravity: "top",
								position: "right",
								className: "successMessage",

							}).showToast();
							
							idsett ='';
                            modesett_up = '';
                            $('#noteInput').val('');
                            $('#modalReleaseCardNew').modal('toggle');

                            Swal.fire({
                                icon: "error",
                                title: "Pin Otoritas Tidak Sesuai",
                                text: "Anda harus memasukkan PIN Otoritas dengan benar untuk dapat melanjutkan proses berikutnya.",
                                });
                            return false;

							$('#cardIssueSubmitBTN').html('Lepaskan');
                            $('#cardIssueSubmitBTN').attr('disabled', false);
                            $('#cardIssueSubmitBTN').css('cursor', 'pointer');
						} else {
								
								Toastify({
									text: 'Error data [23402]',
									duration: 3000,
									close: true,
									gravity: "top",
									position: "right",
									className: "errorMessage",

								}).showToast();
								$('#limitTrx').val('');
								$('#cardIssueSubmitBTN').html('Lepaskan');
                                $('#cardIssueSubmitBTN').attr('disabled', false);
                                $('#cardIssueSubmitBTN').css('cursor', 'pointer');
						}

						
					}
					else {
						
							Toastify({
								text: 'Terjadi kesalahan dalam menyimpan data!',
								duration: 3000,
								close: true,
								gravity: "top",
								position: "right",
								className: "errorMessage",

							}).showToast();
                            $('#cardIssueSubmitBTN').html('Lepaskan');
                            $('#cardIssueSubmitBTN').attr('disabled', false);
                            $('#cardIssueSubmitBTN').css('cursor', 'pointer');
						$('#limitTrx').val('');
					}
				}

			save(form_data);

			}
			
			function searchSiswaByKartu(str){

                idsett = '';
				
                const save2 = async () => {
					const posts2 = await axios.get('<?= api_url(); ?>api/v1/usr?card='+str, {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {
						$('#textToCard').blur();
                        return false;
					});
			
					if (posts2.status == 200) {

                        if(posts2.data.status==false){
                            Toastify({
                                text: 'Scan ulang kartu tersebut!',
                                duration: 3000,
                                close: true,
                                gravity: "top",
                                position: "right",
                                className: "errorMessage",

                            }).showToast();
                            $('#textToCard').blur();
                            $('#textToCard').focus();
                        }
                        
                        $('#modalSetCard').modal('toggle');

                        idsett = str;
                        namauser = posts2.data.data.siswa.nama_lengkap;
                        notelppublic = posts2.data.data.siswa.telp_ortu;

                        balancepublic = posts2.data.data.balance;
                        accountnumberS = posts2.data.data.account_number;
                        
                        $('#modalSetSaldo .modal-body').html(`
                            <div class="row">
                                <div class="col-12 table-responsive">
                                    <table class="table table-borderless">
                                        <tr><td colspan="2" class="text-center"><div class="alert alert-sm alert-success">( ! ) Pastikan data berikut ini adalah benar dan valid.</div></td></tr>
                                        <tr>
                                            <td width="100">Nama user</td>
                                            <td>: ${posts2.data.data.siswa.nama_lengkap}</td>
                                        </tr>
                                        <tr>
                                            <td width="100">Saldo</td>
                                            <td>: ${formatRupiah(posts2.data.data.balance)}</td>
                                        </tr>
                                        <tr>
                                            <td width="100">Tanggal Lahir</td>
                                            <td>: ${moment(posts2.data.data.siswa.tanggal_lahir).format('Do MMMM YYYY')}</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-12 mt-3">
                                <label for="setTipeKirimPesan" class="mb-1">Tipe Setor</label>
                                <select class="form-control mb-2 setTipeKirimPesan" style="border-radius:100px;">
                                    <option value="">Pilih tipe setoran saldo...</option>
                                    <option value="setor_tunai">Setor tunai ke host</option>
                                    <option value="transfer_ortu">Transfer dari orangtua</option>
                                </select>
                                    <label for="saldoTambah" class="mb-1">Saldo.</label>
                                    <!---<input type="text" id="saldoTambah" class="form-control mb-2 setTocurrency" oninput="setVal(this.value);" style="border-radius:100px;" placeholder="Jumlah saldo (Rp)"/>--->
                                    
                                    <input type="text" id="saldoTambah" class="form-control mb-2 setTocurrency" 
                                    oninput="setVal(this.value);" style="border-radius:100px;" 
                                    placeholder="Jumlah saldo (Rp)" maxlength="9" onkeydown="return isNumberKey(event);"/>

                                    <label for="pinsaldo" class="mt-3 mb-1">PIN Otoritas</label>
                                    <input type="password" id="pinsaldo" class="form-control mb-2 setPinSaldo" style="border-radius:100px;" placeholder="Masukkan PIN Anda!"/>
                                </div>
                            </div>
                        `);
                        $('#modalSetSaldo').modal('toggle');

                        Toastify({
                            text: 'Scan berhasil!',
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            className: "successMessage",

                        }).showToast();
                        console.log(posts2.data.data, "nama user:"+namauser, "nohp:"+notelppublic,"akun:"+accountnumberS);

                        requestSecret();

					}else {
                        Toastify({
                            text: 'Scan ulang kartu tersebut!',
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            className: "errorMessage",
                        }).showToast();
                        // $('#textToCard').blur();
                        
                    }
				}
				
				save2();
				
				
			}
			
            
            function searchSiswaByKartuPencairan(str){

                idsett = '';
				
                const save2 = async () => {
					const posts2 = await axios.get('<?= api_url(); ?>api/v1/usr?card='+str, {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {
						$('#textToCard').blur();
                        return false;
					});
			
					if (posts2.status == 200) {

                        if(posts2.data.status==false){
                            Toastify({
                                text: 'Scan ulang kartu tersebut!',
                                duration: 3000,
                                close: true,
                                gravity: "top",
                                position: "right",
                                className: "errorMessage",

                            }).showToast();
                            $('#textToCard').blur();
                            $('#textToCard').focus();
                        }
                        
                        $('#modalSetCard').modal('toggle');

                        
                        namauser = posts2.data.data.siswa.nama_lengkap;
                        notelppublic = posts2.data.data.siswa.telp_ortu;

                        balancepublic = posts2.data.data.balance;
                        accountnumberS = posts2.data.data.account_number;

                        idsett = accountnumberS;
                        
                        
                        pinsett = posts2.data.data.pin;//update hingga jumat 22 maret
                        
                        $('#wdMODAL').modal('toggle');
                        $('#namaPengguna').html(namauser);
                        $('#saldoPengguna').html(formatRupiah(balancepublic));

                        $('#wdMODAL').modal('toggle');

                        Toastify({
                            text: 'Scan berhasil!',
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            className: "successMessage",

                        }).showToast();
                        // console.log(posts2.data.data, "nama user:"+namauser, "nohp:"+notelppublic,"akun:"+accountnumberS);

                        // requestSecret();

					}else {
                        Toastify({
                            text: 'Scan ulang kartu tersebut!',
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            className: "errorMessage",
                        }).showToast();
                        // $('#textToCard').blur();
                        
                    }
				}
				
				save2();
				
				
			}

            function requestSecret(){
				const save2 = async () => {
					const posts2 = await axios.get('<?= api_url(); ?>api/v1/key/create', {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {
						console.log(err.response);
					});

					if (posts2.status == 201) {
						secret_code = posts2.data.data.client_secret;
					}
				}
				save2();
			}

            function createRandom(){
                let result = '';
                const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
                const charactersLength = characters.length;
                let counter = 0;
                while (counter < 6) {
                result += characters.charAt(Math.floor(Math.random() * charactersLength));
                counter += 1;
                }
                return result;
            }

            function setVal(str){
                $('#saldoTambah').val(formatRupiah(str));
            }
            
            function setVal2(str){
                $('#limitTrx').val(formatRupiah(str));
            }
            
            function setVal3(str){
                $('#saldoCair').val(formatRupiah(str));
            }

            function requestSecretPencairan(){

				$('#btnSave').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Memproses...');
				$('#btnSave').attr('disabled', 'disabled');
				$('#btnSave').css('cursor', 'not-allowed');

				const save2 = async () => {
					const posts2 = await axios.get('<?= api_url(); ?>api/v1/key/create', {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {
						$('#btnSave').html('<i class="bx bx-transfer-alt"></i> Cairkan Sekarang');
						$('#btnSave').attr('disabled', false);
						$('#btnSave').css('cursor', 'pointer');
						console.log(err.response);
					});

					if (posts2.status == 201) {
						secret_code = posts2.data.data.client_secret;

						prosCair();
					}else {
						$('#btnSave').html('<i class="bx bx-transfer-alt"></i> Cairkan Sekarang');
						$('#btnSave').attr('disabled', false);
						$('#btnSave').css('cursor', 'pointer');
					}
				}
				save2();
            }

            function prosCair(){
				
				let value = $('#saldoCair').val();
				let pin = $('#pin').val();
				value = value.replace(/\D/g, "");

				let keteranganCair = $('#keteranganCair').val();

                if(keteranganCair==''){
                    // keteranganCair = 'withdrawal transactions';
                    Toastify({
						text: 'Keterangan harus diisi dengan alasan yang jelas!',
						duration: 3000,
						close: true,
						gravity: "top",
						position: "right",
						className: "errorMessage",

					}).showToast();

                    $('#btnSave').html('Selesai');
					$('#btnSave').attr('disabled', false);
					$('#btnSave').css('cursor', 'pointer');

					return false;
                }

				if(value=='0'||value==''){

					$('#btnSave').html('Selesai');
					$('#btnSave').attr('disabled', false);
					$('#btnSave').css('cursor', 'pointer');
					Toastify({
						text: 'Nominal harus diisi!',
						duration: 3000,
						close: true,
						gravity: "top",
						position: "right",
						className: "errorMessage",

					}).showToast();
					return false;
				}
				
            	var form_data = new FormData();
				
				form_data.append('amount', value);
				form_data.append('account_number', idsett);
				form_data.append('client_secret', secret_code);
				form_data.append('pin', pin);
				form_data.append('description', keteranganCair);
				
				let url = '';
				
				const save = async (form_data) => {
					const posts = await axios.post('<?= api_url(); ?>api/v1/wd', form_data, {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {
                        $('#btnSave').html('Selesai');
						$('#btnSave').attr('disabled', false);
						$('#btnSave').css('cursor', 'pointer');

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
						    
						    pinsett = '';
							
							Toastify({
								text: posts.data.message,
								duration: 3000,
								close: true,
								gravity: "top",
								position: "right",
								className: "successMessage",

							}).showToast();

							struk_invoice = posts.data.data.transaction.invoice;
							struk_owner = posts.data.data.customers_name;
                            struk_balance = posts.data.data.account.balance;
                            struk_amount = posts.data.data.transaction.debit_amount;
                            struk_card_id = posts.data.data.account.card_id;
                            struk_created_at = posts.data.data.transaction.created_at;
                            struk_keterangan = posts.data.data.transaction.description;

                            // sendMessageWDSuccess(`${struk_balance}`,`${struk_amount}`,`${struk_keterangan}`);

                            openInvoice('wd',struk_invoice, struk_owner, struk_balance, struk_amount, struk_card_id, struk_created_at, struk_keterangan);
                            
                            showData(endPointGetDataSiswa);
							$('#keteranganCair').val('');
                            
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
						$('#btnSave').html('<i class="bx bx-transfer-alt"></i> Cairkan Sekarang');
						$('#btnSave').attr('disabled', false);
						$('#btnSave').css('cursor', 'pointer');
					}
				}
				
				save(form_data);				

			}

            function commitRelease(){
                const save = async () => {
                    const posts2 = await axios.get('<?= api_url(); ?>api/v1/account/sign-out?account_number='+idsett, {
                        headers: {
                            'Authorization': 'Bearer ' + localStorage.getItem('_token')
                        }
                    }).catch((err) => { 

                        if(err.error){
                            Toastify({
                                text: 'Maaf. Belum dapat memproses pelepasan kartu.',
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

                    if (posts2.status == 200) {

                        if(posts2.data.status==false){
                            Toastify({
                                text: "Oops! Proses melepaskan kartu masih gagal!",
                                duration: 3000,
                                close: true,
                                gravity: "top",
                                position: "right",
                                className: "errorMessage",

                            }).showToast();
                            
                        }else {

                            Toastify({
                                text: "Berhasil melepaskan kartu!",
                                duration: 3000,
                                close: true,
                                gravity: "top",
                                position: "right",
                                className: "successMessage",

                            }).showToast();

                        }

                        

                        showData(endPointGetDataSiswa);
                        uidsett = '';
                        tablesett = '';

                        $('#modalReleaseCard').modal('toggle');


                    } else {

                    }
                }

			    save();
                
		    }

            function openInvoice(tipe, invoice,struk_owner, balance, amount, card_id,created_at, keterangan){
                let htmlx = '';
                let desc = '';

                if(tipe=='topup'){
                    $('#modalSetSaldo').modal('toggle');
                }else {
                    $('#wdMODAL').modal('toggle');
                }
                

                let saldoawal = 0;
                
                
                if(tipe!='topup'){
                    saldoawal = parseInt(balance)+parseInt(amount);
                }else {
                    saldoawal = parseInt(balance)-parseInt(amount);
                }

                htmlx = `
                        <div class="invoice-card" id="divToPRINT">
                            <div class="invoice-title">
                                <div id="main-title" style="display:block!important;">
                                <h4 style="margin-bottom:0;padding-bottom:0px; color:black!important;background: black;text-align: center;color: white!important;padding: 7px;text-transform:uppercase;font-size:14px;">${(tipe=='topup')?'TOPUP':'WITHDRAWAL'} SALDO</h4>
                                <span style=" color:black!important; display:block; font-size:9px!important;">#${invoice}</span>
                                </div>
                                
                                <span id="date" style=" color:black!important;">${moment(created_at).format('DD/MM/YYYY - HH:mm:ss')} WIB</span>
                                <span style="font-size:11px; color:black!important;">- ${struk_owner} -</span>
                            </div>
                            <div style="text-align:center;font-weight:bolder;">
                            ${(tipe=='topup')?'TOPUP':'WITHDRAWAL'}<br/>${instansiNameX}
                            </div>
                            
                            <div class="invoice-details">
                                <table class="invoice-table" style="width:100%;">
                                <tbody class="detailTabelInvoice">
                                    <tr class="calc-row">
                                    <td colspan="2">Saldo Sebelumnya</td>
                                    <td>Rp${formatRupiah(saldoawal.toString())}</td></tr>
                                    <tr><td colspan="3">
                                        <div style="width:100%; height:5px;border-bottom: 0.5px dashed grey;"></div>
                                    </td></tr>
                                    <tr class="calc-row">
                                    <td colspan="2">${(tipe=='topup')?'Penambahan':'Pengurangan'} Saldo</td>
                                    <td>Rp${formatRupiah(amount.toString())}</td></tr>
                                    <tr><td colspan="3">
                                        <div style="width:100%; height:5px;border-bottom: 0.5px dashed grey;"></div>
                                    </td></tr>
                                    <tr class="calc-row">
                                    <td colspan="2"><b>Saldo Saat Ini</b></td>
                                    <td>Rp${formatRupiah(balance.toString())}</td>
                                    </tr>
                                    
                                    <tr><td colspan="3">
                                        <div style="width:100%; height:5px;border-bottom: 0.5px dashed grey; margin-top:15px;"></div>
                                    </td></tr>
                                    
                                    <tr class="">
                                    <td colspan="3"><b>Keterangan</b></td>
                                    </tr>
                                    <tr class="">
                                    <td colspan="3" style="font-size:13px!important;">${removeHtmlTags(keterangan)}</td>
                                    </tr>

                                    <tr><td colspan="3">
                                        <div style="width:100%; height:5px;border-bottom: 0.5px dashed grey; margin-top:15px;"></div>
                                    </td></tr>

                                </tbody>
                                </table>
                            </div>
                            
                            
                        </div>

                        <div class="invoice-card mt-4" style="min-height:auto!important;">
                            <div class="invoice-footer">
                                <button class="btn btn-sm btn-secondary" data-dismiss="modal" id="later" data-bs-dismiss="modal" aria-label="Close">Tutup</button>
                                <button class="btn btn-sm btn-primary" onclick="printDivNEW();"><i class="bx bx-printer"></i> CETAK BUKTI</button>
                            </div>
                        
                        </div>
                    `;
                    

                $('#invoiceModal .modal-body').html(htmlx);
                $('#invoiceModal').modal('toggle');


            

            }


            $('#invoiceModal').on('hidden.bs.modal', function () {
                window.location.reload();
            })

            function formatRupiahNew(amount) {
                return new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                    minimumFractionDigits: 0
                }).format(amount);
            }

			
		</script>