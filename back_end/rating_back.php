<?php
session_start();
require "connect_db.php";

if(isset($_SESSION["prod_id_rating"]) && isset($_POST["star"])){
    $stmt = $conn->prepare("INSERT INTO Rating(id_product, stars) VALUES(:i, :s)");
    $stmt->bindParam(":i",$_SESSION["prod_id_rating"]);
    $stmt->bindParam(":s",$_POST["star"]);
    $stmt->execute();
}
