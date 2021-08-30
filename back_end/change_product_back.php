<?php
session_start();
require "connect_db.php";

$id = $_SESSION["change_prod_id"];
$name = trim($_POST["name"]);
$price = trim($_POST["price"]);
$stock = trim($_POST["stock"]);
$desc = trim($_POST["desc"]);

if(isset($_POST["submit"]) && !empty(trim($name)) && !empty(trim($price)) && !empty(trim($stock)) && !empty(trim($desc))){
    $stmt = $conn->prepare("UPDATE Products SET name = :n, stock = :s, price = :p, description = :d WHERE id = :i ;");
    $stmt->bindParam(":n",$name,PDO::PARAM_STR);
    $stmt->bindParam(":s", $stock, PDO::PARAM_STR);
    $stmt->bindParam(":p", $price, PDO::PARAM_STR);
    $stmt->bindParam(":d", $desc, PDO::PARAM_STR);
    $stmt->bindParam(":i", $id);
    $stmt->execute();
    
    header("location: ../front_end/admin_products.php");
}
else{
    echo "error";
}