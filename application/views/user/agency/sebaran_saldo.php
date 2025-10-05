    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Sebaran Saldo</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Detail Sebaran Saldo</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            
            <div class="row">
                <div class="col-lg-7 col-md-7 col-12" style="margin:auto!important; z-index:4;">
                    <div class="card bg-gradient-blooker ">
                        <div class="card-body text-center text-dark">
                            Saldo Akun
                            <h1 class="text-dark box4val">0</h1>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 pt-5" style="margin-top:-100px;z-index:3;">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 pt-4">
                                    
                                </div>
                                <div class="col-lg-3 col-md-6 col-12">
                                <div class="h5 text-center">Sebaran Saldo</div>
                                    <div class="card">
                                        <div class="card-body">
                                        <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">Siswa <span class="badge bg-gradient-quepal saldoSiswa rounded-pill">Rp0</span></li>
                                        </div>
                                    </div>
                                
                                    <div class="card">
                                        <div class="card-body">
                                        <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">General <span class="badge bg-gradient-quepal saldoGeneral rounded-pill">Rp0</span>
									</li>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-body">
                                        <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">Merchant <span class="badge bg-gradient-ibiza saldoKantin rounded-pill">Rp0</span></li>
                                        <small class="text-muted" style="display:block; margin-top:15px; margin-bottom:15px;">Detail</small>
                                        <div class="putListKantinSaldoHere">
								        </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-body">
                                        <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">Income Sekolah <span class="badge bg-gradient-deepblue saldoInstansi rounded-pill">Rp0</span></li>
                                        <hr style="border:1px solid rgba(0,0,0,0.15);"/>
                                        <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">Income Oncard <span class="badge bg-gradient-bloody saldoOwner rounded-pill">Rp0</span>
									</li>
                                        </div>
                                    </div>
                                

                                </div>

                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="h5 text-center">Top Up</div>
                                    <div class="card">
                                        <div class="card-body">
                                            <label for="dateSelector">Waktu</label>
                                            <select id="dateSelector" class="form-control" onchange="handleDateSelection()" style="font-size:11px!important;width:100px;">
                                                <option value="today">Hari Ini</option>
                                                <option value="yesterday">Kemarin</option>
                                                <option value="lastWeek">Minggu Ini</option>
                                                <option value="thisMonth">Bulan Ini</option>
                                            </select>
                                            <hr style="border:1px solid rgba(0,0,0,0.15);"/>

                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-12 p-3" style="border:1px solid rgba(0,0,0,0.04);border-radius:3px;">
                                                    <div class="h6 text-center">Siswa</div>
                                                    <div class="putListTopUpMethodHereSiswa">
                                                    </div> 
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-12 p-3" style="border:1px solid rgba(0,0,0,0.04);border-radius:3px;">
                                                    <div class="h6 text-center">General</div>
                                                    <div class="putListTopUpMethodHereGeneral">
                                                    </div> 
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>

                                    <div class="h5 text-center">Top Up Payment Gateway</div>
                                    <div class="card">
                                        <div class="card-body">
                                            
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-12 p-3" style="border:1px solid rgba(0,0,0,0.04);border-radius:3px;">
                                                    <div class="putListPaymentGateway">
                                                    </div> 
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-6 col-12">
                                    <div class="h5 text-center">Pencairan</div>
                                    <div class="card">
                                        <div class="card-body">
                                            <label for="dateSelector2">Waktu</label>
                                            <select id="dateSelector2" class="form-control" onchange="handleDateSelection2()" style="font-size:11px!important;width:100px;">
                                                <option value="today">Hari Ini</option>
                                                <option value="yesterday">Kemarin</option>
                                                <option value="lastWeek">Minggu Ini</option>
                                                <option value="thisMonth">Bulan Ini</option>
                                            </select>
                                            <hr style="border:1px solid rgba(0,0,0,0.15);"/>

                                            
                                            <div class="putListWithdrawal">
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            

        </div>
    </div>
    
<script type="text/javascript">

let invoiceDataArray = [];
let NewInvoiceDataArray = [];
let NewInvoiceDataArrayForGraph2 = [];
let NewDataArrayForGraph5 = [];
let arrSebaranSaldo = [];
let arrUltah = [];
let beaAdmin = 0;
let graphtot = 0;
let saldoOwner = 0;
let saldTot = 0;
let saldoKantinTotal = 0;
let saldoAll = 0;

