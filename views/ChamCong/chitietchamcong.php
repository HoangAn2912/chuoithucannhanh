<?php
error_reporting(error_level: 0);
require_once '../../controllers/cChamCong.php';
$cChamCong = new cChamCong();
$shifts = $cChamCong->getShifts();
$attendanceDetails = [];

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['shift']) && isset($_GET['date'])) {
    $shiftId = $_GET['shift'];
    $date = $_GET['date'];
    $attendanceDetails = $cChamCong->xemChamCong($shiftId, $date);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Chấm Công</title>
    <link rel="stylesheet" href="../../css/ChamCong/chitiet.css?v=1">
</head>
<style>
</style>
<body>
    <div class="main">
        <div class="title">
            <h2>Chi Tiết Chấm Công</h2>
        </div>
        <div class="filter-bar">
            <form method="GET" action="chitietchamcong.php">
                <div class="select-calam">
                    <label for="shift">Chọn ca làm:</label>
                    <select name="shift" id="shift">
                        <?php foreach ($shifts as $shift): ?>
                            <option value="<?php echo $shift['macalam']; ?>"><?php echo $shift['tenca']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="chon-ngay">
                    <label for="date">Chọn ngày chấm công:</label>
                    <input type="date" name="date" id="date" required>
                </div>
                <button type="submit">Lọc</button>
            </form>
        </div>
        <div class="attendance-details list-dsnv">
            <table class="employee-list">
                <thead>
                    <tr>
                        <th>Tên nhân viên</th>
                        <th>Chức vụ</th>
                        <th>Ca làm</th>
                        <th>Trạng thái</th>
                        <th>Ghi chú</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($attendanceDetails)): ?>
                        <?php foreach ($attendanceDetails as $detail): ?>
                            <tr>
                                <td><?php echo $detail['tennd']; ?></td>
                                <td><?php echo $detail['tenvaitro']; ?></td>
                                <td><?php echo $detail['tenca']; ?></td>
                                <td><?php echo $detail['trangthai']; ?></td>
                                <td><?php echo $detail['ghichu']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5">Không có dữ liệu chấm công.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <div class="back-button-view">  
            <button onclick="window.location.href='../../index.php?page=ChamCong'">Quay lại</button>  
        </div> 
    </div>
</body>
</html>
