<?php
require_once 'mketnoi.php';
class EmployeeModel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getKitchenAndSalesEmployees($mach) {
        $sql = "SELECT nguoidung.mand, nguoidung.tennd, nguoidung.sodienthoai, nguoidung.email, nguoidung.diachi, 
                       COALESCE(vaitro.tenvaitro, 'Không có') AS tenvaitro, trangthailamviec.tenttlv 
                FROM nguoidung 
                LEFT JOIN vaitro ON nguoidung.mavaitro = vaitro.mavaitro
                LEFT JOIN trangthailamviec ON nguoidung.mattlv = trangthailamviec.mattlv
                WHERE nguoidung.mach = ? AND nguoidung.mavaitro IN (3, 4, 0)
                ORDER BY FIELD(nguoidung.mavaitro, 3, 4, 0), nguoidung.mand ASC";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $mach);
        $stmt->execute();
        $result = $stmt->get_result();
        $employees = [];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $employees[] = $row;
            }
        }
        return $employees;
    }
    
    
    public function searchEmployeesByName($name, $mach) {
        $sql = "SELECT nguoidung.mand, nguoidung.tennd, nguoidung.sodienthoai, nguoidung.email, nguoidung.diachi, 
                       COALESCE(vaitro.tenvaitro, 'Không có') AS tenvaitro, trangthailamviec.tenttlv 
                FROM nguoidung 
                LEFT JOIN vaitro ON nguoidung.mavaitro = vaitro.mavaitro
                LEFT JOIN trangthailamviec ON nguoidung.mattlv = trangthailamviec.mattlv
                WHERE nguoidung.tennd LIKE ? AND nguoidung.mach = ? AND nguoidung.mavaitro IN (3, 4,0)";
        $stmt = $this->conn->prepare($sql);
        $searchTerm = "%$name%";
        $stmt->bind_param("si", $searchTerm, $mach);
        $stmt->execute();
        $result = $stmt->get_result();
        $employees = [];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $employees[] = $row;
            }
        }
        return $employees;
    }
    
    

    public function getBranches() {
        $sql = "SELECT mach, tench FROM cuahang";
        $result = $this->conn->query($sql);
        $branches = [];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $branches[] = $row;
            }
        }
        return $branches;
    }

    public function getRoles() {
        $sql = "SELECT mavaitro, tenvaitro FROM vaitro WHERE tenvaitro IN ('Nhân viên bán hàng', 'Nhân viên bếp')";
        $result = $this->conn->query($sql);
        $roles = [];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $roles[] = $row;
            }
        }
        return $roles;
    }

    public function addEmployee($data) {
        $sql = "INSERT INTO nguoidung (tennd, ngaysinh, gioitinh, sodienthoai, email, diachi, matkhau, mavaitro, mach, mattlv) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, 1)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssissssii", $data['tennd'], $data['ngaysinh'], $data['gioitinh'], $data['sodienthoai'], $data['email'], $data['diachi'], $data['matkhau'], $data['mavaitro'], $data['mach']);
        return $stmt->execute();
    }
    
    

    public function updateEmployee($data) {
        // Get current role and branch
        $currentDetailsSql = "SELECT mavaitro, mach FROM nguoidung WHERE mand = ?";
        $stmt = $this->conn->prepare($currentDetailsSql);
        $stmt->bind_param("i", $data['mand']);
        $stmt->execute();
        $result = $stmt->get_result();
        $currentDetails = $result->fetch_assoc();
        $currentRole = $currentDetails['mavaitro'];
        $currentBranch = $currentDetails['mach'];
    
        // Update employee details
        $sql = "UPDATE nguoidung SET tennd = ?, ngaysinh = ?, gioitinh = ?, sodienthoai = ?, email = ?, diachi = ?, matkhau = ?, mavaitro = ?, mach = ? WHERE mand = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssissssiii", $data['tennd'], $data['ngaysinh'], $data['gioitinh'], $data['sodienthoai'], $data['email'], $data['diachi'], $data['matkhau'], $data['mavaitro'], $data['mach'], $data['mand']);
        $stmt->execute();
    
        return true;
    }
    

    public function getEmployeeById($mand) {
        $sql = "SELECT nguoidung.mand, nguoidung.tennd, nguoidung.ngaysinh, nguoidung.gioitinh, nguoidung.diachi, nguoidung.email, nguoidung.sodienthoai, 
                       nguoidung.mavaitro, COALESCE(vaitro.tenvaitro, 'Không có') AS tenvaitro, cuahang.mach, cuahang.tench, trangthailamviec.tenttlv 
                FROM nguoidung 
                LEFT JOIN vaitro ON nguoidung.mavaitro = vaitro.mavaitro 
                JOIN cuahang ON nguoidung.mach = cuahang.mach 
                LEFT JOIN trangthailamviec ON nguoidung.mattlv = trangthailamviec.mattlv 
                WHERE nguoidung.mand = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $mand);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
    
    public function deleteEmployee($mand) {
        $sql = "UPDATE nguoidung SET email = '', matkhau = '', mattlv = 2, mavaitro = NULL WHERE mand = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $mand);
        return $stmt->execute();
    }
     
}
?>
