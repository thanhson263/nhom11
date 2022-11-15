<?php
    class Comment{
        public $id;
        public $blog_id;
        public $img_blog;
        public $name_blog;
        public $detail_blog;
        public $date_blog;

        function __construct($id,$blog_id,$img_blog,$name_blog,$detail_blog,$date_blog)
        {
            $this->id = $id;
            $this->blog_id = $blog_id;
            $this->img_blog = $img_blog;
            $this->name_blog = $name_blog;
            $this->detail_blog = $detail_blog;
            $this->date_blog = $date_blog;
        }
    }
?>