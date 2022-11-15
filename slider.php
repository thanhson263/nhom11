<?php
    include_once '../helpers/format.php';
    include_once '../lib/database.php';

    class Slider{
        private $db;
        private $fm;

        function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function get_slider(){
            $query = "SELECT * FROM slider";
            $result = $this->db->select($query);
            if($result -> num_rows > 0){
                return $result;
            }
        }
        public function get_id_slider($id){
            $query = "SELECT * FROM slider WHERE id_slider = $id";
            $result = $this->db->select($query);
            if($result->num_rows > 0){
                return $result;
            }
        }
        public function insert_slider($tmp,$anh_quang_cao,$ten_qc){
            $tmp = $this->fm->validation($tmp);
            $anh_quang_cao = $this->fm->validation($anh_quang_cao);
            $ten_qc = $this->fm->validation($ten_qc);

            $tmp = mysqli_real_escape_string($this->db->link,$tmp);
            $anh_quang_cao = mysqli_real_escape_string($this->db->link,$anh_quang_cao);
            $ten_qc = mysqli_real_escape_string($this->db->link,$ten_qc);

            if($tmp == '' && $anh_quang_cao == "" && $ten_qc = ""){
                $alert = "<span color: red;>Thông tin điền chưa đầy đủ!</span>";
                return $alert;
            }else{
                $link_anh = "http://192.168.43.42/FricaShop/admin/img/";
                $dir = "./img/";
                if(!file_exists($dir)){
                    mkdir($dir,0755,true);
                }
                $dir = $dir.$anh_quang_cao;
                if(copy($tmp,$dir)){
                    $file_anh = $link_anh.$anh_quang_cao;
                    $query = "INSERT INTO slider VALUES (null,'$ten_qc','$file_anh')";
                    // echo $query;
                    $result = $this->db->insert($query);
                    if($result){
                        $alert = '<span style="color:green;">Thêm thành công quảng cáo '.$ten_qc.' vào danh muc!</span>';
                        return $alert;
                    }else{
                        $alert = '<span style="color:red";>Thêm quảng cáo thất bại!</span>';
                        return $alert;
                    }
                }
            }
        }

        public function update_slider($id,$tmp,$anh_quang_cao,$ten_qc){
            if($tmp == '' && $anh_quang_cao == "" && $ten_qc = ""){
                $alert = "<span color: red;>Thông tin điền chưa đầy đủ!</span>";
                return $alert;
            }else{
                $link_anh = "http://192.168.43.42/FricaShop/admin/img/";
                $dir = "./img/";
                if(!file_exists($dir)){
                    mkdir($dir,0755,true);
                }
                $dir = $dir.$anh_quang_cao;
                if(copy($tmp,$dir)){
                    $file_anh = $link_anh.$anh_quang_cao;
                    $query = "UPDATE slider SET name_slider = '$ten_qc', image_slider = '$file_anh' WHERE id_slider = $id";
                    // echo $query;
                    $result = $this->db->insert($query);
                    if($result){
                        $alert = '<span style="color:green;">Sửa thành công quảng cáo '.$ten_qc.' vào danh muc!</span>';
                        return $alert;
                    }else{
                        $alert = '<span style="color:red";>Sửa quảng cáo thất bại!</span>';
                        return $alert;
                    }
                }
            }
        }
        public function delete_slider($id){
            $query = "DELETE FROM slider WHERE id_slider = $id";
            $result = $this->db->delete($query);
            if($result){
                $alert = '<script>alert("Xóa thành công")</script>';
                return $alert;
            }else{
                $alert = '<script>alert("Xóa không thành công")</script>';
                return $alert;
            }
        }
    }

?>