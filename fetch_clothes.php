<?php
require_once 'db.php';

// Fetch data from FakeStoreAPI
$api_url = 'https://fakestoreapi.com/products/category/clothing';
$response = file_get_contents($api_url);

if ($response === FALSE) {
    die('Failed to fetch data from API');
}

$products = json_decode($response, true);

// Insert into DB
foreach ($products as $product) {
    $title = $conn->real_escape_string($product['title']);
    $price = (float)$product['price'];
    $image = $conn->real_escape_string($product['image']);
    $rating = (float)$product['rating']['rate'];
    $category = 'clothing';

    $sql = "INSERT INTO products (title, price, image, rating, category) 
            VALUES ('$title', $price, '$image', $rating, '$category')";

    if (!$conn->query($sql)) {
        echo "Error inserting $title: " . $conn->error . "<br>";
    } else {
        echo "Inserted: $title<br>";
    }
}

$conn->close();
?>
