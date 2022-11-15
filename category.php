<?php
    class Category{
        public $id_cate;
        public $name;
        public $image;

        public function __construct($id_cate,$name,$image)
        {
            $this->id_cate = $id_cate;
            $this->name = $name;
            $this->image = $image;
        }
    }
    
?>