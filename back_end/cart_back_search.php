<?php
session_start();
require "connect_db.php";

if(isset($_POST["add-to-cart"])){
    $stmt = $conn->prepare("SELECT * FROM Cart WHERE product_id = :p AND user_email = :em");
    $stmt->bindParam(":p", $_SESSION["product_cart_id"]);
    $stmt->bindParam(":em", $_SESSION["email"]);
    $stmt->execute();
    if($stmt->rowCount()>0){
        $head = "location: ../front_end/details_search.php?product_id=".$_SESSION["product_cart_id"]."&action=already";
        header($head);
    }
    else if($_SESSION["loggedin"] == true){
        $stmt = $conn->prepare("INSERT INTO Cart (product_id, product_name, product_price, user_email) VALUES (:p, :n,:pr, :u)");
        $stmt->bindParam(":p", $_SESSION["product_cart_id"]);
        $stmt->bindParam(":n", $_SESSION["product_cart_name"]);
        $stmt->bindParam(":pr", $_SESSION["product_cart_price"]);
        $stmt->bindParam(":u", $_SESSION["email"]);

        $stmt->execute();
        header("location: ../front_end/cart.php");
    }
    else if($_SESSION["loggedin"] == false){
        $headLog = "location: ../front_end/details_search.php?product_id=".$_SESSION["product_cart_id"]."&error=nolog";
        header($headLog);
    }
}

