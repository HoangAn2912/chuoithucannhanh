<?php
require_once 'mketnoi.php';
class EmployeeModel {
    private $conn;
    private $taoKhoa = "HoangPhi.$1026%&#"; 
    private $cipher = "AES-256-CBC";  

    public function __construct($db) {
        $this->conn = $db;
    }

    public function layThongTinNhanVien($mach) {
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
    public function timKiemNhanVien($name, $mach) {
        $sql = "SELECT nguoidung.mand, nguoidung.tennd, nguoidung.sodienthoai, nguoidung.email, nguoidung.diachi, 
                       COALESCE(vaitro.tenvaitro, 'Không có') AS tenvaitro, trangthailamviec.tenttlv 
                FROM nguoidung 
                LEFT JOIN vaitro ON nguoidung.mavaitro = vaitro.mavaitro
                LEFT JOIN trangthailamviec ON nguoidung.mattlv = trangthailamviec.mattlv
                WHERE nguoidung.tennd LIKE ? AND nguoidung.mach = ? AND nguoidung.mavaitro IN (3, 4,0)
                ORDER BY 
                CASE 
                    WHEN nguoidung.tennd = ? THEN 1   -- Tên khớp chính xác
                    WHEN nguoidung.tennd LIKE CONCAT('%', ?, '%') THEN 2 -- Tên chứa từ khoá
                    ELSE 3  -- Các trường hợp khác
                END,
                FIELD(nguoidung.mavaitro, 3, 4, 0),  -- Ưu tiên vai trò
                nguoidung.mand ASC";
        $stmt = $this->conn->prepare($sql);
        $searchTerm = "%$name%";
        $stmt->bind_param("siss", $searchTerm, $mach, $name, $name);
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
    public function layCuaHang() {
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

    public function layVaiTro() {
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

    public function emailExists($email) {
        $sql = "SELECT * FROM nguoidung WHERE email = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->num_rows > 0;
    }

    public function addEmployee($data) {
        if ($this->emailExists($data['email'])) {
            return "Email đã tồn tại";
        }
        $sql = "INSERT INTO nguoidung (tennd, ngaysinh, gioitinh, sodienthoai, email, diachi, matkhau, mavaitro, mach, mattlv) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, 1)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssissssii", $data['tennd'], $data['ngaysinh'], $data['gioitinh'], $data['sodienthoai'], $data['email'], $data['diachi'], $data['matkhau'], $data['mavaitro'], $data['mach']);
        if ($stmt->execute()) {
            return "Thêm thành công";
        } else {
            return "Lỗi khi thêm nhân viên";
        }
    }   

    public function updateEmployee($data) {
        $currentDetailsSql = "SELECT mavaitro, mach FROM nguoidung WHERE mand = ?";
        $stmt = $this->conn->prepare($currentDetailsSql);
        if (!$stmt) {
            die("Prepare failed: " . $this->conn->error);
        }
        $stmt->bind_param("i", $data['mand']);
        $stmt->execute();
        $result = $stmt->get_result();
        if (!$result) {
            die("Execute failed: " . $stmt->error);
        }
        $currentDetails = $result->fetch_assoc();
        $currentRole = $currentDetails['mavaitro'];
        $currentBranch = $currentDetails['mach'];
    
        $sql = "UPDATE nguoidung SET tennd = ?, ngaysinh = ?, gioitinh = ?, sodienthoai = ?, email = ?, diachi = ?, mavaitro = ?, mach = ?";
        $types = "ssisssii";
        $params = [$data['tennd'], $data['ngaysinh'], $data['gioitinh'], $data['sodienthoai'], $data['email'], $data['diachi'], $data['mavaitro'], $data['mach']];
    
        // Kiểm tra nếu có mật khẩu mới
        if (!empty($data['matkhau'])) {
            $sql .= ", matkhau = ?";
            $types .= "s";
            $params[] = $data['matkhau']; // Thêm mật khẩu vào cuối mảng
        }
    
        // Thêm điều kiện WHERE
        $sql .= " WHERE mand = ?";
        $types .= "i";
        $params[] = $data['mand']; // Thêm 'mand' vào cuối mảng
    
        $stmt = $this->conn->prepare($sql);
        if (!$stmt) {
            die("Prepare failed: " . $this->conn->error);
        }
    
        $stmt->bind_param($types, ...$params);
    
        return $stmt->execute();
    }
    

    public function deleteEmployee($mand) {
        // Kiểm tra xem nhân viên có ca làm trong bảng lichlamviec hay không
        $sqlCheck = "SELECT COUNT(*) as count FROM lichlamviec WHERE mand = ?";
        $stmtCheck = $this->conn->prepare($sqlCheck);
        $stmtCheck->bind_param("i", $mand);
        $stmtCheck->execute();
        $result = $stmtCheck->get_result();
        $row = $result->fetch_assoc();
        
        if ($row['count'] > 0) {
            // Nếu nhân viên có ca làm, không cho phép xóa
            return false;
        }
        
        // Nếu không có ca làm, thực hiện xóa logic
        $sql = "UPDATE nguoidung SET email = '', matkhau = '', mattlv = 2, mavaitro = NULL WHERE mand = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $mand);
        return $stmt->execute();
    }
    

    public function layNhanVienTheoVaiTro($mand) {
        $sql = "SELECT nguoidung.mand, nguoidung.tennd, nguoidung.ngaysinh, nguoidung.gioitinh, nguoidung.diachi, nguoidung.email, nguoidung.matkhau, nguoidung.sodienthoai, 
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

    // Mã hóa
    public function maKhoa($duLieu) {
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($this->cipher)); // Tạo IV ngẫu nhiên
        $duLieuMaHoa = openssl_encrypt($duLieu, $this->cipher, $this->taoKhoa, 0, $iv); // Mã hóa dữ liệu
        return base64_encode(json_encode(['duLieu' => $duLieuMaHoa, 'iv' => base64_encode($iv)])); // Đóng gói IV và dữ liệu mã hóa
    }

    // Giải mã
    public function giaiMa($duLieu) {
        $duLieuGiaiMa = json_decode(base64_decode($duLieu), true); // Giải mã JSON
        if (isset($duLieuGiaiMa['duLieu']) && isset($duLieuGiaiMa['iv'])) {
            $iv = base64_decode($duLieuGiaiMa['iv']); // Giải mã IV
            if (strlen($iv) === openssl_cipher_iv_length($this->cipher)) { // Kiểm tra độ dài IV
                return openssl_decrypt($duLieuGiaiMa['duLieu'], $this->cipher, $this->taoKhoa, 0, $iv); // Giải mã dữ liệu
            }
        }
        return false; // Trả về false nếu giải mã không thành công
    }

}
?>
