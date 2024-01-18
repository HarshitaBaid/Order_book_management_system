<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="./template/Template.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="AddOrders.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Diphylleia&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <?php
        include "./template/Header.php";
    ?>

<div class="content-wrapper" style="min-height: 217.4px;">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 d-flex">
                    <button class="btn btn-block btn-outline-info active" id="placeOrderBtn" style="width:fit-content; margin-right: 20px;">Place Order</button>
                    <button class="m-0 btn btn-block btn-outline-info" id="receiveOrderBtn" style="width:fit-content;">Receive Order</button>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <form action="./Backend/PlaceOrderForm.php" method="post" id="placeOrderForm" onsubmit="return validateForm()">
                <div class="row">
                    <div class="buyer" style="padding:20px 10px; width:-webkit-fill-available; background-color: #ebe8e8;">
                        <p class="pdetails form-space" style="margin-top:0px;">Sender's Details:</p>
                        <div class="one d-flex justify-content-between" style="width:-webkit-fill-available; padding-left:10px;">
                            <div>
                                <span class="form-font">First Name:</span>
                                <input type="text" name="fname" id="fname" class="adjust form-space form-control" oninput="updateBuyerDetails(this.value)">
                            </div>
                            <div>
                                <span class="form-font">Last Name:</span>
                                <input type="text" name="lname" id="lname" class="adjust form-control form-space">
                            </div>
                            <div>
                                <span class="form-font">Phone:</span>
                                <input type="tel" name="phone" id="phone" class="adjust form-control form-space">
                            </div>
                            <div>
                                <span class="form-font">Order Date:</span>
                                <input type="date" name="order_date" id="order_date" class="adjust form-control form-space" value="<?php echo date('Y-m-d'); ?>">
                            </div>
                            <div>
                                <span class="form-font">Last Date:</span>
                                <input type="date" name="last_date" id="last_date" class="form-control form-space" value="<?php echo date('Y-m-d'); ?>" onchange="updateLastDateMin()">
                                <p id="warning" style="color: red; margin-top: 2px; font-size:12px; margin-bottom:0rem;"></p>
                            </div>
                            <br>
                        </div>

                        <div class="second d-flex" style="margin-top:20px; width:-webkit-fill-available; padding-left:10px;">
                            <div>
                            <span class="form-font">Address:</span>
                            <input type="text" name="address" id="address" class="adjust form-control form-space">
                            </div>
                        </div>
                    </div>

                    <div class="three row justify-content-between" style="display:flex; width:-webkit-fill-available;">
                        <hr>
                        <p class="pdetails form-space" style="padding:20px;">Product Details:</p>
                        <a href="#" class="ml-auto form-space" id="addRow1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                            </svg>
                        </a>
                        <a href="#" class="form-space" id="removeRow1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>
                            </svg>
                        </a>
                    </div>     
                    
                    <div class="four-container" id="place-order-container" style="width:-webkit-fill-available; padding-left:15px;">
                        <div class="four d-flex">
                            <label for="proname" style="margin-right:61px; font-weight:300;" class="form-font">Product Name:</label>
                            <?php
                                include './DatabaseConnection.php';
                                $query = "SELECT product_name FROM products where username='".$_SESSION['username']."';";
                                $result = mysqli_query($your_db_connection, $query);

                                if (!$result) {
                                    die('Error in query: ' . mysqli_error($your_db_connection));
                                }

                                $productNames = array();
                                // Fetch product names from the result set
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $productNames[] = $row['product_name'];
                                }
                                echo '<select name="proname[]" id="proname" class="form-space form-control col-4 ordering">';
                                for ($i=0; $i<count($productNames); $i++){
                                    // echo $productNames[$i];
                                    echo '<option>'.$productNames[$i].'</option>';
                                }
                                echo '</select>';
                            ?>
                        </div>

                        <div class="nine d-flex" style="margin-bottom:20px;">
                            <label for="item_desc" class="form-space form-font" style="font-weight:300;">Product Description:</label>
                            <input type="text" name="item_desc[]" id="item_desc" class="form-space form-control col-4">
                        </div>

                        <div class="six d-flex" style="margin-bottom:20px;">
                        <label for="quantity" class="form-space form-font" style="font-weight:300;">Quantity:</label>
                            <input type="number" name="quantity[]" id="quantity" class="form-space form-control quantity">
                            <label for="price" class="form-space form-font" style="font-weight:300;">Price:</label>
                            <input type="number" name="price[]" class="form-space form-control price" id="price">
                            <label for="amount" class="form-space form-font" style="font-weight:300;">Amount:</label>
                            <input type="text" name="amount[]" class="form-space form-control amount" readonly>
                            <label for="advance" class="form-space form-font" style="font-weight:300;">Advance:</label>
                            <input type="number" name="advance[]" id="advance" class="form-space form-control advance">
                            <label for="due" class="form-space form-font" style="font-weight:300;">Due:</label>
                            <input type="number" name="due[]" id="due" class="form-space form-control due" readonly>
                        </div>
                    </div>

                    <div class="seven d-flex" style="padding:15px;">
                        <input type="submit" value="Submit" class="btn btn-block btn-primary">
                    </div>
                </div>
            </form>

            <form id="receiveOrderForm" style="display:none;">
                <div class="row">
                <div class="buyer" style="padding:20px 10px; width:-webkit-fill-available; background-color: #ebe8e8;">
                        <p class="pdetails form-space" style="margin-top:0px;">Sender's Details:</p>
                        <div class="one d-flex justify-content-between" style="width:-webkit-fill-available; padding-left:10px;">
                            <div>
                                <span class="form-font">First Name:</span>
                                <input type="text" name="fname" id="fname" class="adjust form-space form-control">
                            </div>
                            <div>
                                <span class="form-font">Last Name:</span>
                                <input type="text" name="lname" id="lname" class="adjust form-control form-space">
                            </div>
                            <div>
                                <span class="form-font">Phone:</span>
                                <input type="tel" name="phone" id="phone" class="adjust form-control form-space">
                            </div>
                            <div>
                                <span class="form-font">Order Date:</span>
                                <input type="date" name="odate" id="order_date" class="adjust form-control form-space" value="<?php echo date('Y-m-d'); ?>">
                            </div>
                            <div>
                                <span class="form-font">Address:</span>
                                <input type="text" name="address" id="address" class="adjust form-control form-space">
                            </div>
                            <br>
                        </div>
                    </div>

                    <div class="three row justify-content-between" style="display:flex; width:-webkit-fill-available;">
                        <hr style="margin-bottom:2rem;">
                        <p class="pdetails form-space" style="padding-left:23px;">Product Details:</p>
                        <a href="#" class="ml-auto form-space" id="addRow2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                            </svg>
                        </a>
                        <a href="#" class="form-space" id="removeRow2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>
                            </svg>
                        </a>
                    </div>

                    <div class="four-container" id="receive-order-container" style="width:-webkit-fill-available;">
                    <div class="three-container">
                        <div class="four d-flex">
                        <label for="order_type" id="order-label" style="margin-right:47px; font-weight:300;" class="form-font">Order Type:</label>
                        <select name="otype[]" class="form-control col-4 order_type ordering form-font" style="width:auto; font-weight:400">
                            <option value="manufacturer">Manufacturer</option>
                            <option value="sale">Sale</option>
                            <option value="rent">Rent</option>
                        </select>      
                        </div>

                        <div class="nine d-flex" style="margin-bottom:20px;">
                        <label for="proname" class="form-space form-font" style="font-weight:300;">Product Name:</label>
                        <?php
                                include './DatabaseConnection.php';
                                $query = "SELECT product_name FROM products where username='".$_SESSION['username']."'";
                                $result = mysqli_query($your_db_connection, $query);

                                if (!$result) {
                                    die('Error in query: ' . mysqli_error($your_db_connection));
                                }

                                $productNames = array();
                                // Fetch product names from the result set
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $productNames[] = $row['product_name'];
                                }
                                echo '<select name="proname[]" id="proname" class="form-space form-control">';
                                for ($i=0; $i<count($productNames); $i++){
                                    // echo $productNames[$i];
                                    echo '<option>'.$productNames[$i].'</option>';
                                }
                                echo '</select>';
                            ?>
                            <label for="item_desc" class="form-space form-font" style="font-weight:300;">Product Description:</label>
                            <input type="text" name="item_desc[]" id="item_desc" class="form-space form-control">
                            <label for="order_date" class="form-space last_date form-font" style="font-weight:300;">Last Date:</label>
                            <div>
                            <input type="date" name="ldate[]" id="last_date" class="form-control form-space last_date" value="<?php echo date('Y-m-d'); ?>" onchange="updateLastDateMin2()">
                            </div>
                        </div>

                        <div class="six d-flex" style="margin-bottom:20px;">
                            <label for="quantity" class="form-space form-font" style="font-weight:300;">Quantity:</label>
                            <input type="number" name="quantity[]" id="quantity" class="form-space form-control rquantity">
                            <label for="price" class="form-space form-font" style="font-weight:300">Price:</label>
                            <input type="number" name="price[]" class="form-space form-control rprice" id="price">
                            <label for="amount" class="form-space form-font" style="font-weight:300;">Amount:</label>
                            <input type="text" name="amount[]" class="form-space form-control ramount" readonly>
                            <label for="advance" class="form-space form-font" style="font-weight:300;">Advance:</label>
                            <input type="number" name="advance[]" id="advance" class="form-space form-control advance">
                            <label for="due" class="form-space form-font" style="font-weight:300;">Due:</label>
                            <input type="number" name="due[]" id="due" class="form-space form-control due" readonly>
                        </div>

                        <div class="rent-switching" style="margin-bottom:20px; margin-right:0px;">
                            <label for="from" class="form-space form-font" style="font-weight:300;">From:</label>
                            <input type="date" name="from_date[]" id="from" class="col-5 form-space form-control">
                            <label for="to" class="form-space form-font" style="font-weight:300;">To:</label>
                            
                            <input type="date" name="to_date[]" id="to" class="col-5 form-space form-control" onchange="updateLastDateMin3()">
                        </div>
                        <div>
                            <p id="warning2" style="color: red; font-size:12px; margin-bottom:0rem; float:inline-end; margin-right:4.5rem;"></p>
                            </div>
                        </div>
                    </div>

                    <div class="eight d-flex" style="margin:20px 0px; padding-left:15px;">
                        <input type="button" value="Submit" class="btn btn-block btn-primary" onclick="submitForm()">
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>

