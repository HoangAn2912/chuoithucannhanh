<?php
include_once("models/mNguyenLieu.php");

class cNguyenLieu {
    public function getNguyenLieu() {
        $nguyenlieu = new mNguyenLieu();
        $DanhSachNL = $nguyenlieu->selectNguyenLieu();
        return $DanhSachNL;
    }
}
?>