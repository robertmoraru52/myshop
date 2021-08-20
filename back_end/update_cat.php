<?php
session_start();
require "connect_db.php";
$_SESSION["cat"]=$_POST["category"];
$stmt = $conn->prepare("SELECT * FROM Categories WHERE name = :namecat");
$stmt->bindParam(":namecat", $_SESSION["cat"]);
$stmt->execute();
$catId = $stmt->fetchAll(\PDO::FETCH_ASSOC);
foreach($catId as $key => $catt){
    $_SESSION["category_id"] = $catt["id"];

}