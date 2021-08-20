<?php

if(isset($_POST["submit"])){

    $selector = $_POST["selector"];
    $validator = $_POST["validator"];
    $psw = $_POST["psw"];
    $pswRepeat = $_POST["psw-repeat"];

    if(empty($psw) || empty($pswRepeat)){
        echo "error empty password";
        exit();
    }
    else if($psw != $pswRepeat){
        echo "error confirm password";
        exit();
    }

    $currentDate = date("U");
    require "connect_db.php";

    $stmt = $conn->prepare("SELECT * FROM PassReset WHERE selector = :s AND expires >= $currentDate");
    $stmt->bindParam(":s", $selector);
    $stmt->execute();
    $row = $stmt->fetch();

    $tokenBin = hex2bin($validator);
    $tokenCheck = password_verify($tokenBin, $row["token"]);

    if($tokenCheck === false){
        echo "error";
    }
    elseif($tokenCheck === true){
        $tokenEmail = $row["email"];

        $stmt = $conn->prepare("SELECT * FROM Users WHERE email = :em");
        $stmt->bindParam(":em", $tokenEmail);
        $stmt->execute();
        if($stmt->rowCount() == 0){
            echo "error";
        }
        else{
            $pswHash = password_hash($psw, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("UPDATE Users SET password = :psw WHERE email = :em");
            $stmt->bindParam(":psw", $pswHash);
            $stmt->bindParam(":em", $tokenEmail);
            $stmt->execute();

            $stmt = $conn->prepare("DELETE FROM PassReset WHERE email = :em");
            $stmt->bindParam(":em", $tokenEmail);
            $stmt->execute();

            header("location: ../front_end/login.php?reset=success");
        }
    }

}