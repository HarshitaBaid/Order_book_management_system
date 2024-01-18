function validateForm() {
    var ea1 = document.getElementById('exact_amount_1').value;
    var lta1 = document.getElementById('less_than_amount_1').value;
    var gta1 = document.getElementById('greater_than_amount_1').value;
    var popup = document.querySelector('.popup'); // Corrected ID selector

    if (ea1 === "" && lta1 === "" && gta1==="") {
        document.getElementById('warning-message3').style.display = 'block';
        return false; // Prevent form submission
    }
    else{
        document.getElementById('warning-message3').style.display = 'none';
        $('.popup').hide()
    }

    document.getElementById("cb3").onclick = function(){
        validateForm();
    }

}