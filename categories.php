<?php
session_start();
require_once('config/checklogin.php');
require_once('config/codeGen.php');
require_once('config/config.php');
check_login();
/* Add Category */
if (isset($_POST['add_category'])) {
    $category_code = $_POST['category_code'];
    $category_name = $_POST['category_name'];
    $category_desc = $_POST['category_desc'];

    /* Persist */
    $sql = "INSERT INTO product_categories (category_code, category_name, category_desc) VALUES(?,?,?)";
    $prepare = $mysqli->prepare($sql);
    $bind = $prepare->bind_param(
        'sss',
        $category_code,
        $category_name,
        $category_desc
    );
    $prepare->execute();
    if ($prepare) {
        $success = "$category_code - $category_name Registered";
    } else {
        $err = "Failed!, Please Try Again";
    }
}

/* Update Category */
if (isset($_POST['update_category'])) {
    $category_id = $_POST['category_id'];
    $category_name = $_POST['category_name'];
    $category_desc =  $_POST['category_desc'];

    /* Persist */
    $sql = "UPDATE product_categories SET category_name =?, category_desc =? WHERE category_id =?";
    $prepare = $mysqli->prepare($sql);
    $bind = $prepare->bind_param(
        'sss',
        $category_name,
        $category_desc,
        $category_id
    );
    $prepare->execute();
    if ($prepare) {
        $success = "Product Category Details Updated";
    } else {
        $err = "Failed!, Please Try Again";
    }
}

/* Delete Category */
if (isset($_POST['delete_category'])) {
    $category_id = $_POST['category_id'];
    /* Delete */
    $sql = "DELETE FROM product_categories WHERE category_id =?";
    $prepare = $mysqli->prepare($sql);
    $bind  = $prepare->bind_param(
        's',
        $category_id
    );
    $prepare->execute();
    if ($prepare) {
        $success = "Removed Product Category";
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
                                <h5 class="h3 font-weight-400 mb-0 text-white">Products Categories</h5>
                            </div>
                            <!-- Additional info -->
                        </div>
                        <div class="col-md-6 d-flex align-items-center justify-content-between justify-content-md-end">
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="button" data-toggle="modal" data-target="#add_modal" class="btn btn-warning"> Register New Category</button>
                    </div>
                    <br>
                    <!-- Add Modal -->
                    <div class="modal fade fixed-right" id="add_modal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog  modal-xl" role="document">
                            <div class="modal-content">
                                <div class="modal-header align-items-center">
                                    <div class="modal-title">
                                        <h6 class="mb-0">Register New Product Category</h6>
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
                                                <input type="text" required name="category_name" class="form-control" id="exampleInputEmail1">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="">Code</label>
                                                <input type="text" readonly value="<?php echo $a; ?>" required name="category_code" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label for="exampleInputPassword1">Description</label>
                                                <textarea required name="category_desc" rows="2" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <button type="submit" name="add_category" class="btn btn-primary">Register Category</button>
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