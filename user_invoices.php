<?php
session_start();
require_once('config/checklogin.php');
require_once('config/codeGen.php');
require_once('config/config.php');
check_login();
/* Update Invoice */
if (isset($_POST['update_order'])) {
    $order_id = $_POST['order_id'];
    $order_qty = $_POST['order_qty'];
    $order_delivery_time = $_POST['order_delivery_time'];

    /* Persist */
    $sql = "UPDATE orders SET order_qty =?, order_delivery_time =? WHERE order_id =?";
    $prepare  = $mysqli->prepare($sql);
    $bind = $prepare->bind_param(
        'sss',
        $order_qty,
        $order_delivery_time,
        $order_id
    );
    $prepare->execute();
    if ($prepare) {
        $success = "Order Updated";
    } else {
        $err = "Failed!, Please Try Again Later";
    }
}
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
                                <h5 class="h3 font-weight-400 mb-0 text-white">Orders </h5>
                            </div>
                            <!-- Additional info -->
                        </div>
                        <div class="col-md-6 d-flex align-items-center justify-content-between justify-content-md-end">
                        </div>
                    </div>
                    <br><br><br>
                </div>
            </div>
            <!-- Stats -->

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="mb-0">Registered Orders - Invoices</h6>
                        </div>
                        <div class="card-body py-3 flex-grow-1">
                            <table class="table table-bordered text-truncate" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Product Details</th>
                                        <th>Order Details</th>
                                        <th>Manage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $user_id = $_SESSION['user_id'];
                                    $ret = "SELECT * FROM orders o
                                    INNER JOIN products p ON p.product_id = o.order_product_id
                                    INNER JOIN product_categories c ON c.category_id = p.product_category_id
                                    INNER JOIN users u ON u.user_id = p.product_user_id WHERE user_id = '$user_id'
                                    ORDER BY o.order_created_at  ASC ";
                                    $stmt = $mysqli->prepare($ret);
                                    $stmt->execute(); //ok
                                    $res = $stmt->get_result();
                                    while ($orders = $res->fetch_object()) {
                                        /* Payment Amount */
                                        /* 1KG = 30 Shillings */
                                        $pay_amount = $orders->order_qty * 30;
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
                                            <td>
                                                <?php
                                                if ($orders->order_payment_status != 'Paid') {
                                                ?>
                                                    <a data-toggle="modal" href="#update_<?php echo $orders->order_id; ?>" class="badge badge-primary"><i class="fas fa-edit"></i> Edit</a>
                                                <?php } else { ?>
                                                    <span class="badge badge-success"><i class="fas fa-check"></i> Order Already Paid</span>
                                                <?php } ?>
                                            </td>
                                            <!-- Update Modal -->
                                            <div class="modal fade fixed-right" id="update_<?php echo $orders->order_id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog  modal-xl" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header align-items-center">
                                                            <div class="modal-title">
                                                                <h6 class="mb-0">Update <?php echo $orders->order_code; ?></h6>
                                                            </div>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="post" enctype="multipart/form-data" role="form">
                                                                <div class="row">
                                                                    <div class="form-group col-md-6">
                                                                        <label for="">Order Quantity (Kgs)</label>
                                                                        <input type="hidden" value="<?php echo $orders->order_id; ?>" required name="order_id" class="form-control" id="exampleInputEmail1">
                                                                        <input type="text" value="<?php echo $orders->order_qty; ?>" required name="order_qty" class="form-control" id="exampleInputEmail1">
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label for="">Expected Delivery Time</label>
                                                                        <input type="date" value="<?php echo $orders->order_delivery_time; ?>" required name="order_delivery_time" class="form-control" id="exampleInputEmail1">
                                                                    </div>
                                                                </div>
                                                                <div class="text-right">
                                                                    <button type="submit" name="update_order" class="btn btn-primary">Update Order</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Modal -->
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