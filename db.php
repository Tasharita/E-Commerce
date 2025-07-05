<?php
$hname='localhost:3305';
$uname='root';
$pass='Crossword25.';
$db='ecommerce';

$conn=mysqli_connect($hname,$uname,$pass,$db);

if(!$conn){
    die( 'Iza mse'. mysqli_connect_error());
}

$sql="CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    price DECIMAL(10,2),
    quantity INT,
    payment_method VARCHAR(50),
    amount_paid DECIMAL(10,2),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);";

$sql2="CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    image TEXT,
    rating DECIMAL(3,2),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";



if($conn->query($sql2)===true){
    echo "Product Table Created";
}else{
    echo"ERROR Buddy".$conn->error;
}

?>

