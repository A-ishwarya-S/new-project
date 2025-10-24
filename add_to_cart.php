<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    echo "Please login first!";
    exit;
}

include 'db.php';

$user_id = $_SESSION['user_id'];
$item_name = $_POST['item_name'];
$item_price = $_POST['item_price'];

$stmt = $conn->prepare("INSERT INTO cart (user_id, item_name, item_price) VALUES (?, ?, ?)");
$stmt->bind_param("isd", $user_id, $item_name, $item_price);
$stmt->execute();
$stmt->close();
$conn->close();

echo "Added to cart!";
?>
