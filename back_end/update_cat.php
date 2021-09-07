<?php
session_start();
require "connect_db.php";
$stmt = $conn->prepare("SELECT * FROM Categories WHERE name = :namecat");
$stmt->bindParam(":namecat", $_POST["category"]);
$stmt->execute();
$catId = $stmt->fetch(\PDO::FETCH_ASSOC);
$_SESSION["category_id"] = $catId["id"];
$_SESSION["id_prod_select"] = $_POST["prod_id"];

