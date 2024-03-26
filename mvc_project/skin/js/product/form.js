function calculateTotal(){
    var mcost = document.getElementById('mfr-cost');
    var scost = document.getElementById('shipping-cost');
    if(mcost.value > 0 && scost.value > 0){
        document.getElementById('total-cost').value = Number.parseInt(mcost.value) + Number.parseInt(scost.value);
        calculateMargin();
    }
}
function calculateMargin(){
    var price = Number.parseInt(document.getElementById('price').value);
    var tcost = Number.parseInt(document.getElementById('total-cost').value);
    if(!isNaN(tcost) && price > 0 && tcost > 0){
        var dif = price - tcost;
        document.getElementById('margin-percentage').value = Math.round(((dif*100)/price));
    }
}