<?php
require "connect_db.php";

$email = $_POST["email"];
$sql = "DELETE FROM Users WHERE email = :em";

$stmt = $conn->prepare($sql);
$stmt->bindParam(":em", $email);
$stmt->execute();

header("location: ../front_end/admin_users.php");

unset($stmt);