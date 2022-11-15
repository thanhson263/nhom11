<div class="main-navbar" style="z-index: 1;">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="page.php">Frica Shop</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">

        <li class="nav-item dropdown">
          <a class="nav-link" href="change_pass.php?username=<?php echo $_SESSION['admin_username']?>" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Đổi mật khẩu
          </a>
        </li>
        <li class="nav-item">
          <?php
            Session::checkSession();
            if(isset($_GET['action']) && $_GET['action'] == 'dangxuat'){
              Session::destroy();
            }
          ?>
          <a class="nav-link" href="?action=dangxuat">Đăng xuất: <?php
              if(isset($_SESSION['admin_name'])){
                  echo $_SESSION['admin_name'];
              }
          ?></a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0" action="search_info.php" method="POST">
        <select name="lua_chon" id="" class="form-control" style="margin-right: 10px;">
          <option value="">Cần tìm kiếm</option>
          <option selected value="0">Danh mục</option>
          <option value="1">Sản phẩm</option>
          <option value="2">Khách hàng<option>
        </select>
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="thong_tin">
        <input class="btn btn-outline-success my-2 my-sm-0" type="submit" value="Search" name="tim_kiem_thong_tin">
      </form>
    </div>
  </nav>
</div>