<?php

require "connect_db.php";


$email = trim($_POST["email"]);
$psw = trim($_POST["password"]);
$psw_confirm = trim($_POST["confirm_password"]);
$psw_p = password_hash($_POST["password"], PASSWORD_DEFAULT);


if($psw != $psw_confirm){
        echo "The two passwords do not match!";
}
else{
        $sql = "SELECT id FROM Users WHERE email = :em";
        if($stmt = $conn->prepare($sql)){
                $stmt->bindParam(":em", $email, PDO::PARAM_STR);
                if($stmt->execute()){
                        if($stmt->rowCount() == 1){
                                echo "this email is already used";
                        }
                         else{
                                $sql = "INSERT INTO Users(email, password) VALUES(:em, :psw)";

                                $stmt = $conn->prepare($sql);
                                $stmt->bindParam(":em", $email, PDO::PARAM_STR);
                                $stmt->bindParam(":psw", $psw_p, PDO::PARAM_STR);
                                $stmt->execute();

                                header("location: ../front_end/redirect_login.php");
                        }
                }
        }
       
}
