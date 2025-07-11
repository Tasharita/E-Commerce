<?php
// FakeStore API URLs
$menUrl = "https://fakestoreapi.com/products/category/men's clothing";
$womenUrl = "https://fakestoreapi.com/products/category/women's clothing";

// Allow insecure SSL temporarily
$contextOptions = [
    "ssl" => [
        "verify_peer" => false,
        "verify_peer_name" => false,
    ]
];
$context = stream_context_create($contextOptions);

// Fetch both categories
$menResponse = file_get_contents($menUrl, false, $context);
$womenResponse = file_get_contents($womenUrl, false, $context);

// Decode and merge
$menProducts = json_decode($menResponse, true) ?? [];
$womenProducts = json_decode($womenResponse, true) ?? [];

$allClothes = array_merge($menProducts, $womenProducts);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Clothing</title>
</head>
<body>

<h2>All Clothing</h2>

<?php if (!empty($allClothes)): ?>
    <?php foreach ($allClothes as $p): ?>
        <div>
            <img src="<?php echo htmlspecialchars($p['image']); ?>" width="150" alt="<?php echo htmlspecialchars($p['title']); ?>">
            <h3><?php echo htmlspecialchars($p['title']); ?></h3>
            <p>Ksh <?php echo number_format($p['price'] * 100); ?></p>
            <p>Rating: <?php echo htmlspecialchars($p['rating']['rate']); ?> / 5</p>

            <!-- Add to cart form -->
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
    <p>No clothing found </p>
<?php endif; ?>

</body>
</html>
