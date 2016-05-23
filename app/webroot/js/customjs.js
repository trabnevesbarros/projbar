/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function autoSetValor() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            var res = parseFloat(xhttp.responseText);
            document.getElementById("BalancoValor").value = res.toFixed(2);
        }
    };
    xhttp.open("GET", "getPreco/" + document.getElementById('BalancoProdutoId').value, true);
    xhttp.send();
}

