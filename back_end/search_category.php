<?php
session_start();
require "connect_db.php";

$searchBy = trim($_POST["searchBy"]);
$_SESSION["search_cat"] = $searchBy;
$sql = "SELECT * FROM Categories WHERE name = :n";
$stmt = $conn->prepare($sql);
$stmt->bindParam(":n", $searchBy);
$stmt->execute();
$row = $stmt->fetchAll(\PDO::FETCH_ASSOC);
foreach($row as $key => $value){
    $_SESSION["cat_id"] = $value["id"];
}

header("location: ../front_end/redirect_search_category.php");