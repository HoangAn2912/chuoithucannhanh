<?php
include_once("models/mketnoi.php");
    class mCuaHang{
        private $conn;
        public function __construct() {
            $ketnoi = new ketnoi();
            $this->conn = $ketnoi->ketnoi();
        }
        public function selectCuaHang() {
            $sql = "SELECT * FROM cuahang";
            $cuahang = array();
            $kq = $this->conn->query($sql);
            if ($kq->num_rows > 0) {
                while ($r = $kq->fetch_assoc()) {
                    $cuahang[] = $r;
                }
                return $cuahang;
            } else {
                return array();
            }
        }
    }
?>