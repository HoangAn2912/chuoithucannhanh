<?php
include("controllers/cDeXuatMonMoi.php");

if(isset($_POST["rec"])){
    $cDeXuatMonMoi = new cDeXuatMonMoi();
    $dish_name = $_POST["dish-name"];
    $ingredients = $_POST["ingredients"];
    $cooking_method = $_POST["cooking-method"];
    $preparation_steps = $_POST["preparation-steps"];
    $description = $_POST["description"];
    $status = $cDeXuatMonMoi->createNewSuggestion($dish_name, $ingredients, $cooking_method, $preparation_steps, $description);
    if ($status) {
        echo '<script>
                alert("Giving suggestion is success");
                window.location.href = "index.php?page=trangchu";
              </script>';
        exit();
    } else {
        echo '<script>alert("Giving suggestion is fail");</script>';
    }
}


?>