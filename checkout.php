<?php
session_start();
require_once 'db.php';

$cart = $_SESSION['cart'] ?? [];

$total = 0;
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Checkout</title>
    <!-- Reuse styles from cart page -->
    <link rel="stylesheet" href="cart.css">
    <link rel="stylesheet" href="index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<!-- <?php include 'header.php'; ?> -->

<div class="container mt-5">
    <div class="card p-4 shadow">
        <h2 class="mb-4">Checkout Form</h2>

        <?php if (!empty($cart)): ?>
            <p><strong>Items in Cart:</strong></p>
            <ul>
                <?php foreach ($cart as $item): 
                    $total += $item['price'] * $item['quantity'];
                ?>
                    <li><?= htmlspecialchars($item['name']) ?> - <?= $item['quantity'] ?> x <?= $item['price'] ?> Ksh</li>
                <?php endforeach; ?>
            </ul>

            <p class="mt-3"><strong>Total to Pay:</strong> <?= $total ?> Ksh</p>

            <form action="checkout_process.php" method="POST">
                <div class="mb-3">
                    <label for="amount_paid" class="form-label">Amount Paid (Ksh):</label>
                    <input type="number" id="amount_paid" name="amount_paid" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="payment_method" class="form-label">Payment Method:</label>
                    <select name="payment_method" id="payment_method" class="form-select" required>
                        <option value="">--Select--</option>
                        <option value="M-Pesa">M-Pesa</option>
                        <option value="Card">Card</option>
                        <option value="Cash">Cash</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-success">Confirm Payment</button>
            </form>
        <?php else: ?>
            <p>Your cart is empty.</p>
        <?php endif; ?>
    </div>
</div>

</body>
</html>
