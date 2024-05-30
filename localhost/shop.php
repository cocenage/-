<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Оформление заказа</title>
</head>
<body>
    <h1>Оформление заказа</h1>
    <form action="orders.php" method="POST">
        <label for="address">Адрес доставки:</label>
        <input type="text" id="address" name="address" required><br><br>
        <input type="submit" value="Оформить заказ">
    </form>
</body>
</html>