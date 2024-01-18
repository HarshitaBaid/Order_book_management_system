$(document).ready(function () {
    // Hide dropdown on page load
    $(".custom-dropdown").hide();

    // Show/hide dropdown on SVG click
    $(".proname svg").on("click", function (event) {
        console.log("en");
        event.stopPropagation(); // Prevent the click from reaching the document
        $(this).siblings(".custom-dropdown").toggle();
        $(this).hide();
    });

    // Show dropdown when clicking on the search box in the "name" class
    $(".proname .search-input").on("click", function (event) {
        event.stopPropagation(); // Prevent the click from reaching the document
        $(this).closest(".proname").find(".dropdown-list").show();
    });

    // Hide dropdown when clicking outside of it
    $(document).click(function (event) {
        if (!$(event.target).closest('.custom-dropdown, .proname .search-input, .proname .dropdown-list').length) {
            $(".custom-dropdown").hide();
            $(".proname svg").show();
        }
    });

    // Handle search functionality
    $(".search-input").on("input", function () {
        console.log("hf");
        var searchTerm = $(this).val().toLowerCase();
        var dropdownList = $(this).siblings(".dropdown-list");
        dropdownList.find("li").each(function () {
            var text = $(this).text().toLowerCase();
            $(this).toggle(text.includes(searchTerm));
        });
    });

    // Handle option selection
    $(".dropdown-list li").on("click", function () {
        var selectedValue = $(this).text();
        var dropdown = $(this).closest(".custom-dropdown");
        dropdown.find(".search-input").val(selectedValue);
        // dropdown.hide();
    });
});

$(document).ready(function () {
    // ... (existing code)

    // Event listener for Order Type filter
    $(".proname .dropdown-list li").on("click", function () {
        var selectedType = $(this).text().trim();
        console.log(selectedType);

        // Hide all rows
        $(".order-row").hide();

        // Show only rows with the selected Order Type
        $(".order-row:contains('" + selectedType + "')").show();
    });

    // ... (existing code)
});