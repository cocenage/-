<?php
session_start();


$conn = new mysqli("localhost", "root", "root", "market");
if ($conn->connect_error) {
    die("Ошибка: ". $conn->connect_error);
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


echo "<h1>Корзина</h1>";
echo "<table><tr><th>Название</th><th>цена</th><th>штук </th></tr>";
foreach ($cartItems as $productId => $item) {
    echo "<tr>";
    echo "<td>". $item['name']. "</td>";
    echo "<td>". $item['price']. "</td>";
    echo "<td>". $item['quantity']. "</td>";
    echo "</tr>";
}
echo "</table>";
if (!empty($cartItems)) {
    echo "<div style='margin-top: 20px;'>
    <a style=' cursor: pointer;  text-decoration: none;'  href='shop.php'>Оформление заказа</a>
    </div>";
}
echo "<div style='margin-top: 20px;'>
    <a style=' cursor: pointer;   text-decoration: none;'  href='main.php'>На главную</a>
    </div>";
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
</body>
</html>