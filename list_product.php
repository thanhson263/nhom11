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
            include '../classes/product.php';
            $product = new Product(); //gọi tên class
        ?>
        <?php
            if(isset($_GET['product_id'])){
                $product_id = $_GET['product_id'];
                $delete_product = $product->delete_product($product_id);
                if($delete_product){
                    echo $delete_product;
                }
            }
            $number_page = $product->select_number_pages_admin();
            if(isset($_GET['sotrang'])){
                $sotrang = $_GET['sotrang'];
            }else{
                $sotrang = "";
            }

        ?>
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
                                            <!-- <th>Mô tả khóa học</th> -->
                                            <th>Chức năng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $show_cate = $product->get_all_product($sotrang);
                                            if($show_cate){
                                                $i = 0;
                                                while($value = $show_cate->fetch_assoc()){
                                                $i++;
                                        ?>
                                        <tr align="center">
                                            <td width="50"><?php echo $i;?></td>
                                            <td width="100"><?php echo $value['name'];?></td>
                                            <td><img style="width: 100px; height: 100px;" src="<?php echo $value['image_pr']?>" alt=""></td>
                                            <td width="50"><?php echo $value['name_pr'];?></td>
                                            <td><?php echo number_format($value['price'],0,'.','.');?>đ</td>
                                            <td><?php echo $value['link_ytb'];?></td>
                                            <td width="150">
                                                <a style="text-decoration: none; margin-right: 10px" class="btn btn-success" href="edit_product.php?product_id=<?php echo $value['product_id'];?>">Sửa</a>
                                                <a style="text-decoration: none;" class="btn btn-danger" onclick="return confirm('Do you want to delete?');" href="?product_id=<?php echo $value['product_id'];?>">Xóa</a>
                                            </td> 
                                        <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                        
                                </table>
                                <nav aria-label="..." >
                                    <ul class="pagination pagination-sm" style="justify-content: center; margin-top:20px">
                                        <?php
                                            for($j = 1; $j <= $number_page; $j++){
                                        ?>
                                        <li class="page-item <?php echo ($j == $sotrang) ?  "disabled" : "" ?>">
                                            <a class="page-link" href="?sotrang=<?php echo $j?>" tabindex="-1"><?php echo $j;?></a>
                                        </li>
                                        <?php
                                            }
                                        ?>
                                    </ul>
                                    
                                </nav>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>