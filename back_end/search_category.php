<?php
session_start();
require "connect_db.php";

$searchBy = trim($_POST["searchBy"]);
$_SESSION["search_cat"] = $searchBy;

header("location: ../front_end/redirect_search_category.php");