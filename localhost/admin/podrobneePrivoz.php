<?php
if(isset($_GET["id"]))
{
    $conn = new mysqli("localhost", "root", "", "market");
    if($conn->connect_error){
        die("Ошибка: ". $conn->connect_error);
    }
    $id = $conn->real_escape_string($_GET["id"]);
    $sql = "SELECT Privoz.id, Postavka.name AS postavka_name, Products.ProductName AS product_name, Privoz.ProductCount, Privoz.PostavkaDate, Privoz.time
    FROM Privoz
    INNER JOIN Postavka ON Privoz.postavka_id = Postavka.id
    INNER JOIN Products ON Privoz.product_id = Products.id
            WHERE Privoz.id = '$id'";
    if($result = $conn->query($sql)){
        if($result->num_rows > 0){
            foreach($result as $row){
                $name = $row["postavka_name"];
                $count = $row["product_name"];
                $productName = $row["ProductCount"];
                $PostavkaDate = $row["PostavkaDate"];
                $time =  $row["time"];
                echo "<div>
                        <h3>Информация о продукте</h3>
                        <p>Имя поставщика: $name</p>
                        <p>продукт наме: $count  шт</p>
                        <p>колво: $productName </p>
                        <p>Дата поставки: $PostavkaDate </p>
                        <p>Время поставки: $time </p>
                    </div>";
            }
        }
        else{
            echo "<div>Продукт не найден</div>";
        }
        $result->free();
    } else{
        echo "Ошибка: ". $conn->error;
    }
    $conn->close();
}
?>
