<?php
session_start();
require "connect_db.php";

if(isset($_POST["submit"])){
    $stmt = $conn->prepare("INSERT INTO Comments (comments, user) VALUES(:c, :u)");
    $stmt->bindParam(":c", $_POST["comment"]);
    $stmt->bindParam(":u", $_SESSION["email"]);
    $stmt->execute();

    $last_id = $conn->lastInsertId();

    $stmt = $conn->prepare("INSERT INTO Products_Comments (product_id, comment_id) VALUES(:c, :u)");
    $stmt->bindParam(":c", $_SESSION["url_details"]);
    $stmt->bindParam(":u", $last_id);
    $stmt->execute();

    $head = "location: ../front_end/details.php?product_id=".$_SESSION["url_details"];
    header($head);
}