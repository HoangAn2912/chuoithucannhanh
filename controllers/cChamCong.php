<?php
require_once 'models/mChamCong.php';

class cChamCong {
    private $model;

    public function __construct() {
        $this->model = new mChamCong();
    }

    public function getEmployees($mach) {
        return $this->model->getEmployees($mach);
    }

    public function getShifts() {
        return $this->model->getShifts();
    }

    public function saveAttendance($data) {
        foreach ($data as $employeeId => $attendance) {
            $status = $attendance['status'] ?? 'absent';
            $note = $attendance['note'] ?? '';
            $date = date('Y-m-d');
            $time = date('H:i:s');
            $shiftId = $attendance['shift'] ?? 0;
            
            // Lấy thông tin nhân viên
            $employee = $this->model->getEmployeeById($employeeId);
            
            // Xác định mã nhân viên bán hàng và mã nhân viên bếp
            $manvbh = $employee['manvbh'] ?? 0;
            $manvb = $employee['manvb'] ?? 0;
            
            // Kiểm tra loại nhân viên và đặt giá trị tương ứng
            if ($manvbh != 0) {
                $this->model->saveAttendance(['manvb' => 0, 'manvbh' => $manvbh], $status, $note, $date, $time, $shiftId);
            } else {
                $this->model->saveAttendance(['manvb' => $manvb, 'manvbh' => 0], $status, $note, $date, $time, $shiftId);
            }
        }
    }
}

// Simulate logged-in manager's store ID
$loggedInManagerStoreId = 1; // This should be dynamically set based on the logged-in manager

// Main script
$cChamCong = new cChamCong();
$employees = $cChamCong->getEmployees($loggedInManagerStoreId);
$shifts = $cChamCong->getShifts();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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