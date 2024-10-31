<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Quản lý nhân viên</title>
    <link rel="stylesheet" href="css/ChamCong/style.css">    
    <link rel="stylesheet" href="css/QLNV/styles.css">
    <link rel="stylesheet" href="css/ChamCong/styles.css">

    <style> 
    </style>  
</head>  
<body>  

    <?php   
        require('layout/navqlch.php');  
    ?> 
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

        <div class="cc-branch-selector">  
            <label for="cc-branch">Chọn ca làm:</label>  
            <select id="cc-branch" name="cc-branch" onchange="this.form.submit()">  
                <option value="cc-branch1">Ca sáng</option>  
                <option value="cc-branch2">Ca trưa</option>  
                <option value="cc-branch3">Ca chiều</option> 
                <option value="cc-branch4">Ca tối</option>
            </select>  
        </div>  

        <div class="title-dsnv">  
            <h3>Danh sách nhân viên</h3>  
        </div>  

        <div class="list-dsnv">  
            <table class="employee-list">  
                <thead>  
                    <tr>  
                        <th>Tên nhân viên</th>  
                        <th>Chức vụ</th>  
                        <th>Ca làm</th>  
                        <th>Ngày chấm công</th>
                        <th>Trạng thái</th> 
                        <th>Ghi chú</th> 
                    </tr>  
                </thead>  
                <tbody id="employee-list">  
                    <tr>  
                        <td>Trần Thị B</td>  
                        <td>Nhân viên</td>  
                        <td>Ca sáng</td>  
                        <td><input type="date" name="date_1" value="<?php echo date('Y-m-d'); ?>" readonly></td> 
                        <td class="check-box status-present">  
                            <label><input type="radio" name="status_1" value="present"> Có mặt</label>  
                            <label><input type="radio" name="status_1" value="late"> Trễ</label>  
                            <label><input type="radio" name="status_1" value="absent"> Vắng mặt</label>  
                        </td> 
                        <td><textarea name="note_1" class="notes-input" placeholder="Ghi chú..."></textarea></td>
                    </tr>  
                    <tr>  
                        <td>Nguyễn Văn C</td>  
                        <td>Nhân viên</td>  
                        <td>Ca chiều</td>  
                        <td><input type="date" name="date_2" value="<?php echo date('Y-m-d'); ?>" readonly></td>
                        <td class="check-box">  
                            <label><input type="radio" name="status_2" value="present"> Có mặt</label>  
                            <label><input type="radio" name="status_2" value="late"> Trễ</label>  
                            <label><input type="radio" name="status_2" value="absent"> Vắng mặt</label>  
                        </td>  
                        <td><textarea name="note_2" class="notes-input" placeholder="Ghi chú..."></textarea></td>
                    </tr>  
                </tbody>  
            </table>  
        </div>  

        <div style="text-align: center; margin-top: 20px;">  
            <button class="submit-ChamCong" type="submit-ChamCong">Lưu thông tin chấm công</button>  
        </div>  
    </div>  

</body>  
</html>
