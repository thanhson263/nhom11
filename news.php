<?php
    include_once "../lib/database.php";
    include_once "../helpers/format.php";
    class News{
        private $db;
        private $fm;

        function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function add_news($tmp,$name,$title,$desc){
            //kết nối với CSDL
            // $username = mysqli_real_escape_string($this->db->link,$username); //Thoát các ký tự đặc biệt trong chuỗi truy vấn SQL
            $title = mysqli_real_escape_string($this->db->link,$title);
            $desc = mysqli_real_escape_string($this->db->link,$desc);
            if(empty($name) || empty($title) || empty($desc)){
                $alert = "Tên tin tức và hình ảnh không được bỏ trống!";
                return $alert;
            }else{
                $link_anh = "http://192.168.43.42/FricaShop/admin/img/";
                $dir = "./img/";
                // echo $dir;
                date_default_timezone_set("Asia/Ho_Chi_Minh");
                $date = date("Y-m-d H:i:s");
                if(!file_exists($dir)){
                    mkdir($dir,0755,true);
                }
                // $name = "/".rand()."_".time().".png";
                $dir = $dir.$name;
                if(copy($tmp,$dir)){
                    $file_anh = $link_anh.$name;
                    $query = "INSERT INTO news VALUES(null,'$file_anh','$title','$desc','$date')";
                    // echo $query;
                    $result = $this->db->insert($query); //$this->db là lớp Database
                    if($result){
                        $alert = '<span style="color:green;">Thêm thành công tin tức '.$title.'!</span>';
                        return $alert;
                    }else{
                        $alert = '<span style="color:red";>Thêm tin tức thất bại!</span>';
                        return $alert;
                    }
                }else{
                    $alert = "Không thêm hình ảnh vào được!";
                    return $alert;
                }
                
            }
        }
        public function get_list_news(){
            $query = "SELECT * FROM news";
            $result = $this->db->select($query);
            if($result->num_rows>0){
                return $result;
            }
        }
        public function get_list_news_by_id($id){
            $query = "SELECT * FROM news WHERE id_news = $id";
            $result = $this->db->select($query);
            if($result->num_rows>0){
                return $result;
            }
        }
        public function delete_news($id){
            $query = "DELETE FROM news WHERE id_news = $id";
            $result = $this->db->delete($query);
            if($result){
                $alert = "<script>alert('Xóa thành công!')</script>";
                return $alert;
            }else{
                $alert = "<script>alert('Xóa không thành công!')</script>";
                return $alert;
            }
        }
        public function update_news($id,$tmp,$name,$title,$desc){
            if(empty($title) || empty($desc)){
                $alert = "Tên tin tức và thông tin bài viết không được bỏ trống!";
                return $alert;
            }else{
                $link_anh = "http://192.168.43.42/FricaShop/admin/img/";
                $dir = "./img/";
                // echo $dir;
                date_default_timezone_set("Asia/Ho_Chi_Minh");
                $date = date("Y-m-d H:i:s");
                if(!file_exists($dir)){
                    mkdir($dir,0755,true);
                }
                // $name = "/".rand()."_".time().".png";
                $dir = $dir.$name;
                if(copy($tmp,$dir)){
                    $file_anh = $link_anh.$name;
                    $query = "UPDATE news SET title_news = '$title',desc_news = '$desc',time_news = '$date', image_news = '$file_anh' WHERE id_news = $id";
                    // echo $query;
                    $result = $this->db->update($query); //$this->db là lớp Database
                    if($result){
                        $alert = '<span style="color:green;">Sửa thành công tin tức '.$title.' vào mục tin tức!</span>';
                        return $alert;
                    }else{
                        $alert = '<span style="color:red";>Sửa danh mục tin tức!</span>';
                        return $alert;
                    }
                }else{
                    $alert = "Không thêm hình ảnh vào được!";
                    return $alert;
                }
                
            }
        }
        public function select_new_news(){
            $query_new = "SELECT MAX(time_news) as 'time_news' FROM `news`";
            $result_new = $this->db->select($query_new);
            if($result_new->num_rows > 0){
                $row = $result_new->fetch_assoc();
                $time_max = $row['time_news'];
                $query = "SELECT * FROM news WHERE time_news = '$time_max'";
                $result = $this->db->select($query);
                if($result->num_rows>0){
                    return $result;
                }
            }
        }
        public function select_news(){
            $query = "SELECT * FROM `news` WHERE time_news < (SELECT MAX(time_news) FROM news)";
            $result = $this->db->select($query);
            if($result->num_rows > 0){
                return $result;
            }
        }
    }
?>