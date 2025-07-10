<?php
session_start();
include 'db.php'; // include database connection

// Simulate storing order
$customer_name = $_POST['customer_name'];
$customer_email = $_POST['customer_email'];

$cart = $_SESSION['cart'] ?? [];

$total = 0;
foreach ($cart as $item) {
    $total += $item['price'] * $item['quantity'];
}

// Insert into orders table
$stmt = $pdo->prepare("INSERT INTO orders (customer_name, customer_email, total_amount) VALUES (?, ?, ?)");
$stmt->execute([$customer_name, $customer_email, $total]);

$order_id = $pdo->lastInsertId();

// Insert order items
foreach ($cart as $item) {
    $stmt = $pdo->prepare("INSERT INTO order_items (order_id, product_id, quantity) VALUES (?, ?, ?)");
    $stmt->execute([$order_id, $item['id'], $item['quantity']]);
}

// Clear the cart
unset($_SESSION['cart']);

echo "Payment successful! Your order ID is $order_id.";
?>
