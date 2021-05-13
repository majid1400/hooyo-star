<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo HSP_ASSET_URL ?>images/favicon.png">
    <title>LaraCMS</title>
    <link href="<?php echo HSP_ASSET_URL ?>css/lib/bootstrap/bootstrap-rtl.min.css" rel="stylesheet">
    <link href="<?php echo HSP_ASSET_URL ?>css/helper.css" rel="stylesheet">
    <link href="<?php echo HSP_ASSET_URL ?>css/fonts.css" rel="stylesheet">
    <link href="<?php echo HSP_ASSET_URL ?>css/style.css" rel="stylesheet">
</head>
<body>
<!-- Preloader - style you can find in spinners.css -->
<div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
    </svg>
</div>
<!-- Main wrapper  -->
<div id="main-wrapper">
    <!-- header header  -->
    <div class="header">
        <nav class="navbar top-navbar navbar-expand-md navbar-light">
            <!-- Logo -->
            <div class="navbar-header">
                <a class="navbar-brand" href="index.html">
                    <!-- Logo icon -->
                    <b><img src="<?php echo HSP_ASSET_URL ?>images/logo.png" alt="homepage" class="dark-logo"/></b>
                    <!--End Logo icon -->
                    <!-- Logo text -->
                    <span><img src="<?php echo HSP_ASSET_URL ?>images/logo-text.png" alt="homepage" class="dark-logo"/></span>
                </a>
            </div>
            <!-- End Logo -->
            <div class="navbar-collapse">
                <!-- toggle and nav items -->
                <ul class="navbar-nav mr-auto mt-md-0">

                </ul>
                <!-- User profile and search -->
                <ul class="navbar-nav my-lg-0">

                    <!-- Search -->
                    <li class="nav-item hidden-sm-down search-box"><a class="nav-link hidden-sm-down text-muted  "
                                                                      href="javascript:void(0)"><i
                                    class="ti-search"></i></a>
                        <form class="app-search">
                            <input type="text" class="form-control" placeholder="Search here"> <a class="srh-btn"><i
                                        class="ti-close"></i></a></form>
                    </li>
                    <!-- Comment -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-muted text-muted  " href="#" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false"> <i class="fa fa-bell"></i>
                            <div class="notify"><span class="heartbit"></span> <span class="point"></span></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right mailbox animated zoomIn">
                            <ul>
                                <li>
                                    <div class="drop-title">Notifications</div>
                                </li>
                                <li>
                                    <div class="message-center">
                                        <!-- Message -->
                                        <a href="#">
                                            <div class="btn btn-danger btn-circle m-r-10"><i class="fa fa-link"></i>
                                            </div>
                                            <div class="mail-contnet">
                                                <h5>This is title</h5> <span class="mail-desc">Just see the my new admin!</span>
                                                <span class="time">9:30 AM</span>
                                            </div>
                                        </a>
                                        <!-- Message -->
                                        <a href="#">
                                            <div class="btn btn-success btn-circle m-r-10"><i class="ti-calendar"></i>
                                            </div>
                                            <div class="mail-contnet">
                                                <h5>This is another title</h5> <span class="mail-desc">Just a reminder that you have event</span>
                                                <span class="time">9:10 AM</span>
                                            </div>
                                        </a>
                                        <!-- Message -->
                                        <a href="#">
                                            <div class="btn btn-info btn-circle m-r-10"><i class="ti-settings"></i>
                                            </div>
                                            <div class="mail-contnet">
                                                <h5>This is title</h5> <span class="mail-desc">You can customize this template as you want</span>
                                                <span class="time">9:08 AM</span>
                                            </div>
                                        </a>
                                        <!-- Message -->
                                        <a href="#">
                                            <div class="btn btn-primary btn-circle m-r-10"><i class="ti-user"></i></div>
                                            <div class="mail-contnet">
                                                <h5>This is another title</h5> <span class="mail-desc">Just see the my admin!</span>
                                                <span class="time">9:02 AM</span>
                                            </div>
                                        </a>
                                    </div>
                                </li>
                                <li>
                                    <a class="nav-link text-center" href="javascript:void(0);"> <strong>Check all
                                            notifications</strong> <i class="fa fa-angle-right"></i> </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- End Comment -->
                    <!-- Messages -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-muted  " href="#" id="2" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false"> <i class="fa fa-envelope"></i>
                            <div class="notify"><span class="heartbit"></span> <span class="point"></span></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right mailbox animated zoomIn" aria-labelledby="2">
                            <ul>
                                <li>
                                    <div class="drop-title">You have 4 new messages</div>
                                </li>
                                <li>
                                    <div class="message-center">
                                        <!-- Message -->
                                        <a href="#">
                                            <div class="user-img"><img
                                                        src="<?php echo HSP_ASSET_URL ?>images/users/5.jpg" alt="user"
                                                        class="img-circle"> <span
                                                        class="profile-status online pull-right"></span></div>
                                            <div class="mail-contnet">
                                                <h5>Michael Qin</h5> <span
                                                        class="mail-desc">Just see the my admin!</span> <span
                                                        class="time">9:30 AM</span>
                                            </div>
                                        </a>
                                        <!-- Message -->
                                        <a href="#">
                                            <div class="user-img"><img
                                                        src="<?php echo HSP_ASSET_URL ?>images/users/2.jpg" alt="user"
                                                        class="img-circle"> <span
                                                        class="profile-status busy pull-right"></span></div>
                                            <div class="mail-contnet">
                                                <h5>John Doe</h5> <span
                                                        class="mail-desc">I've sung a song! See you at</span> <span
                                                        class="time">9:10 AM</span>
                                            </div>
                                        </a>
                                        <!-- Message -->
                                        <a href="#">
                                            <div class="user-img"><img
                                                        src="<?php echo HSP_ASSET_URL ?>images/users/3.jpg" alt="user"
                                                        class="img-circle"> <span
                                                        class="profile-status away pull-right"></span></div>
                                            <div class="mail-contnet">
                                                <h5>Mr. John</h5> <span class="mail-desc">I am a singer!</span> <span
                                                        class="time">9:08 AM</span>
                                            </div>
                                        </a>
                                        <!-- Message -->
                                        <a href="#">
                                            <div class="user-img"><img
                                                        src="<?php echo HSP_ASSET_URL ?>images/users/4.jpg" alt="user"
                                                        class="img-circle"> <span
                                                        class="profile-status offline pull-right"></span></div>
                                            <div class="mail-contnet">
                                                <h5>Michael Qin</h5> <span
                                                        class="mail-desc">Just see the my admin!</span> <span
                                                        class="time">9:02 AM</span>
                                            </div>
                                        </a>
                                    </div>
                                </li>
                                <li>
                                    <a class="nav-link text-center" href="javascript:void(0);"> <strong>See all
                                            e-Mails</strong> <i class="fa fa-angle-right"></i> </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- End Messages -->
                    <!-- Profile -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false"><img
                                    src="<?php echo HSP_ASSET_URL ?>images/users/5.jpg" alt="user"
                                    class="profile-pic"/></a>
                        <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                            <ul class="dropdown-user">
                                <li><a href="#"><i class="ti-user"></i> پروفایل کاربری</a></li>
                                <li><a href="#"><i class="ti-settings"></i> تننظیمات</a></li>
                                <li><a href="#"><i class="fa fa-power-off"></i> خروج</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <!-- End header header -->
    <!-- Left Sidebar  -->
    <div class="right-sidebar">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav">
                <ul id="sidebarnav">
                    <li class="nav-devider"></li>
                    <li class="nav-label"></li>
                    <li><a href="/dashboard" aria-expanded="false"><i class="fa fa-tachometer"></i>
                            <span
                                    class="hide-menu">پیشخوان
                        </span></a>

                    </li>
                    <li><a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-users"></i><span
                                    class="hide-menu">فعالیت و تخفیف</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="/dashboard/discount">تخفیف های من</a></li>
                            <li><a href="/dashboard/messages">پیام های من</a></li>
                            <li><a href="/dashboard/wallet">کیف پول من</a></li>
                            <li><a href="/dashboard/order">سفارش های من</a></li>
                        </ul>
                    </li>
                    <li><a href="/dashboard/guide" aria-expanded="false"><i class="fa fa-book"></i><span
                                    class="hide-menu">راهنمای اشتراک
                        </span></a>
                    </li>
                    <li><a href="/dashboard/result" aria-expanded="false"><i class="fa fa-book"></i><span
                                    class="hide-menu">نتیجه تست
                        </span></a>
                    </li>

                    <li><a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-cog"></i><span
                                    class="hide-menu">تنظیمات</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="/dashboard/edit">ویرایش اطلاعات کاربری</a></li>
                            <li><a href="/dashboard/upgrade">ارتقاء حساب کاربری</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </div>
    <!-- End Left Sidebar  -->
    <!-- Page wrapper  -->
    <div class="page-wrapper">
        <!-- Bread crumb -->
        <div class="row page-titles">
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">خانه</a></li>
                    <li class="breadcrumb-item ">پیشخوان</li>
                    <li class="breadcrumb-item active">آمار</li>
                </ol>
            </div>
            <!--<div class="col-md-5 align-self-center">-->
            <!--<h3 class="text-primary">پیشخوان</h3>-->
            <!--</div>-->
        </div>
        <!-- End Bread crumb -->
        <!-- Container fluid  -->
        <div class="container-fluid">
            <!-- Start Page Content -->
            <div class="row">
                <?php include HSP_VIEWS . $view; ?>
            </div>
            <!-- /# row -->
            <!-- End PAge Content -->
        </div>
        <!-- End Container fluid  -->
    </div>
    <!-- End Page wrapper  -->
</div>
<!-- End Wrapper -->

<script src="<?php echo HSP_ASSET_URL ?>js/lib/jquery/jquery.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="<?php echo HSP_ASSET_URL ?>js/lib/bootstrap/js/popper.min.js"></script>
<script src="<?php echo HSP_ASSET_URL ?>js/lib/bootstrap/js/bootstrap.min.js"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="<?php echo HSP_ASSET_URL ?>js/jquery.slimscroll.js"></script>
<!--Menu sidebar -->
<script src="<?php echo HSP_ASSET_URL ?>js/sidebarmenu.js"></script>
<!--stickey kit -->
<script src="<?php echo HSP_ASSET_URL ?>js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
<!--Custom JavaScript -->
<script src="<?php echo HSP_ASSET_URL ?>js/custom.min.js"></script>
</body>
</html>