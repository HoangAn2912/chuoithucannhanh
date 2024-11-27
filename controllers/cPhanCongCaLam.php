<?php
include_once("models/mPhanCongCaLam.php");

class controlPhanCongCaLam {
    
    // Lấy lịch làm việc cho tuần theo offset và nhân viên đã đăng ký
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
