<?php
session_start();
require_once('config/checklogin.php');
require_once('config/codeGen.php');
require_once('config/config.php');
check_login();
/* Load Header Partial */
require_once('partials/head.php');
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
                                <h5 class="h3 font-weight-400 mb-0 text-white">Reports</h5>
                            </div>
                            <!-- Additional info -->
                        </div>
                    </div>
                    <br><br>
                </div>
            </div>
            <!-- Stats -->

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="mb-0">1. Payments</h6>
                        </div>
                        <div class="card-body py-3 flex-grow-1">
                            <table class="table table-bordered text-truncate report_table" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Order Details</th>
                                        <th>Payment Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $ret = "SELECT * FROM payments p
                                    INNER JOIN orders o ON o.order_id = p.pay_order_id 
                                    INNER JOIN products pr ON pr.product_id = o.order_product_id ";
                                    $stmt = $mysqli->prepare($ret);
                                    $stmt->execute(); //ok
                                    $res = $stmt->get_result();
                                    while ($payments = $res->fetch_object()) {
                                    ?>
                                        <tr>
                                            <td>
                                                <b>Order # :</b> <?php echo $payments->order_code; ?><br>
                                                <b>Order Product :</b> <?php echo $payments->product_name; ?><br>
                                                <b>Order QTY: </b> <?php echo $payments->order_qty; ?> Kgs
                                            </td>
                                            <td>
                                                <b>Payment # :</b> <?php echo $payments->pay_code; ?><br>
                                                <b>Amount :</b> <?php echo number_format($payments->pay_amount, 2); ?><br>
                                                <b>Date: </b> <?php echo date('d M Y g:ia', strtotime($payments->pay_date_posted)); ?>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h6 class="mb-0">2. Orders</h6>
                        </div>
                        <div class="card-body py-3 flex-grow-1">
                            
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