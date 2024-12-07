<?php
if(!isset($_SESSION['dangnhap'])){
    header("Refresh: 0; url=index.php?page=dangnhap");
}
    echo '<link rel="stylesheet" href="css/QLNL/ql.css">';
    echo '<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>';
    echo require("layout/navqlchuoi.php");
?>

<?php
    include_once("controllers/cKhoNguyenLieu.php");
    $khoNguyenLieu = new cKhoNguyenLieu();
    $DS = array();
    $total = 0;

    if (isset($_POST["filter"])) {
        $dateFrom = $_POST["dateFrom"] ?? null;
        $dateTo = $_POST["dateTo"] ?? null;
        $store = isset($_POST["cuahang"]) ? $_POST["cuahang"] : [];
        $ingredient = $_POST["ingredient"] ?? null;

        if ($store && $ingredient && $dateFrom && $dateTo){
            foreach ($store as $i) {
                $nguyenlieu = $khoNguyenLieu->getNguyenLieuByDate_MaCH_MaNL($dateFrom, $dateTo, $i,$ingredient);
                $DS = array_merge($DS, $nguyenlieu);
            }
        } elseif ($ingredient && $dateFrom && $dateTo) {
            $DS = $khoNguyenLieu->getNguyenLieuByDateandMaNL($ingredient, $dateFrom, $dateTo);
        } elseif ($store && $dateFrom && $dateTo) {
            foreach ($store as $i) {
                $nguyenlieu = $khoNguyenLieu->getNguyenLieuByDate_MaCH($dateFrom, $dateTo, $i);
                $DS = array_merge($DS, $nguyenlieu);
            }
        } elseif ($store && $ingredient) {
            foreach ($store as $i) {
                $nguyenlieu = $khoNguyenLieu->getNguyenLieuByMaCHandMaNL($i, $ingredient);
                $DS = array_merge($DS, $nguyenlieu);
            }
        } elseif ($dateFrom && $dateTo) {
            $DS = $khoNguyenLieu->getNguyenLieuByDate($dateFrom, $dateTo);
        } elseif ($ingredient) {
            $DS = $khoNguyenLieu->getNguyenLieuByMaNL($ingredient);
        } elseif ($store) {
            foreach ($store as $i) {
                $DS = array_merge($DS, $khoNguyenLieu->getNguyenLieuByMaCH($i));
            }
        } else {
            $DS = $khoNguyenLieu->getNguyenLieu();
        }
    } else {
        $DS = $khoNguyenLieu->getNguyenLieu();
    }



    if (empty($DS)) {
        $total_price = 0;
        $total_quantity = 0;
    } else {
        foreach ($DS as $j) {
            $total_price += $j['soluongnhapkho'] * $j['dongia'];
            $total_quantity += $j['soluongnhapkho'];
        }
    }
?>
<?php
    $chartData = [];
    foreach ($DS as $item) {
        $store = $item['mach'];
        $ingredient = $item['tennl'];
        $quantity = $item['soluongnhapkho'];
        
        if (!isset($chartData[$store])) {
            $chartData[$store] = [];
        }
        if (!isset($chartData[$store][$ingredient])) {
            $chartData[$store][$ingredient] = 0;
        }
        $chartData[$store][$ingredient] = $quantity; 
    }

    $chartDataJson = json_encode($chartData);
?>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var chartData = <?php echo $chartDataJson; ?>;
        var stores = Object.keys(chartData);
        var ingredients = [];
        var datasets = [];

        stores.forEach(function(store) {
            Object.keys(chartData[store]).forEach(function(ingredient) {
                if (!ingredients.includes(ingredient)) {
                    ingredients.push(ingredient);
                }
            });
        });

        ingredients.forEach(function(ingredient, index) {
            var data = stores.map(function(store) {
                return chartData[store][ingredient] || 0;
            });

            datasets.push({
                label: ingredient,
                data: data,
                backgroundColor: 'hsl(' + (index * 360 / ingredients.length) + ', 70%, 60%)',
            });
        });

        var ctx = document.getElementById('ingredientChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: stores,
                datasets: datasets
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        stacked: true,
                    },
                    y: {
                        stacked: true,
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Số lượng'
                        }
                    }
                },
                plugins: {
                    title: {
                        display: true,
                        text: 'Thống kê nguyên liệu theo cửa hàng'
                    },
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        mode: 'index',
                        intersect: false
                    }
                }
            }
        });
    });
