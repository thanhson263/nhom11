
<div class="sidebar" data-color="white" data-active-color="danger" style="z-index: 1000;">
    <div class="grid">
        <div class="grid__row">
            <div class="logo-image-small">
                <img src="../img/xbox.png" alt="">
            </div>
            <div class="logo">
                    <!-- <p>CT</p> -->
                    <a href="index.php" class="simple-text logo-normal">
                        Frica Shop
                        <!-- <div class="logo-image-big">
                        <img src="../assets/img/logo-big.png">
                        </div> -->
                    </a>
            </div>
        </div>
        <ul class="list-group">
            <li>
                <a href="" id="click-list" class="list-group-item list-group-item-action list-hover">
                    Danh mục sản phẩm
                </a>
                <ul class="list-hide list-none">
                    <li><a href="add_cate.php" class="list-items">Thêm danh mục</a></li>
                    <li><a href="list_cate.php" class="list-items-1">Danh sách danh mục</a></li>
                </ul>
            </li>
            <li>
                <a href="" class="list-group-item list-group-item-action list-hover">
                    Sản phẩm cần bán
                </a>
                <ul class="list-hide list-none">
                    <li><a href="add_product.php" class="list-items">Thêm sản phẩm</a></li>
                    <li><a href="list_product.php" class="list-items-1">Danh sách sản phẩm</a></li>
                </ul>
            </li>
            <li>
                <a href="" class="list-group-item list-group-item-action list-hover">
                    Quảng cáo
                </a>
                <ul class="list-hide list-none">
                    <li><a href="add_slider.php" class="list-items" style="padding-right: 94.9px;">Thêm quảng cáo</a></li>
                    <li><a href="list_slider.php" class="list-items-1" style="padding-right:58.9px;">Danh sách quảng cáo</a></li>
                </ul>
            </li>
            <li>
                <a href="" class="list-group-item list-group-item-action list-hover">
                    Tin tức
                </a>
                <ul class="list-hide list-none">
                    <li><a href="add_news.php" class="list-items" style="padding-right: 94.9px;">Thêm tin tức</a></li>
                    <li><a href="list_news.php" class="list-items-1" style="padding-right:58.9px;">Danh sách tin tức</a></li>
                </ul>
            </li>
            <li>
                <a href="list_customer.php" class="list-group-item list-group-item-action list-hover">
                    Thông tin khách hàng
                </a>
            </li>
            <li>
                <a href="list_bill.php" class="list-group-item list-group-item-action list-hover">
                    Hóa đơn
                </a>
            </li>
        </ul>
    </div>  
    
</div>
<script>
    function showList(){
        var subList = document.querySelector('.list-none');
        subList.classList.toggle('list-hide');
    }
    window.onload = function(){
        var click = document.getElementById('click-list');
        click.addEventListener('click', showList)
    }

</script>