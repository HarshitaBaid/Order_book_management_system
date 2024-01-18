// Get the container that holds the dynamically added divs
var container = document.getElementById('placeOrderForm');

// Add event listener to the container for the input events
container.addEventListener('input', function (event) {
    // Check if the target element is an input with the class 'quantity' or 'price'
    if (event.target.classList.contains('quantity') || event.target.classList.contains('price')) {
        updateAmount(event.target);
    }
});

// Function to update the amount based on quantity and price
function updateAmount(target) {
    // Find the corresponding amount input field
    var amountInput = target.closest('.six').querySelector('.form-space.form-control.amount');

    // Get the values of quantity and price
    var quantity = parseFloat(target.closest('.six').querySelector('.form-space.form-control.quantity').value) || 0;
    var price = parseFloat(target.closest('.six').querySelector('.form-space.form-control.price').value) || 0;

    // Calculate the amount
    var amount = quantity * price;

    // Update the amount input field
    amountInput.value = amount.toFixed(2); // You can adjust the number of decimal places as needed
}