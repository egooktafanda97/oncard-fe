<style>
    body {
        background:white!important;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-12 resumeData table-responsive py-4">

        </div>
        <div class="col-12 putContentHere">

        </div>
    </div>

</div>

<div class="modal fade" id="modalShowData" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body putbodi">
                
            </div>
            <div class="modal-footer text-center">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalShowDataNIS" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body putbodinis">
                
            </div>
            <div class="modal-footer text-center">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
			let idsett = '';
			let modescan = '';
            let secret_code= '';
            let bodyShowDataNotComplete = '';
            let bodyShowDataNotCompleteNISN = '';

            $(document).ready(function () {
                showData();

                $('.page-footer').attr('style','display:none!important;');

                
            });
			function showData(){
				let num = 0;
				let tableColumn = '';
				


				const save2 = async () => {
					const posts2 = await axios.get('<?= api_url(); ?>api/v1/siswa/get-inpaging', {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {
						console.log(err.response);
					});
			
					if (posts2.status == 200) {
							
							tableColumn = '';

                            let arr = [];				
                            let arrNoNISN = [];				
							
                            posts2.data.data.map((mapping,i)=>{

                                let pecahNISN = mapping.nis;
                                pecahNISN = pecahNISN.split("000");

                                if(mapping.user.foto=='default.jpg'){
                                    arr.push({
                                        'nama' : mapping.nama_lengkap,
                                        'id' : mapping.id
                                    })
                                }
                                if(pecahNISN[1]){
                                    arrNoNISN.push({
                                        'nama' : mapping.nama_lengkap,
                                        'id' : mapping.id
                                    })
                                }

                            });

                            console.log(arr.length);

                            let dataMALengkap = 0;
                            let dataMtsLengkap = 0;
                            let dataMATidakLengkap = 0;
                            let dataMtsTidakLengkap = 0;
                            let dataTidakJelas = 0;
                            
                            if(arr.length > 0){
                                let nomor = 1;
                                let xmx = '<h1>Oops!</h1><h5>Masih ada '+arr.length+' data yang tidak memiliki foto, berikut detailnya : </h5><table class="table table-stripped">';
                                arr.map((mapping,i)=>{
                                    let textTingkat = '';
                                    let textNamaA = mapping.nama;
                                    let textNama = textNamaA.split("-M");
                                    if(textNama[1]=='A'){
                                        textTingkat = 'Madrasah Aliyah';
                                        dataMATidakLengkap = dataMATidakLengkap+1;
                                    }
                                    else if(textNama[1]=='TS'){
                                        textTingkat = 'Madrasah Tsanawiyah';
                                        dataMtsTidakLengkap = dataMtsTidakLengkap+1;
                                    }
                                    xmx += `<tr><td width="20">${nomor++}</td>
                                    <td style="text-transform:uppercase;"><a href="<?=base_url();?>CPanel_Admin/siswaManage/${mapping.id}" class="">${textNama[0]} <i class='bx bx-link-external'></i> </a> - <span class="text-muted">${textTingkat}</span></td></tr>`;
                                });

                                xmx += '</table>';

                                // $('.putContentHere').html(xmx);

                                bodyShowDataNotComplete = xmx ;

                                // return false;
                            }
                            
                            if(arrNoNISN.length > 0){
                                let nomor = 1;
                                let xmx = '<h1>Oops!</h1><h5>Masih ada '+arrNoNISN.length+' data yang tidak memiliki NIS, berikut detailnya : </h5><table class="table table-stripped">';
                                arrNoNISN.map((mapping,i)=>{
                                    let textTingkat = '';
                                    let textNamaA = mapping.nama;
                                    let textNama = textNamaA.split("-M");
                                    if(textNama[1]=='A'){
                                        textTingkat = 'Madrasah Aliyah';
                                        // dataMATidakLengkap = dataMATidakLengkap+1;
                                    }
                                    else if(textNama[1]=='TS'){
                                        textTingkat = 'Madrasah Tsanawiyah';
                                        // dataMtsTidakLengkap=dataMtsTidakLengkap+1;
                                    }
                                    xmx += `<tr><td width="20">${nomor++}</td>
                                    <td style="text-transform:uppercase;"><a href="<?=base_url();?>CPanel_Admin/siswaManage/${mapping.id}" class="">${textNama[0]} <i class='bx bx-link-external'></i> </a> - <span class="text-muted">${textTingkat}</span></td></tr>`;
                                });

                                xmx += '</table>';

                                // $('.putContentHere').html(xmx);

                                bodyShowDataNotCompleteNISN = xmx ;

                                // return false;
                            }

                            let dataokcount = 0;

                            posts2.data.data.map((mapping,i)=>{
                                num++;

                                if(num>=501 && num <700){

                                if(mapping.user.foto!='default.jpg' && mapping.user.foto!='null'){
                                    dataokcount++;

                                    let namalengkap = mapping.nama_lengkap;
                                    namalengkap = namalengkap.toLowerCase();
                                    
                                    let textTingkat = '';
                                    let textNamaA = namalengkap;
                                    let textNama = textNamaA.split("-m");
                                    let urlBgDepan = '';
                                    let urlBgBelakang = '';
                                    if(textNama[1]=='a'){
                                        textTingkat = 'Madrasah Aliyah';
                                        dataMALengkap++;
                                        urlBgDepan = '<?=base_url();?>assets_oncard/images/kartu/front_siswa_ma_1.webp';
                                        // urlBgBelakang = '<?=base_url();?>assets_oncard/images/kartu/back_siswa_ma.webp';
                                    }
                                    else if(textNama[1]=='ts'){
                                        textTingkat = 'Madrasah Tsanawiyah';
                                        dataMtsLengkap++;
                                        urlBgDepan = '<?=base_url();?>assets_oncard/images/kartu/front_siswa_mts_1.webp';
                                        // urlBgBelakang = '<?=base_url();?>assets_oncard/images/kartu/back_siswa_mts.webp';
                                    }else {
                                        dataTidakJelas = dataTidakJelas+1;
                                    }
                                    
                                    let alamat = mapping?.alamat_lengkap;
                                    alamat = alamat?.toLowerCase();
                                        
                                    tableColumn +=`
                                        
                                        <div class="row">
                                        
                                            <div class="col-lg-6 col-6">
                                                <div style="width:350px!important; height:555.02px!important; margin-bottom:50px; margin-right:50px; background:url(${urlBgDepan});background-size:contain;background-position:center;">
                                                    <img src="<?=base_url();?>app/assets/users/foto/${mapping.user.foto}" style="width:143px; height:187px; border-radius:20px; border:4px solid #fff; position:relative; margin-left:105px; margin-top:149px; object-fit:cover; object-position:center;"/>
                                                    <div style="width:250px; margin-left:102px; margin-top:-1px; color:black; font-weight:bold; font-size:16px;">
                                                        <p style="margin:0px!important;text-transform:capitalize;">${textNama[0]}</p>
                                                        <p  style="margin:0px!important; margin-top:-3px!important; font-size:15px;">${mapping.nis}</p>
                                                        <p  style="margin:0px!important; margin-top:-4px!important;text-transform:capitalize;font-size:15px;">${alamat} , ${moment(mapping.tanggal_lahir).format('DD-MM-YYYY')}</p>
                                                        
                                                    </div>
                                                </div>
                                            </div>

                                            
                                            
                                        </div>
                                        
                                    `;
                                }

                            }
                            

							});

                            let maLengkapAll = dataMALengkap +dataMATidakLengkap ;
                            let mtsLengkapAll = dataMtsLengkap +dataMtsTidakLengkap;

                        // $('.resumeData').html(`
                        //     <table class="table table-bordered">
                        //         <tr>
                        //         <td width="33.3%"><font class="jmldataok"></font><a href="#/" onclick="showModalData();">Lihat ${arr.length} data yang belum lengkap</a>
                        //         <br/>Data MA (${dataMATidakLengkap}) | Data MTS (${dataMtsTidakLengkap})
                        //         </td>
                        //         <td width="33.3%">${dataokcount} data sudah lengkap
                        //         <br/>
                        //         Data MA (${dataMALengkap}) | Data MTS (${dataMtsLengkap})
                        //         </td>
                        //         <td width="33.3%"> TOTAL DATA : ${posts2.data.data.length} DATA.
                        //         <br/>
                        //         Data MA (${maLengkapAll}) | Data MTS (${mtsLengkapAll})</td>
                        //         </tr>
                        //         <tr>
                        //         <td colspan="3">NIS belum ditentukan<br/>
                        //         <a href="#/" onclick="showModalDataNISN();">Lihat ${arrNoNISN.length} data NIS yang belum lengkap</a>
                        //         </td>
                        //         </tr>
                        //     </table>
                        // `);
                        
							
						$('.putContentHere').html(tableColumn);
					}
				}
				save2();
			}

            function showModalData(){
                $('.putbodi').html(bodyShowDataNotComplete);
                $('#modalShowData').modal('toggle');
            }
            
            function showModalDataNISN(){
                $('.putbodinis').html(bodyShowDataNotCompleteNISN);
                $('#modalShowDataNIS').modal('toggle');
            }

		</script>