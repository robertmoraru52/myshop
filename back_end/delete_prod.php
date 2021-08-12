<?php 
session_start();

require "connect_db.php";
$stmt = $conn->prepare("DELETE FROM Products WHERE id = :q");
$stmt->bindParam(":q", $_SESSION["delete_prod"]);
$stmt->execute();
header("location: ../front_end/admin_products.php");