<?php
require_once 'controllers/cChamCong.php';
session_start();
if (!isset($_SESSION['dangnhap'])) {
    header("Refresh: 0; url=index.php?page=dangnhap");
} elseif (!isset($_SESSION['mavaitro']) || $_SESSION['mavaitro'] != 2) {
    header("Refresh: 0; url=index.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chấm Công Nhân Viên</title>
    <link rel="stylesheet" href="css/QLNV/style.css?v=2">
    <link rel="stylesheet" href="css/ChamCong/styles.css?v=2">
</head>
<style>
</style>
<body>
    <?php require('layout/navqlch.php'); ?>
    <div class="main">
        <div class="title">
            <h2>Chấm Công Nhân Viên</h2>
        </div>
        <div class="cc-search-bar">
            <form method="GET" action="index.php">
                <input type="hidden" name="page" value="ChamCong">
                <input class="cc-input" type="text" name="search" placeholder="Nhập nhân viên cần tìm..." value="<?php echo htmlspecialchars($searchQuery); ?>" />
                <button class="cc-submit" type="submit"><i class="fas fa-search"></i> Tìm</button>
            </form>
        </div>
        <form method="POST" onsubmit="return confirmSaveAttendance()">
            <div class="title-dsnv">
                <h3>Danh sách nhân viên</h3>
                <a href="views/ChamCong/chitietchamcong.php">Xem thông tin chấm công</a>
            </div>
            <div class="list-dsnv">
                <table class="employee-list title-list">
                    <thead>
                        <tr>
                            <th>Tên nhân viên</th>
                            <th>Chức vụ</th>
                            <th>Ngày chấm công</th>
                            <th>Ca làm</th>
                            <th>Trạng thái</th>
                            <th>Ghi chú</th>
                        </tr>
                    </thead>
                    <tbody id="employee-list">
                        <?php foreach ($employees as $employee): ?>
                        <tr>
                            <td><?php echo $employee['tennd']; ?></td>
                            <td><?php echo $employee['tenvaitro']; ?></td>
                            <td><input type="date" name="date" value="<?php echo date('Y-m-d'); ?>" readonly></td>
                            <td>
                                <select name="shift_<?php echo $employee['mand']; ?>">
                                    <?php foreach ($CaLam as $Ca): ?>
                                        <option value="<?php echo $Ca['macalam']; ?>"><?php echo $Ca['tenca']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                            <td class="check-box status-present">
                                <label><input type="radio" name="status_<?php echo $employee['mand']; ?>" value="có mặt" > Có mặt</label>
                                <label><input type="radio" name="status_<?php echo $employee['mand']; ?>" value="vắng" > Vắng mặt</label>
                            </td>
                            <td><textarea name="note_<?php echo $employee['mand']; ?>" class="notes-input" placeholder="Ghi chú..."></textarea></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div style="text-align: center; margin-top: 20px;">
                <button class="submit-ChamCong" type="submit">Lưu thông tin chấm công</button>
            </div>
        </form> 
    </div>
    <script>
        function confirmSaveAttendance() {
            return confirm('Bạn có chắc chắn muốn lưu thông tin chấm công không?');
        }
        <?php if (isset($_SESSION['error_message'])): ?>
                alert("<?php echo $_SESSION['error_message']; ?>");
                <?php unset($_SESSION['error_message']); ?>
        <?php endif; ?>
    </script>
</body>
</html>
