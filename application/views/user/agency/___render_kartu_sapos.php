<style>
    .animbutton {
        opacity :1;
    }
    @keyframes shine {
        0% {left: -100px}
        20% {left: 100%}
        100% {left: 100%}
    }
    .animbutton:before {
        content: '';
        position: absolute;
        width: 100px;
        height: 100%;
        background-image: linear-gradient(
            120deg,
            rgba(255,255,255, 0) 30%,
            rgba(255,255,255, .8),
            rgba(255,255,255, 0) 70%
        );
        top: 0;
        left: -100px;
        animation: shine 3s infinite linear; /* Animation */
    }

    .fab-btn {
    position: absolute;
    bottom: 12px;
    right: 12px;
    border-radius: 50%;
    width: 50px;
    height: 50px;
    transition: box-shadow 0.4s ease;
    background: rgb(35,147,0);
background: linear-gradient(32deg, rgba(35,147,0,1) 0%, rgba(95,180,44,1) 100%);
    box-shadow: 0 1px 4px rgba(0, 0, 0, 0.6);
    color: #fff;
    font-size: 1.7rem;
    font-weight: bold;
    cursor: pointer;
    }

    .fab-btn span {
    display: flex;
    width: 100%;
    height: 100%;
    justify-content: center;
    align-items: center;
    transition: transform 0.5s ease;
    }

   
    input:checked + .fab-btn span {
      transform: scale(.85,.85);
    }

    input:checked ~ .card-content {
      opacity: 1;
    }



