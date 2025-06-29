<?php
session_start();
require_once 'db.php';

$cart = $_SESSION['cart'] ?? [];

$total = 0;
foreach ($cart as $item) {
    $total += $item['price'] * $item['quantity'];
    echo $item['name'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
</head>
<body>
<h2>Checkout Form</h2>

<p><strong>Total to Pay:</strong> <?= $total ?> Ksh</p>

<form action="checkout_process.php" method="POST">
    <label>Amount Paid (Ksh):</label><br>
    <input type="number" name="amount_paid" required><br><br>

    <label>Payment Method:</label><br>
    <select name="payment_method" required>
        <option value="">--Select--</option>
        <option value="M-Pesa">M-Pesa</option>
        <option value="Card">Card</option>
        <option value="Cash">Cash</option>
    </select><br><br>

    <button type="submit">Confirm Payment</button>
</form>
</body>
</html>
