<?php

require "connect_db.php";

$email = $_POST["email"];
$psw = $_POST["psw"];
$psw_repeat = $_POST["psw_repeat"];

$email = filter_var($email, FILTER_SANITIZE_EMAIL, FILTER_FLAG_STRIP_HIGH);
$psw = filter_var($psw, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
$psw_repeat = filter_var($psw_repeat, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);

if($psw != $psw_repeat){
    echo "The two passwords do not match!";
}
else{
    try{
        $sql = "INSERT INTO Users(email, password) VALUES(:em, :p)";

        $stmt = $conn->prepare($sql);

        $stmt->bindParam(":em", $email);
        $stmt->bindParam(":p", $psw);

        $stmt->execute();
        echo "Registration complete!";

    }
    catch(PDOException $e){
        die("Error: ". $e->getMessage()) ;
    }
}

unset($conn);

