<!DOCTYPE html>
<html>
<head>
<title>магтерочка</title>
<meta charset="utf-8" />

</head>
<body >
<h2>Поставщики</h2>
<div style="margin-bottom: 10px;">
<a href="http://localhost/formPost.php" style="background-color: gray; color: white; padding: 5px; border-radius: 5px;  text-decoration: none;">Добавить поставщика</a>
<a href="http://localhost/formPrivoz.php" style="background-color: gray; color: white; padding: 5px; border-radius: 5px;  text-decoration: none;">Добавить привоз</a>
</div>
<?php
$conn = new mysqli("localhost", "root", "", "market");
if($conn->connect_error){
    die("Ошибка: " . $conn->connect_error);
}

$sql = "SELECT * FROM Postavka";
if($result = $conn->query($sql)){
    echo "<table><tr><th>Имя</th><th></th></tr>";
    foreach($result as $row){
        echo "<tr>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td><a  href='podrobneePost.php?id=" . $row["id"] . "' style='background-color: gray; color: white; padding: 5px; border-radius: 5px;  text-decoration: none;'>Подробнее</a></td>";
            echo "<td><form action='deletePost.php' method='POST'>
                        <input type='hidden' name='id' value='" . $row["id"] . "' />
                        <input style='border: none; background-color: gray; color: white; padding: 5px; border-radius: 5px;  text-decoration: none;' type='submit' value='Удалить'>
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


