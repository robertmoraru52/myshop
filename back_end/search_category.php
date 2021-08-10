<?php
session_start();
require "connect_db.php";

$searchBy = trim($_POST["searchBy"]);
$sql = "SELECT * FROM Categories WHERE name = :n";

$stmt = $conn->prepare($sql);
$stmt->bindParam(":n", $searchBy);
$stmt->execute();

$row = $stmt->fetch();
$_SESSION["cat_id"] = $row["id"];
$_SESSION["cat_name"] = $row["name"];

header("location: ../front_end/redirect_search_category.php");