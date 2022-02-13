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
    $prepare = $mysql->prepare($sql);
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

/* Delete Category */

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
                                        <h6 class="mb-0">Register New Prduct Category</h6>
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
                                                <input type="text" required name="caategory_name" class="form-control" id="exampleInputEmail1">
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
                            <table class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Number</th>
                                        <th>Names</th>
                                        <th>ID No</th>
                                        <th>Email</th>
                                        <th>Phone No</th>
                                        <th>Address</th>
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
                                                <?php echo $users->user_name;
                                                /* Green Badge If Verified */
                                                if ($users->user_acc_status == 'Verified') {
                                                ?>
                                                    <span class="badge badge-success"><i class="fas fa-check"></i> Verified</span>
                                                <?php } else { ?>
                                                    <span class="badge badge-danger"><i class="fas fa-exclamation"></i> Pending</span>
                                                <?php } ?>
                                            </td>
                                            <td><?php echo $users->user_idno; ?></td>
                                            <td><?php echo $users->user_email; ?></td>
                                            <td><?php echo $users->user_phoneno; ?></td>
                                            <td><?php echo $users->user_address; ?></td>
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