let formattedDate;
let formattedDateNow;

let endPointGetDataSiswa;
let endPointGetDataWithdrawal;


$(document).ready(function () {
    getSaldoOwner();

    let todayDate = moment(new Date()).format('YYYY-MM-DD');

    endPointGetDataSiswa = '<?= api_url(); ?>api/v1/rep/jurnal?date_from='+todayDate+'&date_to='+todayDate;
    endPointGetDataWithdrawal = '<?= api_url(); ?>api/v1/rep/history?type=withdrawal&date_from='+todayDate+'&date_to='+todayDate;
    
    showData();
    showDataWithdrawal();

    showIpaymuBalance();
    
    
});


function getSaldoOwner(){
    let num = 0;
    let tableColumn = '';

    tableColumn += `<tr><td colspan="7" class="text-center">Loading....</td></tr>`;
    $('.putContentHere').html(tableColumn);
    
    const save2 = async () => {
        const posts2 = await axios.get('<?= api_url(); ?>api/v1/account/get/owner', {
            headers: {
                'Authorization': 'Bearer ' + localStorage.getItem('_token')
            }
        }).catch((err) => {
            console.log(err.response);
        });

        if (posts2.status == 200) {
            saldoOwner= posts2.data.data.data[0].balance;
            saldoAll=parseInt(saldoOwner);
            getSiswa();

            $('.saldoOwner').html("Rp"+formatRupiah(saldoOwner.toString()));

        }
    }
    save2();
}




