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
                $alert = "Kh??ng ????? th??ng tin c???n s???a ch??a ?????!";
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
                        $alert = '<span style="color:green;">S???a th??nh c??ng kh??ch h??ng t??n '.$name.'!</span>';
                        return $alert;
                    }else{
                        $alert = '<span style="color:red";>S???a t??n kh??ch h??ng th???t b???i!</span>';
                        return $alert;
                    }
                }else{
                    $alert = "Kh??ng c?? h??nh ???nh";
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
                $alert = "Kh??ng ????? th??ng tin c???n s???a ch??a ?????!";
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
                        $alert = '<span style="color:green;">S???a th??nh c??ng kh??ch h??ng t??n '.$name.'!</span>';
                        return "<meta http-equiv=\"refresh\" content=\"0\">";
                        return $alert;
                    }else{
                        $alert = '<span style="color:red";>S???a t??n kh??ch h??ng th???t b???i!</span>';
                        return $alert;
                    }
                }else{
                    $alert = "Kh??ng c?? h??nh ???nh";
                    return $alert;
                }
            }
        }
        public function delete_customer($id){
            $query = "DELETE FROM customer WHERE id = $id";
            $result = $this->db->delete($query);
            if($result){
                $alert = "<script>alert('X??a th??nh c??ng kh??ch h??ng')</script>";
                return $alert;
            }else{
                $alert = "<script>alert('X??a kh??ng th??nh c??ng kh??ch h??ng')</script>";
                return $alert;
            }
        }

        public function login($ten_dang_nhap,$mat_khau){
            if(empty($ten_dang_nhap) && empty($mat_khau)){
                $alert = "T??i kho???n v?? m???t kh???u kh??ng ???????c b??? tr???ng!";
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
                    return '<span style="color:red;">T??i kho???n ho???c m???t kh???u kh??ng ch??nh x??c, y??u c???u ki???m tra l???i</span>';
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
                $alert = "Th??ng tin ??i???n ch??a ?????y ?????";
                return $alert;
            }else{
                $query_select = "SELECT * FROM customer WHERE email = '$ten_dang_nhap'";
                $result_select = $this->db->select($query_select)->num_rows;
                if($result_select == 1){
                    return 'T??i kho???n ???? t???n t???i!';
                }else{
                    if(!preg_match($regex_pass,$data['mat_khau'])){
                        return 'M???t kh???u ph???i b???t ?????u b???ng m???t ch??? c??i in hoa v?? k?? t??? t??? 6 ?????n 32!';
                    }else{
                        $query = "INSERT INTO customer VALUES (NULL,'$link_anh','$ten_khach_hang',$tuoi,'$sdt','$ten_dang_nhap','$dia_chi','$mat_khau')";
                        $result = $this->db->insert($query);
                        if($result){
                            header("Location: login.php");
                        }else{
                            return "????ng k?? kh??ng th??nh c??ng!";
                        }
                    }
                }
            }
        }
        public function change_password($ten_dang_nhap,$mat_khau,$nhap_lai_mat_khau,$data){
            $regex = '/^[A-Z]{1}[a-zA-Z0-9]{6,32}$/';// Chu???i k?? t??? ch??nh quy Regex
            $ten_dang_nhap = $this->fm->validation($ten_dang_nhap);
            $mat_khau = $this->fm->validation($mat_khau);
            $nhap_lai_mat_khau = $this->fm->validation($nhap_lai_mat_khau);
            $ten_dang_nhap = mysqli_real_escape_string($this->db->link,$ten_dang_nhap);
            $mat_khau = mysqli_real_escape_string($this->db->link,$mat_khau);
            $nhap_lai_mat_khau = mysqli_real_escape_string($this->db->link,$nhap_lai_mat_khau);
            if(empty($mat_khau) && empty($nhap_lai_mat_khau)){
                return 'T??i kho???n ho???c m???t kh???u c???a b???n ch??a ???????c ??i???n!';
            }else{
                if($nhap_lai_mat_khau == $mat_khau){
                    if(!preg_match($regex,$data['mat_khau'])){
                        return '<span style="color:red;">M???t kh???u ph???i b???t ?????u b???ng m???t ch??? c??i in hoa v?? k?? t??? t??? 6 ?????n 32!</span>';
                    }else{
                        $query = "UPDATE customer SET matkhau = '$mat_khau' WHERE email = '$ten_dang_nhap'";
                        // echo $query;
                        $result = $this->db->update($query);
                        if($result){
                            return '<script>alert("Thay ?????i m???t kh???u th??nh c??ng!")</script>';
                            return '<script>window.location.href="login.php"</script>';
                        }else{
                            return '<span style="color:red;">Thay ?????i m???t kh???u th???t b???i!</span>';
                        } 
                    }
                }else{
                    return '<span style="color:red;">M???t kh???u kh??ng tr??ng kh???p!</span>';
                }
            }
        }
        public function forgot_password($email){
            $email = $this->fm->validation($email);
            $email = mysqli_real_escape_string($this->db->link,$email);
            if($email == ''){
                return '<span style="color:red;">Kh??ng ???????c ????? tr???ng Email!</span>';
            }else{
                // if(preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/",$email)){
                    $query = "SELECT * FROM customer WHERE email = '$email'";
                    $result = $this->db->select($query);
                    if($result->num_rows == 0){
                        return '<span style="color:red;">Email ch??a ???????c ????ng k??, vui l??ng ki???m tra l???i!</span>';
                    }else{
                        // guiMail($email);
                        
                        $mail = new PHPMailer\PHPMailer\PHPMailer(true);//true:enables exceptions
                        try {
                            $mail->SMTPDebug = 0; //0,1,2: ch??? ????? debug. khi ch???y ngon th?? ch???nh l???i 0 nh??
                            $mail->isSMTP();  
                            $mail->CharSet  = "utf-8";
                            $mail->Host = 'smtp.gmail.com';  //SMTP servers
                            $mail->SMTPAuth = true; // Enable authentication
                            $mail->Username = 'toilaone12@gmail.com'; // SMTP username
                            $mail->Password = 'kieudangbaoson';   // SMTP password
                            $mail->SMTPSecure = 'tls';  // encryption TLS/SSL 
                            $mail->Port = 587;  // port to connect to                
                            $mail->setFrom('toilaone12@gmail.com','Son'); 
                            $mail->addAddress($email); //mail v?? t??n ng?????i nh???n  
                            $mail->isHTML(true);  // Set email format to HTML
                            $mail->Subject = "Y??u c???u thay ?????i m???t kh???u c???a b???n {$email}";
                            $noidungthu = "<p>Th?? ???????c g???i ?????n t??? trang FricaShop.com, do c?? b???n ho???c ai ???? y??u c???u thay ?????i m???t kh???u m???i
                            <a href='http://localhost/fricashop/page/change_pass.php?email={$email}'>Click v??o ????y ????? thay ?????i m???t kh???u</a>
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
                            return '<span style="color:green;">G???i email th??nh c??ng, vui l??ng ki???m tra email!</span>';
                            return "<meta http-equiv=\"refresh\" content=\"0\">";
                            // $thongbaomail = "???? g???i th??ng tin!";
                        } catch (Exception $e) {
                            // $thongbaomail = "L???i";
                            return '<span style="color: red;">G???i email th???t b???i, vui l??ng ki???m tra email! '.$mail->ErrorInfo.'</span>';
                            // return $mail->ErrorInfo;
                        }
                        
                    }
                // }else{
                //     return "<span style:'color:red;'>Sai ?????nh d???ng email, vui l??ng nh???p l???i!</span>";
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
                return '<span style="color: red">Ch??a ??i???n ?????y ????? th??ng tin!</span>';
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
                    return '<span style="color: red">B??nh lu???n c?? v???n ?????!</span>';
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
                // return "<span>Kh??ng c?? b??nh lu???n!</span>";
            }
        }
    }
?>