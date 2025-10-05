
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ontuition by QRION</title>
    <!-- <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"> -->
    <link href="<?=base_url();?>assets_oncard/logo/o_white.png" rel="icon" type="image/png" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link href="<?=base_url();?>assets_oncard/css/icons.css" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.11/typed.min.js" integrity="sha512-BdHyGtczsUoFcEma+MfXc71KJLv/cd+sUsUaYYf2mXpfG/PtBjNXsPo78+rxWjscxUYN2Qr2+DbeGGiJx81ifg==" crossorigin="anonymous"></script>

  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
  
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap');
    /* HTML: <div class="loader"></div> */
    .loader {
    width: 20px;
    aspect-ratio: 1;
    display:grid;
    -webkit-mask: conic-gradient(from 15deg,#fff,#fff);
    animation: l26 1s infinite steps(12);
    }
    .loader,
    .loader:before,
    .loader:after{
    background:
        radial-gradient(closest-side at 50% 12.5%,
        #fff 96%,#0000) 50% 0/20% 80% repeat-y,
        radial-gradient(closest-side at 12.5% 50%,
        #fff 96%,#0000) 0 50%/80% 20% repeat-x;
    }
    .loader:before,
    .loader:after {
    content: "";
    grid-area: 1/1;
    transform: rotate(30deg);
    }
    .loader:after {
    transform: rotate(60deg);
    }

    @keyframes l26 {
    100% {transform:rotate(1turn)}
    }

    .toastify {
        max-width:92%!important;
        justify-content:center!important;
        align-items:center!important;
        border-radius:100px!important;
        overflow:hidden;
        font-size:12px;
    }
    .errorMessage {
        background: rgb(176, 0, 71);
        background: linear-gradient(180deg, rgba(176, 0, 71, 1) 0%, rgba(131, 32, 32, 1) 100%);
    }

    .successMessage {
        background: linear-gradient(to right, #00b09b, #96c93d);
    }
    
    </style>
    <style>
        
body {
    font-family: "Plus Jakarta Sans", sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    /* height: 100vh; */
    background-color: #fff;
    width:100%;
    overflow-x:hidden;
    clear:*
}
input[type=text],input[type=password],button{
    padding:12px;
    border:1px solid #333;
    /* border-radius:3px!important; */
    border-radius:100px!important;
    outline:none;
}

header {
    width: 100%;
    padding: 1rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: white;
    /* box-shadow: 0 2px 4px rgba(0,0,0,0.1); */
    position:absolute;
    top:0;
    margin-bottom:30px;
}

.logo img {
    height: 60px;
    margin-left:25px;
}

.user-info {
    display: flex;
    align-items: center;
    color:#555;
    font-size:16px;
}

.time, .date {
    margin-right: 10px;
}

.avatar {
    width: 40px;
    height: 40px;
    border-radius: 50%;
}

main {
    display: flex;
    justify-content: center; /* Center content horizontally */
    align-items: center; /* Center content vertically */
    width: 90%;
    height: 100vh; /* Full viewport height */
    margin: 0 auto; /* Center horizontally */
}


.left-section, .right-section {
    flex: 1;
    margin: 1rem;
}

.right-section {
    display:flex;
    justify-content:center;
}

.left-section h1 {
    font-size: 2rem;
    margin-bottom: 1rem;
}

.left-section p {
    margin-bottom: 1.5rem;
}

.buttons {
    display: flex;
    margin-bottom: 1.5rem;
    gap:20px;
}

button {
    padding: 0.75rem 1.5rem;
    border: none;
    margin-right: 1rem;
    cursor: pointer!important;
    font-size: 1rem;
}

.new-meeting {
    background-color: #4285f4;
    color: white;
}

.join-meeting {
    background-color: #f1f3f4;
    color: black;
}

.learn-more {
    color: #4285f4;
    text-decoration: none;
}

.right-section img {
    /* width: 100%; */
    /* max-width: 300px; */
    display: block;
    margin-bottom: 1rem;
}

.try-it {
    background-color: #25aa61;
    color: white;
    padding: 0.75rem 1.5rem;
    border: none;
    cursor: pointer;
    font-size: 1rem;
}

h1,h2 {
    font-weight:normal;
}
p {
    color:#777
}
@media (max-width: 768px) {
    body {
        width:100%;
        /* overflow-x:hidden; */
    }
    main {
        flex-direction: column;
        /* width:100%; */
        overflow-x:hidden;
        height:auto;
        /* overflow:hidden; */
        margin-top:100px;
    }

    .left-section, .right-section {
        /* margin: 0.5rem; */
    }
    .buttons{
        display:flex;
        flex-direction:column;
        flex:1
    }
    input[type=text],input[type=password],button{
        width:90%;
        border-radius:100px!important
    }
    .logo img {
        margin:0;
        height:35px;
    }
    header,.user-info {
        display:block;
        text-align:center;
    }
}
button:hover {
    cursor:pointer;
}
    </style>
</head>
<body>
    <header>
        <div class="logo">
            <img src="<?=base_url();?>assets_oncard/images/Logo_Ontuition_Dark.png" alt="Logo Oncard">
        </div>
        <div class="user-info">
            <span class="time" id="datetime"></span>
        </div>
    </header>
    <main>
        <section class="left-section">

            <div style="display:flex;font-weight:400;color:#555;">
                <div class="text" style="margin-left:0px;"></div>
                <script>
                var typing=new Typed(".text", {
                    strings: ["", "Ontuition by Qrion: Solusi Penagihan Otomatis yang Tepat Waktu!", "Kelola Tagihan dengan Mudah dan Terjadwal Bersama Ontuition!", "Bayar & Tagih Tanpa Ribet - Ontuition by Qrion Pasti Tepat!", "Jadwal Rapi, Tagihan Tertagih – Ontuition by Qrion Andalan Bisnis Anda!", "Akurasi & Efisiensi dalam Penagihan? Ontuition by Qrion Jawabannya!"],
                    typeSpeed: 40,
                    backSpeed: 40,
                    loop: true,
                });
                </script>
            </div>

            <h1>Gunakan <font style="text-decoration:underline;">Ontuition by Qrion</font> dengan fitur yang serba ada</h1>
            
            <div class="form-body">
                <form  class="row g-3 buttons" method="POST">
                    <input type="hidden" name="_token" value="gAXrB8MEadIbX2IBg4vauTufoJtu6PbX4g8Ud7BE" autocomplete="off">
                    <div class="col-12">
                        <input type="text" class="form-control" id="username"
                            name="username" placeholder="Masukkan Username" style=";" onkeypress="handleEnter(event);">
                    </div>
                    <div class="col-12">
                        <div class="input-group" id="show_hide_password" style="display:flex; flex-direction:row;">
                            <input type="password" class="form-control border-end-0"
                                id="password" name="password" placeholder="Masukkan Password" onkeypress="handleEnter(event);">
                            <a style="    margin-left: -37px;
                                margin-top: 4px;
                                margin-bottom: 6px;
                                color: #000 !important;
                                background: #fff;
                                border-radius: 100px;
                                padding: 8px;
                                line-height: 0px;
                                padding-top: 15px;" href="javascript:;" class="input-group-text bg-transparent text-dark">
                                <i class='bx bx-hide'></i>
                            </a>
                        </div>
                    </div>
                    
                    <div class="col-12">
                        <div class="d-grid">
                            <button type="button" class="try-it" style="gap:10px; display:flex;" id="btnSbmtReg"><i
                                    class="bx bxs-lock-open mr-2 d-block"></i>Log in</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <section class="right-section">
        <!-- <img src="https://oncard.id/assets/png/anim.gif"/>     -->
        <img src="https://oncard.id/assets_oncard/images/Bann_onto.png" style="border-radius:25px; height:350px;width:500px; object-fit:contain;"/>    
        
        </section>
    </main>

    <script src="<?=base_url();?>assets_oncard/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="<?=base_url();?>assets_oncard/js/jquery.min.js"></script>
	<script src="<?=base_url();?>assets_oncard/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="<?=base_url();?>assets_oncard/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="<?=base_url();?>assets_oncard/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.24.0/axios.min.js"
    integrity="sha512-u9akINsQsAkG9xjc1cnGF4zw5TFDwkxuc9vUp5dltDWYCSmyd0meygbvgXrlc/z7/o4a19Fb5V0OUE58J7dcyw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/locale/id.min.js"></script>
    <script>
        moment.locale('id'); // Set locale to Indonesian

        function updateTime() {
            const now = moment();
            const timeString = now.format('HH.mm • dddd, D MMMM');
            document.getElementById('datetime').innerText = timeString;
        }

        // Update the time immediately and then every minute
        updateTime();
        setInterval(updateTime, 1000); // 60000 milliseconds = 1 minute

        function handleEnter(event) {
            if (event.key === 'Enter') {
                $('#btnSbmtReg').trigger('click');
            }
        }
        
    </script>

    <script src="https://oncard.id/assets_oncard/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="https://oncard.id/assets_oncard/js/jquery.min.js"></script>
	<script src="https://oncard.id/assets_oncard/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="https://oncard.id/assets_oncard/plugins/metismenu/js/metisMenu.min.js"></script>
    <!--Password show & hide js -->
    <script>
        $(document).ready(function() {
            $("#show_hide_password a").on('click', function(event) {
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
                    const login = await axios.post("<?= base_url('LoginTagihan/LoginActions') ?>", form_data).catch((err) => {
                        // kesalahan login
                        console.log("error coy");
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
                            errortext = "error";
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
                        sessionStorage.setItem('_token', login.data.result.access_token);
                        localStorage.setItem('_token', login.data.result.access_token);
                        localStorage.setItem('_token_oncard', login.data.result.oncard_token);
                        sessionStorage.setItem('_permission', login.data.result.permission);
                        localStorage.setItem('_permission', login.data.result.permission);
                        localStorage.setItem('_private_token', login.data.result['private-key']);
                        window.location.href = "<?= base_url('CPanel_Tagihan') ?>";
                    }
                    else if(login.data.status==422){
                        let error = login.data.result;

                        if (error && typeof error === 'object') {
                            for (const field in error) {
                                if (error[field] && Array.isArray(error[field])) {
                                    // Handle validation errors with multiple messages
                                    error[field].forEach((message) => {
                                        Toastify({
                                            text: `${field}: ${message}`,
                                            duration: 3000,
                                            close: true,
                                            gravity: "top",
                                            position: "right",
                                            className: "errorMessage",
                                        }).showToast();
                                    });
                                } else if (field === 'message' && typeof error[field] === 'string') {
                                    // Handle single error message
                                    Toastify({
                                        text: error[field],
                                        duration: 3000,
                                        close: true,
                                        gravity: "top",
                                        position: "right",
                                        className: "errorMessage",
                                    }).showToast();
                                }
                            }
                        } else {
                            // Fallback for unknown errors
                            alert('An unexpected error occurred.');
                        }
                    
                    }
                     else if(login.data.status==500){
                            
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
