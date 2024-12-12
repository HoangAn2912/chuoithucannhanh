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
        $hasError = false; // Biến để kiểm tra xem có lỗi xảy ra hay không
        $hasSelectedEmployee = false; // Biến để kiểm tra xem có nhân viên nào được chọn hay không
        $errorMessages = []; // Mảng để lưu trữ các thông báo lỗi
     
        foreach ($data as $employeeId => $attendance) {
            if (isset($attendance['status'])) { // Chỉ lưu nếu ô radio được chọn
                $hasSelectedEmployee = true; // Đánh dấu rằng có nhân viên được chọn
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
                    $errorMessages[] = "LỖI!!! Nhân viên $tennd đã được chấm công trong ca làm này!";
                    $hasError = true; // Đánh dấu rằng có lỗi xảy ra
                    continue;
                }
     
                $this->model->luuChamCong($mand, $status, $note, $date, $time, $shiftId);
            }
        }
     
        if (!$hasSelectedEmployee) {
            $_SESSION['error_message'] = "Bạn chưa chọn nhân viên nào để chấm công!";
        } elseif ($hasError) {
            $_SESSION['error_messages'] = $errorMessages; // Lưu các thông báo lỗi vào session
        } else {
            $_SESSION['success_message'] = "Chấm công thành công!";
        }
    }

    public function xemChamCong($mach, $shiftId, $date) {
        return $this->model->laydulieuchamcong($mach, $shiftId, $date);
    }

    //xemluongcuaday
    public function xemluong($mand, $hourlyRate = 50000, $month, $year) {
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
    header("Refresh: 0; url=index.php?page=ChamCong");
    exit();
}
?>