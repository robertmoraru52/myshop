<?php
session_start();
if(isset($_POST["cat"])){
$_SESSION["cat_header"] = $_POST["cat"];
}