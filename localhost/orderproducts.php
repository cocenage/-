<?php
session_start();


//юзер
$userId = null;
if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];
    $conn = new mysqli("localhost", "root", "root", "market");
    if ($conn->connect_error) {
        die("Ошибка: ". $conn->connect_error);
    }

    $sql = "SELECT id FROM Users WHERE username = '$username'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $userId = $row["id"];
    }
}
?>

<?php
if ($userId!== null) {

    $sql = "SELECT Shopping.id, Users.UserName AS name, Products.ProductName AS product_name, Shopping.kolvo, Shopping.priezd, Shopping.address, Shopping.time
    FROM Shopping
    INNER JOIN Users ON Shopping.UserId = Users.id
    INNER JOIN Products ON Shopping.ProductId = Products.id WHERE Shopping.UserId = $userId";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "имя: ". $row["name"].  "<br>";
            echo "название: ". $row["product_name"].  "<br>";
            echo "колво: ". $row["kolvo"].  "<br>";
            echo "где: ". ($row["priezd"] == 0? "В пути" : "Товар прибыл").  "<br>";
            echo "адресс: ". $row["address"].  "<br>";
        }
    } else {
        echo "у вас нет заказов";
    }
} else {
    echo "войти в аккаунт";
}
?>