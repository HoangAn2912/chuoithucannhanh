<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Management Interface</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="layout/style.css">
</head>
<body>

   <!-- Header -->
    <div class="header">
        <div class="logo" style="margin-right: 10px"> 
    <?php
        if($_SESSION["dangnhap"] == 'nvb'){
            echo "Nhân Viên Bếp";
        }else if($_SESSION["dangnhap"] == 'nvbh'){
            echo "Nhân Viên Bán Hàng";
        }elseif($_SESSION["dangnhap"] == 'chuoi'){
            echo "Quản Lý Chuỗi";
        }elseif($_SESSION["dangnhap"] == 'qlch1'){
            echo "Quản Lý Cửa Hàng 1";
        }
        else{
            echo "";
        }
    ?>        
    </div>
        <div class="user-icon" style="margin-right: 20px"> <i class="fas fa-user-circle"></i> </div>
        <?php
            if ($_SESSION["dangnhap"]) {
                echo '<a href="index.php?page=dangxuat" style="color: white; text-decoration: none; margin-right: 5px"> <i class="fas fa-sign-out-alt"></i> Đăng xuất</a>';
            } else {
                echo '<a href="" style="color: white; text-decoration: none; margin-right: 5px"> <i class="fas fa-user-plus"></i> Đăng ký</a>/';
                echo '<a href="index.php?page=dangnhap" style="color: white; text-decoration: none; margin-right: 5px"> <i class="fas fa-sign-in-alt"></i> Đăng nhập</a>';
            }
        ?>
    </div>
