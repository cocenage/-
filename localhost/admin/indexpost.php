<!DOCTYPE html>
<html>
<head>
<title>магазин</title>
<meta charset="utf-8" />

</head>
<body >
<h2>Поставщики</h2>
<div style="margin-bottom: 10px;">
<a href="http://localhost/admin/formPost.php" style="  text-decoration: none;">Добавить поставщика</a>
<a href="http://localhost/admin/formPrivoz.php" style="  text-decoration: none;">Добавить привоз</a>
</div>
<?php
$conn = new mysqli("localhost", "root", "root", "market");
if($conn->connect_error){
    die("Ошибка: " . $conn->connect_error);
}

$sql = "SELECT * FROM Postavka";
if($result = $conn->query($sql)){
    echo "<table><tr><th>Имя</th><th></th></tr>";
    foreach($result as $row){
        echo "<tr>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td><a stylestyle='  text-decoration: none;' href='updatePost.php?id=" . $row["id"] . "'>Изменить</a></td>";
            echo "<td><a  href='podrobneePost.php?id=" . $row["id"] . "' style='  text-decoration: none;'>Подробнее</a></td>";
            echo "<td><form action='deletePost.php' method='POST'>
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
<h2>Привоз</h2>
<?php
$conn = new mysqli("localhost", "root", "", "market");
if($conn->connect_error){
    die("Ошибка: ". $conn->connect_error);
}

$sql = "SELECT Privoz.id, Postavka.name AS postavka_name, Products.ProductName AS product_name, Privoz.ProductCount, Privoz.PostavkaDate, Privoz.time
        FROM Privoz
        INNER JOIN Postavka ON Privoz.postavka_id = Postavka.id
        INNER JOIN Products ON Privoz.product_id = Products.id";

if($result = $conn->query($sql)){
    echo "<table><tr><th>Поставщик</th><th>Продукт</th><th>Кол-во</th><th>Дата поставки</th><th>Время</th><th></th></tr>";
    foreach($result as $row){
        echo "<tr>";
            echo "<td>". $row["postavka_name"]. "</td>";
            echo "<td>". $row["product_name"]. "</td>";
            echo "<td>". $row["ProductCount"]. "</td>";
            echo "<td>". $row["PostavkaDate"]. "</td>";
            echo "<td>". $row["time"]. "</td>";
            echo "<td><a style='  text-decoration: none;' href='updatePrivoz.php?id=". $row["id"]. "'>Изменить</a></td>";
            echo "<td><a href='podrobneePrivoz.php?id=". $row["id"]. "' style='  text-decoration: none;'>Подробнее</a></td>";
            echo "<td><form action='deletePrivoz.php' method='POST'>
                        <input type='hidden' name='id' value='". $row["id"]. "' />
                        <input style='border: none;   text-decoration: none;' type='submit' value='Удалить'>
                </form></td>";
        echo "</tr>";
    }
    echo "</table>";
    $result->free();
} else{
    echo "Ошибка: ". $conn->error;
}
$conn->close();
?>
</body>
</html>


