<?php

$serverName = "localhost";
$userName = "root";
$password = "";
$db = "Myshop";

try{
    $conn = new PDO("mysql:host=$serverName;dbname=$db", $userName, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    echo $e->getMessage();
}
