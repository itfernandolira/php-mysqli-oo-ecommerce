function addToCart(referencia,preco) {

    //alert(referencia);

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var data=this.responseText;
            var jsonResponse = JSON.parse(data);
            //console.log(jsonResponse["numProds"]);
            //atualiza o numero de produtos e total a pagar
            document.getElementById("numProds").innerHTML = jsonResponse["numProds"];
            document.getElementById("total").innerHTML = jsonResponse["total"]+" €";
        }
    };
    xmlhttp.open("POST", "addtocart.php", true);
    xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xmlhttp.send("referencia="+referencia+"&preco="+preco);

}
function onload() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var data=this.responseText;
            var jsonResponse = JSON.parse(data);
            //console.log(jsonResponse["numProds"]);
            document.getElementById("numProds").innerHTML = jsonResponse["numProds"];
            document.getElementById("total").innerHTML = jsonResponse["total"]+" €";
        }
    };
    xmlhttp.open("GET", "onload.php", true);
    xmlhttp.send();
}