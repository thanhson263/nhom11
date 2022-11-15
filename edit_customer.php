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
    include '../classes/customer.php';
    // include '../classes/category.php';
    $customer = new Customer(); //gọi tên class
?>
<?php
    if(isset($_GET['customer_id'])){
        $id = $_GET['customer_id'];
    }else{
        // echo "<script>window.location = 'list_cate.php'</script>";
    }
    if(isset($_POST['suathongtin'])){
        $tmp = $_FILES['anh_khach_hang']['tmp_name'];
        $anh_khach_hang = $_FILES['anh_khach_hang']['name'];
        $ten_khach_hang = $_POST['ten_khach_hang'];
        $tuoi = $_POST['tuoi'];
        $sdt = $_POST['sdt'];
        $email = $_POST['email'];
        $dia_chi = $_POST['dia_chi'];
        // $mat_khau = $_POST['mat_khau'];
        $update_customer = $customer -> update_customer($id,$tmp,$anh_khach_hang,$ten_khach_hang,$tuoi,$sdt,$email,$dia_chi);

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
                    <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            <h4 class="card-title">Sửa sản phẩm</h4>
                            <?php
                                if(isset($update_customer)){
                                    echo "<span>".$update_customer."</span>";
                                }
                            ?>
                            <?php
                                $show_customer_by_id = $customer->get_customer_by_id($id);
                                while($row = $show_customer_by_id->fetch_assoc()){
                            ?>
                            <div class="form-group row" style="margin-top:10px;">
                                <label for="lname" class="col-sm-3 text-right control-label col-form-label">Hình ảnh</label>
                                <div class="col-sm-9" style="display:flex; margin-top:10px">
                                    <img type="image" style="margin-right: 10px; width:30px; height:30px;" class="" src="<?php echo $row['hinh_anh'];?>">  
                                    <input type="file" name="anh_khach_hang" id="" value="<?php echo $row['hinh_anh'];?>">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-top:10px;">
                                <label for="lname" class="col-sm-3 text-right control-label col-form-label">Tên khách hàng</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" style="margin-top:10px;" value="<?php echo $row['ten_khach_hang'];?>" name="ten_khach_hang" placeholder="Tên khách hàng" id="">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-top:10px;">
                                <label for="lname" class="col-sm-3 text-right control-label col-form-label">Tuổi</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="fname" min = 1 value="<?php echo $row['tuoi'];?>" name="tuoi" placeholder="Tuổi" >
                                </div>
                            </div>
                            <div class="form-group row" style="margin-top:10px;">
                                <label for="lname" class="col-sm-3 text-right control-label col-form-label">Số điện thoại</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="fname" value="<?php echo $row['sdt'];?>" name="sdt" placeholder="Số điện thoại" >
                                </div>
                            </div>
                            <div class="form-group row" style="margin-top:10px;">
                                <label for="lname" class="col-sm-3 text-right control-label col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="fname" value="<?php echo $row['email'];?>" name="email" placeholder="Email" >
                                </div>
                            </div>
                            <div class="form-group row" style="margin-top:10px;">
                                <label for="lname" class="col-sm-3 text-right control-label col-form-label">Địa chỉ</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="fname" value="<?php echo $row['diachi'];?>" name="dia_chi" placeholder="Địa chỉ" >
                                </div>
                            </div>
                            <?php
                                }
                            ?>
                        </div>
                        <div class="border-top">
                            <div class="card-body">
                                <input type="submit" name="suathongtin" class="btn btn-primary" value="Sửa thông tin">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>