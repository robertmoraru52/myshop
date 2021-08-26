<?php
session_start();
require "connect_db.php";
if(isset($_POST["quantity"])){
    $stmt = $conn->prepare("UPDATE Cart SET product_q = :i WHERE product_id = :g AND user_email = :em");
    $stmt->bindParam(":i",$_POST["quantity"]);
    $stmt->bindParam(":g", $_SESSION["multiply_id"]);
    $stmt->bindParam(":em", $_SESSION["email"]);
    $stmt->execute();
}

if(isset($_POST["add-to-cart"])){
    $stmt = $conn->prepare("SELECT * FROM Cart WHERE product_id = :p AND user_email = :em");
    $stmt->bindParam(":p", $_SESSION["url_details"]);
    $stmt->bindParam(":em", $_SESSION["email"]);
    $stmt->execute();
    if($stmt->rowCount()>0){
        $head = "location: ../front_end/details.php?product_id=".$_SESSION["url_details"]."&action=already";
        header($head);
    }
    else if($_SESSION["loggedin"] == true){
        $stmt = $conn->prepare("INSERT INTO Cart (product_id, product_name, product_price, user_email) VALUES (:p, :n,:pr, :u)");
        $stmt->bindParam(":p", $_SESSION["url_details"]);
        $stmt->bindParam(":n", $_SESSION["product_cart_name"]);
        $stmt->bindParam(":pr", $_SESSION["product_cart_price"]);
        $stmt->bindParam(":u", $_SESSION["email"]);

        $stmt->execute();
        header("location: ../front_end/cart.php");
    }
    else if($_SESSION["loggedin"] == false){
        $headLog = "location: ../front_end/details.php?product_id=".$_SESSION["url_details"]."&error=nolog";
        header($headLog);
    }
}

