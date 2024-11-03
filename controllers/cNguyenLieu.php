<?php
include_once("models/mNguyenLieu.php");

class cNguyenLieu {
    public function getNguyenLieu() {
        $sql = "SELECT * FROM nguyenlieu";
        $nguyenlieu = new mNguyenLieu();
        $DanhSachNL = $nguyenlieu->selectNguyenLieu($sql);
        return $DanhSachNL;
    }
}
?>