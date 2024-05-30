<?php
if (isset($_POST["Postavka_id"]) && isset($_POST["Product_id"]) && isset($_POST["ProductCount"]) && isset($_POST["PostavkaDate"]) && isset($_POST["time"])) {
      
    $conn = new mysqli("localhost", "root", "", "market");
    if($conn->connect_error){
        die("Ошибка: ". $conn->connect_error);
    }
    $Postavka_id = $conn->real_escape_string($_POST["Postavka_id"]);
    $Product_id = $conn->real_escape_string($_POST["Product_id"]);
    $ProductCount = $conn->real_escape_string($_POST["ProductCount"]);
    $PostavkaDate = $conn->real_escape_string($_POST["PostavkaDate"]);
    $time = $conn->real_escape_string($_POST["time"]);
    

    $sql_update = "UPDATE Products SET kolvo = kolvo + $ProductCount WHERE id = $Product_id";
    if (!$conn->query($sql_update)) {
        echo "Ошибка при обновлении количества продукта: ". $conn->error;
        exit;
    }
    
    $sql_insert = "INSERT INTO Privoz (Postavka_id, Product_id, ProductCount, PostavkaDate, time ) VALUES ('$Postavka_id', '$Product_id', $ProductCount, '$PostavkaDate', '$time')";
    if($conn->query($sql_insert)){
        echo "Данные успешно добавлены";
        echo "<div style='margin-top: 20px; display: flex; '> <a style=' background-color: gray; color: white; padding: 5px; border-radius: 5px;  text-decoration: none;' href='http://localhost/admin/main.php'>вернутся на главную</a>";
        
    } else{
        echo "Ошибка: ". $conn->error;
    }
    $conn->close();
}
?>