<?php
require_once 'models/mketnoi.php';
class mChamCong {
    private $conn;

    public function __construct() {
        $ketnoi = new ketnoi();
        $this->conn = $ketnoi->ketnoi();
    }

    public function getEmployees($mach, $search = '') {
        $sql = "SELECT nguoidung.mand, nguoidung.tennd, vaitro.tenvaitro
                FROM nguoidung
                LEFT JOIN vaitro ON nguoidung.mavaitro = vaitro.mavaitro
                WHERE nguoidung.mach = ? AND (vaitro.mavaitro = 3 OR vaitro.mavaitro = 4)";
        
        if (!empty($search)) {
            $sql .= " AND nguoidung.tennd LIKE ?";
        }

        $stmt = $this->conn->prepare($sql);
        if (!empty($search)) {
            $searchTerm = "%$search%";
            $stmt->bind_param("is", $mach, $searchTerm);
        } else {
            $stmt->bind_param("i", $mach);
        }
        $stmt->execute();
        $result = $stmt->get_result();
        $employees = [];
        while ($row = $result->fetch_assoc()) {
            $employees[] = $row;
        }
        return $employees;
    }

    public function getEmployeeById($employeeId, $mach) {
        $sql = "SELECT nguoidung.mand
                FROM nguoidung
                WHERE nguoidung.mand = ? AND nguoidung.mach = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ii", $employeeId, $mach);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function getShifts() {
        $sql = "SELECT macalam, tenca FROM calam";
        $result = $this->conn->query($sql);
        $shifts = [];
        while ($row = $result->fetch_assoc()) {
            $shifts[] = $row;
        }
        return $shifts;
    }

    public function saveAttendance($mand, $status, $note, $date, $time, $shiftId) {
        $sql = "INSERT INTO chamcong (mand, macalam, ngaychamcong, thoigianvao, trangthai, ghichu) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        if ($stmt === false) {
            die('Prepare failed: ' . htmlspecialchars($this->conn->error));
        }
        $stmt->bind_param("iissss", $mand, $shiftId, $date, $time, $status, $note);
        if (!$stmt->execute()) {
            die('Execute failed: ' . htmlspecialchars($stmt->error));
        }
    }
}
?>
