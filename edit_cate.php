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
    include '../classes/category.php';
    $cate = new Category(); //gọi tên class
?>
<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }else{
        // echo "<script>window.location = 'list_cate.php'</script>";
    }
    if(isset($_POST['suadanhmuc'])){
        $tmp = $_FILES['anh_danh_muc']['tmp_name'];
        $anh_danh_muc = $_FILES['anh_danh_muc']['name'];
        $ten_danh_muc = $_POST['ten_danh_muc'];
        $update_data = $cate->update_category($id,$tmp,$anh_danh_muc,$ten_danh_muc);
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
                            <h4 class="card-title">Sửa danh mục</h4>
                            <?php
                                if(isset($update_data)){
                                    echo "<span>".$update_data."</span>";
                                }
                            ?>
                            <?php
                                $show_cate_by_id_cate = $cate->get_category_by_id_cate($id);
                                $row = $show_cate_by_id_cate->fetch_assoc();
                            ?>
                            <div class="form-group row" style="margin-top:10px;">
                                <label for="lname" class="col-sm-3 text-right control-label col-form-label">Hình ảnh danh mục</label>
                                <div class="col-sm-9" style="display:flex; margin-top:10px">
                                    <img type="image" style="margin-right: 10px; width:30px; height:30px;" class="" src="<?php echo $row['image'];?>">  
                                    <input type="file" name="anh_danh_muc" id="" value="<?php echo $row['image'];?>">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-top:10px;">
                                <label for="lname" class="col-sm-3 text-right control-label col-form-label">Tên danh mục</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="fname" value="<?php echo $row['name'];?>" name="ten_danh_muc" placeholder="Tên danh mục" >
                                </div>
                            </div>
                        </div>
                        <div class="border-top">
                            <div class="card-body">
                                <input type="submit" name="suadanhmuc" class="btn btn-primary" value="Sửa danh mục">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>