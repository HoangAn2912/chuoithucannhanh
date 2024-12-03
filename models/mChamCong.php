<?php
require_once __DIR__ . '/mketnoi.php';

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


// hàm tính lương
public function tinhluong($mand, $hourlyRate = 25000, $month = null, $year = null) {
    // Truy vấn số ca làm việc của nhân viên, lọc theo tháng và năm nếu có
    $sql = "SELECT *, cc.macalam, COUNT(*) as soCa
            FROM chamcong cc 
            WHERE cc.trangthai LIKE '%Có mặt%' AND cc.mand = ?";

    // Thêm điều kiện lọc theo tháng và năm nếu được cung cấp
    if ($month !== null) {
        $sql .= " AND MONTH(cc.ngaychamcong) = ?";
    }
    if ($year !== null) {
        $sql .= " AND YEAR(cc.ngaychamcong) = ?";
    }

    $sql .= " GROUP BY cc.macalam";

    // Chuẩn bị câu truy vấn
    $stmt = $this->conn->prepare($sql);
    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($this->conn->error));
    }

    // Ràng buộc tham số cho câu truy vấn
    if ($month !== null && $year !== null) {
        $stmt->bind_param("iii", $mand, $month, $year);
    } elseif ($month !== null) {
        $stmt->bind_param("ii", $mand, $month);
    } elseif ($year !== null) {
        $stmt->bind_param("ii", $mand, $year);
    } else {
        $stmt->bind_param("i", $mand);
    }

    // Thực thi câu truy vấn
    $stmt->execute();
    $result = $stmt->get_result();

    // Khởi tạo biến để lưu kết quả
    $tongCa = 0; // Tổng số ca làm việc
    $chiTietCa = []; // Lưu chi tiết số ca theo mã ca

    // Duyệt qua kết quả và tính tổng số ca làm việc
    while ($row = $result->fetch_assoc()) {
        $chiTietCa[$row['macalam']] = $row['soCa'];
        $tongCa += $row['soCa'];
    }

    // Tính tổng số giờ làm (1 ca = 4 giờ)
    $totalHours = $tongCa * 4;

    // Tính lương (số giờ làm * lương mỗi giờ)
    $totalSalary = $totalHours * $hourlyRate;

    // Trả về kết quả chi tiết
    return [
        'tongCa' => $tongCa,
        'chiTietCa' => $chiTietCa,
        'totalHours' => $totalHours,
        'hourlyRate' => $hourlyRate,
        'totalSalary' => $totalSalary,
    ];
}

}
?>
