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
    <link rel="stylesheet" href="js/bantrong/bantrong.js">  

  </head>
<body>
<?php
    require("layout/navnvbh.php");
?>

    <div class="container">
        <h1>Xem Số Bàn Trống</h1>
        
        <div class="branch-selection">
            <label for="branch">Chọn chi nhánh:</label>
            <select id="branch" onchange="checkAvailableTables()">
                <option value="1">Chi nhánh 1</option>
                <option value="2">Chi nhánh 2</option>
                <option value="3">Chi nhánh 3</option>
                <option value="3">Chi nhánh 4</option>
                <option value="3">Chi nhánh 5</option>
                <!-- Add more branches as needed -->
            </select>
        </div>
        <div class="time-selection">
            <label for="time-slot">Chọn khung giờ:</label>
            <select id="time-slot" onchange="checkAvailableTables()">
                <option value="08:00">08:00 - 09:00</option>
                <option value="09:00">09:00 - 10:00</option>
                <option value="10:00">10:00 - 11:00</option>
                <option value="11:00">11:00 - 12:00</option>
                <option value="12:00">12:00 - 13:00</option>
                <option value="13:00">13:00 - 14:00</option>
                <option value="14:00">14:00 - 15:00</option>
                <option value="15:00">15:00 - 16:00</option>
                <option value="16:00">16:00 - 17:00</option>
                <option value="17:00">17:00 - 18:00</option>
                <option value="18:00">18:00 - 19:00</option>
                <option value="19:00">19:00 - 20:00</option>
            </select>
            <button onclick="checkAvailableTables()">Xem</button>
        </div>
        <div class="container mt-4">
    <h2>Danh sách bàn</h2>
    <div class="row" id="tables">
        <!-- Các phần tử table-item sẽ được thêm vào đây bằng JavaScript -->
    </div>
</div>
    </div>
     <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
     <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <script src="js/bantrong/bantrong.js"></script>
</body>
</html>
