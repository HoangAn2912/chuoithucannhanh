<?php
include_once ('controllers/cNguoiDung.php');
$nguoidung = new cNguoiDung();
if(isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $taikhoan = $nguoidung->getNguoiDungByAccount ($email, $password);
    if($taikhoan){
        $_SESSION["dangnhap"] = $taikhoan[0]['mand'];
        $_SESSION["mach"] = $taikhoan[0]['mach'];
        echo '<script>alert("Đăng nhập thành công");</script>';
        header("Location:index.php?page=trangchu");
    }
    {
        echo '<script>alert("Đăng nhập không thành công");</script>';
    }
}
?>
