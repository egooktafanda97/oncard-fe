<div id="pritnDIV">

</div>

<script>
    var x = localStorage.getItem("struk");

    document.getElementById("pritnDIV").innerHTML = x;

    window.print();
</script>