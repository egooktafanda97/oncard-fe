<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
    <script src="<?=base_url();?>assets_oncard/js/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.24.0/axios.min.js" integrity="sha512-u9akINsQsAkG9xjc1cnGF4zw5TFDwkxuc9vUp5dltDWYCSmyd0meygbvgXrlc/z7/o4a19Fb5V0OUE58J7dcyw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>

    <div class="container p-5">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <input type="number" class="form-control" id="nomor" placeholder="nomor..."/>
                        <textarea name="" id="pesan" cols="30" class="form-control" rows="10">

                        </textarea>
                        <button type="button" class="btn btn-success" id="btnSubmit" onclick="sendMss();"> KIRIM PESAN </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?=base_url();?>assets_oncard/js/bootstrap.bundle.min.js"></script>
    <script src="https://momentjs.com/downloads/moment.js"></script>
    <script src="https://momentjs.com/downloads/moment-with-locales.js"></script>
    <script type="text/javascript">moment.locale('id');</script>

    <script>
        $(document).ready(function () {
            
        });


        function sendMss() {
            $('#btnSubmit').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Memproses...');
            $('#btnSubmit').attr('disabled', 'disabled');
            $('#btnSubmit').css('cursor', 'not-allowed');

            var nomor = $('#nomor').val();
            var pesan = $('#pesan').val();
            
            if(nomor==''){

                $('#btnSubmit').html('KIRIM PESAN');
                $('#btnSubmit').attr('disabled', false);
                $('#btnSubmit').css('cursor', 'pointer');
                
                Toastify({
                    text: 'Nomor wajib diisi!',
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    className: "errorMessage",

                }).showToast();
                return false;
            }

            var form_data = new FormData();
            form_data.append('nomor', nomor);
            form_data.append('pesan', pesan);
            
            const save = async (form_data) => {
                const posts = await axios.post('<?=base_url();?>WebhookOncard/sendMessage', form_data).catch((err) => {

                        Toastify({
                            text: 'Terjadi kesalahan pada server!',
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            className: "errorMessage",

                        }).showToast();
                    
                    $('#btnSubmit').html('KIRIM PESAN');
                    $('#btnSubmit').attr('disabled', false);
                    $('#btnSubmit').css('cursor', 'pointer');
                });
                if (posts.status == 201||posts.status == 200) {
                    if (posts.data.status == true) {
                        
                        Toastify({
                            text: 'PESAN TERKIRIM!',
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            className: "successMessage",

                        }).showToast();
                        $('#btnSubmit').html('KIRIM PESAN');
                        $('#btnSubmit').attr('disabled', false);
                        $('#btnSubmit').css('cursor', 'pointer');

                        
                        
                    } else {
                            

                            $('#textToCard').val('');
                            $('#btnSubmit').html('KIRIM PESAN');
                            $('#btnSubmit').attr('disabled', false);
                    }

                    
                }
                else {
                    
                        Toastify({
                            text: 'Terjadi kesalahan dalam menyimpan data!',
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            className: "errorMessage",

                        }).showToast();
                    $('#btnSubmit').html('KIRIM PESAN');
                    $('#btnSubmit').attr('disabled', false);
                    $('#btnSubmit').css('cursor', 'pointer');
                }
            }

        save(form_data);

        }
        function formatRupiah(angka, prefix){
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiah     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if(ribuan){
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}
 
			rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
			return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
		}
    </script>


</body>
</html>