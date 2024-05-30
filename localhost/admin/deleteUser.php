<?php
if(isset($_POST["id"]))
{
    $conn = new mysqli("localhost", "root", "", "market");
    if($conn->connect_error){
        die("Ошибка: " . $conn->connect_error);
    }
    $id = $conn->real_escape_string($_POST["id"]);
    $sql = "DELETE FROM Users WHERE id = '$id'";
    if($conn->query($sql)){
        echo "Users удален ";
        header("Location: indexCheck.php");
    }
    else{
        echo "пользователь связан ";
        echo "Ошибка: " . $conn->error;
    }
    $conn->close();  
}
?>