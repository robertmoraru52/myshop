<?php
require "connect_db.php";

$productId = $_POST["product"];
$categoryId = $_POST["category"];
$sqlProduct = "SELECT * FROM Products WHERE id = :prod";
$sqlCategory = "SELECT * FROM Categories WHERE id = :cat";
$sqlAssign = "INSERT INTO Products_Categories(product_id, category_id) VALUES(:pa, :ca)";

$stmt = $conn->prepare($sqlProduct);
$stmt->bindParam(":prod", $productId);
$stmt->execute();

if($stmt->rowCount() == 0){
    $productError = true;
}
else{
    $productError = false;
}

$stmt = $conn->prepare($sqlCategory);
$stmt->bindParam(":cat", $categoryId);
$stmt->execute();
if($stmt->rowCount()==0){
    $categoryError = true;
}
else{
    $categoryError = false;
}

if(!$productError && !$categoryError){
    $stmt = $conn->prepare($sqlAssign);
    $stmt->bindParam(":pa", $productId);
    $stmt->bindParam(":ca", $categoryId);
    $stmt->execute();
    header("location: ../front_end/admin_categories.php");
}
