<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách khách hàng</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">  
    <link rel="stylesheet" href="css/qlkh/style.css">  
</head>
<body>
    <?php
    if($_SESSION["dangnhap"] == 'nvbh'){
        require("layout/navnvbh.php");
    }elseif($_SESSION["dangnhap"] == 'qlch1'){
        require("layout/navqlch.php");
    }

?>
<div class="main">
    <h1>Danh sách khách hàng</h1>
    <table id="customerTable">
        <thead>
            <tr>
                <th>STT</th>
                <th>Họ và tên</th>
                <th>Địa chỉ</th>
                <th>Email</th>
                <th>Mật khẩu</th>
                <th>Số điện thoại</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <!-- Table rows will be dynamically added here -->
        </tbody>
    </table>

    <div id="editForm" class="edit-form" style="display: none;">
        <h2>Chỉnh sửa thông tin</h2>
        <form id="customerForm">
            <input type="hidden" id="editId">
            <label for="editName">Họ và tên:</label>
            <input type="text" id="editName" required>
            <label for="editAddress">Địa chỉ:</label>
            <input type="text" id="editAddress" required>
            <label for="editEmail">Email:</label>
            <input type="email" id="editEmail" required>
            <label for="editPassword">Mật khẩu:</label>
            <input type="password" id="editPassword" required>
            <label for="editPhone">Số điện thoại:</label>
            <input type="tel" id="editPhone" required>
            <button type="submit">Lưu</button>
            <button type="button" class="cancel" onclick="cancelEdit()">Hủy</button>
        </form>
        <div id="successMessage" class="success-message" style="display: none;">Lưu thành công!</div>
    </div>
    </div>
    <script src="js/qlkh/qlkh.js"></script>
</body>
</html>