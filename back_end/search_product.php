<?php
session_start();
require "connect_db.php";

$searchBy = $_POST["searchBy"];
$sql = "SELECT * FROM Products WHERE id = :i";

$stmt = $conn->prepare($sql);
$stmt->bindParam(":i", $searchBy);
$stmt->execute();

$rowList = $stmt->fetchAll();
foreach($rowList as $row){
    $_SESSION["search_id_p"] = $row["id"];
    $_SESSION["search_name"] = $row["name"];
    $_SESSION["search_stock"] = $row["stock"];
    $_SESSION["search_price"] = $row["price"];
}

header("location: ../front_end/redirect_search_product.php");