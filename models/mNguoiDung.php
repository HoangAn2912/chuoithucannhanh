<?php
include_once("models/mketnoi.php");

class mNguoiDung {
    private $conn;
    public function __construct() {
        $ketnoi = new ketnoi();
        $this->conn = $ketnoi->ketnoi();
    }
    public function selectNguoiDung($sql) {
        $nguoidung = array();
        $kq = $this->conn->query($sql);
        if ($kq->num_rows > 0) {
            while ($r = $kq->fetch_assoc()) {
                $nguoidung[] = $r;
            }
            return $nguoidung;
        } else {
            return array();
        }
    }

}
?>