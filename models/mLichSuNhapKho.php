<?php
include_once("models/mketnoi.php");

class mLichSuNhapKho {
    private $conn;
    public function __construct() {
        $ketnoi = new ketnoi();
        $this->conn = $ketnoi->ketnoi();
    }

    public function updateLichSuNhapKho($sql){
        $this->conn->query($sql);
    }
}
?>