$(document).ready(function () {
    // ... (existing code)

    // Show pop-up on SVG click
    $(".advance svg").on("click", function (event) {
        event.stopPropagation();
        $(".popup").show();
    });

    // Close pop-up when clicking outside of it or on close button
    $(document).click(function (event) {
        if (!$(event.target).closest('.popup-content, .advance svg').length) {
            $(".popup").hide();
        }
    });

    // Close pop-up when clicking on the close button
    $(".close-popup").on("click", function () {
        $(".popup").hide();
    });

    // Prevent the pop-up from closing when clicking inside it
    $(".popup-content").click(function (event) {
        event.stopPropagation();
    });
});