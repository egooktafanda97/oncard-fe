<link rel="icon" href="<?=base_url();?>assets/png/logo_pgri.png" type="image/png" />
<title>Generate Kartu PGRI</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    @import url('https://fonts.googleapis.com/css2?family=Chivo+Mono:wght@500&display=swap');
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
                            <option value="siswa" >KARTU ANGGOTA</option>
                        </select>
                    </div>

                    <div class="col-md-12 mt-3">
                        <label for="tipekartu" class="form-label">2. Daftar Pengguna</label>
                        <div class="row">

                            <div class="col-12 mb-3">
                                <input style="font-size:12px;" type="text" class="form-control caridata" oninput="setVales(this.value);" placeholder="Cari berdasarkan nama..."/>
                                <span style="font-size:11px; color:#a2a2a2" class="inform"></span>
                            </div>

                            <div class="col-12 mb-3">
                                <button type="button" onclick="selectAllItems();" class="btn btn-block btn-sm btn-success">Pilih semua item</button>
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

        <!-- Bootstrap JS -->
        <script src="<?=base_url();?>assets_oncard/js/bootstrap.bundle.min.js"></script>
        <!--plugins-->
        <script src="<?=base_url();?>assets_oncard/plugins/simplebar/js/simplebar.min.js"></script>
        <script src="<?=base_url();?>assets_oncard/plugins/metismenu/js/metisMenu.min.js"></script>
        <script src="<?=base_url();?>assets_oncard/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
        <script src="<?=base_url();?>assets_oncard/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
        <script src="<?=base_url();?>assets_oncard/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
        <script src="<?=base_url();?>assets_oncard/plugins/chartjs/js/Chart.min.js"></script>
        <script src="<?=base_url();?>assets_oncard/plugins/chartjs/js/Chart.extension.js"></script>
        <script src="<?=base_url();?>assets_oncard/plugins/select2/js/select2.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <script src="https://npmcdn.com/flatpickr/dist/flatpickr.min.js"></script>
        <script src="https://npmcdn.com/flatpickr/dist/l10n/id.js"></script>
        <script src="<?=base_url();?>assets_oncard/plugins/bootstrap-material-datetimepicker/js/moment.min.js"></script>
        <script src="<?=base_url();?>assets_oncard/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.min.js"></script>
        <script src="<?=base_url();?>assets_oncard/js/index.js"></script>
        <!--app JS-->
        <script src="<?=base_url();?>assets_oncard/js/app.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@linways/table-to-excel@1.0.4/dist/tableToExcel.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://momentjs.com/downloads/moment.js"></script>
        <script src="https://momentjs.com/downloads/moment-with-locales.js"></script>
        <script type="text/javascript">moment.locale('id');</script>

        

        <script type="text/javascript">
            

            let arr = [];
            let renderSide = [];

            
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
                        callData();
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
                    callData();
                }else {
                    $('.putcontenthere').html(`
                        <div class="col-12 text-center text-muted"><small>Pilih tipe kartu dahulu.</small</div>
                    `);
                }    
            });

            function callData(){
				let num = 0;
				let tableColumn = '';

                
				const save2 = async () => {
					const posts2 = await axios.get('<?= base_url(); ?>PGRI/get_data_kta').catch((err) => {
						console.log(err.response);
					});
			
					if (posts2.status == 200) {

                        let htmlx = '';


                            posts2.data.data.map((mapping,i)=>{

                                let textNamaA = mapping.nama;
                                
                                let sttsgambar = true;

                                if(mapping.url_foto=='default.jpg'|| mapping.url_foto=="null"){
                                    sttsgambar = false;
                                }

                                let namaNya = textNamaA.replace("'", ":::");

                                let fotooo = mapping.url_foto;
                                let fotoooArray = fotooo.split(" ");
                                fotooo = "Screenshot ("+fotoooArray[1]+").png";


                                htmlx +=`
                                    
                                <tr class="mpr${mapping.id}" style="cursor:pointer;" onclick="putToQueueSide(${mapping.id},'${namaNya}','${mapping.npa}','${mapping.agama}','${mapping.url_foto}','${mapping.url_qrcode}');$(this).css('opacity','0.4');">
                                            <td width="50">
                                                <img src="<?=base_url();?>assets_oncard/images/pgri/${fotooo}" style="width:16px; height:27px; border-radius:2px; position:relative;object-fit:cover; object-position:center;"/>
                                            </td>
                                            <td width="300" class="${(sttsgambar==false)?'text-danger':''}">
                                                <p style="font-size:13px;padding:0px; margin:0px;">${textNamaA}</p>
                                                <p style="font-size:10px;padding:0px; margin:0px;">${mapping.npa} ${(sttsgambar==false)?'//foto tidak ada.':''}</p>
                                            </td>
                                        </tr>

                                `;

                            });

                            $('.putcontenthere').html(htmlx);

					}
				}
				save2();
			}
            
            
            function selectAllItems(){
				let num = 0;
				let tableColumn = '';

                
				const save2 = async () => {
					const posts2 = await axios.get('<?= base_url(); ?>PGRI/get_data').catch((err) => {
						console.log(err.response);
					});
			
					if (posts2.status == 200) {

                        let htmlx = '';

                            posts2.data.data.map((mapping,i)=>{

                                let textNamaA = mapping.nama;
                                
                                let sttsgambar = true;

                                if(mapping.url_foto=='default.jpg'|| mapping.url_foto=="null"){
                                    sttsgambar = false;
                                }

                                let namaNya = textNamaA.replace("'", ":::");

                                let fotooo = mapping.url_foto;
                                let fotoooArray = fotooo.split(" ");
                                fotooo = "Screenshot ("+fotoooArray[1]+").png";

                                renderSide.push({
                                    'nama' : namaNya,
                                    'id' : mapping.id,
                                    'npa' : mapping.npa,
                                    'agama' : mapping.agama,
                                    'foto' : mapping.url_foto,
                                    'url_qrcode' : mapping.url_qrcode
                                });

                                setToRenderNow();


                            });

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

            function putToQueueSide(id,nama,npa,agama,foto,url_qrcode){

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

                renderSide.push({
                    'nama' : nama,
                    'id' : id,
                    'npa' : npa,
                    'agama' : agama,
                    'foto' : foto,
                    'url_qrcode' : url_qrcode
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

                    let fotooo = renderSide[i].foto;
                    let fotoooArray = fotooo.split(" ");
                    fotooo = "Screenshot ("+fotoooArray[1]+").png";
                    
                    htmlx +=`
                            
                            <tr>
                                <td>
                                    <img src="<?=base_url();?>assets_oncard/images/pgri/${fotooo}" style="width:16px; height:27px; border-radius:2px; position:relative;object-fit:cover; object-position:center;"/>
                                </td>
                                <td>
                                    <p style="font-size:13px;padding:0px; margin:0px;">${renderSide[i].nama}</p>
                                    <p style="font-size:10px;padding:0px; margin:0px;">${renderSide[i].npa} | ${renderSide[i].agama} </p>
                                    <font onclick="removeFromQueu(${renderSide[i].id});" style="cursor:pointer;float:right; margin-top:-30px; padding:4px; font-size:15px;text-align:center;padding-top:4px; padding-bottom:4px;justify-content:center; align-items:center; line-height:0;border-radius:3px; background:red; color:#fff;font-weight:bold;" class="bg-danger"><i class="fa-regular fa-circle-left"></i></font>
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
                            <p style="margin:0px!important;text-transform:uppercase;font-size:20px; color:#000; margin-top:3px!important;">${mapping.npa}</p>
                            <p style="margin:0px!important;text-transform:uppercase;font-size:20px; color:#000; margin-top:-4px!important;">${mapping.agama}</p>
                            <p style="margin:0px!important;text-transform:uppercase;font-size:20px; color:#000; margin-top:-3px!important;">${mapping.foto}</p>
                            
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

            var headstr = "<html><head><title></title><style>.col-lg-3 {display:none;} .animbutton{display:none!important;}@media print{body{margin:0}.print-div{position:relative;height:100vh;width:100%;background-color:#fff;padding:10px;border-bottom:1px solid #ccc}}</style></head><body style='background:#fff!important; background-color:#fff!important;'>";
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
        </script>