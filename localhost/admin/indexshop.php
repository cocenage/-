<!DOCTYPE html>
<html>
<head>
<title>магазин</title>
<meta charset="utf-8" />

</head>
<body >
<h2>покупка</h2>
<div style="margin-bottom: 10px;">

</div>
<?php
$conn = new mysqli("localhost", "root", "root", "market");
if($conn->connect_error){
    die("Ошибка: " . $conn->connect_error);
}

$sql = "SELECT Shopping.id, Users.UserName AS name, Products.ProductName AS product_name, Shopping.kolvo, Shopping.priezd, Shopping.address, Shopping.time
        FROM Shopping
        INNER JOIN Users ON Shopping.UserId = Users.id
        INNER JOIN Products ON Shopping.ProductId = Products.id";
if($result = $conn->query($sql)){
    echo "<table><tr><th>Имя</th><th>Продукт</th><th>Кол-во</th><th>адресс поставки</th><th>Время</th><th></th></tr>";
    foreach($result as $row){
        echo "<tr>";
            echo "<td>". $row["name"]. "</td>";
            echo "<td>". $row["product_name"]. "</td>";
            echo "<td>". $row["kolvo"]. "</td>";
            echo "<td>". $row["address"]. "</td>";
            echo "<td>". $row["time"]. "</td>";
           
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


