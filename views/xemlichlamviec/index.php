<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiếp nhận đơn hàng</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">  
    <link rel="stylesheet" href="css/xemlichlamviec/style.css">   
  </head>
<body>

<?php
    require("layout/navnvbh.php");
?>

<div class="main">  
        <div style="text-align: center;  margin-top: 20px; ">  
            <h2>Xem lịch làm việc</h2>  
        </div>   

        <table class="schedule-table">
        <thead>
            <tr>
                <th>Thứ / Ca</th>
                <th>Thứ 2</th>
                <th>Thứ 3</th>
                <th>Thứ 4</th>
                <th>Thứ 5</th>
                <th>Thứ 6</th>
                <th>Thứ 7</th>
                <th>Chủ Nhật</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>Sáng</th>
                <td class="shift">Có ca</td>
                <td></td>
                <td></td>
                <td class="shift">Có ca</td>
                <td></td>
                <td class="shift">Có ca</td>
                <td></td>
            </tr>
            <tr>
                <th>Trưa</th>
                <td class="shift">Có ca</td>
                <td class="shift">Có ca</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>Chiều</th>
                <td></td>
                <td class="shift">Có ca</td>
                <td></td>
                <td class="shift">Có ca</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>Tối</th>
                <td></td>
                <td></td>
                <td class="shift">Có ca</td>
                <td></td>
                <td class="shift">Có ca</td>
                <td></td>
                <td class="shift">Có ca</td>
            </tr>
        </tbody>
    </table>
       
         
       

</body>
</html>