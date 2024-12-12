<?php
require_once __DIR__ . '/../models/mQLNV.php';

$employeeModel = new EmployeeModel((new ketnoi())->ketnoi());

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'view' && isset($_GET['mand'])) {
        $mand = $_GET['mand'];
        $employee = $employeeModel->layNhanVienTheoVaiTro($mand);
        echo json_encode($employee);
        exit();
    }

    if ($_GET['action'] == 'delete' && isset($_GET['mand'])) {
        $mand = $employeeModel->giaiMa($_GET['mand']);
        if ($employeeModel->deleteEmployee($mand)) {
            header("Location: http://localhost/chuoithucannhanh/index.php?page=qlnv&status=success");
        } else {
            header("Location: http://localhost/chuoithucannhanh/index.php?page=qlnv&status=error");
        }
        exit();
    }

    
    if ($_GET['action'] == 'layVaiTro') {
        $roles = $employeeModel->layVaiTro();
        echo json_encode($roles);
        exit();
    }

    if ($_GET['action'] == 'layCuaHang') {
        $branches = $employeeModel->layCuaHang();
        echo json_encode($branches);
        exit();
    }

    if ($_GET['action'] == 'search' && isset($_GET['name'])) {
        $name = $_GET['name'];
        $employees = $employeeModel->timKiemNhanVien($name);
        echo json_encode($employees);
        exit();
    }

    if ($_GET['action'] == 'add' && $_SERVER['REQUEST_METHOD'] == 'POST') {
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
        $result = $employeeModel->addEmployee($data);
        if ($result === "Thêm thành công") {
            header("Location: http://localhost/chuoithucannhanh/index.php?page=qlnv&status=success");
        } elseif ($result === "Email đã tồn tại") {
            header("Location: http://localhost/chuoithucannhanh/index.php?page=qlnv&status=email_exists");
        } else {
            header("Location: http://localhost/chuoithucannhanh/index.php?page=qlnv&status=error");
        }
        exit();
    }
    

    if ($_GET['action'] == 'update' && $_SERVER['REQUEST_METHOD'] == 'POST') {
        $data = [
            'mand' => $_POST['mand'],
            'tennd' => $_POST['tennd'],
            'ngaysinh' => $_POST['ngaysinh'],
            'gioitinh' => $_POST['gioitinh'],
            'sodienthoai' => $_POST['sodienthoai'],
            'email' => $_POST['email'],
            'diachi' => $_POST['diachi'],
            'mavaitro' => $_POST['mavaitro'],
            'mach' => $_POST['mach']
        ];

         // Kiểm tra nếu email trống
         if (empty($data['email'])) {
            echo "<script>alert('Nhân viên này đã nghỉ việc, không được phép chỉnh sửa'); window.location.href='../../index.php?page=qlnv';</script>";
            exit();
        }
    
        // Kiểm tra nếu có mật khẩu mới
        if (!empty($_POST['matkhau'])) {
            $data['matkhau'] = md5($_POST['matkhau']);
        } else {
            $data['matkhau'] = null;
        }
    
        if ($employeeModel->updateEmployee($data)) {
            header("Location: http://localhost/chuoithucannhanh/index.php?page=qlnv&status=success");
        } else {
            header("Location: http://localhost/chuoithucannhanh/index.php?page=qlnv&status=error");
        }
        exit();
    }
}
?>
