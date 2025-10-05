
<style>
    .card {
    max-width: 400px;
    margin: 60px auto;
    background-color: #ffffff;
    border-radius: 16px;
    transition: box-shadow 0.3s ease-in-out;
}

.card:hover {
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
}

.btn-primary {
    background: linear-gradient(135deg, #4e73df, #1cc88a);
    border: none;
}

.btn-primary:hover {
    background: linear-gradient(135deg, #1cc88a, #4e73df);
}
</style>
<div class="page-wrapper" style="margin-left:0px;">
			<div class="page-content">
				<!--breadcrumb-->
				
			  
                <div class="container min-vh-60 d-flex justify-content-center align-items-center">
                    <div class="col-12 col-md-12 col-lg-6">

                    
                        <div class="row">
                            <div class="col-12 text-center">
                            <img src="https://qrion.id/assets_qrion/img/logo_qrion_x.png" alt="" style="width:300px;margin-top:10px;">
                            </div>
                        </div>
                    
                        <div class="card shadow-sm border-0 rounded-4" style="margin-top:30px;">
                            <div class="card-body p-4">
                                <h4 class="text-center mb-4 fw-bold">Login<br/>
                                <font style="font-weight:900">2nd Step Login Super Admin</font></h4>
                                <form>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Username</label>
                                        <input type="text" style="font-size:12px;" class="form-control form-control-lg rounded-3" id="username" name="username" placeholder="Enter your username">
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" style="font-size:12px;" class="form-control form-control-lg rounded-3" id="password" name="password" placeholder="Enter your password">
                                    </div>

                                    <div class="d-grid mt-4">
                                        <button type="button" id="btnSbmtReg" class="btn btn-primary btn-lg rounded-3">Login</button>
                                    </div>
                                    <hr style="margin-top:35px; margin-bottom:35px;opacity:1; background:#ccc;border-color:#ccc;">
                                    <font class="px-3" style="display:table; text-align:center;background:#ccc; padding:3px;margin:auto; color:#fff;border-radius:100px;margin-top:-48px; ">atau</font>
                                    <div class="d-grid mt-4">
                                        <button type="button" id="btnAsGuest" class="btn btn-outline-secondary btn-lg rounded-3">Login sebagai Guest</button>
                                    </div>
                                </form>
                            </div>
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

        <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.1.7/js/dataTables.fixedHeader.min.js"></script>

		<script type="text/javascript">

            let idsett = '';
            let table;

            $('#modalImportData').on('hidden.bs.modal', function () {
                // $('#modalSetCard').modal('toggle');
                idsett = '';
                
            });

            $('#btnSbmtReg').on('click', function (event) {
                event.preventDefault();
                    var username = $("[name='username']").val();
                    var password = $("[name='password']").val();
                    
                    var form_data = new FormData();
                    form_data.append('username', username);
                    form_data.append('password', password);
                    
                    $("#btnSbmtReg").html('Memproses...');
                    $('#btnSbmtReg').prop("disabled", true);
                    $("#btnSbmtReg").attr('style', 'cursor:not-allowed');

                    const ajaxAxiosLogin = async () => {
                        const login = await axios.post("<?= base_url('Login/LoginSuper') ?>", form_data).catch((err) => {
                            // kesalahan login
                            console.log(err.response.data);
                        
                            Swal.fire({
                                position: 'center',
                                icon: 'error',
                                title: 'Username dan password tidak sesuai',
                                showConfirmButton: true,

                            });

                            $("#btnSbmtReg").html('Login');
                            $('#btnSbmtReg').prop("disabled", false);
                            $("#btnSbmtReg").attr('style', 'cursor:pointer');

                        });
                        $(".loading").fadeOut();
                        
                        if(login.data.status==401||login.data.status==402||login.data.status==422){
                            let errortext = '';
                            if(login.data.status==402 || login.data.status==422){
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
                            
                            $("#btnSbmtReg").html('<i class="bx bxs-lock-open"></i>Sign in');
                            $('#btnSbmtReg').prop("disabled", false);
                            $("#btnSbmtReg").attr('style', 'cursor:pointer');
                            
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

                            if(login.data.result.user_token){
                                sessionStorage.setItem('_is_admin', login.data.result.user_token);
                                localStorage.setItem('_is_admin', login.data.result.user_token);
                                window.location.href = "<?= base_url('CPanel_Admin') ?>";
                            }else {
                                Toastify({
                                    text: "Error! Silahkan ulangi beberapa saat lagi ya.",
                                    duration: 3000,
                                    close: true,
                                    gravity: "top",
                                    position: "right",
                                    className: "infoMessage",

                                }).showToast();
                            }
                            
                            // sessionStorage.setItem('_is_admin', login.data.result.data.token);
                            // localStorage.setItem('_is_admin', login.data.result.data.token);

                            // window.location.href = "<?= base_url('CPanel_Admin') ?>";

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

                        $("#btnSbmtReg").html('<i class="bx bxs-lock-open"></i>Sign in');
                        $('#btnSbmtReg').prop("disabled", false);
                        $("#btnSbmtReg").attr('style', 'cursor:pointer');

                    }
                    ajaxAxiosLogin();

            });
            
            
            $('#btnAsGuest').on('click', function (event) {
                event.preventDefault();
                    var username = $("[name='username']").val();
                    var password = $("[name='password']").val();
                    
                    var form_data = new FormData();
                    form_data.append('username', username);
                    form_data.append('password', password);
                    form_data.append('remember_me', true);
                    
                    $("#btnAsGuest").html('Memproses...');
                    $('#btnAsGuest').prop("disabled", true);
                    $("#btnAsGuest").attr('style', 'cursor:not-allowed');

                    sessionStorage.setItem('_is_admin', false);
                    localStorage.setItem('_is_admin', false);

                    window.location.href = "<?= base_url('CPanel_Admin') ?>";

            });

            $(document).ready(function () {
                // showData();

                $('.box1val').attr('style','display:none;');
                $('.box10val').attr('style','display:none;');

                table = $('#example').DataTable( {
					fixedHeader: true,
					"processing": true,
					//"serverSide": true,
					"searching": true,
					columnDefs: [
						{
							targets: [2], // Column index (e.g., 1 for the second column)
							className: 'text-right' // Adds a class for right alignment
						}
					],
					order: [[3, 'desc']], // Order by "created_at" column in descending order (most recent first)
					ajax: function (data, callback) {
						axios.get('<?=base_url(); ?>CPanel_Admin/getDataKartu50Max').then(response => {
								
								callback({
									data: response.data.data
								});
							})
							.catch(error => {
								console.error('Error fetching data:', error);
							});
					},
					columns: [
                        { data: 'id', title: 'ID' },          // Maps to 'age' field
						
						{ 
							data: 'card_id', 
							title: 'Kode Kartu', 
							render: function (data, type, row) {
								
								return `<span class="kode-semester text-primary" style="font-weight: bold; ">
											${row.card_id}
										</span>`;
							} 
						},
						{ data: 'keterangan', title: 'Status' },          // Maps to 'age' field
						{ data: 'created_at', title: 'Terbuat Pada' },          // Maps to 'age' field
					],
					lengthMenu: [[20, 35, 50, -1], [20, 35, 50, "All"]], // Add "All" option
    				pageLength: 20 // Default page length
				} );
            });
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
							posts2.data.data.map((mapping,i)=>{
							num += 1;
                            totals += parseInt(mapping.punyaoncard);
							tableColumn +=`
								<tr>
									<td>
										<div class="d-flex align-items-center">
											<div class="ms-2">
												<h6 class="mb-0 font-14">${num}</h6>
											</div>
										</div>
									</td>
									<td>${mapping.kode_instansi}</td>
									<td style="white-space: normal !important;max-width:200px;min-width:200px;">
                                    <img src="<?=base_url();?>app/assets/users/foto/${mapping.foto}" style="width:30px; height:30px; object-fit:cover;border-radius:5px;margin-bottom:20px;float:left; margin-right:10px;"/>
                                    ${mapping.nama}
                                    
                                    </td>
                                    <td>${mapping.username} / <small class="text-muted">${mapping.email}</small></td>
									<td style="word-wrap: break-word!important;min-width: 160px;max-width: 160px;white-space: normal !important;">${mapping.alamat}</td>
									<td style="word-wrap: break-word!important;min-width: 160px;max-width: 160px;white-space: normal !important;">Rp${formatRupiah(mapping.punyaoncard)}</td>
									<td>
										<div class="d-flex order-actions">
											<a href="#/" onclick="openDialogImport('${mapping.idINSTANSI}');" class="me-3"><i class='bx bx-import'></i></a>
										</div>
                                        <div class="d-flex order-actions mt-3">
											<a href="#/" onclick="openDialogLoginByPass('${mapping.idINSTANSI}','${mapping.username}');" class="btn-success me-3"><i class='bx bx-log-in-circle'></i></a>
										</div>
									</td>
								</tr>
							`;
							});
							
                        $('.putContentHere').html(tableColumn);
                        $('.footerContentHere').html(`<tr style="font-size:15px;font-weight:bold;"><td colspan="5">Total</td><td colspan="2">Rp${formatRupiah(totals.toString())}</td></tr>`);
							
					}
				}
				
				save2();
				
				
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