function showData(){
    let num = 0;
    let tableColumn = '';
    let tableColumn2 = '';
    tableColumn += `<tr><td colspan="8" class="text-center">Loading...</td></tr>`;
    tableColumn2 += `<tr><td colspan="8" class="text-center">Loading...</td></tr>`;
    $('.putListTopUpMethodHereSiswa').html(tableColumn);
    $('.putListTopUpMethodHereGeneral').html(tableColumn2);
    
    const save2 = async () => {
        const posts2 = await axios.get( endPointGetDataSiswa , {
            headers: {
                'Authorization': 'Bearer ' + localStorage.getItem('_token'),
                'paginate' : true
            }
        }).catch((err) => {
            console.log(err.response);
        });

        if (posts2.status == 200) {
                num += 1;
                tableColumn = '';
                if(posts2.data.data.length==0){
                    tableColumn +=`<tr><td colspan="8" class="text-center">Tidak ada data.</td></tr>`;
                    $('.putListTopUpMethodHereSiswa').html(tableColumn);
                    $('.putListTopUpMethodHereGeneral').html(tableColumn);
                    return false;
                }

                let totaltopupbrks = 0;
                let totaltopupkehost = 0;
                let totaltopuptfortu = 0;
                let nominaltopupkehost = 0;
                let nominaltopupbrks = 0;
                let nominaltopuptfortu = 0;

                let totalall= 0;
                let nominalall =0;
                let nominalallgeneral =0;
                let totalallgeneral =0;
                
                
                let totaltopupbrks2 = 0;
                let totaltopupkehost2 = 0;
                let totaltopuptfortu2 = 0;
                let nominaltopupkehost2 = 0;
                let nominaltopupbrks2 = 0;
                let nominaltopuptfortu2 = 0;

                let mmmxx = [];
                let mmmyy = [];

                let mxy = 0;


                console.log(posts2.data.data);
                posts2.data.data.map((mapping,i)=>{
                    if(mapping.account.user.model=='Siswa'){
                        mmmxx.push({
                            'tipe' : mapping.management_type.name_type
                        })
                        if(mapping.management_type.name_type=='top_up'){

                            totalall++;
                            nominalall+=parseInt(mapping.credit_amount);
                            
                            if(mapping.description=='setor_tunai'){
                                totaltopupkehost++;
                                nominaltopupkehost += parseInt(mapping.credit_amount);
                            }else if(mapping.description=='transfer_ortu'){
                                totaltopuptfortu++;
                                nominaltopuptfortu += parseInt(mapping.credit_amount);
                            }else {
                                // mxy++;
                                // mmmyy.push({'data':mapping});
                                // console.log(mxy, mapping.description,mmmyy);

                                if (mapping.invoice && mapping.invoice.includes('IPAYMU')) {
                                    totaltopuptfortu++;
                                    nominaltopuptfortu += parseInt(mapping.credit_amount);
                                }


                            }
                        }
                        if(mapping.management_type.name_type=='topup_via_vendor'){

                            totalall++;
                            nominalall+=parseInt(mapping.credit_amount);

                            totaltopupbrks++;
                            nominaltopupbrks += parseInt(mapping.credit_amount);
                        }
                    }

                    if(mapping.account.user.model=='General'){
                        if(mapping.management_type.name_type=='top_up'){

                            totalallgeneral++;
                            nominalallgeneral+=parseInt(mapping.credit_amount);
                            
                            if(mapping.description=='setor_tunai'){
                                totaltopupkehost2++;
                                nominaltopupkehost2 += parseInt(mapping.credit_amount);
                            }else if(mapping.description=='transfer_ortu'){
                                totaltopuptfortu2++;
                                nominaltopuptfortu2 += parseInt(mapping.credit_amount);
                            }
                        }
                        if(mapping.management_type.name_type=='topup_via_vendor'){

                            totalallgeneral++;
                            nominalallgeneral+=parseInt(mapping.credit_amount);

                            totaltopupbrks2++;
                            nominaltopupbrks2 += parseInt(mapping.credit_amount);
                        }
                    }
                    
                });

                const distinctTipeFile = [...new Set(mmmxx.map(item => item.tipe))];
                console.log(distinctTipeFile);

                tableColumn += `
                    <p style="margin-bottom:0;font-size:11px;font-weight:bold;">SETOR KE HOST</p>
                    
                    <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center" style="font-size:11px;">
                    Jumlah Topup <span class="badge text-dark rounded-pill" style="font-size:12px;">${formatRupiah(totaltopupkehost.toString())}</span></li>
                    
                    <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center" style="font-size:11px;">
                    Nominal Topup <span class="badge text-dark rounded-pill" style="font-size:12px;">Rp${formatRupiah(nominaltopupkehost.toString())}</span></li>
                    
                    <hr style="border:1px solid rgba(0,0,0,0.15);"/>

                    <p style="margin-bottom:0;font-size:11px;font-weight:bold;">TRANSFER ANTAR BANK</p>
                    
                    <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center" style="font-size:11px;">
                    Jumlah Topup <span class="badge text-dark rounded-pill" style="font-size:12px;">${formatRupiah(totaltopuptfortu.toString())}</span></li>
                    
                    <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center" style="font-size:11px;">
                    Nominal Topup <span class="badge text-dark rounded-pill" style="font-size:12px;">Rp${formatRupiah(nominaltopuptfortu.toString())}</span></li>
                    
                    <hr style="border:1px solid rgba(0,0,0,0.15);"/>

                    <p style="margin-bottom:0;font-size:11px;font-weight:bold;">TRANSFER DARI BRKS</p>
                    
                    <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center" style="font-size:11px;">
                    Jumlah Topup <span class="badge text-dark rounded-pill" style="font-size:12px;">${formatRupiah(totaltopupbrks.toString())}</span></li>
                    
                    <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center" style="font-size:11px;">
                    Nominal Topup <span class="badge text-dark rounded-pill" style="font-size:12px;">Rp${formatRupiah(nominaltopupbrks.toString())}</span></li>

                    <hr style="border:1px solid rgba(0,0,0,0.15);"/>

                    <p class="text-danger" style="margin-bottom:0;font-size:11px;font-weight:bold;">TOTAL</p>
                    
                    <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center" style="font-size:11px;">
                    Jumlah Topup <span class="badge text-dark rounded-pill" style="font-size:12px;">${formatRupiah(totalall.toString())}</span></li>
                    
                    <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center" style="font-size:11px;">
                    Nominal Topup <span class="badge text-dark rounded-pill" style="font-size:12px;">Rp${formatRupiah(nominalall.toString())}</span></li>
                    
                `;
                
                
                tableColumn2 = `
                    <p style="margin-bottom:0;font-size:11px;font-weight:bold;">SETOR KE HOST</p>
                    
                    <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center" style="font-size:11px;">
                    Jumlah Topup <span class="badge text-dark rounded-pill" style="font-size:12px;">${formatRupiah(totaltopupkehost2.toString())}</span></li>
                    
                    <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center" style="font-size:11px;">
                    Nominal Topup <span class="badge text-dark rounded-pill" style="font-size:12px;">Rp${formatRupiah(nominaltopupkehost2.toString())}</span></li>
                    
                    <hr style="border:1px solid rgba(0,0,0,0.15);"/>

                    <p style="margin-bottom:0;font-size:11px;font-weight:bold;">TRANSFER ANTAR BANK</p>
                    
                    <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center" style="font-size:11px;">
                    Jumlah Topup <span class="badge text-dark rounded-pill" style="font-size:12px;">${formatRupiah(totaltopuptfortu2.toString())}</span></li>
                    
                    <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center" style="font-size:11px;">
                    Nominal Topup <span class="badge text-dark rounded-pill" style="font-size:12px;">Rp${formatRupiah(nominaltopuptfortu2.toString())}</span></li>
                    
                    <hr style="border:1px solid rgba(0,0,0,0.15);"/>

                    <p style="margin-bottom:0;font-size:11px;font-weight:bold;">TRANSFER DARI BRKS</p>
                    
                    <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center" style="font-size:11px;">
                    Jumlah Topup <span class="badge text-dark rounded-pill" style="font-size:12px;">${formatRupiah(totaltopupbrks2.toString())}</span></li>
                    
                    <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center" style="font-size:11px;">
                    Nominal Topup <span class="badge text-dark rounded-pill" style="font-size:12px;">Rp${formatRupiah(nominaltopupbrks2.toString())}</span></li>

                    <hr style="border:1px solid rgba(0,0,0,0.15);"/>

                    <p class="text-danger" style="margin-bottom:0;font-size:11px;font-weight:bold;">TOTAL</p>

                    <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center" style="font-size:11px;">
                    Jumlah Topup <span class="badge text-dark rounded-pill" style="font-size:12px;">${formatRupiah(totalallgeneral.toString())}</span></li>

                    <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center" style="font-size:11px;">
                    Nominal Topup <span class="badge text-dark rounded-pill" style="font-size:12px;">Rp${formatRupiah(nominalallgeneral.toString())}</span></li>


                `;
                
                // if(totaltopupkehost2==0 || totaltopuptfortu2==0){
                //     tableColumn2 ='<small>Tidak ada detail yang dapat dimunculkan.<br/><br/>Data sedang dipersiapkan.</small>';
                // }
            $('.putListTopUpMethodHereSiswa').html(tableColumn);
            $('.putListTopUpMethodHereGeneral').html(tableColumn2);
            
        }
    }
    save2();
}


