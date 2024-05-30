<?php

$username = $_POST['username'];
$password = $_POST['password'];

$expectedUsername = "admin";
$expectedPassword = "123";

if ($username === $expectedUsername && $password === $expectedPassword) {

  header("Location: main.php");
  exit();
} else {

  echo "Invalid username or password.";
}
?>
