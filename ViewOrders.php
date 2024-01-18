<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="./template/Template.css">
    <link rel="stylesheet" href="ViewOrders.css">
    <title>Document</title>
</head>
<body>
    <?php
        include "./template/Header.php";
        include "./DatabaseConnection.php";
        // session_start();
    ?>

    <div class="content-wrapper" style="min-height: 217.4px;">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12 d-flex">
                       <h4> View Orders</h4>
                       <div class="d-flex mbtn" style="margin-left:auto;">
                       <button onclick="downloadExcel()" class="btn-success btn download-btn btn-sm" style=" margin-right:1rem; border-radius:15px; padding:0px 15px;">Download Excel</button>
                       <button type="button" class="btn btn-danger btn-sm clearall-btn clear-btn">Clear All Filters</button>
                       </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <table class="table table-hover table-bordered" id="excel-table">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Order Type</th>
                                        <th scope="col">Product Decsription</th>
                                        <th scope="col">Order Date</th>
                                        <th scope="col">Completion Date</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Advance</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Edit</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="filter-row">
                                        <td class="idd"></td>
                                        <td class="name"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-funnel" viewBox="0 0 16 16" style="float:inline-end;">
                                        <path d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5zm1 .5v1.308l4.372 4.858A.5.5 0 0 1 7 8.5v5.306l2-.666V8.5a.5.5 0 0 1 .128-.334L13.5 3.308V2z"/>
                                        </svg>
                                        <!-- ... (your existing HTML code) ... -->
                                        <div class="custom-dropdown">
                                            <input type="text" class="search-input" placeholder="Search...">
                                            <ul class="dropdown-list">
                                                <?php
                                                    $qry = "select fname from receiveorder;";
                                                    $res = mysqli_query($your_db_connection, $qry);
                                                    if ($res->num_rows > 0){
                                                        while($row = $res->fetch_assoc()){
                                                            echo "<li>$row[fname]</li>";
                                                        }
                                                    }
                                                ?>
                                                <!-- Add your dropdown content here -->
                                            </ul>
                                        </div>
                                        </td>
                                        <td class="proname"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-funnel" viewBox="0 0 16 16" style="float:inline-end;">
                                        <path d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5zm1 .5v1.308l4.372 4.858A.5.5 0 0 1 7 8.5v5.306l2-.666V8.5a.5.5 0 0 1 .128-.334L13.5 3.308V2z"/>
                                        </svg>
                                        <!-- ... (your existing HTML code) ... -->
                                        <div class="custom-dropdown">
                                            <input type="text" class="search-input" placeholder="Search...">
                                            <ul class="dropdown-list">
                                                <?php
                                                    $qry = "select product_name from products where username='".$_SESSION['username']."';";
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
                                        </td>
                                        <td class="otype"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-funnel" viewBox="0 0 16 16" style="float:inline-end;">
                                        <path d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5zm1 .5v1.308l4.372 4.858A.5.5 0 0 1 7 8.5v5.306l2-.666V8.5a.5.5 0 0 1 .128-.334L13.5 3.308V2z"/>
                                        </svg>
                                        <div class="custom-dropdown">
                                            <input type="text" class="search-input" placeholder="Search...">
                                            <ul class="dropdown-list">
                                                <li>Manufacturer</li>
                                                <li>Sale</li>
                                                <li>Rent</li>
                                                <!-- Add your dropdown content here -->
                                            </ul>
                                        </div>
                                    </td>
                                        <td class="pdesc"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-funnel" viewBox="0 0 16 16" style="float:inline-end;">
                                        <path d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5zm1 .5v1.308l4.372 4.858A.5.5 0 0 1 7 8.5v5.306l2-.666V8.5a.5.5 0 0 1 .128-.334L13.5 3.308V2z"/>
                                        </svg>
                                        <div class="custom-search">
                                            <input type="text" class="search-input" placeholder="Search...">
                                        </div>
                                    </td>
                                    <td class="odate"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-funnel" viewBox="0 0 16 16" style="float:inline-end;">
                                        <path d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5zm1 .5v1.308l4.372 4.858A.5.5 0 0 1 7 8.5v5.306l2-.666V8.5a.5.5 0 0 1 .128-.334L13.5 3.308V2z"/>
                                        </svg>
                                        <div class="popup2" id="pop2">
                                            <div class="popup-content">
                                            <!-- <form action="./Backend/OrderDateForm.php" method="post" id="amount-form" onsubmit="return validateForm()"> -->
                                                <div id="warning-message" style="display: none; color: red; text-align: center; margin-bottom:10px; font-size:13px;">
                                                    Please select dates
                                                </div>
                                                <div class="fix bottom-margin" style="display:flex;">
                                                    <span class="popup-amount form-space">Particular:</span>
                                                        <input type="date" name="fixed_order_date" id="fixed_order_date" class="date-class">
                                                </div>

                                                <div class="less bottom-margin" style="display:flex;">
                                                    <span class="popup-amount form-space">From:</span>
                                                        <input type="date" name="from_order_date" id="from_order_date" class="date-class" style="margin-left:2rem;">
                                                </div>

                                                <div class="greater bottom-margin" style="display:flex;">
                                                    <span class="popup-amount form-space">To:</span>
                                                        <input type="date" name="to_order_date" id="to_order_date" style="margin-left:3.3rem;" class="date-class">
                                                </div>
                                                <input type="button" value="Confirm" class="confirm-btn" id="cb" onclick="validateFormOrder()">
                                            <!-- </form> -->
                                                <span class="close-popup">&times;</span>
                                                <!-- Add close button or any other content you need -->
                                                <!-- You can add additional content or form elements for range selection -->
                                            </div>
                                        </div>
                                    </td>
                                        <td class="cdate"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-funnel" viewBox="0 0 16 16" style="float:inline-end;">
                                        <path d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5zm1 .5v1.308l4.372 4.858A.5.5 0 0 1 7 8.5v5.306l2-.666V8.5a.5.5 0 0 1 .128-.334L13.5 3.308V2z"/>
                                        </svg>
                                        <div class="popup3">
                                            <div class="popup-content">
                                            <!-- <form action="" method="post" id="amount-form"> -->
                                                <div id="warning-message1" style="display: none; color: red; text-align: center; margin-bottom:10px; font-size:13px;">
                                                    Please select dates
                                                </div>
                                                <div class="fix bottom-margin" style="display:flex;">
                                                    <span class="popup-amount form-space">Particular:</span>
                                                        <input type="date" name="fixed_complete_date" id="fixed_complete_date" class="date-class">
                                                </div>
                                                <div class="less bottom-margin" style="display:flex;">
                                                    <span class="popup-amount form-space">From:</span>
                                                        <input type="date" name="from_complete_date" id="from_complete_date" class="date-class" style="margin-left:2rem;">
                                                </div>

                                                <div class="greater bottom-margin" style="display:flex;">
                                                    <span class="popup-amount form-space">To:</span>
                                                        <input type="date" name="to_complete_date" id="to_complete_date" style="margin-left:3.3rem;" class="date-class">
                                                </div>
                                                <input type="button" value="Confirm" class="confirm-btn" id="cb1" onclick="validateFormComplete()">
                                            <!-- </form> -->
                                                <span class="close-popup">&times;</span>
                                                <!-- Add close button or any other content you need -->
                                                <!-- You can add additional content or form elements for range selection -->
                                            </div>
                                        </div>
                                    </td>
                                        <td class="amount"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-funnel" viewBox="0 0 16 16" style="float:inline-end;">
                                        <path d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5zm1 .5v1.308l4.372 4.858A.5.5 0 0 1 7 8.5v5.306l2-.666V8.5a.5.5 0 0 1 .128-.334L13.5 3.308V2z"/>
                                        </svg>
                                        <div class="popup1">
                                            <div class="popup-content">
                                            <!-- <form action="" method="post" id="amount-form"> -->
                                                <!-- Content of the pop-up goes here -->
                                                <div id="warning-message2" style="display: none; color: red; text-align: center; margin-bottom:10px; font-size:13px;">
                                                    Please select dates
                                                </div>
                                                <div class="exact bottom-margin" style="display:flex;">
                                                    <span class="popup-amount form-space">Particular amount:</span>
                                                        <input type="number" name="exact_amount" id="exact_amount" style="margin-left:1.5rem;">
                                                </div>

                                                <div class="less bottom-margin" style="display:flex;">
                                                    <span class="popup-amount form-space">Amount less than:</span>
                                                        <input type="number" name="less_than_amount" id="less_than_amount" style="margin-left:1.7rem;">
                                                </div>

                                                <div class="greater bottom-margin" style="display:flex;">
                                                    <span class="popup-amount form-space">Amount greater than:</span>
                                                        <input type="number" name="greater_than_amount" id="greater_than_amount">
                                                </div>
                                                <input type="button" value="Confirm" class="confirm-btn" id="cb2" onclick="validateFormAmount()">
                                            <!-- </form> -->
                                                <span class="close-popup">&times;</span>
                                                <!-- Add close button or any other content you need -->
                                                <!-- You can add additional content or form elements for range selection -->
                                            </div>
                                        </div>

                                        </td>
                                        <td class="advance"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-funnel" viewBox="0 0 16 16" style="float:inline-end;">
                                        <path d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5zm1 .5v1.308l4.372 4.858A.5.5 0 0 1 7 8.5v5.306l2-.666V8.5a.5.5 0 0 1 .128-.334L13.5 3.308V2z"/>
                                        </svg>
                                        <div class="popup">
                                            <div class="popup-content">
                                                <!-- <form action="" method="post" id="advance-form"> -->
                                                <!-- Content of the pop-up goes here -->
                                                <div id="warning-message3" style="display: none; color: red; text-align: center; margin-bottom:10px; font-size:13px;">
                                                    Please select dates
                                                </div>
                                                    <div class="exact bottom-margin" style="display:flex;">
                                                        <span class="popup-amount form-space">Particular amount:</span>
                                                        <input type="number" name="exact_amount_1" id="exact_amount_1" style="margin-left:1.5rem;">
                                                    </div>

                                                    <div class="less bottom-margin" style="display:flex;">
                                                        <span class="popup-amount form-space">Amount less than:</span>
                                                            <input type="number" name="less_than_amount_1" id="less_than_amount_1" style="margin-left:1.7rem;">
                                                    </div>

                                                    <div class="greater bottom-margin" style="display:flex;">
                                                        <span class="popup-amount form-space">Amount greater than:</span>
                                                            <input type="number" name="greater_than_amount_1" id="greater_than_amount_1">
                                                    </div>
                                                    <input type="submit" value="Confirm" class="confirm-btn" id="cb3" onclick="validateForm()">
                                                    <span class="close-popup">&times;</span>
                                                    <!-- Add close button or any other content you need -->
                                                    <!-- You can add additional content or form elements for range selection -->
                                                <!-- </form> -->
                                            </div>
                                        </div>
                                        </td>
                                        <td class="status"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-funnel" viewBox="0 0 16 16" style="float:inline-end;">
                                        <path d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5zm1 .5v1.308l4.372 4.858A.5.5 0 0 1 7 8.5v5.306l2-.666V8.5a.5.5 0 0 1 .128-.334L13.5 3.308V2z"/>
                                        </svg>
                                        <div class="custom-dropdown">
                                            <input type="text" class="search-input" placeholder="Search...">
                                            <ul class="dropdown-list">
                                                <li>Pending</li>
                                                <li>Progress</li>
                                                <li>Completed</li>
                                                <!-- Add your dropdown content here -->
                                            </ul>
                                        </div>
                                        </td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                        <?php
                                            $qry = "select id,fname,lname,proname,otype,item_desc,odate,ldate,amount,advance,status from receiveorder where username='".$_SESSION['username']."';";
                                            $res = mysqli_query($your_db_connection, $qry);
                                            if ($res->num_rows > 0){
                                                while($row = $res->fetch_assoc()){
                                                    echo "<tr class='order-row' data-details='" . json_encode($row) . "'>";
                                                    echo "<td>".$row['id']."</td>";
                                                    echo "<td>".$row['fname']." ".$row['lname']."</td>";
                                                    echo "<td>".$row['proname']."</td>";
                                                    echo "<td>".$row['otype']."</td>";
                                                    echo "<td>".$row['item_desc']."</td>";
                                                    echo "<td>".$row['odate']."</td>";
                                                    echo "<td>".$row['ldate']."</td>";
                                                    echo "<td>".$row['amount']."</td>";
                                                    echo "<td>".$row['advance']."</td>";
                                                    echo "<td>".$row['status']."</td>";
                                                    echo "<td class='edit'>"."<img src='./images/edit_icon.png'>";?><div class='popup4'>
                                                    <div class='popup-content p4'>
                                                        <div class="manufacturing" style="display:none;">
                                                        <div class="d-flex editing">
                                                            <div>
                                                            <span class="d-flex">First Name:</span>
                                                            <input type="text" class="fname">
                                                            </div>
                                                            <div>
                                                            <span class="d-flex">Last Name:</span>
                                                            <input type="text" class="lname">
                                                            </div>
                                                            <div>
                                                            <span class="d-flex">Phone:</span>
                                                            <input type="tel" class="phone">
                                                            </div>
                                                        </div>
                                                        <div class="d-flex editing">
                                                            <div>
                                                            <span class="d-flex">Order Date:</span>
                                                            <input type="date" class="odate">
                                                            </div>
                                                            <div>
                                                            <span class="d-flex">Address:</span>
                                                            <input type="text" class="address">
                                                            </div>
                                                            <div>
                                                            <span class="d-flex">Order Type:</span>
                                                            <input type="text" class="otype" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex editing">
                                                            <div>
                                                            <span class="d-flex">Product Name:</span>
                                                            <select name="proname" class="proname"></select>
                                                            </div>
                                                            <div>
                                                            <span class="d-flex">Product Description:</span>
                                                            <input type="text" class="item_desc">
                                                            </div>
                                                            <div>
                                                            <span class="d-flex">Last Date:</span>
                                                            <input type="date" class="ldate">
                                                            </div>
                                                        </div>
                                                        <div class="d-flex editing">
                                                            <div>
                                                            <span class="d-flex">Quantity:</span>
                                                            <input type="number" class="quantity">
                                                            </div>
                                                            <div>
                                                            <span class="d-flex">Price:</span>
                                                            <input type="number" class="price">
                                                            </div>
                                                            <div>
                                                            <span class="d-flex">Amount:</span>
                                                            <input type="number" class="amount">
                                                            </div>
                                                        </div>
                                                        <div class="d-flex editing">
                                                            <div>
                                                            <span class="d-flex">Advance:</span>
                                                            <input type="number" class="advance">
                                                            </div>
                                                            <div >
                                                            <span class="d-flex">Due:</span>
                                                            <input type="number" class="due">
                                                            </div>
                                                            <div>
                                                            <span class="d-flex">Status:</span>
                                                            <select name="status" class="status">
                                                                <option value="Completed">Completed</option>
                                                                <option value="Pending">Pending</option>
                                                                <option value="Progress">Progress</option>
                                                            </select>
                                                            </div>
                                                        </div>
                                                        </div>
                                                        <div class="saling" style="display:none;">
                                                        <div class="d-flex editing">
                                                            <div>
                                                            <span class="d-flex">First Name:</span>
                                                            <input type="text" class="fname">
                                                            </div>
                                                            <div>
                                                            <span class="d-flex">Last Name:</span>
                                                            <input type="text" class="lname">
                                                            </div>
                                                            <div>
                                                            <span class="d-flex">Phone:</span>
                                                            <input type="tel" class="phone">
                                                            </div>
                                                        </div>
                                                        <div class="d-flex editing">
                                                            <div>
                                                            <span class="d-flex">Order Date:</span>
                                                            <input type="date" class="odate">
                                                            </div>
                                                            <div>
                                                            <span class="d-flex">Address:</span>
                                                            <input type="text" class="address">
                                                            </div>
                                                            <div>
                                                            <span class="d-flex">Order Type:</span>
                                                            <input type="text" class="otype" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex editing">
                                                            <div>
                                                            <span class="d-flex">Product Name:</span>
                                                            <select name="proname" class="proname"></select>
                                                            </div>
                                                            <div>
                                                            <span class="d-flex">Product Description:</span>
                                                            <input type="text" class="item_desc">
                                                            </div>
                                                            <div>
                                                            <span class="d-flex">Quantity:</span>
                                                            <input type="number" class="quantity">
                                                            </div>
                                                        </div>
                                                        <div class="d-flex editing">
                                                            <div>
                                                            <span class="d-flex">Price:</span>
                                                            <input type="number" class="price">
                                                            </div>
                                                            <div>
                                                            <span class="d-flex">Amount:</span>
                                                            <input type="number" class="amount">
                                                            </div>
                                                            <div>
                                                            <span class="d-flex">Advance:</span>
                                                            <input type="number" class="advance">
                                                            </div>
                                                        </div>
                                                        <div class="d-flex editing">
                                                        <div>
                                                            <span class="d-flex">Due:</span>
                                                            <input type="number" class="due">
                                                            </div>
                                                            <div>
                                                            <span class="d-flex">Status:</span>
                                                            <select name="status" class="status">
                                                                <option value="Completed">Completed</option>
                                                                <option value="Pending">Pending</option>
                                                                <option value="Progress">Progress</option>
                                                            </select>
                                                            </div>
                                                        </div>
                                                        </div>
                                                        <div class="renting" style="display:none;">
                                                        <div class="d-flex editing">
                                                            <div>
                                                            <span class="d-flex">First Name:</span>
                                                            <input type="text" class="fname">
                                                            </div>
                                                            <div>
                                                            <span class="d-flex">Last Name:</span>
                                                            <input type="text" class="lname">
                                                            </div>
                                                            <div>
                                                            <span class="d-flex">Phone:</span>
                                                            <input type="tel" class="phone">
                                                            </div>
                                                        </div>
                                                        <div class="d-flex editing">
                                                            <div>
                                                            <span class="d-flex">Order Date:</span>
                                                            <input type="date" class="odate">
                                                            </div>
                                                            <div>
                                                            <span class="d-flex">Address:</span>
                                                            <input type="text" class="address">
                                                            </div>
                                                            <div>
                                                            <span class="d-flex">Order Type:</span>
                                                            <input type="text" class="otype" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex editing">
                                                            <div>
                                                            <span class="d-flex">Product Name:</span>
                                                            <select name="proname" class="proname"></select>
                                                            </div>
                                                            <div>
                                                            <span class="d-flex">Product Description:</span>
                                                            <input type="text" class="item_desc">
                                                            </div>
                                                            <div>
                                                            <span class="d-flex">Status:</span>
                                                            <select class="status" name="status">
                                                            
                                                            </select>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex editing">
                                                            <div>
                                                            <span class="d-flex">Quantity:</span>
                                                            <input type="number" class="quantity">
                                                            </div>
                                                            <div>
                                                            <span class="d-flex">Price:</span>
                                                            <input type="number" class="price">
                                                            </div>
                                                            <div>
                                                            <span class="d-flex">Amount:</span>
                                                            <input type="number" class="amount">
                                                            </div>
                                                        </div>
                                                        <div class="d-flex editing">
                                                            <div>
                                                            <span class="d-flex">Advance:</span>
                                                            <input type="number" class="advance">
                                                            </div>
                                                            <div>
                                                            <span class="d-flex">Due:</span>
                                                            <input type="number" class="due">
                                                            </div>
                                                            <div>
                                                            <span class="d-flex">From:</span>
                                                            <input type="date" class="from_date">
                                                            </div>
                                                        </div>
                                                        <div class="d-flex editing">
                                                        <div>
                                                            <span class="d-flex">To:</span>
                                                            <input type="date" class="to_date">
                                                            </div>
                                                        </div>
                                                        </div>
                                                        <button type="submit" class="button-33 submit">Save changes...</button>
                                                        <button class="button-33 cancel">Cancel</button>
                                                        <span class='close-popup'>&times;</span>
                                                    </div>
                                                </div></td>
                                                <?php
                                                    echo "<td class='delete'>"."<img src='./images/delete_icon.png'>"."</td>";
                                                    echo "</tr>";
                                                }
                                            }
                                        ?>
                                        </tr>
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sprinklejs@1.0.0/dist/sprinkle.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>
    <script type="module" src="./template/Template.js"></script>
    <script type="module" src="./ViewOrders-js/Name.js"></script>
    <script type="module" src="./ViewOrders-js/Otype.js"></script>
    <script type="module" src="./ViewOrders-js/Product_Desc.js"></script>
    <script type="module" src="./ViewOrders-js/View_Amount.js"></script>
    <script type="module" src="./ViewOrders-js/Advance.js"></script>
    <script type="module" src="./ViewOrders-js/Status.js"></script>
    <script type="module" src="./ViewOrders-js/Amount_Disable.js"></script>
    <script type="module" src="./ViewOrders-js/Advance_Disable.js"></script>
    <script type="module" src="./ViewOrders-js/Odate.js"></script>
    <script type="module" src="./ViewOrders-js/Proname.js"></script>
    <script type="module" src="./ViewOrders-js/CdateClosePopup.js"></script>
    <script type="module" src="./ViewOrders-js/NameDropdown.js"></script>
    <script type="module" src="./ViewOrders-js/OtypeDropdown.js"></script>
    <script type="module" src="./ViewOrders-js/StatusDropdown.js"></script>
    <script type="module" src="./ViewOrders-js/PdescSearch.js"></script>
    <script type="module" src="./ViewOrders-js/OdateConfirm.js"></script>
    <script type="module" src="./ViewOrders-js/OdateValidation.js"></script>                                       
    <script type="module" src="./ViewOrders-js/CdateValidation.js"></script>
    <script type="module" src="./ViewOrders-js/OdateReadonly.js"></script>                                      
    <script type="module" src="./ViewOrders-js/CdateReadonly.js"></script>                                      
    <script type="module" src="./ViewOrders-js/OdateRemoveReadonly.js"></script>
    <script type="module" src="./ViewOrders-js/CdateRemoveReadonly.js"></script>
    <script type="module" src="./ViewOrders-js/AmountRemoveReadonly.js"></script>
    <script type="module" src="./ViewOrders-js/AdvanceRemoveReadonly.js"></script>
    <script type="module" src="./ViewOrders-js/AmountValidation.js"></script>
    <script type="module" src="./ViewOrders-js/AdvanceValidation.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    $(document).ready(function () {
    // Show pop-up on SVG click
    var id;
    var details;
    $(".order-row .edit").on("click", function (event) {
        event.stopPropagation();
        // Get the details from the data attribute
        details = $(this).closest('.order-row').data('details');
        console.log(details);
        const popupContent = $(".popup4 .popup-content");
        id = details.id;
        console.log(id);
        var m = $('.manufacturing');
        var s = $('.saling');
        var r = $('.renting');
        if (details.otype === 'sale'){
            s.css('display','block');
            m.css('display','none');
            r.css('display','none');
        }
        else if(details.otype === 'manufacturer'){
            m.css('display','block');
            r.css('display','none');
            s.css('display','none');
        }
        else{
            r.css('display','block');
            m.css('display','none');
            s.css('display','none');
        }

        $.ajax({
            type: "POST",
            url: "edit.php", 
            data: { iddata: id, ortype: details.otype }, 
            success: function (response) {
                // Parse the JSON response
                const responseData = JSON.parse(response);
                console.log(details.otype);
                if(details.otype=="sale"){
                    // Populate the input fields in the "saling" section
                    $(".saling input").each(function () {
                        const fieldName = $(this).attr("class"); // Use the class directly
                        $(this).val(responseData[fieldName]);
                    });
                }
                else if(details.otype=="manufacturer"){
                    // Populate the input fields in the "saling" section
                    $(".manufacturing input").each(function () {
                        const fieldName = $(this).attr("class"); // Use the class directly
                        $(this).val(responseData[fieldName]);
                    });
                }
                else{
                    // Populate the input fields in the "saling" section
                    $(".renting input").each(function () {
                        const fieldName = $(this).attr("class"); // Use the class directly
                        $(this).val(responseData[fieldName]);
                    });
                }
                $.ajax({
                    type: "POST",
                    url: "./status_check.php",
                    data: { fds: details.status},
                    success: function (response) {
                        if(details.otype == "rent"){
                            $('.renting .status').empty();
                            for (var i = 0; i < response.length; i++) {
                                $('.renting .status').append("<option value='" + response[i] +"'>" + response[i] + '</option>');
                            }
                        }
                        else if(details.otype=="sale"){
                            $('.saling .status').empty();
                            for (var i = 0; i < response.length; i++) {
                                $('.saling .status').append("<option value='" + response[i] +"'>" + response[i] + '</option>');
                            }
                        }
                        else{
                            $('.manufacturing .status').empty();
                            for (var i = 0; i < response.length; i++) {
                                $('.manufacturing .status').append("<option value='" + response[i] +"'>" + response[i] + '</option>');
                            }
                        }
                    }
                    
                });
                $.ajax({
                    type: "POST",
                    url: "prodown.php",
                    data: { fdp: details.proname},
                    success: function (response) {
                        if(details.otype == "rent"){
                            $('.renting .proname').empty();
                            for (var i = 0; i < response.length; i++) {
                                $('.renting .proname').append("<option value='" + response[i] +"'>" + response[i] + '</option>');
                            }
                        }
                        else if(details.otype=="sale"){
                            $('.saling .proname').empty();
                            for (var i = 0; i < response.length; i++) {
                                $('.saling .proname').append("<option value='" + response[i] +"'>" + response[i] + '</option>');
                            }
                        }
                        else{
                            $('.manufacturing .proname').empty();
                            for (var i = 0; i < response.length; i++) {
                                $('.manufacturing .proname').append("<option value='" + response[i] +"'>" + response[i] + '</option>');
                            }
                        }
                    }
                    
                });
            }
        });
        $(".popup4").show();
    });

    // Close pop-up when clicking outside of it or on close button
    $(document).click(function (event) {
        if (!$(event.target).closest('.popup-content, .order-row .edit').length) {
            $(".popup4").hide();
        }
    });

    // Close pop-up when clicking on the close button
    $(".close-popup").on("click", function () {
        $(".popup4").hide();
    });

    // Close pop-up when clicking on the close button
    $(".cancel").on("click", function () {
        $(".popup4").hide();
    });

    // Prevent the pop-up from closing when clicking inside it
    $(".popup-content").click(function (event) {
        event.stopPropagation();
    });

        // Show pop-up on SVG click
        $(".edit .submit").on("click", function (event) {
            event.stopPropagation();
            
            // Create an object to store form data
            var formData = {};

            if(details.otype=="sale"){
                // Iterate over each input field and store the data in the formData object
                $(".saling input, .saling select").each(function () {
                    var fieldName = $(this).attr("class"); // Use the class directly
                    formData[fieldName] = $(this).val();
                });
            }
            else if(details.otype=="manufacturer"){
                // Iterate over each input field and store the data in the formData object
                $(".manufacturing input, .manufacturing select").each(function () {
                    var fieldName = $(this).attr("class"); // Use the class directly
                    formData[fieldName] = $(this).val();
                });
            }
            else{
                // Iterate over each input field and store the data in the formData object
                $(".renting input, .renting select").each(function () {
                    var fieldName = $(this).attr("class"); // Use the class directly
                    formData[fieldName] = $(this).val();
                });
            }

            console.log(formData);
            // AJAX request to send formData to the submit.php file
            $.ajax({
                type: "POST",
                url: "submit.php",
                data: {
                    fd: formData,
                    iddata: id,
                    dtot: details.otype
                },
                success: function (response) {
                    if (response) {
                        Swal.fire({
                            title: 'Great!',
                            text: 'Changes made successfully!',
                            icon: 'success',
                        }).then(function () {
                            // Reload the page after showing SweetAlert
                            location.reload();
                        });
                    }
                },
                error: function (error) {
                    Swal.fire({
                        title: 'Error!',
                        text: 'Form submission failed. Please try again.',
                        icon: 'error',
                    });
                }
            });

        });
});
</script>

