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
        <div style="text-align: center;  margin-top: 20px; ">  
            <h2>Tiếp nhận đơn hàng</h2>  
        </div>   

        <div class="list-dish">  
            <table class="dish-list">  
            <thead>  
            <tr>  
                <th style="text-align: center;">Mã đơn hàng</th>  
                <th style="text-align: center;">Ngày đặt</th> 
                <th style="text-align: center;">Chi tiết</th> 
               
<button></button>
            </tr>  
        </thead>  
        <tbody id="dish-list">  
            <?php
            include_once("controllers/cTiepNhanDonHang.php");
            $p = new controlDonHang();
            $kq = $p -> getAllDonHang();
        
            if($kq){
                $stt = 1;  // Biến để đánh số thứ tự
            while($r = mysqli_fetch_assoc($kq)){
                echo"<tr>";  
                echo "<td style='text-align: center;'> ".$stt." </td>";  
                echo "<td style='text-align: center;'>".$r['ngaydat']."</td>" ;
                echo "<td style='text-align: center;'>
                <a href='?page=chitiettiepnhandonhang&madonhang=".$r['madh']."'>
                    <button class='btnChiTietDonHang'>Xem chi tiết</button>
                </a>
              </td>"; 
              
              $stt++;  // Tăng số thứ tự lên 1
            }
            
        }else{
            echo "<script>alert('Không có dữ liệu!')</script>";
        }
            ?>
            </tbody>  
        </table>
        </div>  
        </div>          

        
<?php
if(isset($_REQUEST['submitXacNhan'])){
	include_once("controllers/cTiepNhanDonHang.php");
	$p = new controlDonHang();
	
$kq = $p -> cUpdateTinhTrang($masp, $_REQUEST['cbotinhtrang']);
	if($kq){
	echo "<script>alert('Thay đổi tình trạng thành công!');</script>";
	}else{
	echo "<script>alert('Thay đổi tình trạng thất bại!');</script>";	
	}

}
	
	
?>
</body>
</html>