<?php
session_start();
require_once('config/checklogin.php');
require_once('config/config.php');
check_login();
/* Update Profile */
if (isset($_POST['update_profile'])) {
    $user_id = $_SESSION['user_id'];
    $user_name = $_POST['user_name'];
    $user_idno = $_POST['user_idno'];
    $user_email = $_POST['user_email'];
    $user_phoneno = $_POST['user_phoneno'];
    $user_address = $_POST['user_address'];

    /* Persist */
    $sql = "UPDATE users SET user_name =?, user_idno =?, user_email =?, user_phoneno =?, user_address =? WHERE user_id =?";
    $prepare = $mysqli->prepare($sql);
    $bind = $prepare->bind_param(
        'ssssss',
        $user_name,
        $user_idno,
        $user_email,
        $user_phoneno,
        $user_address,
        $user_id
    );
    $prepare->execute();
    if ($prepare) {
        $success = "Profile Updated";
    } else {
        $err = "Failed!, Please Try Again";
    }
}

/* Change Password */
if (isset($_POST['change_password'])) {
    $user_id = $_SESSION['user_id'];
    $old_password = sha1(md5($_POST['old_password']));
    $new_password = sha1(md5($_POST['new_password']));
    $confirm_password = sha1(md5($_POST['confirm_password']));

    /* Check If Old Password  Match  */
    $sql = "SELECT * FROM  users WHERE user_id = '$user_id'";
    $res = mysqli_query($mysqli, $sql);
    if (mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);
        if ($old_password != $row['user_password']) {
            $err =  "Please Enter Correct Old Password";
        } elseif ($new_password != $confirm_password) {
            $err = "Confirmation Password Does Not Match";
        } else {
            $new_password  = sha1(md5($_POST['new_password']));
            $query = "UPDATE users SET  user_password =? WHERE user_id =?";
            $stmt = $mysqli->prepare($query);
            $rc = $stmt->bind_param('ss', $new_password, $id);
            $stmt->execute();
            if ($stmt) {
                $success = "Password Updated";
            } else {
                $err = "Please Try Again Or Try Later";
            }
        }
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
            <?php require_once('partials/navbar.php');
            /* Load This Partial With Logged In User Session */
            $user_id = $_SESSION['user_id'];
            $ret = "SELECT * FROM users WHERE user_id = '$user_id'";
            $stmt = $mysqli->prepare($ret);
            $stmt->execute(); //ok
            $res = $stmt->get_result();
            while ($user = $res->fetch_object()) {
            ?>
                <!-- Page content -->
                <div class="page-content">
                    <!-- Page title -->
                    <div class="page-title">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-md-6 d-flex align-items-center justify-content-between justify-content-md-start mb-3 mb-md-0">
                                <!-- Page title + Go Back button -->
                                <div class="d-inline-block">
                                    <h5 class="h3 font-weight-400 mb-0 text-white"><?php echo $user->user_name; ?> Profile</h5>
                                </div>
                                <!-- Additional info -->
                            </div>
                            <div class="col-md-6 d-flex align-items-center justify-content-between justify-content-md-end">
                            </div>
                        </div>
                    </div>
                    <!-- Stats -->

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h6 class="mb-0">Profile Settings</h6>
                                </div>
                                <div class="card-body py-3 flex-grow-1">
                                    <form method="post" enctype="multipart/form-data" role="form">
                                        <div class="row">
                                            <div class="form-group col-md-8">
                                                <label for="">Name</label>
                                                <input type="text" required value="<?php echo $user->user_name; ?>" name="user_name" class="form-control" id="exampleInputEmail1">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="">User Number</label>
                                                <input type="text" readonly value="<?php echo $user->user_number; ?>" required name="user_number" class="form-control">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="">National ID Number</label>
                                                <input type="text" required value="<?php echo $user->user_idno; ?>" name="user_idno" class="form-control" id="exampleInputEmail1">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="">Email</label>
                                                <input type="text" value="<?php echo $user->user_email; ?>" required name="user_email" class="form-control">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="">Phone Number</label>
                                                <input type="text" value="<?php echo $user->user_phoneno; ?>" required name="user_phoneno" class="form-control">
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label for="exampleInputPassword1">Address</label>
                                                <textarea required name="user_address" rows="2" class="form-control Summernote"><?php echo $user->user_address; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <button type="submit" name="update_profile" class="btn btn-primary">Update Profile</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h6 class="mb-0">Change Password</h6>
                                </div>
                                <div class="card-body py-3 flex-grow-1">
                                    <form method="post" enctype="multipart/form-data" role="form">
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label for="">Old Password</label>
                                                <input type="password" required name="old_password" class="form-control" id="exampleInputEmail1">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="">New Password</label>
                                                <input type="password"  required name="new_password" class="form-control">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="">Confirm Password</label>
                                                <input type="password" required name="confirm_password" class="form-control" id="exampleInputEmail1">
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <button type="submit" name="change_password" class="btn btn-primary">Change Password</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <!-- Scripts -->
    <?php require_once('partials/scripts.php'); ?>
</body>



</html>