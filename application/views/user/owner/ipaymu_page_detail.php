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
					<div class="breadcrumb-title pe-3">IPAYMU CONNECT DETAIL</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page"><a href='<?=base_url();?>CPanel_Admin/IpaymuPanel'>Ipaymu Control</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Detail</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
			  
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
                            <div class="row">
                                <div class="col-12">
                                    
                                    <div class="contenheree"></div>
                                    <h3 class="instansi_name"></h3>
                                    
                                </div>
                            </div>
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
					const posts2 = await axios.get('<?=base_url(); ?>CPanel_Admin/getDataAgensiDetail/'+localStorage.getItem('_idsett_paymu')).catch((err) => {
						console.log(err.response);
					});
			
					if (posts2.status == 200) {

                        console.log(posts2.data.data);

							tableColumn = '';
							posts2.data.data.map((mapping,i)=>{
							num += 1;

                            $('.instansi_name').html(mapping.nama+'<br/><font style="font-size:16px; font-weight:normal;">'+mapping.username+"/"+mapping.email+"</font>");
                            $('.contenheree').html(`
                            <img src="<?=base_url();?>app/assets/users/foto/${mapping.foto}" style="width:60px; height:60px; object-fit:cover;border-radius:25px;margin-bottom:20px;float:left; margin-right:10px;"/>
                            `);

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
                                    <td>
										<div class="d-flex order-actions">
											<a href="#/" onclick="setInstansi('${mapping.idINSTANSI}');" class="me-3"><i class='bx bx-check'></i></a>
										</div>
									</td>
								</tr>
							`;
							});
							
                        $('.putContentHere').html(tableColumn);
							
					}
				}
				
				save2();
				
				
			}

            function setInstansi(id){
                localStorage.setItem('_idsett_paymu', id);
                window.location.href='<?=base_url();?>CPanel_Admin/IpaymuPanelDetail';
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

            $('.box1val').attr('style','display:none;');
                $('.box10val').attr('style','display:none;');
		</script>