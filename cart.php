<?php
session_start();

// Initialize cart if it doesn't exist
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Handle actions (increase/decrease)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $index = $_POST['index'];
    if ($_POST['action'] === 'increase') {
        $_SESSION['cart'][$index]['quantity'] += 1;
    } elseif ($_POST['action'] === 'decrease') {
        if ($_SESSION['cart'][$index]['quantity'] > 1) {
            $_SESSION['cart'][$index]['quantity'] -= 1;
        } else {
            array_splice($_SESSION['cart'], $index, 1);
        }
    }
    header("Location: cart.php"); // Prevent form resubmission
    exit();
}

$cart = $_SESSION['cart'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>MyDuka's Cart</title>
  <link rel="stylesheet" href="cart.css">
  <link rel="stylesheet" href="index.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<<<<<<< HEAD:cart.html
    <nav class="navbar">
        <!-- From Uiverse.io by JulanDeAlb -->
        <label class="popup">
            <input type="checkbox" />
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
=======
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
                                    <span className='fig'>Your Cart</span>
                                </button>
                            </li>
                        </ul>
                    </nav>
            </label>
    
>>>>>>> 4eae894c7b595e36e62cebd7403ed55c5082ad13:cart.php

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
                    <hr />
                    <li>
                        <legend>Your Collection</legend>
                        <button>
                            <svg stroke-linejoin="round" stroke-linecap="round" stroke-width="2" stroke="currentColor" fill="none" viewBox="0 0 24 24" height="14" width="14" xmlns="http://www.w3.org/2000/svg">
                            </svg>
                            <span className='fig'>Your Cart</span>
                        </button>
                    </li>
                </ul>
            </nav>
        </label>


        <div class="logo">MyDuka</div>

        <div class="location">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A32 32 0 0 1 8 14.58a32 32 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10" />
                <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4m0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
            </svg><div class="location-text">
                <div class="line1">Deliver to</div>
                <div class="line2"><strong>Kenya</strong></div>
            </div>
        </div>

        <div class="search-container">
            <select>
                <option>All</option>
            </select>
            <input type="text" placeholder="Search MyDuka" />
            <button class="search">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                </svg>
            </button>
        </div>
    </nav>
    <div class="container mt-5">
        <h2>Your Shopping Cart</h2>
        <div id="cart-items" class="mt-4">
            <!-- Items will be inserted here -->
            <p>Your cart is currently empty.</p>
        </div>

        <div class="text-end mt-4">
            <h4>Total: KES <span id="cart-total">0.00</span></h4>
            <a href="checkout.html" class="btn btn-success">Proceed to Checkout</a>
        </div>
    </div>
<<<<<<< HEAD:cart.html

=======
    
    <div class="search-container">
      <select>
        <option>All</option>
      </select>
      <input type="text" placeholder="Search MyDuka" />
      <button class="search"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
</svg></button>
    </div>
  </nav>

  <h1>
    <svg width="40" height="40" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
      <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
    </svg> MyCart
  </h1>

  <div id="cart-container">
    <?php if (empty($cart)): ?>
      <p>Your cart is empty.</p>
    <?php else: ?>
      <div class="row">
        <?php foreach ($cart as $index => $item): ?>
          <div class="card" style="width: 18rem;">
            <div class="image-container">
              <img src="<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['name']) ?>" class="img-fluid"/>
            </div>
            <div class="card-body">
              <h5><?= htmlspecialchars($item['name']) ?></h5>
              <p>Quantity: <?= $item['quantity'] ?></p>
              <p>Price: <?= $item['price'] ?> Ksh</p>
              <p><strong>Total: <?= $item['quantity'] * $item['price'] ?> Ksh</strong></p>

                <button class="add" onclick="updateCart(<?= $index ?>, 'increase')">+</button>
                <button class="subtract" onclick="updateCart(<?= $index ?>, 'decrease')">-</button>
                

            </div>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </div>
  <script>
function updateCart(index, action) {
  const formData = new FormData();
  formData.append("index", index);
  formData.append("action", action);

  fetch("cart.php", {
    method: "POST",
    body: formData
  })
  .then(response => response.text())
  .then(html => {
    const parser = new DOMParser();
    const doc = parser.parseFromString(html, 'text/html');
    const newCart = doc.getElementById("cart-container");
    document.getElementById("cart-container").innerHTML = newCart.innerHTML;
  });
}
</script>
<?php if (!empty($cart)): ?>
  <div style="margin: 40px 0; text-align: center;">
    <a href="checkout.php" class="btn btn-success btn-lg">Proceed to Checkout</a>
  </div>
<?php endif; ?>
>>>>>>> 4eae894c7b595e36e62cebd7403ed55c5082ad13:cart.php
</body>
</html>
