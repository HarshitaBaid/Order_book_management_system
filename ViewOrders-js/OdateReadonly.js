document.addEventListener("DOMContentLoaded", function () {
    // Get the input elements
    var particularAmountInput = document.getElementById("fixed_order_date");
    var lessThanAmountInput = document.getElementById("from_order_date");
    var greaterThanAmountInput = document.getElementById("to_order_date");

    function updateReadonly(inputElement) {
        // Log the trimmed value to see what is being captured
        console.log(inputValue);

        // Update readonly attribute based on the trimmed value
        if (inputValue !== "") {
            inputElement.setAttribute("readonly", "readonly");
        } else {
            inputElement.removeAttribute("readonly");
        }
    }

    // Add an event listener to particular amount input
    particularAmountInput.addEventListener("input", function () {
        // Get the trimmed value of the input
        var inputValue = particularAmountInput.value.trim();

        // Update readonly attribute based on the trimmed value
        if (inputValue !== "") {
            lessThanAmountInput.setAttribute("readonly", "readonly");
            greaterThanAmountInput.setAttribute("readonly", "readonly");
        } else {
            lessThanAmountInput.removeAttribute("readonly");
            greaterThanAmountInput.removeAttribute("readonly");
        }
    });

    // Add an event listener to less than amount input
    lessThanAmountInput.addEventListener("input", function () {
        // Get the trimmed value of the input
        var inputValue = lessThanAmountInput.value.trim();

        // Update readonly attribute based on the trimmed value
        if (inputValue !== "") {
            particularAmountInput.setAttribute("readonly", "readonly");
        } else {
            particularAmountInput.removeAttribute("readonly");
        }
    });

    // Add an event listener to greater than amount input
    greaterThanAmountInput.addEventListener("input", function () {
        // Get the trimmed value of the input
        var inputValue = greaterThanAmountInput.value.trim();

        // Update readonly attribute based on the trimmed value
        if (inputValue !== "") {
            particularAmountInput.setAttribute("readonly", "readonly");
        } else {
            particularAmountInput.removeAttribute("readonly");
        }
    });
});