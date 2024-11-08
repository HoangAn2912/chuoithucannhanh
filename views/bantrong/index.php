<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xem số lượng bàn trống</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">  

    <link rel="stylesheet" href="css/bantrong/style.css">  


  </head>
<body>
<?php
    require("layout/navnvbh.php");
?>

    <div class="container">
        <h1>Xem Số Bàn Trống</h1>
        
        <div class="time-selection">
            <label for="time-slot">Chọn khung giờ:</label>
            <input type="date" name="date" id="id">
<?php
            include_once("controllers/cXemBanTrong.php");
            $p = new controlBan();
            $kq = $p -> getAllThoiGianGio();
        
            if($kq){
            echo '<select name="cbothoigian" id="cbothoigian">';  
            while($r = mysqli_fetch_assoc($kq)){
                echo"<tr>";  
                echo '<td>';
                echo "<option value=".$r['magio']." selected>" .$r['giobatdau'] ." - " . $r['gioketthuc'] ."</option>";
               echo '</td> ';
            } 
             echo "</select>";

                echo '<td> <div class="button-container">
                        <div><input class="submit-xacnhan" name="submitXem" type="submit" value="Xem"></div>
                        
                    </div> </td>';
                echo "</tr>";  
        }else{
            echo "<script>alert('Không có dữ liệu!')</script>";
        }
?>
        </div>
        <div class="container mt-4">
    <h2>Danh sách bàn</h2>
     <!-- Danh sách bàn -->
     <div id="tables" class="row">
            <div class="col-md-3 mb-3">
                <div class="table-item trong" id="table-1">
                    Bàn 1: Trống
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="table-item dat" id="table-2">
                    Bàn 2: Đã đặt
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="table-item trong" id="table-3">
                    Bàn 3: Trống
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="table-item trong" id="table-4">
                    Bàn 4: Trống
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="table-item dat" id="table-5">
                    Bàn 5: Đã đặt
                </div>
            </div>
        </div>
    </div>

</div>
    </div>
     <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
     <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <script src="js/bantrong/bantrong.js"></script>
</body>
</html>