<?php
    include "./template/Footer.php";
?>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script language="JavaScript" type="text/javascript"
        src="http://js/jquery-ui-personalized-1.5.2.packed.js"></script>
    <script language="JavaScript" type="text/javascript" src="http://js/sprinkle.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="module" src="./template/Template.js"></script>
    <script src="./AddOrders-js/PlaceAmount.js"></script>
    <script type="module" src="./AddOrders-js/ReceiveAmount.js"></script>
    <script src="./AddOrders-js/PlaceReceive.js"></script>
    <script src="./AddOrders-js/PlusAndMinus.js"></script>
    <!-- <script src="./AddOrders-js/LastDate.js"></script> -->
    <script src="./AddOrders-js/RentSwitching.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        // Function to submit the form using AJAX
        function submitForm() {
            var receiveOrderFormId = "receiveOrderForm"; // Replace with the actual ID of your form
valD(receiveOrderFormId).then(function (isValid) {
    if (isValid) {
        // Do something when the validation is successful
        sendD();
    }
});

        }

        function valD(formId) {
    return new Promise(function (resolve, reject) {
        // Get the form element by ID
        var form = document.getElementById(formId);

        // Validate Sender's Details
        var fname1 = form.querySelector("#fname").value;
        var lname1 = form.querySelector("#lname").value;
        var phone1 = form.querySelector("#phone").value;
        var orderDate1 = form.querySelector("#order_date").value;

        // Validate Product Details
        var itemDesc = form.querySelector("#item_desc").value;
        var quantity = form.querySelector("#quantity").value;
        var price = form.querySelector("#price").value;

        console.log(fname1);
        console.log(lname1);
        console.log(phone1);
        console.log(orderDate1);

        // Validate Sender's Details
        if (fname1 === "" || lname1 === "" || phone1 === "" || orderDate1 === "") {
            alert("Please fill out all Sender's Details fields.");
            resolve(false);
        }

        // Validate Product Details
        else if (itemDesc === "" || quantity === "" || price === "") {
            // counting = counting + 1;
            alert("Please fill out all Product Details fields.");
            resolve(false);
        }

        // Check if fname contains numbers or special symbols
        else if (!/^[a-zA-Z]+$/.test(fname1) || !/^[a-zA-Z]+$/.test(lname1)) {
            // counting = counting + 1;
            alert("Username should only contain letters.");
            resolve(false);
        }

        else if (phone1.length > 10) {
            // counting = counting + 1;
            alert("Please enter correct phone number.");
            resolve(false);
        }

        // If all validations pass
        resolve(true);
    });
}


        function sendD(){
            var formData = $('#receiveOrderForm').serialize();
            $.ajax({
                type: 'POST',
                url: './Backend/ReceiveOrderForm.php',
                data: formData,
                success: function (response) {
                    console.log(response);
                    // Display SweetAlert upon successful form submission
                    Swal.fire({
                        title: 'Great!',
                        text: 'Form submitted successfully!',
                        icon: 'success',
                    }).then(function () {
                        location.reload();
                    });
                },
                error: function (error) {
                    Swal.fire({
                        title: 'Error!',
                        text: 'Form submission failed. Please try again.',
                        icon: 'error',
                    });
                }
            });
        }

        // Attach the submitForm function to the form submission event
        $('#receiveOrderForm').submit(function (e) {
            e.preventDefault(); // Prevent the default form submission
            submitForm(); // Call the submitForm function
        });
    </script>

