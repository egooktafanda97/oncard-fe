<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Topup Saldo by <?=$sender;?></title>
  <!-- Bootstrap CSS -->
  <link rel="icon" href="https://oncard.id/assets_oncard/images/logo_oncard3.webp" type="image/png" />

  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
@import url('https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Quicksand:wght@300;400;500;600;700&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Lilita+One&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Quicksand:wght@300;400;500;600;700&display=swap');
</style>

  <script src="<?=base_url();?>assets_oncard/js/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css/style_universal.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.24.0/axios.min.js" integrity="sha512-u9akINsQsAkG9xjc1cnGF4zw5TFDwkxuc9vUp5dltDWYCSmyd0meygbvgXrlc/z7/o4a19Fb5V0OUE58J7dcyw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
  

  <style>
    body {
        font-family: "Open Sans", sans-serif;
      display: flex;
      justify-content: center;
      align-items: flex-start;
      /* height: 100vh; */
      margin: 0;
      margin-top:7vh;
      background:rgba(0,0,0,0.09);
      padding:10px;
    }
    .btn,label {
        font-family: "Open Sans", sans-serif!important;
    }
    .card {
        /* width:100%; */
      max-width: 100%;
      border-radius:2px;
    }
    .card-title {
        /* font-family: "Lilita One", sans-serif!important; */
        font-size:2.3em!important;
    }

    .form-control {
        padding:15px!important;
        border:2px solid #000!important;
    }
  </style>
</head>
<body>


<div class="card text-center" style="border-radius:10px;">
    <div class="row">
        <div class="col-12 mb-4 mt-2">
            <img src="https://oncard.id/assets/img/logo_oncard2.png" alt="" style="width:140px; margin:auto;padding:5px;">
        </div>
    </div>

    <h5 class="card-title text-center">TOPUP SALDO</h5>
    <h6 class="card-subtitle"><?=$namaInstansi;?></h6>
    
    <h5 class="p-5">Mohon maaf, akses topup ini ditutup sementara untuk instansi Anda.</h5>
    <strong style="font-weight:normal;color:red;">URL ini tidak dapat digunakan untuk sementara.</strong>
    <div class="row mb-3">
        <div class="col-12 mb-4 mt-2">
            <!-- <img src="https://sandbox-payment.ipaymu.com/assets/images/payment/bank.png" alt="" style="width:150px;height:auto;object-fit:contain;"> -->
            <!-- <img src="https://sandbox-payment.ipaymu.com/assets/images/payment/cstore.png" alt="" style="width:150px;height:auto;object-fit:contain;"> -->
        </div>
        <div class="col-12 text-center text-sm text-muted" style="font-size:11px;">
            &copy; <?=date('Y');?> <img src="https://oncard.id/assets/img/logo_oncard2.png" style="width:60px;" alt="">
        </div>
    </div>
  
</div>

<!-- Bootstrap JavaScript (optional, if needed) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>