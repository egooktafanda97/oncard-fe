<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" />
<link href="//cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.3/animate.min.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<style>
    .button-group2 {
            display: flex;
            flex-direction: row;
            gap: 10px;
        }
        .button2 {
            background-color: #6200ee;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            /* width:100px; */
        }
        .button2:hover {
            background-color: #3700b3;
        }
        .date-picker {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            cursor: pointer;
        }
</style>
<nav class="navbar-fixed-top navbar-default">
<div class="container-fluid">
  <div class="navbar-header">
    <a class="navbar-brand" href="#">O-Analysist</a>
  </div>
  <div>
    <ul class="nav navbar-nav navbar-right">
      <li class="active"><a href="#/" onclick="localStorage.clear();window.location.href = '<?=base_url() . 'Login/logoutUser';?>';"><i class="fa fa-arrow-left"></i>Logout</a></li> 
    </ul>
  </div>
</div>
</nav><!-- /.navbar -->

<!-- Section 1 -->
<section class="mt-5 pt-5 mb-5 pb-5">

  <div class="container-fluid">
    <div class="row">
        <div class="col-12 p-2 py-3 text-white bg-secondary text-center timeframe">
        </div>
      <div class="col-lg-12 col-md-12 col-12">
        <h1 class="first-h1 px-3">Loading...</h1>
        <hr>

        <div class="col-lg-3 col-md-12 col-12">
            <div class="card">
                <div class="card-body">
                    <h4>Saldo Owner</h4>
                    <h5 class='saldoowner'>
                    <div class="spinner-border" role="status">
        <span class="sr-only">Loading...</span>
        </div>
                    </h5>
                    <h6 class='text-danger saldoowner_actual'></h5>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-12 col-12">
            <div class="card">
                <div class="card-body">
                    <h4>Saldo Instansi</h4>
                    <h5 class='saldoinstansi'>
                    <div class="spinner-border" role="status">
        <span class="sr-only">Loading...</span>
        </div>
                    </h5>
                    <h6 class='text-danger saldoinstansi_actual'></h5>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-12 col-12">
            <div class="card">
                <div class="card-body">
                    <h4>Saldo Santri</h4>
                    <h5 class='saldosantri'><div class="spinner-border" role="status">
        <span class="sr-only">Loading...</span>
        </div></h5>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-12 col-12">
            <div class="card">
                <div class="card-body">
                    <h4>Saldo General</h4>
                    <h5 class='saldogeneral'><div class="spinner-border" role="status">
        <span class="sr-only">Loading...</span>
        </div></h5>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-12 col-12">
            <div class="card">
                <div class="card-body">
                    <h4>Saldo Merchant</h4>
                    <h5 class='saldomerchant'><div class="spinner-border" role="status">
        <span class="sr-only">Loading...</span>
        </div></h5>
                </div>
            </div>
        </div>
      </div>

      <hr style="border:1px solid rgba(0,0,0,0.1);"/>
        <div class="col-md-6">
            <div class="putContentHereRangkum">
            <div class="spinner-border" role="status">
        <span class="sr-only">Loading...</span>
        </div>
            </div>
        </div>
        <div class="col-md-6 right-after" style="display:none;">
            <h3 class="namarangkum px-3">Rangkum</h3>

            <div class="button-group2">
                <button class="button2" onclick="selectAll()">All</button>
                <button class="button2" onclick="selectToday()">Hari Ini</button>
                <button class="button2" onclick="selectYesterday()">Kemarin</button>
                <button class="button2" onclick="selectThisWeek()">Minggu Ini</button>
                <!-- <input type="datetime-local" class="datetimes date-picker" onchange="selectSpecificDate(event)"> -->
                <input type="text" name="datetimes" />
            </div>

            <div class="putContentHereBalancing p-4">

            </div>
        </div>


    </div>

    
  
  </div>

  
</section>

<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

