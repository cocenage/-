<?php
if (isset($_POST["name"])) {
      
    $conn = new mysqli("localhost", "root", "", "market");
    if($conn->connect_error){
        die("Ошибка: " . $conn->connect_error);
    }
    $name = $conn->real_escape_string($_POST["name"]);
    
    $sql = "INSERT INTO Postavka (name) VALUES ('$name')";
    if($conn->query($sql)){
        echo "Данные успешно добавлены";
        echo "<div style='margin-top: 20px; display: flex; '> <a style=' background-color: gray; color: white; padding: 5px; border-radius: 5px;  text-decoration: none;' href='http://localhost/admin/main.php'>вернутся на главную</a>";
        
    } else{
        echo "Ошибка: " . $conn->error;
    }
    $conn->close();
}
?>