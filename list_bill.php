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
            include_once '../admin/include/header.php';
            include_once '../admin/include/navigation.php';
            include_once '../classes/cart.php';
            $cart = new Cart(); //gọi tên class
        ?>
        <?php
            $payment = $cart->get_person_payment();
        ?>
    <div class="content">
        <div class="value">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Danh sách hóa đơn</h5>
                        <div class="table-responsive">
                            <form action="" method="post">
                                <table id="zero_config" class="table table-striped table-bordered">
                                    <thead>
                                        <tr align="center">
                                            <th>STT</th>
                                            <th>Mã đơn hàng</th>
                                            <th>Tên khách hàng</th>
                                            <th>Số điện thoại</th>
                                            <th>Email</th>
                                            <th>Địa chỉ</th>
                                            <th>Phương thức thanh toán</th>
                                            <th>Chức năng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            if($payment){
                                                $i = 0;
                                                while($value = $payment->fetch_assoc()){
                                                $i++;
                                        ?>
                                        <tr align="center">
                                            <td width="50"><?php echo $i;?></td>
                                            <td width="50"><?php echo $value['id_cart'];?></td>
                                            <td width="150"><?php echo $value['ten_khach_hang'];?></td>
                                            <td><?php echo $value['sdt'];?></td>
                                            <td><?php echo $value['email'];?></td>
                                            <td><?php echo $value['dia_chi'];?></td>
                                            <td><?php echo $value['phuong_thuc_thanh_toan'];?></td>
                                            <td>
                                                <a class="btn btn-primary" href="detail_bill.php?id_cart=<?php echo $value['id_cart'];?>">Kiểm tra đơn hàng</a>
                                            </td> 
                                        </tr>
                                        <?php
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
</div>
</body>
</html>