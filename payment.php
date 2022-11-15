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
    <link rel="stylesheet" href="./css/style/style.css">
    <link rel="stylesheet" href="./css/style_p.css">
</head>
<style>
    .grid-check-out{
    max-width: 1100px;
    margin: 0 auto;
}
.cart{
    padding-top: 120px;
}
.cart-title{
    font-size: 20px;
    text-transform: uppercase;
    color: #333;
    margin-bottom: 10px;
}
.cart-desc{
    font-size: 14px;
    color: #333;
    margin-bottom: 10px;
}
.cart-link:hover{
    color: #ee4d2d;
    transition: all linear 0.1s;
}
.right-3{
    margin-right: 3px;
    font-size: 15px;
}
.delete-product{
    font-size: 16px;
    color: #333;
}
.delete-all{
    color: #000;
    font-size: 18px;
}
.center{
    text-align: center;
}
.size-16{
    font-size: 16px;
}
.all-bill{
    font-size: 18px;
    text-align: center;
    color: #333;
}
/* Order */
.order{
    text-align: center;
    display: flex;
    justify-content: center;
}
.order-cart,
.reset-cart{
    font-size: 18px;
    padding: 10px 15px;
    background-color: #ec2424;
    border: none;
    color: #fff;
    margin-right: 20px;
    border-radius: 5px;
    display: flex;
    align-items: center;
    justify-content: center;
}
.order-cart:hover,
.reset-cart:hover{
    background: #EFE3AC;
    color: black;
}
/* Check-out */
.card{
    border: none;
}
.card-title{
    font-size: 30px;
    color: #333;
}
.border-top{
    border-top: none !important;
}
.top-60{
    padding-top: 60px;
}
.image-p{
    margin-left: 3px;
}
.btn-center{
    margin: 0;
    position: absolute;
    top: 105%;
    left: 50%;
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
}
</style>
<?php
    session_start();
    include_once '../lib/database.php';
    include_once '../helpers/format.php';
    include_once '../classes/cart.php';
    include_once './include/header.php';
?>
<?php
    $cart = new Cart();
    if(isset($_POST['thanhtoan'])){
        $ten_khach_hang = $_POST['ten_khach_hang'];
        $email = $_POST['email'];
        $sdt = $_POST['sdt'];
        $dia_chi = $_POST['dia_chi'];
        $phuong_thuc_thanh_toan = $_POST['phuong_thuc_thanh_toan'];
        $payment = $cart->payment($ten_khach_hang,$email,$sdt,$dia_chi,$phuong_thuc_thanh_toan);
    }
?>
<div class="main-panel">
    <!-- Navbar -->
    <!-- End Navbar -->
    <div class="content">
        <div class="grid-check-out">
            <div class="row">
                <div class="col-6">
                    <div class="card" style="padding-top: 30px;">
                        <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <h4 class="card-title">Frica Shop</h4>
                                <div class="form-outline">
                                    <label class="form-label" for="form3Example3">Tên khách hàng</label>
                                    <input type="text" id="form3Example3" class="form-control"
                                    placeholder="Họ và tên" name="ten_khach_hang" style="width:100%"/>
                                </div>
                                <div class="row" style="padding: 15px; flex-wrap:nowrap">
                                    <div class="form-outline" style="margin-right: 100px;">
                                        <label class="form-label" for="form3Example3">Email</label>
                                        <input type="email" id="form3Example3" class="form-control"
                                        placeholder="Email" name="email" style="width:145%;"/>
                                    </div>
                                    <div class="form-outline">
                                        <label class="form-label" for="form3Example3">Số điện thoại</label>
                                        <input type="number" min="0" id="form3Example3" class="form-control"
                                        placeholder="Số điện thoại" name="sdt" style="width: 100%"/>
                                    </div>
                                </div>
                                <div class="form-outline" style="margin-bottom: 15px">
                                    <label class="form-label" for="form3Example3">Địa chỉ</label>
                                    <input type="text" id="form3Example3" class="form-control"
                                    placeholder="Địa chỉ" name="dia_chi" style="width:100%"/>
                                </div>
                                <div class="form-outline">
                                    <label class="form-label" for="form3Example3">Thanh toán</label>
                                    <select name="phuong_thuc_thanh_toan" id="" class="form-control">
                                        <option value="vnpay">Thanh toán VNPAY</option>
                                        <option value="momo">Thanh toán MoMo</option>
                                    </select>
                                </div>
                                <div class="form-outline">
                                    <?php
                                        if(isset($payment)){
                                            echo $payment;
                                        }
                                    ?>
                                </div>
                                <div class="border-top">
                                    <div class="card-submit" style="margin-top:20px;">
                                        <input type="submit" name="thanhtoan" class="btn btn-primary btn-center" value="Xác nhận thông tin">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
        <div class="col-6">
            <div class="card">
                <div>
                    <div class="table-responsive px-md-4 px-2 pt-3">
                        <table class="table table-borderless">
                            <tbody>
                                <tr class="border-bottom">
                                    <td>
                                        <div style="margin-top: 50px;" class="d-flex align-items-center">
                                            <div style="margin-right: 5px;">Hình ảnh</div>
                                            <div style="margin-left: 12px;" class="fw-bold">Tên sản phẩm</div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex" style="margin-top:50px">
                                            <div class="text-muted text-decoration-line-through" style="width: 61px;">Số lượng</div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="" style="margin-top:50px; margin-left: 13px;">Giá sản phẩm</div>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                                    $select_cart = $cart->get_cart();
                                    if($select_cart->num_rows > 0){
                                        while($row = $select_cart->fetch_assoc()){
                                ?>
                                <tr class="border-bottom">
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div> <img style="width: 65px; height: 65px;" class="pic" src="<?php echo $row['image'];?>" alt=""> </div>
                                            <div class="ps-3 d-flex flex-column justify-content">
                                                <p class="fw-bold"><?php echo $row['name_cart'];?></p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <p class="text-muted text-decoration-line-through"><?php echo $row["quantity_cart"];?></p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <p class=""><?php echo number_format($row['price_cart'],0,',','.');?>đ</p>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                                        }
                                    }else{
                                        echo "Thất bại!";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
        </div>
    </div>