<script>

    let acc_id = '';
    let ins_id = '';

    let var1 = 0;
    let var2 = 0;
    let var3 = 0;
    let var4 = 0;
    let var5 = 0;
    let var6 = 0;
    let actsaldoowner = 0;
    let actsaldoinstansi = 0;

    let dateSelected = 'all';
    $(document).ready(function () {

        $(function() {
            $('input[name="datetimes"]').daterangepicker({
                timePicker: true,
                startDate: moment().startOf('hour'),
                endDate: moment().startOf('hour').add(32, 'hour'),
                locale: {
                format: 'M/DD hh:mm A'
                }
            }, function(start, end, label) {
                // var years = moment().diff(start, 'years');
                // alert("You are " + years + " years old!");
                var formattedStart = start.format('YYYY-MM-DD HH:mm:ss');
                var formattedEnd = end.format('YYYY-MM-DD HH:mm:ss');
                
                dateSelected = formattedStart+'|'+formattedEnd;

                console.log("dateSelected", dateSelected);

                getBalancing();
            });
        });

        $('.first-h1').html(localStorage.getItem('_user'));

        let now = moment(new Date).format('DD-MM-YYYY hh:mm:ss');
        $('.timeframe').html("Load data : "+now);

        getFirst();
    });



    function getFirst(){
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

                        console.log(posts2.data.data);
                        acc_id = posts2.data.data.data[0].id;
                        ins_id = localStorage.getItem('_instansi_id');

                        getSaldoOwner();

					}
				}
				save2();
			}

    function getSaldoOwner(){
        let num = 0;
        let tableColumn = '';
    
      
        var form_data = new FormData();
        form_data.append('instansi_id', ins_id);
        form_data.append('account_id', acc_id);
        form_data.append('datetime', dateSelected);
        // form_data.append('now', now);
        
        $('.saldoowner').html(`<div class="spinner-border" role="status">
        <span class="sr-only">Loading...</span>
        </div>`);

        const save = async (form_data) => {
            const posts2 = await axios.post('<?=base_url();?>CPanel_Admin/count_owner_fund', form_data, {
                // console.log(err.response);
            });
    
            console.log(posts2.data);

            let m = posts2.data.fund_all[0].a??0;
            let n = posts2.data.fund_debit[0].b??0;
            let x = posts2.data.actual_balance_acocunt[0].c??0;

            let total = parseInt(m) - parseInt(n);

            var1 = x;
            actsaldoowner = total;

            let deviasi = parseInt(total-x);
                
            // if (posts2.status == 200) {
                saldoOwner= total;
                // saldoAll=parseInt(saldoOwner);
                $('.saldoowner').html("Rp"+formatRupiah(saldoOwner.toString()));
                // actsaldo = x;
                $('.saldoowner_actual').html("Saldo di Dashboard Rp"+formatRupiah(x.toString())+" deviasi : "+formatRupiah(deviasi.toString()));


                getSiswa();

                
            // }
        }
        save(form_data);
    }

    
    function getSiswa(){

        arrSebaranSaldo = [];

        $('.saldosantri').html(`<div class="spinner-border" role="status">
        <span class="sr-only">Loading...</span>
        </div>`);

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
                // saldoAll+=saldo;

                var2 = saldo;

                $('.saldosantri').html("Rp"+formatRupiah(saldo.toString()));

                $('.saldoSiswa').html("Rp"+formatRupiah(saldo.toString()));
                $('.totalUltah').html(formatRupiah(jmlUltah.toString())+' orang');
                $('.putUltahHere').html(htmlUltah);
                
                getGeneral();
            }
        }
        save2();
    }

    function getGeneral(){

        $('.saldogeneral').html(`<div class="spinner-border" role="status">
        <span class="sr-only">Loading...</span>
        </div>`);
    
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

                // $('.saldogeneral').html(saldo);
                $('.saldogeneral').html("Rp"+formatRupiah(saldo.toString()));

                // saldoAll+=saldo;

                var3 = saldo;
                
                getKantin();
            }
        }
        save2();
    }

    function getKantin(){

        $('.saldomerchant').html(`<div class="spinner-border" role="status">
        <span class="sr-only">Loading...</span>
        </div>`);

        const save2 = async () => {
            const posts2 = await axios.get('<?= api_url(); ?>api/v1/kantin', {
                headers: {
                    'Authorization': 'Bearer ' + localStorage.getItem('_token')
                }
            }).catch((err) => {
                console.log(err.response);
            });
    
            if (posts2.status == 200) {
                $('.box3val').html(posts2.data.data.data.length);

                tableColumn = '';
                let num = 0;
                let saldo = 0;

                if(posts2.data.data.data.length==0){
                    tableColumn +=`<tr><td colspan="7" class="text-center">Tidak ada data.</td></tr>`;
                    $('.putContentHere').html(tableColumn);return false;
                }
                
                // console.log(posts2.data.data.data);
                posts2.data.data.data.map((mapping,i)=>{

                saldo += parseInt(mapping.accounts.balance);

                
                });

                
                saldoKantinTotal = saldo;

                var4 = saldo;
                
            $('.saldomerchant').html("Rp"+formatRupiah(saldoKantinTotal.toString()));

            getAkun1();

            }
        }
        save2();
    }

    let now_login_acc_id = '';

    function getAkun1(){
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
                
                now_login_acc_id = posts2.data.data[2].id;

                $('.saldoinstansi_actual').html('');

                getRealFundInstansi();

            }
        }
        save2();
    }

    function getRealFundInstansi(){
        var form_data = new FormData();
        form_data.append('instansi_id', ins_id);
        form_data.append('account_id', now_login_acc_id);
        form_data.append('datetime', dateSelected);
        // form_data.append('now', now);
        

        $('.saldoinstansi').html(`<div class="spinner-border" role="status">
        <span class="sr-only">Loading...</span>
        </div>`);

        const save2 = async (form_data) => {
            const posts2 = await axios.post('<?=base_url();?>CPanel_Admin/count_owner_fund', form_data, {
                // console.log(err.response);
            });
    
            if (posts2.status == 200) {
                // console.log(posts2.data.data);
                console.log(posts2.data);

                let m = posts2.data.fund_all[0].a??0;
                let n = posts2.data.fund_debit[0].b??0;
                let x = posts2.data.actual_balance_acocunt[0].c??0;

                // var1 = x;

                let total = parseInt(m) - parseInt(n);

                
                let deviasi = parseInt(total-x);
                    
                saldoOwner= total;
                actsaldoinstansi = x;
                
                $('.saldoinstansi').html("Rp"+formatRupiah(saldoOwner.toString()));
                // actsaldo = x;
                $('.saldoinstansi_actual').html("Saldo di Dashboard Rp"+formatRupiah(x.toString())+" deviasi : "+formatRupiah(deviasi.toString()));

                var5= total;

                showVars();

                // getAkun();

            }
        }
        save2(form_data);
    }
    
    
    function getBalancing(){
        var form_data = new FormData();
        form_data.append('instansi_id', ins_id);
        form_data.append('datetime', dateSelected);
        // form_data.append('now', now);

        $('.putContentHereBalancing').html(`<div class="spinner-border" role="status">
        <span class="sr-only">Loading...</span>
        </div>`);
        
        const save2 = async (form_data) => {
            const posts2 = await axios.post('<?=base_url();?>CPanel_Admin/count_balancing_all', form_data, {
                // console.log(err.response);
            });
    
            if (posts2.status == 200) {
                // console.log(posts2.data.data);
                console.log(posts2.data);

                let m = posts2.data.wd_all;
                let n = posts2.data.topup_all;
                
                let deviasi = parseInt(n) - parseInt(m);

                let totalsaldosebelum = parseInt(ol_good)-parseInt(n)+parseInt(m);
                let totalsaldosebelum_actual = parseInt(ol_good2)-parseInt(n)+parseInt(m);

                $('.putContentHereBalancing').html(`
                    <div class="row">
                        <div class="col-6">
                            Topup
                            <h3>${formatRupiah(n.toString())}</h3>
                        </div>
                        <div class="col-6">
                            Withdrawal
                            <h3>${formatRupiah(m.toString())}</h3>
                        </div>
                        <div class="col-12 jumbotron">
                            Saldo terakhir sebelum rentang waktu 
                            <br/><font style="background:rgba(0,0,0,0.23); border-radius:3px; padding:3px; padding-left:7px; padding-right:7px;">${posts2.data.datetime}</font><br/>
                            <h3>Rp${formatRupiah(totalsaldosebelum.toString())}</h3>
                            <h6>Rp${formatRupiah(totalsaldosebelum_actual.toString())}</h6>
                        </div>
                    </div>
                `);

            }
        }
        save2(form_data);
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

            
                // getGraph1('totaltransaksi');
                
            }

        }
        save2();				
    }

    let ol_good = 0;
    let ol_good2 = 0;

    function showVars(){
        console.log("vars: ",var1, var2, var3, var4, var5, var6, actsaldoowner, actsaldoinstansi);

        $('.putContentHereRangkum').html('');

        let total = parseInt(actsaldoowner)+parseInt(var2)+parseInt(var3)+parseInt(var4)+parseInt(var5)+parseInt(var6);
        let totalactual = parseInt(var1)+parseInt(var2)+parseInt(var3)+parseInt(var4)+parseInt(actsaldoinstansi)+parseInt(var6);
        let deviasi = parseInt(total) - parseInt(totalactual);

        ol_good = total;
        ol_good2 = totalactual;

        $('.putContentHereRangkum').html(`<h1>Main Saldo</h1>
        <h2>Rp${formatRupiah(total.toString())}</h2>
        <h6>Aktual saldo di dashboard : Rp${formatRupiah(totalactual.toString())}, deviasi : Rp${formatRupiah(deviasi.toString())}</h6>
        `);

        $('.right-after').attr('style','display:block;');
    }

    function selectAll() {
        dateSelected = "all";
        getBalancing();
        $('.namarangkum').text('Rangkum semuanya');
        // alert(`Hari Ini: ${today.toDateString()}`);
    }
    
    function selectToday() {
        const today = new Date();
        dateSelected = "today";
        getBalancing();
        $('.namarangkum').text('Rangkum hari ini');
        // alert(`Hari Ini: ${today.toDateString()}`);
    }

    function selectYesterday() {
        const yesterday = new Date();
        yesterday.setDate(yesterday.getDate() - 1);

        dateSelected = "yesterday";

        $('.namarangkum').text('Rangkum kemarin - '+moment(yesterday).format('DD MMMM YYYY'));
        getBalancing();
        
        // alert(`Kemarin: ${yesterday.toDateString()}`);
    }

    function selectThisWeek() {
        const today = new Date();
        const firstDayOfWeek = new Date(today.setDate(today.getDate() - today.getDay()));
        dateSelected = "thisWeek";

        getBalancing();

        $('.namarangkum').text('Rangkum minggu ini');
        // alert(`Minggu Ini: ${firstDayOfWeek.toDateString()} - ${new Date().toDateString()}`);
    }

    $('.box1val').attr('style','display:none;');
                $('.box10val').attr('style','display:none;');
</script>