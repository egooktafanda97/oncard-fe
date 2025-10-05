<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="<?=base_url();?>assets_oncard/logo/o_white.png" type="image/png" />
  
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
  
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css/style_universal.css">
  
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css"  />
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.1.7/css/fixedHeader.bootstrap4.min.css"  />
    
    
    <title>Ontuition</title>

    <style>
    #pdf-content * {
        font-size: 10px !important;
        line-height: 1.2 !important;
    }
    
    /* Specific adjustments for different elements */
    #pdf-content h1 { font-size: 14px !important; }
    #pdf-content h2 { font-size: 12px !important; }
    #pdf-content table { font-size: 9px !important; }

    .small-text-pdf, .small-text-pdf * {
    font-size: 10px !important;
    line-height: 1.2 !important;
    }

    .small-text-pdf h1 { font-size: 14px !important; }
    .small-text-pdf h2 { font-size: 12px !important; }
    .small-text-pdf table { font-size: 9px !important; }

    @media print {
    #pdf-content table {
        width: 100% !important;
        table-layout: fixed !important;
        word-wrap: break-word !important;
    }
    
    #pdf-content td, #pdf-content th {
        white-space: normal !important;
        overflow-wrap: break-word !important;
        padding: 2px !important;
        font-size: 9px !important;
    }
    }
            
    </style>


    <style type="text/css">
		
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap');

        body {
            font-family: "Plus Jakarta Sans", system-ui!important;
        }
        #loaderXXX {
            position:absolute;
            width:100vh;
            height:100vh;
            background:rgba(0,0,0,0.3);
            display:flex;
            align-items:center;
            justify-content:center;
            z-index:988888!important;
        }

        .text-dongker {
            color:#383466!important;
        }
        .bg-dongker{
            background-color:#383466!important;
        }

        .setkecil {
            width:30px!important; 
            height:30px!important;
        }
        .setnormal {
            width:auto!important;
            width:auto!important;
        }
        
        .loader{
        display: block;
        position: relative;
        height: 12px;
        width: 80%;
        border: 1px solid #fff;
        border-radius: 10px;
        overflow: hidden;
        }
        .loader::after {
        content: '';
        width: 40%;
        height: 100%;
        background: #FF3D00;
        position: absolute;
        top: 0;
        left: 0;
        box-sizing: border-box;
        animation: animloader 2s linear infinite;
        }
        
        @keyframes animloader {
        0% {
            left: 0;
            transform: translateX(-100%);
        }
        100% {
            left: 100%;
            transform: translateX(0%);
        }
        }
        
        .chart-container-4{
            height:auto!important;
        }
        
        .text-success {
            background: #42e695!important;
            background: -webkit-linear-gradient( 45deg , #42e695, #3bb2b8)!important;
            background: linear-gradient( 45deg , #42e695, #3bb2b8)!important;
            -webkit-background-clip: text!important;
            -webkit-text-fill-color: transparent!important;
        }
        
        .text-bloody {
            background: linear-gradient(209deg, #db9520, #df783d);
            background-size: 400% 400%;
            -webkit-background-clip: text!important;
            -webkit-text-fill-color: transparent!important;
            -webkit-animation: AnimationName 1s ease infinite;
            -moz-animation: AnimationName 1s ease infinite;
            animation: AnimationName 1s ease infinite;
        }

        @-webkit-keyframes AnimationName {
            0%{background-position:0% 97%}
            50%{background-position:100% 4%}
            100%{background-position:0% 97%}
        }
        @-moz-keyframes AnimationName {
            0%{background-position:0% 97%}
            50%{background-position:100% 4%}
            100%{background-position:0% 97%}
        }
        @keyframes AnimationName {
            0%{background-position:0% 97%}
            50%{background-position:100% 4%}
            100%{background-position:0% 97%}
        }

        .skeleton-box {
            display: inline-block;
            height: 1em;
            position: relative;
            overflow: hidden;
            background-color: #dddbdd;
        }

        .skeleton-box::after {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            transform: translateX(-100%);
            background-image: linear-gradient(90deg, rgba(255, 255, 255, 0) 0, rgba(255, 255, 255, 0.2) 20%, rgba(255, 255, 255, 0.5) 60%, rgba(255, 255, 255, 0));
            -webkit-animation: shimmer 2s infinite;
            animation: shimmer 2s infinite;
            content: "";
        }

        .box1val {
            font-size:15px!important;text-transform:uppercase; font-weight:800;width:500px;padding-top:5px;   
        }
        .box10val {
            font-size:9px!important;margin-top:-7px;text-transform:uppercase; font-weight:550;width:100%;
        }

        .font-mob {
            position:relative;
        }
        
        /* Tablet screens: width <= 768px */
        @media (max-width: 768px) {
            .box1val {
                font-size:11px!important;text-transform:uppercase; font-weight:800;width:auto;padding-top:5px;
            }
            .box10val {
                display:none;
            }
            .image-profile {
                align-items:center;
            }
            .dropdown-large {
                transform:scale(0,0);
            }
            .font-mob {
                font-size:16px;
            }
        }
        
        .expandable-text {
        width: 50px; /* Initial width */
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis; /* Optional: show ellipsis (...) if text overflows */
        transition: width 0.3s ease; /* Smooth transition effect */
        }

        .expandable-text:hover {
        width: auto; /* Expand on hover */
        }

        @-webkit-keyframes shimmer {
            100% {
                transform: translateX(100%);
            }
        }

        @keyframes shimmer {
            100% {
                transform: translateX(100%);
            }
        }

        .blog-post__headline {
            font-size: 1.25em;
            font-weight: bold;
        }

        .blog-post__meta {
            font-size: 0.85em;
            color: #6b6b6b;
        }

        .o-media {
            display: flex;
        }

        .o-media__body {
            flex-grow: 1;
            margin-left: 1em;
        }

        .o-vertical-spacing>*+* {
            margin-top: 0.75em;
        }

        .o-vertical-spacing--l>*+* {
            margin-top: 2em;
        }

        .indec {
            -webkit-transition: all 0.1s linear 0s;
            -o-transition: all 0.1s linear 0s;
            -moz-transition: all 0.1s linear 0s;
            -ms-transition: all 0.1s linear 0s;
        }

        .indec:focus,
        .indec:hover {
            -webkit-transform: scale(1.1, 1.1);
            -o-transform: scale(1.1, 1.1);
            -ms-transform: scale(1.1, 1.1);
            -moz-transform: scale(1.1, 1.1);
        }

        #menu li a {
            font-size:12px;
        }
        .sidebar-wrapper .metismenu .mm-active>a, .sidebar-wrapper .metismenu a:active, .sidebar-wrapper .metismenu a:focus, .sidebar-wrapper .metismenu a:hover{
            border-radius:10px;
            color:black!important;
            font-weight:800;
        }
    </style>
</head>