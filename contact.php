<?php
    include_once('../helpers/format.php');
    include_once('../lib/database.php');

    class Contact{
        private $db;
        private $fm;

        function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        function get_contact(){
            $query = "SELECT * FROM contact";
            $result = $this->db->select($query);
            return $result;
        }
    }
?>