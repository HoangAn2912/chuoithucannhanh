<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ca làm việc</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">  
    <link rel="stylesheet" href="css/phancongcalam/style.css">   
</head>
<body>
<?php
    require("layout/navqlch.php");
?>
<div class="main">  
    <h2>Ca làm việc</h2>  
    <?php
    // Fetch employee names from the database
    $employees = [
        'NV1' => 'Nhân Viên 1',
        'NV2' => 'Nhân Viên 2',
        'NV3' => 'Nhân Viên 3'
    ];
    ?>

    <table class="schedule-table">
        <thead>
            <tr>
                <th>Thứ / Ca</th>
                <th>Thứ 2</th>
                <th>Thứ 3</th>
                <th>Thứ 4</th>
                <th>Thứ 5</th>
                <th>Thứ 6</th>
                <th>Thứ 7</th>
                <th>Chủ Nhật</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>Sáng</th>
                <td>NV1</td>
                <td>NV1</td>
                <td>NV1</td>
                <td class="selectable"></td>
                <td>NV1</td>
                <td>NV1</td>
                <td>NV1</td>
            </tr>
            <tr>
                <th>Trưa</th>
                <td class="selectable"></td>
                <td>NV2</td>
                <td>NV2</td>
                <td>NV2</td>
                <td class="selectable"></td>
                <td>NV2</td>
                <td>NV2</td>
            </tr>
            <tr>
                <th>Chiều</th>
                <td>NV3</td>
                <td class="selectable"></td>
                <td>NV3</td>
                <td>NV3</td>
                <td class="selectable"></td>
                <td class="selectable"></td>
                <td>NV3</td>
            </tr>
            <tr>
                <th>Tối</th>
                <td class="selectable"></td>
                <td>NV3</td>
                <td class="selectable"></td>
                <td>NV3</td>
                <td>NV3</td>
                <td>NV3</td>
                <td class="selectable"></td>
            </tr>
        </tbody>
    </table>

    <div class="button-container">
        <button class="btn cancel">Hủy</button>
        <button class="btn save">Lưu</button>
    </div>

    
<!-- Employee selection modal -->
<div id="employeeModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Chọn Nhân Viên</h2>
        <select id="employeeSelect">
            <?php foreach ($employees as $id => $name): ?>
                <option value="<?= $id ?>"><?= $name ?></option>
            <?php endforeach; ?>
        </select>
        <button id="selectEmployeeBtn" class="btn save">Chọn</button>
    </div>
</div>
</div>

<script src="js/phancongcalam/phancongcalam.js"></script>
</body>
</html>