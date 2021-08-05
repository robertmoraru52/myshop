<?php
session_start();
require "connect_db.php";

$stmt = $conn->prepare("SELECT * FROM Users ORDER BY id DESC");
$stmt->execute();
$rowList = $stmt->fetchAll();

foreach($rowList as $row){
    $_SESSION["user1_id"] = $row["id"];
    $_SESSION["user1_created"] = $row["created_at"];
    $_SESSION["user1_email"] = $row["email"];

    
}