<script>
    // Function to submit the form using AJAX
    function submitForm1() {
        validateData().then(function (isValid) {
            if (isValid) {
                sendData();
            }
        });
    }

    function validateData() {
        return new Promise(function (resolve, reject) {
            // Validate Sender's Details
            var fname = document.getElementById("fname").value;
            var lname = document.getElementById("lname").value;
            var phone = document.getElementById("phone").value;
            var orderDate = document.getElementById("order_date").value;
            var lastDate = document.getElementById("last_date").value;

            // Validate Product Details
            var itemDesc = document.getElementById("item_desc").value;
            var quantity = document.getElementById("quantity").value;
            var price = document.getElementById("price").value;
            var advance = document.getElementById("advance").value;

            // Validate Sender's Details
            if (fname === "" || lname === "" || phone === "" || orderDate === "" || lastDate === "") {
                alert("Please fill out all Sender's Details fields.");
                resolve(false);
            }

            // Validate Product Details
            else if (itemDesc === "" || quantity === "" || price === "") {
                // counting = counting + 1;
                alert("Please fill out all Product Details fields.");
                resolve(false);
            }

            // Check if fname contains numbers or special symbols
            else if (!/^[a-zA-Z]+$/.test(fname) || !/^[a-zA-Z]+$/.test(lname)) {
                // counting = counting + 1;
                alert("Username should only contain letters.");
                resolve(false);
            }

            else if (phone.length > 10) {
                // counting = counting + 1;
                alert("Please enter correct phone number.");
                resolve(false);
            }

            // If all validations pass
            resolve(true);
        });
    }

    function sendData() {
        var formData = $('#placeOrderForm').serialize();
        $.ajax({
            type: 'POST',
            url: './Backend/PlaceOrderForm.php',
            data: formData,
            success: function (response) {
                // Display SweetAlert upon successful form submission
                Swal.fire({
                    title: 'Great!',
                    text: 'Form submitted successfully!',
                    icon: 'success',
                }).then(function () {
                    // Reload the page after showing SweetAlert
                    location.reload();
                });
            },
            error: function (error) {
                // Handle error if the form submission fails
                Swal.fire({
                    title: 'Error!',
                    text: 'Form submission failed. Please try again.',
                    icon: 'error',
                });
            }
        });
    }

    function validateForm() {
        var amounts = document.getElementsByName("amount[]");
        var advances = document.getElementsByName("advance[]");
        var dues = document.getElementsByName("due[]");

        for (var i = 0; i < amounts.length; i++) {
            var amount = parseFloat(amounts[i].value);
            var advance = parseFloat(advances[i].value);
            var due = parseFloat(dues[i].value);

            if (advance > amount) {
                alert("Advance cannot exceed the Amount product no. " + (i + 1));
                return false; // Prevent form submission
            } else if (due > amount) {
                alert("Advance cannot exceed the Amount product no. " + (i + 1));
                return false; // Prevent form submission
            }
        }

        warning.innerHTML = ""; // Clear any previous warning
        return true; // Allow form submission
    }

    // Attach the submitForm function to the form submission event
    $('#placeOrderForm').submit(function (e) {
        e.preventDefault(); // Prevent the default form submission
        var a = validateForm();
        if (a) {
            submitForm1(); // Call the submitForm function
        }
    });
