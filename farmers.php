<?php
session_start();
require_once('config/checklogin.php');
require_once('config/codeGen.php');
require_once('config/config.php');
check_login();
/* Add Farmers */
if (isset($_POST['add_farmer'])) {
    $user_number = $a . $b;
    $user_name = $_POST['user_name'];
    $user_idno  = $_POST['user_idno'];
    $user_email = $_POST['user_email'];
    $user_phoneno = $_POST['user_phoneno'];
    $user_address = $_POST['user_address'];
    $user_access_level = 'Farmer';
    $user_account_status  = 'Verified';
    $user_password = sha1(md5('Farmer')); /* Default Password */

    /* Avoid Data Replication Exists */
    $sql = "SELECT * FROM  users  
    WHERE user_idno = '$user_idno' 
    || user_phoneno = '$user_phoneno' 
    || user_email = '$user_email'";
    $res = mysqli_query($mysqli, $sql);
    if (mysqli_num_rows($res) > 0) {
        $users = mysqli_fetch_assoc($res);
        /* If ID Number Already Exists Exit */
        if (
            $users['user_idno'] == $user_idno
            || $users['user_phoneno'] == $user_phoneno
            || $users['user_email'] == $user_email
        ) {
            $err = "National ID Number, Email Or Phone Number Already Exists";
        }
    } else {
        /* Insert Details */
        $sql = "INSERT INTO users (user_name, user_number, user_idno, user_email, user_password, user_address, user_phoneno, user_access_level, user_acc_status)
        VALUES(?,?,?,?,?,?,?,?,?)";
        $prepare = $mysqli->prepare($sql);
        $bind = $prepare->bind_param(
            'sssssssss',
            $user_name,
            $user_number,
            $user_idno,
            $user_email,
            $user_password,
            $user_address,
            $user_phoneno,
            $user_access_level,
            $user_acc_status
        );
        $prepare->execute();
        if ($prepare) {
            $success = "Farmer Account Created";
        } else {
            $err = "Failed!, Please Try Again";
        }
    }
}


/* Update Farmer */
if (isset($_POST['update_farmer'])) {
    $user_id = $_POST['user_id'];
    $user_name = $_POST['user_name'];
    $user_idno = $_POST['user_idno'];
    $user_email = $_POST['user_email'];
    $user_address = $_POST['user_address'];
    $user_phoneno = $_POST['user_phoneno'];

    /* Update */
    $sql = "UPDATE users SET user_name =?, user_idno =?, user_email =?, user_address =?, user_phoneno =? WHERE user_id =?";
    $prepare = $mysqli->prepare($sql);
    $bind = $prepare->bind_param(
        'ssssss',
        $user_name,
        $user_idno,
        $user_email,
        $user_address,
        $user_phoneno,
        $user_id
    );
    $prepare->execute();
    if ($prepare) {
        $success = "Farmer Account Updated";
    } else {
        $err = "Failed!, Please Try Again";
    }
}

/* Delete Account */
if (isset($_POST['delete_farmer'])) {
    $user_id = $_POST['user_id'];
    /* sql */
    $sql = "DELETE FROM users WHERE user_id = ?";
    $prepare = $mysqli->prepare($sql);
    $bind = $prepare->bind_param('s', $user_id);
    if ($prepare) {
        $success = "Farmer Deleted";
    } else {
        $err = "Failed!, Please Try Again";
    }
}

