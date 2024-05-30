<!DOCTYPE html>
<html>
<head>
<title>категории</title>
<meta charset="utf-8" />
</head>
<body>
<h1>Категории продуктов</h1>
<div style="margin-bottom: 10px;">

</div>
<?php
$conn = new mysqli("localhost", "root", "root", "market");
if($conn->connect_error){
    die("Ошибка: " . $conn->connect_error);
}

$sql = "SELECT P.id, P.Category, C.ProductName 
        FROM Categories P 
        INNER JOIN Products C ON C.CategoryId = P.id";
if($result = $conn->query($sql)){
    echo "<table><tr><th>Категория</th><th>Продукт </th><th></th></tr>";
    foreach($result as $row){
        echo "<tr>";
            echo "<td>" . $row["Category"] . "</td>";
            echo "<td>". $row["ProductName"]. "</td>";
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