</script>


<script>
    function updateBuyerDetails(firstName) {
    // Use AJAX to fetch details from the server
    var xhr = new XMLHttpRequest();
    console.log(xhr.responseText);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var details = JSON.parse(xhr.responseText);

            // Update the form fields with the retrieved details
            document.getElementById('lname').value = details.lname;
            document.getElementById('phone').value = details.phone;
            document.getElementById('address').value = details.address;
        }
    };
    // Send a request to your server-side script to fetch details
    xhr.open('GET', 'FetchDetailsByFirstName.php?firstName=' + encodeURIComponent(firstName), true);
    xhr.send();
}
</script>

<script>
    $(document).ready(function() {
        // Use jQuery to bind the updateBuyerDetails function to the input event of the fname field
        $('#receiveOrderForm #fname').on('input', function() {
            var firstName = $(this).val();
            updateBuyerDetails(firstName);
        });

    function updateBuyerDetails(firstName) {
        // Use jQuery to make an AJAX request
        $.ajax({
            url: 'RFetchDetailsByFirstName.php',
            type: 'GET',
            data: { firstName: firstName },
            dataType: 'json',
            success: function(details) {
                // Update the form fields with the retrieved details
                $('#receiveOrderForm #lname').val(details.lname);
                $('#receiveOrderForm #phone').val(details.phone);
                $('#receiveOrderForm #address').val(details.address);
            },
            error: function(xhr, status, error) {
                console.error('AJAX request failed:', status, error);
            }
        });
    }
});
</script>

<script>
    function calculateDue(input) {
        var row = input.closest(".six");
        var amount;
        var advance;
        if(input.closest("#receiveOrderForm")){
            amount = parseFloat(row.querySelector(".ramount").value) || 0;
            advance = parseFloat(row.querySelector(".advance").value) || 0;
        }
        else if(input.closest("#placeOrderForm")){
            amount = parseFloat(row.querySelector(".amount").value) || 0;
            advance = parseFloat(row.querySelector(".advance").value) || 0;
        }

        var due = amount - advance;
        if (due < 0) {
            due = 0; // Ensure that due is non-negative
        }

        // Update the value of the corresponding "Due" field
        var dueInput = row.querySelector(".due");
        if (dueInput) {
            dueInput.value = due.toFixed(2);
            console.log("Due value updated: ", due.toFixed(2));
        } else {
            console.error("Due input is undefined");
            console.log("Amount: ", amount);
            console.log("Advance: ", advance);
        }
    }

    // Add event listeners to the "Amount" and "Advance" fields to trigger calculation
    document.addEventListener("input", function (event) {
        var target = event.target;
        if (target.classList.contains("amount") || target.classList.contains("advance")) {
            calculateDue(target);
        }
    });
</script>

</body>
</html>