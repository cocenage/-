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
$sql = "SELECT MAX(number_check) as max_number, MAX(operation_check) as max_operation FROM chek";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $number_check = $row["max_number"] + 1;
    $operation_check = $row["max_operation"] + 1;
} else {
    $number_check = 1;
    $operation_check = 1;
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
    <h1>Оформление заказа</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
        <input type="" name="id_user" value="<?php echo $userId;?>">
        <input type="" name="number_check" value="<?php echo $number_check;?>">
<input type="" name="operation_check" value="<?php echo $operation_check;?>">
        <input type="" name="name_chek" value="Чек">
        <input type="" name="inn" value="123456">
        <input type="" name="kkm" value="123456">
        <input type="text" name="date" value="<?php echo date('Y.m.d');?>" readonly>

        <label for="type_payment">Тип оплаты:</label>
        <select name="type_payment" id="type_payment">
            <option value="Наличка">Наличные</option>
            <option value="Банковская карта">Банковская карта</option>
        </select>

        <button type="submit">Оформить заказ</button>
    </form>
</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_user = $_POST['id_user'];
    $number_check = $_POST['number_check'];
    $operation_check = $_POST['operation_check'];
    $name_chek = $_POST['name_chek'];
    $inn = $_POST['inn'];
    $kkm = $_POST['kkm'];
    $type_payment = $_POST['type_payment'];
    $date = $_POST['date'];


    if ($userId!== null) {
        $sql = "INSERT INTO chek (id_user, number_check, operation_check, name_chek, inn, kkm, type_payment, date) VALUES ($id_user, $number_check, $operation_check, '$name_chek', '$inn', '$kkm', '$type_payment', '$date')";
        if ($conn->query($sql) === TRUE) {
            echo "<script>setTimeout(function(){window.location.href='main.php';}, 2000);</script>";
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
