
<?php
    include("views/dangnhap/xuly.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/dangnhap/style.css">
</head>
<body>
    

    
<!-- <header>
        <div class="header-right">
            <a href="#"><i class="fas fa-user"></i></a>
            <a href="#">Đăng ký</a>
            <a href="#">Đăng nhập</a>
        </div>
    </header> -->
    <div class="sidebar">
        <a href="#"><i class="fas fa-cogs"></i> Cài đặt</a>
        <a href="#"><i class="fas fa-question-circle"></i> Hỗ trợ</a>
    </div>

    <div class="main-content">
        <form action="" method="POST">
            <table>
                <tr>
                    <td colspan="2"><span>ĐĂNG NHẬP</span></td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username" required></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" required></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" value="Đăng nhập" id="btn-login" name="login">
                        <input type="reset" value="Làm lại">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>