<script>
    $(document).ready(function () {
        $(".order-row .delete").on("click", function (event) {
            event.stopPropagation();
            // Get the details from the data attribute
            details = $(this).closest('.order-row').data('details');
            console.log(details);
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
                            url: "delete.php",
                            data: {
                                iddata: details.id,
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
        });
    });
</script>

<script>
    $(document).ready(function () {
        $(".clearall-btn").on("click", function (event) {
            event.stopPropagation();
            location.reload();
        });
    });
</script>

<script>
    function downloadExcel() {
        // Get table data
        var table = document.getElementById('excel-table'); // Replace with the actual ID of your table

        // Clone the table to avoid modifying the original
        var tableClone = table.cloneNode(true);

        // Remove the second row from the cloned table
        var rows = tableClone.querySelectorAll('tr');
        if (rows.length > 1) {
            rows[1].parentNode.removeChild(rows[1]);
        }

        // Remove the last two cells from each row
        for (var i = 0; i < rows.length; i++) {
            var cells = rows[i].querySelectorAll('td, th');
            var lastCellIndex = cells.length - 1;
            var secondLastCellIndex = cells.length - 2;

            if (cells.length > 1) {
                cells[lastCellIndex].parentNode.removeChild(cells[lastCellIndex]);
            }

            if (cells.length > 2) {
                cells[secondLastCellIndex].parentNode.removeChild(cells[secondLastCellIndex]);
            }
        }

        // Create a worksheet
        var ws = XLSX.utils.table_to_sheet(tableClone);

        // Format date cells explicitly
        var dateCells = tableClone.querySelectorAll('td[data-date], th[data-date]');
        dateCells.forEach(function (cell) {
            var dateValue = cell.getAttribute('data-date');
            if (dateValue) {
                // Format the date as needed (you can use a library like moment.js for more complex formatting)
                var formattedDate = new Date(dateValue).toLocaleDateString();
                cell.textContent = formattedDate;
            }
        });

        // Set column width for date cells
        var dateColumnIndex5 = 5; // Adjust the index based on your table structure
        var dateColumnIndex6 = 6;
        var dateColumnWidth = { wpx: 80 }; // Adjust the width as needed

        if (!ws['!cols']) {
            ws['!cols'] = [];
        }
        ws['!cols'][dateColumnIndex5] = dateColumnWidth;
        ws['!cols'][dateColumnIndex6] = dateColumnWidth;

        // Create a new workbook
        var wb = XLSX.utils.book_new();

        // Add the worksheet to the workbook
        XLSX.utils.book_append_sheet(wb, ws, 'Sheet1');

        // Convert the workbook to a binary string
        var wbout = XLSX.write(wb, { bookType: 'xlsx', type: 'binary' });

        // Create a Blob from the binary string
        var blob = new Blob([s2ab(wbout)], { type: 'application/octet-stream' });

        // Create a download link
        var link = document.createElement('a');
        link.href = window.URL.createObjectURL(blob);
        link.download = 'table_data.xlsx';

        // Append the link to the document
        document.body.appendChild(link);

        // Trigger the download
        link.click();

        // Remove the link from the document
        document.body.removeChild(link);
    }

    // Utility function to convert string to ArrayBuffer
    function s2ab(s) {
        var buf = new ArrayBuffer(s.length);
        var view = new Uint8Array(buf);
        for (var i = 0; i != s.length; ++i) view[i] = s.charCodeAt(i) & 0xFF;
        return buf;
    }
</script>


</body>
</html>