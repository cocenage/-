<?php
session_start();

$conn = new mysqli("localhost", "root", "root", "market");
if($conn->connect_error){
    die("Ошибка: ". $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usernameInput = $_POST['username'];
    $passwordInput = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM Users WHERE UserName =? AND Password =?");
    $stmt->bind_param("ss", $usernameInput, $passwordInput);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        header("Location: main.php");
        $_SESSION["username"] = $usernameInput;
        exit();
    } else {
        echo "не удалось войти";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
</head>
<body>


<form  method="post">
	<label for="chk" aria-hidden="true">вход</label>
    <input type="text" id="username" name="username"  placeholder="username" required>
    <input type="password" id="password" name="password"  placeholder="password" required>
      <input type="submit" value="Login">
    </form>

</body>
</html>