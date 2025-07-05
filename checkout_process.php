<?php
session_start();
require_once 'db.php';

$amount_paid = (float) $_POST['amount_paid'];
$payment_method = $_POST['payment_method'];
$cart = $_SESSION['cart'] ?? [];

$total = 0;
foreach ($cart as $item) {
    $total += $item['price'] * $item['quantity'];
}

if ($amount_paid < $total) {
    echo "<script>alert('Payment unsuccessful: Insufficient amount.'); window.history.back();</script>";
    exit();
}

// Insert each cart item into the database
foreach ($cart as $item) {
    $stmt = $conn->prepare("INSERT INTO orders (name, price, quantity, payment_method, amount_paid) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sdiss", 
        $item['name'], 
        $item['price'], 
        $item['quantity'], 
        $payment_method, 
        $amount_paid
    );
    $stmt->execute();
}
// Clear cart after success
unset($_SESSION['cart']);

echo "<script>alert('Payment successful. Thank you!'); window.location.href='index.php';</script>";
?>

