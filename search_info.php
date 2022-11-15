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
    include '../admin/include/header.php';
    include '../admin/include/navigation.php';
    include '../classes/search.php';
    $choose = $_POST['lua_chon'];
    $search = new Search();
    if(isset($_POST['tim_kiem_thong_tin'])){
        $thong_tin = $_POST['thong_tin'];
        $i = 0;
        if($choose == 1){
            $search_product = $search->search_product($thong_tin);
?>
<body>
    <div class="content">
        <div class="value">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Danh sách khóa học</h5>
                        <div class="table-responsive">
                            <form action="" method="post">
                                <table id="zero_config" class="table table-striped table-bordered">
                                    <thead>
                                        <tr align="center">
                                            <th>STT</th>
                                            <th>Tên danh mục</th>
                                            <th>Hình ảnh</th>
                                            <th>Tên khóa học</th>
                                            <!-- <th>Số lượng khóa học</th> -->
                                            <th>Giá khóa học</th>
                                            <th>Link khóa học</th>
                                            <th>Mô tả khóa học</th>
                                            <th>Chức năng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while($row_product = $search_product->fetch_assoc()){
                                            $i++;
                                        ?>
                                        <tr align="center">
                                            <td width="50"><?php echo $i;?></td>
                                            <td width="100"><?php echo $row_product['name'];?></td>
                                            <td><img style="width: 100px; height: 100px;" src="<?php echo $row_product['image_pr']?>" alt=""></td>
                                            <td width="150"><?php echo $row_product['name_pr'];?></td>
                                            <td><?php echo number_format($row_product['price'],0,'.','.');?>đ</td>
                                            <td><?php echo $row_product['link_ytb'];?></td>
                                            <td width="150"><?php echo $row_product['description'];?></td>
                                            <td>
                                                <a style="text-decoration: none; margin-right: 70px" href="edit_product.php?product_id=<?php echo $row_product['product_id'];?>">Sửa</a>
                                                <a style="text-decoration: none;" href="?id=<?php echo $row_product['product_id'];?>">Xóa</a>
                                            </td> 
                                        <?php
                                            }
                                        ?>
                                    </tbody>
                        
                                </table>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
                                <?php
                                        }else if($choose == 0){
                                            $search_category = $search->search_category($thong_tin);
                                ?>
<div class="content">
        <div class="value">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Danh sách danh mục</h5>
                        <div class="table-responsive">
                            <form action="" method="post">
                                <table id="zero_config" class="table table-striped table-bordered">
                                    <thead>
                                        <tr align="center">
                                            <th>STT</th>
                                            <th>Mã danh mục</th>
                                            <th>Hình ảnh</th>
                                            <th>Tên danh mục sản phẩm</th>
                                            <th>Chức năng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            while($value = $search_category->fetch_assoc()){
                                            $i++;
                                        ?>
                                        <tr align="center">
                                            <td width="50"><?php echo $i;?></td>
                                            <td width="150"><?php echo $value['cate_id'];?></td>
                                            <td><img style="width: 100px; height: 100px;" src="<?php echo $value['image']?>" alt=""></td>
                                            <td width="200"><?php echo $value['name'];?></td>
                                            <td>
                                                <a style="text-decoration: none; margin-right: 70px" href="edit_cate.php?id=<?php echo $value['cate_id'];?>">Sửa</a>
                                                <a style="text-decoration: none;" href="?id=<?php echo $value['cate_id'];?>">Xóa</a>
                                            </td> 
                                        <?php
                                                }
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</html>