<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="./template/Template.css">
    <link rel="stylesheet" href="Settings.css">
    <title>Document</title>
</head>
<body>
    <?php include "template/Header.php"; ?>

    <div class="content-wrapper" style="min-height: 536.4px;">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Settings</h1>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid" id="settings-container">
                <div class="row" style="display:block;">
                    <nav class="nav nav-borders setting-sec">
                        <a class="nav-link1 active ac" href="#" data-target="account-section" id="acc">Profile</a>
                        <a class="nav-link1 ps" href="#" data-target="password-section" id="sec">Security</a>
                        <a class="nav-link1 pc" href="#" data-target="product-section" id="prot">Product Type</a>
                    </nav>
                    <hr class="mt-0 mb-4">
                </div>

                <div class="col-xl-8">
                    <!-- Account details card-->
                    <div class="card mb-4" id="account-section" style="margin-bottom:2rem;">
                        <div class="card-header">Account Details</div>
                        <div class="card-body">
                            <form id="account-form">
                                <!-- Form Group (username)-->
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputUsername">Username</label>
                                    <input class="form-control" name="username" id="username" type="text" placeholder="Enter your username">
                                </div>
                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (first name)-->
                                    <div class="col">
                                        <label class="small mb-1" for="inputFirstName">Company name</label>
                                        <input class="form-control" name="company_name" id="company_name" type="text" placeholder="Enter your first name">
                                    </div>
                                </div>
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (first name)-->
                                    <div class="col">
                                        <label class="small mb-1" for="inputFirstName">Address</label>
                                        <input class="form-control" name="address" id="address" type="text" placeholder="Enter your first name">
                                    </div>
                                </div>
                                <!-- Form Group (email address)-->
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputEmailAddress">Email address</label>
                                    <input class="form-control" name="email" id="email" type="email" placeholder="Enter your email address">
                                </div>
                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (phone number)-->
                                    <div class="col">
                                        <label class="small mb-1" for="inputPhone">Phone number</label>
                                        <input class="form-control" name="phone" id="phone" type="tel" placeholder="Enter your phone number">
                                    </div>
                                </div>
                                <!-- Save changes button-->
                                <button class="btn btn-primary" id="saveChangesBtn" type="button">Save changes</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-xl-8">
                    <!-- Change password card-->
                    <div class="card mb-4" id="password-section">
                        <div class="card-header">Change Password</div>
                        <div class="card-body">
                            <form id="change-password">
                                <!-- Form Group (current password)-->
                                <div class="mb-3">
                                    <label class="small mb-1" for="currentPassword">Current Password</label>
                                    <input class="form-control" name="old_password" id="currentPassword" type="password" placeholder="Enter current password">
                                </div>
                                <!-- Form Group (new password)-->
                                <div class="mb-3">
                                    <label class="small mb-1" for="newPassword">New Password</label>
                                    <input class="form-control" name="n1" id="newPassword" type="password" placeholder="Enter new password">
                                </div>
                                <!-- Form Group (confirm password)-->
                                <div class="mb-3">
                                    <label class="small mb-1" for="confirmPassword">Confirm Password</label>
                                    <input class="form-control" name="n2" id="confirmPassword" type="password" placeholder="Confirm new password">
                                </div>
                                <button class="btn btn-primary" type="submit">Save</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-xl-8">
                    <!-- Product Type details card-->
                    <div class="card mb-4" id="product-section">
                        <div class="card-header">Product Type Details</div>
                        <div class="card-body">
                            <form>
                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (first name)-->
                                    <div class="col-md-10 addp">
                                        <label class="small mb-1" for="inputFirstName">Add Product</label>
                                        <input class="form-control search-input" id="add-products" type="text" name="product_name">
                                        <ul class="dropdown-list" style="z-index:10; width:97.5%">
                                            <?php
                                                include './DatabaseConnection.php';
                                                $qry = "select product_name from products;";
                                                $res = mysqli_query($your_db_connection, $qry);
                                                if ($res->num_rows > 0){
                                                    while($row = $res->fetch_assoc()){
                                                        echo "<li>$row[product_name]</li>";
                                                    }
                                                }
                                            ?>
                                                <!-- Add your dropdown content here -->
                                        </ul>
                                    </div>
                                    <!-- Form Group (last name)-->
                                    <div class="col-md-2">
                                        <label for="" style="visibility:hidden;" class="small mb-1">Add</label>
                                        <button id="add-product-btn" value="Add" class="form-control addb" style="color:white; background-color:#007bff; border-color:#007bff">Add</button>
                                    </div>
                                </div>
                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (organization name)-->
                                    <div class="col-md-5 upp">
                                        <label class="small mb-1" for="inputOrgName">Update Product</label>
                                        <input class="form-control search-input" id="up-product" type="text">
                                        <ul class="dropdown-list" style="z-index:10; width:97.5%">
                                            <?php
                                                include './DatabaseConnection.php';
                                                $qry = "select product_name from products;";
                                                $res = mysqli_query($your_db_connection, $qry);
                                                if ($res->num_rows > 0){
                                                    while($row = $res->fetch_assoc()){
                                                        echo "<li>$row[product_name]</li>";
                                                    }
                                                }
                                            ?>
                                                <!-- Add your dropdown content here -->
                                        </ul>
                                    </div>
                                    <!-- Form Group (location)-->
                                    <div class="col-md-5">
                                        <label class="small mb-1" for="inputLocation" style="visibility:hidden;">Location</label>
                                        <input class="form-control" id="ch-product" type="text" placeholder="Update product">
                                    </div>
                                    <!-- Form Group (last name)-->
                                    <div class="col-md-2">
                                        <label for="" style="visibility:hidden;" class="small mb-1">Add</label>
                                        <button id="update-product" value="Add" class="form-control addb" style="color:white; background-color:#007bff; border-color:#007bff">Update</button>
                                    </div>
                                </div>
                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (first name)-->
                                    <div class="col-md-10 dep">
                                        <label class="small mb-1" for="inputFirstName">Delete Product</label>
                                        <input class="form-control search-input" id="de-product" type="text">
                                        <ul class="dropdown-list" style="z-index:10; width:97.5%">
                                            <?php
                                                include './DatabaseConnection.php';
                                                $qry = "select product_name from products;";
                                                $res = mysqli_query($your_db_connection, $qry);
                                                if ($res->num_rows > 0){
                                                    while($row = $res->fetch_assoc()){
                                                        echo "<li>$row[product_name]</li>";
                                                    }
                                                }
                                            ?>
                                                <!-- Add your dropdown content here -->
                                        </ul>
                                    </div>
                                    <!-- Form Group (last name)-->
                                    <div class="col-md-2">
                                        <label for="" style="visibility:hidden;" class="small mb-1">del</label>
                                        <button id="delete-product" value="Add" class="form-control addb" style="color:white; background-color:#007bff; border-color:#007bff">Delete</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>  
            </div>
        </section>
    </div>

    <?php include "./template/Footer.php"; ?>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script language="JavaScript" type="text/javascript" src="http://js/jquery-ui-personalized-1.5.2.packed.js"></script>
    <script language="JavaScript" type="text/javascript" src="http://js/sprinkle.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script type="module" src="./template/Template.js"></script>
    <script>
        $(document).ready(function () {
            // Initially hide sections
            $("#password-section, #product-section").hide();
            var lt = "account-section";

            // Handle click on navigation links
            $(".nav-link1").click(function (e) {
                e.preventDefault();
                var target = $(this).data("target");

                // Add "active" class to the clicked link
                $(this).addClass("active");
                if(typeof(target)=="undefined"){
                    target = lt;
                }

                // Hide all sections
                if(target=="password-section"){
                    $(".pc, .ac").removeClass("active");
                    $("#account-section, #product-section").hide();
                    lt = target;


                }
                else if(target=="product-section"){
                    $(".ac, .ps").removeClass("active");
                    $("#account-section, #password-section").hide();
                    lt = target;
                }
                else{
                    $(".ps, .pc").removeClass("active");
                    $("#password-section, #product-section").hide();
                    lt = target;
                }
                

                // Show the selected section
                $("#" + target).show();
            });
        });
    </script>
    <script>
    $(document).ready(function () {

    // Show dropdown when clicking on the search box in the "name" class
    $(".addp .search-input").on("click", function (event) {
        event.stopPropagation(); // Prevent the click from reaching the document
        $(this).closest(".addp").find(".dropdown-list").show();
    });

    // Hide dropdown when clicking outside of it
    $(document).click(function (event) {
        if (!$(event.target).closest('.addp .search-input, .addp .dropdown-list').length) {
            $(".addp .dropdown-list").hide();
        }
    });

    // Handle search functionality
    $(".search-input").on("input", function () {
        var searchTerm = $(this).val().toLowerCase();
        var dropdownList = $(this).siblings(".dropdown-list");
        dropdownList.find("li").each(function () {
            var text = $(this).text().toLowerCase();
            $(this).toggle(text.includes(searchTerm));
        });
    });

    // Handle option selection
    $(".dropdown-list li").on("click", function () {
        var selectedValue = $(this).text();
        var dropdown = $(this).closest(".addp");
        dropdown.find(".search-input").val(selectedValue);
        // dropdown.hide();
    });
});
</script>
    
