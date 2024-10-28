<?php
if(isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    if ($username === "chuoi" && $password === "1234") {
        $_SESSION["dangnhap"] = 'chuoi';
        header("Location:index.php?page=trangchu");
        exit();
    
    }elseif($username === "qlch1" && $password === "1234") {
        $_SESSION["dangnhap"] = 'qlch1';
        header("Location:index.php?page=trangchu");
        exit();
<<<<<<< HEAD
    }
    /*Nhan vien bep */
    elseif($username === "nvb" && $password === "1234") {
        $_SESSION["dangnhap"] = 'nvb';
        header("Location:index.php?page=trangchu");
        exit();
    } 
    
    else {
=======
    }elseif($username === "nvbh" && $password === "1234") {
        $_SESSION["dangnhap"] = 'nvbh';
        header("Location:index.php?page=trangchu");
        exit();
    }elseif($username === "nvb" && $password === "1234") {
        $_SESSION["dangnhap"] = 'nvb';
        header("Location:index.php?page=trangchu");
        exit();
    }else {
>>>>>>> 036fa4d89911145c14c3c42ffbf1624ee55b7845
        echo '<script>alert("Đăng nhập không thành công");</script>';
    }
}
?>