function showDataWithdrawal(){
    let num = 0;
    let tableColumn = '';
    let tableColumn2 = '';
    tableColumn += `<tr><td colspan="8" class="text-center">Loading...</td></tr>`;
    $('.putListWithdrawal').html(tableColumn);
    
    const save2 = async () => {
        const posts2 = await axios.get( endPointGetDataWithdrawal , {
            headers: {
                'Authorization': 'Bearer ' + localStorage.getItem('_token'),
                'paginate' : true
            }
        }).catch((err) => {
            console.log(err.response);
        });

        if (posts2.status == 200) {
                num += 1;
                tableColumn = '';
                if(posts2.data.data.length==0){
                    tableColumn +=`<tr><td colspan="8" class="text-center">Tidak ada data.</td></tr>`;
                    $('.putListWithdrawal').html(tableColumn);
                    return false;
                }

                let totalwitdhrawalall =0;
                let nominalpencairan = 0;

                let totalwdagency = 0;
                let nominalwdagency = 0;
                
                let totalwdusers = 0;
                let nominalwdusers = 0;
                
                let totalwdmerchant = 0;
                let nominalwdmerchant = 0;


                console.log(posts2.data.data);
                posts2.data.data.map((mapping,i)=>{
                    if(mapping.account.user_id=<?=$this->session->userdata('_user_id');?> && mapping.status.status=='success'){
                        totalwitdhrawalall++;
                        nominalpencairan+= parseInt(mapping.transaction_amount);

                        if(mapping.account.account_level=='agency'){
                            totalwdagency++;
                            nominalwdagency+=parseInt(mapping.transaction_amount);
                        }
                        
                        if(mapping.account.account_level=='users'){
                            totalwdusers++;
                            nominalwdusers+=parseInt(mapping.transaction_amount);
                        }
                        
                        if(mapping.account.account_level=='seller'){
                            totalwdmerchant++;
                            nominalwdmerchant+=parseInt(mapping.transaction_amount);
                        }
                    }
                });

                tableColumn += `
                
                <p style="margin-bottom:0;font-size:11px;font-weight:bold;">PESANTREN</p>
                <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center" style="font-size:11px;">
                Jumlah Pencairan <span class="badge text-dark rounded-pill" style="font-size:12px;">${formatRupiah(totalwdagency.toString())}</span></li>
                <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center" style="font-size:11px;">
                Nominal Pencairan <span class="badge text-dark rounded-pill" style="font-size:12px;">Rp${formatRupiah(nominalwdagency.toString())}</span></li>

                <hr style="border:1px solid rgba(0,0,0,0.15);"/>

                <p style="margin-bottom:0;font-size:11px;font-weight:bold;">SANTRI & GENERAL</p>
                <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center" style="font-size:11px;">
                Jumlah Pencairan <span class="badge text-dark rounded-pill" style="font-size:12px;">${formatRupiah(totalwdusers.toString())}</span></li>
                <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center" style="font-size:11px;">
                Nominal Pencairan <span class="badge text-dark rounded-pill" style="font-size:12px;">Rp${formatRupiah(nominalwdusers.toString())}</span></li>
                
                <hr style="border:1px solid rgba(0,0,0,0.15);"/>

                <p style="margin-bottom:0;font-size:11px;font-weight:bold;">MERCHANT</p>
                <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center" style="font-size:11px;">
                Jumlah Pencairan <span class="badge text-dark rounded-pill" style="font-size:12px;">${formatRupiah(totalwdmerchant.toString())}</span></li>
                <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center" style="font-size:11px;">
                Nominal Pencairan <span class="badge text-dark rounded-pill" style="font-size:12px;">Rp${formatRupiah(nominalwdmerchant.toString())}</span></li>

                <hr style="border:1px solid rgba(0,0,0,0.15);"/>

                <p class="text-danger" style="margin-bottom:0;font-size:11px;font-weight:bold;">TOTAL</p>
                <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center" style="font-size:11px;">
                Jumlah Pencairan <span class="badge text-dark rounded-pill" style="font-size:12px;">${formatRupiah(totalwitdhrawalall.toString())}</span></li>
                <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center" style="font-size:11px;">
                Nominal Pencairan <span class="badge text-dark rounded-pill" style="font-size:12px;">Rp${formatRupiah(nominalpencairan.toString())}</span></li>

                `;
                
               
            $('.putListWithdrawal').html(tableColumn);
            
            
        }
    }
    save2();
}



