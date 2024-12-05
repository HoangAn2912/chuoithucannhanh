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
    if(!isset($_SESSION['dangnhap'])){
        header("Refresh: 0; url=index.php?page=dangnhap");
    }
?>

<?php
// Kiểm tra xem có cửa hàng nào được chọn không
$mach = $_SESSION['mach'];  

// Gọi controller để lấy danh sách bàn của cửa hàng
include_once("controllers/cXemBanTrong.php");
$p = new controlBan();
$bans = $p->getAllBan($mach);
?>

<div class="container">
    <h1>Danh sách bàn</h1>

    <div class="container mt-4">
        <!-- Danh sách bàn -->
        <div id="tables" class="row">
            <?php
            // Duyệt qua các bàn và hiển thị từng bàn
            while ($row = mysqli_fetch_assoc($bans)) {
                $maban = $row['maban'];
                $trangthai = $row['trangthai'];
                $tableClass = ($trangthai == 'Trống') ? 'trong' : 'dat';  // Tự động thêm class cho bàn Trống/Đã đặt
                ?>
                <div class="col-md-3 mb-3">
                    <!-- Tạo form ẩn cho mỗi bàn -->
                    <button class="table-item <?php echo $tableClass; ?>" data-toggle="modal" data-target="#confirmModal<?php echo $maban; ?>">
                        <?php echo $row['tenban']; ?> : <?php echo $trangthai ?>
                    </button>
                </div>

                <!-- Modal xác nhận -->
                <div class="modal fade" id="confirmModal<?php echo $maban; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Xác nhận đặt bàn</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <?php
                                if ($trangthai == 'Trống') {
                                    echo "Bạn muốn đặt bàn này không?";
                                } else {
                                    echo "Bàn này đã có khách, bạn có muốn mở lại bàn không?";
                                }
                                ?>
                            </div>
                            <div class="modal-footer">
                                <form action="controllers/updateTinhTrangBan.php" method="POST">
                                    <input type="hidden" name="maban" value="<?php echo $maban; ?>">
                                    <input type="hidden" name="trangthai" value="<?php echo ($trangthai == 'Trống') ? 'Đã đặt' : 'Trống'; ?>">
                                    <button type="submit" class="btn btn-primary">Có</button>
                                </form>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Không</button>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
            }
            ?>
        </div>
    </div>
</div>

<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

</body>
</html>
