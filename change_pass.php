<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
	<title>Frica Shop</title>
   <!--Made with love by Mutiullah Samim -->
   
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<?php
    include_once "../classes/adminLogin.php";
?>
<style>
    html,body { height: 100%; }

body{
	display: -ms-flexbox;
	display: -webkit-box;
	display: flex;
	-ms-flex-align: center;
	-ms-flex-pack: center;
	-webkit-box-align: center;
	align-items: center;
	-webkit-box-pack: center;
	justify-content: center;
	background-color: #f5f5f5;
}

form{
	padding-top: 10px;
	font-size: 13px;
	margin-top: 30px;
}

.card-title{ font-weight:300; }

.btn{
	font-size: 13px;
}

.login-form{ 
	width:320px;
	margin:20px;
}

.sign-up{
	text-align:center;
	padding:20px 0 0;
}

span{
	font-size:14px;
}

.submit-btn{
	margin-top:20px;
}
</style>
<?php
    $admin = new Login();
    if(isset($_POST['doi_mk']) && isset($_GET['username'])){
        $username = $_GET['username'];
        $pass_old = md5($_POST['pass_old']);
        $pass_new = md5($_POST['pass_new']);
        $re_pass = md5($_POST['re_pass']);
        $change_pass_admin = $admin -> change_pass_admin($username,$pass_old,$pass_new,$re_pass);
    }

?>
<div class="card login-form">
	<div class="card-body">
		<h3 class="card-title text-center">Change password</h3>
			<form action="" method="POST">
                <div class="form-group">
					<label for="exampleInputEmail1">Your currency password</label>
					<input type="password" class="form-control form-control-sm" name="pass_old">
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Your new password</label>
					<input type="password" class="form-control form-control-sm" name="pass_new">
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Repeat password</label>
					<input type="password" class="form-control form-control-sm" name="re_pass">
				</div>
                <div class="form-group">
                    <?php
                        if(isset($change_pass_admin)){
                            echo $change_pass_admin;
                        }
                    ?>
                </div>
				<button type="submit" class="btn btn-primary btn-block submit-btn" name="doi_mk">Confirm</button>
			</form>
		</div>
	</div>
</div>