function getSiswa(){

    arrSebaranSaldo = [];

    const save2 = async () => {
        const posts2 = await axios.get('<?= api_url(); ?>api/v1/siswa/get-inpaging', {
            headers: {
                'Authorization': 'Bearer ' + localStorage.getItem('_token')
            }
        }).catch((err) => {
            console.log(err.response);
        });

        if (posts2.status == 200) {
            let jmlData = 0;
            let jmlDataConnect = 0;
            let percentage = 0.0;
            let saldo = 0;
            let jmlUltah = 0;
            let htmlUltah = '';
            jmlData = posts2.data.data.length;
            
            posts2.data.data.map((mapping,i)=>{
                if(mapping.accounts.card_id){
                    jmlDataConnect++;
                }

                let tglUltahServer = moment(mapping.tanggal_lahir).format('MM-DD');
                let dateToday = moment(new Date()).format('MM-DD');

                if(tglUltahServer==dateToday){
                    jmlUltah++;

                    let defaultURLFoto = '<?=base_url();?>assets_oncard/images/icons/user.webp';

                    let textTingkat = '';
                    let textNamaA = mapping.nama_lengkap;
                    let textNama = textNamaA.split("-M");
                    if(textNama[1]==='A'){
                        textTingkat = 'Madrasah Aliyah';
                    }
                    if(textNama[1]==='TS'){
                        textTingkat = 'Madrasah Tsanawiyah';
                    }

                    htmlUltah +=`
                    <div class="col-lg-3 col-md-6 col-xs-6 col-sm-6 col-12 mb-3">
                        <div class="row">
                            <div class="col-2 text-center">
                                <img src="${(mapping.user.foto=='default.jpg')?defaultURLFoto:`<?=base_url();?>app/assets/users/foto/${mapping.user.foto}`}" style="object-fit:cover; object-position:center; border-radius:100%; width:45px; height:45px;"/>
                            </div>
                            <div class="col-10">
                                <h6 style="font-size:13px;text-transform:uppercase;">${textNama[0]}<br/><font class="text-muted" style="font-weight:normal;">${textTingkat}</font></h6>
                            </div>
                        </div>
                    </div>
                    `;
                }

                saldo += parseInt(mapping.accounts.balance);
            });

            percentage = (jmlDataConnect/jmlData)*100;
            percentage = percentage.toFixed(2);
            $('.box2val').html(posts2.data.data.length);
            $('.box2val2').html(formatRupiah(jmlDataConnect.toString())+"/"+formatRupiah(jmlData.toString())+"("+percentage+"%) akun terkoneksi.");

            
            arrSebaranSaldo.push(saldo);
            saldoAll+=saldo;

            $('.saldoSiswa').html("Rp"+formatRupiah(saldo.toString()));
            $('.totalUltah').html(formatRupiah(jmlUltah.toString())+' orang');
            $('.putUltahHere').html(htmlUltah);
            
            getGeneral();
        }
    }
    save2();
}

