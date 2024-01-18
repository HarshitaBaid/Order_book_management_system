document.addEventListener('DOMContentLoaded', function () {
    console.log('enter');
    var placeOrderBtn = document.getElementById('placeOrderBtn');
    var receiveOrderBtn = document.getElementById('receiveOrderBtn');
    var placeOrderContainer = document.querySelector('#place-order-container'); 
    var receiveOrderContainer = document.querySelector('#receive-order-container');
    var ordertype = document.getElementById('order_type');
    var addRowButton = document.querySelector('#addRow1');
    var removeRowButton = document.querySelector('#removeRow1');
    var addRowButton2 = document.querySelector('#addRow2');
    var removeRowButton2 = document.querySelector('#removeRow2');

    // Function to fetch product names from the server
    function fetchProductNames(callback) {
        fetch('../../College_project/Backend/ProductName.php') // Replace with the correct path to your PHP script
            .then(response => response.json())
            .then(productNames => callback(productNames))
            .catch(error => console.error('Error fetching product names:', error));
    }

    function addRow(container) {
        // Check the form type based on the container ID
        var isPlaceOrderForm = container.id === 'place-order-container';

        if (!isPlaceOrderForm) {
            // Create a new "three" container
            var newThreeContainer = document.createElement('div');
            newThreeContainer.className = 'three-container';

            var newFourDiv = document.createElement('div');
            newFourDiv.className = 'four d-flex';
            newFourDiv.innerHTML = `
                <label for="order_type" id="order-label" style="margin-right:47px; font-weight:300;" class="form-font">Order Type:</label>
                <select name="otype[]" class="form-control col-4 order_type ordering" style="width:auto;">
                    <option value="manufacturer">Manufacturer</option>
                    <option value="sale">Sale</option>
                    <option vue="rent">Rent</option>
                </select>      
            `;
            var newTenDiv = document.createElement('div');
             newTenDiv.className = 'ten d-flex';
             newTenDiv.innerHTML = `
             <label for="proname" class="form-space form-font" style="font-weight:300;">Product Name:</label>
                <select name="proname[]" id="proname" class="form-space form-control">
                </select>
            <label for="item_desc" class="form-space form-font" style="font-weight:300;">Product Description:</label>
            <input type="text" name="item_desc[]" class="form-space form-control" style="margin-bottom:20px;">
            <label for="order_date" class="form-space last_date form-font" style="font-weight:300;">Last Date:</label>
            <input type="date" name="ldate[]" id="order_date" class="form-control form-space last_date ldi">
            `;
            var newFiveDiv = document.createElement('div');
             newFiveDiv.className = 'six d-flex';
             newFiveDiv.innerHTML = `
             <label for="quantity" class="form-space form-font" style="font-weight:300;">Quantity:</label>
             <input type="number" name="quantity[]" class="form-space form-control rquantity">
             <label for="price" class="form-space form-font" style="font-weight:300;">Price:</label>
             <input type="number" name="price[]" class="form-space form-control rprice">
             <label for="amount" class="form-space form-font" style="font-weight:300;">Amount:</label>
             <input type="text" name="amount[]" class="form-space form-control ramount">
             <label for="advance" class="form-space form-font" style="font-weight:300;">Advance:</label>
             <input type="number" name="advance[]" id="advance" class="form-space form-control advance"> 
             <label for="due" class="form-space form-font" style="font-weight:300;">Due:</label>
             <input type="number" name="due[]" id="due" class="form-space form-control due">
             </div>
             `;

            //  console.log('Before adding: Order Type -', ordertype.value);
             var newSixDiv = document.createElement('div');
             newSixDiv.className = 'rent-switching five showing-divs';
             newSixDiv.innerHTML = `
             <label for="from" class="form-space form-font" style="font-weight:300;">From:</label>
             <input type="date" name="from_date[]" id="from" class="form-space form-control">
             <label for="to" class="form-space form-font" style="font-weight:300;">To:</label>
             <input type="date" name="to_date[]" id="to" class="form-space form-control">
             `;

            var orderDateInput = newTenDiv.querySelector('.ldi');
            orderDateInput.value = new Date().toISOString().slice(0, 10);
            newThreeContainer.appendChild(newFourDiv);
            newThreeContainer.appendChild(newTenDiv);
            newThreeContainer.appendChild(newFiveDiv);
            newThreeContainer.appendChild(newSixDiv);
            container.appendChild(newThreeContainer);
            
            // Fetch product names and populate the dropdown
            fetchProductNames(function (productNames) {
                var pronameSelect = newTenDiv.querySelector('#proname');
                pronameSelect.innerHTML = ''; // Clear existing options

                // Populate the select element with product names
                productNames.forEach(function (productName) {
                    var option = document.createElement('option');
                    option.value = productName;
                    option.text = productName;
                    pronameSelect.appendChild(option);
                });
            });

        } else {
            // Create a new "three" container
            var newThreeContainer = document.createElement('div');
            newThreeContainer.className = 'threep-container';
            var newTenDiv = document.createElement('div');
             newTenDiv.className = 'ten d-flex';
             newTenDiv.innerHTML = `
            <label for="proname" class="form-font" style="margin-right:61px; font-weight:300;">Product Name:</label>
            <select name="proname[]" id="proname" class="form-control col-4 form-space ordering" style="margin-bottom:20px;">
            </select>`;
            var newTenoneDiv = document.createElement('div');
             newTenoneDiv.className = 'tenone d-flex';
             newTenoneDiv.innerHTML = `
            <label for="item_desc" class="form-space form-font" style="font-weight:300;">Product Description:</label>
            <input type="text" name="item_desc[]" class="form-space form-control col-4" style="margin-bottom:20px;"></input>
            `;
            var newFiveDiv = document.createElement('div');
             newFiveDiv.className = 'six d-flex';
             newFiveDiv.innerHTML = `
             <label for="quantity" class="form-space form-font" style="font-weight:300;">Quantity:</label>
             <input type="number" name="quantity[]" class="form-space form-control quantity">
             <label for="price" class="form-space form-font" style="font-weight:300;">Price:</label>
             <input type="number" name="price[]" class="form-space form-control price">
             <label for="amount" class="form-space form-font" style="font-weight:300">Amount:</label>
             <input type="text" name="amount[]" class="form-space form-control amount">
             <label for="advance" class="form-space form-font" style="font-weight:300;">Advance:</label>
             <input type="number" name="advance[]" id="advance" class="form-space form-control advance">
             <label for="due" class="form-space form-font" style="font-weight:300;">Due:</label>
             <input type="number" name="due[]" id="due" class="form-space form-control due"> 
             </div>
             `;
            newThreeContainer.appendChild(newTenDiv);
            newThreeContainer.appendChild(newTenoneDiv);
            newThreeContainer.appendChild(newFiveDiv);
            container.appendChild(newThreeContainer);

            fetchProductNames(function (productNames) {
                var pronameSelect = newTenDiv.querySelector('#proname');
                pronameSelect.innerHTML = ''; // Clear existing options

                // Populate the select element with product names
                productNames.forEach(function (productName) {
                    var option = document.createElement('option');
                    option.value = productName;
                    option.text = productName;
                    pronameSelect.appendChild(option);
                });
            });

        }
    }

    function removeRow(container) {
        var lastFourDiv = container.lastChild;

        if (lastFourDiv) {
            if (lastFourDiv.classList.contains('six')) {
                container.removeChild(lastFourDiv);
                lastFourDiv = container.lastChild;
            } else {
                container.removeChild(lastFourDiv);
            }
        }
    }

    // Event listener for "Add Row" link
    addRowButton.addEventListener('click', function () {
        addRow(placeOrderContainer);
    });
    addRowButton2.addEventListener('click', function () {
        addRow(receiveOrderContainer);
    });

    // Event listener for "Remove Row" link
    removeRowButton.addEventListener('click', function () {
        removeRow(placeOrderContainer);
    });
    removeRowButton2.addEventListener('click', function () {
        removeRow(receiveOrderContainer);
    });
});
