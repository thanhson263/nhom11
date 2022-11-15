<?php
include "../config/config.php";
Class Database{
    public $host = DB_HOST;
    public $user = DB_USER;
    public $pass = DB_PASSWORD;
    public $dbname = DB_NAME;

    public $link;
    public $error;

    public function __construct(){
        $this->connectDB();
    }

    private function connectDB(){
        $this->link = new mysqli($this->host, $this->user, $this->pass,
        $this->dbname);
        if(!$this->link){
        $this->error ="Connection fail".$this->link->connect_error;
        return false;
        }
    }
    public function select($query){
        $result = $this->link->query($query) or die("Select Fail!");
        if($result){
            return $result;
        }else{
            return false;
        }
    }
    public function insert($query){
        $result_insert = $this -> link -> query($query) or die ("Insert Fail!");
        if($result_insert){
            return $result_insert;
        }else{
            return false;
        }
    }
    public function update($query){
        $result_ = $this -> link -> query($query) or die ("Update Fail!");
        if($result_){
            return $result_;
        }else{
            return false;
        }
    }
    public function delete($query){
        $result_delete = $this -> link -> query($query) or die ("Delete Fail!");
        if($result_delete){
            return $result_delete;
        }else{
            return false;
        }
    }
}
?>