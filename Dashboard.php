<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="./template/Template.css">
    <title>Dashboard</title>
</head>

<body>
    <?php
        include "template/Header.php";
    ?>

        <div class="content-wrapper" style="min-height: 536.4px;">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard</h1>
                        </div>
                    </div>
                </div>
            </div>

            <section class="content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-lg-3 col-6">

                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>
                                    <?php
                                    include "./DatabaseConnection.php";

                                    $qry = "SELECT COUNT(id) AS orderCount FROM receiveorder";
                                    $res = mysqli_query($your_db_connection, $qry);

                                    if ($res) {
                                        $row = mysqli_fetch_assoc($res);
                                        $orderCount = $row['orderCount'];
                                        echo $orderCount;
                                    } else {
                                        echo "Error executing query: " . mysqli_error($your_db_connection);
                                    }

                                    // Don't forget to close the database connection when you're done
                                    mysqli_close($your_db_connection);
                                    ?>

                                    </h3>
                                    <p>Total Orders</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>

                            </div>
                        </div>

                        <div class="col-lg-3 col-6">

                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>
                                    <?php
                                    include "./DatabaseConnection.php";

                                    $qry = "SELECT COUNT(id) AS orderCount FROM receiveorder where status='Completed';";
                                    $res = mysqli_query($your_db_connection, $qry);

                                    if ($res) {
                                        $row = mysqli_fetch_assoc($res);
                                        $orderCount = $row['orderCount'];
                                        echo $orderCount;
                                    } else {
                                        echo "Error executing query: " . mysqli_error($your_db_connection);
                                    }

                                    // Don't forget to close the database connection when you're done
                                    mysqli_close($your_db_connection);
                                    ?>
                                    </h3>
                                    <p>Orders Completed</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>

                            </div>
                        </div>

                        <div class="col-lg-3 col-6">

                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>
                                    <?php
                                    include "./DatabaseConnection.php";

                                    $qry = "SELECT COUNT(id) AS orderCount FROM receiveorder where status='Pending';";
                                    $res = mysqli_query($your_db_connection, $qry);

                                    if ($res) {
                                        $row = mysqli_fetch_assoc($res);
                                        $orderCount = $row['orderCount'];
                                        echo $orderCount;
                                    } else {
                                        echo "Error executing query: " . mysqli_error($your_db_connection);
                                    }

                                    // Don't forget to close the database connection when you're done
                                    mysqli_close($your_db_connection);
                                    ?>
                                    </h3>
                                    <p>Orders Pending</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>

                            </div>
                        </div>

                        <div class="col-lg-3 col-6">

                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>
                                    <?php
                                    include "./DatabaseConnection.php";

                                    $qry = "SELECT COUNT(id) AS orderCount FROM receiveorder where status='Progress';";
                                    $res = mysqli_query($your_db_connection, $qry);

                                    if ($res) {
                                        $row = mysqli_fetch_assoc($res);
                                        $orderCount = $row['orderCount'];
                                        echo $orderCount;
                                    } else {
                                        echo "Error executing query: " . mysqli_error($your_db_connection);
                                    }

                                    // Don't forget to close the database connection when you're done
                                    mysqli_close($your_db_connection);
                                    ?>
                                    </h3>
                                    <p>Orders-in-Progress</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>

                            </div>
                        </div>

                    </div>


                    <div class="row">

                        <section class="col-12 connectedSortable ui-sortable">

                            <div class="card">
                                <div class="card-header ui-sortable-handle" style="cursor: move;">
                                    <h3 class="card-title">
                                        <i class="fa fa-chart-pie mr-1"></i>
                                        Received Order Chart
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content p-0">
                                        <canvas id="salesChart" style="width: 100%; height: 20rem;"></canvas>   
                                    </div>
                                </div>
                            </div>
                        </section>

                    </div>

                </div>
            </section>
        </div>
        <?php
            include "template/Footer.php";
        ?>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script language="JavaScript" type="text/javascript"
        src="http://js/jquery-ui-personalized-1.5.2.packed.js"></script>
    <script language="JavaScript" type="text/javascript" src="http://js/sprinkle.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Add this to your body section -->
    <script src="graph.js"></script>
    <script type="module" src="./template/Template.js"></script>
</body>
</html>