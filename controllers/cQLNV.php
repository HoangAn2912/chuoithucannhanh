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
        $sql = "UPDATE nguoidung SET tennd = ?, sodienthoai = ?, email = ?, diachi = ?, mavaitro = ?, mach = ? WHERE mand = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssssssi", $data['tennd'], $data['sodienthoai'], $data['email'], $data['diachi'], $data['mavaitro'], $data['mach'], $data['mand']);
        $stmt->execute();
    
        // Check if role or branch has changed
        if ($currentRole != $data['mavaitro'] || $currentBranch != $data['mach']) {
            // Remove from old role table if role has changed
            if ($currentRole != $data['mavaitro']) {
                if ($currentRole == 3) {
                    $deleteSql = "DELETE FROM nhanvienbanhang WHERE mand = ?";
                } else {
                    $deleteSql = "DELETE FROM nhanvienbep WHERE mand = ?";
                }
                $stmt = $this->conn->prepare($deleteSql);
                $stmt->bind_param("i", $data['mand']);
                $stmt->execute();
            }
    
            // Update branch in old role table if only branch has changed
            if ($currentRole == $data['mavaitro'] && $currentBranch != $data['mach']) {
                if ($currentRole == 3) {
                    $updateBranchSql = "UPDATE nhanvienbanhang SET mach = ? WHERE mand = ?";
                } else {
                    $updateBranchSql = "UPDATE nhanvienbep SET mach = ? WHERE mand = ?";
                }
                $stmt = $this->conn->prepare($updateBranchSql);
                $stmt->bind_param("ii", $data['mach'], $data['mand']);
                $stmt->execute();
            }
    
            // Add to new role table if role has changed
            if ($currentRole != $data['mavaitro']) {
                if ($data['mavaitro'] == 3) {
                    $insertSql = "INSERT INTO nhanvienbanhang (mand, mach) VALUES (?, ?)";
                } else {
                    $insertSql = "INSERT INTO nhanvienbep (mand, mach) VALUES (?, ?)";
                }
                $stmt = $this->conn->prepare($insertSql);
                $stmt->bind_param("ii", $data['mand'], $data['mach']);
                $stmt->execute();
            }
        }
    
        return true;
    }
    

    public function getEmployeeById($mand) {
        $sql = "SELECT nguoidung.mand, nguoidung.tennd, nguoidung.diachi, nguoidung.email, nguoidung.sodienthoai, vaitro.tenvaitro, cuahang.tench 
                FROM nguoidung 
                JOIN vaitro ON nguoidung.mavaitro = vaitro.mavaitro 
                JOIN cuahang ON nguoidung.mach = cuahang.mach 
                WHERE nguoidung.mand = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $mand);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
}

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
        $sql = "DELETE FROM nguoidung WHERE mand = ?";
        $stmt = $employeeModel->conn->prepare($sql);
        $stmt->bind_param("i", $mand);
        if ($stmt->execute()) {
            header("Location: http://localhost/chuoithucannhanh/index.php?page=QLNV&status=success");
        } else {
            header("Location: http://localhost/chuoithucannhanh/index.php?page=QLNV&status=error");
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
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['employeeName']) && !isset($_POST['mand'])) {
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

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['mand'])) {
    $data = [
        'mand' => $_POST['mand'],
        'tennd' => $_POST['employeeName'],
        'sodienthoai' => $_POST['employeePhone'],
        'email' => $_POST['employeeEmail'],
        'diachi' => $_POST['employeeAddress'],
        'mavaitro' => $_POST['employeePosition'],
        'mach' => $_POST['branch']
    ];
    if ($employeeModel->updateEmployee($data)) {
        header("Location: http://localhost/chuoithucannhanh/index.php?page=QLNV&status=success");
    } else {
        header("Location: http://localhost/chuoithucannhanh/index.php?page=QLNV&status=error");
    }
    exit();
}
?>