<script>
    $(document).ready(function () {
        // Handle form submission using Ajax
        $("#add-product-btn").click(function (e) {
            e.preventDefault(); // Prevent the form from submitting in the traditional way

            // Get the value from the input field
            var productName = $("#add-products").val();

            // Use Ajax to send the value to the server
            $.ajax({
                type: "POST",
                url: "addProduct.php", // Change this to the actual server-side processing script
                data: { product_name: productName },
                success: function (response) {
                    if(response==1){
                                    Swal.fire(
                                    'Great!',
                                    'Your product has been added.',
                                    'success'
                                    ).then(function () {
                                        // Reload the page after showing SweetAlert
                                        location.reload();
                                    });
                                }
                                else{
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Oops...',
                                        text: 'Something went wrong!'
                                    })
                                }
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function () {

    // Show dropdown when clicking on the search box in the "name" class
    $(".upp .search-input").on("click", function (event) {
        event.stopPropagation(); // Prevent the click from reaching the document
        $(this).closest(".upp").find(".dropdown-list").show();
    });

    // Hide dropdown when clicking outside of it
    $(document).click(function (event) {
        if (!$(event.target).closest('.upp .search-input, .upp .dropdown-list').length) {
            $(".upp .dropdown-list").hide();
        }
    });

    // Handle search functionality
    $(".search-input").on("input", function () {
        var searchTerm = $(this).val().toLowerCase();
        var dropdownList = $(this).siblings(".dropdown-list");
        dropdownList.find("li").each(function () {
            var text = $(this).text().toLowerCase();
            $(this).toggle(text.includes(searchTerm));
        });
    });

    // Handle option selection
    $(".dropdown-list li").on("click", function () {
        var selectedValue = $(this).text();
        var dropdown = $(this).closest(".upp");
        dropdown.find(".search-input").val(selectedValue);
        // dropdown.hide();
    });
});
</script>

<script>
    $(document).ready(function () {
        // Handle form submission using Ajax
        $("#update-product").click(function (e) {
            console.log("jyguyg");
            e.preventDefault(); // Prevent the form from submitting in the traditional way

            // Get the value from the input field
            var productName1 = $("#up-product").val();
            var productName2 = $("#ch-product").val();

            // Use Ajax to send the value to the server
            $.ajax({
                type: "POST",
                url: "updateProduct.php", // Change this to the actual server-side processing script
                data: { product_name: productName1, ch_product:productName2 },
                success: function (response) {
                    if(response==1){
                                    Swal.fire(
                                    'Great!',
                                    'Your product has been updated.!',
                                    'success'
                                    ).then(function () {
                                        // Reload the page after showing SweetAlert
                                        location.reload();
                                    });
                                }
                                else{
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Oops...',
                                        text: 'Something went wrong!'
                                    })
                                }
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function () {

    // Show dropdown when clicking on the search box in the "name" class
    $(".dep .search-input").on("click", function (event) {
        event.stopPropagation(); // Prevent the click from reaching the document
        $(this).closest(".dep").find(".dropdown-list").show();
    });

    // Hide dropdown when clicking outside of it
    $(document).click(function (event) {
        if (!$(event.target).closest('.dep .search-input, .dep .dropdown-list').length) {
            $(".dep .dropdown-list").hide();
        }
    });

    // Handle search functionality
    $(".search-input").on("input", function () {
        var searchTerm = $(this).val().toLowerCase();
        var dropdownList = $(this).siblings(".dropdown-list");
        dropdownList.find("li").each(function () {
            var text = $(this).text().toLowerCase();
            $(this).toggle(text.includes(searchTerm));
        });
    });

    // Handle option selection
    $(".dropdown-list li").on("click", function () {
        var selectedValue = $(this).text();
        var dropdown = $(this).closest(".dep");
        dropdown.find(".search-input").val(selectedValue);
        // dropdown.hide();
    });
});
</script>

<script>
    $(document).ready(function () {
        // Handle form submission using Ajax
        $("#delete-product").click(function (e) {
            console.log("jyguyg");
            e.preventDefault(); // Prevent the form from submitting in the traditional way

            // Get the value from the input field
            var productName1 = $("#de-product").val();
            if(productName1!=""){
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "POST",
                            url: "deleteProduct.php",
                            data: {
                                product_name: productName1,
                            },
                            success: function (response) {
                                if(response==1){
                                    Swal.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                    ).then(function () {
                                        // Reload the page after showing SweetAlert
                                        location.reload();
                                    });
                                }
                                else{
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Oops...',
                                        text: 'Something went wrong!'
                                    })
                                }
                            }
                        });
                    }
                })
            }
        });
    });
