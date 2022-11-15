<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="public/layout/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="public/layout/assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
    Frica Shop
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="hotel1/"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- CSS Files -->
    <link href="../font/fontawesome-free-6.0.0-web/css/all.css" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="../admin/css/stylepage.css">
    <!-- <link rel="stylesheet" href="./js/main.js"> -->
</head>
<?php
    include '../lib/session.php';
    Session::init();
?>
<body>
    <div class="id-main">
        <?php
            include '../admin/include/header.php';
            include '../admin/include/navigation.php';
        ?>
        <?php
            include '../classes/slider.php';
            $slider = new Slider(); //gọi tên class
            if(isset($_POST['them_quang_cao'])){
                if(isset($_FILES['anh_quang_cao']['name'])){
                    $anh_quang_cao = $_FILES['anh_quang_cao']['name'];
                    $anh_quang_cao_tmp = $_FILES['anh_quang_cao']['tmp_name'];
                }else{
                     echo "Lỗi";
                }
                $ten_quang_cao = $_POST['ten_quang_cao'];
                $add_slider = $slider->insert_slider($anh_quang_cao_tmp,$anh_quang_cao,$ten_quang_cao); // tham chiếu đến hàm trong lớp được gọi
            }else{
                // echo "F"; 
            }
        ?>
        <div class="main-panel">
            <!-- Navbar -->
            <!-- End Navbar -->
            <div class="content">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <form class="form-horizontal" action="add_slider.php" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <h4 class="card-title">Thêm quảng cáo</h4>
                                    <?php
                                        if(isset($add_slider)){
                                            echo "<span>".$add_slider."</span>";
                                        }
                                    ?>
                                    <div class="form-group row" >
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Hình ảnh quảng cáo</label>
                                        <div class="col-sm-9" style="margin-top:15px;">
                                            <input type="file" name="anh_quang_cao" id="">
                                        </div>
                                    </div>
                                    <div class="form-group row" style="margin-top:10px;">
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Tên quảng cáo</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="fname" name="ten_quang_cao" placeholder="Tên quảng cáo" >
                                        </div>
                                    </div>
                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <input type="submit" name="them_quang_cao" class="btn btn-primary" value="Thêm quảng cáo">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>