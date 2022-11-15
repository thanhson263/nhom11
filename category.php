<?php
    // include '../lib/session.php';
    // Session::checkLogin();
    include_once '../lib/database.php';
    include_once '../helpers/format.php';
?>
<?php

    class Category{
        private $db;
        private $format;

        public function __construct()
        {
            $this->db = new Database();
            $this->format = new Format();
        }
        public function get_category_by_id_cate($id){
            $query = "SELECT * FROM category WHERE cate_id = $id";
            // echo $query;
            $result = $this->db->select($query);
            return $result;
        }
        public function select_number_list(){
            $query = "SELECT * FROM category ORDER BY cate_id ASC";
            $result = $this->db->select($query);
            return ceil($result -> num_rows / 5);
        }
        public function get_all_cate(){
            $query = "SELECT * FROM category  ORDER BY cate_id ASC";
            $result = $this->db->select($query);
            if($result){
                return $result;
            }
        }
        public function get_all_category($sotrang){
            if($sotrang){
               $page = ceil(($sotrang * 5)-5); 
            }else{
                $page = 0;
            }
            $query = "SELECT * FROM category  ORDER BY cate_id ASC LIMIT $page,5";
            $result = $this->db->select($query);
            if($result){
                return $result;
            }
        }
        public function insert_category($tmp,$hinh_anh,$ten_danh_muc){
            // $username = $this->format->validation($username); // kiểm tra tính hợp lệ của tên
            $ten_danh_muc = $this->format->validation($ten_danh_muc);
            //kết nối với CSDL
            // $username = mysqli_real_escape_string($this->db->link,$username); //Thoát các ký tự đặc biệt trong chuỗi truy vấn SQL
            $ten_danh_muc = mysqli_real_escape_string($this->db->link,$ten_danh_muc);
            if(empty($hinh_anh) || empty($ten_danh_muc)){
                $alert = "Tên danh mục và hình ảnh không được bỏ trống!";
                return $alert;
            }else{
                $link_anh = "http://192.168.43.42/FricaShop/admin/img/";
                $dir = "./img/";
                // echo $dir;
                if(!file_exists($dir)){
                    mkdir($dir,0755,true);
                }
                // $name = "/".rand()."_".time().".png";
                $dir = $dir.$hinh_anh;
                if(copy($tmp,$dir)){
                    $file_anh = $link_anh.$hinh_anh;
                    $query = "INSERT INTO category VALUES(null,'$ten_danh_muc','$file_anh')";
                    // echo $query;
                    $result = $this->db->insert($query); //$this->db là lớp Database
                    if($result){
                        $alert = '<span style="color:green;">Thêm thành công danh mục '.$ten_danh_muc.' vào danh muc!</span>';
                        return $alert;
                    }else{
                        $alert = '<span style="color:red";>Thêm danh mục thất bại!</span>';
                        return $alert;
                    }
                }else{
                    $alert = "Không thêm hình ảnh vào được!";
                    return $alert;
                }
                
            }
        }
        public function update_category($id,$tmp,$anh_danh_muc,$ten_danh_muc){
            $ten_danh_muc = $this->format->validation($ten_danh_muc);
            //kết nối với CSDL
            // $username = mysqli_real_escape_string($this->db->link,$username); //Thoát các ký tự đặc biệt trong chuỗi truy vấn SQL
            $ten_danh_muc = mysqli_real_escape_string($this->db->link,$ten_danh_muc);
            if(empty($anh_danh_muc) || empty($ten_danh_muc)){
                $alert = "Tên danh mục và hình ảnh không được bỏ trống!";
                return $alert;
            }else{
                $link_anh = "http://192.168.43.42/FricaShop/admin/img/";
                $dir = "./img/";
                // echo $dir;
                if(!file_exists($dir)){
                    mkdir($dir,0755,true);
                }
                // $name = "/".rand()."_".time().".png";
                $dir = $dir.$anh_danh_muc;
                if(copy($tmp,$dir)){
                    $file_anh = $link_anh.$anh_danh_muc;
                    $query = "UPDATE category SET name = '$ten_danh_muc', image = '$file_anh' WHERE cate_id = $id";
                    // echo $query;
                    $result = $this->db->update($query); //$this->db là lớp Database
                    if($result){
                        $alert = '<span style="color:green;">Sửa thành công danh mục '.$ten_danh_muc.' vào danh muc!</span>';
                        return $alert;
                    }else{
                        $alert = '<span style="color:red";>Sửa danh mục thất bại!</span>';
                        return $alert;
                    }
                }else{
                    $alert = "Không thêm hình ảnh vào được!";
                    return $alert;
                }
                
            }
        }
        public function delete_category($id){
            $id = $this->format->validation($id);
            $id = mysqli_real_escape_string($this->db->link,$id);
            if(empty($id)){
                $alert = "Mã danh mục không tồn tại!";
                return $alert;
            }else{
                $query = "DELETE FROM category WHERE cate_id = $id";
                $result = $this->db->delete($query);
                // $row = $result -> fetch_assoc
                if($result){
                    $alert = "<script>alert('Xóa thành công!')</script>";
                    return $alert;
                }else{
                    $alert = "<script>alert('Xóa không thành công!')</script>";
                    return $alert;
                }
            }
        }
        public function login_destroy(){

        }
    }
?>