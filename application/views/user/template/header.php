<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="<?=base_url();?>assets/png/icon.png" type="image/png" />
  
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
  
    <title>Portal Oncard</title>
    <style type="text/css">
		
        .text-success {
            background: #42e695!important;
            background: -webkit-linear-gradient( 45deg , #42e695, #3bb2b8)!important;
            background: linear-gradient( 45deg , #42e695, #3bb2b8)!important;
            -webkit-background-clip: text!important;
            -webkit-text-fill-color: transparent!important;
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
    </style>
</head>