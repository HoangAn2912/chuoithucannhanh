<?php
include_once("models/mketnoi.php");

class mlichsucapnhat {
    private $conn;
    public function __construct() {
        $ketnoi = new ketnoi();
        $this->conn = $ketnoi->ketnoi();
    }

    public function updateLichSuCapNhat($sql){
        $this->conn->query($sql);
    }
}
?>