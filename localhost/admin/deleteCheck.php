<?php
if(isset($_POST["id"]))
{
    $conn = new mysqli("localhost", "root", "", "market");
    if($conn->connect_error){
        die("Ошибка: " . $conn->connect_error);
    }
    $id = $conn->real_escape_string($_POST["id"]);
    $sql = "DELETE FROM Chek WHERE id = '$id'";
    if($conn->query($sql)){
        echo "чек удален ";
        header("Location: indexCheck.php");
    }
    else{
        echo "Ошибка: " . $conn->error;
    }
    $conn->close();  
}
?>