<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавить продукт</title>
</head>
<body>
    <form action="create.php" method="POST">
        <p>название продукта:
        <input type="text" name="productName" /></p>
        <p>количество:
        <input type="number" name="kolvo" /></p>
        <p>цена:
        <input type="number" name="price" /></p>
        <p>категория продукта:
            <select name="category">
                <?php
                    $conn = mysqli_connect("localhost", "root", "", "market");
                    if($conn->connect_error){
                        die("Ошибка: " . $conn->connect_error);
                    }
                    $sql = "SELECT id, Category FROM Categories";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='". $row["id"]. "'>". $row["Category"]. "</option>";
                        }
                    } else {
                        echo "<option value=''>категории не найдены</option>";
                    }
                    $conn->close()
               ?>
            </select></p>
        <input type="submit" value="Добавить">
    </form>
</body>
</html>