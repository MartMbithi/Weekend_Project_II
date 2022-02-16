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
                                <h5 class="h3 font-weight-400 mb-0 text-white">Payments</h5>
                            </div>
                            <!-- Additional info -->
                        </div>
                        <div class="col-md-6 d-flex align-items-center justify-content-between justify-content-md-end">
                        </div>
                    </div>
                </div>
            </div>
            <!-- Stats -->

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="mb-0">Registered Invoices Payments</h6>
                        </div>
                        <div class="card-body py-3 flex-grow-1">
                            <table class="table table-bordered text-truncate" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Order Details</th>
                                        <th>Payment Details</th>
                                        <th>Manage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $ret = "SELECT * FROM payments p
                                    INNER JOIN orders o ON o.order_id = p.payment_order_id 
                                    INNER JOIN products p ON p.product_id = o.order_product_id";
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
                                            <td>
                                                <a data-toggle="modal" href="#delete_<?php echo $payments->payment_id; ?>" class="badge badge-danger"><i class="fas fa-trash"></i> Delete</a>
                                            </td>

                                            <!-- Delete Modal -->
                                            <div class="modal fade" id="delete_<?php echo $payments->payment_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">CONFIRM DELETE</h5>
                                                            <button type="button" class="close" data-dismiss="modal">
                                                                <span>&times;</span>
                                                            </button>
                                                        </div>
                                                        <form method="POST">
                                                            <div class="modal-body text-center text-danger">
                                                                <h4>Delete <?php echo $payments->payment_code; ?> </h4>
                                                                <br>
                                                                <!-- Hide This -->
                                                                <input type="hidden" name="order_id" value="<?php echo $payments->order_id; ?>">
                                                                <input type="hidden" name="payment_id" value="<?php echo $payments->payment_id; ?>">
                                                                <button type="button" class="text-center btn btn-success" data-dismiss="modal">No</button>
                                                                <input type="submit" name="delete_payment" value="Delete" class="text-center btn btn-danger">
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
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
    <!-- Scripts -->
    <?php require_once('partials/scripts.php'); ?>
</body>



</html>