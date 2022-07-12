<?php
session_start();
require_once('config/checklogin.php');
require_once('config/codeGen.php');
require_once('config/config.php');
check_login();

/* Add Product */
if (isset($_POST['add_product'])) {
    $product_category_id = $_POST['product_category_id'];
    $product_user_id = $_SESSION['user_id'];
    $product_code = $_POST['product_code'];
    $product_name = $_POST['product_name'];
    $product_date_harvested = $_POST['product_date_harvested'];
    $product_quantity = $_POST['product_quantity'];
    $product_price = $_POST['product_price'];


    /* Persist */
    $sql = "INSERT INTO products(product_category_id, product_user_id, product_code, product_name, product_date_harvested, product_quantity, product_price)
    VALUES(?,?,?,?,?,?,?)";
    $prepare = $mysqli->prepare($sql);
    $bind = $prepare->bind_param(
        'sssssss',
        $product_category_id,
        $product_user_id,
        $product_code,
        $product_name,
        $product_date_harvested,
        $product_quantity,
        $product_price
    );
    $prepare->execute();
    if ($prepare) {
        $success = "Product Registered";
    } else {
        $err = "Failed!, Please Try Again Later";
    }
}

/* Update Product*/
if (isset($_POST['update_product'])) {
    $product_id = $_POST['product_id'];
    $product_category_id = $_POST['product_category_id'];
    $product_name = $_POST['product_name'];
    $product_date_harvested = $_POST['product_date_harvested'];
    $product_quantity = $_POST['product_quantity'];
    $product_price = $_POST['product_price'];


    /* Persist */
    $sql = "UPDATE products SET product_category_id = ?, product_name =?, product_date_harvested =?, product_quantity = ?, product_price =? WHERE product_id =?";
    $prepare = $mysqli->prepare($sql);
    $bind = $prepare->bind_param(
        'ssssss',
        $product_category_id,
        $product_name,
        $product_date_harvested,
        $product_quantity,
        $product_price,
        $product_id
    );
    $prepare->execute();
    if ($prepare) {
        $success = "Product Updated";
    } else {
        $err = "Failed!, Please Try Again";
    }
}

/* Delete Product */
if (isset($_POST['delete_product'])) {
    $product_id = $_POST['product_id'];

    /* Delete */
    $sql = "DELETE FROM products WHERE product_id =?";
    $prepare = $mysqli->prepare($sql);
    $bind = $prepare->bind_param('s', $product_id);
    $prepare->execute();
    if ($prepare) {
        $success = "Product Removed";
    } else {
        $err = "Failed!, Please Try Again";
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
                                <h5 class="h3 font-weight-400 mb-0 text-white">Products - Cereals</h5>
                            </div>
                            <!-- Additional info -->
                        </div>
                        <div class="col-md-6 d-flex align-items-center justify-content-between justify-content-md-end">
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="button" data-toggle="modal" data-target="#add_modal" class="btn btn-warning"> Register New Product</button>
                    </div>
                    <br>
                    <!-- Add Modal -->
                    <div class="modal fade fixed-right" id="add_modal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog  modal-xl" role="document">
                            <div class="modal-content">
                                <div class="modal-header align-items-center">
                                    <div class="modal-title">
                                        <h6 class="mb-0">Register New Product</h6>
                                    </div>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" enctype="multipart/form-data" role="form">
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="">Name</label>
                                                <input type="text" required name="product_name" class="form-control" id="exampleInputEmail1">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="">Price (Ksh)</label>
                                                <input type="text" required name="product_price" class="form-control" id="exampleInputEmail1">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="">Code</label>
                                                <input type="text" readonly value="<?php echo $a; ?>" required name="product_code" class="form-control">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="">Category Name</label>
                                                <select name="product_category_id" style="width: 100%;" required class="basic form-control">
                                                    <?php
                                                    $ret = "SELECT * FROM product_categories 
                                                    ORDER BY category_name ASC";
                                                    $stmt = $mysqli->prepare($ret);
                                                    $stmt->execute(); //ok
                                                    $res = $stmt->get_result();
                                                    while ($category = $res->fetch_object()) {
                                                    ?>
                                                        <option value="<?php echo $category->category_id; ?>"><?php echo $category->category_code . ' - ' . $category->category_name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="">Estimated Date Harvested</label>
                                                <input type="date" required name="product_date_harvested" class="form-control">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="">Available Quantity In KGS</label>
                                                <input type="number" required name="product_quantity" class="form-control">
                                            </div>
                                            <!-- <div class="form-group col-md-12">
                                                <label for="exampleInputFile">Product Image </label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input required name="product_image_1" accept=".png, .jpg, .jpeg" type="file" class="custom-file-input">
                                                        <label class="custom-file-label" for="exampleInputFile">Choose File</label>
                                                    </div>
                                                </div>
                                            </div> -->
                                        </div>
                                        <div class="text-right">
                                            <button type="submit" name="add_product" class="btn btn-primary">Register Product</button>
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
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Qty</th>
                                        <th>Price</th>
                                        <th>Date Harvested</th>
                                        <th>Manage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $user_id = $_SESSION['user_id'];
                                    $ret = "SELECT * FROM products p INNER JOIN 
                                    product_categories pc ON p.product_category_id = pc.category_id
                                    INNER JOIN users u ON u.user_id  = p.product_user_id
                                    WHERE u.user_id = '$user_id'";
                                    $stmt = $mysqli->prepare($ret);
                                    $stmt->execute(); //ok
                                    $res = $stmt->get_result();
                                    while ($products = $res->fetch_object()) {
                                    ?>
                                        <tr>
                                            <td><?php echo $products->product_code; ?> <?php echo $products->product_name; ?></td>
                                            <td><?php echo  $products->category_name; ?></td>
                                            <td><?php echo $products->product_quantity; ?> Kgs</td>
                                            <td>Ksh <?php echo number_format($products->product_price, 2); ?></td>
                                            <td><?php echo date('d M Y', strtotime($products->product_date_harvested)); ?> </td>
                                            <td>
                                                <a data-toggle="modal" href="#update_<?php echo $products->product_id; ?>" class="badge badge-primary"><i class="fas fa-edit"></i> Edit</a>
                                                <a data-toggle="modal" href="#delete_<?php echo $products->product_id; ?>" class="badge badge-danger"><i class="fas fa-trash"></i> Delete</a>
                                            </td>
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
                                                                    <div class="form-group col-md-4">
                                                                        <label for="">Name</label>
                                                                        <input type="text" required value="<?php echo $products->product_name; ?>" name="product_name" class="form-control" id="exampleInputEmail1">
                                                                        <input type="hidden" required value="<?php echo $products->product_id; ?>" name="product_id" class="form-control" id="exampleInputEmail1">
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label for="">Price (Ksh)</label>
                                                                        <input type="text" required name="product_price" value="<?php echo $products->product_price; ?>" class="form-control" id="exampleInputEmail1">
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label for="">Code</label>
                                                                        <input type="text" readonly value="<?php echo $products->product_code; ?>" required name="product_code" class="form-control">
                                                                    </div>
                                                                    <div class="form-group col-md-4">
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
                                                                    <div class="form-group col-md-4">
                                                                        <label for="">Estimated Date Harvested</label>
                                                                        <input type="date" required name="product_date_harvested" value="<?php echo $products->product_date_harvested; ?>" class="form-control">
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label for="">Available Quantity In KGS</label>
                                                                        <input type="number" required name="product_quantity" value="<?php echo $products->product_quantity; ?>" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="text-right">
                                                                    <button type="submit" name="update_product" class="btn btn-primary">Update Product</button>
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