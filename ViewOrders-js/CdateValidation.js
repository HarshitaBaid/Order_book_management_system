function validateFormComplete() {
    var fromCDate = document.getElementById('from_complete_date').value;
    var toCDate = document.getElementById('to_complete_date').value;
    var fixedCDate = document.getElementById('fixed_complete_date').value;
    var popup = document.querySelector('.popup3'); // Corrected ID selector

    if (fromCDate === "" && toCDate === "" && fixedCDate==="") {
        document.getElementById('warning-message1').style.display = 'block';
        return false; // Prevent form submission
    }
    else{
        document.getElementById('warning-message1').style.display = 'none';
        $('.popup3').hide()
    }

    document.getElementById("cb1").onclick = function(){
        validateFormComplete();
    }
}