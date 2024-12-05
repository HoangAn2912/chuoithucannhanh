<?php
require_once __DIR__ . '/../models/mChamCong.php';

class cChamCong {
    private $model;

    public function __construct() {
        $this->model = new mChamCong();
        date_default_timezone_set('Asia/Ho_Chi_Minh'); // Thiết lập múi giờ Việt Nam
    }

    public function getNhanVien($mach, $search = '') {
        return $this->model->getNhanVien($mach, $search);
    }

    public function getCaLam() {
        return $this->model->getCaLam();
    }

    public function luuChamCong($data) {
        foreach ($data as $employeeId => $attendance) {
            if (isset($attendance['status'])) { // Chỉ lưu nếu ô radio được chọn
                $status = $attendance['status'];
                $note = $attendance['note'] ?? '';
                $date = date('Y-m-d');
                $time = date('H:i:s'); // Lấy thời gian hiện tại theo múi giờ Việt Nam
                $shiftId = $attendance['shift'] ?? 0;
                
                $employee = $this->model->getNhanVienByCuaHang($employeeId, $_SESSION['mach']);
                $mand = $employee['mand']; // Lấy mã người dùng từ thông tin nhân viên
                $tennd = $employee['tennd']; // Lấy tên nhân viên
    
                // Kiểm tra xem nhân viên đã được chấm công cho ca làm và ngày này chưa
                if ($this->model->kiemTraChamCongChua($mand, $shiftId, $date)) {
                    $_SESSION['error_message'] = "LỖI! Nhân viên $tennd đã được chấm công trước đó!";
                    continue;
                }
    
                $this->model->luuChamCong($mand, $status, $note, $date, $time, $shiftId);
            }
        }
    }

public function xemChamCong($mach, $shiftId, $date) {
    return $this->model->laydulieuchamcong($mach, $shiftId, $date);
}

//xemluongcuaday
public function xemluong($mand, $hourlyRate = 25000, $month, $year) {
    // Gọi phương thức tinhluong trong model, truyền thêm tham số tháng và năm
    return $this->model->tinhluong($mand, $hourlyRate, $month, $year);
}
//endxemluongcuaday
    
}

$loggedInManagerStoreId = $_SESSION['mach'];
$cChamCong = new cChamCong();
$searchQuery = '';
if (isset($_GET['search'])) {
    $searchQuery = $_GET['search'];
}
$employees = $cChamCong->getNhanVien($loggedInManagerStoreId, $searchQuery);
$CaLam = $cChamCong->getCaLam();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !isset($_POST['search'])) {
    $attendanceData = [];
    foreach ($_POST as $key => $value) {
        if (strpos($key, 'status_') === 0) {
            $employeeId = str_replace('status_', '', $key);
            $attendanceData[$employeeId]['status'] = $value;
        } elseif (strpos($key, 'note_') === 0) {
            $employeeId = str_replace('note_', '', $key);
            $attendanceData[$employeeId]['note'] = $value;
        } elseif (strpos($key, 'shift_') === 0) {
            $employeeId = str_replace('shift_', '', $key);
            $attendanceData[$employeeId]['shift'] = $value;
        }
    }
    
    $cChamCong->luuChamCong($attendanceData);
}
?>
