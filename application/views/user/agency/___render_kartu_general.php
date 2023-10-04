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
<script type="text/javascript">
			let idsett = '';
			let modescan = '';
            let secret_code= '';
            let bodyShowDataNotComplete = '';

            $(document).ready(function () {
                showData();

                $('.page-footer').attr('style','display:none!important;');

                
            });
			function showData(){
				let num = 0;
				let tableColumn = '';
				


				const save2 = async () => {
					const posts2 = await axios.get('<?= api_url(); ?>api/v1/general/get-inpaging', {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {
						// localStorage(err.response);
					});
			
					if (posts2.status == 200) {
							num += 1;
							tableColumn = '';

                            let arr = [];
							
							
							// localStorage(posts2.data.data);

                            posts2.data.data.map((mapping,i)=>{

                                if(mapping.user.foto=='default.jpg'){
                                    arr.push({
                                        'nama' : mapping.nama_lengkap,
                                        'id' : mapping.id
                                    })
                                }

                            });

                            // localStorage(arr);
                            if(arr.length > 0){
                                let nomor = 1;
                                let xmx = '<h1>Oops!</h1><h5>Masih ada '+arr.length+' data yang tidak memiliki foto, berikut detailnya : </h5><table class="table table-stripped">';
                                arr.map((mapping,i)=>{
                                    
                                    xmx += `<tr><td width="20">${nomor++}</td>
                                    <td style="text-transform:uppercase;"><a href="<?=base_url();?>CPanel_Admin/generalManage/${mapping.id}" class="">${mapping.nama} 
                                    <i class='bx bx-link-external'></i> </a></td></tr>`;
                                });

                                xmx += '</table>';

                                // $('.putContentHere').html(xmx);

                                bodyShowDataNotComplete = xmx ;

                                // return false;
                            }

                            let dataokcount = 0;

                            posts2.data.data.map((mapping,i)=>{

                            // let inisiateNama = mapping.nama_lengkap;
                            // inisiateNama = inisiateNama.toLowerCase();
                            // if(inisiateNama.includes('ridho ok')||inisiateNama.includes('sumitr')||inisiateNama.includes('mifta')||inisiateNama.includes('elsamia')||inisiateNama.includes('fitri kh')||inisiateNama.includes('amiru')||inisiateNama.includes('zikri')||inisiateNama.includes('mahjor')||inisiateNama.includes('ari ag')||inisiateNama.includes('jami')||inisiateNama.includes('saidul')||inisiateNama.includes('yusmawa')||inisiateNama.includes('ikhsan ka')||inisiateNama.includes('bagas')||inisiateNama.includes('safri')){

                                if(mapping.user.foto!='default.jpg'){
                                    dataokcount++;

                                    let namalengkap = mapping.nama_lengkap;
                                    namalengkap = namalengkap.toLowerCase();
                                    
                                    let textTingkat = '';
                                    let textNamaA = namalengkap;
                                    let textNama = textNamaA.split("-m");
                                    let urlBgDepan = '';
                                    let urlBgBelakang = '';
                                    urlBgDepan = '<?=base_url();?>assets_oncard/images/kartu/front_general.webp';
                                    urlBgBelakang = '<?=base_url();?>assets_oncard/images/kartu/back_general.webp';
                                    
                                    let alamat = mapping?.alamat_lengkap;
                                    alamat = alamat?.toLowerCase();

                                 
                                    tableColumn +=`
                                        <div class="row">
                                            <div class="col-lg-12 col-12">
                                                <div style="width:350px!important; height:555.02px!important; margin-bottom:50px; margin-right:50px; background:url(${urlBgDepan});background-size:contain;background-position:center;">
                                                    <img src="<?=base_url();?>app/assets/users/foto/${mapping.user.foto}" style="width:143px; height:187px; border-radius:20px; border:4px solid #fff; position:relative; margin-left:105px; margin-top:149px; object-fit:cover; object-position:center;"/>
                                                    <div style="width:250px; margin-left:122px; margin-top:-1px; color:black; font-weight:bold; font-size:16px;">
                                                        <p style="margin:0px!important;text-transform:capitalize;">${textNama[0]}</p>
                                                        <p  style="margin:0px!important; margin-top:-3px!important; font-size:15px;">${mapping.jabatan}</p>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        
                                    `;
                                }

                            // }
							});

                        // $('.resumeData').html(`
                        //     <table class="table table-bordered">
                        //         <tr>
                        //         <td width="33.3%"><font class="jmldataok"></font><a href="#/" onclick="showModalData();">Lihat ${arr.length} data yang belum lengkap</a></td>
                        //         <td width="33.3%">${dataokcount} data sudah lengkap</td>
                        //         <td width="33.3%"> TOTAL DATA : ${posts2.data.data.length} DATA.</td>
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

		</script>