<?php
include_once("models/mCuaHang.php");

class cCuaHang {
    public function getCuaHang() {
        $sql = "SELECT * FROM cuahang";
        $cuahang = new mCuaHang();
        $DSCuaHang = $cuahang->selectCuaHang($sql);
        return $DSCuaHang;
    }

    public function getCuaHangByMaCH($mach) {
        $sql = "SELECT * FROM cuahang where  mach = '$mach'";
        $cuahang = new mCuaHang();
        $DSCuaHang = $cuahang->selectCuaHang($sql);
        return $DSCuaHang;
    }
}
?>