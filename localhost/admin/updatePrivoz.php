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
    $sql = "SELECT Privoz.id, Postavka.name AS postavka_name, Products.ProductName AS product_name, Privoz.ProductCount, Privoz.PostavkaDate, Privoz.time
    FROM Privoz
    INNER JOIN Postavka ON Privoz.postavka_id = Postavka.id
    INNER JOIN Products ON Privoz.product_id = Products.id
            WHERE Privoz.id = '$id'";
    if($result = $conn->query($sql)){
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $name = $row["postavka_name"];
                $count = $row["product_name"];
                $productName = $row["ProductCount"];
                $PostavkaDate = $row["PostavkaDate"];
                $time =  $row["time"];
            echo "<h3>Обновление поставщика</h3>
                <form method='post'>
                <p>Имя:
                    <input type='text' name='postavka_name' value='$name' />
                    <input type='text' name='product_name' value='$count' />
                    <input type='text' name='ProductCount' value='$productName' />
                    <input type='text' name='PostavkaDate' value='$PostavkaDate' />
                    <input type='text' name='time' value='$time' />
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
elseif (isset($_POST["postavka_name"]) && isset($_POST["product_name"]) && isset($_POST["ProductCount"]) && isset($_POST["PostavkaDate"]) && isset($_POST["time"]) && isset($_POST["id"])) {
      
    $name = $conn->real_escape_string($_POST["postavka_name"]);
    $count = $conn->real_escape_string($_POST["product_name"]);
    $productName = $conn->real_escape_string($_POST["ProductCount"]);
    $PostavkaDate = $conn->real_escape_string($_POST["PostavkaDate"]);
    $time = $conn->real_escape_string($_POST["time"]);
    $id = $conn->real_escape_string($_POST["id"]);

    $sql = "UPDATE Privoz SET postavka_id = '$name', product_id = '$count', ProductCount = '$productName', PostavkaDate = '$PostavkaDate', time = '$time' WHERE id = '$id'";
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