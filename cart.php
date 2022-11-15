<?php
    include_once '../lib/database.php';
    include_once '../helpers/format.php';

    class Cart{
        private $db;
        private $fm;

        function __construct()
        {
            $this->db = new Database();            
            $this->fm = new Format();            
        }

        public function add_to_cart($id,$quantity){
            // $id = $this->fm->validation($id);
            $quantity = $this->fm->validation($quantity);

            $id = mysqli_real_escape_string($this->db->link,$id);
            $quantity = mysqli_real_escape_string($this->db->link,$quantity);
            
            $query = "SELECT * FROM product WHERE product_id = $id";
            $result = $this->db->select($query)->fetch_assoc();
            // print_r($result);
            $count = $this->db->select($query)->num_rows;
            if($count == 1){
                // $id_random = rand(0,99);
                $id_pr = $result['product_id'];
                $image_pr = $result['image_pr'];
                $name_pr = $result['name_pr'];
                $price = $result['price'];
                $check_cart = "SELECT * FROM product p, cart c WHERE p.name_pr = c.name_cart AND p.name_pr = '$name_pr'";
                $result_check_cart = $this->db->select($check_cart);
                if($result_check_cart->num_rows > 0){
                    $row_check_cart = $result_check_cart->fetch_assoc();
                    $new_quantity = $quantity + $row_check_cart['quantity_cart'];
                    if($new_quantity <= $row_check_cart['quantity']){
                        $query_update = "UPDATE cart SET quantity_cart = $new_quantity WHERE name_cart = '$name_pr'";
                        // echo $query;
                        $result_update = $this->db->update($query_update);
                        if($result_update){
                            echo "<script>window.location='cart_page.php'</script>";
                        }else{
                            echo '<script>alert("Thêm không thành công")</script>';
                        }
                    }
                }else{
                    $query_insert = "INSERT INTO cart VALUES (null,$id_pr,'$image_pr','$name_pr','$quantity','$price')";
                    $result_insert = $this->db->insert($query_insert);
                    if($result_insert){
                        echo "<script>window.location='cart_page.php'</script>";
                    }else{
                        echo '<script>alert("Thêm không thành công")</script>';
                    }
                }
            }else{
                echo "0";
            }
        }

        public function get_cart(){
            $query = 'SELECT * FROM cart c, product p WHERE c.product_id = p.product_id';
            $result = $this->db->select($query);
            return $result;
        }
        public function get_person_payment(){
            $query = "SELECT * FROM payment";
            $result = $this->db->select($query);
            return $result;
        }
        public function get_detail_cart_by_id($id_cart){
            $query = "SELECT * FROM detail_cart WHERE id_cart = $id_cart";
            $result = $this->db->select($query);
            return $result;
        }
        public function plus_cart($ten_sp,$quantity){
            $new_quantity = $quantity + 1;
            $query = "SELECT * FROM product p, cart dc WHERE p.name_pr = dc.name_cart AND p.name_pr = '$ten_sp'";
            // echo $query;
            $result = $this->db->select($query);
            if($result){
                $count = $result->num_rows;
                // echo $count;
                if($count == 1){
                    $row = $result->fetch_assoc();
                    if($new_quantity <= $row['quantity']){
                        $query_update = "UPDATE cart SET quantity_cart = $new_quantity WHERE name_cart = '$ten_sp'";
                        // echo $query_update;
                        $result_update = $this->db->update($query_update);
                        return $result_update;
                    }
                }
            }
            
            
        }
        public function minus_cart($ten_sp,$quantity){
            $new_quantity = $quantity - 1;
            if($new_quantity > 0){
                $query = "UPDATE cart SET quantity_cart = $new_quantity WHERE name_cart = '$ten_sp'";
                // echo $query;
                $result = $this->db->update($query);
                return $result;
            }
            
        }
        public function delete_cart($id){
            $query = "DELETE FROM cart WHERE cart_id = '$id'";
            $result = $this->db->delete($query);
            return $result;
        }
        public function delete_all_cart(){
            $query = "DELETE FROM cart";
            $result = $this->db->delete($query);
            return $result;
        }
        public function payment($ten_khach_hang,$email,$sdt,$dia_chi,$phuong_thuc_thanh_toan){
            // echo $ten_khach_hang.'-'.$email.'-'.$sdt.'-'.$dia_chi.'-'.$phuong_thuc_thanh_toan;
            if(!$ten_khach_hang == "" && !$email == "" && !$sdt == "" && !$dia_chi == "" && $phuong_thuc_thanh_toan != ""){
                if(preg_match("/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/",$email)){
                    $cart_id = rand(0,99);
                    if($phuong_thuc_thanh_toan == 'vnpay'){
                        $ten_phuong_thuc = "Thanh toán bằng VNPAY";
                    }else if($phuong_thuc_thanh_toan == 'momo'){
                        $ten_phuong_thuc = "Thanh toán bằng MoMo";
                    }
                    $query_payment = "INSERT INTO payment VALUES (null,$cart_id,'$ten_khach_hang','$sdt','$email','$dia_chi','$ten_phuong_thuc')";
                    $result_payment = $this->db->insert($query_payment);
                    if($result_payment){
                        $query = "SELECT * FROM cart";
                        $result = $this->db->select($query);
                        if($result -> num_rows > 0){
                            $tong_tien = 0;
                            $tong_tien_truoc_thue = 0;
                            while($row = $result->fetch_assoc()){
                                // $cart_id = $row['cart_id'];
                                $name_cart = $row['name_cart'];
                                $image = $row['image'];
                                $quantity_cart = $row['quantity_cart'];
                                $price_cart = $row['price_cart'];
                                $tong_tien_truoc_thue = $quantity_cart * $price_cart;
                                $tong_tien += ($tong_tien_truoc_thue) + ($tong_tien_truoc_thue * 0.05);
                                $query_detail_cart = "INSERT INTO detail_cart VALUES(null,$cart_id,'$image','$name_cart',$quantity_cart,$tong_tien_truoc_thue)";
                                // echo $query_detail_cart;
                                $result_detail_cart = $this->db->insert($query_detail_cart);
                            }
                            if($result_detail_cart){
                                $delete_cart = "DELETE FROM cart";
                                $result_delete_cart = $this->db->delete($delete_cart);
                                if($result_delete_cart){
                                    // return '<script>alert("Thanh toán thành công!")</script>';
                                    if($phuong_thuc_thanh_toan == 'vnpay'){
                                        return "<script>window.location.href='vnpay.php?redirect=redirect&tongtien=$tong_tien'</script>";
                                    }else if($phuong_thuc_thanh_toan == 'momo'){
                                        return "<script>window.location.href='momo.php?tongtien=$tong_tien'</script>";
                                    }
                                }else{
                                    // return '<script>alert("Thanh toán không thành công!")</script>';
                                    // return '<script>window.location.href="cart_page.php"</script>';
                                }
                            }
                        }else{
                            return '<span style="color:red; text-align:center; padding-top:10px; ">Chưa có sản phẩm mua!</span>';
                        }
                    }
                }else{
                    return '<span style="color:red; text-align:center; padding-top:10px; ">Sai định dạng email!</span>';
                }
            }else{
                return '<span style="color:red; text-align:center; padding-top:10px;">Chưa điền đầy đủ thông tin</span>';
            }
        }
    }
?>