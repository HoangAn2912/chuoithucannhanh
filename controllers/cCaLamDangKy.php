<?php
include_once("models/mCaLamDangKy.php");

class cCaLamDangKy{
    
    public function addCaLamDangKy($maca, $ngaylam, $manv, $matrangthai) {
        $sql = "INSERT INTO dangkycalam (mand, ngaydanky, macalam, mattdk) VALUES  ('$manv','$ngaylam','$maca','$matrangthai')";
        $calam = new mCaLamDangKy();
        $calam->insertCaLamDangKy($sql);
    }
    public function getCaLamDangKyByCuaHang($mach) {
        $sql = "SELECT * FROM dangkycalam as d join nguoidung as n on d.mand = n.mand join cuahang as c on c.mach = n.mach WHERE c.mach = $mach";
        $calam = new mCaLamDangKy();
        $danhsachcalam=$calam->selectCaLam($sql);
        return $danhsachcalam;
    }

    public function getCaLamDangKyByMand($mand) {
        $sql = "SELECT * FROM dangkycalam as d join calam  as c on d.macalam = c.macalam where mand ='$mand'";
        $calam = new mCaLamDangKy();
        $danhsachcalam=$calam->selectCaLam($sql);
        return $danhsachcalam;
    }
}

?>