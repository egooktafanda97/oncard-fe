<style>
    .feature-summary-card {
    background: white;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    padding: 20px;
    font-family: 'Segoe UI', Roboto, -apple-system, sans-serif;
    /* max-width: 500px; */
    margin: 0 auto;
}

.feature-summary-header {
    display: flex;
    align-items: center;
    margin-bottom: 16px;
    color: #2c3e50;
}

.feature-summary-header i {
    font-size: 20px;
    margin-right: 12px;
    color: #3498db;
}

.feature-summary-header h3 {
    margin: 0;
    font-size: 18px;
    font-weight: 600;
}

.feature-summary-list ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.feature-summary-list li {
    display: flex;
    align-items: center;
    padding: 10px 0;
    border-bottom: 1px solid #f0f0f0;
}

.feature-summary-list li:last-child {
    border-bottom: none;
}

.feature-summary-list li i {
    color: #27ae60;
    margin-right: 12px;
    font-size: 16px;
}

.feature-name {
    flex: 1;
    color: #34495e;
    font-weight: 500;
}

.feature-count {
    color: #7f8c8d;
    font-size: 14px;
}


.loading-overlay {
        display: none; /* Initially hidden */
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
        z-index: 9999;
        text-align: center;
        color: white;
    }

    /* Centering the spinner */
    .loading-spinner {
        border: 9px solid #f3f3f3; /* Light grey */
        border-top: 9px solid #3498db; /* Blue */
        border-radius: 50%;
        width: 50px;
        height: 50px;
        animation: spin 2s linear infinite;
        margin-bottom:15px;
    }

    /* Spinner animation */
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>
<div class="page-wrapper">

