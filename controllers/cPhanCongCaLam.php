<?php
include_once("models/mPhanCongCaLam.php");

class controlPhanCongCaLam {
    
    public function xemLichLamViec($weekOffset = 1) {
        $calam = new modelPhanCongCaLam();
        $lichLamViec = $calam->getLichLamViec($weekOffset); 
        return $lichLamViec;
    }

    public function getNguoiDung($ngaydangky, $macalam) {
        $calam = new modelPhanCongCaLam();
        $registeredEmployees = $calam->selectNguoiDung($ngaydangky, $macalam);
        echo $registeredEmployees;
        return $registeredEmployees;
    }
}
?>
