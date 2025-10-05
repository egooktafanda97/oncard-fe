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
</style>
<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Fitur Manajemen</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Daftar Institusi dan Fiturnya</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
			  
                <div id="summaryContainer" class="mb-3"></div>

				<div class="card">
					<div class="card-body">
						<div class="d-lg-flex align-items-center mb-4 gap-3">
							<div class="position-relative">
								<input type="text" class="form-control ps-5 radius-30" id="searchInput" placeholder="Ketik nama agensi"> <span class="position-absolute top-50 product-show translate-middle-y"><i class="bx bx-search"></i></span>
							</div>
						</div>
						<div class="table-responsive">
							<table class="table mb-0">
								<thead class="table-light table-header">
									<tr>
										<th>No.</th>
										<th>#Kode</th>
										<th>Nama agensi</th>
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

            let featureToggles = [
                { key: 'Ontuition', label: 'Ontuition' },
                { key: 'Oncard', label: 'Oncard' },
                { key: 'Ontime', label: 'Ontime' }
                
            ];

            let tableHeader = `
                <tr>
                    <th>#</th>
                    <th>Kode Instansi</th>
                    <th>Nama</th>
                    ${featureToggles.map(f => `<th>${f.label}</th>`).join('')}
                </tr>
            `;
            $('.table-header').html(tableHeader); // Optional: if you're rendering <thead> dynamically



            let allData = []; // store all data for filtering

            
			function showData(){
				let num = 0;
				let tableColumn = '';
				tableColumn += `<tr><td colspan="7" class="text-center">Loading...</td></tr>`;
				$('.putContentHere').html(tableColumn);
				
				const save2 = async () => {
					const posts2 = await axios.get('<?=base_url(); ?>CPanel_Admin/getDataAgensiAll').catch((err) => {
						console.log(err.response);
					});
			
					if (posts2.status == 200) {

                        console.log(posts2.data.data);

							tableColumn = '';
                            let totals = 0;
                            let totals2 = 0;
							tableColumn = '';

                            allData = posts2.data.data;

                            posts2.data.data.map((mapping, i) => {
                                num += 1;
                            tableColumn += `
                                <tr>
                                    <td>${num}</td>
                                    <td>${mapping.kode_instansi}</td>
                                    <td style="white-space: normal; max-width:200px;">
                                        <img src="<?=base_url();?>app/assets/users/foto/${mapping.foto}" 
                                            style="width:30px; height:30px; object-fit:cover; border-radius:5px; margin-bottom:20px; float:left; margin-right:10px;" />
                                        ${mapping.nama}
                                    </td>
                                    ${featureToggles.map(toggle => {
                                        const label = toggle.label;
                                        const isActive = Array.isArray(mapping.package) &&
                                            mapping.package.some(pkg =>
                                                pkg.name?.toLowerCase() === label.toLowerCase() &&
                                                pkg.status === 'active'
                                            );
                                        return `
                                            <td>
                                                <div class="form-check form-switch">
                                                    <input 
                                                        class="form-check-input" 
                                                        type="checkbox" 
                                                        role="switch" 
                                                        ${isActive ? 'checked' : ''} 
                                                        onchange="toggleFeature('${label}', ${mapping.idINSTANSI})">
                                                </div>
                                            </td>
                                        `;
                                    }).join('')}
                                </tr>
                            `;
                            });

                            let activeFeaturesCount = {};  // { Oncard: 3, Ontuition: 5, Ontime: 2 }

                            posts2.data.data.forEach(mapping => {
                                if (Array.isArray(mapping.package)) {
                                    mapping.package.forEach(pkg => {
                                        const name = pkg.name;
                                        const isActive = pkg.status === 'active';
                                        if (isActive) {
                                            if (!activeFeaturesCount[name]) {
                                                activeFeaturesCount[name] = 0;
                                            }
                                            activeFeaturesCount[name] += 1;
                                        }
                                    });
                                }
                            });

                            let summaryHTML = `
                                <div class="feature-summary-card">
                                    <div class="feature-summary-header">
                                        <i class="fas fa-chart-pie"></i>
                                        <h3>Active Features Summary</h3>
                                    </div>
                                    <div class="feature-summary-list">
                                        <ul>`;

                                for (const [feature, count] of Object.entries(activeFeaturesCount)) {
                                    summaryHTML += `
                                            <li>
                                                <i class="fas fa-check-circle"></i>
                                                <span class="feature-name">${feature}</span>
                                                <span class="feature-count">${count} active instansi</span>
                                            </li>`;
                                }

                                summaryHTML += `
                                        </ul>
                                    </div>
                                </div>`;

                                document.getElementById('summaryContainer').innerHTML = summaryHTML;
                        $('.putContentHere').html(tableColumn);
                       
					}
				}
				save2();
			}

            function renderTable(data) {
                let tableColumn = '';
                let num = 0;

                data.forEach((mapping, i) => {
                    num += 1;
                    tableColumn += `
                        <tr>
                            <td>${num}</td>
                            <td>${mapping.kode_instansi}</td>
                            <td style="white-space: normal; max-width:200px;">
                                <img src="<?=base_url();?>app/assets/users/foto/${mapping.foto}" 
                                    style="width:30px; height:30px; object-fit:cover; border-radius:5px; margin-bottom:20px; float:left; margin-right:10px;" />
                                ${mapping.nama}
                            </td>
                            ${featureToggles.map(toggle => {
                                const label = toggle.label;
                                const isActive = Array.isArray(mapping.package) &&
                                    mapping.package.some(pkg =>
                                        pkg.name?.toLowerCase() === label.toLowerCase() &&
                                        pkg.status === 'active'
                                    );
                                return `
                                    <td>
                                        <div class="form-check form-switch">
                                            <input 
                                                class="form-check-input" 
                                                type="checkbox" 
                                                role="switch" 
                                                ${isActive ? 'checked' : ''} 
                                                onchange="toggleFeature('${label}', ${mapping.idINSTANSI})">
                                        </div>
                                    </td>
                                `;
                            }).join('')}
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
		</script>