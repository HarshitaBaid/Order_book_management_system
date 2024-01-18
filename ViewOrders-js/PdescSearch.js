$(document).ready(function () {
    // Other existing code...

    // Event listener for Product Description filter
    $(".pdesc .search-input").on("keyup", function () {
        var pdescValue = $(this).val().trim(); // Capture the value from the search input

        // AJAX request to send pdescValue to a PHP file
        $.ajax({
            type: "POST",
            url: "../pdesc_file.php", // Replace with your PHP file path
            data: { pdesc: pdescValue }, // Sending pdescValue as POST data
            success: function (response) {
                $(".table tbody .order-row").remove();
                // Handle the response from the PHP file if needed
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

    // Other existing code...
});