<?php
    echo '<link rel="stylesheet" href="css/QLNL/style.css">';
    echo '<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>';
    echo require("layout/navqlchuoi.php");
?>
<?php
    // Include your database connection and necessary controllers
    include_once("controllers/cKhoNguyenLieu.php");
    $khoNguyenLieu = new cKhoNguyenLieu();

    // Fetch data for 5 stores and 12 months
    $stores = ['CH001', 'CH002', 'CH003', 'CH004', 'CH005']; // Replace with actual store IDs
    $months = range(1, 12);
    $ingredients = $khoNguyenLieu->getDistinctIngredients();

    // Prepare data for the chart
    $chartData = [];
    $chartData = [];
    foreach ($ingredients as $ingredient) {
        $datasetData = [];
        foreach ($stores as $store) {
            $weeklyData = [];
            for ($week = 1; $week <= 4; $week++) { // Giả định 4 tuần trong tháng
                $quantity = $khoNguyenLieu->getIngredientQuantityByStoreAndWeek($store, $ingredient['manl'], $selectedMonth);
                $weeklyData[] = $quantity[$week]['quantity'] ?? 0;
            }
            $datasetData[] = [
                'label' => "Cửa hàng " . $store . " - " . $ingredient['tennl'],
                'data' => $weeklyData,
                'borderColor' => sprintf('#%06X', mt_rand(0, 0xFFFFFF)),
                'fill' => false
            ];
        }
        $chartData[$ingredient['tennl']] = $datasetData;
    }
    $chartDataJson = json_encode($chartData);
?>

<script>
   document.addEventListener('DOMContentLoaded', function() {
    var chartData = <?php echo $chartDataJson; ?>;
    var ingredients = Object.keys(chartData);
    var currentIngredient = ingredients[0];
    var currentMonth = document.getElementById('monthSelector').value;

    var ctx = document.getElementById('ingredientChart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Tuần 1', 'Tuần 2', 'Tuần 3', 'Tuần 4'],
            datasets: chartData[currentIngredient]
        },
        options: {
            responsive: true,
            plugins: {
                title: {
                    display: true,
                    text: 'Thống kê nguyên liệu theo Tuần và cửa hàng'
                },
                tooltip: {
                    mode: 'index',
                    intersect: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Số lượng'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Tuần'
                    }
                }
            }
        }
    });

    var selector = document.getElementById('ingredientSelector');
    ingredients.forEach(function(ingredient) {
        var option = document.createElement('option');
        option.value = ingredient;
        option.text = ingredient;
        selector.appendChild(option);
    });

    // Add event listener to update chart when selection changes
    selector.addEventListener('change', function() {
        currentIngredient = this.value;
        chart.data.datasets = chartData[currentIngredient];
        chart.update();
    });

    document.getElementById('monthSelector').addEventListener('change', function() {
            currentMonth = this.value;
            updateChart();
    });

    document.getElementById('ingredientSelector').addEventListener('change', function() {
            currentIngredient = this.value;
            updateChart();
    });
    function updateChart() {
            chart.data.datasets = chartData[currentIngredient];
            chart.update();
    }
    });
</script>
<div class="sidebar">
    <form action="" method="post">
        <h3>Cửa hàng 
            <button type="submit" style="background-color: rgba(0, 0, 0, 0); border: none; color: white" name="filter">
                <i class="fas fa-filter" style="margin-left: 80px;"></i>
            </button>
        </h3>
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
        <h3>Thời gian</h3>
        <div>
            <label>Từ:</label>
            <input type="date" class="date-input" name="dateFrom">
            <label>Đến:</label>
            <input type="date" class="date-input" name="dateTo">
        </div>
    </form>
</div>

<div style="margin-left: 210px; padding: 20px;" class="content">
    <div class="table-material">
        <h3>Thống kê nguyên liệu</h3>
        <form action="" method="post">
            <table>
                <tr>
                    <th>MaCH</th>
                    <th>MaNL</th>
                    <th>Tên Nguyên Liệu</th>
                    <th>Đơn vị tính</th>
                    <th>Đơn giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                </tr>
                <?php
                include_once("controllers/cKhoNguyenLieu.php");
                $khoNguyenLieu = new cKhoNguyenLieu();
                $DS = array();

                if (isset($_POST["filter"])) {
                    $dateFrom = $_POST["dateFrom"] ?? null;
                    $dateTo = $_POST["dateTo"] ?? null;
                    $store = isset($_POST["cuahang"]) ? $_POST["cuahang"] : [];

                    if ($store && $dateFrom && $dateTo) {

                        foreach ($store as $i) {
                            $nguyenlieu = $khoNguyenLieu->getNguyenLieuByDate_MaCH($dateFrom, $dateTo, $i);
                            $DS = array_merge($DS, $nguyenlieu);
                        }

                    } elseif ($store) {

                        foreach ($store as $i) {
                            $DS = array_merge($DS, $khoNguyenLieu->getNguyenLieuByMaCH($i));
                        }

                    } elseif ($dateFrom && $dateTo) {
    
                        $DS = $khoNguyenLieu->getNguyenLieuByDate($dateFrom, $dateTo);
                    } else {
        
                        $DS = $khoNguyenLieu->getNguyenLieu();
                    }
                } else {
                    $DS = $khoNguyenLieu->getNguyenLieu(); 
                }

                if (empty($DS)) {
                    echo "<tr><td colspan='7'>Không có dữ liệu phù hợp với bộ lọc.</td></tr>";
                } else {
                    foreach ($DS as $i) {
                        echo '<tr>';
                            echo '<td>'.$i['mach'].'</td>';
                            echo '<td>'.$i['manl'].'</td>';
                            echo '<td>'.$i['tennl'].'</td>';
                            echo '<td>'.$i['donvitinh'].'</td>';
                            echo '<td>'.$i['dongia'].'</td>';
                            echo '<td>'.$i['SoLuongNhapKho'].'</td>';
                            echo '<td>'.$i['SoLuongNhapKho'] * $i['dongia'].'</td>';
                        echo '</tr>';
                    }
                }
                ?>
            </table>
        </form>
        <div class="pagination">
            <a href="#">1</a>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#">Tiếp theo</a>
        </div>
    </div>
    <div>
        <h3>Sơ đồ so sánh các cửa hàng</h3>
        <div class="chart">
            <select id="ingredientSelector"></select>
            
            <select id="monthSelector" style ="margin-top: 20px;">
                <?php for ($m = 1; $m <= 12; $m++) {
                    echo "<option value='$m'>Tháng $m</option>";
                } ?>
            </select>
            <canvas id="ingredientChart"></canvas>
        </div>
    </div>
</div>

</body>

</html>
