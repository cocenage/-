<?php
if(isset($_GET["id"]))
{
    $conn = new mysqli("localhost", "root", "", "market");
    if($conn->connect_error){
        die("Ошибка: ". $conn->connect_error);
    }
    $id = $conn->real_escape_string($_GET["id"]);
    $sql = "SELECT * FROM Users WHERE id = '$id'";
    if($result = $conn->query($sql)){
        if($result->num_rows > 0){
            foreach($result as $row){
                $name = $row["UserName"];
                $count = $row["Email"];
                $productName = $row["password"];
                echo "<div>
                        <h3>Информация о юзере</h3>
                        <p>Имя : $name</p>
                        <p>эмаил: $count  </p>
                        <p>пароль: $productName </p>

                    </div>";
            }
        }
        else{
            echo "<div>юзер не найден</div>";
        }
        $result->free();
    } else{
        echo "Ошибка: ". $conn->error;
    }
    $conn->close();
}
?>
