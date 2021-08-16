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

function deleteFromCart(referencia) {
        //alert(referencia);

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var data=this.responseText;
                var hideLine = document.getElementById(referencia);
                hideLine.style.display = "none";
            }
        };
        xmlhttp.open("POST", "deletefromcart.php", true);
        xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xmlhttp.send("referencia="+referencia);
}

function updateCart(referencia,qty) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var data=this.responseText;
        }
    };
    xmlhttp.open("POST", "updatecart.php", true);
    xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xmlhttp.send("referencia="+referencia+"&qty="+qty);
}

function onload() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var data=this.responseText;
            var jsonResponse = JSON.parse(data);
            //console.log(jsonResponse["numProds"]);
            document.getElementById("numProds").innerHTML = jsonResponse["numProds"];
            document.getElementById("total").innerHTML = jsonResponse["total"].toFixed(2)+" €";
        }
    };
    xmlhttp.open("GET", "onload.php", true);
    xmlhttp.send();
}