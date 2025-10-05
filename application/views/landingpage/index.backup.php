
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css" rel="stylesheet" />
<style>
.rowx {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  grid-gap: 30px;
  background:#F1FFFD;
}
    .service {
  text-align: center;
  padding: 25px 10px;
  border-radius: 5px;
  font-size: 14px;
  /* cursor: pointer; */
  background: transparent;
  transition: transform 0.5s, background 0.5s;
}

.service i {
  font-size: 40px;
  margin-bottom: 10px;
  color: #00ba78;
  width:40px;
}

.bg-dongker{
    background-color:#383466!important;
}

.service h2 {
    font-size:1.6em;
  font-weight: 600;
  margin-bottom: 8px;
}

.service:hover {
  background: #00ba78;
  color: #fff;
  transform: scale(1.05);
}

.service:hover i,.service:hover h2 {
  color: #fff;
}

.grid {
  width: 100%;
  margin-inline: auto;
  margin-block: 3em;
}

.grid__item {
  height: 150px;
  align-items:center;
  justify-content:center;
}
.grid__item img {
    height:70px;
}

.grid {
  --gap: 2rem;
  --line-offset: calc(var(--gap) / 2);
  --line-thickness: 1px;
  --line-color: #3de0a4;
  display: grid;
  grid-template-columns: repeat(2, minmax(0, 1fr));
  overflow: hidden;
  gap: var(--gap);
}

.grid__item {
  position: relative;
  display:block;
}
.grid__item h4 {
    margin-top:10px;
    font-size:1.15em!important;
}
.grid__item img {
    /* -webkit-filter: grayscale(100%); */
    filter: sepia(5);
    -webkit-transition:all 0.1s linear 0s;
}
.grid__item:hover img{
    -webkit-filter: grayscale(0%);
    filter: grayscale(0%);
    -webkit-transform:scale(0.9,0.9);
}

.grid__item::before,
.grid__item::after {
  content: "";
  position: absolute;
  background-color: var(--line-color);
  z-index: 1;
}

.grid__item::after {
  inline-size: 100vw;
  block-size: var(--line-thickness);
  inset-inline-start: 0;
  inset-block-start: calc(var(--line-offset) * -1);
}

.grid__item::before {
  inline-size: var(--line-thickness);
  block-size: 100vh;
  inset-block-start: 0;
  inset-inline-start: calc(var(--line-offset) * -1);
}

.news {
    cursor:pointer;
    -webkit-transition:all 0.1s linear 0s;
}
.news:hover{
    transform:scale(0.98,0.98);
}
.news>.card {
    -webkit-transition:all 0.1s linear 0s;
}
.news:hover .card {
    box-shadow:0px 5px 5px rgba(55,55,55,0.34);
}
.carousel-indicators button {
    margin-top:45px!important;
    background :#f2f2f2!important;
    border-radius:4px;
    height:7px;
    border:none;
}

@media (max-width: 768px) {
    .contented div {
        display:block!important;
    }
    .contended iframe {
        width:100%!important;
    }
}
:root {
  --marquee-width: 80vw;
  --marquee-height: 20vh;
  /* --marquee-elements: 12; */ /* defined with JavaScript */
  --marquee-elements-displayed: 5;
  --marquee-element-width: calc(var(--marquee-width) / var(--marquee-elements-displayed));
  --marquee-animation-duration: calc(var(--marquee-elements) * 3s);
}

