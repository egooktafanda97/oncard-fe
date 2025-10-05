<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=0">
	<!--favicon-->
	<link rel="icon" href="<?=base_url();?>assets_oncard/logo/o_navy.png" type="image/png" />
  
	<script src="<?=base_url();?>assets_oncard/js/jquery.min.js"></script>
	
	<!--plugins-->
    
    <link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet" />
    <link href="<?=base_url();?>assets_oncard/plugins/select2/css/select2.min.css" rel="stylesheet" />
	<link href="<?=base_url();?>assets_oncard/plugins/select2/css/select2-bootstrap4.css" rel="stylesheet" />
	<link href="<?=base_url();?>assets_oncard/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="<?=base_url();?>assets_oncard/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet"/>
	<link href="<?=base_url();?>assets_oncard/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="<?=base_url();?>assets_oncard/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="<?=base_url();?>assets_oncard/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    
	<!-- loader-->
	<link href="<?=base_url();?>assets_oncard/css/pace.min.css" rel="stylesheet" />
	<script src="<?=base_url();?>assets_oncard/js/pace.min.js"></script>
    <!-- sweetalert -->
	<link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="<?=base_url();?>assets_oncard/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?=base_url();?>assets_oncard/css/bootstrap-extended.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="<?=base_url();?>assets_oncard/css/app.css" rel="stylesheet">
	<link href="<?=base_url();?>assets_oncard/css/icons.css" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.24.0/axios.min.js" integrity="sha512-u9akINsQsAkG9xjc1cnGF4zw5TFDwkxuc9vUp5dltDWYCSmyd0meygbvgXrlc/z7/o4a19Fb5V0OUE58J7dcyw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	
    <!-- addons -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
	<!-- <link rel="stylesheet" href="<?=base_url();?>assets_oncard/css/dark-theme.css"/> -->
  
    <!-- menu -->
    <link rel="stylesheet" href="<?=base_url();?>assets_oncard/css/landingmenu.css" /> 
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <title>Oncard.id-Pesantren Digital Service</title>

    <script src="https://momentjs.com/downloads/moment.js"></script>
    <script src="https://momentjs.com/downloads/moment-with-locales.js"></script>
    <script type="text/javascript">moment.locale('id');</script>

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <style>
@import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap');
</style>
    
    <style>
      
        /* @import url('https://fonts.googleapis.com/css2?family=Barlow:wght@200;600;700;900&family=Chivo+Mono:wght@500&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap'); */
        

        * {
            font-family: "Plus Jakarta Sans", system-ui!important;
        }
        .menu-bar li:first-child .dropdown {
            min-width:0px;
        }
        .menu-bar li:first-child ul:nth-child(1){
            border:none;
        }
        .separator {
            display:block;
            margin-top:25px;
            margin-bottom:25px;
            height:4px;
            width:150px;
            background-color:#00ba78!important;
        }
        .btn-success {
            background:#00ba78!important;
        }.btn-success:hover {
            background:#373567!important;
        }
        .mobile-hide {
            display:inherit;
        }
        @media screen and (max-width: 1100px) {
            .mobile-hide {
                display:none;
            }
            .rowx {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(125px, 1fr))!important;
            grid-gap: 10px;
            background:#F1FFFD;
            }
        }
        .btn-round {
            border-radius:100px;
        }
        a:hover {
            color:#00ba78!important;
        }
        .text-theme-success{
            color:#00ba78!important;
        }
        #nav-menu {
            z-index:99999;
            background:white!important;   
            position:fixed!important;
            width:100%!important;
        }
        
        .elegant {
            font-size:38px!important;
            /* font-family: 'Quicksand', sans-serif!important; */
            font-weight:700;
            color:#000!important;
        }
        
        .elegant2 {
            /* font-family: 'Quicksand', sans-serif!important; */
            
        }

        .menu {
            padding-top:10px;
            
        }

        .whatsapp-float {
      position: fixed;
      bottom: 20px;
      right: 20px;
      z-index: 1000;
    }

    /* Style for WhatsApp icon */
    .whatsapp-float img {
      width: 60px; /* Adjust size as needed */
      height: auto;
      border-radius: 50%; /* Make it round */
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.12); /* Add shadow for depth */
      cursor: pointer;
      object-fit:cover;
    }

        .slide-show-container {
        height: 550px;
        width: 100%;
        position: absolute;
        top:0;
        z-index:-1!important;
        overflow:hidden;
        }
        /* CSS Styles in common for all slides */
        .wrapper-one,
        .wrapper-two,
        .wrapper-three {
        background-color: #eee;
        background-size: cover;
        background-repeat: no-repeat;
        background-size:cover;
        background-position:center;
        height: 100%;
        width: 100%;
        position: absolute;
        }

        /* CSS Styles for each slide */
        /* Just add the image as background attribute and add some animation */

        .wrapper-one {
            animation: slideOneAnim 20s infinite;
        }

        .wrapper-two {
            animation: slideTwoAnim 20s infinite;
        }

        .wrapper-three {
            animation: slideThreeAnim 20s infinite;
        }

        /* Styles for the text */
        .wrapper-text {
        font: 700 40px/1.4 Roboto;
        display: flex;
        flex-direction: row;
        justify-content: center;
        }

        /* Animations */
        @keyframes slideOneAnim {
            0%{opacity:1;}
            14%{opacity:1;}
            33%{opacity:0;}
            50%{opacity:0;}
            67%{opacity:0;}
            100%{opacity:0;}
        }
        @keyframes slideTwoAnim {
            0%{opacity:0;}
            17%{opacity:0;}
            30%{opacity:1;}
            50%{opacity:1;}
            67%{opacity:0;}
            100%{opacity:0;}
        }

        @keyframes slideThreeAnim {
            0%{opacity:0;}
            50%{opacity:0;}
            67%{opacity:1;}
            83%{opacity:1;}
            100%{opacity:0;}
        }
    </style>
</head>