<?php
session_start();
require_once('config/checklogin.php');
require_once('config/config.php');
check_login();
/* Load Header Partial */
require_once('partials/head.php');
/* Load Analytics */
require_once('partials/user_analytics.php');
?>

<body class="application application-offset">
    <!-- Chat modal -->

    <!-- Application container -->
    <div class="container-fluid container-application">
        <!-- Sidenav -->
        <?php require_once('partials/aside.php'); ?>
        <!-- Content -->
        <div class="main-content position-relative">
            <!-- Main nav -->
            <?php require_once('partials/navbar.php'); ?>

            <!-- Page content -->
            <div class="page-content">
                <!-- Page title -->
                <div class="page-title">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-md-6 d-flex align-items-center justify-content-between justify-content-md-start mb-3 mb-md-0">
                            <!-- Page title + Go Back button -->
                            <div class="d-inline-block">
                                <h5 class="h3 font-weight-400 mb-0 text-white">My Dashboard</h5>
                            </div>
                            <!-- Additional info -->
                        </div>
                        <div class="col-md-6 d-flex align-items-center justify-content-between justify-content-md-end">
                        </div>
                    </div>
                </div>
                <!-- Stats -->
                <div class="row">
                    <div class="col-xl-4 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h6 class="text-muted mb-1">My Products</h6>
                                        <span class="h3 font-weight-bold mb-0 "><?php echo $products; ?></span>
                                    </div>
                                    <div class="col-auto">
                                        <i class="far fa-list text-warning fa-4x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h6 class="text-muted mb-1">Unpaid Orders</h6>
                                        <span class="h3 font-weight-bold mb-0 "><?php echo $unpaid_orders; ?></span>
                                    </div>
                                    <div class="col-auto">
                                        <i class="far fa-exclamation text-warning fa-4x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h6 class="text-muted mb-1">Paid Orders</h6>
                                        <span class="h3 font-weight-bold mb-0 "><?php echo $paid_orders; ?></span>
                                    </div>
                                    <div class="col-auto">
                                        <i class="far fa-check text-warning fa-4x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-12">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h6 class="text-muted mb-1">Total Orders</h6>
                                        <span class="h3 font-weight-bold mb-0 "><?php echo $all_orders; ?></span>
                                    </div>
                                    <div class="col-auto">
                                        <i class="far fa-file-check text-warning fa-4x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-xl-8 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h6 class="text-muted mb-1">Total Payments</h6>
                                        <span class="h3 font-weight-bold mb-0 ">Ksh <?php echo  number_format($total_payments, 2); ?></span>
                                    </div>
                                    <div class="col-auto">
                                        <i class="far fa-hand-holding-usd text-warning fa-4x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0">Recent Orders</h6>
                            </div>
                            <div class="card-body py-3 flex-grow-1">
                                <table class="table table-bordered dt-responsive " style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Product Details</th>
                                            <th>Order Details</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $user_id = $_SESSION['user_id'];
                                        $ret = "SELECT * FROM orders o
                                        INNER JOIN products p ON p.product_id = o.order_product_id
                                        INNER JOIN product_categories c ON c.category_id = p.product_category_id
                                        INNER JOIN users u ON u.user_id = p.product_user_id 
                                        WHERE u.user_id = '$user_id'
                                        ORDER BY o.order_created_at  ASC ";
                                        $stmt = $mysqli->prepare($ret);
                                        $stmt->execute(); //ok
                                        $res = $stmt->get_result();
                                        while ($orders = $res->fetch_object()) {
                                        ?>
                                            <tr>
                                                <td>
                                                    <b># :</b> <?php echo $orders->product_code; ?><br>
                                                    <b>Name :</b> <?php echo $orders->product_name; ?><br>
                                                    <b>Category: </b> <?php echo $orders->category_name; ?>
                                                </td>
                                                <td>
                                                    <b># :</b> <?php echo $orders->order_code; ?><br>
                                                    <b>QTY :</b> <?php echo $orders->order_qty; ?> Kgs<br>
                                                    <b>Status : </b> <?php echo $orders->order_payment_status; ?><br>
                                                    <b>Delivery Date: </b> <?php echo date('d M Y', strtotime($orders->order_delivery_time)); ?>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Scripts -->
    <?php require_once('partials/scripts.php'); ?>
</body>



</html>