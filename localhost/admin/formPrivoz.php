<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавить продукт</title>
</head>
<body>
    <form action="createPrivoz.php" method="POST">
        <p>дата поставки:
        <input type="" name="PostavkaDate" value="" /></p>
        <p>время поставки:
        <input type="" name="time" value="" /></p>
        <p>Кол-во продуктов:
        <input type="number" name="ProductCount" /></p>
        <p>продукт:
            <select name="Postavka_id">
                <?php
                    $conn = mysqli_connect("localhost", "root", "", "market");
                    if($conn->connect_error){
                        die("Ошибка: " . $conn->connect_error);
                    }
                    $sql = "SELECT id, name FROM Postavka";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='". $row["id"]. "'>". $row["name"]. "</option>";
                        }
                    } else {
                        echo "<option value=''>поставщики не найдены</option>";
                    }
                    $conn->close()
               ?>
            </select></p>
        <p>продукт:
            <select name="Product_id">
                <?php
                    $conn = mysqli_connect("localhost", "root", "", "market");
                    if($conn->connect_error){
                        die("Ошибка: " . $conn->connect_error);
                    }
                    $sql = "SELECT id, ProductName FROM Products";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='". $row["id"]. "'>". $row["ProductName"]. "</option>";
                        }
                    } else {
                        echo "<option value=''>продукты не найдены</option>";
                    }
                    $conn->close()
               ?>
            </select></p>
        <input type="submit" value="Добавить">
    </form>
</body>
</html>