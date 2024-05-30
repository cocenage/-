<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавить чек
    </title>
</head>
<body>
    <form action="createCheck.php" method="POST">
        <p>номер чека:
        <input type="text" name="number_check" /></p>
        <p>номер операции:
        <input type="number" name="operation_check" /></p>
        <p>название:
        <input type="text" name="name_chek" /></p>
        <p>инн:
        <input type="number" name="inn" /></p>
        <p>ккм:
        <input type="text" name="kkm" /></p>
        <p>вид оплаты:
        <input type="text" name="type_payment" /></p>
        <p>дата оплаты:
        <input type="text" name="date" /></p>
        <p>юзер:
            <select name="id_user">
                <?php
                    $conn = mysqli_connect("localhost", "root", "", "market");
                    if($conn->connect_error){
                        die("Ошибка: " . $conn->connect_error);
                    }
                    $sql = "SELECT id  FROM Users ";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='". $row["id"]. "'>". $row["id"]. "</option>";
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