<?php
session_start();
require "connect_db.php";

$searchBy = $_POST["searchBy"];
$sql = "SELECT * FROM Users WHERE email = :em";

$stmt = $conn->prepare($sql);
$stmt->bindParam(":em", $searchBy);
$stmt->execute();

$rowList = $stmt->fetchAll();
foreach($rowList as $row){
    $_SESSION["search_id"] = $row["id"];
    $_SESSION["search_created"] = $row["created_at"];
    $_SESSION["search_email"] = $row["email"];
}
header("location: ../front_end/redirect_search_user.php");