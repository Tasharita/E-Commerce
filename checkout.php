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
 <nav class="navbar">
      <!-- From Uiverse.io by JulanDeAlb --> 
    <label class="popup">
                <input type="checkbox"/>
                    <div class="burger" tabindex="0">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <nav class="popup-window">
                         <legend>Navigation</legend>
                        <ul>
                        <li>
                            <button className='dropdown' onclick="window.location.assign('./index.html')">
                                <svg stroke-linejoin="round" stroke-linecap="round" stroke-width="2" stroke="currentColor" fill="none" viewBox="0 0 24 24" height="14" width="14" xmlns="http://www.w3.org/2000/svg">
              
                                </svg>
                                <span className='fig'>Home</span>
                            </button>
                        </li>
                        <li>
                            <button class="dropdown">
                                <svg stroke-linejoin="round" stroke-linecap="round" stroke-width="2" stroke="currentColor" fill="none" viewBox="0 0 24 24" height="14" width="14" xmlns="http://www.w3.org/2000/svg">
                                </svg>
                                
                                <span className='fig'>Clothes</span>
                            </button>
                        </li>
                        <li>
                            <button>
                                <svg stroke-linejoin="round" stroke-linecap="round" stroke-width="2" stroke="currentColor" fill="none" viewBox="0 0 24 24" height="14" width="14" xmlns="http://www.w3.org/2000/svg">
                                </svg>
                                <span className='fig'>Electronics</span>
                            </button>
                        </li>
                            <hr/>
                            <li>
                                <legend>Your Collection</legend>
                                <button>
                                    <svg stroke-linejoin="round" stroke-linecap="round" stroke-width="2" stroke="currentColor" fill="none" viewBox="0 0 24 24" height="14" width="14" xmlns="http://www.w3.org/2000/svg">
                                    </svg>
                                    <span className='fig' onclick="window.location.assign('./cart.php')">Your Cart</span>
                                </button>
                            </li>
                        </ul>
                    </nav>
            </label>
    

    <div class="logo">MyDuka</div>
    
    <div class="location">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
  <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A32 32 0 0 1 8 14.58a32 32 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10"/>
  <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4m0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
</svg><div class="location-text">
        <div class="line1">Deliver to</div>
        <div class="line2"><strong>Kenya</strong></div>
      </div>
    </div>
    
    <div class="search-container">
      <select>
        <option>All</option>
      </select>
      <input type="text" placeholder="Search MyDuka" id="Search-bar" />
      <button class="search"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
</svg></button>
    </div>
  </nav>

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
