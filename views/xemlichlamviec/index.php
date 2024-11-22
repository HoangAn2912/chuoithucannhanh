<?php
if (!isset($_SESSION)) {
    session_start();
}
$mand = $_SESSION["dangnhap"];
$weekOffset = isset($_GET['weekOffset']) ? $_GET['weekOffset'] : 0;

// Lấy thông tin lịch làm việc
include_once("controllers/cLichLamViec.php");

$controller = new controlLichLamViec();
$lichLamViec = $controller->xemLichLamViec($mand, $weekOffset);

// Tính toán tuần hiện tại (weekOffset = 0 là tuần hiện tại)
$currentWeek = new DateTime();
$currentWeek->setISODate($currentWeek->format('Y'), $currentWeek->format('W'));
$currentWeekStart = $currentWeek->format('Y-m-d');

// Tính toán tuần cần xem dựa trên $weekOffset
$firstDayOfWeek = new DateTime();
$firstDayOfWeek->setISODate($firstDayOfWeek->format('Y'), $firstDayOfWeek->format('W'));
$firstDayOfWeek->modify("$weekOffset week"); // Áp dụng offset tuần nếu có
$firstDayOfWeekStart = $firstDayOfWeek->format('Y-m-d');

// Kiểm tra xem có phải tuần hiện tại hay không
$isCurrentWeek = ($firstDayOfWeekStart == $currentWeekStart);
?>

<?php
    require("layout/navnvbh.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lịch làm việc của nhân viên</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/xemlichlamviec/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <style>
        /* CSS tô màu hàng ngang */
        #th {
            background-color: #FFD580; /* Màu cam nhẹ */
            color: black; /* Chữ màu đen để dễ đọc */
            text-align: center;
        }
        th {
            background-color: #FFD580; /* Màu cam nhẹ */
            color: black; /* Chữ màu đen để dễ đọc */
            text-align: center;
        }
        td {
            text-align: center;
            vertical-align: middle;
            background-color: #f9f9f9; /* Nền nhạt */
        }
        td.has-shift {
            background-color: #d4edda; /* Nền xanh lá */
        }
        td.empty-shift {
            background-color: #f8d7da; /* Nền đỏ nhạt */
        }

        /* Thay đổi màu nền của các nút "Trước" và "Tiếp" */
    #prevWeek, #nextWeek {
        background-color: #FB9200; /* Màu cam bạn muốn */
        border-color: #FB9200; /* Đảm bảo viền cũng có màu cam */
        color: white; /* Màu chữ trắng để dễ đọc */
    }

    /* Thêm hiệu ứng khi hover */
    #prevWeek:hover, #nextWeek:hover {
        background-color: #e88000; /* Màu cam đậm khi hover */
        border-color: #e88000; /* Viền đổi màu khi hover */
    }
    </style>
</head>
<body>
<div class="container">
<div style="margin: auto 0; padding: 20px;">
    <h2 style="color: black; text-align: center;">LỊCH LÀM VIỆC CỦA NHÂN VIÊN</h2>

    <div class="shift">
 <?php
 $weekOffset = isset($_GET['weekOffset']) ? $_GET['weekOffset'] : 0;  // Lấy giá trị weekOffset từ form GET

 ?>       
<form method="GET" action="index.php?page=xemlichlamviec">
    <div class="text-center">
        <!-- Nút "Trước" luôn hiển thị và gửi giá trị weekOffset giảm đi 1 -->
        <input type="hidden" name="page" value="xemlichlamviec"> <!-- Giữ tham số page -->
        <button type="submit" id="prevWeek" class="btn " name="weekOffset" value="<?php echo $weekOffset - 1; ?>">Trước</button>
        
        <!-- Nút "Tiếp" chỉ hiển thị nếu không phải là tuần hiện tại -->
        <button type="submit" id="nextWeek" class="btn " name="weekOffset" value="<?php echo $weekOffset + 1; ?>" <?php echo $isCurrentWeek ? 'style="display:none;"' : ''; ?>>Tiếp</button>
    </div>
