$(document).ready(function () {
    // Event listener for the Confirm button click
    $(".odate .confirm-btn").on("click", function () {
        // AJAX request to send form data to OrderDateForm.php
        $.ajax({
            type: "POST",
            url: "./Backend/OrderDateForm.php",
            data: {
                from_order_date: $('#from_order_date').val(), // Fetch value from the 'From' input
                fixed_order_date: $('#fixed_order_date').val(), // Fetch value from the 'Particular' input
                to_order_date: $('#to_order_date').val() // Fetch value from the 'To' input
            },
            success: function (response) {
                $(".table tbody .order-row").remove();
                console.log("Data sent successfully!");
                $('.table tbody').append(response);

                if (response.indexOf('No results found') === -1) {
                    $(".table tbody .no-results").remove();
                }
            },
            error: function () {
                console.log("Error occurred while sending data!");
            }
        }); 
    });
});