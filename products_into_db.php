<?php
require_once 'db.php'; // Contains $conn

$data = json_decode(file_get_contents('php://input'), true);

if (is_array($data)) {
    foreach ($data as $product) {
        $title = $conn->real_escape_string($product['title']);
        $price = (float)$product['price'];
        $image = $conn->real_escape_string($product['image']);
        $rating = (float)$product['rating']['rate'];

        $sql = "INSERT INTO products (title, price, image, rating) 
                VALUES ('$title', $price, '$image', $rating)";

        if (!$conn->query($sql)) {
            echo "Error: " . $conn->error;
        }
    }

    echo "Products inserted successfully.";
} else {
    echo "Invalid data.";
}

$conn->close();
?>