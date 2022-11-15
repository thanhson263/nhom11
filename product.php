<?php
    include_once '../lib/database.php';
    include_once '../helpers/format.php';
    
    class Product{
        private $db;
        private $fm;

        function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }
        
        public function get_category(){
            $query = "SELECT * FROM category ORDER BY cate_id ASC";
            $result = $this->db->select($query);
            return $result;
        }
        public function get_all_product($sotrang){
            if($sotrang){
                $page = ceil($sotrang * 10) - 10;
            }else{
                $page = 0;
            }
            $query = "SELECT * FROM product,category WHERE product.cate_id = category.cate_id ORDER BY product_id ASC LIMIT $page,10";
            $result = $this->db->select($query);
            return $result;
        }
        public function get_all_product_page(){
            $query = "SELECT * FROM product,category WHERE product.cate_id = category.cate_id ORDER BY product_id ASC";
            $result = $this->db->select($query);
            return $result;
        }

        public function get_id_product($id){
            $query = "SELECT * FROM category,product WHERE category.cate_id = product.cate_id AND product_id = '$id'";
            // echo $query;
            $result = $this->db->select($query);
            return $result;
        }
        public function get_id_category($id,$sotrang){
            if($sotrang == "" || $sotrang == 1){
                $begin = 0;
            }else{
                $begin = (($sotrang * 6) - 6);
            }
            $query = "SELECT * FROM category,product WHERE category.cate_id = product.cate_id AND product.cate_id = '$id' LIMIT $begin,6";
            // echo $query;
            $result = $this->db->select($query);
            return $result;
        }
        public function get_low_price_courses(){
            $query = "SELECT * FROM product WHERE price < 5000000 ORDER BY price ASC";
            $result = $this->db->select($query);
            return $result;
        }

        public function get_average_price_courses(){
            $query = "SELECT * FROM product WHERE price >= 5000000 ORDER BY price ASC";
            $result = $this->db->select($query);
            return $result;
        }

        public function insert_product($tmp,$image_name,$cate_id,$name,$quantity,$price,$link_ytb,$desc){
            $cate_id = $this->fm->validation($cate_id);
            $name = $this->fm->validation($name);
            $quantity = $this->fm->validation($quantity);
            $link_ytb = $this->fm->validation($link_ytb);
            $desc = $this->fm->validation($desc);
            $image_name = $this->fm->validation($image_name);
            $price = $this->fm->validation($price);

            //connect to Database
            $cate_id = mysqli_real_escape_string($this->db->link,$cate_id);
            $name = mysqli_real_escape_string($this->db->link,$name);
            $quantity = mysqli_real_escape_string($this->db->link,$quantity);
            $price = mysqli_real_escape_string($this->db->link,$price);
            $link_ytb = mysqli_real_escape_string($this->db->link,$link_ytb);
            $desc = mysqli_real_escape_string($this->db->link,$desc);
            $quantity = mysqli_real_escape_string($this->db->link,$quantity);

            if(empty($image_name) && empty($cate_id) && empty($name) && empty($quantity) && empty($price) && empty($link_ytb) && empty($desc)){
                $alert = "<span color: red;>Thông tin điền chưa đầy đủ!</span>";
                return $alert;
            }else{
                $link_anh = "http://192.168.43.42/FricaShop/admin/img/";
                $dir = "./img/";
                if(!file_exists($dir)){
                    mkdir($dir,0755,true);
                }
                $dir = $dir.$image_name;
                if(copy($tmp,$dir)){
                    $file_anh = $link_anh.$image_name;
                    $query = "INSERT INTO product VALUES (null,$cate_id,'$name',$quantity,$price,'$file_anh','$link_ytb','$desc')";
                    // echo $query;
                    $result = $this->db->insert($query);
                    if($result){
                        $alert = '<span style="color:green;">Thêm thành công sản phẩm '.$name.' vào danh muc!</span>';
                        return $alert;
                    }else{
                        $alert = '<span style="color:red";>Thêm sản phẩm thất bại!</span>';
                        return $alert;
                    }
                }
            }
        }
        public function update_product($id,$tmp,$image_name,$cate_id,$name,$quantity,$price,$link_ytb,$desc){
            $id = $this->fm->validation($id);
            $cate_id = $this->fm->validation($cate_id);
            $name = $this->fm->validation($name);
            $quantity = $this->fm->validation($quantity);
            $link_ytb = $this->fm->validation($link_ytb);
            $desc = $this->fm->validation($desc);
            $image_name = $this->fm->validation($image_name);
            $price = $this->fm->validation($price);

            //connect to Database
            $id = mysqli_real_escape_string($this->db->link,$id);
            $cate_id = mysqli_real_escape_string($this->db->link,$cate_id);
            $name = mysqli_real_escape_string($this->db->link,$name);
            $quantity = mysqli_real_escape_string($this->db->link,$quantity);
            $price = mysqli_real_escape_string($this->db->link,$price);
            $link_ytb = mysqli_real_escape_string($this->db->link,$link_ytb);
            $desc = mysqli_real_escape_string($this->db->link,$desc);
            $quantity = mysqli_real_escape_string($this->db->link,$quantity);

            if(empty($id) && empty($image_name) && empty($cate_id) && empty($name) && empty($quantity) && empty($price) && empty($link_ytb) && empty($desc)){
                $alert = "<span color: red;>Thông tin điền chưa đầy đủ!</span>";
                return $alert;
            }else{
                $link_anh = "http://192.168.43.42/FricaShop/admin/img/";
                $dir = "./img/";
                if(!file_exists($dir)){
                    mkdir($dir,0755,true);
                }
                $dir = $dir.$image_name;
                if(copy($tmp,$dir)){
                    $file_anh = $link_anh.$image_name;
                    $query = "UPDATE product SET cate_id = $cate_id, name_pr = '$name', quantity = '$quantity', price = $price, image_pr = '$file_anh', link_ytb = '$link_ytb', description = '$desc' WHERE product_id = $id";
                    // echo $query;
                    $result = $this->db->update($query);
                    if($result){
                        $alert = '<span style="color:green;">Sửa thành công sản phẩm '.$name.' vào danh muc!</span>';
                        return $alert;
                    }else{
                        $alert = '<span style="color:red";>Sửa sản phẩm thất bại!</span>';
                        return $alert;
                    }
                }
            }
        }
        public function delete_product($id){
            $query = "DELETE FROM product WHERE product_id = $id";
            // echo $query;
            $result = $this->db->delete($query);
            // $row = $result -> fetch_assoc();
            if($result){
                $alert = '<script>alert("Xóa thành công")</script>';
                return $alert;
            }else{
                $alert = '<script>alert("Xóa không thành công")</script>';
                return $alert;
            }
        }
        public function find_currency($cate_id,$min,$max,$sotrang){
            // echo $cate_id;
            if($cate_id != ''){
                if($min == '' && $max == ''){
                    return '<script>alert("Chưa điền thông tin!");</script>';
                }else{
                    if($sotrang == "" || $sotrang == 1){
                        $begin = 0;
                    }else{
                        $begin = (($sotrang * 6) - 6);
                    }
                    $query = "SELECT * FROM product p, category c WHERE p.cate_id = c.cate_id AND p.cate_id = $cate_id AND price >= $min AND price <= $max LIMIT $begin,6";
                    // echo $query;
                    $result = $this->db->select($query);
                    if($result -> num_rows > 0){
                        return $result;
                    }
                }
            }else{
                
            }
        }

        public function sort_product($cate_id,$asc,$desc,$min,$max,$sotrang){
            // echo
            if($sotrang == "" || $sotrang == 1){
                $begin = 0;
            }else{
                $begin = (($sotrang * 6) - 6);
            }
            if($desc == 0 && $asc != ''){
                if(empty($min) && empty($max)){
                    $query = "SELECT * FROM product p, category c WHERE p.cate_id = c.cate_id AND p.cate_id = $cate_id ORDER BY price ASC LIMIT $begin,6";
                    // echo $query;
                    $result = $this->db->select($query);
                    if($result){
                        return $result;
                    }
                }else{
                    $query = "SELECT * FROM product p, category c WHERE p.cate_id = c.cate_id AND price >= $min AND price <= $max AND p.cate_id=$cate_id ORDER BY price ASC LIMIT $begin,6";
                    // echo $query;
                    $result = $this->db->select($query);
                    if($result){
                        return $result;
                    }
                }
            }else if($asc == 0 && $desc != ''){
                if(empty($min) && empty($max)){
                    $query = "SELECT * FROM product p, category c WHERE p.cate_id = c.cate_id AND p.cate_id = $cate_id ORDER BY price DESC LIMIT $begin,6";
                    // echo $query;
                    $result = $this->db->select($query);
                    if($result){
                        return $result;
                    }
                }else{
                    $query = "SELECT * FROM product p, category c WHERE p.cate_id = c.cate_id AND price >= $min AND price <= $max AND p.cate_id=$cate_id ORDER BY price DESC LIMIT $begin,6";
                    $result = $this->db->select($query);
                    // echo $query;
                    if($result){
                        return $result;
                    }
                }
            }
        }
        public function select_number_pages($id_cate){
            $query = "SELECT * FROM product WHERE cate_id = $id_cate";
            $result = $this->db->select($query);
            if($result -> num_rows > 0){
                $count_pages = ceil(($result->num_rows) / 6);
                return $count_pages;
            }else{
                return '<script>("Chưa có sản phẩm trong danh mục này");</script>';
            }
        }
        public function select_number_pages_admin(){
            $query = "SELECT * FROM product";
            $result = $this->db->select($query);
            if($result -> num_rows > 0){
                $count_pages = ceil(($result->num_rows) / 10);
                return $count_pages;
            }else{
            }
        }
        public function select_number_pages_by_price($id_cate,$min,$max){
            $query = "SELECT * FROM product WHERE cate_id = $id_cate AND price >= $min AND price <= $max";
            $result = $this->db->select($query);
            if($result -> num_rows > 0){
                $count_pages = ceil(($result->num_rows) / 6);
                return $count_pages;
            }else{
                return '<script>("Chưa có sản phẩm trong danh mục này");</script>';
            }
        }

    }
?>