<?php
if (!isset($_SESSION)) {
    session_start();
}
if(!isset($_SESSION['dangnhap'])){
    header("Refresh: 0; url=index.php?page=dangnhap");
}
$mand = $_SESSION["dangnhap"];
$weekOffset = isset($_GET['weekOffset']) ? $_GET['weekOffset'] : 0;

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
$firstDayOfWeek->modify("$weekOffset week"); 
$firstDayOfWeekStart = $firstDayOfWeek->format('Y-m-d');

// Kiểm tra xem có phải tuần hiện tại hay không
$isCurrentWeek = ($firstDayOfWeekStart == $currentWeekStart);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lịch làm việc của nhân viên</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/xemlichlamviec/style.css">
    <link rel="stylesheet" href="css/DAY/day.css?v=5">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <style>
        .navbar {
            display: flex;
            justify-content: center;
            align-items: center; 
        }
        #th {
            background-color: #FFD580; 
            color: black; 
            text-align: center;
        }
        th {
            background-color: #FFD580; 
            color: black; 
            text-align: center;
        }
        td {
            text-align: center;
            vertical-align: middle;
            background-color: #f9f9f9; 
        }
        td.has-shift {
            background-color: #d4edda; 
        }
        td.empty-shift {
            background-color: #f8d7da; 
        }

            .btn-outline-warning {
            color: #FB9200; 
            border-color: #FB9200; 
        }

        .btn-outline-warning:hover {
            color: #212529;
            background-color: #f7a63d; 
            border-color: #ffc107; 
        }
    </style>
</head>

<body>
<?php
include_once("controllers/cLichLamViec.php");
$p = new controlLichLamViec();
$mavaitro = $p->getNguoidung($mand);

if ($mavaitro == 3) {
    require("layout/navnvbh.php");
} elseif ($mavaitro == 4) {
    require("layout/navnvb.php");
} else {
    echo "Vai trò không xác định.";
}
?>
<div class="container">
<div style="margin: auto 0; padding: 20px;">
    <h2 style="color: black; text-align: center;">LỊCH LÀM VIỆC CỦA NHÂN VIÊN</h2>

    <div class="shift">
 <?php
 $weekOffset = isset($_GET['weekOffset']) ? $_GET['weekOffset'] : 0;  

 ?>       
<form method="GET" action="index.php?page=xemlichlamviec">
    <div class="text-center">
    <div class="text-center">
    <!-- Nút "Tuần trước" -->
    <input type="hidden" name="page" value="xemlichlamviec"> 
    <button type="submit" id="prevWeek" class="btn btn-outline-warning" name="weekOffset" value="<?php echo $weekOffset - 1; ?>">Tuần trước</button>

    <!-- Nút "Tuần hiện tại" -->
    <button type="submit" id="currentWeek" class="btn btn-outline-warning" name="weekOffset" value="0">Tuần hiện tại</button>

    <!-- Nút "Tuần sau" -->
    <button type="submit" id="nextWeek" class="btn btn-outline-warning" name="weekOffset" value="<?php echo $weekOffset + 1; ?>">Tuần sau</button>
</div>

    </div>
</form>

        <?php
        $daysOfWeek = ['Thứ hai', 'Thứ ba', 'Thứ tư', 'Thứ năm', 'Thứ sáu', 'Thứ bảy', 'Chủ Nhật'];
        $shiftTypes = ['Ca Sáng', 'Ca Trưa', 'Ca Chiều', 'Ca Tối'];

        // Lấy ngày hiện tại và xác định ngày đầu tuần (thứ Hai)
        $firstDayOfWeek = new DateTime();
        $firstDayOfWeek->setISODate($firstDayOfWeek->format('Y'), $firstDayOfWeek->format('W')); 
        $firstDayOfWeek->modify("$weekOffset week"); 

        echo "<table class='table table-bordered'>";
        echo "<thead><tr><th>Ca/Ngày</th>";

        // Hiển thị các ngày trong tuần
        $dayIterator = clone $firstDayOfWeek; 
        foreach ($daysOfWeek as $day) {
            $date = $dayIterator->format('d/m/Y');
            echo "<th id='th'>$day ($date)</th>";
            $dayIterator->modify('+1 day'); 
        }
        echo "</tr></thead>";

        // Duyệt qua các ca làm việc
        foreach ($shiftTypes as $shiftType) {
            echo "<tr><td>$shiftType</td>";

            $dayIterator = clone $firstDayOfWeek; 

            foreach ($daysOfWeek as $day) {
                $date = $dayIterator->format('Y-m-d'); 
                $hasShift = false;

                // Kiểm tra xem có ca làm việc vào ngày này không
                foreach ($lichLamViec as $shift) {
                    if ($shift['ngaylamviec'] == $date && $shift['tenca'] == $shiftType) {
                        $hasShift = true;
                        break; 
                    }
                }

                // Hiển thị kết quả
                if ($hasShift) {
                    echo "<td class='has-shift'>Có ca</td>";
                } else {
                    echo "<td class='empty-shift'>Trống</td>";
                }

                $dayIterator->modify('+1 day'); 
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
        var currentOffset = <?php echo $weekOffset; ?>; 
        var newOffset = currentOffset + offset; 
        
        if (newOffset < 0) return; 

        var currentUrl = window.location.href;
        var newUrl = new URL(currentUrl);

        newUrl.searchParams.set('weekOffset', newOffset);

        $.ajax({
            url: newUrl.toString(), 
            type: 'GET',
            success: function(response) {
                $('div.shift').html($(response).find('div.shift').html());
            }
        });
    }
</script>


</div>
</body>
</html>
