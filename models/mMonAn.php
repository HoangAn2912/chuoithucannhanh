<?php
include_once("models/mketnoi.php");

class mMonAn {
    private $conn;
    public function __construct() {
        $ketnoi = new ketnoi();
        $this->conn = $ketnoi->ketnoi();
    }
    public function selectMonAn($sql) {
        $monan = array();
        $kq = $this->conn->query($sql);
        if ($kq->num_rows > 0) {
            while ($r = $kq->fetch_assoc()) {
                $monan[] = $r;
            }
            return $monan;
        } else {
            return array();
        }
    }
}
?>