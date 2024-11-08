<?php
include_once("models/mketnoi.php");

class mCaLamDangKy {
    private $conn;
    public function __construct() {
        $ketnoi = new ketnoi();
        $this->conn = $ketnoi->ketnoi();
    }
    public function selectCaLam($sql) {
        $calam= array();
        $kq = $this->conn->query($sql);
        if ($kq->num_rows > 0) {
            while ($r = $kq->fetch_assoc()) {
                $calam[] = $r;
            }
            return $calam;
        } else {
            return array();
        }
    }
    
    public function insertCaLamDangKy($sql){
        return  $this->conn->query($sql);
    }
}
?>