<?php

if (!isset($_SESSION)) {
    session_start();
}
if(!isset($_SESSION['dangnhap'])){
    header("Refresh: 0; url=index.php?page=dangnhap");
}
if (!isset($_SESSION['mavaitro']) || $_SESSION['mavaitro'] != 2) {
    header("Refresh: 0; url=index.php"); 
    exit();
}
$mach = $_SESSION["mach"];
$weekOffset = isset($_GET['weekOffset']) ? $_GET['weekOffset'] : 1;

// Lấy thông tin lịch làm việc
include_once("controllers/cPhanCongCaLam.php");

$controller = new controlPhanCongCaLam();
$lichLamViec = $controller->xemLichLamViec( $weekOffset);

// Tính toán tuần cần xem dựa trên $weekOffset
// Lấy ngày đầu tuần (Thứ hai) của tuần tiếp theo
$firstDayOfWeek = new DateTime();
$firstDayOfWeek->setISODate($firstDayOfWeek->format('Y'), $firstDayOfWeek->format('W')); // Cộng thêm 1 tuần
$firstDayOfWeek->modify("$weekOffset week"); // Áp dụng offset tuần nếu có

?>
<?php
    require("layout/navqlch.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lịch làm việc của nhân viên</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/phancongcalam/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" >
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>


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
            
            vertical-align: middle;
            background-color: #f9f9f9; 
        }
        td.has-shift {
            background-color: #d4edda; 
            text-align: center;
        }
        td.empty-shift {
            background-color: #f8d7da; 
            text-align: center;
        }
        
        th:first-child, td:first-child {
            width: 120px; 
            white-space: nowrap; 
            text-align: center; 
        }

        .modal-backdrop {
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-footer {
    display: flex;
    justify-content: center; 
    gap: 10px; 
}

    </style>
</head>


<body>
<div class="container">
<div style="margin: auto 0; padding: 20px;">
    <h2 style="color: black; text-align: center;">PHÂN CÔNG CA LÀM</h2>

    <div class="shift">
    <?php
    $daysOfWeek = ['Thứ hai', 'Thứ ba', 'Thứ tư', 'Thứ năm', 'Thứ sáu', 'Thứ bảy', 'Chủ Nhật'];
    $shiftTypes = ['Ca Sáng', 'Ca Trưa', 'Ca Chiều', 'Ca Tối'];

    // Lấy ngày đầu tuần (Thứ hai) của tuần cần xem
    $firstDayOfWeek = new DateTime();
    $firstDayOfWeek->setISODate($firstDayOfWeek->format('Y'), $firstDayOfWeek->format('W'));
    $firstDayOfWeek->modify("$weekOffset week"); 

    echo "<table class='table table-bordered'>";
    echo "<thead>";
    echo "<tr><th id='th'>Ngày/Ca</th>";
    foreach ($shiftTypes as $shiftType) {
        echo "<th id='th'>$shiftType</th>";
    }
    echo "</tr>";
    echo "</thead>";

    // Duyệt qua các ngày trong tuần
    $dayIterator = clone $firstDayOfWeek; 
    foreach ($daysOfWeek as $day) {
        $date = $dayIterator->format('Y-m-d'); 
        echo "<tr>";
        echo "<td id='th'>$day <br> ({$dayIterator->format('d/m/Y')})</td>"; 

        // Duyệt qua các ca làm việc
        foreach ($shiftTypes as $shiftType) {
            $assignedEmployees = []; 
            $nvbhCount = 0; 
            $nvbCount = 0;  
        
            foreach ($lichLamViec as $shift) {
                if ($shift['ngaylamviec'] == $date && $shift['tenca'] == $shiftType) {
                    if ($shift['tenvaitro'] == "Nhân viên bán hàng") {
                        $nvbhCount++;
                        $tenvaitro = "NVBH";
                    } elseif ($shift['tenvaitro'] == "Nhân viên bếp") {
                        $nvbCount++;
                        $tenvaitro = "NVB";
                    }
                    $assignedEmployees[] = "{$shift['tennd']} ({$tenvaitro})";
                }
            }
        
            echo "<td class='" . (count($assignedEmployees) > 0 ? "has-shift" : "empty-shift") . "'>";
        
            // Hiển thị danh sách nhân viên
            foreach ($assignedEmployees as $employee) {
                echo "$employee<br>";
            }
        
           // Hiển thị nút phân công chỉ khi có nhóm nhân viên chưa đủ
            if ($nvbhCount < 3 || $nvbCount < 2) {
                echo "<button class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#assignShiftModal' data-date='$date' data-shift='$shiftType'>Phân công ca</button>
";
            }
            echo "</td>";
        }
        echo "</tr>";

        $dayIterator->modify('+1 day'); // Chuyển sang ngày tiếp theo
    }

    echo "</table>";


    
?>

<!-- Modal Form phân công ca làm -->
<div class="modal fade" id="assignShiftModal" tabindex="-1" role="dialog" aria-labelledby="assignShiftModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="assignShiftModalLabel">Phân công ca làm</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Hiển thị ngày và ca làm dạng nằm ngang -->
        <div class="d-flex justify-content-between mb-3">
          <p><strong>Ngày:</strong> <span id="shiftDateText"></span></p>
          <p><strong>Ca làm:</strong> <span id="shiftTypeText"></span></p>
        </div>

<div class="form-group mb-3">
        <label for="employeeSales"><strong>Chọn nhân viên:</strong></label>
        <select class="form-control" id="employeeSales" name="employeeSales">
            <!-- ajax nó sẽ gọi thằng option ra chỗ này vì nó bắt được id select -->
        </select>
    </div>

      </div>
      <div class="modal-footer text-center">
        <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Hủy phân công</button>
        <button type="submit" class="btn btn-success">Lưu phân công</button>
      </div>
    </div>
  </div>
</div>

<script>
   $('#assignShiftModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget); 
    var date = button.data('date'); 
    var shift = button.data('shift'); 

    var modal = $(this);
    modal.find('#shiftDateText').text(date); 
    modal.find('#shiftTypeText').text(shift); 

    
    $.ajax({
        url: "controllers/cXuLyPCCL.php", 
        method: "POST",
        data: {
            ngaydangky: date,
            macalam: shift
        },
        success: function(response) {
            $('#employeeSales').html(response); 
        },
        error: function() {
            alert("Lỗi khi tải dữ liệu nhân viên.");
        }
    });
});

$('#assignShiftModal').on('click', '.btn-success', function() {
    var mand = $("#employeeSales").val(); 
    if (!mand) {
        alert("Vui lòng chọn nhân viên.");
        return;
    }

    var ngaydangky = $("#shiftDateText").text(); 
    var macalam = $("#shiftTypeText").text(); 
    
    $.ajax({
        url: "controllers/cXuLyPCCL.php", 
        method: "POST",
        data: {
            ngaydangky: ngaydangky,
            macalam: macalam,
            mand: mand
        },
        success: function(response) {
            $('#assignShiftModal').modal('hide'); 
            setTimeout(function() {
                location.reload(); 
            }, 100); 
        },
        error: function() {
            alert("Lỗi khi phân công ca làm.");
        }
    });
});

</script>

</div>
</body>
</html>
