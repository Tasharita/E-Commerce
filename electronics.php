<?php
// Fetch electronics from FakeStoreAPI
$api_url = 'https://fakestoreapi.com/products/category/electronics';

$contextOptions = [
    "ssl" => [
        "verify_peer" => false,
        "verify_peer_name" => false,
    ]
];
$context = stream_context_create($contextOptions);
$response = file_get_contents($api_url, false, $context);

if ($response === FALSE) {
    die('Failed to fetch electronics data.');
}

$products = json_decode($response, true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Electronics</title>
</head>
<body>

<h2>Electronics</h2>

<?php if (!empty($products)): ?>
    <?php foreach ($products as $p): ?>
        <div>
            <img src="<?php echo htmlspecialchars($p['image']); ?>" width="150" alt="<?php echo htmlspecialchars($p['title']); ?>">
            <h3><?php echo htmlspecialchars($p['title']); ?></h3>
            <p>Ksh <?php echo number_format($p['price'] * 100); ?></p>
            <p>Rating: <?php echo htmlspecialchars($p['rating']['rate']); ?> / 5</p>
            
            <!-- 💥 Add to Cart button -->
            <form action="cart.php" method="POST">
                <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($p['id']); ?>">
                <input type="hidden" name="title" value="<?php echo htmlspecialchars($p['title']); ?>">
                <input type="hidden" name="price" value="<?php echo htmlspecialchars($p['price']); ?>">
                <input type="hidden" name="image" value="<?php echo htmlspecialchars($p['image']); ?>">
                <input type="hidden" name="quantity" value="1">
                <button type="submit">Add to Cart</button>
            </form>
            <hr>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p>No electronics found.</p>
<?php endif; ?>

</body>
</html>
