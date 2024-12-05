<?php 
if (!isset($_SESSION)) {
    session_start();
}
$mach = $_SESSION["mach"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiếp nhận đơn hàng</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">  
    <link rel="stylesheet" href="css/tiepnhandonhang/style.css">   
</head>
<body>

<?php
    require("layout/navnvb.php");
?>

<div class="main">  
    <div style="text-align: center;  margin-top: 20px;">  
        <h2>Tiếp nhận đơn hàng</h2>  
    </div>   

    <div class="list-dish">  
        <table class="dish-list">  
            <thead>  
                <tr>  
                    <th style="text-align: center;">STT</th>  
                    <th style="text-align: center;">Tên món ăn</th>  
                    <th style="text-align: center;">Hình ảnh</th>  
                    <th style="text-align: center;">Số lượng</th>
                    <th style="text-align: center;">Đơn giá</th>
                    <th style="text-align: center;">Giảm giá</th>
                    <th style="text-align: center;">Tổng tiền</th> 
                    <th style="text-align: center;">Ngày đặt</th>  
                    <th style="text-align: center;">Tình trạng</th>
                </tr>  
            </thead>  
            <tbody id="dish-list">  
                <?php
                include_once("controllers/cTiepNhanDonHang.php");
                $p = new controlDonHang();
                $kq = $p->getAllDonHang($mach);
                
                $tinhTrangOptions = $p->getTinhTrangOptions();

                if ($kq) {
                    $stt = 1;
                    while ($r = mysqli_fetch_assoc($kq)) {
                        $tongtien = $r['soluong'] * $r['dongia'] - ($r['giamgia'] ?? 0);
                        echo "<tr>";
                        echo "<td style='text-align: center;'>".$stt."</td>";
                        echo "<td style='text-align: center;'>".$r['tenma']."</td>";
                        echo "<td style='text-align: center;'><img src='img/" . $r['hinhanh'] . "' width='50' height='50'></td>";
                        echo "<td style='text-align: center;'>".$r['soluong']."</td>";
                        echo "<td style='text-align: center;'>".number_format($r['dongia'], 0, ',', '.')." VNĐ</td>";
                        echo "<td style='text-align: center;'>".number_format($r['giamgia'], 0, ',', '.')." VNĐ</td>";
                        echo "<td style='text-align: center;'>".number_format($tongtien, 0, ',', '.')." VNĐ</td>";
                        echo "<td style='text-align: center;'>".$r['ngaydat']."</td>";

                        // Reset con trỏ dữ liệu về đầu danh sách trước khi hiển thị các tùy chọn tình trạng
                        mysqli_data_seek($tinhTrangOptions, 0); 

                        // Dropdown tình trạng với các tùy chọn từ $tinhTrangOptions
                        echo "<td style='text-align: center;'><select onchange='confirmUpdateTinhTrang({$r['madh']}, this.value)'>";
                        while ($option = mysqli_fetch_assoc($tinhTrangOptions)) {
                            $selected = ($r['tinhtrang'] == $option['tenttdh']) ? 'selected' : '';
                            echo "<option value='{$option['mattdh']}' {$selected}>{$option['tenttdh']}</option>";
                        }
                        echo "</select></td>";
                        
                        $stt++;
                    }
                } else {
                    echo "Không có dữ liệu!";
                }
                ?>

            </tbody>  
        </table>
    </div>  
</div>          

<script>
// Hàm xác nhận thay đổi tình trạng đơn hàng
function confirmUpdateTinhTrang(madh, mattdh) {
    if (confirm("Bạn có chắc chắn muốn thay đổi tình trạng đơn hàng này?")) {
        updateTinhTrang(madh, mattdh);
        
    } else {
        console.log("Thay đổi tình trạng bị hủy bỏ.");
    }
}

// Hàm thực hiện gửi dữ liệu cập nhật tình trạng đơn hàng qua AJAX
function updateTinhTrang(madh, mattdh) {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "controllers/updateTinhTrangDH.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            alert("Tình trạng đã được cập nhật!");
            location.reload();        
        }
    };
    
    // Gửi dữ liệu qua POST
    xhr.send("madh=" + encodeURIComponent(madh) + "&mattdh=" + encodeURIComponent(mattdh));
}

</script>

</body>
</html>
