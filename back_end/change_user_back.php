<?php
session_start();
require "connect_db.php";

$id = $_SESSION["change_user_id"];
$email = trim($_POST["email"]);

if(isset($_POST["submit"])){
    $stmt = $conn->prepare("UPDATE Users SET email = :n WHERE id = :i");
    $stmt->bindParam(":n",$email,PDO::PARAM_STR);
    $stmt->bindParam(":i", $id);
    $stmt->execute();
    
    header("location: ../front_end/admin_users.php");
}


if(isset($_POST["admin"])){
    $stmt = $conn->prepare("UPDATE Users SET admin_f = 'true' WHERE id = :i");
    $stmt->bindParam(":i", $id);
    $stmt->execute();
    header("location: ../front_end/admin_users.php");

}