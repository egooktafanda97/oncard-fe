<style>
    @media print {
        #modal,#footerCustom{
            display: none;
        }
    }
    .cls,.cls a:visited,.cls a:hover {
        text-decoration:none;
        padding:22px 35px;
        background:red;
        color:#fff;
    }
    .prnt,.prnt a:visited,.prnt a:hover {
        text-decoration:none;
        padding:22px 35px;
        background:green;
        color:#fff;
    }
</style>
<div id="pritnDIV">

</div>
<div id="footerCustom" style=" position:absolute; bottom:0;  background:#f2f2f2;padding-bottom:20px;">
<a href="#/" class="cls" onclick="window.close();">Tutup</a><a href="#/" class="prnt"  onclick="window.print();">Print</a>
</div>

<script>
    var x = localStorage.getItem("struk");
    var y = localStorage.getItem("strukconf");

    document.getElementById("pritnDIV").innerHTML = x;

    if(y){
        window.print();
        $('.harga').css('font-size','25px');
        $('.harga').css('font-weight','bold');
    }else {
        localStorage.setItem("strukconf","done");
    }

    

    // var mediaQueryList = window.matchMedia('print');
    // mediaQueryList.addListener(function(mql) {
    //     if (mql.matches) {
    //         console.log('before print dialog open');
    //     } else {
    //         console.log('after print dialog closed');
    //         window.close();
    //     }
    // });

    
    
</script>
