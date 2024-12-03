<center>
<?php
include_once("controllers/cChamCong.php");

// Kiểm tra xem người dùng đã đăng nhập hay chưa
if (isset($_SESSION["dangnhap"])) {
    $mand = $_SESSION["dangnhap"]; // Mã nhân viên hiện tại từ session
}

// Sidebar
echo '<link rel="stylesheet" href="css/DAY/day.css">';
require("layout/navnvbh.php");

// Thêm liên kết đến thư viện SweetAlert2
echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';

$cChamCong = new cChamCong();

// Mặc định lương mỗi giờ là 25,000 VND
$hourlyRate = 25000;

// Lấy giá trị tháng và năm từ GET
$month = isset($_GET['month']) && $_GET['month'] !== '' ? (int)$_GET['month'] : null;
$year = isset($_GET['year']) && $_GET['year'] !== '' ? (int)$_GET['year'] : null;

// Gọi hàm tính lương với tham số tháng và năm
$luongNhanVien = $cChamCong->xemluong($mand, $hourlyRate, $month, $year);
?>

<div class="container">
    <h2>Thông tin lương nhân viên</h2>

    <!-- Biểu mẫu chọn tháng và năm -->
    <form method="GET" action="index.php">
        <!-- Duy trì đường dẫn trang hiện tại -->
        <input type="hidden" name="page" value="nhanvien/xemluong">
        
        <label for="month">Chọn tháng:</label>
        <select name="month" id="month">
            <option value="">-- Chọn tháng --</option>
            <?php for ($i = 1; $i <= 12; $i++): ?>
                <option value="<?= $i ?>" <?= isset($_GET['month']) && $_GET['month'] == $i ? 'selected' : '' ?>>
                    Tháng <?= $i ?>
                </option>
            <?php endfor; ?>
        </select>

        <label for="year">Chọn năm:</label>
        <select name="year" id="year">
            <option value="">-- Chọn năm --</option>
            <?php for ($i = 2020; $i <= date('Y'); $i++): ?>
                <option value="<?= $i ?>" <?= isset($_GET['year']) && $_GET['year'] == $i ? 'selected' : '' ?>>
                    Năm <?= $i ?>
                </option>
            <?php endfor; ?>
        </select>

        <button type="submit" name="loc">Lọc</button>
    </form>

    <!-- Hiển thị thông tin lương -->
    <?php if (!empty($luongNhanVien)): ?>
        <div class="salary-info">
            <h3>Lương của bạn:</h3>
            <p><strong>Tháng:</strong> <?= $month ?: 'Tất cả' ?> - <strong>Năm:</strong> <?= $year ?: 'Tất cả' ?></p>
            <p><strong>Tổng số ca làm việc:</strong> <?= $luongNhanVien['tongCa']; ?></p>
            <p><strong>Tổng số giờ làm:</strong> <?= $luongNhanVien['totalHours']; ?> giờ</p>
            <p><strong>Lương mỗi giờ:</strong> <?= number_format($luongNhanVien['hourlyRate']); ?> VND</p>
            <p><strong>Tổng lương:</strong> <?= number_format($luongNhanVien['totalSalary']); ?> VND</p>

            <h4>Chi tiết số ca làm việc:</h4>
            <ul>
                <?php foreach ($luongNhanVien['chiTietCa'] as $shiftId => $shiftCount): ?>
<li><strong>Mã ca:</strong> <?= $shiftId; ?> - <strong>Số lần làm:</strong> <?= $shiftCount; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php else: ?>
        <p>Không có thông tin lương cho nhân viên này.</p>
    <?php endif; ?>
</div>
</center>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
 /* General Styles */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f9;
    margin: 0;
    padding: 0;
    color: #333;
}

.container {
    margin: 50px auto;
    width: 80%;
    max-width: 800px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 20px;
    text-align: center;
}

.container h2 {
    font-size: 24px;
    color: #4CAF50;
    margin-bottom: 20px;
}

.salary-info {
    background-color: #f9f9f9;
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 20px;
    margin-top: 20px;
    text-align: left;
}

.salary-info h3 {
    font-size: 20px;
    color: #333;
    margin-bottom: 10px;
    text-align: center;
}

.salary-info p {
    font-size: 16px;
    margin: 8px 0;
    line-height: 1.6;
}

.salary-info ul {
    list-style: none;
    padding: 0;
    margin: 10px 0 0;
}

.salary-info ul li {
    font-size: 14px;
    margin: 5px 0;
    padding: 8px;
    background-color: #e8f5e9;
    border-radius: 6px;
}

.salary-info ul li strong {
    color: #4CAF50;
}

p {
    font-size: 16px;
    color: #666;
    margin: 10px 0;
}

.centered {
    text-align: center;
    margin: 20px 0;
}

/* Style for dropdowns and buttons */
form {
    text-align: left;
    margin-top: 20px;
}

form label {
    font-size: 16px;
    color: #333;
    margin-right: 10px;
}

form select {
    padding: 10px;
    font-size: 16px;
    margin: 5px 0;
    border-radius: 5px;
    border: 1px solid #ddd;
    background-color: #f9f9f9;
    width: 150px;
    transition: border 0.3s ease;
}

form select:focus {
    border-color: #4CAF50;
    outline: none;
}

/* Style for filter button */
form button[type="submit"] {
    padding: 12px 25px;
    font-size: 16px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    margin-left: 10px;
}

form button[type="submit"]:hover {
    background-color: #45a049;
}

form button[type="submit"]:active {
    background-color: #388e3c;
}

/* Add some spacing to the form elements */
form > * {
    margin-bottom: 15px;
}



    </style>
</head>
<body>
    
</body>
</html>