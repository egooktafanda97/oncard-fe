
<div class="whatsapp-float">
    <a href="https://wa.me/6281262279950?text=Saya%20tertarik%%20untuk%20menggunakan%20oncard%20." target="_blank">
      <img src="https://png.pngtree.com/png-clipart/20181003/ourmid/pngtree-whatsapp-social-media-icon-design-template-vector-whatsapp-logo-png-image_3654780.png" alt="WhatsApp">
    </a>
  </div>

  <div class="row">
    <div class="col-12 text-center py-5 mb-3">
        <?=date('Y');?> - Copyright PT. PHOENIX KREATIF DIGITAL
    </div>
  </div>
<script src="<?=base_url();?>assets_oncard/js/bootstrap.bundle.min.js"></script>
<script src="<?=base_url();?>assets_oncard/js/landingmenu.js"></script>

  
<script type="text/javascript">
 $(document).ready(function () {
    $('.slide-show-container').css('opacity','1');
 });

 const vw = $(window).width();
 console.log(vw);
 if(vw < 1200){
    $('.img1').attr('src','https://oncard.id/assets_oncard/images/header1_mobile.webp');
    $('.img2').attr('src','https://oncard.id/assets_oncard/images/header4_mobile.webp');
    $('.img3').attr('src','https://oncard.id/assets_oncard/images/header1_mobile.webp');
    $('.effect1').attr('style','position:absolute; left:0px;height:300px;;opacity:0.2;');
    $('.seconddiv').attr('style','margin-top:20px!important;');
    $('.xxx').attr('style','padding-top:200px;padding-left:20px;padding-right:20px;color:#4a4a4a!important;');
    $('.xxy').attr('style','margin-top:0px;');
    $('.c1').attr('style','height:580px!important;padding-top:50px;');
    $('.div2').attr('style','margin-top:-120px!important;padding:0px;padding-bottom:100px; background:#F1FFFD');
    $('.div3').attr('style','padding:0!important;margin-top:-50px;');
    $('section').attr('style','padding-top:100px;padding-left:30px;padding-right:30px;color:#4a4a4a!important;');
 }




</script>
</body>
</html>