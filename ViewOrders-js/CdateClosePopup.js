$(document).ready(function () {
    // ... (existing code)

    // Show pop-up on SVG click
    $(".cdate svg").on("click", function (event) {
        event.stopPropagation();
        $(".popup3").show();
    });

    // Close pop-up when clicking outside of it or on close button
    $(document).click(function (event) {
        if (!$(event.target).closest('.popup-content, .cdate svg').length) {
            $(".popup3").hide();
        }
    });

    // Close pop-up when clicking on the close button
    $(".close-popup").on("click", function () {
        $(".popup3").hide();
    });

    // Prevent the pop-up from closing when clicking inside it
    $(".popup-content").click(function (event) {
        event.stopPropagation();
    });
});