<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Quản lý nhân viên</title>  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">  
    <link rel="stylesheet" href="layout/style.css">  
    <link rel="stylesheet" href="css/QLNV/style.css">  
    <link rel="stylesheet" href="css/ChamCong/style.css"> 
    <style>  
    </style>  
</head>  
<body>  

    <?php   
        require('layout/navqlchuoi.php');  
    ?> 
    <div class="main">  
        <div class="title">  
            <h2>Chấm Công Nhân Viên</h2>  
        </div>  

        <div class="qlnv-search-bar">  
            <form method="POST">  
                <input type="text" name="search" placeholder="Nhập nhân viên cần tìm" />  
                <button type="submit"><i class="fas fa-search"></i> Tìm</button>  
            </form>  
        </div>  

        <div class="branch-selector">  
            <label for="branch">Chi nhánh:</label>  
            <select id="branch" name="branch" onchange="this.form.submit()">  
                <option value="branch1">Chi nhánh 1</option>  
                <option value="branch2">Chi nhánh 2</option>  
                <option value="branch3">Chi nhánh 3</option>  
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
                        <th>Trạng thái</th>  
                    </tr>  
                </thead>  
                <tbody id="employee-list">  
                    <tr>  
                        <td>Trần Thị B</td>  
                        <td>Nhân viên</td>  
                        <td>Ca 2</td>  
                        <td class="check-box status-present">  
                            <label><input type="radio" name="status_1" value="present"> Có mặt</label>  
                            <label><input type="radio" name="status_1" value="late"> Trễ</label>  
                            <label><input type="radio" name="status_1" value="absent"> Vắng mặt</label>  
                        </td> 
                    </tr>  
                    <tr>  
                        <td>Nguyễn Văn C</td>  
                        <td>Nhân viên</td>  
                        <td>Ca 1</td>  
                        <td class="check-box">  
                            <label><input type="radio" name="status_2" value="present"> Có mặt</label>  
                            <label><input type="radio" name="status_2" value="late"> Trễ</label>  
                            <label><input type="radio" name="status_2" value="absent"> Vắng mặt</label>  
                        </td>  
                    </tr>  
                </tbody>  
            </table>  
        </div>  

        <div style="text-align: center; margin-top: 20px;">  
            <button class="submit-ChamCong" type="submit-ChamCong">Lưu thông tin chấm công</button>  
        </div>  
    </div>  

    <script src="../../js/QLNV/jsQLNV.js"></script>  
</body>  
</html>