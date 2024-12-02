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
        $test = "SELECT * FROM nguyenlieu WHERE tennl = '$tennl'";
        if ($nguyenlieu->selectNguyenLieu($test)) {
            echo "<script>alert('Tên nguyên liệu đã tồn tại');</script>";
        } else {
            if ($nguyenlieu->insertNguyenLieu($sql)) {
                echo "<script>alert('Thêm thành công');</script>";
                header('Location: index.php?page=qlnlchuoicuahang/capnhat');
                exit;
            } else {
                echo "<script>alert('Thêm thất bại');</script>";
            }
        }
    }

    public function updateNguyenLieu($donvitinh, $ten_ncc, $email_ncc, $sodienthoai_ncc, $dongia, $id){
        $sql = "UPDATE nguyenlieu SET donvitinh = '$donvitinh', ten_ncc = '$ten_ncc', email_ncc = '$email_ncc', sodienthoai_ncc = '$sodienthoai_ncc', dongia = '$dongia ' WHERE manl =$id";
        $nguyenlieu = new mNguyenLieu();
        if ($nguyenlieu->updateNguyenLieu($sql)) {
            echo "<script>alert('Cập nhật thành công');</script>";
            header('Location: index.php?page=qlnlchuoicuahang/capnhat');
            exit;
        } else{
            echo "<script>alert('Cập nhật thất bại');</script>";
        }
    } 
}
?>