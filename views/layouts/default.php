<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>پنل مدیریت | هویو استار</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?php echo HSP_ASSET_URL ?>fonts/font-awesome.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo HSP_ASSET_URL ?>css/adminlte.min.css">

    <!-- bootstrap rtl -->
    <link rel="stylesheet" href="<?php echo HSP_ASSET_URL ?>css/bootstrap-rtl.min.css">
    <!-- template rtl version -->
    <link rel="stylesheet" href="<?php echo HSP_ASSET_URL ?>css/custom-style.css">

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
            </li>
<!--            <li class="nav-item d-none d-sm-inline-block">-->
<!--                <a href="index3.html" class="nav-link">خانه</a>-->
<!--            </li>-->
<!--            <li class="nav-item d-none d-sm-inline-block">-->
<!--                <a href="#" class="nav-link">تماس با ما</a>-->
<!--            </li>-->
        </ul>

        <!-- SEARCH FORM -->
<!--        <form class="form-inline ml-3">-->
<!--            <div class="input-group input-group-sm">-->
<!--                <input class="form-control form-control-navbar" type="search" placeholder="جستجو" aria-label="Search">-->
<!--                <div class="input-group-append">-->
<!--                    <button class="btn btn-navbar" type="submit">-->
<!--                        <i class="fa fa-search"></i>-->
<!--                    </button>-->
<!--                </div>-->
<!--            </div>-->
<!--        </form>-->

    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="#" class="brand-link">
            <!--            <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"-->
            <!--                 style="opacity: .8">-->
            <span class="brand-text font-weight-light">پنل مدیریت</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <div>
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="https://www.gravatar.com/avatar/52f0fbcbedee04a121cba8dad1174462?s=200&d=mm&r=g"
                             class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">مجید بهنام فرد</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">

                        <li class="nav-item">
                            <a href="/dashboard" class="nav-link active">
                                <i class="nav-icon fa fa-dashboard"></i>
                                <p>
                                    پیشخوان
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-pie-chart"></i>
                                <p>
                                    فعالیت و تخفیف
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/dashboard/discount" class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>تخفیف های من</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/dashboard/messages" class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>پیام های من</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/dashboard/wallet" class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>کیف پول من</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/dashboard/order" class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>سفارش های من</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="/dashboard/guide" class="nav-link">
                                <i class="nav-icon fa fa-file"></i>
                                <p>راهنمای اشتراک</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/dashboard/result" class="nav-link">
                                <i class="nav-icon fa fa-file"></i>
                                <p>نتیجه تست</p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-cog"></i>
                                <p>
                                    تنظیمات
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/dashboard/edit" class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>ویرایش اطلاعات کاربری</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/dashboard/upgrade" class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>ارتقاء حساب کاربری</p>
                                    </a>
                                </li>
                            </ul>
                        </li>


                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">پیشخوان</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="#">خانه</a></li>
                            <li class="breadcrumb-item active">پیشخوان</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <?php include HSP_VIEWS . $view; ?>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <div class="p-3">
            <h5>Title</h5>
            <p>Sidebar content</p>
        </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">

    </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<script>

    jQuery(document).ready(function($){
        $(".nav-item").click(function(){
            $(".nav-link ").addClass("active");
        });
    });
</script>
<!-- jQuery -->
<script src="<?php echo HSP_ASSET_URL ?>js/jquery.min.js"></script>
<script src="<?php echo HSP_ASSET_URL ?>js/bootstrap.bundle.min.js"></script>
<script src="<?php echo HSP_ASSET_URL ?>js/adminlte.min.js"></script>
</body>
</html>
