<div class="page-wrapper">
			<div class="page-content">
				<div class="row">
                    <div class="col-lg-12 mah">
                        <div class="alert alert-success"><i class="bx bxs-circle me-3 text-success"></i>API Whatsapp sedang <b>ON</b></div>
                    </div>
				</div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h5>Nomor Target (Template)</h5>
                                <small class="text-muted">Syarat & Ketentuan : <br/>
                                <ul>
                                    <li>Nomor target harus berawalan 62.</li>
                                    <li>Nomor target harus nomor whatsapp.</li>
                                    <li>Pastikan nomor yang dimasukkan adalah nomor yang tepat.</li>
                                    <li>Kesalahan pengiriman hanya terjadi jika nomor yang dimasukkan tidak sesuai.</li>
                                </ul></small>
                            </div>
                            <div class="card-body">
                                <input type="number" class="form-control mb-3" placeholder="Masukkan nomor whatsapp..." id="noWA"/>
                                <button type="button" id="btnSubmitPesanKirim" onclick="sendMessageNow('');" class="btn btn-success mb-3 btn-sm">KIRIM</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h5>Nomor Target (Kirim dengan contoh pesan)</h5>
                                <small class="text-muted">Syarat & Ketentuan : <br/>
                                <ul>
                                    <li>Nomor target harus berawalan 62.</li>
                                    <li>Nomor target harus nomor whatsapp.</li>
                                    <li>Pastikan nomor yang dimasukkan adalah nomor yang tepat.</li>
                                    <li>Kesalahan pengiriman hanya terjadi jika nomor yang dimasukkan tidak sesuai.</li>
                                    <li>Lakukan cek & re-cek kembali untuk format pengiriman pesannya</li>
                                </ul></small>
                            </div>
                            <div class="card-body">
                                <input type="text" class="form-control mb-3" placeholder="URL Gambar / Kosongkan bila tidak ada foto" id="gambar"/>
                                <input type="number" class="form-control mb-3" placeholder="Masukkan nomor whatsapp..." id="noWA2"/>
                                <textarea name="isipesan" id="isipesan" placeholder="Ketik format pesan disini..." class="form-control mb-3" cols="30" rows="5"></textarea>
                                <button type="button" id="btnSubmitPesanKirim2" onclick="sendMessageNow('template');" class="btn btn-success mb-3 btn-sm">KIRIM</button>
                            </div>
                        </div>
                    </div>
				</div>
				
				
			</div>
		</div>

        <script type="text/javascript">

        function sendMessageNow(str){

            $('#btnSubmitPesanKirim').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Memproses...');
            $('#btnSubmitPesanKirim').attr('disabled', 'disabled');
            $('#btnSubmitPesanKirim').css('cursor', 'not-allowed');
            $('#btnSubmitPesanKirim2').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Memproses...');
            $('#btnSubmitPesanKirim2').attr('disabled', 'disabled');
            $('#btnSubmitPesanKirim2').css('cursor', 'not-allowed');
            
            let nomor = '';
            let gambar = $('#gambar').val();

            if(str==''){
                nomor =$('#noWA').val();
            }else {
                nomor =$('#noWA2').val();
            }

            if(nomor.length>8 && nomor!='0'){
                var strFirstThree = nomor.substring(0,3);
                if(strFirstThree=='628' ){             
                    
                    let pesan = '';
                    if(str==''){
                        pesan = 'Hi, ini adalah pesan dari API Whatsapp Oncard.id';
                    }else {
                        pesan = $('#isipesan').val();
                    }
                    
                    var form_data = new FormData();
                    form_data.append('noWA',nomor);
                    form_data.append('pesan',pesan);
                    form_data.append('kodeInstansi',kodeInstansiX);

                    let urlx = '<?php echo base_url(); ?>WebhookOncard/sendMessageWatzap';

                    if(gambar!=''){
                        form_data.append('gambar',gambar);
                        urlx = '<?php echo base_url(); ?>WebhookOncard/sendMessageWatzapImage';
                    }
                    
                    jQuery.ajax({
                        type: "POST",
                        url: urlx,
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        dataType: 'json',  // what to expect back from the PHP script, if anything
                        beforeSend: function() {
                            
                        },
                        success : function(e){

                            if(e.status==true){
                                $('#btnSubmitPesanKirim').html('KIRIM');
                                $('#btnSubmitPesanKirim').attr('disabled', false);
                                $('#btnSubmitPesanKirim').css('cursor', 'pointer');
                                
                                $('#btnSubmitPesanKirim2').html('KIRIM');
                                $('#btnSubmitPesanKirim2').attr('disabled', false);
                                $('#btnSubmitPesanKirim2').css('cursor', 'pointer');
                                
                                $('#isipesan').val('');
                                $('#noWA').val('');
                                $('#noWA2').val('');
                            }else {
                                console.log('error mengirim pesan');
                                window.location.reload();
                                
                            }
                        }        
                    });

                }else {
                    $('#btnSubmitPesanKirim').html('KIRIM');
                    $('#btnSubmitPesanKirim').attr('disabled', false);
                    $('#btnSubmitPesanKirim').css('cursor', 'pointer');
                    
                    $('#btnSubmitPesanKirim2').html('KIRIM');
                    $('#btnSubmitPesanKirim2').attr('disabled', false);
                    $('#btnSubmitPesanKirim2').css('cursor', 'pointer');

                    Toastify({
                        text: 'Format nomor tidak sesuai!',
                        duration: 3000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        className: "errorMessage",

                    }).showToast();

                    $('#noWA').val('');

                }
            }else {

                $('#btnSubmitPesanKirim').html('KIRIM');
                $('#btnSubmitPesanKirim').attr('disabled', false);
                $('#btnSubmitPesanKirim').css('cursor', 'pointer');
                
                $('#btnSubmitPesanKirim2').html('KIRIM');
                $('#btnSubmitPesanKirim2').attr('disabled', false);
                $('#btnSubmitPesanKirim2').css('cursor', 'pointer');

                Toastify({
                    text: 'Format nomor tidak sesuai!',
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    className: "errorMessage",

                }).showToast();

                $('#noWA').val('');

                return false;
            }

            

        }

        </script>