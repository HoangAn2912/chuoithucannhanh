<?php
include_once("models/mLichLamViec.php");

class controlLichLamViec {
    public function xemLichLamViec($mand, $weekOffset = 0) {
        $calam = new modelLichLamViec();
        $lichLamViec = $calam->getLichLamViec($mand, $weekOffset);  // Lấy lịch làm việc cho tuần theo offset
        return $lichLamViec;
    }

    public function getNguoidung($mand) {
        $p = new modelLichLamViec();
        return $p->selectNguoiDung($mand); // Trả về trực tiếp giá trị mã vai trò
    }
    

}
?>
