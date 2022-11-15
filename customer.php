<?php
    include_once '../helpers/format.php';
    include_once '../lib/database.php';
    require "../PHPMailer-master/src/PHPMailer.php"; 
    require "../PHPMailer-master/src/SMTP.php"; 
    require "../PHPMailer-master/src/Exception.php"; 
    class Customer{
        private $db;
        private $fm;

        function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function get_list_customer(){
            $query = "SELECT * FROM customer";
            $result = $this->db->select($query);
            return $result;
        }
        public function get_customer_by_id($id){
            $query = "SELECT * FROM customer WHERE id = $id";
            $result = $this->db->select($query);
            return $result;
        }
        public function update_customer($id,$tmp,$image,$name,$age,$phone_number,$email,$address){
            //check format text;
            $id = $this->fm->validation($id);
            $tmp = $this->fm->validation($tmp);
            $image = $this->fm->validation($image);
            $name = $this->fm->validation($name);
            $age = $this->fm->validation($age);
            $phone_number = $this->fm->validation($phone_number);
            $email = $this->fm->validation($email);
            $address = $this->fm->validation($address);
            // $password = $this->fm->validation($password);
            //connect to Database
            $id = mysqli_real_escape_string($this->db->link,$id);
            $tmp = mysqli_real_escape_string($this->db->link,$tmp);
            $image = mysqli_real_escape_string($this->db->link,$image);
            $name = mysqli_real_escape_string($this->db->link,$name);
            $age = mysqli_real_escape_string($this->db->link,$age);
            $phone_number = mysqli_real_escape_string($this->db->link,$phone_number);
            $email = mysqli_real_escape_string($this->db->link,$email);
            $address = mysqli_real_escape_string($this->db->link,$address);
            // $password = mysqli_real_escape_string($this->db->link,$password);
            //update
            if(empty($id) && empty($tmp) && empty($image) && empty($name) && empty($age) && empty($phone_number) && empty($email) && empty($address)){
                $alert = "Không đủ thông tin cần sửa chưa đủ!";
                return $alert;
            }else{
                $link_anh = "http://192.168.43.42/fricashop/admin/img/";
                $dir = "./img/";
                if(!file_exists($dir)){
                    mkdir($dir,0755,true);
                }
                $dir = $dir.$image;
                if(copy($tmp,$dir)){
                    $file_anh = $link_anh.$image;
                    $query = "UPDATE customer SET hinh_anh = '$file_anh', ten_khach_hang = '$name', tuoi = '$age', sdt = '$phone_number', email = '$email', diachi = '$address' WHERE id = $id";
                    // echo $query;
                    $result = $this->db->update($query);
                    if($result){
                        $alert = '<span style="color:green;">Sửa thành công khách hàng tên '.$name.'!</span>';
                        return $alert;
                    }else{
                        $alert = '<span style="color:red";>Sửa tên khách hàng thất bại!</span>';
                        return $alert;
                    }
                }else{
                    $alert = "Không có hình ảnh";
                    return $alert;
                }
            }
        }
        public function edit_customer($id,$tmp,$image,$name,$age,$phone_number,$email,$address){
            //check format text;
            $id = $this->fm->validation($id);
            $tmp = $this->fm->validation($tmp);
            $image = $this->fm->validation($image);
            $name = $this->fm->validation($name);
            $age = $this->fm->validation($age);
            $phone_number = $this->fm->validation($phone_number);
            $email = $this->fm->validation($email);
            $address = $this->fm->validation($address);
            // $password = $this->fm->validation($password);
            //connect to Database
            $id = mysqli_real_escape_string($this->db->link,$id);
            $tmp = mysqli_real_escape_string($this->db->link,$tmp);
            $image = mysqli_real_escape_string($this->db->link,$image);
            $name = mysqli_real_escape_string($this->db->link,$name);
            $age = mysqli_real_escape_string($this->db->link,$age);
            $phone_number = mysqli_real_escape_string($this->db->link,$phone_number);
            $email = mysqli_real_escape_string($this->db->link,$email);
            $address = mysqli_real_escape_string($this->db->link,$address);
            // $password = mysqli_real_escape_string($this->db->link,$password);
            //update
            if(empty($id) && empty($tmp) && empty($image) && empty($name) && empty($age) && empty($phone_number) && empty($email) && empty($address)){
                $alert = "Không đủ thông tin cần sửa chưa đủ!";
                return $alert;
            }else{
                $link_anh = "http://192.168.43.42/fricashop/page/images/";
                $dir = "./images/";
                if(!file_exists($dir)){
                    mkdir($dir,0755,true);
                }
                $dir = $dir.$image;
                if(copy($tmp,$dir)){
                    $file_anh = $link_anh.$image;
                    $query = "UPDATE customer SET hinh_anh = '$file_anh', ten_khach_hang = '$name', tuoi = '$age', sdt = '$phone_number', email = '$email', diachi = '$address' WHERE id = $id";
                    // echo $query;
                    $result = $this->db->update($query);
                    if($result){
                        $alert = '<span style="color:green;">Sửa thành công khách hàng tên '.$name.'!</span>';
                        return "<meta http-equiv=\"refresh\" content=\"0\">";
                        return $alert;
                    }else{
                        $alert = '<span style="color:red";>Sửa tên khách hàng thất bại!</span>';
                        return $alert;
                    }
                }else{
                    $alert = "Không có hình ảnh";
                    return $alert;
                }
            }
        }
        public function delete_customer($id){
            $query = "DELETE FROM customer WHERE id = $id";
            $result = $this->db->delete($query);
            if($result){
                $alert = "<script>alert('Xóa thành công khách hàng')</script>";
                return $alert;
            }else{
                $alert = "<script>alert('Xóa không thành công khách hàng')</script>";
                return $alert;
            }
        }

        public function login($ten_dang_nhap,$mat_khau){
            if(empty($ten_dang_nhap) && empty($mat_khau)){
                $alert = "Tài khoản và mật khẩu không được bỏ trống!";
                return $alert;
            }else{
                $query = "SELECT * FROM customer WHERE email = '$ten_dang_nhap' AND matkhau = '$mat_khau' LIMIT 1";
                // echo $query;
                $result = $this->db->select($query);
                if($result->num_rows == 1){
                    $value = $result->fetch_assoc();
                    // Session::init();
                    Session::set("customer_login",true);
                    Session::set("id",$value['id']);
                    Session::set("ten_dang_nhap",$ten_dang_nhap);
                    Session::set("ten_khach_hang",$value['ten_khach_hang']);
                    echo "<script>window.location.href='index.php'</script>";
                    // echo $_SESSION['ten_dang_nhap'];
                }else{
                    return '<span style="color:red;">Tài khoản hoặc mật khẩu không chính xác, yêu cầu kiểm tra lại</span>';
                }
            }
        }
        public function register($ten_dang_nhap,$ten_khach_hang,$mat_khau,$tuoi,$sdt,$dia_chi,$data){
            $regex_pass = '/^[A-Z]{1}[a-zA-Z0-9]{6,32}$/';
            $link_anh = "http://192.168.43.42/FricaShop/admin/img/white_background.jpeg";
            $ten_dang_nhap = $this->fm->validation($ten_dang_nhap);
            $ten_khach_hang = $this->fm->validation($ten_khach_hang);
            $mat_khau = $this->fm->validation($mat_khau);
            $tuoi = $this->fm->validation($tuoi);
            $sdt = $this->fm->validation($sdt);
            $dia_chi = $this->fm->validation($dia_chi);

            $ten_dang_nhap = mysqli_real_escape_string($this->db->link,$ten_dang_nhap);
            $ten_khach_hang = mysqli_real_escape_string($this->db->link,$ten_khach_hang);
            $tuoi = mysqli_real_escape_string($this->db->link,$tuoi);
            $mat_khau = mysqli_real_escape_string($this->db->link,$mat_khau);
            $sdt = mysqli_real_escape_string($this->db->link,$sdt);
            $dia_chi = mysqli_real_escape_string($this->db->link,$dia_chi);

            if(empty($ten_dang_nhap) && empty($ten_khach_hang) && empty($mat_khau) && empty($tuoi) && empty($sdt) && empty($dia_chi)){
                $alert = "Thông tin điền chưa đầy đủ";
                return $alert;
            }else{
                $query_select = "SELECT * FROM customer WHERE email = '$ten_dang_nhap'";
                $result_select = $this->db->select($query_select)->num_rows;
                if($result_select == 1){
                    return 'Tài khoản đã tồn tại!';
                }else{
                    if(!preg_match($regex_pass,$data['mat_khau'])){
                        return 'Mật khẩu phải bắt đầu bằng một chữ cái in hoa và ký tự từ 6 đến 32!';
                    }else{
                        $query = "INSERT INTO customer VALUES (NULL,'$link_anh','$ten_khach_hang',$tuoi,'$sdt','$ten_dang_nhap','$dia_chi','$mat_khau')";
                        $result = $this->db->insert($query);
                        if($result){
                            header("Location: login.php");
                        }else{
                            return "Đăng ký không thành công!";
                        }
                    }
                }
            }
        }
        public function change_password($ten_dang_nhap,$mat_khau,$nhap_lai_mat_khau,$data){
            $regex = '/^[A-Z]{1}[a-zA-Z0-9]{6,32}$/';// Chuỗi ký tự chính quy Regex
            $ten_dang_nhap = $this->fm->validation($ten_dang_nhap);
            $mat_khau = $this->fm->validation($mat_khau);
            $nhap_lai_mat_khau = $this->fm->validation($nhap_lai_mat_khau);
            $ten_dang_nhap = mysqli_real_escape_string($this->db->link,$ten_dang_nhap);
            $mat_khau = mysqli_real_escape_string($this->db->link,$mat_khau);
            $nhap_lai_mat_khau = mysqli_real_escape_string($this->db->link,$nhap_lai_mat_khau);
            if(empty($mat_khau) && empty($nhap_lai_mat_khau)){
                return 'Tài khoản hoặc mật khẩu của bạn chưa được điền!';
            }else{
                if($nhap_lai_mat_khau == $mat_khau){
                    if(!preg_match($regex,$data['mat_khau'])){
                        return '<span style="color:red;">Mật khẩu phải bắt đầu bằng một chữ cái in hoa và ký tự từ 6 đến 32!</span>';
                    }else{
                        $query = "UPDATE customer SET matkhau = '$mat_khau' WHERE email = '$ten_dang_nhap'";
                        // echo $query;
                        $result = $this->db->update($query);
                        if($result){
                            return '<script>alert("Thay đổi mật khẩu thành công!")</script>';
                            return '<script>window.location.href="login.php"</script>';
                        }else{
                            return '<span style="color:red;">Thay đổi mật khẩu thất bại!</span>';
                        } 
                    }
                }else{
                    return '<span style="color:red;">Mật khẩu không trùng khớp!</span>';
                }
            }
        }
        public function forgot_password($email){
            $email = $this->fm->validation($email);
            $email = mysqli_real_escape_string($this->db->link,$email);
            if($email == ''){
                return '<span style="color:red;">Không được để trống Email!</span>';
            }else{
                // if(preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/",$email)){
                    $query = "SELECT * FROM customer WHERE email = '$email'";
                    $result = $this->db->select($query);
                    if($result->num_rows == 0){
                        return '<span style="color:red;">Email chưa được đăng ký, vui lòng kiểm tra lại!</span>';
                    }else{
                        // guiMail($email);
                        
                        $mail = new PHPMailer\PHPMailer\PHPMailer(true);//true:enables exceptions
                        try {
                            $mail->SMTPDebug = 0; //0,1,2: chế độ debug. khi chạy ngon thì chỉnh lại 0 nhé
                            $mail->isSMTP();  
                            $mail->CharSet  = "utf-8";
                            $mail->Host = 'smtp.gmail.com';  //SMTP servers
                            $mail->SMTPAuth = true; // Enable authentication
                            $mail->Username = 'toilaone12@gmail.com'; // SMTP username
                            $mail->Password = 'kieudangbaoson';   // SMTP password
                            $mail->SMTPSecure = 'tls';  // encryption TLS/SSL 
                            $mail->Port = 587;  // port to connect to                
                            $mail->setFrom('toilaone12@gmail.com','Son'); 
                            $mail->addAddress($email); //mail và tên người nhận  
                            $mail->isHTML(true);  // Set email format to HTML
                            $mail->Subject = "Yêu cầu thay đổi mật khẩu của bạn {$email}";
                            $noidungthu = "<p>Thư được gửi đến từ trang FricaShop.com, do có bạn hoặc ai đó yêu cầu thay đổi mật khẩu mới
                            <a href='http://localhost/fricashop/page/change_pass.php?email={$email}'>Click vào đây để thay đổi mật khẩu</a>
                            </p>"; ; 
                            $mail->Body = $noidungthu;
                            $mail->smtpConnect( array(
                                "ssl" => array(
                                    "verify_peer" => false,
                                    "verify_peer_name" => false,
                                    "allow_self_signed" => true
                                )
                            ));
                            $mail->send();
                            return '<span style="color:green;">Gửi email thành công, vui lòng kiểm tra email!</span>';
                            return "<meta http-equiv=\"refresh\" content=\"0\">";
                            // $thongbaomail = "Đã gửi thông tin!";
                        } catch (Exception $e) {
                            // $thongbaomail = "Lỗi";
                            return '<span style="color: red;">Gửi email thất bại, vui lòng kiểm tra email! '.$mail->ErrorInfo.'</span>';
                            // return $mail->ErrorInfo;
                        }
                        
                    }
                // }else{
                //     return "<span style:'color:red;'>Sai định dạng email, vui lòng nhập lại!</span>";
                // }
            }
        }
        public function show_customer($id){
            $query = "SELECT * FROM customer WHERE id = '$id'";
            $result = $this->db->select($query);
            return $result;
        }
        public function insert_comment($id,$name_comment,$desc_comment){
            $name_comment = $this->fm->validation($name_comment);
            $desc_comment = $this->fm->validation($desc_comment);

            $name_comment = mysqli_real_escape_string($this->db->link,$name_comment);
            $name_comment = mysqli_real_escape_string($this->db->link,$name_comment);
            $time_zone = date_default_timezone_set("Asia/Ho_Chi_Minh");
            $time = date("Y-m-d");
            if($name_comment == '' || $desc_comment == ''){
                return '<span style="color: red">Chưa điền đầy đủ thông tin!</span>';
            }else{
                $query = "INSERT INTO comment_product (id_comment,product_id,name_comment,desc_comment,time_comment) VALUES (null,$id,'$name_comment','$desc_comment','$time')";
                // echo $query;
                $result = $this->db->insert($query);
                if($result){
                    // return $result;
                    // echo '<script>window.location.href="details.php?product_id="'.$id.'</script>';
                    // exit;
                    unset($id);
                    unset($name_comment);
                    unset($desc_comment);
                }else{
                    return '<span style="color: red">Bình luận có vấn đề!</span>';
                }
            }
        }
        public function select_comment($id){
            $query = "SELECT * FROM comment_product WHERE product_id = $id";
            // echo $query;
            $result = $this->db->select($query);
            if($result -> num_rows > 0){
                return $result;
            }else{
                // return "<span>Không có bình luận!</span>";
            }
        }
    }
?>