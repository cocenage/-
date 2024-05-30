<?php
session_start();

$productId = $_POST['id'];
$quantity = $_POST['quantity'];

// Add the product to the shopping cart
if (isset($_SESSION['cart'])) {
    $_SESSION['cart'][$productId] += $quantity;
} else {
    $_SESSION['cart'] = [$productId => $quantity];
}

// Redirect to the shopping cart page
header('Location: basket.php');
exit;
?>