</script>

<script>
$(document).ready(function() {
    // Function to check if the element has the class "active"
    function checkActiveClass() {
        var element = $("#acc");

        // Check if the element has a class named "active"
        if (element.hasClass("active")) {
            $.ajax({
                type: "GET",
                url: "get_acc_data.php", // Replace with your server-side script
                dataType: "json",
                success: function(response) {
                    // Update form fields with the retrieved data
                    $("#username").val(response.username);
                    $("#company_name").val(response.company_name);
                    $("#address").val(response.address);
                    $("#email").val(response.email);
                    $("#phone").val(response.phone);
                },
                error: function() {
                    alert("Error fetching user data");
                }
            });
        } else {
            console.log("The element does not have the class 'active'");
        }
    }

    // Check on page load
    checkActiveClass();

    // Event listener for click on any element
    $(document).on('click', function() {
        // Check when any element is clicked
        checkActiveClass();
    });
});
</script>

<script>
    $(document).ready(function () {
    $("#saveChangesBtn").click(function () {
        // Create FormData object
        var formData = new FormData(document.getElementById("account-form"));

        // Submit the form using AJAX
        $.ajax({
            type: "POST",
            url: "login_changes.php", // Replace with your backend script URL
            data: formData,
            processData: false,  // Prevent jQuery from automatically processing the data
            contentType: false,  // Prevent jQuery from setting the content type
            success: function (response) {
                // Handle the success response
                if(response){
                    Swal.fire(
                        'Great!',
                        'Your information has been updated.!',
                        'success'
                        ).then(function () {
                            // Reload the page after showing SweetAlert
                            location.reload();
                    });
                }
                else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!'
                    })
                }
            },
            error: function (error) {
                // Handle the error response
                console.log(error);
            }
        });
    });
});

</script>

<script>
$(document).ready(function() {
    // Event listener for the form submission
    $("#change-password").submit(function(event) {
        // Prevent the default form submission
        event.preventDefault();

        // Collect form data
        var formData = {
            old_password: $("#currentPassword").val(),
            n1: $("#newPassword").val(),
            n2: $("#confirmPassword").val()
        };

        // Send AJAX request
        $.ajax({
            type: "POST",
            url: "change_password.php", // Replace with the actual path to your PHP file
            data: formData,
            success: function(response) {
                console.log(response);
                // Handle the successful response from the server
                if(response==1){
                    Swal.fire(
                        'Great!',
                        'Your password has been updated.!',
                        'success'
                        ).then(function () {
                            // Reload the page after showing SweetAlert
                            location.reload();
                    });
                }
                else if(response==2){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: "Password doesn't match!"
                    })
                }
                else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Password is not correct!'
                    })
                }
            },
            error: function(error) {
                // Handle errors
                console.log("Error:", error);
            }
        });
    });
});
</script>

</body>
</html>