</style>
<div class="row">
            <div class="col-lg-3 col-md-3 col-12 p-3 ps-4" style="min-height:100vh;max-height:100vh;background:#fff!important;display:block;overflow-y:scroll;">
                <h5>MASUKKAN KE ANTRIAN : </h5>
                <div class="row">
                    <div class="col-md-12">
                        <label for="tipekartu" class="form-label">1. Tipe Kartu</label>
                        <select class="form-control" id="tipekartu" style="font-size:12px;">
                            <option value="">Pilih salah satu tipe...</option>
                            <option value="siswa" >SISWA / SANTRI</option>
                            <!-- <option value="siswatafaqquh" >SISWA / SANTRI TAFAQQUH</option>
                            <option value="generaltafaqquh" >GENERAL TAFAQQUH</option> -->
                            <option value="general">GENERAL / UMUM</option>
                        </select>
                    </div>

                    <div class="col-md-12 mt-3">
                        <label for="tipekartu" class="form-label">2. Daftar Pengguna</label>
                        <div class="row">

                        <div class="col-12 mb-3">
                                <input style="font-size:12px;" type="text" class="form-control caridata" oninput="setVales(this.value);" placeholder="Cari berdasarkan nama..."/>
                                <span style="font-size:11px; color:#a2a2a2" class="inform"></span>
                            </div>
                            <div class="col-12 table-responsive">
                                <table class="table table-striped table-borderless" id="taaable">
                                    <tbody class="putcontenthere"></tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-3 col-md-3 col-12 p-3 ps-4" style="min-height:100vh;max-height:100vh;background:#fff!important;display:block;overflow-y:scroll;">
                <div class="mb-4" style="position:relative; display:flex!important; bottom:0;width:auto;display:block;align-items:center;justify-content:center; text-align:center;">
                    <button type="button" class="btn btn-lg btn-success disabled" id="btnRenderNow" onclick="renderNow();" style="border:none;border-radius:4px;width:100%;">GO RENDER NOW</button>
                </div>
                <h5>DAFTAR ANTRIAN RENDER</h5>
                <i><small class="text-muted statTemp" ></small></i>
                    <div class="row">                        
                        <div class="col-md-12 mt-3">
                            <div class="row">

                                <div class="col-12 mb-3">
                                    <input style="font-size:12px;" type="text" class="form-control caridata" oninput="setVales2(this.value);" placeholder="Cari berdasarkan nama..."/>
                                    <span style="font-size:11px; color:#a2a2a2" class="inform2"></span>
                                </div>
                                <div class="col-12 table-responsive">
                                    <table class="table table-striped table-borderless" id="taaable2">
                                        <tbody class="putcontenthere2"></tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12 finalRenderHere" id="finalRenderHere" style="min-height:100vh;max-height:100vh;background:#fff!important;display:block;overflow-y:scroll;">
        
            </div>
        </div>

        <script type="text/javascript">
            

            let arr = [];
            let renderSide = [];

            let modeset = '';
            
            $(document).ready(function () {
                $('.page-footer').attr('style','display:none!important;');    

                var x = localStorage.getItem("jenisKartu");
                if(x==""){
                    localStorage.setItem("jenisKartu", "");
                    $('.putcontenthere').html(`
                        <div class="col-12 text-center text-muted"><small>Pilih tipe kartu dahulu.</small</div>
                    `);
                }else {
                    $('#tipekartu').val(x);
                    if(x=='siswa'){
                        callDataSiswa();
                    }else if(x=='siswatafaqquh'){
                        userNameX = 'tafaqquh';
                        callDataTafaqquh();
                    }else if(x=='generaltafaqquh'){
                        userNameX = 'tafaqquh';
                        callDataTafaqquhGeneral();
                    }else if(x=='general'){
                        callDataGeneral();
                    }else {
                        $('.putcontenthere').html(`
                            <div class="col-12 text-center text-muted"><small>Pilih tipe kartu dahulu.</small</div>
                        `);
                    }    
                }

                var y = localStorage.getItem("renderDataKartu");
                if(y){
                    $('.statTemp').html('Data terakhir yang sempat direkam oleh sistem. Hanya bersifat temporer! Ingin dibersihkan segera? Klik link berikut ini. <a href="#/" onclick="clearRenderSide();">Bersihkan Sekarang.</a>');
                    renderSide = JSON.parse(y);
                    setToRenderNow();
                }else {
                    $('.statTemp').html('');
                }
                
            });

            $("#tipekartu").bind("change", function() {
                let val = $('#tipekartu').val();
                localStorage.setItem("jenisKartu", val);
                console.log(val);

                if(val=='siswa'){
                    callDataSiswa();
                }else if(val=='siswatafaqquh'){
                    userNameX = 'tafaqquh';
                    callDataTafaqquh();
                }else if(val=='generaltafaqquh'){
                    userNameX = 'tafaqquh';
                    callDataTafaqquhGeneral();
                }else if(val=='general'){
                    callDataGeneral();
                }else {
                    $('.putcontenthere').html(`
                        <div class="col-12 text-center text-muted"><small>Pilih tipe kartu dahulu.</small</div>
                    `);
                }    
            });

            function callDataSiswa(){
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

                        let htmlx = '';


                            posts2.data.data.map((mapping,i)=>{

                                let textNamaA = mapping.nama_lengkap;
                                let textNama = textNamaA.split("-M");

                                textNamaA = textNamaA.split("'").join("");

                                if(textNama[1]=='A'){
                                    textTingkat = 'SMA';
                                }
                                else if(textNama[1]=='TS'){
                                    textTingkat = 'Madrasah Tsanawiyah';
                                }

                                let sttsgambar = true;

                                if(mapping.user.foto=='default.jpg'|| mapping.user.foto=="null"){
                                    sttsgambar = false;
                                }

                                let namaNya = textNama[0].replace("'", ":::");


                                htmlx +=`
                                    
                                <tr class="mpr${mapping.user.id}" style="cursor:pointer;" onclick="putToQueueSide(${mapping.user.id},'${namaNya}','${mapping.nis}','${mapping.tempat_lahir}','${mapping.tanggal_lahir}','${textTingkat}','${mapping.user.foto}','${mapping.nama_orangtua}');$(this).css('opacity','0.4');">
                                            <td width="50">
                                                <img src="<?=base_url();?>app/assets/users/foto/${mapping.user.foto}" style="width:16px; height:27px; border-radius:2px; position:relative;object-fit:cover; object-position:center;"/>
                                            </td>
                                            <td width="300" class="${(sttsgambar==false)?'text-danger':''}">
                                                <p style="font-size:13px;padding:0px; margin:0px;">${textNama[0]}</p>
                                                <p style="font-size:10px;padding:0px; margin:0px;">${textTingkat} ${(sttsgambar==false)?'//foto tidak ada.':''}</p>
                                            </td>
                                        </tr>

                                `;

                            });

                            $('.putcontenthere').html(htmlx);

					}
				}
				save2();
			}
            
            
            function callDataTafaqquh(){
				let num = 0;
				let tableColumn = '';

                
				const save2 = async () => {
					const posts2 = await axios.get('<?=base_url();?>ManifestasiKartu/datatafaqquh/'+userNameX, {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {
						console.log(err.response);
					});
			
					if (posts2.status == 200) {

                        let htmlx = '';


                            posts2.data.data.map((mapping,i)=>{

                                let textNamaA = mapping.nama_lengkap;
                                let textTingkat = mapping.tingkatan;
                                
                                let foto = "00"+mapping.foto;

                                let sttsgambar = true;

                                if(mapping.foto=='default.jpg'|| mapping.foto=="null"){
                                    sttsgambar = false;
                                }

                                let namaNya = textNamaA.replace("'", ":::");


                                htmlx +=`
                                    
                                <tr class="mpr${mapping.id}" style="cursor:pointer;" onclick="putToQueueSide(${mapping.id},'${namaNya}','${mapping.nis}','${mapping.tempat_lahir}','${mapping.tanggal_lahir}','${textTingkat}','${foto}','');$(this).css('opacity','0.4');">
                                            <td width="50">
                                                <img src="<?=base_url();?>app/assets/users/foto/${foto}" style="width:16px; height:27px; border-radius:2px; position:relative;object-fit:cover; object-position:center;"/>
                                            </td>
                                            <td width="300" class="${(sttsgambar==false)?'text-danger':''}">
                                                <p style="font-size:13px;padding:0px; margin:0px;">${textNamaA}</p>
                                                <p style="font-size:10px;padding:0px; margin:0px;">${textTingkat} ${(sttsgambar==false)?'//foto tidak ada.':''}</p>
                                            </td>
                                        </tr>

                                `;

                            });

                            $('.putcontenthere').html(htmlx);

					}
				}
				save2();
			}
            
            function callDataTafaqquhGeneral(){
				let num = 0;
				let tableColumn = '';

                
				const save2 = async () => {
					const posts2 = await axios.get('<?=base_url();?>ManifestasiKartu/datatafaqquhgeneral/'+userNameX, {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {
						console.log(err.response);
					});
			
					if (posts2.status == 200) {

                        let htmlx = '';


                            posts2.data.data.map((mapping,i)=>{

                                let textNamaA = mapping.nama_lengkap;
                                let textTingkat = mapping.tingkatan;

                                let sttsgambar = true;

                                if(mapping.foto=='default.jpg'|| mapping.foto=="null"){
                                    sttsgambar = false;
                                }

                                let namaNya = textNamaA.replace("'", ":::");


                                htmlx +=`
                                    
                                <tr class="mpr${mapping.id}" style="cursor:pointer;" onclick="putToQueueSide(${mapping.id},'${namaNya}','${mapping.nis}','${mapping.tempat_lahir}','${mapping.tanggal_lahir}','${textTingkat}','${mapping.foto}','');$(this).css('opacity','0.4');">
                                            <td width="50">
                                                <img src="<?=base_url();?>app/assets/users/foto/${mapping.foto}" style="width:16px; height:27px; border-radius:2px; position:relative;object-fit:cover; object-position:center;"/>
                                            </td>
                                            <td width="300" class="${(sttsgambar==false)?'text-danger':''}">
                                                <p style="font-size:13px;padding:0px; margin:0px;">${textNamaA}</p>
                                                <p style="font-size:10px;padding:0px; margin:0px;">${textTingkat} ${(sttsgambar==false)?'//foto tidak ada.':''}</p>
                                            </td>
                                        </tr>

                                `;

                            });

                            $('.putcontenthere').html(htmlx);

					}
				}
				save2();
			}
            
            
            function callDataGeneral(){
				let num = 0;
				let tableColumn = '';

                
				const save2 = async () => {
					const posts2 = await axios.get('<?= api_url(); ?>api/v1/general/get-inpaging', {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {
						console.log(err.response);
					});
			
					if (posts2.status == 200) {

                        let htmlx = '';

                            posts2.data.data.map((mapping,i)=>{

                                let textNamaA = mapping.nama_lengkap;

                                console.log(mapping.alamat_lengkap);

                                let textTingkat = mapping.jabatan;
                                let textAlamat = mapping.alamat_lengkap;


                                textNamaA = textNamaA.split('\'').join("");

                                let sttsgambar = true;

                                if(mapping.user.foto=='default.jpg'|| mapping.user.foto=="null"){
                                    sttsgambar = false;
                                }

                                let namaNya = textNamaA.replace("'", ":::");
                                let alamatNya = "";
                                if(textAlamat!=null){
                                    alamatNya = textAlamat.replace("'", ":::");
                                }
                                let tingkatNya = textTingkat.replace("'", ":::");

                                // namaNya = convertToUpperCaseBeforeComma(namaNya);
                                


                                htmlx +=`
                                    
                                        <tr class="mpr${mapping.user.id}" style="cursor:pointer;" onclick="putToQueueSide(${mapping.user.id},'${namaNya}','','${alamatNya}','${mapping.tanggal_lahir}','${tingkatNya}','${mapping.user.foto}','${mapping.user.email}');$(this).css('opacity','0.4');">
                                            <td width="50">
                                                <img src="<?=base_url();?>app/assets/users/foto/${mapping.user.foto}" style="width:16px; height:27px; border-radius:2px; position:relative;object-fit:cover; object-position:center;"/>
                                            </td>
                                            <td width="300" class="${(sttsgambar==false)?'text-danger':''}">
                                                <p style="font-size:13px;padding:0px; margin:0px;">${namaNya}</p>
                                                <p style="font-size:10px;padding:0px; margin:0px;">${textTingkat} ${(sttsgambar==false)?'//foto tidak ada.':''}</p>
                                            </td>
                                        </tr>

                                `;

                            });

                            $('.putcontenthere').html(htmlx);

					}
				}
				save2();
			}
            
            function setVales(str){
                
                console.log(str);
                let l = '';

                let value = str.toLowerCase();
                $("#taaable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
               

                $('.inform').html('Hasil pencarian : '+$("#taaable tr:visible").length+' data.');

            };
            
            function setVales2(str){
                
                console.log(str);

                let value = str.toLowerCase();
                $("#taaable2 tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });

                $('.inform2').html('Hasil pencarian : '+$("#taaable2 tr:visible").length+' data.');
            };

            function putToQueueSide(id,nama,kode,alamat,tgllahir,keterangan,foto,nama_orangtua){

                if(foto=='default.jpg' || foto=='null'){
                    Toastify({
                        text: 'Belum ada foto! Tidak dapat ditambah ke antrian!',
                        duration: 3000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        className: "errorMessage",

                    }).showToast();
                    return false;
                }
                if(renderSide.find(item => item.id === id)){
                    Toastify({
                        text: 'Item ini sudah masuk ke antrian rendering...',
                        duration: 3000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        className: "infoMessage",

                    }).showToast();
                    return false;
                }

                nama = nama.replace(":::", "'");
                alamat = alamat.replace(":::", "'");
                keterangan = keterangan.replace(":::", "'");

                renderSide.push({
                    'nama' : nama,
                    'id' : id,
                    'kode' : kode,
                    'alamat' : alamat,
                    'tgllahir' : moment(tgllahir).format('YYYY-MM-DD'),
                    'keterangan' : keterangan,
                    'foto' : foto,
                    'nama_orangtua' : nama_orangtua,
                });

                setToRenderNow();
            }

            function setToRenderNow(){
                if(renderSide.length>0){
                    $('#btnRenderNow').removeClass('disabled');
                    $('#btnRenderNow').addClass('animbutton');
                }else {
                    $('#btnRenderNow').addClass('disabled');
                    $('#btnRenderNow').removeClass('animbutton');
                }

                let htmlx = '';

                for(let i = 0 ; i < renderSide.length; i++){
                    htmlx +=`
                            
                            <tr>
                                <td>
                                    <img src="<?=base_url();?>app/assets/users/foto/${renderSide[i].foto}" style="width:16px; height:27px; border-radius:2px; position:relative;object-fit:cover; object-position:center;"/>
                                </td>
                                <td>
                                    <p style="font-size:13px;padding:0px; margin:0px;">${renderSide[i].nama}</p>
                                    <p style="font-size:10px;padding:0px; margin:0px;">${renderSide[i].keterangan}</p>
                                    <font onclick="removeFromQueu(${renderSide[i].id});" style="cursor:pointer;float:right; margin-top:-30px; padding:4px; font-size:15px;text-align:center;padding-top:10px; padding-bottom:10px;justify-content:center; align-items:center; line-height:0;border-radius:3px; background:red; color:#fff;font-weight:bold;" class="bg-danger"><i class='bx bxs-arrow-to-left'></i></font>
                                </td>
                            </tr>

                    `;
                }

                $('.putcontenthere2').html(htmlx);
            }

            function removeFromQueu(str){
                $('.mpr'+str).css('opacity','1');
                renderSide = renderSide.filter((item) => item.id !== str);
                setToRenderNow();
            }

            function renderNow(){
                let mmm = JSON.stringify(renderSide);
                localStorage.setItem("renderDataKartu", mmm);
                
                getnow();
            }
            function getnow(){

                console.log("usernameXXXX", userNameX);
                var x = '';
                
                x = localStorage.getItem("renderDataKartu");
                
                
                let datam = JSON.parse(x);

                let tableColumn = '';

                console.log(datam);
                
                datam.map((mapping,i)=>{

                    let inisiateNama = mapping.nama;
                    inisiateNama = inisiateNama.toLowerCase();
                    
                        let namalengkap = mapping.nama;
                        // namalengkap = namalengkap.toLowerCase();
                        
                        let textTingkat = '';
                        let textNamaA = namalengkap;
                        let textNama = textNamaA.split("-m");
                        
                        let alamat = mapping?.alamat;
                        alamat = alamat?.toLowerCase();

                        let putKartuImage = '';

                       

                        let keteranganText= mapping.keterangan;
                        if(keteranganText=='Lainnya'){
                            keteranganText = 'Karyawan';
                        }

                        console.log(putKartuImage);

                        putKartuImage = '<?=base_url();?>assets_oncard/images/posposa.webp';
                        
                        tableColumn +=`
                            <div class="row" style="page-break-before: always; /* Force each div to start on a new page */
    width: 100%; /* Ensure div takes the whole page */
    height: 100vh; /* Full height of the page */">
                                <div class="col-lg-3 col-12">
                                </div>
                                <div class="col-lg-10 col-12">
                                    <div style="width:600px!important; height:400.02px!important; margin-bottom:50px; margin-right:50px; background:url(${putKartuImage});background-size:contain;background-position:center;background-repeat:no-repeat;">
                                        <div style="width: 470px; padding-top:100px;
margin-left: 242px;
padding-top: 221px;
color: black;
font-weight: bold;
font-size: 16px; text-align:left;">
                                            <p style="margin:0px!important;text-transform:uppercase;font-size:20px; color:#000; line-height:1em;">${textNama[0]}</p>
                                            <p style="margin:0px!important;text-transform:uppercase;font-size:20px; color:#000; margin-top:3px!important;">SA-0001</p>
                                            <p style="margin:0px!important;text-transform:uppercase;font-size:20px; color:#000; margin-top:-4px!important;">KORDES</p>
                                            <p style="margin:0px!important;text-transform:uppercase;font-size:20px; color:#000; margin-top:-4px!important;">KUANSING</p>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-12">
                                </div>
                            </div>
                                
                            `;
                    });

                    tableColumn += `
                    
                    <label for="inputCheck" class="fab-btn animbutton" onClick="printdiv('finalRenderHere');">
                        <span><i class="bx bx-printer"></i></span>
                    </label>

                    `;

                $('.finalRenderHere').html(tableColumn);
            }

            function printdiv(printpage) {
                let las = localStorage.getItem("renderDataKartu");

            localStorage.setItem("printFinal", las);

            var headstr = "<html><head><title></title><style>.col-lg-3 {display:none;} .animbutton{display:none!important;}</style></head><body style='background:#fff!important; background-color:#fff!important;'>";
            var footstr = "</body>";
            var newstr = document.all.item(printpage).innerHTML;
            var oldstr = document.body.innerHTML;
            document.body.innerHTML = headstr + newstr + footstr;
            window.print();
            document.body.innerHTML = oldstr;
            return false;
            }

            function clearRenderSide(){
                localStorage.removeItem("renderDataKartu");

                Toastify({
                    text: 'Data sudah dibersihkan! ',
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    className: "errorMessage",

                }).showToast();

                setToRenderNow();

                window.location.reload();

                return false;
            }

            function convertToUpperCaseBeforeComma(inputString) {
                // Split the string at the first comma
                const [substringBeforeComma, restOfString] = inputString.split(',');

                // Check if a comma is present
                if (restOfString !== undefined) {
                    // Convert the substring before the comma to uppercase
                    const modifiedString = substringBeforeComma.toUpperCase() + ',' + restOfString;

                    return modifiedString;
                }

                // If no comma is found, return the original string
                return inputString.toUpperCase();
            }
        </script>