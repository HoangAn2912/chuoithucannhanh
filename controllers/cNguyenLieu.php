<?php
include_once("models/mNguyenLieu.php");

class cNguyenLieu {
    public function getNguyenLieu() {
        $sql = "SELECT * FROM nguyenlieu";
        $nguyenlieu = new mNguyenLieu();
        $DanhSachNL = $nguyenlieu->selectNguyenLieu($sql);
        return $DanhSachNL;
    }

    public function addNguyenLieu($tennl, $donvitinh, $ten_ncc, $email_ncc, $sodienthoai_ncc) {
        $sql = "INSERT INTO nguyenlieu(tennl, donvitinh, ten_ncc, email_ncc, sodienthoai_ncc) 
                VALUES ('$tennl','$donvitinh','$ten_ncc','$email_ncc','$sodienthoai_ncc')";
        $nguyenlieu = new mNguyenLieu();

        $test = "SELECT * FROM nguyenlieu WHERE tennl = '$tennl'";
        if ($nguyenlieu->selectNguyenLieu($test)) {
            echo "<script>alert('Tên nguyên liệu đã tồn tại');</script>";
        } else if (!preg_match("/^[a-zA-Z\s]+$/", $tennl)) {
            echo "<script>alert('Tên nguyên liệu chỉ được chứa chữ cái');</script>";
        } 
        else if (!preg_match("/^[a-zA-Z\s]+$/", $ten_ncc)) {
            echo "<script>alert('Tên nhà cung cấp chỉ được chứa chữ cái');</script>";
        } 
        else if (!preg_match("/^0[0-9]{9,11}$/", $sodienthoai_ncc)) {
            echo "<script>alert('Số điện thoại không hợp lệ');</script>";
        }else {
            if ($nguyenlieu->insertNguyenLieu($sql)) {
                echo "<script>alert('Đã thêm nguyên liệu vào danh sách');</script>";
            } else {
                echo "<script>alert('Lỗi khi thêm nguyên liệu');</script>";
            }
        }
    }

    
}
?>