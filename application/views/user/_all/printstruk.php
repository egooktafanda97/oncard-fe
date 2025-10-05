<div id="pritnDIV">

</div>

<script>
    var x = localStorage.getItem("struk");
    var y = localStorage.getItem("strukconf");

    document.getElementById("pritnDIV").innerHTML = x;

    if(y){
        window.print();
    }else {
        localStorage.setItem("strukconf","done");
    }
    
</script>