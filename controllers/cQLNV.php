<?php
require_once __DIR__ . '/../models/mQLNV.php';

$employeeModel = new EmployeeModel((new ketnoi())->ketnoi());

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'view' && isset($_GET['mand'])) {
        $mand = $_GET['mand'];
        $employee = $employeeModel->getEmployeeById($mand);
        echo json_encode($employee);
        exit();
    }

    if ($_GET['action'] == 'delete' && isset($_GET['mand'])) {
        $mand = $_GET['mand'];
        if ($employeeModel->deleteEmployee($mand)) {
            header("Location: http://localhost/chuoithucannhanh/index.php?page=qlnv&status=success");
        } else {
            header("Location: http://localhost/chuoithucannhanh/index.php?page=qlnv&status=error");
        }
        exit();
    }

    
    if ($_GET['action'] == 'getRoles') {
        $roles = $employeeModel->getRoles();
        echo json_encode($roles);
        exit();
    }

    if ($_GET['action'] == 'getBranches') {
        $branches = $employeeModel->getBranches();
        echo json_encode($branches);
        exit();
    }

    if ($_GET['action'] == 'search' && isset($_GET['name'])) {
        $name = $_GET['name'];
        $employees = $employeeModel->searchEmployeesByName($name);
        echo json_encode($employees);
        exit();
    }

    if ($_GET['action'] == 'add' && $_SERVER['REQUEST_METHOD'] == 'POST') {
        $data = [
            'tennd' => $_POST['tennd'],
            'ngaysinh' => $_POST['ngaysinh'],
            'gioitinh' => $_POST['gioitinh'],
            'sodienthoai' => $_POST['sodienthoai'],
            'email' => $_POST['email'],
            'diachi' => $_POST['diachi'],
            'matkhau' => md5($_POST['matkhau']),
            'mavaitro' => $_POST['mavaitro'],
            'mach' => $_POST['mach']
        ];
        if ($employeeModel->addEmployee($data)) {
            header("Location: http://localhost/chuoithucannhanh/index.php?page=qlnv&status=success");
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
        if ($employeeModel->updateEmployee($data)) {
            header("Location: http://localhost/chuoithucannhanh/index.php?page=qlnv&status=success");
        } else {
            header("Location: http://localhost/chuoithucannhanh/index.php?page=qlnv&status=error");
        }
        exit();
    }
}
?>
