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
<?php
    include '../admin/include/header.php';
    include '../admin/include/navigation.php';
    include '../classes/slider.php';
    $slider = new Slider(); //gọi tên class
?>
<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }else{
        // echo "<script>window.location = 'list_cate.php'</script>";
    }
    if(isset($_POST['sua_quang_cao'])){
        $tmp = $_FILES['anh_quang_cao']['tmp_name'];
        $anh_quang_cao = $_FILES['anh_quang_cao']['name'];
        $ten_quang_cao = $_POST['ten_quang_cao'];
        $update_slider = $slider->update_slider($id,$tmp,$anh_quang_cao,$ten_quang_cao);
    }else{
        echo "F";
    }
?>
<div class="main-panel">
    <!-- Navbar -->
    <!-- End Navbar -->
    <div class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            <h4 class="card-title">Sửa quảng cáo</h4>
                            <?php
                                if(isset($update_slider)){
                                    echo "<span>".$update_slider."</span>";
                                }
                            ?>
                            <?php
                                $get_id_slider = $slider->get_id_slider($id);
                                $row = $get_id_slider->fetch_assoc();
                            ?>
                            <div class="form-group row" style="margin-top:10px;">
                                <label for="lname" class="col-sm-3 text-right control-label col-form-label">Hình ảnh quảng cáo</label>
                                <div class="col-sm-9" style="display:flex; margin-top:10px">
                                    <img type="image" style="margin-right: 10px; width:30px; height:30px;" class="" src="<?php echo $row['image_slider'];?>">  
                                    <input type="file" name="anh_quang_cao" id="" value="<?php echo $row['image'];?>">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-top:10px;">
                                <label for="lname" class="col-sm-3 text-right control-label col-form-label">Tên quảng cáo</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="fname" value="<?php echo $row['name_slider'];?>" name="ten_quang_cao" placeholder="Tên quảng cáo" >
                                </div>
                            </div>
                        </div>
                        <div class="border-top">
                            <div class="card-body">
                                <input type="submit" name="sua_quang_cao" class="btn btn-primary" value="Sửa quảng cáo">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>