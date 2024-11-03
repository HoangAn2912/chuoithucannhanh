<?php
require_once 'controllers/cTaoDonHang.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Tạo đơn hàng</title>  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">  
    <link rel="stylesheet" href="css/taodonhang/style.css">  
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>  

    </style>  
</head>  
<body>  

    <?php  
        require('layout/navnvbh.php');  
    ?>  
    
    <div class="container">  
        <h1>TẠO ĐƠN HÀNG</h1>  
        <div class="flex-container">  
            <div class="menu">  
                <h2>Danh Sách Món Ăn</h2>  
                <form method="POST">  
                    <input class="ip-search-item" type="text" name="search" placeholder="Tìm kiếm món ăn..." />  
                    <button class="btn-search-item" type="submit"><i class="fas fa-search"></i> Tìm</button> 
                </form>  
                
                <!-- Các món ăn hiện tại -->  
                <?php foreach ($monAnList as $monAn): ?>
                <div class="menu-item">  
                    <div class="item-image"><img src="img/<?php echo $monAn['hinhanh']; ?>" alt="<?php echo $monAn['tenma']; ?>"></div>  
                    <div class="item-name"><?php echo $monAn['tenma']; ?></div>  
                    <div class="item-price"><?php echo number_format($monAn['giaban'], 0, ',', '.'); ?>đ</div>  
                    <form method="POST">
                        <input type="hidden" name="id" value="<?php echo $monAn['mama']; ?>">
                        <input type="hidden" name="name" value="<?php echo $monAn['tenma']; ?>">
                        <input type="hidden" name="price" value="<?php echo $monAn['giaban']; ?>">
                        <button type="submit" name="add_to_cart">Chọn</button>
                    </form>
                </div>  
                <?php endforeach; ?>
            </div>  
            
            <div class="order-summary">  
                <h2>Thông Tin Đơn Hàng</h2>  
                <div id="order-list">  
                    <div class="infor-item">
                        <table id="order-table">  
                            <tr>  
                                <th>Tên món</th>  
                                <th>Giá</th>  
                                <th>Số lượng</th>
                                <th>Thao tác</th>
                            </tr>    
                            <?php foreach ($cart as $id => $item): ?>
                            <tr class="order-table-tr">
                                <td><?php echo $item['name']; ?></td>
                                <td><?php echo number_format($item['price'], 0, ',', '.'); ?>đ</td>
                                <td class="order-table-td">
                                    <form method="POST" style="display:inline;">
                                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                                        <input type="hidden" name="action" value="decrease">
                                        <button class="btn-giam" type="submit" name="update_cart"><i class='bx bx-caret-left' ></i></button>
                                    </form>
                                    <?php echo $item['quantity']; ?>
                                    <form method="POST" style="display:inline;">
                                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                                        <input type="hidden" name="action" value="increase">
                                        <button class="btn-tang" type="submit" name="update_cart"><i class='bx bx-caret-right' ></i></button>
                                    </form>
                                </td>
                                <td>
                                    <form method="POST" style="display:inline;">
                                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                                        <input type="hidden" name="action" value="remove">
                                        <button type="submit" name="update_cart">Xóa</button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>  
                <div id="total-price">Tổng Cộng: <?php echo number_format($totalPrice, 0, ',', '.'); ?>đ</div>  
                <div class="btn-order">
                    <form method="POST">
                        <button type="submit" name="clear_cart" class="btn-huy">Hủy đơn hàng</button>
                    </form>
                    <button class="btn-thanhtoan">Thanh toán</button>
                </div>
            </div>  
        </div>  
    </div>  

</body>
</html>
