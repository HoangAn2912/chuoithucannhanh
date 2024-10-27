<?php
    include("views/dangnhap/xuly.php");
?>
<div class="sidebar">
        <a href="#"><i class="fas fa-cogs"></i> Cài đặt</a>
        <a href="#"><i class="fas fa-question-circle"></i> Hỗ trợ</a>
    </div>

    <div style="margin-left: 210px; padding: 20px;">
        <form action="" method="POST">
            <table>
                <tr>
                    <td></td>
                    <td><b><span>ĐĂNG NHẬP</span></b></td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username" id=""></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" id=""></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Đăng nhập" id="btn-login" name="login"> 
                    <input type="reset" value="Làm lại">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>