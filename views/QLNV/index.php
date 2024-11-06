<?php
require_once 'controllers/cQLNV.php';
$database = new ketnoi();
$db = $database->ketnoi();
$employeeModel = new EmployeeModel($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['employeeName'])) {
    $data = [
        'tennd' => $_POST['employeeName'],
        'sodienthoai' => $_POST['employeePhone'],
        'email' => $_POST['employeeEmail'],
        'diachi' => $_POST['employeeAddress'],
        'matkhau' => password_hash('defaultpassword', PASSWORD_DEFAULT),
        'mavaitro' => $_POST['employeePosition'],
        'mach' => $_POST['branch']
    ];
    if ($employeeModel->addEmployee($data)) {
        header("Location: http://localhost/chuoithucannhanh/index.php?page=QLNV&status=success");
    } else {
        header("Location: http://localhost/chuoithucannhanh/index.php?page=QLNV&status=error");
    }
    exit();
}

$searchQuery = '';
if (isset($_GET['search'])) {
    $searchQuery = $_GET['search'];
    $employees = $employeeModel->searchEmployeesByName($searchQuery);
} else {
    $employees = $employeeModel->getKitchenAndSalesEmployees();
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
    <link rel="stylesheet" href="css/QLNV/style.css?v=2">
</head>
<body>
    <?php require('layout/navqlch.php'); ?>
    <div class="main">
        <div class="title">
            <h2>Quản lý nhân viên</h2>
        </div>
        <div class="qlnv-search-bar">
            <form method="GET" action="index.php">
                <input type="hidden" name="page" value="QLNV">
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
                            echo "<td class='td-btn-qlnv'>
                                    <button class='btn-view-qlnv' onclick='viewEmployeeDetail({$employee['mand']})'>Xem chi tiết</button>
                                    <button class='btn-edit-qlnv' onclick='editEmployee({$employee['mand']})'>Sửa</button>
                                    <button class='btn-delete-qlnv' onclick='deleteEmployee({$employee['mand']})'>Xóa</button>
                                  </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>Không có dữ liệu</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="add-NV">
            <button class="btn-add-NV" onclick="toggleForm()">Thêm mới nhân viên</button>
        </div>
        <div class="overlay" id="overlay" onclick="toggleForm()"></div>
        <div class="add-employee-form" id="employeeForm">
            <h3>Thêm mới nhân viên</h3>
            <form method="POST" action="" onsubmit="return confirmAddEmployee()">
                <input type="text" name="employeeName" placeholder="Tên nhân viên" required />
                <input type="date" name="employeeBirthday" placeholder="Ngày sinh" required />
                <select name="employeeGender" required>
                    <option value="">Giới tính</option>
                    <option value="male">Nam</option>
                    <option value="female">Nữ</option>
                </select>
                <input type="text" name="employeeAddress" placeholder="Địa chỉ" required />
                <input type="email" name="employeeEmail" placeholder="Email" required />
                <input type="text" name="employeePhone" placeholder="Số điện thoại" required />
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
        <!-- xem chi tiet nv -->
        <div class="overlay" id="overlayDetail" onclick="toggleDetailForm()" style="display: none;"></div>
        <div class="employee-detail" id="employeeDetail">  
            <h3>Chi tiết nhân viên</h3>  

            <div class="form-group">
                <label for="employeeNameDetail">Tên nhân viên</label>
                <input type="text" id="employeeNameDetail" value="" readonly>
            </div>

            <div class="form-group">
                <label for="employeeBirthdayDetail">Ngày sinh</label>
                <input type="text" id="employeeBirthdayDetail" value="" readonly>
            </div>

            <div class="form-group">
            <label for="employeeGenderDetail">Giới tính</label>
                <input type="text" id="employeeGenderDetail" value="" readonly>
            </div>

            <div class="form-group">
                <label for="employeeAddressDetail">Địa chỉ</label>
                <textarea id="employeeAddressDetail" rows="3" readonly></textarea>
            </div>

            <div class="form-group">
                <label for="employeeEmailDetail">Email</label>
                <input type="email" id="employeeEmailDetail" value="" readonly>
            </div>

            <div class="form-group">
                <label for="employeePhoneDetail">Số điện thoại</label>
                <input type="text" id="employeePhoneDetail" value="" readonly>
            </div>

            <div class="form-group">
                <label for="employeePositionDetail">Chức vụ</label>
                <input type="text" id="employeePositionDetail" value="" readonly>
            </div>

            <div class="form-group">
                <label for="branchDetail">Chi nhánh</label>
                <input type="text" id="branchDetail" value="" readonly>
            </div>

            <div class="back-button-view">
                <button onclick="toggleDetailForm()">Quay lại</button>
            </div>
        </div>

        <!-- Edit Employee Form -->
        <div class="overlay" id="overlayEdit" onclick="toggleEditForm()" style="display: none;"></div>
        <div class="employee-edit employee-detail" id="employeeEdit" >
            <h3>Chỉnh sửa nhân viên</h3>
            <form method="POST" action="" onsubmit="return confirmEditEmployee()">
                <input type="hidden" name="mand" id="editEmployeeId">
                <div class="form-group">
                    <label for="editEmployeeName">Tên nhân viên</label>
                    <input type="text" name="employeeName" id="editEmployeeName" required>
                </div>
                <div class="form-group">
                    <label for="editEmployeeAddress">Địa chỉ</label>
                    <textarea name="employeeAddress" id="editEmployeeAddress" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="editEmployeeEmail">Email</label>
                    <input type="email" name="employeeEmail" id="editEmployeeEmail" required>
                </div>
                <div class="form-group">
                    <label for="editEmployeePhone">Số điện thoại</label>
                    <input type="text" name="employeePhone" id="editEmployeePhone" required>
                </div>
                <div class="form-group">
                    <label for="editEmployeePosition">Chức vụ</label>
                    <select name="employeePosition" id="editEmployeePosition" required>
                    </select>
                </div>
                <div class="form-group">
                    <label for="editBranch">Chi nhánh</label>
                    <select name="branch" id="editBranch" required>
                    </select>
                </div>
                <div class="back-button-view">
                    <button type="submit" class="btn-edit-save">Lưu</button>
                </div>
            </form>
            <div class="back-button-view">
                <button onclick="toggleEditForm()">Quay lại</button>
            </div>
        </div>

    </div>
    <?php
    if (isset($_GET['status']) && $_GET['status'] == 'success') {
        echo "<script>alert('Thực hiện thành công!');</script>";
    } elseif (isset($_GET['status']) && $_GET['status'] == 'error') {
        echo "<script>alert('Có lỗi xảy ra.');</script>";
    }
    ?>
 <script src="js/QLNV/js.js"></script>
</body>
</html>

