<?php
require "connect_db.php";

$product = $_POST["product"];
$sql = "DELETE FROM Products WHERE id = :i";

$stmt = $conn->prepare($sql);
$stmt->bindParam(":i", $product);
$stmt->execute();

header("location: ../front_end/admin_products.php");

unset($stmt);