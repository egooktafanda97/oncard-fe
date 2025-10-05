<style>
    p, li {
        font-size:17px!important;
        line-height:2em;
    }
    h2 {
        font-weight:800;
    }
</style>
<section class="xxx" style="padding-top:200px;padding-left:150px;padding-right:150px;color:#4a4a4a!important;">
    <div class="row" style="">
        <div class="col-lg-7 col-md-12 col-12">
            <h1 class="elegant2" style="font-weight:bold;font-size:50px;">Tentang Kami</h1>
            <h1 class="elegant2" style="font-weight:normal;font-size:20px;line-height:1.8em;">
            ONCARD.ID merupakan sistem digital berbasis kartu dan cloude system di lingkungan tertutup seperti pesantren, kompleks perumahan, kompleks komersil, yang melayani kegiatan pembayaran, kehadiran, pendaftaran, dll. oncard dikembangkan oleh PT Phoenix Kreatif Digital.
            </h1>
            <div class="separator"></div>
            <div class="card">
                <div class="card-body">
                    <div class="row px-3 container-fluid" style="align-items:center;">
                        <div class="col-lg-7 col-sm-6 col-12">
                            <img src="https://superyou.co.id/blog/wp-content/webpc-passthru.php?src=https://superyou.co.id/blog/wp-content/uploads/2023/03/google-play.jpg&nocache=1" style="width:35px;float:left; margin-right:20px;"/>
                            <strong>Download Gratis</strong><br/>
                            <font class="text-muted">Oncard.ID juga tersedia di playstore.</font>
                        </div>
                        <div class="col-lg-5 col-sm-6 col-12">
                        <div class="mt-4" style="display:flex; gap:10px; flex-direction:column;">
                            <button id="downloadApkBtn" class="btn btn-outline-success me-2" style="background: #71c89f;
                            color: #383466;
                            border-width: 2px;
                            border-color: #383466; display:block;">
                                Download Apk
                            </button>
                            <small style="display:block;color:#444;">Versi rilis terbaru : <?=date('d-m-Y');?></small>
                        </div>

                        </div>
                    </div>
                </div>
            </div>

            <script>
                document.getElementById('downloadApkBtn').addEventListener('click', function () {
                    // Define the file URL
                    const fileUrl = 'https://oncard.id/downloads/oncard-v1.12.apk'; // Replace with your actual file URL

                    // Create an <a> element dynamically
                    const link = document.createElement('a');
                    link.href = fileUrl;

                    // Set the download attribute with a file name
                    link.download = 'oncard-apps.apk';

                    // Append the <a> element to the document body
                    document.body.appendChild(link);

                    // Programmatically click the link to start the download
                    link.click();

                    // Remove the <a> element after the download is triggered
                    document.body.removeChild(link);
                });
            </script>

            <hr>

            <h3 style="font-size:50px; font-weight:900;">LEGAL STANDING PERUSAHAAN</h3>
            
            <h4>PT. PHOENIX KREATIF DIGITAL</h4>
            <p><strong>Nomor Induk Berusaha (NIB):</strong> 0280010073106</p>
            <p><strong>Alamat Resmi:</strong></p>
            <p>Jalan Tuanku Tambusai Jalur I Teluk Kuantan, Kel. Beringin Taluk, Kec. Kuantan Tengah, Kab. Kuantan Singingi, Prov. Riau</p>
            <p><strong>Kontak Resmi:</strong></p>
            <p>62 822 50913941</p>
            <hr>
            <h2>Visi & Misi</h2>
            <p>PT. PHOENIX KREATIF DIGITAL berkomitmen untuk menjadi pelopor dalam pengembangan solusi digital inovatif yang efisien dan terpercaya.</p>
            
            <h2>Produk & Layanan</h2>
            <p>Kami menghadirkan produk unggulan dalam ekosistem digital bernama <strong>QRION</strong>, yang mencakup:</p>
            <ul>
                <li><strong>ONCARD</strong> - Sistem pembayaran digital yang aman dan efisien.</li>
                <li><strong>ONTIME</strong> - Platform absensi digital berbasis lokasi dan waktu nyata.</li>
                <li><strong>ONTUITION</strong> - Solusi manajemen keuangan pendidikan untuk pembayaran uang sekolah.</li>
                <li><strong>ONCBT</strong> - Sistem ujian berbasis komputer yang andal untuk institusi pendidikan.</li>
                <li>Dan masih banyak fitur inovatif lainnya yang terus dikembangkan.</li>
            </ul>
            
            <h2>Komitmen Perusahaan</h2>
            <p>Dengan prinsip <strong>Good Corporate Governance (GCG)</strong>, PT. PHOENIX KREATIF DIGITAL mengedepankan transparansi, akuntabilitas, dan kepatuhan terhadap regulasi. Kami berkomitmen untuk memberikan layanan berkualitas tinggi serta memastikan keamanan data pelanggan.</p>
            
        </div>
        <div class="col">
                <img class="mobile-hide" src="https://oncard.id/assets_oncard/images/about.webp" alt="" style="padding:0;position:relative;right:0px; width:100%; margin-top:-100px;">
                <img src="<?=base_url();?>assets_oncard/images/all.png" alt="" style="display:block;width:100%;margin-top:25px; margin-bottom:25px;">
                <img src="<?=base_url();?>assets_oncard/images/card.png" alt="" style="display:block;width:100%;margin-top:25px; margin-bottom:25px;">
                <img src="<?=base_url();?>assets_oncard/images/tuition.png" alt="" style="display:block;width:100%;margin-top:25px; margin-bottom:25px;">
        </div>

        
    </div>
    
</section>