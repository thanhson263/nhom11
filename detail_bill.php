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
            include_once '../classes/cart.php';
            $cart = new Cart(); //gọi tên class
        ?>
        <?php
            if(isset($_GET['id_cart'])){
                $id_cart = $_GET['id_cart'];
                $detail_cart = $cart->get_detail_cart_by_id($id_cart);
            }
        ?>
        <div class="value" style="margin: 100px 20px">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Hóa đơn chi tiết</h5>
                        <div class="table-responsive">
                            <form action="" method="post">
                                <table id="zero_config" class="table table-striped table-bordered">
                                    <thead>
                                        <tr align="center">
                                            <th>STT</th>
                                            <th>Mã đơn hàng</th>
                                            <th>Ảnh sản phẩm</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Số lượng</th>
                                            <th>Giá sản phẩm</th>
                                            <th>Thành tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            if($detail_cart){
                                                $i = 0;
                                                $tong_tien = 0;
                                                while($value = $detail_cart->fetch_assoc()){
                                                    $i++;
                                                    $thanh_tien = $value['gia_sp'];
                                                    $tong_tien += $thanh_tien;
                                        ?>
                                        <tr align="center">
                                            <td width="50"><?php echo $i;?></td>
                                            <td width="130"><?php echo $value['id_cart'];?></td>
                                            <td><img style="width: 150px; height: 100px;" src="<?php echo $value['image_cart']?>" alt=""></td>
                                            <td><?php echo $value['ten_sp'];?></td>
                                            <td><?php echo $value['so_luong'];?></td>
                                            <td><?php echo number_format(($value['gia_sp'] / $value['so_luong']),0,",",".");?>đ</td>
                                            <td><?php echo number_format($thanh_tien,0,",",".");?>đ</td>
                                        </tr>
                                        <?php
                                            }
                                        }
                                        ?>
                                        <tr>
                                            <td colspan="7">
                                                Tổng tiền sản phẩm: <?php echo number_format($tong_tien,0,",",".");?>đ
                                            </td> 
                                        </tr>
                                        <tr>
                                            <td colspan="7">
                                                Thuế VAT: 5%;
                                            </td> 
                                        </tr>
                                        <tr>
                                            <td colspan="7">
                                                Tổng tiền sản phẩm (Sau thuế VAT): <?php echo number_format($tong_tien+$tong_tien*0.05,0,",",".");?>đ
                                            </td> 
                                        </tr>
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
</html>