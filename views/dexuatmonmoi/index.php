<?php
include_once("views/dexuatmonmoi/handle.php");
if(!isset($_SESSION['dangnhap'])){
    header("Refresh: 0; url=index.php?page=dangnhap");
}
if(!isset($_SESSION['dangnhap'])){
    header("Refresh: 0; url=index.php?page=dangnhap");
}
if (!isset($_SESSION['mavaitro']) || ($_SESSION['mavaitro'] != 3 && $_SESSION['mavaitro'] != 4)) {
    header("Refresh: 0; url=index.php"); 
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/dexuatmonmoi/main.css">
</head>
<body>
    
<main>
        <h1>Đề Xuất Món Mới</h1>
        <form method="post">
            <div>
                <label for="dish-name">Tên Món Ăn</label>
                <input type="text" id="dish-name" name="dish-name" required>
            </div>
            <div>
                <label for="ingredients">Nguyên Liệu Cần Thiết</label>
                <textarea id="ingredients" name="ingredients" required></textarea>
            </div>
            <div>
                <label for="cooking-method">Công Thức Chế Biến</label>
                <textarea id="cooking-method" name="cooking-method" required></textarea>
            </div>
            <div>
                <label for="preparation-steps">Cách Trình Bày</label>
                <textarea id="preparation-steps" name="preparation-steps" required></textarea>
            </div>
            <div>
                <label for="description">Mô Tả</label>
                <textarea id="description" name="description" required></textarea>
            </div>
            <button id="rec" type="submit" name="rec" value="Gửi Đề Xuất">Gửi Đề Xuất</button>
        </form>
    </main>
</body>
</html>