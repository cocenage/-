<?php
if(isset($_GET["id"]))
{
    $conn = new mysqli("localhost", "root", "", "market");
    if($conn->connect_error){
        die("Ошибка: ". $conn->connect_error);
    }
    $id = $conn->real_escape_string($_GET["id"]);
    $sql = "SELECT P.ProductCount, P.PostavkaDate, P.time, C.name, Pr.ProductName
            FROM Privoz P 
            INNER JOIN Postavka C ON P.Postavka_id = C.id 
            INNER JOIN Products Pr ON P.Product_id = Pr.id
            WHERE P.id = '$id'";
    if($result = $conn->query($sql)){
        if($result->num_rows > 0){
            foreach($result as $row){
                $name = $row["name"];
                $count = $row["ProductCount"];
                $productName = $row["ProductName"];
                $PostavkaDate = $row["PostavkaDate"];
                $time =  $row["time"];
                echo "<div>
                        <h3>Информация о продукте</h3>
                        <p>Имя поставщика: $name</p>
                        <p>Кол-во: $count  шт</p>
                        <p>Название продукта: $productName </p>
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
