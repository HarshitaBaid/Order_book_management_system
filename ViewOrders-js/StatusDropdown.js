$(document).ready(function () {
    // ... (existing code)

    // Event listener for Order Type filter
    $(".status .dropdown-list li").on("click", function () {
        var selectedType = $(this).text().trim();

        // Hide all rows
        $(".order-row").hide();

        // Show only rows with the selected Order Type
        $(".order-row:contains('" + selectedType + "')").show();
    });

    // ... (existing code)
});