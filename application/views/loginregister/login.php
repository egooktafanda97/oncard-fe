<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="<?=base_url();?>assets/png/icon.png" type="image/png" />
  
	<!--plugins-->
	<link href="<?=base_url();?>assets_oncard/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="<?=base_url();?>assets_oncard/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="<?=base_url();?>assets_oncard/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="<?=base_url();?>assets_oncard/css/pace.min.css" rel="stylesheet" />
	<script src="<?=base_url();?>assets_oncard/js/pace.min.js"></script>
	<link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="<?=base_url();?>assets_oncard/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?=base_url();?>assets_oncard/css/bootstrap-extended.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="<?=base_url();?>assets_oncard/css/app.css" rel="stylesheet">
	<link href="<?=base_url();?>assets_oncard/css/icons.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
  
  <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css/style_universal.css">
  
    <style type="text/css">
	.bg-login {
            background-image : url('<?=base_url();?>assets_oncard/images/login-images/bg_new.webp')!important;
        }
	.card {
		box-shadow: 0 0px 27px 0 rgb(218 218 253 / 85%), 0 2px 6px 0 rgb(206 206 238 / 94%)!important;
	}
	</style>
	<title>Oncard.id | Login</title>

</head>

<body class="bg-login">
	<!--wrapper-->
	<div class="wrapper">
		<div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
			<div class="container-fluid">
				<div class="row row-cols-1 row-cols-lg-7 row-cols-xl-5">
					<div class="col mx-auto">
						<div class="mb-4 text-center">
							<img src="<?=base_url();?>assets/png/icon.png" width="180" alt="" />
						</div>
						<div class="card">
							<div class="card-body">
								<div class=" p-3">
									<div class="text-center">
										<h3 class="">Sign In</h3>
										<p>Start by signing in to your account.</p>
									</div>
									<div class="form-body">
										<form class="row g-3">
											<div class="col-12">
												<label for="inputEmailAddress" class="form-label">Enter Username</label>
												<input type="username" class="form-control" name="username" id="inputEmailAddress" placeholder="Username">
											</div>
											<div class="col-12">
												<label for="inputChoosePassword" class="form-label">Enter Password</label>
												<div class="input-group" id="show_hide_password">
													<input type="password" class="form-control border-end-0" name="password" id="inputChoosePassword" value="12345678" placeholder="Enter Password">
                                                    <a tabindex="-1" href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
												</div>
											</div>
											
											</div>
											<div class="col-12 mt-3">
												<div class="d-grid">
													<button type="submit" class="btn btn-success" id="btnSbmtReg"><i class="bx bxs-lock-open"></i>Sign in</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
							<div class="text-secondary badge badge-sm badge-success text-center" style="width:100%;display:block;">
								<p style="display:block; margin:auto;">This apps in version 2.0 now!</p>
							</div>
						</div>
						
					</div>
				</div>
				<!--end row-->
			</div>
		</div>
	</div>
	<!--end wrapper-->
	<!-- Bootstrap JS -->
	<script src="<?=base_url();?>assets_oncard/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="<?=base_url();?>assets_oncard/js/jquery.min.js"></script>
	<script src="<?=base_url();?>assets_oncard/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="<?=base_url();?>assets_oncard/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="<?=base_url();?>assets_oncard/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.24.0/axios.min.js"
        integrity="sha512-u9akINsQsAkG9xjc1cnGF4zw5TFDwkxuc9vUp5dltDWYCSmyd0meygbvgXrlc/z7/o4a19Fb5V0OUE58J7dcyw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<!--Password show & hide js -->
	<script>
		$(document).ready(function () {
			$("#show_hide_password a").on('click', function (event) {
				event.preventDefault();
				if ($('#show_hide_password input').attr("type") == "text") {
					$('#show_hide_password input').attr('type', 'password');
					$('#show_hide_password i').addClass("bx-hide");
					$('#show_hide_password i').removeClass("bx-show");
				} else if ($('#show_hide_password input').attr("type") == "password") {
					$('#show_hide_password input').attr('type', 'text');
					$('#show_hide_password i').removeClass("bx-hide");
					$('#show_hide_password i').addClass("bx-show");
				}
			});
		});
	</script>
	<!--app JS-->
	<script src="<?=base_url();?>assets_oncard/js/app.js"></script>

  <script type="text/javascript">
    $('#btnSbmtReg').on('click', function (event) {
        event.preventDefault();
            var username = $("[name='username']").val();
            var password = $("[name='password']").val();
            
            var form_data = new FormData();
            form_data.append('username', username);
            form_data.append('password', password);
            form_data.append('remember_me', true);
            
            $("#btnSbmtReg").html('<span class="loader"></span>');
            $('#btnSbmtReg').prop("disabled", true);
            $("#btnSbmtReg").attr('style', 'cursor:not-allowed');

            const ajaxAxiosLogin = async () => {
                const login = await axios.post("<?= base_url('Login/LoginActions') ?>", form_data).catch((err) => {
                    // kesalahan login
                    console.log(err.response.data);
 				
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Username dan password tidak sesuai',
                        showConfirmButton: true,

                    });

                    $("#btnSbmtReg").html('<span class="button__text">Log in</span><i class="button__icon fas fa-chevron-right"></i>');
                    $('#btnSbmtReg').prop("disabled", false);
                    $("#btnSbmtReg").attr('style', 'cursor:pointer');

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
					sessionStorage.setItem('_token', login.data.result.data.access_token);
                    localStorage.setItem('_token', login.data.result.data.access_token);
					sessionStorage.setItem('_permission', login.data.result.data.permission);
                    localStorage.setItem('_permission', login.data.result.data.permission);
					sessionStorage.setItem('_user', login.data.result.data.users.username);
                    localStorage.setItem('_user', login.data.result.data.users.username);

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

				$("#btnSbmtReg").html('<i class="bx bxs-lock-open"></i>Sign in');
				$('#btnSbmtReg').prop("disabled", false);
				$("#btnSbmtReg").attr('style', 'cursor:pointer');

            }
            ajaxAxiosLogin();

    });
  </script>
</body>

</html>