<?php
$hname='localhost:3305';
$uname='root';
$pass='Crossword25.';
$db='ecommerce';

$conn=mysqli_connect($hname,$uname,$pass,$db);

if(!$conn){
    die( 'Iza mse'. mysqli_connect_error());
}

echo "LETS GOO";

?>