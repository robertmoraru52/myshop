<?php
require "connect_db.php";

$fName = trim($_POST["fname"]);
$lName = trim($_POST["lname"]);
$email = trim($_POST["email"]);
$comm = trim($_POST["comment"]);

if(isset($_POST["submit"])){
    $sql = "INSERT INTO Contact(first_name, last_name, email, comment) VALUES(:f, :l, :e, :c)";  
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":f", $fName);
    $stmt->bindParam(":l", $lName);
    $stmt->bindParam(":e", $email);
    $stmt->bindParam(":c", $comm);
    $stmt->execute();
    header("location: ../front_end/contact.php?success");
}