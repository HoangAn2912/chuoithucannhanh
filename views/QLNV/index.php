<?php
if(!isset($_SESSION['dangnhap'])){
    header("Refresh: 0; url=index.php?page=dangnhap");
}
require_once 'controllers/cQLNV.php';
$database = new ketnoi();
$db = $database->ketnoi();
$employeeModel = new EmployeeModel($db);

$mach = $_SESSION['mach'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['employeeName'])) {
    $data = [
        'tennd' => $_POST['employeeName'],
        'ngaysinh' => $_POST['employeeBirthday'],
        'gioitinh' => $_POST['employeeGender'],
        'sodienthoai' => $_POST['employeePhone'],
        'email' => $_POST['employeeEmail'],
        'diachi' => $_POST['employeeAddress'],
        'matkhau' => md5($_POST['matkhau']),
        'mavaitro' => $_POST['employeePosition'],
        'mach' => $_POST['branch']
    ];
    if ($employeeModel->addEmployee($data)) {
        header("Location: http://localhost/chuoithucannhanh/index.php?page=qlnv&status=success");
    } else {
        header("Location: http://localhost/chuoithucannhanh/index.php?page=qlnv&status=error");
    }
    exit();
}

$searchQuery = '';
if (isset($_GET['search'])) {
    $searchQuery = $_GET['search'];
    $employees = $employeeModel->searchEmployeesByName($searchQuery, $mach);
} else {
    $employees = $employeeModel->getKitchenAndSalesEmployees($mach);
}

$branches = $employeeModel->getBranches();
$roles = $employeeModel->getRoles();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý nhân viên</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/QLNV/style.css?v=4">
</head>
<body>
    <?php require('layout/navqlch.php'); ?>
    <div class="main">
        <div class="title">
            <h2>Quản lý nhân viên</h2>
        </div>
        <div class="qlnv-search-bar">
            <form method="GET" action="index.php">
                <input type="hidden" name="page" value="qlnv">
                <input type="text" name="search" placeholder="Nhập tên nhân viên cần tìm..." value="<?php echo htmlspecialchars($searchQuery); ?>" />
                <button type="submit"><i class="fas fa-search"></i> Tìm</button>
            </form>
        </div>
        <div class="title-dsnv">
            <h3>Danh sách nhân viên</h3>
        </div>
        <div class="list-dsnv">
            <table class="employee-list title-list">
                <thead>
                    <tr>
                        <th>Mã nhân viên</th>
                        <th>Tên nhân viên</th>
                        <th>Chức vụ</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody id="employee-list">
                    <?php
                    if (isset($employees) && count($employees) > 0) {
                        foreach ($employees as $employee) {
                            echo "<tr>";
                            echo "<td>{$employee['mand']}</td>";
                            echo "<td>{$employee['tennd']}</td>";
                            echo "<td>{$employee['tenvaitro']}</td>";
                            echo "<td>{$employee['tenttlv']}</td>";
                            echo "<td class='td-btn-qlnv'>
                                    <a href='views/QLNV/xemchitiet.php?mand={$employee['mand']}'>Xem chi tiết</a>
                                    <a href='views/QLNV/update.php?mand={$employee['mand']}'>Sửa</a>
                                    <a href='controllers/cQLNV.php?action=delete&mand={$employee['mand']}' onclick='return confirm(\"Bạn có chắc chắn muốn xóa nhân viên không?\")'>Xóa</a>
                                  </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>Không tìm thấy nhân viên</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="add-NV">
            <button class="btn-add-NV" onclick="toggleForm()">Thêm mới nhân viên</button>
        </div>
        <div class="overlay" id="overlay" onclick="toggleForm()"></div>
        <div class="add-employee-form" id="employeeForm" style="display: none;">
            <h3>Thêm mới nhân viên</h3>
            <form method="POST" action="" onsubmit="return confirmAddEmployee()">
                <input type="text" name="employeeName" placeholder="Tên nhân viên" required />
                <input type="date" name="employeeBirthday" placeholder="Ngày sinh" required />
                <select name="employeeGender" required>
                    <option value="">Giới tính</option>
                    <option value="1">Nam</option>
                    <option value="0">Nữ</option>
                </select>
                <input type="text" name="employeeAddress" placeholder="Địa chỉ" required />
                <input type="email" name="employeeEmail" placeholder="Email" required />
                <input type="text" name="employeePhone" placeholder="Số điện thoại" required />
                <input type="password" name="matkhau" placeholder="Mật khẩu" required />
                <select name="employeePosition" required>
                    <option value="">Chức vụ</option>
                    <?php
                    if (isset($roles) && count($roles) > 0) {
                        foreach ($roles as $role) {
                            echo "<option value='{$role['mavaitro']}'>{$role['tenvaitro']}</option>";
                        }
                    }
                    ?>
                </select>
                <select name="branch" required>
                    <option value="">Chi nhánh</option>
                    <?php
                    if (isset($branches) && count($branches) > 0) {
                        foreach ($branches as $branch) {
                            echo "<option value='{$branch['mach']}'>{$branch['tench']}</option>";
                        }
                    }
                    ?>
                </select>
                <button type="submit" class="btn-add-NV-save">Lưu</button>
            </form>
        </div>
    </div>
    <?php
    if (isset($_GET['status']) && $_GET['status'] == 'success') {
        echo "<script>alert('Thực hiện thành công!');</script>";
    } elseif (isset($_GET['status']) && $_GET['status'] == 'error') {
        echo "<script>alert('Có lỗi xảy ra.');</script>";
    }
    ?>
    <script src="js/QLNV/jss.js"></script>
</body>
</html>
