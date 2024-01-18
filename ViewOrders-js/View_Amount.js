$(document).ready(function () {
    // ... (existing code)

    // Show pop-up on SVG click
    $(".amount svg").on("click", function (event) {
        event.stopPropagation();
        $(".popup1").show();
    });

    // Close pop-up when clicking outside of it or on close button
    $(document).click(function (event) {
        if (!$(event.target).closest('.popup-content, .amount svg').length) {
            $(".popup1").hide();
        }
    });

    // Close pop-up when clicking on the close button
    $(".close-popup").on("click", function () {
        $(".popup1").hide();
    });

    // Prevent the pop-up from closing when clicking inside it
    $(".popup-content").click(function (event) {
        event.stopPropagation();
    });
});