function getGeneral(){

    const save2 = async () => {
        const posts2 = await axios.get('<?= api_url(); ?>api/v1/general/get-inpaging', {
            headers: {
                'Authorization': 'Bearer ' + localStorage.getItem('_token')
            }
        }).catch((err) => {
            console.log(err.response);
        });

        if (posts2.status == 200) {
            let saldo = 0;
            
            posts2.data.data.map((mapping,i)=>{
                saldo += parseInt(mapping.accounts.balance);
            });

            arrSebaranSaldo.push(saldo);
            $('.saldoGeneral').html("Rp"+formatRupiah(saldo.toString()));

            saldoAll+=saldo;
            
            getKantin();
        }
    }
    save2();
}

function getKantin(){
    const save2 = async () => {
        const posts2 = await axios.get('<?= api_url(); ?>api/v1/kantin', {
            headers: {
                'Authorization': 'Bearer ' + localStorage.getItem('_token'),
                'nopaginate' : true
            }
        }).catch((err) => {
            console.log(err.response);
        });

        if (posts2.status == 200) {
            $('.box3val').html(posts2.data.data.length);

            tableColumn = '';
            let num = 0;
            let saldo = 0;

            if(posts2.data.data.length==0){
                tableColumn +=`<tr><td colspan="7" class="text-center">Tidak ada data.</td></tr>`;
                $('.putContentHere').html(tableColumn);return false;
            }
            
            // console.log(posts2.data.data.data);
            posts2.data.data.map((mapping,i)=>{

            saldo += parseInt(mapping.accounts.balance);

            let nmkntn = mapping.nama_kantin;
            
            nmkntn = nmkntn.replace("'","");

            NewDataArrayForGraph5.push({
                namaKantin: nmkntn,
                saldoKantin : mapping.accounts.balance
            });

            
            

            num += 1;
            tableColumn +=`
            <div class="row" style="font-size:12px!important;">
                <div class="col-12" style="display:inline-block;font-size:10px!important;">
                <img src="<?=base_url();?>assets/png/shop.png" class="me-2" style="width:100%; object-fit:cover;object-position:center;height:15px;width:15px;padding:0px;"/> ${mapping.nama_kantin}<font style="float:right!important;margin-top:0px!important;">Rp${formatRupiah(mapping.accounts.balance)}</font>
                </div>
            </div>
            <hr style="border:1px solid rgba(0,0,0,0.15);"/>
            `;
            
            });

            
            saldoKantinTotal = saldo;
            
            arrSebaranSaldo.push(saldo);
            saldoAll+=saldo;
            
        $('.putListKantinSaldoHere').html(tableColumn);
        $('.saldoKantin').html("Rp"+formatRupiah(saldo.toString()));

        getAkun();

        }
    }
    save2();
}



