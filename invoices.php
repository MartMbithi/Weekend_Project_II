<?php
session_start();
require_once('config/checklogin.php');
require_once('config/codeGen.php');
require_once('config/config.php');
check_login();
/* Post Invoice */
if (isset($_POST['add_order'])) {
    $order_product_id  = $_POST['order_product_id'];
    $order_code = $a . $b;
    $order_qty = $_POST['order_qty'];
    $order_delivery_time = $_POST['order_delivery_time'];
    $order_created_at = date('d M Y');

    /* Persist */
    $sql = "INSERT INTO orders (order_product_id, order_code, order_qty, order_delivery_time, order_created_at)
    VALUES(?,?,?,?,?)";
    $prepare = $mysqli->prepare($sql);
    $bind = $prepare->bind_param(
        'sssss',
        $order_product_id,
        $order_code,
        $order_qty,
        $order_delivery_time,
        $order_created_at
    );
    $prepare->execute();
    if ($prepare) {
        $success = "Order Posted And Invoice # $order_code Posted";
    } else {
        $err = "Failed!, Please Try Again";
    }
}

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

/* Delete Invoice */
if (isset($_POST['delete_order'])) {
    $order_id = $_POST['order_id'];

    /* Delete */
    $sql = "DELETE FROM orders WHERE order_id = ?";
    $prepare = $mysqli->prepare($sql);
    $bind = $prepare->bind_param('s', $order_id);
    $prepare->execute();
    if ($prepare) {
        $success = "Order Deleted";
    } else {
        $err = "Failed!, Please Try Again Later";
    }
}

/* Pay Invoice */
if (isset($_POST['add_payment'])) {
    $pay_order_id = $_POST['pay_order_id'];
    $pay_code = $paycode;
    $pay_amount = $_POST['pay_amount'];
    $pay_desc = $_POST['pay_desc'];

    /* Persist */
    $sql = "INSERT INTO payments (pay_order_id, pay_code, pay_amount, pay_desc)
    VALUES(?,?,?,?)";
    $order_sql = "UPDATE orders SET order_payment_status = 'Paid' WHERE order_id  = '$pay_order_id'";

    $prepare  = $mysqli->prepare($sql);
    $order_prepare = $mysqli->prepare($order_sql);

    $bind = $prepare->bind_param(
        'ssss',
        $pay_order_id,
        $pay_code,
        $pay_amount,
        $pay_desc
    );
    $prepare->execute();
    $order_prepare->execute();

    if ($prepare && $order_prepare) {
        $success = "Order Payment Posted";
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
                    <div class="text-right">
                        <button type="button" data-toggle="modal" data-target="#add_modal" class="btn btn-warning"> Register New Order</button>
                    </div>
                    <br>
                    <!-- Add Modal -->
                    <div class="modal fade fixed-right" id="add_modal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog  modal-xl" role="document">
                            <div class="modal-content">
                                <div class="modal-header align-items-center">
                                    <div class="modal-title">
                                        <h6 class="mb-0">Register New Order</h6>
                                    </div>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" enctype="multipart/form-data" role="form">
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label for="">Product Details</label>
                                                <select name="order_product_id" style="width: 100%;" required class="basic form-control">
                                                    <?php
                                                    $ret = "SELECT * FROM products p 
                                                    INNER JOIN users u ON u.user_id  = p.product_user_id";
                                                    $stmt = $mysqli->prepare($ret);
                                                    $stmt->execute(); //ok
                                                    $res = $stmt->get_result();
                                                    while ($products = $res->fetch_object()) {
                                                    ?>
                                                        <option value="<?php echo $products->product_id; ?>"><?php echo $products->product_code . ' - ' . $products->product_name . ' Produced By ' . $products->user_name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="">Order Quantity (Kgs)</label>
                                                <input type="text" required name="order_qty" class="form-control" id="exampleInputEmail1">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">Expected Delivery Time</label>
                                                <input type="date" required name="order_delivery_time" class="form-control" id="exampleInputEmail1">
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <button type="submit" name="add_order" class="btn btn-primary">Submit Order</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                        <th>Farmer Details</th>
                                        <th>Order Details</th>
                                        <th>Manage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $ret = "SELECT * FROM orders o
                                    INNER JOIN products p ON p.product_id = o.order_product_id
                                    INNER JOIN product_categories c ON c.category_id = p.product_category_id
                                    INNER JOIN users u ON u.user_id = p.product_user_id
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
                                                <b># :</b> <?php echo $orders->user_number; ?><br>
                                                <b>Name :</b> <?php echo $orders->user_name; ?><br>
                                                <b>ID No: </b> <?php echo $orders->user_idno; ?>
                                            </td>
                                            <td>
                                                <b># :</b> <?php echo $orders->order_code; ?><br>
                                                <b>QTY :</b> <?php echo $orders->order_qty; ?> Kgs<br>
                                                <b>Status : </b> <?php echo $orders->order_payment_status; ?><br>
                                                <b>Delivery Date: </b> <?php echo date('d M Y', strtotime($orders->order_delivery_time)); ?>
                                            </td>
                                            <td>
                                                <?php if ($orders->order_payment_status != 'Paid') { ?>
                                                    <a data-toggle="modal" href="#pay_<?php echo $orders->order_id; ?>" class="badge badge-success"><i class="fas fa-check"></i> Pay Order</a>
                                                <?php } ?>
                                                <a data-toggle="modal" href="#update_<?php echo $orders->order_id; ?>" class="badge badge-primary"><i class="fas fa-edit"></i> Edit</a>
                                                <a data-toggle="modal" href="#delete_<?php echo $orders->order_id; ?>" class="badge badge-danger"><i class="fas fa-trash"></i> Delete</a>
                                            </td>
                                            <!-- Pay Order -->
                                            <div class="modal fade fixed-right" id="pay_<?php echo $orders->order_id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog  modal-xl" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header align-items-center">
                                                            <div class="modal-title">
                                                                <h6 class="mb-0">Pay Order Invoice # <?php echo $orders->order_code; ?></h6>
                                                            </div>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="post" enctype="multipart/form-data" role="form">
                                                                <div class="row">
                                                                    <div class="form-group col-md-12">
                                                                        <label for="">Payment Amount (Ksh)</label>
                                                                        <input type="hidden" value="<?php echo $orders->order_id; ?>" required name="pay_order_id" class="form-control" id="exampleInputEmail1">
                                                                        <input readonly type="text" value="<?php echo $pay_amount; ?>" required name="pay_amount" class="form-control" id="exampleInputEmail1">
                                                                    </div>
                                                                    <div class="form-group col-md-12">
                                                                        <label for="">Payment Description</label>
                                                                        <textarea type="text"  name="pay_desc" class="form-control" id="exampleInputEmail1"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="text-right">
                                                                    <button type="submit" name="add_payment" class="btn btn-primary">Pay Order</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Order -->
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

                                            <!-- Delete Modal -->
                                            <div class="modal fade" id="delete_<?php echo $orders->order_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                <h4>Delete <?php echo $orders->order_code; ?> </h4>
                                                                <br>
                                                                <!-- Hide This -->
                                                                <input type="hidden" name="order_id" value="<?php echo $orders->order_id; ?>">
                                                                <button type="button" class="text-center btn btn-success" data-dismiss="modal">No</button>
                                                                <input type="submit" name="delete_order" value="Delete" class="text-center btn btn-danger">
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