<!DOCTYPE html>
<html>
<head>
<title>Подробнее о чеке</title>
<meta charset="utf-8" />
</head>
<body>
<?php
if(isset($_GET["id"]))
{
    $conn = new mysqli("localhost", "root", "", "market");
    if($conn->connect_error){
        die("Ошибка: " . $conn->connect_error);
    }
    $id = $conn->real_escape_string($_GET["id"]);
    $sql = "SELECT P.number_check, P.operation_check, P.name_chek, P.inn, P.kkm , P.type_payment, C.UserName	 
    FROM chek P 
    INNER JOIN Users C ON P.id_user = C.id 
    WHERE P.id = '$id'";
    if($result = $conn->query($sql)){
        if($result->num_rows > 0){
            foreach($result as $row){
                $number_check = $row["number_check"];
                $operation_check = $row["operation_check"];
                $name_chek = $row["name_chek"];
                $inn = $row["inn"];
                $kkm = $row["kkm"];
                $type_payment = $row["type_payment"];
                $UserName = $row["UserName"];
                echo "<div>
                        <h3>Информация о чеке</h3>
                        <p>Номер чека: $number_check</p>
                        <p>Номер операции: $operation_check </p>
                        <p>Название чека: $name_chek </p>
                        <p>инн: $inn</p>
                        <p>ккм: $kkm </p>
                        <p>тип оплаты: $type_payment </p>
                        <p>челик: $UserName</p>
                    </div>";
            }
        }
        else{
            echo "<div>чек не найден</div>";
        }
        $result->free();
    } else{
        echo "Ошибка: " . $conn->error;
    }
    $conn->close();
}
?>
<a href="http://localhost/admin/main.php" style="  text-decoration: none;">Вернуться на главную</a>
</body>
</html>


