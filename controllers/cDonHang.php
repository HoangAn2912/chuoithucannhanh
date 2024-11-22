<?php
include_once("models/mDonHang.php");

class cMonAn {
    public function getDonHang() {
        $sql = "SELECT * FROM donhang";
        $monan = new mDonHang();

        $DanhSachMA = $monan->selectDonHang($sql);
        return $DanhSachMA;
    }
    
    public function getDonHangByMaCH($mach) {
        $sql = "SELECT * FROM donhang WHERE mach = '$mach'";
        $monan = new mDonHang();
        $DanhSachMA = $monan->selectDonHang($sql);
        return $DanhSachMA;
    } 
}


?>