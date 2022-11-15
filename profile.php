<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Computers</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="images/fevicon.png" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <link href="../font/fontawesome-free-6.0.0-web/css/all.css" rel="stylesheet" />

    <!-- owl stylesheets --> 
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="./css/style_p.css">
</head>
<?php
    include_once '../lib/database.php';
    include_once '../lib/session.php';
    include_once '../helpers/format.php';
    include_once './include/header.php';

    // Session::init();

    spl_autoload_register(function($callName){
        include_once "../classes/".$callName.'.php';
    });
    $customer = new Customer();
    if(Session::get("ten_dang_nhap") == false){
        echo '<script>window.location.href="login.php"</script>';
    }
?>
<style>
    body{
        color: #1a202c;
        text-align: left;
        background-color: #e2e8f0;    
    }
    .main-body {
        padding: 15px;
    }
    .card {
        box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
    }

    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 0 solid rgba(0,0,0,.125);
        border-radius: .25rem;
    }

    .card-body {
        flex: 1 1 auto;
        min-height: 1px;
        padding: 1rem;
    }

    .gutters-sm {
        margin-right: -8px;
        margin-left: -8px;
    }

    .gutters-sm>.col, .gutters-sm>[class*=col-] {
        padding-right: 8px;
        padding-left: 8px;
    }
    .mb-3, .my-3 {
        margin-bottom: 1rem!important;
    }

    .bg-gray-300 {
        background-color: #e2e8f0;
    }
    .h-100 {
        height: 100%!important;
    }
    .shadow-none {
        box-shadow: none!important;
    }
    .mr-20{
        margin-top: 20px;
    }
</style>
<div class="container">
    <div class="main-body">
          <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="main-breadcrumb mr-20">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item active " aria-current="page">Thông tin khách hàng</li>
        </ol>
        </nav>
        <!-- /Breadcrumb -->
        <?php
            $id = Session::get("id");
            $get_customer = $customer->show_customer($id);
            if($get_customer){
                while($row = $get_customer->fetch_assoc()){
        ?>
        <div class="row gutters-sm">
        <div class="col-md-4 mb-3">
            <div class="card">
            <div class="card-body">
                <div class="d-flex flex-column align-items-center text-center">
                <img src="<?php echo $row["hinh_anh"];?>" alt="Admin" class="rounded-circle" width="150">
                <div class="mt-3">
                    <h4><?php echo $row['ten_khach_hang'];?></h4>
                    <p class="text-secondary mb-1"><?php echo $row["email"];?></p>
                    <p class="text-muted font-size-sm"><?php echo $row["diachi"];?></p>
                </div>
                </div>
            </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Họ và tên</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <?php echo $row["ten_khach_hang"];?>
                        </div>
                    </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?php echo $row["email"];?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Số điện thoại</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?php echo $row["sdt"];?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Tuổi</h6>
                        </div>
                            <div class="col-sm-9 text-secondary">
                                <?php echo $row["tuoi"];?>
                            </div>
                        </div>
                        <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Địa chỉ</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $row["diachi"];?>
                                </div>
                            </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-12">
                                <a class="btn btn-info " target="__blank" href="edit_profile.php">Sửa thông tin</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
                }
            }
        ?>
    </div>
</div>