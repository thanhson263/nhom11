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
<!------ Include the above in your HEAD tag ---------->
<style>
.b-0 {
    bottom: 0;
}
.bg-shadow {
    background: rgba(76, 76, 76, 0);
    background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(179, 171, 171, 0)), color-stop(49%, rgba(48, 48, 48, 0.37)), color-stop(100%, rgba(19, 19, 19, 0.8)));
    background: linear-gradient(to bottom, rgba(179, 171, 171, 0) 0%, rgba(48, 48, 48, 0.71) 49%, rgba(19, 19, 19, 0.8) 100%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#4c4c4c', endColorstr='#131313', GradientType=0 );
}
.top-indicator {
    right: 0;
    top: 1rem;
    bottom: inherit;
    left: inherit;
    margin-right: 1rem;
}
.overflow {
    position: relative;
    overflow: hidden;
}
.zoom img {
    transition: all 0.2s linear;
}
.zoom:hover img {
    -webkit-transform: scale(1.1);
    transform: scale(1.1);
}
</style>
<?php
    include_once '../lib/database.php';
    include_once '../lib/session.php';
    include_once '../helpers/format.php';
    include_once './include/header.php';

    spl_autoload_register(function($callName){
        include_once "../classes/".$callName.'.php';
    });

    $news = new News();
    $select_new_news = $news->select_new_news();
?>
<!--Container-->
<div class="container">
    <div class="row mb-2">
        <div class="col-12 text-center pt-3">
            <h1>Tin tức về lập trình</h1>
            <p>Nơi để chia sẻ, giao lưu, tiếp nhận thông tin về lập trình</p>
        </div>
    </div>
    
    <!--Start code-->
    <div class="row">
        <div class="col-12 pb-5">
            <!--SECTION START-->
            <section class="row">
                <!--Start slider news-->
                <div class="col-12 col-md-6 pb-0 pb-md-3 pt-2 pr-md-1">
                    <div id="featured" class="carousel slide carousel" data-ride="carousel">                  
                        <!--carousel inner-->
                        <div class="carousel-inner">
                            <!--Item slider-->
                            <div class="carousel-item active">
                                <div class="card border-0 rounded-0 text-light overflow zoom">
                                    <div class="position-relative">
                                        <!--thumbnail img-->
                                        <?php
                                            $row = $select_new_news->fetch_assoc();
                                        ?>
                                        <div class="ratio_left-cover-1 image-wrapper">
                                            <a href="../admin/detail_news.php?news=<?php echo $row['id_news'];?>">
                                                <img class="img-fluid w-100"
                                                    src="<?php echo $row['image_news'];?>"
                                                    alt="Bootstrap news template">
                                            </a>
                                        </div>
                                        <div class="position-absolute p-2 p-lg-3 b-0 w-100 bg-shadow">
                                            <!--title-->
                                            <a href="../admin/detail_news.php?news=<?php echo $row['id_news'];?>">
                                                <h2 class="h3 post-title text-white my-1"><?php echo $row['title_news'];?></h2>
                                            </a>
                                            <!-- meta title -->
                                            <div class="news-meta">
                                                <span class="news-author">by <a class="text-white font-weight-bold" href="../category/author.html">Frica</a> on</span>
                                                <span class="news-date"><?php echo date("D, d/m/Y, H:i",strtotime($row['time_news']))?></span>
                                            </div>
                                        </div>       
                                    </div>
                                </div>
                            </div>
                        
                            
                        </div>
                        <!--end carousel inner-->
                    </div>
                
                </div>
                <!--End slider news-->
                
                <!--Start box news-->
                <div class="col-12 col-md-6 pt-2 pl-md-1 mb-3 mb-lg-4">
                    <div class="row">
                        <!--news box-->
                        <?php
                            $select_news = $news->select_news();
                        ?>
                        <?php
                            while($row_news = $select_news->fetch_assoc()){
                        ?>
                        <div class="col-6 pb-1 pt-0 pr-1">
                            <div class="card border-0 rounded-0 text-white overflow zoom">
                                <div class="position-relative">
                                    <!--thumbnail img-->
                                    <div class="ratio_right-cover-2 image-wrapper">
                                        <a href="../admin/detail_news.php?news=<?php echo $row_news['id_news'];?>">
                                            <img class="img-fluid" style="height: 203.63px !important;"
                                                 src="<?php echo $row_news['image_news'];?>"
                                                 alt="simple blog template bootstrap">
                                        </a>
                                    </div>
                                    <div class="position-absolute p-2 p-lg-3 b-0 w-100 bg-shadow">
                                        <!-- category -->
                                        <a class="p-1 badge badge-primary rounded-0" href="">Technology</a>

                                        <!--title-->
                                        <a href="../admin/detail_news.php?news=<?php echo $row_news['id_news'];?>">
                                            <h2 class="h5 text-white my-1"><?php echo $row_news['title_news'];?></h2>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                            }
                        ?>
                    </div>
                </div>
                <!--End box news-->
            </section>
            <!--END SECTION-->
        </div>
    </div>
    <!--end code-->
    
</div>
    <?php
        include_once './include/footer.php';
    ?>