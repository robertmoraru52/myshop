<?php
session_start();
require "connect_db.php";

if(isset($_POST["suggestion"]) && empty($_POST["suggestion"])=== false){
    $sql = "SELECT * FROM Categories WHERE name LIKE '%".$_POST["suggestion"]."%'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $catList = $stmt->fetchAll(\PDO::FETCH_ASSOC);
    foreach($catList as $cat){
        echo "<ul class='list-unstyled'>";
        echo "<li class='dropdown-item '>".$cat["name"]."</li>";
        echo "</ul>";
    }
}

if(isset($_POST["submit_search"])){
$search = trim($_POST["search_cat"]);
$_SESSION["cat_header"] = $search;

header("location: ../front_end/category_page.php");
}
