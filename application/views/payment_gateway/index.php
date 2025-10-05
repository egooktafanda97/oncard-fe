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
    <form>
      <div class=" p-3">
        <label for="phoneNumber" class="form-label text-center" style="display:block">Pengirim</label>
        <input type="tel" value="<?=$sender;?>" style="text-align:center;font-weight:bolder;background-color:#ccc;" class="form-control disabled" id="phoneNumber" readonly placeholder="Enter your phone number">
      </div>
      
      <div class=" p-3" style="margin-top:-26px;">
        <label for="phoneNumber" class="form-label text-center" style="display:block">Akan ditopup ke</label>
        <input type="text" value="<?=$namaCustomer;?>" style="text-align:center;font-weight:bolder;background-color:#ccc;" class="form-control disabled" id="phoneNumber" readonly placeholder="Enter your phone number">
      </div>
      
      <div class="mb-0 p-3 pt-0">
        <label for="number" class="form-label">Masukkan nominal topup</label>
        <input type="number" class="form-control" style="font-size:20px;text-align:center;font-weight:bolder;" oninput="setVal3(this.value);" id="number" placeholder="0" autocomplete="off">
      </div>
      <p><small>Biaya layanan <i><b>mengikuti dari channel bank yang nantinya dipilih.</b></i></small></p>
      <p class="text-muted ps-2 pe-2" style="font-size:11px;">Dengan menekan tombol dibawah ini, Anda <b>SETUJU</b> untuk melakukan topup. Kami akan mengirimkan tagihan topup ke whatsapp Anda. </p>
      <div class="card-footer pt-4">
      <button type="button" onclick="setInvoice();" id="btnSubmit" class="btn btn-lg btn-success mb-3" style="display:block; margin:auto;">DAPATKAN LINK INVOICE</button>
      </div>
    </form>

    <div class="row mb-3">
        <div class="col-12 mb-4 mt-2">
            <img src="https://sandbox-payment.ipaymu.com/assets/images/payment/bank.png" alt="" style="width:150px;height:auto;object-fit:contain;">
            <!-- <img src="https://sandbox-payment.ipaymu.com/assets/images/payment/cstore.png" alt="" style="width:150px;height:auto;object-fit:contain;"> -->
        </div>
        <div class="col-12 text-center text-sm text-muted" style="font-size:11px;">
            &copy; <?=date('Y');?> <img src="https://oncard.id/assets/img/logo_oncard2.png" style="width:60px;" alt="">
        </div>
    </div>
  
</div>

<!-- Bootstrap JavaScript (optional, if needed) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<script type="text/javascript">

    

    $(document).ready(function () {
        
        var y = localStorage.getItem("url_settled");
        var z = localStorage.getItem("nominal_settled");
        var a = localStorage.getItem("___token");


        var m = localStorage.setItem('___token', "<?=$__token;?>");
        
        if(m==a){
            if(y){
                $('#number').val(z);
                $('#number').attr('disabled','disabled');
                $('.card-footer').html('<a href="'+y+'" target="_blank" type="button" class="btn btn-lg btn-success mb-3" style="display:block; margin:auto;">BUKA INVOICE</button>');
            }else {
                $('.card-footer').html('<button type="button" onclick="setInvoice();" id="btnSubmit" class="btn btn-lg btn-success mb-3" style="display:block; margin:auto;">DAPATKAN LINK INVOICE</button>');
            }
        }else {
            localStorage.setItem("menutoggle","open");
        }

    });

    function setVal3(str){
        $('#number').val(formatRupiah(str));
    }
    
    function setInvoice() {

    $('#btnSubmit').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Memproses...');
    $('#btnSubmit').attr('disabled', 'disabled');
    $('#btnSubmit').css('cursor', 'not-allowed');


    var nominal = $("#number").val();

    if(nominal==''){
        Toastify({
            text: 'Nominal topup WAJIB diisi',
            duration: 3000,
            close: true,
            gravity: "top",
            position: "right",
            className: "errorMessage",

        }).showToast();

        $('#btnSubmit').html('DAPATKAN LINK INVOICE');
        $('#btnSubmit').attr('disabled', false);
        $('#btnSubmit').css('cursor', 'pointer');
        return false;
    }

    var form_data = new FormData();

    if(nominal!=''){
        form_data.append('priece', parseInt(nominal)+0);
        form_data.append('phone', "<?=$sender;?>");
        form_data.append('account_number', "<?=$accountNumber;?>");
        form_data.append('providers', "ipaymu");
    }

    const save = async (form_data) => {
        const posts = await axios.post('<?= api_url(); ?>api/v1/payment-gateway', form_data, {
            headers: {
                'Authorization': '___'
            }
        }).catch((error) => {

            if (error.response && error.response.status === 500) {
            // Handle the 500 error
            console.log('Error:', error.response.data);
            }
            
            const htmlContent = error.response.data; 

            const regex = /https:\/\/payment\.ipaymu\.com\/#\/[a-zA-Z0-9-]+/;

            const match = htmlContent.match(regex);

            if (match) {
            const url = match[0];
            
            let isiPesan = `🌐 Silahkan akses link berikut ini untuk membuka halaman tagihan Anda :

`+url+`

Segera lakukan pembayaran tagihan Anda. Terimakasih atas kerjasamanya.
Wassalam.

_🔰✅ Halaman ini aman dan sudah melewati proses verifikasi oleh oncard.id_
`;

            var form_data = new FormData();
            form_data.append('noWA',"<?=$sender;?>");
            form_data.append('pesan',isiPesan);
            form_data.append('kodeInstansi',"<?=$kodeInstansi;?>");

            $('#btnSubmit').html('<i class="bx bx-transfer-alt"></i> Sedang mengirim notifikasi...');
            $('#btnSubmit').attr('disabled', 'disabled');
            $('#btnSubmit').css('cursor', 'not-allowed');

            jQuery.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>"+"WebhookOncard/sendMessageWatzapNoAuth",
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                dataType: 'json',  // what to expect back from the PHP script, if anything
                beforeSend: function() {
                    
                },
                success : function(e){
                    
                    Toastify({
                        text: "Tagihan telah dikirimkan ke <?=$sender;?>",
                        duration: 3000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        className: "successMessage",

                    }).showToast();

                    localStorage.setItem('url_settled', url);
                    localStorage.setItem('nominal_settled', nominal);

                    $('#number').val(nominal);
                    $('#number').attr('disabled','disabled');

                    $('.card-footer').html('<a href="'+url+'" target="_blank" type="button" class="btn btn-lg btn-success mb-3" style="display:block; margin:auto;">BUKA INVOICE</button>');

                    $('#btnSubmit').html('DAPATKAN LINK INVOICE');
                    $('#btnSubmit').attr('disabled', false);
                    $('#btnSubmit').css('cursor', 'pointer');
                }
            
            });

            } else {
                Toastify({
                    text: "URL not found in the HTML content.",
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    className: "errorMessage",

                }).showToast();
            }


        });
    }

    save(form_data);

    }

    function extractUrlSection(errorData) {
    try {
        const errorJson = JSON.parse(errorData);
        return errorJson && errorJson.Data && errorJson.Data.Url ? errorJson.Data.Url : null;
    } catch (error) {
        console.error('Error parsing error data:', error);
        return null;
    }
    }
</script>
</body>
</html>