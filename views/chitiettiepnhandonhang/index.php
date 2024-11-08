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
            <h2>Chitiet Tiếp nhận đơn hàng</h2>  
        </div>   

        <div class="list-dish">  
            <table class="dish-list">  
            <thead>  
            <tr>  
                <th style="text-align: center;">Mã đơn hàng</th>  
                <th style="text-align: center;">Tên món ăn</th>  
  
                <th style="text-align: center;">Số lượng</th>
                
            </tr>  
        </thead>  
        <tbody id="dish-list">  
            <?php
            include_once("controllers/cTiepNhanDonHang.php");
            $p = new controlDonHang();
            $kq = $p -> getAllDonHang($_GET['madonhang']);
        
            if($kq){
            while($r = mysqli_fetch_assoc($kq)){
                echo"<tr>";  
                echo "<td><a href='?page=chitiettiepnhandonhang?madonhang=" . $r['madh'] . "'>" . $r['madh'] . "</a></td>";  
                
                echo "<td>".$r['ngaydat']."</td>" ;
                echo "<td>".$r['tongtien']."</td>"; 
              
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