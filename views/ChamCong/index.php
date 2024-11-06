
<?php
require_once 'controllers/cChamCong.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý nhân viên</title>
    <link rel="stylesheet" href="css/ChamCong/style.css?v=1">
    <link rel="stylesheet" href="css/QLNV/style.css?v=2">
    <link rel="stylesheet" href="css/ChamCong/styles.css?v=1">
</head>
<body>
    <?php require('layout/navqlch.php'); ?>
    <div class="main">
        <div class="title">
            <h2>Chấm Công Nhân Viên</h2>
        </div>
        <div class="cc-search-bar">
            <form method="POST">
                <input class="cc-input" type="text" name="search" placeholder="Nhập nhân viên cần tìm..." />
                <button class="cc-submit" type="submit"><i class="fas fa-search"></i> Tìm</button>
            </form>
        </div>
        <form method="POST">
            <div class="title-dsnv">
                <h3>Danh sách nhân viên</h3>
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
                                <select name="shift_<?php echo $employee['manvbh'] ?? $employee['manvb']; ?>">
                                    <?php foreach ($shifts as $shift): ?>
                                        <option value="<?php echo $shift['macalam']; ?>"><?php echo $shift['tenca']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                            <td class="check-box status-present">
                                <label><input type="radio" name="status_<?php echo $employee['manvbh'] ?? $employee['manvb']; ?>" value="có mặt" required> Có mặt</label>
                                <label><input type="radio" name="status_<?php echo $employee['manvbh'] ?? $employee['manvb']; ?>" value="vắng" required> Vắng mặt</label>
                            </td>
                            <td><textarea name="note_<?php echo $employee['manvbh'] ?? $employee['manvb']; ?>" class="notes-input" placeholder="Ghi chú..."></textarea></td>
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
</body>
</html>
