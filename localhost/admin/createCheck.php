<?php
if (isset($_POST["number_check"]) && isset($_POST["operation_check"]) && isset($_POST["date"]) && isset($_POST["name_chek"]) && isset($_POST["inn"]) && isset($_POST["kkm"])  && isset($_POST["type_payment"]) && isset($_POST["id_user"])) {
      
    $conn = new mysqli("localhost", "root", "", "market");
    if($conn->connect_error){
        die("Ошибка: " . $conn->connect_error);
    }
    $number_check = $conn->real_escape_string($_POST["number_check"]);
    $operation_check = $conn->real_escape_string($_POST["operation_check"]);
    $name_chek = $conn->real_escape_string($_POST["name_chek"]);
    $inn = $conn->real_escape_string($_POST["inn"]);
    $kkm = $conn->real_escape_string($_POST["kkm"]);
    $type_payment = $conn->real_escape_string($_POST["type_payment"]);
    $id_user = $conn->real_escape_string($_POST["id_user"]);
    $date = $conn->real_escape_string($_POST["date"]);

    $sql = "INSERT INTO Chek (number_check, operation_check, name_chek, inn, kkm , type_payment, id_user, date ) VALUES ($number_check, $operation_check, '$name_chek', $inn, '$kkm' , '$type_payment', $id_user, '$date' )";
    if($conn->query($sql)){
        echo "Данные успешно добавлены";
        echo "<div style='margin-top: 20px; display: flex; '> <a style=' background-color: gray; color: white; padding: 5px; border-radius: 5px;  text-decoration: none;' href='http://localhost/admin/main.php'>вернутся на главную</a>";
        
    } else{
        echo "Ошибка: " . $conn->error;
    }
    $conn->close();
}
?>