/* Verify Account */
if (isset($_POST['verify'])) {
    $user_account_status = 'Verified';
    $user_id = $_POST['user_id'];

    /* Persist */
    $sql = "UPDATE users SET user_account_status =? WHERE user_id =?";
    $prepare = $mysqli->prepare($sql);
    $bind = $prepare->bind_param(
        'ss',
        $user_account_status,
        $user_id
    );
    $prepare->execute();
    if ($prepare) {
        $success = "Farmer Account Verified";
    } else {
        $err = "Failed To Verify";
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
                                <h5 class="h3 font-weight-400 mb-0 text-white">Users - Farmers</h5>
                            </div>
                            <!-- Additional info -->
                        </div>
                        <div class="col-md-6 d-flex align-items-center justify-content-between justify-content-md-end">
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="button" data-toggle="modal" data-target="#add_modal" class="btn btn-warning"> Register New Farmer</button>
                    </div>
                    <br>
                    <!-- Add Modal -->
                    <div class="modal fade fixed-right" id="add_modal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog  modal-xl" role="document">
                            <div class="modal-content">
                                <div class="modal-header align-items-center">
                                    <div class="modal-title">
                                        <h6 class="mb-0">Register New Farmer</h6>
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
                                                <input type="text" required name="user_name" class="form-control" id="exampleInputEmail1">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">National ID Number</label>
                                                <input type="text" required name="user_idno" class="form-control" id="exampleInputEmail1">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">Phone Number</label>
                                                <input type="text" required name="user_phoneno" class="form-control" id="exampleInputEmail1">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">Email Address</label>
                                                <input type="text" name="user_email" class="form-control" id="exampleInputEmail1">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">Address</label>
                                                <input type="text" name="user_address" class="form-control" id="exampleInputEmail1">
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <button type="submit" name="add_farmer" class="btn btn-primary">Register Farmer</button>
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
                            <h6 class="mb-0">Registered Products</h6>
                        </div>
                        <div class="card-body py-3 flex-grow-1">
                            <table class="table table-bordered text-truncate" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Code</th>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Farmer</th>
                                        <th>Qty</th>
                                        <th>Date Harvested</th>
                                        <th>Manage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $ret = "SELECT * FROM products p INNER JOIN 
                                    product_categories pc ON p.product_category_id = pc.category_id
                                    INNER JOIN users u ON u.user_id  = p.product_user_id";
                                    $stmt = $mysqli->prepare($ret);
                                    $stmt->execute(); //ok
                                    $res = $stmt->get_result();
                                    while ($products = $res->fetch_object()) {
                                    ?>
                                        <tr>
                                            <td><?php echo $products->product_code; ?></td>
                                            <td><?php echo $products->product_name; ?></td>
                                            <td><?php echo $products->category_code . ' - ' . $products->category_name; ?></td>
                                            <td><?php echo $products->user_number . ' - ' . $products->user_name; ?></td>
                                            <td><?php echo $products->product_quantity; ?> Kgs</td>
                                            <td><?php echo date('d M Y', strtotime($products->product_date_harvested)); ?> </td>
                                            <td>
                                                <a data-toggle="modal" href="#order_<?php echo $products->product_id; ?>" class="badge badge-success"><i class="fas fa-check"></i> Place Order</a>
                                                <a data-toggle="modal" href="#update_<?php echo $products->product_id; ?>" class="badge badge-primary"><i class="fas fa-edit"></i> Edit</a>
                                                <a data-toggle="modal" href="#delete_<?php echo $products->product_id; ?>" class="badge badge-danger"><i class="fas fa-trash"></i> Delete</a>
                                            </td>
                                            <!-- Place Order -->
                                            <div class="modal fade fixed-right" id="order_<?php echo $products->product_id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog  modal-xl" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header align-items-center">
                                                            <div class="modal-title">
                                                                <h6 class="mb-0">Order <?php echo $products->product_name; ?></h6>
                                                            </div>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="post" enctype="multipart/form-data" role="form">
                                                                <div class="row">
                                                                    <div class="form-group col-md-4">
                                                                        <label for="">Order Code</label>
                                                                        <input type="text" readonly value="<?php echo $a . $b; ?>" required name="order_code" class="form-control">
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label for="">Order Quantity (KGS)</label>
                                                                        <input type="text" required name="order_qty" class="form-control" id="exampleInputEmail1">
                                                                        <input type="hidden" required value="<?php echo $products->product_id; ?>" name="order_product_id" class="form-control" id="exampleInputEmail1">
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label for="">Estimated Delivery Date</label>
                                                                        <input type="date" required name="order_delivery_time" class="form-control">
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
                                            <!-- End Order -->
                                            <!-- Update Modal -->
                                            <div class="modal fade fixed-right" id="update_<?php echo $products->product_id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog  modal-xl" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header align-items-center">
                                                            <div class="modal-title">
                                                                <h6 class="mb-0">Update <?php echo $products->product_name; ?></h6>
                                                            </div>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="post" enctype="multipart/form-data" role="form">
                                                                <div class="row">
                                                                    <div class="form-group col-md-8">
                                                                        <label for="">Name</label>
                                                                        <input type="text" required value="<?php echo $products->product_name; ?>" name="product_name" class="form-control" id="exampleInputEmail1">
                                                                        <input type="hidden" required value="<?php echo $products->product_id; ?>" name="product_id" class="form-control" id="exampleInputEmail1">
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label for="">Code</label>
                                                                        <input type="text" readonly value="<?php echo $products->product_code; ?>" required name="product_code" class="form-control">
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label for="">Category Name</label>
                                                                        <select name="product_category_id" style="width: 100%;" required class="basic form-control">
                                                                            <option value="<?php echo $products->category_id; ?>"><?php echo $products->category_code . ' - ' . $products->category_name; ?></option>
                                                                            <?php
                                                                            $cat_ret = "SELECT * FROM product_categories 
                                                                            ORDER BY category_name ASC";
                                                                            $cat_stmt = $mysqli->prepare($cat_ret);
                                                                            $cat_stmt->execute(); //ok
                                                                            $cat_res = $cat_stmt->get_result();
                                                                            while ($category = $cat_res->fetch_object()) {
                                                                            ?>
                                                                                <option value="<?php echo $category->category_id; ?>"><?php echo $category->category_code . ' - ' . $category->category_name; ?></option>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label for="">Farmer Name</label>
                                                                        <select name="product_user_id" style="width: 100%;" required class="basic form-control">
                                                                            <option value="<?php echo $products->user_id; ?>"><?php echo $products->user_number . ' - ' . $products->user_name; ?></option>
                                                                            <?php
                                                                            $farmer_ret = "SELECT * FROM users WHERE user_access_level = 'Farmer'
                                                                            ORDER BY user_name ASC";
                                                                            $farmer_stmt = $mysqli->prepare($farmer_ret);
                                                                            $farmer_stmt->execute(); //ok
                                                                            $farmer_res = $farmer_stmt->get_result();
                                                                            while ($farmer = $farmer_res->fetch_object()) {
                                                                            ?>
                                                                                <option value="<?php echo $farmer->user_id; ?>"><?php echo $farmer->user_number . ' - ' . $farmer->user_name; ?></option>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label for="">Estimated Date Harvested</label>
                                                                        <input type="date" required name="product_date_harvested" value="<?php echo $products->product_date_harvested; ?>" class="form-control">
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label for="">Available Quantity In KGS</label>
                                                                        <input type="number" required name="product_quantity" value="<?php echo $products->product_quantity; ?>" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="text-right">
                                                                    <button type="submit" name="update_product" class="btn btn-primary">Register Product</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Modal -->

                                            <!-- Delete Modal -->
                                            <div class="modal fade" id="delete_<?php echo $products->product_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                <h4>Delete <?php echo $products->product_name; ?> </h4>
                                                                <br>
                                                                <!-- Hide This -->
                                                                <input type="hidden" name="product_id" value="<?php echo $products->product_id; ?>">
                                                                <button type="button" class="text-center btn btn-success" data-dismiss="modal">No</button>
                                                                <input type="submit" name="delete_product" value="Delete" class="text-center btn btn-danger">
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
    </div>
    <!-- Scripts -->
    <?php require_once('partials/scripts.php'); ?>
</body>



</html>