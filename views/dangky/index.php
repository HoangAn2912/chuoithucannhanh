<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/dangky/style.css">
</head>
<body>
<header>
        <div class="header-right">
            <a href="#"><i class="fas fa-user"></i></a>
            <a href="#">Đăng ký</a>
            <a href="index.php?page=dangnhap">Đăng nhập</a>
        </div>
    </header>
    <div class="sidebar">
        <a href="#"><i class="fas fa-cogs"></i> Cài đặt</a>
        <a href="#"><i class="fas fa-question-circle"></i> Hỗ trợ</a>
    </div>

    <div class="main-content">
        <form action="" method="POST">
            <h2>ĐĂNG KÝ TÀI KHOẢN</h2>
            <div class="form-group">
                <label for="username">Tên đăng nhập<span class="required">*</span></label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="email">Email<span class="required">*</span></label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="phone">Số điện thoại<span class="required">*</span></label>
                <input type="tel" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="password">Mật khẩu<span class="required">*</span></label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="confirm-password">Nhập lại mật khẩu<span class="required">*</span></label>
                <input type="password" id="confirm-password" name="confirm-password" required>
            </div>
            <div class="checkbox-group">
                <input type="checkbox" id="terms" name="terms" required>
                <label for="terms">Tôi đồng ý với điều khoản sử dụng</label>
            </div>
            <div class="button-group">
                <button type="submit" class="btn btn-primary">Đăng ký</button>
                <button type="reset" class="btn btn-secondary">Hủy</button>
            </div>
            <div class="login-link">
                Tôi đã có tài khoản <a href="index.php?page=dangnhap">Đăng nhập</a>
            </div>
        </form>
    </div>
</body>
</html>