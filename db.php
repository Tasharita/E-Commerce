<?php
$hname='localhost:3307';
$uname='root';
$pass='Kairitupoa-1';
$db='ecommerce';

$conn=mysqli_connect($hname,$uname,$pass,$db);

if(!$conn){
    die( 'Iza mse'. mysqli_connect_error());
}

echo "LETS GOO";

?>