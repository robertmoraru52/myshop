<?php
session_start();
$_SESSION = [];
session_destroy();
header("location: ../front_end/login.php");
exit;