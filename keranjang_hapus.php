<?php
include 'koneksi.php';
session_start();

$key = $_GET['key'];
$cart = $_SESSION['cart'];
unset($_SESSION['cart'][$key]);
$_SESSION['cart'] = array_values($_SESSION['cart']);
header("location:keranjang.php");
?>