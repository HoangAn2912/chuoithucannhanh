<?php
include_once("models/mketnoi.php");

class mKhoNguyenLieu {
    private $conn;
    public function __construct() {
        $ketnoi = new ketnoi();
        $this->conn = $ketnoi->ketnoi();
    }
    public function selectNguyenLieu() {
        $sql = "SELECT * FROM khonguyenlieu as k join nguyenlieu as n on k.manl=n.manl";

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

    public function selectNguyenLieuByMaCH($mach) {
        $sql = "SELECT * FROM khonguyenlieu as k join nguyenlieu as n on k.manl=n.manl  WHERE mach = '$mach'";

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
    public function selectNguyenLieuByTT($tinhtrang) {
        $sql = "SELECT * FROM khonguyenlieu as k join nguyenlieu as n on k.manl=n.manl  WHERE TinhTrang = '$tinhtrang'";

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
    public function selectNguyenLieuByMaCH_TT($mach,  $tinhtrang) {
        $sql = "SELECT * FROM khonguyenlieu as k join nguyenlieu as n on k.manl=n.manl  WHERE mach = '$mach' and TinhTrang = '$tinhtrang'";

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