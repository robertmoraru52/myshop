<?php
session_start();
require "connect_db.php";

$id = $_POST["id"];
$sql = "SELECT * FROM Products WHERE id = :i";


$stmt = $conn->prepare($sql);
$stmt->bindParam(":i", $id);
$stmt->execute();
$rowList = $stmt->fetchAll();

foreach($rowList as $row){
    $_SESSION["name"] = $row["name"];
    $_SESSION["price"] = $row["price"];
    $_SESSION["stock"] = $row["stock"];
}
    
$name = trim($_POST["name"]);
$price = trim($_POST["price"]);
$stock = trim($_POST["stock"]);

if(isset($_POST["submit"])){
    $stmt = $conn->prepare("UPDATE Products SET name = :n, stock = :s, price = :p WHERE id = :i ;");
    $stmt->bindParam(":n",$name,PDO::PARAM_STR);
    $stmt->bindParam(":s", $stock, PDO::PARAM_STR);
    $stmt->bindParam(":p", $price, PDO::PARAM_STR);
    $stmt->bindParam(":i", $id);
    $stmt->execute();
    
    header("location: ../front_end/admin_products.php");
}
else{
    echo "error";
}