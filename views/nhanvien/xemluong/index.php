<?php
// Sidebar
echo '<link rel="stylesheet" href="css/DAY/day.css">';
require("layout/navnvbh.php");

// Thêm liên kết đến thư viện SweetAlert2
echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
?>

<div class="sidebar">
    <form action="" method="post">
        <h4>Cửa hàng</h4>
        <label><input type="checkbox" name="cuahang[]" value="1"> Cửa hàng 1</label><br>
        <label><input type="checkbox" name="cuahang[]" value="2"> Cửa hàng 2</label><br>
        <label><input type="checkbox" name="cuahang[]" value="3"> Cửa hàng 3</label><br>
        <label><input type="checkbox" name="cuahang[]" value="4"> Cửa hàng 4</label><br>
        <label><input type="checkbox" name="cuahang[]" value="5"> Cửa hàng 5</label><br>
    </form>
</div>

<div style="margin-left: 210px; padding: 20px;" class="content">
    <h4 style="color: #db5a04">Xem Lương</h4>
    <form action="" method="post">
        <label for="month">Chọn tháng:</label>
        <select name="month" id="month" style="width: 200px; padding: 5px; border-radius: 5px; border: 1px solid #ccc;">
            <option value="">-- Chọn tháng --</option>
            <option value="2024-01">Tháng 1 - 2024</option>
            <option value="2024-02">Tháng 2 - 2024</option>
            <option value="2024-03">Tháng 3 - 2024</option>
            <option value="2024-04">Tháng 4 - 2024</option>
            <option value="2024-05">Tháng 5 - 2024</option>
            <option value="2024-06">Tháng 6 - 2024</option>
            <option value="2024-07">Tháng 7 - 2024</option>
            <option value="2024-08">Tháng 8 - 2024</option>
            <option value="2024-09">Tháng 9 - 2024</option>
            <option value="2024-10">Tháng 10 - 2024</option>
        </select>
        <button type="submit" style="padding: 5px 10px; margin-left: 10px; border: none; background-color: #db5a04; color: white; border-radius: 5px;">Xem thông tin lương</button>
    </form>

    <?php
    // Mẫu dữ liệu lương
    $salaryData = [
        '2024-01' => [
            'employee_id' => '001',
            'employee_name' => 'Nguyễn Văn A',
            'base_salary' => '10,000,000 VNĐ',
            'bonus' => '1,000,000 VNĐ',
            'total_salary' => '11,000,000 VNĐ',
            'shift_salary' => '1,500,000 VNĐ' // Lương theo ca
        ],
        '2024-02' => [
            'employee_id' => '001',
            'employee_name' => 'Nguyễn Văn A',
            'base_salary' => '10,000,000 VNĐ',
            'bonus' => '1,200,000 VNĐ',
            'total_salary' => '11,200,000 VNĐ',
            'shift_salary' => '1,600,000 VNĐ' // Lương theo ca
        ],
        '2024-03' => [
            'employee_id' => '001',
            'employee_name' => 'Nguyễn Văn A',
            'base_salary' => '10,000,000 VNĐ',
            'bonus' => '1,500,000 VNĐ',
            'total_salary' => '11,500,000 VNĐ',
            'shift_salary' => '1,700,000 VNĐ' // Lương theo ca
        ],
        // Thêm dữ liệu mẫu cho các tháng khác nếu cần
    ];

    // Xử lý xem thông tin lương
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['month'])) {
        $selectedMonth = $_POST['month'];
    
        if (array_key_exists($selectedMonth, $salaryData)) {
            $salaryInfo = $salaryData[$selectedMonth];
            echo '<div style="text-align: center;">'; // Căn giữa nội dung
            echo '<h4>Thông tin lương cho tháng: ' . htmlspecialchars($selectedMonth) . '</h4>';
            echo '</div>'; // Kết thúc thẻ div căn giữa
    
            echo '<table style="width: 100%; border-collapse: collapse; margin-top: 20px;">';
            echo '<tr style="background-color: #f2f2f2;"><th>Mã nhân viên</th><th>Tên nhân viên</th><th>Lương cơ bản</th><th>Tiền thưởng</th><th>Lương theo ca</th><th>Tổng lương thực nhận</th></tr>';
            echo '<tr>';
            echo '<td>' . htmlspecialchars($salaryInfo['employee_id']) . '</td>';
            echo '<td>' . htmlspecialchars($salaryInfo['employee_name']) . '</td>';
            echo '<td>' . htmlspecialchars($salaryInfo['base_salary']) . '</td>';
            echo '<td>' . htmlspecialchars($salaryInfo['bonus']) . '</td>';
            echo '<td>' . htmlspecialchars($salaryInfo['shift_salary']) . '</td>'; // Hiển thị lương theo ca
            echo '<td>' . htmlspecialchars($salaryInfo['total_salary']) . '</td>';
            echo '</tr>';
            echo '</table>';
        } else {
            echo '<div style="text-align: center;">'; // Căn giữa nội dung
            echo '<p>Không có thông tin lương cho tháng đã chọn.</p>';
            echo '</div>'; // Kết thúc thẻ div căn giữa
        }
    }
    ?>

    <button onclick="window.location.href='index.php?page=trangchu';" style="margin-top: 20px; padding: 5px 10px; border: none; background-color: #ccc; color: black; border-radius: 5px;">Quay lại</button>
</div>

<script>
function showSalaryDetails() {
    // Thêm logic cho việc hiển thị chi tiết lương
    Swal.fire({
        title: 'Chi tiết lương',
        text: 'Thông tin chi tiết về lương sẽ được hiển thị ở đây.',
        confirmButtonText: 'Đóng'
    });
}

function confirmSalaryView() {
    Swal.fire({
        title: 'Xem thông tin lương?',
        showCancelButton: true,
        confirmButtonText: 'Xem',
        cancelButtonText: 'Không'
    }).then((result) => {
        if (result.isConfirmed) {
            showSalaryDetails(); // Gọi hàm để hiển thị chi tiết lương
        }
    });
}
</script>