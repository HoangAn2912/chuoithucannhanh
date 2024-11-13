<?php
require_once __DIR__ . '/../models/mChamCong.php';

class cChamCong {
    private $model;

    public function __construct() {
        $this->model = new mChamCong();
        date_default_timezone_set('Asia/Ho_Chi_Minh'); // Thiết lập múi giờ Việt Nam
    }

    public function getEmployees($mach, $search = '') {
        return $this->model->getEmployees($mach, $search);
    }

    public function getShifts() {
        return $this->model->getShifts();
    }

    public function saveAttendance($data) {
        foreach ($data as $employeeId => $attendance) {
            if (isset($attendance['status'])) { // Chỉ lưu nếu ô radio được chọn
                $status = $attendance['status'];
                $note = $attendance['note'] ?? '';
                $date = date('Y-m-d');
                $time = date('H:i:s'); // Lấy thời gian hiện tại theo múi giờ Việt Nam
                $shiftId = $attendance['shift'] ?? 0;
                
                $employee = $this->model->getEmployeeById($employeeId, $_SESSION['mach']);
                $mand = $employee['mand']; // Lấy mã người dùng từ thông tin nhân viên
                $this->model->saveAttendance($mand, $status, $note, $date, $time, $shiftId);
            }
        }
    }

public function xemChamCong($mach, $shiftId, $date) {
    return $this->model->laydulieuchamcong($mach, $shiftId, $date);
}

    

}

$loggedInManagerStoreId = $_SESSION['mach'];
$cChamCong = new cChamCong();
$searchQuery = '';
if (isset($_GET['search'])) {
    $searchQuery = $_GET['search'];
}
$employees = $cChamCong->getEmployees($loggedInManagerStoreId, $searchQuery);
$shifts = $cChamCong->getShifts();

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
    $cChamCong->saveAttendance($attendanceData);
}
?>
