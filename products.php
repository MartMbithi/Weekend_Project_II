<?php
session_start();
require_once('config/checklogin.php');
require_once('config/codeGen.php');
require_once('config/config.php');
check_login();
/* Add Product */
if (isset($_POST['add_product'])) {
    $product_category_id = $_POST['product_category_id'];
    $product_user_id = $_POST['product_user_id'];
    $product_code = $_POST['product_code'];
    $product_name = $_POST['product_name'];
    $product_date_harvested = $_POST['product_date_harvested'];
    $product_quantity = $_POST['product_quantity'];

    /* Persist */
    $sql = "INSERT INTO products(product_category_id, product_user_name, product_code, product_name, product_date_harvested, product_quantity)
    VALUES(?,?,?,?,?,?)";
    $prepare = $mysqli->prepare($sql);
    $bind = $prepare->bind_param(
        'ssssss',
        $product_category_id,
        $product_user_id,
        $product_code,
        $product_name,
        $product_date_harvested,
        $product_quantity
    );
    $prepare->execute();
    if ($prepare) {
        $success = "Product Registered";
    } else {
        $err = "Failed!, Please Try Again Later";
    }
}
/* Update Product*/
/* Delete Product */

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
                                <h5 class="h3 font-weight-400 mb-0 text-white">Productss - Cereals</h5>
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
                                            <div class="form-group col-md-8">
                                                <label for="">Name</label>
                                                <input type="text" required name="product_name" class="form-control" id="exampleInputEmail1">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="">Code</label>
                                                <input type="text" readonly value="<?php echo $a; ?>" required name="product_code" class="form-control">
                                            </div>
                                            <div class="form-group col-md-6">
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
                                            <div class="form-group col-md-6">
                                                <label for="">Farmer Name</label>
                                                <select name="product_user_id" style="width: 100%;" required class="basic form-control">
                                                    <?php
                                                    $ret = "SELECT * FROM users WHERE user_access_level = 'Farmer'
                                                    ORDER BY user_name ASC";
                                                    $stmt = $mysqli->prepare($ret);
                                                    $stmt->execute(); //ok
                                                    $res = $stmt->get_result();
                                                    while ($farmer = $res->fetch_object()) {
                                                    ?>
                                                        <option value="<?php echo $farmer->user_id; ?>"><?php echo $farmer->user_number . ' - ' . $farmer->user_name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">Estimated Date Harvested</label>
                                                <input type="date" required name="product_date_harvested" class="form-control">
                                            </div>
                                            <div class="form-group col-md-6">
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
                            <h6 class="mb-0">Registered Categories</h6>
                        </div>
                        <div class="card-body py-3 flex-grow-1">
                            <table class="table table-bordered text-truncate" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Code</th>
                                        <th>Name</th>
                                        <th>Details</th>
                                        <th>Manage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $ret = "SELECT * FROM product_categories";
                                    $stmt = $mysqli->prepare($ret);
                                    $stmt->execute(); //ok
                                    $res = $stmt->get_result();
                                    while ($categories = $res->fetch_object()) {
                                    ?>
                                        <tr>
                                            <td><?php echo $categories->category_code; ?></td>
                                            <td><?php echo $categories->category_name; ?></td>
                                            <td>
                                                <?php
                                                if (strlen($categories->category_desc) > 100) {
                                                    echo substr($categories->category_desc, 0, 100) . '...';
                                                } else {
                                                    echo $categories->category_desc;
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <a data-toggle="modal" href="#update_<?php echo $categories->category_id; ?>" class="badge badge-primary"><i class="fas fa-edit"></i> Edit</a>
                                                <a data-toggle="modal" href="#delete_<?php echo $categories->category_id; ?>" class="badge badge-danger"><i class="fas fa-trash"></i> Delete</a>
                                            </td>
                                            <!-- Update Modal -->
                                            <div class="modal fade fixed-right" id="update_<?php echo $categories->category_id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog  modal-xl" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header align-items-center">
                                                            <div class="modal-title">
                                                                <h6 class="mb-0">Update <?php echo $categories->category_name; ?></h6>
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
                                                                        <input type="text" required name="category_name" value="<?php echo $categories->category_name; ?>" class="form-control" id="exampleInputEmail1">
                                                                        <input type="hidden" required name="category_id" value="<?php echo $categories->category_id; ?>" class="form-control" id="exampleInputEmail1">
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label for="">Code</label>
                                                                        <input type="text" readonly value="<?php echo $categories->category_code; ?>" required name="category_code" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="form-group col-md-12">
                                                                        <label for="exampleInputPassword1">Description</label>
                                                                        <textarea required name="category_desc" rows="2" class="form-control"><?php echo $categories->category_desc; ?></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="text-right">
                                                                    <button type="submit" name="update_category" class="btn btn-primary">Update Category</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Modal -->

                                            <!-- Delete Modal -->
                                            <div class="modal fade" id="delete_<?php echo $categories->category_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                <h4>Delete : <?php echo $categories->category_name; ?> </h4>
                                                                <br>
                                                                <!-- Hide This -->
                                                                <input type="hidden" name="category_id" value="<?php echo $categories->category_id; ?>">
                                                                <button type="button" class="text-center btn btn-success" data-dismiss="modal">No</button>
                                                                <input type="submit" name="delete_category" value="Delete" class="text-center btn btn-danger">
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