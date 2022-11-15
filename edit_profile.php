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

    Session::init();

    spl_autoload_register(function($callName){
        include_once "../classes/".$callName.'.php';
    });
    $customer = new Customer();
    if(Session::get("ten_dang_nhap") == false){
        header("Location: login.php");
    }
?>
<style>
body{    
    background-color:#f2f6fc;
    color:#69707a;
}
.img-account-profile {
    height: 10rem;
    cursor: pointer;

}
.rounded-circle {
    border-radius: 50% !important;
}
.card {
    box-shadow: 0 0.15rem 1.75rem 0 rgb(33 40 50 / 15%);
}
.card .card-header {
    font-weight: 500;
}
.card-header:first-child {
    border-radius: 0.35rem 0.35rem 0 0;
}
.card-header {
    padding: 1rem 1.35rem;
    margin-bottom: 0;
    background-color: rgba(33, 40, 50, 0.03);
    border-bottom: 1px solid rgba(33, 40, 50, 0.125);
}
.form-control, .dataTable-input {
    display: block;
    width: 100%;
    padding: 0.875rem 1.125rem;
    font-size: 0.875rem;
    font-weight: 400;
    line-height: 1;
    color: #69707a;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #c5ccd6;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    border-radius: 0.35rem;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

.nav-borders .nav-link.active {
    color: #0061f2;
    border-bottom-color: #0061f2;
}
.nav-borders .nav-link {
    color: #69707a;
    border-bottom-width: 0.125rem;
    border-bottom-style: solid;
    border-bottom-color: transparent;
    padding-top: 0.5rem;
    padding-bottom: 0.5rem;
    padding-left: 0;
    padding-right: 0;
    margin-left: 1rem;
    margin-right: 1rem;
}
#img-none{
    display: none;
}
.image-upload>input {
    display: none;
    cursor: pointer;
}
</style>
<?php
    $id = Session::get("id");
    $get_customer = $customer->show_customer($id);
    if(isset($_POST['save'])){
        $hinh_anh = $_FILES['hinh_anh']['name'];
        $tmp = $_FILES['hinh_anh']['tmp_name'];
        $ten_khach_hang = $_POST['ten_khach_hang'];
        $tuoi = $_POST['tuoi'];
        $dia_chi = $_POST['dia_chi'];
        $email = $_POST['email'];
        $sdt = $_POST['sdt'];
        $edit_customer = $customer->edit_customer($id,$tmp,$hinh_anh,$ten_khach_hang,$tuoi,$sdt,$email,$dia_chi);
    }
    if($get_customer){
        while($row = $get_customer->fetch_assoc()){
?>
<div class="container-xl px-4">
    <!-- Account page navigation-->
    <hr class="mt-0 mb-4">
    <nav aria-label="breadcrumb" class="main-breadcrumb mr-20">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item active " aria-current="page">Thông tin khách hàng</li>
        </ol>
    </nav>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-xl-4">
                <!-- Profile picture card-->
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Thông tin ảnh</div>
                    <div class="card-body text-center">
                        <!-- Profile picture image-->
                        <!-- Profile picture upload button-->                 
                        <div class="image-upload">
                            <label for="file-input">
                                <img class="img-account-profile rounded-circle mb-2" src="<?php echo $row['hinh_anh']?>" alt="">
                                <!-- Profile picture help block-->
                                <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 10 MB</div>
                            </label>

                            <input id="file-input" type="file" name="hinh_anh" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <!-- Account details card-->
                <div class="card mb-4">
                    <div class="card-header">Thông tin chi tiết</div>
                    <div class="card-body">
                        <form>
                            <!-- Form Group (username)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="inputUsername">Họ và tên</label>
                                <input class="form-control" id="inputUsername" type="text" placeholder="Nhập họ và tên" name="ten_khach_hang" value="<?php echo $row['ten_khach_hang'];?>">
                            </div>
                            <!-- Form Row-->
                            <!-- Form Row        -->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (organization name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputOrgName">Tuổi</label>
                                    <input class="form-control" id="inputOrgName" type="number" placeholder="Nhập tuổi" name="tuoi" min="1" max="100" value="<?php echo $row['tuoi'];?>">
                                </div>
                                <!-- Form Group (location)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputLocation">Địa chỉ</label>
                                    <input class="form-control" id="inputLocation" type="text" placeholder="Nhập địa chỉ" name="dia_chi" value="<?php echo $row['diachi'];?>">
                                </div>
                            </div>
                            <!-- Form Group (email address)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="inputEmailAddress">Địa chỉ email</label>
                                <input class="form-control" id="inputEmailAddress" type="email" name="email" placeholder="Nhập email" value="<?php echo $row['email'];?>">
                            </div>
                            <!-- Form Row-->
                            <div class="mb-3">
                                <!-- Form Group (phone number)-->
                                <label class="small mb-1" for="inputPhone">Số điện thoại</label>
                                <input class="form-control" id="inputPhone" type="tel" name="sdt" placeholder="Nhập số điện thoại" value="<?php echo $row['sdt'];?>">
                                <!-- Form Group (birthday)-->
                            </div>
                            <div class="mb-3">
                                <?php 
                                    if(isset($edit_customer)){
                                        echo $edit_customer;
                                    }
                                ?>
                            </div>
                            <!-- Save changes button-->
                            <input class="btn btn-primary" type="submit" name="save" value="Lưu thay đổi"/>
                        </form>
                    </div>
                </div>
            </div>
        </div> 
    </form>
</div>
<?php
        }
    }
?>