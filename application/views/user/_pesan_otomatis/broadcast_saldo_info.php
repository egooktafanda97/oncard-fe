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

    <div id="putcontent"></div>

    <script src="https://momentjs.com/downloads/moment.js"></script>
    <script src="https://momentjs.com/downloads/moment-with-locales.js"></script>
    <script type="text/javascript">moment.locale('id');</script>

    <script>
        $(document).ready(function () {
            console.log('ok');
            let arrayBaruBroadcast = [];
            $('#putcontent').html('<?=getToken();?>');

            const save2 = async () => {
					const posts2 = await axios.get('https://oncard.id/app/api/v1/get-history', {
						headers: {
							'keys' : '<?=getToken();?>'
						}
					}).catch((err) => {
						console.log(err.response);
					});
			
					if (posts2.status == 200) {
                        posts2.data.data.data.map((mapping,i)=>{
                            if(mapping.types.name_type=='buy' && mapping.account.user.model=='Siswa'){
                                arrayBaruBroadcast.push({
                                    'pembeli' : mapping.account.customers_name,
                                    'waktu' : mapping.invoice.create_date,
                                    'nominal' : formatRupiah(mapping.transaction_amount),
                                    'telp' : mapping.account.user.siswa.telp_ortu,
                                })  
                            }
                             
                        });

                        console.log(arrayBaruBroadcast);
                        
					}
				}
				
				save2();
        });

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