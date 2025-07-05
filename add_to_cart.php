<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: login.php?msg=please_login');
    exit();
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pname = $_POST['name'];
    $price = (float)$_POST['price'];
    $image = $_POST['image'];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Check if item already in cart
    $found = false;
    foreach ($_SESSION['cart'] as &$item) {
        if ($item['name'] === $pname) {
            $item['quantity'] += 1;
            $found = true;
            break;
        }
    }

    if (!$found) {
        $_SESSION['cart'][] = [
            'name' => $pname,
            'price' => $price,
            'image' => $image,
            'quantity' => 1
        ];
    }

    header('Location: cart.php');

   echo '<pre>';
   print_r($_SESSION);
   exit();
}
