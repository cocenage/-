<?php
session_start();

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

$cartItems = [];
if (isset($_SESSION['cart'])) {
    $productIds = implode(',', array_keys($_SESSION['cart']));
    $sql = "SELECT id, ProductName, price FROM Products WHERE id IN ($productIds)";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $productId = $row['id'];
        $cartItems[$productId] = [
            'name' => $row['ProductName'],
            'price' => $row['price'],
            'quantity' => $_SESSION['cart'][$productId],
        ];
    }
}

// Get the last check number and increment it by 1
$sql = "SELECT MAX(number_check) as max_number FROM chek";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$number_check = $row['max_number'] + 1;

// Get the last operation number and increment it by 1
$sql = "SELECT MAX(operation_check) as max_operation FROM chek";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$operation_check = $row['max_operation'] + 1;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $address = $_POST['address'];

    if ($userId!== null) {
        $sql = "INSERT INTO Shopping (UserId, ProductId, kolvo, address) VALUES ";
        foreach ($cartItems as $productId => $item) {
            $quantity = $item['quantity'];
            $sql.= "($userId, $productId, $quantity, '$address'),";
        }
        $sql = rtrim($sql, ',');
        if ($conn->query($sql) === TRUE) {
            echo "Заказ успешно оформлен!";
            unset($_SESSION['cart']);
        } else {
            echo "Ошибка: ". $conn->error;
        }
    } else {
        echo "Ошибка: ". $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Оформление заказа</title>
</head>
<body>
    <h1>покупка заказа</h1>
        <a href="buy.php">перейти к покупке</a>
    </form>
</body>
</html>

