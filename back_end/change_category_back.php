<?php
session_start();
require "connect_db.php";

$id = $_SESSION["change_category_id"];
$name = trim($_POST["name"]);

if(isset($_POST["submit"])){
    $stmt = $conn->prepare("UPDATE Categories SET name = :n WHERE id = :i");
    $stmt->bindParam(":n",$name,PDO::PARAM_STR);
    $stmt->bindParam(":i", $id);
    $stmt->execute();
    
    header("location: ../front_end/admin_categories.php");
}
