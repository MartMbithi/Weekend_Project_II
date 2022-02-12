<?php
/* Handle Password Reset */
if (isset($_POST['reset_password'])) {
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
                            <div class="col-sm-8 col-lg-4">
                                <div class="card shadow zindex-100 mb-0">
                                    <div class="card-body px-md-5 py-5">
                                        <div class="mb-5 text-center">
                                            <h6 class="h3">Reset Password</h6>
                                            <p class="text-muted  mb-0">Welcome to Uasin Gishu County Cereals And Produce Board Information Management System</p>
                                        </div>
                                        <span class="clearfix"></span>
                                        <form role="form" method="POST">
                                            <div class="form-group">
                                                <label class="form-control-label">National ID Number</label>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="far fa-user"></i></span>
                                                    </div>
                                                    <input type="text" name="user_idno" required class="form-control" id="input-email">
                                                </div>
                                            </div>
                                            <div class="mt-4">
                                                <button type="submit" name="reset_password" class="btn btn-sm btn-success btn-icon rounded-pill">
                                                    <span class="btn-inner--text">Reset Password</span>
                                                    <span class="btn-inner--icon"><i class="far fa-long-arrow-alt-right"></i></span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer px-md-5"><small>Remembered Password?</small>
                                        <a href="index" class="small font-weight-bold text-success">Login</a>
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