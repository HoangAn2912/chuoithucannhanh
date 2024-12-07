<?php
session_start();
if (!isset($_SESSION['mavaitro']) || $_SESSION['mavaitro'] != 2) {
    header("Refresh: 0; url=../../index.php"); 
    exit();
}
require_once '../../models/mketnoi.php';
require_once '../../models/mQLNV.php';

$database = new ketnoi();
$db = $database->ketnoi();
$employeeModel = new EmployeeModel($db);

if (isset($_GET['mand'])) {
    $editEmployee = $employeeModel->layNhanVienTheoVaiTro($_GET['mand']);
    if (!$editEmployee) {
        echo "Không tìm thấy thông tin nhân viên.";
        exit();
    }
    if ($_SESSION['mach'] != $editEmployee['mach']) {
        echo "<script>alert('Nhân viên này không thuộc cửa hàng của bạn'); window.location.href='../../index.php?page=qlnv';</script>";
        exit();
    }
    $branches = $employeeModel->layCuaHang();
    $roles = $employeeModel->layVaiTro();
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
    <title>Chỉnh sửa nhân viên</title>
    <link rel="stylesheet" href="../../css/QLNV/update.css?v=4">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script>
        function confirmEditEmployee() {
            return confirm("Bạn có chắc chắn muốn lưu các thay đổi?");
        }

        function confirmBack() {
            if (confirm("Bạn có chắc chắn muốn quay lại? Mọi thay đổi chưa lưu sẽ bị mất.")) {
                window.location.href = '../../index.php?page=qlnv';
            }
        }
    </script>
</head>
<style>
</style>
<body>
    <div class="main">
        <div class="form-view-nhanvien">
            <div class="title">
                <h2>Chỉnh sửa nhân viên</h2>
            </div>
            <div class="employee-edit employee-detail">
                <div class="employee-image-update">
                    <i class='bx bxs-user'></i> 
                </div>
                <form method="POST" action="../../controllers/cQLNV.php?action=update" onsubmit="return confirmEditEmployee()">
                    <input type="hidden" name="mand" id="editEmployeeId" value="<?php echo htmlspecialchars($editEmployee['mand']); ?>">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="editEmployeeName">Tên nhân viên</label>
                            <input type="text" name="tennd" id="editEmployeeName" value="<?php echo htmlspecialchars($editEmployee['tennd']); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="editEmployeeBirthday">Ngày sinh</label>
                            <input type="date" name="ngaysinh" id="editEmployeeBirthday" value="<?php echo htmlspecialchars($editEmployee['ngaysinh']); ?>" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="editEmployeeGender">Giới tính</label>
                            <select name="gioitinh" id="editEmployeeGender" required>
                                <option value="0" <?php echo $editEmployee['gioitinh'] == 0 ? 'selected' : ''; ?>>Nữ</option>
                                <option value="1" <?php echo $editEmployee['gioitinh'] == 1 ? 'selected' : ''; ?>>Nam</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="editEmployeeAddress">Địa chỉ</label>
                            <textarea name="diachi" id="editEmployeeAddress" rows="3" required><?php echo htmlspecialchars($editEmployee['diachi']); ?></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="editEmployeeEmail">Email</label>
                            <input type="email" name="email" id="editEmployeeEmail" value="<?php echo htmlspecialchars($editEmployee['email']); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="editEmployeePhone">Số điện thoại</label>
                            <input type="text" name="sodienthoai" id="editEmployeePhone" value="<?php echo htmlspecialchars($editEmployee['sodienthoai']); ?>" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="editEmployeePosition">Chức vụ</label>
                            <select name="mavaitro" id="editEmployeePosition" required>
                                <option value="">Chức vụ</option>
                                <?php
                                foreach ($roles as $role) {
                                    $selected = ($role['mavaitro'] == $editEmployee['mavaitro']) ? 'selected' : '';
                                    echo "<option value='{$role['mavaitro']}' {$selected}>{$role['tenvaitro']}</option>";
                                }                                
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="editBranch">Chi nhánh</label>
                            <select name="mach" id="editBranch" required>
                                <?php
                                foreach ($branches as $branch) {
                                    $selected = ($branch['mach'] == $editEmployee['mach']) ? 'selected' : '';
                                    echo "<option value='{$branch['mach']}' {$selected}>{$branch['tench']}</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="editEmployeePhone">Mật Khẩu</label>
                            <input type="password" name="matkhau" id="editEmployeePass" placeholder="Nhập mật khẩu mới" >
                        </div>
                    </div>
                    <div class="back-button-view">
                        <button type="button" onclick="return confirmBack()">Quay lại</button>
                        <button type="submit">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
