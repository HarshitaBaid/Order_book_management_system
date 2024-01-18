$(document).ready(function () {
    // Hide dropdown on page load
    $(".custom-dropdown").hide();

    // Show/hide dropdown on SVG click
    $(".otype svg").on("click", function (event) {
        event.stopPropagation(); // Prevent the click from reaching the document
        $(this).siblings(".custom-dropdown").toggle();
        $(this).hide();
    });

    // Show dropdown when clicking on the search box in the "name" class
    $(".otype .search-input").on("click", function (event) {
        event.stopPropagation(); // Prevent the click from reaching the document
        $(this).closest(".otype").find(".dropdown-list").show();
    });

    // Hide dropdown when clicking outside of it
    $(document).click(function (event) {
        if (!$(event.target).closest('.custom-dropdown, .otype .search-input, .otype .dropdown-list').length) {
            $(".custom-dropdown").hide();
            $(".otype svg").show();
        }
    });

    // Handle search functionality
    $(".search-input").on("input", function () {
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