<div id="loadingScreen" class="loading-overlay">
    <div class="loading-spinner"></div>
    <p>Sedang memproses, silahkan menunggu...</p>
    </div>
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Push Notif</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Push Notif List</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
			  
                <div class="card">
					<div class="card-body">
						<div class="d-lg-flex align-items-center mb-4 gap-3">
							<div class="position-relative">
								<input type="text" class="form-control ps-5 radius-30" id="searchInput" placeholder="Ketik nama agensi"> <span class="position-absolute top-50 product-show translate-middle-y"><i class="bx bx-search"></i></span>
							</div>
                            <button type="button" class="btn btn-sm btn-primary" onclick="GoInitiate('all')">Inisiasi Kirim Push Notif ke Semua</button>
                            
						</div>
						<div class="table-responsive">
							<table class="table mb-0">
								<thead class="table-light table-header">
									<tr>
										<th>No.</th>
										<th>Nama agensi</th>
                                        <th style="text-align:right;">Aksi</th>         <!-- new -->
									</tr>
								</thead>
								<tbody class="putContentHere" id="agencyTableBody">
								</tbody>
                                <tfoot class="footerContentHere">

                                </tfoot>
							</table>
						</div>
					</div>
				</div>


			</div>
		</div>

        <div class="modal fade" id="modalImportData" tabindex="-1" aria-hidden="true"   data-bs-keyboard="false" data-bs-backdrop="static">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Import Data</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
                        <label for="kodeInstansi" >Kode Instansi</label>
						<input type="text" disabled id="kodeInstansi" class="form-control mb-3">

                        <label for="tipeImport" class="">Tipe Import</label>
                        <select id="tipe" class="form-control mb-3">
                            <option value="">Pilih tipe import</option>
                            <option value="siswa">Santri / Siswa</option>
                            <option value="general">General</option>
                        </select>

                        <label for="file">File</label>
                        <input type="file" class="form-control" id="file">
					</div>
					<div class="modal-footer text-center">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
						<button type="button" onclick="commitUpload();" id="btnUpload" class="btn btn-outline-primary">Mulai Import Data</button>
					</div>
				</div>
			</div>
		</div>
        
        
        <div class="modal fade" id="modalLoginByPass" tabindex="-1" aria-hidden="true"   data-bs-keyboard="false" data-bs-backdrop="static">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Login By Pass Root</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
                        <label for="namaInstansi" >ID Instansi</label>
						<input type="text" disabled id="namaInstansi" class="form-control mb-3">
                        
                        <label for="userInstansi" >Username</label>
						<input type="text" disabled id="userInstansi" class="form-control mb-3">
					</div>
					<div class="modal-footer text-center">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
						<button type="button" id="btnCommitLoginReport" class="btn btn-outline-danger">Show Report</button>
						<button type="button" id="btnCommitLogin" class="btn btn-outline-primary">Commit Login</button>
					</div>
				</div>
			</div>
		</div>

        <div class="modal fade" id="notifModal" tabindex="-1" aria-labelledby="notifModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="notifModalLabel">Kirim Notifikasi Push</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body row">
                    <!-- Left column: user list -->
                    <div class="col-md-6 border-end" style="overflow-y: auto; max-height: 80vh;">

                    <div id="userListSummary"></div>
                    <div class="form-check mb-2 alert alert-secondary">
                        <div class="row">
                            <div class="col-12 px-5">
                                <input class="form-check-input" type="checkbox" id="toggleUnique" onchange="renderUserList(currentUserList)">
                                <label class="form-check-label" for="toggleUnique">
                                    Group by Orangtua
                                </label>
                                <p><small><i>Jika mode Group by Orangtua aktif, daftar berikut akan secara otomatis hanya menampilkan 1 data orangtua saja.</i></small></p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <strong>Daftar Pengguna</strong>
                        <button class="btn btn-sm btn-secondary" onclick="toggleCheckAll(this)">Check All</button>
                    </div>

                    <div id="userListColumn">
                        <!-- User list checkboxes will be injected here -->
                    </div>
                    </div>
                    
                    <div class="col-md-6">
                    <div class="mb-3">
                        <label for="judulNotif" class="form-label">Judul Notifikasi</label>
                        <input type="text" class="form-control" id="judulNotif" placeholder="Maksimal 50 karakter" oninput="updateNotifPreview()" maxlength="50">
                        <div class="form-text text-end"><span id="judulNotifCount">50</span> karakter tersisa</div>
                    </div>

                    <div class="mb-3">
                        <label for="deskripsiNotif" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="deskripsiNotif" rows="5" oninput="updateNotifPreview()" maxlength="200" placeholder="Maksimal 200 karakter"></textarea>
                        <div class="form-text text-end"><span id="deskripsiNotifCount">200</span> karakter tersisa</div>
                    </div>

                    <div class="mb-3">
                        <button class="btn btn-success" onclick="SendNotification()">Kirim Notifikasi</button>
                    </div>

                    <hr>
                    <h4 style="font-weight:900;">Preview Push Notif</h4>
                    <!-- Smartphone Notification Preview -->
                    <div class="card shadow-sm mt-4" style="max-width: 300px; border-radius: 20px; background: #f4f4f4;">
                        <div class="card-body">
                        <div style="font-size: 0.75rem; color: #888;">Qrion Smart School • Now</div>
                        <div id="previewJudul" style="font-weight: bold; font-size: 1rem; margin-top: 5px;">(Judul Notifikasi)</div>
                        <div id="previewDeskripsi" style="font-size: 0.9rem; margin-top: 5px;">(Isi deskripsi notifikasi)</div>
                        </div>
                    </div>
                    </div>


                </div>
                </div>
            </div>
            </div>


		<script type="text/javascript">

            let idsett = '';

            
            $('#modalImportData').on('hidden.bs.modal', function () {
                // $('#modalSetCard').modal('toggle');
                idsett = '';
                
            });
            
			$(document).ready(function () {
                showData();

                $('.box1val').attr('style','display:none;');
                $('.box10val').attr('style','display:none;');
            });

           
            let allData = []; // store all data for filtering

            function toggleCheckAll(button) {
                const checkboxes = document.querySelectorAll('#userListColumn input[type="checkbox"]');
                const allChecked = Array.from(checkboxes).every(cb => cb.checked);

                checkboxes.forEach(cb => cb.checked = !allChecked);
                button.textContent = allChecked ? "Check All" : "Uncheck All";

                updateSelectedCount();
            }

            function updateNotifPreview() {
                const judul = document.getElementById("judulNotif").value.trim();
                const deskripsi = document.getElementById("deskripsiNotif").value.trim();

                // Update preview
                document.getElementById("previewJudul").textContent = judul || "(Judul Notifikasi)";
                document.getElementById("previewDeskripsi").textContent = deskripsi || "(Isi deskripsi notifikasi)";

                // Update character count
                document.getElementById("judulNotifCount").textContent = 50 - judul.length;
                document.getElementById("deskripsiNotifCount").textContent = 200 - deskripsi.length;
            }

            
			function showData(){
                
                let num = 0;
                let tableColumn = '';
                tableColumn += `<tr><td colspan="8" class="text-center">Loading...</td></tr>`;
                $('.putContentHere').html(tableColumn);

                const save2 = async () => {
                    const posts2 = await axios.get('<?=base_url(); ?>CPanel_Admin/getDataAgensiAllPushNotif').catch((err) => {
                        console.log(err.response);
                    });

                    if (posts2.status == 200) {
                        tableColumn = '';
                        allData = posts2.data.data;

                        
                        posts2.data.data.map((mapping, i) => {
                            num += 1;
                            tableColumn += `
                                <tr>
                                    <td>${num}</td>
                                    <td style="white-space: normal; max-width:200px;">
                                        <img src="<?=base_url();?>app/assets/users/foto/${mapping.foto}" 
                                            style="width:30px; height:30px; object-fit:cover; border-radius:5px; margin-bottom:20px; float:left; margin-right:10px;" />
                                        ${mapping.nama}
                                    </td>
                                    <td style="text-align:right;">
                                        <button type="button" class="btn btn-sm btn-primary" onclick="GoInitiate('${mapping.idINSTANSI}')">Inisiasi Kirim Push Notif</button>
                                    </td>
                                </tr>
                            `;
                        });

                        $('.putContentHere').html(tableColumn);

                        
                    }
                };
                save2();
            }

            let currentUserList = [];

            function GoInitiate(idINSTANSI) {
                showLoading();
                axios.post(`<?= base_url(); ?>CPanel_Admin/ShowDataFCMToken/${idINSTANSI}`)
                    .then(function(response) {

                        hideLoading();
                        currentUserList = response.data.data || [];
                        document.getElementById("judulNotif").value = "";
                        document.getElementById("deskripsiNotif").value = "";
                        renderUserList(currentUserList);
                        new bootstrap.Modal(document.getElementById("notifModal")).show();
                    })
                    .catch(function(error) {
                        alert("Failed to fetch user list: " + error);
                    });
            }

            function renderUserList(userList) {
                const showUnique = document.getElementById("toggleUnique")?.checked;
                let userListHTML = '';
                let summaryHTML = '';

                // Optional: de-duplicate based on user_id
                let filteredList = userList;
                if (showUnique) {
                    const seenUserIds = new Set();
                    filteredList = userList.filter(user => {
                        if (seenUserIds.has(user.user_id)) return false;
                        seenUserIds.add(user.user_id);
                        return true;
                    });
                }

                // Build user list checkboxes
                filteredList.forEach((user, index) => {
                    userListHTML += `
                        <div class="form-check">
                            <input 
                                class="form-check-input user-checkbox" 
                                type="checkbox" 
                                value="${user.token_firebase}" 
                                data-user="${user.nama_lengkap}" 
                                data-id="${user.user_id}" 
                                data-instansi="${user.instansi_id}"
                                id="userCheck${index}">
                            <label class="form-check-label" for="userCheck${index}">
                                <b>${user.nama_lengkap}</b> <i>(${user.nama_siswa})</i>
                            </label>
                        </div>
                    `;
                });

                // Summary
                const totalData = filteredList.length;
                const instansiSet = new Set(filteredList.map(u => u.instansi_name));

                summaryHTML = `
                    <div class="col-12 mt-3">
                        <div class="card border shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title mb-3">Ringkasan Data</h5>
                                <div class="row">
                                    <div class="col-6">
                                    Total Data Ditampilkan:</b> 
                                    <h2>${totalData}</h2>
                                    </div>
                                    <div class="col-6">
                                    Data Terpilih:</b> 
                                    <h2><span id="selectedCount">0</span></h2>
                                    </div>
                                    <div class="col-12">
                                    Instansi:</b> 
                                    <h6>
                                    ${[...instansiSet]
                                        .map(id => `<span class="badge bg-danger me-1">${id}</span>`)
                                        .join('')}
                                    </h6>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                `;

                document.getElementById("userListSummary").innerHTML = summaryHTML;
                document.getElementById("userListColumn").innerHTML = userListHTML;

                // Update selected count live
                document.querySelectorAll('.user-checkbox').forEach(cb => {
                    cb.addEventListener('change', updateSelectedCount);
                });
                updateSelectedCount();
            }

            function updateSelectedCount() {
                const selected = document.querySelectorAll('.user-checkbox:checked').length;
                document.getElementById("selectedCount").textContent = selected;
            }

            function SendNotification() {
                showLoading();
                const title = document.getElementById("judulNotif").value.trim();
                const body = document.getElementById("deskripsiNotif").value.trim();
                let selectedTokens = [];
                document.querySelectorAll('#userListColumn input[type="checkbox"]:checked').forEach(cb => {
                    selectedTokens.push({
                        token: cb.value,
                        user: cb.dataset.user,
                        user_id: cb.dataset.id,
                        instansi: cb.dataset.instansi,
                    });
                });

                if (!title || !body || selectedTokens.length === 0) {
                    alert("Judul, Deskripsi, dan minimal satu user harus dipilih.");
                    return;
                }

                axios.post('<?= base_url(); ?>CPanel_Admin/SendPushNotification', {
                    title: title,
                    body: body,
                    tokens: selectedTokens
                }).then(response => {
                    Toastify({
                        text: response.data.message,
                        duration: 3000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        className: "successMessage",

                    }).showToast();

                    hideLoading();
                    // bootstrap.Modal.getInstance(document.getElementById('notifModal')).hide();
                }).catch(error => {
                    alert("Gagal mengirim notifikasi: " + error);
                });
            }


            function CheckStatusAll(){
                showLoading();
                const save2 = async () => {
					const posts2 = await axios.get('<?=base_url(); ?>WebhookOncard/CheckConnectivity/').catch((err) => {
						console.log(err.response);
					});
			
					if (posts2.status == 200) {
                            location.reload();                        
					}
				}
				save2();
            }

            function getCountdownText(lastCheckedTime) {
                const now = new Date();
                const lastChecked = new Date(lastCheckedTime);
                const diff = 3 * 60 * 1000 - (now - lastChecked); // 10 menit dalam ms

                if (diff <= 0) return '';

                const minutes = Math.floor(diff / 60000);
                const seconds = Math.floor((diff % 60000) / 1000);
                return `${minutes}m ${seconds}s`;
            }

            function getCountdownRemaining(lastCheckedTime) {
                const now = new Date();
                const lastChecked = new Date(lastCheckedTime);
                const remaining = 3 * 60 * 1000 - (now - lastChecked); // 10 menit in ms
                return remaining > 0 ? remaining : 0;
            }



            function renderTable(data) {
                let tableColumn = '';
                let num = 0;

                data.forEach((mapping, i) => {
                    num += 1;
                           
                            tableColumn += `
                                <tr>
                                    <td>${num}</td>
                                    <td style="white-space: normal; max-width:200px;">
                                        <img src="<?=base_url();?>app/assets/users/foto/${mapping.foto}" 
                                            style="width:30px; height:30px; object-fit:cover; border-radius:5px; margin-bottom:20px; float:left; margin-right:10px;" />
                                        ${mapping.nama}
                                    </td>
                                    <td style="text-align:right;">
                                        <button type="button" class="btn btn-sm btn-primary" onclick="GoInitiate('${mapping.watzap_id}')">Inisiasi Kirim Push Notif</button>
                                    </td>
                                </tr>
                            `;
                });

                document.getElementById('agencyTableBody').innerHTML = tableColumn;
            }


            document.getElementById('searchInput').addEventListener('keyup', function () {
                const query = this.value.toLowerCase();
                const filtered = allData.filter(item => item.nama.toLowerCase().includes(query));
                renderTable(filtered);
            });


            function toggleFeature(name, instansi_id) {
                axios.post('<?= api_url(); ?>api/v1/package/instalation', {
                    name: name,
                    instansi_id: instansi_id
                    },{
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).then(response => {
                    console.log('Toggle updated:', response.data);

                    Toastify({
                        text: response.data.name + ' set to be '+ response.data.status,
                        duration: 3000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        className: "successMessage",

                    }).showToast();
                    // Optionally, show toast/success feedback
                }).catch(error => {
                    console.error('Error toggling feature:', error);
                    // Optionally, show error feedback
                });
            }


            function commitUpload() {

                $('#btnUpload').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Memproses...');
                $('#btnUpload').attr('disabled', 'disabled');
                $('#btnUpload').css('cursor', 'not-allowed');

                var kode = idsett;
                var tipe = $("#tipe").val();
                var imageuploadify = $("#file")[0].files[0]; 
                
                var form_data = new FormData();
                form_data.append('instansi_id', kode);
                form_data.append('user_import', tipe);
                
                if(imageuploadify!=''){
                    form_data.append('files', imageuploadify);	
                }else {
                    Toastify({
                        text: 'File harus dipilih (format : .xls atau .xlsx)',
                        duration: 3000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        className: "errorMessage",

                    }).showToast();
                    return false;
                }
                
                if(tipe==''){
                    Toastify({
                        text: 'Harus dipilih tipe import!',
                        duration: 3000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        className: "errorMessage",

                    }).showToast();
                    return false;
                }
                
                const save = async (form_data) => {
                    const posts = await axios.post('<?= api_url(); ?>api/import-users', form_data, {
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
                        
                        $('#btnUpload').html('Mulai Import Data');
                        $('#btnUpload').attr('disabled', false);
                        $('#btnUpload').css('cursor', 'pointer');
                    });
                    if (posts.status == 201||posts.status == 200) {

                        if (posts.data.status == true) {

                            Toastify({
                                text: 'Data berhasil diimport!',
                                duration: 3000,
                                close: true,
                                gravity: "top",
                                position: "right",
                                className: "successMessage",

                            }).showToast();

                            // location.reload();

                        } else {
                            Toastify({
                                text: posts.data.msg,
                                duration: 3000,
                                close: true,
                                gravity: "top",
                                position: "right",
                                className: "errorMessage",

                            }).showToast();
                        }

                        $('#btnUpload').html('Mulai Import Data');
                        $('#btnUpload').attr('disabled', false);
                        $('#btnUpload').css('cursor', 'pointer');

                    }else if(posts.status==500){
                        
                        Toastify({
                            text: "Server dalam perbaikan!",
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            className: "infoMessage",

                        }).showToast();
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
                        $('#btnUpload').html('Mulai Import Data');
                        $('#btnUpload').attr('disabled', false);
                        $('#btnUpload').css('cursor', 'pointer');
                    }

                }

                save(form_data);

                }

                $('#btnCommitLogin').on('click', function (event) {
                    let mmm = $("#userInstansi").val();
                    // console.log(mmm);
                    // return false;

                    event.preventDefault();
                        
                        var form_data = new FormData();
                        form_data.append('username', mmm);
                        form_data.append('tokens', localStorage.getItem('_token'));
                        // form_data.append('password', password);
                        form_data.append('remember_me', true);
                        
                        $("#btnCommitLogin").html('<span class="loader"></span>');
                        $('#btnCommitLogin').prop("disabled", true);
                        $("#btnCommitLogin").attr('style', 'cursor:not-allowed');

                        const ajaxAxiosLogin = async () => {
                            const login = await axios.post("<?= base_url('Login/LoginActionsByPass') ?>", form_data).catch((err) => {
                                // kesalahan login
                                console.log(err.response.data);
                            
                                Swal.fire({
                                    position: 'center',
                                    icon: 'error',
                                    title: 'Username dan password tidak sesuai',
                                    showConfirmButton: true,

                                });

                                $("#btnCommitLogin").html('<span class="button__text">Log in</span><i class="button__icon fas fa-chevron-right"></i>');
                                $('#btnCommitLogin').prop("disabled", false);
                                $("#btnCommitLogin").attr('style', 'cursor:pointer');

                            });
                            $(".loading").fadeOut();
                            
                            if(login.data.status==401||login.data.status==402){
                                let errortext = '';
                                if(login.data.status==402){
                                    errortext = 'Kombinasi username dan password tidak sesuai';
                                }else {
                                    errortext = login.data.result.error;
                                }
                                Toastify({
                                    text: errortext,
                                    duration: 3000,
                                    close: true,
                                    gravity: "top",
                                    position: "right",
                                    className: "errorMessage",

                                }).showToast();
                                
                                $("#btnCommitLogin").html('<i class="bx bxs-lock-open"></i>Sign in');
                                $('#btnCommitLogin').prop("disabled", false);
                                $("#btnCommitLogin").attr('style', 'cursor:pointer');
                                
                                return false;
                            }else if(login.data.status==200){
                                    
                                Toastify({
                                    text: "Berhasil login!",
                                    duration: 3000,
                                    close: true,
                                    gravity: "top",
                                    position: "right",
                                    className: "successMessage",

                                }).showToast();
                                sessionStorage.setItem('_token', login.data.result.data.access_token);
                                localStorage.setItem('_token', login.data.result.data.access_token);
                                sessionStorage.setItem('_permission', login.data.result.data.permission);
                                localStorage.setItem('_permission', login.data.result.data.permission);
                                sessionStorage.setItem('_user', login.data.result.data.users.username);
                                localStorage.setItem('_user', login.data.result.data.users.username);
                                localStorage.setItem('_instansi_id', login.data.result.data.users.instansi_id);
                                sessionStorage.setItem('_instansi_id', login.data.result.data.users.instansi_id);

                                window.location.href = "<?= base_url('CPanel_Admin') ?>";

                            } else if(login.data.status==500){
                                    
                                Toastify({
                                    text: "Server dalam perbaikan!",
                                    duration: 3000,
                                    close: true,
                                    gravity: "top",
                                    position: "right",
                                    className: "infoMessage",

                                }).showToast();
                            } 

                            $("#btnCommitLogin").html('<i class="bx bxs-lock-open"></i>Sign in');
                            $('#btnCommitLogin').prop("disabled", false);
                            $("#btnCommitLogin").attr('style', 'cursor:pointer');

                        }
                        ajaxAxiosLogin();

                });
                
                
                $('#btnCommitLoginReport').on('click', function (event) {
                    let mmm = $("#userInstansi").val();
                    // console.log(mmm);
                    // return false;

                    event.preventDefault();
                        
                        var form_data = new FormData();
                        form_data.append('username', mmm);
                        form_data.append('tokens', localStorage.getItem('_token'));
                        // form_data.append('password', password);
                        form_data.append('remember_me', true);
                        
                        $("#btnCommitLoginReport").html('<span class="loader"></span>');
                        $('#btnCommitLoginReport').prop("disabled", true);
                        $("#btnCommitLoginReport").attr('style', 'cursor:not-allowed');

                        const ajaxAxiosLogin = async () => {
                            const login = await axios.post("<?= base_url('Login/LoginActionsByPass') ?>", form_data).catch((err) => {
                                // kesalahan login
                                console.log(err.response.data);
                            
                                Swal.fire({
                                    position: 'center',
                                    icon: 'error',
                                    title: 'Username dan password tidak sesuai',
                                    showConfirmButton: true,

                                });

                                $("#btnCommitLoginReport").html('<span class="button__text">Log in</span><i class="button__icon fas fa-chevron-right"></i>');
                                $('#btnCommitLoginReport').prop("disabled", false);
                                $("#btnCommitLoginReport").attr('style', 'cursor:pointer');

                            });
                            $(".loading").fadeOut();
                            
                            if(login.data.status==401||login.data.status==402){
                                let errortext = '';
                                if(login.data.status==402){
                                    errortext = 'Kombinasi username dan password tidak sesuai';
                                }else {
                                    errortext = login.data.result.error;
                                }
                                Toastify({
                                    text: errortext,
                                    duration: 3000,
                                    close: true,
                                    gravity: "top",
                                    position: "right",
                                    className: "errorMessage",

                                }).showToast();
                                
                                $("#btnCommitLoginReport").html('<i class="bx bxs-lock-open"></i>Sign in');
                                $('#btnCommitLoginReport').prop("disabled", false);
                                $("#btnCommitLoginReport").attr('style', 'cursor:pointer');
                                
                                return false;
                            }else if(login.data.status==200){
                                    
                                Toastify({
                                    text: "Berhasil login!",
                                    duration: 3000,
                                    close: true,
                                    gravity: "top",
                                    position: "right",
                                    className: "successMessage",

                                }).showToast();
                                sessionStorage.setItem('_token', login.data.result.data.access_token);
                                localStorage.setItem('_token', login.data.result.data.access_token);
                                sessionStorage.setItem('_permission', login.data.result.data.permission);
                                localStorage.setItem('_permission', login.data.result.data.permission);
                                sessionStorage.setItem('_user', login.data.result.data.users.username);
                                localStorage.setItem('_user', login.data.result.data.users.username);
                                localStorage.setItem('_instansi_id', login.data.result.data.users.instansi_id);
                                sessionStorage.setItem('_instansi_id', login.data.result.data.users.instansi_id);

                                window.location.href = "<?= base_url('CPanel_Admin/sector_a') ?>";
                            } else if(login.data.status==500){
                                    
                                Toastify({
                                    text: "Server dalam perbaikan!",
                                    duration: 3000,
                                    close: true,
                                    gravity: "top",
                                    position: "right",
                                    className: "infoMessage",

                                }).showToast();
                            } 

                            $("#btnCommitLoginReport").html('<i class="bx bxs-lock-open"></i>Sign in');
                            $('#btnCommitLoginReport').prop("disabled", false);
                            $("#btnCommitLoginReport").attr('style', 'cursor:pointer');

                        }
                        ajaxAxiosLogin();

                });

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
            
            function showLoading() {
				document.getElementById('loadingScreen').style.display = 'flex';
				$('#loadingScreen').css('flex-direction','column');
				$('#loadingScreen').css('align-items','center');
				$('#loadingScreen').css('justify-content','center');
			}

			function hideLoading() {
				document.getElementById('loadingScreen').style.display = 'none';
			}
		</script>