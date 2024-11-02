<?php
include_once("models/mketnoi.php");

class mNguyenLieu {
    private $conn;
    public function __construct() {
        $ketnoi = new ketnoi();
        $this->conn = $ketnoi->ketnoi();
    }
    public function selectNguyenLieu() {
        $sql = "SELECT * FROM nguyenlieu";
        $nguyenlieu = array();
        $kq = $this->conn->query($sql);
        if ($kq->num_rows > 0) {
            while ($r = $kq->fetch_assoc()) {
                $nguyenlieu[] = $r;
            }
            return $nguyenlieu;
        } else {
            return array();
        }
    }
}
?>