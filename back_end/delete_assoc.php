<?php 
session_start();

require "connect_db.php";
$stmt = $conn->prepare("DELETE FROM Products_Categories WHERE category_id = :q");
$stmt->bindParam(":q", $_SESSION["delete_cat"]);
$stmt->execute();
header("location: ../front_end/admin_categories.php");