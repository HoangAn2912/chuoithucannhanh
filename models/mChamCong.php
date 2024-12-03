<?php
require_once __DIR__ . '/mketnoi.php';

class mChamCong {
    private $conn;

    public function __construct() {
        $ketnoi = new ketnoi();
        $this->conn = $ketnoi->ketnoi();
    }

    public function getNhanVien($mach, $search = '') {
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

    public function getNhanVienByCuaHang($employeeId, $mach) {
        $sql = "SELECT nguoidung.mand, tennd FROM nguoidung WHERE nguoidung.mand = ? AND nguoidung.mach = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ii", $employeeId, $mach);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function getCaLam() {
        $sql = "SELECT macalam, tenca FROM calam";
        $result = $this->conn->query($sql);
        $CaLam = [];
        while ($row = $result->fetch_assoc()) {
            $CaLam[] = $row;
        }
        return $CaLam;
    }

    public function luuChamCong($mand, $status, $note, $date, $time, $shiftId) {
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
public function laydulieuchamcong($mach, $shiftId, $date) {
    $sql = "SELECT nguoidung.tennd,COALESCE(vaitro.tenvaitro, 'Không có') AS tenvaitro, calam.tenca, chamcong.trangthai, chamcong.ghichu
            FROM chamcong
            JOIN nguoidung ON chamcong.mand = nguoidung.mand
            LEFT JOIN vaitro ON nguoidung.mavaitro = vaitro.mavaitro
            JOIN calam ON chamcong.macalam = calam.macalam
            WHERE chamcong.macalam = ? AND chamcong.ngaychamcong = ? AND nguoidung.mach = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("isi", $shiftId, $date, $mach);
    $stmt->execute();
    $result = $stmt->get_result();
    $attendanceDetails = [];
    while ($row = $result->fetch_assoc()) {
        $attendanceDetails[] = $row;
    }
    return $attendanceDetails;
}

public function kiemTraChamCongChua($mand, $shiftId, $date) {
    $sql = "SELECT COUNT(*) as count FROM chamcong WHERE mand = ? AND macalam = ? AND ngaychamcong = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("iis", $mand, $shiftId, $date);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    return $row['count'] > 0;
}

}
?>
