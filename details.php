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
</head>
<style>

.comment {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    padding: 20px;
    width: 450px;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border-radius: 6px;
}

.comment-box{
    
    padding:5px;
}



.comment-area textarea{
   resize: none; 
        border: 1px solid #ad9f9f;
}


.form-control:focus {
    color: #495057;
    background-color: #fff;
    border-color: #ffffff;
    outline: 0;
    box-shadow: 0 0 0 1px rgb(119, 119, 119) !important;
}

.send {
    color: #fff;
    background-color: #ff0000;
    border-color: #ff0000;
}

.send:hover {
    color: #fff;
    background-color: #f50202;
    border-color: #f50202;
}


.rating {
 display: flex;
        margin-top: -10px;
    flex-direction: row-reverse;
    margin-left: -4px;
        float: left;
}

.rating>input {
    display: none
}

.rating>label {
        position: relative;
    width: 19px;
    font-size: 25px;
    color: #ff0000;
    cursor: pointer;
}

.rating>label::before {
    content: "\2605";
    position: absolute;
    opacity: 0
}

.rating>label:hover:before,
.rating>label:hover~label:before {
    opacity: 1 !important
}

.rating>input:checked~label:before {
    opacity: 1
}

.rating:hover>input:checked~label:before {
    opacity: 0.4
}
/*
    Image credits:
    uifaces.com (http://uifaces.com/authorized)
*/

#login { display: none; }
.login,
.logout { 
    position: absolute; 
    top: -3px;
    right: 0;
}
.page-header { position: relative; }
.reviews {
    color: #555;    
    font-weight: bold;
    /* margin: 10px auto 20px; */
}
.notes {
    color: #999;
    font-size: 12px;
}
.media .media-object { max-width: 120px; }
.media-body { position: relative; }
.media-date { 
    position: absolute; 
    right: 25px;
    top: 25px;
}
.media-date li { padding: 0; }
.media-date li:first-child:before { content: ''; }
.media-date li:before { 
    content: '.'; 
    margin-left: -2px; 
    margin-right: 2px;
}
.media-comment { margin-bottom: 20px; }
.media-replied { margin: 0 0 20px 50px; }
.media-replied .media-heading { padding-left: 6px; }

.btn-circle {
    font-weight: bold;
    font-size: 12px;
    padding: 6px 15px;
    border-radius: 20px;
}
.btn-circle span { padding-right: 6px; }
.embed-responsive { margin-bottom: 20px; }
.tab-content {
    padding: 25px 15px;
    border: 1px solid #ddd;
    /* border-top: 0; */
    border-bottom-right-radius: 4px;
    border-bottom-left-radius: 4px;
}
.custom-input-file {
    overflow: hidden;
    position: relative;
    width: 120px;
    height: 120px;
    background: #eee url('https://s3.amazonaws.com/uifaces/faces/twitter/walterstephanie/128.jpg');    
    background-size: 120px;
    border-radius: 120px;
}
input[type="file"]{
    z-index: 999;
    line-height: 0;
    font-size: 0;
    position: absolute;
    opacity: 0;
    filter: alpha(opacity = 0);-ms-filter: "alpha(opacity=0)";
    margin: 0;
    padding:0;
    left:0;
}
.uploadPhoto {
    position: absolute;
    top: 25%;
    left: 25%;
    display: none;
    width: 50%;
    height: 50%;
    color: #fff;    
    text-align: center;
    line-height: 60px;
    text-transform: uppercase;    
    background-color: rgba(0,0,0,.3);
    border-radius: 50px;
    cursor: pointer;
}
.custom-input-file:hover .uploadPhoto { display: block; }
.block{
    display: block !important;
}
</style>
<?php
    include_once './include/header.php';
    spl_autoload_register(function($className){
        include_once '../classes/'.$className.'.php';
    });
    $cart = new Cart();
    $product = new Product();
    $cs = new Customer();
    if(isset($_GET['product_id'])){
        $product_id = $_GET['product_id'];
    }
    $select_product_by_id = $product->get_id_product($product_id);
    if(isset($_POST['mua_ngay'])){
        $quantity = $_POST['so_luong'];
        $add_to_cart = $cart -> add_to_cart($product_id,$quantity);
    }
    if(isset($_POST['send_comment'])){
        $id = $_POST['p_id'];
        $name_comment = $_POST['name_comment'];
        $desc_comment = $_POST['desc_comment'];
        $add_comment = $cs->insert_comment($id,$name_comment,$desc_comment);
    }
