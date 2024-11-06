<?php
include_once ('controllers/cNguoiDung.php');
$nguoidung = new cNguoiDung();
if(isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $taikhoan = $nguoidung->getNguoiDungByAccount($email, $password);
    if($taikhoan){
        $_SESSION["dangnhap"] = $taikhoan[0]['mand'];
<<<<<<< HEAD
        $_SESSION["mach"] = $taikhoan[0]['mach']; // Lưu mã cửa hàng vào session
=======
        $_SESSION["mach"] = $taikhoan[0]['mach'];
>>>>>>> 2ee4049b7316494a58f228f8d2521c4fff39668c
        echo '<script>alert("Đăng nhập thành công");</script>';
        header("Location:index.php?page=trangchu");
    } else {
        echo '<script>alert("Đăng nhập không thành công");</script>';
    }
}
