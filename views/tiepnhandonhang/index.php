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

        <div class="branch-selector">  
            <label for="branch">Chọn chi nhánh:</label>  
            <select id="branch" name="branch" onchange="this.form.submit()">  
                <option value="branch1">Chi nhánh 1</option>  
                <option value="branch2">Chi nhánh 2</option>  
                <option value="branch3">Chi nhánh 3</option>
                <option value="branch3">Chi nhánh 4</option>   
                <option value="branch3">Chi nhánh 5</option> 
            </select>  
        </div>  

        <div class="list-dish">  
            <table class="dish-list">  
            <thead>  
            <tr>  
                <th style="text-align: center;">STT</th>  
                <th style="text-align: center;">Tên món ăn</th>  
                <th style="text-align: center;">Số lượng</th>
                <th style="text-align: center;">Ghi chú</th>  
                <th style="text-align: center;">Trạng thái</th> 
                <th style="text-align: center;">Xác nhận</th> 
            </tr>  
        </thead>  
        <tbody id="dish-list">  
            <tr>  
                <td>1</td>  
                <td>Gà rán</td>  
                <td>1</td>  
                <td>Không lấy tương ớt mà hãy lấy tương cà</td> 
                <td>
                    <select>
                        <option value="chuanbi">Đang chuẩn bị</option>
                        <option value="dadathang">Đã đặt hàng thành công</option>
                        <option value="xong" selected>Xong</option>
                    </select>
                </td> 
                <td> <div class="button-container">
                        <div><button class="submit-xacnhan" type="submit-xacnhan">Xác nhận</button></div> /
                        <div><button class="submit-xacnhan" type="submit-xacnhan">Từ chối</button></div>
                    </div> </td>
            </tr>  
            <tr>  
                <td>2</td>  
                <td>Gà rán</td>  
                <td>1</td>  
                <td>Không lấy tương ớt mà hãy lấy tương cà</td> 
                <td>
                    <select>
                        <option value="chuanbi" selected>Đang chuẩn bị</option>
                        <option value="dadathang">Đã đặt hàng thành công</option>
                        <option value="xong">Xong</option>
                    </select>
                </td> 
                <td>
                <div class="button-container">
                        <div><button class="submit-xacnhan" type="submit-xacnhan">Xác nhận</button></div> /
                        <div><button class="submit-xacnhan" type="submit-xacnhan">Từ chối</button></div>
                    </div>
                </td>
            </tr>  
            <tr>  
                <td>2</td>  
                <td>Gà rán</td>  
                <td>1</td>  
                <td>Không lấy tương ớt mà hãy lấy tương cà</td> 
                <td>
                    <select>
                        <option value="chuanbi" >Đang chuẩn bị</option>
                        <option value="dadathang" selected>Đã đặt hàng thành công</option>
                        <option value="xong">Xong</option>
                    </select>
                </td> 
                <td> <div class="button-container">
                        <div><button class="submit-xacnhan" type="submit-xacnhan">Xác nhận</button></div> /
                        <div><button class="submit-xacnhan" type="submit-xacnhan">Từ chối</button></div>
                    </div>
            </td>
            </tr>  
        </tbody>  
            </table>  
        </div>  

</body>
</html>