<?php
session_start();
require_once('config/checklogin.php');
require_once('config/config.php');
check_login();
/* Load Header Partial */
require_once('partials/head.php');
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
                                        <span class="h3 font-weight-bold mb-0 ">7.500</span>
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
                                        <span class="h3 font-weight-bold mb-0 ">34</span>
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
                                        <span class="h3 font-weight-bold mb-0 ">68</span>
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
                                        <span class="h3 font-weight-bold mb-0 ">12</span>
                                    </div>
                                    <div class="col-auto">
                                        <i class="far fa-file-check text-warning fa-4x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h6 class="text-muted mb-1">Total Orders</h6>
                                        <span class="h3 font-weight-bold mb-0 ">7.500</span>
                                    </div>
                                    <div class="col-auto">
                                        <i class="far fa-calendar-check text-warning fa-4x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h6 class="text-muted mb-1">Total Payments</h6>
                                        <span class="h3 font-weight-bold mb-0 ">7.500</span>
                                    </div>
                                    <div class="col-auto">
                                        <i class="far fa-hand-holding-usd text-warning fa-4x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h6 class="text-muted mb-1">Pending Payments</h6>
                                        <span class="h3 font-weight-bold mb-0 ">7.500</span>
                                    </div>
                                    <div class="col-auto">
                                        <i class="far fa-ban text-warning fa-4x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Project -->
                <div class="card-columns card-columns-3">
                    <!-- Project overview -->
                    <div class="card">
                        <div class="card-header">
                            <h6 class="mb-0">Project overview</h6>
                        </div>
                        <div class="card-body py-3 flex-grow-1">
                            <!-- Progress -->
                            <div class="pb-3 mb-3 border-bottom">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <!-- Avatar -->
                                        <img alt="Image placeholder" src="../assets/img/theme/light/brand-avatar-2.png" class="avatar rounded-circle">
                                    </div>
                                    <div class="col ml-n2">
                                        <div class="progress-wrapper">
                                            <span class="progress-percentage"><small class="font-weight-bold">Completed: </small>70%</span>
                                            <div class="progress progress-xs mt-2">
                                                <div class="progress-bar bg-success" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Description -->
                            <p class="text-sm mb-0">
                                Purpose Application UI is unique and beautiful collection of elements that are all flexible and modular.
                            </p>
                        </div>
                        <div class="card-footer py-0">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item px-0">
                                    <div class="row align-items-center">
                                        <div class="col-6">
                                            <span class="form-control-label">Private project:</span>
                                        </div>
                                        <div class="col-6 text-right">
                                            <span class="badge badge-success badge-pill">Yes</span>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item px-0">
                                    <div class="row align-items-center">
                                        <div class="col-6">
                                            <span class="form-control-label">Published:</span>
                                        </div>
                                        <div class="col-6 text-right">
                                            <span class="badge badge-danger badge-pill">No</span>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item px-0">
                                    <div class="row align-items-center">
                                        <div class="col-6">
                                            <small>Start date:</small>
                                            <div class="h6 mb-0">23-05-2018</div>
                                        </div>
                                        <div class="col-6">
                                            <small>End date:</small>
                                            <div class="h6 mb-0">30-06-2019</div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Attachments -->
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="mb-0">Attachments</h6>
                                </div>
                                <div class="text-right">
                                    <div class="actions">
                                        <a href="#" class="action-item"><i class="far fa-sync"></i></a>
                                        <div class="dropdown action-item" data-toggle="dropdown">
                                            <a href="#" class="action-item"><i class="far fa-ellipsis-h"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item">Refresh</a>
                                                <a href="#" class="dropdown-item">Manage Widgets</a>
                                                <a href="#" class="dropdown-item">Settings</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-wrapper p-3">
                            <!-- Files -->
                            <div class="card mb-3 border shadow-none">
                                <div class="px-3 py-3">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <img alt="Image placeholder" src="../assets/img/icons/files/pdf.png" class="img-fluid" style="width: 40px;">
                                        </div>
                                        <div class="col ml-n2">
                                            <h6 class="text-sm mb-0">
                                                <a href="#!">design-principles.pdf</a>
                                            </h6>
                                            <p class="card-text small text-muted">
                                                189 KB
                                            </p>
                                        </div>
                                        <div class="col-auto actions">
                                            <div class="dropdown" data-toggle="dropdown">
                                                <a href="#" class="action-item" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="far fa-ellipsis-h"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="#" class="dropdown-item">Refresh</a>
                                                    <a href="#" class="dropdown-item">Manage Widgets</a>
                                                    <a href="#" class="dropdown-item">Settings</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-3 border shadow-none">
                                <div class="px-3 py-3">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <img alt="Image placeholder" src="../assets/img/icons/files/psd.png" class="img-fluid" style="width: 40px;">
                                        </div>
                                        <div class="col ml-n2">
                                            <h6 class="text-sm mb-0">
                                                <a href="#!">website-wireframe.psd</a>
                                            </h6>
                                            <p class="card-text small text-muted">
                                                45.9 MB
                                            </p>
                                        </div>
                                        <div class="col-auto actions">
                                            <div class="dropdown" data-toggle="dropdown">
                                                <a href="#" class="action-item" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="far fa-ellipsis-h"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="#" class="dropdown-item">Refresh</a>
                                                    <a href="#" class="dropdown-item">Manage Widgets</a>
                                                    <a href="#" class="dropdown-item">Settings</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-3 border shadow-none">
                                <div class="px-3 py-3">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <img alt="Image placeholder" src="../assets/img/icons/files/doc.png" class="img-fluid" style="width: 40px;">
                                        </div>
                                        <div class="col ml-n2">
                                            <h6 class="text-sm mb-0">
                                                <a href="#!">product-guidelines.doc</a>
                                            </h6>
                                            <p class="card-text small text-muted">
                                                87 KB
                                            </p>
                                        </div>
                                        <div class="col-auto actions">
                                            <div class="dropdown" data-toggle="dropdown">
                                                <a href="#" class="action-item" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="far fa-ellipsis-h"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="#" class="dropdown-item">Refresh</a>
                                                    <a href="#" class="dropdown-item">Manage Widgets</a>
                                                    <a href="#" class="dropdown-item">Settings</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-3 border shadow-none">
                                <div class="px-3 py-3">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <img alt="Image placeholder" src="../assets/img/icons/files/avi.png" class="img-fluid" style="width: 40px;">
                                        </div>
                                        <div class="col ml-n2">
                                            <h6 class="text-sm mb-0">
                                                <a href="#!">banner-video.avi</a>
                                            </h6>
                                            <p class="card-text small text-muted">
                                                23 MB
                                            </p>
                                        </div>
                                        <div class="col-auto actions">
                                            <div class="dropdown" data-toggle="dropdown">
                                                <a href="#" class="action-item" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="far fa-ellipsis-h"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="#" class="dropdown-item">Refresh</a>
                                                    <a href="#" class="dropdown-item">Manage Widgets</a>
                                                    <a href="#" class="dropdown-item">Settings</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Calendar -->
                    <div class="card widget-calendar">
                        <div class="card-header">
                            <div class="text-sm text-muted mb-1 widget-calendar-year"></div>
                            <div class="h5 mb-0 widget-calendar-day"></div>
                        </div>
                        <!-- Calendar -->
                        <div data-toggle="widget-calendar"></div>
                    </div>
                    <!-- Profile stats -->
                    <div class="card card-fluid">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <!-- Avatar -->
                                    <a href="#" class="avatar rounded-circle">
                                        <img alt="Image placeholder" src="../assets/img/theme/light/team-3-800x800.jpg" class="">
                                    </a>
                                </div>
                                <div class="col ml-md-n2">
                                    <a href="#!" class="d-block h6 mb-0">John Sullivan</a>
                                    <small class="d-block text-muted">Laravel Developer</small>
                                </div>
                                <div class="col-auto">
                                    <button type="button" class="btn btn-xs btn-primary btn-icon rounded-pill">
                                        <span class="btn-inner--icon"><i class="far fa-edit"></i></span>
                                        <span class="btn-inner--text">Edit</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4 text-center">
                                    <span class="h5 mb-0">86</span>
                                    <span class="d-block text-sm">Images</span>
                                </div>
                                <div class="col-4 text-center">
                                    <span class="h5 mb-0">8</span>
                                    <span class="d-block text-sm">Products</span>
                                </div>
                                <div class="col-4 text-center">
                                    <span class="h5 mb-0">1578</span>
                                    <span class="d-block text-sm">Followers</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <button type="button" class="btn btn-sm px-0 font-weight-bold btn-link text-primary btn-icon">
                                        Message
                                    </button>
                                </div>
                                <div class="col-6 text-right">
                                    <button type="button" class="btn btn-xs btn-secondary rounded-pill">Follow</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Profile contacts -->
                    <div class="card card-fluid">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="text-sm mb-0">
                                        <i class="fab fa-facebook mr-2"></i>Facebook
                                    </h6>
                                </div>
                                <div class="col-auto">
                                    <span class="text-sm">john.sullivan</span>
                                </div>
                            </div>
                            <hr class="my-3">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="text-sm mb-0">
                                        <i class="fab fa-whatsapp mr-2"></i>Whats App
                                    </h6>
                                </div>
                                <div class="col-auto">
                                    <span class="text-sm">+40-788-45-67</span>
                                </div>
                            </div>
                            <hr class="my-3">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="text-sm mb-0">
                                        <i class="fab fa-instagram mr-2"></i>Instagram
                                    </h6>
                                </div>
                                <div class="col-auto">
                                    <span class="text-sm">@johnthedon</span>
                                </div>
                            </div>
                            <hr class="my-3">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="text-sm mb-0">
                                        <i class="fab fa-linkedin mr-2"></i>LinkedIn
                                    </h6>
                                </div>
                                <div class="col-auto">
                                    <span class="text-sm">johnsullivan</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Profile performance -->
                    <div class="card card-fluid">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="text-sm mb-0">Performance</h6>
                                    <span class="text-nowrap h6 text-muted text-sm">65%</span>
                                    <span class="badge badge-xs badge-soft-warning ml-2"><i class="far fa-arrow-down"></i> 13%</span>
                                </div>
                                <div class="col-4">
                                    <div style="max-width: 100px;">
                                        <div class="spark-chart" data-toggle="spark-chart" data-type="line" data-height="30" data-color="warning" data-dataset="[47, 94, 24, 18, 26, 65, 31, 47, 10, 44, 45]"></div>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-3">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="text-sm mb-0">Sales</h6>
                                    <span class="text-nowrap h6 text-muted text-sm">$3.068,90</span>
                                    <span class="badge badge-xs badge-soft-success ml-2"><i class="far fa-arrow-up"></i> 25%</span>
                                </div>
                                <div class="col-4">
                                    <div style="max-width: 100px;">
                                        <div class="spark-chart" data-toggle="spark-chart" data-type="line" data-height="30" data-color="success" data-dataset="[47, 94, 24, 18, 26, 65, 31, 47, 10, 44, 45]"></div>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-3">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="text-sm mb-0">Followers</h6>
                                    <span class="text-nowrap h6 text-muted text-sm">80</span>
                                    <span class="badge badge-xs badge-soft-info ml-2"><i class="far fa-arrow-up"></i> 17%</span>
                                </div>
                                <div class="col-4">
                                    <div style="max-width: 100px;">
                                        <div class="spark-chart" data-toggle="spark-chart" data-type="bar" data-height="30" data-color="primary" data-dataset="[47, 94, 24, 18, 26, 65, 31, 47, 10, 44, 45]"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Profile storage -->
                    <div class="card card-fluid">
                        <div class="card-header">
                            <h6 class="mb-0">Cloud storage</h6>
                        </div>
                        <div class="card-body">
                            <div class="progress-circle progress-lg mx-auto" id="progress-circle-1" data-progress="35" data-text="35%" data-color="warning"></div>
                            <div class="d-flex my-4 px-5">
                                <div class="col">
                                    <span class="badge badge-dot badge-lg h6">
                                        <i class="bg-success"></i>4TB
                                    </span>
                                    <small class="d-block text-muted">Total storage</small>
                                </div>
                                <div class="col">
                                    <span class="badge badge-dot badge-lg h6">
                                        <i class="bg-warning"></i>875GB
                                    </span>
                                    <small class="d-block text-muted">Used storage</small>
                                </div>
                            </div>
                            <a href="#" class="btn btn-block btn-secondary">Upgrade storage</a>
                        </div>
                    </div>
                    <!-- Project status -->
                    <div class="card card-fluid">
                        <div class="card-header">
                            <h6 class="mb-0">Project status</h6>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-9">
                                    <div class="progress-wrapper">
                                        <span class="progress-label text-muted text-sm">Logo design</span>
                                        <div class="progress mt-1 mb-2" style="height: 5px;">
                                            <div class="progress-bar bg-purple" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%;"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3 align-self-end text-right">
                                    <span class="h6 mb-0">40%</span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-9">
                                    <div class="progress-wrapper">
                                        <span class="progress-label text-muted text-sm">Website mockup</span>
                                        <div class="progress mt-1 mb-2" style="height: 5px;">
                                            <div class="progress-bar bg-purple" role="progressbar" aria-valuenow="67" aria-valuemin="0" aria-valuemax="100" style="width: 67%;"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3 align-self-end text-right">
                                    <span class="h6 mb-0">67%</span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-9">
                                    <div class="progress-wrapper">
                                        <span class="progress-label text-muted text-sm">Landing page</span>
                                        <div class="progress mt-1 mb-2" style="height: 5px;">
                                            <div class="progress-bar bg-purple" role="progressbar" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100" style="width: 89%;"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3 align-self-end text-right">
                                    <span class="h6 mb-0">89%</span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-9">
                                    <div class="progress-wrapper">
                                        <span class="progress-label text-muted text-sm">Mobile testing</span>
                                        <div class="progress mt-1 mb-2" style="height: 5px;">
                                            <div class="progress-bar bg-purple" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100" style="width: 55%;"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3 align-self-end text-right">
                                    <span class="h6 mb-0">55%</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-9">
                                    <div class="progress-wrapper">
                                        <span class="progress-label text-muted text-sm">Theme launch</span>
                                        <div class="progress mt-1 mb-2" style="height: 5px;">
                                            <div class="progress-bar bg-purple" role="progressbar" aria-valuenow="99" aria-valuemin="0" aria-valuemax="100" style="width: 99%;"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3 align-self-end text-right">
                                    <span class="h6 mb-0">99%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Notifications -->
                    <div class="card card-fluid">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="mb-0">Latest comments</h6>
                                </div>
                                <div class="text-right">
                                    <div class="actions">
                                        <a href="#" class="action-item"><i class="far fa-sync"></i></a>
                                        <div class="dropdown action-item" data-toggle="dropdown">
                                            <a href="#" class="action-item"><i class="far fa-ellipsis-h"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item">Refresh</a>
                                                <a href="#" class="dropdown-item">Manage Widgets</a>
                                                <a href="#" class="dropdown-item">Settings</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list-group list-group-flush">
                            <a href="#" class="list-group-item list-group-item-action">
                                <div class="d-flex align-items-center" data-toggle="tooltip" data-placement="right" data-title="2 hrs ago">
                                    <div>
                                        <span class="avatar bg-primary text-white rounded-circle">AM</span>
                                    </div>
                                    <div class="flex-fill ml-3">
                                        <div class="h6 text-sm mb-0">Alex Michael <small class="float-right text-muted">2 hrs ago</small></div>
                                        <p class="text-sm lh-140 mb-0">
                                            Some quick example text to build on the card title.
                                        </p>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action">
                                <div class="d-flex align-items-center" data-toggle="tooltip" data-placement="right" data-title="3 hrs ago">
                                    <div>
                                        <span class="avatar bg-warning text-white rounded-circle">SW</span>
                                    </div>
                                    <div class="flex-fill ml-3">
                                        <div class="h6 text-sm mb-0">Sandra Wayne <small class="float-right text-muted">3 hrs ago</small></div>
                                        <p class="text-sm lh-140 mb-0">
                                            Some quick example text to build on the card title.
                                        </p>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action">
                                <div class="d-flex align-items-center" data-toggle="tooltip" data-placement="right" data-title="5 hrs ago">
                                    <div>
                                        <span class="avatar bg-info text-white rounded-circle">JM</span>
                                    </div>
                                    <div class="flex-fill ml-3">
                                        <div class="h6 text-sm mb-0">Jason Miller <small class="float-right text-muted">5 hrs ago</small></div>
                                        <p class="text-sm lh-140 mb-0">
                                            Some quick example text to build on the card title.
                                        </p>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action">
                                <div class="d-flex align-items-center" data-toggle="tooltip" data-placement="right" data-title="2 hrs ago">
                                    <div>
                                        <span class="avatar bg-dark text-white rounded-circle">MJ</span>
                                    </div>
                                    <div class="flex-fill ml-3">
                                        <div class="h6 text-sm mb-0">Mike Thomson <small class="float-right text-muted">2 hrs ago</small></div>
                                        <p class="text-sm lh-140 mb-0">
                                            Some quick example text to build on the card title.
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="card-footer py-2 text-center">
                            <a href="#" class="text-sm text-muted font-weight-bold">See all notifications</a>
                        </div>
                    </div>
                    <!-- Checklist -->
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="mb-0">To do list</h6>
                                </div>
                                <div class="text-right">
                                    <div class="actions">
                                        <a href="#" class="action-item"><i class="far fa-sync"></i></a>
                                        <div class="dropdown action-item" data-toggle="dropdown">
                                            <a href="#" class="action-item"><i class="far fa-ellipsis-h"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item">Refresh</a>
                                                <a href="#" class="dropdown-item">Manage Widgets</a>
                                                <a href="#" class="dropdown-item">Settings</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-wrapper p-3">
                            <div class="checklist" data-toggle="dragula">
                                <div class="card border draggable-item shadow-none">
                                    <div class="px-3 py-2 row align-items-center">
                                        <div class="col-10">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="check-item-1" checked>
                                                <label class="custom-control-label h6 text-sm" for="check-item-1">Call with Dave</label>
                                            </div>
                                        </div>
                                        <div class="col-auto card-meta d-inline-flex align-items-center ml-sm-auto">
                                            <div class="dropdown" data-toggle="dropdown">
                                                <a href="#" class="action-item" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="far fa-ellipsis-h"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="#" class="dropdown-item">Refresh</a>
                                                    <a href="#" class="dropdown-item">Manage Widgets</a>
                                                    <a href="#" class="dropdown-item">Settings</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card border draggable-item shadow-none">
                                    <div class="px-3 py-2 row align-items-center">
                                        <div class="col-10">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="check-item-2">
                                                <label class="custom-control-label h6 text-sm" for="check-item-2">Lunch meeting</label>
                                            </div>
                                        </div>
                                        <div class="col-auto card-meta d-inline-flex align-items-center ml-sm-auto">
                                            <div class="dropdown" data-toggle="dropdown">
                                                <a href="#" class="action-item" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="far fa-ellipsis-h"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="#" class="dropdown-item">Refresh</a>
                                                    <a href="#" class="dropdown-item">Manage Widgets</a>
                                                    <a href="#" class="dropdown-item">Settings</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card border draggable-item shadow-none">
                                    <div class="px-3 py-2 row align-items-center">
                                        <div class="col-10">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="check-item-3">
                                                <label class="custom-control-label h6 text-sm" for="check-item-3">Webpixels website redesign</label>
                                            </div>
                                        </div>
                                        <div class="col-auto card-meta d-inline-flex align-items-center ml-sm-auto">
                                            <div class="dropdown" data-toggle="dropdown">
                                                <a href="#" class="action-item" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="far fa-ellipsis-h"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="#" class="dropdown-item">Refresh</a>
                                                    <a href="#" class="dropdown-item">Manage Widgets</a>
                                                    <a href="#" class="dropdown-item">Settings</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card border draggable-item shadow-none">
                                    <div class="px-3 py-2 row align-items-center">
                                        <div class="col-10">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="check-item-4" checked>
                                                <label class="custom-control-label h6 text-sm" for="check-item-4">Dashboard cards</label>
                                            </div>
                                        </div>
                                        <div class="col-auto card-meta d-inline-flex align-items-center ml-sm-auto">
                                            <div class="dropdown" data-toggle="dropdown">
                                                <a href="#" class="action-item" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="far fa-ellipsis-h"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="#" class="dropdown-item">Refresh</a>
                                                    <a href="#" class="dropdown-item">Manage Widgets</a>
                                                    <a href="#" class="dropdown-item">Settings</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card border draggable-item shadow-none">
                                    <div class="px-3 py-2 row align-items-center">
                                        <div class="col-10">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="check-item-5" checked>
                                                <label class="custom-control-label h6 text-sm" for="check-item-5">Call with Dave</label>
                                            </div>
                                        </div>
                                        <div class="col-auto card-meta d-inline-flex align-items-center ml-sm-auto">
                                            <div class="dropdown" data-toggle="dropdown">
                                                <a href="#" class="action-item" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="far fa-ellipsis-h"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="#" class="dropdown-item">Refresh</a>
                                                    <a href="#" class="dropdown-item">Manage Widgets</a>
                                                    <a href="#" class="dropdown-item">Settings</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- User -->
                    <div class="card">
                        <div class="card-body text-center">
                            <div class="avatar-parent-child">
                                <a href="#" class="avatar avatar-lg rounded-circle">
                                    <img alt="Image placeholder" src="../assets/img/theme/light/team-4-800x800.jpg">
                                </a>
                                <span class="avatar-child avatar-badge bg-"></span>
                            </div>
                            <h6 class="text-sm my-3"></h6>
                            <button type="button" class="btn btn-xs btn-secondary">Add</button>
                        </div>
                    </div>
                    <!-- Project -->
                    <div class="card">
                        <div class="card-header border-0 pb-0">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="mb-0">23 Aug, 2019</h6>
                                </div>
                                <div class="text-right">
                                    <div class="actions">
                                        <a href="#" class="action-item"><i class="far fa-sync"></i></a>
                                        <div class="dropdown action-item" data-toggle="dropdown">
                                            <a href="#" class="action-item"><i class="far fa-ellipsis-h"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item">Refresh</a>
                                                <a href="#" class="dropdown-item">Manage Widgets</a>
                                                <a href="#" class="dropdown-item">Settings</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body text-center"><a href="#" class="avatar rounded-circle avatar-lg hover-translate-y-n3">
                                <img alt="Image placeholder" src="../assets/img/theme/light/brand-avatar-1.png" class="">
                            </a>
                            <h5 class="h6 my-4"><a href="#">Purpose Application UI</a></h5>
                            <div class="avatar-group hover-avatar-ungroup mb-3">
                                <a href="#" class="avatar rounded-circle avatar-sm">
                                    <img alt="Image placeholder" src="../assets/img/theme/light/team-1-800x800.jpg" class="">
                                </a>
                                <a href="#" class="avatar rounded-circle avatar-sm">
                                    <img alt="Image placeholder" src="../assets/img/theme/light/team-2-800x800.jpg" class="">
                                </a>
                                <a href="#" class="avatar rounded-circle avatar-sm">
                                    <img alt="Image placeholder" src="../assets/img/theme/light/team-3-800x800.jpg" class="">
                                </a>
                            </div>
                            <span class="clearfix"></span>
                            <span class="badge badge-pill badge-success">Completed</span>
                        </div>
                        <div class="card-footer">
                            <div class="actions d-flex justify-content-between px-4">
                                <a href="#" class="action-item">
                                    <i class="far fa-plus"></i>
                                </a>
                                <a href="#" class="action-item">
                                    <i class="far fa-comment"></i>
                                </a>
                                <a href="#" class="action-item text-danger">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Project progress -->
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="mb-0">Project progress</h6>
                                </div>
                                <div class="text-right">
                                    <div class="actions">
                                        <a href="#" class="action-item"><i class="far fa-sync"></i></a>
                                        <div class="dropdown action-item" data-toggle="dropdown">
                                            <a href="#" class="action-item"><i class="far fa-ellipsis-h"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item">Refresh</a>
                                                <a href="#" class="dropdown-item">Manage Widgets</a>
                                                <a href="#" class="dropdown-item">Settings</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list-group list-group-flush">
                            <a href="#" class="list-group-item list-group-item-action">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <img alt="Image placeholder" src="../assets/img/theme/light/brand-avatar-1.png" class="avatar  rounded-circle">
                                    </div>
                                    <div class="flex-fill pl-3 text-limit">
                                        <h6 class="progress-text mb-1 text-sm d-block text-limit">Purpose Website UI</h6>
                                        <div class="progress progress-xs mb-0">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div class="d-flex justify-content-between text-xs text-muted text-right mt-1">
                                            <div>
                                                <span class="font-weight-bold text-warning">Pending</span>
                                            </div>
                                            <div>
                                                20 Apr
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <img alt="Image placeholder" src="../assets/img/theme/light/brand-avatar-2.png" class="avatar  rounded-circle">
                                    </div>
                                    <div class="flex-fill pl-3 text-limit">
                                        <h6 class="progress-text mb-1 text-sm d-block text-limit">Website Redesign</h6>
                                        <div class="progress progress-xs mb-0">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div class="d-flex justify-content-between text-xs text-muted text-right mt-1">
                                            <div>
                                                <span class="font-weight-bold text-success">Completed</span>
                                            </div>
                                            <div>
                                                21 Apr
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <img alt="Image placeholder" src="../assets/img/theme/light/brand-avatar-3.png" class="avatar  rounded-circle">
                                    </div>
                                    <div class="flex-fill pl-3 text-limit">
                                        <h6 class="progress-text mb-1 text-sm d-block text-limit">Webpixels Website</h6>
                                        <div class="progress progress-xs mb-0">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 72%;" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div class="d-flex justify-content-between text-xs text-muted text-right mt-1">
                                            <div>
                                                <span class="font-weight-bold text-danger">Delayed</span>
                                            </div>
                                            <div>
                                                23 Apr
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <img alt="Image placeholder" src="../assets/img/theme/light/brand-avatar-4.png" class="avatar  rounded-circle">
                                    </div>
                                    <div class="flex-fill pl-3 text-limit">
                                        <h6 class="progress-text mb-1 text-sm d-block text-limit">Purpose Application UI</h6>
                                        <div class="progress progress-xs mb-0">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div class="d-flex justify-content-between text-xs text-muted text-right mt-1">
                                            <div>
                                                <span class="font-weight-bold text-info">On schedule</span>
                                            </div>
                                            <div>
                                                3 May
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <img alt="Image placeholder" src="../assets/img/theme/light/brand-avatar-5.png" class="avatar  rounded-circle">
                                    </div>
                                    <div class="flex-fill pl-3 text-limit">
                                        <h6 class="progress-text mb-1 text-sm d-block text-limit">Purpose Dashboard UI</h6>
                                        <div class="progress progress-xs mb-0">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div class="d-flex justify-content-between text-xs text-muted text-right mt-1">
                                            <div>
                                                <span class="font-weight-bold text-success">Completed</span>
                                            </div>
                                            <div>
                                                20 Aug
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- Project budgets -->
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="mb-0">Project budgets</h6>
                                </div>
                                <div class="text-right">
                                    <div class="actions">
                                        <a href="#" class="action-item"><i class="far fa-sync"></i></a>
                                        <div class="dropdown action-item" data-toggle="dropdown">
                                            <a href="#" class="action-item"><i class="far fa-ellipsis-h"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item">Refresh</a>
                                                <a href="#" class="dropdown-item">Manage Widgets</a>
                                                <a href="#" class="dropdown-item">Settings</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list-group list-group-flush">
                            <a href="#" class="list-group-item list-group-item-action">
                                <div class="media align-items-center">
                                    <div class="mr-3">
                                        <img alt="Image placeholder" src="../assets/img/theme/light/brand-avatar-1.png" class="avatar  rounded-circle">
                                    </div>
                                    <div class="media-body">
                                        <h6 class="text-sm d-block text-limit mb-0">Purpose Website UI</h6>
                                        <span class="d-block text-sm text-muted">Development</span>
                                    </div>
                                    <div class="media-body text-right">
                                        <span class="text-sm text-dark font-weight-bold ml-3">
                                            $2500
                                        </span>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action">
                                <div class="media align-items-center">
                                    <div class="mr-3">
                                        <img alt="Image placeholder" src="../assets/img/theme/light/brand-avatar-2.png" class="avatar  rounded-circle">
                                    </div>
                                    <div class="media-body">
                                        <h6 class="text-sm d-block text-limit mb-0">Website Redesign</h6>
                                        <span class="d-block text-sm text-muted">Identity</span>
                                    </div>
                                    <div class="media-body text-right">
                                        <span class="text-sm text-dark font-weight-bold ml-3">
                                            $1800
                                        </span>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action">
                                <div class="media align-items-center">
                                    <div class="mr-3">
                                        <img alt="Image placeholder" src="../assets/img/theme/light/brand-avatar-3.png" class="avatar  rounded-circle">
                                    </div>
                                    <div class="media-body">
                                        <h6 class="text-sm d-block text-limit mb-0">Webpixels Website</h6>
                                        <span class="d-block text-sm text-muted">Branding</span>
                                    </div>
                                    <div class="media-body text-right">
                                        <span class="text-sm text-dark font-weight-bold ml-3">
                                            $3150
                                        </span>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action">
                                <div class="media align-items-center">
                                    <div class="mr-3">
                                        <img alt="Image placeholder" src="../assets/img/theme/light/brand-avatar-4.png" class="avatar  rounded-circle">
                                    </div>
                                    <div class="media-body">
                                        <h6 class="text-sm d-block text-limit mb-0">Purpose Application UI</h6>
                                        <span class="d-block text-sm text-muted">Marketing</span>
                                    </div>
                                    <div class="media-body text-right">
                                        <span class="text-sm text-dark font-weight-bold ml-3">
                                            $4400
                                        </span>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action">
                                <div class="media align-items-center">
                                    <div class="mr-3">
                                        <img alt="Image placeholder" src="../assets/img/theme/light/brand-avatar-5.png" class="avatar  rounded-circle">
                                    </div>
                                    <div class="media-body">
                                        <h6 class="text-sm d-block text-limit mb-0">Purpose Dashboard UI</h6>
                                        <span class="d-block text-sm text-muted">Frameworks</span>
                                    </div>
                                    <div class="media-body text-right">
                                        <span class="text-sm text-dark font-weight-bold ml-3">
                                            $2200
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- Notifications -->
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="mb-0">Notifications</h6>
                                </div>
                                <div class="text-right">
                                    <div class="actions">
                                        <a href="#" class="action-item"><i class="far fa-sync"></i></a>
                                        <div class="dropdown action-item" data-toggle="dropdown">
                                            <a href="#" class="action-item"><i class="far fa-ellipsis-h"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item">Refresh</a>
                                                <a href="#" class="dropdown-item">Manage Widgets</a>
                                                <a href="#" class="dropdown-item">Settings</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list-group list-group-flush">
                            <a href="#" class="list-group-item list-group-item-action">
                                <div class="d-flex">
                                    <div>
                                        <i class="far fa-bell mr-3"></i>
                                    </div>
                                    <div>
                                        <div class="text-sm lh-150">
                                            Mail sent to <span class="text-dark font-weight-bold">Alex Michael</span>
                                        </div>
                                        <small class="d-block text-muted">2 hrs ago</small>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action">
                                <div class="d-flex">
                                    <div>
                                        <i class="far fa-thumbs-up mr-3"></i>
                                    </div>
                                    <div>
                                        <div class="text-sm lh-150">
                                            You liked a comment from <span class="text-dark font-weight-bold">Sandra Wayne</span>
                                        </div>
                                        <small class="d-block text-muted">3 hrs ago</small>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action">
                                <div class="d-flex">
                                    <div>
                                        <i class="far fa-thumbs-up mr-3"></i>
                                    </div>
                                    <div>
                                        <div class="text-sm lh-150">
                                            New likes from <span class="text-dark font-weight-bold">Jason Miller</span>
                                        </div>
                                        <small class="d-block text-muted">5 hrs ago</small>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action">
                                <div class="d-flex">
                                    <div>
                                        <i class="far fa-tasks mr-3"></i>
                                    </div>
                                    <div>
                                        <div class="text-sm lh-150">
                                            You are now in team with <span class="text-dark font-weight-bold">Mike Thomson</span>
                                        </div>
                                        <small class="d-block text-muted">2 hrs ago</small>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action">
                                <div class="d-flex">
                                    <div>
                                        <i class="far fa-envelope mr-3"></i>
                                    </div>
                                    <div>
                                        <div class="text-sm lh-150">
                                            Mail sent to <span class="text-dark font-weight-bold">Richard Nixon</span>
                                        </div>
                                        <small class="d-block text-muted">3 hrs ago</small>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="card-footer py-2 text-center">
                            <a href="#" class="text-sm text-muted font-weight-bold">See all notifications</a>
                        </div>
                    </div>
                    <!-- Timeline -->
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="mb-0">Tasks timeline</h6>
                                </div>
                                <div class="text-right">
                                    <div class="actions">
                                        <a href="#" class="action-item"><i class="far fa-sync"></i></a>
                                        <div class="dropdown action-item" data-toggle="dropdown">
                                            <a href="#" class="action-item"><i class="far fa-ellipsis-h"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item">Refresh</a>
                                                <a href="#" class="dropdown-item">Manage Widgets</a>
                                                <a href="#" class="dropdown-item">Settings</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="timeline timeline-one-side" data-timeline-content="axis" data-timeline-axis-style="dashed">
                                <div class="timeline-block">
                                    <span class="timeline-step timeline-step-sm bg-primary border-primary text-white">1</span>
                                    <div class="timeline-content">
                                        <span class="text-muted text-sm">Task added</span>
                                        <a href="#" class="d-block h6 text-sm mb-0">Meet with Jane for discussing the presentation</a>
                                        <small><i class="far fa-clock mr-1"></i>45 min ago</small>
                                    </div>
                                </div>
                                <div class="timeline-block">
                                    <span class="timeline-step timeline-step-sm bg-warning border-warning text-white">2</span>
                                    <div class="timeline-content">
                                        <span class="text-muted text-sm">Task added</span>
                                        <a href="#" class="d-block h6 text-sm mb-0">Meet with Jane for discussing the presentation</a>
                                        <small><i class="far fa-clock mr-1"></i>45 min ago</small>
                                    </div>
                                </div>
                                <div class="timeline-block">
                                    <span class="timeline-step timeline-step-sm bg-info border-info text-white">3</span>
                                    <div class="timeline-content">
                                        <span class="text-muted text-sm">Task added</span>
                                        <a href="#" class="d-block h6 text-sm mb-0">Meet with Jane for discussing the presentation</a>
                                        <small><i class="far fa-clock mr-1"></i>45 min ago</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer py-2 text-center">
                            <a href="#" class="text-sm text-muted font-weight-bold">See all notifications</a>
                        </div>
                    </div>
                    <!-- Stats -->
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h6 class="text-muted mb-1">New products</h6>
                                    <span class="h5 font-weight-bold mb-0">339</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon bg-gradient-warning text-white rounded-circle icon-shape">
                                        <i class="far fa-tags"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-sm">
                                <span class="badge badge-soft-success mr-2"><i class="far fa-arrow-up"></i> 25%</span>
                                <span class="text-nowrap">Since last month</span>
                            </p>
                        </div>
                    </div>
                    <!-- Seller -->
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <div class="avatar-parent-child">
                                    <img alt="Image placeholder" src="../assets/img/theme/light/brand-avatar-2.png" class="avatar  rounded-circle">
                                    <span class="avatar-child avatar-badge bg-info"></span>
                                </div>
                                <div class="avatar-content ml-3">
                                    <h6 class="mb-0">Ramotion</h6>
                                    <span class="text-sm text-muted"><i class="far fa-calendar mr-2"></i>3 Sep, 19</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="border-bottom pb-4">
                                <div class="row align-items-center">
                                    <div class="col-6">
                                        <h6 class="mb-0">110</h6>
                                        <span class="text-sm text-muted">Products</span>
                                    </div>
                                    <div class="col-6">
                                        <h6 class="mb-0">$47.289,00</h6>
                                        <span class="text-sm text-muted">Sales</span>
                                    </div>
                                </div>
                            </div>
                            <div class="w-100 pt-3">
                                <div class="spark-chart" data-toggle="spark-chart" data-color=info data-dataset="[47, 94, 24, 18, 26, 65, 31, 47, 10, 44, 45]"></div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="actions d-flex justify-content-between">
                                <a href="#" class="action-item">
                                    <span class="btn-inner--icon">Projects</span>
                                </a>
                                <a href="#" class="action-item">
                                    <span class="btn-inner--icon">See profile</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Invoice -->
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col-10">
                                    <h6 class="mb-0"><a href="invoice-description.html">Purpose Application UI</a></h6>
                                </div>
                                <div class="col-2 text-right">
                                    <div class="actions">
                                        <div class="dropdown" data-toggle="dropdown">
                                            <a href="#" class="action-item"><i class="far fa-ellipsis-v"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item">Refresh</a>
                                                <a href="#" class="dropdown-item">Manage Widgets</a>
                                                <a href="#" class="dropdown-item">Settings</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="p-3 border border-dashed">
                                <span class="text-sm text-muted font-weight-600">Invoice #10024</span>
                                <div class="row align-items-center mt-3">
                                    <div class="col-6">
                                        <h6 class="mb-0">$2.300</h6>
                                        <span class="text-sm text-muted">Amount</span>
                                    </div>
                                    <div class="col-6">
                                        <h6 class="mb-0">10 May, 19, 19</h6>
                                        <span class="text-sm text-muted">Due Date</span>
                                    </div>
                                </div>
                            </div>
                            <div class="media mt-4 align-items-center">
                                <img alt="Image placeholder" src="../assets/img/theme/light/brand-avatar-1.png" class="avatar  rounded-circle avatar-sm">
                                <div class="media-body pl-3">
                                    <div class="text-sm my-0">Martin Lewis <a href="#" class="text-primary font-weight-600">@dribbble</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Users -->
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="mb-0">Users</h6>
                                </div>
                                <div class="text-right">
                                    <div class="actions">
                                        <a href="#" class="action-item"><i class="far fa-sync"></i></a>
                                        <div class="dropdown action-item" data-toggle="dropdown">
                                            <a href="#" class="action-item"><i class="far fa-ellipsis-h"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item">Refresh</a>
                                                <a href="#" class="dropdown-item">Manage Widgets</a>
                                                <a href="#" class="dropdown-item">Settings</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Search -->
                        <div class="card-header py-2">
                            <form>
                                <div class="input-group input-group-merge input-group-flush">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-transparent pl-0"><i class="far fa-search"></i></span>
                                    </div>
                                    <input type="text" class="form-control form-control-flush" placeholder="Type and hit enter ...">
                                    <div class="input-group-append">
                                        <button type="reset" class="input-group-text pr-0 bg-transparent"><i class="far fa-times"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- List group -->
                        <div class="list-group list-group-flush">
                            <div class="list-group-item">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <!-- Avatar -->
                                        <a href="#" class="avatar rounded-circle">
                                            <img alt="Image placeholder" src="../assets/img/theme/light/team-1-800x800.jpg" class="">
                                        </a>
                                    </div>
                                    <div class="col ml-n2">
                                        <a href="#!" class="d-block h6 mb-0">John Sullivan</a>
                                        <div>
                                            <span class="text-sm text-success">●</span>
                                            <small>Online</small>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <button type="button" class="btn btn-xs btn-secondary btn-icon">
                                            <span class="btn-inner--icon"><i class="far fa-plus"></i></span>
                                            <span class="btn-inner--text">Add</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <!-- Avatar -->
                                        <a href="#" class="avatar rounded-circle">
                                            <img alt="Image placeholder" src="../assets/img/theme/light/team-2-800x800.jpg" class="">
                                        </a>
                                    </div>
                                    <div class="col ml-n2">
                                        <a href="#!" class="d-block h6 mb-0">Heather Wright</a>
                                        <div>
                                            <span class="text-sm text-warning">●</span>
                                            <small>In a meeting</small>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <button type="button" class="btn btn-xs btn-secondary btn-icon">
                                            <span class="btn-inner--icon"><i class="far fa-plus"></i></span>
                                            <span class="btn-inner--text">Add</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <!-- Avatar -->
                                        <a href="#" class="avatar rounded-circle">
                                            <img alt="Image placeholder" src="../assets/img/theme/light/team-3-800x800.jpg" class="">
                                        </a>
                                    </div>
                                    <div class="col ml-n2">
                                        <a href="#!" class="d-block h6 mb-0">James Lewis</a>
                                        <div>
                                            <span class="text-sm text-danger">●</span>
                                            <small>Offline</small>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <button type="button" class="btn btn-xs btn-secondary btn-icon">
                                            <span class="btn-inner--icon"><i class="far fa-plus"></i></span>
                                            <span class="btn-inner--text">Add</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <!-- Avatar -->
                                        <a href="#" class="avatar rounded-circle">
                                            <img alt="Image placeholder" src="../assets/img/theme/light/team-4-800x800.jpg" class="">
                                        </a>
                                    </div>
                                    <div class="col ml-n2">
                                        <a href="#!" class="d-block h6 mb-0">Martin Gray</a>
                                        <div>
                                            <span class="text-sm text-success">●</span>
                                            <small>Online</small>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <button type="button" class="btn btn-xs btn-secondary btn-icon">
                                            <span class="btn-inner--icon"><i class="far fa-plus"></i></span>
                                            <span class="btn-inner--text">Add</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <!-- Avatar -->
                                        <a href="#" class="avatar rounded-circle">
                                            <img alt="Image placeholder" src="../assets/img/theme/light/team-5-800x800.jpg" class="">
                                        </a>
                                    </div>
                                    <div class="col ml-n2">
                                        <a href="#!" class="d-block h6 mb-0">John Snow</a>
                                        <div>
                                            <span class="text-sm text-success">●</span>
                                            <small>Online</small>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <button type="button" class="btn btn-xs btn-secondary btn-icon">
                                            <span class="btn-inner--icon"><i class="far fa-plus"></i></span>
                                            <span class="btn-inner--text">Add</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Avatar upload -->
                    <div class="card bg-gradient-warning hover-shadow-lg border-0">
                        <div class="card-body py-3">
                            <div class="row row-grid align-items-center">
                                <div class="col-lg-8">
                                    <div class="media align-items-center">
                                        <a href="#" class="avatar avatar-lg rounded-circle mr-3">
                                            <img alt="Image placeholder" src="../assets/img/theme/light/team-1-800x800.jpg">
                                        </a>
                                        <div class="media-body">
                                            <h5 class="text-white mb-0">Heather Wright</h5>
                                            <div>
                                                <form>
                                                    <input type="file" name="file-1[]" id="file-1" class="custom-input-file custom-input-file-link" data-multiple-caption="{count} files selected" multiple />
                                                    <label for="file-1">
                                                        <span class="text-white">Change avatar</span>
                                                    </label>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto flex-fill mt-4 mt-sm-0 text-sm-right d-none d-lg-block">
                                    <a href="#" class="btn btn-sm btn-white rounded-pill btn-icon shadow">
                                        <span class="btn-inner--icon"><i class="far fa-fire"></i></span>
                                        <span class="btn-inner--text">Upgrade to Pro</span>
                                    </a>
                                </div>
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