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
    include '../classes/product.php';
    // include '../classes/category.php';
    $product = new Product(); //gọi tên class
?>
<?php
    if(isset($_GET['product_id'])){
        $id = $_GET['product_id'];
    }else{
        // echo "<script>window.location = 'list_cate.php'</script>";
    }
    if(isset($_POST['suasanpham'])){
        $tmp = $_FILES['anh_san_pham']['tmp_name'];
        $anh_san_pham = $_FILES['anh_san_pham']['name'];
        $danh_muc_san_pham = $_POST['danh_muc_san_pham'];
        $ten_san_pham = $_POST['ten_san_pham'];
        $so_luong = $_POST['so_luong'];
        $gia_san_pham = $_POST['gia_san_pham'];
        $link_san_pham = $_POST['link_san_pham'];
        $mo_ta = $_POST['mo_ta'];
        $update_product = $product -> update_product($id,$tmp,$anh_san_pham,$danh_muc_san_pham,$ten_san_pham,$so_luong,$gia_san_pham,$link_san_pham,$mo_ta);

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
                                if(isset($update_product)){
                                    echo "<span>".$update_product."</span>";
                                }
                            ?>
                            <?php
                                $show_product_by_id_product = $product->get_id_product($id);
                                $row = $show_product_by_id_product->fetch_assoc();
                            ?>
                            <div class="form-group row" style="margin-top:10px;">
                                <label for="lname" class="col-sm-3 text-right control-label col-form-label">Hình ảnh danh mục</label>
                                <div class="col-sm-9" style="display:flex; margin-top:10px">
                                    <img type="image" style="margin-right: 10px; width:30px; height:30px;" class="" src="<?php echo $row['image_pr'];?>">  
                                    <input type="file" name="anh_san_pham" id="" value="<?php echo $row['image_pr'];?>">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-top:10px;">
                                <label for="lname" class="col-sm-3 text-right control-label col-form-label">Danh mục sản phẩm</label>
                                <div class="col-sm-9">
                                    <select name="danh_muc_san_pham" class="form-control" id="">
                                        <?php
                                            $select_cate = $product -> get_category();
                                            while($row_cate = $select_cate -> fetch_assoc()){
                                        ?>
                                        <option
                                        <?php if($row['cate_id'] == $row_cate['cate_id']){
                                            echo 'selected';
                                        }?>
                                         value="<?php echo $row_cate['cate_id']?>"><?php echo $row_cate['name'];?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row" style="margin-top:10px;">
                                <label for="lname" class="col-sm-3 text-right control-label col-form-label">Tên sản phẩm</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="fname" value="<?php echo $row['name_pr'];?>" name="ten_san_pham" placeholder="Tên sản phẩm" >
                                </div>
                            </div>
                            <div class="form-group row" style="margin-top:10px;">
                                <label for="lname" class="col-sm-3 text-right control-label col-form-label">Số lượng</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="fname" value="<?php echo $row['quantity'];?>" name="so_luong" placeholder="Số lượng" >
                                </div>
                            </div>
                            <div class="form-group row" style="margin-top:10px;">
                                <label for="lname" class="col-sm-3 text-right control-label col-form-label">Giá sản phẩm</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="fname" value="<?php echo $row['price'];?>" name="gia_san_pham" placeholder="Giá sản phẩm" >
                                </div>
                            </div>
                            <div class="form-group row" style="margin-top:10px;">
                                <label for="lname" class="col-sm-3 text-right control-label col-form-label">Link sản phẩm</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="fname" value="<?php echo $row['link_ytb'];?>" name="link_san_pham" placeholder="Link sản phẩm" >
                                </div>
                            </div>
                            <div class="form-group row" style="margin-top:10px;">
                                <label for="lname" class="col-sm-3 text-right control-label col-form-label">Mô tả sản phẩm</label>
                                <div class="col-sm-9">
                                    <!-- <textarea name="mo_ta" p id="" cols="30" rows="10"></textarea> -->
                                    <textarea type="text" class="form-control" id="fname" name="mo_ta" placeholder="Mô tả sản phẩm" ><?php echo $row['description'];?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="border-top">
                            <div class="card-body">
                                <input type="submit" name="suasanpham" class="btn btn-primary" value="Sửa sản phẩm">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>