<?php
error_reporting(0);
require_once '../../models/mQLNV.php';

$database = new ketnoi();
$db = $database->ketnoi();
$employeeModel = new EmployeeModel($db);

if (isset($_GET['mand'])) {
    $employeeDetail = $employeeModel->getEmployeeById($_GET['mand']);
} else {
    header("Location: ../../index.php?page=qlnv");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết nhân viên</title>
    <link rel="stylesheet" href="../../css/QLNV/views.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<style>
</style> 
<body>  
    <div class="main">  
        <div class="form-view-nhanvien">  
            <div class="title">  
                <h2>Chi tiết nhân viên</h2>  
            </div>  
            <div class="employee-detail">  
                <div class="employee-image">  
                    <i class='bx bxs-user'></i> 
                </div> 
                <div class="form-child">
                    <div class="form-row">  
                        <div class="form-group">  
                            <label for="employeeNameDetail">Tên nhân viên</label>  
                            <input type="text" id="employeeNameDetail" value="<?php echo $employeeDetail['tennd']; ?>" readonly>  
                        </div>  
                        <div class="form-group">  
                            <label for="employeeBirthdayDetail">Ngày sinh</label>  
                            <input type="text" id="employeeBirthdayDetail" value="<?php echo $employeeDetail['ngaysinh']; ?>" readonly>  
                        </div>  
                    </div>  
                    <div class="form-row">  
                        <div class="form-group">  
                            <label for="employeeGenderDetail">Giới tính</label>  
                            <input type="text" id="employeeGenderDetail" value="<?php echo $employeeDetail['gioitinh']; ?>" readonly>  
                        </div>  
                        <div class="form-group">  
                            <label for="employeeAddressDetail">Địa chỉ</label>  
                            <textarea id="employeeAddressDetail" rows="3" readonly><?php echo $employeeDetail['diachi']; ?></textarea>  
                        </div>  
                    </div>  
                    <div class="form-row">  
                        <div class="form-group">  
                            <label for="employeeEmailDetail">Email</label>  
                            <input type="email" id="employeeEmailDetail" value="<?php echo $employeeDetail['email']; ?>" readonly>  
                        </div>  
                        <div class="form-group">  
                            <label for="employeePhoneDetail">Số điện thoại</label>  
                            <input type="text" id="employeePhoneDetail" value="<?php echo $employeeDetail['sodienthoai']; ?>" readonly>  
                        </div>  
                    </div>  
                    <div class="form-row">  
                        <div class="form-group">  
                            <label for="employeePositionDetail">Chức vụ</label>  
                            <input type="text" id="employeePositionDetail" value="<?php echo $employeeDetail['tenvaitro']; ?>" readonly>  
                        </div>  
                        <div class="form-group">  
                            <label for="branchDetail">Chi nhánh</label>  
                            <input type="text" id="branchDetail" value="<?php echo $employeeDetail['tench']; ?>" readonly>  
                        </div>  
                    </div>  
                    <div class="back-button-view">  
                        <button onclick="window.location.href='../../index.php?page=qlnv'">Quay lại</button>  
                        <button onclick="window.location.href='update.php?mand=<?php echo $employeeDetail['mand']; ?>'">Chỉnh sửa</button>  
                    </div> 
                </div>
            </div>  
        </div>  
    </div>  
</body>  
</html>