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

    public function cGetNameStoreByID($storeIDs) {
        // Kết nối cơ sở dữ liệu
        $p = new ketnoi();
        $conn = $p->ketnoi();

        // Chuyển mảng ID cửa hàng thành chuỗi để sử dụng trong câu truy vấn SQL
        $storeIDsStr = implode(',', $storeIDs);

        // Câu truy vấn SQL để lấy tên cửa hàng theo ID
        $sql = "SELECT mach, tench FROM cuahang WHERE mach IN ($storeIDsStr)";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }
}
?>