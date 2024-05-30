<!DOCTYPE html>
<html>
<head>
<title>магазинчик</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Продукты</h2>
<div style="margin-bottom: 10px;">
<a href="http://localhost/admin/form.php" style="  text-decoration: none;">Добавить продукт</a>
<a href="http://localhost/admin/formCategory.php" style=" text-decoration: none;">Добавить категорию</a>
</div>
<?php
$conn = new mysqli("localhost", "root", "root", "market");
if($conn->connect_error){
    die("Ошибка: " . $conn->connect_error);
}

$sql = "SELECT P.id, P.ProductName, P.price, P.kolvo, C.Category 
        FROM Products P 
        INNER JOIN Categories C ON P.CategoryId = C.id";
if($result = $conn->query($sql)){
    echo "<table><tr><th>Название</th><th>Категория</th><th></th></tr>";
    foreach($result as $row){
        echo "<tr>";
            echo "<td>" . $row["ProductName"] . "</td>";
            echo "<td>". $row["Category"]. "</td>";
            echo "<td><a  style='  text-decoration: none;' href='updateProduct.php?id=" . $row["id"] . "'>Изменить</a></td>";
            echo "<td><a  href='podrobnee.php?id=" . $row["id"] . "' style='  text-decoration: none;'>Подробнее</a></td>";
            echo "<td><form action='delete.php' method='POST'>
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
<h3>категории</h3>
<?php
$conn = new mysqli("localhost", "root", "root", "market");
if($conn->connect_error){
    die("Ошибка: " . $conn->connect_error);
}

$sql = "SELECT * FROM Categories";
if($result = $conn->query($sql)){
    echo "<table><tr><th>Название</th><th></th></tr>";
    foreach($result as $row){
        echo "<tr>";
            echo "<td>" . $row["Category"] . "</td>";
            echo "<td><a  style='  text-decoration: none;' href='updateCategory.php?id=" . $row["id"] . "'>Изменить</a></td>";
            echo "<td><form action='deleteCategory.php' method='POST'>
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


