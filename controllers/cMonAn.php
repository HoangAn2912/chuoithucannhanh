<?php
include_once("models/mMonAn.php");

class cMonAn {
    public function getMonAn() {
        $sql = "SELECT * FROM monan";
        $monan = new mMonAn();
        $DanhSachMA = $monan->selectMonAn($sql);
        return $DanhSachMA;
    }
}
?>