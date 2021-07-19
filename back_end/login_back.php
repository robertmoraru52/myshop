<?php

require "connect_db.php";

session_start();

$sql = "SELECT id,email,password FROM Users";

$stmt = $conn->prepare($sql)->execute();

