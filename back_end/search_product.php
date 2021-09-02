<?php
session_start();
require "connect_db.php";

$searchBy = trim($_POST["searchBy"]);
$_SESSION["search_prod"] = $searchBy;

header("location: ../front_end/redirect_search_product.php");