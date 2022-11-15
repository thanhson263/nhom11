<?php
    include_once '../lib/session.php';
    if(Session::init()){
        Session::checkLogin();
    }else{

    }
    include_once '../lib/database.php';
    include_once '../helpers/format.php';
?>
<?php

    class Login{
        private $db;
        private $format;

        public function __construct()
        {
            $this->db = new Database();
            $this->format = new Format();
        }
        public function login_admin($username,$password){
            $username = $this->format->validation($username); // kiểm tra tính hợp lệ của tên
            $password = $this->format->validation($password);
            //kết nối với CSDL
            $username = mysqli_real_escape_string($this->db->link,$username); //Thoát các ký tự đặc biệt trong chuỗi truy vấn SQL
            $password = mysqli_real_escape_string($this->db->link,$password);
            if(empty($username) || empty($password)){
                $alert = "Tài khoản và mật khẩu không được bỏ trống!";
                return $alert;
            }else{
                $query = "SELECT * FROM admin WHERE email_admin = '$username' AND pass_admin = '$password' LIMIT 1";
                // echo $query;
                $result = $this->db->select($query); //$this->db là lớp Database
                if($result -> num_rows > 0){
                    $value = $result->fetch_assoc(); //fetch_array(): trả về 1 mảng có cả value và tên cột, fetch_assoc(): trả về một mảng chỉ có tên cột
                    Session::set("login",true); //đối số thứ 1 phải trùng với hàm checkLogin()
                    Session::set("admin_id",$value['id']);
                    Session::set("admin_username",$value['email_admin']);
                    Session::set("admin_password",$value['pass_admin']);
                    Session::set("admin_name",$value['name_admin']);
                    header("Location: index.php");
                }else{
                    $alert = "Đăng nhập thất bại, mật khẩu và tài khoản không đúng!";
                    return $alert;
                }
            }
        }

        public function change_pass_admin($username,$pass_old,$pass_new,$re_pass){
            $regex_pass = '/^[a-zA-Z0-9]{6,32}$/';
            $query = "SELECT * FROM admin WHERE email_admin = '$username'";
            $result = $this->db->select($query);
            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
                if($pass_old == $row['pass_admin']){
                    // echo $pass_new;
                    if(preg_match($regex_pass,$pass_new)){
                        if($pass_new == $re_pass){
                            $query_update = "UPDATE admin SET pass_admin = '$pass_new' WHERE email_admin = '$username'";
                            $result_update = $this->db->update($query_update);
                            if($result_update){
                                return '<span style="color: red;">Thay đổi mật khẩu thành công!</span>';    
                            }else{
                                return '<span style="color: red;">Thay đổi mật khẩu không thành công!</span>';
                            }
                        }else{
                            return '<span style="color: green;">Mật khẩu không trùng khớp!</span>';
                        }
                    }else{
                        return '<span style="color: red;">Mật khẩu phải có từ 6 đến 32 ký tự, ký tự đầu tiên phải là ký tự in hoa!</span>';
                    }
                }else{
                    return '<span style="color: red;">Mật khẩu không đúng với mật khẩu hiện tại!</span>';
                }
            }
        }
        public function login_destroy(){

        }
    }
?>