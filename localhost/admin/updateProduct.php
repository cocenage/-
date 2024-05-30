<?php 
$conn = new mysqli("localhost", "root", "root", "market");
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
    $sql = "SELECT * FROM Products WHERE id = '$id'";
    if($result = $conn->query($sql)){
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $ProductName = $row["ProductName"];
            $price = $row["price"];
            $kolvo = $row["kolvo"];
            echo "<h3>Обновление чека
            </h3>
                <form method='post'>
                <p>Продукт:
                    <input type='text' name='ProductName' value='$ProductName' />
                </p>
                <p>Цена:
                    <input type='number' name='price' value='$price' />
                </p>
                <p>Количество:
                    <input type='number' name='kolvo' value='$kolvo' />
                </p>
                <input type='hidden' name='id' value='$id' />
                <input type='submit' value='Сохранить'>
            </form>";
        }
        else{
            echo "<div>Продукт не найден</div>";
        }
        $result->free();
    } else{
        echo "Ошибка: ". $conn->error;
    }
}
elseif (isset($_POST["ProductName"]) && isset($_POST["price"]) && isset($_POST["kolvo"]) && isset($_POST["id"])) {
      
    $ProductName = $conn->real_escape_string($_POST["ProductName"]);
    $price = $conn->real_escape_string($_POST["price"]);
    $kolvo = $conn->real_escape_string($_POST["kolvo"]);
    $id = $conn->real_escape_string($_POST["id"]);

    $sql = "UPDATE Products SET ProductName = '$ProductName', price = '$price', kolvo = '$kolvo' WHERE id = '$id'";
    if($result = $conn->query($sql)){
        header("Location: index.php");
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