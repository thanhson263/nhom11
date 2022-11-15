<?php
    class Contact{
        public $id;
        public $name;
        public $email;
        public $phone;
        
        function __construct($id,$name,$email,$phone)
        {
            $this->id = $id;            
            $this->name = $name;            
            $this->email = $email;            
            $this->phone = $phone;            
        }
    }
?>