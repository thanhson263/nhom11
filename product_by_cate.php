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
    <link rel="stylesheet" href="./css/style_p.css">
</head>
<?php
    include_once '../helpers/format.php';
    include_once '../lib/database.php';
    include_once '../lib/session.php';
    spl_autoload_register(function($callName){
        include_once '../classes/'.$callName.'.php';
    });
    include_once './include/header.php';
?>
<style>
    .search-items{
        display: flex;
        justify-content: center;
        /* margin-top: 50px; */
        align-items: center;

    }
    .mr-10{
        margin-right: 10px;
    }
    .w-10{
        width: 25%;
        /* border-radius: 0.25rem solid #ccc !important; */
    }
    .from{
        font-size: 25px;
        margin-right: 10px;
    }
    .i-relative{
        position: relative;
        
    }
    .curency{
        position: absolute;
        top: 7px;
        right: 7px;
    }
    .form-control:focus{
        border-color: none !important;
    }
    @import url('https://fonts.googleapis.com/css2?family=Manrope:wght@200&display=swap');
    body
    {
        display: grid;
        background: #fff;
        font-family: 'Manrope', sans-serif;
    }
    .mydiv
    {
        margin-top: 50px;
        margin-bottom: 50px;
    }
    .cross{
        font-size:10px;
    }
    .padding-0
    {
        padding-right: 5px;
        padding-left: 5px;
    }
    .img-style
    {
        margin-left: -11px;
        box-shadow: 1px 1px 5px 1px rgba(0, 0, 0, 0.1);
        border-radius: 5px;max-width: 104% !important;
    }
    .m-t-20{margin-top: 20px}.bbb_background{background-color: #E0E0E0 !important}.ribbon{width: 150px;height: 150px;overflow: hidden;position: absolute}.ribbon span{position: absolute;display: block;width: 34px;border-radius: 50%;padding: 8px 0;background-color: #3498db;box-shadow: 0 5px 10px rgba(0, 0, 0, .1);color: #fff;font: 100 18px/1 'Lato', sans-serif;text-shadow: 0 1px 1px rgba(0, 0, 0, .2);text-transform: uppercase;text-align: center}.ribbon-top-right{top: -10px;right: -10px}.ribbon-top-right::before, .ribbon-top-right::after{border-top-color: transparent;border-right-color: transparent}.ribbon-top-right::before{top: 0;left: 17px}.ribbon-top-right::after{bottom: 17px;right: 0}.sold_stars i{color: orange}.ribbon-top-right span{right: 17px;top: 17px}div{display: block;position: relative;-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box}.bbb_deals_featured{width: 100%}.bbb_deals{width: 100%;margin-right: 7%;padding-top: 80px;padding-left: 25px;padding-right: 25px;padding-bottom: 34px;box-shadow: 1px 1px 5px 1px rgba(0, 0, 0, 0.1);border-radius: 5px;margin-top: 5%;}.bbb_deals_title{position: absolute;top: 10px;left: 22px;font-size: 18px;font-weight: 500;color: #000000}.bbb_deals_slider_container{width: 100%}.bbb_deals_item{width: 100% !important}.bbb_deals_image{width: 100%}.bbb_deals_image img{width: 100%}.bbb_deals_content{margin-top: 33px}.bbb_deals_item_category a{font-size: 14px;font-weight: 400;color: rgba(0, 0, 0, 0.5)}.bbb_deals_item_price_a{font-size: 14px;font-weight: 400;color: rgba(0, 0, 0, 0.6)}.bbb_deals_item_price_a strike{color: red}.bbb_deals_item_name{font-size: 24px;font-weight: 400;color: #000000; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-right: 10px;}.bbb_deals_item_price{font-size: 24px;font-weight: 500;color: #6d6e73}.available{margin-top: 19px}.available_title{font-size: 16px;color: rgba(0, 0, 0, 0.5);font-weight: 400}.available_title span{font-weight: 700}@media only screen and (max-width: 991px){.bbb_deals{width: 100%;margin-right: 0px}}@media only screen and (max-width: 575px){.bbb_deals{padding-left: 15px;padding-right: 15px}.bbb_deals_title{left: 15px;font-size: 16px}.bbb_deals_slider_nav_container{right: 5px}.bbb_deals_item_name, .bbb_deals_item_price{font-size: 20px;}}
    .option-search{
        display: flex;
        justify-content: flex-start;
        align-items: center;
        margin-top: 50px;
        padding: 10px 20px;
        border: 1px solid #ccc;
    }
    .items-price__max{
        padding: 10px 20px;
        border: 2px dotted #ccc;
        margin-right: 10px;
        color: #243A76;
        border-radius: 3px;
    }
    .items-price__max:hover{
        color: #fff;
        background-color: #243a76;
        border-radius: 3px;
    }
    .items-price__min{
        padding: 10px 20px;
        border: 2px dotted #ccc;
        color: #243A76;
        border-radius: 3px;
        margin-right: 30px;
    }
    .items-price__min:hover{
        color: #fff;
        background-color: #243a76;
        border-radius: 3px;
    }
    .btn-blue{
        background-color: #ee4d2d;
        color: #fff;
        margin-right: 10px;
    }
    .name-price__search{
        padding: 0;
        width: 70px;
    }
    .grid{
        width: 1110px;
        max-width: 100%;
        margin: 0 auto;
    }
</style>
<?php
    $product = new Product();
    if(isset($_GET['sort']) && isset($_GET['cate_id'])){
        $cate_id = $_GET['cate_id'];
        if(isset($_GET['sotrang'])){
            $sotrang = $_GET['sotrang'];
        }else{
            $sotrang = "";
        }
        if($_GET['sort'] == 'price_asc'){
            $asc = $_GET['sort'];
            if(isset($_GET['min']) && isset($_GET['max'])){
                $min = $_GET['min'];
                $max = $_GET['max'];
            }else{
                $min = 0;
                $max = 0;
            }
            $sort = $product -> sort_product($cate_id,$asc,0,$min,$max,$sotrang);
            $number_pages = $product->select_number_pages($cate_id);

            // echo $sort;
        }else if($_GET['sort'] == 'price_desc'){
            $desc = $_GET['sort'];
            if(isset($_GET['min']) && isset($_GET['max'])){
                $min = $_GET['min'];
                $max = $_GET['max'];
            }else{
                $min = 0;
                $max = 0;
            }
            $sort = $product -> sort_product($cate_id,0,$desc,$min,$max,$sotrang);
            $number_pages = $product->select_number_pages($cate_id);

            // echo $sort;
        }
?>
<div class="grid">
    <div class="option-search">
        <div class="option-items">
            <a href="?<?php if(isset($_GET['min']) && isset($_GET['max'])) {?>min=<?php echo $min;?>&max=<?php echo $max;?>&sort=price_desc&cate_id=<?php echo $cate_id;}else{?>&sort=price_desc&cate_id=<?php echo $cate_id;}?>&sotrang=1" class="items-price__max">Giá giảm dần</a>
            <a href="?<?php if(isset($_GET['min']) && isset($_GET['max'])) {?>min=<?php echo $min;?>&max=<?php echo $max;?>&sort=price_asc&cate_id=<?php echo $cate_id;}else{?>&sort=price_asc&cate_id=<?php echo $cate_id;}?>&sotrang=1" class="items-price__min">Giá tăng dần</a>
        </div>
        <form action="?cate_id=<?php echo $cate_id;?>&sotrang=1" method="POST">
            <div class="search-items">
                <h5 class="name-price__search">Lọc theo giá tiền:</h5>
                <div class="form-outline mr-10">
                    <input type="search" id="form1" name="gia_thap_nhat" class="form-control i-relative " placeholder=" "/>
                <div class="curency">₫</div>
                </div>
                    <div class="from">
                    -
                    </div>
                <div class="form-outline mr-10">
                    <input type="search" id="form1" name="gia_cao_nhat" class="form-control i-relative" placeholder="" />
                    <div class="curency">₫</div>
                </div>
                <input type="submit" name="tim_kiem" value="Lọc sản phẩm" class="btn btn-blue w-10">
            </div>
        </form>
    </div>  
</div>

<div class="container mydiv">
    <div class="row">
        <?php
            while($row = $sort->fetch_assoc()){
        ?>
        <div class="col-md-4">
            <!-- bbb_deals -->
            <div class="bbb_deals">
                <a href="details.php?product_id=<?php echo $row['product_id'];?>">
                    <div class="bbb_deals_slider_container">
                        <div class=" bbb_deals_item">
                            <div class="bbb_deals_image"><img style="width:300px; height:150px;" src="<?php echo $row['image_pr'];?>" alt=""></div>
                            <div class="bbb_deals_content">
                                <div class="bbb_deals_info_line d-flex flex-row justify-content-start">
                                    <div class="bbb_deals_item_category"><a href="#"><?php echo $row['name'];?></a></div>
                                </div>
                                <div class="bbb_deals_info_line d-flex flex-row justify-content-start">
                                    <div class="bbb_deals_item_name"><?php echo $row['name_pr'];?></div>
                                    <div class="bbb_deals_item_price ml-auto"><?php echo number_format($row['price'],0,',','.');?>đ</div>
                                </div>
                                <div class="available">
                                    <div class="available_line d-flex flex-row justify-content-start">
                                        <div class="available_title">Còn: <span><?php echo $row['quantity'];?></span> khóa học</div>
                                        <div class="sold_stars ml-auto"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div>
                                    </div>
                                    <div class="available_bar"><span style="width:17%"></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <?php
            }
        ?>   
    </div>  
        <?php
        }else if(isset($_POST['tim_kiem'])){
            // echo "1";
            if(isset($_GET['cate_id'])){
                $cate_id = $_GET['cate_id'];
                if(isset($_GET['sotrang'])){
                    $sotrang = $_GET['sotrang'];
                }else{
                    $sotrang = "";
                }
            }
            $gia_thap_nhat = $_POST['gia_thap_nhat'];
            $gia_cao_nhat = $_POST['gia_cao_nhat'];
            $number_pages = $product->select_number_pages_by_price($cate_id,$gia_thap_nhat,$gia_cao_nhat);
            $search_currency = $product -> find_currency($cate_id,$gia_thap_nhat,$gia_cao_nhat,$sotrang);
            if($gia_cao_nhat == "" && $gia_thap_nhat == ""){
            
        ?>
        <script>alert("Chưa điền thông tin về mức giá!")</script>
        <?php
            echo "<script> window.location.href='product_by_cate.php?cate_id=1';</script>";
            }else{
        ?>
<div class="grid">
    <div class="option-search">
        <div class="option-items">
            <a href="?min=<?php echo $gia_thap_nhat?>&max=<?php echo $gia_cao_nhat?>&sort=price_desc&cate_id=<?php echo $id?>&sotrang=1" class="items-price__max">Giá giảm dần</a>
            <a href="?min=<?php echo $gia_thap_nhat?>&max=<?php echo $gia_cao_nhat?>&sort=price_asc&cate_id=<?php echo $id?>&sotrang=1" class="items-price__min">Giá tăng dần</a>
        </div>
        <form action="?cate_id=<?php echo $cate_id;?>&sotrang=1" method="POST">
                <div class="search-items">
                    <h5 class="name-price__search">Lọc theo giá tiền:</h5>
                    <div class="form-outline mr-10">
                        <input type="search" id="form1" name="gia_thap_nhat" class="form-control i-relative " placeholder=" "/>
                    <div class="curency">₫</div>
                    </div>
                        <div class="from">
                        -
                        </div>
                    <div class="form-outline mr-10">
                        <input type="search" id="form1" name="gia_cao_nhat" class="form-control i-relative" placeholder="" />
                        <div class="curency">₫</div>
                    </div>
                    <input type="submit" name="tim_kiem" value="Lọc sản phẩm" class="btn btn-blue w-10">
                </div>
            </form>
    </div>
</div>
<div class="container mydiv">
    <div class="row">
            <?php
                while($row = $search_currency->fetch_assoc()){
            ?>
        <div class="col-md-4">
            <!-- bbb_deals -->
            <div class="bbb_deals">
                <a href="details.php?product_id=<?php echo $row['product_id'];?>">
                    <div class="bbb_deals_slider_container">
                        <div class=" bbb_deals_item">
                            <div class="bbb_deals_image"><img style="width:300px; height:150px;" src="<?php echo $row['image_pr'];?>" alt=""></div>
                            <div class="bbb_deals_content">
                                <div class="bbb_deals_info_line d-flex flex-row justify-content-start">
                                    <div class="bbb_deals_item_category"><a href="#"><?php echo $row['name'];?></a></div>
                                </div>
                                <div class="bbb_deals_info_line d-flex flex-row justify-content-start">
                                    <div class="bbb_deals_item_name"><?php echo $row['name_pr'];?></div>
                                    <div class="bbb_deals_item_price ml-auto"><?php echo number_format($row['price'],0,',','.');?>đ</div>
                                </div>
                                <div class="available">
                                    <div class="available_line d-flex flex-row justify-content-start">
                                        <div class="available_title">Còn: <span><?php echo $row['quantity'];?></span> khóa học</div>
                                        <div class="sold_stars ml-auto"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div>
                                    </div>
                                    <div class="available_bar"><span style="width:17%"></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <?php
                    }
                }
            }else if(isset($_GET['cate_id'])){
                $cate_id = $_GET['cate_id'];
                if(isset($_GET['sotrang'])){
                    $sotrang = $_GET['sotrang'];
                }else{
                    $sotrang = "";
                }
                $number_pages = $product->select_number_pages($cate_id);
                $select_product_by_cate_id = $product->get_id_category($cate_id,$sotrang);
        ?>
    </div>
</div>
<div class="grid">
    <div class="option-search">
        <div class="option-items">
            <a href="?<?php if(isset($_POST['gia_thap_nhat']) && isset($_POST['$gia_thap_nhat'])) {?>
                p=<?php echo $gia_thap_nhat;?>-<?php echo $gia_cao_nhat;?>
                &
                <?php
                    }else{
                ?>sotrang=1&sort=price_desc&cate_id=<?php echo $cate_id;?>
                <?php 
                    } 
                ?>" class="items-price__max">Giá giảm dần</a>
            <a href="?<?php if(isset($gia_thap_nhat) && isset($gia_cao_nhat)) {?>
                p=<?php echo $gia_thap_nhat;?>-<?php echo $gia_cao_nhat;?>
                &
                <?php
                    }else{
                ?>sotrang=1&sort=price_asc&cate_id=<?php echo $cate_id;?>
                <?php 
                    } 
                ?>" class="items-price__min">Giá tăng dần</a>
        </div>
        <form action="?cate_id=<?php echo $cate_id;?>&sotrang=1" method="POST">
            <div class="search-items">
                <h5 class="name-price__search">Lọc theo giá tiền:</h5>
                <div class="form-outline mr-10">
                    <input type="search" id="form1" name="gia_thap_nhat" class="form-control i-relative " placeholder=" "/>
                <div class="curency">₫</div>
                </div>
                    <div class="from">
                    -
                    </div>
                <div class="form-outline mr-10">
                    <input type="search" id="form1" name="gia_cao_nhat" class="form-control i-relative" placeholder="" />
                    <div class="curency">₫</div>
                </div>
                <input type="submit" name="tim_kiem" value="Lọc sản phẩm" class="btn btn-blue w-10">
            </div>
        </form>
    </div>
