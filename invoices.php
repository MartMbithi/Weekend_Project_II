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
    VALUES(?,?,?,?,?)";
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
                            <h6 class="mb-0">Registered Users - Farmers</h6>
                        </div>
                        <div class="card-body py-3 flex-grow-1">
                            <table class="table table-bordered table-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Number</th>
                                        <th>Names</th>
                                        <th>ID No</th>
                                        <th>Email</th>
                                        <th>Phone No</th>
                                        <th>Address</th>
                                        <th>Manage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $ret = "SELECT * FROM users WHERE user_access_level ='Farmer'";
                                    $stmt = $mysqli->prepare($ret);
                                    $stmt->execute(); //ok
                                    $res = $stmt->get_result();
                                    while ($users = $res->fetch_object()) {
                                    ?>
                                        <tr>
                                            <td><?php echo $users->user_number; ?></td>
                                            <td>
                                                <?php echo $users->user_name; ?>
                                            </td>
                                            <td><?php echo $users->user_idno; ?></td>
                                            <td><?php echo $users->user_email; ?></td>
                                            <td><?php echo $users->user_phoneno; ?></td>
                                            <td><?php echo $users->user_address; ?></td>
                                            <td>
                                                <?php
                                                if ($users->user_acc_status != 'Verified') { ?>
                                                    <a data-toggle="modal" href="#verify_<?php echo $users->user_id; ?>" class="badge badge-success"><i class="fas fa-user-check"></i> Verify</a>
                                                <?php } ?>
                                                <a data-toggle="modal" href="#update_<?php echo $users->user_id; ?>" class="badge badge-primary"><i class="fas fa-edit"></i> Edit</a>
                                                <a data-toggle="modal" href="#delete_<?php echo $users->user_id; ?>" class="badge badge-danger"><i class="fas fa-trash"></i> Delete</a>
                                            </td>
                                            <!-- Update Modal -->
                                            <div class="modal fade fixed-right" id="update_<?php echo $users->user_id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog  modal-xl" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header align-items-center">
                                                            <div class="modal-title">
                                                                <h6 class="mb-0">Update <?php echo $users->user_name; ?></h6>
                                                            </div>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="post" enctype="multipart/form-data" role="form">
                                                                <div class="row">
                                                                    <div class="form-group col-md-12">
                                                                        <label for="">Full Name</label>
                                                                        <input type="text" required name="user_name" value="<?php echo $users->user_name; ?>" class="form-control" id="exampleInputEmail1">
                                                                        <input type="hidden" required name="user_id" value="<?php echo $users->user_id; ?>" class="form-control" id="exampleInputEmail1">
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label for="">National ID Number</label>
                                                                        <input type="text" required name="user_idno" value="<?php echo $users->user_idno; ?>" class="form-control" id="exampleInputEmail1">
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label for="">Phone Number</label>
                                                                        <input type="text" required name="user_phoneno" value="<?php echo $users->user_phoneno; ?>" class="form-control" id="exampleInputEmail1">
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label for="">Email Address</label>
                                                                        <input type="text" name="user_email" value="<?php echo $users->user_email; ?>" class="form-control" id="exampleInputEmail1">
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label for="">Address</label>
                                                                        <input type="text" name="user_address" value="<?php echo $users->user_address; ?>" class="form-control" id="exampleInputEmail1">
                                                                    </div>
                                                                </div>
                                                                <div class="text-right">
                                                                    <button type="submit" name="update_farmer" class="btn btn-primary">Update</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Modal -->

                                            <!-- Delete Modal -->
                                            <div class="modal fade" id="delete_<?php echo $users->user_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                <h4>Delete <?php echo $users->user_name; ?> </h4>
                                                                <br>
                                                                <!-- Hide This -->
                                                                <input type="hidden" name="user_id" value="<?php echo $users->user_id; ?>">
                                                                <button type="button" class="text-center btn btn-success" data-dismiss="modal">No</button>
                                                                <input type="submit" name="delete_farmer" value="Delete" class="text-center btn btn-danger">
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Modal -->

                                            <!-- Delete Modal -->
                                            <div class="modal fade" id="verify_<?php echo $users->user_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">CONFIRM VERIFICATION</h5>
                                                            <button type="button" class="close" data-dismiss="modal">
                                                                <span>&times;</span>
                                                            </button>
                                                        </div>
                                                        <form method="POST">
                                                            <div class="modal-body text-center text-danger">
                                                                <h4>Verify <?php echo $users->user_name; ?> Farmer Account </h4>
                                                                <br>
                                                                <!-- Hide This -->
                                                                <input type="hidden" name="user_id" value="<?php echo $users->user_id; ?>">
                                                                <button type="button" class="text-center btn btn-success" data-dismiss="modal">No</button>
                                                                <input type="submit" name="verify" value="Verify" class="text-center btn btn-danger">
                                                            </div>
                                                        </form>
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