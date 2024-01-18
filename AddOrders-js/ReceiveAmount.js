// Get the container that holds the dynamically added divs
var container = document.getElementById('receiveOrderForm');

// Add event listener to the container for the input events
container.addEventListener('input', function (event) {
    // Check if the target element is an input with the class 'quantity' or 'price'
    if (event.target.classList.contains('rquantity') || event.target.classList.contains('rprice')) {
        updateAmount(event.target);
    }
});

// Function to update the amount based on quantity and price
function updateAmount(target) {
    // Find the corresponding amount input field
    var amountInput = target.closest('.six').querySelector('.form-space.form-control.ramount');

    // Get the values of quantity and price
    var quantity = parseFloat(target.closest('.six').querySelector('.form-space.form-control.rquantity').value) || 0;
    var price = parseFloat(target.closest('.six').querySelector('.form-space.form-control.rprice').value) || 0;

    // Calculate the amount
    var amount = quantity * price;

    // Update the amount input field
    amountInput.value = amount.toFixed(2); // You can adjust the number of decimal places as needed
}