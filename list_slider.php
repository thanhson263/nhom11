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
            include '../classes/slider.php';
            $slider = new Slider(); //gọi tên class
        ?>
        <?php
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $delete_slider = $slider -> delete_slider($id);
                if($delete_slider){
                    echo $delete_slider;
                }
            }
        ?>
    <div class="content">
        <div class="value">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Danh sách quảng cáo</h5>
                        <div class="table-responsive">
                            <form action="" method="post">
                                <table id="zero_config" class="table table-striped table-bordered">
                                    <thead>
                                        <tr align="center">
                                            <th>STT</th>
                                            <th>Hình ảnh</th>
                                            <th>Tên quảng cáo</th>
                                            <th>Chức năng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $show_slider = $slider->get_slider();
                                            if($show_slider){
                                                $i = 0;
                                                while($value = $show_slider->fetch_assoc()){
                                                $i++;
                                        ?>
                                        <tr align="center">
                                            <td width="50"><?php echo $i;?></td>
                                            <td><img style="width: 100px; height: 100px;" src="<?php echo $value['image_slider']?>" alt=""></td>
                                            <td width="200"><?php echo $value['name_slider'];?></td>
                                            <td>
                                                <a style="text-decoration: none; margin-right: 70px" class="btn btn-success" href="edit_slider.php?id=<?php echo $value['id_slider'];?>">Sửa</a>
                                                <a style="text-decoration: none;" class="btn btn-danger" onclick="return confirm('Do you want delete?');" href="?id=<?php echo $value['id_slider'];?>">Xóa</a>
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