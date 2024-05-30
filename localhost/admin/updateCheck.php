<?php 
$conn = new mysqli("localhost", "root", "", "market");
if($conn->connect_error){
    die("Ошибка: ". $conn->connect_error);
}
?>
<!DOCTYPE html>
<html>
<head>
<title>магазинчик</title>
<meta charset="utf-8" />
</head>
<body>
<?php
// если запрос GET
if($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"]))
{
    $id = $conn->real_escape_string($_GET["id"]);
    $sql = "SELECT P.number_check, P.operation_check, P.name_chek, P.inn, P.kkm, P.type_payment, C.UserName	 
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
            }
            echo "<h3>Обновление чека
            </h3>
                <form method='post'>
                <p>номер:
                    <input type='number' name='number_check' value='$number_check' />
                    <p>операция:
                    <input type='number' name='operation_check' value='$operation_check' />
                    <p>название:
                    <input type='text' name='name_chek' value='$name_chek' /></p>
                    <p>инн:
                    <input type='number' name='inn' value='$inn' /></p>
                    <p>ккм:
                    <input type='number' name='kkm' value='$kkm' /></p>
                    <p>тип платежа:
                    <input type='text' name='type_payment' value='$type_payment' /></p>
                    <p>юзер :
                    <input type='text' name='UserName' value='$UserName' /></p>
                    <input type='hidden' name='id' value='$id' />
                    <input type='submit' value='Сохранить'>
            </form>";
        }
        else{
            echo "<div>Пользователь не найден</div>";
        }
        $result->free();
    } else{
        echo "Ошибка: ". $conn->error;
    }
}
elseif (isset($_POST["number_check"]) && isset($_POST["operation_check"]) && isset($_POST["name_chek"]) && isset($_POST["inn"]) && isset($_POST["kkm"])  && isset($_POST["type_payment"]) && isset($_POST["UserName"]) && isset($_POST["id"])) {
      
    $number_check = $conn->real_escape_string($_POST["number_check"]);
    $operation_check = $conn->real_escape_string($_POST["operation_check"]);
    $name_chek = $conn->real_escape_string($_POST["name_chek"]);
    $inn = $conn->real_escape_string($_POST["inn"]);
    $kkm = $conn->real_escape_string($_POST["kkm"]);
    $type_payment = $conn->real_escape_string($_POST["type_payment"]);
    $UserName = $conn->real_escape_string($_POST["UserName"]);
    $id = $conn->real_escape_string($_POST["id"]);

    $sql = "UPDATE chek SET number_check = '$number_check', operation_check = '$operation_check', name_chek = '$name_chek', inn = '$inn', kkm = '$kkm', type_payment = '$type_payment', id_user = (SELECT id FROM Users WHERE UserName = '$UserName') WHERE id = '$id'";
    if($result = $conn->query($sql)){
        header("Location: indexCheck.php");
    } else{
        echo "Ошибка: ". $conn->error;
    }
}
else{
    echo "Некорректные данные";
}
$conn->close();
?>
</body>
</html>