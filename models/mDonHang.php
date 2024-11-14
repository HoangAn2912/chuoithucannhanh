<?php
include_once("models/mketnoi.php");

class mDonHang {
    private $conn;
    public function __construct() {
        $ketnoi = new ketnoi();
        $this->conn = $ketnoi->ketnoi();
    }
    public function selectDonHang($sql) {
        $donhang = array();
        $kq = $this->conn->query($sql);
        if ($kq->num_rows > 0) {
            while ($r = $kq->fetch_assoc()) {
                $donhang[] = $r;
            }
            return $donhang;
        } else {
            return array();
        }
    }
}
?>