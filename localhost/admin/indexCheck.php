<!DOCTYPE html>
<html>
<head>
<title>магазин</title>
<meta charset="utf-8" />
</head>
<body>
<h2>чеки</h2>
<div style="margin-bottom: 10px;">
<a href="http://localhost/admin/formCheck.php" style="  text-decoration: none;">Добавить чек</a>
<a href="http://localhost/admin/formUser.php" style="  text-decoration: none;">Добавить юзера</a>

</div>
<?php
$conn = new mysqli("localhost", "root", "root", "market");
if($conn->connect_error){
    die("Ошибка: " . $conn->connect_error);
}

$sql = "SELECT P.id, P.number_check, P.operation_check, P.name_chek, P.inn, P.kkm, P.type_payment, C.UserName 
        FROM chek P 
        INNER JOIN Users C ON P.id_user = C.id";
if($result = $conn->query($sql)){
    echo "<table><tr><th>Номер чека</th><th>номер операции</th><th>название чека</th><th>инн</th><th>ккм</th><th>тип платежа</th><th>Человек</th><th></th></tr>";
    foreach($result as $row){
        echo "<tr>";
            echo "<td>" . $row["number_check"] . "</td>";
            echo "<td>". $row["operation_check"]. "</td>";
            echo "<td>" . $row["name_chek"] . "</td>";
            echo "<td>". $row["inn"]. "</td>";
            echo "<td>" . $row["kkm"] . "</td>";
            echo "<td>". $row["type_payment"]. "</td>";
            echo "<td>" . $row["UserName"] . "</td>";
            echo "<td><a stylestyle='  text-decoration: none;' href='updateCheck.php?id=" . $row["id"] . "'>Изменить</a></td>";
            echo "<td><a  href='podrobneeCheck.php?id=" . $row["id"] . "' style='  text-decoration: none;'>Подробнее</a></td>";
            echo "<td><form action='deleteCheck.php' method='POST'>
                        <input type='hidden' name='id' value='" . $row["id"] . "' />
                        <input style='border: none;   text-decoration: none;' type='submit' value='Удалить'>
                </form></td>";
        echo "</tr>";
    }
    echo "</table>";
    $result->free();
} else{
    echo "Ошибка: " . $conn->error;
}
$conn->close();
?>
<h2>юзеры</h2>
<?php
$conn = new mysqli("localhost", "root", "root", "market");
if($conn->connect_error){
    die("Ошибка: " . $conn->connect_error);
}

$sql = "SELECT * FROM Users";
if($result = $conn->query($sql)){
    echo "<table><tr><th>наме</th><th>эмаил</th><th>пароль</th><th></th></tr>";
    foreach($result as $row){
        echo "<tr>";
            echo "<td>" . $row["UserName"] . "</td>";
            echo "<td>". $row["Email"]. "</td>";
            echo "<td>" . $row["password"] . "</td>";
            echo "<td><a stylestyle='  text-decoration: none;' href='updateUser.php?id=" . $row["id"] . "'>Изменить</a></td>";
            echo "<td><a  href='podrobneeUser.php?id=" . $row["id"] . "' style='  text-decoration: none;'>Подробнее</a></td>";
            echo "<td><form action='deleteUser.php' method='POST'>
                        <input type='hidden' name='id' value='" . $row["id"] . "' />
                        <input style='border: none;   text-decoration: none;' type='submit' value='Удалить'>
                </form></td>";
        echo "</tr>";
    }
    echo "</table>";
    $result->free();
} else{
    echo "Ошибка: " . $conn->error;
}
$conn->close();
?>
</body>
</html>



