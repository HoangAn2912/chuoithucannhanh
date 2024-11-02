<?php
include_once("models/mCuaHang.php");

class cCuaHang {
    public function getCuaHang() {
        $cuahang = new mCuaHang();
        $DSCuaHang = $cuahang->selectCuaHang();
        return $DSCuaHang;
    }
}
?>