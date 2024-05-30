<?php
if (isset($_POST["productName"]) && isset($_POST["kolvo"]) && isset($_POST["price"]) && isset($_POST["category"])) {
      
    $conn = new mysqli("localhost", "root", "", "market");
    if($conn->connect_error){
        die("Ошибка: " . $conn->connect_error);
    }
    $productName = $conn->real_escape_string($_POST["productName"]);
    $kolvo = $conn->real_escape_string($_POST["kolvo"]);
    $price = $conn->real_escape_string($_POST["price"]);
    $category = $conn->real_escape_string($_POST["category"]);
    $sql = "INSERT INTO Products (ProductName, price, kolvo, CategoryID) VALUES ('$productName', $kolvo, $price, '$category' )";
    if($conn->query($sql)){
        echo "Данные успешно добавлены";
        echo "<div style='margin-top: 20px; display: flex; '> <a style=' background-color: gray; color: white; padding: 5px; border-radius: 5px;  text-decoration: none;' href='http://localhost/admin/main.php'>вернутся на главную</a>";

    } else{
        echo "Ошибка: " . $conn->error;
    }
    $conn->close();
}
?>