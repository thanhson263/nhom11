<?php
    class Category{
        public $id;
        public $image;
        public $name;

        public function __construct($id,$image,$name)
        {
            $this->id = $id;
            $this->image = $image;
            $this->name = $name;
        }
    }
    
?>