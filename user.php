<?php
    include "connect.php";
    class User{
        public $id;
        public $image;
        public $name;
        public $age;
        public $phoneNumber;
        public $email;
        public $address;
        public $password;

        public function __construct($id,$image,$name,$age,$phoneNumber,$email,$address,$password)
        {
            $this->id = $id;
            $this->image = $image;
            $this->name = $name;
            $this->age = $age;
            $this->phoneNumber = $phoneNumber;
            $this->email = $email;
            $this->address = $address;
            $this->password = $password;
        }

        // public function getId(){
        //     return $this->id;
        // }
        
        // public function getImage(){
        //     return $this->image;
        // }
        
        // public function getName(){
        //     return $this->name;
        // }
        
        // public function getAge(){
        //     return $this->age;
        // }
        
        // public function getPhoneNumber(){
        //     return $this->phoneNumber;
        // }
        
        // public function getEmail(){
        //     return $this->email;
        // }
        
        // public function getAddress(){
        //     return $this->address;
        // }
        
        // public function getPassword(){
        //     return $this->password;
        // }
    }
    ?>