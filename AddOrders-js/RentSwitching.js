$(document).ready(function () {
    // Attach the event handler to a static parent element using event delegation
    $(document).on('change', '.order_type', function () {
        var selectedValue = $(this).val();
        console.log("selected");
        console.log("value"+selectedValue);

        // Find the closest three-container relative to the changed order_type
        var threeContainer = $(this).closest('.three-container');

        // Check if the selected order type is "rent"
        if (selectedValue === 'rent' || selectedValue === 'Rent') {
            console.log("rentttt");
            // Show the corresponding rent-switching div within this container
            threeContainer.find('.rent-switching').show();
            threeContainer.find('.rent-switching').addClass('d-flex');
            threeContainer.find('.last_date').hide();
            threeContainer.find('.last_date').removeClass('d-flex');
        }else if (selectedValue === 'manufacturer') {
            // Show the corresponding rent-switching div within this container
            threeContainer.find('.last_date').show();
            threeContainer.find('.last_date').addClass('d-flex'); 
            threeContainer.find('.rent-switching').removeClass('d-flex');
            threeContainer.find('.rent-switching').hide();
        }
        else {
            // Hide the rent-switching div within this container if the order type is not "rent"
            // threeContainer.find('.rent-switching').hide();
            threeContainer.find('.rent-switching').hide();
            threeContainer.find('.rent-switching').removeClass('d-flex');
            threeContainer.find('.last_date').hide();
            threeContainer.find('.last_date').removeClass('d-flex');
        }
    });

    // Trigger the change event on page load to handle initial states
    $('.order_type').trigger('change');
});