?>
<div class="container">
    <?php 
        while($row_product_id = $select_product_by_id -> fetch_assoc()){
    ?>
    <div class="card">
        <form action="" method="post">
            <div class="card-body">
                <h3 class="card-title">Tên khóa học: <?php echo $row_product_id['name_pr'];?></h3>
                <h5 class="card-subtitle">Danh mục: <?php echo $row_product_id['name'];?></h5>
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-sm-6">
                        <div class="white-box text-center"><img style="margin-top: 50px;" src="<?php echo $row_product_id['image_pr']?>" class="img-responsive"></div>
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-6">
                        <h4 class="box-title mt-5">Thông tin về khóa học</h4>
                        <p><?php echo $row_product_id['description'];?></p>
                        <h2 class="mt-5">
                            Giá khóa học: <?php echo number_format($row_product_id['price'],0,',','.');?>đ
                        </h2>
                        <input type="number" name="so_luong" class="form-control" value="1" min=1 max=<?php echo $row_product_id['quantity'];?> id="" style="width: 50%;">
                        <input type="submit" name="mua_ngay" class="btn btn-primary btn-rounded" style="margin-top:20px;" value="Mua ngay">
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <h3 class="box-title mt-5">Thông tin cơ bản về khóa học</h3>
                        <div class="table-responsive">
                            <table class="table table-striped table-product">
                                <tbody>
                                    <tr>
                                        <td width="390">Danh mục</td>
                                        <td><?php echo $row_product_id['name'];?></td>
                                    </tr>
                                    <tr>
                                        <td>Tên khóa học</td>
                                        <td><?php echo $row_product_id['name_pr'];?></td>
                                    </tr>
                                    <tr>
                                        <td>Giá khóa học</td>
                                        <td><?php echo number_format($row_product_id['price'],0,',','.');?>đ</td>
                                    </tr>
                                    <tr>
                                        <td>Mô tả về khóa học</td>
                                        <td><?php echo $row_product_id['description'];?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <object style="width: 80%; position: relative; left: 10%; margin-bottom: 50px;" height="350" data="http://www.youtube.com/v/<?php echo $row_product_id['link_ytb'];?>" type="application/x-shockwave-flash"><param name="src" value="http://www.youtube.com/v/<?php echo $row_product_id['link_ytb'];?>"></object>
        </form>
    </div>
    <?php
        }
    ?>
    <div class="comment">
               
        <div class="row">
            
            <div class="col-12">
                
                <div class="comment-box ml-2">
                    
                    <h4>Đánh giá sản phẩm</h4>                         
                    <!-- <div class="rating"> 
                        <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                        <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label> 
                        <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                        <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                        <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                    </div> -->
                    <form action="" method="POST">
                        <div class="comment-area">
                            <input type="hidden" name="p_id" value="<?php echo $product_id?>">
                            <input class="form-control" placeholder="Điền tên" name="name_comment" style="margin-bottom: 10px">
                        
                        </div>

                        <div class="comment-area">
                            
                            <textarea class="form-control" placeholder="Bình luận" name="desc_comment" rows="4"></textarea>
                        
                        </div>
                        <div class="comment-area">
                            <?php
                                if(isset($add_comment)){
                                    echo $add_comment;
                                }
                            ?>
                        </div>
                        <div class="comment-btns mt-2">
                            
                            <div class="row">
                                
                                <div class="col-3">
                                
                                    <input type="submit" style="margin-top: 10px;" name="send_comment" class="btn btn-success btn-sm" value="Gửi bình luận">     
                                
                                </div>
                            
                            </div>
                        
                        </div>
                    </form>
                
                
                </div>
            
            </div>
        
        
        </div>

    </div>
    <?php
        $select_comment = $cs->select_comment($product_id);
    ?>
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1" id="logout">
            <div class="page-header">
                <h3 class="reviews">Danh sách Đánh giá</h3>
            </div>
            <div class="comment-tabs">           
                <div class="tab-content">
                    <div class="tab-pane active" id="comments-logout">                
                        <ul class="media-list">
                        <li class="media" style="display: block !important;">
                            <?php
                                if(!isset($select_comment)){
                                    // echo $select_comment;
                            ?>
                            <span>Không có bình luận!</span>
                            <?php
                                }else{
                                    while($row = $select_comment->fetch_assoc()){
                            ?>
                            <div class="media-body">
                                <div class="well well-lg">
                                    <h3 class="media-heading text-uppercase reviews"><?php echo $row['name_comment'];?> </h3>
                                    <div class="media-date text-uppercase reviews list-inline">
                                        <?php echo date_format(date_create($row['time_comment']),"d-m-Y");?>
                                    </div>
                                    <div class="media-comment">
                                        <?php echo $row['desc_comment'];?>
                                    </div>
                                    <!-- <a class="btn btn-warning btn-circle text-uppercase" data-toggle="collapse" onclick="myToggle()" ><span class="glyphicon glyphicon-comment"></span> 2 comments</a> -->
                                </div>              
                            </div>
                            <?php
                                    }
                                }
                            ?>
                        </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    include_once './include/footer.php';
?>
<script>
    function myToggle(){
        let click = document.getElementById('click');
        click.classList.toggle('block');
    }
</script>
