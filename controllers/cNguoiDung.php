<?php
include_once("models/mNguoiDung.php");

class cNguoiDung {
    public function getNguoiDungByAccount($email, $password) {
        $sql = "SELECT * FROM nguoidung WHERE email = '$email' and matkhau='$password'";
        $nguoidung = new mNguoiDung();
        $ND = $nguoidung->selectNguoiDung($sql);
        return $ND;
    }
    public function  getNguoiDungByID($id) {
        $sql = "SELECT * FROM nguoidung WHERE mand = '$id'";
        $nguoidung = new mNguoiDung();
        $ND = $nguoidung->selectNguoiDung($sql);
        return $ND;
    }
  
}
?>