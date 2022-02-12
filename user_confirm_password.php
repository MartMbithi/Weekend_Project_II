<?php
session_start();
require_once 'config/config.php';
require_once 'config/codeGen.php';

/* Handle Login */
if (isset($_POST['reset_password'])) {
    /* Handle Password Resets */
    $user_idno = $_SESSION['user_idno'];
    $new_password = sha1(md5($_POST['new_password']));
    $confirm_password = sha1(md5($_POST['confirm_password']));

    /* Check If Hashes Match */
    if ($new_password != $confirm_password) {
        $err = "Passwords Does Not Match, Please Retype Again";
    } else {
        /* Persist New Password Update */
        $sql = "UPDATE users SET user_password = ? WHERE user_idno = ?";
        $prepare = $mysqli->prepare($sql);
        $bind  = $prepare->bind_param('ss', $confirm_password, $user_idno);
        $prepare->execute();
        if ($prepare) {
            /* Alert Messages Via Session */
            $_SESSION['success'] = 'Your Member Account Password Has Been Reset, Proceed To Login';
            header('Location: index');
            exit;
        } else {
            $err = "Failed!, Please Try Again";
        }
    }
}
/* Load Header Partial */
require_once('partials/head.php');
?>

<body class="application application-offset">
    <!-- Application container -->
    <div class="container-fluid container-application">
        <!-- Sidenav -->
        <!-- Content -->
        <div class="main-content position-relative">
            <div class="page-content">
                <div class="min-vh-100 py-5 d-flex align-items-center">
                    <div class="w-100">
                        <div class="row justify-content-center">
                            <div class="col-sm-8 col-lg-5">
                                <div class="card shadow zindex-100 mb-0">
                                    <div class="card-body px-md-5 py-5">
                                        <div class="mb-5 text-center">
                                            <h6 class="h3">Confirm Password</h6>
                                            <p class="text-muted  mb-0">Hello, kindly enter your new password and confirm it</p>
                                        </div>
                                        <span class="clearfix"></span>
                                        <form role="form" method="POST">
                                            <div class="form-group mb-4">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <div>
                                                        <label class="form-control-label">New Password</label>
                                                    </div>
                                                </div>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="far fa-key"></i></span>
                                                    </div>
                                                    <input type="password" required name="new_password" class="form-control" id="input-password">
                                                </div>
                                            </div>
                                            <div class="form-group mb-4">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <div>
                                                        <label class="form-control-label">Confirm Password</label>
                                                    </div>
                                                </div>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="far fa-key"></i></span>
                                                    </div>
                                                    <input type="password" required name="confirm_password" class="form-control" id="input-password">
                                                </div>
                                            </div>
                                            <div class="mt-4">
                                                <button type="submit" name="reset_password" class="btn btn-sm btn-success btn-icon rounded-pill">
                                                    <span class="btn-inner--text">Confirm Password</span>
                                                    <span class="btn-inner--icon"><i class="far fa-long-arrow-alt-right"></i></span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer -->
        </div>
    </div>
    <?php require_once('partials/scripts.php'); ?>
</body>



</html>