function getAkun(){
    const save2 = async () => {
        const posts2 = await axios.get('<?= api_url(); ?>api/v1/account/auth', {
            headers: {
                'Authorization': 'Bearer ' + localStorage.getItem('_token')
            }
        }).catch((err) => {
            console.log(err.response);
        });

        if (posts2.status == 200) {
            // console.log(posts2.data.data);
            let statusInstansi = '';
            if(posts2.data.data[1].status.status=='Active'){
                statusInstansi = `Verified <i class="bx bxs-badge-check text-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Instansi ini telah secara resmi bergabung dengan sistem Oncard.id" ></i>`;
            }else {
                statusInstansi = 'Not set';
            }
            $('.box1val').html(posts2.data.data[1].instansi.nama);
            $('.box1val2').html(statusInstansi);

            saldTot = parseInt(posts2.data.data[1].balance);
            $('.saldoInstansi').html("Rp"+formatRupiah(posts2.data.data[2].balance));

            arrSebaranSaldo.push(parseInt(posts2.data.data[2].balance));

            saldoAll+=parseInt(posts2.data.data[2].balance);

            $('[data-bs-toggle="tooltip"]').tooltip();

            getTrxBusiness();

            localStorage.removeItem("saldoTerakhir");
            localStorage.setItem("saldoTerakhir", "Rp"+formatRupiah(posts2.data.data[2].balance));
            $('.getSaldoInstansiCache').html(localStorage.getItem("saldoTerakhir"));

            if(posts2.data.data[0].uid=='1f3ade3e-5a26-4018-8a97-a8a00919ba85'){
                var ul = document.getElementById("menu");
                var li = document.createElement("li");
                li.appendChild(document.createTextNode("Four"));
                li.setAttribute("id", "element4"); // added line
                ul.appendChild(li);
            }

            console.log('saldoAllLama', formatRupiah(saldoAll.toString()));

            $('.box4val').html("Rp"+formatRupiah(saldoAll.toString()));
            

        }
    }
    save2();
}

function getTrxBusiness(){
    
    const save2 = async () => {
        const posts2 = await axios.get('<?= api_url(); ?>api/v1/setting/get-config-trx-business', {
            headers: {
                'Authorization': 'Bearer ' + localStorage.getItem('_token')
            }
        }).catch((err) => {
            console.log(err.response);
        });

        if (posts2.status == 200) {	
            beaAdmin = posts2.data.data[0].admin_fee_total;

            
            
        }

    }
    save2();				
}

function showIpaymuBalance(){
        let num = 0;
        let tableColumn = '';
        tableColumn += `<tr><td colspan="7" class="text-center">Loading...</td></tr>`;
        $('.putContentHere').html(tableColumn);
        
        const save2 = async () => {
            const posts2 = await axios.get('<?=base_url(); ?>CPanel_Admin/getDataAgensiAllIpaymuEachInstansi').catch((err) => {
                console.log(err.response);
            });
    
            if (posts2.status == 200) {

                posts2.data.data.map((mapping,i)=>{
                    let mxxx = mapping.jumlah_saldo_available_ipaymu??0;
                    
                    $('.putListPaymentGateway').html(
                        `<li class="list-group-item d-flex bg-transparent justify-content-between align-items-center" style="font-size:11px;">
                        Saldo ditampung : <span class="badge bg-gradient-quepal rounded-pill">Rp${formatRupiah(mxxx.toString())}</span>
                        </li>`
                    );
                });     
            }
        }
        
        save2();
        
        
    }

