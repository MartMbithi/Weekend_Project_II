<?php
session_start();
require_once 'config/config.php';
require_once 'config/codeGen.php';

/* Handle Login */
if (isset($_POST['login'])) {
    $user_idno = $_POST['user_idno'];
    $user_password = sha1(md5($_POST['user_password']));
    $stmt = $mysqli->prepare("SELECT user_number, user_name, user_password, user_idno, user_access_level, user_id FROM users WHERE user_idno=? AND user_password=?");
    $stmt->bind_param('ss', $user_idno, $user_password);
    $stmt->execute();
    $stmt->bind_result($user_number, $user_name, $user_password, $user_idno, $user_access_level, $user_id);
    $rs = $stmt->fetch();

    /* Session Variables */
    $_SESSION['user_id'] = $user_id;
    $_SESSION['user_access_level'] = $user_access_level;
    $_SESSION['user_name'] = $user_name;
    $_SESSION['user_number'] = $user_number;

    if ($rs && $user_access_level == "admin") {
        header("location:dashboard");
    } elseif ($rs && $user_access_level == "Farmer") {
        header("location:user_home");
    } else {
        $err = "Access Denied Please Check Your National ID Number Or Password";
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
                                            <h6 class="h3">Login</h6>
                                            <p class="text-muted  mb-0">Welcome to Uasin Gishu County Cereals And Produce Board Information Management System</p>
                                        </div>
                                        <span class="clearfix"></span>
                                        <form role="form" method="POST">
                                            <div class="form-group">
                                                <label class="form-control-label">National ID Number</label>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="far fa-tag"></i></span>
                                                    </div>
                                                    <input type="text" name="user_idno" required class="form-control" id="input-email">
                                                </div>
                                            </div>
                                            <div class="form-group mb-4">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <div>
                                                        <label class="form-control-label">Password</label>
                                                    </div>
                                                    <div class="mb-2">
                                                        <a href="user_reset_password" class="small text-muted text-underline--dashed border-success">Lost Password?</a>
                                                    </div>
                                                </div>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="far fa-key"></i></span>
                                                    </div>
                                                    <input type="password" required name="user_password" class="form-control" id="input-password">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <a href="#" data-toggle="password-text " data-target="#input-password">
                                                                <i class="far fa-eye text-warning"></i>
                                                            </a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-4">
                                                <button type="submit" name="login" class="btn btn-sm btn-success btn-icon rounded-pill">
                                                    <span class="btn-inner--text">Sign In</span>
                                                    <span class="btn-inner--icon"><i class="far fa-long-arrow-alt-right"></i></span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer px-md-5"><small>Not A Member?</small>
                                        <a href="user_sign_up" class="small font-weight-bold text-success">Create Account</a>
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