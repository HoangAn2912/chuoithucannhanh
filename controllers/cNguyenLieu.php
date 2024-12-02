<?php
include_once("models/mNguyenLieu.php");

class cNguyenLieu {
    public function getNguyenLieu() {
        $sql = "SELECT * FROM nguyenlieu ORDER BY manl DESC";
        $nguyenlieu = new mNguyenLieu();
        $DanhSachNL = $nguyenlieu->selectNguyenLieu($sql);
        return $DanhSachNL;
    }

    public function getNguyenLieuByID($id){
        $sql = "SELECT * FROM nguyenlieu WHERE manl = '$id'";
        $nguyenlieu = new mNguyenLieu();
        $nl = $nguyenlieu->selectNguyenLieu($sql);
        return $nl;
    }
    public function addNguyenLieu($tennl, $donvitinh, $ten_ncc, $email_ncc, $sodienthoai_ncc, $hinhanh) {
        $sql = "INSERT INTO nguyenlieu(tennl, donvitinh, ten_ncc, email_ncc, sodienthoai_ncc, hinh) 
                VALUES ('$tennl','$donvitinh','$ten_ncc','$email_ncc','$sodienthoai_ncc', '$hinhanh')";
        $nguyenlieu = new mNguyenLieu();
        $mess='';
        $test = "SELECT * FROM nguyenlieu WHERE tennl = '$tennl'";
        if ($nguyenlieu->selectNguyenLieu($test)) {
            echo "<script>alert('Tên nguyên liệu đã tồn tại');</script>";
        } else if (!preg_match("/^[\p{L}\s]+$/u", $tennl)) {
            echo "<script>alert('Tên nguyên liệu chỉ được chứa chữ cái');</script>";
        } 
        else if (!preg_match("/^[\p{L}\s]+$/u", $ten_ncc)) {
            echo "<script>alert('Tên nhà cung cấp chỉ được chứa chữ cái');</script>";
        } 
        else if (!preg_match("/^0[0-9]{9,11}$/", $sodienthoai_ncc)) {
            echo "<script>alert('Số điện thoại không hợp lệ');</script>";
        }else {
            if ($nguyenlieu->insertNguyenLieu($sql)) {
                echo "<script>alert('Thêm thành công');</script>";
                header('Location: index.php?page=qlnlchuoicuahang/capnhat');
                exit;
            } else {
                echo "<script>alert('Thêm thất bại');</script>";
            }
        }
    }

    
}
?>