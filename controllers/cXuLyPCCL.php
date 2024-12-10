<?php
include_once("../models/mPhanCongCaLam.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ POST và session
    session_start(); // Đảm bảo session được khởi động
    $ngaydangky = $_POST['ngaydangky'];
    $macalam = $_POST['macalam'];
    $mand = $_POST['mand'];
    $mach = $_SESSION['mach']; // Lấy mã cửa hàng từ session

    $model = new modelPhanCongCaLam();

    // Lấy danh sách nhân viên đã đăng ký ca làm
    $registeredEmployees = $model->selectNguoidung($ngaydangky, $macalam);

    // Lấy tất cả nhân viên của cửa hàng này theo vai trò
    $allEligibleEmployees = $model->getNhanVienTheoVaiTroVaMach($mach);

    // So sánh để tìm nhân viên chưa đăng ký
    $registeredMand = array_column($registeredEmployees, 'mand'); // Lấy danh sách 'mand' đã đăng ký
    $availableEmployees = array_filter($allEligibleEmployees, function ($employee) use ($registeredMand) {
        return !in_array($employee['mand'], $registeredMand); // Chỉ giữ nhân viên chưa đăng ký
    });

    // Phân loại nhân viên bán hàng và nhân viên bếp
    $salesEmployees = array_filter($availableEmployees, function ($employee) {
        return $employee['tenvaitro'] === "Nhân viên bán hàng";
    });

    $kitchenEmployees = array_filter($availableEmployees, function ($employee) {
        return $employee['tenvaitro'] === "Nhân viên bếp";
    });

    $nvbhCount = 0;
$nvbCount = 0;
foreach ($registeredEmployees as $employee) {
    if ($employee['tenvaitro'] == "Nhân viên bán hàng") {
        $nvbhCount++;
    } elseif ($employee['tenvaitro'] == "Nhân viên bếp") {
        $nvbCount++;
    }
}
    // Hiển thị phần mặc định "Vui lòng chọn nhân viên"
    echo "<option value=''>Vui lòng chọn nhân viên</option>";

    // Hiển thị các option cho nhân viên bán hàng
echo "<optgroup label='Nhân viên bán hàng'>";
if ($nvbhCount >= 3) {
    echo "<option value=''>NVBH đã đủ số lượng</option>";
} elseif (!empty($salesEmployees)) {
    foreach ($salesEmployees as $employee) {
        echo "<option value='{$employee['mand']}'>{$employee['tennd']} (NVBH)</option>";
    }
} else {
    echo "<option value=''>NVBH chưa đủ số lượng</option>";
}
echo "</optgroup>";

    // Hiển thị các option cho nhân viên bếp
    echo "<optgroup label='Nhân viên bếp'>";
    if ($nvbCount >= 2) {
        echo "<option value=''>NVB đã đủ số lượng</option>";
    } elseif (!empty($kitchenEmployees)) {
        foreach ($kitchenEmployees as $employee) {
            echo "<option value='{$employee['mand']}'>{$employee['tennd']} (NVB)</option>";
        }
    } else {
        echo "<option value=''>NVB chưa đủ số lượng</option>";
    }
    echo "</optgroup>";

    // Gọi hàm để lưu khi nhấn nút 
    if($mand != 0){
        $luuPCCL = $model->assignShift($ngaydangky, $macalam, $mand);
    }


}
?>
