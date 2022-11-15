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
            include '../classes/product.php';
            $product = new Product(); //gọi tên class
            if(isset($_POST['themsanpham'])){
                if(isset($_FILES['anh_san_pham']['name'])){
                    $anh_san_pham = $_FILES['anh_san_pham']['name'];
                    $anh_san_pham_tmp = $_FILES['anh_san_pham']['tmp_name'];
                }else{
                     echo "Lỗi";
                }
                $danh_muc = $_POST['danh_muc'];
                $ten_san_pham = $_POST['ten_san_pham'];
                $so_luong = $_POST['so_luong'];
                $gia_san_pham = $_POST['gia_san_pham'];
                $link_san_pham = $_POST['link_san_pham'];
                $mo_ta = $_POST['mo_ta'];
                // echo "link_san_pham: ".$link_san_pham."mo_ta: ".$mo_ta;
                $add_product = $product->insert_product($anh_san_pham_tmp,$anh_san_pham,$danh_muc,$ten_san_pham,$so_luong,$gia_san_pham,$link_san_pham,$mo_ta); // tham chiếu đến hàm trong lớp được gọi
                // echo $add_product;
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
                            <form class="form-horizontal" action="add_product.php" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <h4 class="card-title">Thêm khóa học</h4>
                                    <?php
                                        if(isset($add_product)){
                                            echo "<span>".$add_product."</span>";
                                        }
                                    ?>
                                    <div class="form-group row" >
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Hình ảnh khóa học</label>
                                        <div class="col-sm-9" style="margin-top:15px;">
                                            <input type="file" name="anh_san_pham" id="">
                                        </div>
                                    </div>
                                    <div class="form-group row" style="margin-top:10px;">
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Danh mục khóa học</label>
                                        <div class="col-sm-9">
                                            <select name="danh_muc" class="form-control" style="margin-top: 10px;" id="">
                                                <?php
                                                    $show_cate = $product->get_category();
                                                    while($row_cate = $show_cate->fetch_assoc()){
                                                ?>
                                                <option value="<?php echo $row_cate['cate_id']?>"><?php echo $row_cate['name'];?></option>
                                                <?php
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row" style="margin-top:10px;">
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Tên khóa học</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="fname" name="ten_san_pham" placeholder="Tên khóa học" >
                                        </div>
                                    </div>
                                    <div class="form-group row" >
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Số lượng khóa học</label>
                                        <div class="col-sm-9" style="margin-top:10px;">
                                            <input type="number" min=1 class="form-control" id="fname" name="so_luong" placeholder="Số lượng khóa học" >
                                        </div>
                                    </div>
                                    <div class="form-group row" style="margin-top:10px;">
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Giá khóa học</label>
                                        <div class="col-sm-9">
                                            <input type="number" min=1 class="form-control" id="fname" name="gia_san_pham" placeholder="Giá khóa học" >
                                        </div>
                                    </div>
                                    <div class="form-group row" >
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Link giới thiệu khóa học</label>
                                        <div class="col-sm-9" style="margin-top:10px;">
                                            <input type="text" class="form-control" id="fname" name="link_san_pham" placeholder="Link giới thiệu khóa học" >
                                        </div>
                                    </div>
                                    <div class="form-group row" >
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Mô tả về khóa học</label>
                                        <div class="col-sm-9" style="margin-top:10px;">
                                            <textarea name="mo_ta" id="" cols="30" rows="5" placeholder="Mô tả về khóa học"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <input type="submit" name="themsanpham" class="btn btn-primary" value="Thêm khóa học">
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