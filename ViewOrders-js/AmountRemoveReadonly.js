    // Get the close button element
    const closeButton2 = document.querySelector('.amount .close-popup');

    // Add a click event listener to the close button
    closeButton2.addEventListener('click', function() {
        // Get all input elements within the popup content
        const inputFields = document.querySelectorAll('.popup-content input[type="number"]');
        
        // Loop through each input and clear its value
        inputFields.forEach(function(input) {
            // Loop through each input
            // Check if the input is disabled
            if (input.readOnly) {
                input.removeAttribute('readonly'); // Remove the disabled attribute
            }
            input.value = ''; // Clear the input value
        });
    });