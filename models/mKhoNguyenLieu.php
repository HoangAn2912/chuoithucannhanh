<?php
include_once("models/mketnoi.php");

class mKhoNguyenLieu {
    private $conn;
    public function __construct() {
        $ketnoi = new ketnoi();
        $this->conn = $ketnoi->ketnoi();
    }
    public function selectNguyenLieu($sql) {
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

    public function updateNguyenLieu($sql){
        $this->conn->query($sql);
    }
}
?>