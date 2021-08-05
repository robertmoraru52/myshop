<?php
require "connect_db.php";

$name = trim($_POST["name"]);
$stock = trim($_POST["stock"]);
$price = trim($_POST["price"]);
$sql = "INSERT INTO Products (name, stock, price) VALUES(:n, :s, :p)";

$stmt = $conn->prepare($sql);
$stmt->bindParam(":n", $name, PDO::PARAM_STR);
$stmt->bindParam(":s", $stock, PDO::PARAM_STR);
$stmt->bindParam(":p", $price, PDO::PARAM_STR);
$stmt->execute();
                                                
header("location: ../front_end/redirect_product.php");
                        