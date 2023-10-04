<div class="page-wrapper">
			<div class="page-content">
				<div class="row">
					<div class="col-12">
						<div class="card radius-10 w-100" style="overflow:hidden;">
							<div class="row" >
								<!-- <img src="<?=base_url();?>assets_oncard/images/bg_new.webp" style="width:100%; object-fit:cover;object-position:center;height:200px;"/> -->
								<img src="https://img.freepik.com/free-photo/layers-green-papers-creating-abstract-arrows_23-2148793006.jpg?w=1800&t=st=1695264421~exp=1695265021~hmac=18641747675730f4b1d753b5e03c96663be8dfd83ccf50d3edebd8be0df77338" style="width:100%; object-fit:cover;object-position:center;height:200px;"/>
                                <font style="position:absolute; left:30px; top:50px; font-size:70px;color:white; font-weight:bolder;">Whatsapp Broadcast API</font>
							</div>
						</div>
					</div>
                    <div class="col-lg-6 mah">
                        <!-- <div class="alert alert-success"><i class="bx bxs-circle me-3 text-success"></i>API Whatsapp sedang <b>ON</b></div> -->
                    </div>
				</div>
				
				
			</div>
		</div>

        <script type="text/javascript">

        $(document).ready(function () {
        getDataSession();
        });
        function getDataSession(){

            axios.get('https://v3.gigades.id/rest/api/v1/wa/all-session').then((response) => {
                let dataHere = '';
                let periodeBerjalan = 0;
                let no = 0;
                let countWaiting = 0;
                let countActive = 0;
                if(response.data.length==0){
                    alert('Tidak ada session yang aktif! Scan ulang device sekarang juga!');
                return false;
                }
                
                response.data.map((mapping,i)=>{
                    console.log(mapping);
                    
                    if(mapping=='ppsrSess'){
                        sessionSet = mapping;
                        $('.mah').html(`
                            <div class="alert alert-success"><i class="bx bxs-circle me-3 text-success"></i>API Whatsapp sedang <b>ON</b></div>
                        `);
                        // return false;
                    }else {
                        // alert('Sambungkan ke nomor API ');
                        $('.mah').html(`
                            <div class="alert alert-danger"><i class="bx bxs-circle me-3 text-danger"></i>API Whatsapp sedang <b>OFF. Nomor tidak terkoneksi.</b></div>
                        `);
                    }
                });

            }).catch((error) => {
                console.log(error);
            })
        }

        </script>