.marquee {
  width: var(--marquee-width);
  height: var(--marquee-height);
  /* background-color: #111; */
  color: #eee;
  overflow: hidden;
  position: relative;
}
.marquee:before, .marquee:after {
  position: absolute;
  top: 0;
  width: 10rem;
  height: 100%;
  content: "";
  z-index: 1;
}
.marquee:before {
  left: 0;
  background: linear-gradient(to right, #2dd69a 0%, transparent 100%);
}
.marquee:after {
  right: 0;
  background: linear-gradient(to left, #2dd69a 0%, transparent 100%);
}
.marquee-content {
  list-style: none;
  height: 100%;
  display: flex;
  animation: scrolling var(--marquee-animation-duration) linear infinite;
}
/* .marquee-content:hover {
  animation-play-state: paused;
} */
@keyframes scrolling {
  0% { transform: translateX(0); }
  100% { transform: translateX(calc(-1 * var(--marquee-element-width) * var(--marquee-elements))); }
}
.marquee-content li {
  display: flex;
  flex-direction:column;
  justify-content: center;
  align-items: center;
  /* text-align: center; */
  flex-shrink: 0;
  width: var(--marquee-element-width);
  max-height: 100%;
  font-size: calc(var(--marquee-height)*3/4); /* 5rem; */
  white-space: nowrap;
}

.marquee-content li img {
  width: 100%;
  /* height: 100%; */
  /* border: 2px solid #eee; */
}

@media (max-width: 600px) {
  html { font-size: 12px; }
  :root {
    --marquee-width: 100vw;
    --marquee-height: 16vh;
    --marquee-elements-displayed: 3;
  }
  .marquee:before, .marquee:after { width: 5rem; }
}
.logox img {
  background: transparent; /* Makes the background transparent */
  border-radius: 0; /* Ensures there’s no rounded border */
  object-fit: contain; /* Ensures the logo fits inside its container */
  filter: brightness(0) invert(1); /* Optional: removes white background, making the logo stand out */
  filter: sepia(5);
  -webkit-transition:all 0.1s linear 0s;
}
</style>
<div class="slide-show-container c1" style="opacity:0; background:white;">
    <div class="wrapper-one" style="background:white;">
    <img class="img1" src="https://oncard.id/assets_oncard/images/header_web3.jpg" alt="" style="object-fit:contain;width:100%;height:650px;">
    </div>
    <div class="wrapper-two" style="background:white;">
    <img class="img1" src="https://oncard.id/assets_oncard/images/header_web3.jpg" alt="" style="object-fit:contain;width:100%;height:650px;">
    </div>
    <div class="wrapper-three" style="background:white;">
    <img class="img1" src="https://oncard.id/assets_oncard/images/header_web3.jpg" alt="" style="object-fit:contain;width:100%;height:650px;">
    </div>

    <!-- <div class="container-fluid" style="padding:0!important;z-index:15;position:absolute;bottom:0px;">
        <img src="https://oncard.id/assets_oncard/images/curved.png" style="width:100%; height:auto; object-fit:cover;"/>
    </div> -->
</div>

<div class="container" style="height:550px;"></div>

<div class="container-fluid div2 mt-5 " style="padding:0;background:#FFF!important;">
    <div class="container-lg" >
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12 text-center mb-5">
                <h1 class="elegant">Fitur 
                    <!-- <font class="elegant2" style="background-color:#00ba78;border-radius:15px;padding:.2rem 1.3rem; color:white;">oncard.id</font> -->
                    <img src="<?=base_url();?>assets_oncard/logo/logo_dongker.png" style="display:inline; width:170px;" alt="">
                </h1>
            </div>
            <div class="col-12">
                <div class="rowx" style="background:white!important;">
                    <div class="service" >
                    <i class="fas fa-laptop-code"></i>
                    <h2>Host /Koordinator Usaha</h2>
                    <p>
                    Host/Koordinator adalah entitas bisnis di sekolah yang mengoperasikan sistem oncard.
                    </p>
                    </div>
                    <div class="service">
                    <i class="fas fa-chart-line"></i>
                    <h2>Merchant / Kantin</h2>
                    <p>
                    Merchant/Kantin adalah pihak bisnis di pesantren, seperti kantin, layanan laundry, barbershop, dan lain sebagainya
                    </p>
                    </div>
                    <div class="service">
                    <i class="fab fa-sketch"></i>
                    <h2>User / Pelajar & Guru</h2>
                    <p>
                    User/Pelajar & Guru adalah pihak yang menggunakan kartu digital Pelajar.
                    </p>
                    </div>
                    <div class="service">
                    <i class="fas fa-mobile-alt"></i>
                    <h2>WA Official</h2>
                    <p>
                    WhatsApp (WA Official) berperan sebagai penghubung efektif antara Host dan orang tua, memudahkan penyampaian informasi terkait Pelajar dengan lebih cepat dan terorganisir.
                    </p>
                    </div>
                    <div class="service">
                    <i class="fas fa-file-invoice"></i>
                    <h2>Kartu Elektronik Pelajar</h2>
                    <p>
                    Kartu Elektronik Pelajar merupakan solusi terpadu sebagai kartu identitas dan dompet digital, mempermudah akses dan pengelolaan transaksi keuangan dengan lebih efisien.
                    </p>
                    </div>
                    <div class="service">
                    <i class="fab fa-whatsapp"></i>
                    <h2>PSB Online</h2>
                    <p>
                    Menyajikan sistem penerimaan Pelajar baru yang terintegrasi, memberikan kemudahan dan kelancaran dalam proses pendaftaran secara digital.
                    </p>
                    </div>
                    <div class="service">
                    <i class="fas fa-hashtag"></i>
                    <h2>Absensi Digital</h2>
                    <p>
                    Perangkat absensi ini dirancang khusus untuk kartu digital, memastikan pencatatan hadir secara online yang akurat dan efisien.
                    </p>
                    </div>
                    <div class="service">
                    <i class="fas fa-database"></i>
                    <h2>Virtual Account (VA)</h2>
                    <p>
                    Virtual account adalah identitas virtual Pelajar yang berperan dalam top-up saldo dan pengecekan saldo, memfasilitasi pengelolaan keuangan secara efektif.

                    </p>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container-fluid" style="padding:0!important;">
    <div class="row mb-5 mt-5" style="padding:0px!important;margin:0px;;">

        <div class="col-lg-1 col-md-12 col-sm-12 col-12 ps-3">
        </div>
        <div class="col-lg-5 col-md-12 col-sm-12 col-12 ps-3">
            <h1><img src="<?=base_url();?>assets_oncard/logo/o_navy.png" alt="" style="width:100px;"></h1>
            <h4 class="elegant">Kartu Elektronik Pelajar</h4>
            <font style="font-size:1.3em;line-height:2em;color:#777;font-weight:400;">Kartu Elektronik Pelajar membawa era transaksi keuangan di pesantren ke tingkat yang lebih tinggi, menghadirkan kemudahan, keamanan, dan presisi dalam satu paket. Sebagai kartu identitas multi-fungsi dan dompet digital, kami menghadirkan solusi canggih untuk mempermudah segala urusan keuangan di pesantren. Tak hanya itu, kartu ini juga menjadi alat absensi digital yang mengubah cara pesantren mengelola administrasinya—membuat pengalaman Pelajar lebih modern dan efisien.</font>
            <button type="button" class="mt-4 mb-4 btn btn-success btn-round"><i class="bx bx-right-arrow-alt"></i>Ayo Bergabung</button>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 col-12 ps-3">
        <img class="mobile-hide" src="https://oncard.id/assets_oncard/images/heads2.webp" alt="" style="margin-top:-100px;padding:0;width:500px;">
        </div>
        
    </div>

    <div class="row mb-5" style="padding:0px!important;margin:0px;;">
        <div class="col-lg-1 col-md-12 col-sm-12 col-12 ps-3">
        </div>
        <div class="col-lg-5 col-md-12 col-sm-12 col-12 ps-3">
        <img class="mobile-hide" src="https://oncard.id/assets_oncard/images/canteens2.webp" alt="" style="margin-top:-100px;text-align:right;padding:0;width:460px;">
        </div>
        <div class="col-lg-5 col-md-12 col-sm-12 col-12 ps-3">
            <h4 class="elegant">Kecepatan & Kemudahan</h4>
            <font style="font-size:1.3em;line-height:2em;color:#777;font-weight:400;">Revitalisasi pengalaman bertransaksi di kantin pesantren dengan kemudahan dan kecepatan melalui pembayaran non tunai menggunakan Kartu Elektronik Pelajar. Dengan sekali tempel kartu pada Sistem POS di kantin, seluruh proses pembayaran menjadi kilat dan bebas repot. Transaksi tidak hanya terjadi secara instan, tetapi juga tercatat secara otomatis dalam jurnal kantin, memberikan pengalaman yang lebih modern dan terstruktur. 
            <br/><i>Say goodbye to the hassle of cash transactions, and welcome the seamless convenience of electronic payments!</i></font>
        </div>
        
        <!-- <img class="mobile-hide" src="https://oncard.id/assets_oncard/images/canteens.webp" alt="" style="padding:0;position:absolute;left:150px; width:450px;"> -->
        
    </div>
    
    
    <div class="row mb-5" style="padding:0px!important;margin:0px;;">
        <div class="col-lg-1 col-md-12 col-sm-12 col-12 ps-3">
        </div>
        <div class="col-lg-5 col-md-12 col-sm-12 col-12 ps-3">
            <h4 class="elegant">Jurnal Unit Usaha Terotomasi</h4>
            <font style="font-size:1.3em;line-height:2em;color:#777;font-weight:400;">Perluas kemajuan bisnis unit pesantren dengan pembukuan teratur dan otomatis melalui sistem oncard. Sistem ini menyediakan catatan lengkap penjualan, pergudangan, dan elemen bisnis lainnya. Dengan pengelolaan yang efisien, tingkatkan produktivitas serta transparansi operasional untuk pertumbuhan bisnis yang berkesinambungan dan sukses.</font>
        </div>
        <div class="col-lg-5 col-md-12 col-sm-12 col-12 ps-3">
        <img class="mobile-hide" src="https://oncard.id/assets_oncard/images/cs.webp" alt="" style="margin-top:-200px;text-align:right;padding:0;width:660px; height:700px; object-fit:cover; object-position:top;">
        </div>
        
        <!-- <img class="mobile-hide" src="https://oncard.id/assets_oncard/images/canteens.webp" alt="" style="padding:0;position:absolute;left:150px; width:450px;"> -->
        
    </div>
    
    <div class="row" style="padding:0px!important;margin:0px;;">
        <div class="col-lg-1 col-md-12 col-sm-12 col-12 ps-3">
        </div>
        <div class="col-lg-5 col-md-5 col-sm-12 col-12 ps-3">
            <img class="mobile-hide" src="https://oncard.id/assets_oncard/images/bg_second3.webp" alt="" style="margin-top:-150px;padding:0;width:500px;">
        </div>
        
        <div class="col-lg-5 col-md-12 col-sm-12 col-12 pe-3 seconddiv" style="margin-top:0px;">
            <!-- <h1><img src="<?=base_url();?>assets_oncard/images/icon_topup.jpg" alt="" style="width:200px;"></h1> -->
            <h4 class="elegant">Wali Pelajar Realtime Update</h4>
            <font style="font-size:1.3em;line-height:2em;color:#777;font-weight:400;">Eksklusif untuk para wali Pelajar! Dapatkan informasi ekslusif dan terbaru tentang perkembangan Pelajar secara instan melalui pesan Whatsapp. Pengalaman pemantauan yang sangat mudah, memungkinkan Anda mengontrol dimanapun dan tetap terhubung dengan pesantren. Jadikan perjalanan pendidikan Pelajar lebih terang benderang!</font>
            <div class="card mt-4 mb-4" style="border-radius:1.5em;">
                <div class="card-body p-4 text-muted" style="font-size:15px;" >
                    <h5 class="elegant2">PESANTREN DIGITAL SERVICE : </h5>
                    <div class="row">
                        <div class="col-lg-8 col-md-12 col-12">
                        <div class="row mb-2 mt-3">
                            <div class="col-12"><i class='bx bx-message-square-check'></i> Perbaiki tingkat kedisiplinan melalui penggunaan absensi digital di berbagai area kritis, termasuk kelas, perpustakaan, asrama, masjid, dan titik-titik penting lainnya.</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-12"><i class='bx bx-message-square-check'></i> Optimalkan kedisipliinan wali Pelajar dalam membayar SPP atau iuran wajib lainnya menggunakan portal WA Otomatis.</div>
                        </div>

                        
                        </div>
                        <div class="col-lg-4 col-md-12 col-12">
                            <img src="https://oncard.id/assets_oncard/images/wabot.png" style="object-fit:contain;width:100%; max-height:300px;" alt="">
                        </div>
                        <!-- <div class="col-12">
                        <h5 class="mt-3 elegant2" >Semuanya bisa dilakukan hanya melalui <strong>Whatsapp Pribadimu!</strong></h5>
                        </div> -->
                    </div>
                    
                    <!-- <button type="button" class="mt-4 btn btn-success btn-round text-center" style="display:block; margin:auto;">Lihat Semua Fitur</button> -->

                </div>
            </div>
            
        </div>

        
    </div>
</div>
<div class="container-fluid" style="padding:0!important; margin-top:-200px;">
    <img src="https://oncard.id/assets_oncard/images/curved2.webp" style="width:100%;  height:350px;object-fit:cover;"/>
</div>
<div class="container-fluid div2 " style="padding:0;padding-bottom:250px;background:#F1FFFD!important;">
    <div class="container-lg" >
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12 text-center mb-5">
                <h1 class="elegant">Kegiatan 
                    <!-- <font class="elegant2" style="background-color:#00ba78;border-radius:15px;padding:.2rem 1.3rem; color:white;">oncard.id</font> -->
                    <img src="<?=base_url();?>assets_oncard/logo/logo_dongker.png" style="display:inline; width:170px;" alt="">
                </h1>
            </div>
            <div class="row mt-5 mb-5 p-2 contented">
        <div class="col-lg-1 col-md-12 col-sm-12 col-12 ps-3">
        </div>
        <div class="col-lg-10 col-md-12 col-12" style="display:flex; gap:10px;">
        
            <iframe width="100%" height="400" poster="http://example.com/wp-content/uploads/2017/01/example.jpg" src="https://www.youtube.com/embed/uJCdRSBc-1w?si=Rjxg3jcDo5vYllho&amp;controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen style="border-radius:10px!important;overflow:hidden;"></iframe>

            <div style="display:flex;flex-direction:column; gap:10px;">
            <iframe width="100%" height="195" poster="http://example.com/wp-content/uploads/2017/01/example.jpg" src="https://www.youtube.com/embed/TDyZmb24kTU?si=IMhdeizBlKNwFgBB" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen style="border-radius:10px!important;overflow:hidden;"></iframe>
            
            <iframe width="100%" height="195" poster="http://example.com/wp-content/uploads/2017/01/example.jpg" src="https://www.youtube.com/embed/jwZSBUKVPaQ?si=dnPpKh67VeZH9pjM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen style="border-radius:10px!important;overflow:hidden;"></iframe>
            </div>
        
            
        </div>
        <div class="col-lg-1 col-md-12 col-sm-12 col-12 ps-3">
        </div>
    </div>
        </div>
    </div>
</div>

<div class="container-fluid div3" style="padding:0!important;margin-top:-150px;">
    <img src="https://oncard.id/assets_oncard/images/curvedbig2.webp" style="width:100%; height:auto; object-fit:cover; transform:rotate(180deg);"/>
</div>
<div class="container-fluid div4 " style=" color:white; margin-top:-1px; padding:0;padding-top:50px;padding-bottom:50px;background:#2CD69A!important;">
    <div class="container-lg" >
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12 text-center mb-5">
                <h1 class="elegant" style="color:white!important;">Mitra 
                <!-- <font class="elegant2" style="background-color:#00ba78;border-radius:15px;padding:.2rem 1.3rem; color:white;">oncard.id</font> -->
                <img src="<?=base_url();?>assets_oncard/logo/logo_putih.png" style="display:inline; width:170px;" alt="">
                </h1>
                
                <font style=" font-size:1.5em;">Tumbuh bersama dalam era transformasi digital, tingkat kualitas pendidikan bersama kami dalam program yang inovatif dan komitmen bersama</font>

                <div class="row">
                    <!-- <div class="col-lg-7 col-md-12 col-12 text-center">
                        <div class="grid">
                            <div class="grid__item" style="color:white!important;text-align:center;">
                                <img src="https://oncard.id/app/assets/users/foto/4OaniEQ5Zvavx4wi1722841750.png" alt="" style="height:70px;width:100%;object-fit:contain;display:block;"/>
                                <h4 style="color:white; font-size:12px;">Pondok Pesantren<br/>Syekh Burhanuddin	</h4>
                            </div>
                            <div class="grid__item" style="color:white!important;text-align:center;">
                                <img src="https://oncard.id/assets/img/bg_smanpintar.png" alt="" style="height:70px;width:100%;object-fit:contain;display:block;"/>
                                <h4 style="color:white; font-size:12px;">SMA Negeri<br/>Pintar Provinsi Riau</h4>
                            </div>
                            <div class="grid__item" style="color:white!important;text-align:center;border-radius:100px!important;">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTZBUOZxiNWjsVRniNLtGeiG7aP-Svco-Sozw&s" alt="" style="height:70px;width:100%;object-fit:contain;display:block;border-radius:100px!important;"/>
                                <h4 style="color:white; font-size:12px;">Pondok Modern<br/>Al-Kautsar</h4>
                            </div>
                            <div class="grid__item" style="color:white!important;text-align:center;">
                                <img src="https://oncard.id/app/assets/users/foto/r99CRyHy3yMpES241707982188.png" alt="" style="height:70px;width:100%;object-fit:contain;display:block;"/>
                                <h4 style="color:white; font-size:12px;">Pondok Pesantren<br/>Tafaqquh</h4>
                            </div>
                            <div class="grid__item" style="color:white!important;text-align:center;">
                                <img src="https://masppsr.files.wordpress.com/2019/09/logo-pp-syafaaturrasul-1.png" alt="" style="height:70px;width:100%;object-fit:contain;display:block;"/>
                                <h4 style="color:white; font-size:12px;">Pondok Pesantren<br/>Syafa'aturrasul Teluk Kuantan</h4>
                            </div>
                            <div class="grid__item" style="color:white!important;text-align:center;">
                                <img src="https://masppsr.files.wordpress.com/2019/09/logo-pp-syafaaturrasul-1.png" alt="" style="height:70px;width:100%;object-fit:contain;display:block;"/>
                                <h4 style="color:white; font-size:12px;">Pondok Pesantren<br/>Syafa'aturrasul Teluk Kuantan 2 Putera</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-12 col-12">
                    <img class="mobile-hide" src="https://oncard.id/assets_oncard/images/ill234.webp" alt="" style="text-align:right;padding:0;width:100%; height:auto; object-fit:cover; object-position:top;">
                    </div> -->
                    <div class="col-12">
                        <div class="marquee">
                            <ul class="marquee-content">
                            <?php
                            foreach($datasekolah as $row){?>
                                <li>
                                <div style="border-radius: 25px!important; overflow: hidden!important; height: 120px; width: 100%;">
                                    <img src="https://oncard.id/app/assets/users/foto/<?=$row->foto;?>" 
                                        alt="" 
                                        style="height: 100%; width: 100%; object-fit: contain; display: block;" class="logox" />
                                </div>
                                <?php
                                $words = explode(' ', $row->nama); // Split the string into words
                                if (count($words) > 2) {
                                    $namaFormatted = implode(' ', array_slice($words, 0, 2)) . '<br/>' . implode(' ', array_slice($words, 2));
                                } else {
                                    $namaFormatted = $row->nama; // If less than 2 words, leave it as is
                                }
                                ?>
                                <h4 style="color:white; font-size:12px;display:block!important;"><?=$namaFormatted;?></h4>
                                </li>
                            <?php } ?>
                            <!-- <li>
                            <img src="https://oncard.id/assets/img/bg_smanpintar.png" alt="" style="height:70px;width:100%;object-fit:contain;display:block;"/>
                            <h4 style="color:white; font-size:12px;">SMA Negeri<br/>Pintar Provinsi Riau</h4>
                            </li>
                            <li>
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTZBUOZxiNWjsVRniNLtGeiG7aP-Svco-Sozw&s" alt="" style="height:70px;width:100%;object-fit:contain;display:block;border-radius:100px!important; border-radius 100px!important;overflow:hidden!important;"/>
                            <h4 style="color:white; font-size:12px;">Pondok Modern<br/>Al-Kautsar</h4>
                            </li>
                            <li>
                            <img src="https://oncard.id/app/assets/users/foto/r99CRyHy3yMpES241707982188.png" alt="" style="height:70px;width:100%;object-fit:contain;display:block;"/>
                            <h4 style="color:white; font-size:12px;">Pondok Pesantren<br/>Tafaqquh</h4>
                            </li>
                            <li>
                            <img src="https://masppsr.files.wordpress.com/2019/09/logo-pp-syafaaturrasul-1.png" alt="" style="height:70px;width:100%;object-fit:contain;display:block;"/>
                            <h4 style="color:white; font-size:12px;">Pondok Pesantren<br/>Syafa'aturrasul Teluk Kuantan</h4>
                            </li>
                            <li>
                            <img src="https://masppsr.files.wordpress.com/2019/09/logo-pp-syafaaturrasul-1.png" alt="" style="height:70px;width:100%;object-fit:contain;display:block;"/>
                            <h4 style="color:white; font-size:12px;">Pondok Pesantren<br/>Syafa'aturrasul Teluk Kuantan 2 Putera</h4>
                            </li> -->
                            <!-- <li><i class="fab fa-codepen"></i></li>
                            <li><i class="fab fa-free-code-camp"></i></li>
                            <li><i class="fab fa-dev"></i></li>
                            <li><i class="fab fa-react"></i></li>
                            <li><i class="fab fa-vuejs"></i></li>
                            <li><i class="fab fa-angular"></i></li>
                            <li><i class="fab fa-node"></i></li>
                            <li><i class="fab fa-wordpress"></i></li>
                            <li><i class="fab fa-aws"></i></li>
                            <li><i class="fab fa-docker"></i></li>
                            <li><i class="fab fa-android"></i></li> -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid " style="padding:0!important;margin-top:-1px;">
    <img src="https://oncard.id/assets_oncard/images/curvedbig2.webp" style="width:100%; height:auto; object-fit:cover; "/>
</div>

<div class="container-fluid " style="padding:0;padding-bottom:150px;">
    <div class="container-lg" >
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12 text-center mb-5">
                <h1 class="elegant">Berita
                <img src="<?=base_url();?>assets_oncard/logo/logo_dongker.png" style="display:inline; width:170px;" alt="">
                </h1>
            </div>
        </div>
        <div class="row putcontenthere"></div>

        <div class="row">
            <div class="col-12 text-center">
                <button type="button" class="btn btn-sucess" style="display:block;margin:auto;background:#00ba78!important" onclick="window.location.href='<?=base_url();?>Welcome/konten'">Semua Berita</button>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid " style="padding:0">
    <div class="container-lg" >
        <div class="row">
            <div class="col-lg-2 col-md-2 col-12 mobile-hide"></div>
            <div class="col-lg-8 col-md-12 col-12 text-end"><img src="https://oncard.id/assets_oncard/images/dots.png" style="text-align:right; width:auto; height:150px; object-fit:contain;"/></div>
            <div class="col-lg-2 col-md-2 col-12 mobile-hide"></div>
            
            <div class="col-lg-1 col-md-2 col-12 mobile-hide"></div>
            <div class="col-lg-10 col-md-12 col-sm-12 col-12 text-center " style="margin-top:-100px;">
                <h1 class="elegant">Testimoni</h1>
                <strong>Tentang performa dan kualitas oncard.id</strong>
                <br/>

                <div id="carouselExampleIndicators" class="carousel slide mt-5 mb-5" data-bs-ride="true">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <!-- <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button> -->
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                        <img src="https://oncard.id/assets_oncard/images/test5.webp" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item active">
                        <img src="https://oncard.id/assets_oncard/images/rispel.webp" class="d-block w-100" alt="...">
                        </div>
                        <!-- <div class="carousel-item">
                        <img src="https://oncard.id/assets_oncard/images/test3.webp" class="d-block w-100" alt="...">
                        </div> -->
                    </div>
                    
                </div>
            </div>
            <div class="col-lg-1 col-md-2 col-12 mobile-hide"></div>
            
            <div class="col-lg-2 col-md-2 col-12 mobile-hide"></div>
            <div class="col-lg-8 col-md-12 col-12 text-start"><img src="https://oncard.id/assets_oncard/images/dots.png" style="text-align:right; width:150px;margin-top:-100px; height:150px; object-fit:cover;"/></div>
            <div class="col-lg-2 col-md-2 col-12 mobile-hide"></div>
        </div>
    </div>
</div>


<div class="container-fluid div5" style="padding:0!important;margin-top:0px;">
    <img src="https://oncard.id/assets_oncard/images/separator.webp" style="width:100%; height:auto; object-fit:cover; transform:rotate(180deg);"/>
</div>

<div class="container-fluid div4 " style=" color:white; margin-top:-1px; padding:0;padding-top:50px;padding-bottom:50px;background:#2CD69A!important; border-bottom-left-radius:7em;border-bottom-right-radius:7em;">
    <div class="row" style="padding:0px!important;margin:0px;;">
        <img class="mobile-hide" src="https://oncard.id/assets_oncard/images/contactus.webp" alt="" style="padding:0;position:absolute;left:0px; width:650px;">
        <div class="col-lg-6 col-md-12 col-sm-12 col-12 ps-3"></div>
        <div class="col-lg-5 col-md-12 col-sm-12 col-12 pe-3 seconddiv" style="margin-top:100px;padding-bottom:250px;">
            <h4 class="elegant" style="color:white;">Bergabung Dengan Kami</h4>
            
            <div class="card mt-4 mb-4" style="border-radius:1.5em;">
                <div class="card-body p-4 text-muted" style="font-size:15px;" >
                    <h5 class="elegant2">Bagaimana caranya? Berikut : </h5>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-12">
                        <div class="row mb-2 mt-3">
                            <div class="col-12"><i class='bx bx-message-square-check'></i> Tekan tombol <strong>Ajukan Demo Sekarang</strong> dibawah ini</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-12"><i class='bx bx-message-square-check'></i> Anda akan diarahkan ke Customer Service kami.</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-12"><i class='bx bx-message-square-check'></i> Tunggu beberapa saat, tim oncard.id akan menghubungi kamu</div>
                        </div>
                        
                        <h5 class="mt-3 elegant2" >Anda yakin ingin melakukan pendaftaran dan demo sekarang? <strong>Gratis Lho!</strong></h5>


                        </div>
                        
                    </div>
                    
                    <a target="_blank" href="https://api.whatsapp.com/send?phone=6281262279950&text=Hi%20Oncard.ID%2C%20Saya%20tertarik%20dengan%20produk%20Anda.%20Informasi%20ini%20saya%20dapatkan%20dari%20Website%20Official%20Pesantren%20Digital%20Service%20ONCARD.ID" type="button" class="mt-4 btn btn-success btn-round text-center" style="display:block; margin:auto;">Ajukan Demo Sekarang</a>

                </div>
            </div>
            
            <!-- <div class="card mt-4 mb-4" style="border-radius:1.5em;">
                <div class="card-body p-4 text-muted text-center" style="font-size:15px;" >
                    
                </div>
            </div> -->
            
        </div>
        
    </div>
    <div class="row">
        <div class="col-12 text-center text-light">
            <code class="" style="font-size:13px; font-weight:normal;color:white!important;opacity:0.6;">
            Segala hak cipta dalam situs ini telah dimiliki oleh ONCARD
            <br/>oncard v2.0 - &copy; <?=date('Y');?></code>
        </div>
    </div>
</div>

<div class="col-12 text-center">
            <img src="https://oncard.id/assets_oncard/images/logo_oncard2.gif" style="width:300px; height:140px; object-fit:cover;object-position:center;"/>
            </div>


<script>
    $(document).ready(function () {
        // showDataX();
        getData();
    });
    function getData() {

    const save = async () => {
        const posts = await axios.post('https://oncard.id/Welcome/prphoenix_get_konten/181119ssjxx1717118FF22__2282111_1291/top4').catch((err) => {

            $("#toast-body").text('Data tidak ada!');
            toggleToast();

        });

        console.log(posts);

        if (posts.status == 201||posts.status == 200) {

            console.log(posts.data);
            let no = 1;

            let html = '';
           
            posts.data.data.map((mapping, i) => {

                const tanggalPosting = moment(mapping.dateCreated);

                const selisihHari = moment().diff(tanggalPosting, 'days');
                const selisihJam = moment().diff(tanggalPosting, 'hours');

                // Membuat informasi posting
                let infoPosting;
                if (selisihHari === 0) {
                if (selisihJam === 0) {
                    infoPosting = 'Publish kurang dari satu jam yang lalu';
                } else {
                    infoPosting = `Publish ${selisihJam} jam yang lalu`;
                }
                } else if (selisihHari === 1) {
                infoPosting = 'Publish kemarin';
                } else if (selisihHari <= 7) {
                infoPosting = `Publish ${selisihHari} hari yang lalu`;
                } else {
                infoPosting = `Publish pada ${tanggalPosting.format('D MMMM YYYY')}`;
                }


                html += `<div class="col-lg-3 col-md-4 col-sm-6 col-12 news" onclick="window.location.href='<?=base_url();?>Welcome/konten_detail/${mapping.slug}'">
                <div class="card" style="overflow:hidden;">
                    <div class="card-body" style="padding:0px;overflow:hidden;">
                        <div class="row" style="padding:0px;">
                            <div class="col-lg-12 col-md-12 col-12" style="padding:0px;x">
                            <img src="${mapping.thumbnail}" style="height:220px;object-fit:cover;width:100%;object-position:center;" alt="">
                            </div>
                            <div class="col-lg-12 col-md-12 col-12 pt-3 pb-3" style="padding:35px;">
                                <div class="badge mb-3" style="background:#00ba78;">News</div>
                                <h6 class="elegant" style="font-size:1.3em!important;">${mapping.judul}</h6>
                                <small class="text-muted">${infoPosting}</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>`;

                
            });

            

            $('.putcontenthere').html(html);

        }else {
            $('#card_id').attr('disabled', false);
            $("#toast-body").text('Terjadi kesalahan pada server oncard!');
            toggleToast();
        }

    }

    save();

    }

    const root = document.documentElement;
const marqueeElementsDisplayed = getComputedStyle(root).getPropertyValue("--marquee-elements-displayed");
const marqueeContent = document.querySelector("ul.marquee-content");

root.style.setProperty("--marquee-elements", marqueeContent.children.length);

for(let i=0; i<marqueeElementsDisplayed; i++) {
  marqueeContent.appendChild(marqueeContent.children[i].cloneNode(true));
}
</script>
