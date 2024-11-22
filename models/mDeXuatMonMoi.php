<?php
include_once("models/mketnoi.php");

class mDeXuatMonMoi {
    private $conn;

    public function __construct() {
        $ketnoi = new ketnoi();
        $this->conn = $ketnoi->ketnoi();
    }

    public function createNewSuggestion($user_id, $dish_name, $ingredients, $cooking_method, $preparation_steps, $description, $date) : bool{
        $query = "INSERT INTO danhsachdexuat (mand, tenma, nguyenlieu, congthuc, cachtrinhbay, mota, ngaydexuat) 
                  VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sssssss", $user_id, $dish_name, $ingredients, $cooking_method, $preparation_steps, $description, $date);

        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }
}
?>