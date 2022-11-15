<?php
    class Product{
        public $id_pr;
        public $id_cate;
        public $name;
        public $quantity;
        public $price;
        public $image;
        public $link_ytb;
        public $desc;

        public function __construct($id_pr,$id_cate,$name,$quantity,$price,$image,$link_ytb,$desc)
        {
            $this->id_pr = $id_pr;
            $this->id_cate = $id_cate;
            $this->name = $name;
            $this->quantity = $quantity;
            $this->price = $price;
            $this->image = $image;
            $this->link_ytb = $link_ytb;
            $this->desc = $desc;
        }
        
    }
?>