</div>

<div class="container mydiv">
    <div class="row">
        <?php
            while($row = $select_product_by_cate_id->fetch_assoc()){
        ?>
        <div class="col-md-4">
            <!-- bbb_deals -->
            <div class="bbb_deals">
                <a href="details.php?product_id=<?php echo $row['product_id'];?>">
                    <div class="bbb_deals_slider_container">
                        <div class=" bbb_deals_item">
                            <div class="bbb_deals_image"><img style="width:300px; height:150px;" src="<?php echo $row['image_pr'];?>" alt=""></div>
                            <div class="bbb_deals_content">
                                <div class="bbb_deals_info_line d-flex flex-row justify-content-start">
                                    <div class="bbb_deals_item_category"><a href="#"><?php echo $row['name'];?></a></div>
                                </div>
                                <div class="bbb_deals_info_line d-flex flex-row justify-content-start">
                                    <div class="bbb_deals_item_name"><?php echo $row['name_pr'];?></div>
                                    <div class="bbb_deals_item_price ml-auto"><?php echo number_format($row['price'],0,',','.');?>đ</div>
                                </div>
                                <div class="available">
                                    <div class="available_line d-flex flex-row justify-content-start">
                                        <div class="available_title">Còn: <span><?php echo $row['quantity'];?></span> khóa học</div>
                                        <div class="sold_stars ml-auto"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div>
                                    </div>
                                    <div class="available_bar"><span style="width:17%"></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <?php
                }
            }
        ?>
    </div>
    <nav aria-label="Page navigation example" style="margin-top: 50px; ">
        <ul class="pagination" style="justify-content: center;">
            <li class="page-item">
            <a class="page-link" style="pointer-events:<?php echo $sotrang > 1 ? "auto" : "none";?>; background-color:<?php echo $sotrang > 1 ? "#fff" : "#A9A9A9"?>;" href="?cate_id=<?php echo $cate_id?>&sotrang=<?php echo $sotrang > 1 ? $sotrang-1 : 1;?>" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
            </a>
            </li>
            <?php
                for($i = 1; $i <= $number_pages; $i++){
            ?>
            <li class="page-item"><a class="page-link" href="?cate_id=<?php echo $cate_id;?>&sotrang=<?php echo $i==true ? $i : "0";?>"><?php echo $i;?></a></li>
            <?php 
                }
            ?>
            <li class="page-item">
            <a class="page-link" style="pointer-events:<?php echo ($sotrang > 0 && $sotrang < $number_pages) ? "auto" : "none";?>; background-color:<?php echo ($sotrang > 0 && $sotrang < $number_pages) ? "#fff" : "#A9A9A9 ";?>"  href="?cate_id=<?php echo $cate_id?>&sotrang=<?php echo ($sotrang > 0 && $sotrang < $number_pages) ? $sotrang+1 : $sotrang;?>" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
            </a>
            </li>
        </ul>
    </nav>
</div>