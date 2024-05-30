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
    $sql = "SELECT * FROM Postavka WHERE id = '$id'";
    if($result = $conn->query($sql)){
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $name = $row["name"];
            echo "<h3>Обновление поставщика</h3>
                <form method='post'>
                <p>Имя:
                    <input type='text' name='name' value='$name' />
                    <input type='hidden' name='id' value='$id' />
                    <input type='submit' value='Сохранить'>
                </form>";
        }
        else{
            echo "<div>Поставщик не найден</div>";
        }
        $result->free();
    } else{
        echo "Ошибка: ". $conn->error;
    }
}
elseif (isset($_POST["name"]) && isset($_POST["id"])) {
      
    $name = $conn->real_escape_string($_POST["name"]);
    $id = $conn->real_escape_string($_POST["id"]);

    $sql = "UPDATE Postavka SET name = '$name' WHERE id = '$id'";
    if($result = $conn->query($sql)){
        header("Location: indexpost.php");
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