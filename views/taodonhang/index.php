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
                <div class="menu-item">  
                    <div class="item-image">🍗</div>  
                    <div class="item-name">Gà Rán</div>  
                    <div class="item-price">25,000đ</div>  
                    <button onclick="addToOrder('Gà Rán', 25000)">Chọn</button>  
                </div>  
                <div class="menu-item">  
                    <div class="item-image">🍗</div>  
                    <div class="item-name">Gà Chiên</div>  
                    <div class="item-price">20,000đ</div>  
                    <button onclick="addToOrder('Gà Chiên', 20000)">Chọn</button>  
                </div>  
                <div class="menu-item">  
                    <div class="item-image">🥔</div>  
                    <div class="item-name">Khoai Tây</div>  
                    <div class="item-price">15,000đ</div>  
                    <button onclick="addToOrder('Khoai Tây', 15000)">Chọn</button>  
                </div>  
                <div class="menu-item">  
                    <div class="item-image">🍦</div>  
                    <div class="item-name">Kem</div>  
                    <div class="item-price">10,000đ</div>  
                    <button onclick="addToOrder('Kem', 10000)">Chọn</button>  
                </div>  
                <div class="menu-item">  
                    <div class="item-image">🥗</div>  
                    <div class="item-name">Salad</div>  
                    <div class="item-price">25,000đ</div>  
                    <button onclick="addToOrder('Salad', 25000)">Chọn</button>  
                </div>  

                <!-- 3 món ăn mới được thêm vào -->  
                <div class="menu-item">  
                    <div class="item-image">🍕</div>  
                    <div class="item-name">Pizza</div>  
                    <div class="item-price">40,000đ</div>  
                    <button onclick="addToOrder('Pizza', 40000)">Chọn</button>  
                </div>  
                <div class="menu-item">  
                    <div class="item-image">🍔</div>  
                    <div class="item-name">Bánh Mì</div>  
                    <div class="item-price">30,000đ</div>  
                    <button onclick="addToOrder('Bánh Mì', 30000)">Chọn</button>  
                </div>  
                <div class="menu-item">  
                    <div class="item-image">🍣</div>  
                    <div class="item-name">Sushi</div>  
                    <div class="item-price">50,000đ</div>  
                    <button onclick="addToOrder('Sushi', 50000)">Chọn</button>  
                </div>  
            </div>  
            
            <div class="order-summary">  
                <h2>Thông Tin Đơn Hàng</h2>  
                <div id="order-list">  
                    <div class="infor-item">
                        <table>  
                            <tr>  
                                <th>tên món</th>  
                                <th>giá</th>  
                            </tr>    
                        </table>
                        <div class="icon-left"><i class='bx bxs-left-arrow' ></i></div>
                        <div class="icon-number">1</div>
                        <div class="icon-left"><i class='bx bxs-right-arrow'></i></div>

                        <button class="xoa-infor-item">xóa</button>
                    </div>

                    <div class="infor-item">
                        <table>  
                                <tr>  
                                    <th>tên món</th>  
                                    <th>giá</th>  
                                </tr>    
                        </table>
                        <div class="icon-left"><i class='bx bxs-left-arrow' ></i></div>
                        <div class="icon-number">1</div>
                        <div class="icon-left"><i class='bx bxs-right-arrow'></i></div>

                        <button class="xoa-infor-item">xóa</button>
                    </div>

                </div>  
                <div id="total-price">Tổng Cộng: 0đ</div>  
                <button onclick="processOrder()">Thanh toán</button>  
            </div>  
        </div>  
    </div>  

      
      
</body>
<script src="js/taodonhang/scripts.js"></script>
</html>

