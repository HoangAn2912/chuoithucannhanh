<?php
include_once("models/mLichSuCapNhat.php");

class clichsucapnhat {
   
    public function updateLichSuCapNhat($manl, $ten_ncc, $sodienthoai_ncc, $email_ncc, $dongia, $donvitinh){
        $sql = "UPDATE lichsucapnhatnguyenlieu SET ten_ncc= '$ten_ncc', sodienthoai_ncc = '$sodienthoai_ncc', email_ncc = '$email_ncc', dongia = '$dongia', thoigiancapnhat= NOW(), donvitinh = '$donvitinh' WHERE manl = '$manl'";
        $nguyenlieu = new mlichsucapnhat();
        if ($nguyenlieu->updateLichSuCapNhat($sql)) {
            echo "<script>alert('Cập nhật thành công');</script>";
            header('Location: index.php?page=qlnlchuoicuahang/capnhat');
            exit;
        } else{
            echo "<script>alert('Cập nhật thất bại');</script>";
        }
    } 
}
?>