<?php
session_start();
require "connect_db.php";

if(isset($_POST["suggestion"]) && empty($_POST["suggestion"])=== false){
    $sql = "SELECT * FROM Products WHERE name LIKE '%".$_POST["suggestion"]."%'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $prodList = $stmt->fetchAll(\PDO::FETCH_ASSOC);
    foreach($prodList as $prod){
        echo "<ul class='list-unstyled'>";
        echo "<li class='dropdown-item '>".$prod["name"]."</li>";
        echo "</ul>";
    }
}

if(isset($_POST["submit_search"])){
$search = trim($_POST["search_cat"]);
$_SESSION["search_prod_nav"] = $search;

header("location: ../front_end/details_search.php");
}
