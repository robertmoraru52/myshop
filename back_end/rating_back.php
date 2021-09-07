<?php
session_start();
require "connect_db.php";
if(isset($_POST["star"]) && isset($_SESSION["email"])){
    $stmt = $conn->prepare("SELECT * FROM Rating WHERE id_product = :q AND user_email = :em");
    $stmt->bindParam(":q",$_POST["id"]);
    $stmt->bindParam(":em",$_SESSION["email"]);
    $stmt->execute();

    if($stmt->rowCount() == 0){
        $stmt = $conn->prepare("INSERT INTO Rating(id_product, stars, user_email) VALUES(:i , :s, :em)");
        $stmt->bindParam(":i",$_POST["id"]);
        $stmt->bindParam(":s",$_POST["star"]);
        $stmt->bindParam(":em",$_SESSION["email"]);
        $stmt->execute();
    }
    else{
        $stmt = $conn->prepare("UPDATE Rating SET id_product = :i, stars = :s, user_email = :em WHERE  id_product = :i AND user_email = :em");
        $stmt->bindParam(":i",$_POST["id"]);
        $stmt->bindParam(":s",$_POST["star"]);
        $stmt->bindParam(":em",$_SESSION["email"]);
        $stmt->execute();
    }

   
}