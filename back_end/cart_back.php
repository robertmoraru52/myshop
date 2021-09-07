<?php
session_start();
require "connect_db.php";

if(isset($_POST["add-to-cart"])){
    $quantity = (int)$_POST["quantity"];
    $product_id = (int)$_SESSION["url_details"];
    if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
        if (array_key_exists($product_id, $_SESSION['cart'])) {
            $_SESSION['cart'][$product_id] += $quantity;

        } else {
            $_SESSION['cart'][$product_id] = $quantity;

        }
    } else {
        $_SESSION['cart'] = array($product_id => $quantity);
    }
    header("location: ../front_end/cart.php");
    exit;
    unset($_SESSION['cart']);
}

