<?php
class ketnoi {
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $db = "cuahangthucan_db";
    private $conn;

    public function ketnoi() {
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db);
        if ($this->conn->connect_error) {
            echo "Kết nối không thành công: " . $this->conn->connect_error;
            exit();
        } else {
            return $this->conn;
        }
    }
}

class EmployeeModel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getKitchenAndSalesEmployees() {
        $sql = "SELECT nguoidung.mand, nguoidung.tennd, nguoidung.sodienthoai, nguoidung.email, nguoidung.diachi, vaitro.tenvaitro 
                FROM nguoidung 
                JOIN vaitro ON nguoidung.mavaitro = vaitro.mavaitro
                WHERE vaitro.tenvaitro IN ('Nhân viên bếp', 'Nhân viên bán hàng')";
        $result = $this->conn->query($sql);
        $employees = [];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $employees[] = $row;
            }
        }
        return $employees;
    }

    public function searchEmployeesByName($name) {
        $sql = "SELECT nguoidung.mand, nguoidung.tennd, nguoidung.sodienthoai, nguoidung.email, nguoidung.diachi, vaitro.tenvaitro 
                FROM nguoidung 
                JOIN vaitro ON nguoidung.mavaitro = vaitro.mavaitro
                WHERE vaitro.tenvaitro IN ('Nhân viên bếp', 'Nhân viên bán hàng') AND nguoidung.tennd LIKE ?";
        $stmt = $this->conn->prepare($sql);
        $searchTerm = "%$name%";
        $stmt->bind_param("s", $searchTerm);
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
        $sql = "INSERT INTO nguoidung (tennd, sodienthoai, email, diachi, matkhau, mavaitro, mach) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssssssi", $data['tennd'], $data['sodienthoai'], $data['email'], $data['diachi'], $data['matkhau'], $data['mavaitro'], $data['mach']);
        if ($stmt->execute()) {
            $mand = $this->conn->insert_id;
            if ($data['mavaitro'] == 3) {
                $sql = "INSERT INTO nhanvienbanhang (mand, mach) VALUES (?, ?)";
            } else {
                $sql = "INSERT INTO nhanvienbep (mand, mach) VALUES (?, ?)";
            }
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("ii", $mand, $data['mach']);
            return $stmt->execute();
        }
        return false;
    }
}
?>
