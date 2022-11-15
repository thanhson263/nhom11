<?php
    class Status{
        public $id;
        public $id_kh;
        public $ten_khach_hang;
        public $anh_khach_hang;
        public $bai_viet;
        public $anh_bai_viet;
        public $so_luot_thich;
        public $so_luot_binh_luan;

        function __construct($id,$id_kh,$ten_khach_hang,$anh_khach_hang,$bai_viet,$anh_bai_viet,$so_luot_thich,$so_luot_binh_luan)
        {
            $this->id = $id;
            $this->id_kh = $id_kh;
            $this->ten_khach_hang = $ten_khach_hang;
            $this->anh_khach_hang = $anh_khach_hang;
            $this->bai_viet = $bai_viet;
            $this->anh_bai_viet = $anh_bai_viet;
            $this->so_luot_thich = $so_luot_thich;
            $this->so_luot_binh_luan = $so_luot_binh_luan;
        }
    }
?>