</script>

<div class="sidebar">
    <form action="" method="post">
        <h3>Cửa hàng </h3>
        <div>
            <?php
                include_once("controllers/cCuaHang.php");
                $cuaHang = new cCuaHang();
                $DScuaHang = $cuaHang->getCuaHang();
                foreach ($DScuaHang as $i) {
                    echo '<input style="margin-bottom: 30px;" type="checkbox" name="cuahang[]" value="'.$i['mach'].'"> '.$i['tench'].'<br>';
                }
            ?>
        </div>
        <h3>Nguyên liệu</h3>
        <div>
            <select name="ingredient" class="ingredient">
                <option value="">- chọn nguyên liệu -</option>
                <?php
                    include_once("controllers/cNguyenLieu.php");
                    $NguyenLieu = new cNguyenLieu();
                    $list_nguyenlieu = $NguyenLieu->getNguyenLieu();
                    foreach ($list_nguyenlieu as $i) {
                        echo '<option value="'.$i['manl'].'">'.$i['tennl'].'</option>';
                    }
                ?>
            </select>
        </div>
        <h3>Thời gian</h3>
        <div>
            <label>Từ:</label>
            <input type="date" class="date-input" name="dateFrom">
            <label>Đến:</label>
            <input type="date" class="date-input" name="dateTo">
        </div>
        <button type="submit" class ="filter" name="filter">Lọc</button>
    </form>
</div>

<div style="margin-left: 210px; padding: 20px;" class="content">
    <div class="cards">
        <div class="card">
            <h3>Tổng tiền</h3>
            <div class="value"><?php echo number_format($total_price, 0, ',', '.'); ?></div>
            <!-- <p>+20.1% from last month</p> -->
        </div>
        <div class="card">
            <h3>Tổng số nguyên liệu</h3>
            <div class="value"><?php echo number_format($total_quantity, 0, ',', '.'); ?></div>
            <!-- <p>+19% from last month</p> -->
        </div>
    </div>

    <div class="chart">
        <h3>Sơ đồ so sánh các cửa hàng</h3>
        <canvas id="ingredientChart">
            
        </canvas>
    </div>

    <div class="table-material">
        <h3>Thống kê nguyên liệu</h3>
        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>MaCH</th>
                        <th>MaNL</th>
                        <th>Hình ảnh</th>
                        <th>Tên Nguyên Liệu</th>
                        <th>Đơn vị tính</th>
                        <th>Đơn giá</th>
                        <th>Ngày nhập</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if (empty($DS)) {
                            echo "<tr><td colspan='9'>Không có dữ liệu phù hợp với bộ lọc.</td></tr>";
                        } else {
                            foreach ($DS as $i) {
                                echo '<tr>';
                                echo '<td>'.$i['mach'].'</td>';
                                echo '<td>'.$i['manl'].'</td>';
                                echo '<td><img src="image/'.$i['hinh'].'" width="50" height="50"></td>';
                                echo '<td>'.$i['tennl'].'</td>';
                                echo '<td>'.$i['donvitinh'].'</td>';
                                echo '<td>'.number_format($i['dongia'], 0, ',', '.').'</td>';
                                echo '<td>'.$i['ngaynhapkho'].'</td>';
                                echo '<td>'.$i['soluongnhapkho'].'</td>';
                                echo '<td>'.number_format($i['soluongnhapkho'] * $i['dongia'], 0, ',', '.').'</td>';
                                echo '</tr>';
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>