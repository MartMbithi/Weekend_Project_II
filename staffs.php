<?php
session_start();
require_once('config/checklogin.php');
require_once('config/codeGen.php');
require_once('config/config.php');
check_login();

/* Add Farmers */
if (isset($_POST['add_staff'])) {
    $user_number = $a . $b;
    $user_name = $_POST['user_name'];
    $user_idno  = $_POST['user_idno'];
    $user_email = $_POST['user_email'];
    $user_phoneno = $_POST['user_phoneno'];
    $user_address = $_POST['user_address'];
    $user_access_level = $_POST['user_access_level'];
    $user_acc_status  = 'Verified';
    $user_password = sha1(md5('Staff')); /* Default Password */

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
            $success = "Staff Account Created";
        } else {
            $err = "Failed!, Please Try Again";
        }
    }
}


/* Update Staff */
if (isset($_POST['update_staff'])) {
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
        $success = "Staff Account Updated";
    } else {
        $err = "Failed!, Please Try Again";
    }
}

/* Delete Account */
if (isset($_POST['delete_staff'])) {
    $user_id = $_POST['user_id'];
    /* sql */
    $sql = "DELETE FROM users WHERE user_id = '$user_id'";
    $prepare = $mysqli->prepare($sql);
    $prepare->execute();
    if ($prepare) {
        $success = "Deleted";
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
                                <h5 class="h3 font-weight-400 mb-0 text-white">Users - Staffs</h5>
                            </div>
                            <!-- Additional info -->
                        </div>
                        <div class="col-md-6 d-flex align-items-center justify-content-between justify-content-md-end">
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="button" data-toggle="modal" data-target="#add_modal" class="btn btn-warning"> Register New Staff</button>
                    </div>
                    <br>
                    <!-- Add Modal -->
                    <div class="modal fade fixed-right" id="add_modal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog  modal-xl" role="document">
                            <div class="modal-content">
                                <div class="modal-header align-items-center">
                                    <div class="modal-title">
                                        <h6 class="mb-0">Register New Staff</h6>
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
                                            <div class="form-group col-md-4">
                                                <label for="">National ID Number</label>
                                                <input type="text" required name="user_idno" class="form-control" id="exampleInputEmail1">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="">Access Rights</label>
                                                <select name="user_access_level" style="width: 100%;" required class="basic form-control">
                                                    <option>Staff</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
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
                                            <button type="submit" name="add_staff" class="btn btn-primary">Register Staff</button>
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
                            <h6 class="mb-0">Registered Users - Staffs</h6>
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
                                    $ret = "SELECT * FROM users WHERE user_access_level !='Farmer'";
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
                                                                    <div class="form-group col-md-4">
                                                                        <label for="">National ID Number</label>
                                                                        <input type="text" required name="user_idno" value="<?php echo $users->user_idno; ?>" class="form-control" id="exampleInputEmail1">
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label for="">Phone Number</label>
                                                                        <input type="text" required name="user_phoneno" value="<?php echo $users->user_phoneno; ?>" class="form-control" id="exampleInputEmail1">
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label for="">Acess Rights</label>
                                                                        <select name="user_access_level" style="width: 100%;" required class="basic form-control">
                                                                            <option><?php echo $users->user_access_level; ?></option>
                                                                            <option>Staff</option>
                                                                            <option>admin</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label for="">Email Address</label>
                                                                        <input type="text" required name="user_email" value="<?php echo $users->user_email; ?>" class="form-control" id="exampleInputEmail1">
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label for="">Address</label>
                                                                        <input type="text" name="user_address" value="<?php echo $users->user_address; ?>" class="form-control" id="exampleInputEmail1">
                                                                    </div>
                                                                </div>
                                                                <div class="text-right">
                                                                    <button type="submit" name="update_staff" class="btn btn-primary">Update</button>
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
                                                                <input type="submit" name="delete_staff" value="Delete" class="text-center btn btn-danger">
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