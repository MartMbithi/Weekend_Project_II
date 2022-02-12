<?php
session_start();
require_once('config/checklogin.php');
require_once('config/config.php');
check_login();
/* Load Header Partial */
require_once('partials/head.php');
/* Load Analytics */
require_once('partials/analytics.php');
?>

<body class="application application-offset">
    <!-- Chat modal -->
    <!-- Customizer modal -->
    <div class="modal fade fixed-right" id="modal-chat" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-vertical" role="document">
            <div class="modal-content">
                <div class="modal-header align-items-center">
                    <div class="modal-title">
                        <h6 class="mb-0">Chat</h6>
                        <span class="d-block text-sm">3 new conversations</span>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="scrollbar-inner">
                    <!-- Chat contacts -->
                    <div class="list-group list-group-flush">
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex align-items-center" data-toggle="tooltip" data-placement="right" data-title="">
                                <div>
                                    <div class="avatar-parent-child">
                                        <img alt="Image placeholder" src="../assets/img/theme/light/team-1-800x800.jpg" class="avatar  rounded-circle">
                                        <span class="avatar-child avatar-badge bg-warning"></span>
                                    </div>
                                </div>
                                <div class="flex-fill ml-3">
                                    <h6 class="text-sm mb-0">John Sullivan</h6>
                                    <p class="text-sm mb-0">
                                        Working remotely
                                    </p>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex align-items-center" data-toggle="tooltip" data-placement="right" data-title="">
                                <div>
                                    <div class="avatar-parent-child">
                                        <img alt="Image placeholder" src="../assets/img/theme/light/team-2-800x800.jpg" class="avatar  rounded-circle">
                                        <span class="avatar-child avatar-badge bg-warning"></span>
                                    </div>
                                </div>
                                <div class="flex-fill ml-3">
                                    <h6 class="text-sm mb-0">Heather Wright</h6>
                                    <p class="text-sm mb-0">
                                        Working remotely
                                    </p>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex align-items-center" data-toggle="tooltip" data-placement="right" data-title="">
                                <div>
                                    <div class="avatar-parent-child">
                                        <img alt="Image placeholder" src="../assets/img/theme/light/team-3-800x800.jpg" class="avatar  rounded-circle">
                                        <span class="avatar-child avatar-badge bg-warning"></span>
                                    </div>
                                </div>
                                <div class="flex-fill ml-3">
                                    <h6 class="text-sm mb-0">James Lewis</h6>
                                    <p class="text-sm mb-0">
                                        Working remotely
                                    </p>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex align-items-center" data-toggle="tooltip" data-placement="right" data-title="">
                                <div>
                                    <div class="avatar-parent-child">
                                        <img alt="Image placeholder" src="../assets/img/theme/light/team-4-800x800.jpg" class="avatar  rounded-circle">
                                        <span class="avatar-child avatar-badge bg-warning"></span>
                                    </div>
                                </div>
                                <div class="flex-fill ml-3">
                                    <h6 class="text-sm mb-0">Martin Gray</h6>
                                    <p class="text-sm mb-0">
                                        Working remotely
                                    </p>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex align-items-center" data-toggle="tooltip" data-placement="right" data-title="">
                                <div>
                                    <div class="avatar-parent-child">
                                        <img alt="Image placeholder" src="../assets/img/theme/light/team-5-800x800.jpg" class="avatar  rounded-circle">
                                        <span class="avatar-child avatar-badge bg-warning"></span>
                                    </div>
                                </div>
                                <div class="flex-fill ml-3">
                                    <h6 class="text-sm mb-0">John Snow</h6>
                                    <p class="text-sm mb-0">
                                        Working remotely
                                    </p>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex align-items-center" data-toggle="tooltip" data-placement="right" data-title="">
                                <div>
                                    <div class="avatar-parent-child">
                                        <img alt="Image placeholder" src="../assets/img/theme/light/team-1-800x800.jpg" class="avatar  rounded-circle">
                                        <span class="avatar-child avatar-badge bg-warning"></span>
                                    </div>
                                </div>
                                <div class="flex-fill ml-3">
                                    <h6 class="text-sm mb-0">John Michael</h6>
                                    <p class="text-sm mb-0">
                                        Working remotely
                                    </p>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex align-items-center" data-toggle="tooltip" data-placement="right" data-title="">
                                <div>
                                    <div class="avatar-parent-child">
                                        <img alt="Image placeholder" src="../assets/img/theme/light/team-2-800x800.jpg" class="avatar  rounded-circle">
                                        <span class="avatar-child avatar-badge bg-warning"></span>
                                    </div>
                                </div>
                                <div class="flex-fill ml-3">
                                    <h6 class="text-sm mb-0">Monroe Parker</h6>
                                    <p class="text-sm mb-0">
                                        Working remotely
                                    </p>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex align-items-center" data-toggle="tooltip" data-placement="right" data-title="">
                                <div>
                                    <div class="avatar-parent-child">
                                        <img alt="Image placeholder" src="../assets/img/theme/light/team-3-800x800.jpg" class="avatar  rounded-circle">
                                        <span class="avatar-child avatar-badge bg-warning"></span>
                                    </div>
                                </div>
                                <div class="flex-fill ml-3">
                                    <h6 class="text-sm mb-0">Danielle Levin</h6>
                                    <p class="text-sm mb-0">
                                        Working remotely
                                    </p>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex align-items-center" data-toggle="tooltip" data-placement="right" data-title="">
                                <div>
                                    <div class="avatar-parent-child">
                                        <img alt="Image placeholder" src="../assets/img/theme/light/team-4-800x800.jpg" class="avatar  rounded-circle">
                                        <span class="avatar-child avatar-badge bg-warning"></span>
                                    </div>
                                </div>
                                <div class="flex-fill ml-3">
                                    <h6 class="text-sm mb-0">Jesse Stevens</h6>
                                    <p class="text-sm mb-0">
                                        Working remotely
                                    </p>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex align-items-center" data-toggle="tooltip" data-placement="right" data-title="">
                                <div>
                                    <div class="avatar-parent-child">
                                        <img alt="Image placeholder" src="../assets/img/theme/light/team-5-800x800.jpg" class="avatar  rounded-circle">
                                        <span class="avatar-child avatar-badge bg-warning"></span>
                                    </div>
                                </div>
                                <div class="flex-fill ml-3">
                                    <h6 class="text-sm mb-0">John Snow</h6>
                                    <p class="text-sm mb-0">
                                        Working remotely
                                    </p>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex align-items-center" data-toggle="tooltip" data-placement="right" data-title="">
                                <div>
                                    <div class="avatar-parent-child">
                                        <img alt="Image placeholder" src="../assets/img/theme/light/team-1-800x800.jpg" class="avatar  rounded-circle">
                                        <span class="avatar-child avatar-badge bg-warning"></span>
                                    </div>
                                </div>
                                <div class="flex-fill ml-3">
                                    <h6 class="text-sm mb-0">John Sullivan</h6>
                                    <p class="text-sm mb-0">
                                        Working remotely
                                    </p>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex align-items-center" data-toggle="tooltip" data-placement="right" data-title="">
                                <div>
                                    <div class="avatar-parent-child">
                                        <img alt="Image placeholder" src="../assets/img/theme/light/team-2-800x800.jpg" class="avatar  rounded-circle">
                                        <span class="avatar-child avatar-badge bg-warning"></span>
                                    </div>
                                </div>
                                <div class="flex-fill ml-3">
                                    <h6 class="text-sm mb-0">Heather Wright</h6>
                                    <p class="text-sm mb-0">
                                        Working remotely
                                    </p>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex align-items-center" data-toggle="tooltip" data-placement="right" data-title="">
                                <div>
                                    <div class="avatar-parent-child">
                                        <img alt="Image placeholder" src="../assets/img/theme/light/team-3-800x800.jpg" class="avatar  rounded-circle">
                                        <span class="avatar-child avatar-badge bg-warning"></span>
                                    </div>
                                </div>
                                <div class="flex-fill ml-3">
                                    <h6 class="text-sm mb-0">James Lewis</h6>
                                    <p class="text-sm mb-0">
                                        Working remotely
                                    </p>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex align-items-center" data-toggle="tooltip" data-placement="right" data-title="">
                                <div>
                                    <div class="avatar-parent-child">
                                        <img alt="Image placeholder" src="../assets/img/theme/light/team-4-800x800.jpg" class="avatar  rounded-circle">
                                        <span class="avatar-child avatar-badge bg-warning"></span>
                                    </div>
                                </div>
                                <div class="flex-fill ml-3">
                                    <h6 class="text-sm mb-0">Martin Gray</h6>
                                    <p class="text-sm mb-0">
                                        Working remotely
                                    </p>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex align-items-center" data-toggle="tooltip" data-placement="right" data-title="">
                                <div>
                                    <div class="avatar-parent-child">
                                        <img alt="Image placeholder" src="../assets/img/theme/light/team-5-800x800.jpg" class="avatar  rounded-circle">
                                        <span class="avatar-child avatar-badge bg-warning"></span>
                                    </div>
                                </div>
                                <div class="flex-fill ml-3">
                                    <h6 class="text-sm mb-0">John Snow</h6>
                                    <p class="text-sm mb-0">
                                        Working remotely
                                    </p>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex align-items-center" data-toggle="tooltip" data-placement="right" data-title="">
                                <div>
                                    <div class="avatar-parent-child">
                                        <img alt="Image placeholder" src="../assets/img/theme/light/team-1-800x800.jpg" class="avatar  rounded-circle">
                                        <span class="avatar-child avatar-badge bg-warning"></span>
                                    </div>
                                </div>
                                <div class="flex-fill ml-3">
                                    <h6 class="text-sm mb-0">John Michael</h6>
                                    <p class="text-sm mb-0">
                                        Working remotely
                                    </p>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex align-items-center" data-toggle="tooltip" data-placement="right" data-title="">
                                <div>
                                    <div class="avatar-parent-child">
                                        <img alt="Image placeholder" src="../assets/img/theme/light/team-2-800x800.jpg" class="avatar  rounded-circle">
                                        <span class="avatar-child avatar-badge bg-warning"></span>
                                    </div>
                                </div>
                                <div class="flex-fill ml-3">
                                    <h6 class="text-sm mb-0">Monroe Parker</h6>
                                    <p class="text-sm mb-0">
                                        Working remotely
                                    </p>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex align-items-center" data-toggle="tooltip" data-placement="right" data-title="">
                                <div>
                                    <div class="avatar-parent-child">
                                        <img alt="Image placeholder" src="../assets/img/theme/light/team-3-800x800.jpg" class="avatar  rounded-circle">
                                        <span class="avatar-child avatar-badge bg-warning"></span>
                                    </div>
                                </div>
                                <div class="flex-fill ml-3">
                                    <h6 class="text-sm mb-0">Danielle Levin</h6>
                                    <p class="text-sm mb-0">
                                        Working remotely
                                    </p>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex align-items-center" data-toggle="tooltip" data-placement="right" data-title="">
                                <div>
                                    <div class="avatar-parent-child">
                                        <img alt="Image placeholder" src="../assets/img/theme/light/team-4-800x800.jpg" class="avatar  rounded-circle">
                                        <span class="avatar-child avatar-badge bg-warning"></span>
                                    </div>
                                </div>
                                <div class="flex-fill ml-3">
                                    <h6 class="text-sm mb-0">Jesse Stevens</h6>
                                    <p class="text-sm mb-0">
                                        Working remotely
                                    </p>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex align-items-center" data-toggle="tooltip" data-placement="right" data-title="">
                                <div>
                                    <div class="avatar-parent-child">
                                        <img alt="Image placeholder" src="../assets/img/theme/light/team-5-800x800.jpg" class="avatar  rounded-circle">
                                        <span class="avatar-child avatar-badge bg-warning"></span>
                                    </div>
                                </div>
                                <div class="flex-fill ml-3">
                                    <h6 class="text-sm mb-0">John Snow</h6>
                                    <p class="text-sm mb-0">
                                        Working remotely
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="modal-footer py-3 mt-auto">
                    <a href="#" class="btn btn-block btn-sm btn-neutral btn-icon rounded-pill">
                        <span class="btn-inner--icon"><i class="fab fa-facebook-messenger"></i></span>
                        <span class="btn-inner--text">Open Chat</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
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
                                <h5 class="h3 font-weight-400 mb-0 text-white">Dashboard</h5>
                            </div>
                            <!-- Additional info -->
                        </div>
                        <div class="col-md-6 d-flex align-items-center justify-content-between justify-content-md-end">
                        </div>
                    </div>
                </div>
                <!-- Stats -->
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h6 class="text-muted mb-1">Farmers</h6>
                                        <span class="h3 font-weight-bold mb-0 "><?php echo $farmers; ?></span>
                                    </div>
                                    <div class="col-auto">
                                        <i class="far fa-users-cog text-warning fa-4x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h6 class="text-muted mb-1">Staffs</h6>
                                        <span class="h3 font-weight-bold mb-0 "><?php echo $staffs; ?></span>
                                    </div>
                                    <div class="col-auto">
                                        <i class="far fa-users text-warning fa-4x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h6 class="text-muted mb-1">Unpaid Invoices</h6>
                                        <span class="h3 font-weight-bold mb-0 "><?php echo $unpaid_orders; ?></span>
                                    </div>
                                    <div class="col-auto">
                                        <i class="far fa-exclamation text-warning fa-4x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h6 class="text-muted mb-1">Paid Invoices</h6>
                                        <span class="h3 font-weight-bold mb-0 "><?php echo $paid_orders; ?></span>
                                    </div>
                                    <div class="col-auto">
                                        <i class="far fa-file-check text-warning fa-4x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h6 class="text-muted mb-1">Total Orders</h6>
                                        <span class="h3 font-weight-bold mb-0 "><?php echo $all_orders; ?></span>
                                    </div>
                                    <div class="col-auto">
                                        <i class="far fa-calendar-check text-warning fa-4x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-xl-6 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h6 class="text-muted mb-1">Total Payments</h6>
                                        <span class="h3 font-weight-bold mb-0 ">Ksh <?php echo $total_payments; ?></span>
                                    </div>
                                    <div class="col-auto">
                                        <i class="far fa-hand-holding-usd text-warning fa-4x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0">Recent Orders</h6>
                            </div>
                            <div class="card-body py-3 flex-grow-1">
                                <table class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Product Details</th>
                                            <th>Farmer Details</th>
                                            <th>Order Details</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $ret = "SELECT * FROM orders o
                                        INNER JOIN products p ON p.product_id = o.order_product_id
                                        INNER JOIN product_categories c ON c.category_id = p.product_category_id
                                        INNER JOIN users u ON u.user_id = p.product_user_id
                                        ORDER BY o.order_created_at  ASC ";
                                        $stmt = $mysqli->prepare($ret);
                                        $stmt->execute(); //ok
                                        $res = $stmt->get_result();
                                        while ($orders = $res->fetch_object()) {
                                        ?>
                                            <tr>
                                                <td>
                                                    <b># :</b> <?php echo $orders->product_code; ?><br>
                                                    <b>Name :</b> <?php echo $order->product_name; ?><br>
                                                    <b>Category: </b> <?php echo $order->category_name; ?>
                                                </td>
                                                <td>
                                                    <b># :</b> <?php echo $orders->user_number; ?><br>
                                                    <b>Name :</b> <?php echo $order->user_name; ?><br>
                                                    <b>ID No: </b> <?php echo $order->user_idno; ?>
                                                </td>
                                                <td>
                                                    <b># :</b> <?php echo $orders->order_code; ?><br>
                                                    <b>QTY :</b> <?php echo $order->order_qty; ?> Kgs<br>
                                                    <b>Status : </b> <?php echo $order->order_status; ?><br>
                                                    <b>Delivery Date: </b> <?php echo date('d M Y', strtotime($order->order_delivery_time)); ?>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="text-bold">Recent Registred Farmers</h6>
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