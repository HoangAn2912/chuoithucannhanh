<?php
include_once("../models/mPhanCongCaLam.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_start(); 
    $ngaydangky = $_POST['ngaydangky'];
    $macalam = $_POST['macalam'];
    $mand = $_POST['mand'];
    $mach = $_SESSION['mach']; 

    $model = new modelPhanCongCaLam();

    $registeredEmployees = $model->selectNguoidung($ngaydangky, $macalam);
    $allEligibleEmployees = $model->getNhanVienTheoVaiTroVaMach($mach);

    $registeredMand = array_column($registeredEmployees, 'mand'); 
    $availableEmployees = array_filter($allEligibleEmployees, function ($employee) use ($registeredMand) {
        return !in_array($employee['mand'], $registeredMand); 
    });

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
    echo "<option value=''>Vui lòng chọn nhân viên</option>";

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

    if($mand != 0){
        $luuPCCL = $model->assignShift($ngaydangky, $macalam, $mand);
    }


}
?>