function handleDateSelection() {
        var dateSelector = document.getElementById("dateSelector");
        var selectedValue = dateSelector.options[dateSelector.selectedIndex].value;

        var currentDate = new Date();
        var selectedDate;

        let datestartset;
        let dateendset;

        switch (selectedValue) {
        case "today":
            selectedDate = currentDate;
            datestartset = moment(currentDate).format('YYYY-MM-DD');
            dateendset = moment(currentDate).format('YYYY-MM-DD');
            endPointGetDataSiswa = '<?= api_url(); ?>api/v1/rep/jurnal?date_from='+datestartset+'&date_to='+dateendset;

            showData();
            
            break;
        case "yesterday":
            selectedDate = new Date(currentDate);
            selectedDate.setDate(currentDate.getDate() - 1);

            datestartset = moment(currentDate).format('YYYY-MM-DD');
            dateendset = moment(selectedDate).format('YYYY-MM-DD');
            endPointGetDataSiswa = '<?= api_url(); ?>api/v1/rep/jurnal?date_from='+dateendset+'&date_to='+dateendset;

            showData();

            break;
        case "lastWeek":
            selectedDate = new Date(currentDate);
            selectedDate.setDate(currentDate.getDate() - 7);

            datestartset = moment(currentDate).format('YYYY-MM-DD');
            dateendset = moment(selectedDate).format('YYYY-MM-DD');
            endPointGetDataSiswa = '<?= api_url(); ?>api/v1/rep/jurnal?account_level=users&date_from='+dateendset+'&date_to='+datestartset;

            showData();
            break;
        case "thisMonth":
            selectedDate = new Date(currentDate.getFullYear(), currentDate.getMonth(), 1);

            datestartset = moment(currentDate).format('YYYY-MM-DD');
            dateendset = moment(selectedDate).format('YYYY-MM-DD');
            endPointGetDataSiswa = '<?= api_url(); ?>api/v1/rep/jurnal?account_level=users&date_from='+dateendset+'&date_to='+datestartset;

            showData();
            break;
        default:
            selectedDate = currentDate;
    }

        // Format the selected date as desired
        var formattedDate = selectedDate.toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' });

        // Log or use the formatted date as needed
        console.log("Selected Date:", formattedDate);
    }

    function handleDateSelection2() {
        var dateSelector = document.getElementById("dateSelector2");
        var selectedValue = dateSelector.options[dateSelector.selectedIndex].value;

        var currentDate = new Date();
        var selectedDate;

        let datestartset;
        let dateendset;

        switch (selectedValue) {
        case "today":
            selectedDate = currentDate;
            datestartset = moment(currentDate).format('YYYY-MM-DD');
            dateendset = moment(currentDate).format('YYYY-MM-DD');
            endPointGetDataWithdrawal = '<?= api_url(); ?>api/v1/rep/history?type=withdrawal&date_from='+datestartset+'&date_to='+dateendset;

            showDataWithdrawal();
            
            break;
        case "yesterday":
            selectedDate = new Date(currentDate);
            selectedDate.setDate(currentDate.getDate() - 1);

            datestartset = moment(currentDate).format('YYYY-MM-DD');
            dateendset = moment(selectedDate).format('YYYY-MM-DD');
            endPointGetDataWithdrawal = '<?= api_url(); ?>api/v1/rep/history?type=withdrawal&date_from='+dateendset+'&date_to='+dateendset;

            showDataWithdrawal();

            break;
        case "lastWeek":
            selectedDate = new Date(currentDate);
            selectedDate.setDate(currentDate.getDate() - 7);

            datestartset = moment(currentDate).format('YYYY-MM-DD');
            dateendset = moment(selectedDate).format('YYYY-MM-DD');
            endPointGetDataWithdrawal = '<?= api_url(); ?>api/v1/rep/history?type=withdrawal&date_from='+dateendset+'&date_to='+datestartset;

            showDataWithdrawal();
            break;
        case "thisMonth":
            selectedDate = new Date(currentDate.getFullYear(), currentDate.getMonth(), 1);

            datestartset = moment(currentDate).format('YYYY-MM-DD');
            dateendset = moment(selectedDate).format('YYYY-MM-DD');
            endPointGetDataWithdrawal = '<?= api_url(); ?>api/v1/rep/history?type=withdrawal&date_from='+dateendset+'&date_to='+datestartset;

            showDataWithdrawal();
            break;
        default:
            selectedDate = currentDate;
    }

        // Format the selected date as desired
        var formattedDate = selectedDate.toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' });

        // Log or use the formatted date as needed
        console.log("Selected Date Withdrawal:", formattedDate);
    }


</script>
