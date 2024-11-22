<?php
include_once("models/mLichLamViec.php");

class controlLichLamViec {
    public function xemLichLamViec($mand, $weekOffset = 0) {
        $calam = new modelLichLamViec();
        $lichLamViec = $calam->getLichLamViec($mand, $weekOffset);  // Lấy lịch làm việc cho tuần theo offset
        return $lichLamViec;
    }

}
?>
