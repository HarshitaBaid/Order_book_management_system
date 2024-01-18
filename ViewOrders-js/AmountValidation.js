function validateFormAmount() {
    var ea = document.getElementById('exact_amount').value;
    var lta = document.getElementById('less_than_amount').value;
    var gta = document.getElementById('greater_than_amount').value;
    var popup = document.querySelector('.popup1'); // Corrected ID selector

    if (ea === "" && lta === "" && gta==="") {
        document.getElementById('warning-message2').style.display = 'block';
        return false; // Prevent form submission
    }
    else{
        document.getElementById('warning-message2').style.display = 'none';
        $('.popup1').hide()
    }

    document.getElementById("cb2").onclick = function(){
        validateFormAmount();
    }
}