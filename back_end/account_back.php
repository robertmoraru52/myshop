<?php
session_start();
require "connect_db.php";

$email = $_SESSION["email"];
$f_name = trim($_POST["f_name"]);
$l_name = trim($_POST["l_name"]);
$mobile = trim($_POST["mobile"]);
$address = trim($_POST["address"]);
$post_code = trim($_POST["post_code"]);
$country = trim($_POST["country"]);
$region = trim($_POST["region"]);

if(isset($_POST["submit"])){
    $stmt = $conn->prepare("UPDATE Users SET first_name = :fn, last_name = :ln, mobile = :m, adress = :a, post_code = :pc, country=:c, region=:r WHERE email= :em;");
    $stmt->bindParam(":em",$email,PDO::PARAM_STR);
    $stmt->bindParam(":fn", $f_name, PDO::PARAM_STR);
    $stmt->bindParam(":ln", $l_name, PDO::PARAM_STR);
    $stmt->bindParam(":m", $mobile, PDO::PARAM_STR);
    $stmt->bindParam(":a", $address, PDO::PARAM_STR);
    $stmt->bindParam(":pc", $post_code, PDO::PARAM_STR);
    $stmt->bindParam(":c", $country, PDO::PARAM_STR);
    $stmt->bindParam(":r", $region, PDO::PARAM_STR);
    $stmt->execute();
    
    header("location: ../front_end/redirect_account.php");
}
else{
    echo "error";
}