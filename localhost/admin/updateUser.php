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
    $sql = "SELECT * FROM Users WHERE id = '$id'";
    if($result = $conn->query($sql)){
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $UserName = $row["UserName"];
            $Email = $row["Email"];
            $Password = $row["password"];
            echo "<h3>Обновление юзера</h3>
                <form method='post'>
                <p>Имя:
                    <input type='text' name='UserName' value='$UserName' />
                    <p>эмаил:
                    <input type='text' name='Email' value='$Email' />
                    <p>пароль:
                    <input type='text' name='password' value='$Password' />
                    <input type='hidden' name='id' value='$id' />
                    <input type='submit' value='Сохранить'>
                </form>";
        }
        else{
            echo "<div>юзера не найден</div>";
        }
        $result->free();
    } else{
        echo "Ошибка: ". $conn->error;
    }
}
elseif (isset($_POST["UserName"]) && isset($_POST["Email"]) && isset($_POST["password"]) && isset($_POST["id"])) {
      
    $UserName = $conn->real_escape_string($_POST["UserName"]);
    $Email = $conn->real_escape_string($_POST["Email"]);
    $Password = $conn->real_escape_string($_POST["password"]);
    $id = $conn->real_escape_string($_POST["id"]);

    $sql = "UPDATE Users SET UserName = '$UserName', Email = '$Email', password = '$Password' WHERE id = '$id'";
    if($result = $conn->query($sql)){
        header("Location: indexCheck.php");
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