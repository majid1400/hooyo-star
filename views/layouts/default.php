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


    <!-- Content Wrapper. Contains page content -->
    <div class="wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header shadow-menu">
            <div class="container">
                <div class="row mb-2">
                    <div class="col-4 col-sm-6">
                        <h1 class="m-0 text-dark"><img
                                    src="https://cdn.hooyo.ir/wp-content/uploads/2021/02/logo_Final.jpg" alt="هویو"
                                    style="max-width: 210px;"></h1>
                    </div><!-- /.col -->
                    <div class="col-8 col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li style="margin-top: 6px;">
                                <a class="rt-l-i" style="color: black" href="tel:+982191070567">
                                    02191070567
                                </a></li>
                            <li class="basket"><a class="ry-basket-href login_modal">
<!--                                    <i class="fa fa-user"></i>-->
                                    <img src="<?= HSP_ASSET_URL ?>icons/user.png" alt="chat" width="20"
                                         height="20">
                                </a></li>
                            <li class="basket"><a class="ry-basket-href login_modal">
<!--                                    <i class="fa fa-shopping-cart"></i>-->
                                    <img src="<?= HSP_ASSET_URL ?>icons/shopping-cart.png" alt="chat" width="20"
                                         height="20">
                                </a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>


        <div class="content">
            <?php include HSP_VIEWS . $view; ?>
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?php echo HSP_ASSET_URL ?>js/jquery.min.js"></script>
<script src="<?php echo HSP_ASSET_URL ?>js/bootstrap.bundle.min.js"></script>
<script src="<?php echo HSP_ASSET_URL ?>js/adminlte.min.js"></script>
</body>
</html>
