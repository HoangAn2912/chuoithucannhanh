<?php
declare(strict_types=1);

include_once("controllers/cNguyenLieu.php");

$nguyenLieuController = new cNguyenLieu();
$nguyenLieuList = $nguyenLieuController->getNguyenLieu();

$congThuc = [];

if (isset($_POST["save"])) {
    foreach ($nguyenLieuList as $index => $item) {
        if (isset($_POST["quantities"][$index])) {
            $congThuc[] = [
                'tennl' => htmlspecialchars($item['tennl']),
                'manl' => htmlspecialchars($item['manl']),
                'quantity' => floatval($_POST["quantities"][$index])
            ];
        }
    }
}

function displayResult(array $ingredients): void {
    echo "<h2>Nguyên liệu đã chọn:</h2>";
    if (empty($ingredients)) {
        echo "<p>Chưa có nguyên liệu nào được chọn.</p>";
    } else {
        echo "<ul>";
        foreach ($ingredients as $ingredient) {
            echo "<li>" . $ingredient['tennl'] . " (Mã: " . $ingredient['manl'] . "): " . $ingredient['quantity'] . "</li>";
        }
        echo "</ul>";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chọn Nguyên Liệu cho Món Ăn</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; padding: 20px; }
        .ingredient-item { margin-bottom: 10px; }
        input[type="number"] { width: 100px; }
        input[type="submit"] { margin-top: 20px; }
    </style>
</head>
<body>
    <h1>Chọn Nguyên Liệu cho Món Ăn</h1>
    <form method="post">
        <?php foreach ($nguyenLieuList as $index => $item): ?>
            <div class="ingredient-item">
                <label>
                    <?php echo htmlspecialchars($item['tennl']); ?>
                </label>
                <input type="number" id="quantity-<?php echo $index; ?>" name="quantities[<?php echo $index; ?>]" placeholder="Định lượng">
            </div>
        <?php endforeach; ?>
        <input type="submit" value="Lưu Nguyên Liệu" name="save">
    </form>

    <?php
    if (isset($_POST["save"])) {
        displayResult($congThuc);
    }
    ?>
</body>
</html>