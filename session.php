<?php
    class Session{
        public static function init(){
            if (version_compare(phpversion(), '5.7.0', '>')) { //so sánh 2 phiên bản php
                if (session_id() == '') {
                    session_start();
                }
            } else {
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }
            }
        }
        
        public static function set($key, $val){
            $_SESSION[$key] = $val;
        }
        
        public static function get($key){
            if (isset($_SESSION[$key])) {
                return $_SESSION[$key];
            }else{
                return false;
            }
        }
        public static function checkSession(){
            self::init();
            if (self::get('login')== false) {
                self::destroy();
                echo "<script>window.location.href='login.php'</script>";
            }
        }
            
        public static function checkLogin(){
            self::init();
            if (self::get('login') == true) {
                header('Location:index.php');
            }
        }
            
        public static function destroy(){
            session_destroy();
            echo "<script>window.location.href='login.php'</script>";
        }
    }
    //Sự khác nhau của this và self (cùng là tham chiếu nhưng cách thức tham chiếu khác nhau)
    // $this: sẽ tham chiếu đến đối tượng hiện tại
    // self: sẽ tham chiếu đến class được khai báo
?>