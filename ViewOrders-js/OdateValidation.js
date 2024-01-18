function validateFormOrder() {
    var fromDate = document.getElementById('from_order_date').value;
    var toDate = document.getElementById('to_order_date').value;
    var fixedDate = document.getElementById('fixed_order_date').value;
    var popup = document.querySelector('.popup2'); // Corrected ID selector

    if (fromDate === "" && toDate === "" && fixedDate==="") {
        document.getElementById('warning-message').style.display = 'block';
        return false; // Prevent form submission
    }
    else{
        $('.popup2').hide()
        document.getElementById('warning-message').style.display = 'none';
    }

    document.getElementById("cb").onclick = function(){
        validateFormOrder();
    }
}