</form>




        <?php
        $daysOfWeek = ['Thứ hai', 'Thứ ba', 'Thứ tư', 'Thứ năm', 'Thứ sáu', 'Thứ bảy', 'Chủ Nhật'];
        $shiftTypes = ['Ca Sáng', 'Ca Trưa', 'Ca Chiều', 'Ca Tối'];

        // Lấy ngày hiện tại và xác định ngày đầu tuần (thứ Hai)
        $firstDayOfWeek = new DateTime();
        $firstDayOfWeek->setISODate($firstDayOfWeek->format('Y'), $firstDayOfWeek->format('W')); // Lấy ISO tuần
        $firstDayOfWeek->modify("$weekOffset week"); // Áp dụng offset tuần nếu có

        echo "<table class='table table-bordered'>";
        echo "<thead><tr><th>Ca/Ngày</th>";

        // Hiển thị các ngày trong tuần
        $dayIterator = clone $firstDayOfWeek; // Tạo bản sao của $firstDayOfWeek để không bị thay đổi trong vòng lặp
        foreach ($daysOfWeek as $day) {
            $date = $dayIterator->format('d/m/Y');
            echo "<th id='th'>$day ($date)</th>";
            $dayIterator->modify('+1 day'); // Chuyển sang ngày tiếp theo
        }
        echo "</tr></thead>";

        // Duyệt qua các ca làm việc
        foreach ($shiftTypes as $shiftType) {
            echo "<tr><td>$shiftType</td>";

            // Tạo bản sao của ngày đầu tuần trước khi bắt đầu vòng lặp các ca làm việc
            $dayIterator = clone $firstDayOfWeek; // Reset lại $dayIterator trước mỗi ca làm việc

            foreach ($daysOfWeek as $day) {
                $date = $dayIterator->format('Y-m-d'); // Định dạng ngày là 'Y-m-d' (ví dụ: 2024-11-19)
                $hasShift = false;

                // Kiểm tra xem có ca làm việc vào ngày này không
                foreach ($lichLamViec as $shift) {
                    // echo "{$shift['ngaylamviec']} == $date && {$shift['tenca']} == $shiftType<br>"; // Debug so sánh
                    if ($shift['ngaylamviec'] == $date && $shift['tenca'] == $shiftType) {
                        $hasShift = true;
                        break; // Đã tìm thấy ca làm việc, không cần kiểm tra tiếp
                    }
                }

                // Hiển thị kết quả
                if ($hasShift) {
                    echo "<td class='has-shift'>Có ca</td>";
                } else {
                    echo "<td class='empty-shift'>Trống</td>";
                }

                $dayIterator->modify('+1 day'); // Chuyển sang ngày tiếp theo
            }
            echo "</tr>";
        }

        echo "</table>";
        ?>

    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function changeWeek(offset) {
        var currentOffset = <?php echo $weekOffset; ?>; // Lấy giá trị tuần hiện tại từ PHP
        var newOffset = currentOffset + offset; // Thay đổi giá trị tuần

        // Nếu tuần trước (offset = -1) và hiện tại đang là tuần đầu tiên, thì không cho phép đi trước nữa
        if (newOffset < 0) return; // Không cho phép xem tuần trước nếu đang ở tuần 0

        // Lấy URL hiện tại và thay đổi giá trị weekOffset trong URL
        var currentUrl = window.location.href;
        var newUrl = new URL(currentUrl);

        // Thay đổi giá trị của weekOffset
        newUrl.searchParams.set('weekOffset', newOffset);

        // Gửi yêu cầu AJAX với URL mới
        $.ajax({
            url: newUrl.toString(), // Gửi yêu cầu đến URL mới
            type: 'GET',
            success: function(response) {
                // Cập nhật phần lịch làm việc trong response
                $('div.shift').html($(response).find('div.shift').html());
            }
        });
    }
</script>


</div>
</body>
</html>
