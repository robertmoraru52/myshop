<?php 
session_start();

require "connect_db.php";
$stmt = $conn->prepare("DELETE FROM Users WHERE id = :q");
$stmt->bindParam(":q", $_SESSION["search_id"]);
$stmt->execute();
header("location: ../front_end/admin_users.php");