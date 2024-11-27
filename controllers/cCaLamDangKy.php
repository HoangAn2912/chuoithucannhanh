<?php
include_once("models/mCaLamDangKy.php");

class cCaLamDangKy{
    
    public function addCaLamDangKy($maca, $ngaylam, $manv) {
        $sql = "INSERT INTO lichlamviec (mand, ngaylamviec, macalam) VALUES  ('$manv','$ngaylam','$maca')";
        $calam = new mCaLamDangKy();
        $calam->insertCaLamDangKy($sql);
    }

    public function getCaLamDangKyByCuaHang($mach, $mavaitro) {
        $sql = "SELECT * FROM lichlamviec as d join nguoidung as n on d.mand = n.mand join cuahang as c on c.mach = n.mach WHERE c.mach = $mach and n.mavaitro = $mavaitro";
        $calam = new mCaLamDangKy();
        $danhsachcalam=$calam->selectCaLam($sql);
        return $danhsachcalam;
    }
    
    public function getCaLamDangKyByMand($mand) {
        $sql = "SELECT * FROM lichlamviec as d join calam  as c on d.macalam = c.macalam where mand ='$mand'";
        $calam = new mCaLamDangKy();
        $danhsachcalam=$calam->selectCaLam($sql);
        return $danhsachcalam;
    }
}

?>