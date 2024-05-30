<!DOCTYPE html>
<html>
<head>
<title>Подробнее о продукте</title>
<meta charset="utf-8" />
</head>
<body>
<?php
if(isset($_GET["id"]))
{
    $conn = new mysqli("localhost", "root", "root", "market");
    if($conn->connect_error){
        die("Ошибка: " . $conn->connect_error);
    }
    $id = $conn->real_escape_string($_GET["id"]);
    $sql = "SELECT P.ProductName, P.price, P.kolvo, C.Category	 
    FROM Products P 
    INNER JOIN Categories C ON P.CategoryId = C.id 
    WHERE P.id = '$id'";
    if($result = $conn->query($sql)){
        if($result->num_rows > 0){
            foreach($result as $row){
                $ProductName = $row["ProductName"];
                $price = $row["price"];
                $kolvo = $row["kolvo"];
                $category = $row["Category"];
                echo "<div>
                        <h3>Информация о продукте</h3>
                        <p>Название продукта: $ProductName</p>
                        <p>цена: $price р</p>
                        <p>Кол-во: $kolvo шт</p>
                        <p>Категория продукта: $category</p>
                    </div>";
            }
        }
        else{
            echo "<div>Продукт не найден</div>";
        }
        $result->free();
    } else{
        echo "Ошибка: " . $conn->error;
    }
    $conn->close();
}
?>
<a href="http://localhost/admin/main.php" style="  text-decoration: none;">Вернуться на главную</a>
</body>
</html>


