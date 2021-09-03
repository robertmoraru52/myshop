<?php
require "connect_db.php";

$name = trim($_POST["name"]);
$stock = trim($_POST["stock"]);
$price = trim($_POST["price"]);
$description = trim($_POST["description"]);
$sql = "INSERT INTO Products (name, stock, price, description) VALUES(:n, :s, :p, :d)";

$stmt = $conn->prepare($sql);
$stmt->bindParam(":n", $name, PDO::PARAM_STR);
$stmt->bindParam(":s", $stock, PDO::PARAM_STR);
$stmt->bindParam(":p", $price, PDO::PARAM_STR);
$stmt->bindParam(":d", $description, PDO::PARAM_STR);
$stmt->execute();
                                                
header("location: ../front_end/admin_products.php");
                        