<?php
    include_once '../lib/database.php';
    include_once '../helpers/format.php';

    class Search{
        private $db;
        private $fm;
        function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function search_product($search){
            $query = "SELECT * FROM product,category WHERE product.cate_id = category.cate_id AND name_pr LIKE '%$search%'";
            $result = $this->db->select($query);
            return $result;
        }

        public function search_category($cate){
            $query = "SELECT * FROM category WHERE name LIKE '%$cate%'";
            $result = $this->db->select($query);
            return $result;
        }
    }
?>