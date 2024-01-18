$(document).ready(function () {
    // Hide dropdown and custom search on page load
    $(".custom-search").hide();

    // Show/hide dropdown and custom search on SVG click for "pdesc" class
    $(".pdesc svg").on("click", function (event) {
        var dropdown = $(this).siblings(".custom-search");
        handleDropdownToggle(dropdown);
        $(this).hide();

        // Stop propagation to prevent the click from reaching the document
        event.stopPropagation();
    });

    // Hide dropdown and custom search when clicking outside "pdesc" class
    $(document).click(function (event) {
        if (!$(event.target).closest('.pdesc, .custom-search').length) {
            $(".custom-search").hide();
            $(".pdesc svg").show();
        }
    });

    function handleDropdownToggle(dropdown) {
        dropdown.toggle();
    }
});