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
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css//style_p.css">
</head>
<?php
    session_start();
    include_once '../lib/database.php';
    include_once '../helpers/format.php';
    include_once '../classes/cart.php';
    include_once './include/header.php';
    
?>
<?php
    $cart = new Cart();
    if(isset($_GET['cong']) && isset($_GET['ten_sp'])){
        $cong = $_GET['cong'];
        $ten_sp = $_GET['ten_sp'];
        $plus_cart = $cart->plus_cart($ten_sp,$cong);
    }else if(isset($_GET['tru']) && isset($_GET['ten_sp'])){
        $tru = $_GET['tru'];
        $ten_sp = $_GET['ten_sp'];
        $minus_cart = $cart->minus_cart($ten_sp,$tru);
    }else if(isset($_GET['xoa'])){
        $id = $_GET['xoa'];
        $delete_cart = $cart->delete_cart($id);
    }else if(isset($_GET['xoatatca']) && $_GET['xoatatca'] == 1){
        // $xoatatca = $_GET['xoatatca'];
        $delete_all_cart = $cart->delete_all_cart();
    }
?>
<style>
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
</style>
<table class="table table-bordered">
    <?php   
        $select_cart = $cart -> get_cart();
        if($select_cart->num_rows > 0){
            $i = 0;
            $tongtien = 0;
            $vat = 0;
    ?>
    <thead>
        <tr align="center">
        <th scope="col" class="center">STT</th>
        <th scope="col" class="center">Hình ảnh sản phẩm</th>
        <th scope="col" class="center">Tên sản phẩm</th>
        <th scope="col" class="center">Số lượng mua</th>
        <th scope="col" class="center">Giá sản phẩm</th>
        <th scope="col" class="center">Tổng tiền sản phẩm</th>
        <th scope="col" class="center">Xóa sản phẩm</th>
        </tr>
    </thead>
    <tbody>   
        
        <?php
            while($row_cart = $select_cart->fetch_assoc()){
                $i++;
                $allsp = $row_cart['quantity_cart'] * $row_cart['price_cart'];
                $tongtien += $allsp;
                $vat = $tongtien + ($tongtien * 0.05);
        ?>
        <tr align="center" class="size-16">
        <th scope="row"><?php echo $i;?></th>
        <td><img width="200" height="100" src="<?php echo $row_cart['image'];?>" alt=""></td>
        <td><?php echo $row_cart["name_cart"];?></td>
        <td style="display: flex; align-items: center; justify-content:center;">
            <a style="text-decoration: none; color: #000; font-size: 20px; padding-right: 5px;" href="?cong=<?php echo $row_cart['quantity_cart'];?>&ten_sp=<?php echo $row_cart['name_cart'];?>"><i class="far fa-plus-square"></i></a>  
            <?php echo $row_cart["quantity_cart"];?>
            <a style="text-decoration: none; color: #000; font-size: 20px; padding-left: 5px" href="?tru=<?php echo $row_cart['quantity_cart'];?>&ten_sp=<?php echo $row_cart['name_cart'];?>"><i class="far fa-minus-square"></i></a>
        </td>
        <td><?php echo number_format($row_cart["price_cart"],0,',','.');?>₫</td>
        <td><?php echo number_format($allsp,0,',','.');?>₫</td>
        <td><a class="delete-product" style="text-decoration: none;" href="?xoa=<?php echo $row_cart['cart_id'];?>"><i class="fa-solid fa-trash-can"></i></a></td>
        <div class="res" style="clear: both;"></div>
        <?php
            }
        ?>
        </tr>
            <td colspan="6" class="all-bill">Tổng tiền sản phẩm bạn mua: <?php echo number_format($tongtien,0,',','.');?>₫
                <br>Thuế VAT: 5%
                <br>Tổng tiền sản phẩm bạn mua (Thuế VAT): <?php echo number_format($vat,0,',','.')?>đ  
            </td>
            <td><a class="delete-all" style="text-decoration: none;" href="?xoatatca=1">Xóa tất cả sản phẩm hiện có</a></td>
    </tbody>
    
</table>
    <div class="order">
        <a href="payment.php" class="order-cart"></i>Thanh Toán</a>      
        <a href="cart_page.php" class="reset-cart"></i>Cập nhật</a>
    </div>
    <?php
        }else{
    ?>
    <div class="cart" align="center">
      <p class="cart-title">Giỏ hàng</p>
      <p class="cart-desc">Giỏ hàng hiện tại không có sản phẩm!</p>
      <a href="index.php" class="cart-link"><i class="fa-solid fa-arrow-rotate-left right-3"></i>Tiếp tục mua hàng</a>
    </div>
    <?php
        }
    ?>
    <?php
        include_once './include/footer.php';
    ?>